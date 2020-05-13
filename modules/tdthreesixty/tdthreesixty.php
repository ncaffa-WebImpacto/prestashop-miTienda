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

require_once dirname(__FILE__).'/classes/TdProductThreeSixty.php';

class TdThreeSixty extends Module implements WidgetInterface
{
    const ACCESS_RIGHTS = 0775;

    protected $SOURCE_INDEX;
    protected $UPLOAD_DIR;
    protected $templateFile;

    public function __construct()
    {
        $this->name = 'tdthreesixty';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';

        $this->SOURCE_INDEX = _PS_PROD_IMG_DIR_ . 'index.php';
        $this->UPLOAD_DIR = _PS_MODULE_DIR_ . 'tdthreesixty/uploads/';

        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('TD - 360 Product Viewer');
        $this->description = $this->l('The module creates 360 product viewer.');

        $this->templateFile = 'module:'.$this->name.'/views/templates/hook/tdthreesixty.tpl';
    }

    public function install()
    {
        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayAfterProductCover') &&
            $this->registerHook('displayAdminProductsExtra') &&
            $this->registerHook('actionObjectProductUpdateAfter') &&
            $this->registerHook('actionObjectProductDeleteAfter') &&
            $this->registerHook('actionObjectProductAddAfter');
    }

    public function uninstall()
    {
        include(dirname(__FILE__).'/sql/uninstall.php');
        return parent::uninstall();
    }

    public function hookHeader()
    {
        $this->context->controller->registerJavascript('modules'.$this->name.'-script', 'modules/'.$this->name.'/views/js/front.js', ['position' => 'bottom', 'priority' => 150]);
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $idProduct = (int) Tools::getValue('id_product', $params['id_product']);

        $idThreeSixty = TdProductThreeSixty::getIdByProduct($idProduct);
        $threeSixty = new TdProductThreeSixty($idThreeSixty);

        $threeSixtyContent = array();
        if (Validate::isLoadedObject($threeSixty)) {
            foreach ($threeSixty->content as $key => $image) {
                $threeSixtyContent[$key]['path'] = $this->_path.'uploads/threesixty/'.$this->getFolder($idProduct).'/'.$image['n'];
                $threeSixtyContent[$key]['name'] = $image['n'];
            }
        }

        $this->context->smarty->assign(array(
            'product' =>$idProduct,
            'path' => $this->_path,
            'threeSixtyContent' => $threeSixtyContent,
            'threeSixtyActionUrl' => $this->context->link->getAdminLink('AdminModules', true) . '&configure=' . $this->name . '&action=UploaderThreeSixty&ajax=1&id_product=' . $idProduct,
        ));

        return $this->display(__FILE__, 'views/templates/admin/bo_productab.tpl');
    }

    public function getContent()
    {
        $this->smarty->assign(array(
            'doc_url' => $this->_path.'documentation.pdf',
        ));

        return $this->display(__FILE__, 'views/templates/admin/about.tpl');
    }

    public function hookBackOfficeHeader()
    {
        if ($this->context->controller->controller_name == 'AdminProducts') {
            $this->context->controller->addCSS($this->_path . 'views/css/admin_tab.css');
        }
    }

    public function ajaxProcessUploaderThreeSixty()
    {
        $idProduct = (int) Tools::getValue('id_product');
        $folder = 'threesixty/';

        $product = new Product((int) $idProduct);
        if (!Validate::isLoadedObject($product)) {
            $files = array();
            $files[0]['error'] = Tools::displayError('Cannot add image because product creation failed.');
        }
        header('Content-Type: application/json');
        $step = (int) Tools::getValue('step');

        if ($step == 1) {
            $image_uploader = new HelperImageUploader('threesixty-file-upload');
            $image_uploader->setAcceptTypes(array('jpeg', 'gif', 'png', 'jpg'));
            $files = $image_uploader->process();
            $new_destination = $this->getPathForCreation($idProduct, $folder);

            foreach ($files as &$file) {
                $filename = uniqid() . '.jpg';
                $error = 0;
                if (!ImageManager::resize($file['save_path'], $new_destination . $filename, null, null, 'jpg', false, $error)) {
                    switch ($error) {
                        case ImageManager::ERROR_FILE_NOT_EXIST:
                            $file['error'] = Tools::displayError('An error occurred while copying image, the file does not exist anymore.');
                            break;
                        case ImageManager::ERROR_FILE_WIDTH:
                            $file['error'] = Tools::displayError('An error occurred while copying image, the file width is 0px.');
                            break;
                        case ImageManager::ERROR_MEMORY_LIMIT:
                            $file['error'] = Tools::displayError('An error occurred while copying image, check your memory limit.');
                            break;
                        default:
                            $file['error'] = Tools::displayError('An error occurred while copying image.');
                            break;
                    }
                    continue;
                }
                unlink($file['save_path']);
                unset($file['save_path']);
                $file['status'] = 'ok';
                $file['name'] = $filename;
            }
            die(Tools::jsonEncode($files[0]));
        } elseif ($step == 2) {
            $file = (string) Tools::getValue('file');
            if (file_exists($this->UPLOAD_DIR . $folder . $idProduct . '/' . $file)) {
                $res = @unlink($this->UPLOAD_DIR . $folder . $idProduct . '/' . $file);
            }
            if ($res) {
                die('ok');
            } else {
                die('error');
            }
        }
    }

    private function getPathForCreation($id_product, $folder)
    {
        $path = $this->getFolder($id_product);
        $this->createFolder($id_product, $this->UPLOAD_DIR . $folder);
        return $this->UPLOAD_DIR . $folder . $path;
    }

    private function createFolder($id_product, $folder)
    {
        if (!file_exists($folder . $this->getFolder($id_product))) {
            $success = @mkdir($folder . $this->getFolder($id_product), self::ACCESS_RIGHTS, true);
            $chmod = @chmod($folder . $this->getFolder($id_product), self::ACCESS_RIGHTS);
            if (($success || $chmod)
                && !file_exists($folder . $this->getFolder($id_product) . 'index.php')
                && file_exists($this->SOURCE_INDEX)) {
                return @copy($this->SOURCE_INDEX, $folder . $this->getFolder($id_product) . 'index.php');
            }
        }
        return true;
    }

    private function getFolder($id_product)
    {
        if (!is_numeric($id_product)) {
            return false;
        }
        $folders = str_split((string) $id_product);
        return implode('/', $folders) . '/';
    }

    private function deleteFolder($id_product, $folder)
    {
        $path = $this->getPathForCreation($id_product, $folder);
        if (is_dir($path)) {
            $deleteFolder = true;
        }
        if (isset($deleteFolder) && $deleteFolder) {
            array_map('unlink', glob($path.'*.*'));
            @rmdir($path);
        }
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        if ($hookName == null && isset($configuration['hook'])) {
            $hookName = $configuration['hook'];
        }
        $idProduct = (int) $configuration['smarty']->tpl_vars['product']->value['id_product'];

        $cacheId = 'tdthreesixty|'.$idProduct;

        if (!$this->isCached($this->templateFile, $this->getCacheId($cacheId))) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        }
        return $this->fetch($this->templateFile, $this->getCacheId($cacheId));
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $idProduct = (int) $configuration['smarty']->tpl_vars['product']->value['id_product'];

        $idThreeSixty = TdProductThreeSixty::getIdByProduct($idProduct);
        $threeSixty = new TdProductThreeSixty($idThreeSixty);
        $threeSixtyContent = array();
        $isThreeSixtyContent = false;
        $frames_count = '';
        if (is_array($threeSixty->content)) {
            $frames_count = count($threeSixty->content);
        }
        $images_js_string = '';

        $imageDirs = $this->context->link->getMediaLink(_MODULE_DIR_ . $this->name . '/');
        $force_ssl = (Configuration::get('PS_SSL_ENABLED'));
        if ($force_ssl) {
            $bgImageDir = str_replace("http:", "https:", $imageDirs);
        } else {
            $bgImageDir = $imageDirs;
        }

        if (Validate::isLoadedObject($threeSixty)) {
            $i=0;
            foreach ($threeSixty->content as $key => $image) {
                $i++;
                $images_js_string .= $bgImageDir.'uploads/threesixty/'.$this->getFolder($idProduct).$image['n'];
                if ($i < $frames_count) {
                    $images_js_string .= ",";
                }
            }
            $isThreeSixtyContent = true;
        }

        return array(
            'imgPath' => $bgImageDir.'uploads/threesixty/'.$this->getFolder($idProduct),
            'threeSixtyContent' => $images_js_string,
            'isThreeSixtyContent' => $isThreeSixtyContent,
            'frames_count' => $frames_count,
            'path' => $this->_path,
            'idProduct' => $idProduct
        );
    }

    public function hookActionObjectProductUpdateAfter($params)
    {
        if (!isset($params['object']->id)) {
            return;
        }
        $this->joinWithProduct($params['object']->id);

        $this->clearCache($params['object']->id);
    }

    public function joinWithProduct($idProduct)
    {
        if (!isset(Tools::getValue('tdthreesixty')['threesixty'])) {
            return;
        }

        $idProduct = (int) $idProduct;

        $images = Tools::getValue('tdthreesixty')['threesixty'];
        $imagesArray = Tools::jsonDecode($images);
        $idThreeSixty = TdProductThreeSixty::getIdByProduct($idProduct);
        $threeSixty = new TdProductThreeSixty($idThreeSixty);

        if (!is_array($imagesArray) || empty($imagesArray)) {
            if (Validate::isLoadedObject($threeSixty)) {
                $threeSixty->delete();
            }
        } else {
            if (Validate::isLoadedObject($threeSixty)) {
                $threeSixty->content = $images;
                $threeSixty->update();
            } else {
                $threeSixty = new TdProductThreeSixty();
                $threeSixty->id_product = $idProduct;
                $threeSixty->content = $images;
                $threeSixty->add();
            }
        }
    }

    public function hookcActionObjectProductDeleteAfter($params)
    {
        if (!isset($params['object']->id)) {
            return;
        }
        $idProduct = (int) $params['object']->id;

        $idThreeSixty = TdProductThreeSixty::getIdByProduct($idProduct);
        $threeSixty = new TdProductThreeSixty($idThreeSixty);

        if (Validate::isLoadedObject($threeSixty)) {
            $threeSixty->delete();
        }
        $this->deleteFolder($idProduct, 'threesixty/');

        $this->clearCache($idProduct);
    }

    public function hookActionObjectProductAddAfter($params)
    {
        if (!isset($params['object']->id)) {
            return;
        }
        $this->joinWithProduct($params['object']->id);
    }

    public function clearCache($idProduct = 0)
    {
        if ($idProduct) {
            $this->_clearCache($this->templateFile, 'tdthreesixty|' . $idProduct);
        } else {
            $this->_clearCache($this->templateFile);
        }
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
