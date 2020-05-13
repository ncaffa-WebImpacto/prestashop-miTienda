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

<div class="conatctstoreinfo col-12 col-lg-3">
  {if isset($themeOpt.cinfo_title) && $themeOpt.cinfo_title}
    <p class="title_block hidden-md-down">{$themeOpt.cinfo_title nofilter}</p>
    <a href="#contact_store_info" class="hidden-lg-up title_block" data-toggle="collapse">{$themeOpt.cinfo_title nofilter}</a>
  {/if}
  <div id="contact_store_info" class="collapse show" data-collapse-hide-mobile>
    <div class="block_content">
      {if isset($themeOpt.cinfo_img) && $themeOpt.cinfo_img}
        <div class="storeinfo_img">
          <a href="{$urls.base_url}">
            <img src="{$themeOpt.cinfo_img}" class="img-fluid" alt="{l s='Footer Logo' d='Shop.ThemeDelights'}"/>
          </a>
        </div>
      {/if}
      {if isset($themeOpt.cinfo_desc) && $themeOpt.cinfo_desc}
        <p>{$themeOpt.cinfo_desc nofilter}</p>
      {/if}
      {if isset($themeOpt.cinfo_add) && $themeOpt.cinfo_add}
        <div class= "block d-inline-flex align-items-start justify-content-center">
            <div class="icon tdaddress mr-3"><i class="material-icons">&#xE55F;</i></div>
            <div class="data tdaddress rte-content">{$themeOpt.cinfo_add nofilter}</div>
        </div> 
      {/if}
      {if isset($themeOpt.cinfo_no) && $themeOpt.cinfo_no}
        <div class= "block d-inline-flex align-items-start justify-content-center">
            <div class="icon tdphone mr-3"><i class="material-icons">&#xE0CD;</i></div>
            <div class="data tdphone"><a href="tel:{$themeOpt.cinfo_no}">{$themeOpt.cinfo_no nofilter}</a></div>
        </div> 
      {/if}
      {if isset($themeOpt.cinfo_fno) && $themeOpt.cinfo_fno}
        <div class= "block d-inline-flex align-items-start justify-content-center">
            <div class="icon tdfax mr-3"><i class="material-icons">&#xE0DF;</i></div>
            <div class="data tdfax"><a href="tel:{$themeOpt.cinfo_fno}">{$themeOpt.cinfo_fno nofilter}</a></div>
        </div> 
      {/if}
      {if isset($themeOpt.cinfo_email) && $themeOpt.cinfo_email}
        <div class= "block d-inline-flex align-items-start justify-content-center">
            <div class="icon tdemail mr-3"><i class="material-icons">&#xE158;</i></div>
            <div class="data tdemail"><a href="mailto:{$themeOpt.cinfo_email}">{$themeOpt.cinfo_email nofilter}</a></div>
        </div> 
      {/if}
    </div>
  </div>
</div>