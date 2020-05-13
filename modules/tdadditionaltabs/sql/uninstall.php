<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2017 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$sql = array();

$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdadditionaltab`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdadditionaltab_lang`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'tdadditionaltab_shop`';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
