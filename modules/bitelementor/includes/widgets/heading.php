<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Heading extends Widget_Base {

	public function get_id() {
		return 'heading';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Heading', 'elementor' );
	}

	public function get_icon() {
		return 'type-tool';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_title',
			[
				'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => \BitElementorWpHelper::__( 'Enter your title (first part)', 'elementor' ),
				'default' => \BitElementorWpHelper::__( 'This is heading element', 'elementor' ),
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'dual_title',
			[
				'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => \BitElementorWpHelper::__( 'Enter your title (last part)', 'elementor' ),
				'default' => \BitElementorWpHelper::__( 'This is heading element', 'elementor' ),
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'link',
			[
				'label' => \BitElementorWpHelper::__( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '',
				],
				'section' => 'section_title',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'size',
			[
				'label' => \BitElementorWpHelper::__( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => \BitElementorWpHelper::__( 'Default', 'elementor' ),
					'small' => \BitElementorWpHelper::__( 'Small', 'elementor' ),
					'medium' => \BitElementorWpHelper::__( 'Medium', 'elementor' ),
					'large' => \BitElementorWpHelper::__( 'Large', 'elementor' ),
					'xl' => \BitElementorWpHelper::__( 'XL', 'elementor' ),
					'xxl' => \BitElementorWpHelper::__( 'XXL', 'elementor' ),
				],
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'header_size',
			[
				'label' => \BitElementorWpHelper::__( 'HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => \BitElementorWpHelper::__( 'H1', 'elementor' ),
					'h2' => \BitElementorWpHelper::__( 'H2', 'elementor' ),
					'h3' => \BitElementorWpHelper::__( 'H3', 'elementor' ),
					'h4' => \BitElementorWpHelper::__( 'H4', 'elementor' ),
					'h5' => \BitElementorWpHelper::__( 'H5', 'elementor' ),
					'h6' => \BitElementorWpHelper::__( 'H6', 'elementor' ),
					'div' => \BitElementorWpHelper::__( 'div', 'elementor' ),
					'span' => \BitElementorWpHelper::__( 'span', 'elementor' ),
					'p' => \BitElementorWpHelper::__( 'p', 'elementor' ),
				],
				'default' => 'h2',
				'section' => 'section_title',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => \BitElementorWpHelper::__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => \BitElementorWpHelper::__( 'Left', 'elementor' ),
						'icon' => 'align-left',
					],
					'center' => [
						'title' => \BitElementorWpHelper::__( 'Center', 'elementor' ),
						'icon' => 'align-center',
					],
					'right' => [
						'title' => \BitElementorWpHelper::__( 'Right', 'elementor' ),
						'icon' => 'align-right',
					],
					'justify' => [
						'title' => \BitElementorWpHelper::__( 'Justified', 'elementor' ),
						'icon' => 'align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'section_title_style',
			[
				'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Main Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-heading-title, {{WRAPPER}} .elementor-heading-title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selector' => '{{WRAPPER}} .elementor-heading-title',
			]
		);

		$this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'heading_text_shadow',
                'section' => 'section_title_style',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-heading-title',
            ]
		);

		$this->add_control(
			'heading_style_typo',
			[
				'label' => \BitElementorWpHelper::__( 'SubTitle Typography', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'dual_title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Dual Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-heading-title span.lead, {{WRAPPER}} .elementor-heading-title a span.lead' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'lead_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selector' => '{{WRAPPER}} .elementor-heading-title .lead',
			]
		);
	}

	protected function render( $instance = [] ) {
		if ( empty( $instance['title'] ) )
			return;

		$this->add_render_attribute( 'heading', 'class', 'elementor-heading-title' );

		if ( ! empty( $instance['size'] ) ) {
			$this->add_render_attribute( 'heading', 'class', 'elementor-size-' . $instance['size'] );
		}

		if ( ! empty( $instance['link']['url'] ) ) {

			$this->add_render_attribute( 'url', 'href', $instance['link']['url'] );
			if ( $instance['link']['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
				$this->add_render_attribute( 'url', 'rel', 'noopener noreferrer');
			}
			$url = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $instance['title'].'<span class="lead">'.$instance['dual_title'].'</span>' );

			$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $instance['header_size'], $this->get_render_attribute_string( 'heading' ), $url );
		} else {
			$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $instance['header_size'], $this->get_render_attribute_string( 'heading' ), '<span>'.$instance['title'].'</span><span class="lead">'.$instance['dual_title'].'</span>' );

		}

		echo $title_html;
	}

	protected function content_template() {
	}
}
