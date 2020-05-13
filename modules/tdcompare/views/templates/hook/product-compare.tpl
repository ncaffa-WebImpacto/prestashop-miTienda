{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
{if $comparator_max_item}
	<form method="post" action="{$compareUrl}" class="compare-form">
		<button type="submit" class="btn btn-primary button button-medium bt_compare bt_compare" {if $compared_products == 0} disabled="disabled"{/if}>
			<span>{l s='Compare' mod='tdcompare'} (<span class="total-compare-val">{count($compared_products)}</span>)</span>
		</button>
		<input type="hidden" name="compare_product_count" class="compare_product_count" value="{count($compared_products)}" />
	</form>
{/if}