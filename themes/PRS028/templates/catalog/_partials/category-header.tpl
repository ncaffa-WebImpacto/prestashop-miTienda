{**
 * 2007-2018 PrestaShop.
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
<div id="js-product-list-header">
  {if $listing.pagination.items_shown_from == 1}
    <div class="block-category">
      <h1 class="h1 page-maintitle">{$category.name}{if isset($smarty.get.page) && $smarty.get.page > 1} <span class="small"> - Page {$smarty.get.page}</span>{/if}</h1>
      {if $themeOpt.cat_image == 1}
        {if $category.image.bySize.category_default.url}
          <div class="category-cover mb-2">
            <img src="{$category.image.bySize.category_default.url}" alt="{if !empty($category.image.legend)}{$category.image.legend}{else}{$category.name}{/if}" width="{$category.image.bySize.category_default.width}" height="{$category.image.bySize.category_default.height}">
          </div>
        {/if}
      {/if}
      {if $themeOpt.cat_desc == 1}
          {if $category.description}
              <div class="category-description">{$category.description nofilter}</div>
          {/if}
      {/if}
    </div>

    {if $themeOpt.cat_sub_thumbs == 1}
      {if isset($subcategories) && $subcategories}
        <div class="subcategories {if $themeOpt.cat_sub_hide_mobile} hidden-sm-down{/if}">
          <div class="row">
            {foreach from=$subcategories item=subcategory}
              <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-15">
                <div class="subcategory-image">
                  <a href="{$subcategory.url}">
                    {if $subcategory.image.bySize.category_default.url}
                      <img src="{$subcategory.image.bySize.category_default.url}" alt="{$subcategory.name}" width="{$subcategory.image.bySize.category_default.width}" height="{$subcategory.image.bySize.category_default.height}" class="img-fluid"/>
                    {else}
                      <img src="{$urls.img_cat_url}{$language.iso_code}-default-category_default.jpg" alt="{$subcategory.name}" />
                    {/if}
                  </a>
                </div>
                <a class="subcategory-name d-block text-center" href="{$subcategory.url}">{$subcategory.name nofilter}</a>
              </div>
            {/foreach}
          </div>
        </div>
      {/if}
    {/if}
  {/if}
</div>