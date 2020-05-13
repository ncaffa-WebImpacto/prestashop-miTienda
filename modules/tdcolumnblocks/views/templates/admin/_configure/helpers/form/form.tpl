{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file="helpers/form/form.tpl"}

{block name="input"}
	{if $input.type == 'product_autocomplete'}	
	<div>
		<input type="text" id="products_autocomplete" autocomplete="off" size="42" />
		<div id="products_autocompleteDiv" style="font-size: 1.1em; margin-top: 10px; margin-left: 10px;">
		{if isset($fields_value.selected_products)}
			{foreach $fields_value.selected_products as $id => $name}
			<p id="product-{$id|escape:'htmlall':'UTF-8'}">#{$id|escape:'htmlall':'UTF-8'} - {$name|escape:'htmlall':'UTF-8'} <span style="cursor: pointer;" onclick="$(this).parent().remove();"><img src="../img/admin/delete.gif" /></span><input type="hidden" name="{$input.name|escape:'htmlall':'UTF-8'}[]" value="{$id|escape:'htmlall':'UTF-8'}" /></p>
			{/foreach}
		{/if}
		</div>
		<script type="text/javascript">
			function autocompleteProduct() {
				$("#products_autocomplete").autocomplete("{$input.ajax_path}", {
					minChars: 1,
					autoFill: true,
					max:20,
					matchContains: true,
					mustMatch:true,
					scroll:false,
					cacheLength:0,
					formatItem: function(item) {
						return "#"+item[1]+" - "+item[0];
					}
				}).result(function(event, data, formatted){
					if (data == null)
						return false;
					var productId = data[1];
					var productName = data[0];
					
					$("#product-" + productId).remove();
					html = html_aclist.replace(/xproductIdy/g,productId).replace(/xproductNamey/g,productName);
					$("#products_autocompleteDiv").append(html);
					
					$(this).val("");
				});
			}
			var html_aclist = '<p id="product-xproductIdy">#xproductIdy - xproductNamey <span style="cursor: pointer;" onclick="$(this).parent().remove();"><img src="../img/admin/delete.gif" /></span><input type="hidden" name="{$input.name|escape:'htmlall':'UTF-8'}[]" value="xproductIdy" /></p>';
			
			$(document).ready(function(){
				autocompleteProduct();
			});
		</script>
	</div>
	
	{else}
		{$smarty.block.parent}
    {/if}

{/block}
