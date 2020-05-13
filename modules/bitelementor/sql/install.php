<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'bit_elementor_landing` (
    `id_bit_elementor_landing` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_shop` int(10) unsigned DEFAULT NULL,
    `title` varchar(255) NOT NULL,
    PRIMARY KEY (`id_bit_elementor_landing`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'bit_elementor_landing_lang` (
    `id_bit_elementor_landing` INT UNSIGNED NOT NULL,
    `id_lang` int(10) unsigned NOT NULL,
    `data` longtext default NULL,
    PRIMARY KEY (`id_bit_elementor_landing`, `id_lang`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'bit_elementor_template` (
    `id_template` int(10) unsigned NOT NULL auto_increment,
    `title` varchar(255) NOT NULL,
    `data` longtext default NULL,
    PRIMARY KEY (`id_template`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
