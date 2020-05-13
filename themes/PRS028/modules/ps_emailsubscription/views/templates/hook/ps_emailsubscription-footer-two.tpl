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

<div class="block_newsletter col-12 col-lg-3">
  <div class="row align-items-center">
    <div class="newsletter_content col-12">
      <p class="title_block hidden-md-down">{l s='Newsletter' d='Shop.Theme.Global'}</p>
      <a href="#footer_email_list" class="hidden-lg-up title_block" data-toggle="collapse">{l s='Newsletter' d='Shop.Theme.Global'}</a>
    </div>
    <div class="col-12 collapse show" id="footer_email_list" data-collapse-hide-mobile>
      <p id="block-newsletter-label" class="newsletter_text">{l s='Sign up and get latest deals. offers & updates store.' d='Shop.Theme.Global'}</p>
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
