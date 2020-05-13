<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class AdminBitblogModuleController extends ModuleAdminControllerCore
{
    public function __construct()
    {
        parent::__construct();

        $url = 'index.php?controller=adminmodules&configure=bitblog&tab_module=front_office_features&module_name=bitblog&token='.Tools::getAdminTokenLite('AdminModules');
        Tools::redirectAdmin($url);
    }
}
