/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

$(document).ready( function(){
	var src = $('#comment-form img.comment-capcha-image').attr('src');
	$("#comment-form").submit( function() {
		var action = $(this).attr('action');
		var data = $('#comment-form').serialize();

		if($("#comment-form").parent().find('.comment-message').length <= 0) {
			var msg = $('<div class="comment-message"></div>');
			$("#comment-form").before( msg );
		} else {
			var msg = $("#comment-form").parent().find(".comment-message");
		}

	 	$.ajax({
			url:action,
			data: data+"&submitcomment="+Math.random(),
			type:'POST',
			dataType: 'json',
			success:function(ct) {
				if (!ct.error) {
					$( msg ).html('<div class="alert alert-info">'+ct.message+'</div>');
					$( 'input[type=text], textarea', '#comment-form' ).each( function(){
						$(this).val('');
						var srcn = src.replace('captchaimage','rand='+Math.random()+"&captchaimage");
						$('#comment-form img.comment-capcha-image').attr( 'src', srcn );
					} );
				} else {
					$( msg ).html('<div class="alert alert-warning">'+ct.message+'</div>');
				}
			}
		});
		return false;
	} );

	$('.top-pagination-content a.disabled').click(function(){
		return false;
	})

	var current_lang = prestashop.language.iso_code;
	if (typeof array_list_rewrite != 'undefined')
	{
		var current_list_rewrite = array_list_rewrite[current_lang];
		var current_blog_rewrite = array_blog_rewrite[current_lang];
		var current_category_rewrite = array_category_rewrite[current_lang];
		var current_config_blog_rewrite = array_config_blog_rewrite[current_lang];
		var current_config_category_rewrite = array_config_category_rewrite[current_lang];

		$.each(array_list_rewrite, function(iso_code, list_rewrite){
			if (iso_code != current_lang) {
				var url_search = prestashop.urls.base_url + iso_code;

				if ($('#bit_block_top').length) {
					var parent_o = $('#bit_block_top .language-selector');
				} else {
					var parent_o = $('.language-selector-wrapper');
				}

				parent_o.find('li a').each(function(){
					var lang_href = $(this).attr('href');
					if (lang_href.indexOf(url_search) > -1) {
						if ($('body#module-bitblog-list').length) {
							var url_change = lang_href.replace('/'+current_list_rewrite+'.html', '/'+list_rewrite+'.html');
						} else {
							var url_change = lang_href.replace('/'+current_list_rewrite+'/', '/'+list_rewrite+'/');
						}

						if ($('body#module-bitblog-blog').length) {
							if (config_url_use_id == 0) {
								url_change = url_change.replace('/'+current_config_blog_rewrite+'/', '/'+array_config_blog_rewrite[iso_code]+'/');
							}
							url_change = url_change.replace('/'+current_blog_rewrite, '/'+array_blog_rewrite[iso_code]);
						}

						if ($('body#module-bitblog-category').length) {
							if (config_url_use_id == 0) {
								url_change = url_change.replace('/'+current_config_category_rewrite+'/', '/'+array_config_category_rewrite[iso_code]+'/');
							}
							url_change = url_change.replace('/'+current_category_rewrite, '/'+array_category_rewrite[iso_code]);
						}
						$(this).attr('href', url_change);
					}
				});
			}
		});
	}
});
