<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

include_once _PS_MODULE_DIR_ . 'tdthemesettings/classes/TdThemeSettingsForm.php';

class AdminTdThemeSettingsController extends ModuleAdminController
{
    private $name;
    private $cfgName;
    private $defaults;
    private $systemFonts;

    public function __construct()
    {
        $this->bootstrap = true;
        $this->name = 'TdThemeSettings';

        parent::__construct();
        $this->meta_title = $this->l('TD - Theme Settings');

        if (!$this->module->active) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminHome'));
        }

        $this->cfgName = 'tdopt_';

        $this->systemFonts = $this->module->systemFonts;

        $this->defaults = $this->module->defaults;
    }

    public function renderForm()
    {
        $helper = $this->buildHelper();
        $helper->submit_action = 'saveThemeEditor';

        $helper->fields_value = $this->getConfigFormValues();

        $base_url = Tools::getHttpHost(true);  // DON'T TOUCH (base url (only domain) of site (without final /)).
        $base_url = Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE') ? $base_url : str_replace('https', 'http', $base_url);

        $helper->tpl_vars = array(
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'current_link' => $this->context->link->getAdminLink('Admin'.$this->name),
            'doc_url' =>  __PS_BASE_URI__.'modules/tdthemesettings/documentation.pdf',
            'td_base_url' => $base_url
        );

        $formFields = new TdThemeSettingsForm();

        return $helper->generateForm(array(
            $formFields->getGeneralForm(),
            $formFields->getTypographyForm(),
            $formFields->getHeaderTabForm(),
            $formFields->getHeaderForm(),
            $formFields->getTopBarForm(),
            $formFields->getNavFullForm(),
            $formFields->getMenuTabForm(),
            $formFields->getMenuHorizontalForm(),
            $formFields->getMenuVerticalForm(),
            $formFields->getMenuSubmenuForm(),
            $formFields->getContentTabForm(),
            $formFields->getContentWrapperForm(),
            $formFields->getContentForm(),
            $formFields->getSidebarForm(),
            $formFields->getProductListForm(),
            $formFields->getProductPageForm(),
            $formFields->getFooterTabForm(),
            $formFields->getFooterForm(),
            $formFields->getFooterTopBar(),
            $formFields->getContactInformation(),
            $formFields->getOptionsTabForm(),
            $formFields->getButtonsForm(),
            $formFields->getBreadcrumbForm(),
            $formFields->getFormsForm(),
            $formFields->getLabelsForm(),
            $formFields->getResponsiveForm(),
            $formFields->getCookieForm(),
            $formFields->getMaintanceForm(),
            $formFields->getCodesForm(),
            $formFields->getImportExportForm(),
            $formFields->getDocumentationForm()
        ));
    }

    protected function getConfigFormValues()
    {
        $var = array();
        foreach ($this->defaults as $key => $default) {
            if ($default['type'] == 'json') {
                $var[$key] = Tools::jsonDecode(Configuration::get($this->cfgName  . $key), true);
            } elseif ($default['type'] == 'txt') {
                foreach (Language::getLanguages(false) as $lang) {
                    $var[$key][(int)$lang['id_lang']] = Configuration::get($this->cfgName  . $key, (int)$lang['id_lang']);
                }
            } else {
                $var[$key] = Configuration::get($this->cfgName  . $key);
            }
        }
        return $var;
    }

    protected function buildHelper()
    {
        $helper = new HelperForm();

        $helper->module = $this->module;
        $helper->override_folder = 'tdthemesettings/';
        $helper->identifier = $this->className;
        $helper->token = Tools::getAdminTokenLite('Admin'.$this->name);
        $helper->languages = $this->_languages;
        $helper->currentIndex = $this->context->link->getAdminLink('Admin'.$this->name);
        $helper->default_form_language = $this->default_form_language;
        $helper->allow_employee_form_lang = $this->allow_employee_form_lang;
        $helper->toolbar_scroll = true;
        $helper->toolbar_btn = $this->initToolbar();

        return $helper;
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);
        $this->addJS(_MODULE_DIR_ . $this->module->name . '/views/js/jquery.interdependencies.js');
        $this->addJS(_MODULE_DIR_ . $this->module->name . '/views/js/backoffice.js');
        $this->addCSS(_MODULE_DIR_ . $this->module->name . '/views/css/backoffice.css');
    }

    public function postProcess()
    {
        if (Tools::isSubmit('importConfiguration')) {
            if (isset($_FILES['uploadConfig']) && isset($_FILES['uploadConfig']['tmp_name'])) {
                $str = Tools::file_get_contents($_FILES['uploadConfig']['tmp_name']);
                $arr = Tools::jsonDecode($str, true);

                foreach ($arr as $default => $value) {
                    Configuration::updateValue($this->cfgName . $default, $value);
                }

                $var = array();

                foreach ($this->defaults as $key => $default) {
                    if (isset($default['cached']) && $default['type'] != 'txt') {
                        $var[$key] = Configuration::get($this->cfgName . $key);
                    }
                }

                Configuration::updateValue($this->cfgName . 'options', Tools::jsonEncode($var));
                $this->content .= $this->module->generateCssAndJs();
            } else {
                $this->content .= $this->displayError($this->l('No config file'));
            }
        } elseif (Tools::isSubmit('saveThemeEditor')) {
            $var = array();
            foreach ($this->defaults as $key => $default) {
                if ($default['type'] == 'json') {
                    Configuration::updateValue($this->cfgName . $key, urldecode(Tools::getValue($key)));
                } elseif ($default['type'] == 'txt') {
                    $messageTrads = array();
                    foreach (Language::getLanguages(false) as $lang) {
                        $messageTrads[(int)$lang['id_lang']] = Tools::getValue($key.'_'.(int)$lang['id_lang']);
                    }
                    Configuration::updateValue($this->cfgName . $key, $messageTrads, true);
                } elseif ($default['type'] == 'html') {
                    Configuration::updateValue($this->cfgName . $key, Tools::getValue($key), true);
                } elseif ($default['type'] == 'raw') {
                    if (Tools::getValue($key)) {
                        Configuration::updateValue($this->cfgName . $key, Tools::getValue($key));
                    }
                } else {
                    Configuration::updateValue($this->cfgName . $key, Tools::getValue($key));
                }

                if (isset($default['cached']) && $default['type'] != 'txt') {
                    $var[$key] = Tools::getValue($key);
                }
            }
            Configuration::updateValue($this->cfgName . 'options', Tools::jsonEncode($var));
            $this->content .= $this->module->generateCssAndJs();
        } elseif (Tools::isSubmit('resetConfiguration')) {
            $this->module->setDefaults();
            $this->content .= $this->module->generateCssAndJs();
        }

        parent::postProcess();
    }

    public function ajaxProcessExportThemeConfiguration()
    {
        $var = array();

        foreach ($this->defaults as $key => $default) {
            $var[$key] = Configuration::get($this->cfgName  . $key);
        }

        header('Content-disposition: attachment; filename=tdthemesettings_config.json');
        header('Content-type: application/json');
        print_r(Tools::jsonEncode($var));
        die;
    }

    public function initContent()
    {
        if (!$this->viewAccess()) {
            $this->errors[] = Tools::displayError('You do not have permission to view this.');
            return;
        }

        if (Shop::getContext() == Shop::CONTEXT_GROUP || Shop::getContext() == Shop::CONTEXT_ALL) {
            $this->context->smarty->assign(array(
                'content' => $this->getWarningMultishopHtml()
            ));
            return;
        }

        $this->content .= $this->renderForm();
        $this->context->smarty->assign(array(
            'content' => $this->content,
        ));
    }

    protected function getWarningMultishopHtml()
    {
        if (Shop::getContext() == Shop::CONTEXT_GROUP || Shop::getContext() == Shop::CONTEXT_ALL) {
            return '<p class="alert alert-warning">' .
            $this->l('You cannot manage module from a "All Shops" or a "Group Shop" context, select directly the shop you want to edit') .
            '</p>';
        } else {
            return '';
        }
    }
}
