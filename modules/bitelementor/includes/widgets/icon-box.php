<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Icon_box extends Widget_Base {

	public function get_id() {
		return 'icon-box';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Icon Box', 'elementor' );
	}

	public function get_icon() {
		return 'icon-box';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_icon',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Box', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => \BitElementorWpHelper::__( 'Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'section' => 'section_icon',
				'default' => 'style-1',
				'options' => [
					'style-1' => \BitElementorWpHelper::__( 'Style 1', 'elementor' ),
					'style-2' => \BitElementorWpHelper::__( 'Style 2', 'elementor' ),
					'style-3' => \BitElementorWpHelper::__( 'Style 3', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'section' => 'section_icon',
				'options' => [
					'default' => \BitElementorWpHelper::__( 'Default', 'elementor' ),
					'stacked' => \BitElementorWpHelper::__( 'Stacked', 'elementor' ),
					'framed' => \BitElementorWpHelper::__( 'Framed', 'elementor' ),
				],
				'default' => 'default',
				'prefix_class' => 'elementor-view-',
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Type', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'section' => 'section_icon',
				'label_block' => false,
				'default' => 'image',
				'options' => [
					'icon' => [
						'title' => \BitElementorWpHelper::__( 'Icon', 'elementor' ),
						'icon' => 'info-circle',
					],
					'image' => [
						'title' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
						'icon' => 'picture-o',
					],
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
				'section' => 'section_icon',
				'condition' => [
                    'icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
            'icon_image',
            [
                'label' => \BitElementorWpHelper::__( 'Choose Image', 'elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => UtilsElementor::get_placeholder_image_src(),
                ],
				'section' => 'section_icon',
				'condition' => [
                    'icon_type' => 'image',
                ],
            ]
		);

		$this->add_control(
			'shape',
			[
				'label' => \BitElementorWpHelper::__( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'section' => 'section_icon',
				'options' => [
					'circle' => \BitElementorWpHelper::__( 'Circle', 'elementor' ),
					'square' => \BitElementorWpHelper::__( 'Square', 'elementor' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'elementor-shape-',
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => \BitElementorWpHelper::__( 'Title & Description', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => \BitElementorWpHelper::__( 'This is the heading', 'elementor' ),
				'placeholder' => \BitElementorWpHelper::__( 'Your Title', 'elementor' ),
				'section' => 'section_icon',
				'label_block' => true,
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => '',
				'type' => Controls_Manager::WYSIWYG,
				'default' => '<p>' . \BitElementorWpHelper::__( 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ) . '</p>',
				'title' => \BitElementorWpHelper::__( 'Input icon text here', 'elementor' ),
				'section' => 'section_icon',
				'separator' => 'none',
				'show_label' => false,
			]
		);

		$this->add_control(
			'link',
			[
				'label' => \BitElementorWpHelper::__( 'Link to', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => \BitElementorWpHelper::__( 'http://your-link.com', 'elementor' ),
				'section' => 'section_icon',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'position',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => \BitElementorWpHelper::__( 'Left', 'elementor' ),
						'icon' => 'align-left',
					],
					'top' => [
						'title' => \BitElementorWpHelper::__( 'Top', 'elementor' ),
						'icon' => 'align-center',
					],
					'right' => [
						'title' => \BitElementorWpHelper::__( 'Right', 'elementor' ),
						'icon' => 'align-right',
					],
				],
				'prefix_class' => 'elementor-position-',
				'section' => 'section_icon',
				'toggle' => false,
			]
		);

		$this->add_control(
			'title_size',
			[
				'label' => \BitElementorWpHelper::__( 'Title HTML Tag', 'elementor' ),
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
				'default' => 'h3',
				'section' => 'section_icon',
			]
		);

		// Image
        $this->add_control(
            'section_style_image',
            [
                'label' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
                'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
				'condition' => [
                    'icon_type' => 'image',
                ],
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
				'condition' => [
                    'icon_type' => 'image',
                ],
                'section' => 'section_style_image',
                'tab' => self::TAB_STYLE,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-box-wrapper .elementor-icon-box-image img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
		);
		
		$this->add_control(
            'image_hover_animation',
            [
                'label' => \BitElementorWpHelper::__( 'Hover Image Animation', 'elementor' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
                'tab' => self::TAB_STYLE,
				'section' => 'section_style_image',
				'condition' => [
                    'icon_type' => 'image',
                ],
            ]
        );

		$this->add_control(
			'section_style_icon',
			[
				'type'  => Controls_Manager::SECTION,
				'label' => \BitElementorWpHelper::__( 'Icon', 'elementor' ),
				'tab'   => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label' => \BitElementorWpHelper::__( 'Primary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_icon',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-image' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-image, {{WRAPPER}}.elementor-view-default .elementor-image' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_color',
			[
				'label' => \BitElementorWpHelper::__( 'Secondary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_icon',
				'default' => '',
				'condition' => [
					'view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-view-framed .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-image' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-image' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_space',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'section' => 'section_style_icon',
				'tab' => self::TAB_STYLE,
				'selectors' => [
					'{{WRAPPER}}.elementor-position-right .elementor-icon-box-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-left .elementor-icon-box-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-top .elementor-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-right .elementor-icon-box-image' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-left .elementor-icon-box-image' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-top .elementor-icon-box-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'section' => 'section_style_icon',
				'tab' => self::TAB_STYLE,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_icon',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-image' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'em' => [
						'min' => 0,
					],
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);

		$this->add_control(
			'rotate',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Rotate', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_icon',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .elementor-image img' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_width',
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_icon',
				'selector' => '{{WRAPPER}} .elementor-icon, {{WRAPPER}} .elementor-image',
            ]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_icon',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .elementor-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);

		$this->add_control(
			'section_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Hover', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'hover_primary_color',
			[
				'label' => \BitElementorWpHelper::__( 'Primary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_hover',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-image:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-image:hover, {{WRAPPER}}.elementor-view-default .elementor-image:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_secondary_color',
			[
				'label' => \BitElementorWpHelper::__( 'Secondary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_hover',
				'default' => '',
				'condition' => [
					'view!' => 'default',
					// 'icon_type!' => 'image',
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-image:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-image:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_border_color',
			[
				'label' => \BitElementorWpHelper::__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_hover',
				'default' => '',
				'condition' => [
					'view' => 'framed',
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-image:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_box_shadow',
                'section' => 'section_hover',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-icon-box-wrapper:hover .elementor-image',
            ]
		);
		
		$this->add_control(
			'hover_animation',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'tab' => self::TAB_STYLE,
				'section' => 'section_hover',
			]
		);

		$this->add_control(
			'section_style_content',
			[
				'type'  => Controls_Manager::SECTION,
				'label' => \BitElementorWpHelper::__( 'Content', 'elementor' ),
				'tab'   => self::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'text_align',
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
				'section' => 'section_style_content',
				'tab' => self::TAB_STYLE,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_vertical_alignment',
			[
				'label' => \BitElementorWpHelper::__( 'Vertical Alignment', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => \BitElementorWpHelper::__( 'Top', 'elementor' ),
					'middle' => \BitElementorWpHelper::__( 'Middle', 'elementor' ),
					'bottom' => \BitElementorWpHelper::__( 'Bottom', 'elementor' ),
				],
				'default' => 'top',
				'section' => 'section_style_content',
				'tab' => self::TAB_STYLE,
				'prefix_class' => 'elementor-vertical-align-',
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'section' => 'section_style_content',
				'tab' => self::TAB_STYLE,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => \BitElementorWpHelper::__( 'Title Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'section' => 'section_style_content',
				'tab' => self::TAB_STYLE,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Title Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title' => 'color: {{VALUE}};',
				],
				'section' => 'section_style_content',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title',
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => \BitElementorWpHelper::__( 'Description', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'section' => 'section_style_content',
				'tab' => self::TAB_STYLE,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => \BitElementorWpHelper::__( 'Description Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description' => 'color: {{VALUE}};',
				],
				'section' => 'section_style_content',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_responsive_control(
            'description_padding',
            [
                'label' => \BitElementorWpHelper::__( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_content',
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description',
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
	}

	protected function render( $instance = [] ) {
		$this->add_render_attribute( 'icon', 'class', [ 'elementor-icon', 'elementor-animation-' . $instance['hover_animation'] ] );

		$icon_tag = 'span';

		if ( ! empty( $instance['link']['url'] ) ) {
			$this->add_render_attribute( 'link', 'href', $instance['link']['url'] );
			$icon_tag = 'a';

			if ( ! empty( $instance['link']['is_external'] ) ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
				$this->add_render_attribute( 'link', 'rel', 'noopener noreferrer');
			}
		}

		$this->add_render_attribute( 'i', 'class', $instance['icon'] );

		$icon_attributes = $this->get_render_attribute_string( 'icon' );
		$link_attributes = $this->get_render_attribute_string( 'link' );
		$image_class_html = 'class="elementor-image elementor-animation-' . $instance['image_hover_animation'] . '"';
		?>
		<div class="elementor-icon-box-wrapper <?php echo $instance['style']; ?>">
			<?php if ( $instance['icon_type'] == 'icon' ) {?>
				<div class="elementor-icon-box-icon">
					<<?php echo implode( ' ', [ $icon_tag, $icon_attributes, $link_attributes ] ); ?>>
						<i <?php echo $this->get_render_attribute_string( 'i' ); ?>></i>
					</<?php echo $icon_tag; ?>>
				</div>
			<?php } ?>
			<?php if ( $instance['icon_type'] == 'image' ) {
				$image = $instance['icon_image'];
				if ( $image['url'] ) { ?>
					<div class="elementor-icon-box-image">
						<div <?php echo  $image_class_html; ?>>
							<img src="<?php echo \BitElementorWpHelper::esc_attr( $image['url'] ); ?>">
						</div>
					</div>
				<?php }
			} ?>
			<div class="elementor-icon-box-content">
				<<?php echo $instance['title_size']; ?> class="elementor-icon-box-title">
					<<?php echo implode( ' ', [ $icon_tag, $link_attributes ] ); ?>><?php echo $instance['title_text']; ?></<?php echo $icon_tag; ?>>
				</<?php echo $instance['title_size']; ?>>
				<div class="elementor-icon-box-description rte-content"><?php echo $instance['description_text']; ?></div>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
