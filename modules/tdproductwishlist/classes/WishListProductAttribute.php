<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Core\Product\ProductExtraContentFinder;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Addon\Module\ModuleManagerBuilder;

class WishListProductAttribute extends ProductControllerCore
{
    public $php_self = '';
    protected $quantity_discounts;

    public function getTemplateVarProducts($id_product, $id_product_attribute)
    {
        if ($id_product) {
            $this->product = new Product($id_product, true, $this->context->language->id, $this->context->shop->id);
        }

        if (!Validate::isLoadedObject($this->product)) {
            return false;
        }
        $productSettings = $this->getProductPresentationSettings();
        // Hook displayProductExtraContent
        $extraContentFinder = new ProductExtraContentFinder();

        $product = $this->objectPresenter->present($this->product);
        $product['id_product'] = (int) $this->product->id;
        $product['out_of_stock'] = (int) $this->product->out_of_stock;
        $product['new'] = (int) $this->product->new;
        $product['id_product_attribute'] = (int) $id_product_attribute;
        $product['minimal_quantity'] = $this->getProductMinimalQuantity($product);
        $product['quantity_wanted'] = $this->getRequiredQuantity($product);
        $product['extraContent'] = $extraContentFinder->addParams(array('product' => $this->product))->present();

        $product_full = Product::getProductProperties($this->context->language->id, $product, $this->context);

        $product_full = $this->addProductCustomizationData($product_full);

        $product_full['show_quantities'] = (bool) (
            Configuration::get('PS_DISPLAY_QTIES')
            && Configuration::get('PS_STOCK_MANAGEMENT')
            && $this->product->quantity > 0
            && $this->product->available_for_order
            && !Configuration::isCatalogMode()
        );
        $product_full['quantity_label'] = ($this->product->quantity > 1) ? $this->trans('Items', array(), 'Shop.Theme.Catalog') : $this->trans('Item', array(), 'Shop.Theme.Catalog');
        $product_full['quantity_discounts'] = $this->quantity_discounts;

        if ($product_full['unit_price_ratio'] > 0) {
            $unitPrice = ($productSettings->include_taxes) ? $product_full['price'] : $product_full['price_tax_exc'];
            $product_full['unit_price'] = $unitPrice / $product_full['unit_price_ratio'];
        }

        $group_reduction = GroupReduction::getValueForProduct($this->product->id, (int) Group::getCurrent()->id);
        if ($group_reduction === false) {
            $group_reduction = Group::getReduction((int) $this->context->cookie->id_customer) / 100;
        }
        $product_full['customer_group_discount'] = $group_reduction;

        $presenter = $this->getProductPresenter();

        return $presenter->present(
            $productSettings,
            $product_full,
            $this->context->language
        );
    }
}
