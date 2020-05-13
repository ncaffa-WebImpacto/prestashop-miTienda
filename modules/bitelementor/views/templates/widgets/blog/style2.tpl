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
<div class="blog-container col-12">
	<div class="blog_post">
		<div class="blog-image-container">
			<a class="blog_img_link" href="{$post.link|escape:'html':'UTF-8'}" title="{$post.title|escape:'html':'UTF-8'}">
				<img class="img-fluid" src="{if (isset($post.preview_thumb_url) && $post.preview_thumb_url != '')}{$post.preview_thumb_url}{else}{$post.preview_url}{/if}{*full url can not escape*}" alt="{if !empty($post.legend)}{$post.legend|escape:'html':'UTF-8'}{else}{$post.title|escape:'html':'UTF-8'}{/if}" title="{if !empty($post.legend)}{$post.legend|escape:'html':'UTF-8'}{else}{$post.title|escape:'html':'UTF-8'}{/if}" {if isset($formAtts.bleoblogs_width)}width="{$formAtts.bleoblogs_width|escape:'html':'UTF-8'}" {/if} {if isset($formAtts.bleoblogs_height)} height="{$formAtts.bleoblogs_height|escape:'html':'UTF-8'}" {/if} />
			</a>
		</div>
		<div class="blog_content">
			<div class="blog_title">
				<a href="{$post.link}" title="{$post.title|escape:'html':'UTF-8'}">{$post.title|strip_tags:'UTF-8'|truncate:40:'...'}</a>
			</div>
			<div class="blog_meta">
				<span class="blog_author mr-3"><i class="fa fa-book mr-2"></i>{$post.author|escape:'html':'UTF-8'}</span>
				<span class="blog_comment"> <i class="fa fa-comments mr-2"></i>{l s='Comment' mod='bitelementor'}:</span> {$post.comment_count|intval}
			</div>
			<div class="rte-content">
				<p class="blog_desc">
					{$post.description|strip_tags:'UTF-8'|truncate:80:'...'}
				</p>
			</div>
			<div class="readmore_btn">
				<a class="more" href="{$post.link|escape:'html':'UTF-8'}" title="{$post.title|escape:'html':'UTF-8'}">{l s='Read more' mod='bitelementor'}</a>
			</div>
		</div>
	</div>
</div>