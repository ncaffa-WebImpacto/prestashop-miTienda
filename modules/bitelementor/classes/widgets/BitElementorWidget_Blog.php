<?php
/**
 * 2007-2015 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2015 PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class ElementorWidget_Blog
 */
class BitElementorWidget_Blog
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
    public $context;

    protected $spacer_size = '2';

    public $status = 1;

    public $editMode = false;

    public function __construct()
    {
        if (!Module::isEnabled('bitblog')) {
            $this->status = 0;
        }

        $this->name = BitElementorWpHelper::__('Blog posts', 'elementor');
        $this->id_base = 'Blog';
        $this->icon = 'post-list';
        $this->context = Context::getContext();

        if (isset($this->context->controller->controller_name) && $this->context->controller->controller_name == 'BitElementorEditor') {
            $this->editMode = true;
        }
    }


    public function getForm()
    {
        return [
            'section_pswidget_options' => [
                'label' => BitElementorWpHelper::__('Widget settings', 'elementor'),
                'type' => 'section',
            ],
            'posts_source' => [
                'label' => BitElementorWpHelper::__('Blog Source', 'elementor'),
                'type' => 'select',
                'default' => 'latest',
                'section' => 'section_pswidget_options',
                'options' => [
                    'latest' => BitElementorWpHelper::__('Latest', 'elementor'),
                    'popular' => BitElementorWpHelper::__('Popular', 'elementor'),
                ],
            ],
            'posts_style' => [
                'label' => BitElementorWpHelper::__('Blog Style', 'elementor'),
                'type' => 'select',
                'default' => 'style1',
                'section' => 'section_pswidget_options',
                'options' => [
                    'style1' => BitElementorWpHelper::__('Style 1', 'elementor'),
                    'style2' => BitElementorWpHelper::__('Style 2', 'elementor'),
                ],
            ],
            'post_width' => [
                'label' => \BitElementorWpHelper::__( 'Blog Width', 'elementor' ),
                'type' => 'number',
                'default' => '300',
                'min' => '100',
                'section' => 'section_pswidget_options',
            ],
            'post_height' => [
                'label' => \BitElementorWpHelper::__( 'Blog Height', 'elementor' ),
                'type' => 'number',
                'default' => '300',
                'min' => '100',
                'section' => 'section_pswidget_options',
            ],
            'posts_limit' => [
                'label' => BitElementorWpHelper::__('Blog Limit', 'elementor'),
                'type' => 'number',
                'default' => '10',
                'min' => '1',
                'section' => 'section_pswidget_options',
            ],
            'section_slider_blog' => [
                'label' => BitElementorWpHelper::__('Slider settings', 'elementor'),
                'type' => 'section',
            ],
            'view' => [
                'label' => BitElementorWpHelper::__('View', 'elementor'),
                'label_block' => true,
                'type' => 'select',
                'default' => 'grid',
                'condition' => [
                    'view!' => 'default',
                ],
                'section' => 'section_slider_blog',
                'options' => [
                    'carousel' => BitElementorWpHelper::__('Carousel', 'elementor'),
                    'grid' => BitElementorWpHelper::__('Grid', 'elementor'),
                ],
            ],
            'items_per_column' => [
                'label' => BitElementorWpHelper::__('No. of Rows to Displays per Column', 'elementor'),
                'label_block' => true,
                'type' => 'number',
                'default' => '1',
                'min' => '1',
                'max' => '3',
                'step'    => '1',
                'condition' => [
                    'view' => 'carousel',
                ],
                'section' => 'section_slider_blog',
            ],
            'navigation' => [
                'label' => BitElementorWpHelper::__('Navigation', 'elementor'),
                'type' => 'select',
                'default' => 'true',
                'section' => 'section_slider_blog',
                'condition' => [
                    'view' => 'carousel',
                ],
                'options' => [
                    'true' => BitElementorWpHelper::__('Yes', 'elementor'),
                    'false' => BitElementorWpHelper::__('No', 'elementor'),
                ],
            ],
            'dots' => [
                'label' => BitElementorWpHelper::__('Dots', 'elementor'),
                'type' => 'select',
                'default' => 'false',
                'section' => 'section_slider_blog',
                'condition' => [
                    'view' => 'carousel',
                ],
                'options' => [
                    'true' => BitElementorWpHelper::__('Yes', 'elementor'),
                    'false' => BitElementorWpHelper::__('No', 'elementor'),
                ],
            ],
            'autoplay' => [
                'label' => BitElementorWpHelper::__('Autoplay', 'elementor'),
                'type' => 'select',
                'default' => 'true',
                'section' => 'section_slider_blog',
                'condition' => [
                    'view' => 'carousel',
                ],
                'options' => [
                    'true' => BitElementorWpHelper::__('Yes', 'elementor'),
                    'false' => BitElementorWpHelper::__('No', 'elementor'),
                ],
            ],
            'autoplay_speed' => [
                'label' => BitElementorWpHelper::__('Autoplay Speed', 'elementor'),
                'type' => 'number',
                'default' => '2000',
                'min' => '1000',
                'max' => '5000',
                'step' => '1000',
                'section' => 'section_slider_blog',
                'condition' => [
                    'view' => 'carousel',
					'autoplay' => 'true',
				],
            ],
            'pause_on_hover' => [
                'label' => \BitElementorWpHelper::__( 'Pause on Hover', 'elementor' ),
                'type' => 'select',
                'section' => 'section_slider_blog',
                'condition' => [
                    'view' => 'carousel',
                ],
                'default' => 'true',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ],
            'infinite' => [
                'label' => \BitElementorWpHelper::__( 'Infinite Loop', 'elementor' ),
                'type' => 'select',
                'section' => 'section_slider_blog',
                'condition' => [
                    'view' => 'carousel',
                ],
                'default' => 'false',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ],
            'xldevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device > 1200', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_blog',
                'default' => [
					'size' => 7,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 10,
                        'step' => 1,
					],
                ],
                'condition' => [
                    'view' => ['carousel', 'grid'],
                ],
            ],
            'lgdevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 1200', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_blog',
                'default' => [
					'size' => 6,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 8,
                        'step' => 1,
					],
                ],
                'condition' => [
                    'view' => ['carousel', 'grid'],
                ],
            ],
            'mddevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 992', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_blog',
                'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
					],
                ],
                'condition' => [
                    'view' => ['carousel', 'grid'],
                ],
            ],
            'smdevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 768', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_blog',
                'default' => [
					'size' => 3,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 5,
                        'step' => 1,
					],
                ],
                'condition' => [
                    'view' => ['carousel', 'grid'],
                ],
            ],
            'xsdevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 544', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_blog',
                'default' => [
					'size' => 2,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 4,
                        'step' => 1,
					],
                ],
                'condition' => [
                    'view' => ['carousel', 'grid'],
                ],
            ],
            'section_style_navigation' => [
                'label' => BitElementorWpHelper::__('Navigation', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
                'condition' => [
                    'navigation' => 'true',
                ],
            ],
            'arrows_position' => [
                'label' => BitElementorWpHelper::__('Arrows Position', 'elementor'),
                'type' => 'select',
                'default' => 'inside',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'condition' => [
                    'navigation' => 'true',
                ],
                'options' => [
                    'inside' => BitElementorWpHelper::__('Inside', 'elementor'),
                    'outside' => BitElementorWpHelper::__('Outside', 'elementor'),
                ],
            ],
            'arrows_width' => [
                'label' => \BitElementorWpHelper::__( 'Arrows Width', 'elementor' ),
                'type' => 'slider',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'default' => [
                    'size' => 40,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'condition' => [
                    'navigation' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ],
            'arrows_height' => [
                'label' => \BitElementorWpHelper::__( 'Arrows Height', 'elementor' ),
                'type' => 'slider',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'default' => [
                    'size' => 40,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'condition' => [
                    'navigation' => [ 'true'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ],
            'arrows_size' => [
                'label' => \BitElementorWpHelper::__( 'Arrows Size', 'elementor' ),
                'type' => 'slider',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 60,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
            ],
            'arrows_color' => [
                'label' => \BitElementorWpHelper::__( 'Arrows Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
            ],
            'arrows_bg_color' => [
                'label' => \BitElementorWpHelper::__( 'Arrows background', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
            ],
            'arrow_border' => [
                'group_type_control' => 'border',
                'name' => 'arrow_border',
                'label' => BitElementorWpHelper::__('Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_navigation',
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
                'selector' => '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div',
            ],
            'nav_border_radius' => [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => 'dimensions',
                'size_units' => [ 'px', '%' ],
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],
            'heading_style_arrows_hover' => [
                'label' => \BitElementorWpHelper::__( 'Arrows Hover', 'elementor' ),
                'type' => 'heading',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'separator' => 'before',
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
            ],
            'arrows_color_hover' => [
                'label' => \BitElementorWpHelper::__( 'Arrows Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
            ],
            'arrows_bg_color_hover' => [
                'label' => \BitElementorWpHelper::__( 'Arrows Background', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel  .owl-nav > div:hover' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
            ],
            'arrows_border_hover' => [
                'label' => \BitElementorWpHelper::__( 'Arrows Border Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_navigation',
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-nav > div:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation' => [ 'true' ],
                ],
            ],
            //dots
            'section_style_dots' => [
                'label' => BitElementorWpHelper::__('Dots', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
                'condition' => [
                    'dots' => 'true',
                ],
            ],

            'dots_position' => [
                'label' => \BitElementorWpHelper::__( 'Dots Position', 'elementor' ),
                'type' => 'select',
                'default' => 'outside',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'options' => [
                    'outside' => \BitElementorWpHelper::__( 'Outside', 'elementor' ),
                    'inside' => \BitElementorWpHelper::__( 'Inside', 'elementor' ),
                ],
                'condition' => [
                    'dots' => 'true',
                ],
            ],
    
            'dots_width' => [
                'label' => \BitElementorWpHelper::__( 'Dots Width', 'elementor' ),
                'type' => 'slider',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'default' => [
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ],
    
            'dots_height' => [
                'label' => \BitElementorWpHelper::__( 'Dots Height', 'elementor' ),
                'type' => 'slider',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'default' => [
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ],

            'dots_color' => [
                'label' => \BitElementorWpHelper::__( 'Dots Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}};',
                ],
                'condition' => [
                     'dots' => 'true',
                ],
            ],
            'dots_border' => [
                'group_type_control' => 'border',
                'name' => 'dots_border',
                'label' => BitElementorWpHelper::__('Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_dots',
                'condition' => [
                    'dots' => [ 'true' ],
                ],
                'selector' => '{{WRAPPER}} .elementor-blog-carousel .owl-dots .owl-dot span',
            ],
            'border_radius' => [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => 'dimensions',
                'size_units' => [ 'px', '%' ],
                'tab' => 'style',
                'section' => 'section_style_dots',
                'condition' => [
                    'dots' => [ 'true' ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],
            'heading_style_dots_active' => [
                'label' => \BitElementorWpHelper::__( 'Dots Active', 'elementor' ),
                'type' => 'heading',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'separator' => 'before',
                'condition' => [
                    'dots' => [ 'true' ],
                ],
            ],
            'dots_color_active' => [
                'label' => \BitElementorWpHelper::__( 'Dots Active Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'dots' => 'true',
                ],
            ],
            'dots_border_active' => [
                'label' => \BitElementorWpHelper::__( 'Dots Border Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'selectors' => [
                    '{{WRAPPER}} .elementor-blog-carousel .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'dots' => 'true',
                ],
            ],
            'section_style_post' => [
                'label' => BitElementorWpHelper::__('Post', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
            ],
            // 'post_margin' => [
            //     'label' => BitElementorWpHelper::__('Box spacing', 'elementor'),
            //     'type' => 'slider',
            //     'tab' => 'style',
            //     'section' => 'section_style_post',
            //     'size_units' => [ 'px', '%' ],
            //     'default' => [
            //         'unit' => 'px',
            //     ],
            //     'range' => [
            //         'px' => [
            //             'min' => 0,
            //         ],
            //     ],
            //     'selectors' => [
            //         '{{WRAPPER}} .blog-container' => 'padding:  {{SIZE}}{{UNIT}};',
            //         '{{WRAPPER}} .elementor-blog-posts .block_content.row' => 'margin: 0 -{{SIZE}}{{UNIT}};',
            //     ],
            // ],
            'post_padding' => [
                'label' => BitElementorWpHelper::__('Box padding', 'elementor'),
                'type' => 'slider',
                'tab' => 'style',
                'size_units' => [ 'px', '%' ],
                'section' => 'section_style_post',
                'default' => [
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_post' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ],
            'post_bg_color' => [
                'label' => BitElementorWpHelper::__('Background color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_post',
                'selectors' => [
                    '{{WRAPPER}} .blog_post' => 'background: {{VALUE}};',
                ],
            ],
            'post_title_color' => [
                'label' => BitElementorWpHelper::__('Title color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_post',
                'selectors' => [
                    '{{WRAPPER}} .blog_title a' => 'color: {{VALUE}};',
                ],
            ],
            'post_text_color' => [
                'label' => BitElementorWpHelper::__('Text color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_post',
                'selectors' => [
                    '{{WRAPPER}} .blog_content' => 'color: {{VALUE}};',
                ],
            ],
            'border' => [
                'group_type_control' => 'border',
                'name' => 'post_border',
                'label' => BitElementorWpHelper::__('Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_post',
                'selector' => '{{WRAPPER}} .blog_post',
            ],
            'box-shadow' => [
                'group_type_control' => 'box-shadow',
                'name' => 'post_box_shadow',
                'label' => BitElementorWpHelper::__('Box shadow', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_post',
                'selector' => '{{WRAPPER}} .blog_post',
            ],
            'section_style_post_h' => [
                'label' => BitElementorWpHelper::__('Post - hover', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
            ],
            'post_bg_color_h' => [
                'label' => BitElementorWpHelper::__('Product box bg color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_post_h',
                'selectors' => [
                    '{{WRAPPER}} ..blog_post:hover' => 'background: {{VALUE}};',
                ],
            ],
            'post_title_color_h' => [
                'label' => BitElementorWpHelper::__('Title color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_post_h',
                'selectors' => [
                    '{{WRAPPER}} .blog_post:hover .blog_title a' => 'color: {{VALUE}};',
                ],
            ],
            'post_text_color_h' => [
                'label' => BitElementorWpHelper::__('Text color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_post_h',
                'selectors' => [
                    '{{WRAPPER}} .blog_post:hover' => 'color: {{VALUE}};',
                ],
            ],
            'border_h' => [
                'label' => BitElementorWpHelper::__('Border color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_post_h',
                'selectors' => [
                    '{{WRAPPER}} .blog_post:hover' => 'border-color: {{VALUE}};',
                ],
            ],
            'box-shadow_h' => [
                'group_type_control' => 'box-shadow',
                'name' => 'product_box_shadow_h',
                'label' => BitElementorWpHelper::__('Box shadow', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_post_h',
                'selector' => '{{WRAPPER}} .blog_post:hover',
            ],
        ];
    }

    public function parseOptions($optionsSource, $preview = false)
    {
        
        if (file_exists(_PS_MODULE_DIR_.'bitblog/classes/config.php')) {
			require_once(_PS_MODULE_DIR_.'bitblog/loader.php');
			$authors = array();
			$config = BitBlogConfig::getInstance();
			$helper = BitBlogHelper::getInstance();
            
			$config->setVar('element_blogs_limit', $optionsSource['posts_limit']);
			$config->setVar('element_blogs_width', $optionsSource['post_width']);
			$config->setVar('element_blogs_height', $optionsSource['post_height']);
            
			$limit = (int)$config->get('element_blogs_limit', 6);
            
            $source = $optionsSource['posts_source'];
            if ($source == 'latest') {
                $blogs = BitBlogBlog::getListBlogs(null, $this->context->language->id, 0, $limit, 'date_add', 'DESC', array(), true);
            } else{
                $blogs = BitBlogBlog::getListBlogs(null, $this->context->language->id, 1, $limit, 'hits', 'DESC', array(), true);
            }


			$image_w = (int)$config->get('element_blogs_width', 170);
			$image_h = (int)$config->get('element_blogs_height', 130);

			$link = BitBlogHelper::getInstance()->getFontBlogLink();

			foreach ($blogs as $key => $blog) {
				$blog = BitBlogHelper::buildBlog($helper, $blog, $image_w, $image_h, $config);
				if ($blog['id_employee']) {
					if (!isset($authors[$blog['id_employee']])) {
						$authors[$blog['id_employee']] = new Employee($blog['id_employee']);
					}

					if ($blog['author_name'] != '') {
                        $blog['author'] = $blog['author_name'];
                        $blog['author_link'] = $helper->getBlogAuthorLink($blog['author_name']);
                    } else {
                        $blog['author'] = $authors[$blog['id_employee']]->firstname.' '.$authors[$blog['id_employee']]->lastname;
                        $blog['author_link'] = $helper->getBlogAuthorLink($authors[$blog['id_employee']]->id);
                    }
				} else {
					$blog['author'] = '';
					$blog['author_link'] = '';
				}
				$blogs[$key] = $blog;
			}
        }

        $owl_options = [
			'nav' => ( 'true' === $optionsSource['navigation'] ),
			'dots' => ( 'true' === $optionsSource['dots'] ),
			'autoplay' => ( 'true' === $optionsSource['autoplay'] ),
			'autoplayTimeout' => \BitElementorWpHelper::absint( $optionsSource['autoplay_speed'] ),
			'loop' => ( 'true' === $optionsSource['infinite'] ),
			'autoplayHoverPause' => ( 'true' === $optionsSource['pause_on_hover'] ),
			'responsive' => [
				'0' => [
					'items' => $optionsSource['xsdevice']['size']
				],
				'544' => [
					'items' => $optionsSource['smdevice']['size']
				],
				'768' => [
					'items' => $optionsSource['mddevice']['size']
				],
				'992' => [
					'items' => $optionsSource['lgdevice']['size']
				],
				'1200' => [
					'items' => $optionsSource['xldevice']['size']
				],
			]
        ];
        $return = [
            'posts' => $blogs,
            'style' => $optionsSource['posts_style'],
            'owl_options' => \BitElementorWpHelper::jsonEncode( $owl_options ),
            'arrows_position' =>  $optionsSource['arrows_position'],
            'dots_position' =>  $optionsSource['dots_position'],
            'xld' =>  $optionsSource['xldevice']['size'],
            'lgd' =>  $optionsSource['lgdevice']['size'],
            'mdd' =>  $optionsSource['mddevice']['size'],
            'smd' =>  $optionsSource['smdevice']['size'],
            'xsd' =>  $optionsSource['xsdevice']['size'],
            'rows' =>  $optionsSource['items_per_column'],
            'view' => $optionsSource['view'],
        ];
        return $return;
    }
}
