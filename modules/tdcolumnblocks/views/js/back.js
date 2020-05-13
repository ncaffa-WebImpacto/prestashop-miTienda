/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$( document ).ready(function() {
    $('#block_type_selectbox').change(function() {
        if (this.value == blocktype_product)
            $('.block_type_static_html').slideUp(400, function(){
                $('.block_type_product').slideDown();
            });
        else {  //Custom HTML Block
            $('.block_type_product').slideUp(400, function(){
                $('.block_type_static_html').slideDown();
            });
        }           
    });

    $('#product_filter_selectbox').change(function() {
        if (this.value == products_selected)
            $('.filter_selected_products').slideDown().addClass('block_type_product');
        else {
            $('.filter_selected_products').slideUp().removeClass('block_type_product');
        }
        if (this.value == products_category)
            $('.filter_select_category').slideDown().addClass('block_type_product');
        else {
            $('.filter_select_category').slideUp().removeClass('block_type_product');
        }
    });

    $('#layout_selectbox').trigger('change');
    $('#block_type_selectbox').trigger('change');
    $('#product_filter_selectbox').trigger('change');

    aInitTableDnD('tdcolumnblocks', 'tdcolumnblock');
});