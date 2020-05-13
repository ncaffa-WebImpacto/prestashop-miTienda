<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Counter extends Widget_Base {

	public function get_id() {
		return 'counter';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Counter', 'elementor' );
	}

	public function get_icon() {
		return 'counter';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_counter',
			[
				'label' => \BitElementorWpHelper::__( 'Counter', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);
		$this->add_control(
			'icon_type',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Type', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'section' => 'section_counter',
				'label_block' => false,
				'default' => 'none',
				'options' => [
					'none' => [
						'title' => \BitElementorWpHelper::__( 'None', 'elementor' ),
						'icon' => 'ban',
					],
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
			'counter_icon',
			[
				'label' => \BitElementorWpHelper::__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-star',
				'section' => 'section_counter',
				'condition' => [
                    'icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
            'counter_image',
            [
                'label' => \BitElementorWpHelper::__( 'Choose Image', 'elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => UtilsElementor::get_placeholder_image_src(),
                ],
				'section' => 'section_counter',
				'condition' => [
                    'icon_type' => 'image',
                ],
            ]
		);
		
		$this->add_control(
			'starting_number',
			[
				'label' => \BitElementorWpHelper::__( 'Starting Number', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'default' => 0,
				'section' => 'section_counter',
			]
		);

		$this->add_control(
			'ending_number',
			[
				'label' => \BitElementorWpHelper::__( 'Ending Number', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'default' => 100,
				'section' => 'section_counter',
			]
		);

		$this->add_control(
			'prefix',
			[
				'label' => \BitElementorWpHelper::__( 'Number Prefix', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => 1,
				'section' => 'section_counter',
			]
		);

		$this->add_control(
			'suffix',
			[
				'label' => \BitElementorWpHelper::__( 'Number Suffix', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => \BitElementorWpHelper::__( 'Plus', 'elementor' ),
				'section' => 'section_counter',
			]
		);

		$this->add_control(
			'duration',
			[
				'label' => \BitElementorWpHelper::__( 'Animation Duration', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 2000,
				'min' => 100,
				'step' => 100,
				'section' => 'section_counter',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => \BitElementorWpHelper::__( 'Cool Number', 'elementor' ),
				'placeholder' => \BitElementorWpHelper::__( 'Cool Number', 'elementor' ),
				'section' => 'section_counter',
			]
		);

		$this->add_control(
			'section_counter_separators',
			[
				'label' => \BitElementorWpHelper::__( 'Dividers', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
            'icon_divider',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Divider', 'elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'section' => 'section_counter_separators',
                'default' => '',
                'label_on' => 'On',
				'label_off' => 'Off',
				'return_value'          => 'yes',
				'condition'             => [
                    'icon_type!' => 'none',
                ],
            ]
		);
		
		$this->add_control(
            'num_divider',
            [
                'label' => \BitElementorWpHelper::__( 'Number Divider', 'elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'section' => 'section_counter_separators',
                'default' => '',
                'label_on' => 'On',
				'label_off' => 'Off',
				'return_value' => 'yes',
            ]
		);
		
		$this->add_control(
			'view',
			[
				'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'section' => 'section_counter',
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
                    '{{WRAPPER}} .elementor-counter .icon-img img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'tab' => self::TAB_STYLE,
                'section' => 'section_style_image',
				'selector' => '{{WRAPPER}} .elementor-counter .icon-img img',
				'condition' => [
                    'icon_type' => 'image',
                ],
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
				'condition' => [
                    'icon_type' => 'image',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-counter .icon-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
		);
		
		// Icons
        $this->add_control(
            'section_icons_style',
            [
                'label' => \BitElementorWpHelper::__( 'Icons', 'elementor' ),
                'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
				'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );
		
        $this->add_control(
            'icon_secondary_color',
            [
                'label' => \BitElementorWpHelper::__( 'Icon', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_icons_style',
				'default' => '#ffffff',
				'condition' => [
                    'icon_type' => 'icon',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-counter .counter-icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Size', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_icons_style',
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
				],
				'condition' => [
                    'icon_type' => 'icon',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-counter .counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_padding',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Padding', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_icons_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-counter .counter-icon i' => 'padding: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'em',
				],
				'condition' => [
                    'icon_type' => 'icon',
                ],
                'range' => [
                    'em' => [
                        'min' => 0,
                    ],
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
                'section' => 'section_icons_style',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
				],
				'condition' => [
                    'icon_type' => 'icon',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-counter .counter-icon:not(:last-child) i' => $icon_spacing,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_image_border',
                'tab' => self::TAB_STYLE,
				'section' => 'section_icons_style',
				'condition' => [
                    'icon_type' => 'icon',
                ],
                'selector' => '{{WRAPPER}} .elementor-counter .counter-icon i',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'tab' => self::TAB_STYLE,
				'section' => 'section_icons_style',
				'condition' => [
                    'icon_type' => 'icon',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-counter .counter-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
		);

		// Divider
		$this->add_control(
			'heading_style_divider',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Divider', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_icons_style',
				'separator' => 'before',
				'condition' => [
                    'icon_type' => 'icon',
                    'icon_divider'  => 'yes',
                ],
			]
		);

		$this->add_control(
			'icon_divider_type',
			[
				'label' => \BitElementorWpHelper::__( 'Divider Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'tab' => self::TAB_STYLE,
				'default' => 'solid',
				'section' => 'section_icons_style',
				'options' => [
					'solid' => \BitElementorWpHelper::__( 'Solid', 'elementor' ),
					'double' => \BitElementorWpHelper::__( 'Double', 'elementor' ),
					'dotted' => \BitElementorWpHelper::__( 'Dotted', 'elementor' ),
					'dashed' => \BitElementorWpHelper::__( 'Dashed', 'elementor' ),
				],
				'selectors' => [
                    '{{WRAPPER}} .icon-divider-inner' => 'border-bottom-style: {{VALUE}}',
				],
				'condition' => [
                    'icon_type!' => 'none',
                    'icon_divider'  => 'yes',
                ],
			]
		);

		$this->add_control(
            'icon_divider_height',
            [
                'label' => \BitElementorWpHelper::__( 'Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'size_units' => [ 'px' ],
				'default' => [
                    'size'  => 2,
                ],
                'range' => [
                    'px' => [
                        'min'   => 1,
                        'max'   => 20,
                        'step'  => 1,
                    ],
                ],
				'section' => 'section_icons_style',
				'condition' => [
                    'icon_type!' => 'none',
                    'icon_divider'  => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-divider-inner' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
				],
            ]
		);

		$this->add_control(
            'icon_divider_width',
            [
                'label' => \BitElementorWpHelper::__( 'Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'size_units' => [ 'px', '%' ],
				'default' => [
                    'size'  => 30,
                ],
                'range' => [
                    'px' => [
                        'min'   => 1,
                        'max'   => 1000,
                        'step'  => 1,
                    ],
                    '%' => [
                        'min'   => 1,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
				'section' => 'section_icons_style',
				'condition' => [
                    'icon_type!' => 'none',
                    'icon_divider'  => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-divider-inner' => 'width: {{SIZE}}{{UNIT}}',
				],
            ]
		);
		
		$this->add_control(
			'section_number',
			[
				'label' => \BitElementorWpHelper::__( 'Number', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_number',
				'selectors' => [
					'{{WRAPPER}} .elementor-counter-number-wrapper' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_number',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'tab' => self::TAB_STYLE,
				'section' => 'section_number',
				'selector' => '{{WRAPPER}} .elementor-counter-number-wrapper',
			]
		);

		// Number Divider
		$this->add_control(
			'num_divider_heading',
			[
				'label' => \BitElementorWpHelper::__( 'Number Divider', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_number',
				'separator' => 'before',
				'condition' => [
                    'num_divider'  => 'yes',
                ],
			]
		);

		$this->add_control(
			'num_divider_type',
			[
				'label' => \BitElementorWpHelper::__( 'Divider Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'tab' => self::TAB_STYLE,
				'default' => 'solid',
				'section' => 'section_number',
				'options' => [
					'solid' => \BitElementorWpHelper::__( 'Solid', 'elementor' ),
					'double' => \BitElementorWpHelper::__( 'Double', 'elementor' ),
					'dotted' => \BitElementorWpHelper::__( 'Dotted', 'elementor' ),
					'dashed' => \BitElementorWpHelper::__( 'Dashed', 'elementor' ),
				],
				'selectors' => [
                    '{{WRAPPER}} .num-divider-inner' => 'border-bottom-style: {{VALUE}}',
				],
				'condition' => [
                    'num_divider'  => 'yes',
                ],
			]
		);

		$this->add_control(
            'num_divider_height',
            [
                'label' => \BitElementorWpHelper::__( 'Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'size_units' => [ 'px' ],
				'default' => [
                    'size'  => 2,
                ],
                'range' => [
                    'px' => [
                        'min'   => 1,
                        'max'   => 20,
                        'step'  => 1,
                    ],
                ],
				'section' => 'section_number',
				'condition' => [
                    'num_divider'  => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .num-divider-inner' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
				],
            ]
		);

		$this->add_control(
            'num_divider_width',
            [
                'label' => \BitElementorWpHelper::__( 'Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'tab' => self::TAB_STYLE,
				'size_units' => [ 'px', '%' ],
				'default' => [
                    'size'  => 30,
                ],
                'range' => [
                    'px' => [
                        'min'   => 1,
                        'max'   => 1000,
                        'step'  => 1,
                    ],
                    '%' => [
                        'min'   => 1,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
				'section' => 'section_number',
				'condition' => [
                    'icon_divider'  => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .num-divider-inner' => 'width: {{SIZE}}{{UNIT}}',
				],
            ]
		);

		$this->add_control(
			'section_title',
			[
				'label' => \BitElementorWpHelper::__( 'Title', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_title',
				'selectors' => [
					'{{WRAPPER}} .elementor-counter-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title',
				'selector' => '{{WRAPPER}} .elementor-counter-title',
			]
		);
	}

	protected function content_template() {
	}

	public function render( $instance = [] ) {
		
		?>
		<div class="elementor-counter">
		   <?php if ( $instance['icon_type'] == 'icon' ) {
		       if ( ! empty( $instance['counter_icon'] ) ) {
				$this->add_render_attribute( 'icon', 'class', $instance['counter_icon'] );
				 ?>
					<div class="counter-icon">
						<i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>	
					</div>		
				<?php
			   }
		    } ?>
			<?php if ( $instance['icon_type'] == 'image' ) {
				$image = $instance['counter_image'];
				if ( $image['url'] ) { ?>
					<div class="icon-img">
						<img src="<?php echo \BitElementorWpHelper::esc_attr( $image['url'] ); ?>">
					</div>
				<?php }
			} ?>
			<?php if ( $instance['icon_divider'] == 'yes' && $instance['icon_type'] == 'icon') {
				?>
					<div class="icon-divider-wrap">
						<span class="icon-divider-inner"></span>
					</div>
				<?php
			} ?>
			<div class="elementor-counter-number-wrapper">
				<?php
				$prefix = $suffix = '';

				if ( $instance['prefix'] ) {
					$prefix = '<span class="elementor-counter-number-prefix">' . $instance['prefix'] . '</span>';
				}

				$duration = '<span class="elementor-counter-number" data-duration="' . $instance['duration'] . '" data-to_value="' . $instance['ending_number'] . '">' . $instance['starting_number'] . '</span>';

				if ( $instance['suffix'] ) {
					$suffix = '<span class="elementor-counter-number-suffix">' . $instance['suffix'] . '</span>';
				}

				echo $prefix . $duration . $suffix;
				?>
			</div>

			<?php if ( $instance['num_divider'] == 'yes') {
				?>
					<div class="num-divider-wrap">
						<span class="num-divider-inner"></span>
					</div>
				<?php
			} ?>

			<?php if ( $instance['title'] ) : ?>
				<div class="elementor-counter-title"><?php echo $instance['title']; ?></div>
			<?php endif; ?>
		</div>
		<?php
	}
}
