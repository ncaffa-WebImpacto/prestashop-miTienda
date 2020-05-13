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

require_once(_PS_MODULE_DIR_.'tdcompare/classes/TdCompareProduct.php');

class Tdcompare extends Module
{
    private $templateFile;
    private $link;

    public function __construct()
    {
        $this->name = 'tdcompare';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';
        $this->controllers = array('compare');
        $this->bootstrap = true;
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('TD - Compare Products');
        $this->description = $this->l('Adds Product Compare function to store.');

        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);

        $this->link = $this->context->link;

        $this->templateFile = 'module:tdcompare/views/templates/hook/tdcompare.tpl';
    }

    public function install()
    {
        $this->createTables();

        Configuration::updateValue('TDCOMPARATOR_ENABLE', 1);
        Configuration::updateValue('TDCOMPARATOR_PRODUCTLIST', 1);
        Configuration::updateValue('TDCOMPARATOR_PRODUCTPAGE', 1);
        Configuration::updateValue('TDCOMPARATOR_HEADER', 1);
        Configuration::updateValue('TDCOMPARATOR_MAXITEM', '3');

        return parent::install()
            && $this->registerHook('displayProductListFunctionalButtons')
            && $this->registerHook('displayProductActions')
            && $this->registerHook('displayTdCompareHeader')
            && $this->registerHook('displayTdCompare')
            && $this->registerHook('displayHeader');
    }

    public function uninstall()
    {
        $this->deleteTables();

        Configuration::deleteByName('TDCOMPARATOR_ENABLE');
        Configuration::deleteByName('TDCOMPARATOR_PRODUCTLIST');
        Configuration::deleteByName('TDCOMPARATOR_PRODUCTPAGE');
        Configuration::deleteByName('TDCOMPARATOR_HEADER');
        Configuration::deleteByName('TDCOMPARATOR_MAXITEM');

        return parent::uninstall();
    }

    protected function createTables()
    {
        $res = (bool)Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdcompare` (
            `id_compare` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `id_customer` int(10) unsigned NOT NULL,
            PRIMARY KEY (`id_compare`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        ');

        $res &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdcompare_product` (
            `id_compare` int(10) unsigned NOT NULL,
            `id_product` int(10) unsigned NOT NULL,
            `date_add` datetime NOT NULL,
            `date_upd` datetime NOT NULL,
            PRIMARY KEY (`id_compare`, `id_product`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        ');

        return $res;
    }

    protected function deleteTables()
    {
        return Db::getInstance()->execute('
            DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdcompare`, `'._DB_PREFIX_.'tdcompare_product`;
        ');
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
        return $this->postProcess().$this->renderForm().$this->about();
    }

    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitTdcompare';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enable Product Comparison'),
                        'name' => 'TDCOMPARATOR_ENABLE',
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Display Compare Button in Product List'),
                        'name' => 'TDCOMPARATOR_PRODUCTLIST',
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Display Compare Button in Product Page'),
                        'name' => 'TDCOMPARATOR_PRODUCTPAGE',
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Display Compare Link in Header'),
                        'name' => 'TDCOMPARATOR_HEADER',
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Product comparison'),
                        'validation' => 'isUnsignedId',
                        'name' => 'TDCOMPARATOR_MAXITEM',
                        'required' => true,
                        'cast' => 'intval',
                        'hint' => $this->l('Set the maximum number of products that can be selected for comparison. Set to "0" to disable this feature.'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    protected function getConfigFormValues()
    {
        $data = array(
            'TDCOMPARATOR_ENABLE' => Tools::getValue('TDCOMPARATOR_ENABLE', Configuration::get('TDCOMPARATOR_ENABLE')),
            'TDCOMPARATOR_PRODUCTLIST' => Tools::getValue('TDCOMPARATOR_PRODUCTLIST', Configuration::get('TDCOMPARATOR_PRODUCTLIST')),
            'TDCOMPARATOR_PRODUCTPAGE' => Tools::getValue('TDCOMPARATOR_PRODUCTPAGE', Configuration::get('TDCOMPARATOR_PRODUCTPAGE')),
            'TDCOMPARATOR_HEADER' => Tools::getValue('TDCOMPARATOR_HEADER', Configuration::get('TDCOMPARATOR_HEADER')),
            'TDCOMPARATOR_MAXITEM' => Tools::getValue('TDCOMPARATOR_MAXITEM', Configuration::get('TDCOMPARATOR_MAXITEM')),
        );
        return $data;
    }

    protected function postProcess()
    {
        if (((bool)Tools::isSubmit('submitTdcompare')) == true) {
            Configuration::updateValue('TDCOMPARATOR_ENABLE', (int)(Tools::getValue('TDCOMPARATOR_ENABLE')));
            Configuration::updateValue('TDCOMPARATOR_PRODUCTLIST', (int)(Tools::getValue('TDCOMPARATOR_PRODUCTLIST')));
            Configuration::updateValue('TDCOMPARATOR_PRODUCTPAGE', (int)(Tools::getValue('TDCOMPARATOR_PRODUCTPAGE')));
            Configuration::updateValue('TDCOMPARATOR_HEADER', (int)(Tools::getValue('TDCOMPARATOR_HEADER')));
            Configuration::updateValue('TDCOMPARATOR_MAXITEM', Tools::getValue('TDCOMPARATOR_MAXITEM'));
            $this->_clearCache($this->templateFile);
            return $this->displayConfirmation($this->l('The settings have been updated.'));
        }
        return '';
    }

    public function hookDisplayHeader()
    {
        if (Configuration::get('TDCOMPARATOR_ENABLE') && Configuration::get('TDCOMPARATOR_MAXITEM') > 0) {
            $this->context->controller->registerJavascript('module-compare', 'modules/'.$this->name.'/views/js/products-comparison.js', ['position' => 'bottom', 'priority' => 150]);

            $compared_products = [];
            if (Configuration::get('TDCOMPARATOR_MAXITEM') && isset($this->context->cookie->id_compare)) {
                $compared_products = TdCompareProduct::getCompareProducts($this->context->cookie->id_compare);
            }

            $comparator_max_item = (int)Configuration::get('TDCOMPARATOR_MAXITEM');

            $productcompare_max_item = sprintf($this->l('You cannot add more than %d product(s) to the product comparison'), $comparator_max_item);
            Media::addJsDef(
                array(
                    'compareUrl' => $this->link->getModuleLink('tdcompare', 'compare'),
                    'compareAdd' => $this->l('The product has been added to product comparison'),
                    'compareRemove' => $this->l('The product has been removed from the product comparison'),
                    'compareView' => $this->l('Compare'),
                    'buttoncompare_title_add' => $this->l('Add to Compare'),
                    'buttoncompare_title_remove' => $this->l('Remove from Compare'),
                    'comparedProductsIds' => $compared_products ? $compared_products : [],
                    'comparator_max_item' => $comparator_max_item,
                    'compared_products' => $compared_products ? $compared_products : [],
                    'max_item' => $productcompare_max_item,
                )
            );
        }
    }

    public function hookDisplayTdCompareButton($params)
    {
        if (Configuration::get('TDCOMPARATOR_ENABLE') && Configuration::get('TDCOMPARATOR_MAXITEM') > 0) {
            $page_name = Dispatcher::getInstance()->getController();
            if ((Configuration::get('TDCOMPARATOR_PRODUCTLIST') && $page_name != 'product') || (Configuration::get('TDCOMPARATOR_PRODUCTPAGE') && $page_name == 'product')) {
                $id_product = $params['product']['id_product'];
                $compared_products = [];
                if (Configuration::get('TDCOMPARATOR_MAXITEM') && isset($this->context->cookie->id_compare)) {
                    $compared_products = TdCompareProduct::getCompareProducts($this->context->cookie->id_compare);
                }
                $added = false;
                if ($compared_products && in_array($id_product, $compared_products)) {
                    $added = true;
                }
                $this->smarty->assign(array(
                    'added' => $added,
                    'id_product' => $id_product,
                ));
                return $this->display(__FILE__, 'tdcompare-button.tpl');
            }
        }
    }

    public function hookDisplayProductListFunctionalButtons($params)
    {
        return $this->hookDisplayTdCompareButton($params);
    }

    public function hookDisplayProductActions($params)
    {
        if (Configuration::get('TDCOMPARATOR_ENABLE') && Configuration::get('TDCOMPARATOR_MAXITEM') > 0) {
            $page_name = Dispatcher::getInstance()->getController();
            if ((Configuration::get('TDCOMPARATOR_PRODUCTLIST') && $page_name != 'product') || (Configuration::get('TDCOMPARATOR_PRODUCTPAGE') && $page_name == 'product')) {
                $id_product = $params['product']['id_product'];
                $compared_products = [];
                if (Configuration::get('TDCOMPARATOR_MAXITEM') && isset($this->context->cookie->id_compare)) {
                    $compared_products = TdCompareProduct::getCompareProducts($this->context->cookie->id_compare);
                }
                $added = false;
                if ($compared_products && in_array($id_product, $compared_products)) {
                    $added = true;
                }
                $this->smarty->assign(array(
                    'added' => $added,
                    'id_product' => $id_product,
                ));
                return $this->display(__FILE__, 'tdcompare-pp-button.tpl');
            }
        }
    }

    public function hookDisplayTdCompare($params)
    {
        if (Configuration::get('TDCOMPARATOR_ENABLE') && Configuration::get('TDCOMPARATOR_MAXITEM') > 0) {
            $compared_products = array();
            if (Configuration::get('TDCOMPARATOR_MAXITEM') && isset($this->context->cookie->id_compare)) {
                $compared_products = TdCompareProduct::getCompareProducts($this->context->cookie->id_compare);
            }

            $this->smarty->assign(array(
                'compareUrl' => $this->link->getModuleLink('tdcompare', 'compare'),
                'compared_products'   => is_array($compared_products) ? $compared_products : array(),
                'comparator_max_item' => Configuration::get('TDCOMPARATOR_MAXITEM'),
            ));

            return ($this->display(__FILE__, 'product-compare.tpl'));
        }
    }

    public function hookDisplayTdCompareHeader($params)
    {
        if (Configuration::get('TDCOMPARATOR_ENABLE') && Configuration::get('TDCOMPARATOR_HEADER') && Configuration::get('TDCOMPARATOR_MAXITEM') > 0) {
            $compared_products = array();
            if (Configuration::get('TDCOMPARATOR_MAXITEM') && isset($this->context->cookie->id_compare)) {
                $compared_products = TdCompareProduct::getCompareProducts($this->context->cookie->id_compare);
            }

            $this->smarty->assign(array(
                'compareUrl' => $this->link->getModuleLink('tdcompare', 'compare'),
                'compared_products'   => is_array($compared_products) ? $compared_products : array(),
                'comparator_max_item' => Configuration::get('TDCOMPARATOR_MAXITEM'),
            ));

            return ($this->display(__FILE__, 'product-compare-header.tpl'));
        }
    }

    public function hookDisplayTop($params)
    {
        return $this->hookDisplayTdCompareHeader($params);
    }

    public function hookDisplayNavFullWidth($params)
    {
        return $this->hookDisplayTdCompareHeader($params);
    }

    public function prepareVariables()
    {
        return array(
            'TDCOMPARATOR_ENABLE' => (int)Configuration::get('TDCOMPARATOR_ENABLE'),
            'TDCOMPARATOR_PRODUCTLIST' => (int)Configuration::get('TDCOMPARATOR_PRODUCTLIST'),
            'TDCOMPARATOR_PRODUCTPAGE' => (int)Configuration::get('TDCOMPARATOR_PRODUCTPAGE'),
            'TDCOMPARATOR_HEADER' => (int)Configuration::get('TDCOMPARATOR_HEADER'),
            'TDCOMPARATOR_MAXITEM' => Configuration::get('TDCOMPARATOR_MAXITEM'),
        );
    }
}
