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
{extends file='layouts/layout-both-columns.tpl'}
{*extends file=$layout*}

{if $themeOpt.cat_layout == 1}
  {block name="left_column"}
    <div id="left-column" class="col-12 col-lg-3 order-2 order-lg-1">
      {hook h="displayVerticalMenu"}
      {hook h='displayLeftColumn'}
    </div>
  {/block}
  {block name='right_column'}{/block}
  {block name='contentWrapperClass'}left-column col-12 col-lg-9 order-1 order-lg-2{/block}
{elseif $themeOpt.cat_layout == 2}
  {block name="left_column"}{/block}
  {block name='right_column'}
    <div id="right-column" class="col-12 col-lg-3 order-2">
      {hook h='displayRightColumn'}
    </div>
  {/block}
  {block name='contentWrapperClass'}right-column col-12 col-lg-9 order-1{/block}
{else}
  {block name='left_column'}{/block}
  {block name='right_column'}{/block}
  {block name='contentWrapperClass'}col-12{/block}
{/if}

{block name='content'}
  <section id="main">
    {block name='product_list_header'}
      <h1 id="js-product-list-header" class="h1 page-maintitle">{$listing.label}</h1>
    {/block}

    <section id="products">
      {if $listing.products|count}

        <div id="product-list-top">
          {block name='product_list_top'}
            {include file='catalog/_partials/products-top.tpl' listing=$listing}
          {/block}
        </div>

        {block name='product_list_active_filters'}
          <div id="active-filters" class="">
            {$listing.rendered_active_filters nofilter}
          </div>
        {/block}

        <div id="product-list">
          {block name='product_list'}
            {include file='catalog/_partials/products.tpl' listing=$listing}
          {/block}
        </div>

        <div id="js-product-list-bottom">
          {block name='product_list_bottom'}
            {include file='catalog/_partials/products-bottom.tpl' listing=$listing}
          {/block}
        </div>

      {else}
        <div id="js-product-list-top"></div>
        <div id="js-product-list">
          {include file='errors/not-found.tpl'}
        </div>
        <div id="js-product-list-bottom"></div>
      {/if}
    </section>

  </section>
{/block}
