<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Accordion extends Widget_Base {

	public function get_id() {
		return 'accordion';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Accordion', 'elementor' );
	}

	public function get_icon() {
		return 'accordion';
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => \BitElementorWpHelper::__( 'Accordion', 'elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => \BitElementorWpHelper::__( 'Accordion Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => \BitElementorWpHelper::__( 'Accordion #1', 'elementor' ),
						'tab_content' => \BitElementorWpHelper::__( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'tab_title' => \BitElementorWpHelper::__( 'Accordion #2', 'elementor' ),
						'tab_content' => \BitElementorWpHelper::__( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'fields' => [
					[
						'name' => 'tab_title',
						'label' => \BitElementorWpHelper::__( 'Title & Content', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => \BitElementorWpHelper::__( 'Accordion Title' , 'elementor' ),
						'label_block' => true,
					],
					[
						'name' => 'tab_content',
						'label' => \BitElementorWpHelper::__( 'Content', 'elementor' ),
						'type' => Controls_Manager::WYSIWYG,
						'default' => \BitElementorWpHelper::__( 'Accordion Content', 'elementor' ),
						'show_label' => false,
					],
				],
				'title_field' => 'tab_title',
			]
		);

		$this->add_control(
			'active_first',
			[
				'label' => \BitElementorWpHelper::__( 'Active First Tab', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 1,
				'options' => [
					1 => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
					0 => \BitElementorWpHelper::__( 'No', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Alignment', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => \BitElementorWpHelper::is_rtl() ? 'right' : 'left',
				'options' => [
					'left' => \BitElementorWpHelper::__( 'Left', 'elementor' ),
					'right' => \BitElementorWpHelper::__( 'Right', 'elementor' ),
				],
			]
		);
		$this->add_control(
			'icons',
			[
				'label' => \BitElementorWpHelper::__( 'Icons', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-plus',
			]
		);

		$this->add_control(
			'active_icon',
			[
				'label' => \BitElementorWpHelper::__( 'Active Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-minus',
			]
		);

		$this->add_control(
			'header_size',
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
				'default' => 'h2',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		//tab style
		$this->start_controls_section(
			'section_tab_style',
			[
				'label' => \BitElementorWpHelper::__( 'Tab Style', 'elementor' ),
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => \BitElementorWpHelper::__( 'Typography', 'elementor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'tab' => self::TAB_STYLE,
                'section' => 'section_tab_style',
                'selector' => '{{WRAPPER}} .elementor-accordion-title',
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Size', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_tab_style',
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-accordion-title  i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                'section' => 'section_tab_style',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-accordion-title  i' => $icon_spacing,
                ],
            ]
        );

        $this->add_control(
            'accordion_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_tab_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-accordion-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'accordion_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_tab_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-accordion-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
        	'tab_settings',
        	[
        		'label' => \BitElementorWpHelper::__( 'Tab Normal Settings', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'section' => 'section_tab_style'
        	]
        );


        $this->add_control(
			'tab_bg_color',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_txt_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_icon_color',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-title i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selector' => '{{WRAPPER}} .elementor-accordion-title',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
        	'tab_hover_settings',
        	[
        		'label' => \BitElementorWpHelper::__( 'Tab Hover Settings', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'section' => 'section_tab_style'
        	]
        );

		$this->add_control(
			'tab_bg_color_h',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-title:hover, {{WRAPPER}} .elementor-accordion-title.active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_txt_color_h',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-title:hover, {{WRAPPER}} .elementor-accordion-title.active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_icon_color_h',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-title i:hover, {{WRAPPER}} .elementor-accordion-title.active i ' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border_h',
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selector' => '{{WRAPPER}} .elementor-accordion-title:hover, {{WRAPPER}} .elementor-accordion-title.active',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => \BitElementorWpHelper::__( 'Content Style', 'elementor' ),
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_background_color',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion .elementor-accordion-content' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => \BitElementorWpHelper::__( 'Content Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion .elementor-accordion-content' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => \BitElementorWpHelper::__( 'Typography', 'elementor' ),
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selector' => '{{WRAPPER}} .elementor-accordion .elementor-accordion-content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		 $this->add_control(
            'accordion_content_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_title_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-accordion .elementor-accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'accordion_content_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_title_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-accordion .elementor-accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_content_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selector' => '{{WRAPPER}} .elementor-accordion .elementor-accordion-content',
			]
		);

		$this->add_control(
			'content_border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion .elementor-accordion-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_box_shadow',
                'section' => 'section_tab_style',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-accordion .elementor-accordion-content',
            ]
        );
		/*$this->add_control(
			'title_color',
			[
				'label' => \BitElementorWpHelper::__( 'Title Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion .elementor-accordion-title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_background',
			[
				'label' => \BitElementorWpHelper::__( 'Title Background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion .elementor-accordion-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_active_color',
			[
				'label' => \BitElementorWpHelper::__( 'Active Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion .elementor-accordion-title.active' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => \BitElementorWpHelper::__( 'Title Typography', 'elementor' ),
				'name' => 'title_typography',
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selector' => '{{WRAPPER}} .elementor-accordion .elementor-accordion-title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);*/

		$this->end_controls_section();
	}

	protected function render( $instance = [] ) {
		$counter = 1; ?>
		<div class="elementor-accordion" data-active-first="<?php echo $instance['active_first']; ?>">
			<?php  ?>
			<?php foreach ( $instance['tabs'] as $item ) :
				$this->add_render_attribute( 'accordion', 'class', 'elementor-accordion-title');
				$this->add_render_attribute( 'accordion', 'data-section', $counter);
				?>
				<div class="elementor-accordion-item">
					<<?php echo $instance['header_size']; ?> <?php echo $this->get_render_attribute_string('accordion'); ?>>
						<span class="elementor-accordion-icon elementor-accordion-icon-<?php echo $instance['icon_align']; ?>">
							<i class="inactive <?php echo $instance['icons']; ?>"></i>
							<i class="active <?php echo $instance['active_icon']; ?>"></i>
						</span>
						<?php echo $item['tab_title']; ?>
					</<?php echo $instance['header_size']; ?>>
					<div class="elementor-accordion-content" data-section="<?php echo $counter; ?>"><?php echo $this->parse_text_editor( $item['tab_content'], $item ); ?></div>
				</div>
			<?php
				$counter++;
			endforeach; ?>
		</div>
		<?php
	}

	protected function content_template() {}
}
