<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class TdnlSampleData
{
    public function initData($base_url)
    {
        $id_shop = Configuration::get('PS_SHOP_DEFAULT');

        /*install static Block*/
        $result = true;

        $sdate = date('Y-m-d h:i:s', time());
        $edate = date('Y-m-d h:i:s', strtotime("+30 day"));

        $result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'tdnewsletter` (`id_tab`, `id_shop`, `date_start`, `date_end`)  VALUES
            (1, '.$id_shop.', "'.$sdate.'", "'.$edate.'");');

        foreach (Language::getLanguages(false) as $lang) {
            $result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'tdnewsletter_lang` (`id_tab`, `id_lang`, `image`, `title`, `text1`, `text2`) VALUES 
                ( 1, "'.$lang['id_lang'].'", "newsletter.jpg", "Newsletter", "Sign up here to get the latest news, updates and special offers", "");');
        }

        return $result;
    }
}
