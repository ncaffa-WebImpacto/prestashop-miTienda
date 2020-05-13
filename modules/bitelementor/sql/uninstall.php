<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$sql = array();

$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'bit_elementor_landing`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'bit_elementor_landing_lang`';
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'bit_elementor_template`';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
