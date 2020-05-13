{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<fieldset class="form-group" style="margin-bottom: 5px;">
    <label class="form-control-label">{l s='Tab Status' mod='tdadditionaltabs'}</label>
    <label for="tdadditionaltabs_active">
        <input data-toggle="switch" id="tdadditionaltabs_active" class="js-tdadditionaltabs-field small" data-inverse="true" type="checkbox" name="tdadditionaltabs[active]" checked>
    </label>
</fieldset>
<fieldset class="form-group">
    <label class="form-control-label">{l s='Title' mod='tdadditionaltabs'}</label>
    <div class="translations tabbable" id="tdadditionaltabs_title">
        <div class="translationsFields tab-content ">
            {foreach from=$languages item=language}
                {if $language.active}
                    <div class="translationsFields-tdadditionaltabs_title_{$language.id_lang} tab-pane{if $id_language == $language.id_lang} visible{/if} translation-field  translation-label-{$language.iso_code}">
                        <input type="text" id="tdadditionaltabs_title_{$language.id_lang}" name="tdadditionaltabs[title_{$language.id_lang}]" class="js-tdadditionaltabs-field form-control">
                    </div>
                {/if}
            {/foreach}
        </div>
    </div>
</fieldset>

<fieldset class="form-group">
    <label class="form-control-label">{l s='Content' mod='tdadditionaltabs'}</label>
    <div class="translations tabbable" id="tdadditionaltabs_description">
        <div class="translationsFields tab-content ">
            {foreach from=$languages item=language}
                {if $language.active}
                    <div class="tdadditionaltabs_description translationsFields-tdadditionaltabs_description_{$language.id_lang} tab-pane{if $id_language == $language.id_lang} visible{/if} translation-field  translation-label-{$language.iso_code}" style="border: 1px solid #bbcdd2;">
                        <textarea id="tdadditionaltabs_description_{$language.id_lang}" name="tdadditionaltabs[description_{$language.id_lang}]" class="autoload_rte form-control js-tdadditionaltabs-field"></textarea>
                    </div>
                {/if}
            {/foreach}
        </div>
    </div>
</fieldset>

<input type="hidden" id="tdadditionaltabs_id_tdadditionaltab" name="tdadditionaltabs[id_tdadditionaltab]" class="js-tdadditionaltabs-field" value=""/>

<div class="form-group clearfix">
    <div class="float-right">
        <button type="button" class="btn btn-primary" id="tdadditionaltabs_add" data-product="{$idProduct}">
            <i class="material-icons">add</i> {l s='Add new' mod='tdadditionaltabs'}
        </button>

        <button type="button" class="btn btn-primary hide" id="tdadditionaltabs_edit" data-product="{$idProduct}">
            <i class="material-icons">save</i> {l s='Save changes' mod='tdadditionaltabs'}
        </button>

        <button type="button" class="btn btn-danger-outline hide" id="tdadditionaltabs_cancel">
            <i class="material-icons">cancel</i> {l s='Cancel' mod='tdadditionaltabs'}
        </button>
    </div>
</div>

<div class="form-group">
    <h2>{l s='Tabs list' mod='tdadditionaltabs'}</h2>
    <div class="list-group" id="tdadditionaltab-list" data-product="{$idProduct}">
        {foreach from=$tabs item=tab}
            <div class="list-group-item" id="tdadditionaltabs_{$tab.id_tdadditionaltab}">

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="left-content" style="flex-grow: 1; align-self: center;">
                                <span><i class="material-icons">reorder</i></span>
                                #{$tab.id_tdadditionaltab} -
                                <div class="translations tabbable d-inline-block">
                                    <div  class="translationsFields">
                                        {foreach from=$languages item=language}
                                            {if $language.active}
                                                <div class="translationsFields-tdadditionaltabs_title_p_{$tab.id_tdadditionaltab}_{$language.id_lang} {if $id_language == $language.id_lang} visible{/if}   translation-field  translation-label-{$language.iso_code}">{$tab.title[$language.id_lang]}</div>
                                            {/if}
                                        {/foreach}
                                    </div>
                                </div>
                                {if $tab.is_shared}
                                    <span class="label color_field" style="background-color:#108510;color:white;margin:0 5px;padding:3px 10px;border-radius:5px;">
                                        {l s='Shared tab' mod='tdadditionaltabs'}
                                    </span>
                                {/if}
                            </div>
                            <div class="btn-group-action right-content">
                                <button type="button" class="js-tdadditionaltabs-edit btn btn-default" data-tab="{$tab.id_tdadditionaltab}">
                                    <i class="material-icons">edit</i> {l s='Edit' mod='tdadditionaltabs'}
                                </button>
                                <button type="button" class="js-tdadditionaltabs-remove btn btn-danger" data-tab="{$tab.id_tdadditionaltab}">
                                    <i class="material-icons">delete</i> {l s='Delete' mod='tdadditionaltabs'}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        {/foreach}
    </div>
</div>

<div id="tmpl-tdadditionaltab-list-item" class="d-none">
    <div class="list-group-item" id="tdadditionaltabs_::tabId::">
        <div class="row">
            <div class="col-12">
                <div class="d-flex">
                    <div class="left-content" style="flex-grow: 1; align-self: center;">
                        <span><i class="material-icons">reorder</i></span>
                        # ::tabId:: -
                        <div class="translations tabbable d-inline-block">
                            <div  class="translationsFields">
                                {foreach from=$languages item=language}
                                    {if $language.active}
                                        <div class="translationsFields-tdadditionaltabs_title_p_{$tab.id_tdadditionaltab}_{$language.id_lang} {if $id_language == $language.id_lang} visible{/if}   translation-field  translation-label-{$language.iso_code}">::tabTitle{$language.id_lang}::</div>
                                    {/if}
                                {/foreach}
                            </div>
                        </div>
                    </div>
                    <div class="btn-group-action right-content">
                        <button type="button" class="js-tdadditionaltabs-edit btn btn-default" data-tab="::tabId::">
                            <i class="material-icons">edit</i> {l s='Edit' mod='tdadditionaltabs'}
                        </button>
                        <button type="button" class="js-tdadditionaltabs-remove btn btn-danger" data-tab="::tabId::">
                            <i class="material-icons">delete</i> {l s='Delete' mod='tdadditionaltabs'}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{$path}views/js/admin_tab.js"></script>
<script>
    var tdadditionaltabs_languages = {$languages|@json_encode};
</script>

