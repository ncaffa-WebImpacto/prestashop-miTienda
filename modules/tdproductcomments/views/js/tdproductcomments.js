/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$(document).ready(function(){
    $('input.star').rating();
    $('.auto-submit-star').rating();

    $('.open-comment-form').click(function(){
        if ($('#criterions_list').length) {
            $('#tdcomment-modal').modal('show');
        } else {
            if ($('#tdcomment-modal .modal-header .disable-form-comment').length) {
                $('#tdcomment-modal').modal('show');
            } else {
                $('#submitNewMessage').remove();
                $('#tdcomment-modal .modal-header .modal-title').remove();
                $('#tdcomment-modal .modal-body').remove();
                $('#tdcomment-modal .modal-header').append('<h2 class="disable-form-comment">'+disable_comment+'</h2>');
                $('#tdcomment-modal').modal('show');
            }

        }
        return false;
    });

    $(document).on('click', 'button.usefulness_btn', function(e){
        var id_product_comment = $(this).data('id-product-comment');
        var is_usefull = $(this).data('is-usefull');
        var parent = $(this).parent();

        $.ajax({
            url: productcomments_controller_url,
            data: {
                id_product_comment: id_product_comment,
                action: 'comment_is_usefull',
                value: is_usefull
            },
            type: 'POST',
            headers: { "cache-control": "no-cache" },
            success: function(result){
                parent.fadeOut('slow', function() {
                    parent.remove();
                });
            }
        });
    });

    $(document).on('click', 'span.report_btn', function(e){
        var idProductComment = $(this).data('id-product-comment');
        var parent = $(this).parent();

        $.ajax({
            url: productcomments_controller_url,
            data: {
                id_product_comment: idProductComment,
                action: 'report_abuse'
            },
            type: 'POST',
            headers: { "cache-control": "no-cache" },
            success: function(result){
                parent.fadeOut('slow', function() {
                    parent.remove();
                });
            }
        });
    });

    $(document).on('click', '#submitNewMessage', function(e){
        /* Kill default behaviour */
        e.preventDefault();

        /* Form element */

        url_options = '?';
        if (productcomments_url_rewrite == 0) {
            url_options = '&';
        }

        $.ajax({
            url: productcomments_controller_url + url_options + 'action=add_comment',
            data: $('#id_new_comment_form').serialize(),
            type: 'POST',
            headers: { "cache-control": "no-cache" },
            dataType: "json",
            success: function(data){
                if (data.result) {
                    $('#submitNewMessage').fadeOut('slow', function(){
                        $(this).remove();
                    });
              
                    $('#tdcomment-modal .modal-body').fadeOut('slow', function(){
                        $(this).remove();
                        $('#tdcomment-modal .modal-header .modal-title').remove();
                        if (moderation_active) {
                            $('#tdcomment-modal .modal-header').append('<h2>'+productcomment_added_moderation+'</h2>');
                        } else {
                            $('#tdcomment-modal .modal-header').append('<h2>'+productcomment_added+'</h2>');
                        }
                    });
                } else {
                    $('#new_comment_form_error ul').html('');
                    $.each(data.errors, function(index, value) {
                        $('#new_comment_form_error ul').append('<li>'+value+'</li>');
                    });
                    $('#new_comment_form_error').slideDown('slow');
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("TECHNICAL ERROR, Please Try Again Later");
                window.location.reload();
            }
        });
        $('#tdcomment-modal').on('hidden.bs.modal', function () {
            if (!$('#submitNewMessage').length && !$('#tdcomment-modal .modal-body .disable-form-comment').length) {
                window.location.reload();
            }
        });
    });

    $(document).on('click', '.comments_advices .reviews', function(e){
        if ($('.tdcommenttab').length) {
            $('.tdcommenttab').trigger('click');
            $('html, body').animate({
                scrollTop: $('.tdcommenttab').offset().top
            }, 500);
        }
        return false;
    });
});

