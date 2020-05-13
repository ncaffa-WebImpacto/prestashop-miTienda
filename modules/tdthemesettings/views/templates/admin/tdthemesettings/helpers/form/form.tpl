{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file="helpers/form/form.tpl"}

{block name="defaultForm"}
	<div class="td-tabs">
		<ul id="td-config-tabs" class="td-config-tabs" role="tablist">
			{foreach from=$fields item=fieldset name=fieldset}
				{if !isset($fieldset.form.child)}
					<li class="tab{if $fieldset@first} active {/if}">
						<a href="#te-{$fieldset.form.legend.id}" role="tab" {if !isset($fieldset.form.childForms)}data-toggle="tab"{/if}  {if isset($fieldset.form.childForms)}class="parent-tab"{/if}>
							{$fieldset.form.legend.title}
							{if isset($fieldset.form.childForms)}
								<span class="extraIconSubsections pull-right"><i class="icon-angle-down">&nbsp;</i></span>
							{/if}
						</a>
						{if isset($fieldset.form.childForms)}
							<ul>
								{foreach key=key item=item from=$fieldset.form.childForms}
									<li class="tab tab-child"><a href="#te-{$key}" role="tab" data-toggle="tab">{$item}</a></li>
								{/foreach}
							</ul>
						{/if}
					</li>
				{/if}
			{/foreach}
		</ul>
	</div>
	<div class="tab-content td-config-panels ">
		{$smarty.block.parent}
	</div>
	<input type="hidden" value="{$td_base_url|escape:'html':'UTF-8'}" id="td-base-url"/>
{/block}

{block name="legend"}
	{$smarty.block.parent}
{/block}

{block name="footer"}
	{$smarty.block.parent}
{/block}

{block name="fieldset"}
	<div role="tabpanel" class="tab-panel {if $fieldset.form.legend.id == 'td-general'}active{/if}" id="te-{$fieldset.form.legend.id}">
		{$smarty.block.parent}
	</div>
{/block}

{block name="input_row"}
	<div class="td-element{if isset($input.dependency)} hidden{/if}" {if isset($input.dependency)}data-controller="{$input.dependency.0}" data-condition="{$input.dependency.1}" data-value="{$input.dependency.2}"{/if}>

	{if $input.type == 'title_separator'}
		{if isset($input.label)}<div class="title-reparator">{$input.label}</div>{/if}
	{elseif $input.type == 'info_text'}
		{if isset($input.desc)}<p class="alert alert-info">{$input.desc}</p>{/if}
	{elseif $input.type == 'subtitle_separator'}
		<label class="control-label col-lg-3"></label>
		<div class="col-lg-9 subtitle-reparator">{$input.label} </div>
	{else}
		{$smarty.block.parent}
	{/if}

	</div>
{/block}

{block name="label"}
	{if ($input.type == 'import_export') || ($input.type == 'documentation')}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}

{block name="input"}
	{if $input.type == 'boxshadow'}
		<div class="box-shadow-generator js-box-shadow-generator">
			<select class="fixed-width-xl js-box-shadow-switch js-scss-ignore" data-name="switch" name="{$input.name}_switch" id="{$input.name}_switch" data-depend-id="{$input.name}_switch">
				<option value="0">{l s='No' mod='tdthemesettings'}</option>
				<option value="1" {if $fields_value[$input.name].switch} selected{/if}>{l s='Yes' mod='tdthemesettings'}</option>
			</select>
			<input type="hidden" value="" name="{$input.name}" id="{$input.name}" class="js-box-shadow-input"/>
			<div class="box-shadow-controls js-box-shadow-controls" data-controller="{$input.name}_switch" data-condition="==" data-value="1">
				<div class="boxshadow-control">
					{l s='Color' mod='tdthemesettings'}
					<div class="input-group colorpicker-component">
						<input type="text" class="form-control js-shadow-color" name="{$input.name}_color" value="{$fields_value[$input.name].color|escape:'html':'UTF-8'}" data-name="color" />
						<span class="input-group-addon"><i></i></span>
					</div>
				</div>
				<div class="boxshadow-control">
					{l s='Blur' mod='tdthemesettings'}
					<input data-name="blur" name="{$input.name}_blur" type="number" class="form-control js-shadow-blur" step="1" max="100" min="0" value="{if $fields_value[$input.name].blur == ''}0{else}{$fields_value[$input.name].blur|escape:'html':'UTF-8'}{/if}"/>
				</div>
				<div class="boxshadow-control">
					{l s='Spread' mod='tdthemesettings'}
					<input data-name="spread" name="{$input.name}_spread" type="number" class="form-control js-shadow-spread" step="1" max="100" min="0" value="{if $fields_value[$input.name].spread == ''}0{else}{$fields_value[$input.name].spread|escape:'html':'UTF-8'}{/if}"/>
				</div>
				<div class="boxshadow-control">
					{l s='Horizontal' mod='tdthemesettings'}
					<input data-name="horizontal" name="{$input.name}_horizontal" class="form-control js-shadow-horizontal" type="number" step="1" min="-100" max="100" value="{if $fields_value[$input.name].horizontal == ''}0{else}{$fields_value[$input.name].horizontal|escape:'html':'UTF-8'}{/if}"/>
				</div>
				<div class="boxshadow-control">
					{l s='Vertical' mod='tdthemesettings'}
					<input data-name="vertical" name="{$input.name}_vertical" class="form-control js-shadow-vertical" type="number" step="1" min="-100" max="100" value="{if $fields_value[$input.name].vertical == ''}0{else}{$fields_value[$input.name].vertical|escape:'html':'UTF-8'}{/if}"/>
				</div>
				<div>
					<div class="shadowpreview js-shadow-preview"></div>
				</div>
			</div>
		</div>
	{elseif $input.type == 'border'}
		<div class="js-border-generator border-generator row">
			<input type="hidden" value="" name="{$input.name}" id="{$input.name}" class="js-border-input"/>
			<div class="col-xs-2">
				<select name="{$input.name}_type" id="{$input.name}_type" class="js-border-type" data-depend-id="{$input.name}_type" data-name="type">
					<option value="none" {if $fields_value[$input.name].type=='none'}selected{/if}>{l s='none' mod='tdthemesettings'}</option>
					<option value="solid" {if $fields_value[$input.name].type=='solid'}selected{/if}>{l s='solid' mod='tdthemesettings'}</option>
					<option value="dotted" {if $fields_value[$input.name].type=='dotted'}selected{/if}>{l s='dotted' mod='tdthemesettings'}</option>
					<option value="dashed" {if $fields_value[$input.name].type=='dashed'}selected{/if}>{l s='dashed' mod='tdthemesettings'}</option>
					<option value="groove" {if $fields_value[$input.name].type=='groove'}selected{/if}>{l s='groove' mod='tdthemesettings'}</option>
					<option value="double" {if $fields_value[$input.name].type=='double'}selected{/if}>{l s='double' mod='tdthemesettings'}</option>
				</select>
			</div>
			<div class="col-xs-4 js-border-controls-wrapper" data-controller="{$input.name}_type" data-condition="!=" data-value="none">
				<div class="row">
					<div class="col-xs-6 border-width">
						<select name="{$input.name}_width" id="{$input.name}_width" class="js-border-width" data-name="width">
							{for $i=1 to 20}
								<option value="{$i}" {if $fields_value[$input.name].width == $i}selected{/if}>{$i}px</option>
							{/for}
						</select>
					</div>
					<div class="col-xs-6 border-color">
						<div class="row">
							<div class="input-group colorpicker-component">
								<input type="text" class="form-control js-border-color" name="{$input.name}_color" value="{$fields_value[$input.name].color|escape:'html':'UTF-8'}" data-name="color" />
								<span class="input-group-addon"><i></i></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	{elseif $input.type == 'background'}
		<div class="background-generator js-background-generator">
			<input type="hidden" value="" name="{$input.name}" id="{$input.name}" class="js-background-input"/>
			<div class="background-controls js-background-controls">
				<div class="background-control">
					{l s='Color' mod='tdthemesettings'}
					<div class="input-group colorpicker-component">
						<input type="text" class="form-control js-background-color" name="{$input.name}_color" value="{$fields_value[$input.name].color|escape:'html':'UTF-8'}" data-name="color" />
						<span class="input-group-addon"><i></i></span>
					</div>
				</div>
				<div class="background-control">
					{l s='Repeat' mod='tdthemesettings'}
					<select class="fixed-width-xl js-background-repeat js-scss-ignore" data-name="repeat" name="{$input.name}_repeat" id="{$input.name}_repeat" data-depend-id="{$input.name}_repeat">
						<option value="repeat"{if $fields_value[$input.name].repeat=='repeat'} selected{/if}>{l s='repeat' mod='tdthemesettings'}</option>
						<option value="repeat-x"{if $fields_value[$input.name].repeat=='repeat-x'} selected{/if}>{l s='repeat-x' mod='tdthemesettings'}</option>
						<option value="repeat-y"{if $fields_value[$input.name].repeat=='repeat-y'} selected{/if}>{l s='repeat-y' mod='tdthemesettings'}</option>
						<option value="no-repeat"{if $fields_value[$input.name].repeat=='no-repeat'} selected{/if}>{l s='no-repeat' mod='tdthemesettings'}</option>
					</select>
				</div>
				<div class="background-control">
					{l s='Position' mod='tdthemesettings'}
					<select class="fixed-width-xl js-background-position js-scss-ignore" data-name="position" name="{$input.name}_position" id="{$input.name}_position" data-depend-id="{$input.name}_position">
						<option value="left-top"{if $fields_value[$input.name].position=='left-top'} selected{/if}>{l s='left top' mod='tdthemesettings'}</option>
						<option value="left-center"{if $fields_value[$input.name].position=='left-center'} selected{/if}>{l s='left center' mod='tdthemesettings'}</option>
						<option value="left-bottom"{if $fields_value[$input.name].position=='left-bottom'} selected{/if}>{l s='left bottom' mod='tdthemesettings'}</option>
						<option value="right-top"{if $fields_value[$input.name].position=='right-top'} selected{/if}>{l s='right top' mod='tdthemesettings'}</option>
						<option value="right-center"{if $fields_value[$input.name].position=='right-center'} selected{/if}>{l s='right center' mod='tdthemesettings'}</option>
						<option value="right-bottom"{if $fields_value[$input.name].position=='right-bottom'} selected{/if}>{l s='right bottom' mod='tdthemesettings'}</option>
						<option value="center-top"{if $fields_value[$input.name].position=='center-top'} selected{/if}>{l s='center top' mod='tdthemesettings'}</option>
						<option value="center-center"{if $fields_value[$input.name].position=='center-center'} selected{/if}>{l s='center center' mod='tdthemesettings'}</option>
						<option value="center-bottom"{if $fields_value[$input.name].position=='center-bottom'} selected{/if}>{l s='center bottom' mod='tdthemesettings'}</option>
					</select>
				</div>
				<div class="background-control">
					{l s='Size' mod='tdthemesettings'}
					<select class="fixed-width-xl js-background-size js-scss-ignore" data-name="size" name="{$input.name}_size" id="{$input.name}_size" data-depend-id="{$input.name}_size">
						<option value="auto"{if $fields_value[$input.name].size=='auto'} selected{/if}>{l s='Auto' mod='tdthemesettings'}</option>
						<option value="cover"{if $fields_value[$input.name].size=='cover'} selected{/if}>{l s='Cover' mod='tdthemesettings'}</option>
						<option value="contain"{if $fields_value[$input.name].size=='contain'} selected{/if}>{l s='Contain' mod='tdthemesettings'}</option>
					</select>
				</div>
				<div class="background-control">
					{l s='Attachment' mod='tdthemesettings'}
					<select class="fixed-width-xl js-background-attachment js-scss-ignore" data-name="attachment" name="{$input.name}_attachment" id="{$input.name}_attachment" data-depend-id="{$input.name}_attachment">
						<option value="fixed"{if $fields_value[$input.name].attachment=='fixed'} selected{/if}>{l s='Fixed' mod='tdthemesettings'}</option>
						<option value="scroll"{if $fields_value[$input.name].attachment=='scroll'} selected{/if}>{l s='Scroll' mod='tdthemesettings'}</option>
					</select>
				</div>
				<div class="background-control file">
					{l s='Select Image' mod='tdthemesettings'}
					<div class="input-group" style="max-width: 800px;">
						<input type="text" value="{$fields_value[$input.name].img|escape:'html':'UTF-8'}" id="{$input.name}_img" class="form-control js-background-img js-scss-ignore" name="{$input.name}_img" data-name="img" data-depend-id="{$input.name}_img"/>
						<span class="input-group-addon"><a href="filemanager/dialog.php?type=1&field_id={$input.name}_img" class="js-iframe-upload" data-input-name="{$input.name}_img" type="button">{l s='Select image' mod='tdthemesettings'} <i class="icon-external-link"></i></a></span>
					</div>
				</div>
				<div>
					<div class="bgpreview js-background-preview"></div>
				</div>
			</div>
		</div>
	{elseif $input.type == 'color2'}
		<div class="input-group fixed-width-xl colorpicker-component">
			<input type="text" class="form-control" name="{$input.name}" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}" />
			<span class="input-group-addon"><i></i></span>
		</div>
	{elseif $input.type == 'range'}
		<div class="form-group">
			<div class="col-lg-5">
				<div class="row">
					<div class="input-group input-group-range">
						<input type="range" name="{$input.name}_s" id="{$input.name}_s" data-vinput="{$input.name}" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}" {if isset($input.min)} min="{$input.min|floatval}"{/if} {if isset($input.step)} step="{$input.step|floatval}"{/if} {if isset($input.max)} max="{$input.max|floatval}"{/if} oninput="{$input.name}.value = {$input.name}_s.value" class="js-range-slider range-slider"/>
						<input type="number" name="{$input.name}" id="{$input.name}" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}" {if isset($input.min)} min="{$input.min|floatval}"{/if} {if isset($input.step)} step="{$input.step|floatval}"{/if} {if isset($input.max)} max="{$input.max|floatval}"{/if} oninput="{$input.name}_s.value = {$input.name}.value" class="form-control width-70 js-range-slider-val"/>
					</div>
				</div>
			</div>
		</div>
	{elseif $input.type == 'info_text'}
		<div class="form-group">
			<div class="col-lg-2">

			</div>
		</div>
	{elseif $input.type == 'number'}
		{assign var='value_text' value=$fields_value[$input.name]}
		{if isset($input.prefix) || isset($input.suffix)}
			<div class="input-group{if isset($input.class)} {$input.class}{/if}">
		{/if}
		{if isset($input.prefix)}
			<span class="input-group-addon">{$input.prefix}</span>
		{/if}
			<input type="number" name="{$input.name}" id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}" value="{if isset($input.string_format) && $input.string_format}{$value_text|string_format:$input.string_format|escape:'html':'UTF-8'}{else}{$value_text|escape:'html':'UTF-8'}{/if}" class="form-control {if isset($input.class)}{$input.class}{/if}" {if isset($input.size)} size="{$input.size}"{/if} {if isset($input.min)} min="{$input.min|floatval}"{/if} {if isset($input.max)} max="{$input.max|floatval}"{/if} {if isset($input.step)} step="{$input.step|floatval}"{/if} {if isset($input.maxchar) && $input.maxchar} data-maxchar="{$input.maxchar|intval}"{/if} {if isset($input.maxlength) && $input.maxlength} maxlength="{$input.maxlength|intval}"{/if} {if isset($input.readonly) && $input.readonly} readonly="readonly"{/if} {if isset($input.disabled) && $input.disabled} disabled="disabled"{/if} {if isset($input.autocomplete) && !$input.autocomplete} autocomplete="off"{/if} {if isset($input.required) && $input.required } required="required" {/if} {if isset($input.placeholder) && $input.placeholder } placeholder="{$input.placeholder}"{/if}/>
		{if isset($input.suffix)}
			<span class="input-group-addon">{$input.suffix}</span>
		{/if}
		{if isset($input.prefix) || isset($input.suffix)}
			</div>
		{/if}
	{elseif $input.type == 'padding'}
		{assign var='val_padding' value=$fields_value[$input.name]}
		<div class="input-group{if isset($input.class)} {$input.class}{/if} js-padding-generator">
			<input type="hidden" value="" name="{$input.name}" id="{$input.name}" class="js-padding-input"/>

			<span class="input-group-addon"><i class="icon icon-long-arrow-up" aria-hidden="true"></i></span>
			<input type="number" value="{if isset($val_padding.top)}{$val_padding.top}{/if}" data-name="top" name="{$input.name}_top" class="form-control js-padding-top width-60" step="1" min="0" />

			<span class="input-group-addon"><i class="icon icon-long-arrow-right" aria-hidden="true"></i></span>
			<input type="number" value="{if isset($val_padding.right)}{$val_padding.right}{/if}" data-name="right" name="{$input.name}_right" class="form-control js-padding-right width-60" step="1" min="0" />

			<span class="input-group-addon"><i class="icon icon-long-arrow-down" aria-hidden="true"></i></span>
			<input type="number" value="{if isset($val_padding.bottom)}{$val_padding.bottom}{/if}" data-name="bottom" name="{$input.name}_bottom" class="form-control js-padding-bottom width-60" step="1" min="0" />

			<span class="input-group-addon"><i class="icon icon-long-arrow-left" aria-hidden="true"></i></span>
			<input type="number" value="{if isset($val_padding.left)}{$val_padding.left}{/if}" data-name="left" name="{$input.name}_left" class="form-control js-padding-left width-60" step="1" min="0" />
			{if isset($input.suffix)}
				<span class="input-group-addon">{$input.suffix}</span>
			{/if}
		</div>
	{elseif $input.type == 'font'}
		{assign var='value_font' value=$fields_value[$input.name]}
		<div class="input-group{if isset($input.class)} {$input.class}{/if} js-typography-generator">
			{if isset($input.prefix)}
				<span class="input-group-addon">{$input.prefix}</span>
			{/if}
			<input type="hidden" value="" name="{$input.name}" id="{$input.name}" class="js-font-input"/>
			<input type="number" id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}_size" value="{if isset($value_font.size)}{$value_font.size}{/if}" data-name="size" name="{$input.name}_size" class="form-control js-font-size width-60" step="1" {if isset($input.size)} size="{$input.size}"{/if} {if isset($input.min)} min="{$input.min|intval}"{/if} {if isset($input.maxchar) && $input.maxchar} data-maxchar="{$input.maxchar|intval}"{/if} {if isset($input.maxlength) && $input.maxlength} maxlength="{$input.maxlength|intval}"{/if} {if isset($input.readonly) && $input.readonly} readonly="readonly"{/if} {if isset($input.disabled) && $input.disabled} disabled="disabled"{/if} {if isset($input.autocomplete) && !$input.autocomplete} autocomplete="off"{/if} {if isset($input.required) && $input.required } required="required" {/if} {if isset($input.placeholder) && $input.placeholder } placeholder="{$input.placeholder}"{/if} />
			{if isset($input.suffix)}
				<span class="input-group-addon">{$input.suffix}</span>
			{/if}
			<span class="input-group-addon single-option-switch-wrapper">
				<select name="{$input.name}_bold" id="{$input.name}_bold" class="js-font-bold" data-name="bold">
					<option value="100" {if $fields_value[$input.name].bold=='100'}selected{/if}>{l s='100, Thin' mod='tdthemesettings'}</option>
					<option value="200" {if $fields_value[$input.name].bold=='200'}selected{/if}>{l s='200, Extra Light' mod='tdthemesettings'}</option>
					<option value="300" {if $fields_value[$input.name].bold=='300'}selected{/if}>{l s='300, Light' mod='tdthemesettings'}</option>
					<option value="400" {if $fields_value[$input.name].bold=='400'}selected{/if}>{l s='400, Normal' mod='tdthemesettings'}</option>
					<option value="500" {if $fields_value[$input.name].bold=='500'}selected{/if}>{l s='500, Medium' mod='tdthemesettings'}</option>
					<option value="600" {if $fields_value[$input.name].bold=='600'}selected{/if}>{l s='600, Semi Bold' mod='tdthemesettings'}</option>
					<option value="700" {if $fields_value[$input.name].bold=='700'}selected{/if}>{l s='700, Bold' mod='tdthemesettings'}</option>
					<option value="800" {if $fields_value[$input.name].bold=='800'}selected{/if}>{l s='800, Extra Bold' mod='tdthemesettings'}</option>
					<option value="900" {if $fields_value[$input.name].bold=='900'}selected{/if}>{l s='900, Black' mod='tdthemesettings'}</option>
				</select>
			</span>
			<span class="input-group-addon single-option-switch-wrapper">
				<span class="single-option-switch">
					<input data-name="italic" type="radio" class="js-font-italic" id="{$input.name}_unitalic" name="{$input.name}_italic" value="0" {if !isset($value_font.italic) || !$value_font.italic} checked{/if}/>
					<label for="{$input.name}_unitalic"><i class="icon-italic"></i></label>
					<input data-name="italic" type="radio" class="js-font-italic" id="{$input.name}_italic" name="{$input.name}_italic" value="1" {if isset($value_font.italic) && $value_font.italic} checked{/if}/>
					<label for="{$input.name}_italic"><i class="icon-italic"></i></label>
				</span>
			</span>
			<span class="input-group-addon single-option-switch-wrapper">
				<span class="single-option-switch">
					<input data-name="uppercase" type="radio" class="js-font-uppercase" id="{$input.name}_unuppercase" name="{$input.name}_uppercase" value="0" {if !isset($value_font.uppercase) || !$value_font.uppercase} checked{/if}/>
					<label for="{$input.name}_unuppercase">ABC</label>
					<input data-name="uppercase" type="radio" class="js-font-uppercase" id="{$input.name}_uppercase" name="{$input.name}_uppercase" value="1" {if isset($value_font.uppercase) && $value_font.uppercase} checked{/if}/>
					<label for="{$input.name}_uppercase">Abc</label>
				</span>
			</span>
			<span class="input-group-addon"><i class="icon icon-arrows-h" aria-hidden="true"></i></span>
			<input type="number" value="{if isset($value_font.spacing)}{$value_font.spacing}{/if}" data-name="spacing" name="{$input.name}_spacing" class="form-control js-font-spacing width-60" step="1" min="-10" max="20" />
		</div>
	{elseif $input.type == 'code_textarea'}
		<div id="{$input.name|escape:'html':'UTF-8'}" class="td-code-editor form-control" data-language="{$input.language}">{$fields_value[$input.name]|escape:'html':'UTF-8'}</div>
	{elseif $input.type == 'filemanager'}
		<div class="image-generator">
			<div class="input-group" style="max-width: 800px;">
				<input type="text" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}" id="{$input.name}" class="form-control" name="{$input.name}" data-depend-id="{$input.name|escape:'html':'utf-8'}" readonly/>
				<span class="input-group-addon"><a href="filemanager/dialog.php?type=1&field_id={$input.name}" class="js-iframe-upload" data-input-name="{$input.name|escape:'html':'UTF-8'}" type="button">{l s='Select image' mod='tdthemesettings'} <i class="icon-external-link"></i></a></span>
			</div>
			<div class="js-image-preview{if $fields_value[$input.name]|escape:'html':'UTF-8' == ''} hide{/if}">
				<img class="imgpreview" src="{$fields_value[$input.name]|escape:'html':'UTF-8'}" /><br />
				<span class="btn btn-default remove-image" id="reset_{$input.name}" data-rel="{$input.name}">{l s='Remove' mod='tdthemesettings'}</span>
			</div>
		</div>
	{elseif $input.type == 'import_export'}
		<div class="title-reparator">{l s='Import configuration' mod='tdthemesettings'}</div>
		<div class="alert alert-info">{l s='Upload own style or download our samples from below' mod='tdthemesettings'}  </div>
		<div style="display:inline-block;"><input type="file" id="uploadConfig" name="uploadConfig"/></div>
		<button type="submit" class="btn btn-default btn-lg" name="importConfiguration"><span class="icon icon-upload"></span> {l s='Import' mod='tdthemesettings'}</button>
		<hr>
		<div class="title-reparator">{l s='Export configuration' mod='tdthemesettings'}</div>
		<div class="alert alert-info">{l s='Only saved changes are exported. Save first if you made any modifications.' mod='tdthemesettings'}  </div>
		<a class="btn btn-default btn-lg" href="{$current_link|escape:'html':'UTF-8'}&ajax=1&action=exportThemeConfiguration"><span class="icon icon-share"></span> {l s='Export to file' mod='tdthemesettings'} </a>
		<hr>
		<div class="title-reparator">{l s='Reset configuration' mod='tdthemesettings'}</div>
		<div class="alert alert-info">{l s='All changes are replaced with default values. First export settings if you made any modifications.' mod='tdthemesettings'}  </div>
		<a class="btn btn-default btn-lg" href="{$current_link|escape:'html':'UTF-8'}&resetConfiguration"><span class="icon icon-gear"></span> {l s='Reset Configurations' mod='tdthemesettings'} </a>
	{elseif $input.type == 'documentation'}
		<div class="title-reparator">{l s='Documentation' mod='tdthemesettings'}</div>
		<p>Please read file <a href="{$doc_url}" target="_blank">documentation.pdf</a> to configure this module.</p>
		<p>Please don't hesitate to leave us a rating and a comment on the module here : <a href="https://addons.prestashop.com/ratings.php" target="_blank">https://addons.prestashop.com/ratings.php</a> to tell us about your opinion and remarks!</p>
	{elseif $input.type == 'image-select'}
		<div class="image-select {if isset($input.direction)} image-select-{$input.direction}{/if}">
			{foreach $input.options.query AS $option }
				<input id="{$input.name|escape:'html':'utf-8'}-{$option.id_option}" type="radio" name="{$input.name|escape:'html':'utf-8'}" value="{$option.id_option}" {if $fields_value[$input.name] == ''}{if $option@index eq 0} checked{/if}{/if} {if $option.id_option == $fields_value[$input.name]}checked{/if} />
				<div class="image-option">
					<label class="image-option-label" for="{$input.name|escape:'html':'utf-8'}-{$option.id_option}"></label>
					<img src="{$base_url}modules/tdthemesettings/views/img/{$option.img}" alt="{$option.name}" class="img-responsive"/>
				</div>
			{/foreach}
		</div>
	{elseif $input.type == 'radio-group'}
		<div class="radio-group">
			{foreach $input.options.query AS $option}
				<input id="{$input.name|escape:'html':'utf-8'}-{$option.id_option}" type="radio" name="{$input.name|escape:'html':'utf-8'}" class="group" value="{$option.id_option}" {if $fields_value[$input.name] == ''}{if $option@index eq 0} checked{/if}{/if} {if $option.id_option == $fields_value[$input.name]}checked{/if} data-depend-id="{$input.name|escape:'html':'utf-8'}" /><label for="{$input.name|escape:'html':'utf-8'}-{$option.id_option}">{$option.name}</label>
			{/foreach}
		</div>
	{elseif $input.type == 'textarea2'}
		<textarea name="{$input.name}" id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}" {if isset($input.cols)}cols="{$input.cols}"{/if} {if isset($input.rows)}rows="{$input.rows}"{/if}
		class="{if isset($input.autoload_rte) && $input.autoload_rte}rte autoload_rte{else}textarea-autosize{/if}{if isset($input.class)} {$input.class}{/if}"{if isset($input.maxlength) && $input.maxlength} maxlength="{$input.maxlength|intval}"{/if}{if isset($input.maxchar) && $input.maxchar} data-maxchar="{$input.maxchar|intval}"{/if}>{$fields_value[$input.name]|escape:'html':'UTF-8'}</textarea>
	{elseif $input.type == 'select'}
		<select name="{$input.name|escape:'html':'utf-8'}"
			class="{if isset($input.class)}{$input.class|escape:'html':'utf-8'}{/if} fixed-width-xl"
			id="{if isset($input.id)}{$input.id|escape:'html':'utf-8'}{else}{$input.name|escape:'html':'utf-8'}{/if}"
			{if isset($input.multiple) && $input.multiple} multiple="multiple"{/if}
			{if isset($input.size)} size="{$input.size|escape:'html':'utf-8'}"{/if}
			{if isset($input.onchange)} onchange="{$input.onchange|escape:'html':'utf-8'}"{/if}
			{if isset($input.disabled) && $input.disabled} disabled="disabled"{/if}
			data-depend-id="{$input.name|escape:'html':'utf-8'}">
			{if isset($input.options.default)}
			<option value="{$input.options.default.value|escape:'html':'utf-8'}">{$input.options.default.label|escape:'html':'utf-8'}</option>
			{/if}
			{if isset($input.options.optiongroup)}
				{foreach $input.options.optiongroup.query AS $optiongroup}
					<optgroup label="{$optiongroup[$input.options.optiongroup.label]}">
						{foreach $optiongroup[$input.options.options.query] as $option}
							<option value="{$option[$input.options.options.id]}"
							{if isset($input.multiple)}
							{foreach $fields_value[$input.name] as $field_value}
								{if $field_value == $option[$input.options.options.id]}selected="selected"{/if}
							{/foreach}
							{else}
								{if $fields_value[$input.name] == $option[$input.options.options.id]}selected="selected"{/if}
							{/if}
							>{$option[$input.options.options.name]}</option>
						{/foreach}
					</optgroup>
				{/foreach}
			{else}
				{foreach $input.options.query AS $option}
					{if is_object($option)}
						<option value="{$option->$input.options.id}"
							{if isset($input.multiple)}
								{foreach $fields_value[$input.name] as $field_value}
									{if $field_value == $option->$input.options.id}selected="selected"{/if}
								{/foreach}
							{else}
								{if $fields_value[$input.name] == $option->$input.options.id}selected="selected"{/if}
							{/if}
						>{$option->$input.options.name}</option>
					{elseif $option == "-"}
						<option value="">-</option>
					{else}
						<option value="{$option[$input.options.id]}"
						{if isset($input.multiple)}
							{foreach $fields_value[$input.name] as $field_value}
								{if $field_value == $option[$input.options.id]}selected="selected"{/if}
							{/foreach}
						{else}
							{if $fields_value[$input.name] == $option[$input.options.id]}selected="selected"{/if}
						{/if}
						>{$option[$input.options.name]}</option>
					{/if}
				{/foreach}
			{/if}
		</select>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}
