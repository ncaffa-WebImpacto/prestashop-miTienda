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
<section class="product-category products_block clearfix">
  <div class="products_block_inner">
    <p class="products-section-title">
      {if $products|@count == 1}
        {l s='%s other product in the same category:' sprintf=[$products|@count] d='Shop.Theme.Catalog'}
      {else}
        {l s='%s other products in the same category:' sprintf=[$products|@count] d='Shop.Theme.Catalog'}
      {/if}
    </p>

    <div class="block_content products row">
      <div class="owl-carousel owl-arrows-inside owl-dots-outside" data-owl-carousel='{ "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": "5000", "responsive":{ "0":{ "items": 1 }, "544":{ "items": 2 }, "768":{ "items": 3 }, "992":{ "items": 3 }, "1200":{ "items": 4 } } }'>
        {foreach from=$products item="product"}
          {block name='product_miniature'}
            {include file='catalog/_partials/miniatures/product.tpl' product=$product}
          {/block}
        {/foreach}
      </div>
    </div>
  </div>
</section>
