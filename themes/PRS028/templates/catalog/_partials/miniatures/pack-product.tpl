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
{block name='pack_miniature_item'}
  <article class="pack-miniature-item">
    <div class="card">
      <div class="pack-product-container">
        <div class="thumb-mask">
          <div class="mask">
            {* {assign var=paddingbottom value=100}
            {if $product.cover}
              {math assign="paddingbottom" equation='((x/y)*z)' x=($product.cover.small.height) y=($product.cover.small.width) z=100 format="%.3f"}
            {/if}
            <a href="{$product.url}" title="{$product.name}" class="rc d-block" style="padding-top:{$paddingbottom}%"> *}
            <a href="{$product.url}" title="{$product.name}" class="d-block">
              {if $product.cover}
                <img
                  class="lazyload pack-product__img"
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-src="{$product.cover.small.url}"
                  alt="{$product.cover.legend}"
                />
              {else}
                <img
                  class="lazyload pack-product__img"
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-src="{$urls.no_picture_image.bySize.small_default.url}"
                  alt="{$product.cover.legend}"
                />
              {/if}
            </a>
          </div>
        </div>
        <div class="pack-product-name">
          <a href="{$product.url}" title="{$product.name}">
            {$product.name}
          </a>
        </div>
        <div class="pack-product-price">
          <strong>{$product.price}</strong>
        </div>
        <div class="pack-product-quantity">
          <span>x {$product.pack_quantity}</span>
        </div>
      </div>
    </div>
  </article>
{/block}
