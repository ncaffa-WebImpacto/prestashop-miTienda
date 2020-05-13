{**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{function name="mobile_links" nodes=[] first=false}
	{strip}
		{if $nodes|count}
			{if !$first}<ul>{/if}
			{foreach from=$nodes item=node}
				{if isset($node.title)}
					<li>{if isset($node.children)}<span class="mm-expand"><i class="fa fa-angle-down" aria-hidden="true"></i></span>{/if}<a href="{$node.href}">{$node.title}</a>
						{if isset($node.children)}
							{mobile_links nodes=$node.children first=false}
						{/if}
					</li>
				{/if}
			{/foreach}
			{if !$first}</ul>{/if}
		{/if}
	{/strip}
{/function}


{if isset($menu)}
	{mobile_links nodes=$menu first=true}
{/if}
