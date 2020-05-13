{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{if $items && isset($items)}
    <div  class="td-newsletter" style="max-width: {$width|escape:'html':'UTF-8'}px; height: {$height|escape:'html':'UTF-8'}px;">
        <div class="d-flex">
            <div class="image-newsletter col-md-6 hidden-sm-down">
                <img src="{$image_baseurl|escape:'htmlall':'UTF-8'}{$items[0].image|escape:'htmlall':'UTF-8'}" alt="{l s='Newsletter' mod='tdnewsletter'}">
            </div>
            <div class="col-md-6 col-12 box-newsletter">
                <div class="innerbox-newsletter">
                    {if $items[0].title && isset($items[0].title)}
                        <h3 class="newsletter-title">
                            {$items[0].title nofilter}
                        </h3>
                    {/if}
                    {if $items[0].text1 && isset($items[0].text1)}
                        <div class="newsletter-desc text1">
                            {$items[0].text1 nofilter}
                        </div>
                    {/if}
                    {if $items[0].text2 && isset($items[0].text2)}
                        <div class="newsletter-desc text2">
                            {$items[0].text2 nofilter}
                        </div>
                    {/if}
                    <form method="post" class="tdnewsletter_form" action="">
                        <fieldset>
                            <div class="clearfix">
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <input class="form-control tdnl_email" type="text" id="tdnl_email" name="tdnl_email" placeholder="{l s='Your email address' mod='tdnewsletter'}" value="">
                                    </div>
                                    <button type="submit" class="btn btn-primary tdnewsletter_send">
                                        <span>{l s='Subscribe' mod='tdnewsletter'}</span>
                                    </button>
                                </div>
                                <p class="newsletter_msg alert"></p>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <a class="td-newsletter-close" id="close"></a>
                <a class="td-newsletter-dont" href="#" id="dont-show">{l s='Don’t show this popup again' mod='tdnewsletter'}</a>
            </div>
        </div>
    </div>
{/if}
