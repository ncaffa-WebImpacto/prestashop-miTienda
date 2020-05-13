{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file="helpers/form/form.tpl"}
{block name="input"}
	{if $input.type == 'tabConfig'}
		<div class="row">
			{assign var=tabList value=$input.values}
			<ul class="nav nav-tabs" role="tablist">
			{foreach $tabList as $key => $value name="tabList"}
				<li role="presentation" class="{if $smarty.foreach.tabList.first}active{/if}"><a href="#{$key|escape:'html':'UTF-8'}" class="aptab-config" role="tab" data-toggle="tab">{$value|escape:'html':'UTF-8'}</a></li>
			{/foreach}
			</ul>
		</div>
	{else}
		{$smarty.block.parent}
	{/if}

{/block}
