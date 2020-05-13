{**
 * 2007-2018 PrestaShop
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
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div id="_desktop_user_info">
  <div class="user-info">
    <div class="user-info-inner dropdown js-dropdown">
        <a class="expand-more" data-display="static" data-toggle="dropdown">
          <i class="icofont-ui-user"></i>
        </a>
        <div class="dropdown-menu">
          {if $logged}
            <a class="account" href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
              <span>{$customerName}</span>
            </a>
            <a class="logout" href="{$logout_url}" rel="nofollow" title="{l s='Sign out' d='Shop.Theme.Actions'}">
              <span>{l s='Sign out' d='Shop.Theme.Actions'}</span>
            </a>
            {else}
            <a class="login" href="{$my_account_url}" title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
              <span>{l s='Sign in' d='Shop.Theme.Actions'}</span>
            </a>
            <a class="register" href="{$urls.pages.register}" title="{l s='Register' d='Shop.Theme.Customeraccount'}" rel="nofollow">
              <span>{l s='Register' d='Shop.Theme.Customeraccount'}</span>
            </a>
          {/if}
          {hook h='displayTdCompareHeader'}
          {hook h='displayTdWishlistHeader'}
      </div>
    </div>
  </div>
</div>
