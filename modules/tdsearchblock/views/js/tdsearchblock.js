/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$(function(){
    var content_result = "<div id='tdsearch_result_content'><div id='tdsearch_result' class='td-container'></div></div>";
    $(content_result).insertAfter("#search_block_top #searchbox");

    $('#search_query_nav').click(function(){
        $("#search_block_top").addClass('show');
    });

    $('body').click(function(){
        $('#tdsearch_result_content').slideUp(300);
        $("#search_block_top").removeClass('show');
    });

    $('#searchbox input.search_query').keyup(function(){ 
        $('.ac_results').remove();
        $('#tdsearch_result_content').slideDown(400);
        if(this.value.length < 3) {
            $('#tdsearch_result').html("<div class='char_limit'>" + limitCharacter + "</div>");				
        } else {
            var id_cat = $('#search_category').val();
            searchTdProducts(this.value, id_cat);
        }
    });

    $( "#search_category" ).change(function() {
        if($('#searchbox input.search_query').val().length < 3) {
            $('#tdsearch_result').html("<div class='char_limit'>" + limitCharacter + "</div>");
        } else {
            var id_cat = $('#search_category').val();
            searchTdProducts($('#searchbox input.search_query').val(), id_cat);
        }
    });
});

function searchTdProducts(inputString, id_cat) {
    $.post($('#td_ajax_search_url input.ajaxUrl').val(), {queryString: inputString, id_Cat: id_cat}, function(data){ 
        $('#tdsearch_result').html(data);
    });
}
