<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class BitElementorWidgetModuleFrontController extends ModuleFrontController
{

    public function setMedia()
    {
    }

    public function initContent()
    {
        if (!Tools::getValue('bit_fronteditor_token') || !(Tools::getValue('bit_fronteditor_token') == $this->module->getFrontEditorToken())) {
            Tools::redirect('index.php');
        }
        $this->assignGeneralPurposeVariables();
    }

    public function getLayout()
    {
    }

    public function display()
    {
    }

    public function getTemplateVarPage()
    {
    }

    public function displayAjaxWidgetPreview()
    {
        $name = Tools::getValue('widgetName');
        $options = Tools::getValue('widgetOptions');
        $templateFile = Tools::strtolower($name) . '.tpl';

        $this->context->smarty->assign($this->getBitElementorWidgetVariables($name, $options));
        $this->smartyOutputContent('module:bitelementor/views/templates/widgets/' . $templateFile);
        return true;
    }

    protected function displayMaintenancePage()
    {
        return;
    }

    public function getBitElementorWidgetVariables($name, $options = [])
    {
        $className = 'BitElementorWidget_' . $name;
        $widget = new $className();
        return $widget->parseOptions($options, true);
    }
}
