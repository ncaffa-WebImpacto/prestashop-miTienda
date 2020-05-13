<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Teammember extends Widget_Base {

    public function get_id() {
        return 'teammember';
    }

    public function get_title() {
        return \BitElementorWpHelper::__( 'Team Member', 'elementor' );
    }

    public function get_icon() {
        return 'person';
    }

    protected function _register_controls() {
        $this->add_control(
            'section_teammember_image',
            [
                'label' => \BitElementorWpHelper::__( 'Team Member Image', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );
        $this->add_control(
            'teammember_image',
            [
                'label' => \BitElementorWpHelper::__( 'Choose Image', 'elementor' ),
                'type' => Controls_Manager::MEDIA,
                'section' => 'section_teammember_image',
                'placeholder' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
                'label_block' => true,
                'default' => [
                    'url' => UtilsElementor::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'section_teammember_content',
            [
                'label' => \BitElementorWpHelper::__( 'Team Member Content', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );
        $this->add_control(
            'teammember_name',
            [
                'name' => 'name',
                'label' => \BitElementorWpHelper::__( 'Name', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'section' => 'section_teammember_content',
                'default' => 'Team Member',
            ]
        );

        $this->add_control(
            'teammember_job',
            [
                'name' => 'job',
                'label' => \BitElementorWpHelper::__( 'Job Position', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'WordPress Developer',
                'section' => 'section_teammember_content',
            ]
        );

        $this->add_control(
            'teammember_description',
            [
                'label' => \BitElementorWpHelper::__( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => '5',
                'name' => 'content',
                'section' => 'section_teammember_content',
                'default' => 'Enter member description here which describes the position of member in company.',
            ]
        );

        $this->add_control(
            'section_social_icon',
            [
                'label' => \BitElementorWpHelper::__( 'Social Icons', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'social_icon_list',
            [
                'label' => \BitElementorWpHelper::__( 'Social Icons', 'elementor' ),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'social' => 'fa fa-facebook',
                    ],
                    [
                        'social' => 'fa fa-twitter',
                    ],
                    [
                        'social' => 'fa fa-google-plus',
                    ],
                ],
                'section' => 'section_social_icon',
                'fields' => [
                    [
                        'name' => 'social',
                        'label' => \BitElementorWpHelper::__( 'Icon', 'elementor' ),
                        'type' => Controls_Manager::ICON,
                        'label_block' => true,
                        'default' => 'fa fa-wordpress',
                        'include' => [
                            'fa fa-behance',
                            'fa fa-bitbucket',
                            'fa fa-codepen',
                            'fa fa-delicious',
                            'fa fa-digg',
                            'fa fa-dribbble',
                            'fa fa-facebook',
                            'fa fa-flickr',
                            'fa fa-foursquare',
                            'fa fa-github',
                            'fa fa-google-plus',
                            'fa fa-instagram',
                            'fa fa-jsfiddle',
                            'fa fa-linkedin',
                            'fa fa-medium',
                            'fa fa-pinterest',
                            'fa fa-product-hunt',
                            'fa fa-reddit',
                            'fa fa-snapchat',
                            'fa fa-soundcloud',
                            'fa fa-stack-overflow',
                            'fa fa-tumblr',
                            'fa fa-twitter',
                            'fa fa-vimeo',
                            'fa fa-wordpress',
                            'fa fa-youtube',
                        ],
                    ],
                    [
                        'name' => 'link',
                        'label' => \BitElementorWpHelper::__( 'Link', 'elementor' ),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '',
                            'is_external' => 'true',
                        ],
                        'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                    ],
                ],
                'title_field' => 'social',
            ]
        );

        $this->add_control(
            'section_additional_options',
            [
                'label' => \BitElementorWpHelper::__( 'Settings', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'teammember_alignment',
            [
                'label' => \BitElementorWpHelper::__( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'section' => 'section_additional_options',
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

        // Box
        $this->add_control(
            'section_style_teammember_box',
            [
                'label' => \BitElementorWpHelper::__( 'Teammember box', 'elementor' ),
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
            'overlaybg_color',
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
                    '{{WRAPPER}} .elementor-teammember-wrapper .style-3 .teammember-details:before, .elementor-widget-teammember .elementor-teammember-wrapper .style-2 .teammember-details, .elementor-widget-teammember .elementor-teammember-wrapper .style-4 .team-item-inner .teammember-image:before' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-teammember-content' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-teammember-content',
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
                    '{{WRAPPER}} .elementor-teammember-name' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-teammember-name',
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
                    '{{WRAPPER}} .elementor-teammember-job' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-teammember-job',
            ]
        );
    }

    protected function render( $instance = [] ) {
        $teammember_alignment = $instance['teammember_alignment'] ? ' elementor-teammember-text-align-' . $instance['teammember_alignment'] : '';
        ?>

        <div class="elementor-teammember-wrapper <?php echo $teammember_alignment; ?>">
            <div class="elementor-teammember-meta <?php echo $instance['teammembers_style']; ?>">
                <div class="team-item-inner">
                    <?php  $image_url = $instance['teammember_image']['url'];?>
                    <div class="teammember-image">
                        <img src="<?php echo \BitElementorWpHelper::esc_attr( $image_url ); ?>"/>
                        <?php if( 'style-4' === $instance['teammembers_style'] ) { ?>
                            <ul class="social-wrap d-flex align-items-center m-0">
                                <?php foreach ( $instance['social_icon_list'] as $item ) :
                                    $social = str_replace( 'fa fa-', '', $item['social'] );
                                    $target = $item['link']['is_external'] ? ' target="_blank" rel="noopener noreferrer"' : '';
                                    ?>
                                    <li class="social-icon d-inline-flex">
                                        <a class="elementor-social-icon elementor-social-icon-<?php echo \BitElementorWpHelper::esc_attr( $social ); ?>" href="<?php echo \BitElementorWpHelper::esc_attr( $item['link']['url'] ); ?>"<?php echo $target; ?>>
                                            <i class="<?php echo $item['social']; ?>"></i>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php } ?>
                        <?php if( 'style-5' === $instance['teammembers_style'] ) { ?>
                            <div class="teammember-name"><?php echo $instance['teammember_name']?></div>
                        <?php } ?>
                    </div>
                    <div class="teammember-details">
                        <?php if( $instance['teammembers_style'] != 'style-4' ) { ?>
                            <div class="content-table">
                                <div class="content-cell">
                                    <?php } ?>
                                    <div class="teammember-name"><?php echo $instance['teammember_name']?></div>
                                    <div class="teammember-job"><?php echo $instance['teammember_job']?></div>
                                    <?php if( $instance['teammembers_style'] != 'style-4' ) { ?>
                                        <ul class="social-wrap d-flex align-items-center mb-0">
                                            <?php foreach ( $instance['social_icon_list'] as $item ) :
                                                $social = str_replace( 'fa fa-', '', $item['social'] );
                                                $target = $item['link']['is_external'] ? ' target="_blank" rel="noopener noreferrer"' : '';
                                                ?>
                                                <li class="social-icon d-inline-flex">
                                                    <a class="elementor-social-icon elementor-social-icon-<?php echo \BitElementorWpHelper::esc_attr( $social ); ?>" href="<?php echo \BitElementorWpHelper::esc_attr( $item['link']['url'] ); ?>"<?php echo $target; ?>>
                                                        <i class="<?php echo $item['social']; ?>"></i>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php } ?>
                                    <?php if( $instance['teammembers_style'] != 'style-4' && $instance['teammembers_style'] != 'style-5' ) { ?>
                                        <div class="teammember-content"><?php echo $instance['teammember_description']?></div>
                                    <?php } ?>
                                    <?php if( $instance['teammembers_style'] != 'style-4' ) { ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    protected function content_template() {}
}
