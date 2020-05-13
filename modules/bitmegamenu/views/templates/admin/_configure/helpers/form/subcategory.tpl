{**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
{foreach $categories as $category}
	<option value="{$category.id}" {if isset($ids) && $type == 2 && in_array($category.id, $ids)}selected{/if} > {$category.name}</option>
	{if isset($category.children)}

		{if isset($ids) && $type == 2}
			{include file="./subcategory.tpl" categories=$category.children ids=$ids type=$type}
		{else}
			{include file="./subcategory.tpl" categories=$category.children}
		{/if}
	{/if}
{/foreach}
