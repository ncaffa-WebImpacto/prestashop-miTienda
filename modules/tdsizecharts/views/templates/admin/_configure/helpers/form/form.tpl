{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file="helpers/form/form.tpl"}


{block name="autoload_tinyMCE"}
    tinySetup({
    editor_selector :"autoload_rte",
    content_css : "{$module_path}views/css/tinymce.css"
    });
{/block}

{block name="input"}

    {if $input.type == 'table_generator'}
        <div class="form-group">
            <div class="col-lg-9">
                <div class="input-group fixed-width-xl">
                    <input type="number" min="1" value="1" step="1" name="nrows" class="nrows form-control" placeholder="{l s='no of rows' mod='tdsizecharts'}">
                    <span class="input-group-addon">{l s='Rows' mod='tdsizecharts'}</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-9">
                <div class="input-group fixed-width-xl">
                    <input type="number" min="1" value="1" step="1" name="ncol" class="ncol form-control" placeholder="{l s='no of columns' mod='tdsizecharts'}">
                    <span class="input-group-addon">{l s='Columns' mod='tdsizecharts'}</span>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin-left: 20px;">
            <div class="col-lg-9">
                <label class="checkbox">
                    <input type="checkbox" name="header_row" value="header_row"
                           class="header_row"> {l s='Header row (it will add extra heading column)' mod='tdsizecharts'}
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="bordered" value="bordered" class="table_bordered"
                           checked> {l s='Bordered' mod='tdsizecharts'}
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="striped" value="striped"
                           class="table_striped"> {l s='Striped' mod='tdsizecharts'}
                </label>
            </div>
        </div>
        <button type="button" class="btn btn-success" name="Submit"
                id="table_generator">{l s='Generate table' mod='tdsizecharts'}</button>
        <div class="span6" id="tbl_display">
        </div>
        {elseif $input.type == 'attribute_checboxes'}
        {if isset($input.options.query)}
            {foreach $input.options.query as $value}
                <div class="checkbox {if isset($input.class)}{$input.class}{/if}">
                    {strip}
                        <label>
                            <input type="checkbox" name="{$input.name}[]" id="{$value.id_option}"
                                   value="{$value.id_option|escape:'html':'UTF-8'}" {if isset($fields_value[$input.name])}{if in_array($value.id_option, $fields_value[$input.name])}  checked="checked"{/if}{/if} />
                            {$value.name}
                        </label>
                    {/strip}
                </div>
            {/foreach}{/if}

        {if isset($value.p) && $value.p}<p class="help-block">{$value.p}</p>{/if}
    {else}
        {$smarty.block.parent}
    {/if}
{/block}



