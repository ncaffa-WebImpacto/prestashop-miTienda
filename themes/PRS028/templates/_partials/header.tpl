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

{block name='header_desktop'}
  <div id="desktop-header" class="header-style-{$themeOpt.h_layout} hidden-md-down">
    {if $themeOpt.h_layout == 1}
      {include file='_partials/_partials/header-1.tpl'}
    {elseif $themeOpt.h_layout == 2}
      {include file='_partials/_partials/header-2.tpl'}
    {/if}
  </div>
{/block}

{block name='mobile_desktop'}
  <div id="desktop-mobile-header" class="header-style-{$themeOpt.res_h_layout} hidden-lg-up">
    {if $themeOpt.res_h_layout == 1}
      {include file='_partials/_partials/mobile-header-1.tpl'}
    {elseif $themeOpt.res_h_layout == 2}
      {include file='_partials/_partials/mobile-header-2.tpl'}
    {/if}
  </div>
{/block}