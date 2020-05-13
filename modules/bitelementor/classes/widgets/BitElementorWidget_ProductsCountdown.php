<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}
use PrestaShop\PrestaShop\Adapter\BestSales\BestSalesProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\NewProducts\NewProductsProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\PricesDrop\PricesDropProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Manufacturer\ManufacturerProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

/**
* Class ElementorWidget_ProductsCountdown
*/
class BitElementorWidget_ProductsCountdown
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
        $this->name = BitElementorWpHelper::__('Products Countdown', 'elementor');
        $this->id_base = 'ProductsCountdown';
        $this->icon = 'countdown';
        $this->context = Context::getContext();

        if (isset($this->context->controller->controller_name) && $this->context->controller->controller_name == 'BitElementorEditor') {
            $this->editMode = true;
        }
    }

    public function getForm()
    {
        $categories = [];
        $productSourceOptions = [];

        if ($this->editMode) {
            $categories = $this->generateCategoriesOption($this->customGetNestedCategories($this->context->shop->id,
            null, (int)$this->context->language->id, false));
        }

        $productSourceOptions['ms'] = BitElementorWpHelper::__('Manual selection', 'elementor');
        $productSourceOptions['pd'] = BitElementorWpHelper::__('Price drops', 'elementor');
        $productSourceOptions = array_merge($productSourceOptions, $categories);

        return [
            'section_pswidget_options' => [
                'label' => BitElementorWpHelper::__('Widget settings', 'elementor'),
                'type' => 'section',
            ],
            'style_preset' => [
                'label' => BitElementorWpHelper::__('Product Style', 'elementor'),
                'type' => 'select',
                'default' => '1',
                'section' => 'section_pswidget_options',
                'options' => [
                    '1' => BitElementorWpHelper::__('Style 1', 'elementor'),
                    '2' => BitElementorWpHelper::__('Style 2', 'elementor'),
                ],
            ],
            'product_source' => [
                'label' => BitElementorWpHelper::__('Products source', 'elementor'),
                'type' => 'select',
                'default' => 'ms',
                'label_block' => true,
                'section' => 'section_pswidget_options',
                'options' => $productSourceOptions,
            ],
            'products_ids' => [
                'label' => BitElementorWpHelper::__('Search for products', 'elementor'),
                'placeholder' => BitElementorWpHelper::__( 'Product name, id, ref', 'elementor' ),
                'type' => 'autocomplete_products',
                'label_block' => true,
                'condition' => [
                    'product_source' => ['ms'],
                ],
                'section' => 'section_pswidget_options',
            ],
            'products_limit' => [
                'label' => BitElementorWpHelper::__('Limit', 'elementor'),
                'type' => 'number',
                'default' => '10',
                'min' => '1',
                'condition' => [
                    'product_source!' => ['ms'],
                ],
                'section' => 'section_pswidget_options',
            ],
            'order_by' => [
                'label' => BitElementorWpHelper::__('Order by', 'elementor'),
                'type' => 'select',
                'default' => 'position',
                'condition' => [
                    'product_source!' => ['ms'],
                ],
                'section' => 'section_pswidget_options',
                'options' => [
                    'position' => BitElementorWpHelper::__('Position', 'elementor'),
                    'name' => BitElementorWpHelper::__('Name', 'elementor'),
                    'date_add' => BitElementorWpHelper::__('Date add', 'elementor'),
                    'price' => BitElementorWpHelper::__('Price', 'elementor'),
                    'random' => BitElementorWpHelper::__('Random (works only with categories)', 'elementor'),
                ],
            ],
            'order_way' => [
                'label' => BitElementorWpHelper::__('Order way', 'elementor'),
                'type' => 'select',
                'default' => 'asc',
                'section' => 'section_pswidget_options',
                'condition' => [
                    'product_source!' => ['ms'],
                ],
                'options' => [
                    'asc' => BitElementorWpHelper::__('Ascending', 'elementor'),
                    'desc' => BitElementorWpHelper::__('Descending', 'elementor'),
                ],
            ],
            'section_slider_list' => [
                'label' => BitElementorWpHelper::__('Slider settings', 'elementor'),
                'type' => 'section',
            ],
            'items_per_column' => [
                'label' => BitElementorWpHelper::__('No. of Rows to Displays per Column', 'elementor'),
                'label_block' => true,
                'type' => 'number',
                'default' => '1',
                'min' => '1',
                'max' => '3',
                'step'    => '1',
                'section' => 'section_slider_list',
            ],
            'navigation' => [
                'label' => BitElementorWpHelper::__('Navigation', 'elementor'),
                'type' => 'select',
                'default' => 'true',
                'section' => 'section_slider_list',
                'options' => [
                    'true' => BitElementorWpHelper::__('Yes', 'elementor'),
                    'false' => BitElementorWpHelper::__('No', 'elementor'),
                ],
            ],
            'dots' => [
                'label' => BitElementorWpHelper::__('Dots', 'elementor'),
                'type' => 'select',
                'default' => 'false',
                'section' => 'section_slider_list',
                'options' => [
                    'true' => BitElementorWpHelper::__('Yes', 'elementor'),
                    'false' => BitElementorWpHelper::__('No', 'elementor'),
                ],
            ],
            'autoplay' => [
                'label' => BitElementorWpHelper::__('Autoplay', 'elementor'),
                'type' => 'select',
                'default' => 'true',
                'section' => 'section_slider_list',
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
                'section' => 'section_slider_list',
                'condition' => [
                    'autoplay' => 'true',
                ],
            ],
            'pause_on_hover' => [
                'label' => \BitElementorWpHelper::__( 'Pause on Hover', 'elementor' ),
                'type' => 'select',
                'section' => 'section_slider_list',
                'default' => 'true',
                'options' => [
                    'true' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'false' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
            ],
            'infinite' => [
                'label' => \BitElementorWpHelper::__( 'Infinite Loop', 'elementor' ),
                'type' => 'select',
                'section' => 'section_slider_list',
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
                'section' => 'section_slider_list',
                'default' => [
					'size' => 4,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
					],
                ],
            ],
            'lgdevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 1200', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_list',
                'default' => [
					'size' => 4,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 5,
                        'step' => 1,
					],
                ],
            ],
            'mddevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 992', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_list',
                'default' => [
					'size' => 3,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 4,
                        'step' => 1,
					],
                ],
            ],
            'smdevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 768', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_list',
                'default' => [
					'size' => 2,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 3,
                        'step' => 1,
					],
                ],
            ],
            'xsdevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 544', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_list',
                'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 2,
                        'step' => 1,
					],
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-nav > div i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-nav > div' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-nav > div' => 'background: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-products-carousel .owl-nav > div',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-nav > div:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-products-carousel  .owl-nav > div:hover' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-nav > div:hover' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ],

            'dots_color' => [
                'label' => \BitElementorWpHelper::__( 'Dots Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'selectors' => [
                    '{{WRAPPER}} .elementor-products-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-products-carousel .owl-dots .owl-dot span',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-products-carousel .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'dots' => 'true',
                ],
            ],
            'section_style_product' => [
                'label' => BitElementorWpHelper::__('Product', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
            ],

            'product_box_padding' => [
                'label' => BitElementorWpHelper::__( 'Product box padding ', 'elementor' ),
                'type' => 'slider',
                'tab' => 'style',
                'section' => 'section_style_product',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .products.row' => 'margin-left: -{{SIZE}}{{UNIT}}; margin-right:-{{SIZE}}{{UNIT}} ;',
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                    ],
                ],
            ],
            
            'product_bg_color' => [
                'label' => BitElementorWpHelper::__('Product box bg color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature' => 'background: {{VALUE}};',
                ],
            ],

            'product_name_typography' => [
                'group_type_control' => 'typography',
                'name' => 'product_name_typography',
                'label' => BitElementorWpHelper::__('Product name font size', 'elementor'),
                'tab' => 'style',
                'section' => 'section_style_product',
                'selector' => '{{WRAPPER}} .product-miniature .product-container .product-title a',
            ],
            'product_text_color' => [
                'label' => BitElementorWpHelper::__('Product Title Color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature .product-container .product-title a' => 'color: {{VALUE}};',
                ],
            ],
            'product_price_color' => [
                'label' => BitElementorWpHelper::__('Price color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature .product-container .product-price-and-shipping .price' => 'color: {{VALUE}};',
                ],
            ],
            'product_old_color' => [
                'label' => BitElementorWpHelper::__('Old Price Color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature .product-price-and-shipping .regular-price' => 'color: {{VALUE}};',
                ],
            ],
            'product_stars_color' => [
                'label' => BitElementorWpHelper::__('Product stars color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature .star:after' => 'color: {{VALUE}};',
                ],
            ],
            'border' => [
                'group_type_control' => 'border',
                'name' => 'product_border',
                'label' => BitElementorWpHelper::__('Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_product',
                'selector' => '{{WRAPPER}} .product-miniature',
            ],
            'box-shadow' => [
                'group_type_control' => 'box-shadow',
                'name' => 'product_box_shadow',
                'label' => BitElementorWpHelper::__('Box shadow', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_product',
                'selector' => '{{WRAPPER}} .product-miniature',
            ],
            'section_style_product_h' => [
                'label' => BitElementorWpHelper::__('Product hover', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
            ],
            'product_bg_color_h' => [
                'label' => BitElementorWpHelper::__('Product box bg color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product_h',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature:hover' => 'background: {{VALUE}};',
                ],
            ],
            'product_text_color_h' => [
                'label' => BitElementorWpHelper::__('Product Title color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product_h',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature:hover .product-title a' => 'color: {{VALUE}};',
                ],
            ],
            'product_price_color_h' => [
                'label' => BitElementorWpHelper::__('Product price color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product_h',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature:hover .product-price-and-shipping .price' => 'color: {{VALUE}};',
                ],
            ],
            'product_stars_color_h' => [
                'label' => BitElementorWpHelper::__('Product stars color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product_h',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature:hover .star:after' => 'color: {{VALUE}};',
                ],
            ],
            'border_h' => [
                'label' => BitElementorWpHelper::__('Border color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_product_h',
                'selectors' => [
                    '{{WRAPPER}} .product-miniature:hover' => 'border-color: {{VALUE}};',
                ],
            ],
            'box-shadow_h' => [
                'group_type_control' => 'box-shadow',
                'name' => 'product_box_shadow_h',
                'label' => BitElementorWpHelper::__('Box shadow', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_product_h',
                'selector' => '{{WRAPPER}} .product-miniature:hover, .product-miniature:hover .product-container .products-variants',
            ],

            'section_style_both' => [
                'label' => BitElementorWpHelper::__('Button', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
            ],
            
            'both_btn_bg_color' => [
                'label' => BitElementorWpHelper::__('Background color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_both',
                'selectors' => [
                    '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary' => 'background: {{VALUE}};',
                ],
            ],
            
            'both_btn_color' => [
                'label' => BitElementorWpHelper::__('Button color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_both',
                'selectors' => [
                    '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary' => 'color: {{VALUE}};',
                ],
            ],

            'both_btn_border' => [
                'group_type_control' => 'border',
                'name' => 'both_btn_border',
                'label' => BitElementorWpHelper::__('Button Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_both',
                'selector' => '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary',
            ],

            'both_border_radius' => [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => 'dimensions',
                'size_units' => [ 'px', '%' ],
                'tab' => 'style',
                'section' => 'section_style_both',
                'selectors' => [
                    '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],

            'both_box_shadow' => [
                'group_type_control' => 'box-shadow',
                'name' => 'both_box_shadow',
                'label' => BitElementorWpHelper::__('Box shadow', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_both',
                'selector' => '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary',
            ],

            'heading_both_hover' => [
                'label' => \BitElementorWpHelper::__( 'Button Hover', 'elementor' ),
                'type' => 'heading',
                'tab' => 'style',
                'section' => 'section_style_both',
                'separator' => 'before',
            ],

            'both_btn_bg_color_h' => [
                'label' => BitElementorWpHelper::__('Background color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_both',
                'selectors' => [
                    '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary:hover' => 'background: {{VALUE}};',
                ],
            ],
            
            'both_btn_color_h' => [
                'label' => BitElementorWpHelper::__('Button color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_both',
                'selectors' => [
                    '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary:hover' => 'color: {{VALUE}};',
                ],
            ],
            
            'both_btn_border_h' => [
                'label' => BitElementorWpHelper::__('Border color', 'elementor'),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_both',
                'selectors' => [
                    '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary:hover' => 'border-color: {{VALUE}};',
                ],
            ],

            'both_box_shadow_h' => [
                'group_type_control' => 'box-shadow',
                'name' => 'both_box_shadow_h',
                'label' => BitElementorWpHelper::__('Box shadow', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_both',
                'selector' => '{{WRAPPER}} .products .product-miniature .product-container .button-container .btn-primary:hover',
            ],
        ];
    }

    public function parseOptions($optionsSource, $preview = false)
    {
        $source = $optionsSource['product_source'];

        if ($source == 'ms') {
            $products = $this->getProductsByIds($optionsSource['products_ids']);
        } else {
            $products = $this->getProducts($source, $optionsSource['products_limit'], $optionsSource['order_by'], $optionsSource['order_way']);
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
            'products' => $products,
            'owl_options' => \BitElementorWpHelper::jsonEncode( $owl_options ),
            'style' =>  $optionsSource['style_preset'],
            'arrows_position' =>  $optionsSource['arrows_position'],
            'dots_position' =>  $optionsSource['dots_position'],
            'xld' =>  $optionsSource['xldevice']['size'],
            'lgd' =>  $optionsSource['lgdevice']['size'],
            'mdd' =>  $optionsSource['mddevice']['size'],
            'smd' =>  $optionsSource['smdevice']['size'],
            'xsd' =>  $optionsSource['xsdevice']['size'],
            'rows' =>  $optionsSource['items_per_column'],
        ];
        
        if ($preview) {
            $result = Hook::exec('actionBeforeElementorWidgetRender', array(), null, true);
            if (isset($result['tdthemesettings'])) {
                $return['themeOpt'] = $result['tdthemesettings'];
            }
        }

        return $return;
    }

    private function generateCategoriesOption($categories)
    {
        $return_categories = array();

        foreach ($categories as $key => $category) {
            if ($category['id_parent'] != 0) {
                $return_categories['xc_' . $key] = str_repeat('&nbsp;', $this->spacer_size * (int)$category['level_depth']) . $category['name'];
            }
            if (isset($category['children']) && !empty($category['children'])) {
                $return_categories = array_merge($return_categories, $this->generateCategoriesOption($category['children']));
            }
        }
        return $return_categories;
    }

    public function customGetNestedCategories($shop_id, $root_category = null, $id_lang = false, $active = false, $groups = null, $use_shop_restriction = true, $sql_filter = '', $sql_sort = '', $sql_limit = '')
    {
        if (isset($root_category) && !Validate::isInt($root_category)) {
            die(Tools::displayError());
        }

        if (!Validate::isBool($active)) {
            die(Tools::displayError());
        }

        if (isset($groups) && Group::isFeatureActive() && !is_array($groups)) {
            $groups = (array)$groups;
        }

        $cache_id = 'Category::getNestedCategories_' . md5((int)$shop_id . (int)$root_category . (int)$id_lang . (int)$active . (int)$active
            . (isset($groups) && Group::isFeatureActive() ? implode('', $groups) : ''));

        if (!Cache::isStored($cache_id)) {
            $result = Db::getInstance()->executeS('
                SELECT c.*, cl.*
                FROM `' . _DB_PREFIX_ . 'category` c
                INNER JOIN `' . _DB_PREFIX_ . 'category_shop` category_shop ON (category_shop.`id_category` = c.`id_category` AND category_shop.`id_shop` = "' . (int)$shop_id . '")
                LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl ON (c.`id_category` = cl.`id_category` AND cl.`id_shop` = "' . (int)$shop_id . '")
                WHERE 1 ' . $sql_filter . ' ' . ($id_lang ? 'AND cl.`id_lang` = ' . (int)$id_lang : '') . '
                ' . ($active ? ' AND (c.`active` = 1 OR c.`is_root_category` = 1)' : '') . '
                ' . (isset($groups) && Group::isFeatureActive() ? ' AND cg.`id_group` IN (' . implode(',', $groups) . ')' : '') . '
                ' . (!$id_lang || (isset($groups) && Group::isFeatureActive()) ? ' GROUP BY c.`id_category`' : '') . '
                ' . ($sql_sort != '' ? $sql_sort : ' ORDER BY c.`level_depth` ASC') . '
                ' . ($sql_sort == '' && $use_shop_restriction ? ', category_shop.`position` ASC' : '') . '
                ' . ($sql_limit != '' ? $sql_limit : '')
            );

            $categories = array();
            $buff = array();

            foreach ($result as $row) {
                $current = &$buff[$row['id_category']];
                $current = $row;

                if ($row['id_parent'] == 0) {
                    $categories[$row['id_category']] = &$current;
                } else {
                    $buff[$row['id_parent']]['children'][$row['id_category']] = &$current;
                }
            }

            Cache::store($cache_id, $categories);
        }

        return Cache::retrieve($cache_id);
    }

    public function getProducts($source, $limit, $orderBy, $orderWay, $brand = null)
    {
        $context = new ProductSearchContext($this->context);
        $query = new ProductSearchQuery();
        $nProducts = $limit;
        if ($nProducts < 0) {
            $nProducts = 12;
        }
        $query
            ->setResultsPerPage($nProducts)
            ->setPage(1);

        switch ($source) {
            case 'pd':
                $searchProvider = new PricesDropProductSearchProvider(
                    $this->context->getTranslator()
                );
                $query->setQueryType('prices-drop');
                if ($orderBy == 'random') {
                    $orderBy = 'position';
                } else {
                    $query->setSortOrder(new SortOrder('product', $orderBy, $orderWay));
                }
                break;
            default:
                $idCategory = (int)str_replace('xc_', '', $source);
                $category = new Category((int)$idCategory);
                $searchProvider = new CategoryProductSearchProvider(
                    $this->context->getTranslator(),
                    $category
                );
                if ($orderBy == 'random') {
                    $query->setSortOrder(SortOrder::random());
                } else {
                    $query->setSortOrder(new SortOrder('product', $orderBy, $orderWay));
                }
                $query->setQueryType('prices-drop');
        }

        $result = $searchProvider->runQuery(
            $context,
            $query
        );
        $assembler = new ProductAssembler($this->context);
        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );
        $products_for_template = [];
        foreach ($result->getProducts() as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }
        return $products_for_template;
    }

    public function getProductsByIds($ids)
    {
        if (!is_array($ids)) {
            return;
        }
        if (empty($ids)) {
            return;
        }

        $products = $this->getProductsInfoByIds($ids, $this->context->language->id);
        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();

        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );

        if (is_array($products)) {
            foreach ($products as &$product) {
                $product = $presenter->present(
                    $presentationSettings,
                    Product::getProductProperties($this->context->language->id, $product, $this->context),
                    $this->context->language
                );
            }
            unset($product);
        }
        return $products;
    }


    public function getProductsInfoByIds($ids, $id_lang, $active = true)
    {
        $product_ids = join(',', $ids);
        $id_shop = (int) $this->context->shop->id;

        $sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, pl.`description`, pl.`description_short`, pl.`link_rewrite`,
            pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, pl.`available_now`, pl.`available_later`,
            image_shop.`id_image` id_image, il.`legend`, m.`name` as manufacturer_name, cl.`name` AS category_default, IFNULL(product_attribute_shop.id_product_attribute, 0) id_product_attribute,
            DATEDIFF(
            p.`date_add`,
            DATE_SUB(
            "'.date('Y-m-d').' 00:00:00",
            INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY
            )
            ) > 0 AS new
            FROM  `'._DB_PREFIX_.'product` p 
            '.Shop::addSqlAssociation('product', 'p').'
            LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
            ON (p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop='.(int)$id_shop.')
            LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (
            p.`id_product` = pl.`id_product`
            AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
            )
            LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (
            product_shop.`id_category_default` = cl.`id_category`
            AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').'
            )
            LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
            ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop='.(int)$id_shop.')
            LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
            LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON (p.`id_manufacturer`= m.`id_manufacturer`)
            '.Product::sqlStock('p', 0).'
            WHERE p.id_product IN ('.$product_ids.')'.
            ($active ? ' AND product_shop.`active` = 1 AND product_shop.`visibility` != \'none\'' : '').'
            ORDER BY FIELD(product_shop.id_product, '.$product_ids.')
            ';
        if (!$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql)) {
            return false;
        }
        foreach ($result as &$row) {
            $row['id_product_attribute'] = Product::getDefaultAttribute((int)$row['id_product']);
        }
        return Product::getProductsProperties($id_lang, $result);
    }
}
