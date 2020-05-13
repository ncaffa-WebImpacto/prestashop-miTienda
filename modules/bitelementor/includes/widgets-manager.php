<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widgets_Manager {

	/**
	 * @var Widget_Base[]
	 */
	protected $_registered_widgets = null;

	private function _init_widgets() {
		include_once( ELEMENTOR_PATH . 'includes/elements/base.php' );
		include( ELEMENTOR_PATH . 'includes/widgets/base.php' );

		$build_widgets_filename = [
			'accordion',
			'advanced-heading',
			'alert',
			//'audio',
			'banner',
			'button',
			'call-to-action',
			'counter',
			'divider',
			'google-maps',
			'heading',
			'html',
			'icon',
			'icon-box',
			'icon-list',
			'image',
			'image-box',
			'image-carousel',
			//'image-gallery',
			'image-slider',
			'progress',
			'shape-separator',
			'social-icons',
			'spacer',
			'tabs',
			'teammember',
			'teammember-carousel',
			'testimonial',
			'text-editor',
			'video',
			'toggle',
			'instagram',
		];

		$this->_registered_widgets = [];
		foreach ( $build_widgets_filename as $widget_filename ) {
			include( ELEMENTOR_PATH . 'includes/widgets/' . $widget_filename . '.php' );

			$class_name = ucwords( $widget_filename );
			$class_name = str_replace( '-', '_', $class_name );

			$this->register_widget( __NAMESPACE__ . '\Widget_' . $class_name );
		}

		$this->_register_wp_widgets();
	}

	private function _register_wp_widgets() {
        include( ELEMENTOR_PATH . 'includes/widgets/prestashop.php' );

        $bitElementorWidgets =  \BitElementorWpHelper::getBitElementorWidgets();

        foreach ($bitElementorWidgets as $widget){
            $this->register_widget( __NAMESPACE__ . '\Widget_Prestashop', [ 'widget_name' => 'BitElementorWidget_' . $widget  ] );
        }
    }

	public function register_widget( $widget_class, $args = [] ) {
		if ( ! class_exists( $widget_class ) ) {
			return die( 'widget_class_name_not_exists' );
		}

		$widget_instance = new $widget_class( $args );

		if ( ! $widget_instance instanceof Widget_Base ) {
			return die( 'wrong_instance_widget' );
		}
		$this->_registered_widgets[ $widget_instance->get_id() ] = $widget_instance;

		return true;
	}

	public function unregister_widget( $id ) {
		if ( ! isset( $this->_registered_widgets[ $id ] ) ) {
			return false;
		}
		unset( $this->_registered_widgets[ $id ] );
		return true;
	}

	public function get_registered_widgets() {
		if ( is_null( $this->_registered_widgets ) ) {
			$this->_init_widgets();
		}
		return $this->_registered_widgets;
	}

	public function get_widget( $id ) {
		$widgets = $this->get_registered_widgets();

		if ( ! isset( $widgets[ $id ] ) ) {
			return false;
		}
		return $widgets[ $id ];
	}

	public function get_registered_widgets_data() {
		$data = [];
		foreach ( $this->get_registered_widgets() as $widget ) {
			$data[ $widget->get_id() ] = $widget->get_data();
		}
		return $data;
	}

	public function ajax_render_widget() {

		$data = \BitElementorWpHelper::jsonDecode( \BitElementorWpHelper::stripslashes( html_entity_decode( \BitElementorWpHelper::getValue('data') ) ), true );

		// Start buffering
		ob_start();
		$widget = $this->get_widget( $data['widgetType'] );
		if ( false !== $widget ) {
			$data['settings'] = $widget->get_parse_values( $data['settings'] );
			$widget->render_content( $data['settings'] );
		}

		$render_html = ob_get_clean();

        \BitElementorWpHelper::wp_send_json_success(
			[
				'render' => $render_html,
			]
		);
	}

	public function ajax_get_wp_widget_form() {
		return;
	}

	public function render_widgets_content() {
		foreach ( $this->get_registered_widgets() as $widget ) {
			$widget->print_template();
		}
	}

	public function __construct() {}
}
