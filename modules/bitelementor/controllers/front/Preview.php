<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

use BitElementor\PluginElementor;

if (!defined('_PS_VERSION_')) {
    exit;
}
require_once _PS_MODULE_DIR_ . '/bitelementor/classes/bitElementorWpHelper.php';
require_once dirname(__FILE__) . '/../../includes/plugin-elementor.php';

class BitElementorPreviewModuleFrontController extends ModuleFrontController
{
    public function setMedia()
    {
        parent::setMedia();

        $this->module->registerCssFiles();
        $this->context->controller->registerStylesheet('modules-bitelementor-editor-preview', 'modules/'.$this->module->name.'/views/css/admin/editor-preview.css', ['media' => 'all', 'priority' => 150]);

        if (Tools::getValue('template_id')) {
            $this->module->registerJSFiles();
            Media::addJsDef(
                array('elementorFrontendConfig' => [
                    'isEditMode' => '',
                    'stretchedSectionContainer' =>'',
                    'is_rtl' => '',
                ])
            );
        }
    }

    public function initContent()
    {
        if (!Tools::getValue('bit_fronteditor_token') || !(Tools::getValue('bit_fronteditor_token') == $this->module->getFrontEditorToken()) || !Tools::getIsset('id_employee') || !$this->module->checkEnvironment()) {
            Tools::redirect('index.php');
        }

        parent::initContent();

        if (Tools::getValue('template_id')) {
            $templateId = (int) Tools::getValue('template_id');
            $template =  new BitElementorTemplate($templateId);

            ob_start();
            PluginElementor::instance()->get_frontend((array) Tools::jsonDecode($template->data, true));
            $content = ob_get_clean();
            $this->context->smarty->assign(array(
                'content' => $content,
            ));

            $this->setTemplate('module:bitelementor/views/templates/front/preview_template.tpl');
        } else {
            $this->setTemplate('module:bitelementor/views/templates/front/preview.tpl');
        }
    }

    public function getTemplateVarPage()
    {
        $page = parent::getTemplateVarPage();
        $page['body_classes']['elementor-body'] = true;

        if (Tools::getValue('elementor_page_type') == 'landing') {
            $page['body_classes']['elementor-landing-body'] = true;
        }
        return $page;
    }
}
