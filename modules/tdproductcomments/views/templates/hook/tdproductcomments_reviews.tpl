{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
{if (isset($nbComments) && $nbComments > 0) || $zeroCommentDisplay}
    <div class="comments_note">
        <div class="star_content d-inline-flex clearfix">
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
        {if isset($nbCommentsCounter) && $nbCommentsCounter}
            <span class="nb-comments">({$nbComments})</span>
        {/if}
    </div>
{/if}
