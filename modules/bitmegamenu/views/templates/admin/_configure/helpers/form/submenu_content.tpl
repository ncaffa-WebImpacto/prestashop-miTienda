{**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
{if $node.type==1}
	<div data-element-type="1" data-depth="{$node.depth}" data-element-id="{$node.elementId}" class="row menu_row menu-element {if $node.depth==0} first_rows{/if} menu-element-id-{$node.elementId}">
{elseif $node.type==2}
	<div data-element-type="2" data-depth="{$node.depth}" data-width="{$node.width}" data-contenttype="{$node.contentType}" data-element-id="{$node.elementId}" class="col-xs-{$node.width} menu_column menu-element menu-element-id-{$node.elementId}">
{/if}

		<div class="action-buttons-container">
			<button type="button" class="btn btn-default  add-row-action" ><i class="icon icon-plus"></i> {l s='Row' mod='bitmegamenu'}</button>
			<button type="button" class="btn btn-default  add-column-action" ><i class="icon icon-plus"></i> {l s='Column' mod='bitmegamenu'}</button>
			<button type="button" class="btn btn-default duplicate-element-action" ><i class="icon icon-files-o"></i> </button>
			<button type="button" class="btn btn-danger remove-element-action" ><i class="icon-trash"></i> </button>
		</div>
		<div class="dragger-handle btn btn-danger"><i class="icon-arrows "></i></a></div>

		{if $node.type==2}
			{include file="./column_content.tpl" node=$node}
		{/if}

		{if isset($node.children) && $node.children|@count > 0}
			{foreach from=$node.children item=child name=categoryTreeBranch}
				{include file="./submenu_content.tpl" node=$child }
			{/foreach}
		{/if}
	</div>
