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
<div class="tabs elementor-products-tabs">
  <div class="box-nav-tab">
    <div class="dropdown-toggle-nav-tab hidden-lg-up"></div>
    <ul class="nav nav-tabs border-0 dropdown-menu-nav-tab" role="tablist">
      {foreach from=$tabs item="tab" name=productTabs}
        <li class="nav-item">
          <a class="nav-link{if $smarty.foreach.productTabs.first} active{/if}" data-toggle="tab" href="#ptab-{$tab.uid}-{$smarty.foreach.productTabs.iteration}">{$tab.title}</a>
        </li>
      {/foreach}
    </ul>
  </div>
  <div class="tab-content">
    {foreach from=$tabs item=tab name=productTabs}
      <div id="ptab-{$tab.uid}-{$smarty.foreach.productTabs.iteration}" class="tab-pane {if $smarty.foreach.productTabs.first} active{/if}">
        {if isset($tab.products) && $tab.products}
          <div class="block_content products row{if $view == 'grid'} grid cols-xs-{$xsd} cols-sm-{$smd} cols-md-{$mdd} cols-lg-{$lgd} cols-xl-{$xld}{/if}">
            {if $view == 'carousel'}
              <div class="elementor-products-carousel owl-carousel product_list owl-arrows-{$arrows_position} owl-dots-{$dots_position}" data-owl-elementor='{$owl_options}'>
            {/if}
              {$counter=0}
              {assign var='rows' value=$rows}
              {if $rows < 1 || $rows == ''}
                {assign var='rows' value=1}
              {/if}
              {foreach from=$tab.products item=product name=productTabs}
                {if $view == 'carousel'}
                  {if $counter % $rows == 0}
                    <div class="row_items">
                  {/if}
                  {$counter = $counter+1}
                {/if}
                  {include file="catalog/_partials/miniatures/product.tpl" product=$product elementor=true style=$style}
                {if $view == 'carousel'}
                  {if $counter % $rows == 0 || $counter == count($tab.products)}
                    </div>
                  {/if}
                {/if}
              {/foreach}
            {if $view == 'carousel'}
              </div>
            {/if}
          </div>
        {else}
          <div class="alert alert-info">{l s='No Products in current tab at this time.' mod='bitelementor'}</div>
        {/if}
      </div>
    {/foreach}
  </div>
</div>
