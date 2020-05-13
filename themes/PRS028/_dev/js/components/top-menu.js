/**
 * 2007-2017 PrestaShop
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
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
import $ from 'jquery';

function alignSubMenu(){
  $("#top-menu > li.nav-expand > ul.nav-expand-content").each(function() {
    var x = $(this).children("li").length,
        y = 0;
    $(this).children("li").each(function(index, element) {
        y = x;
    });
    if (y < 1) {
      $(this).addClass("onecolumn");
    } else if (y % 3 === 0 || y > 3) {
      $(this).addClass("threecolumn");
    } else if (y % 2 === 0) {
      $(this).addClass("twocolumn");
    }
  });

  var $menuselector = $('#_desktop_top_menu');
  var $menuhoverselector = $($menuselector).find("#top-menu > li");
  var $menuwrapper = $('#_desktop_top_menu #top-menu > li > ul.nav-items');
  var menuContainer = $('.container'),
      menuContainerPosition = menuContainer.offset(),
      menuContainerWidth = menuContainer.width(),
      menuContainerPadding = parseFloat(menuContainer.css('padding-left')),
      menuContainerLeftEdge = menuContainerPosition.left + menuContainerPadding,
      menuContainerRightEdge = menuContainerLeftEdge + menuContainerWidth,
      megamenu_wrapper_position = 0;
  $menuhoverselector.hover(function() {
    if ($(document).width() <= 991) {
      $menuwrapper.removeAttr('style');
    } else if($(document).width() >= 992) {
      $menuwrapper.each(function() {
        var menuItem = $(this).parent().offset();
        var dropdownWrapper = $(this);
        var dropdownWrapperWidth = $(this).outerWidth();
        if (dropdownWrapper.length) {
          dropdownWrapper.css( 'left', '' );
          if (menuItem.left + dropdownWrapperWidth > menuContainerRightEdge) {
            megamenu_wrapper_position = -1 * ( menuItem.left - ( menuContainerRightEdge - dropdownWrapperWidth ) );
            dropdownWrapper.css( 'left', megamenu_wrapper_position );
          }
        }
      });
    }
  });
}

$(document).ready(function() { alignSubMenu(); });
$(window).resize(function() { alignSubMenu(); });
