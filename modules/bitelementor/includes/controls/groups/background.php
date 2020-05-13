<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Group_Control_Background extends Group_Control_Base {

	public static function get_type() {
		return 'background';
	}

	protected function _get_child_default_args() {
		return [
			'types' => [ 'classic' ],
		];
	}

	protected function _get_controls( $args ) {
		$available_types = [
			'classic' => [
				'title' => \BitElementorWpHelper::_x( 'Classic', 'Background Control', 'elementor' ),
				'icon' => 'paint-brush',
			],
            'gradient' => [
                'title' => \BitElementorWpHelper::_x('Gradient', 'Background Control', 'elementor'),
                'icon' => 'fa fa-barcode',
            ],
			'video' => [
				'title' => \BitElementorWpHelper::_x( 'Background Video', 'Background Control', 'elementor' ),
				'icon' => 'video-camera',
			],
		];

		$choose_types = [
			'none' => [
				'title' => \BitElementorWpHelper::_x( 'None', 'Background Control', 'elementor' ),
				'icon' => 'ban',
			],
		];

		foreach ( $args['types'] as $type ) {
			if ( isset( $available_types[ $type ] ) ) {
				$choose_types[ $type ] = $available_types[ $type ];
			}
		}

		$controls = [];

		$controls['background'] = [
			'label' => \BitElementorWpHelper::_x( 'Background Type', 'Background Control', 'elementor' ),
			'type' => Controls_Manager::CHOOSE,
			'default' => $args['default'],
			'options' => $choose_types,
			'label_block' => true,
		];

		// Background:color
		if ( in_array( 'classic', $args['types'] ) ) {
			$controls['color'] = [
				'label' => \BitElementorWpHelper::_x( 'Color', 'Background Control', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'tab' => $args['tab'],
				'title' => \BitElementorWpHelper::_x( 'Background Color', 'Background Control', 'elementor' ),
				'selectors' => [
					$args['selector'] => 'background-color: {{VALUE}};',
				],
				'condition' => [
                    'background' => [ 'classic', 'gradient' ],
				],
			];

            if ( in_array( 'gradient', $args['types'] ) ) {
                $controls['color_stop'] = [
                    'label' =>\BitElementorWpHelper::_x( 'Location', 'Background Control', 'elementor' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ '%' ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'render_type' => 'ui',
                    'condition' => [
                        'background' => [ 'gradient' ],
                    ],
                ];
                $controls['color_b'] = [
                    'label' => \BitElementorWpHelper::_x( 'Second Color', 'Background Control', 'elementor' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => 'transparent',
                    'render_type' => 'ui',
                    'condition' => [
                        'background' => [ 'gradient' ],
                    ],
                ];
                $controls['color_b_stop'] = [
                    'label' => \BitElementorWpHelper::_x( 'Location', 'Background Control', 'elementor' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ '%' ],
                    'default' => [
                        'unit' => '%',
                        'size' => 100,
                    ],
                    'render_type' => 'ui',
                    'condition' => [
                        'background' => [ 'gradient' ],
                    ],
                ];
                $controls['gradient_type'] = [
                    'label' => \BitElementorWpHelper::_x( 'Type', 'Background Control', 'elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'linear' => \BitElementorWpHelper::_x( 'Linear', 'Background Control', 'elementor' ),
                        'radial' => \BitElementorWpHelper::_x( 'Radial', 'Background Control', 'elementor' ),
                    ],
                    'default' => 'linear',
                    'render_type' => 'ui',
                    'condition' => [
                        'background' => [ 'gradient' ],
                    ],
                ];
                $controls['gradient_angle'] = [
                    'label' => \BitElementorWpHelper::_x( 'Angle', 'Background Control', 'elementor' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'deg' ],
                    'default' => [
                        'unit' => 'deg',
                        'size' => 180,
                    ],
                    'range' => [
                        'deg' => [
                            'step' => 10,
                        ],
                    ],
                    'selectors' => [
                        $args['selector'] => 'background-image: linear-gradient({{SIZE}}{{UNIT}}, {{color.VALUE}} {{color_stop.SIZE}}{{color_stop.UNIT}}, {{color_b.VALUE}} {{color_b_stop.SIZE}}{{color_b_stop.UNIT}})',
                    ],
                    'condition' => [
                        'background' => [ 'gradient' ],
                        'gradient_type' => 'linear',
                    ],
                ];
                $controls['gradient_position'] = [
                    'label' => \BitElementorWpHelper::_x( 'Position', 'Background Control', 'elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'center center' => \BitElementorWpHelper::_x( 'Center Center', 'Background Control', 'elementor' ),
                        'center left' => \BitElementorWpHelper::_x( 'Center Left', 'Background Control', 'elementor' ),
                        'center right' => \BitElementorWpHelper::_x( 'Center Right', 'Background Control', 'elementor' ),
                        'top center' => \BitElementorWpHelper::_x( 'Top Center', 'Background Control', 'elementor' ),
                        'top left' => \BitElementorWpHelper::_x( 'Top Left', 'Background Control', 'elementor' ),
                        'top right' => \BitElementorWpHelper::_x( 'Top Right', 'Background Control', 'elementor' ),
                        'bottom center' => \BitElementorWpHelper::_x( 'Bottom Center', 'Background Control', 'elementor' ),
                        'bottom left' => \BitElementorWpHelper::_x( 'Bottom Left', 'Background Control', 'elementor' ),
                        'bottom right' => \BitElementorWpHelper::_x( 'Bottom Right', 'Background Control', 'elementor' ),
                    ],
                    'default' => 'center center',
                    'selectors' => [
                        $args['selector'] => 'background-image: radial-gradient(at {{VALUE}}, {{color.VALUE}} {{color_stop.SIZE}}{{color_stop.UNIT}}, {{color_b.VALUE}} {{color_b_stop.SIZE}}{{color_b_stop.UNIT}})',
                    ],
                    'condition' => [
                        'background' => [ 'gradient' ],
                        'gradient_type' => 'radial',
                    ],
                ];
            }
		}
		// End Background:color

		// Background:image
		if ( in_array( 'classic', $args['types'] ) ) {
			$controls['image'] = [
				'label' => \BitElementorWpHelper::_x( 'Image', 'Background Control', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'title' => \BitElementorWpHelper::_x( 'Background Image', 'Background Control', 'elementor' ),
				'selectors' => [
					$args['selector'] => 'background-image: url("{{URL}}");',
				],
				'condition' => [
					'background' => [ 'classic' ],
				],
			];

			$controls['position'] = [
				'label' => \BitElementorWpHelper::_x( 'Position', 'Background Control', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => \BitElementorWpHelper::_x( 'None', 'Background Control', 'elementor' ),
					'top left' => \BitElementorWpHelper::_x( 'Top Left', 'Background Control', 'elementor' ),
					'top center' => \BitElementorWpHelper::_x( 'Top Center', 'Background Control', 'elementor' ),
					'top right' => \BitElementorWpHelper::_x( 'Top Right', 'Background Control', 'elementor' ),
					'center left' => \BitElementorWpHelper::_x( 'Center Left', 'Background Control', 'elementor' ),
					'center center' => \BitElementorWpHelper::_x( 'Center Center', 'Background Control', 'elementor' ),
					'center right' => \BitElementorWpHelper::_x( 'Center Right', 'Background Control', 'elementor' ),
					'bottom left' => \BitElementorWpHelper::_x( 'Bottom Left', 'Background Control', 'elementor' ),
					'bottom center' => \BitElementorWpHelper::_x( 'Bottom Center', 'Background Control', 'elementor' ),
					'bottom right' => \BitElementorWpHelper::_x( 'Bottom Right', 'Background Control', 'elementor' ),
				],
				'selectors' => [
					$args['selector'] => 'background-position: {{VALUE}};',
				],
				'condition' => [
					'background' => [ 'classic' ],
					'image[url]!' => '',
				],
			];

			$controls['attachment'] = [
				'label' => \BitElementorWpHelper::_x( 'Attachment', 'Background Control', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => \BitElementorWpHelper::_x( 'None', 'Background Control', 'elementor' ),
					'scroll' => \BitElementorWpHelper::_x( 'Scroll', 'Background Control', 'elementor' ),
					'fixed' => \BitElementorWpHelper::_x( 'Fixed', 'Background Control', 'elementor' ),
				],
				'selectors' => [
					$args['selector'] => 'background-attachment: {{VALUE}};',
				],
				'condition' => [
					'background' => [ 'classic' ],
					'image[url]!' => '',
				],
			];

			$controls['repeat'] = [
				'label' => \BitElementorWpHelper::_x( 'Repeat', 'Background Control', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => \BitElementorWpHelper::_x( 'None', 'Background Control', 'elementor' ),
					'no-repeat' => \BitElementorWpHelper::_x( 'No-repeat', 'Background Control', 'elementor' ),
					'repeat' => \BitElementorWpHelper::_x( 'Repeat', 'Background Control', 'elementor' ),
					'repeat-x' => \BitElementorWpHelper::_x( 'Repeat-x', 'Background Control', 'elementor' ),
					'repeat-y' => \BitElementorWpHelper::_x( 'Repeat-y', 'Background Control', 'elementor' ),
				],
				'selectors' => [
					$args['selector'] => 'background-repeat: {{VALUE}};',
				],
				'condition' => [
					'background' => [ 'classic' ],
					'image[url]!' => '',
				],
			];

			$controls['size'] = [
				'label' => \BitElementorWpHelper::_x( 'Size', 'Background Control', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => \BitElementorWpHelper::_x( 'None', 'Background Control', 'elementor' ),
					'auto' => \BitElementorWpHelper::_x( 'Auto', 'Background Control', 'elementor' ),
					'cover' => \BitElementorWpHelper::_x( 'Cover', 'Background Control', 'elementor' ),
					'contain' => \BitElementorWpHelper::_x( 'Contain', 'Background Control', 'elementor' ),
				],
				'selectors' => [
					$args['selector'] => 'background-size: {{VALUE}};',
				],
				'condition' => [
					'background' => [ 'classic' ],
					'image[url]!' => '',
				],
			];
		}
		// End Background:image

		// Background:video
		$controls['video_link'] = [
			'label' => \BitElementorWpHelper::_x( 'Video Link', 'Background Control', 'elementor' ),
			'type' => Controls_Manager::TEXT,
			'placeholder' => 'https://www.youtube.com/watch?v=9uOETcuFjbE',
			'description' => \BitElementorWpHelper::__( 'Insert YouTube link or video file (mp4 is recommended)', 'elementor' ),
			'label_block' => true,
			'default' => '',
			'condition' => [
				'background' => [ 'video' ],
			],
		];

		$controls['video_fallback'] = [
			'label' => \BitElementorWpHelper::_x( 'Background Fallback', 'Background Control', 'elementor' ),
			'description' => \BitElementorWpHelper::__( 'This cover image will replace the background video on mobile or tablet.', 'elementor' ),
			'type' => Controls_Manager::MEDIA,
			'label_block' => true,
			'condition' => [
				'background' => [ 'video' ],
			],
			'selectors' => [
				$args['selector'] . ' .elementor-background-video-fallback' => 'background: url("{{URL}}") 50% 50%; background-size: cover;',
			],
		];
		// End Background:video

		return $controls;
	}
}
