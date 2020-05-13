{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<fieldset class="form-group">
    <label class="form-control-label">{l s='Select from created guides'  mod='tdsizecharts'}</label>

    <div class="row">
        <div class="col-md-6">
            <select  name="tdsizecharts[chart]" id="tdsizecharts_chart"  data-toggle="select2">
                <option value="-1" {if !isset($selectedChart) || isset($selectedChart) && ($selectedChart == -1)}selected="selected"{/if}>{l s='Inherit from category associations'  mod='tdsizecharts'}</option>
                <option value="0" {if isset($selectedChart) && ($selectedChart == 0)}selected="selected"{/if}>{l s='Disable'  mod='tdsizecharts'}</option>
                <option value="-2" disabled>- {l s='Choose (it will override category associations)'  mod='tdsizecharts'} - </option>
                {if isset($charts)}
                    {foreach from=$charts item=chart}
                        <option value="{$chart.id_tdsizechart}" {if isset($selectedChart) && ($chart.id_tdsizechart == $selectedChart)}selected="selected"{/if}>{$chart.title}</option>
                    {/foreach}
                {/if}
            </select>
        </div>
    </div>
    <hr>
    <div>{l s='Or'  mod='tdsizecharts'}</div>
 <a href="{$moduleLink}" target="_blank"><i class="material-icons">open_in_new</i> {l s='Create new guide'  mod='tdsizecharts'}</a>
</fieldset>


