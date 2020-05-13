{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file="helpers/form/form.tpl"}
{block name="field"}
  {if $input.type == 'files_lang'}
    <div class="row tdmp-files-upload">
      {foreach from=$languages item=language}
        {if $languages|count > 1}
          <div class="translatable-field lang-{$language.id_lang|escape:'htmlall':'UTF-8'}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
        {/if}
          <div class="col-lg-6">
            <div class="dummyfile input-group">
              <input id="{$input.name|escape:'htmlall':'UTF-8'}_{$language.id_lang|escape:'htmlall':'UTF-8'}" type="file" name="{$input.name|escape:'htmlall':'UTF-8'}_{$language.id_lang|escape:'htmlall':'UTF-8'}" class="hide-file-upload" />
              <span class="input-group-addon">
                <i class="icon-file"></i>
              </span>
              <input id="{$input.name|escape:'htmlall':'UTF-8'}_{$language.id_lang|escape:'htmlall':'UTF-8'}-name" type="text" class="disabled" name="filename" readonly />
              <span class="input-group-btn">
                <button id="{$input.name|escape:'htmlall':'UTF-8'}_{$language.id_lang|escape:'htmlall':'UTF-8'}-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
                  <i class="icon-folder-open"></i>
                  {l s='Choose a file' mod='tdnewsletter'}
                </button>
              </span>
            </div>
            {if isset($fields[0]['form']['images'][$language.id_lang|escape:'htmlall':'UTF-8']) && $fields[0]['form']['images'][$language.id_lang|escape:'htmlall':'UTF-8']}
              <img src="{$image_baseurl|escape:'htmlall':'UTF-8'}{$fields[0]['form']['images'][$language.id_lang|escape:'htmlall':'UTF-8']}" class="img-thumbnail" width="200" />
            {/if}
          </div>
          {if $languages|count > 1}
            <div class="col-lg-2">
              <button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
                {$language.iso_code|escape:'htmlall':'UTF-8'}
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                {foreach from=$languages item=lang}
                  <li>
                    <a href="javascript:hideOtherLanguage({$lang.id_lang|escape:'htmlall':'UTF-8'});" tabindex="-1">{$lang.name|escape:'htmlall':'UTF-8'}</a>
                  </li>
                {/foreach}
              </ul>
            </div>
          {/if}
        {if $languages|count > 1}
          </div>
        {/if}
        <script>
          $(document).ready(function(){
            $('#{$input.name|escape:"htmlall":"UTF-8"}_{$language.id_lang|escape:"htmlall":"UTF-8"}-selectbutton').click(function(e){
              $('#{$input.name|escape:"htmlall":"UTF-8"}_{$language.id_lang|escape:"htmlall":"UTF-8"}').trigger('click');
            });
            $('#{$input.name|escape:"htmlall":"UTF-8"}_{$language.id_lang|escape:"htmlall":"UTF-8"}').change(function(e){
              var val = $(this).val();
              var file = val.split(/[\\/]/);
              $('#{$input.name|escape:"htmlall":"UTF-8"}_{$language.id_lang|escape:"htmlall":"UTF-8"}-name').val(file[file.length-1]);
            });
          });
        </script>
      {/foreach}
    </div>
  {/if}
  {$smarty.block.parent}
{/block}