<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

include_once dirname(__FILE__).'/classes/ClassTdNewsletter.php';
include_once dirname(__FILE__).'/sql/TdnlSampleData.php';

class Tdnewsletter extends Module
{
    public function __construct()
    {
        $this->name = 'tdnewsletter';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->default_language = Language::getLanguage(Configuration::get('PS_LANG_DEFAULT'));
        $this->id_shop = Context::getContext()->shop->id;

        $this->displayName = $this->l('TD - Newsletter Popup');
        $this->description = $this->l('Display Newsletter Popup Block.');

        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        include(dirname(__FILE__).'/sql/install.php');
        $sample_data = new TdnlSampleData();
        $base_url = _PS_BASE_URL_.__PS_BASE_URI__;
        $sample_data->initData($base_url);

        $settings = $this->getModuleSettings();
        foreach ($settings as $name => $value) {
            Configuration::updateValue($name, $value);
        }

        return parent::install()
            && $this->installFixtures()
            && $this->registerHook('header')
            && $this->registerHook('displayBeforeBodyClosingTag');
    }

    public function uninstall()
    {
        include(dirname(__FILE__).'/sql/uninstall.php');

        $settings = $this->getModuleSettings();
        foreach (array_keys($settings) as $name) {
            Configuration::deleteByName($name);
        }

        return parent::uninstall();
    }

    protected function getModuleSettings()
    {
        $settings = array(
            'TDNL_BACKGROUND' => '#333333',
            'TDNL_OPACITY' => 0.75,
            'TDNL_ANIMATION' => 500,
            'TDNL_TIME' => 1000,
            'TDNL_WIDTH' => 600,
            'TDNL_HEIGHT' => 400,
            'TDNL_DISPLAY' => 'fade',
        );
        return $settings;
    }

    public function installFixtures()
    {
        $return = true;
        $tdnewsletter = new ClassTdNewsletter();
        foreach (Language::getLanguages(false) as $lang) {
            $tdnewsletter->title[$lang['id_lang']] = 'Newsletter';
            $tdnewsletter->text1[$lang['id_lang']] = 'Sign up here to get the latest news, updates and special offers';
            $tdnewsletter->image[$lang['id_lang']] = 'newsletter.jpg';
        }
        $tdnewsletter->date_start = date('Y-m-d h:i:s');
        $tdnewsletter->date_end = date('Y-m-d h:i:s', strtotime("+90 days"));
        $tdnewsletter->id_shop = $this->context->shop->id;
        $return &= $tdnewsletter->save();
        return $return;
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
        $output = '';
        $result ='';
        $about = $this->about();

        if (((bool)Tools::isSubmit('submitTdnewsletter')) == true) {
            if (!$errors = $this->validateSettings()) {
                $this->postProcess();
                $output .= $this->displayConfirmation($this->l('Settings updated successful.'));
            } else {
                $output .= $errors;
            }
        }

        if ((bool)Tools::isSubmit('submitUpdateNewsletter')) {
            if (!$result = $this->preValidateForm()) {
                $output .= $this->addNewsletter();
            } else {
                $output = $result;
                $output .= $this->renderNewsletterForm();
            }
        }

        if (!$result) {
            $output .= $this->renderNewsletterForm();
            $output .= $this->renderFormSettings();
        }

        return $output.$about;
    }

    protected function renderFormSettings()
    {
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitTdnewsletter';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&module_tab=1';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'image_path' => $this->_path.'views/img',
            'fields_value' => $this->getConfigFormValuesSettings(), /* Add values for your inputs */
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
                        'type' => 'color',
                        'label' => $this->l('Background:'),
                        'name' => 'TDNL_BACKGROUND',
                        'required' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Opacity:'),
                        'name' => 'TDNL_OPACITY',
                        'col' => 2,
                        'required' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Animation Speed:'),
                        'name' => 'TDNL_ANIMATION',
                        'col' => 2,
                        'required' => true,
                        'suffix' => 'milliseconds',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Time Display:'),
                        'name' => 'TDNL_TIME',
                        'col' => 2,
                        'required' => true,
                        'suffix' => 'seconds',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Width:'),
                        'name' => 'TDNL_WIDTH',
                        'col' => 2,
                        'required' => true,
                        'suffix' => 'pixel',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Height:'),
                        'name' => 'TDNL_HEIGHT',
                        'col' => 2,
                        'required' => true,
                        'suffix' => 'pixel',
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Animation:'),
                        'name' => 'TDNL_DISPLAY',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id' => 'fade',
                                    'name' => $this->l('Fade')),
                                array(
                                    'id' => 'slide',
                                    'name' => $this->l('Slide')),
                                array(
                                    'id' => 'none',
                                    'name' => $this->l('None')),
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    protected function validateSettings()
    {
        $errors = array();

        if (!Validate::isColor(Tools::getValue('TDNL_BACKGROUND'))) {
            $errors[] = $this->l('"Background" format error.');
        }

        if (Tools::isEmpty(Tools::getValue('TDNL_OPACITY'))) {
            $errors[] = $this->l('Opacity is required.');
        } else {
            if (!Validate::isUnsignedFloat(Tools::getValue('TDNL_OPACITY'))) {
                $errors[] = $this->l('Opacity limit format');
            }
        }

        if (Tools::isEmpty(Tools::getValue('TDNL_ANIMATION'))) {
            $errors[] = $this->l('Animation speed is required.');
        } else {
            if (!Validate::isUnsignedInt(Tools::getValue('TDNL_ANIMATION'))) {
                $errors[] = $this->l('Bad animation speed format');
            }
        }

        if (Tools::isEmpty(Tools::getValue('TDNL_TIME'))) {
            $errors[] = $this->l('Time is required.');
        } else {
            if (!Validate::isUnsignedInt(Tools::getValue('TDNL_TIME'))) {
                $errors[] = $this->l('Bad time format');
            }
        }

        if (Tools::isEmpty(Tools::getValue('TDNL_WIDTH'))) {
            $errors[] = $this->l('Width is required.');
        } else {
            if (!Validate::isUnsignedInt(Tools::getValue('TDNL_WIDTH'))) {
                $errors[] = $this->l('Bad width format');
            }
        }

        if (Tools::isEmpty(Tools::getValue('TDNL_HEIGHT'))) {
            $errors[] = $this->l('Height is required.');
        } else {
            if (!Validate::isUnsignedInt(Tools::getValue('TDNL_HEIGHT'))) {
                $errors[] = $this->l('Bad height format');
            }
        }

        if ($errors) {
            return $this->displayError(implode('<br />', $errors));
        } else {
            return false;
        }
    }

    protected function getConfigFormValuesSettings()
    {
        $filled_settings = array();
        $settings = $this->getModuleSettings();

        foreach (array_keys($settings) as $name) {
            $filled_settings[$name] = Configuration::get($name);
        }

        return $filled_settings;
    }

    protected function getStringValueType($string)
    {
        if (Validate::isInt($string)) {
            return 'int';
        } elseif (Validate::isFloat($string)) {
            return 'float';
        } elseif (Validate::isBool($string)) {
            return 'bool';
        } else {
            return 'string';
        }
    }

    protected function postProcess()
    {
        $form_values = $this->getConfigFormValuesSettings();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    protected function getNewsletterSettings()
    {
        $settings = $this->getModuleSettings();
        $get_settings = array();
        foreach (array_keys($settings) as $name) {
            $data = Configuration::get($name);
            $get_settings[$name] = array('value' => $data, 'type' => $this->getStringValueType($data));
        }

        return $get_settings;
    }

    protected function renderNewsletterForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Newsletter Popup'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'files_lang',
                        'label' => $this->l('Image'),
                        'name' => 'image',
                        'lang' => true,
                        'required' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Title'),
                        'name' => 'title',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Text 1'),
                        'name' => 'text1',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Text 2'),
                        'name' => 'text2',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'datetime',
                        'label' => $this->l('Start Date'),
                        'name' => 'date_start',
                        'col' => 6,
                        'required' => true
                    ),
                    array(
                        'type' => 'datetime',
                        'label' => $this->l('End Date'),
                        'name' => 'date_end',
                        'col' => 6,
                        'required' => true
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );


        $tab = new ClassTdNewsletter(1);
        $fields_form['form']['images'] = $tab->image;

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitUpdateNewsletter';
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name.'&module_tab=1';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigNewsletterFormValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'image_baseurl' => $this->_path.'views/img/images/',
            'id_tab' => 1
        );

        return $helper->generateForm(array($fields_form));
    }

    protected function getConfigNewsletterFormValues()
    {
        $tab = new ClassTdNewsletter(1);

        $fields_values = array(
            'image' => Tools::getValue('image', $tab->image),
            'title' => Tools::getValue('title', $tab->title),
            'text1' => Tools::getValue('text1', $tab->text1),
            'text2' => Tools::getValue('text2', $tab->text2),
            'date_start' => Tools::getValue('date_start', $tab->date_start),
            'date_end' => Tools::getValue('date_end', $tab->date_end),
        );

        return $fields_values;
    }

    protected function addNewsletter()
    {
        $errors = array();

        $item = new ClassTdNewsletter((int)Tools::getValue('module_tab'));

        $item->id_shop = (int)$this->context->shop->id;
        $item->date_start = Tools::getValue('date_start');
        $item->date_end = Tools::getValue('date_end');

        $languages = Language::getLanguages(false);

        foreach ($languages as $language) {
            $item->title[$language['id_lang']] = Tools::getValue('title_'.$language['id_lang']);
            $item->text1[$language['id_lang']] = Tools::getValue('text1_'.$language['id_lang']);
            $item->text2[$language['id_lang']] = Tools::getValue('text2_'.$language['id_lang']);
            $type = Tools::strtolower(Tools::substr(strrchr($_FILES['image_'.$language['id_lang']]['name'], '.'), 1));
            $imagesize = @getimagesize($_FILES['image_'.$language['id_lang']]['tmp_name']);
            if (isset($_FILES['image_'.$language['id_lang']])
                && isset($_FILES['image_'.$language['id_lang']]['tmp_name'])
                && !empty($_FILES['image_'.$language['id_lang']]['tmp_name'])
                && !empty($imagesize)
                && in_array(
                    Tools::strtolower(Tools::substr(strrchr($imagesize['mime'], '/'), 1)),
                    array('jpg', 'gif', 'jpeg', 'png')
                )
                && in_array($type, array('jpg', 'gif', 'jpeg', 'png'))) {
                $temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
                $salt = sha1(microtime());
                if ($error = ImageManager::validateUpload($_FILES['image_'.$language['id_lang']])) {
                    $errors[] = $error;
                } elseif (!$temp_name || !move_uploaded_file($_FILES['image_'.$language['id_lang']]['tmp_name'], $temp_name)) {
                    return false;
                } elseif (!ImageManager::resize($temp_name, dirname(__FILE__).'/views/img/images/'.$salt.'_'.$_FILES['image_'.$language['id_lang']]['name'], null, null, $type)) {
                    $errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
                }

                if (isset($temp_name)) {
                    @unlink($temp_name);
                }
                $item->image[$language['id_lang']] = $salt.'_'.$_FILES['image_'.$language['id_lang']]['name'];
            } elseif (Tools::getValue('image_old_'.$language['id_lang']) != '') {
                $item->image[$language['id_lang']] = Tools::getValue('image_old_'.$language['id_lang']);
            }
        }
        
        if (!$errors) {
            if (!$item->id_tab) {
                if (!$item->add()) {
                    return $this->displayError($this->l('The item could not be added.'));
                }
            } elseif (!$item->update()) {
                return $this->displayError($this->l('The item could not be updated.'));
            }

            return $this->displayConfirmation($this->l('The item is saved.'));
        } else {
            return $this->displayError($this->l('Unknown error occurred.'));
        }
    }

    protected function preValidateForm()
    {
        $errors = array();
        $languages = Language::getLanguages(false);
        $banner = new ClassTdNewsletter((int)Tools::getValue('module_tab'));
        $imageexists = @getimagesize($_FILES['image_' . $this->default_language['id_lang']]['tmp_name']);
        $old_image = $banner->image;
        $from = Tools::getValue('date_start');
        $to = Tools::getValue('date_end');

        if (Tools::isEmpty(Tools::getValue('date_start'))) {
            $errors[] = $this->l('The data start is required.');
        }

        if (Tools::isEmpty(Tools::getValue('date_end'))) {
            $errors[] = $this->l('The data end is required.');
        }

        if (!Validate::isDate($to) || !Validate::isDate($from)) {
            $errors[] = $this->l('Invalid date field');
        } elseif (strtotime($to) <= strtotime($from)) {
            $errors[] = $this->l('Invalid date range');
        }

        if (!$old_image && !$imageexists) {
            $errors[] = $this->l('The image is required.');
        }
        
        foreach ($languages as $lang) {
            if (!empty($_FILES['image_' . $lang['id_lang']]['type'])) {
                if (ImageManager::validateUpload($_FILES['image_' . $lang['id_lang']], 4000000)) {
                    $errors[] = $this->l('Image format not recognized, allowed format is: .gif, .jpg, .png');
                }
            }
        }

        if (count($errors)) {
            return $this->displayError(implode('<br />', $errors));
        }

        return false;
    }

    public function hookHeader()
    {
        $this->context->controller->registerJavascript('modules-meerkat', 'modules/'.$this->name.'/views/js/jquery.meerkat.1.3.min.js', ['position' => 'bottom', 'priority' => 150]);
        $this->context->controller->registerJavascript('modules-tdnews', 'modules/'.$this->name.'/views/js/tdnewsletter.js', ['position' => 'bottom', 'priority' => 150]);

        Media::addJsDef(
            array(
                'tdnl_bg' => Configuration::get('TDNL_BACKGROUND'),
                'tdnl_opacity' => Configuration::get('TDNL_OPACITY'),
                'tdnl_animation' => Configuration::get('TDNL_ANIMATION'),
                'tdnl_time' => Configuration::get('TDNL_TIME'),
                'tdnl_display' => Configuration::get('TDNL_DISPLAY'),
                'tdnl_width' => Configuration::get('TDNL_WIDTH'),
                'tdnl_height' => Configuration::get('TDNL_HEIGHT'),
                'tdnl_url'=> $this->_path.'ajax.php'
            )
        );
    }

    public function hookDisplayBeforeBodyClosingTag()
    {
        $newsletter_front = new ClassTdNewsletter();
        $tabs = $newsletter_front->getTopFrontItems($this->id_shop);

        $result = array();

        foreach ($tabs as $key => $tab) {
            $result[$key]['title'] = $tab['title'];
            $result[$key]['text1'] = $tab['text1'];
            $result[$key]['text2'] = $tab['text2'];
            $result[$key]['image'] = $tab['image'];
        }

        $this->context->smarty->assign('image_baseurl', $this->_path.'views/img/images/');
        $this->context->smarty->assign('items', $result);
        
        $this->smarty->assign(array(
            'width' => Configuration::get('TDNL_WIDTH'),
            'height' => Configuration::get('TDNL_HEIGHT'),
        ));

        return $this->fetch('module:tdnewsletter/views/templates/hook/tdnewsletter.tpl');
    }

    /**
     * Register in block newsletter
     */
    public function newsletterRegistration($email)
    {
        $email = pSQL(trim(Tools::getValue('tdnl_email', '')));
        $check = ClassTdNewsletter::isNewsletterRegistered($email);
        if (Tools::isEmpty($email) || !Validate::isEmail($email)) {
            die(Tools::jsonEncode(array('success' => 3, 'error' => $this->l('Invalid email address.'))));
        } else {
            if ($check > 0) {
                die(Tools::jsonEncode(array('success' => 1, 'error' => $this->l('This email address is already registered.'))));
            } else {
                if (!ClassTdNewsletter::isRegistered($check)) {
                    if (Configuration::get('NW_VERIFICATION_EMAIL')) {
                        if ($check == ClassTdNewsletter::GUEST_NOT_REGISTERED) {
                            ClassTdNewsletter::registerGuest($email, false);
                        }
                    } else {
                        ClassTdNewsletter::register($email, $check);
                    }
                    die(Tools::jsonEncode(array('success' => 0, 'error' => $this->l('You have successfully subscribed to this newsletter.'))));
                }
            }
        }
    }
}
