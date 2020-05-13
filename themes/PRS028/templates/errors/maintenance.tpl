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
{extends file='layouts/layout-error.tpl'}

{block name='stylesheets' append}
  <script src="https://use.fontawesome.com/f26ca72beb.js"></script>
{/block}

{block name='head_seo_title'}{l s='Coming Soon' d='Shop.Theme.Global'} - {$shop.name}{/block}

{block name='body_tag'}
<body id="maintenance">
{/block}

{block name='layout_error_tag'}
  <div>
{/block}
{block name='content'}
  <section id="main" class="maintenance">
    {block name='page_header_container'}
    {/block}
    {block name='page_content_container'}
      <section id="content" class="page-content page-maintenance">
        {block name='page_header_logo'}
          <div class="logo">
            <img src="{if isset($themeOpt.mt_logo) && $themeOpt.mt_logo != ''}{$themeOpt.mt_logo}{else}{$shop.logo}{/if}" alt="logo" class="img-fluid">
          </div>
        {/block}
        {block name='page_header'}
          <h1>{block name='page_title'}{l s='We\'ll be back soon.' d='Shop.Theme.Global'}{/block}</h1>
        {/block}
        {block name='page_content'}
          {$maintenance_text nofilter}
        {/block}
        {if $themeOpt.mt_countdown == 1}
          {if isset($themeOpt.mt_date) && $themeOpt.mt_date != ''}
            <div class="tdcountdown" data-time="{$themeOpt.mt_date}" data-days="{l s='Days' d='Shop.Theme.Global'}" data-hours="{l s='Hours' d='Shop.Theme.Global'}" data-minutes="{l s='Minutes' d='Shop.Theme.Global'}" data-seconds="{l s='Seconds' d='Shop.Theme.Global'}">
            </div>
          {/if}
        {/if}
        {if $themeOpt.mt_newsletter == 1}
          {widget_block name="ps_emailsubscription"}
            {include 'module:ps_emailsubscription/views/templates/hook/ps_emailsubscription_maintenance.tpl'}
          {/widget_block}
        {/if}
        {if $themeOpt.mt_social == 1}
          {widget_block name="ps_socialfollow"}
            {include 'module:ps_socialfollow/ps_socialfollow_maintenance.tpl'}
          {/widget_block}
        {/if}
        {block name='hook_maintenance'}
          {$HOOK_MAINTENANCE nofilter}
        {/block}
      </section>
    {/block}

    {block name='page_footer_container'}
    {/block}
  </section>
{/block}

{block name='maintenance_js'}
  <script
  src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
  integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="{$tdThemeMaintenanceJs}"></script>
{/block}
