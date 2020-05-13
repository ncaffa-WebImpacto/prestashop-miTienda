{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#000"
                },
                "button": {
                    "background": "#f1d600"
                }
            },
            "position": "{$themeOpt.cookie_position}",
            "theme": "{$themeOpt.cookie_theme}",
            "content": {
                "message": "{$themeOpt.cookie_msg}",
                "dismiss": "{$themeOpt.cookie_btntxt}",
                "link": "{$themeOpt.cookie_moretxt}",
                "href": "{$themeOpt.cookie_morelnk}",
            },
            "expiryDays" : {$themeOpt.cookie_expiry}
        })
    });
</script>