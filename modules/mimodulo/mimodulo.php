<?php

/**
* 2007-2020 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2020 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Mimodulo extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'mimodulo';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Nicolás Caffa Carreras';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('mi nuevo modulo');
        $this->description = $this->l('este es mi nuevo modulo');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('MIMODULO_LIVE_MODE', false);

        return parent::install() &&
            $this->registerHook('displayHome')&&
            $this->registerHook('displayFooterProduct');
            

    }

    public function uninstall()
    {
        Configuration::deleteByName('MIMODULO_LIVE_MODE');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitMimoduloModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

         return $output.$this->renderForm();

       
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitMimoduloModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        $helper->fields_value['MIMODULO_TEXTO'] = Configuration::get('MODULO_TEXTO_HOME');

        return $helper->generateForm(array($this->getConfigForm()));
    }



    /**
     * Create the structure of your form.
     */
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
                        'type' => 'text',
                        'label' => $this->l('Texto'),
                        'name' => 'MIMODULO_TEXTO',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter a valid email address'),
                        'name' => 'MIMODULO_ACCOUNT_EMAIL',
                        'label' => $this->l('Email'),
                    ),
                    array(
                        'type' => 'password',
                        'name' => 'MIMODULO_ACCOUNT_PASSWORD',
                        'label' => $this->l('Password'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {

        $texto = Tools::getValue("MIMODULO_TEXTO");
        return array( 
            'MIMODULO_TEXTO' => Configuration::get('MIMODULO_TEXTO', $texto),
            'MIMODULO_LIVE_MODE' => Configuration::get('MIMODULO_LIVE_MODE', true),
            'MIMODULO_ACCOUNT_EMAIL' => Configuration::get('MIMODULO_ACCOUNT_EMAIL', 'contact@prestashop.com'),
            'MIMODULO_ACCOUNT_PASSWORD' => Configuration::get('MIMODULO_ACCOUNT_PASSWORD', null),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
  

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
   

    public function hookDisplayHome(array $params)
    {

           
        $texto = Configuration::get("MIMODULO_TEXTO");
        $this->context->smarty->assign(array(
            'texto_variable' => $texto
        ));
        //  $this->context->controller->registerStylesheet($this->local_path.'views/css/front.css');
         return $this->display(__FILE__, 'views/templates/hook/mimodulo.tpl');
        
    }


    public function hookdisplayTdProductTabContent(array $params){
       
       


    }

    public function hookdisplayTdProductTab(array $params){
       
       

    }

    public function hookdisplayFooterProduct(array $params){

        
        // dump(Product::getProductName(21));
        // dump(Product::getProductCategories(21));
        // dump($params['product']['name']);
        

          $product =$params['product'];
          $this->context->smarty->assign(array('product' => $product,));

        

         //$product = $params['product'];
        //  $productName = $params['product']['name'];
        //  $productCat = $params['category']->{'id'};
        //  $productCatName = $params['category']->{'name'};
        //  $src="$image.bySize.home_default.url";

        //  $this->context->smarty->assign(array(
        //     'product.name' => $productName,
        //     'idcategory' => $productCat ,
        //     'categoryname'=>$productCatName
        // ));

        //  dump($productName);
        //  dump($productCat);
        //  dump($productCatName);

         return $this->display(__FILE__, 'views/templates/hook/mimodulo.tpl');

       
        

    


        

        // $this->context->smarty->assign(array(
        //     'texto_variable' => 
        // ));


    }



   

}
