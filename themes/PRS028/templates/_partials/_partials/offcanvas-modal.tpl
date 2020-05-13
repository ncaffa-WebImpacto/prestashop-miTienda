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

{* offcanvas search filter *}
<div class="modal fade" id="offcanvas_search_filter" tabindex="-1" role="dialog" data-modal-hide-mobile>
    <div class="modal-dialog modal-dialog-centered modal-dialog__offcanvas modal-dialog__offcanvas--left" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Global'}">
                    <span class="material-icons">arrow_back</span>
                </button>
                {l s='Filter By' d='Shop.Theme.Actions'}
            </div>
            <div class="modal-body">
                {if $themeOpt.cat_layout == 3}
                  {block name='product_list_facets_center'}
                    {widget name="ps_facetedsearch"}
                  {/block}
                {/if}
                <div id="_mobile_search_filters_wrapper"></div>
            </div>
        </div>
    </div>
</div>
{* end search filter *}

<div class="modal fade" id="mobile_top_menu_wrapper" tabindex="-1" role="dialog" data-modal-hide-mobile>
    <div class="modal-dialog modal-dialog__offcanvas" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Global'}">
                    <span aria-hidden="true"><i class="material-icons">close</i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
                <div id="_mobile_bitmegamenu-mobile"></div>
                <div class="responsive-content mobile">
                    <div id="_mobile_language_selector"></div>
                    <div id="_mobile_currency_selector"></div>
                </div>
            </div>
        </div>
    </div>
</div>