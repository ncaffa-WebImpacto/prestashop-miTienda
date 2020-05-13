{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<div class="wishlist">
	{if isset($wishlists) && count($wishlists) > 1}
		<div class="dropdown td-wishlist-button-dropdown">
			<a class="td-wishlist-button tip_inside dropdown-toggle show-list btn-product{if $added_wishlist} added{/if}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id-wishlist="{$id_wishlist}" data-id-product="{$wishlist_id_product}" data-id-product-attribute="{$wishlist_id_product_attribute}" data-display="static">
				<svg width="18px" height="18px" fill="currentcolor">
					<use xlink:href="#tdswishlist">
					</use>
				</svg>
				<span>{l s='Wishlist' mod='tdproductwishlist'}</span>
				<span class ="tip">{l s='Select Wishlist' mod='tdproductwishlist'}</span>
			</a>
		  <div class="dropdown-menu td-list-wishlist td-list-wishlist-{$wishlist_id_product}">
			{foreach from=$wishlists item=wishlists_item}
				<a href="javascript:void(0)" class="dropdown-item list-group-item list-group-item-action wishlist-item tip_inside{if in_array($wishlists_item.id_wishlist, $wishlists_added)} added {/if}" data-id-wishlist="{$wishlists_item.id_wishlist}" data-id-product="{$wishlist_id_product}" data-id-product-attribute="{$wishlist_id_product_attribute}">
					{$wishlists_item.name}
					<span class ="tip">{if in_array($wishlists_item.id_wishlist, $wishlists_added)}{l s='Remove from Wishlist' mod='tdproductwishlist'}{else}{l s='Add to Wishlist' mod='tdproductwishlist'}{/if}</span>
				</a>
			{/foreach}
		  </div>
		</div>
	{else}
		<a class="td-wishlist-button tip_inside{if $added_wishlist} added{/if}" href="javascript:void(0)" data-id-wishlist="{$id_wishlist}" data-id-product="{$wishlist_id_product}" data-id-product-attribute="{$wishlist_id_product_attribute}">
			<svg width="18px" height="18px" fill="currentcolor">
				<use xlink:href="#tdswishlist">
				</use>
			</svg>
			<span>{l s='Wishlist' mod='tdproductwishlist'}</span>
			<span class ="tip">{if $added_wishlist}{l s='Remove from Wishlist' mod='tdproductwishlist'}{else}{l s='Add to Wishlist' mod='tdproductwishlist'}{/if}</span>
		</a>
	{/if}
</div>
