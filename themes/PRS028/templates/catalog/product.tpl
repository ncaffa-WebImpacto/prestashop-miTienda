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
{extends file='layouts/layout-both-columns.tpl'}
{*layouts/layout-full-columns.tpl*}
{block name='head_seo' prepend}
  <link rel="canonical" href="{$product.canonical_url}">
{/block}

{if $themeOpt.pp_layout == 1}
  {block name="left_column"}
    <div id="left-column" class="left-column col-12 col-lg-3 order-2 order-lg-1">
      {hook h="displayVerticalMenu"}
      {hook h='displayLeftColumnProduct'}
    </div>
  {/block}
  {block name='right_column'}{/block}
  {block name='contentWrapperClass'}left-column col-12 col-lg-9 order-1 order-lg-2{/block}
{elseif $themeOpt.pp_layout == 2}
  {block name="left_column"}{/block}
  {block name='right_column'}
    <div id="right-column" class="right-column col-12 col-lg-3 order-2">
      {hook h='displayRightColumnProduct'}
    </div>
  {/block}
  {block name='contentWrapperClass'}right-column col-12 col-lg-9 order-1{/block}
{else}
  {block name='left_column'}{/block}
  {block name='right_column'}{/block}
  {block name='contentWrapperClass'}col-12{/block}
{/if}

{block name='content'}
  <section class="product-style-{$themeOpt.pp_layout}" id="main">
    <div class="row">
      <div class="product-images {if $themeOpt.pp_layout == 4 || $themeOpt.pp_layout == 5}col-12 col-md-7{elseif $themeOpt.pp_layout == 6}col-12{elseif $themeOpt.pp_layout == 8}col-12 col-md-6 col-lg-7 col-xl-8{else}col-12 col-md-6{/if}">
        {block name='page_content_container'}
          <section class="page-content--product" id="content">
            {block name='page_content'}
              {block name='product_cover_thumbnails'}
                {if $themeOpt.pp_layout != 8 && $themeOpt.pp_layout != 9}
                  <div class="{if $themeOpt.pp_layout == 1 || $themeOpt.pp_layout == 2 || $themeOpt.pp_layout == 3}js-cover-carousel{elseif $themeOpt.pp_layout == 4 || $themeOpt.pp_layout == 5}js-cover-vcarousel{elseif $themeOpt.pp_layout == 6}js-cover-multicarousel{elseif $themeOpt.pp_layout == 7}js-cover-singlecarousel{/if}">
                {/if}
                {include file='catalog/_partials/product-cover-thumbnails.tpl'}
                {if $themeOpt.pp_layout != 8 && $themeOpt.pp_layout != 9}
                  </div>
                {/if}
              {/block}
            {/block}
          </section>
        {/block}
      </div>
      <div class="product-infos {if $themeOpt.pp_layout == 4 || $themeOpt.pp_layout == 5}col-12 col-md-5{elseif $themeOpt.pp_layout == 6}col-12{elseif $themeOpt.pp_layout == 8}col-12 col-md-6 col-lg-5 col-xl-4{else}col-12 col-md-6{/if}">
        {block name='page_header_container'}
          <div class="product-action-wrap">
            {block name='page_header'}
              <h1 class="product_title h1">{block name='page_title'}{$product.name}{/block}</h1>
            {/block}
            {hook h='displayPrevNext'}
          </div>
        {/block}

        <div class="product-information">
          {block name='product_comment'}
            {capture name='displayTdProductExtra'}{hook h='displayTdProductExtra'}{/capture}
            {if $smarty.capture.displayTdProductExtra}
              {$smarty.capture.displayTdProductExtra nofilter}
            {/if}
          {/block}

          {block name='product_description_short'}
            <div id="product-description-short-{$product.id}" class="rte-content">{$product.description_short nofilter}</div>
          {/block}

          {block name='product_images_modal'}
            {include file='catalog/_partials/product-images-modal.tpl'}
          {/block}
          
          {if $product.is_customizable && count($product.customizations.fields)}
            {block name='product_customization'}
              {include file="catalog/_partials/product-customization.tpl" customizations=$product.customizations}
            {/block}
          {/if}

          {block name='product_extra_info'}
            
          {/block}

          <div class="product-actions">
            {block name='product_buy'}
              <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                <input type="hidden" name="token" value="{$static_token}">
                <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                <input type="hidden" name="id_customization" value="{$product.id_customization}" id="product_customization_id">
                
                {block name='product_discounts'}
                  {include file='catalog/_partials/product-discounts.tpl'}
                {/block}

                {block name='product_prices'}
                  {include file='catalog/_partials/product-prices.tpl'}
                {/block}

                {block name='product_deals'}
                  {include file='catalog/_partials/countdown.tpl'}
                {/block}

                {block name='product_variants'}
                  {include file='catalog/_partials/product-variants.tpl'}
                {/block}

                {block name='product_pack'}
                  {if $packItems}
                    <section class="product-pack mt-4">
                      <p class="h4">{l s='This pack contains' d='Shop.Theme.Catalog'}</p>
                      {foreach from=$packItems item="product_pack"}
                        {block name='product_miniature'}
                          {include file='catalog/_partials/miniatures/pack-product.tpl' product=$product_pack}
                        {/block}
                      {/foreach}
                  </section>
                  {/if}
                {/block}

                {block name='product_add_to_cart'}
                  {include file='catalog/_partials/product-add-to-cart.tpl'}
                {/block}        
                
                {block name='product_payment_logo'}
                  {include file='catalog/_partials/product-payment-logo.tpl'}
                {/block}

                {block name='product_meta'}
                  {include file='catalog/_partials/product-meta.tpl'}
                {/block}

                {block name='product_additional_info'}
                  {include file='catalog/_partials/product-additional-info.tpl'}
                {/block}

                {* Input to refresh product HTML removed, block kept for compatibility with themes *}
                {block name='product_refresh'}{/block}
              </form>
            {/block}
          </div>
          {block name='hook_display_reassurance'}
            {hook h='displayReassurance'}
          {/block}
        </div>
      </div>
    </div>
    {block name='product_tabs'}
      <div class="tabs product-tabs {$themeOpt.pp_tabs_style}-tabs">
        {if $themeOpt.pp_tabs_style == 'vertical' || $themeOpt.pp_tabs_style == 'horizontal'}
          <div class="box-nav-tab">
            <div class="dropdown-toggle-nav-tab hidden-lg-up"></div>
            <ul class="nav nav-tabs dropdown-menu-nav-tab" role="tablist">
              {if $product.description}
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#description"
                    role="tab"
                    aria-controls="description"
                    aria-selected="true">{l s='Description' d='Shop.Theme.Catalog'}</a>
                </li>
              {/if}
              <li class="nav-item">
                <a
                  class="nav-link{if !$product.description} active{/if}"
                  data-toggle="tab"
                  href="#product-details"
                  role="tab"
                  aria-controls="product-details"
                  {if !$product.description} aria-selected="true"{/if}>{l s='Product Details' d='Shop.Theme.Catalog'}</a>
              </li>
              {if $product.attachments}
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#attachments"
                    role="tab"
                    aria-controls="attachments">{l s='Attachments' d='Shop.Theme.Catalog'}</a>
                </li>
              {/if}
              {foreach from=$product.extraContent item=extra key=extraKey}
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#extra-{$extraKey}"
                    role="tab"
                    aria-controls="extra-{$extraKey}">{$extra.title}</a>
                </li>
              {/foreach}

              {block name='product_comment_tab'}
                {capture name='displayTdProductTab'}{hook h='displayTdProductTab'}{/capture}
                {if $smarty.capture.displayTdProductTab}
                  {$smarty.capture.displayTdProductTab nofilter}
                {/if}
              {/block}
            </ul>
          </div>
          <div class="tab-content" id="tab-content">
            {if $product.description}
              <div class="tab-pane active" id="description" role="tabpanel">
                {block name='product_description'}
                  <div class="product-description">
                    <div class="rte-content">
                      {$product.description nofilter}
                    </div>
                  </div>
                {/block}
              </div>
            {/if}

            {block name='product_details'}
              {include file='catalog/_partials/product-details.tpl'}
            {/block}

            {block name='product_attachments'}
              {if $product.attachments}
                <div class="tab-pane" id="attachments" role="tabpanel">
                  <section class="product-attachments">
                    {foreach from=$product.attachments item=attachment}
                      <div class="attachment">
                        <h3><a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">{$attachment.name}</a></h3>
                        <p class="">{$attachment.description}</p>
                        <a class="btn btn-primary" href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">
                          {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted})
                        </a>
                      </div>
                    {/foreach}
                  </section>
                </div>
              {/if}
            {/block}

            {foreach from=$product.extraContent item=extra key=extraKey}
              <div class="tab-pane {$extra.attr.class}" id="extra-{$extraKey}" role="tabpanel" {foreach $extra.attr as $key => $val} {$key}="{$val}"{/foreach}>
                {$extra.content nofilter}
              </div>
            {/foreach}

            {block name='product_comment_tab_content'}
              {capture name='displayTdProductTabContent'}{hook h='displayTdProductTabContent'}{/capture}
              {if $smarty.capture.displayTdProductTabContent}
                {$smarty.capture.displayTdProductTabContent nofilter}
              {/if}
            {/block}
          </div>
        {elseif $themeOpt.pp_tabs_style == 'accordion'}
          {if $product.description}
            <a
              class="accordion-tab-title active"
              data-toggle="collapse"
              href="#description"
              role="tab"
              aria-controls="description"
              aria-selected="true"
              aria-expanded="true">{l s='Description' d='Shop.Theme.Catalog'}
            </a>
          {/if} 
          {if $product.description}
            <div class="accordion-tab-description collapse show" id="description" role="tabpanel">
              {block name='product_description'}
                <div class="product-description">
                  <div class="rte-content">
                    {$product.description nofilter}
                  </div>
                </div>
              {/block}
            </div>
          {/if}

          <a
            class="accordion-tab-title {if !$product.description} active{/if}"
            data-toggle="collapse"
            href="#product-details"
            role="tab"
            aria-controls="product-details"
            {if !$product.description} aria-selected="true" aria-expanded="true"{/if}>{l s='Product Details' d='Shop.Theme.Catalog'}
          </a>
          {block name='product_details'}
            {include file='catalog/_partials/product-details.tpl'}
          {/block}
  
          {if $product.attachments}
            <a
              class="accordion-tab-title"
              data-toggle="collapse"
              href="#attachments"
              role="tab"
              aria-controls="attachments">{l s='Attachments' d='Shop.Theme.Catalog'}</a>
          {/if}
          {block name='product_attachments'}
            {if $product.attachments}
              <div class="accordion-tab-description  collapse" id="attachments" role="tabpanel">
                <section class="product-attachments">
                  {foreach from=$product.attachments item=attachment}
                    <div class="attachment">
                      <h4><a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">{$attachment.name}</a></h4>
                      <p class="small">{$attachment.description}</p>
                      <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">
                        {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted})
                      </a>
                    </div>
                  {/foreach}
                </section>
              </div>
            {/if}
          {/block} 
          
          {foreach from=$product.extraContent item=extra key=extraKey}
            <a
              class="accordion-tab-title"
              data-toggle="collapse"
              href="#extra-{$extraKey}"
              role="tab"
              aria-controls="extra-{$extraKey}">{$extra.title}
            </a>
            <div class="accordion-tab-description  collapse {$extra.attr.class}" id="extra-{$extraKey}" role="tabpanel" {foreach $extra.attr as $key => $val} {$key}="{$val}"{/foreach}>
              {$extra.content nofilter}
            </div>
          {/foreach}

          {block name='product_comment_tab'}
            {capture name='displayTdProductTab'}{hook h='displayTdProductTab'}{/capture}
            {if $smarty.capture.displayTdProductTab}
                {$smarty.capture.displayTdProductTab nofilter}
            {/if}
          {/block}
          {block name='product_comment_tab_content'}
            {capture name='displayTdProductTabContent'}{hook h='displayTdProductTabContent'}{/capture}
            {if $smarty.capture.displayTdProductTabContent}
              {$smarty.capture.displayTdProductTabContent nofilter}
            {/if}
          {/block}
        {/if}
      </div>
    {/block}

    {block name='product_accessories'}
      {if $accessories}
        <section class="product-accessories products_block clearfix">
          <div class="products_block_inner">
            <p class="products-section-title">{l s='You might also like' d='Shop.Theme.Catalog'}</p>
            <div class="block_content products row">
              <div class="owl-carousel owl-arrows-inside owl-dots-outside" data-owl-carousel='{ "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": "5000", "responsive":{ "0":{ "items": 1 }, "544":{ "items": 2 }, "768":{ "items": 3 }, "992":{ "items": 3 }, "1200":{ "items": 4 } } }'>
                {foreach from=$accessories item="product_accessory"}
                  {block name='product_miniature'}
                    {include file='catalog/_partials/miniatures/product.tpl' product=$product_accessory}
                  {/block}
                {/foreach}
              </div>
            </div>
          </div>
        </section>
      {/if}
    {/block}

    {block name='product_footer'}
      {hook h='displayFooterProduct' product=$product category=$category}
    {/block}

    {block name='page_footer_container'}
      <footer class="page-footer">{block name='page_footer'}{/block}</footer>
    {/block}
  </section>

{/block}
