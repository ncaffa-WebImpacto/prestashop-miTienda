{*
*  @author    ThemeDelights
*  @copyright 2015-2017 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
<div class="compare">
	<a class="add_to_compare btn btn-primary tip_inside{if $added} added{/if}" href="#" data-id-product="{$id_product}">
		<svg width="18px" height="18px" fill="currentcolor">
			<use xlink:href="#tdscompare">
			</use>	
		</svg>
		<span class ="tip">{if $added}{l s='Remove from Compare' mod='tdcompare'}{else}{l s='Add to Compare' mod='tdcompare'}{/if}</span>
	</a>
</div>
