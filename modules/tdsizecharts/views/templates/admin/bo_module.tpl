{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<div class="panel"><h3><i class="icon-list-ul"></i> {l s='Charts list' mod='tdsizecharts'}
    <span class="panel-heading-action">
        <a id="desc-product-new" class="list-toolbar-btn" href="{$link->getAdminLink('AdminModules')}&configure={$module}&addTdSizeChart=1">
            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="{l s='Add new' mod='tdsizecharts'}" data-html="true">
                <i class="process-icon-new "></i>
            </span>
        </a>
    </span>
    </h3>
    <div id="chartsContent">
        <div id="tdCharts">
            {foreach from=$charts item=chart}
                <div id="charts_{$chart.id_tdsizechart}" class="panel">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="pull-left">
                                #{$chart.id_tdsizechart} - {$chart.title}
                                {if $chart.is_shared}
                                    <div>
                                        <span class="label color_field pull-left" style="background-color:#108510;color:white;margin-top:5px;">
                                            {l s='Shared chart' mod='tdsizecharts'}
                                        </span>
                                    </div>
                                {/if}
                            </h4>
                            <div class="btn-group-action pull-right">
                                <a class="btn btn-default"
                                    href="{$link->getAdminLink('AdminModules')}&configure={$module}&updatetdsizecharts=1&id_tdsizechart={$chart.id_tdsizechart}">
                                    <i class="icon-edit"></i>
                                    {l s='Edit' mod='tdsizecharts'}
                                </a>
                                <a class="btn btn-default"
                                    href="{$link->getAdminLink('AdminModules')}&configure={$module}&deletetdsizecharts=1&id_tdsizechart={$chart.id_tdsizechart}">
                                    <i class="icon-trash"></i>
                                    {l s='Delete' mod='tdsizecharts'}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</div>
