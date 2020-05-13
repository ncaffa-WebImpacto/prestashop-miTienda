{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file="helpers/form/form.tpl"}
{block name="input"}
	{if $input.type == 'date_bitblog'}
		<div class="row">
			<div class="input-group col-lg-4">
				<input
					id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}"
					type="text"
					data-hex="true"
					{if isset($input.class)} class="{$input.class}"
					{else}class="datepicker"{/if}
					name="{$input.name}"
					value="{if isset($input.default) && $fields_value[$input.name] == ''}{$input.default}{else}{$fields_value[$input.name]|escape:'html':'UTF-8'}{/if}" />
				<span class="input-group-addon">
					<i class="icon-calendar-empty"></i>
				</span>
			</div>
		</div>
	{else}
		{$smarty.block.parent}
	{/if}

{/block}
