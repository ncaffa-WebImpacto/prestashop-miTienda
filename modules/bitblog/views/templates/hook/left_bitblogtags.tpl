{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{if isset($bitblogtags) AND !empty($bitblogtags)}
    <section id="tags_blog_block_left" class="block bit-blog-tags">
        <h4 class="title_block hidden-md-down">{l s='Post Tags' mod='bitblog'}</h4>
        <a href="#blogcolumn_block_4" class="h4 hidden-lg-up title_block" data-toggle="collapse">{l s='Post Tags' mod='bitblog'}</a>
        <div id="blogcolumn_block_4" class="block_content collapse show" data-collapse-hide-mobile>
            <div class="blog-tags-inner">
                {foreach from=$bitblogtags item="tag"}
                    <a href="{$tag.link}">{$tag.name}</a>
                {/foreach}
            </div>
        </div>
    </section>
{/if}
