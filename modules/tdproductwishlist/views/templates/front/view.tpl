{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file='page.tpl'}

{block name='content'}
	<section id="main">
		<div id="view_wishlist">
			{if isset($current_wishlist)}
				<h2>{l s='Wishlist' mod='tdproductwishlist'} "{$current_wishlist.name}"</h2>
				{if $wishlists}
					<p>
						{l s='Other wishlists of ' mod='tdproductwishlist'}{$current_wishlist.firstname} {$current_wishlist.lastname} :
						{foreach from=$wishlists item=wishlist_item name=i}
							<a href="{$view_wishlist_url}{if $is_rewrite_active}?{else}&{/if}token={$wishlist_item.token}" title="{$wishlist_item.name}" rel="nofollow">{$wishlist_item.name}</a>
							{if !$smarty.foreach.i.last}
								/
							{/if}
						{/foreach}
					</p>
				{/if}
				<section id="products">
					<div class="wishlist-products products row">
						{if $products && count($products) >0}
							{foreach from=$products item=product_item name=for_products}
								{assign var='product' value=$product_item.product_info}
								{assign var='wishlist' value=$product_item.wishlist_info}
								<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 product-miniature js-product-miniature td-wishlistproduct-item td-wishlistproduct-item-{$wishlist.id_wishlist_product} product-{$product.id_product}" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
									<div class="product-container">
										<div class="thumbnail-container clearfix">
											<div class="thumbnail-inner">
												{block name='product_thumbnail'}
													<a href="{$product.url}" target="_blank" class="thumbnail product-thumbnail">
														<img class="img-fluid"
														src = "{$product.cover.bySize.home_default.url}"
														alt = "{$product.cover.legend}"
														data-full-size-image-url = "{$product.cover.large.url}"
														>
													</a>
												{/block}
											</div>
											<div class="product-description">
												{block name='product_name'}
													<div class="product-title" itemprop="name"><a href="{$product.url}" target="_blank">{$product.name|truncate:30:'...'}</a></div>
												{/block}

												{block name='product_price_and_shipping'}
													{if $product.show_price}
														<div class="product-price-and-shipping">
															{if $product.has_discount}
																{hook h='displayProductPriceBlock' product=$product type="old_price"}

																<span class="sr-only">{l s='Regular price' d='Shop.Theme.Catalog'}</span>
																<span class="regular-price">{$product.regular_price}</span>
															{/if}

															{hook h='displayProductPriceBlock' product=$product type="before_price"}

															<span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
															<span itemprop="price" class="price">{$product.price}</span>

															{hook h='displayProductPriceBlock' product=$product type='unit_price'}

															{hook h='displayProductPriceBlock' product=$product type='weight'}
														</div>
													{/if}
												{/block}

												<div class="wishlist-product-info">
													<div class="form-group">
														<label>
															<strong>{l s='Priority' mod='tdproductwishlist'}: </strong>
															{if $wishlist.priority == 0}{l s='High' mod='tdproductwishlist'}{/if}
															{if $wishlist.priority == 1}{l s='Medium' mod='tdproductwishlist'}{/if}
															{if $wishlist.priority == 2}{l s='Low' mod='tdproductwishlist'}{/if}
														</label>
													</div>
													<input class="form-control wishlist-product-quantity wishlist-product-quantity-{$wishlist.id_wishlist_product}" type="number" data-min="1" value="{$wishlist.quantity}">
												</div>
											</div>
										</div>
									</div>
								</div>
							{/foreach}
						{else}
							<div class="col-xl-12"><div class="alert alert-warning">{l s='No products' mod='tdproductwishlist'}</div></div>
						{/if}
					</div>
				</section>
			{else}
				<div class="alert alert-warning col-xl-12">{l s='Wishlist does not exist' mod='tdproductwishlist'}</div>
			{/if}
		</div>
	</section>
{/block}
