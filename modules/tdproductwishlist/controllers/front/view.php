<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

require_once(_PS_MODULE_DIR_.'tdproductwishlist/classes/TdWishList.php');
require_once(_PS_MODULE_DIR_.'tdproductwishlist/classes/WishListProductAttribute.php');

class TdProductWishListViewModuleFrontController extends ModuleFrontController
{
    public $php_self;

    public function __construct()
    {
        parent::__construct();
        $this->context = Context::getContext();
    }

    public function initContent()
    {
        $this->php_self = 'module-tdproductwishlist-view';

        parent::initContent();
        if (!Configuration::get('TDWISHLIST_ENABLE')) {
            return Tools::redirect('index.php?controller=404');
        }
        $token = Tools::getValue('token');

        if ($token) {
            $wishlist = TdWishList::getByToken($token);
            $wishlists = TdWishList::getByIdCustomer((int)$wishlist['id_customer']);
            if (count($wishlists) > 1) {
                foreach ($wishlists as $key => $wishlists_item) {
                    if ($wishlists_item['id_wishlist'] == $wishlist['id_wishlist']) {
                        unset($wishlists[$key]);
                    }
                }
            } else {
                $wishlists = array();
            }

            $products = array();
            $wishlist_product = TdWishList::getSimpleProductByIdWishlist((int)$wishlist['id_wishlist']);
            $product_object = new WishListProductAttribute();
            if (count($wishlist_product) > 0) {
                foreach ($wishlist_product as $wishlist_product_item) {
                    $list_product_tmp = array();
                    $list_product_tmp['wishlist_info'] = $wishlist_product_item;
                    $list_product_tmp['product_info'] = $product_object->getTemplateVarProducts($wishlist_product_item['id_product'], $wishlist_product_item['id_product_attribute']);
                    $list_product_tmp['product_info']['wishlist_quantity'] = $wishlist_product_item['quantity'];
                    $products[] = $list_product_tmp;
                }
            }
            TdWishList::incCounter((int)$wishlist['id_wishlist']);
            $this->context->smarty->assign(
                array(
                    'current_wishlist' => $wishlist,
                    'wishlists' => $wishlists,
                    'products' => $products,
                    'view_wishlist_url' => $this->context->link->getModuleLink('tdproductwishlist', 'view'),
                    'is_rewrite_active' => (bool)Configuration::get('PS_REWRITING_SETTINGS'),
                )
            );
        }
        $this->setTemplate('module:tdproductwishlist/views/templates/front/view.tpl');
    }

    public function getTemplateVarPage()
    {
        $page = parent::getTemplateVarPage();

        $page['meta']['title'] = Configuration::get('PS_SHOP_NAME').' - '.$this->l('View Wishlist', 'view');
                $page['meta']['keywords'] = $this->l('view-wishlist', 'view');
                $page['meta']['description'] = $this->l('view Wishlist', 'view');
        return $page;
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $breadcrumb['links'][] = array(
            'title' => $this->l('My Account', 'view'),
            'url' => $this->context->link->getPageLink('my-account', true),
        );

        $breadcrumb['links'][] = array(
            'title' => $this->l('My Wishlist', 'view'),
            'url' => $this->context->link->getModuleLink('tdproductwishlist', 'mywishlist'),
        );

        return $breadcrumb;
    }
}
