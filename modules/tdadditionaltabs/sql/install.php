<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdadditionaltab` (
  `id_tdadditionaltab` int(10) unsigned NOT NULL auto_increment,
  `id_product` INT(10) unsigned NOT NULL,
  `position` INT(10) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id_tdadditionaltab`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdadditionaltab_lang` (
  `id_tdadditionaltab` int(10) unsigned NOT NULL auto_increment,
  `id_lang` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_tdadditionaltab`, `id_lang`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tdadditionaltab_shop` (
  `id_tdadditionaltab` int(10) unsigned NOT NULL auto_increment,
  `id_shop` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_tdadditionaltab`, `id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
