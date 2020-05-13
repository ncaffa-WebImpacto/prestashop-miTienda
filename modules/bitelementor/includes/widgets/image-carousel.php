<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Image_Carousel extends Widget_Base {

	public function get_id() {
		return 'image-carousel';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Image Carousel', 'elementor' );
	}

	public function get_icon() {
		return 'slider-push';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_image_carousel',
			[
				'label' => \BitElementorWpHelper::__( 'Images list', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

        $this->add_control(
            'images_list',
            [
                'label' => '',
                'type' => Controls_Manager::REPEATER,
                'default' => [
					[
						'section_image_carousel' => [
							'url' => UtilsElementor::get_placeholder_image_src(),
						],
					],
					[
						'section_image_carousel' => [
							'url' => UtilsElementor::get_placeholder_image_src(),
						],
					],
					[
						'section_image_carousel' => [
							'url' => UtilsElementor::get_placeholder_image_src(),
						],
					],
					[
						'section_image_carousel' => [
							'url' => UtilsElementor::get_placeholder_image_src(),
						],
					],
					[
						'section_image_carousel' => [
							'url' => UtilsElementor::get_placeholder_image_src(),
						],
					],
				],
                'section' => 'section_image_carousel',
                'fields' => [
                    [
                        'name' => 'text',
                        'label' => \BitElementorWpHelper::__( 'Image alt', 'elementor' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'placeholder' => \BitElementorWpHelper::__( 'Image alt', 'elementor' ),
                        'default' => \BitElementorWpHelper::__( 'Image alt', 'elementor' ),
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
                        'name' => 'link',
                        'label' => \BitElementorWpHelper::__( 'Link', 'elementor' ),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                    ],
                ],
                'title_field' => 'text',
            ]
        );

		$this->add_control(
			'view',
			[
				'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'section' => 'section_image_carousel',
			]
		);

		$this->add_control(
			'section_additional_options',
			[
				'label' => \BitElementorWpHelper::__( 'Carousel settings', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
            'xldevice',
            [
                'label' => \BitElementorWpHelper::__( 'Number item to show on device > 1200', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'label_block' => true,
				'section' => 'section_additional_options',
				'default' => [
					'size' => 4,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 10,
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
				'section' => 'section_additional_options',
				'default' => [
					'size' => 3,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 8,
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
				'section' => 'section_additional_options',
				'default' => [
					'size' => 2,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 6,
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
				'section' => 'section_additional_options',
				'default' => [
					'size' => 1,
				],
                'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 5,
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
				'section' => 'section_additional_options',
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
			'image_stretch',
			[
				'label' => \BitElementorWpHelper::__( 'Image Stretch', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'no',
				'section' => 'section_additional_options',
				'options' => [
					'no' => \BitElementorWpHelper::__( 'No', 'elementor' ),
					'yes' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => \BitElementorWpHelper::__( 'Navigation', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'section' => 'section_additional_options',
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
				'section' => 'section_additional_options',
				'options' => [
					'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
					'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Pause on Hover', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'section' => 'section_additional_options',
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
				'section' => 'section_additional_options',
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
				'default' => 5000,
				'section' => 'section_additional_options',
			]
		);

		$this->add_control(
			'infinite',
			[
				'label' => \BitElementorWpHelper::__( 'Infinite Loop', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'section' => 'section_additional_options',
				'options' => [
					'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
					'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => \BitElementorWpHelper::__( 'Image Hover Effect', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'effect1',
				'section' => 'section_additional_options',
				'options' => [
					'none' => \BitElementorWpHelper::__( 'None', 'elementor' ),
					'effect1' => \BitElementorWpHelper::__( 'Effect 1', 'elementor' ),
					'effect2' => \BitElementorWpHelper::__( 'Effect 2', 'elementor' ),
					'effect3' => \BitElementorWpHelper::__( 'Effect 3', 'elementor' ),
					'effect4' => \BitElementorWpHelper::__( 'Effect 4', 'elementor' ),
					'effect5' => \BitElementorWpHelper::__( 'Effect 5', 'elementor' ),
					'effect6' => \BitElementorWpHelper::__( 'Effect 6', 'elementor' ),
					'effect7' => \BitElementorWpHelper::__( 'Effect 7', 'elementor' ),
					'effect8' => \BitElementorWpHelper::__( 'Effect 8', 'elementor' ),
					'effect9' => \BitElementorWpHelper::__( 'Effect 9', 'elementor' ),
					'effect10' => \BitElementorWpHelper::__( 'Effect 10', 'elementor' ),
				],
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .owl-nav > div i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .owl-nav > div' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper  .owl-nav > div' => 'background: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elementor-image-carousel-wrapper  .owl-nav > div',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper  .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .owl-nav > div:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper  .owl-nav > div:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .owl-nav > div:hover' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-dots .owl-dot span',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'dots' => [ 'true' ],
				],
			]
		);
		
		$this->add_control(
			'section_style_image',
			[
				'label' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_spacing',
			[
				'label' => \BitElementorWpHelper::__( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_image',
				'options' => [
					'' => \BitElementorWpHelper::__( 'Default', 'elementor' ),
					'custom' => \BitElementorWpHelper::__( 'Custom', 'elementor' ),
				],
				'default' => '',
			]
		);

		$this->add_control(
			'image_spacing_custom',
			[
				'label' => \BitElementorWpHelper::__( 'Image Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_image',
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 20,
				],
				'show_label' => false,
				'condition' => [
					'image_spacing' => 'custom',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_image',
				'selector' => '{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel img',
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_image',
				'selectors' => [
					'{{WRAPPER}} .elementor-image-carousel-wrapper .elementor-image-carousel img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	}

	protected function render( $instance = [] ) {
		if ( empty( $instance['images_list'] ) ) {
			return;
		}

		$slides = [];

		foreach ( $instance['images_list'] as $item ) {
			$image_url = $item['image']['url'];

			$image_html = '<img class="owl-slide-image" src="' . \BitElementorWpHelper::esc_attr(\BitElementorWpHelper::getImage($image_url)   ) . '" alt="' . \BitElementorWpHelper::esc_attr( $item['text']  ) . '" />';

            if ( ! empty( $item['link']['url'] ) ) {
                $target = $item['link']['is_external'] ? ' target="_blank" rel="noopener noreferrer"' : '';

                $image_html = sprintf( '<a href="%s"%s>%s</a>', $item['link']['url'], $target, $image_html );
            }

			$slides[] = '<div class="owl-slide-inner '.$instance['effect'].'">' . $image_html . '</div>';
		}

		if ( empty( $slides ) ) {
			return;
		}
		
		$owl_options = [
			'nav' => ( 'true' === $instance['navigation'] ),
			'dots' => ( 'true' === $instance['dots'] ),
			'autoplay' => ( 'true' === $instance['autoplay'] ),
			'autoplayTimeout' => \BitElementorWpHelper::absint( $instance['autoplay_speed'] ),
			'loop' => ( 'true' === $instance['infinite'] ),
			'autoplayHoverPause' => ( 'true' === $instance['pause_on_hover'] ),
			'margin' => \BitElementorWpHelper::absint( $instance['image_spacing_custom']['size'] ),
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

		$carousel_classes = [ 'elementor-image-carousel owl-carousel' ];

		if ( 'true' === $instance['navigation'] ) {
			$carousel_classes[] = 'owl-arrows-' . $instance['arrows_position'];
		}

		if ( 'true' === $instance['dots'] ) {
			$carousel_classes[] = 'owl-dots-' . $instance['dots_position'];
		}

		if ( 'yes' === $instance['image_stretch'] ) {
			$carousel_classes[] = 'owl-image-stretch';
		}
		?>
		<div class="elementor-image-carousel-wrapper elementor-owl-slider">
			<div class="<?php echo implode( ' ', $carousel_classes ); ?>" data-owl-elementor='<?php echo \BitElementorWpHelper::jsonEncode( $owl_options ); ?>'>
				<?php echo implode( '', $slides ); ?>
			</div>
		</div>
	<?php
	}

	protected function content_template() {}

}
