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

{if isset($themeOpt.pl_grid_cart_btn) && $themeOpt.pl_grid_cart_btn == "1"}
	{if !$configuration.is_catalog}
		<div class="product-add-to-cart">
			{if isset($product.customizable) && $product.customizable > 0}
				<a href="{$product.url}" class="btn btn-primary customize tip_inside">
					<svg width="18px" height="18px" fill="currentcolor">
		         	   <use xlink:href="#tdsbtncustomize"></use>
		         	</svg>
					{* <i class="material-icons">settings</i> *}
					<span class="tip">{l s='Customize' d='Shop.Theme.Catalog'}</span>
				</a>
			{elseif isset($product.id_product_attribute) && $product.id_product_attribute > 0}
				<a href="#" data-link-action="quickview" class="btn btn-primary select quick-view tip_inside">
					<svg width="18px" height="18px" fill="currentcolor">
						<use xlink:href="#tdsbtnselect"></use>
					</svg>
					{* <i class="material-icons">play_for_work</i> *}
					<span class="tip">{l s='Select Option' d='Shop.Theme.Catalog'}</span>
				</a>
			{else}
				<form action="{$urls.pages.cart}" method="post" class="td-add-to-cart-or-refresh">
					<div class="product-quantity">
						{if ($product.quantity > 0 && $product.quantity >= $product.minimal_quantity) || $product.allow_oosp == 1}
							<input type="hidden" name="token" value="{$static_token}">
							<input type="hidden" name="id_product" value="{$product.id_product}">
							<input type="hidden" name="qty" value="{$product.minimal_quantity}" />
							<input type="hidden" name="id_customization" value="0">
							<button class="btn btn-primary ajax_add_to_cart_button add-to-cart tip_inside" data-button-action="add-to-cart">
								{* <i class="material-icons">shopping_cart</i> *}
								<svg width="18px" height="18px" fill="currentcolor">
					         	   <use xlink:href="#tdsbtncart"></use>
					         	</svg>
								<span class="tip">{l s='Add to cart' d='Shop.Theme.Catalog'}</span>
							</button>
						{else}
							<button class="btn btn-primary ajax_add_to_cart_button add-to-cart tip_inside" disabled>
								{* <i class="material-icons">shopping_cart</i> *}
								<svg width="18px" height="18px" fill="currentcolor">
					         	   <use xlink:href="#tdsbtncart"></use>
					         	</svg>
								<span class="tip">{l s='Out of stock' d='Shop.Theme.Catalog'}</span>
							</button>
						{/if}
					</div>
				</form>
			{/if}
		</div>
	{/if}
{/if}
