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

<div class="product-container">
    <div class="row">
        <div class="thumbnail-container col-12 col-sm-5 col-lg-6">
            <div class ="thumbnail-inner">
                {block name='product_thumbnail'}
                    {include file='catalog/_partials/miniatures/_partials/product-miniature-thumb.tpl'}
                {/block}
            </div>
        </div>

        <div class="product-description col-12 col-sm-7 col-lg-6">
            {block name='product_name'}
                {include file='catalog/_partials/miniatures/_partials/product-miniature-name.tpl'}
            {/block}

            {block name='product_price_and_shipping'}
                {include file='catalog/_partials/miniatures/_partials/product-miniature-price.tpl'}
            {/block}
            
            {block name='product_reviews'}
                {hook h='displayProductListReviews' product=$product}
            {/block}

            {block name='product_description_short'}
                <div class="product-description">
                    {$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}
                </div>
            {/block}
            
             {if isset($product.specific_prices.to) && ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' < $product.specific_prices.to|date_format:'%Y-%m-%d %H:%M:%S' )}
                <div class="bitdeal">
                    <div class="tdcountdown" data-date="{$product.specific_prices.to|date_format:'%Y/%m/%d %H:%M:%S'}">
                        <div class="days_container">
                            <span class="number days">0</span>
                            <span class="days_text text">{l s='Days' d='Shop.Theme.Catalog'}</span>
                        </div>
                        <div class="hours_container">
                            <span class="number hours">0</span>
                            <span class="hours_text text">{l s='Hours' d='Shop.Theme.Catalog'}</span>
                        </div>
                        <div class="minutes_container">
                            <span class="number minutes">0</span>
                            <span class="minutes_text text">{l s='Mins' d='Shop.Theme.Catalog'}</span>
                        </div>
                        <div class="seconds_container">
                            <span class="number seconds">0</span>
                            <span class="seconds_text text">{l s='Secs' d='Shop.Theme.Catalog'}</span>
                        </div>
                    </div>
                </div>
            {/if}
        </div>
    </div>
</div>