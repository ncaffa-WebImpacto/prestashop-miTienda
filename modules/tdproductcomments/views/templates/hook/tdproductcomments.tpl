{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
<div class="tab-pane {if $themeOpt.pp_tabs_style == 'accordion'} collapse accordion-tab-description{/if}" id="product-comment">
    <div id="product_comments_block_tab">
        {if $comments}
            {if (!$too_early AND ($logged OR $allow_guests))}
                <div class="align_center new_comment">
                    <a id="new_comment_tab_btn" class="btn btn-primary open-comment-form" href="javascript:void(0);">
                        <span>{l s='Write your review!' mod='tdproductcomments'}</span>
                    </a>
                </div>
            {/if}
            {foreach from=$comments item=comment}
                {if $comment.content}
                    <div class="comment">
                        <div class="row">
                            <div class="comment_author col-md-3">
                                <div class="star_content clearfix">
                                    {math equation="floor(x)" x=$comment.grade assign=stars}
                                    {section name="i" start=0 loop=5 step=1}
                                        {if ($stars - $smarty.section.i.index) >= 1 }
                                            <div class="star star_on"></div>
                                        {elseif $comment.grade - $smarty.section.i.index > 0}
                                            <div class="star star_on star_half"></div>
                                        {else}
                                            <div class="star"></div>
                                        {/if}
                                    {/section}
                                </div>
                                <div class="comment_author_infos">
                                    <strong>{$comment.customer_name|escape:'html':'UTF-8'}</strong>
                                    <em>{dateFormat date=$comment.date_add|escape:'html':'UTF-8' full=0}</em>
                                </div>
                            </div> <!-- .comment_author -->
                            <div class="comment_details col-md-9">
                                <p class="title_block">
                                    <strong>{$comment.title}</strong>
                                </p>
                                <p>{$comment.content|escape:'html':'UTF-8'|nl2br nofilter}</p>
                                <ul>
                                    {if $comment.total_advice > 0}
                                        <li class="comment_helpful">
                                            {l s='%1$d out of %2$d people found this review useful.' sprintf=[$comment.total_useful,$comment.total_advice] mod='tdproductcomments'}
                                        </li>
                                    {/if}
                                    {if $logged}
                                        {if !$comment.customer_advice && $commentUsefull}
                                            <li>
                                                <div class="comment_helpful">
                                                    {l s='Was this comment useful to you?' mod='tdproductcomments'}
                                                    <button class="usefulness_btn btn btn-default usefull" data-is-usefull="1" data-id-product-comment="{$comment.id_product_comment}">
                                                        <span>{l s='Yes' mod='tdproductcomments'}</span>
                                                    </button>
                                                    <button class="usefulness_btn btn btn-default notusefull" data-is-usefull="0" data-id-product-comment="{$comment.id_product_comment}">
                                                        <span>{l s='No' mod='tdproductcomments'}</span>
                                                    </button>
                                                </div>
                                            </li>
                                        {/if}
                                        {if !$comment.customer_report && $commentReport}
                                            <li>
                                                <span class="report_btn" data-id-product-comment="{$comment.id_product_comment}">
                                                    {l s='Report abuse' mod='tdproductcomments'}
                                                </span>
                                            </li>
                                        {/if}
                                    {/if}
                                </ul>
                            </div><!-- .comment_details -->
                        </div>
                    </div> <!-- .comment -->
                {/if}
            {/foreach}
        {else}
            {if (!$too_early AND ($logged OR $allow_guests))}
                <div class="align_center">
                    <a id="new_comment_tab_btn" class="btn btn-primary open-comment-form" href="javascript:void(0);">
                        <span>{l s='Be the first to write your review!' mod='tdproductcomments'}</span>
                    </a>
                </div>
            {else}
                <div class="align_center">{l s='No customer reviews for the moment.' mod='tdproductcomments'}</div>
            {/if}
        {/if}
    </div> <!-- #product_comments_block_tab -->
</div>
