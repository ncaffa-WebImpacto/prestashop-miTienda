{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div id="js-product-list-top" class="row justify-content-between products-selection align-items-center">
  {if !empty($listing.rendered_facets)}
    <div class="col col-auto facated-toggler {if $themeOpt.cat_layout != 3} hidden-lg-up{/if}">
      <div class="filter-button">
        <button type="button" id="search_filter_toggler" class="btn btn-secondary" data-target="#offcanvas_search_filter" data-toggle="modal">
          <svg width="16px" height="16px" fill="currentcolor" class="mr-2">
            <use xlink:href="#pp_filter"></use>
          </svg>
          {l s='Filter' d='Shop.Theme.Actions'}
        </button>
      </div>
    </div>
  {/if}

  {foreach from=$listing.sort_orders item=sort_order}
    {if $sort_order.current}
      {if isset($sort_order.url)}
        {assign var="currentSortUrl" value=$sort_order.url|regex_replace:"/&productListView=\d+$/":""}
      {/if}
      {break}
    {/if}
  {/foreach}

  {if !isset($currentSortUrl)}
    {if isset($sort_order.url)}
      {assign var="currentSortUrl" value=$sort_order.url|regex_replace:"/&productListView=\d+$/":""}
    {/if}
  {/if}

  {if isset($currentSortUrl)}
    <div class="col view-switcher hidden-sm-down">
      <a href="{$currentSortUrl}&productListView=grid" class="{if $themeOpt.pl_layout == 'grid'}current{/if} {['js-search-link' => true]|classnames}" rel="nofollow">
        <svg width="20px" height="20px">
          <use xlink:href="#grid"></use>
        </svg>
      </a>
      <a href="{$currentSortUrl}&productListView=list" class="{if $themeOpt.pl_layout == 'list'}current{/if} {['js-search-link' => true]|classnames}" rel="nofollow">
        <svg width="30px" height="30px">
          <use xlink:href="#list"></use>
        </svg>
      </a>
    </div>
  {else}
    {if isset($smarty.get.q) || isset($smarty.get.page) || isset($smarty.get.productListView)}
      {foreach from=$listing.pagination.pages item="page"}
        {if $page.current}
          {assign var="currentSortUrl2" value=$page.url|regex_replace:"/&productListView=\d+$/":""}
        {/if}
      {/foreach}
      <div class="col view-switcher hidden-sm-down">
        <a href="{$currentSortUrl2}&productListView=grid" class="{if $themeOpt.pl_layout == 'grid'}current{/if} {['js-search-link' => true]|classnames}" rel="nofollow">
          <svg width="20px" height="20px">
            <use xlink:href="#grid"></use>
          </svg>
        </a>
        <a href="{$currentSortUrl2}&productListView=list" class="{if $themeOpt.pl_layout == 'list'}current{/if} {['js-search-link' => true]|classnames}" rel="nofollow">
          <svg width="30px" height="30px">
            <use xlink:href="#list"></use>
          </svg>
        </a>
      </div>
    {else}
      {foreach from=$listing.pagination.pages item="page"}
        {if $page.current}
          {assign var="currentSortUrl2" value=$page.url|regex_replace:"/&productListView=\d+$/":""}
        {/if}
      {/foreach}
      <div class="col view-switcher hidden-sm-down">
        <a href="{$currentSortUrl2}?productListView=grid" class="{if $themeOpt.pl_layout == 'grid'}current{/if} {['js-search-link' => true]|classnames}" rel="nofollow">
          <svg width="20px" height="20px">
            <use xlink:href="#grid"></use>
          </svg>
        </a>
        <a href="{$currentSortUrl2}?productListView=list" class="{if $themeOpt.pl_layout == 'list'}current{/if} {['js-search-link' => true]|classnames}" rel="nofollow">
          <svg width="30px" height="30px">
            <use xlink:href="#list"></use>
          </svg>
        </a>
      </div>
    {/if}
  {/if}

  <div class="col col-auto box-sort-by">
    <span class="showing hidden-sm-down">
      {if $themeOpt.pl_infinite != 'default'}
        {l s='%total% product(s)' d='Shop.Theme.Catalog' sprintf=[
        '%total%' => $listing.pagination.total_items
        ]}
      {else}
        {l s='Showing %from%-%to% of %total% product(s)' d='Shop.Theme.Catalog' sprintf=[
        '%from%' => $listing.pagination.items_shown_from,
        '%to%' => $listing.pagination.items_shown_to,
        '%total%' => $listing.pagination.total_items
        ]}
      {/if}
    </span>
    {block name='sort_by'}
      {include file='catalog/_partials/sort-orders.tpl' sort_orders=$listing.sort_orders}
    {/block}
  </div>
</div>
