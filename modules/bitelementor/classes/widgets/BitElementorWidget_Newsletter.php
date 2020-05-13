<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class BitElementorWidget_Newsletter
{
    /**
    * @var int
    */
    public $id_base;

    /**
    * @var string widget name
    */
    public $name;
    /**
    * @var string widget icon
    */
    public $icon;

    public $status = 1;

    public function __construct()
    {
        if(!Module::isEnabled('ps_emailsubscription')) {
            $this->status = 0;
        }

        $this->name = BitElementorWpHelper::__('Newsletter', 'elementor');
        $this->id_base = 'Newsletter';
        $this->icon = 'email-field';
        $this->context = Context::getContext();
    }

    public function getForm()
    {
        return [
            'section_pswidget_options' => [
                'label' => BitElementorWpHelper::__('Widget settings', 'elementor'),
                'type' => 'section',
            ],
            'width' => [
                'label' => BitElementorWpHelper::__( 'Max width', 'elementor' ),
                'type' => 'slider',
                'default' => [
                    'size' => 300,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 250,
                        'max' => 1400,
                    ],
                ],
                'section' => 'section_pswidget_options',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-form' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ],
            'height' => [
                'label' => BitElementorWpHelper::__( 'Input height', 'elementor' ),
                'type' => 'slider',
                'default' => [
                    'size' => 45,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 25,
                        'max' => 80,
                    ],
                ],
                'section' => 'section_pswidget_options',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-input' => 'min-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-newsletter-btn' => 'min-height: {{SIZE}}{{UNIT}};',

                ],
            ],
            'align' => [
                'label' => BitElementorWpHelper::__( 'Alignment', 'elementor' ),
                'type' => 'choose',
                'options' => [
                    'left' => [
                        'title' => BitElementorWpHelper::__( 'Left', 'elementor' ),
                        'icon' => 'align-left',
                    ],
                    'center' => [
                        'title' => BitElementorWpHelper::__( 'Center', 'elementor' ),
                        'icon' => 'align-center',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .elementor-newsletter-input' => 'text-align: {{VALUE}};',
                ],
                'section' => 'section_pswidget_options',
            ],
            'section_style_input' => [
                'label' => BitElementorWpHelper::__('Input', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
            ],
            'input_bg' => [
                'label' => BitElementorWpHelper::__('Background', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_input',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-input' => 'background: {{VALUE}};',
                ],
            ],
            'input_color' => [
                'label' => BitElementorWpHelper::__('Text color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_input',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-input' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-newsletter-input::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-newsletter-input:-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-newsletter-input::placeholder' => 'color: {{VALUE}};',
                ],
            ],
            'input_border' => [
                'group_type_control' => 'border',
                'name' => 'border',
                'label' => BitElementorWpHelper::__('Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_input',
                'selector' => '{{WRAPPER}} .elementor-newsletter-input',
            ],
            'nl_box-shadow' => [
                'group_type_control' => 'box-shadow',
                'name' => 'nl_box_shadow',
                'label' => BitElementorWpHelper::__('Box shadow', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_input',
                'selector' => '{{WRAPPER}} .elementor-newsletter-input',
            ],
            'input_bg_hover' => [
                'label' => BitElementorWpHelper::__('Focus - background', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_input',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-input:focus' => 'background: {{VALUE}};',
                ],
            ],
            'input_color_hover' => [
                'label' => BitElementorWpHelper::__('Focus - color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_input',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-input:focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-newsletter-input:focus::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-newsletter-input:focus:-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-newsletter-input:focus::placeholder' => 'color: {{VALUE}};',
                ],
            ],
            'input_border_h' => [
                'label' => BitElementorWpHelper::__('Focus - border color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_input',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-input:focus' => 'border-color: {{VALUE}};',
                ],
            ],
            'section_style_btn' => [
                'label' => BitElementorWpHelper::__('Button', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
            ],
            'btn_bg' => [
                'label' => BitElementorWpHelper::__('Background', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_btn',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-btn' => 'background: {{VALUE}};',
                ],
            ],
            'btn_color' => [
                'label' => BitElementorWpHelper::__('Text', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_btn',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-btn' => 'color: {{VALUE}};',
                ],
            ],
            'btn_border' => [
                'group_type_control' => 'border',
                'name' => 'btn_border',
                'label' => BitElementorWpHelper::__('Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_btn',
                'selector' => '{{WRAPPER}} .elementor-newsletter-btn',
            ],
            'btn_border_radius' => [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => 'dimensions',
                'size_units' => [ 'px', '%' ],
                'tab' => 'style',
                'section' => 'section_style_btn',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],
            'btn_padding' => [
                'label' => BitElementorWpHelper::__( 'Padding', 'elementor' ),
                'type' => 'dimensions',
                'tab' => 'style',
                'section' => 'section_style_btn',
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],
            'btn_margin' => [
				'label' => BitElementorWpHelper::__( 'Margin', 'elementor' ),
                'type' =>'dimensions',
                'responsive' => true,
				'size_units' => [ 'px', '%' ],
				'tab' => 'style',
                'section' => 'section_style_btn',
				'selectors' => [
					'{{WRAPPER}} .elementor-newsletter-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
            ],
            'btn_bg_hover' => [
                'label' => BitElementorWpHelper::__('Hover - background', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_btn',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-btn:hover' => 'background: {{VALUE}};',
                ],
            ],
            'btn_color_hover' => [
                'label' => BitElementorWpHelper::__('Hover - text', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_btn',
                'selectors' => [
                    '{{WRAPPER}} .elementor-newsletter-btn:hover' => 'color: {{VALUE}};',
                ],
            ],
        ];
    }

    public function parseOptions($optionsSource, $preview = false){
        $options = array();
        $options['id_module'] = Module::getModuleIdByName('bitelementor');
        return $options;
    }
}
