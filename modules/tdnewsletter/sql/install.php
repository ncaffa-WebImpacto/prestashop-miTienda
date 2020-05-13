<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdnewsletter` (
    `id_tab` int(11) NOT NULL AUTO_INCREMENT,
	`id_shop` int(11) NOT NULL DEFAULT \'1\',
	`date_start` datetime NOT NULL,
	`date_end` datetime NOT NULL,
    PRIMARY KEY (`id_tab`, `id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdnewsletter_lang` (
	`id_tab` int(10) unsigned NOT NULL,
	`id_lang` int(11) NOT NULL,
	`image` VARCHAR(100) NOT NULL,
	`title` text NOT NULL,
	`text1` text NOT NULL,
	`text2` text NOT NULL,
	PRIMARY KEY (`id_tab`, `id_lang`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
