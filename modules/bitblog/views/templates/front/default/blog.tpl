{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{extends file='page.tpl'}

{block name='content'}
	<section id="main">
		{if isset($error)}
				<div id="blogpage">
					<div class="blog-detail">
						<div class="alert alert-warning">{l s='Sorry, We are updating data, please come back later!!!!' mod='bitblog'}</div>
					</div>
				</div>
			{else}
			<div id="blogpage">
				<article class="blog-detail">
					{if $is_active}
						{if $blog->preview_url && $config->get('item_show_image','1')}
							<div class="blog-image">
								<img src="{$blog->preview_url|escape:'html':'UTF-8'}" title="{$blog->meta_title|escape:'html':'UTF-8'}" class="img-fluid" />
							</div>
						{/if}
						<h1 class="blog-title">{$blog->meta_title|escape:'html':'UTF-8'}</h1>
						<div class="blog-meta">
							{if $config->get('item_show_author','1')}
							<span class="blog-author">
								<i class="material-icons">person</i> <span>{l s='Posted By' mod='bitblog'}: </span>
								<a href="{$blog->author_link|escape:'html':'UTF-8'}" title="{$blog->author|escape:'html':'UTF-8'}">{$blog->author|escape:'html':'UTF-8'}</a>
							</span>
							{/if}

							{if $config->get('item_show_category','1')}
							<span class="blog-cat">
								<i class="material-icons">list</i> <span>{l s='In' mod='bitblog'}: </span>
								<a href="{$blog->category_link|escape:'html':'UTF-8'}" title="{$blog->category_title|escape:'html':'UTF-8'}">{$blog->category_title|escape:'html':'UTF-8'}</a>
							</span>
							{/if}

							{if $config->get('item_show_created','1')}
							<span class="blog-created">
								<i class="material-icons">&#xE192;</i> <span>{l s='On' mod='bitblog'}: </span>
								<time class="date" datetime="{strtotime($blog->date_add)|date_format:"%Y"|escape:'html':'UTF-8'}">
									{* {assign var='blog_date' value=strtotime($blog->date_add)|date_format:"%A"}
									{l s=$blog_date mod='bitblog'},	<!-- day of week --> *}
									{assign var='blog_month' value=strtotime($blog->date_add)|date_format:"%B"}
									{l s=$blog_month mod='bitblog'}		<!-- month-->
									{assign var='blog_day' value=strtotime($blog->date_add)|date_format:"%e"}
									{l s=$blog_day mod='bitblog'} <!-- day of month -->
									{assign var='blog_year' value=strtotime($blog->date_add)|date_format:"%Y"}
									{l s=$blog_year mod='bitblog'}	<!-- year -->
								</time>
							</span>
							{/if}

							{if isset($blog_count_comment)&&$config->get('item_show_counter','1')}
							<span class="blog-ctncomment">
								<i class="material-icons">comment</i> <span>{l s='Comment' mod='bitblog'}:</span>
								{$blog_count_comment|intval}
							</span>
							{/if}
							{if isset($blog->hits)&&$config->get('item_show_hit','1')}
							<span class="blog-hit">
								<i class="material-icons">favorite</i> <span>{l s='Hit' mod='bitblog'}:</span>
								{$blog->hits|intval}
							</span>
							{/if}
						</div>

						<div class="blog-description rte-content">
							{if $config->get('item_show_description',1)}
								{$blog->description nofilter}{* HTML form , no escape necessary *}
							{/if}
							{$blog->content nofilter}{* HTML form , no escape necessary *}
						</div>



						{if trim($blog->video_code)}
						<div class="blog-video-code">
							<div class="inner ">
								{$blog->video_code nofilter}{* HTML form , no escape necessary *}
							</div>
						</div>
						{/if}

						<div class="social-share">
							{include file="module:bitblog/views/templates/front/default/_social.tpl"}
						</div>
						{if $tags}
						<div class="blog-tags">
							<span>{l s='Tags:' mod='bitblog'}</span>

							{foreach from=$tags item=tag name=tag}
								 <a href="{$tag.link|escape:'html':'UTF-8'}" title="{$tag.tag|escape:'html':'UTF-8'}">{$tag.tag|escape:'html':'UTF-8'}</a>
							{/foreach}

						</div>
						{/if}

						{if !empty($samecats)||!empty($tagrelated)}
						<div class="extra-blogs row">
						{if !empty($samecats)}
							<div class="col-lg-6 col-md-6 col-xs-12">
								<span class="extra-heading">{l s='In Same Category' mod='bitblog'}</span>
								<ul class="m-0">
								{foreach from=$samecats item=cblog name=cblog}
									<li><a href="{$cblog.link|escape:'html':'UTF-8'}">{$cblog.meta_title|escape:'html':'UTF-8'}</a></li>
								{/foreach}
								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-xs-12 mt-3 mt-md-0">
								<span class="extra-heading">{l s='Related by Tags' mod='bitblog'}</span>
								<ul class="m-0">
								{foreach from=$tagrelated item=cblog name=cblog}
									<li><a href="{$cblog.link|escape:'html':'UTF-8'}">{$cblog.meta_title|escape:'html':'UTF-8'}</a></li>
								{/foreach}
								</ul>
							</div>
						{/if}
						</div>
						{/if}

						{if $productrelated}

						{/if}
						{if $config->get('item_show_listcomment','1') == 1}
							<div class="blog-comment-block clearfix">
								{if $config->get('item_comment_engine','local')=='facebook'}
									{include file="module:bitblog/views/templates/front/default/_facebook_comment.tpl"}
								{elseif $config->get('item_comment_engine','local')=='diquis'}
									{include file="module:bitblog/views/templates/front/default/_diquis_comment.tpl"}

								{else}
									{include file="module:bitblog/views/templates/front/default/_local_comment.tpl"}
								{/if}

						{elseif $config->get('item_show_listcomment','1') == 0 && $config->get('item_show_formcomment','1') == 1}
							<div class="blog-comment-block clearfix">
								{include file="module:bitblog/views/templates/front/default/_local_comment.tpl"}
							</div>
						{/if}
					{else}
						<div class="alert alert-warning">{l s='Sorry, This blog is not avariable. May be this was unpublished or deleted.' mod='bitblog'}</div>
					{/if}

				</article>
			</div>

			<div class="hidden-xl-down hidden-xl-up datetime-translate">
				{l s='Sunday' mod='bitblog'}
				{l s='Monday' mod='bitblog'}
				{l s='Tuesday' mod='bitblog'}
				{l s='Wednesday' mod='bitblog'}
				{l s='Thursday' mod='bitblog'}
				{l s='Friday' mod='bitblog'}
				{l s='Saturday' mod='bitblog'}

				{l s='January' mod='bitblog'}
				{l s='February' mod='bitblog'}
				{l s='March' mod='bitblog'}
				{l s='April' mod='bitblog'}
				{l s='May' mod='bitblog'}
				{l s='June' mod='bitblog'}
				{l s='July' mod='bitblog'}
				{l s='August' mod='bitblog'}
				{l s='September' mod='bitblog'}
				{l s='October' mod='bitblog'}
				{l s='November' mod='bitblog'}
				{l s='December' mod='bitblog'}

			</div>
		{/if}
	</section>
{/block}
