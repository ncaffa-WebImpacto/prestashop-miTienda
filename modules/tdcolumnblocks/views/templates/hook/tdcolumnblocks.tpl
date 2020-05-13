{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{if $columnBlocks}
	{foreach from=$columnBlocks item=block name=columnBlocks}
		{assign var=_expand_id value=10|mt_rand:100000}
		<div class="block clearfix {$block.custom_class}">
			{if $block.block_type == $blocktype_product }
				<h4 class="title_block hidden-md-down">{$block.title}</h4>
  				<a href="#tdcolumn_block_{$_expand_id}" class="h4 hidden-lg-up title_block" data-toggle="collapse">{$block.title}</a>
				<div id="tdcolumn_block_{$_expand_id}" class="block_content row products-block {$block.product_thumb} collapse show" data-collapse-hide-mobile>
					{if $block.products}
						<!-- Custom start -->
						{if $block.enable_slider}
							<div class="owl-carousel products" data-owl-carousel='{ "nav": false, "dots": false, "autoplay": {$block.auto_scroll}, "autoplayTimeout": 5000, "items": 1 }'>
						{else}
							<div class="products grid">
						{/if}

						<!-- Custom End -->
						{$counter=0}
						{assign var='rows' value=$block.slider_row}
						{if $rows < 1 || $rows == ''}
							{assign var='rows' value=1}
						{/if}
						{foreach from=$block.products item=product}
							{if $block.enable_slider}
								{if $counter % $rows == 0}
									<div class="row_items">
								{/if}
								{$counter = $counter+1}
							{/if}
							<article class="product-miniature js-product-miniature">
								{include file='catalog/_partials/miniatures/_partials/product-miniature-left.tpl' product=$product}
							</article>
							{if $block.enable_slider}
								{if $counter % $rows == 0 || $counter == count($block.products)}
									</div>
								{/if}
							{/if}
						{/foreach}

						{if $block.enable_slider}
							</div>
						{else}
							</div>
						{/if}
					{else}
						<div class="alert alert-info">{l s='No Products at this time.' mod='tdcolumnblocks'}</div>
					{/if}
				</div>
			{elseif $block.block_type == $blocktype_html}
				<div class="static-html typo rte-content">
					{$block.static_html nofilter}
				</div>
			{/if}
		</div>
	{/foreach}
{/if}
