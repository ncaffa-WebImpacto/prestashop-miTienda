/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$(function(){
    setTimeout(function(){
        $('.td-newsletter').meerkat({
            background: tdnl_bg,
            opacity: tdnl_opacity,
            width: '100%',
            height: '100%',
            position: 'left',
            dontShowAgain: '#dont-show',
            close: '#close',
            animationIn: tdnl_display,
            animationOut: tdnl_display,
            animationSpeed: tdnl_animation,
            timer: tdnl_time,
        });
    }, 2000);

    $('.newsletter_msg').hide();

    $('.tdnewsletter_form').on('submit', function () {
        $('.newsletter_msg').hide().empty();
        $.ajax({
            type: 'POST',
            url: tdnl_url + '?ajax=1&rand=' + new Date().getTime(),
            async: true,
            cache: false,
            dataType : "json",
            data: $(this).serialize(),
            success: function(data) {
                if (data['success'] == 1 || data['success'] == 3) {
                    $('.newsletter_msg').addClass('alert-danger').removeClass('alert-success').append(data.error).show();
                }
                if(data['success'] == 0) {
                    $('.newsletter_msg').removeClass('alert-danger').addClass('alert-success').append(data.error).show();
                }
            }
        });
        return false;
    });
});