<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(_PS_MODULE_DIR_ . 'tdproductwishlist/classes/TdWishList.php');

class TdProductWishList extends Module
{
    protected $config_form = false;
    private $link;
    public $module_path;
    protected $_postErrors = array();
    public $html = '';

    public function __construct()
    {
        $this->name = 'tdproductwishlist';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';
        $this->need_instance = 0;

        $this->controllers = array('mywishlist', 'view');

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('TD - Wishlist block');
        $this->description = $this->l('Adds a block containing the customer\'s wishlists.');

        $this->secure_key = Tools::encrypt($this->name);

        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
        $this->link = $this->context->link;
        $this->module_path = $this->local_path;
    }

    public function install()
    {
        $this->createTables();

        Configuration::updateValue('TDWISHLIST_ENABLE', 1);
        Configuration::updateValue('TDWISHLIST_PRODUCTLIST', 1);
        Configuration::updateValue('TDWISHLIST_PRODUCTPAGE', 1);
        Configuration::updateValue('TDWISHLIST_HEADER', 1);

        return parent::install()
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayProductListFunctionalButtons')
            && $this->registerHook('displayProductActions')
            && $this->registerHook('displayTdWishlistHeader')
            && $this->registerHook('displayCustomerAccount')
            && $this->registerHook('displayMyAccountBlock');
    }

    protected function createTables()
    {
        $res = 1;
        include_once(dirname(__FILE__) . '/install/install.php');
        return $res;
    }

    public function uninstall()
    {
        $this->deleteTables();

        Configuration::deleteByName('TDWISHLIST_ENABLE');
        Configuration::deleteByName('TDWISHLIST_PRODUCTLIST');
        Configuration::deleteByName('TDWISHLIST_PRODUCTPAGE');
        Configuration::deleteByName('TDWISHLIST_HEADER');

        return parent::uninstall()
            && $this->unregisterHook('displayHeader')
            && $this->unregisterHook('displayProductListFunctionalButtons')
            && $this->unregisterHook('displayTdWishlistHeader')
            && $this->unregisterHook('displayCustomerAccount')
            && $this->unregisterHook('displayMyAccountBlock');
    }

    public function deleteTables()
    {
        return Db::getInstance()->execute('
            DROP TABLE IF EXISTS
            `' . _DB_PREFIX_ . 'tdwishlist`,
            `' . _DB_PREFIX_ . 'tdwishlist_product`
        ');
    }

    public function postProcess()
    {
        if (count($this->errors) > 0) {
            return;
        }

        if (((bool) Tools::isSubmit('submitSettings')) == true) {
            $this->_postProcess();
        }
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
        $this->errors = array();

        $this->postProcess();

        $this->html .= $this->renderConfigForm();
        return $this->html.$this->about();
    }


    public function renderConfigForm()
    {
        $fields_form_1 = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Configuration'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enable Product Wishlist'),
                        'name' => 'TDWISHLIST_ENABLE',
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
                        'label' => $this->l('Display Wishlist Button in Product List'),
                        'name' => 'TDWISHLIST_PRODUCTLIST',
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
                        'label' => $this->l('Display Wishlist Button in Product Page'),
                        'name' => 'TDWISHLIST_PRODUCTPAGE',
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
                        'label' => $this->l('Display Wishlist Button in Header'),
                        'name' => 'TDWISHLIST_HEADER',
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
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'name' => 'submitSettings',
                ),
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->name;
        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->module = $this;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitSettings';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($fields_form_1));
    }

    protected function getConfigFieldsValues()
    {
        $data = array(
            'TDWISHLIST_ENABLE' => Tools::getValue('TDWISHLIST_ENABLE', Configuration::get('TDWISHLIST_ENABLE')),
            'TDWISHLIST_PRODUCTLIST' => Tools::getValue('TDWISHLIST_PRODUCTLIST', Configuration::get('TDWISHLIST_PRODUCTLIST')),
            'TDWISHLIST_PRODUCTPAGE' => Tools::getValue('TDWISHLIST_PRODUCTPAGE', Configuration::get('TDWISHLIST_PRODUCTPAGE')),
            'TDWISHLIST_HEADER' => Tools::getValue('TDWISHLIST_HEADER', Configuration::get('TDWISHLIST_HEADER')),
        );
        return $data;
    }

    protected function _postProcess()
    {
        Configuration::updateValue('TDWISHLIST_ENABLE', (int)(Tools::getValue('TDWISHLIST_ENABLE')));
        Configuration::updateValue('TDWISHLIST_PRODUCTLIST', (int)(Tools::getValue('TDWISHLIST_PRODUCTLIST')));
        Configuration::updateValue('TDWISHLIST_PRODUCTPAGE', (int)(Tools::getValue('TDWISHLIST_PRODUCTPAGE')));
        Configuration::updateValue('TDWISHLIST_HEADER', (int)(Tools::getValue('TDWISHLIST_HEADER')));

        Tools::redirectAdmin('index.php?controller=AdminModules&configure=tdproductwishlist&token=' . Tools::getAdminTokenLite('AdminModules') . '&conf=4');
    }

    public function hookHeader($params)
    {
        if (Configuration::get('TDWISHLIST_ENABLE')) {
            $this->context->controller->registerJavascript('ajax-wishlist', 'modules/'.$this->name.'/views/js/ajax-wishlist.js', ['position' => 'bottom', 'priority' => 150]);

            $page_name = Dispatcher::getInstance()->getController();
            $tdtoken = Tools::getToken(false);

            if ($page_name == 'orderconfirmation') {
                if ($this->context->customer->is_guest) {
                    $tdtoken = Tools::hash(false);
                }
            };

            if ($this->context->customer->isLogged()) {
                $isLogged = true;
            } else {
                $isLogged = false;
            }
            Media::addJsDef(array(
                'wishlist_url' => $this->link->getModuleLink('tdproductwishlist', 'mywishlist'),
                'wishlist_add' => $this->l('The product was successfully added to your wishlist'),
                'wishlist_view' => $this->l('View your wishlist'),
                'wishlist_remove' => $this->l('The product was successfully removed from your wishlist'),
                'buttonwishlist_title_add' => $this->l('Add to Wishlist'),
                'buttonwishlist_title_remove' => $this->l('Remove from WishList'),
                'wishlist_loggin_required' => $this->l('You must be logged in to manage your wishlist'),
                'isLogged' => $isLogged,
                'loginLabel' => $this->l('Login'),
                'login_url' => $this->context->link->getPageLink('my-account'),
                'wishlist_cancel_txt' => $this->l('Cancel'),
                'wishlist_ok_txt' => $this->l('Ok'),
                'wishlist_send_txt' => $this->l('Send'),
                'wishlist_reset_txt' => $this->l('Reset'),
                'wishlist_send_wishlist_txt' => $this->l('Send wishlist'),
                'wishlist_email_txt' => $this->l('Email'),
                'wishlist_confirm_del_txt' => $this->l('Delete selected item?'),
                'wishlist_del_default_txt' => $this->l('Cannot delete default wishlist'),
                'wishlist_quantity_required' => $this->l('You must enter a quantity'),
                'tdtoken' => $tdtoken,
            ));
        }
    }

    public function hookDisplayTdWishListButton($params)
    {
        if (Configuration::get('TDWISHLIST_ENABLE')) {
            $page_name = Dispatcher::getInstance()->getController();
            if ((Configuration::get('TDWISHLIST_PRODUCTLIST') && $page_name != 'product') || (Configuration::get('TDWISHLIST_PRODUCTPAGE') && $page_name == 'product')) {
                $wishlists = array();
                $wishlists_added = array();
                $id_wishlist = false;
                $added_wishlist = false;
                $id_product = $params['product']['id_product'];
                $id_product_attribute = $params['product']['id_product_attribute'];
                if ($this->context->customer->isLogged()) {
                    $wishlists = TdWishList::getByIdCustomer($this->context->customer->id);
                    if (empty($this->context->cookie->id_wishlist) === true ||
                            TdWishList::exists($this->context->cookie->id_wishlist, $this->context->customer->id) === false) {
                        if (!count($wishlists)) {
                            $id_wishlist = false;
                        } else {
                            $id_wishlist = (int) $wishlists[0]['id_wishlist'];
                            $this->context->cookie->id_wishlist = (int) $id_wishlist;
                        }
                    } else {
                        $id_wishlist = $this->context->cookie->id_wishlist;
                    }

                    $wishlist_products = ($id_wishlist == false ? array() : TdWishList::getSimpleProductByIdCustomer($this->context->customer->id, $this->context->shop->id));

                    $check_product_added = array('id_product' => $id_product, 'id_product_attribute' => $id_product_attribute);

                    foreach ($wishlist_products as $key => $wishlist_products_val) {
                        if (in_array($check_product_added, $wishlist_products_val)) {
                            $added_wishlist = true;
                            $wishlists_added[] = $key;
                        }
                    }
                }

                $this->smarty->assign(array(
                    'wishlists_added' => $wishlists_added,
                    'wishlists' => $wishlists,
                    'added_wishlist' => $added_wishlist,
                    'id_wishlist' => $id_wishlist,
                    'wishlist_id_product' => $id_product,
                    'wishlist_id_product_attribute' => $id_product_attribute,
                ));

                return $this->display(__FILE__, 'views/templates/hook/tdproductwishlist_button.tpl');
            }
        }
    }

    public function hookDisplayProductListFunctionalButtons($params)
    {
        return $this->hookDisplayTdWishListButton($params);
    }

    public function hookDisplayProductActions($params)
    {
        if (Configuration::get('TDWISHLIST_ENABLE')) {
            $page_name = Dispatcher::getInstance()->getController();
            if ((Configuration::get('TDWISHLIST_PRODUCTLIST') && $page_name != 'product') || (Configuration::get('TDWISHLIST_PRODUCTPAGE') && $page_name == 'product')) {
                $wishlists = array();
                $wishlists_added = array();
                $id_wishlist = false;
                $added_wishlist = false;
                $id_product = $params['product']['id_product'];
                $id_product_attribute = $params['product']['id_product_attribute'];
                if ($this->context->customer->isLogged()) {
                    $wishlists = TdWishList::getByIdCustomer($this->context->customer->id);
                    if (empty($this->context->cookie->id_wishlist) === true ||
                            TdWishList::exists($this->context->cookie->id_wishlist, $this->context->customer->id) === false) {
                        if (!count($wishlists)) {
                            $id_wishlist = false;
                        } else {
                            $id_wishlist = (int) $wishlists[0]['id_wishlist'];
                            $this->context->cookie->id_wishlist = (int) $id_wishlist;
                        }
                    } else {
                        $id_wishlist = $this->context->cookie->id_wishlist;
                    }

                    $wishlist_products = ($id_wishlist == false ? array() : TdWishList::getSimpleProductByIdCustomer($this->context->customer->id, $this->context->shop->id));

                    $check_product_added = array('id_product' => $id_product, 'id_product_attribute' => $id_product_attribute);

                    foreach ($wishlist_products as $key => $wishlist_products_val) {
                        if (in_array($check_product_added, $wishlist_products_val)) {
                            $added_wishlist = true;
                            $wishlists_added[] = $key;
                        }
                    }
                }

                $this->smarty->assign(array(
                    'wishlists_added' => $wishlists_added,
                    'wishlists' => $wishlists,
                    'added_wishlist' => $added_wishlist,
                    'id_wishlist' => $id_wishlist,
                    'wishlist_id_product' => $id_product,
                    'wishlist_id_product_attribute' => $id_product_attribute,
                ));

                return $this->display(__FILE__, 'views/templates/hook/tdproductwishlist_pp_button.tpl');
            }
        }
    }

    public function hookDisplayTdWishlistHeader($params)
    {
        if (Configuration::get('TDWISHLIST_ENABLE') && Configuration::get('TDWISHLIST_HEADER')) {
            $this->context->smarty->assign(array(
                'wishlist_link' => $this->link->getModuleLink('tdproductwishlist', 'mywishlist'),
                'count_product' => (int)Db::getInstance()->getValue('SELECT count(id_wishlist_product) FROM '._DB_PREFIX_.'tdwishlist w, '._DB_PREFIX_.'tdwishlist_product wp where w.id_wishlist = wp.id_wishlist and w.id_customer='.(int)$this->context->customer->id),
            ));

            return $this->display(__FILE__, 'views/templates/hook/tdproductwishlist_top.tpl');
        }
    }

    public function hookDisplayTop($params)
    {
        return $this->hookDisplayTdWishlistHeader($params);
    }

    public function hookDisplayNavFullWidth($params)
    {
        return $this->hookDisplayTdWishlistHeader($params);
    }


    public function hookCustomerAccount($params)
    {
        if (Configuration::get('TDWISHLIST_ENABLE')) {
            $this->context->smarty->assign(array(
                'wishlist_link' => $this->link->getModuleLink('tdproductwishlist', 'mywishlist'),
            ));
            return $this->display(__FILE__, 'views/templates/hook/my-account.tpl');
        }
    }

    public function hookDisplayMyAccountBlock($params)
    {
        if (Configuration::get('TDWISHLIST_ENABLE')) {
            $this->context->smarty->assign(array(
                'wishlist_link' => $this->link->getModuleLink('tdproductwishlist', 'mywishlist'),
            ));
            return $this->display(__FILE__, 'views/templates/hook/my-account-footer.tpl');
        }
    }

    public function isTokenValid()
    {
        if (!Configuration::get('PS_TOKEN_ENABLE')) {
            return true;
        }
        return strcasecmp(Tools::getToken(false), Tools::getValue('token')) == 0;
    }
}
