<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdsizechart` (
    `id_tdsizechart` int(10) unsigned NOT NULL auto_increment,
    `active` tinyint(1) unsigned NOT NULL,
    PRIMARY KEY (`id_tdsizechart`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdsizechart_lang` (
    `id_tdsizechart` int(10) unsigned NOT NULL auto_increment,
    `id_lang` int(10) unsigned NOT NULL,
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    PRIMARY KEY (`id_tdsizechart`, `id_lang`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdsizechart_shop` (
    `id_tdsizechart` int(10) unsigned NOT NULL auto_increment,
    `id_shop` int(10) unsigned NOT NULL,
    PRIMARY KEY (`id_tdsizechart`, `id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdsizechart_product` (
    `id_tdsizechart` int(10) unsigned NOT NULL,
    `id_product` int(10) unsigned NOT NULL,
    PRIMARY KEY (`id_tdsizechart`, `id_product`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdsizechart_category` (
    `id_tdsizechart` int(10) unsigned NOT NULL,
    `id_category` int(10) unsigned NOT NULL,
    PRIMARY KEY (`id_tdsizechart`, `id_category`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdsizechart_brand` (
    `id_tdsizechart` int(10) unsigned NOT NULL,
    `id_manufacturer` int(10) unsigned NOT NULL,
    PRIMARY KEY (`id_tdsizechart`, `id_manufacturer`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
