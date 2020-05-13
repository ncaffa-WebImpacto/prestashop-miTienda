<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Advanced_Heading extends Widget_Base {

	public function get_id() {
		return 'advanced-heading';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Advanced Heading', 'elementor' );
	}

	public function get_icon() {
		return 'type-tool';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_title',
			[
				'label' => \BitElementorWpHelper::__( 'Heading', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => \BitElementorWpHelper::__( 'Main Heading', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => \BitElementorWpHelper::__( 'Enter your title', 'elementor' ),
				'default' => \BitElementorWpHelper::__( 'This is heading element', 'elementor' ),
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => \BitElementorWpHelper::__( 'Sub Heading', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => \BitElementorWpHelper::__( 'Enter your title', 'elementor' ),
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
					'{{WRAPPER}} .elementor-advanced-title, .advanced-title-sub-heading' => 'text-align: {{VALUE}};',
				],
				'section' => 'section_title',
			]
		);

		//advanced title
		$this->add_control(
			'section_advanced_title',
			[
				'label' => \BitElementorWpHelper::__( 'Advanced Heading', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'advanced_title',
			[
				'label' => \BitElementorWpHelper::__( 'Advanced Heading', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => \BitElementorWpHelper::__( 'Enter your title', 'elementor' ),
				'default' => \BitElementorWpHelper::__( 'Advanced Heading', 'elementor' ),
				'section' => 'section_advanced_title',
				'description' => \BitElementorWpHelper::__( 'This heading will show as style as background and you can move and style many way.', 'elementor' ),
			]
		);

		$this->add_responsive_control(
			'advanced_align',
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
					'{{WRAPPER}} .advance-title-block' => 'text-align: {{VALUE}};',
				],
				'section' => 'section_advanced_title',
			]
		);

		$this->add_responsive_control(
			'adavanced_x_offset',
			[
				'label' => \BitElementorWpHelper::__( 'X Offset', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
                    'px' => [
                        'min' => -800,
                        'max' => 800,
                    ],
                ],
				'section' => 'section_advanced_title',
			]
		);

		$this->add_responsive_control(
			'adavanced_y_offset',
			[
				'label' => \BitElementorWpHelper::__( 'Y Offset', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
                    'px' => [
                        'min' => -800,
                        'max' => 800,
                    ],
                ],
				'section' => 'section_advanced_title',
			]
		);

		$this->add_responsive_control(
			'adavanced_rotate',
			[
				'label' => \BitElementorWpHelper::__( 'Rotate', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'section' => 'section_advanced_title',
				'selectors' => [
					'{{WRAPPER}} .advance-title-block .advance-inner-block' => 'transform: translate({{adavanced_x_offset.SIZE}}{{adavanced_x_offset.UNIT}}, {{adavanced_y_offset.SIZE}}{{adavanced_y_offset.UNIT}}) rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
            'adavanced_rotate_origin',
            [
                'label' => \BitElementorWpHelper::__( 'Rotate Origin', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_advanced_title',
                'default' => 'default',
                'options' => [
                    'default'   => \BitElementorWpHelper::__( 'Default', 'elementor' ),
                    '0 0'   => \BitElementorWpHelper::__( 'Top Left', 'elementor' ),
                    '50% 0'   => \BitElementorWpHelper::__( 'Top center', 'elementor' ),
                    '100% 0'   => \BitElementorWpHelper::__( 'Top Right', 'elementor' ),
                    '50% 50%'   => \BitElementorWpHelper::__( 'Center', 'elementor' ),
                    '0 50%'   => \BitElementorWpHelper::__( 'Center Left', 'elementor' ),
                    '100% 50%'   => \BitElementorWpHelper::__( 'Center Right', 'elementor' ),
                    '0 100%'   => \BitElementorWpHelper::__( 'Bottom Left', 'elementor' ),
                    '50% 100%'   => \BitElementorWpHelper::__( 'Bottom Center', 'elementor' ),
                    '100% 100%'   => \BitElementorWpHelper::__( 'Bottom Right', 'elementor' ),
                ],
                'selectors' => [
					'{{WRAPPER}} .advance-title-block .advance-inner-block' => 'transform-origin: {{VALUE}};',
				],
                'description' => \BitElementorWpHelper::__( 'Origin work when you set rotate value', 'elementor' ),
            ]
        );

		$this->add_control(
            'adavanced_hide',
            [
                'label' => \BitElementorWpHelper::__( 'Hide at', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_advanced_title',
                'default' => 'nothing',
                'options' => [
                    'nothing'   => \BitElementorWpHelper::__( 'Nothing', 'elementor' ),
                    'hidden-md-down'   => \BitElementorWpHelper::__( 'Tablet and Mobile', 'elementor' ),
                    'hidden-xs-down'   => \BitElementorWpHelper::__( 'Mobile', 'elementor' ),
                ],
                'description' => \BitElementorWpHelper::__( 'Some cases you need to hide it because when you set heading at outer position mobile device can show wrong width in that case you can hide it at mobile or tablet device. if you set overflow hidden on section or body so you don\'t need it.', 'elementor' ),
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
				'label' => \BitElementorWpHelper::__( 'Main Heading', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-advanced-title, {{WRAPPER}} .elementor-advanced-title a' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elementor-advanced-title',
			]
		);

		$this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'section' => 'section_title_style',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-advanced-title',
            ]
        );

        $this->add_control(
			'section_sub_title_style',
			[
				'label' => \BitElementorWpHelper::__( 'Sub Heading', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_sub_title_style',
				'selectors' => [
					'{{WRAPPER}} .advanced-title-sub-heading' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'tab' => self::TAB_STYLE,
				'section' => 'section_sub_title_style',
				'selector' => '{{WRAPPER}} .advanced-title-sub-heading',
			]
		);

		$this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'sub_title_text_shadow',
                'section' => 'section_sub_title_style',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .advanced-title-sub-heading',
            ]
        );

        $this->add_control(
			'section_advanced_style',
			[
				'label' => \BitElementorWpHelper::__( 'Advanced Heading', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'adv_title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_advanced_style',
				'selectors' => [
					'{{WRAPPER}} .advance-title-block .advance-inner-block' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'adv_background_color',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_advanced_style',
				'selectors' => [
					'{{WRAPPER}} .advance-title-block .advance-inner-block' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
            'adv_title_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_advanced_style',
                'selectors' => [
                    '{{WRAPPER}} .advance-title-block .advance-inner-block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'adv_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'tab' => self::TAB_STYLE,
				'section' => 'section_advanced_style',
				'selector' => '{{WRAPPER}} .advance-title-block .advance-inner-block',
			]
		);

		$this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'adv_title_text_shadow',
                'section' => 'section_advanced_style',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .advance-title-block .advance-inner-block',
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'advanced_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_advanced_style',
				'selector' => '{{WRAPPER}} .advance-title-block .advance-inner-block',
			]
		);

		$this->add_control(
			'adv_border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_advanced_style',
				'selectors' => [
					'{{WRAPPER}} .advance-title-block .advance-inner-block' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'adv_box_shadow',
                'section' => 'section_advanced_style',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .advance-title-block .advance-inner-block',
            ]
        );

         $this->add_control(
            'adv_opacity',
            [
                'label' => \BitElementorWpHelper::__( 'Opacity (%)', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_advanced_style',
                'default' => [
                    'size' => 0.7,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .advance-title-block .advance-inner-block' => 'opacity: {{SIZE}};',
                ],
            ]
        );
	}

	protected function render( $instance = [] ) {
		if ( empty( $instance['title'] ) )
			return;

		$this->add_render_attribute( 'advanced-heading', 'class', 'elementor-advanced-title' );

		if ( ! empty( $instance['size'] ) ) {
			$this->add_render_attribute( 'advanced-heading', 'class', 'elementor-size-' . $instance['size'] );
		}
		echo '<div class="advance-title-block '.$instance['adavanced_hide'].'"><div class="advance-inner-block">'.$instance['advanced_title'].'</div></div>';
		if ( ! empty( $instance['link']['url'] ) ) {

			$this->add_render_attribute( 'url', 'href', $instance['link']['url'] );
			if ( $instance['link']['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
				$this->add_render_attribute( 'url', 'rel', 'noopener noreferrer');
			}
			$url = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $instance['title'] );

			$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $instance['header_size'], $this->get_render_attribute_string( 'advanced-heading' ), $url );
		} else {
			$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $instance['header_size'], $this->get_render_attribute_string( 'advanced-heading' ), '<span>'.$instance['title'].'</span>' );
		}
		$title_html .= '<div class="advanced-title-sub-heading">'.$instance['sub_title'].'</div>';
		echo $title_html;
	}

	protected function content_template() {
	}
}
