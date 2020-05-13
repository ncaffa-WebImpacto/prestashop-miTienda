<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_call_to_action extends Widget_Base {

    public function get_id() {
        return 'call-to-action-box';
    }

    public function get_title() {
        return \BitElementorWpHelper::__( 'Call to Action', 'elementor' );
    }

    public function get_icon() {
        return 'call-to-action';
    }

    protected function _register_controls() {
        $this->add_control(
            'section_content_settings',
            [
                'label' => \BitElementorWpHelper::__( 'Content Settings', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'cta_type',
            [
                'label' => \BitElementorWpHelper::__( 'Content Style', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'cta-basic',
                'section' => 'section_content_settings',
                'options' => [
                    'basic' => \BitElementorWpHelper::__( 'Basic', 'elementor' ),
                    'flex' => \BitElementorWpHelper::__( 'Flex Grid', 'elementor' ),
                    'icon-flex' => \BitElementorWpHelper::__( 'Flex Grid with Icon', 'elementor' ),
                ],
            ]
        );

        $this->add_control(
			'icon',
			[
				'label' => \BitElementorWpHelper::__( 'Choose Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-star',
				'section' => 'section_content_settings',
				'condition' => [
                    'cta_type' => 'icon-flex',
				],
			]
		);

        $this->add_responsive_control(
			'cta_align',
			[
				'label' => \BitElementorWpHelper::__( 'Content Alignment', 'elementor' ),
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
                    '{{WRAPPER}} .elementor-call-to-action' => 'text-align: {{VALUE}};  justify-content:  {{VALUE}};',
				],
				'section' => 'section_content_settings',
			]
		);

        $this->add_control(
            'cta_title',
            [
                'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => \BitElementorWpHelper::__( 'This is the heading', 'elementor' ),
                'placeholder' => \BitElementorWpHelper::__( 'Your Title', 'elementor' ),
                'section' => 'section_content_settings',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cta_description_text',
            [
                'show_label' => false,
                'label' => \BitElementorWpHelper::__( 'Content', 'elementor' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '<p>' . \BitElementorWpHelper::__( 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ) . '</p>',
                'section' => 'section_content_settings',
            ]
        );

        $this->add_control(
			'text',
			[
				'label' => \BitElementorWpHelper::__( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => \BitElementorWpHelper::__( 'Click me', 'elementor' ),
				'placeholder' => \BitElementorWpHelper::__( 'Click me', 'elementor' ),
				'section' => 'section_content_settings',
			]
		);

		$this->add_control(
			'link',
			[
				'label' => \BitElementorWpHelper::__( 'Button Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'section' => 'section_content_settings',
			]
        );

        $this->add_control(
            'section_style_cta',
            [
                'type'  => Controls_Manager::SECTION,
                'label' => \BitElementorWpHelper::__( 'Call to Action', 'elementor' ),
                'tab'   => self::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'cta_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_cta',
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cta_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_cta',
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_style_color_typo',
            [
                'type'  => Controls_Manager::SECTION,
                'label' => \BitElementorWpHelper::__( 'Color & Typography', 'elementor' ),
                'tab'   => self::TAB_STYLE,
            ]
        );

        $this->add_control(
			'title_style',
			[
				'label' => \BitElementorWpHelper::__( 'Title Style', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_color_typo',
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_color_typo',
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action .cta-title' => 'color: {{VALUE}};',
				],
			]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => \BitElementorWpHelper::__( 'Typography', 'elementor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_color_typo',
                'selector' => '{{WRAPPER}} .elementor-call-to-action .cta-title',
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_color_typo',
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action .cta-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_color_typo',
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action .cta-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'content_style',
			[
				'label' => \BitElementorWpHelper::__( 'content Style', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_color_typo',
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'content_color',
			[
				'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_color_typo',
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action p' => 'color: {{VALUE}};',
				],
			]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => \BitElementorWpHelper::__( 'Typography', 'elementor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_color_typo',
                'selector' => '{{WRAPPER}} .elementor-call-to-action p',
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_color_typo',
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_color_typo',
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_style_btn',
            [
                'type'  => Controls_Manager::SECTION,
                'label' => \BitElementorWpHelper::__( 'Button Style', 'elementor' ),
                'tab'   => self::TAB_STYLE,
            ]
        );

        $this->add_control(
			'btn_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_btn',
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action a.btn-cta' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'label' => \BitElementorWpHelper::__( 'Typography', 'elementor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_btn',
                'selector' => '{{WRAPPER}} .elementor-call-to-action a.btn-cta',
            ]
        );

        $this->add_control(
			'btn_background_color',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_btn',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action a.btn-cta' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => \BitElementorWpHelper::__( 'Border', 'elementor' ),
				'tab' => self::TAB_STYLE,
				'placeholder' => '1px',
				'default' => '1px',
				'section' => 'section_style_btn',
				'selector' => '{{WRAPPER}} .elementor-call-to-action a.btn-cta',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_btn',
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action a.btn-cta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => \BitElementorWpHelper::__( 'Text Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_btn',
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action a.btn-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_btn',
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action a.btn-cta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'btn_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Button Hover', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_btn',
				'separator' => 'before',
			]
        );

		$this->add_control(
			'btn_hover_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_btn',
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action a.btn-cta:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_background_hover_color',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_btn',
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action a.btn-cta:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_hover_border_color',
			[
				'label' => \BitElementorWpHelper::__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_btn',
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action a.btn-cta:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_hover_animation',
			[
				'label' => \BitElementorWpHelper::__( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_btn',
			]
        );

        $this->add_control(
            'section_style_icon',
            [
                'type'  => Controls_Manager::SECTION,
                'label' => \BitElementorWpHelper::__( 'Icon Style', 'elementor' ),
                'tab'   => self::TAB_STYLE,
                'condition' => [
                    'cta_type' => 'icon-flex',
                ],

            ]
        );

        $this->add_control(
			'icon_color',
			[
				'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_icon',
				'selectors' => [
					'{{WRAPPER}} .elementor-call-to-action .icon' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'cta_type' => 'icon-flex',
                ],
			]
        );
        
        $this->add_control(
            'icon_size',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Size', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_icon',
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'cta_type' => 'icon-flex',
                ],
            ]
        );

        $icon_spacing = \BitElementorWpHelper::is_rtl() ? 'margin-left: {{SIZE}}{{UNIT}};' : 'margin-right: {{SIZE}}{{UNIT}};';

        $this->add_control(
            'icon_spacing',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Spacing', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_icon',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-call-to-action .icon' => $icon_spacing,
                ],
                'condition' => [
                    'cta_type' => 'icon-flex',
                ],
            ]
        );

    }

    protected function render( $instance = [] ) {
        if ( ! empty( $instance['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $instance['link']['url'] );
			$this->add_render_attribute( 'button', 'class', 'elementor-button-link' );

			if ( ! empty( $instance['link']['is_external'] ) ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
				$this->add_render_attribute( 'button', 'rel', 'noopener noreferrer');

			}
        }
        
        $cta_align = $instance['cta_align'] ? ' cta-' . $instance['cta_align'] : '';
        $cta_type = $instance['cta_type'] ? ' cta-' . $instance['cta_type'] : '';
        $btn_class_html = 'class="btn-cta elementor-animation-' . $instance['btn_hover_animation'] . '"';
        ?>

        <div class="elementor-call-to-action<?php echo $cta_align; ?> <?php echo $cta_type; ?>">
            <?php if( 'basic' === $instance['cta_type'] ) { ?>
                <div class="cta-title"><?php echo $instance['cta_title']?></div>
                <?php echo $instance['cta_description_text']?>

                <a <?php echo  $btn_class_html; ?> <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                    <span class="cta-button-text"><?php echo $instance['text']; ?></span>
                </a>
            <?php } ?>
            <?php if( $instance['cta_type'] == 'flex' || $instance['cta_type'] == 'icon-flex' ) { ?>
                <?php if ( $instance['cta_type'] == 'icon-flex' ) {?>
                    <div class="icon">
                        <i class="<?php echo $instance['icon']; ?>"></i>
                    </div>
                <?php } ?>
                <div class="content">
                    <div class="cta-title"><?php echo $instance['cta_title']?></div>
                    <?php echo $instance['cta_description_text']?>
                </div>
                <div class="action">
                <a <?php echo  $btn_class_html; ?> <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                    <span class="cta-button-text"><?php echo $instance['text']; ?></span>
                </a>
                </div>
            <?php } ?>
        </div>
    <?php }

    protected function content_template() {
    }
}
