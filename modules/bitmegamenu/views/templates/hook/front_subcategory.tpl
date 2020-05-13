{**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<ul class="{if $level==1}cbp-links cbp-category-tree{elseif $level==2}cbp-hrsub-level2{elseif $level==3}cbp-hrsub-level2 cbp-hrsub-level3{/if}">
	{foreach $categories as $category}
		{if isset($category.title)}
			<li {if isset($category.children)}class="{if $level==1}cbp-hrsub-haslevel2{else}cbp-hrsub-haslevel3{/if}"{/if}>
				<div class="cbp-category-link-w">
					<a href="{$category.href}">{$category.title}</a>
					{if isset($category.children)}
						{include file="./front_subcategory.tpl" categories=$category.children level=$level+1}
					{/if}
				</div>
			</li>
		{/if}
	{/foreach}
</ul>
