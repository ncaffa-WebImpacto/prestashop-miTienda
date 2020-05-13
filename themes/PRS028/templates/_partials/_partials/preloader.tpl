{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
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
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}

{if isset($themeOpt.g_preloader) && $themeOpt.g_preloader != "prenone"}
	<div class="loader-wrapper {$themeOpt.g_preloader}">
		<div class="loader-section style{$themeOpt.g_preloader_icon_precss}">
			{if $themeOpt.g_preloader == "preimg" && $themeOpt.g_preloader_icon_preimg != ''}
				<img src="{$themeOpt.g_preloader_icon_preimg}" alt="loader"/>
			{elseif $themeOpt.g_preloader == "precss"}
				{if $themeOpt.g_preloader_icon_precss == 1}
					<div class="box1"></div>
				{elseif $themeOpt.g_preloader_icon_precss == 2 || $themeOpt.g_preloader_icon_precss == 3}
					<div class="spinner"><div class="box1"></div><div class="box2"></div></div>
				{elseif $themeOpt.g_preloader_icon_precss == 4}
					<div class="spinner"><div class="box1"></div><div class="box2"></div><div class="box3"></div></div>
				{elseif $themeOpt.g_preloader_icon_precss == 5}
					<div class="spinner"><div class="box1"></div><div class="box2"></div><div class="box3"></div><div class="box4"></div><div class="box5"></div></div>
				{/if}
			{/if}
		</div>
	</div>
{/if}