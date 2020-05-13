{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file='page.tpl'}

{block name='breadcrumb_title'}
  <h1 class="breadcrumb-title">{l s='Your wishlists' mod='tdproductwishlist'}</h1>
{/block}

{block name='content'}
	<section id="main">
		<div id="mywishlist">
			<div class="page-header">
				<h1 class="h1 page-maintitle">{l s='Your wishlists' mod='tdproductwishlist'}</h1>
			</div>

			<div class="card card-block">
				<h2>{l s='New wishlist' mod='tdproductwishlist'}</h2>
				<div class="new-wishlist">
					<div class="form-group">
						<input type="text" class="form-control" id="wishlist_name" placeholder="{l s='Enter name of new wishlist' mod='tdproductwishlist'}">
					</div>
					<div class="form-group has-success">
						<div class="form-control-feedback"></div>
					</div>
					<div class="form-group has-danger">
						<div class="form-control-feedback"></div>
					</div>
					<button type="submit" class="btn btn-primary td-save-wishlist">
						<span>{l s='Save' mod='tdproductwishlist'}</span>
					</button>
				</div>
			</div>

			<div class="list-wishlist">
				<table class="table table-striped">
					<thead class="wishlist-table-head">
						<tr>
							<th>{l s='Name' mod='tdproductwishlist'}</th>
							<th>{l s='Quantity' mod='tdproductwishlist'}</th>
							<th>{l s='Viewed' mod='tdproductwishlist'}</th>
							<th class="wishlist-datecreate-head">{l s='Created' mod='tdproductwishlist'}</th>
							<th>{l s='Direct Link' mod='tdproductwishlist'}</th>
							<th>{l s='Default' mod='tdproductwishlist'}</th>
							<th>{l s='Delete' mod='tdproductwishlist'}</th>
						</tr>
					</thead>
					<tbody>
						{if $wishlists}
							{foreach from=$wishlists item=wishlists_item name=for_wishlists}
								<tr>
									<td><a href="javascript:void(0)" class="view-wishlist-product" data-name-wishlist="{$wishlists_item.name}" data-id-wishlist="{$wishlists_item.id_wishlist}">{$wishlists_item.name}</a></td>
									<td class="wishlist-numberproduct wishlist-numberproduct-{$wishlists_item.id_wishlist}">{$wishlists_item.number_product|intval}</td>
									<td>{$wishlists_item.counter|intval}</td>
									<td class="wishlist-datecreate">{$wishlists_item.date_add}</td>
									<td><a class="view-wishlist" data-token="{$wishlists_item.token}" target="_blank" href="{$view_wishlist_url}{if $is_rewrite_active}?{else}&{/if}token={$wishlists_item.token}" title="{l s='View' mod='tdproductwishlist'}">{l s='View' mod='tdproductwishlist'}</a></td>
									<td>
										<input class="default-wishlist" data-id-wishlist="{$wishlists_item.id_wishlist}" type="checkbox" {if $wishlists_item.default == 1}checked="checked"{/if}>
									</td>
									<td><a class="delete-wishlist" data-id-wishlist="{$wishlists_item.id_wishlist}" href="javascript:void(0)" title="{l s='Delete' mod='tdproductwishlist'}"><i class="fa fa-trash"></i></a></td>
								</tr>
							{/foreach}
						{/if}
					</tbody>
				</table>
			</div>

			<div class="send-wishlist">
				<a class="td-send-wishlist btn btn-primary" href="javascript:void(0)" title="{l s='Send this wishlist' mod='tdproductwishlist'}">
					<i class="fa fa-envelope"></i>
					{l s='Send this wishlist' mod='tdproductwishlist'}
				</a>
			</div>
			<section id="products">
				<div class="wishlist-products products row">

				</div>
			</section>

			<div class="page-footer clearfix">
				{block name='my_account_links'}
					<a href="{$urls.pages.my_account}" class="account-link">
						<i class="fa fa-angle-left"></i>
						<span>{l s='Back to your account' mod='tdproductwishlist'}</span>
					</a>
					<a href="{$urls.pages.index}" class="account-link">
						<i class="fa fa-home"></i>
						<span>{l s='Home' mod='tdproductwishlist'}</span>
					</a>
				{/block}
			</div>
		</div>
	</section>
{/block}
