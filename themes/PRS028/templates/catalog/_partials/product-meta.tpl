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
{if $themeOpt.pp_tags == '1' || $themeOpt.pp_cats == '1'}
    <div class="js-product-meta">
        {if $themeOpt.pp_tags == '1'}
            {block name='product_tags'}
                {assign var='tags' value=Tag::getProductTags(Tools::getValue('id_product'))}
                {assign var='id_lang' value=$language.id}
                {if $tags[$id_lang]}
                    <div class="product-tags">
                        <label class="label">{l s='Tags:' d='Shop.Theme.Catalog'}</label>
                        {foreach from=$tags[$id_lang] key=k item=tags}
                            {foreach from=$tags item=tag name=tag}
                                <a href="{$link->getPageLink('search', true, NULL, "tag={$tag|urlencode}")}">{$tag|escape:html:'UTF-8'}</a>
                            {/foreach}
                        {/foreach}
                    </div>
                {/if}
            {/block}
        {/if}

        {if $themeOpt.pp_cats == '1'}
            {block name='product_categorie'}
                <div class="product-cats">
                    <label class="label">{l s='Categories:' d='Shop.Theme.Catalog'}</label>
                    {foreach from=Product::getProductCategoriesFull(Tools::getValue('id_product')) item=cat name=cat}
                        <a href="{$link->getCategoryLink({$cat.id_category})}">{$cat.name}</a>
                    {/foreach}
                </div>
            {/block}
        {/if}
    </div><!-- /.modal -->
{/if}
