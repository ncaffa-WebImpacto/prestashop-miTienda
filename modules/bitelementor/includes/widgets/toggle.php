<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Toggle extends Widget_Base {

	public function get_id() {
		return 'toggle';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Toggle', 'elementor' );
	}

	public function get_icon() {
		return 'toggle';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_title',
			[
				'label' => \BitElementorWpHelper::__( 'Toggle', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => \BitElementorWpHelper::__( 'Toggle Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'section' => 'section_title',
				'default' => [
					[
						'tab_title' => \BitElementorWpHelper::__( 'Toggle #1', 'elementor' ),
						'tab_content' => \BitElementorWpHelper::__( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'tab_title' => \BitElementorWpHelper::__( 'Toggle #2', 'elementor' ),
						'tab_content' => \BitElementorWpHelper::__( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'fields' => [
					[
						'name' => 'tab_title',
						'label' => \BitElementorWpHelper::__( 'Title & Content', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => \BitElementorWpHelper::__( 'Toggle Title' , 'elementor' ),
					],
					[
						'name' => 'tab_content',
						'label' => \BitElementorWpHelper::__( 'Content', 'elementor' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => \BitElementorWpHelper::__( 'Toggle Content', 'elementor' ),
						'show_label' => false,
					],
				],
				'title_field' => 'tab_title',
			]
		);
		
		$this->add_control(
			'icon_align',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Alignment', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => \BitElementorWpHelper::is_rtl() ? 'right' : 'left',
				'section' => 'section_title',
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
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'active_icon',
			[
				'label' => \BitElementorWpHelper::__( 'Active Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-minus',
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'section' => 'section_title',
			]
		);

		$this->add_control(
			'section_toggle_style',
			[
				'label' => \BitElementorWpHelper::__( 'Toggle Style', 'elementor' ),
				'type' => Controls_Manager::SECTION,
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
                'section' => 'section_toggle_style',
                'selector' => '{{WRAPPER}} .elementor-toggle-title',
            ]
		);

		$this->add_control(
            'icon_size',
            [
                'label' => \BitElementorWpHelper::__( 'Icon Size', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'tab' => self::TAB_STYLE,
                'section' => 'section_toggle_style',
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-toggle-title  i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                'section' => 'section_toggle_style',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-toggle-title i' => $icon_spacing,
                ],
            ]
		);
		
		$this->add_control(
            'toogle_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_toggle_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-toggle-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'toggle_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_toggle_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-toggle-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
		);
		
		$this->add_control(
        	'toggle_settings',
        	[
        		'label' => \BitElementorWpHelper::__( 'Toggle Normal Settings', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'section' => 'section_toggle_style',
				'tab' => self::TAB_STYLE,
        	]
		);
		
		$this->add_control(
			'toggle_bg_color',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'toggle_txt_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'toggle_icon_color',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle-title i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selector' => '{{WRAPPER}} .elementor-toggle-title',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
        	'toggle_hover_settings',
        	[
        		'label' => \BitElementorWpHelper::__( 'Toggle Hover Settings', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style'
        	]
        );

		$this->add_control(
			'toggle_bg_color_h',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle-title:hover, {{WRAPPER}} .elementor-toggle-title.active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'toggle_txt_color_h',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle-title:hover, {{WRAPPER}} .elementor-toggle-title.active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'toggle_icon_color_h',
			[
				'label' => \BitElementorWpHelper::__( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle-title i:hover, {{WRAPPER}} .elementor-toggle-title.active i ' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border_h',
				'tab' => self::TAB_STYLE,
				'section' => 'section_toggle_style',
				'selector' => '{{WRAPPER}} .elementor-toggle-title:hover, {{WRAPPER}} .elementor-toggle-title.active',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
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
				'section' => 'section_content_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle .elementor-toggle-content' => 'background-color: {{VALUE}};',
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
				'section' => 'section_content_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle .elementor-toggle-content' => 'color: {{VALUE}};',
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
				'section' => 'section_content_style',
				'selector' => '{{WRAPPER}} .elementor-toggle .elementor-toggle-content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		 $this->add_control(
            'toggle_content_padding',
            [
                'label' => \BitElementorWpHelper::__( 'padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_content_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-toggle .elementor-toggle-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'toggle_content_margin',
            [
                'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_content_style',
                'selectors' => [
                    '{{WRAPPER}} .elementor-toggle .elementor-toggle-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_content_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_content_style',
				'selector' => '{{WRAPPER}} .elementor-toggle .elementor-toggle-content',
			]
		);

		$this->add_control(
			'content_border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_content_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-toggle .elementor-toggle-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_box_shadow',
                'section' => 'section_content_style',
                'tab' => self::TAB_STYLE,
                'selector' => '{{WRAPPER}} .elementor-toggle .elementor-toggle-content',
            ]
        );
		
		$this->end_controls_section();
	}

	protected function render( $instance = [] ) {
		?>
		<div class="elementor-toggle">
			<?php $counter = 1; ?>
			<?php foreach ( $instance['tabs'] as $item ) : ?>
				<div class="elementor-toggle-title" data-tab="<?php echo $counter; ?>">
					<span class="elementor-toggle-icon <?php echo $instance['icon_align']; ?>">
						<i class="inactive <?php echo $instance['icons']; ?>"></i>
						<i class="active <?php echo $instance['active_icon']; ?>"></i>
					</span>
					<?php echo $item['tab_title']; ?>
				</div>
				<div class="elementor-toggle-content" data-tab="<?php echo $counter; ?>"><?php echo $this->parse_text_editor( $item['tab_content'], $item ); ?></div>
			<?php
				$counter++;
			endforeach; ?>
		</div>
		<?php
	}

	protected function content_template() {}
}
