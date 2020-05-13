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
* Class ElementorWidget_CategoryList
*/
class BitElementorWidget_CategoryList
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
        $this->name = BitElementorWpHelper::__('Category list/sliders', 'elementor');
        $this->id_base = 'CategoryList';
        $this->icon = 'product-list';
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

        $productSourceOptions = array_merge($productSourceOptions, $categories);

        return [
            'section_cswidget_options' => [
                'label' => BitElementorWpHelper::__('Category List', 'elementor'),
                'type' => 'section',
            ],
            'category_list' => [
                'label' => BitElementorWpHelper::__('Category items', 'elementor'),
                'type' => 'repeater',
                'default' => [
                    [
						'section_cswidget_options' => [
                            'category_source'   => 'category_2',
                            'url'               =>  '#',
                        ],
					],
					[
						'section_cswidget_options' => [
							'category_source'   => 'category_2',
                            'url'               =>  '#',  
						],
					],
					[
						'section_cswidget_options' => [
							'category_source'   => 'category_2',
                            'url'               =>  '#',  
						],
                    ],
                    [
						'section_cswidget_options' => [
							'category_source'   => 'category_2',
                            'url'               =>  '#',  
						],
                    ],
                    [
						'section_cswidget_options' => [
							'category_source'   => 'category_2',
                            'url'               =>  '#',  
						],
                    ],
                    [
						'section_cswidget_options' => [
							'category_source'    => 'category_2',
                            'url'               =>  '#',  
						],
					],
                ],
                'section' => 'section_cswidget_options',
                'fields' => [
                    [
                        'name' =>  'category_source',
                        'label' => BitElementorWpHelper::__('Category source', 'elementor'),
                        'type' => 'select',
                        'default' => '',
                        'label_block' => true,
                        'options' => $productSourceOptions,
                    ],
                    [
                        'name' => 'image',
                        'label' => BitElementorWpHelper::__( 'Choose Image', 'elementor' ),
                        'type' => 'media',
                        'placeholder' => BitElementorWpHelper::__( 'Image', 'elementor' ),
                        'label_block' => true,
                        'default' => [
                            'url' => '',
                        ],
                    ],
                ],
                'title_field' => 'category_source',
            ],
            'category_style' => [
                'label' => BitElementorWpHelper::__('Category Style', 'elementor'),
                'type' => 'select',
                'default' => 'style1',
                'section' => 'section_cswidget_options',
                'options' => [
                    'style1' => BitElementorWpHelper::__('Style 1', 'elementor'),
                    'style2' => BitElementorWpHelper::__('Style 2', 'elementor'),
                    'style3' => BitElementorWpHelper::__('Style 3', 'elementor'),
                ],
            ],
            'show_image' => [
                'label' => BitElementorWpHelper::__( 'Show Category Image', 'elementor' ),
                'type' => 'switcher',
                'section' => 'section_cswidget_options',
                'default' => '',
                'label_on' => 'Show',
                'label_off' => 'Hide',
                'return_value' => 'yes',
            ],
            'show_title' => [
                'label' => BitElementorWpHelper::__( 'Show Category Title', 'elementor' ),
                'type' => 'switcher',
                'section' => 'section_cswidget_options',
                'default' => '',
                'label_on' => 'Show',
                'label_off' => 'Hide',
                'return_value' => 'yes',
            ],
            'show_count' => [
                'label' => BitElementorWpHelper::__( 'Show Product Count', 'elementor' ),
                'type' => 'switcher',
                'section' => 'section_cswidget_options',
                'default' => '',
                'label_on' => 'Show',
                'label_off' => 'Hide',
                'return_value' => 'yes',
                'condition' => [
                    'category_style!' => ['style3'],
                ],
            ],
            'show_subcategory' => [
                'label' => BitElementorWpHelper::__( 'Show Sub Category', 'elementor' ),
                'type' => 'switcher',
                'section' => 'section_cswidget_options',
                'default' => '',
                'label_on' => 'Show',
                'label_off' => 'Hide',
                'return_value' => 'yes',
                'condition' => [
                    'category_style!' => ['style1'],
                ],
            ],
            'limit_subcategory' => [
                'label' => BitElementorWpHelper::__('Sub Category Limit', 'elementor'),
                'type' => 'number',
                'section' => 'section_cswidget_options',
                'default' => 3,
                'min'  => 1,
                'condition' => [
                    'show_subcategory' => 'yes',
                ],
            ],
            'view_all' => [
                'label' => BitElementorWpHelper::__( 'View All', 'elementor' ),
                'type' => 'switcher',
                'section' => 'section_cswidget_options',
                'default' => '',
                'label_on' => 'Show',
                'label_off' => 'Hide',
                'return_value' => 'yes',
                'condition' => [
                    'category_style!' => ['style2'],
                ],
            ],
            'section_slider_list' => [
                'label' => BitElementorWpHelper::__('Slider settings', 'elementor'),
                'type' => 'section',
            ],
            'view' => [
                'label' => BitElementorWpHelper::__('View', 'elementor'),
                'label_block' => true,
                'type' => 'select',
                'default' => 'grid',
                'section' => 'section_slider_list',
                'condition' => [
                    'view!' => 'default',
                ],
                'options' => [
                    'carousel' => BitElementorWpHelper::__('Carousel', 'elementor'),
                    'grid' => BitElementorWpHelper::__('Grid', 'elementor')
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
                'section' => 'section_slider_list',
            ],
            'navigation' => [
                'label' => BitElementorWpHelper::__('Navigation', 'elementor'),
                'type' => 'select',
                'default' => 'true',
                'section' => 'section_slider_list',
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
                'section' => 'section_slider_list',
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
                'section' => 'section_slider_list',
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
                'section' => 'section_slider_list',
                'condition' => [
                    'view' => 'carousel',
                    'autoplay' => 'true',
                ],
            ],
            'pause_on_hover' => [
                'label' => \BitElementorWpHelper::__( 'Pause on Hover', 'elementor' ),
                'type' => 'select',
                'section' => 'section_slider_list',
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
                'section' => 'section_slider_list',
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
                'section' => 'section_slider_list',
                'default' => [
					'size' => 4,
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
            'lgdevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 1200', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_list',
                'default' => [
					'size' => 3,
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
            'mddevice' => [
                'label' => BitElementorWpHelper::__('Number item to show on device < 992', 'elementor'),
                'label_block' => true,
                'type' => 'slider',
                'section' => 'section_slider_list',
                'default' => [
					'size' => 2,
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
                        'max'  => 4,
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
                'section' => 'section_slider_list',
                'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min'  => 1,
                        'max'  => 3,
                        'step' => 1,
					],
                ],
                'condition' => [
                    'view' => ['carousel', 'grid'],
                ],
            ],

            'section_style_catgory_box' => [
                'label' => BitElementorWpHelper::__('Category', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
            ],

            'category_box_padding' => [
                'label' => BitElementorWpHelper::__( 'Category Box Outer Padding ', 'elementor' ),
                'type' => 'slider',
                'tab' => 'style',
                'section' => 'section_style_catgory_box',
                'default' => '15px',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock ' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-categorylist .block_content.row' => 'margin-left: -{{SIZE}}{{UNIT}}; margin-right:-{{SIZE}}{{UNIT}} ;',
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

            'cat_box_bg' => [
                'label' => \BitElementorWpHelper::__( 'Box Background', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_catgory_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock .category-wrap' => 'background: {{VALUE}};',
                ],
            ],

            'cat_box_padding' => [
                'label' => BitElementorWpHelper::__( 'Padding', 'elementor' ),
                'type' => 'dimensions',
                'tab' => 'style',
                'section' => 'section_style_catgory_box',
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock .category-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],

            'cat_box_margin' => [
				'label' => BitElementorWpHelper::__( 'Margin', 'elementor' ),
				'type' =>'dimensions',
				'size_units' => [ 'px', '%' ],
				'tab' => 'style',
                'section' => 'section_style_catgory_box',
				'selectors' => [
					'{{WRAPPER}} .elementor-categorylist .categoryblock .category-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
            ],

            'cat_box_border' => [
                'group_type_control' => 'border',
                'name' => 'cat_box_border',
                'label' => BitElementorWpHelper::__('Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '2px',
                'section' => 'section_style_catgory_box',
                'selector' => '{{WRAPPER}} .elementor-categorylist .categoryblock .category-wrap',
            ],

            'cat_box_border_radius' => [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => 'dimensions',
                'size_units' => [ 'px', '%' ],
                'tab' => 'style',
                'section' => 'section_style_catgory_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock .category-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],

            'cat_box-shadow' => [
                'group_type_control' => 'box-shadow',
                'name' => 'cat_box_shadow',
                'label' => BitElementorWpHelper::__('Box shadow', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '1px',
                'section' => 'section_style_catgory_box',
                'selector' => '{{WRAPPER}} .elementor-categorylist .categoryblock .category-wrap',
            ],

            'section_style_image' => [
                'label' => BitElementorWpHelper::__('Category Image', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
                'condition' => [
                    'show_image' => ['yes'],
                ],
            ],

            'image_border' => [
                'group_type_control' => 'border',
                'name' => 'image_border',
                'label' => BitElementorWpHelper::__('Border', 'elementor'),
                'tab' => 'style',
                'placeholder' => '1px',
                'default' => '2px',
                'section' => 'section_style_image',
                'condition' => [
                    'show_image' => ['yes'],
                ],
                'selector' => '{{WRAPPER}} .elementor-categorylist .categoryblock .categoryimage',
            ],

            'image_border_radius' => [
                'label' => \BitElementorWpHelper::__( 'Border Radius', 'elementor' ),
                'type' => 'dimensions',
                'size_units' => [ 'px', '%' ],
                'tab' => 'style',
                'section' => 'section_style_image',
                'condition' => [
                    'show_image' => ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock .categoryimage img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],

            'section_style_box' => [
                'label' => BitElementorWpHelper::__('Box Content', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
                'condition' => [
                    'category_style' => ['style2'],
                ],
            ],

            'title_bg' => [
                'label' => \BitElementorWpHelper::__( 'Title Background', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_box',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .style2 .categoryblock .categorylist .category-title' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'category_style' => [ 'style2' ],
                ],
            ],

            'section_style_title' => [
                'label' => BitElementorWpHelper::__('Category Title', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
                'condition' => [
                    'show_title' => ['yes'],
                ],
            ],

            'title_typography' => [
                'group_type_control' => 'typography',
                'name' => 'title_typography',
                'label' => BitElementorWpHelper::__('Typography', 'elementor'),
                'tab' => 'style',
                'section' => 'section_style_title',
                'selector' => '{{WRAPPER}} .elementor-categorylist .categoryblock .categorylist .cate-heading a',
                'condition' => [
                    'show_title' => ['yes'],
                ],
            ],

            'title_color' => [
                'label' => \BitElementorWpHelper::__( 'Title Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_title',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock .categorylist .cate-heading a' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_title' => [ 'yes' ],
                ],
            ],

            'section_style_count' => [
                'label' => BitElementorWpHelper::__('Product Count', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
                'condition' => [
                    'show_count' => ['yes'],
                    'category_style' => ['style1', 'style2'],
                ],
            ],

            'count_typography' => [
                'group_type_control' => 'typography',
                'name' => 'count_typography',
                'label' => BitElementorWpHelper::__('Typography', 'elementor'),
                'tab' => 'style',
                'section' => 'section_style_count',
                'selector' => '{{WRAPPER}} .elementor-categorylist .categoryblock .categorylist .cate-count',
                'condition' => [
                    'show_count' => ['yes'],
                    'category_style' => ['style1', 'style2'],
                ],
            ],

            'count_color' => [
                'label' => \BitElementorWpHelper::__( 'Count Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_count',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock .categorylist .cate-count' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_count' => [ 'yes' ],
                    'category_style' => ['style1', 'style2'],
                ],
            ],

            'section_style_subcat' => [
                'label' => BitElementorWpHelper::__('Sub Category', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
                'condition' => [
                    'show_subcategory' => ['yes'],
                    'category_style!' => ['style1'],
                ],
            ],

            'subcat_typography' => [
                'group_type_control' => 'typography',
                'name' => 'subcat_typography',
                'label' => BitElementorWpHelper::__('Typography', 'elementor'),
                'tab' => 'style',
                'section' => 'section_style_subcat',
                'selector' => '{{WRAPPER}} .elementor-categorylist .categoryblock .categorylist .categories-info-content .sub-categories li a',
                'condition' => [
                    'show_subcategory' => ['yes'],
                    'category_style!' => ['style1'],
                ],
            ],

            'subcat_color' => [
                'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_subcat',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock .categorylist .categories-info-content .sub-categories li a' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_subcategory' => [ 'yes' ],
                    'category_style!' => ['style1'],
                ],
            ],

            'heading_style_subcat_hover' => [
                'label' => \BitElementorWpHelper::__( 'Hover Color', 'elementor' ),
                'type' => 'heading',
                'tab' => 'style',
                'section' => 'section_style_subcat',
                'separator' => 'before',
                'condition' => [
                    'show_subcategory' => [ 'yes' ],
                    'category_style!' => ['style1'],
                ],
            ],

            'subcat_color_h' => [
                'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_subcat',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .categoryblock .categorylist .categories-info-content .sub-categories li a:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_subcategory' => [ 'yes' ],
                    'category_style!' => ['style1'],
                ],
            ],

            'section_style_view_all' => [
                'label' => BitElementorWpHelper::__('View All', 'elementor'),
                'type' => 'section',
                'tab' => 'style',
                'condition' => [
                    'view_all' => ['yes'],
                    'category_style!' => ['style2'],
                ],
            ],

            'viewcat_typography' => [
                'group_type_control' => 'typography',
                'name' => 'viewcat_typography',
                'label' => BitElementorWpHelper::__('Typography', 'elementor'),
                'tab' => 'style',
                'section' => 'section_style_view_all',
                'selector' => '{{WRAPPER}} .elementor-categorylist .style1 .categoryblock .show-all-cate a, .elementor-categorylist .style3 .categoryblock .show-all-cate a',
                'condition' => [
                    'view_all' => ['yes'],
                    'category_style!' => ['style2'],
                ],
            ],

            'viewcat_color' => [
                'label' => \BitElementorWpHelper::__( 'View All Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_view_all',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .style1 .categoryblock .show-all-cate a, .elementor-categorylist .style3 .categoryblock .show-all-cate a' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'view_all' => ['yes'],
                    'category_style!' => ['style2'],
                ],
            ],

            'heading_style_view_all_hover' => [
                'label' => \BitElementorWpHelper::__( 'Hover Color', 'elementor' ),
                'type' => 'heading',
                'tab' => 'style',
                'section' => 'section_style_view_all',
                'separator' => 'before',
                'condition' => [
                    'view_all' => ['yes'],
                    'category_style!' => ['style2'],
                ],
            ],

            'viewcat_color_h' => [
                'label' => \BitElementorWpHelper::__( 'Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_view_all',
                'selectors' => [
                    '{{WRAPPER}} .elementor-categorylist .style1 .categoryblock .show-all-cate a:hover, .elementor-categorylist .style3 .categoryblock .show-all-cate a:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'view_all' => ['yes'],
                    'category_style!' => ['style2'],
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-nav > div i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-nav > div' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-nav > div' => 'background: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-category-carousel .owl-nav > div',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-nav > div:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-category-carousel  .owl-nav > div:hover' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-nav > div:hover' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ],

            'dots_color' => [
                'label' => \BitElementorWpHelper::__( 'Dots Color', 'elementor' ),
                'type' => 'color',
                'tab' => 'style',
                'section' => 'section_style_dots',
                'selectors' => [
                    '{{WRAPPER}} .elementor-category-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .elementor-category-carousel .owl-dots .owl-dot span',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .elementor-category-carousel .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'dots' => 'true',
                ],
            ],
        ];
    }

    public function parseOptions($optionsSource, $preview = false)
    {
        $id_lang = (int)Context::getContext()->language->id;
        $id_shop = (int)Context::getContext()->shop->id;

        $cat_list = array();
        $parsedOptions = [];
        if (isset($optionsSource['category_list'])) {
            foreach ($optionsSource['category_list'] as $cat) {
                $source = $cat['category_source'];
                $idCategory = (int)str_replace('category_', '', $source);
                $category = new Category($idCategory, $id_lang, $id_shop);
                
                $image_url = \BitElementorWpHelper::esc_attr(\BitElementorWpHelper::getImage($cat['image']['url']));

                if ($category->id_category) {
                    $productCount = $category->getProducts($this->context->language->id, 0, 1, null, null, true);
                    $subcategories = $this->getSubCategories($idCategory, $optionsSource['limit_subcategory'], $id_lang);
                    $name = $category->name;
                }
                $parsedCat = [
                    'subcategories' => $subcategories,
                    'image_url' => $image_url,
                    'productCount' => $productCount,
                    'name' => $name,
                    'id_category' => $idCategory
                ];

                $cat_list[] = $parsedCat;
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
            'categories' => $cat_list,
            'owl_options' => \BitElementorWpHelper::jsonEncode( $owl_options ),
            'style' => $optionsSource['category_style'],
            'arrows_position' =>  $optionsSource['arrows_position'],
            'dots_position' =>  $optionsSource['dots_position'],
            'xld' =>  $optionsSource['xldevice']['size'],
            'lgd' =>  $optionsSource['lgdevice']['size'],
            'mdd' =>  $optionsSource['mddevice']['size'],
            'smd' =>  $optionsSource['smdevice']['size'],
            'xsd' =>  $optionsSource['xsdevice']['size'],
            'showimage' => $optionsSource['show_image'],
            'showtitle' => $optionsSource['show_title'],
            'showcount' => $optionsSource['show_count'],
            'showsubcategory' => $optionsSource['show_subcategory'],
            'viewall' => $optionsSource['view_all'],
            'rows' =>  $optionsSource['items_per_column'],
            'view' => $optionsSource['view'],
            'id_lang' => $id_lang
        ];

        return $return;
    }

    private function generateCategoriesOption($categories)
    {
        $return_categories = array();

        foreach ($categories as $key => $category) {
            if ($category['id_parent'] != 0) {
                $return_categories['category_' . $key] = str_repeat('&nbsp;', $this->spacer_size * (int)$category['level_depth']) . $category['name'];
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

    public function getSubCategories($id_category, $nb = 5, $id_lang, $active = true)
	{
		$sqlGroupsWhere = '';
		$sqlGroupsJoin = '';
		if (Group::isFeatureActive()) {
			$sqlGroupsJoin = 'LEFT JOIN `'._DB_PREFIX_.'category_group` cg ON (cg.`id_category` = c.`id_category`)';
			$groups = FrontController::getCurrentCustomerGroups();
			$sqlGroupsWhere = 'AND cg.`id_group` '.(count($groups) ? 'IN ('.pSQL(implode(',', $groups)).')' : '='.(int)Group::getCurrent()->id);
		}

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, cl.id_lang, cl.name, cl.description, cl.link_rewrite, cl.meta_title, cl.meta_keywords, cl.meta_description
			FROM `'._DB_PREFIX_.'category` c
			'.Shop::addSqlAssociation('category', 'c').'
			LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category`
						AND `id_lang` = '.(int)$id_lang.' '.Shop::addSqlRestrictionOnLang('cl').')
			'.$sqlGroupsJoin.'
			WHERE `id_parent` = '.(int)$id_category.'
			'.($active ? 'AND `active` = 1' : '').'
			'.$sqlGroupsWhere.'
			GROUP BY c.`id_category`
			ORDER BY `level_depth` ASC, category_shop.`position` ASC
			LIMIT 0,'.(int)$nb);

		return $result;
    }
}
