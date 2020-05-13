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
<div id="quickview-modal-{$product.id}-{$product.id_product_attribute}" class="modal fade quickview" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       {* <h1 class="modal-title">{$product.name}</h1> *}
        <button type="button" class="close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Global'}">
          <span aria-hidden="true"><i class="material-icons">close</i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-5 col-md-6 col-sm-12">
            {block name='product_cover_thumbnails'}
              <div class="js-cover-singlecarousel">
              {include file='catalog/_partials/product-cover-thumbnails.tpl'}
              </div>
            {/block}
          </div>
          <div class="col-lg-7 col-md-6 col-sm-12 right-block">
            <div class="qv-innner">
              {block name='page_header_container'}
                {block name='page_header'}
                  <div class="product-action-wrap">
                    <h2 class="product_title h1">{block name='page_title'}{$product.name}{/block}</h2>
                  </div>
                {/block}
              {/block}

              <div class="product-information">
                {block name='product_comment'}
                  {capture name='displayTdProductExtra'}{hook h='displayTdProductExtra'}{/capture}
                  {if $smarty.capture.displayTdProductExtra}
                    {$smarty.capture.displayTdProductExtra nofilter}
                  {/if}
                {/block}

                {block name='product_description_short'}
                  <div id="product-description-short">{$product.description_short nofilter}</div>
                {/block}

                {block name='product_buy'}
                  <div class="product-actions">
                    <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                      <input type="hidden" name="token" value="{$static_token}">
                      <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                      <input type="hidden" name="id_customization" value="{$product.id_customization}" id="product_customization_id">
                      {block name='product_prices'}
                        {include file='catalog/_partials/product-prices.tpl'}
                      {/block}

                      {block name='product_variants'}
                        {include file='catalog/_partials/product-variants.tpl'}
                      {/block}

                      {block name='product_add_to_cart'}
                        {include file='catalog/_partials/product-add-to-cart.tpl'}
                      {/block}

                      {block name='product_payment_logo'}
                        {include file='catalog/_partials/product-payment-logo.tpl'}
                      {/block}
                      
                      {block name='product_additional_info'}
                        {include file='catalog/_partials/product-additional-info.tpl'}
                      {/block}

                      {block name='product_refresh'}
                          {if !isset($product.product_url)}
                          <input class="product-refresh" data-url-update="false" name="refresh" type="submit" value="{l s='Refresh' d='Shop.Theme.Actions'}" hidden>
                          {/if}
                      {/block}
                    </form>
                  </div>
                {/block}
              </div>
            </div>
          </div>
        </div>
      </div>
      {* <div class="modal-footer">
        {hook h='displayProductAdditionalInfo' product=$product}
      </div> *}
    </div>
  </div>
</div>
