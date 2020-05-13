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
<nav class="pagination" {if $themeOpt.pl_infinite != 'default'}hidden{/if}>
  {* <div class="product-count">
    {block name='pagination_summary'}
      {l s='Showing %from%-%to% of %total% item(s)' d='Shop.Theme.Catalog' sprintf=['%from%' => $pagination.items_shown_from ,'%to%' => $pagination.items_shown_to, '%total%' => $pagination.total_items]}
    {/block}
  </div> *}
  <div class="pagination_bottom">
    {block name='pagination_page_list'}
      {if $pagination.should_be_displayed}
        <ul class="page-list justify-content-center">
          {foreach from=$pagination.pages item="page"}
            <li class="{if $page.type}{$page.type}{/if}{if $page.current} current{/if}{if !$page.clickable && !$page.current} disabled{/if}">
              {if $page.type === 'spacer'}
                <span class="spacer">&hellip;</span>
              {else}
                <a
                  rel="{if $page.type === 'previous'}prev{elseif $page.type === 'next'}next{else}nofollow{/if}"
                  href="{if $page.page == 1}{$page.url|replace:'?page=1':''|replace:'&page=1':''}{else}{$page.url}{/if}"
                  class="{if $page.type === 'previous'}previous {elseif $page.type === 'next'}next {/if}{['disabled' => !$page.clickable, 'js-search-link' => true]|classnames}"
                >
                  {if $page.type === 'previous'}
                    <span class="sr-only">{l s='Previous' d='Shop.Theme.Actions'}</span>
                    <i class="material-icons" aria-hidden="true">&#xE314;</i>
                  {elseif $page.type === 'next'}
                    <span class="sr-only">{l s='Next' d='Shop.Theme.Actions'}</span>
                    <i class="material-icons" aria-hidden="true">&#xE315;</i>
                  {else}
                    {$page.page}
                  {/if}
                </a>
              {/if}
            </li>
          {/foreach}
        </ul>
      {/if}
    {/block}
  </div>
</nav>
{if $themeOpt.pl_infinite != 'default'}
  <div class="text-center load-product {$themeOpt.pl_infinite}">
    {if $themeOpt.pl_infinite == 'scroll'}
      <div class="preload d-none">
        <div class="loading">
          <div></div><div></div><div></div><div></div><div></div>
        </div>
      </div>
      <div class="loading-msg d-none">
        {l s='No more products to load. Reached end of list!' d='Shop.Theme.Actions'}
      </div>
    {elseif $themeOpt.pl_infinite == 'button'}
      <div class="preload d-none">
        <div class="loading">
          <div></div><div></div><div></div><div></div><div></div>
        </div>
      </div>
      <a class="prdLink btn btn-primary" href="#">
        {l s='Load more' d='Shop.Theme.Actions'}
      </a>
      <div class="loading-msg d-none">
        {l s='No more products to load. Reached end of list!' d='Shop.Theme.Actions'}
      </div>
    {/if}
  </div>
{/if}