{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<div class="alert alert-info" role="alert">
    <p class="alert-text">{l s='You need to save product to changes took effect' mod='tdthreesixty'}</p>
</div>

<h2>{l s='360 Product View' mod='tdthreesixty'}</h2>

<div id="tdthreesixty-images-container" class="m-b-2">
    <div id="tdthreesixty-images-dropzone" class="panel dropzone ui-sortable col-md-12"
         url-upload="{$threeSixtyActionUrl}&step=1"
         url-delete="{$threeSixtyActionUrl}&step=2">
        <div id="tdthreesixty-images-dropzone-error" class="text-danger"></div>
        <div class="dz-default dz-message threesixty-openfilemanager">
            <i class="material-icons">add_a_photo</i><br/>
            {l s='Drop images here' mod='tdthreesixty'}<br/>
            <a>{l s='or select files' mod='tdthreesixty'}</a><br/>
        </div>

        {foreach $threeSixtyContent as $image}
            <div class="dz-preview dz-processing dz-image-preview dz-complete ui-sortable-handle"
                 data-name="{$image.name}">
                <div class="dz-image bg"
                     style="background-image: url('{$image.path}');"></div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size=""></span></div>
                    <div class="dz-filename"><span data-dz-name=""></span></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span>
                </div>
                <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                <div class="dz-success-mark"></div>
                <div class="dz-error-mark"></div>
                <a class="dz-remove-custom" href="javascript:undefined;"
                   data-dz-remove="">{l s='Delete' mod='tdthreesixty'}</a>
            </div>
        {/foreach}
        <div class="fallback">
            <input name="threesixty-file-upload" type="file" multiple/>
        </div>


    </div>
    <input name="tdthreesixty[threesixty]" id="tdthreesixty_threesixty" type="hidden" value=""/>
    <div class="form-group">
        <button type="button" class="btn btn-danger btn-lg btn-block" id="tdthreesixty-removeall"><i
                    class="material-icons">delete_forever</i>{l s='Remove all' mod='tdthreesixty'}
        </button>
    </div>

</div>

<script type="text/javascript" src="{$path}views/js/admin_tab.js"></script>

