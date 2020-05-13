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

<section class="elementor-products">
    {if isset($products) && $products}
        <div class="block_content products row {if $view == 'grid'} grid cols-xs-{$xsd} cols-sm-{$smd} cols-md-{$mdd} cols-lg-{$lgd} cols-xl-{$xld}{else}tdcarousel{/if}">
            {if $view == 'carousel'}
                <div class="elementor-products-carousel owl-carousel product_list owl-arrows-{$arrows_position} owl-dots-{$dots_position}" data-owl-elementor='{$owl_options}'>
            {/if}
                {$counter=0}
                {assign var='rows' value=$rows}
                {if $rows < 1 || $rows == ''}
                    {assign var='rows' value=1}
                {/if}

                {foreach from=$products item=product}
                    {if $view == 'carousel'}
                        {if $counter % $rows == 0}
                            <div class="row_items">
                        {/if}
                        {$counter = $counter+1}
                    {/if}
                    {include file="catalog/_partials/miniatures/product.tpl" product=$product elementor=true style=$style}
                    {if $view == 'carousel'}
                        {if $counter % $rows == 0 || $counter == count($products)}
                            </div>
                        {/if}
                    {/if}
                {/foreach}
            {if $view == 'carousel'}
                </div>
            {/if}
        </div>
    {else}
        <div class="alert alert-info">{l s='No Products at this time.' mod='bitelementor'}</div>
    {/if}
</section>
