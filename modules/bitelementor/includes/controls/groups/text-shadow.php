<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Group_Control_Text_Shadow extends Group_Control_Base {

	public static function get_type() {
		return 'text-shadow';
	}

	protected function _get_controls( $args ) {
		$controls = [];

		$controls['text_shadow_type'] = [
			'label' => \BitElementorWpHelper::_x( 'Text Shadow', 'Text Shadow Control', 'elementor' ),
			'type' => Controls_Manager::SELECT,
			'options' => [
				'' => \BitElementorWpHelper::__( 'No', 'elementor' ),
				'outset' => \BitElementorWpHelper::_x( 'Yes', 'Text Shadow Control', 'elementor' ),
			],
			'separator' => 'before',
		];

		$controls['text_shadow'] = [
			'label' => \BitElementorWpHelper::_x( 'Text Shadow', 'Text Shadow Control', 'elementor' ),
			'type' => Controls_Manager::TEXT_SHADOW,
			'selectors' => [
				$args['selector'] => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
			],
			'condition' => [
				'text_shadow_type!' => '',
			],
		];

		return $controls;
	}
}
