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
<div class="js-product-images-modal">
    {block name='product_reference'}
        {if isset($product.reference_to_display) && $product.reference_to_display neq ''}
            <div class="product-reference">
                <label class="label">{l s='SKU' d='Shop.Theme.Catalog'}:</label>
                <span>{$product.reference_to_display}</span>
            </div>
        {/if}
    {/block}

    {block name='product_quantities'}
        {if $product.show_quantities}
            <div class="product-quantities">
                <label class="label">{l s='In stock' d='Shop.Theme.Catalog'}:</label>
                <span data-stock="{$product.quantity}" data-allow-oosp="{$product.allow_oosp}">{$product.quantity} {$product.quantity_label}</span>
            </div>
        {/if}
    {/block}

    {block name='product_brands'}
        {if $product.id_manufacturer}
            <div class="product-brand">
                <label class="label">{l s='Brand' d='Shop.Theme.Catalog'}:</label>
                <a href="{$link->getManufacturerLink($product.id_manufacturer)}">{$product_manufacturer->name}</a>
            </div>
        {/if}
    {/block}

    {block name='product_condition'}
        {if $product.condition}
        <div class="product-condition">
            <label class="label">{l s='Condition' d='Shop.Theme.Catalog'}:</label>
            <span>{$product.condition.label}</span>
        </div>
        {/if}
    {/block}
</div><!-- /.modal -->
