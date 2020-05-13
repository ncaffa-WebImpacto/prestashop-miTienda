<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Testimonial extends Widget_Base {

    public function get_id() {
        return 'testimonial';
    }

    public function get_title() {
        return \BitElementorWpHelper::__( 'Testimonial', 'elementor' );
    }

    public function get_icon() {
        return 'testimonial';
    }

    protected function _register_controls() {

        $this->add_control(
            'section_testimonial',
            [
                'label' => \BitElementorWpHelper::__( 'Testimonial', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'testimonials_list',
            [
                'label' => '',
                'type' => Controls_Manager::REPEATER,
                'default' => [
					[
						'section_testimonial' => [
                            'name'              => 'John Doe',
                            'job'               => 'Designer',
                            'content'           => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
                            'url'               => UtilsElementor::get_placeholder_image_src(),   
                        ],
					],
					[
						'section_testimonial' => [
							'name'              => 'John Doe',
                            'job'               => 'Designer',
                            'content'           => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
                            'url'               => UtilsElementor::get_placeholder_image_src(),
						],
					],
					[
						'section_testimonial' => [
							'name'              => 'John Doe',
                            'job'               => 'Designer',
                            'content'           => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
                            'url'               => UtilsElementor::get_placeholder_image_src(),   
						],
					],
				],
                'section' => 'section_testimonial',
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => \BitElementorWpHelper::__( 'Name', 'elementor' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'John Doe',
                    ],
                    [
                        'name' => 'job',
                        'label' => \BitElementorWpHelper::__( 'Job', 'elementor' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Designer',
                    ],
                    [
                        'name' => 'image',
                        'label' => \BitElementorWpHelper::__( 'Choose Image', 'elementor' ),
                        'type' => Controls_Manager::MEDIA,
                        'placeholder' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
                        'label_block' => true,
                        'default' => [
                            'url' => UtilsElementor::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'label' => \BitElementorWpHelper::__( 'Content', 'elementor' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'rows' => '10',
                        'name' => 'content',
                        'default' => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
                    ]
                ],
                'title_field' => 'name',
            ]
        );
        $this->add_control(
            'section_slider_testimonial',
            [
                'label' => \BitElementorWpHelper::__( 'Slider settings', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );
        $this->add_control(
            'testimonial_alignment',
            [
                'label' => \BitElementorWpHelper::__( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'section' => 'section_slider_testimonial',
                'options' => [
                    'left'    => [
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
                ],
            ]
        );
        $this->add_control(
            'xldevice',
            [
                'label' => \BitElementorWpHelper::__( 'Number item to show on device > 1200', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'label_block' => true,
				'section' => 'section_slider_testimonial',
				'default' => [
					'size' => 1,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 4,
						'step' => 1,
					],
				],
                'separator' => 'none',
            ]
        );
		$this->add_control(
            'lgdevice',
            [
                'label' => \BitElementorWpHelper::__( 'Number item to show on device < 1200', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'label_block' => true,
				'section' => 'section_slider_testimonial',
				'default' => [
					'size' => 1,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 4,
						'step' => 1,
					],
				],
                'separator' => 'none',
            ]
		);
		$this->add_control(
            'mddevice',
            [
                'label' => \BitElementorWpHelper::__( 'Number item to show on device < 992', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'label_block' => true,
				'section' => 'section_slider_testimonial',
				'default' => [
					'size' => 1,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 3,
						'step' => 1,
					],
				],
                'separator' => 'none',
            ]
		);
		$this->add_control(
            'smdevice',
            [
                'label' => \BitElementorWpHelper::__( 'Number item to show on device < 768', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'label_block' => true,
				'section' => 'section_slider_testimonial',
				'default' => [
					'size' => 1,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 3,
						'step' => 1,
					],
				],
                'separator' => 'none',
            ]
		);
		$this->add_control(
            'xsdevice',
            [
                'label' => \BitElementorWpHelper::__( 'Number item to show on device < 544', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'label_block' => true,
				'section' => 'section_slider_testimonial',
				'default' => [
					'size' => 1,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 2,
						'step' => 1,
					],
				],
                'separator' => 'none',
            ]
        );
        $this->add_control(
            'navigation',
            [
                'label' => \BitElementorWpHelper::__( 'Navigation', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'true',
                'section' => 'section_slider_testimonial',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ]
        );
        $this->add_control(
            'dots',
            [
                'label' => \BitElementorWpHelper::__( 'Dots', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'false',
                'section' => 'section_slider_testimonial',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => \BitElementorWpHelper::__( 'Autoplay', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'true',
                'section' => 'section_slider_testimonial',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ]
        );
        $this->add_control(
            'autoplay_speed',
            [
                'label' => \BitElementorWpHelper::__( 'Autoplay Speed', 'elementor' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '2000',
                'min' => '1000',
                'max' => '5000',
                'step'    => '1000',
                'section' => 'section_slider_testimonial',
                'condition' => [
                    'autoplay' => 'true',
                ],
            ]
        );
        $this->add_control(
            'pause_on_hover',
            [
                'label' => \BitElementorWpHelper::__( 'Pause on Hover', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'true',
                'section' => 'section_slider_testimonial',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ]
        );
        $this->add_control(
            'infinite',
            [
                'label' => \BitElementorWpHelper::__( 'Infinite Loop', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'false',
                'section' => 'section_slider_testimonial',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ]
        );

        $this->add_control(
            'testimonial_image_position',
            [
                'label' => \BitElementorWpHelper::__( 'Image Position', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'aside',
                'section' => 'section_slider_testimonial',
                'options' => [
                    'aside' => \BitElementorWpHelper::__( 'Style 1', 'elementor' ),
                    'top' => \BitElementorWpHelper::__( 'Style 2', 'elementor' ),
                ],
                'separator' => 'before',
            ]
        );

        // Box
        $this->add_control(
            'section_style_testimonial_box',
            [
                'label' => \BitElementorWpHelper::__( 'Testimonial box', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_box',
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_4,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'testimonial_border',
                'label' => \BitElementorWpHelper::__( 'Image Border', 'elementor' ),
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_box',
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper',
            ]
        );

        $this->add_control(
            'testimonial_border_radius',
            [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_padding',
            [
                'label' => \BitElementorWpHelper::__( 'Box padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Box Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'testimonial_box_shadow',
                'section' => 'section_style_testimonial_box',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper',
            ]
        );



        // Content
        $this->add_control(
            'section_style_testimonial_content',
            [
                'label' => \BitElementorWpHelper::__( 'Content', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'content_content_color',
            [
                'label' => \BitElementorWpHelper::__( 'Content Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_content',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_content',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'section' => 'section_style_testimonial_content',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'section' => 'section_style_testimonial_content',
                'selector' => '{{WRAPPER}} .elementor-testimonial-content',
            ]
        );

        // Image
        $this->add_control(
            'section_style_testimonial_image',
            [
                'label' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => \BitElementorWpHelper::__( 'Image Size', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'section' => 'section_style_testimonial_image',
                'tab' => self::TAB_STYLE,
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_image',
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_image',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_image',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Name
        $this->add_control(
            'section_style_testimonial_name',
            [
                'label' => \BitElementorWpHelper::__( 'Name', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_text_color',
            [
                'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_name',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => \BitElementorWpHelper::__( 'Typography', 'elementor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_name',
                'selector' => '{{WRAPPER}} .elementor-testimonial-name',
            ]
        );

        // Job
        $this->add_control(
            'section_style_testimonial_job',
            [
                'label' => \BitElementorWpHelper::__( 'Job', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'job_text_color',
            [
                'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_job',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-job' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'job_typography',
                'label' => \BitElementorWpHelper::__( 'Typography', 'elementor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_testimonial_job',
                'selector' => '{{WRAPPER}} .elementor-testimonial-job',
            ]
        );

        $this->add_control(
			'section_style_navigation',
			[
				'label' => \BitElementorWpHelper::__( 'Navigation', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);

		$this->add_control(
			'heading_style_arrows',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);

		$this->add_control(
			'arrows_position',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'inside',
				'section' => 'section_style_navigation',
				'tab' => self::TAB_STYLE,
				'options' => [
					'inside' => \BitElementorWpHelper::__( 'Inside', 'elementor' ),
					'outside' => \BitElementorWpHelper::__( 'Outside', 'elementor' ),
				],
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);

		$this->add_control(
			'arrows_width',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'default' => [
					'size' => 40,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'condition' => [
					'navigation' => [ 'true'],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'arrows_height',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'default' => [
					'size' => 40,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'condition' => [
					'navigation' => [ 'true'],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'arrows_size',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'section' => 'section_style_navigation',
				'tab' => self::TAB_STYLE,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .owl-nav > div i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .owl-nav > div' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);
		$this->add_control(
			'arrows_bg_color',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .owl-nav > div' => 'background: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'arrow_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'selector' => '{{WRAPPER}} .elementor-testimonial-carousel-wrapper .owl-nav > div',
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
        );
        
        $this->add_control(
			'nav_border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'condition' => [
					'navigation' => [ 'true' ],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper  .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

		$this->add_control(
			'heading_style_arrows_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Hover', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);
		$this->add_control(
			'arrows_color_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .owl-nav > div:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);

		$this->add_control(
			'arrows_bg_color_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper  .owl-nav > div:hover' => 'background: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);

		$this->add_control(
			'arrows_border_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Arrows Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_navigation',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .owl-nav > div:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'true' ],
				],
			]
		);

        $this->add_control(
			'section_style_dots',
			[
				'label' => \BitElementorWpHelper::__( 'Dots', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
				'condition' => [
					'dots' => [ 'true' ],
				],
			]
		);

		$this->add_control(
			'dots_position',
			[
				'label' => \BitElementorWpHelper::__( 'Dots Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'outside',
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'options' => [
					'outside' => \BitElementorWpHelper::__( 'Outside', 'elementor' ),
					'inside' => \BitElementorWpHelper::__( 'Inside', 'elementor' ),
				],
				'condition' => [
					'dots' => [ 'true'],
				],
			]
		);

		$this->add_control(
			'dots_width',
			[
				'label' => \BitElementorWpHelper::__( 'Dots Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'dots_height',
			[
				'label' => \BitElementorWpHelper::__( 'Dots Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => \BitElementorWpHelper::__( 'Dots Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}};',
				],
				'condition' => [
					'dots' => [ 'true'],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'dots_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'condition' => [
					'dots' => [ 'true' ],
				],
				'selector' => '{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-dots .owl-dot span',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'condition' => [
					'dots' => [ 'true' ],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_style_dots_active',
			[
				'label' => \BitElementorWpHelper::__( 'Dots Active', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'separator' => 'before',
				'condition' => [
					'dots' => [ 'true' ],
				],
			]
		);

		$this->add_control(
			'dots_color_active',
			[
				'label' => \BitElementorWpHelper::__( 'Dots Active Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}};',
				],
				'condition' => [
					'dots' => [ 'true'],
				],
			]
		);

        $this->add_control(
			'dots_border_active',
			[
				'label' => \BitElementorWpHelper::__( 'Dots Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_dots',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-carousel-wrapper .elementor-testimonial-carousel .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'dots' => [ 'true' ],
				],
			]
        );
    }

    protected function render( $instance = [] ) {
        if ( empty( $instance['testimonials_list'] ) )
            return;

        $owl_options = [
            'nav' => ( 'true' === $instance['navigation'] ),
            'dots' => ( 'true' === $instance['dots'] ),
            'autoplay' => ( 'true' === $instance['autoplay'] ),
            'pauseOnHover' => ( 'true' === $instance['pause_on_hover'] ),
            'autoplayTimeout' => \BitElementorWpHelper::absint( $instance['autoplay_speed'] ),
            'loop' => ( 'true' === $instance['infinite'] ),
            'autoplayHoverPause' => ( 'true' === $instance['pause_on_hover'] ),
            'responsive' => [
                '0' => [
                    'items' => $instance['xsdevice']['size']
                ],
                '544' => [
                    'items' => $instance['smdevice']['size']
                ],
                '768' => [
                    'items' => $instance['mddevice']['size']
                ],
                '992' => [
                    'items' => $instance['lgdevice']['size']
                ],
                '1200' => [
                    'items' => $instance['xldevice']['size']
                ],
            ]
        ];

        $carousel_classes = [ 'elementor-testimonial-carousel owl-carousel' ];

        if ( 'true' === $instance['navigation'] ) {
			$carousel_classes[] = 'owl-arrows-' . $instance['arrows_position'];
		}

		if ( 'true' === $instance['dots'] ) {
			$carousel_classes[] = 'owl-dots-' . $instance['dots_position'];
		}

        $testimonial_alignment = $instance['testimonial_alignment'] ? ' elementor-testimonial-text-align-' . $instance['testimonial_alignment'] : '';
        $testimonial_image_position = $instance['testimonial_image_position'] ? ' elementor-testimonial-image-position-' . $instance['testimonial_image_position'] : '';
        ?>

        <div class="elementor-testimonial-carousel-wrapper elementor-owl-slider">
            <div class="<?php echo implode( ' ', $carousel_classes ); ?>" data-owl-elementor='<?php echo \BitElementorWpHelper::jsonEncode( $owl_options ); ?>'>
                <?php foreach ( $instance['testimonials_list']as $item ) : ?>
                    <?php
                        $has_image = false;
                        if ( '' !== $item['image']['url'] ) {
                            $image_url = $item['image']['url'];
                            $has_image = ' elementor-has-image';
                        }
                        ?>
                        <div class="elementor-testimonial-wrapper<?php echo $testimonial_alignment; ?>">
                            <?php if ( isset( $image_url ) && $instance['testimonial_image_position'] == 'top') : ?>
                            <div class="elementor-testimonial-meta<?php if ( $has_image ) echo $has_image; ?><?php echo $testimonial_image_position; ?>">
                                <div class="elementor-testimonial-image">
                                    <img src="<?php echo \BitElementorWpHelper::esc_attr( $image_url ); ?>" alt="<?php echo \BitElementorWpHelper::esc_attr( Control_Media::get_image_alt( $item['image'] ) ); ?>" />
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if ( ! empty( $item['content'] ) ) : ?>
                                <div class="elementor-testimonial-content">
                                    <?php echo $item['content']; ?>
                                </div>
                            <?php endif; ?>

                            <div class="elementor-testimonial-meta<?php if ( $has_image ) echo $has_image; ?><?php echo $testimonial_image_position; ?>">
                                <div class="elementor-testimonial-meta-inner">
                                    <?php if ( isset( $image_url ) && $instance['testimonial_image_position'] == 'aside' ) : ?>
                                        <div class="elementor-testimonial-image">
                                            <img src="<?php echo \BitElementorWpHelper::esc_attr( $image_url ); ?>" alt="<?php echo \BitElementorWpHelper::esc_attr( Control_Media::get_image_alt( $item['image'] ) ); ?>" />
                                        </div>
                                    <?php endif; ?>

                                    <div class="elementor-testimonial-details">
                                        <?php if ( ! empty( $item['name'] ) ) : ?>
                                            <div class="elementor-testimonial-name">
                                                <?php echo $item['name']; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $item['job'] ) ) : ?>
                                            <div class="elementor-testimonial-job">
                                                <?php echo $item['job']; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                endforeach; ?>
            </div>
        </div>
    <?php }

    protected function content_template() {}
}
