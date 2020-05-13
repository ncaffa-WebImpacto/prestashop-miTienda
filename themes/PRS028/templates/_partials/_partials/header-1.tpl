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
{block name='header_banner'}
  <div class="header-banner">
      {hook h='displayBanner'}
  </div>
{/block}

{block name='header_nav'}
  <nav class="header-nav">
    <div class="container">
      <div class="row d-none d-md-flex align-items-center justify-content-between m-0">
        <div class="left-nav d-inline-flex align-items-center justify-content-start">
          {if $themeOpt.welcome_status == 1}
            <div class="welcome-message">
              <svg width="16px" height="16px" fill="currentcolor" class="mr-2">
                <use xlink:href="#bitheadercontact"></use>
              </svg>
              <div class="message_info">
                {$themeOpt.welcome_msg nofilter}
              </div>
            </div>
          {/if}
          {hook h='displayNav1'}
        </div>
        <div class="right-nav d-inline-flex align-items-center justify-content-end">
          {hook h='displayNav2'}
        </div>
      </div>
    </div>
  </nav>
{/block}

{block name='header_top'}
  <div class="header-top">
    <div id="desktop-header-container" class="container">
      <div class="row align-items-center justify-content-between m-0">
        <div id="_desktop_header_logo" class="logowrap d-none d-md-block">
          <div id="header_logo">
            <a href="{$urls.base_url}">
              <img class="logo img-fluid" src="{$shop.logo}" alt="{$shop.name}">
            </a>
          </div>
        </div>
        {widget name="tdsearchblock"}
        <div class="right_content d-inline-flex hidden-md-down">
          {hook h='displayTop'}
        </div>
      </div>
    </div>
  </div>
  <div class="nav-full-width">
    <div class="container bit-megamenu-container">{hook h='displayMegamenu'}</div>
    <div class="container">
      {hook h='displayNavFullWidth'}
    </div>
  </div>
{/block}
