{**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
<ul>
	{foreach $childrens as $children}
		{if isset($children.title)}
			<li>
				{if isset($children.children)}<div class="responsiveInykator">+</div>{/if}
				<a href="{$children.href}">{$children.title}</a>
				{if isset($children.children)}
					{include file="./front_link.tpl" childrens=$children.children}
				{/if}
			</li>
		{/if}
	{/foreach}
</ul>
