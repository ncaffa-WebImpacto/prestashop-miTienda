<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Tabs extends Widget_Base {

	public function get_id() {
		return 'tabs';
	}

	public function get_title() {
		return \BitElementorWpHelper::__( 'Tabs', 'elementor' );
	}

	public function get_icon() {
		return 'tabs';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_title',
			[
				'label' => \BitElementorWpHelper::__( 'Tabs', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => \BitElementorWpHelper::__( 'Tabs Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'section' => 'section_title',
				'default' => [
					[
						'tab_title' => \BitElementorWpHelper::__( 'Tab #1', 'elementor' ),
						'tab_content' => \BitElementorWpHelper::__( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'tab_title' => \BitElementorWpHelper::__( 'Tab #2', 'elementor' ),
						'tab_content' => \BitElementorWpHelper::__( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'fields' => [
					[
						'name' => 'tab_title',
						'label' => \BitElementorWpHelper::__( 'Title & Content', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => \BitElementorWpHelper::__( 'Tab Title', 'elementor' ),
						'placeholder' => \BitElementorWpHelper::__( 'Tab Title', 'elementor' ),
						'label_block' => true,
					],
					[
						'name' => 'tab_content',
						'label' => \BitElementorWpHelper::__( 'Content', 'elementor' ),
						'default' => \BitElementorWpHelper::__( 'Tab Content', 'elementor' ),
						'placeholder' => \BitElementorWpHelper::__( 'Tab Content', 'elementor' ),
						'type' => Controls_Manager::WYSIWYG,
						'show_label' => false,
					],
				],
				'title_field' => 'tab_title',
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
			'section_title_style',
			[
				'label' => \BitElementorWpHelper::__( 'Tabs Style', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'position',
			[
				'label' => \BitElementorWpHelper::__( 'Tabs Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'tab' => self::TAB_STYLE,
				'default' => 'left',
				'section' => 'section_title_style',
				'options' => [
					'left' => \BitElementorWpHelper::__( 'Left', 'elementor' ),
					'center' => \BitElementorWpHelper::__( 'Center', 'elementor' ),
					'right' => \BitElementorWpHelper::__( 'right', 'elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .nav-tabs' => 'justify-content:  {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tabs_padding',
			[
				'label' => \BitElementorWpHelper::__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .nav-tabs .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'tabs_margin',
			[
				'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .nav-tabs .nav-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selector' => '{{WRAPPER}} .nav-tabs .nav-item .nav-link',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'tabs_bkg_color',
			[
				'label' => \BitElementorWpHelper::__( 'Background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .nav-tabs .nav-item .nav-link' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_color',
			[
				'label' => \BitElementorWpHelper::__( 'Title Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .nav-tabs .nav-item .nav-link' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tabs_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selector' => '{{WRAPPER}} .nav-tabs .nav-item .nav-link',
			]
		);

		$this->add_control(
			'tabs_border_radius',
			[
				'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .nav-tabs .nav-item .nav-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_tabs_style',
			[
				'label' => \BitElementorWpHelper::__( 'Tabs Hover', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'tabs_bkg_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Hover - Background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .nav-tabs .nav-link:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .nav-tabs .nav-link:focus' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .nav-tabs .nav-link.active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_border_hover',
			[
				'label' => \BitElementorWpHelper::__( 'Hover - Border', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .nav-tabs .nav-link:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .nav-tabs .nav-link:focus' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .nav-tabs .nav-link.active' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_color_hover',
			[
				'label' => \BitElementorWpHelper::__('Hover - Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .nav-tabs .nav-link:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .nav-tabs .nav-link:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .nav-tabs .nav-link.active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_tab_content',
			[
				'label' => \BitElementorWpHelper::__( 'Tab Content', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_bkg_color',
			[
				'label' => \BitElementorWpHelper::__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_content',
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => \BitElementorWpHelper::__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_content',
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content' => 'color: {{VALUE}};',
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
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_content',
				'selector' => '{{WRAPPER}} .elementor-tab-content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'content_padding',
			[
				'label' => \BitElementorWpHelper::__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_content',
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'content_margin',
			[
				'label' => \BitElementorWpHelper::__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_content',
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	}

	protected function render( $instance = [] ) {
		?>
		<div class="elementor-tabs tabs">
			<?php $counter = 1; ?>
			<ul class="nav nav-tabs border-0">
				<?php foreach ( $instance['tabs'] as $item ) : ?>
					<li class="nav-item"><a class="nav-link elementor-tab-title"  data-tab="<?php echo $counter; ?>" ><?php echo $item['tab_title']; ?></a></li>
				<?php
					$counter++;
				endforeach; ?>
			</ul>

			<?php $counter = 1; ?>
			<div class="elementor-tabs-content-wrapper tab-content">
				<?php foreach ( $instance['tabs'] as $item ) : ?>
					<div data-tab="<?php echo $counter; ?>" class="elementor-tab-content tab-pane"><?php echo $this->parse_text_editor( $item['tab_content'], $item ); ?></div>
				<?php
					$counter++;
				endforeach; ?>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
		?>
		<div class="elementor-tabs tabs" data-active-tab="{{ editSettings.activeItemIndex ? editSettings.activeItemIndex : 0 }}">
			<#
			if ( settings.tabs ) {
				var counter = 1; #>
				<ul class="nav nav-tabs border-0">
					<#
					_.each( settings.tabs, function( item ) { #>

						<li class="nav-item"><a class="nav-link elementor-tab-title" data-tab="{{ counter }}">{{{ item.tab_title }}}</a></li>
					<#
						counter++;
					} ); #>
				</ul>

				<# counter = 1; #>
				<div class="elementor-tabs-content-wrapper tab-content">
					<#
					_.each( settings.tabs, function( item ) { #>
						<div class="elementor-tab-content tab-pane" data-tab="{{ counter }}">{{{ item.tab_content }}}</div>
					<#
					counter++;
					} ); #>
				</div>
			<# } #>
		</div>
		<?php
	}
}
