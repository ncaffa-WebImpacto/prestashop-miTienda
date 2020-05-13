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
<div id="_desktop_cart">
  <div class="blockcart cart-preview" data-refresh-url="{$refresh_url}">
    <div class="cart-overlay"></div>
    <a data-toggle="dropdown" class="shoppingcart" data-display="static" aria-haspopup="false">
      <i class="icofont-cart-alt"></i>
      <span class="cart-products-count"> {$cart.products_count} </span>
      {* <i class="material-icons">shopping_cart</i> *}
    </a>
    <ul class="dropdown-menu d-none"></ul>
    <div class="cart_block block exclusive">
      <div class="block_content">
        <div class="cart-header">
          <a id="cart-close" href="javascript:void(0);"><i class="material-icons">close</i></a>
          <span class="cart-title">{l s='Your Cart' d='Shop.Theme.Checkout'}</span>
        </div>
        <div class="cart-body">
          {if $cart.products_count > 0}
            {if $cart.products}
              <div class="products">
                {foreach from=$cart.products item='product' name='myLoop'}
                {assign var='productId' value=$product.id_product}
                {assign var='productAttributeId' value=$product.id_product_attribute}
                <div class="product">
                  <span class="remove_link">
                    <a class="remove-from-cart" rel="nofollow" href="{$product.remove_from_cart_url}" data-link-action="delete-from-cart" data-id-product="{$product.id_product|escape:'javascript'}" data-id-product-attribute="{$product.id_product_attribute|escape:'javascript'}" data-id-customization="{$product.id_customization|escape:'javascript'}" data-link-place="cart-preview">
                      {if !isset($product.is_gift) || !$product.is_gift}
                      <i class="material-icons">delete</i>
                      {/if}
                    </a>
                  </span>
                  <a class="cart-images" href="{$product.url}">
                    <img src="{$product.cover.bySize.cart_default.url}" alt="{$product.name|escape:'quotes'}">
                  </a>
                  <div class="cart-info">
                    <div class="product-name">
                      <a class="cart_block_product_name" href="{$product.url}">{$product.name}</a>
                    </div>
                    <div class="price">
                      <span class="quantity-formated text-muted">
                        <span class="quantity">{$product.cart_quantity}</span>
                        &nbsp;x&nbsp;
                      </span>
                      {$product.price}
                    </div>
                    {if isset($product.attributes)}
                    <div class="product-atributes text-muted">
                      {foreach from=$product.attributes key="attribute" item="value"}
                      <div class="atributes">
                        <span class="key">{$attribute}:</span>
                        <span class="value">{$value}</span>
                      </div>
                      {/foreach}
                    </div>
                    {/if}
                  </div>
                </div>
                {/foreach}
              </div>
            {/if}
          {else}
            <div class="cart_block_no_products{if $cart.products} unvisible{/if}">
              <svg width="80px" height="80px" fill="#333333">
                <use xlink:href="#emptycart"></use>
              </svg>
              <span class="cart-empty-message">{l s='Your cart is empty' d='Shop.Theme.Checkout'}</span>
            </div>
          {/if}
        </div>
        {if $cart.products}
          <div class="cart-footer">
            <div class="cart-prices">
              <div class="price subtotal">
                <span class="key">{$cart.subtotals.products.label}</span>
                <span class="value">{$cart.subtotals.products.value}</span>
              </div>
            </div>
            <div class="cart-buttons">
              <a href="{url entity=order}" class="btn btn-primary checkout">{l s='Checkout' d='Shop.Theme.Actions'}</a><a href="{$cart_url}" class="btn btn-secondary viewcart">{l s='View Cart' d='Shop.Theme.Actions'}</a>
            </div>
          </div>
        {/if}
      </div>
    </div>
  </div>
</div>