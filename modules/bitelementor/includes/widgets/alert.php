<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Alert extends Widget_Base {

	public function get_id() {
		return 'alert';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Alert', 'elementor' );
	}

	public function get_icon() {
		return 'alert';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_alert',
			[
				'label' => \BitElementorWpHelper::__( 'Alert', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'alert_type',
			[
				'label' => \BitElementorWpHelper::__( 'Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'info',
				'section' => 'section_alert',
				'options' => [
					'info' => \BitElementorWpHelper::__( 'Info', 'elementor' ),
					'success' => \BitElementorWpHelper::__( 'Success', 'elementor' ),
					'warning' => \BitElementorWpHelper::__( 'Warning', 'elementor' ),
					'danger' => \BitElementorWpHelper::__( 'Danger', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'alert_title',
			[
				'label' => \BitElementorWpHelper::__( 'Title & Description', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => \BitElementorWpHelper::__( 'Your Title', 'elementor' ),
				'default' => \BitElementorWpHelper::__( 'This is Alert', 'elementor' ),
				'label_block' => true,
				'section' => 'section_alert',
			]
		);

		$this->add_control(
			'alert_description',
			[
				'label' => \BitElementorWpHelper::__( 'Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => \BitElementorWpHelper::__( 'Your Description', 'elementor' ),
				'default' => \BitElementorWpHelper::__( 'I am description. Click edit button to change this text.', 'elementor' ),
				'separator' => 'none',
				'section' => 'section_alert',
				'show_label' => false,
			]
		);

		$this->add_control(
			'show_dismiss',
			[
				'label' => \BitElementorWpHelper::__( 'Dismiss Button', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show',
				'section' => 'section_alert',
				'options' => [
					'show' => \BitElementorWpHelper::__( 'Show', 'elementor' ),
					'hide' => \BitElementorWpHelper::__( 'Hide', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'section' => 'section_alert',
			]
		);

		$this->add_control(
			'section_type',
			[
				'label' => \BitElementorWpHelper::__( 'Alert Type', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'background',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_type',
				'selectors' => [
					'{{WRAPPER}} .elementor-alert' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => \BitElementorWpHelper::__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_type',
				'selectors' => [
					'{{WRAPPER}} .elementor-alert' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'width',
			[
				'label' => \BitElementorWpHelper::__( 'Left Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'section' => 'section_type',
				'selectors' => [
					'{{WRAPPER}} .elementor-alert' => 'border-left-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title',
				'selectors' => [
					'{{WRAPPER}} .elementor-alert-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'alert_title',
				'tab' => self::TAB_STYLE,
				'section' => 'section_title',
				'selector' => '{{WRAPPER}} .elementor-alert-title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'section_description',
			[
				'label' => \BitElementorWpHelper::__( 'Description', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_description',
				'selectors' => [
					'{{WRAPPER}} .elementor-alert-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'alert_description',
				'tab' => self::TAB_STYLE,
				'section' => 'section_description',
				'selector' => '{{WRAPPER}} .elementor-alert-description',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

	}

	protected function render( $instance = [] ) {
		if ( empty( $instance['alert_title'] ) ) {
			return;
		}

		if ( ! empty( $instance['alert_type'] ) ) {
			$this->add_render_attribute( 'wrapper', 'class', 'elementor-alert alert alert-' . $instance['alert_type'] );
		}

		echo '<div ' . $this->get_render_attribute_string( 'wrapper' ) . ' role="alert">';
		$html = sprintf( '<span class="elementor-alert-title">%1$s</span>', $instance['alert_title'] );

		if ( ! empty( $instance['alert_description'] ) ) {
			$html .= sprintf( '<span class="elementor-alert-description">%s</span>', $instance['alert_description'] );
		}

		if ( ! empty( $instance['show_dismiss'] ) && 'show' === $instance['show_dismiss'] ) {
			$html .= '<button type="button" class="elementor-alert-dismiss">X</button>';
		}

		$html .= '</div>';

		echo $html;
	}

	protected function content_template() {
		?>
		<#
		var html = '<div class="elementor-alert alert alert-' + settings.alert_type + '" role="alert">';
		if ( '' !== settings.title ) {
			html += '<span class="elementor-alert-title">' + settings.alert_title + '</span>';

			if ( '' !== settings.description ) {
				html += '<span class="elementor-alert-description">' + settings.alert_description + '</span>';
			}

			if ( 'show' === settings.show_dismiss ) {
				html += '<button type="button" class="elementor-alert-dismiss">X</button>';
			}

			html += '</div>';

			print( html );
		}
		#>
		<?php
	}
}
