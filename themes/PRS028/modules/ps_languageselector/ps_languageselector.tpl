{**
 * 2007-2018 PrestaShop
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
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div id="_desktop_language_selector">
  <div id="language_selector">
    <div class="language-selector-wrapper">
     <span id="language-selector-label" class="d-inline-block d-lg-none">{l s='Language : ' d='Shop.Theme.Global'}</span>
      <div class="language-selector dropdown js-dropdown">
        <a class="expand-more hidden-md-down" data-display="static" data-toggle="dropdown">
          <img class="mr-1" src="{$urls.img_lang_url}{$current_language.id_lang}.jpg" alt="{$current_language.name_simple}" />
          {$current_language.name_simple}
        </a>
        <ul class="dropdown-menu hidden-md-down">
          {foreach from=$languages item=language}
            <li {if $language.id_lang == $current_language.id_lang} class="current" {/if}>
              <a href="{url entity='language' id=$language.id_lang}" class="dropdown-item" data-iso-code="{$language.iso_code}">{$language.name_simple}</a>
            </li>
          {/foreach}
        </ul>
        <select class="link hidden-lg-up" aria-labelledby="language-selector-label">
          {foreach from=$languages item=language}
            <option value="{url entity='language' id=$language.id_lang}"{if $language.id_lang == $current_language.id_lang} selected="selected"{/if} data-iso-code="{$language.iso_code}">
              {$language.name_simple}
            </option>
          {/foreach}
        </select>
      </div>
    </div>
  </div>
</div>