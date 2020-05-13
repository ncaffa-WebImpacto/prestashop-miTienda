<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
include_once(dirname(__FILE__).'/tdsearchblock.php');

if (empty($_REQUEST['queryString'])) {
    $search_string = '';
} else {
    $search_string = Tools::replaceAccentedChars($_REQUEST['queryString']);
    $id_cat = Tools::replaceAccentedChars($_REQUEST['id_Cat']);
}

$tdsearchblock = new TdSearchBlock();
$searchResults = $tdsearchblock->getSearchProduct($id_cat, Context::getContext()->language->id, $search_string);

if ($searchResults['total'] > 0) {
    Context::getContext()->smarty->assign(array(
        'searchTotal' => $searchResults['total'],
        'searchResults' => $searchResults['result'],
        'searchImage' => Configuration::get('TDSEARCHBLOCK_IMAGE'),
        'searchCategoryName' => Configuration::get('TDSEARCHBLOCK_CATEGORYNAME'),
        'searchPrice' => Configuration::get('TDSEARCHBLOCK_PRICE'),
        'searchLimit' => Configuration::get('TDSEARCHBLOCK_MAX_ITEM'),
        'query' => $search_string,
        'link' => Context::getContext()->link
    ));
} else {
    Context::getContext()->smarty->assign(array(
        'searchTotal' => 0,
        'searchResults' => null,
        'searchLimit' => Configuration::get('TDSEARCHBLOCK_MAX_ITEM'),
        'query' => $search_string,
        'link' => Context::getContext()->link
    ));
}

echo $tdsearchblock->display(dirname(__FILE__).'/tdsearchblock.php', 'search_result.tpl');
