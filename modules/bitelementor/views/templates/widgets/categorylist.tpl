{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<section class="elementor-categorylist">
    {if isset($categories) && $categories}
        {$categorycount = 1}
        <div class="block_content row {$style}{if $view == 'grid'} grid cols-xs-{$xsd} cols-sm-{$smd} cols-md-{$mdd} cols-lg-{$lgd} cols-xl-{$xld}{/if}">
            {if $view == 'carousel'}
                <div class="elementor-category-carousel owl-carousel category_list owl-arrows-{$arrows_position} owl-dots-{$dots_position}" data-owl-elementor='{$owl_options}'>
            {/if}
                {$counter=0}
                {assign var='rows' value=$rows}
                {if $rows < 1 || $rows == ''}
                    {assign var='rows' value=1}
                {/if}

                {foreach from=$categories item=cat}
                    {if $view == 'carousel'}
                        {if $counter % $rows == 0}
                            <div class="row_items">
                        {/if}
                        {$counter = $counter+1}
                    {/if}
                    {include file="module:bitelementor/views/templates/widgets/category/{$style}.tpl"}
                    {* <div class="categoryblock{$categorycount} categoryblock col-12">
                        {if $showimage == 'yes'}   
                            <div class="categoryimage">
                                <img src="{$cat.image_url}" alt="{$cat.name|escape:'html':'UTF-8'}" />
                            </div>
                        {/if}  
                        <div class="categorylist">
                            {if $showtitle == 'yes'}   
                                <div class="cate-heading">
                                    <a href="{url entity='category' id=$cat.id_category id_lang=$id_lang}">
                                        {$cat.name|escape:'html':'UTF-8'}
                                    </a>
                                </div>
                            {/if}
                            {if $showsubcategory == 'yes'}      
                                <div class="categories-info-content">
                                    {if $cat.subcategories}
                                        <ul class="sub-categories">
                                            {foreach from=$cat.subcategories item=subcategory name=subcategory_name}
                                                <li>
                                                    <a href="{url entity='category' id=$subcategory.id_category id_lang=$id_lang}" >{$subcategory.name|escape:'htmlall':'UTF-8'}</a>
                                                </li>
                                            {/foreach}
                                        </ul>
                                    {/if}
                                </div>
                            {/if}  
                        </div>
                    </div> *}
                    {$categorycount = $categorycount + 1}
                    {if $view == 'carousel'}
                        {if $counter % $rows == 0 || $counter == count($categories)}
                            </div>
                        {/if}
                    {/if}
                {/foreach}
            {if $view == 'carousel'}
                </div>
            {/if}
        </div>
    {else}
        <div class="alert alert-info">{l s='No category at this time.' mod='bitelementor'}</div>
    {/if}
</section>