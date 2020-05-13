{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<article class="blog-item">
	<div class="blog-image-container">
		{if $blog.image && $config->get('listing_show_image',1)}
			<div class="blog-image">
				<img src="{$blog.preview_url|escape:'html':'UTF-8'}" title="{$blog.title|escape:'html':'UTF-8'}" alt="" class="img-fluid" />
			</div>
		{/if}
	</div>
	<div class="blog-info">
		{if $config->get('listing_show_title','1')}
			<h4 class="title">
				<a href="{$blog.link|escape:'html':'UTF-8'}" title="{$blog.title|escape:'html':'UTF-8'}">{$blog.title|escape:'html':'UTF-8'}</a>
			</h4>
		{/if}
		<div class="blog-meta">
			{if $config->get('listing_show_author','1')&&!empty($blog.author)}
				<span class="blog-author">
					<i class="material-icons">person</i> <span>{l s='Posted By' mod='bitblog'}:</span>
					<a href="{$blog.author_link|escape:'html':'UTF-8'}" title="{$blog.author|escape:'html':'UTF-8'}">{$blog.author|escape:'html':'UTF-8'}</a>
				</span>
			{/if}

			{if $config->get('listing_show_category','1')}
				<span class="blog-cat">
					<i class="material-icons">list</i> <span>{l s='In' mod='bitblog'}:</span>
					<a href="{$blog.category_link|escape:'html':'UTF-8'}" title="{$blog.category_title|escape:'html':'UTF-8'}">{$blog.category_title|escape:'html':'UTF-8'}</a>
				</span>
			{/if}

			{if $config->get('listing_show_created','1')}
				<span class="blog-created">
					<i class="material-icons">&#xE192;</i> <span>{l s='On' mod='bitblog'}: </span>
					<time class="date" datetime="{strtotime($blog.date_add)|date_format:"%Y"|escape:'html':'UTF-8'}">
						{* {assign var='blog_date' value=strtotime($blog.date_add)|date_format:"%A"}
						{l s=$blog_date mod='bitblog'},	<!-- day of week --> *}
						{assign var='blog_month' value=strtotime($blog.date_add)|date_format:"%B"}
						{l s=$blog_month mod='bitblog'}		<!-- month-->
						{assign var='blog_day' value=strtotime($blog.date_add)|date_format:"%e"}
						{l s=$blog_day mod='bitblog'} <!-- day of month -->
						{assign var='blog_year' value=strtotime($blog.date_add)|date_format:"%Y"}
						{l s=$blog_year mod='bitblog'}	<!-- year -->
					</time>
				</span>
			{/if}

			{if isset($blog.comment_count)&&$config->get('listing_show_counter','1')}
				<span class="blog-ctncomment">
					<i class="material-icons">comment</i> <span>{l s='Comment' mod='bitblog'}:</span>
					{$blog.comment_count|intval}
				</span>
			{/if}

			{if $config->get('listing_show_hit','1')}
				<span class="blog-hit">
					<i class="material-icons">favorite</i> <span>{l s='Hit' mod='bitblog'}:</span>
					{$blog.hits|intval}
				</span>
			{/if}
		</div>

		{if $config->get('listing_show_description','1')}
			<div class="blog-shortinfo">
				{$blog.description|strip_tags:'UTF-8'|truncate:140:'...' nofilter}{* HTML form , no escape necessary *}
			</div>
		{/if}

		{if $config->get('listing_show_readmore',1)}
			<div class="readmore-btn">
				<a href="{$blog.link|escape:'html':'UTF-8'}" title="{$blog.title|escape:'html':'UTF-8'}" class="more btn btn-primary">{l s='Read more' mod='bitblog'}</a>
			</div>
		{/if}
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
</article>
