{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<!-- Block RSS module-->
<div id="rss_block_left" class="block">
	<h4 class="title_block">{$title|escape:'html':'UTF-8'}</h4>
	<div class="block_content">
		{if $rss_links}
			<ul>
				{foreach from=$rss_links item='rss_link'}
					<li><a href="{$rss_link.url|escape:'html':'UTF-8'}" title="{$rss_link.title|escape:'html':'UTF-8'}">{$rss_link.title|escape:'html':'UTF-8'}</a></li>
				{/foreach}
			</ul>
		{else}
			<p>{l s='No RSS feed added' mod='bitblog'}</p>
		{/if}
	</div>
</div>
<!-- /Block RSS module-->
