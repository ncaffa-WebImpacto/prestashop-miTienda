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
<div class="images-container">
  {block name='product_cover'}
    <div class="product-cover">
      {block name='product_flags'}
        {include file='catalog/_partials/product-flags.tpl'}
      {/block}
      <div class="js-product-cover-images row" data-count="{$product.images|count}">
        <div class="product-img product-img-0 col-xs-12 col-sm-6">
          {* {assign var=paddingbottom value=100}
          {if $product.cover}
            {math assign="paddingbottom" equation='((x/y)*z)' x=($product.cover.bySize.medium_default.height) y=($product.cover.bySize.medium_default.width) z=100 format="%.3f"}
          {/if} *}
          <div class="position-relative">
            {* <div class="rc" style="padding-top:{$paddingbottom}%"> *}
            <div class="">
              {if $product.cover}
                <div class="easyzoom">
                  <a href="javascript:void(0)" data-image="{$product.cover.bySize.large_default.url}" title="{$product.cover.legend}">
                    <img
                      class="img-fluid lazyload"
                      srcset="{$product.cover.bySize.medium_default.url} 452w,
                        {$product.cover.bySize.pdt_180.url} 180w,
                        {$product.cover.bySize.pdt_370.url} 370w,
                        {$product.cover.bySize.pdt_540.url} 540w,
                        {$product.cover.bySize.pdt_771.url} 771w"
                      src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                      alt="{$product.cover.legend}"
                      title="{$product.cover.legend}"
                    />
                  </a>
                </div>
              {elseif isset($urls.no_picture_image)}
                <img
                  class="img-fluid lazyload"
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-src="{$urls.no_picture_image.bySize.large_default.url}"
                />
              {else}
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
              {/if}
              <noscript>
                <img class="img-fluid" src="{$product.cover.bySize.medium_default.url}" alt="{$product.cover.legend}">
              </noscript>
            </div>
            <a class="layer" href="{$product.cover.bySize.large_default.url}">
              <i class="material-icons">fullscreen</i>
            </a>
            {if $themeOpt.pp_layout == 8 || $themeOpt.pp_layout == 9}
              {block name="after_product_cover"}
                <div class="product-extra-content">
                  {hook h='displayAfterProductCover' product=$product}
                </div>
              {/block}
            {/if}
          </div>
        </div>

        {assign var=item value=1}
        {foreach from=$product.images item=image name="images"}
          {if $image.id_image != $product.cover.id_image}
            <div class="product-img product-img-{$item} col-xs-12 col-sm-6">
              <div class="position-relative">
                {* <div class="rc" style="padding-top:{$paddingbottom}%"> *}
                <div class="">
                  <div class="easyzoom">
                    <a href="javascript:void(0)" data-image="{$image.bySize.large_default.url}" title="{$image.legend}">
                      <img
                        class="img-fluid lazyload"
                        {if !$smarty.foreach.images.first && !$product.cover}data-sizes="auto"{/if}
                        {if !$smarty.foreach.images.first && !$product.cover}data-{/if}srcset="{$image.bySize.medium_default.url} 452w,
                          {$image.bySize.pdt_180.url} 180w,
                          {$image.bySize.pdt_370.url} 370w,
                          {$image.bySize.pdt_540.url} 540w,
                          {$image.bySize.pdt_771.url} 771w"
                        {if !$smarty.foreach.images.first && !$product.cover}data-{/if}src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        alt="{$image.legend}"
                        title="{$image.legend}"
                      />
                    </a>
                  </div>
                  <noscript>
                    <img class="img-fluid" src="{$image.bySize.medium_default.url}" alt="{$image.legend}">
                  </noscript>
                </div>
                <a class="layer" href="{$image.bySize.large_default.url}">
                  <i class="material-icons">fullscreen</i>
                </a>
              </div>
            </div>
            {assign var=item value=$item+1}
          {/if}
        {/foreach}
      </div>
      {if $themeOpt.pp_layout == 1 || $themeOpt.pp_layout == 2 || $themeOpt.pp_layout == 3 || $themeOpt.pp_layout == 4 || $themeOpt.pp_layout == 5 || $themeOpt.pp_layout == 6 || $themeOpt.pp_layout == 7}
        {block name="after_product_cover"}
          <div class="product-extra-content">
            {* <div class="product-video">
              <a class="video" href="#threesixty-img-container-1">
                <svg width="30px" height="30px" fill="currentcolor">
                  <use xlink:href="#ppvideo"></use>
                </svg>
              </a>
            </div> *}
            {hook h='displayAfterProductCover' product=$product}
          </div>
        {/block}
      {/if}
    </div>
  {/block}

  {block name='product_images'}
    <div class="product-thumbs-outer">
      <div class="product-thumbs js-thumb-product-images" data-count="{$product.images|count}">
        <div class="product-thumb product-thumb-0 slick-active">
          {* <div class="rc" style="padding-top:{$paddingbottom}%"> *}
          <div class="">
            <img
              class="thumb js-thumb lazyload img-fluid"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
              data-src="{$product.cover.bySize.home_default.url}"
              alt="{$product.cover.legend}"
              title="{$product.cover.legend}"
            />
          </div>
        </div>
        {assign var=item value=1}
        {foreach from=$product.images item=image}
          {if $image.id_image != $product.cover.id_image}
            <div class="product-thumb product-thumb-{$item}">
              {* <div class="rc" style="padding-top:{$paddingbottom}%"> *}
              <div class="">
                <img
                  class="thumb js-thumb lazyload img-fluid"
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-src="{$image.bySize.home_default.url}"
                  alt="{$image.legend}"
                  title="{$image.legend}"
                />
              </div>
            </div>
            {assign var=item value=$item+1}
          {/if}
        {/foreach}
      </div>
    </div>
  {/block}
</div>
{hook h='displayAfterProductThumbs'}
