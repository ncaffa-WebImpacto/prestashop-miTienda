{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{if isset($themeOpt.pl_grid_qv_btn) && $themeOpt.pl_grid_qv_btn == "1"}
    <div class="quick-view-wrapper">
        <a href="#" class="quick-view btn btn-primary tip_inside" data-link-action="quickview">
            {* <i class="material-icons">visibility</i> *}
            <svg width="18px" height="18px" fill="currentcolor">
                <use xlink:href="#tdsquickview">
                </use>
            </svg>
            <span class="lblquickview tip">{l s='Quick view' d='Shop.Theme.Actions'}</span>
        </a>
    </div>
{/if}
