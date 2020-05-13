<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Group_Control_Box_Shadow extends Group_Control_Base {

	public static function get_type() {
		return 'box-shadow';
	}

	protected function _get_controls( $args ) {
		$controls = [];

		$controls['box_shadow_type'] = [
			'label' => \BitElementorWpHelper::_x( 'Box Shadow', 'Box Shadow Control', 'elementor' ),
			'type' => Controls_Manager::SELECT,
			'options' => [
				'' => \BitElementorWpHelper::__( 'No', 'elementor' ),
				'outset' => \BitElementorWpHelper::_x( 'Yes', 'Box Shadow Control', 'elementor' ),
			],
			'separator' => 'before',
			'render_type' => 'ui',
		];

		$controls['box_shadow'] = [
			'label' => \BitElementorWpHelper::_x( 'Box Shadow', 'Box Shadow Control', 'elementor' ),
			'type' => Controls_Manager::BOX_SHADOW,
			'condition' => [
				'box_shadow_type!' => '',
			],
			'render_type' => 'ui',
		];

		$controls['box_shadow_position'] = [
			'label' => \BitElementorWpHelper::_x( 'Position', 'Box Shadow Control', 'elementor' ),
			'type' => Controls_Manager::SELECT,
			'options' => [
				' ' => \BitElementorWpHelper::_x( 'Outline', 'Box Shadow Control', 'elementor' ),
				'inset' => \BitElementorWpHelper::_x( 'Inset', 'Box Shadow Control', 'elementor' ),
			],
			'condition' => [
				'box_shadow_type!' => '',
			],
			'default' => ' ',
			'selectors' => [
				$args['selector'] => 'box-shadow: {{box_shadow.HORIZONTAL}}px {{box_shadow.VERTICAL}}px {{box_shadow.BLUR}}px {{box_shadow.SPREAD}}px {{box_shadow.COLOR}} {{VALUE}};',
			],
		];

		return $controls;
	}
}
