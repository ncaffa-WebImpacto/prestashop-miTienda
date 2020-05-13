<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Instagram extends Widget_Base {

    protected $_current_instance = [];

    public function get_id() {
        return 'instagram';
    }

    public function get_title() {
        return \BitElementorWpHelper::__( 'Instagram', 'elementor' );
    }

    public function get_icon() {
        return 'instagram';
    }

    protected function _register_controls() {
        $this->add_control(
            'section_instagram',
            [
                'label' => \BitElementorWpHelper::__( 'Instagram feed', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'instagram_description',
            [
                'raw' => \BitElementorWpHelper::__( 'If you do not know your access token you can get it there: ', 'elementor' ).'<a target="_blank" href="https://themedelights.com/instagram-access-token/">'.\BitElementorWpHelper::__( 'token generator ', 'elementor' ).'</a>',
                'type' => Controls_Manager::RAW_HTML,
                'section' => 'section_instagram',
                'classes' => 'elementor-control-descriptor',
            ]
        );

        $this->add_control(
            'instagram_token',
            [
                'label' => \BitElementorWpHelper::__( 'Access Token', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'section' => 'section_instagram',
                'placeholder' => \BitElementorWpHelper::__( 'Enter your token', 'elementor' ),
                'default' => '',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'instagram_limit',
            [
                'label' => \BitElementorWpHelper::__( 'Limit', 'elementor' ),
                'type' => Controls_Manager::NUMBER,
                'description' => \BitElementorWpHelper::__( 'An integer that indicates the amount of photos to be feed.', 'elementor' ),
                'min' => 1,
                'default' => 10,
                'section' => 'section_instagram',
            ]
        );

        $this->add_control(
            'instagram_linked',
            [
                'label' => \BitElementorWpHelper::__( 'Linked', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_instagram',
                'description' => \BitElementorWpHelper::__( 'Value that indicates whether or not the images should be linked to their page on Instagram', 'elementor' ),
                'options' => [
                    'no' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                    'yes' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                ],
                'default' => '1',
            ]
        );

        $this->add_control(
            'instagram_info',
            [
                'label' => \BitElementorWpHelper::__( 'Hover info', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_instagram',
                'description' => \BitElementorWpHelper::__( 'Show info like comments, likes and date on hover', 'elementor' ),
                'options' => [
                    'none' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                    '' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                ],
                'default' => 'block',
                'selectors' => [
                    '{{WRAPPER}} .il-item-inner:hover .il-photo__metainner' => 'display: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'section_instagram_options',
            [
                'label' => \BitElementorWpHelper::__( 'View options', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
			'items_per_column',
			[
				'label' => \BitElementorWpHelper::__( 'No. of Rows to Displays per Column', 'elementor' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => '1',
                'min' => '1',
                'max' => '3',
                'step'    => '1',
                'section' => 'section_instagram_options',
			]
        );  
        $this->add_control(
            'navigation',
            [
                'label' => \BitElementorWpHelper::__('Navigation', 'elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'true',
                'section' => 'section_instagram_options',
                'options' => [
                    'true' => \BitElementorWpHelper::__('Yes', 'elementor'),
                    'false' => \BitElementorWpHelper::__('No', 'elementor'),
                ],
            ]
        );
        $this->add_control(
            'dots',
            [
                'label' => \BitElementorWpHelper::__('Dots', 'elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'false',
                'section' => 'section_instagram_options',
                'options' => [
                    'true' => \BitElementorWpHelper::__('Yes', 'elementor'),
                    'false' => \BitElementorWpHelper::__('No', 'elementor'),
                ],
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => \BitElementorWpHelper::__('Autoplay', 'elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'true',
                'section' => 'section_instagram_options',
                'options' => [
                    'true' => \BitElementorWpHelper::__('Yes', 'elementor'),
                    'false' => \BitElementorWpHelper::__('No', 'elementor'),
                ],
            ]
        );
        $this->add_control(
            'autoplay_speed',
            [
                'label' => \BitElementorWpHelper::__('Autoplay Speed', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => '2000',
                'min' => '1000',
                'max' => '5000',
                'step' => '1000',
                'section' => 'section_instagram_options',
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
                'section' => 'section_instagram_options',
                'default' => 'true',
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
                'section' => 'section_instagram_options',
                'default' => 'false',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ]
        );
        $this->add_control(
            'xldevice',
            [
                'label' => \BitElementorWpHelper::__( 'Number item to show on device > 1200', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'label_block' => true,
				'section' => 'section_instagram_options',
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
				'section' => 'section_instagram_options',
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
				'section' => 'section_instagram_options',
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
				'section' => 'section_instagram_options',
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
				'section' => 'section_instagram_options',
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

        //STYLE TAB
        $this->add_control(
            'section_style',
            [
                'label' => \BitElementorWpHelper::__( 'Instagram photo', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'instagram_photo_height',
            [
                'label' => \BitElementorWpHelper::__( 'Max height', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style',
                'description' => \BitElementorWpHelper::__( 'Helpful when you use various aspect ratio for images', 'elementor' ),
                'default' => '100%',
                'selectors' => [
                    '{{WRAPPER}} .il-item a' => 'max-height: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'instagram_text_color',
            [
                'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .il-photo__meta' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'instagram_overlay_color',
            [
                'label' => \BitElementorWpHelper::__( 'Overlay background', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .il-photo__meta' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'instagram_padding',
            [
                'label' => \BitElementorWpHelper::__( 'Photo padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style',
                'selectors' => [
                    '{{WRAPPER}} .il-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-instagram' => 'margin-left: -{{LEFT}}{{UNIT}}; margin-right:-{{RIGHT}}{{UNIT}} ;',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .owl-nav > div i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .owl-nav > div' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper  .owl-nav > div' => 'background: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elementor-instagram-carousel-wrapper  .owl-nav > div',
				'condition' => [
					'navigation' => [ 'true' ],
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .owl-nav > div:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper  .owl-nav > div:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .owl-nav > div:hover' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-dots .owl-dot span',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-instagram-carousel-wrapper .elementor-instagram-carousel .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'dots' => [ 'true' ],
				],
			]
		);
    }

    protected function render( $instance = [] ) {

        $owl_options = [
            'nav' => ( 'true' === $instance['navigation'] ),
            'dots' => ( 'true' === $instance['dots'] ),
            'autoplay' => ( 'true' === $instance['autoplay'] ),
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

        $carousel_classes = [ 'elementor-instagram-carousel owl-carousel' ];

        if ( 'true' === $instance['navigation'] ) {
            $carousel_classes[] = 'owl-arrows-' . $instance['arrows_position'];
        }

        if ( 'true' === $instance['dots'] ) {
            $carousel_classes[] = 'owl-dots-' . $instance['dots_position'];
        }

        $instagram_options = [
            'token' => $instance['instagram_token'],
            'limit' => $instance['instagram_limit'],
            'linked' => ( 'yes' === $instance['instagram_linked'] ),
        ];

        ?>
            <div class="elementor-instagram-carousel-wrapper elementor-owl-slider" >
                <div class="elementor-instagram <?php echo implode( ' ', $carousel_classes ); ?>" data-options='<?php echo \BitElementorWpHelper::jsonEncode( $instagram_options  ); ?>' data-owl-elementor='<?php echo \BitElementorWpHelper::jsonEncode( $owl_options ); ?>'></div>
            </div>
        <?php
    }

    protected function content_template() {
    }
}
