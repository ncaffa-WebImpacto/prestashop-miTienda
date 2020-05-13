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

/**
* Class ElementorWidget_Modules
*/
class BitElementorWidget_Modules
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

    /**
    * @var Context
    */
    public $context;

    public $status = 1;
    public $editMode = false;

    public function __construct()
    {
        $this->name = BitElementorWpHelper::__('Module', 'elementor');
        $this->id_base = 'modules';
        $this->icon = 'module';
        $this->context = Context::getContext();

        if (isset($this->context->controller->controller_name) && $this->context->controller->controller_name == 'BitElementorEditor') {
            $this->editMode = true;
        }
    }

    public function getForm()
    {
        $hooks = array(
            'displayHome' => 'displayHome',
            'displayLeftColumn' => 'displayLeftColumn',
            'displayRightColumn' => 'displayRightColumn',
            'displayTopColumn'=> 'displayTopColumn',
            'displayTop' => 'displayTop',
            'displayFooter' => 'displayFooter'
        );

        $availableModules = [];

        if ($this->editMode) {
            $availableModules = $this->getAvailableModules();
        }

        return [
            'section_pswidget_options' => [
                'label' => BitElementorWpHelper::__('Widget settings', 'elementor'),
                'type' => 'section',
            ],
            'module' => [
                'label' => BitElementorWpHelper::__('Module', 'elementor'),
                'type' => 'select',
                'label_block' => true,
                'default' => '0',
                'description' => BitElementorWpHelper::__( 'This widget is only for advanced users. Some of modules may base on id etc. Issues related with this widget are not supported.', 'elementor' ),
                'section' => 'section_pswidget_options',
                'options' => $availableModules,
            ],
            'hook' => [
                'label' => BitElementorWpHelper::__('hook', 'elementor'),
                'type' => 'select',
                'default' => 'displayHome',
                'description' => BitElementorWpHelper::__( 'Make sure module support hook you selected.', 'elementor' ),
                'section' => 'section_pswidget_options',
                'options' => $hooks,
            ],
        ];
    }

    public function parseOptions($optionsSource, $preview = false)
    {
        if (!$optionsSource['module']) {
            return [
                'content' => '',
            ];
        }

        $content = $this->execModule($optionsSource['hook'] , array(), $optionsSource['module'] , $this->context->shop->id);

        return [
            'content' => $content,
        ];
    }

    public function getAvailableModules()
    {
        $excludeModules = array('ratingsproductlist', 'themeinstallator', 'pluginadder',
            'bitpluginadder', 'bitelementor', 'bitsizeguide',
            'pscleaner', 'sekeywords', 'sendtoafriend', 'slidetopcontent', 'themeconfigurator', 'themeinstallator', 'trackingfront', 'watermark', 'videostab', 'yotpo',
            'additionalproductstabs', 'addthisplugin', 'autoupgrade','sendtoafriend', 'bankwire', 'blockcart', 'blockcurrencies', 'blockcustomerprivacy', 'blocklanguages', 'blocksearch', 'blocksearch_mod', 'blocksharefb', 'blocktopmenu',
            'blockuserinfo', 'blockmyaccountfooter', 'carriercompare', 'cashondelivery','cheque', 'cookielaw', 'cronjobs', 'themeinstallator', 'crossselling', 'crossselling_mod', 'customcontactpage', 'dashactivity', 'dashgoals', 'dashproducts',
            'dashtrends', 'dateofdelivery', 'feeder','followup', 'gamification', 'ganalytics', 'gapi', 'graphnvd3', 'gridhtml', 'gsitemap', 'headerlinks',  'loyalty', 'mailalerts', 'manufacturertab', 'newsletter', 'onboarding', 'pagesnotfound', 'paypal', 'productcomments', 'productscategory',
            'productsmanufacturer', 'productsnavpn', 'producttooltip','referralprogram', 'statsbestcategories', 'statsbestcustomers', 'statsbestmanufacturers', 'statsbestproducts', 'statsbestsuppliers', 'statsbestvouchers', 'statscarrier', 'statscatalog', 'statscheckup',
            'statsdata', 'statsequipment', 'statsforecast','statslive', 'statsnewsletter', 'statsorigin', 'statspersonalinfos', 'statsproduct', 'statsregistrations', 'statssales', 'statssalesqty', 'statssearch', 'statsstock',
            'statsvisits', 'themeconfigurator', 'uecookie', 'blockwishlist', 'productpaymentlogos');

        $modules = Db::getInstance()->executeS('
            SELECT m.id_module, m.name
            FROM `'._DB_PREFIX_.'module` m
            '.Shop::addSqlAssociation('module', 'm').'
            WHERE m.`name` NOT IN (\'' . implode("','", $excludeModules) . '\') ');

        $modulesHook = array();
        $modulesHook[0] =  BitElementorWpHelper::__('Select module', 'elementor');
        foreach ($modules as $key => $module) {
            $moduleInstance = Module::getInstanceByName($module['name']);
            if (Validate::isLoadedObject($moduleInstance)) {
                $modulesHook[$module['name']] =  $module['name'];
            }
        }
        return $modulesHook;
    }

    public function execModule($hook_name, $hook_args = array(), $id_module = null, $id_shop = null)
    {
        if (!Validate::isHookName($hook_name)) {
            throw new PrestaShopException('Invalid id_module or hook_name');
        }

        if (!$id_hook = Hook::getIdByName($hook_name)) {
            return false;
        }

        Hook::$executed_hooks[$id_hook] = $hook_name;
        $context = Context::getContext();
        if (!isset($hook_args['cookie']) || !$hook_args['cookie']) {
            $hook_args['cookie'] = $context->cookie;
        }
        if (!isset($hook_args['cart']) || !$hook_args['cart']) {
            $hook_args['cart'] = $context->cart;
        }
        $retro_hook_name = Hook::getRetroHookName($hook_name);

        $altern = 0;
        $output = '';

        $different_shop = false;

        if ($id_shop !== null && Validate::isUnsignedId($id_shop) && $id_shop != $context->shop->getContextShopID()) {
            $old_context = $context->shop->getContext();
            $old_shop = clone $context->shop;
            $shop = new Shop((int)$id_shop);
            if (Validate::isLoadedObject($shop)) {
                $context->shop = $shop;
                $context->shop->setContext(Shop::CONTEXT_SHOP, $shop->id);
                $different_shop = true;
            }
        }

        if (!($moduleInstance = Module::getInstanceByName($id_module))) {
            return false;
        }

        $hook_callable = is_callable(array($moduleInstance, 'hook'.$hook_name));
        $hook_retro_callable = is_callable(array($moduleInstance, 'hook'.$retro_hook_name));

        if ($hook_callable || $hook_retro_callable) {
            $hook_args['altern'] = ++$altern;
            if ($hook_callable) {
                $display = Hook::coreCallHook($moduleInstance, 'hook'.$hook_name, $hook_args);
            } elseif ($hook_retro_callable) {
                $display = Hook::coreCallHook($moduleInstance, 'hook'.$retro_hook_name, $hook_args);
            } else {
                return false;
            }

            $output .= $display;
        } elseif (Hook::isDisplayHookName($hook_name)) {
            if ($moduleInstance instanceof WidgetInterface) {
                try {
                    $display = Hook::coreRenderWidget($moduleInstance, $hook_name, $hook_args);
                } catch (Exception $e) {
                    $display = '';
                }
                $output .= $display;
            }
        }

        if ($different_shop) {
            $context->shop = $old_shop;
            $context->shop->setContext($old_context, $shop->id);
        }
        return $output;
    }
}
