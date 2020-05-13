<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Core\Product\ProductExtraContent;

require_once dirname(__FILE__) . '/classes/TdSizeCharts.php';

class TdSizeCharts extends Module implements WidgetInterface
{
    public $fields_list;
    public $fields_form;

    protected $templateFile;

    public function __construct()
    {
        $this->name = 'tdsizecharts';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';

        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();
        Shop::addTableAssociation('tdsizechart', array('type' => 'shop'));

        $this->displayName = $this->l('TD - Product Size Chart');
        $this->description = $this->l('The module creates size chart with any format of content.');

        $this->templateFile = 'module:' . $this->name . '/views/templates/hook/' . $this->name . '.tpl';
    }

    public function install()
    {
        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayProductActions') &&
            $this->registerHook('displayAdminProductsExtra') &&
            $this->registerHook('actionObjectProductUpdateAfter') &&
            $this->registerHook('actionObjectProductDeleteAfter') &&
            Configuration::updateValue('hook', 0);
    }

    public function uninstall()
    {
        Configuration::deleteByName('hook');
        include(dirname(__FILE__).'/sql/uninstall.php');
        return parent::uninstall();
    }


    public function hookBackOfficeHeader()
    {
        Media::addJsDef(array(
            'tdModulesSizeCharts' => [
                'ajaxUrl' => $this->context->link->getAdminLink('AdminModules', true) . '&ajax=1&configure=' . $this->name
            ]
        ));
    }

    public function hookHeader()
    {
        $this->context->controller->registerJavascript('modules-'.$this->name.'-script', 'modules/'.$this->name.'/views/js/front.js', ['position' => 'bottom', 'priority' => 150]);
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
        $this->context->controller->addJS($this->_path . '/views/js/admin/bo_module.js');
        $about = $this->about();
        $output = '';
        $id_tdsizechart = (int)Tools::getValue('id_tdsizechart');

        if (Tools::isSubmit('added')) {
            $output .= '<div class="alert alert-success">' . $this->l('Chart added') . '</div>';
        }

        if (Tools::isSubmit('saveTdSizeChart')) {
            if ($id_tdsizechart) {
                $tdAdditionalTab = new TdSizeChart((int)$id_tdsizechart);
            } else {
                $tdAdditionalTab = new TdSizeChart();
            }
            $tdAdditionalTab->copyFromPost();

            $id_shop_list = Tools::getValue('checkBoxShopAsso_tdsizechart');
            if (isset($id_shop_list) && !empty($id_shop_list)) {
                $tdAdditionalTab->id_shop_list = $id_shop_list;
            } else {
                $tdAdditionalTab->id_shop_list[] = (int)Context::getContext()->shop->id;
            }

            if ($tdAdditionalTab->validateFields(false) && $tdAdditionalTab->validateFieldsLang(false)) {
                $tdAdditionalTab->save();
                $tdAdditionalTab->updateCategories(Tools::getValue('categoryBox'));
                $tdAdditionalTab->updateBrands(Tools::getValue('brands'));

                $this->clearCache();
                Tools::redirectAdmin(AdminController::$currentIndex . '&configure=' . $this->name . '&added&token=' . Tools::getAdminTokenLite('AdminModules'));
            } else {
                $output .= '<div class="conf error">' . $this->l('An error occurred while attempting to save.') . '</div>';
            }
        }

        if (Tools::isSubmit('submitModule')) {
            $this->postProcess();
        }

        if (Tools::isSubmit('updatetdsizecharts') || Tools::isSubmit('addTdSizeChart')) {
            $helper = $this->initForm();
            foreach (Language::getLanguages(false) as $lang) {
                if ($id_tdsizechart) {
                    $tdAdditionalTab = new TdSizeChart((int)$id_tdsizechart);
                    $helper->id = (int)$id_tdsizechart;
                    $helper->fields_value['title'][(int)$lang['id_lang']] = $tdAdditionalTab->title[(int)$lang['id_lang']];
                    $helper->fields_value['active'] = $tdAdditionalTab->active;
                    $helper->fields_value['brands[]'] = TdSizeChart::getChartBrands($id_tdsizechart);
                    $helper->fields_value['description'][(int)$lang['id_lang']] = $tdAdditionalTab->description[(int)$lang['id_lang']];
                    $helper->fields_value['description'][(int)$lang['id_lang']] = $tdAdditionalTab->description[(int)$lang['id_lang']];
                } else {
                    $helper->fields_value['title'][(int)$lang['id_lang']] = Tools::getValue('title_' . (int)$lang['id_lang'], '');
                    $helper->fields_value['active'] = true;
                    $helper->fields_value['brands[]'] = [0];
                    $helper->fields_value['description'][(int)$lang['id_lang']] = Tools::getValue('description_' . (int)$lang['id_lang'], '');
                }
            }
            $helper->table = 'tdsizechart';
            $helper->identifier = 'id_tdsizechart';
            if ($id_tdsizechart = Tools::getValue('id_tdsizechart')) {
                $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_tdsizechart');
                $helper->fields_value['id_tdsizechart'] = (int)$id_tdsizechart;
            }
            return $output . $helper->generateForm($this->fields_form);
        } elseif (Tools::isSubmit('deletetdsizecharts')) {
            $tdSizeChart = new TdSizeChart((int)$id_tdsizechart);
            $tdSizeChart->delete();
            $this->clearCache();
            Tools::redirectAdmin(AdminController::$currentIndex . '&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'));
        } else {
            $output .= $this->renderForm();
            $output .= $this->initList();
        }

        return $output.$about;
    }

    public function renderForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->l('Display Size chart as'),
                        'name' => 'hook',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 0,
                                    'name' => $this->l('Pop up'),
                                ),
                                array(
                                    'id_option' => 1,
                                    'name' => $this->l('Additional Tab'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                ),
                'submit' => array(
                    'name' => 'submitModule',
                    'title' => $this->l('Save'),
                ),
            ),
        );

        if (Shop::isFeatureActive()) {
            $fields_form['form']['description'] = $this->l('The modifications will be applied to') . ' ' . (Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop') . ' ' . $this->context->shop->name : $this->l('all shops'));
        }

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->module = $this;
        $helper->identifier = $this->identifier;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );
        return $helper->generateForm(array($fields_form));
    }

    public function getConfigFieldsValues()
    {
        return array(
            'hook' => (bool)Tools::getValue('hook', Configuration::get('hook')),
        );
    }

    protected function postProcess()
    {
        if ((bool)Tools::getValue('hook') == 0) {
            $this->registerHook('displayProductActions');
            $this->unregisterHook('displayProductExtraContent');
        } else {
            $this->unregisterHook('displayProductActions');
            $this->registerHook('displayProductExtraContent');
        }
        Configuration::updateValue('hook', (int)Tools::getValue('hook'));
    }

    protected function initList()
    {
        $charts = TdSizeChart::getCharts();

        foreach ($charts as $key => $chart) {
            $associated_shop_ids = TdSizeChart::getAssociatedIdsShop((int)$chart['id_tdsizechart']);
            if ($associated_shop_ids && count($associated_shop_ids) > 1) {
                $charts[$key]['is_shared'] = true;
            } else {
                $charts[$key]['is_shared'] = false;
            }
        }

        $this->context->smarty->assign(array(
            'path' => $this->_path,
            'charts' => $charts,
            'link' => $this->context->link,
            'module' => $this->name,
        ));

        return $this->display(__FILE__, 'views/templates/admin/bo_module.tpl');
    }

    protected function initForm()
    {
        $id_tdsizechart = (int)Tools::getValue('id_tdsizechart');
        $selectedCategories = TdSizeChart::getChartCategories($id_tdsizechart);

        $brandsSelect =[
            array(
                'id_manufacturer' => 0,
                'name' => '--- All ----',
            )
        ];

        $brandsSoruce = Manufacturer::getManufacturers();
        $brands = array_merge($brandsSelect, $brandsSoruce);

        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('New size Chart'),
            ),
            'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enabled'),
                    'name' => 'active',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('No')
                        )
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Title'),
                    'name' => 'title',
                    'lang' => true,
                ),
                array(
                    'type' => 'categories',
                    'name' => 'categoryBox',
                    'label' => $this->l('Assign to categories'),
                    'desc' => $this->l('If product have selected category set as main category then size chart will be showed on product Page. 
                    You can also assign chart per specified product, during product edit in backfoffice'),
                    'tree' => array(
                        'id' => 'categories-tree',
                        'selected_categories' => $selectedCategories,
                        'root_category' => (int)$this->context->shop->getCategory(),
                        'use_search' => true,
                        'use_checkbox' => true
                    ),
                ),

                array(
                    'type' => 'select',
                    'label' => $this->l('Assign to brands'),
                    'name' => 'brands',
                    'multiple' => true,
                    'size' => 20,
                    'desc' => $this->l('Will show sizechart only if product is on selected category and brand'),
                    'options' => array(
                        'query' => $brands,
                        'id' => 'id_manufacturer',
                        'name' => 'name',
                    ),
                ),

                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description'),
                    'name' => 'description',
                    'autoload_rte' => true,
                    'lang' => true,
                    'class' => 'js-chart-content'
                ),
                array(
                    'type' => 'table_generator',
                    'label' => $this->l('Table generator'),
                    'name' => 'table_generator',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
            ),
            'buttons' => array(
                'cancelBlock' => array(
                    'title' => $this->l('Back to list'),
                    'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'),
                    'icon' => 'process-icon-back',
                ),
            ),
        );

        if (Shop::isFeatureActive()) {
            $this->fields_form[0]['form']['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association'),
                'name' => 'checkBoxShopAsso',
            );
        }

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->identifier = $this->identifier;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        foreach (Language::getLanguages(false) as $lang) {
            $helper->languages[] = array(
                'id_lang' => $lang['id_lang'],
                'iso_code' => $lang['iso_code'],
                'name' => $lang['name'],
                'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
            );
        }
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->toolbar_scroll = true;
        $helper->title = $this->displayName;
        $helper->tpl_vars = array(
            'module_path' => $this->_path,
        );
        $helper->submit_action = 'saveTdSizeChart';
        return $helper;
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $idProduct = (int)Tools::getValue('id_product', $params['id_product']);
        $charts = TdSizeChart::getCharts();
        $selectedChart = TdSizeChart::getChartAssignedToProduct($idProduct);


        $this->context->smarty->assign(array(
            'path' => $this->_path,
            'charts' => $charts,
            'selectedChart' => $selectedChart,
            'idProduct' => $idProduct,
            'link' => $this->context->link,
            'moduleLink' => $this->context->link->getAdminLink('AdminModules') . '&configure=tdsizecharts&addTdSizeChart=1',
            'module' => $this->name,
        ));

        return $this->display(__FILE__, 'views/templates/admin/bo_productab.tpl');
    }


    public function renderWidget($hookName = null, array $configuration = [])
    {
        if ($hookName == null && isset($configuration['hook'])) {
            $hookName = $configuration['hook'];
        }

        if (preg_match('/^displayProductExtraContent\d*$/', $hookName)) {
            return $this->getWidgetVariables($hookName, $configuration);
        } elseif (preg_match('/^displayProductAdditionalInfo\d*$/', $hookName) || preg_match('/^displayProductActions\d*$/', $hookName) || preg_match('/^displayAfterProductAddCartBtn\d*$/', $hookName)) {
            $idProduct = (int)$configuration['smarty']->tpl_vars['product']->value['id_product'];

            $cacheId = 'tdsizecharts|' . $idProduct;

            if (!$this->isCached($this->templateFile, $this->getCacheId($cacheId))) {
                $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
            }
            return $this->fetch($this->templateFile, $this->getCacheId($cacheId));
        }
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        if ($hookName == null && isset($configuration['hook'])) {
            $hookName = $configuration['hook'];
        }

        if (preg_match('/^displayProductExtraContent\d*$/', $hookName)) {
            $array = array();
            $idProduct = (int)$configuration['product']->id;
            $idLang = (int)$this->context->language->id;
            $idShop = (int)$this->context->shop->id;
            $productChart = TdSizeChart::getChartAssignedToProduct($idProduct);
            $idCategory = (int)$configuration['product']->id_category_default;
            $id_manufacturer = $configuration['product']->id_manufacturer;

            $charts = array();
            if ($productChart > 0) {
                $charts[] = (array)new TdSizeChart($productChart, $idLang, $idShop);
            } elseif ($productChart == 0) {
                return $array;
            } else {
                $charts = TdSizeChart::getChartsByCategoryAndBrand($idCategory, $id_manufacturer);
            }

            foreach ($charts as $key => $chart) {
                if ($chart['title']) {
                    $array[] = (new ProductExtraContent())
                        ->setTitle($chart['title'])
                        ->setContent('<div class="rte-content">'.$chart['description'].'</div>');
                }
            }
            return $array;
        } elseif (preg_match('/^displayProductAdditionalInfo\d*$/', $hookName) || preg_match('/^displayProductActions\d*$/', $hookName) || preg_match('/^displayAfterProductAddCartBtn\d*$/', $hookName)) {
            $idProduct = (int)$configuration['product']['id_product'];
            $idCategory = (int)$configuration['product']['id_category_default'];
            $idLang = (int)$this->context->language->id;
            $idShop = (int)$this->context->shop->id;
            $id_manufacturer = $configuration['product']['id_manufacturer'];

            $productChart = TdSizeChart::getChartAssignedToProduct($idProduct);

            $charts = array();
            if ($productChart > 0) {
                $charts[] = (array)new TdSizeChart($productChart, $idLang, $idShop);
            } elseif ($productChart == 0) {
                return $charts;
            } else {
                $charts = TdSizeChart::getChartsByCategoryAndBrand($idCategory, $id_manufacturer);
            }

            return array(
                'charts' => $charts,
            );
        }
    }

    public function hookActionObjectProductUpdateAfter($params)
    {
        if (!isset($params['object']->id)) {
            return;
        }

        $this->joinWithProduct($params['object']->id);
    }

    public function joinWithProduct($idProduct)
    {
        $chart = (int)Tools::getValue('tdsizecharts')['chart'];

        if ($chart >= 0) {
            TdSizeChart::assignProduct($idProduct, $chart);
        } else {
            TdSizeChart::deleteAssignedProduct($idProduct);
        }

        $this->clearCache($idProduct);
    }

    public function hookcActionObjectProductDeleteAfter($params)
    {
        if (!isset($params['object']->id)) {
            return;
        }

        TdSizeChart::deleteAssignedProduct($params['object']->id);

        $this->clearCache($params['object']->id);
    }


    public function clearCache($idProduct = 0)
    {
        if ($idProduct) {
            $this->_clearCache($this->templateFile, $this->name . '|' . $idProduct);
        } else {
            $this->_clearCache($this->templateFile);
        }
    }
}
