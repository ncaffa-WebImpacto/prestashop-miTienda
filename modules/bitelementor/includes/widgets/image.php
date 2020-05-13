<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Image extends Widget_Base {

    public function get_id() {
        return 'image';
    }

    public function get_title() {
        return \BitElementorWpHelper::__( 'Image', 'elementor' );
    }

    public function get_icon() {
        return 'insert-image';
    }

    protected function _register_controls() {
        $this->add_control(
            'section_image',
            [
                'label' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => \BitElementorWpHelper::__( 'Choose Image', 'elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => UtilsElementor::get_placeholder_image_src(),
                ],
                'section' => 'section_image',
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
                ],
                'default' => 'center',
                'section' => 'section_image',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'caption',
            [
                'label' => \BitElementorWpHelper::__( 'Alt text', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => \BitElementorWpHelper::__( 'Enter your Alt about the image', 'elementor' ),
                'title' => \BitElementorWpHelper::__( 'Input image Alt here', 'elementor' ),
                'section' => 'section_image',
            ]
        );

        $this->add_control(
            'link_to',
            [
                'label' => \BitElementorWpHelper::__( 'Link to', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'section' => 'section_image',
                'options' => [
                    'none' => \BitElementorWpHelper::__( 'None', 'elementor' ),
                    'file' => \BitElementorWpHelper::__( 'Media File', 'elementor' ),
                    'custom' => \BitElementorWpHelper::__( 'Custom URL', 'elementor' ),
                ],
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => \BitElementorWpHelper::__( 'Link to', 'elementor' ),
                'type' => Controls_Manager::URL,
                'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
                'section' => 'section_image',
                'condition' => [
                    'link_to' => 'custom',
                ],
                'show_label' => false,
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'traditional',
                'section' => 'section_image',
            ]
        );

        $this->add_control(
            'section_style_image',
            [
                'type'  => Controls_Manager::SECTION,
                'label' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
                'tab'   => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'space',
            [
                'label' => \BitElementorWpHelper::__( 'Size (%)', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_image',
                'default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'opacity',
            [
                'label' => \BitElementorWpHelper::__( 'Opacity (%)', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_image',
                'default' => [
                    'size' => 1,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
			'effect',
			[
				'label' => \BitElementorWpHelper::__( 'Image Hover Effect', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'effect1',
				'tab' => self::TAB_STYLE,
                'section' => 'section_style_image',
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
            'hover_animation',
            [
                'label' => \BitElementorWpHelper::__( 'Hover Animation', 'elementor' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_image',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => \BitElementorWpHelper::__( 'Image Border', 'elementor' ),
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_image',
                'selector' => '{{WRAPPER}} .elementor-image img',
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
                    '{{WRAPPER}} .elementor-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'section' => 'section_style_image',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-image img',
            ]
        );

        $this->add_control(
            'section_style_caption',
            [
                'type'  => Controls_Manager::SECTION,
                'label' => \BitElementorWpHelper::__( 'Caption', 'elementor' ),
                'tab'   => self::TAB_STYLE,
            ]
        );

        $this->add_control(
            'caption_align',
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
                    '{{WRAPPER}} .widget-image-caption' => 'text-align: {{VALUE}};',
                ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_caption',
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .widget-image-caption' => 'color: {{VALUE}};',
                ],
                'section' => 'section_style_caption',
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'caption_typography',
                'selector' => '{{WRAPPER}} .widget-image-caption',
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_caption',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
    }

    protected function render( $instance = [] ) {
        if ( empty( $instance['image']['url'] ) ) {
            return;
        }
        $has_caption = ! empty( $instance['caption'] );

        $image_html = '<div class="elementor-image '.$instance['effect'].'' . ( ! empty( $instance['shape'] ) ? ' elementor-image-shape-' . $instance['shape'] : '' ) . '">';


        $image_class_html = ! empty( $instance['hover_animation'] ) ? ' class="elementor-animation-' . $instance['hover_animation'] . '"' : '';

        $image_html .= sprintf( '<img src="%s" alt="%s"%s />', \BitElementorWpHelper::esc_attr( \BitElementorWpHelper::getImage($instance['image']['url'])  ), \BitElementorWpHelper::esc_attr( $instance['caption'] ) , $image_class_html );

        $link = $this->get_link_url( $instance );
        if ( $link ) {
            $target = '';
            if ( ! empty( $link['is_external'] ) ) {
                $target = ' target="_blank" rel="noopener noreferrer"';
            }
            $image_html = sprintf( '<a href="%s"%s>%s</a>', $link['url'], $target, $image_html );
        }

        $image_html .= '</div>';

        echo $image_html;
    }



    protected function content_template() {
    }

    private function get_link_url( $instance ) {
        if ( 'none' === $instance['link_to'] ) {
            return false;
        }

        if ( 'custom' === $instance['link_to'] ) {
            if ( empty( $instance['link']['url'] ) ) {
                return false;
            }
            return $instance['link'];
        }

        return [
            'url' => $instance['image']['url'],
        ];
    }
}
