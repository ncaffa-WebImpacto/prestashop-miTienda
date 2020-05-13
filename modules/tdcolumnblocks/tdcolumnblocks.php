<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Adapter\PricesDrop\PricesDropProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\NewProducts\NewProductsProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\BestSales\BestSalesProductSearchProvider;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

include_once dirname(__FILE__).'/classes/TdColumnBlock.php';
include_once(dirname(__FILE__).'/sql/ColumnBlockSampleData.php');

class TdColumnBlocks extends Module
{
    private $templateFile;

    protected $html = '';
    protected $currentIndex;
    protected $btproduct = 'blocktype_product';
    protected $bthtml = 'blocktype_html';
    protected $ptfeatures = 'products_featured';
    protected $ptnew = 'products_new';
    protected $ptspecial = 'products_special';
    protected $ptseller = 'products_seller';
    protected $ptselected = 'products_selected';
    protected $ptcategory = 'products_category';

    public function __construct()
    {
        $this->name = 'tdcolumnblocks';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array(
            'min' => '1.7.0.0',
            'max' => _PS_VERSION_,
        );
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('TD - Left Column Blocks');
        $this->description = $this->l('Displays Products and banners in columns');
        $this->templateFile = 'module:tdcolumnblocks/views/templates/hook/tdcolumnblocks.tpl';

        $this->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
    }

    public function install()
    {
        include(dirname(__FILE__).'/sql/install.php');
        $sample_data = new ColumnBlockSampleData();

        $base_url = Tools::getHttpHost(true);  // DON'T TOUCH (base url (only domain) of site (without final /)).
        $base_url = Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE') ? $base_url : str_replace('https', 'http', $base_url);

        $sample_data->initData($base_url.__PS_BASE_URI__);

        return parent::install()
            && $this->registerHook('actionProductAdd')
            && $this->registerHook('actionProductUpdate')
            && $this->registerHook('actionProductDelete')
            && $this->registerHook('actionCategoryAdd')
            && $this->registerHook('actionCategoryUpdate')
            && $this->registerHook('actionCategoryDelete')
            && $this->registerHook('actionOrderStatusUpdate')
            && $this->registerHook('displayLeftColumn')
            && ProductSale::fillProductSales();
    }

    public function uninstall()
    {
        $this->_clearCache('*');
        include(dirname(__FILE__).'/sql/uninstall.php');
        if (parent::uninstall() == false) {
            return false;
        }
        return true;
    }

    public function hookActionProductAdd($params)
    {
        $this->_clearCache('*');
    }

    public function hookActionProductUpdate($params)
    {
        $this->_clearCache('*');
    }

    public function hookActionProductDelete($params)
    {
        $this->_clearCache('*');
    }

    public function hookActionCategoryAdd($params)
    {
        $this->_clearCache('*');
    }

    public function hookActionCategoryUpdate($params)
    {
        $this->_clearCache('*');
    }

    public function hookActionCategoryDelete($params)
    {
        $this->_clearCache('*');
    }

    public function hookActionOrderStatusUpdate($params)
    {
        $this->_clearCache('*');
    }

    public function _clearCache($template, $cache_id = null, $compile_id = null)
    {
        parent::_clearCache($this->templateFile);
    }

    public function backOfficeHeader()
    {
        Media::addJsDef(array(
            'blocktype_product' => $this->btproduct,
            'blocktype_html' => $this->bthtml,
            'products_selected' => $this->ptselected,
            'products_category' => $this->ptcategory,
        ));

        $this->context->controller->addJqueryPlugin('tablednd');
        $this->context->controller->addJS($this->_path.'views/js/position.js');
        $this->context->controller->addJS($this->_path.'views/js/back.js');
        $this->context->controller->addCSS($this->_path.'views/css/back.css');
    }

    protected function about()
    {
        $this->smarty->assign(array(
            'doc_url' => $this->_path.'documentation.pdf',
        ));

        return $this->display(__FILE__, 'views/templates/admin/about.tpl');
    }

    public function getContent()
    {
        $this->backOfficeHeader();

        $about = $this->about();
        
        if (Tools::isSubmit('savetdcolumnblock')) {
            if ($this->processSaveColumnBlock()) {
                return $this->html.$this->renderColumnBlockList().$about;
            } else {
                return $this->html.$this->renderColumnBlockForm().$about;
            }
        } elseif (Tools::isSubmit('addtdcolumnblock') || Tools::isSubmit('updatetdcolumnblock')) {
            return $this->renderColumnBlockForm().$about;
        } elseif (Tools::isSubmit('deletetdcolumnblock')) {
            $tdcolumnblock = new TdColumnBlock((int) Tools::getValue('id_tdcolumnblock'));
            $tdcolumnblock->delete();
            $this->_clearCache('*');
            Tools::redirectAdmin($this->currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'));
        } elseif (Tools::isSubmit('statustdcolumnblock')) {
            $this->ajaxStatusColumnBlock();
        } elseif (Tools::getValue('updatePositions') == 'tdcolumnblock') {
            $this->ajaxPositionsColumnBlock();
        } elseif (Tools::isSubmit('ajaxProductsList')) {
            $this->ajaxProductsList();
        } else {
            return $this->renderColumnBlockList().$about;
        }
    }

    protected function ajaxProductsList()
    {
        $query = Tools::getValue('q', false);
        if (!$query || $query == '' || Tools::strlen($query) < 1) {
            die();
        }
        if ($pos = strpos($query, ' (ref:')) {
            $query = Tools::substr($query, 0, $pos);
        }

        $sql = 'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`
            FROM `'._DB_PREFIX_.'product` p
            LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
                ON (pl.id_product = p.id_product
                AND pl.id_lang = '.(int) Context::getContext()->language->id.Shop::addSqlRestrictionOnLang('pl').')
            WHERE (pl.name LIKE \'%'.pSQL($query).'%\'
                OR p.reference LIKE \'%'.pSQL($query).'%\')
            GROUP BY p.`id_product`';

        $items = Db::getInstance()->executeS($sql);

        if ($items) {
            foreach ($items as $item) {
                $item['name'] = str_replace('|', '-', $item['name']);
                echo trim($item['name']).(!empty($item['reference']) ? ' (ref: '.$item['reference'].')' : '').'|'.(int) $item['id_product']."\n";
            }
        } else {
            Tools::jsonEncode(new stdClass());
        }
    }

    protected function ajaxStatusColumnBlock()
    {
        $id_tdcolumnblock = (int)Tools::getValue('id_tdcolumnblock');
        if (!$id_tdcolumnblock) {
            die(Tools::jsonEncode(array(
                'success' => false,
                'error' => true,
                'text' => $this->l('Failed to update the status')
            )));
        } else {
            $tdcolumnblock = new TdColumnBlock($id_tdcolumnblock);
            $tdcolumnblock->active = !(int)$tdcolumnblock->active;
            if ($tdcolumnblock->save()) {
                $this->_clearCache('*');
                die(Tools::jsonEncode(array(
                    'success' => true,
                    'text' => $this->l('The status has been updated successfully')
                )));
            } else {
                die(Tools::jsonEncode(array(
                    'success' => false,
                    'error' => true,
                    'text' => $this->l('Failed to update the status')
                )));
            }
        }
    }

    protected function ajaxPositionsColumnBlock()
    {
        $positions = Tools::getValue('tdcolumnblock');

        if (empty($positions)) {
            return;
        }

        foreach ($positions as $position => $value) {
            $pos = explode('_', $value);

            if (isset($pos[2])) {
                TdColumnBlock::updatePosition($pos[2], $position + 1);
            }
        }

        $this->_clearCache('*');
    }

    protected function processSaveColumnBlock()
    {
        $tdcolumnblock = new TdColumnBlock();
        $id_tdcolumnblock = (int) Tools::getValue('id_tdcolumnblock');
        if ($id_tdcolumnblock) {
            $tdcolumnblock = new TdColumnBlock($id_tdcolumnblock);
        }

        $tdcolumnblock->position = (int) Tools::getValue('position');
        $tdcolumnblock->active = (int) Tools::getValue('active');
        $tdcolumnblock->block_type = Tools::getValue('block_type');
        $tdcolumnblock->custom_class = Tools::getValue('custom_class');
        $tdcolumnblock->product_filter = Tools::getValue('product_filter');

        $product_options = array();
        $product_options['limit'] = Tools::getValue('limit');
        $product_options['enable_slider'] = Tools::getValue('enable_slider');
        $product_options['auto_scroll'] = Tools::getValue('auto_scroll');
        $product_options['slider_row'] = Tools::getValue('slider_row');
        $product_options['product_thumb'] = Tools::getValue('product_thumb');
        $product_options['selected_products'] = Tools::getValue('selected_products');
        $product_options['selected_category'] = Tools::getValue('selected_category');
        $tdcolumnblock->product_options = $product_options;

        $languages = Language::getLanguages(false);
        $id_lang_default = (int) Configuration::get('PS_LANG_DEFAULT');
        $title = array();
        $static_html = array();
        foreach ($languages as $lang) {
            $title[$lang['id_lang']] = Tools::getValue('title_'.$lang['id_lang']);
            $static_html[$lang['id_lang']] = Tools::getValue('static_html_'.$lang['id_lang']);
            if (!$static_html[$lang['id_lang']]) {
                $static_html[$lang['id_lang']] = Tools::getValue('static_html_'.$id_lang_default);
            }
        }
        $tdcolumnblock->title = $title;
        $tdcolumnblock->static_html = $static_html;

        $result = $tdcolumnblock->validateFields(false) && $tdcolumnblock->validateFieldsLang(false);

        if ($result) {
            $tdcolumnblock->save();

            if ($id_tdcolumnblock) {
                $this->html .= $this->displayConfirmation($this->l('Block Content has been updated.'));
            } else {
                $this->html .= $this->displayConfirmation($this->l('Block Content has been created successfully.'));
            }

            $this->_clearCache('*');
        } else {
            $this->html .= $this->displayError($this->l('An error occurred while attempting to save Block Content.'));
        }

        return $result;
    }

    protected function renderColumnBlockList()
    {
        $blocks = TdColumnBlock::getList((int) $this->context->language->id, false);

        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->toolbar_btn['new'] = array(
            'href' => $this->currentIndex.'&addtdcolumnblock&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->l('Add New'),
        );
        $helper->simple_header = false;
        $helper->listTotal = count($blocks);
        $helper->identifier = 'id_tdcolumnblock';
        $helper->table = 'tdcolumnblock';
        $helper->actions = array('edit', 'delete');
        $helper->show_toolbar = true;
        $helper->no_link = true;
        $helper->module = $this;
        $helper->title = $this->l('Column Blocks');
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = $this->currentIndex;
        $helper->position_identifier = 'tdcolumnblock';
        $helper->position_group_identifier = 0;

        $helper->tpl_vars = array('block_type' => array(
            $this->btproduct => array(
                $this->ptfeatures => $this->l('Featured Products'),
                $this->ptnew => $this->l('New Products'),
                $this->ptspecial => $this->l('Special Products'),
                $this->ptseller => $this->l('Best Seller Products'),
                $this->ptselected => $this->l('Selected Products'),
                $this->ptcategory => $this->l('Products from Category')
            ),
            $this->bthtml => $this->l('Static HTML'),
        ));

        return $helper->generateList($blocks, $this->getColumnBlockList());
    }

    protected function getColumnBlockList()
    {
        $fields_list = array(
            'id_tdcolumnblock' => array(
                'title' => $this->l('Block ID'),
                'align' => 'center',
                'class' => 'fixed-width-xs',
                'orderby' => false,
                'search' => false,
                'type' => 'id_columnblock',
            ),
            'title' => array(
                'title' => $this->l('Title'),
                'orderby' => false,
                'search' => false,
            ),
            'block_type' => array(
                'title' => $this->l('Content Type'),
                'orderby' => false,
                'search' => false,
                'type' => 'blocktype',
            ),
            'position' => array(
                'title' => $this->l('Position'),
                'align' => 'center',
                'orderby' => false,
                'search' => false,
                'class' => 'fixed-width-md',
                'position' => true,
                'type' => 'position',
            ),
            'active' => array(
                'title' => $this->l('Displayed'),
                'active' => 'status',
                'type' => 'bool',
                'class' => 'fixed-width-xs',
                'align' => 'center',
                'ajax' => true,
                'orderby' => false,
                'search' => false,
            ),
        );

        return $fields_list;
    }

    protected function renderColumnBlockForm()
    {
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->module = $this;
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'savetdcolumnblock';
        $helper->currentIndex = $this->currentIndex;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getColumnBlockFormValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'module_dir' => $this->_path,
        );

        $form = $helper->generateForm(array($this->getColumnBlockForm()));

        Context::getContext()->smarty->assign('token', Tools::getAdminTokenLite('AdminModules'));
        
        return $form;
    }

    protected function getColumnBlockForm()
    {
        $id_tdcolumnblock = (int) Tools::getValue('id_tdcolumnblock');
        $tdcolumnblock = new TdColumnBlock($id_tdcolumnblock, (int) $this->context->language->id);
        $default_category = isset($tdcolumnblock->product_options['selected_category']) ? (int) $tdcolumnblock->product_options['selected_category'] : 0;
        $selected_category = array((int) Tools::getValue('selected_category', $default_category));
        $root = Category::getRootCategory();

        $legent_title = $this->l('Add New Block');
        if ($id_tdcolumnblock) {
            $legent_title = $this->l('Edit Block');
        }

        $block_type_options = array(
            'query' => array(
                array('id' => $this->btproduct, 'name' => $this->l('Product Block')),
                array('id' => $this->bthtml, 'name' => $this->l('Static HTML')),
            ),
            'id' => 'id',
            'name' => 'name',
        );

        $product_filter_options = array(
            'query' => array(
                array('id' => $this->ptfeatures, 'name' => $this->l('Featured Products')),
                array('id' => $this->ptnew, 'name' => $this->l('New Products')),
                array('id' => $this->ptspecial, 'name' => $this->l('Special Products')),
                array('id' => $this->ptseller, 'name' => $this->l('Best Seller Products')),
                array('id' => $this->ptselected, 'name' => $this->l('Selected Products')),
                array('id' => $this->ptcategory, 'name' => $this->l('Products from Category')),
            ),
            'id' => 'id',
            'name' => 'name',
        );

        $product_thumb_options = array(
            'query' => array(
                array('id' => 'top', 'name' => $this->l('Top')),
                array('id' => 'left', 'name' => $this->l('Left')),
            ),
            'id' => 'id',
            'name' => 'name',
        );

        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $legent_title,
                    'icon' => 'icon-book',
                ),
                'input' => array(
                    array(
                        'type' => 'hidden',
                        'name' => 'id_tdcolumnblock',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Title'),
                        'name' => 'title',
                        'lang' => true,
                        'required' => true,
                        'col' => 5,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Displayed'),
                        'name' => 'active',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'hidden',
                        'name' => 'position',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Custom CSS Class'),
                        'name' => 'custom_class',
                        'hint' => $this->l('Using it for special stylesheet.'),
                        'col' => 3,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Block Type'),
                        'name' => 'block_type',
                        'id' => 'block_type_selectbox',
                        'options' => $block_type_options,
                    ),
                    array(
                        'type' => 'html',
                        'name' => 'product_option_title',
                        'html_content' => '<h4>'.$this->l('Product Block').'</h4>',
                        'form_group_class' => 'block_type_product',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Number of Products'),
                        'name' => 'limit',
                        'form_group_class' => 'block_type_product',
                        'hint' => $this->l('The number of products to be displayed.'),
                        'col' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enable Slider'),
                        'name' => 'enable_slider',
                        'form_group_class' => 'block_type_product',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'slider_on',
                                'value' => true,
                                'label' => $this->l('Yes'),
                            ),
                            array(
                                'id' => 'slider_off',
                                'value' => false,
                                'label' => $this->l('No'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Slider Autoplay'),
                        'name' => 'auto_scroll',
                        'form_group_class' => 'block_type_product',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'scroll_on',
                                'value' => true,
                                'label' => $this->l('Yes'),
                            ),
                            array(
                                'id' => 'scroll_off',
                                'value' => false,
                                'label' => $this->l('No'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('No. of Rows to display per Column'),
                        'name' => 'slider_row',
                        'form_group_class' => 'block_type_product',
                        'hint' => $this->l('Works with slider only.'),
                        'col' => 1,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Product Thumbnail Position'),
                        'name' => 'product_thumb',
                        'form_group_class' => 'block_type_product',
                        'options' => $product_thumb_options,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Get Products From'),
                        'name' => 'product_filter',
                        'id' => 'product_filter_selectbox',
                        'form_group_class' => 'block_type_product',
                        'options' => $product_filter_options,
                    ),
                    array(
                        'type' => 'product_autocomplete',
                        'label' => $this->l('Select the Products'),
                        'name' => 'selected_products',
                        'form_group_class' => 'block_type_product filter_selected_products',
                        'ajax_path' => $this->currentIndex.'&ajax=1&ajaxProductsList&token='.Tools::getAdminTokenLite('AdminModules'),
                        'hint' => $this->l('Begin typing the First Letters of the Product Name, then select the Product from the Drop-down List.'),
                    ),
                    array(
                        'type' => 'categories',
                        'label' => $this->l('Select a Category'),
                        'name' => 'selected_category',
                        'form_group_class' => 'block_type_product filter_select_category',
                        'tree' => array(
                            'use_search' => false,
                            'id' => 'categoryBox',
                            'root_category' => $root->id,
                            'selected_categories' => $selected_category,
                        ),
                    ),
                    array(
                        'type' => 'html',
                        'name' => 'static_html_title',
                        'html_content' => '<h4>'.$this->l('Static HTML').'</h4>',
                        'form_group_class' => 'block_type_static_html',
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Content'),
                        'name' => 'static_html',
                        'form_group_class' => 'block_type_static_html',
                        'autoload_rte' => true,
                        'lang' => true,
                        'rows' => 10,
                        'cols' => 100,
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
                'buttons' => array(
                    array(
                        'href' => $this->currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
                        'title' => $this->l('Cancel'),
                        'icon' => 'process-icon-cancel',
                    ),
                ),
            ),
        );

        return $fields_form;
    }

    protected function getColumnBlockFormValues()
    {
        $fields_value = array();

        $id_tdcolumnblock = (int) Tools::getValue('id_tdcolumnblock');
        $tdcolumnblock = new TdColumnBlock($id_tdcolumnblock);

        $fields_value['id_tdcolumnblock'] = $id_tdcolumnblock;
        $fields_value['active'] = Tools::getValue('active', $tdcolumnblock->active);
        $fields_value['position'] = Tools::getValue('position', $tdcolumnblock->position);
        $fields_value['block_type'] = Tools::getValue('block_type', $tdcolumnblock->block_type);
        $fields_value['custom_class'] = Tools::getValue('custom_class', $tdcolumnblock->custom_class);
        $fields_value['product_filter'] = Tools::getValue('product_filter', $tdcolumnblock->product_filter);

        $fields_value['selected_products'] = $tdcolumnblock->getProductsAutocompleteInfo($this->context->language->id);
        $fields_value['limit'] = Tools::getValue('limit', $tdcolumnblock->product_options['limit']);
        $fields_value['enable_slider'] = Tools::getValue('enable_slider', $tdcolumnblock->product_options['enable_slider']);
        $fields_value['auto_scroll'] = Tools::getValue('auto_scroll', $tdcolumnblock->product_options['auto_scroll']);
        $fields_value['slider_row'] = Tools::getValue('slider_row', $tdcolumnblock->product_options['slider_row']);
        $fields_value['product_thumb'] = Tools::getValue('product_thumb', $tdcolumnblock->product_options['product_thumb']);

        $languages = Language::getLanguages(false);
        foreach ($languages as $lang) {
            $default_title = isset($tdcolumnblock->title[$lang['id_lang']]) ? $tdcolumnblock->title[$lang['id_lang']] : '';
            $fields_value['title'][$lang['id_lang']] = Tools::getValue('title_'.(int) $lang['id_lang'], $default_title);
            $default_static_html = isset($tdcolumnblock->static_html[$lang['id_lang']]) ? $tdcolumnblock->static_html[$lang['id_lang']] : '';
            $fields_value['static_html'][$lang['id_lang']] = Tools::getValue('static_html_'.(int) $lang['id_lang'], $default_static_html);
        }

        return $fields_value;
    }

    protected function preProcess()
    {
        $id_lang = (int) $this->context->language->id;
        $column_blocks = array();

        $tdcolumnblocks = TdColumnBlock::getList($id_lang);
        if (!empty($tdcolumnblocks)) {
            foreach ($tdcolumnblocks as $tdcolumnblock) {
                if ($tdcolumnblock['block_type'] == $this->btproduct) {
                    $tdcolumnblock['product_options'] = TdColumnBlock::initProductOptions($tdcolumnblock['product_options']);

                    $products = $this->getProducts(
                        $tdcolumnblock['product_filter'],
                        $tdcolumnblock['product_options']
                    );

                    $column_blocks[] = array(
                        'id' => $tdcolumnblock['id_tdcolumnblock'],
                        'title' => $tdcolumnblock['title'],
                        'block_type' => $tdcolumnblock['block_type'],
                        'custom_class' => $tdcolumnblock['custom_class'],
                        'enable_slider' => $tdcolumnblock['product_options']['enable_slider'],
                        'auto_scroll' => $tdcolumnblock['product_options']['auto_scroll'] ? 'true' : 'false',
                        'slider_row' => $tdcolumnblock['product_options']['slider_row'],
                        'product_thumb' => $tdcolumnblock['product_options']['product_thumb'],
                        'products' => $products,
                    );
                } elseif ($tdcolumnblock['block_type'] == $this->bthtml) {
                    $static_html = $tdcolumnblock['static_html'];
                    $column_blocks[] = array(
                        'id' => $tdcolumnblock['id_tdcolumnblock'],
                        'title' => $tdcolumnblock['title'],
                        'block_type' => $tdcolumnblock['block_type'],
                        'custom_class' => $tdcolumnblock['custom_class'],
                        'static_html' => $static_html,
                    );
                }
            }
        }

        $this->smarty->assign(array(
            'columnBlocks' => $column_blocks,
            'blocktype_product' => $this->btproduct,
            'blocktype_html' => $this->bthtml,
        ));
    }

    public function hookDisplayLeftColumn()
    {
        if (!$this->isCached($this->templateFile, $this->getCacheId('tdcolumnblocks'))) {
            $this->preProcess();
        }

        return $this->fetch($this->templateFile, $this->getCacheId('tdcolumnblocks'));
    }

    public function hookDisplayRightColumn()
    {
        return $this->hookDisplayLeftColumn();
    }

    public function hookDisplayLeftColumnProduct()
    {
        return $this->hookDisplayLeftColumn();
    }

    public function hookDisplayRightColumnProduct()
    {
        return $this->hookDisplayLeftColumn();
    }

    protected function getProducts($product_filter, $product_options)
    {
        $nProducts = $product_options['limit'];
        if ($nProducts < 0) {
            $nProducts = 10;
        }

        $searchContext = new ProductSearchContext($this->context);

        $query = new ProductSearchQuery();

        $query
            ->setResultsPerPage($nProducts)
            ->setPage(1)
        ;

        $query->setSortOrder(new SortOrder('product', 'position', 'asc'));

        $searchProvider = false;
        $products = false;

        if ($product_filter == $this->ptfeatures) {
            $category = new Category((int) $this->context->shop->getCategory());

            if (Validate::isLoadedObject($category)) {
                $searchProvider = new CategoryProductSearchProvider(
                    $this->context->getTranslator(),
                    $category
                );
            }
        } elseif ($product_filter == $this->ptnew) {
            $query
                ->setQueryType('new-products')
                ->setSortOrder(new SortOrder('product', 'date_add', 'desc'))
            ;

            $searchProvider = new NewProductsProductSearchProvider(
                $this->context->getTranslator()
            );
        } elseif ($product_filter == $this->ptspecial) {
            $query->setQueryType('prices-drop');

            $searchProvider = new PricesDropProductSearchProvider(
                $this->context->getTranslator()
            );
        } elseif ($product_filter == $this->ptseller) {
            $query
                ->setQueryType('best-sales')
                ->setSortOrder(new SortOrder('product', 'sale_nbr', 'desc'))
            ;

            $searchProvider = new BestSalesProductSearchProvider(
                $this->context->getTranslator()
            );
        } elseif ($product_filter == $this->ptselected && isset($product_options['selected_products'])) {
            $products = TdColumnBlock::getProductsByArrayId($product_options['selected_products']);
        } elseif ($product_filter == $this->ptcategory && isset($product_options['selected_category'])) {
            $category = new Category((int) $product_options['selected_category']);

            if (Validate::isLoadedObject($category)) {
                $searchProvider = new CategoryProductSearchProvider(
                    $this->context->getTranslator(),
                    $category
                );
            }
        }

        if ($searchProvider) {
            $result = $searchProvider->runQuery(
                $searchContext,
                $query
            );

            $products = $result->getProducts();
        }

        $products_for_template = array();

        if ($products) {
            $assembler = new ProductAssembler($this->context);

            $presenterFactory = new ProductPresenterFactory($this->context);
            $presentationSettings = $presenterFactory->getPresentationSettings();
            $presenter = new ProductListingPresenter(
                new ImageRetriever($this->context->link),
                $this->context->link,
                new PriceFormatter(),
                new ProductColorsRetriever(),
                $this->context->getTranslator()
            );

            foreach ($products as $rawProduct) {
                $products_for_template[] = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct($rawProduct),
                    $this->context->language
                );
            }
        }

        return $products_for_template;
    }
}
