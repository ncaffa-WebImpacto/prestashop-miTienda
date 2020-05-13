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
<!doctype html>
<html lang="{$language.iso_code}">

  <head>
    {block name='head'}
      {include file='_partials/head.tpl'}
    {/block}
  </head>

  <body id="{$page.page_name}" class="{$page.body_classes|classnames}{if isset($themeOpt.g_layout) && $themeOpt.g_layout == 'boxed'} boxed{/if}">
    {block name='hook_after_body_opening_tag'}
      {hook h='displayAfterBodyOpeningTag'}
    {/block}

    {block name='svg_icons'}
      {include file="_partials/_partials/svg-icons.tpl"}
    {/block}

    <main id="page" class="site-wrapper">
      <header id="header"{if isset($themeOpt.h_sticky) && $themeOpt.h_sticky == "1"} class="sticky-header"{/if}>
        {block name='header'}
          {include file='checkout/_partials/header.tpl'}
        {/block}
      </header>

      {block name='breadcrumb'}
        {include file='_partials/breadcrumb.tpl'}
      {/block}

      {block name='notifications'}
        {include file='_partials/notifications.tpl'}
      {/block}

      <section id="wrapper">
        {hook h="displayWrapperTop"}

        {block name='content'}
          <div class="container">
            <div class="row">
              <div id="js-checkout-process" class="col-md-8 accordion mb-4">
                {block name='checkout_process'}
                  {render file='checkout/checkout-process.tpl' ui=$checkout_process}
                {/block}
              </div>
              <div class="col-md-4 order-checkout">

                {block name='cart_summary'}
                  {include file='checkout/_partials/cart-summary.tpl' cart = $cart}
                {/block}

                {hook h='displayReassurance'}
              </div>
            </div>
          </div>
        {/block}
        {hook h="displayWrapperBottom"}
      </section>

      <footer id="footer">
        {block name='footer'}
          {include file='checkout/_partials/footer.tpl'}
        {/block}
      </footer>
    </main>

    {block name='backtotop'}
      {include file="_partials/_partials/back-to-top.tpl"}
    {/block}

    {block name='preloader'}
      {include file="_partials/_partials/preloader.tpl"}
    {/block}

    {block name='offcanvas_madals'}
      {include file="_partials/_partials/offcanvas-modal.tpl"}
    {/block}
    
    {block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}

    {block name='hook_before_body_closing_tag'}
      {hook h='displayBeforeBodyClosingTag'}
    {/block}

  </body>

</html>
