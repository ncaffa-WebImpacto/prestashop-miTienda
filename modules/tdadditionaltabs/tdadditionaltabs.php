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

require_once dirname(__FILE__).'/classes/TdAdditionalTab.php';

class TdAdditionalTabs extends Module implements WidgetInterface
{
    public $fields_list;
    public $fields_form;

    public function __construct()
    {
        $this->name = 'tdadditionaltabs';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';

        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();
        Shop::addTableAssociation('tdadditionaltab', array('type' => 'shop'));

        $this->displayName = $this->l('TD - Product Extra Tabs');
        $this->description = $this->l('The module creates additional description tabs with any format of content.');
    }

    public function install()
    {
        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayAdminProductsExtra') &&
            $this->registerHook('displayProductExtraContent') &&
            $this->registerHook('actionObjectProductDeleteAfter');
    }

    public function uninstall()
    {
        include(dirname(__FILE__).'/sql/uninstall.php');
        return parent::uninstall();
    }

    public function hookBackOfficeHeader()
    {
        Media::addJsDef(array('tdModulesAdditionalTabs' => [
            'ajaxUrl' => $this->context->link->getAdminLink('AdminModules', true) . '&ajax=1&configure=' . $this->name
        ]));
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
        $this->context->controller->addJqueryUI('ui.sortable');
        $this->context->controller->addJS($this->_path . '/views/js/bo_module.js');
        
        $about = $this->about();
        
        $output = '';
        $id_tdadditionaltab = (int)Tools::getValue('id_tdadditionaltab');

        if (Tools::isSubmit('added')) {
            $output .= '<div class="alert alert-success">'.$this->l('Tab added').'</div>';
        }

        if (Tools::isSubmit('saveTdAdditionalTab')) {
            if ($id_tdadditionaltab) {
                $tdAdditionalTab = new TdAdditionalTab((int)$id_tdadditionaltab);
            } else {
                $tdAdditionalTab = new TdAdditionalTab();
            }
            $tdAdditionalTab->copyFromPost();
            $tdAdditionalTab->id_product = 0;

            $id_shop_list = Tools::getValue('checkBoxShopAsso_tdadditionaltab');
            if (isset($id_shop_list) && !empty($id_shop_list)) {
                $tdAdditionalTab->id_shop_list = $id_shop_list;
            } else {
                $tdAdditionalTab->id_shop_list[] =  (int)Context::getContext()->shop->id;
            }

            if ($tdAdditionalTab->validateFields(false) && $tdAdditionalTab->validateFieldsLang(false)) {
                $tdAdditionalTab->save();
                Tools::redirectAdmin(AdminController::$currentIndex . '&configure=' . $this->name . '&added&token=' . Tools::getAdminTokenLite('AdminModules'));
            } else {
                $output .= '<div class="conf error">'.$this->trans('An error occurred while attempting to save.', array(), 'Admin.Notifications.Error').'</div>';
            }
        }

        if (Tools::isSubmit('updatetdadditionaltabs') || Tools::isSubmit('addTdAdditionalTab')) {
            $helper = $this->initForm();
            foreach (Language::getLanguages(false) as $lang) {
                if ($id_tdadditionaltab) {
                    $tdAdditionalTab = new TdAdditionalTab((int)$id_tdadditionaltab);
                    $helper->id = (int)$id_tdadditionaltab;
                    $helper->fields_value['title'][(int)$lang['id_lang']] = $tdAdditionalTab->title[(int)$lang['id_lang']];
                    $helper->fields_value['active'] = $tdAdditionalTab->active;
                    $helper->fields_value['description'][(int)$lang['id_lang']] = $tdAdditionalTab->description[(int)$lang['id_lang']];
                    $helper->fields_value['description'][(int)$lang['id_lang']] = $tdAdditionalTab->description[(int)$lang['id_lang']];
                } else {
                    $helper->fields_value['title'][(int)$lang['id_lang']] = Tools::getValue('title_'.(int)$lang['id_lang'], '');
                    $helper->fields_value['active'] = Tools::getValue('active');
                    $helper->fields_value['description'][(int)$lang['id_lang']] = Tools::getValue('description_'.(int)$lang['id_lang'], '');
                }
            }
            $helper->table = 'tdadditionaltab';
            $helper->identifier = 'id_tdadditionaltab';
            if ($id_tdadditionaltab = Tools::getValue('id_tdadditionaltab')) {
                $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_tdadditionaltab');
                $helper->fields_value['id_tdadditionaltab'] = (int)$id_tdadditionaltab;
            }
            return $output.$helper->generateForm($this->fields_form);
        } elseif (Tools::isSubmit('deletetdadditionaltabs')) {
            $tdAdditionalTab = new TdAdditionalTab((int)$id_tdadditionaltab);
            $tdAdditionalTab->delete();
            Tools::redirectAdmin(AdminController::$currentIndex . '&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'));
        } elseif (Tools::isSubmit('changeStatus')) {
            $tdAdditionalTab = new TdAdditionalTab((int)$id_tdadditionaltab);
            if ($tdAdditionalTab->active == 0) {
                $tdAdditionalTab->active = 1;
            } else {
                $tdAdditionalTab->active = 0;
            }
            $tdAdditionalTab->update(false, true);
            Tools::redirectAdmin(AdminController::$currentIndex . '&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'));
        } else {
            $output .= $this->initList();
        }

        return $output.$about;
    }

    protected function initList()
    {
        $tabs = TdAdditionalTab::getTabs('global');

        foreach ($tabs as $key => $tab) {
            $tabs[$key]['status'] = $this->displayStatus($tab['id_tdadditionaltab'], $tab['active']);
            $associated_shop_ids = TdAdditionalTab::getAssociatedIdsShop((int)$tab['id_tdadditionaltab']);
            if ($associated_shop_ids && count($associated_shop_ids) > 1) {
                $tabs[$key]['is_shared'] = true;
            } else {
                $tabs[$key]['is_shared'] = false;
            }
        }

        $this->context->smarty->assign(array(
            'path' => $this->_path,
            'tabs' => $tabs,
            'link' => $this->context->link,
            'module' => $this->name,
        ));

        return $this->display(__FILE__, 'views/templates/admin/bo_module.tpl');
    }

    protected function initForm()
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('New Tab'),
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
                     'type' => 'textarea',
                     'label' => $this->l('Description'),
                     'name' => 'description',
                     'autoload_rte' => true,
                     'lang' => true,
                 ),
            ),
            'submit' => array(
                'title' => $this->trans('Save', array(), 'Admin.Actions'),
            ),
            'buttons' => array(
                'cancelBlock' => array(
                    'title' => $this->l('Back to list'),
                    'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
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
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->toolbar_scroll = true;
        $helper->title = $this->displayName;
        $helper->submit_action = 'saveTdAdditionalTab';
        return $helper;
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $languages = $this->context->controller->getLanguages();
        $default_language = (int) Configuration::get('PS_LANG_DEFAULT');

        $idProduct = (int) Tools::getValue('id_product', $params['id_product']);

        $tabs = array();
        $tabsIds = TdAdditionalTab::getIdTabs('product', $idProduct, false);

        foreach ($tabsIds as $key => $tabId) {
            $tab = new TdAdditionalTab((int)$tabId['id_tdadditionaltab']);
            $tabs[$tabId['id_tdadditionaltab']] = (array) $tab;
            $tabs[$tabId['id_tdadditionaltab']]['status'] = $this->displayStatus($tab->id_tdadditionaltab, $tab->active);
            $associated_shop_ids = TdAdditionalTab::getAssociatedIdsShop((int)$tab->id_tdadditionaltab);
            if ($associated_shop_ids && count($associated_shop_ids) > 1) {
                $tabs[$tabId['id_tdadditionaltab']]['is_shared'] = true;
            } else {
                $tabs[$tabId['id_tdadditionaltab']]['is_shared'] = false;
            }
        }

        $this->context->smarty->assign(array(
            'path' => $this->_path,
            'tabs' => $tabs,
            'idProduct' =>$idProduct,
            'languages' => $languages,
            'default_language' => $default_language,
            'id_language' => $this->context->language->id,
            'link' => $this->context->link,
            'module' => $this->name,
        ));

        return $this->display(__FILE__, 'views/templates/admin/bo_productab.tpl');
    }

    public function ajaxProcessUpdatePositions()
    {
        $tabs = Tools::getValue('tabs');
        TdAdditionalTab::updatePositions($tabs);
        die(true);
    }

    public function ajaxProcessUpdatePositionsProduct()
    {
        $tabs = Tools::getValue('tdadditionaltabs');
        TdAdditionalTab::updatePositions($tabs);
        die(true);
    }

    public function ajaxProcessAddTabProduct()
    {
        header('Content-Type: application/json');

        parse_str(Tools::getValue('fields'), $fields);

        $idProduct = Tools::getValue('idProduct');
        $id_tdadditionaltab = (int) $fields[$this->name]['id_tdadditionaltab'];

        $action = 'add';

        if ($id_tdadditionaltab) {
            $tdAdditionalTab = new TdAdditionalTab((int)$id_tdadditionaltab);
            $action = 'edit';
        } else {
            $tdAdditionalTab = new TdAdditionalTab();
            $tdAdditionalTab->id_product = $idProduct;
        }

        if (isset($fields[$this->name]['active'])) {
            $fields[$this->name]['active'] = 1;
        } else {
            $fields[$this->name]['active'] = 0;
        }

        $tdAdditionalTab->copyFromAjax($fields[$this->name]);

        if (Shop::getContext() == Shop::CONTEXT_ALL) {
            $tdAdditionalTab->id_shop_list = Shop::getShops(true, null, true);
        } else {
            $tdAdditionalTab->id_shop_list[] = (int) Context::getContext()->shop->id;
        }

        if ($tdAdditionalTab->validateFields(false) && $tdAdditionalTab->validateFieldsLang(false)) {
            $tdAdditionalTab->save();
            $return = array(
                'status' => true,
                'action' => $action,
                'message' => $this->l('Tab saved'),
                'tab' => [
                    'id' => $tdAdditionalTab->id,
                    'title' =>  $tdAdditionalTab->title
                ]
            );
        } else {
            $return = array(
                'status' => false,
                'message' => $this->l('An problem occured during adding tab')
            );
        }

        die(Tools::jsonEncode($return));
    }

    public function ajaxProcessDeleteTabProduct()
    {
        $id_tdadditionaltab = (int)Tools::getValue('id_tdadditionaltab');

        $tdAdditionalTab = new TdAdditionalTab((int)$id_tdadditionaltab);
        $tdAdditionalTab->delete();
        die(true);
    }

    public function ajaxProcessGetTabProduct()
    {
        header('Content-Type: application/json');
        $id_tdadditionaltab = (int)Tools::getValue('id_tdadditionaltab');
        $tdAdditionalTab = new TdAdditionalTab((int)$id_tdadditionaltab);

        $return = array(
            'status' => true,
            'tab' => [
                'id' => $tdAdditionalTab->id,
                'title' =>  $tdAdditionalTab->title,
                'description' =>  $tdAdditionalTab->description,
                'active' => (bool)$tdAdditionalTab->active,
            ]
        );

        die(Tools::jsonEncode($return));
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        return $this->getWidgetVariables($hookName, $configuration);
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $idProduct = (int) $configuration['product']->id;
        $cacheId = 'TdAdditionalTabs_' . $idProduct;

        if (!Cache::isStored($cacheId)) {
            $array = array();
            $tabs = TdAdditionalTab::getTabs('all', $idProduct, true);

            foreach ($tabs as $key => $tab) {
                if ($tab['title']) {
                    $array[] = (new ProductExtraContent())
                        ->setTitle($tab['title'])
                        ->setContent('<div class="rte-content">'.$tab['description'].'</div>');
                }
            }
            Cache::store($cacheId, $array);
        }
        return Cache::retrieve($cacheId);
    }

    public function hookActionObjectProductDeleteAfter($params)
    {
        if (!isset($params['object']->id)) {
            return;
        }

        $idProduct = (int) $params['object']->id;
        $id = TdAdditionalTab::getIdByProduct($idProduct);

        $object = new TdAdditionalTab($id);

        if (Validate::isLoadedObject($object)) {
            $object->delete();
        }
    }

    public function displayStatus($id_tdadditionaltab, $active)
    {
        $title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
        $icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
        $class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
        $html = '<a class="btn '.$class.'" href="'.AdminController::$currentIndex.
            '&configure='.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminModules').
                '&changeStatus&id_tdadditionaltab='.(int)$id_tdadditionaltab.'" title="'.$title.'"><i class="'.$icon.'"></i> '.$title.'</a>';
        return $html;
    }
}
