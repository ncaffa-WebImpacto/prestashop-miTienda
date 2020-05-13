{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file="helpers/list/list_content.tpl"}

{block name="open_td"}
	<td
		{if isset($params.type) && $params.type == 'position'}
			id="td_{if !empty($position_group_identifier)}{$position_group_identifier|escape:'html':'UTF-8'}{else}0{/if}_{$tr.$identifier|escape:'html':'UTF-8'}{if $smarty.capture.tr_count > 1}_{($smarty.capture.tr_count - 1)|intval}{/if}"
		{/if}
		class="{strip}{if !$no_link}pointer{/if}
		{if isset($params.type) && $params.type == 'position'} dragHandle{/if}
		{if isset($params.class)} {$params.class|escape:'html':'UTF-8'}{/if}
		{if isset($params.align)} {$params.align|escape:'html':'UTF-8'}{/if}{/strip}"
		{if (!isset($params.position) && !$no_link && !isset($params.remove_onclick))}
			onclick="document.location = '{$current_index|escape:'html':'UTF-8'}&amp;{$identifier|escape:'html':'UTF-8'}={$tr.$identifier|escape:'html':'UTF-8'}{if $view}&amp;view{else}&amp;update{/if}{$table|escape:'html':'UTF-8'}&amp;token={$token|escape:'html':'UTF-8'}'">
		{else}
	>
		{/if}
{/block}

{block name="td_content"}
	{if isset($params.type) && $params.type == 'position'}
		<div class="dragGroup">
			<div class="positions">
				{$tr.$key.position|intval}
			</div>
		</div>
	{elseif isset($params.type) && $params.type == 'id_columnblock'}
		#{$tr.id_tdcolumnblock|escape:'htmlall':'UTF-8'}
	{elseif isset($params.type) && $params.type == 'blocktype'}
		{if isset($block_type[$tr.block_type][$tr.product_filter])}
			{$block_type[$tr.block_type][$tr.product_filter]|escape:'htmlall':'UTF-8'}
		{elseif isset($block_type[$tr.block_type])}
			{$block_type[$tr.block_type]|escape:'htmlall':'UTF-8'}
		{/if}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}
