/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$(document).ready(function () {

    var $tdadditionaltabList = $('#tdadditionaltab-list');


    //reorder
    $(function () {
        var $mySlides = $('#tdadditionaltab-list');
        $mySlides.sortable({
            opacity: 0.6,
            cursor: "move",
            update: function () {
                var order = $(this).sortable("serialize") + "&action=UpdatePositionsProduct";
                $.post(tdModulesAdditionalTabs.ajaxUrl, order);
            }
        });
        $mySlides.hover(function () {
                $(this).css("cursor", "move");
            },
            function () {
                $(this).css("cursor", "auto");
            });
    });


    //add tab
    $('#tdadditionaltabs_add, #tdadditionaltabs_edit').on('click', function () {

        var $inputFields = $('.js-tdadditionaltabs-field');
        var fields = $('.js-tdadditionaltabs-field').serialize();
        var idProduct = $(this).data('product');

        $.ajax({
            url: tdModulesAdditionalTabs.ajaxUrl,
            type: 'POST',
            data: {
                ajax: true,
                action: 'addTabProduct',
                fields: fields,
                idProduct: idProduct,
            },
            success: function (data) {
                if (data.status) {

                    if (data.action == 'add'){
                        var $tmpl = $('#tmpl-tdadditionaltab-list-item');
                        var tmplHtml = $tmpl.html();

                        tmplHtml = tmplHtml.replace(new RegExp('::tabId::', 'g'), data.tab.id);

                        $.each(tdadditionaltabs_languages, function(k, v) {
                            tmplHtml = tmplHtml.replace(new RegExp('::tabTitle'+v.id_lang+'::', 'g'), data.tab.title[v.id_lang])
                        });

                        $tdadditionaltabList.append(tmplHtml);
                    } else {
                        $.each(tdadditionaltabs_languages, function(k, v) {
                            $('.translationsFields-tdadditionaltabs_title_p_'+data.tab.id+'_'+v.id_lang+'').text(data.tab.title[v.id_lang]);
                        });
                    }

                    showSuccessMessage(data.message);
                    $('#tdadditionaltabs_add').removeClass('hide');
                    $('#tdadditionaltabs_edit').addClass('hide');
                    $('#tdadditionaltabs_cancel').addClass('hide');

                    $inputFields.each(function() {
                         $( this ).val('');
                    });

                    $('.tdadditionaltabs_description').each(function(  ) {
                         tinymce.get($( this ).find('textarea').first().attr('id')).setContent('');
                    });
                } else {
                    showErrorMessage(data.message);
                }
            },
        });
    });

    //cancel form
    $('#tdadditionaltabs_cancel').on('click', function () {

        var $inputFields = $('.js-tdadditionaltabs-field');

        $inputFields.each(function() {
            $( this ).val('');
        });

        $('.tdadditionaltabs_description').each(function(  ) {
            tinymce.get($( this ).find('textarea').first().attr('id')).setContent('');
        });

        $('#tdadditionaltabs_add').removeClass('hide');
        $('#tdadditionaltabs_edit').addClass('hide');
        $('#tdadditionaltabs_cancel').addClass('hide');

    });

    //remove tab
    $tdadditionaltabList.on('click', '.js-tdadditionaltabs-remove', function () {
        var tabId = $(this).data('tab');
        modalConfirmation.create(translate_javascripts['Are you sure to delete this?'], null, {
            onContinue: function () {

                $.ajax({
                    url: tdModulesAdditionalTabs.ajaxUrl,
                    type: 'POST',
                    data: {
                        ajax: true,
                        action: 'deleteTabProduct',
                        id_tdadditionaltab: tabId,
                    },
                    success: function (data) {
                        $('#tdadditionaltabs_' + tabId).remove();
                    },
                });

            }
        }).show();
    });

    //edit tab
    $tdadditionaltabList.on('click', '.js-tdadditionaltabs-edit', function () {

        var tabId = $(this).data('tab');

        $('#tdadditionaltabs_add').addClass('hide');
        $('#tdadditionaltabs_edit').removeClass('hide');
        $('#tdadditionaltabs_cancel').removeClass('hide');

        $('#tdadditionaltabs_id_tdadditionaltab').val(tabId);

        $.ajax({
            url: tdModulesAdditionalTabs.ajaxUrl,
            data: {
                ajax: true,
                action: 'getTabProduct',
                id_tdadditionaltab: tabId,
            },
            success: function (data) {
                if (data.tab.active){
                    $('#tdadditionaltabs_active').prop( "checked", true );
                } else {
                    $('#tdadditionaltabs_active').prop( "checked", false );
                }

                $.each( data.tab.title, function( i, val ) {
                    $('#tdadditionaltabs_title_' + i).val(val);
                });

                $.each( data.tab.description, function( i, val ) {
                    var $textarea =  $('#tdadditionaltabs_description_' + i);
                    if ($textarea.length){
                        $textarea.val(val);
                        tinymce.get('tdadditionaltabs_description_' + i).setContent(val);
                    }
                });
            },
        });
    });

});