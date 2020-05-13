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
{* <div class="footer-container-before">
  <div class="container">
    <div class="row">
      {block name='hook_footer_before'}
        {hook h='displayFooterBefore'}
      {/block}
    </div>
  </div>
</div> *}
<div class="footer-container">
  <div class="container">
    <div class="row">
      {block name='conatct-info'}
        {include file='_partials/_partials/contact-info.tpl'}
      {/block}
      {block name='hook_footer'}
        {hook h='displayFooter'}
      {/block}
      {widget_block name="ps_emailsubscription"}
        {include 'module:ps_emailsubscription/views/templates/hook/ps_emailsubscription-footer-two.tpl'}
      {/widget_block}
    </div>
    <div class="footer-container-after">
      <div class="container">
        <div class="row">
          {block name='hook_footer_after'}
            {hook h='displayFooterAfter'}
          {/block}
          {widget_block name="ps_socialfollow"}
            {include 'module:ps_socialfollow/ps_socialfollow.tpl'}
          {/widget_block}
        </div>
      </div>
    </div>
  </div>
</div>
{if $themeOpt.fc_status}
  {block name='footer_copyrights'}
    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          {if isset($themeOpt.fc_sys_img) && $themeOpt.fc_sys_img}
          <div class="{if isset($themeOpt.fc_copyright) && $themeOpt.fc_copyright}col-12 col-md-4{else}col{/if} system-logo text-md-left text-center">
            <img src="{$themeOpt.fc_sys_img}" class="img-fluid" alt="{l s='System Logo' d='Shop.ThemeDelights'}"/>
          </div>
        {/if}

        {if isset($themeOpt.fc_copyright) && $themeOpt.fc_copyright}
          <div class="{if isset($themeOpt.fc_img) && $themeOpt.fc_img}col-12 col-md-4{else}col{/if} rte-content copyright-txt text-center">
            {$themeOpt.fc_copyright nofilter}
          </div>
        {/if}

        {if isset($themeOpt.fc_img) && $themeOpt.fc_img}
          <div class="{if isset($themeOpt.fc_copyright) && $themeOpt.fc_copyright}col-12 col-md-4{else}col{/if} payment-logo text-md-right text-center">
            <img src="{$themeOpt.fc_img}" class="img-fluid" alt="{l s='Payments Logo' d='Shop.ThemeDelights'}"/>
          </div>
        {/if}
        </div>
      </div>
    </div>
  {/block}
{/if}

{literal}
<style>
  .custom-file-label::after{
    content:"{/literal}{l s='Choose file' d='Shop.Theme.Actions'}"{literal}
  }
</style>
{/literal}