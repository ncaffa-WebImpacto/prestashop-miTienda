{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @copyright 2007-2017 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div class="product-container">
    <div class="thumbnail-container">
        <div class ="thumbnail-inner">
            {block name='product_thumbnail'}
                {include file='catalog/_partials/miniatures/_partials/product-miniature-thumb.tpl'}
            {/block}
            
            {block name='product_list_functional_buttons'}
                <div class="button-container">
                    {hook h='displayProductListFunctionalButtons' product=$product}
                    {include file='catalog/_partials/miniatures/_partials/product-miniature-quickview.tpl' product=$product}
                    {include file='catalog/_partials/miniatures/_partials/product-miniature-btn.tpl'}
                </div>
            {/block}
            
            {include file='catalog/_partials/countdown.tpl' product=$product}
            
            {block name='product_variants'}
                {if $product.main_variants}
                    <div class="products-variants">
                        {if $product.main_variants}
                            {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
                        {/if}
                    </div>
                {/if}
            {/block}
        </div>
    </div>
    <div class="product-description">
        {block name='product_name'}
            {include file='catalog/_partials/miniatures/_partials/product-miniature-name.tpl'}
        {/block}

        {block name='product_price_and_shipping'}
            {include file='catalog/_partials/miniatures/_partials/product-miniature-price.tpl'}
        {/block}

        {block name='product_reviews'}
            {hook h='displayProductListReviews' product=$product}
        {/block}
    </div>
</div>