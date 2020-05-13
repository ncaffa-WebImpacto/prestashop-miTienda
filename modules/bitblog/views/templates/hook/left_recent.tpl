{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{if isset($leading_blogs) AND !empty($leading_blogs)}
    <section id="blogRecentBlog" class="block bit-block-sidebar">
        <h4 class="title_block hidden-md-down">{l s='Recent Articles' mod='bitblog'}</h4>
        <a href="#blogcolumn_block_3" class="h4 hidden-lg-up title_block" data-toggle="collapse">{l s='Recent Articles' mod='bitblog'}</a>
        <div id="blogcolumn_block_3" class="block_content products-block collapse show" data-collapse-hide-mobile>
            <ul class="lists">
                {foreach from=$leading_blogs item="blog" name=leading_blog}
                    <li class="list-item clearfix{if $smarty.foreach.leading_blog.last} last_item{elseif $smarty.foreach.leading_blog.first} first_item{else}{/if}">
                        <div class="blog-image">
                            <a class="products-block-image" title="{$blog.title|escape:'html':'UTF-8'}" href="{$blog.link|escape:'html':'UTF-8'}">
                                <img alt="{$blog.title|escape:'html':'UTF-8'}" src="{$blog.preview_url|escape:'html':'UTF-8'}" class="img-fluid">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="post-name"><a title="{$blog.title}" href="{$blog.link|escape:'html':'UTF-8'}">{$blog.title}</a></h3>
                            <span class="info">{$blog.date_add|date_format:"%b %d, %Y"}</span>
                        </div>
                    </li>
                {/foreach}
            </ul>
        </div>
    </section>
{/if}
