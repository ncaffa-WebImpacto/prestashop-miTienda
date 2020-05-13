var bitElementorButton;
document.addEventListener("DOMContentLoaded", function (event) {
    jQuery(document).ready(function () {
        bitElementorButton = (function () {
            var $wrapperCms = $('form[name="cms_page"]').first().find('.card-block').first().find('.card-text').first(),
                $btnTemplate = $('#tmpl-btn-edit-with-elementor');

            function init() {
                $wrapperCms.prepend($btnTemplate.html());
                if (typeof elementorPageType !== 'undefined') {
                    if (elementorPageType == 'cms') {
                        var hideEditor = false;
                        jQuery.each(onlyElementor, function(i, val) {
                            if (val) {
                                hideEditor = true;
                            }
                        });
                        if (hideEditor){
                            let $cmsPageContent = $("#cms_page_content");
                                $cmsPageContent.first().parents('.form-group').last().hide();
                                $cmsPageContent.find('.autoload_rte').removeClass('autoload_rte');
                        }
                    }
                }
            }
            return {init: init};
        })();
        bitElementorButton.init();
    });
});