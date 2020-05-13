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

<div class="block_newsletter col-12">
  <div class="row align-items-center">
    <div class="newsletter_content col-md-5 col-12">
      <div class="newsletter_content_inner">
        <svg width="40px" height="40px" fill="currentcolor" class="mr-4">
          <use xlink:href="#tdnewsletter">
          </use>
        </svg>
        <div class="content_letter">
          <h3 class="title_block">{l s='Newsletter' d='Shop.Theme.Global'}</h3>
          <p id="block-newsletter-label" class="newsletter_text">{l s='Get our latest news and special sales' d='Shop.Theme.Global'}</p>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-12">
      <form action="{$urls.pages.index}#footer" method="post" class="needs-validation">
        <div class="row">
          <div class="col-12 newsletter_form_wrap">
            <div class="input-wrapper">
              <input
                        name="email"
                        class="newsletter-input {if isset($nw_error) and $nw_error} is-invalid{/if}"
                        type="email"
                        value="{$value}"
                        placeholder="{l s='Your email address' d='Shop.Forms.Labels'}"
                        aria-labelledby="block-newsletter-label"
                        autocomplete="email"
                >
            </div>
            <button class="btn btn-primary" name="submitNewsletter" type="submit" value="{l s='Subscribe' d='Shop.Theme.Actions'}">
              <span>{l s='Subscribe' d='Shop.Theme.Actions'}</span>
            </button>
            <input type="hidden" name="action" value="0">
          </div>
          <div class="col-12">
              {if $conditions}
                <p class="newsletter_condition small mt-2">{$conditions}</p>
              {/if}
              {if $msg}
                <p class="alert mt-2 {if $nw_error}alert-danger{else}alert-success{/if}">
                    {$msg}
                </p>
              {/if}
              {if isset($id_module)}
                  {hook h='displayGDPRConsent' id_module=$id_module}
              {/if}
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
