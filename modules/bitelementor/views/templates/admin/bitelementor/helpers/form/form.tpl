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

{extends file="helpers/form/form.tpl"}


{block name="input_row"}
    {if $input.type == 'elementor_trigger'}
        <div class="form-group">
            <label class="control-label col-lg-3"></label>
            <div class="col-lg-9">
                {if $input.url}
                    <a href="{$input.url|escape:'html':'UTF-8'}" class="m-b-2 m-r-1 btn pointer btn-edit-with-elementor">
                        <svg data-icon="elementor" class="svg-inline" width="24" viewBox="0 0 448 512"><path fill="currentColor" d="M425.6 32H22.4C10 32 0 42 0 54.4v403.2C0 470 10 480 22.4 480h403.2c12.4 0 22.4-10 22.4-22.4V54.4C448 42 438 32 425.6 32M164.3 355.5h-39.8v-199h39.8v199zm159.3 0H204.1v-39.8h119.5v39.8zm0-79.6H204.1v-39.8h119.5v39.8zm0-79.7H204.1v-39.8h119.5v39.8z"></path></svg> {l s='Edit with Elementor' mod='bitelementor'}
                    </a>
                {else}
                    {l s=' Save page first to enable page builder' mod='bitelementor'}
                {/if}
            </div>
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
