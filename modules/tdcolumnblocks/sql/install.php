<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdcolumnblock` (
    `id_tdcolumnblock` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_shop` int(10) unsigned NOT NULL DEFAULT 1,
    `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
    `position` int(10) unsigned NOT NULL DEFAULT 0,
    `block_type` varchar(128) NOT NULL,
    `custom_class` varchar(50) DEFAULT NULL,
    `product_filter` varchar(128) NOT NULL,
    `product_options` text DEFAULT NULL,
    PRIMARY KEY (`id_tdcolumnblock`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdcolumnblock_lang` (
    `id_tdcolumnblock` int(10) unsigned NOT NULL,
    `id_lang` int(10) unsigned NOT NULL,
    `title` varchar(254) DEFAULT NULL,
    `static_html` text DEFAULT NULL,
    PRIMARY KEY (`id_tdcolumnblock`, `id_lang`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
