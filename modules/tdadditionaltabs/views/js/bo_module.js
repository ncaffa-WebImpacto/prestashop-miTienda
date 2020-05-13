/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$(function() {
    var $mySlides = $("#tabs");
    $mySlides.sortable({
        opacity: 0.6,
        cursor: "move",
        update: function() {
            var order = $(this).sortable("serialize") + "&action=UpdatePositions";
            $.post(tdModulesAdditionalTabs.ajaxUrl, order);
        }
    });
    $mySlides.hover(function() {
        $(this).css("cursor","move");
    },
    function() {
        $(this).css("cursor","auto");
    });
});