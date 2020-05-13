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
{extends file='page.tpl'}

{block name='page_header_container'}{/block}
{block name='page_footer_container'}{/block}

{block name='pageWrapperClass'}page-not-found {/block}

{block name='page_content_container'}
  <div class="text-center">
    <p class="pnf-title">{l s='404' d='Shop.Theme.Global'}</p>
    <p class="pnf-subtitle">{$page.title}</p>
    <p class="pnf-desc">{l s='You can either return to previous page, visit our homepage or contact our support team.' d='Shop.Theme.Global'}</p>

    <div class="pnf-buttons">
      <a href="{$urls.base_url}" class="btn btn-primary">{l s='Visit Homepage' d='Shop.Theme.Global'}</a><a href="{$urls.pages.contact}" class="btn btn-secondary">{l s='Contact us' d='Shop.Theme.Global'}</a>
    </div>
  </div>

  {block name='hook_not_found'}
    {hook h='displayNotFound'}
  {/block}
{/block}
