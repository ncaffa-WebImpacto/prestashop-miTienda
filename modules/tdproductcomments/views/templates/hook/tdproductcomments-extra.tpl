{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
{if (($nbComments == 0 && $too_early == false && ($logged || $allow_guests)) || ($nbComments != 0))}
    <div id="product_comments_block_extra" {if $nbComments == 0}class="no-comment"{/if}>
        {if $nbComments != 0}
            <div class="comments_note">
                <div class="star_content clearfix">
                    {if !$ratings.avg}
                        {assign var='average' value=0}
                    {else}
                        {assign var='average' value=$ratings.avg}
                    {/if}
                    {math equation="floor(x)" x=$average assign=stars}
                    {section name="i" start=0 loop=5 step=1}
                        {if ($stars - $smarty.section.i.index) >= 1 }
                            <div class="star star_on"></div>
                        {elseif $average - $smarty.section.i.index > 0}
                            <div class="star star_on star_half"></div>
                        {else}
                            <div class="star"></div>
                        {/if}
                    {/section}
                </div>
            </div>
        {/if}
        <div class="comments_advices">
            {if $nbComments != 0}
                <a class="reviews" href="javascript:void(0);"><i class="fa fa-comments-o" aria-hidden="true"></i> {l s='Read reviews' mod='tdproductcomments'} ({$nbComments})</a>
            {/if}
            {if ($too_early == false AND ($logged OR $allow_guests))}
                <a class="open-comment-form" href="javascript:void(0);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {l s='Write your review' mod='tdproductcomments'}</a>
            {/if}
        </div>
    </div>
{/if}
<!--  /Module ProductComments -->