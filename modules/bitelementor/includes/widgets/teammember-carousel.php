<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Teammember_Carousel extends Widget_Base {

    public function get_id() {
        return 'teammember-carousel';
    }

    public function get_title() {
        return \BitElementorWpHelper::__( 'Team Member Slider', 'elementor' );
    }

    public function get_icon() {
        return 'person';
    }

    protected function _register_controls() {

        $this->add_control(
            'section_teammember_carousel',
            [
                'label' => \BitElementorWpHelper::__( 'Team Members', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'teammembers_carousel_list',
            [
                'label' => '',
                'type' => Controls_Manager::REPEATER,
                'default' => [
					[
						'section_teammember_carousel' => [
                            'name'              => 'Team Member #1',
                            'job'               => 'WordPress Developer',
                            'content'           => 'Enter member description here which describes the position of member in company.',
                            'url'               => UtilsElementor::get_placeholder_image_src(),
                            'facebook_url'      => '#',
                            'twitter_url'       => '#',
                            'google_plus_url'   => '#',
                            'linkedin_url'      => '#',    
                        ],
					],
					[
						'section_teammember_carousel' => [
							'name'              => 'Team Member #1',
                            'job'               => 'WordPress Developer',
                            'content'           => 'Enter member description here which describes the position of member in company.',
                            'url'               => UtilsElementor::get_placeholder_image_src(),
                            'twitter_url'       => '#',
                            'google_plus_url'   => '#',
                            'linkedin_url'      => '#',    
						],
					],
					[
						'section_teammember_carousel' => [
							'name'              => 'Team Member #1',
                            'job'               => 'WordPress Developer',
                            'content'           => 'Enter member description here which describes the position of member in company.',
                            'url'               => UtilsElementor::get_placeholder_image_src(),
                            'facebook_url'      => '#',
                            'twitter_url'       => '#',
                            'google_plus_url'   => '#',
                            'linkedin_url'      => '#',    
						],
					],
				],
                'section' => 'section_teammember_carousel',
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => \BitElementorWpHelper::__( 'Name', 'elementor' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Team Member',
                    ],
                    [
                        'name' => 'job',
                        'label' => \BitElementorWpHelper::__( 'Job Position', 'elementor' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'WordPress Developer',
                    ],
                    [
                        'label' => \BitElementorWpHelper::__( 'Description', 'elementor' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'rows' => '5',
                        'name' => 'content',
                        'default' => 'Enter member description here which describes the position of member in company.',
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
                        'name'        => 'social_links_heading',
                        'label'       => \BitElementorWpHelper::__('Social Links', 'elementor'),
                        'type'        => Controls_Manager::HEADING,
                    ],
                    [
                        'name' => 'facebook_url',
                        'label' => \BitElementorWpHelper::__( 'Facebook', 'elementor' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                        'description' => \BitElementorWpHelper::__( 'Enter Facebook page or profile URL of team member', 'elementor' ),
                    ],
                    [
                        'name' => 'twitter_url',
                        'label' => \BitElementorWpHelper::__( 'Twitter', 'elementor' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                        'description' => \BitElementorWpHelper::__( 'Enter Twitter profile URL of team member', 'elementor' ),
                    ],
                    [
                        'name' => 'google_plus_url',
                        'label' => \BitElementorWpHelper::__( 'Google+', 'elementor' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                        'description' => \BitElementorWpHelper::__( 'Enter Google+ profile URL of team member', 'elementor' ),
                    ],
                    [
                        'name' => 'linkedin_url',
                        'label' => \BitElementorWpHelper::__( 'Linkedin', 'elementor' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                        'description' => \BitElementorWpHelper::__( 'Enter Linkedin profile URL of team member', 'elementor' ),
                    ],
                    [
                        'name' => 'instagram_url',
                        'label' => \BitElementorWpHelper::__( 'Instagram', 'elementor' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                        'description' => \BitElementorWpHelper::__( 'Enter Instagram profile URL of team member', 'elementor' ),
                    ],
                    [
                        'name' => 'youtube_url',
                        'label' => \BitElementorWpHelper::__( 'YouTube', 'elementor' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                        'description' => \BitElementorWpHelper::__( 'Enter YouTube profile URL of team member', 'elementor' ),
                    ],
                    [
                        'name' => 'pinterest_url',
                        'label' => \BitElementorWpHelper::__( 'Pinterest', 'elementor' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                        'description' => \BitElementorWpHelper::__( 'Enter Pinterest profile URL of team member', 'elementor' ),
                    ],
                    [
                        'name' => 'dribbble_url',
                        'label' => \BitElementorWpHelper::__( 'Dribbble', 'elementor' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                        'description' => \BitElementorWpHelper::__( 'Enter Dribbble profile URL of team member', 'elementor' ),
                    ],
                ],
                'title_field' => 'name',
            ]
        );

        $this->add_control(
            'section_slider_team',
            [
                'label' => \BitElementorWpHelper::__( 'Slider settings', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );
        $this->add_control(
            'teammember_alignment',
            [
                'label' => \BitElementorWpHelper::__( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'section' => 'section_slider_team',
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
				'section' => 'section_slider_team',
				'default' => [
					'size' => 3,
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
				'section' => 'section_slider_team',
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
				'section' => 'section_slider_team',
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
				'section' => 'section_slider_team',
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
				'section' => 'section_slider_team',
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
            'navigation',
            [
                'label' => \BitElementorWpHelper::__( 'Navigation', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'true',
                'section' => 'section_slider_team',
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
                'section' => 'section_slider_team',
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
                'section' => 'section_slider_team',
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
                'section' => 'section_slider_team',
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
                'section' => 'section_slider_team',
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
                'section' => 'section_slider_team',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ]
        );

        // Box
        $this->add_control(
            'section_style_teammember_box',
            [
                'label' => \BitElementorWpHelper::__( 'Team Member box', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'teammembers_style',
            [
                'label' => \BitElementorWpHelper::__( 'Style Preset', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_box',
                'default' => 'style-1',
                'options' => [
                    'style-1'   => \BitElementorWpHelper::__( 'Style 1', 'elementor' ),
                    'style-2'   => \BitElementorWpHelper::__( 'Style 2', 'elementor' ),
                    'style-3'   => \BitElementorWpHelper::__( 'Style 3', 'elementor' ),
                    'style-4'   => \BitElementorWpHelper::__( 'Style 4', 'elementor' ),
                    'style-5'   => \BitElementorWpHelper::__( 'Style 5', 'elementor' ),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'style5_box_shadow',
                'section' => 'section_style_teammember_box',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-teammember-wrapper .style-5:hover .team-item-inner .teammember-details',
                'condition' => [
					'teammembers_style' => [ 'style-5' ],
				],
            ]
        );

        $this->add_control(
            'overlay_bg_color',
            [
                'label' => \BitElementorWpHelper::__( 'Overlay Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_box',
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_4,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-wrapper .style-3 .teammember-details:before, .elementor-teammember-carousel-wrapper .elementor-teammember-wrapper .style-2 .teammember-details, .elementor-teammember-carousel-wrapper .elementor-teammember-wrapper .style-4 .team-item-inner .teammember-image:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_box',
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_4,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-teammember-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'teammember_border',
                'label' => \BitElementorWpHelper::__( 'Image Border', 'elementor' ),
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_box',
                'selector' => '{{WRAPPER}} .elementor-teammember-wrapper',
            ]
        );

        $this->add_control(
            'teammember_border_radius',
            [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-teammember-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'teammember_padding',
            [
                'label' => \BitElementorWpHelper::__( 'Box padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-teammember-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'teammember_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Box Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-teammember-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'teammember_box_shadow',
                'section' => 'section_style_teammember_box',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-teammember-wrapper',
            ]
        );



        // Content
        $this->add_control(
            'section_style_teammember_content',
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
                'section' => 'section_style_teammember_content',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .teammember-content' => 'color: {{VALUE}};',
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
                'section' => 'section_style_teammember_content',
                'selector' => '{{WRAPPER}} .teammember-content',
            ]
        );

        // Image
        $this->add_control(
            'section_style_teammember_image',
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
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'section' => 'section_style_teammember_image',
                'tab' => self::TAB_STYLE,
                'selectors' => [
                    '{{WRAPPER}} .elementor-teammember-wrapper .teammember-image img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_image',
                'selector' => '{{WRAPPER}} .elementor-teammember-wrapper .teammember-image img',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_teammember_image',
                'selectors' => [
                    '{{WRAPPER}} .elementor-teammember-wrapper .teammember-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //Social Icons
        $this->add_control(
            'section_social_style',
            [
                'label' => \BitElementorWpHelper::__( 'Social Icons', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'tab' => self::TAB_STYLE,
                'section' => 'section_social_style',
                'default' => 'default',
                'options' => [
                    'default' => \BitElementorWpHelper::__( 'Official Color', 'elementor' ),
                    'custom' => \BitElementorWpHelper::__( 'Custom', 'elementor' ),
                ],
            ]
        );

        $this->add_control(
            'icon_primary_color',
            [
                'label' => \BitElementorWpHelper::__( 'Background', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_social_style',
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .social-wrap .social-icon a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_secondary_color',
            [
                'label' => \BitElementorWpHelper::__( 'Icon', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_social_style',
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .social-wrap .social-icon a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Size', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_social_style',
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .social-wrap .social-icon a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_width_height',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Width & Height', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
				'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
					],
				],
                'section' => 'section_social_style',
                'selectors' => [
                    '{{WRAPPER}} .social-wrap .social-icon a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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
                'section' => 'section_social_style',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .social-wrap .social-icon:not(:last-child) a' => $icon_spacing,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_image_border',
                'tab' => self::TAB_STYLE,
                'section' => 'section_social_style',
                'selector' => '{{WRAPPER}} .social-wrap .social-icon a',
            ]
        );

        $this->add_control(
            'ss_border_radius',
            [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_social_style',
                'selectors' => [
                    '{{WRAPPER}} .social-wrap .social-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Name
        $this->add_control(
            'section_style_teammember_name',
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
                'section' => 'section_style_teammember_name',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .teammember-name' => 'color: {{VALUE}};',
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
                'section' => 'section_style_teammember_name',
                'selector' => '{{WRAPPER}} .teammember-name',
            ]
        );

        // Job
        $this->add_control(
            'section_style_teammember_job',
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
                'section' => 'section_style_teammember_job',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .teammember-job' => 'color: {{VALUE}};',
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
                'section' => 'section_style_teammember_job',
                'selector' => '{{WRAPPER}} .teammember-job',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .owl-nav > div i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .owl-nav > div' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .owl-nav > div' => 'background: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elementor-teammember-carousel-wrapper .owl-nav > div',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper  .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .owl-nav > div:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper  .owl-nav > div:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .owl-nav > div:hover' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-dots .owl-dot span',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-teammember-carousel-wrapper .elementor-teammember-carousel .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'dots' => [ 'true' ],
				],
			]
        );
    }

    public function member_social_links( $item ) {

        $facebook_url       = $item['facebook_url']['url'];
        $twitter_url        = $item['twitter_url']['url'];
        $google_plus_url    = $item['google_plus_url']['url'];
        $linkedin_url       = $item['linkedin_url']['url'];
        $instagram_url      = $item['instagram_url']['url'];
        $youtube_url        = $item['youtube_url']['url'];
        $pinterest_url      = $item['pinterest_url']['url'];
        $dribbble_url       = $item['dribbble_url']['url'];
        ?>
        <ul class="social-wrap d-flex align-items-center mb-0">
            <?php
            if (! empty( $facebook_url )) {
                echo '<li class="social-icon d-inline-flex"><a href="'.$facebook_url.'" class="elementor-social-icon elementor-social-icon-facebook" ><i class="fa fa-facebook"></i></a></li>';
            }
            if (! empty( $twitter_url )) {
                echo '<li class="social-icon d-inline-flex"><a href="'.$twitter_url.'" class="elementor-social-icon elementor-social-icon-twitter"><i class="fa fa-twitter"></i></a></li>';
            }
            if (! empty( $google_plus_url )) {
                echo '<li class="social-icon d-inline-flex"><a href="'.$google_plus_url.'" class="elementor-social-icon elementor-social-icon-google-plus"><i class="fa fa-google-plus"></i></a></li>';
            }
            if (! empty( $linkedin_url )) {
                echo '<li class="social-icon d-inline-flex"><a href="'.$linkedin_url.'" class="elementor-social-icon elementor-social-icon-linkedin"><i class="fa fa-linkedin"></i></a></li>';
            }
            if (! empty( $instagram_url )) {
                echo '<li class="social-icon d-inline-flex"><a href="'.$instagram_url.'" class="elementor-social-icon elementor-social-icon-instagram"><i class="fa fa-instagram"></i></a></li>';
            }
            if ( ! empty( $youtube_url )) {
                echo '<li class="social-icon d-inline-flex"><a href="'.$youtube_url.'" class="elementor-social-icon elementor-social-icon-youtube"><i class="fa fa-youtube"></i></a></li>';
            }
            if ( ! empty( $pinterest_url )) {
                echo '<li class="social-icon d-inline-flex"><a href="'.$pinterest_url.'" class="elementor-social-icon elementor-social-icon-pinterest"><i class="fa fa-pinterest"></i></a></li>';
            }
            if ( ! empty( $dribbble_url )) {
                echo '<li class="social-icon d-inline-flex"><a href="'.$dribbble_url.'" class="elementor-social-icon elementor-social-icon-dribbble"><i class="fa fa-dribbble"></i></a></li>';
            }
            ?>
        </ul>
        <?php
    }

    protected function render( $instance = [] ) {
        if ( empty( $instance['teammembers_carousel_list'] ) )
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

        $carousel_classes = [ 'elementor-teammember-carousel  owl-carousel' ];

        if ( 'true' === $instance['navigation'] ) {
			$carousel_classes[] = 'owl-arrows-' . $instance['arrows_position'];
		}

		if ( 'true' === $instance['dots'] ) {
			$carousel_classes[] = 'owl-dots-' . $instance['dots_position'];
		}

        $teammember_alignment = $instance['teammember_alignment'] ? ' elementor-teammember-text-align-' . $instance['teammember_alignment'] : '';
        ?>

        <div class="elementor-teammember-carousel-wrapper elementor-owl-slider row">
            <div class="<?php echo implode( ' ', $carousel_classes ); ?>" data-owl-elementor='<?php echo \BitElementorWpHelper::jsonEncode( $owl_options ); ?>'>
                <?php foreach ( $instance['teammembers_carousel_list']as $item ) : ?>
                    <?php
                    $has_image = false;
                    if ( '' !== $item['image']['url'] ) {
                        $image_url = $item['image']['url'];
                        $has_image = ' elementor-has-image';
                    }
                    ?>
                    <div class="elementor-teammember-wrapper <?php echo $teammember_alignment; ?> col-12">
                        <div class="elementor-teammember-meta<?php if ( $has_image ) echo $has_image; ?> <?php echo $instance['teammembers_style']; ?>">
                            <div class="team-item-inner">
                                <?php if ( isset( $image_url ) ) : ?>
                                    <div class="teammember-image">
                                        <img src="<?php echo \BitElementorWpHelper::esc_attr( $image_url ); ?>" alt="<?php echo \BitElementorWpHelper::esc_attr( Control_Media::get_image_alt( $item['image'] ) ); ?>" />
                                        <?php if( 'style-4' === $instance['teammembers_style'] ) { ?>
                                            <?php  $this->member_social_links( $item ); ?>
                                        <?php } ?>
                                        <?php if( 'style-5' === $instance['teammembers_style'] ) { ?>
                                            <?php if ( ! empty( $item['name'] ) ) : ?>
                                                <div class="teammember-name">
                                                    <?php echo $item['name']; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>
                                <div class="teammember-details">
                                    <?php if( $instance['teammembers_style'] != 'style-4' ) { ?>
                                    <div class="content-table">
                                        <div class="content-cell">
                                            <?php } ?>
                                            <?php if ( ! empty( $item['name'] ) ) : ?>
                                                <div class="teammember-name">
                                                    <?php echo $item['name']; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ( ! empty( $item['job'] ) ) : ?>
                                                <div class="teammember-job">
                                                    <?php echo $item['job']; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if( $instance['teammembers_style'] != 'style-4' ) { ?>
                                                <?php $this->member_social_links( $item ); ?>
                                            <?php } ?>

                                            <?php if( $instance['teammembers_style'] != 'style-4' && $instance['teammembers_style'] != 'style-5' ) { ?>
                                                <?php if ( ! empty( $item['content'] ) ) : ?>
                                                    <div class="teammember-content">
                                                        <?php echo $item['content']; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php } ?>
                                            <?php if( $instance['teammembers_style'] != 'style-4' ) { ?>
                                        </div>
                                    </div>
                                    <?php } ?>
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
