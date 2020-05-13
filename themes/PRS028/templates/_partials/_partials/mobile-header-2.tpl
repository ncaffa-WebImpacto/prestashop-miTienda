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
{block name='header_top'}
  <div class="header-top">
    <div class="container">
      <div class="mobile mobile-wrap d-flex align-items-center justify-content-between flex-wrap flex-row">
        <div id="_mobile_header_logo" class="mobile-logo"></div>
        <div class="mobile-right d-flex">
          <button class="btn header-toggle" data-toggle="modal" data-target="#mobile_top_menu_wrapper">
            <svg width="30px" height="30px" fill="currentcolor">
              <use xlink:href="#mtoggle"></use>
            </svg>
          </button>
          <div id="_mobile_user_info" class="mobile-user"></div>
          <div id="_mobile_cart" class="mobile-cart"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="nav-full-width">
    <div class="container">
      <div id="_mobile_search_default"></div>
      <div id="_mobile_search" class="mobile-search"></div>
    </div>
  </div>
{/block}