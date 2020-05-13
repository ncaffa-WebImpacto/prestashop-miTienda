{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file='page.tpl'}

{block name='content'}
	<section id="main">
		{if isset($category) && $category->id_bitblogcat && $category->active}
			{if isset($no_follow) AND $no_follow}
				{assign var='no_follow_text' value='rel="nofollow"'}
			{else}
				{assign var='no_follow_text' value=''}
			{/if}
			{if $config->get('listing_show_categoryinfo', 1)}
				<div id="blog-category" class="blogs-container">
					<div class="inner">
						{if $category->image}
							<div class="row">
								<div class="category-image col-xs-12 col-sm-12 col-lg-4 col-md-6 text-center">
									<img src="{$category->image|escape:'html':'UTF-8'}" class="img-fluid" alt="" />
								</div>
								<div class="col-xs-12 col-sm-12 col-lg-8 col-md-6 category-info caption">
									{if $category->show_title}
										<h1 class="h1 page-maintitle">{$category->title|escape:'html':'UTF-8'}</h1>
									{/if}
									{$category->content_text nofilter}{* HTML form , no escape necessary *}
								</div>
							</div>
						{else}
							<div class="category-info caption">
								{if $category->show_title}
									<h1 class="h1 page-maintitle">{$category->title|escape:'html':'UTF-8'}</h1>
								{/if}
								{$category->content_text nofilter}{* HTML form , no escape necessary *}
							</div>
						{/if}
					</div>
				</div>
			{/if}

			{if $childrens && $config->get('listing_show_subcategories',1)}
				<div class="childrens">
					<h3 class="blogs-section-title">{l s='Subcategories' mod='bitblog'}</h3>
					<div class="row">
						{foreach $childrens item=children name=children}
							<div class="child-block col-lg-6">
								{if isset($children.thumb) && $children.thumb}
									<img src="{$children.thumb|escape:'html':'UTF-8'}" class="img-fluid"/>
								{/if}
								<h4 class="child-title"><a href="{$children.category_link|escape:'html':'UTF-8'}" title="{$children.title|escape:'html':'UTF-8'}">{$children.title|escape:'html':'UTF-8'}</a></h4>
								<div class="child-desc rte-content">{$children.content_text|strip_tags:'UTF-8'|truncate:160:'...' nofilter}</div>{* HTML form , no escape necessary *}
							</div>
						{/foreach}
					</div>
				</div>
			{/if}

			{if count($leading_blogs)+count($secondary_blogs)}
				<div class="recent-blogs">
					<h3 class="blogs-section-title">{l s='Recent blog posts' mod='bitblog'}</h3>
					{if count($leading_blogs)}
						<div class="leading-blog row">
							{foreach from=$leading_blogs item=blog name=leading_blog}
								{if ($smarty.foreach.leading_blog.iteration%$listing_leading_column==1)&&$listing_leading_column>1}
									<div class="row">
								{/if}

								<div class="{if $listing_leading_column<=1}no{/if} col-lg-{floor(12/$listing_leading_column|escape:'html':'UTF-8')}">
									{include file="module:bitblog/views/templates/front/default/_listing_blog.tpl"}
								</div>

								{if ($smarty.foreach.leading_blog.iteration%$listing_leading_column==0||$smarty.foreach.leading_blog.last)&&$listing_leading_column>1}
									</div>
								{/if}
							{/foreach}
						</div>
					{/if}

					{if count($secondary_blogs)}
						<div class="secondary-blog">
							{foreach from=$secondary_blogs item=blog name=secondary_blog}
								{if ($smarty.foreach.secondary_blog.iteration%$listing_secondary_column==1)&&$listing_secondary_column>1}
									<div class="row">
								{/if}

								<div class="{if $listing_secondary_column<=1}no{/if}col-lg-{floor(12/$listing_secondary_column|escape:'html':'UTF-8')}">
									{include file="module:bitblog/views/templates/front/default/_listing_blog.tpl"}
								</div>
								
								{if ($smarty.foreach.secondary_blog.iteration%$listing_secondary_column==0||$smarty.foreach.secondary_blog.last)&&$listing_secondary_column>1}
									</div>
								{/if}
							{/foreach}
						</div>
					{/if}

					<div class="top-pagination-content clearfix bottom-line">
						{include file="module:bitblog/views/templates/front/default/_pagination.tpl"}
					</div>
				</div>
			{elseif empty($childrens)}
				<div class="alert alert-warning">{l s='Sorry, We are updating data, please come back later!!!!' mod='bitblog'}</div>
			{/if}
		{else}
			<div class="alert alert-warning">{l s='Sorry, We are updating data, please come back later!!!!' mod='bitblog'}</div>
		{/if}
	</section>
{/block}
