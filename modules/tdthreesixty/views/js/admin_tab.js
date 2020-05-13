/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
var uploaderTdThreeSixty = (function () {
    var myDropzone;
    var dropZoneElem = $('#tdthreesixty-images-dropzone');

    return {
        'init': function () {
            uploaderTdThreeSixty.setInputVal();
            Dropzone.autoDiscover = false;
            var errorElem = $('#tdthreesixty-images-dropzone-error');

            $("#tdthreesixty-removeall").on("click", function () {
                myDropzone.removeAllFiles(true);
                $(dropZoneElem).find('.dz-image-preview').each(function () {
                    var name = $(this).data('name');
                    $(this).remove();
                    $.ajax({
                        url: dropZoneElem.attr('url-delete'),
                        data: {'file': name}
                    });
                });
                uploaderTdThreeSixty.setInputVal();
            });

            $(dropZoneElem).on("click", '.dz-remove-custom', function () {
                var $el = $(this).parents('.dz-preview').first();
                $el.remove();
                $.ajax({
                    url: dropZoneElem.attr('url-delete'),
                    data: {'file': $el.data('name')}
                });
                uploaderTdThreeSixty.setInputVal();
            });

            var dropzoneOptions = {
                url: dropZoneElem.attr('url-upload'),
                paramName: 'threesixty-file-upload',
                maxFilesize: dropZoneElem.attr('data-max-size'),
                addRemoveLinks: true,
                thumbnailWidth: 250,
                clickable: '.threesixty-openfilemanager',
                thumbnailHeight: null,
                uploadMultiple: false,
                acceptedFiles: 'image/*',
                dictRemoveFile: 'Delete',
                dictFileTooBig: 'ToLargeFile',
                dictCancelUpload: 'Delete',
                sending: function (file, response) {
                    errorElem.html('');
                },
                queuecomplete: function () {
                    dropZoneElem.sortable('enable');
                },
                processing: function () {
                    dropZoneElem.sortable('disable');
                },
                success: function (file, response) {
                    //manage error on uploaded file
                    if (response.error !== 0) {
                        errorElem.append('<p>' + file.name + ': ' + response.error + '</p>');
                        this.removeFile(file);
                        return;
                    }
                    $(file.previewElement).data('name', response.name);
                    $(file.previewElement).addClass('ui-sortable-handle');
                    uploaderTdThreeSixty.setInputVal();
                },
                removedfile: function (file) {
                    var name = $(file.previewElement).data('name');
                    var _ref;
                    if (file.previewElement) {
                        if ((_ref = file.previewElement) != null) {
                            _ref.parentNode.removeChild(file.previewElement);
                        }
                    }
                    $.ajax({
                        url: dropZoneElem.attr('url-delete'),
                        data: {'file': name}
                    });
                    uploaderTdThreeSixty.setInputVal();
                },
                error: function (file, response) {
                    var message = '';
                    if ($.type(response) === 'undefined') {
                        return;
                    } else if ($.type(response) === 'string') {
                        message = response;
                    } else if (response.message) {
                        message = response.message;
                    }

                    if (message === '') {
                        return;
                    }

                    //append new error
                    errorElem.append('<p>' + file.name + ': ' + message + '</p>');

                    //remove uploaded item
                    this.removeFile(file);
                },
                init: function () {
                    //if already images uploaded, mask drop file message
                    if (dropZoneElem.find('.dz-preview:not(.threesixty-openfilemanager)').length) {
                        dropZoneElem.addClass('dz-started');
                    } else {
                        dropZoneElem.find('.dz-preview.threesixty-openfilemanager').hide();
                    }

                    //init sortable
                    dropZoneElem.sortable({
                        items: "div.dz-preview:not(.disabled)",
                        opacity: 0.9,
                        containment: 'parent',
                        distance: 32,
                        tolerance: 'pointer',
                        cursorAt: {
                            left: 64,
                            top: 64
                        },
                        cancel: '.disabled',
                        start: function (event, ui) {
                            //init zindex
                            dropZoneElem.find('.dz-preview').css('zIndex', 1);
                            ui.item.css('zIndex', 10);
                        },
                        stop: function (event, ui) {
                            uploaderTdThreeSixty.setInputVal();
                        }
                    });

                    dropZoneElem.disableSelection();
                }
            };
            myDropzone = new Dropzone("div#tdthreesixty-images-dropzone", jQuery.extend(dropzoneOptions));
        },
        'setInputVal': function () {

            var imagesTdThreeSixty = [];

            dropZoneElem.find('.dz-image-preview').each(function () {
                imagesTdThreeSixty.push({n: $(this).data('name')});
            });

            if ($.isEmptyObject(imagesTdThreeSixty)) {
                $('#tdthreesixty_threesixty').val('');
            } else {
                $('#tdthreesixty_threesixty').val(JSON.stringify(imagesTdThreeSixty));
            }
        }
    };
})();
$( document ).ready( function () {
    uploaderTdThreeSixty.init();
});
