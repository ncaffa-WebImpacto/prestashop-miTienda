<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

include_once(dirname(__FILE__) . '/../../config/config.inc.php');
include_once(dirname(__FILE__) . '/../../init.php');
include(dirname(__FILE__).'/tdnewsletter.php');

$tdpopup = new Tdnewsletter();

if (Tools::getValue('ajax') == 1) {
    echo $tdpopup->newsletterRegistration(Tools::getValue('tdnl_email'));
}
