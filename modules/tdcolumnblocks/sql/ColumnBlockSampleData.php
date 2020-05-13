<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class ColumnBlockSampleData
{
    public function initData($base_url)
    {
        $content_1 = 'a:7:{s:5:"limit";s:1:"3";s:13:"enable_slider";s:1:"1";s:11:"auto_scroll";s:1:"1";s:10:"slider_row";s:1:"3";s:13:"product_thumb";s:4:"left";s:17:"selected_products";b:0;s:17:"selected_category";b:0;}';
        $content_2 = 'a:7:{s:5:"limit";s:1:"3";s:13:"enable_slider";s:0:";s:11:"auto_scroll";s:0:";s:10:"slider_row";s:1:"1";s:13:"product_thumb";s:3:"top";s:17:"selected_products";b:0;s:17:"selected_category";b:0;}';
        $content_3 = 'a:7:{s:5:"limit";s:1:"3";s:13:"enable_slider";s:1:"1";s:11:"auto_scroll";s:1:"1";s:10:"slider_row";s:1:"3";s:13:"product_thumb";s:4:"left";s:17:"selected_products";b:0;s:17:"selected_category";b:0;}';

        $content_lang_2 = '<div class="tdleftbanners">\n<div class="block_content mt-0"><div class="tdleftbanners-container"><a class="effect1" href="#" title="Left Banner 1"> <img src="'.$base_url.'modules/tdcolumnblocks/views/img/left-banner-1.jpg" alt="Left Banner 1" /></a></div>\n</div></div>';
        $id_shop = Configuration::get('PS_SHOP_DEFAULT');

        /*install static Block*/
        $result = true;

        $result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'tdcolumnblock` (`id_tdcolumnblock`, `id_shop`, `active`, `position`, `block_type`, `custom_class`, `product_filter`, `product_options`) VALUES
            (1, '.$id_shop.', 1, 1, "blocktype_product", "", "products_new", \''.$content_1.'\'),
            (2, '.$id_shop.', 1, 2, "blocktype_html", "hidden-md-down", "products_featured", \''.$content_2.'\'),
            (3, '.$id_shop.', 1, 3, "blocktype_product", "", "products_seller", \''.$content_3.'\');');


        foreach (Language::getLanguages(false) as $lang) {
            $result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'tdcolumnblock_lang` (`id_tdcolumnblock`, `id_lang`, `title`, `static_html`) VALUES
                (1, "'.$lang['id_lang'].'", "New Product", ""),
                (2, "'.$lang['id_lang'].'", "Banner Image", \''.$content_lang_2.'\'),
                (3, "'.$lang['id_lang'].'", "Top Sellers", "");');
        }
        return $result;
    }
}
