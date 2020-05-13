{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<div class="panel"><h3><i class="icon-list-ul"></i> {l s='Tabs list' mod='tdadditionaltabs'}
    <span class="panel-heading-action">
        <a id="desc-product-new" class="list-toolbar-btn" href="{$link->getAdminLink('AdminModules')}&configure={$module}&addTdAdditionalTab=1">
            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="{l s='Add new' mod='tdadditionaltabs'}" data-html="true">
                <i class="process-icon-new "></i>
            </span>
        </a>
    </span>
    </h3>
    <div id="tabsContent">
        <div id="tabs">
            {foreach from=$tabs item=tab}
                <div id="tabs_{$tab.id_tdadditionaltab}" class="panel">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="pull-left">
                             <span><i class="icon-arrows"></i></span>
                                #{$tab.id_tdadditionaltab} - {$tab.title}
                                {if $tab.is_shared}
                                    <div>
                                        <span class="label color_field pull-left" style="background-color:#108510;color:white;margin-top:5px;">
                                            {l s='Shared tab' mod='tdadditionaltabs'}
                                        </span>
                                    </div>
                                {/if}
                            </h4>
                            <div class="btn-group-action pull-right">
                                {$tab.status}
                                <a class="btn btn-default"
                                    href="{$link->getAdminLink('AdminModules')}&configure={$module}&updatetdadditionaltabs=1&id_tdadditionaltab={$tab.id_tdadditionaltab}">
                                    <i class="icon-edit"></i>
                                    {l s='Edit' mod='tdadditionaltabs'}
                                </a>
                                <a class="btn btn-default"
                                    href="{$link->getAdminLink('AdminModules')}&configure={$module}&deletetdadditionaltabs=1&id_tdadditionaltab={$tab.id_tdadditionaltab}">
                                    <i class="icon-trash"></i>
                                    {l s='Delete' mod='tdadditionaltabs'}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</div>
