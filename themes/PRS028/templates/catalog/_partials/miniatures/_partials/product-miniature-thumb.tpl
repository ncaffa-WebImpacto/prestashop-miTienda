{**
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2017 PrestaShop SA
* @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}
<a href="{$product.url}" class="thumbnail product-thumbnail d-block">
    {if $product.cover}
        {if $themeOpt.pl_rollover}
            {foreach from=$product.images item=image}
                {if !$image.cover}
                    <img
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        data-src="{$image.bySize.home_default.url}"
                        width = "{$image.bySize.home_default.width}"
                        height = "{$image.bySize.home_default.height}"
                        alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
                        class="img-fluid img_1 lazyload"
                    />
                    {break}
                {/if}
            {/foreach}
        {/if}
        <img
            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            data-src="{$product.cover.bySize.home_default.url}"
            width = "{$product.cover.bySize.home_default.width}"
            height = "{$product.cover.bySize.home_default.height}"
            alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
            data-full-size-image-url="{$product.cover.large.url}"
            class="img-fluid lazyload"
        />
    {elseif isset($urls.no_picture_image)}
        <img
            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            data-src="{$urls.no_picture_image.bySize.home_default.url}"
            width = "{$urls.no_picture_image.bySize.home_default.width}"
            height = "{$urls.no_picture_image.bySize.home_default.height}"
            alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
            class="img-fluid lazyload"
        />
    {else}
        <img class="img-fluid lazyload" src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" />
    {/if}
</a>
{block name='product_flags'}
    <ul class="product-flags">
        {foreach from=$product.flags item=flag}
            <li class="product-flag {$flag.type}">{$flag.label}</li>
        {/foreach}
    </ul>
{/block}
