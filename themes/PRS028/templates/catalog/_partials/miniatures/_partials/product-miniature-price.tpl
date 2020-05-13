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

{if $product.show_price}
    <div class="product-price-and-shipping">
        {if $product.has_discount}
            {hook h='displayProductPriceBlock' product=$product type="old_price"}

            <span class="sr-only">{l s='Regular price' d='Shop.Theme.Catalog'}</span>
            <span class="regular-price">{$product.regular_price}</span>
        {/if}

        {hook h='displayProductPriceBlock' product=$product type="before_price"}

        <span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
        <span class="price">{$product.price}</span>


        {hook h='displayProductPriceBlock' product=$product type='unit_price'}

        {hook h='displayProductPriceBlock' product=$product type='weight'}
    </div>
{/if}
