<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$sql = array();

$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdsizechart`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdsizechart_lang`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdsizechart_shop`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdsizechart_product`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdsizechart_category`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdsizechart_brand`';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
