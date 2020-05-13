{**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<div class="cbp-products-big row ">
    {foreach from=$products item=product name=homeFeaturedProducts}
        <div class="product-grid-menu col-{$perline}">
            <div class="product-container">
                <div class="product-image-container position-relative mb-3">
                    <ul class="product-flags">
                        {foreach from=$product.flags item=flag}
                            <li class="product-flag {$flag.type}">{$flag.label}</li>
                        {/foreach}
                    </ul>
                    <a class="product_img_link" href="{$product.url}" title="{$product.name}">
                        <img class="img-fluid"
                             src="{$product.cover.bySize.home_default.url}"
                             alt="{if !empty($product.legend)}{$product.legend}{else}{$product.name}{/if}"
                            {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if} />
                    </a>
                </div>
                <h6 class="product-title">
                    <a href="{$product.url}">{$product.name|truncate:100:'...'}</a>
                </h6>
                <div class="product-price-and-shipping" >
                    <span class="product-price">{$product.price}</span>
                    {if $product.has_discount}
                        {hook h='displayProductPriceBlock' product=$product type="old_price"}
                        <span class="regular-price text-muted">{$product.regular_price}</span>
                    {/if}
                </div>
            </div>
        </div>
    {/foreach}
</div>
