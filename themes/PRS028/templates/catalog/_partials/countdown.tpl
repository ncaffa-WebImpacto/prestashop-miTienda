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
{if isset($product.specific_prices.to) && ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' < $product.specific_prices.to|date_format:'%Y-%m-%d %H:%M:%S' )}
    <div class="tddeal">
        <div class="tdcountdown" data-date="{$product.specific_prices.to|date_format:'%Y/%m/%d %H:%M:%S'}">
            <div class="days_container">
                <span class="number days">0</span>
                <span class="days_text text">{l s='Days' d='Shop.Theme.Catalog'}</span>
            </div>
            <div class="hours_container">
                <span class="number hours">0</span>
                <span class="hours_text text">{l s='Hours' d='Shop.Theme.Catalog'}</span>
            </div>
            <div class="minutes_container">
                <span class="number minutes">0</span>
                <span class="minutes_text text">{l s='Mins' d='Shop.Theme.Catalog'}</span>
            </div>
            <div class="seconds_container">
                <span class="number seconds">0</span>
                <span class="seconds_text text">{l s='Secs' d='Shop.Theme.Catalog'}</span>
            </div>
        </div>
    </div>
{/if}
