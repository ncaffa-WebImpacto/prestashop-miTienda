{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<tr class="new">
	<td>
		<a href="javascript:void(0)" class="view-wishlist-product" data-name-wishlist="{$wishlist->name}" data-id-wishlist="{$wishlist->id}">
			{$wishlist->name}
		</a>
	</td>
	<td class="wishlist-numberproduct wishlist-numberproduct-{$wishlist->id}">0</td>
	<td>0</td>
	<td class="wishlist-datecreate">{$wishlist->date_add}</td>
	<td><a class="view-wishlist" data-token="{$wishlist->token}" target="_blank" href="{$url_view_wishlist}" title="{l s='View' mod='tdproductwishlist'}">{l s='View' mod='tdproductwishlist'}</a></td>
	<td>
		<label class="form-check-label">
			<input class="default-wishlist form-check-input" data-id-wishlist="{$wishlist->id}" type="checkbox" {$checked}>
		</label>
	</td>
	<td><a class="delete-wishlist" data-id-wishlist="{$wishlist->id}" href="javascript:void(0)" title="{l s='Delete' mod='tdproductwishlist'}"><i class="fa fa-trash"></i></a></td>
</tr>

