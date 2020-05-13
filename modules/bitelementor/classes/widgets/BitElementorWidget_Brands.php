<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
* Class ElementorWidget_Brands
*/
class BitElementorWidget_Brands
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
    public $editMode = false;


    public function __construct()
    {
        $this->name = BitElementorWpHelper::__('Brands logos', 'elementor');
        $this->id_base = 'Brands';
        $this->icon = 'carousel';

        $this->context = Context::getContext();

        if (isset($this->context->controller->controller_name) && $this->context->controller->controller_name == 'BitElementorEditor') {
            $this->editMode = true;
        }
    }

    public function getForm()
    {
        $brands = [];

        if ($this->editMode) {
            $brands = Manufacturer::getManufacturers();
        }
        
        $brandsOptions = array();
        $brandsImageOptions = array();
        $brandsSelect = array();
        $brandsOrder = array();
        $brandimage = ImageType::getImagesTypes('manufacturers');
        
        $brandsSelect[0] = BitElementorWpHelper::__('Show all', 'elementor');
        $brandsSelect[1] = BitElementorWpHelper::__('Manual select', 'elementor');

        $brandsOrder[0] = BitElementorWpHelper::__('Default', 'elementor');
        $brandsOrder[1] = BitElementorWpHelper::__('Alphabetical', 'elementor');

        foreach ($brands as $brand) {
            $brandsOptions[$brand['id_manufacturer']] = $brand['name'];
        }

        foreach ($brandimage as $image) {
            $brandsImageOptions[str_replace('_default', '', $image['name'])] = $image['name'];
        }

        return [
            'section_pswidget_options' => [
                'label' => BitElementorWpHelper::__('Widget settings', 'elementor'),
                'type' => 'section',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div' => 'background: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel  .owl-nav > div:hover' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-nav > div:hover' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ],

            'dots_color' => [
                'label' => \BitElementorWpHelper::__( 'Dots Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'selectors' => [
                    '{{WRAPPER}} .elementor-brands-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-brands-carousel .owl-dots .owl-dot span',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-brands-carousel .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'dots' => 'true',
                ],
            ],
            'brand_select' => [
                'label' => BitElementorWpHelper::__('Selection', 'elementor'),
                'type' => 'select',
                'default' => '0',
                'label_block' => true,
                'section' => 'section_pswidget_options',
                'options' => $brandsSelect,
            ],
            'brand_list' => [
                'label' => BitElementorWpHelper::__('Select brands', 'elementor'),
                'type' => 'select_sort',
                'default' => '0',
                'label_block' => true,
                'multiple' => true,
                'section' => 'section_pswidget_options',
                'options' => $brandsOptions,
                'condition' => [
                    'brand_select' => '1',
                ],
            ],
            'brand_image' => [
                'label' => BitElementorWpHelper::__('Image Type', 'elementor'),
                'type' => 'select',
                'default' => 'tdmanufacturer',
                'label_block' => true,
                'section' => 'section_pswidget_options',
                'options' => $brandsImageOptions,
            ],
            'brand_name' => [
                'label' => \BitElementorWpHelper::__( 'Display Brand Name', 'elementor' ),
                'type' => 'select',
                'default' => 'false',
                'label_block' => true,
                'section' => 'section_pswidget_options',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ],
            'section_slider_brand' => [
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
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
            ],
            'navigation' => [
                'label' => BitElementorWpHelper::__('Navigation', 'elementor'),
                'type' => 'select',
                'default' => 'true',
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
                'condition' => [
                    'view' => 'carousel',
					'autoplay' => 'true',
				],
            ],
            'pause_on_hover' => [
                'label' => \BitElementorWpHelper::__( 'Pause on Hover', 'elementor' ),
                'type' => 'select',
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
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
                'section' => 'section_slider_brand',
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
        ];
    }

    public function parseOptions($optionsSource, $preview = false)
    {
        $selectedBrands = $optionsSource['brand_list'];
        $brandsType = $optionsSource['brand_select'];
        $brands = [];

        $widgetOptions = [];

        if ($brandsType == 0) {
            $allBrands = Manufacturer::getManufacturers();
            foreach ($allBrands as $brand) {
                $brands[$brand['id_manufacturer']]['name'] = $brand['name'];
                $brands[$brand['id_manufacturer']]['link'] = Context::getContext()->link->getManufacturerLink($brand['id_manufacturer'], $brand['link_rewrite']);
                $brands[$brand['id_manufacturer']]['image'] = Context::getContext()->link->getManufacturerImageLink($brand['id_manufacturer'], ImageType::getFormattedName($optionsSource['brand_image']));
            }
        } else {
            if ($selectedBrands) {
                foreach ($selectedBrands as $brand) {
                    $manufacturer = new Manufacturer($brand, $this->context->language->id);
                    $brands[$brand]['name'] = $manufacturer->name;
                    $brands[$brand]['link'] = Context::getContext()->link->getManufacturerLink($manufacturer);
                    $brands[$brand]['image'] = Context::getContext()->link->getManufacturerImageLink($brand, ImageType::getFormattedName($optionsSource['brand_image']));
                }
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
        
        $widgetOptions['brands'] = $brands;
        $widgetOptions['brand_name'] = ( 'true' === $optionsSource['brand_name'] );
        $widgetOptions['owl_options'] = \BitElementorWpHelper::jsonEncode( $owl_options );
        $widgetOptions['xld'] =  $optionsSource['xldevice']['size'];
        $widgetOptions['arrows_position'] =  $optionsSource['arrows_position'];
        $widgetOptions['dots_position'] =  $optionsSource['dots_position'];
        $widgetOptions['lgd'] =  $optionsSource['lgdevice']['size'];
        $widgetOptions['mdd'] =  $optionsSource['mddevice']['size'];
        $widgetOptions['smd'] =  $optionsSource['smdevice']['size'];
        $widgetOptions['xsd'] =  $optionsSource['xsdevice']['size'];
        $widgetOptions['rows'] =  $optionsSource['items_per_column'];
        $widgetOptions['view'] =  $optionsSource['view'];

        return $widgetOptions;
    }
}
