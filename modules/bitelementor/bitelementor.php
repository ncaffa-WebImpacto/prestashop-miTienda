<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use BitElementor\PluginElementor;
use Symfony\Component\HttpFoundation\Request;

if (!defined('_PS_VERSION_')) {
    exit;
}
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/BitElementorLanding.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/BitElementorTemplate.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/bitElementorWpHelper.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/includes/plugin-elementor.php';

require_once _PS_MODULE_DIR_ . '/bitelementor/classes/widgets/BitElementorWidget_Blog.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/widgets/BitElementorWidget_Brands.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/widgets/BitElementorWidget_ProductsList.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/widgets/BitElementorWidget_ProductsCountdown.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/widgets/BitElementorWidget_ProductsListTabs.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/widgets/BitElementorWidget_CategoryList.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/widgets/BitElementorWidget_Modules.php';
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/widgets/BitElementorWidget_Newsletter.php';

class BitElementor extends Module implements WidgetInterface
{
    public static $WIDGETS = [
        'Blog',
        'Brands',
        'ProductsList',
        'ProductsCountdown',
        'ProductsListTabs',
        'CategoryList',
        'Newsletter',
        'Modules',
    ];

    public function __construct()
    {
        $this->name = 'bitelementor';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';

        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->controllers = array('preview', 'widget');

        parent::__construct();

        $this->displayName = $this->l('TD - Elementor Page builder');
        $this->description = $this->l('Drag and Drop page builder based on Wordpress Elementor.');
    }

    public function install()
    {
        include(dirname(__FILE__).'/sql/install.php');

        return (parent::install()
            && $this->registerHook('displayHome')
            && $this->registerHook('displayBackOfficeHeader')
            && $this->registerHook('actionObjectCmsUpdateBefore')
            && $this->registerHook('actionObjectCmsUpdateAfter')
            && $this->registerHook('actionObjectCmsDeleteAfter')
            && $this->registerHook('displayCMSDisputeInformation')
            && $this->registerHook('actionObjectManufacturerUpdateAfter')
            && $this->registerHook('actionObjectManufacturerDeleteAfter')
            && $this->registerHook('actionObjectManufacturerAddAfter')
            && $this->registerHook('actionObjectProductUpdateAfter')
            && $this->registerHook('actionObjectProductDeleteAfter')
            && $this->registerHook('actionObjectProductAddAfter')
            && $this->registerHook('actionObjectCategoryUpdateAfter')
            && $this->registerHook('actionObjectCategoryDeleteAfter')
            && $this->registerHook('actionObjectCategoryAddAfter')
            && $this->registerHook('header')
            && $this->registerHook('registerGDPRConsent')
            && $this->installTab()
            && $this->installFixtures()
        );
    }

    public function hookDisplayBackOfficeHeader($params)
    {
        $this->context->controller->addCSS($this->_path . 'views/css/admin/backoffice.css');

        $onlyElementor = array();
        $justElementorCategory = false;
        $idLang = (int) $this->context->language->id;

        if ($this->context->controller->controller_name == 'AdminCmsContent') {
            $this->context->controller->addJS($this->_path . 'views/js/admin/backoffice.js');

            $request = $this->get('request_stack')->getCurrentRequest();

            if (!isset($request->attributes)) {
                return;
            }

            $idPage = (int) $request->attributes->get('cmsPageId');
            $pageType = 'cms';

            if ($idPage) {
                $cms = new CMS($idPage);
                foreach ($cms->content as $key => $contentLang) {
                    $strippedCms = preg_replace('/^<p[^>]*>(.*)<\/p[^>]*>/is', '$1', $contentLang);
                    $strippedCms = str_replace(array("\r\n", "\n", "\r"), '', $strippedCms);
                    $content = Tools::jsonDecode($strippedCms, true);
                    if (json_last_error() == JSON_ERROR_NONE) {
                        if (empty($content)) {
                            $onlyElementor[$key] = 0;
                        } else {
                            $onlyElementor[$key] = 1;
                        }
                    } else {
                        $onlyElementor[$key] = 0;
                    }
                }
            }

            if (!$idPage) {
                $this->context->smarty->assign(array(
                    'urlElementor' => ''
                ));
            } else {
                $url = $this->context->link->getAdminLink('BitElementorEditor').'&pageType='.$pageType.'&pageId=' . $idPage . '&idLang='. (int) $this->context->language->id;

                $this->context->smarty->assign(array(
                    'urlElementor' => $url
                ));
            }

            Media::addJsDef(array(
                'onlyElementor'  =>  $onlyElementor,
                'elementorAjaxUrl' => $this->context->link->getAdminLink('AdminBitElementor').'&ajax=1'
            ));

            $this->context->smarty->assign(array(
                'onlyElementor' => $onlyElementor,
                'pageType' => $pageType,
                'justElementorCategory' => $justElementorCategory,
                'idPage' => $idPage
            ));

            return $this->fetch(_PS_MODULE_DIR_ .'/'. $this->name . '/views/templates/hook/backoffice_header.tpl');
        }
    }

    public function uninstall()
    {
        include(dirname(__FILE__).'/sql/uninstall.php');

        return ($this->uninstallTab() && parent::uninstall());
    }

    public function hookHeader()
    {
        $this->registerCssFiles();
        $this->registerJSFiles();

        Media::addJsDef(
            array('elementorFrontendConfig' => [
                'isEditMode' => '',
                'stretchedSectionContainer' =>'',
                'is_rtl' => '',
            ])
        );
    }

    public function registerCssFiles()
    {
        $this->context->controller->registerStylesheet('modules-'.$this->name.'-eicons', 'modules/'.$this->name.'/views/lib/eicons/css/elementor-icons.min.css', ['media' => 'all', 'priority' => 150]);
        $this->context->controller->registerStylesheet('modules-'.$this->name.'-style', 'modules/'.$this->name.'/views/css/front/frontend.css', ['media' => 'all', 'priority' => 150]);
    }

    public function registerJSFiles()
    {
        $this->context->controller->registerJavascript('modules'.$this->name.'-instagram', 'modules/'.$this->name.'/views/lib/instagram-lite-master/instagramLite.min.js', ['position' => 'bottom', 'priority' => 150]);
        $this->context->controller->registerJavascript('modules'.$this->name.'-jquery-numerator', 'modules/'.$this->name.'/views/lib/jquery-numerator/jquery-numerator.min.js', ['position' => 'bottom', 'priority' => 150]);
        $this->context->controller->registerJavascript('modules'.$this->name.'-script', 'modules/'.$this->name.'/views/js/front/frontend.js', ['position' => 'bottom', 'priority' => 150]);
    }

    public function installTab()
    {
        $tab = new Tab();
        $tab->active = 0;
        $tab->class_name = "BitElementorEditor";
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = "BitElementorEditor";
        }
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentThemes');
        $tab->module = $this->name;
        $tab->add();

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminBitElementor";
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = "Elementor - Page builder";
        }
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentThemes');
        $tab->module = $this->name;
        $tab->add();

        return true;
    }

    public function uninstallTab()
    {
        $id_tab = (int)Tab::getIdFromClassName('BitElementorEditor');
        $tab = new Tab($id_tab);
        $tab->delete();

        $id_tab = (int)Tab::getIdFromClassName('AdminBitElementor');
        $tab = new Tab($id_tab);
        $tab->delete();

        return true;
    }

    public function createHomePage($importfile)
    {
        $templateSource = Tools::jsonDecode(Tools::file_get_contents(_PS_MODULE_DIR_ . 'bitelementor/layout/'.$importfile));
        
        $shops = Shop::getShopsCollection();
        $id_shop = Configuration::get('PS_SHOP_DEFAULT');

        $base_url = Tools::getHttpHost(true);  // DON'T TOUCH (base url (only domain) of site (without final /)).
        $base_url = Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE') ? $base_url : str_replace('https', 'http', $base_url);

        foreach ($shops as $shop) {
            $layout = new BitElementorLanding();
            $layout->id_shop = $id_shop;
            $layout->title = $templateSource->title;
            $layout->data = str_replace('/bit_elementor_path/',  $base_url.__PS_BASE_URI__, $templateSource->data);
            $layout->add();
        }
    }

    public function installFixtures()
    {
        $success = true;

        $this->createHomePage('home1.json');
        Configuration::updateValue('bit_homepage_layout', 1);
        Configuration::updateValue('bit_elementor_cache', 0);

        return $success;
    }

    public function getContent()
    {
        Tools::redirectAdmin(
            $this->context->link->getAdminLink('AdminBitElementor')
        );
    }

    public function renderBitElementorWidget($name, $options)
    {
        $templateFile = Tools::strtolower($name) . '.tpl';
        $this->smarty->assign($this->getBitElementorWidgetVariables($name, $options));
        return $this->fetch(_PS_MODULE_DIR_ .'/bitelementor/views/templates/widgets/' . $templateFile);
    }

    public function getBitElementorWidgetVariables($name, $options = [])
    {
        $className = 'BitElementorWidget_' . $name;
        $widget = new $className($this->context);
        return $widget->parseOptions($options);
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        if ($hookName == null && isset($configuration['hook'])) {
            $hookName = $configuration['hook'];
        }

        $templateFile = 'generated_content.tpl';
        $cacheId = $hookName;

        if (preg_match('/^displayHome\d*$/', $hookName)) {
            $cacheId = 'bitelementor|'.$hookName;
        } elseif (preg_match('/^displayCMSDisputeInformation\d*$/', $hookName)) {
            $cmsId = (int) $configuration['smarty']->tpl_vars['cms']->value['id'];
            $templateFile = 'generated_content_cms.tpl';
            $cacheId = 'bitelementor|'.$hookName.'|'.$cmsId;
        }

        if (!$this->isCached('module:' . $this->name . '/views/templates/hook/' .$templateFile, $this->getCacheId($cacheId))) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        }

        return $this->fetch('module:' . $this->name . '/views/templates/hook/' . $templateFile, $this->getCacheId($cacheId));
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        if ($hookName == null && isset($configuration['hook'])) {
            $hookName = $configuration['hook'];
        }
        $content = '';
        $options = [];

        if (preg_match('/^displayHome\d*$/', $hookName)) {
            if (Tools::getValue('homepage')) {
                $layoutId = Tools::getValue('homepage');
            } else {
                $layoutId = (int) Configuration::get('bit_homepage_layout');
            }
            $layout =  new BitElementorLanding($layoutId, $this->context->language->id);

            if (Validate::isLoadedObject($layout)) {
                ob_start();
                PluginElementor::instance()->get_frontend((array) Tools::jsonDecode($layout->data, true));
                $content = ob_get_clean();
            }
        } elseif (preg_match('/^displayCMSDisputeInformation\d*$/', $hookName)) {
            $cmsContent =  $configuration['smarty']->tpl_vars['cms']->value['content'];
            $strippedCms = preg_replace('/^<p[^>]*>(.*)<\/p[^>]*>/is', '$1', $cmsContent);
            $strippedCms = str_replace(array("\r\n", "\n", "\r"), '', $strippedCms);
            $content = Tools::jsonDecode($strippedCms, true);
            if (json_last_error() == JSON_ERROR_NONE) {
                ob_start();
                PluginElementor::instance()->get_frontend((array) $content);
                $options['elementor'] = true;
                $content = ob_get_clean();
            } else {
                $options['elementor'] = false;
                $content = $cmsContent;
            }
        }

        return array(
            'content' => $content,
            'options' => $options,
        );
    }

    public function checkEnvironment()
    {
        $cookie = new Cookie('psAdmin', '', (int)Configuration::get('PS_COOKIE_LIFETIME_BO'));
        return isset($cookie->id_employee) && isset($cookie->passwd) && Employee::checkPassword($cookie->id_employee, $cookie->passwd);
    }

    public function getFrontEditorToken()
    {
        return Tools::getAdminToken($this->name.(int)Tab::getIdFromClassName($this->name)
            .(is_object(Context::getContext()->employee) ? (int)Context::getContext()->employee->id :
                Tools::getValue('id_employee')));
    }

    public function clearHomeCache()
    {
        $templateFile = 'module:' . $this->name . '/views/templates/hook/generated_content.tpl';
        $cacheId = 'bitelementor|displayHome';
        $this->_clearCache($templateFile, $cacheId);
    }

    public function hookActionObjectCmsDeleteAfter($params)
    {
        $templateFile = 'module:' . $this->name . '/views/templates/hook/generated_content.tpl';
        $cmsId = (int) $params['object']->id_cms;
        $cacheId = 'bitelementor|displayCMSDisputeInformation|'.$cmsId;
        $this->_clearCache($templateFile, $cacheId);
    }

    public function hookActionObjectCmsUpdateAfter($params)
    {
        $pur = (int) Configuration::get('PS_USE_HTMLPURIFIER_TMP');
        Configuration::updateValue('PS_USE_HTMLPURIFIER', $pur);

        $templateFile = 'module:' . $this->name . '/views/templates/hook/generated_content_cms.tpl';
        $cmsId = (int) $params['object']->id_cms;
        $cacheId = 'bitelementor|displayCMSDisputeInformation|'.$cmsId;
        $this->_clearCache($templateFile, $cacheId);
    }

    public function hookActionObjectCmsUpdateBefore($params) {
        $pur = (int) Configuration::get('PS_USE_HTMLPURIFIER');
        Configuration::updateValue('PS_USE_HTMLPURIFIER_TMP', $pur);
        Configuration::updateValue('PS_USE_HTMLPURIFIER', 0);
    }

    public function hookActionObjectProductDeleteAfter($params)
    {
        if (!isset($params['object']->id)) {
            return;
        }
        if (Configuration::get('bit_elementor_cache')) {
            $this->clearHomeCache();
        }
    }

    public function hookActionObjectManufacturerUpdateAfter($params) {
        if (Configuration::get('bit_elementor_cache')) {
            $this->clearHomeCache();
        }
    }

    public function hookActionObjectManufacturerDeleteAfter($params) {
        if (Configuration::get('bit_elementor_cache')) {
            $this->clearHomeCache();
        }
    }

    public function hookActionObjectManufacturerAddAfter($params) {
        if (Configuration::get('bit_elementor_cache')) {
            $this->clearHomeCache();
        }
    }

    public function hookActionObjectProductUpdateAfter($params) {
        if (Configuration::get('bit_elementor_cache')) {
            $this->clearHomeCache();
        }
    }

    public function hookActionObjectCategoryDeleteAfter($params)
    {
        if (!isset($params['object']->id)) {
            return;
        }
        if (Configuration::get('bit_elementor_cache')) {
            $this->clearHomeCache();
        }
    }

    public function hookActionObjectProductAddAfter($params) {
        if (Configuration::get('bit_elementor_cache')) {
            $this->clearHomeCache();
        }
    }
}
