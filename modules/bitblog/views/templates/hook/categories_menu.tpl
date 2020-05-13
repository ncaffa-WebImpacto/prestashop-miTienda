{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<!-- Block categories module -->
{if $tree}
  <div id="categories_blog_menu" class="block block-categories">
    <h4 class="title_block hidden-md-down">{if isset($currentCategory)}{$currentCategory->title|escape:'html':'UTF-8'}{else}{l s='Blog Categories' mod='bitblog'}{/if}</h4>
    <a href="#blogcolumn_block_1" class="h4 hidden-lg-up title_block" data-toggle="collapse">{if isset($currentCategory)}{$currentCategory->title|escape:'html':'UTF-8'}{else}{l s='Blog Categories' mod='bitblog'}{/if}</a>
    <div id="blogcolumn_block_1" class="block_content collapse show" data-collapse-hide-mobile>
      {$tree nofilter}{* HTML form , no escape necessary *}
    </div>
  </div>
{/if}
<!-- /Block categories module -->
