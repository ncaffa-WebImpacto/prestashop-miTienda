<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

require_once(_PS_MODULE_DIR_.'tdcompare/classes/TdCompareProduct.php');
require_once(_PS_MODULE_DIR_.'tdcompare/classes/ProductAttribute.php');

class TdcompareCompareModuleFrontController extends ModuleFrontController
{
    public $php_self;

    /**
     * Display ajax content (this function is called instead of classic display, in ajax mode)
     */
    public function displayAjax()
    {
        // Add or remove product with Ajax
        if (Tools::getValue('ajax') && Tools::getValue('id_product') && Tools::getValue('action')) {
            if (Tools::getValue('action') == 'add') {
                $id_compare = isset($this->context->cookie->id_compare) ? $this->context->cookie->id_compare: false;
                if (TdCompareProduct::getNumberProducts($id_compare) < Configuration::get('TDCOMPARATOR_MAXITEM')) {
                    TdCompareProduct::addCompareProduct($id_compare, (int)Tools::getValue('id_product'));
                } else {
                    $this->ajaxDie('0');
                }
            } elseif (Tools::getValue('action') == 'remove') {
                if (isset($this->context->cookie->id_compare)) {
                    TdCompareProduct::removeCompareProduct((int)$this->context->cookie->id_compare, (int)Tools::getValue('id_product'));
                } else {
                    $this->ajaxDie('0');
                }
            } else {
                $this->ajaxDie('0');
            }
            $this->ajaxDie('1');
        }
        $this->ajaxDie('0');
    }

    /**
     * Assign template vars related to page content
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        $this->php_self = 'module-tdcompare-compare';

        if (Tools::getValue('ajax')) {
            return;
        }
        parent::initContent();

        //Clean compare product table
        TdCompareProduct::cleanCompareProducts('week');

        $hasProduct = false;

        if (!Configuration::get('TDCOMPARATOR_MAXITEM') || !Configuration::get('TDCOMPARATOR_ENABLE')) {
            return Tools::redirect('index.php?controller=404');
        }

        $ids = null;
        if (isset($this->context->cookie->id_compare)) {
            $ids = TdCompareProduct::getCompareProducts($this->context->cookie->id_compare);
        }

        if ($ids) {
            if (count($ids) > 0) {
                if (count($ids) > Configuration::get('TDCOMPARATOR_MAXITEM')) {
                    $ids = array_slice($ids, 0, Configuration::get('TDCOMPARATOR_MAXITEM'));
                }

                $listProducts = array();
                $listFeatures = array();

                foreach ($ids as $k => &$id) {
                    $curProduct = new Product((int)$id, true, $this->context->language->id);
                    if (!Validate::isLoadedObject($curProduct) || !$curProduct->active || !$curProduct->isAssociatedToShop()) {
                        if (isset($this->context->cookie->id_compare)) {
                            TdCompareProduct::removeCompareProduct($this->context->cookie->id_compare, $id);
                        }
                        unset($ids[$k]);
                        continue;
                    }

                    foreach ($curProduct->getFrontFeatures($this->context->language->id) as $feature) {
                        $listFeatures[$curProduct->id][$feature['id_feature']] = $feature['value'];
                    }

                    $product_object = new ProductAttribute();
                    $curProduct = $product_object->getTemplateVarProducts($id);
                    $listProducts[] = $curProduct;
                }

                if (count($listProducts) > 0) {
                    $width = 80 / count($listProducts);

                    $hasProduct = true;
                    $ordered_features = $this->getFeaturesForComparison($ids, $this->context->language->id);
                    $this->context->smarty->assign(array(
                        'ordered_features' => $ordered_features,
                        'product_features' => $listFeatures,
                        'products' => $listProducts,
                        'width' => $width,
                        'homeSize' => Image::getSize(ImageType::getFormattedName('home')),
                        'list_product' => $ids,
                    ));
                } elseif (isset($this->context->cookie->id_compare)) {
                    $object = new TdCompareProduct((int)$this->context->cookie->id_compare);
                    if (Validate::isLoadedObject($object)) {
                        $object->delete();
                    }
                }
            }
        }
        $this->context->smarty->assign('hasProduct', $hasProduct);

        $this->setTemplate('module:tdcompare/views/templates/hook/products-comparison.tpl');
    }

    public function getFeaturesForComparison($list_ids_product, $id_lang)
    {
        if (!Feature::isFeatureActive()) {
            return false;
        }

        $ids = '';
        foreach ($list_ids_product as $id) {
            $ids .= (int)$id.',';
        }

        $ids = rtrim($ids, ',');

        if (empty($ids)) {
            return false;
        }

        return Db::getInstance()->executeS('
			SELECT f.*, fl.*
			FROM `'._DB_PREFIX_.'feature` f
			LEFT JOIN `'._DB_PREFIX_.'feature_product` fp
				ON f.`id_feature` = fp.`id_feature`
			LEFT JOIN `'._DB_PREFIX_.'feature_lang` fl
				ON f.`id_feature` = fl.`id_feature`
			WHERE fp.`id_product` IN ('.$ids.')
			AND `id_lang` = '.(int)$id_lang.'
			GROUP BY f.`id_feature`
			ORDER BY f.`position` ASC
		');
    }

    public function getTemplateVarPage()
    {
        $page = parent::getTemplateVarPage();

        $page['meta']['title'] = $this->l('Products Comparison', 'compare').' - '.Configuration::get('PS_SHOP_NAME');
        $page['meta']['keywords'] = $this->l('products-comparison', 'compare');
        $page['meta']['description'] = $this->l('Products Comparison', 'compare');
        return $page;
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $breadcrumb['links'][] = [
            'title' => $this->l('Products Comparison', 'compare'),
            'url' => $this->context->link->getModuleLink('tdcompare', 'compare'),
        ];

        return $breadcrumb;
    }
}
