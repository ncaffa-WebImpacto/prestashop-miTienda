{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
<div id="_desktop_search" class="searchwrap">
    <div class="tdsearchblock clearfix">
        <div id="search_block_top">
            <form method="get" action="{$search_controller_url|escape:'html':'UTF-8'}" id="searchbox">
                <input name="controller" value="search" type="hidden">
                <input name="orderby" value="position" type="hidden">
                <input name="orderway" value="desc" type="hidden">
                {if isset($searchCategoryList) && $searchCategoryList}
                    <div class="searchboxform-control">
                        <select name="search_category" id="search_category" onclick="event.stopPropagation();">
                            <option value="all">{l s='All Categories' mod='tdsearchblock'}</option>
                            {$search_category|escape:'quotes':'UTF-8' nofilter}
                        </select>
                    </div>
                {/if}
                <button type="submit" name="submit_search" class="btn btn-primary button-search">
                    {* {l s='Search' mod='tdsearchblock'} *}
                    <i class="icofont-search-1"></i>
                </button>
                <div class="input-wrapper">
                    <input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="{l s='Search Products Here' mod='tdsearchblock'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" autocomplete="off" />
                </div>
                <div id="td_ajax_search_url" style="display:none">
                    <input type="hidden" value="{$base_ssl|escape:'html':'UTF-8'}/ajax_search.php" class="ajaxUrl" />
                </div>
            </form>
        </div>
    </div>
</div>