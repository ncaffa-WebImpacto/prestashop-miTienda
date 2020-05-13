{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{if isset($charts) && $charts}
    <div class="tdsize-chart">
        <a class="schart tip_inside" href="#tdsizecharts-{$product.id}">
            <svg width="18px" height="18px" fill="currentcolor">
                <use xlink:href="#schart"></use>
            </svg>
            <span>{l s='Size chart' mod='tdsizecharts'}</span>
            <span class ="tip">{l s='Size chart' mod='tdsizecharts'}</span>
        </a>
    </div>

    <div id="tdsizecharts-{$product.id}" class="tdsizecharts mfp-hide">
        {if count($charts) > 1}
            <ul class="nav nav-tabs">
                {foreach from=$charts key=i item=chart name=charts}
                    <li class="nav-item">
                        <a class="nav-link{if $smarty.foreach.charts.first} active{/if}" data-toggle="tab" href="#tdcharts-tab-{$i}">
                            {$chart.title}
                        </a>
                    </li>
                {/foreach}
            </ul>
        {/if}

        <div class="tab-content" id="tab-content">
            {foreach from=$charts key=i item=chart name=charts}
                <div class="tab-pane in{if $smarty.foreach.charts.first} active{/if}" id="tdcharts-tab-{$i}">
                    <div class="rte-content">{$chart.description nofilter}</div>
                </div>
            {/foreach}
        </div>
    </div>
{/if}
