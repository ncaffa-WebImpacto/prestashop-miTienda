{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
{if $themeOpt.pp_tabs_style == 'vertical' || $themeOpt.pp_tabs_style == 'horizontal'}
    <li class="nav-item">
        <a class="nav-link tdcommenttab" data-toggle="tab" href="#product-comment">{l s='Reviews' mod='tdproductcomments'}</a>
    </li>
    {elseif $themeOpt.pp_tabs_style == 'accordion'}
        <a class="accordion-tab-title  tdcommenttab" data-toggle="collapse" href="#product-comment">{l s='Reviews' mod='tdproductcomments'}</a>
{/if} 
