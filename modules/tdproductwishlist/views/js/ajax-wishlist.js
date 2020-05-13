/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
$(document).ready(function(){
	createWishlistModalPopup();
	TdWishlistButtonAction();
	prestashop.on('updateProductList', function() {
		TdWishlistButtonAction();
	});

	prestashop.on('updatedProduct', function() {
		TdWishlistButtonAction();
	});
	prestashop.on('clickQuickView', function() {
		check_active_wishlist = setInterval(function(){
			if ($('.quickview.modal').length) {
				$('.quickview.modal').on('shown.bs.modal', function (e) {
					TdWishlistButtonAction();
				})
				clearInterval(check_active_wishlist);
			}
		}, 300);
	});

	activeEventModalWishlist();
	TdListWishlistAction();
	$('.td-save-wishlist').click(function(){
		if (!$(this).hasClass('active')) {
			$(this).addClass('active');
			$('.new-wishlist .has-danger .form-control-feedback').html('');
			$('.new-wishlist .has-success .form-control-feedback').html('');
			var name_wishlist = $.trim($('#wishlist_name').val());
			if (!name_wishlist) {
				$('#wishlist_name').parent().addClass('has-error');
				$(this).removeClass('active');
			} else {
				var object_e = $(this);
				$('#wishlist_name').parent().removeClass('has-error');
				$.ajax({
					type: 'POST',
					headers: {"cache-control": "no-cache"},
					url: wishlist_url+ '?rand=' + new Date().getTime(),
					async: true,
					cache: false,
					data: {
						"ajax": 1,
						"action": "add-wishlist",
						"name_wishlist": name_wishlist,
						"token": tdtoken
					},
					success: function (result) {
						var object_result = $.parseJSON(result);
						if (object_result.errors.length) {
							$('.new-wishlist .has-success .form-control-feedback').html('');
							$('.new-wishlist .has-danger .form-control-feedback').html(object_result.errors).fadeIn();
						} else {
							$('.new-wishlist .has-danger .form-control-feedback').html('');
							$('.new-wishlist .has-success .form-control-feedback').html(object_result.result.message).fadeIn();
							setTimeout(function() {
								$('.new-wishlist .has-success .form-control-feedback').fadeOut();
							}, 3000);
							$('#wishlist_name').val('');

							$('.list-wishlist table tbody').append(object_result.result.wishlist);
							$('html, body').animate({
								scrollTop: $('.list-wishlist table tr.new').offset().top
							}, 500, function (){
								$('.list-wishlist table tr.new').removeClass('new');
							});
							TdListWishlistAction();
							$('.list-wishlist tr.show .view-wishlist-product').trigger('click');
						}
						object_e.removeClass('active');
					},
					error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
					}
				});
			}
		}
		return false;
	})
});

function createWishlistModalPopup()
{
	var modelWishlist = '';
	modelWishlist += '<div class="modal td-modal-wishlist fade" tabindex="-1" role="dialog" aria-hidden="true">';
		modelWishlist += '<div class="modal-dialog modal-dialog-centered" role="document">';
			modelWishlist += '<div class="modal-content">';
				modelWishlist += '<div class="modal-header">';
					modelWishlist += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
						modelWishlist += '<span aria-hidden="true">&times;</span>';
					modelWishlist += '</button>';
					modelWishlist += '<h5 class="modal-title">';
					modelWishlist += '</h5>';
				modelWishlist += '</div>';
				modelWishlist += '<div class="modal-footer">';
					modelWishlist += '<button type="button" class="btn btn-secondary" data-dismiss="modal">'+wishlist_cancel_txt+'</button>';
					modelWishlist += '<button type="button" class="td-modal-wishlist-bt btn btn-primary">';
						modelWishlist += '<span class="td-modal-wishlist-bt-text">';
							modelWishlist += wishlist_ok_txt;
						modelWishlist += '</span>';
					modelWishlist += '</button>';
				modelWishlist += '</div>';
			modelWishlist += '</div>';
		modelWishlist += '</div>';
	modelWishlist += '</div>';
	$('body').append(modelWishlist);
}

function TdWishlistButtonAction()
{
	$(document).on('click', '.td-wishlist-button',function(){
		if (!$('.td-wishlist-button').hasClass('show-list')) {
			if (!$('.td-wishlist-button.active').length) {
				var id_product = $(this).data('id-product');
				var id_wishlist = $(this).data('id-wishlist');
				var id_product_attribute = $(this).data('id-product-attribute');
				var content_wishlist_mess_remove = wishlist_remove+'. <a href="'+wishlist_url+'" target="_blank"><strong>'+wishlist_view+'.</strong></a>';
				var content_wishlist_mess_add = wishlist_add+'. <a href="'+wishlist_url+'" target="_blank"><strong>'+wishlist_view+'.</strong></a>';
				var content_wishlist_loggin_required = wishlist_loggin_required+'. <a href="'+login_url+'"><strong>'+loginLabel+'</strong></a>';

				$(this).addClass('active');

				if (!isLogged) {
					$('.td-modal-wishlist .modal-title').html(content_wishlist_loggin_required);
					$('.td-modal-wishlist').modal('show');
					return false;
				}

				var object_e = $(this);

				if ($(this).hasClass('added') || $(this).hasClass('delete')) {
					$.ajax({
						type: 'POST',
						headers: {"cache-control": "no-cache"},
						url: wishlist_url+ '?rand=' + new Date().getTime(),
						async: true,
						cache: false,
						data: {
							"ajax": 1,
							"action": "remove",
							"id_product": id_product,
							"id_wishlist": id_wishlist,
							"id_product_attribute": id_product_attribute,
							"quantity": 1,
							"token": tdtoken
						},
						success: function (result) {
							var object_result = $.parseJSON(result);
							if (object_result.errors.length) {
								$('.td-modal-wishlist .modal-title').html(object_result.errors);
								$('.td-modal-wishlist').modal('show');
							} else {
								if ($('.wishtlist_top .cart-wishlist-number').length) {
									var old_num_wishlist = parseInt($('.wishtlist_top .cart-wishlist-number').data('wishlist-total'));
									var new_num_wishlist = old_num_wishlist-1;
									$('.wishtlist_top .cart-wishlist-number').data('wishlist-total',new_num_wishlist);
									$('.wishtlist_top .cart-wishlist-number').text(new_num_wishlist);
								}

								if (object_e.hasClass('delete')) {
									$('td.product-'+id_product).fadeOut(function(){
										$(this).remove();
									});
								} else {
									$('.td-modal-wishlist .modal-title').html(content_wishlist_mess_remove);
									$('.td-modal-wishlist').modal('show');
									$('.td-wishlist-button[data-id-product='+id_product+']').removeClass('added');
									$('.td-wishlist-button[data-id-product='+id_product+']').find('span.tip').text(buttonwishlist_title_add);
								}
							}
						},
						error: function (XMLHttpRequest, textStatus, errorThrown) {
							alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
						}
					});
				} else {
					$.ajax({
						type: 'POST',
						headers: {"cache-control": "no-cache"},
						url: wishlist_url+ '?rand=' + new Date().getTime(),
						async: true,
						cache: false,
						data: {
							"ajax": 1,
							"action": "add",
							"id_product": id_product,
							"id_wishlist": id_wishlist,
							"id_product_attribute": id_product_attribute,
							"quantity": 1,
							"token": tdtoken
						},
						success: function (result) {
							var object_result = $.parseJSON(result);
							if (object_result.errors.length) {
								$('.td-modal-wishlist .modal-title').html(object_result.errors);
								$('.td-modal-wishlist').modal('show');
							} else {
								$('.td-modal-wishlist .modal-title').html(content_wishlist_mess_add);
								$('.td-modal-wishlist').modal('show');
								if ($('.wishtlist_top .cart-wishlist-number').length) {
									var old_num_wishlist = parseInt($('.wishtlist_top .cart-wishlist-number').data('wishlist-total'));
									var new_num_wishlist = old_num_wishlist+1;
									$('.wishtlist_top .cart-wishlist-number').data('wishlist-total',new_num_wishlist);
									$('.wishtlist_top .cart-wishlist-number').text(new_num_wishlist);
								}

								if (id_wishlist == '') {
									$('.td-wishlist-button').data('id-wishlist', object_result.result.id_wishlist);
								}

								$('.td-wishlist-button[data-id-product='+id_product+']').addClass('added');
								$('.td-wishlist-button[data-id-product='+id_product+']').find('span.tip').text(buttonwishlist_title_remove);
							}
						},
						error: function (XMLHttpRequest, textStatus, errorThrown) {
							alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
						}
					});
				}
			}
			return false;
		} else {
			$('.wishlist-item').click(function(){
				if (!$('.wishlist-item.active-add').length) {
					var id_product = $(this).data('id-product');
					var id_wishlist = $(this).data('id-wishlist');
					var id_product_attribute = $(this).data('id-product-attribute');
					var content_wishlist_mess_remove = wishlist_remove+'. <a href="'+wishlist_url+'" target="_blank"><strong>'+wishlist_view+'.</strong></a>';
					var content_wishlist_mess_add = wishlist_add+'. <a href="'+wishlist_url+'" target="_blank"><strong>'+wishlist_view+'.</strong></a>';
					var content_wishlist_loggin_required = wishlist_loggin_required+'. <a href="'+login_url+'"><strong>'+loginLabel+'</strong></a>';

					$(this).addClass('active-add');

					if (!isLogged) {
						$('.td-modal-wishlist .modal-title').html(content_wishlist_loggin_required);
						$('.td-modal-wishlist').modal('show');
						return false;
					}

					var object_e = $(this);
					var parents_e = object_e.parents('.td-wishlist-button-dropdown');
					parents_e.find('.td-wishlist-button').addClass('active');
					if ($(this).hasClass('added') || $(this).hasClass('delete')) {
						$.ajax({
							type: 'POST',
							headers: {"cache-control": "no-cache"},
							url: wishlist_url+ '?rand=' + new Date().getTime(),
							async: true,
							cache: false,
							data: {
								"ajax": 1,
								"action": "remove",
								"id_product": id_product,
								"id_wishlist": id_wishlist,
								"id_product_attribute": id_product_attribute,
								"quantity": 1,
								"token": tdtoken
							},
							success: function (result) {
								var object_result = $.parseJSON(result);
								if (object_result.errors.length) {
									$('.td-modal-wishlist .modal-title').html(object_result.errors);
									$('.td-modal-wishlist').modal('show');
								} else {
									if ($('.wishtlist_top .cart-wishlist-number').length) {
										var old_num_wishlist = parseInt($('.wishtlist_top .cart-wishlist-number').data('wishlist-total'));
										var new_num_wishlist = old_num_wishlist-1;
										$('.wishtlist_top .cart-wishlist-number').data('wishlist-total',new_num_wishlist);
										$('.wishtlist_top .cart-wishlist-number').text(new_num_wishlist);
									}

									if (object_e.hasClass('delete')) {
										$('td.product-'+id_product).fadeOut(function(){
											$(this).remove();
										});
									} else {
										$('.td-modal-wishlist .modal-title').html(content_wishlist_mess_remove);
										$('.td-modal-wishlist').modal('show');

										$('.wishlist-item[data-id-wishlist='+id_wishlist+'][data-id-product='+id_product+']').removeClass('added');
										$('.wishlist-item[data-id-wishlist='+id_wishlist+'][data-id-product='+id_product+']').find('span.tip').text(buttonwishlist_title_add);
										if (!$('.wishlist-item[data-id-product='+id_product+']').hasClass('added')) {
											$('.td-wishlist-button[data-id-product='+id_product+']').removeClass('added');
										}

										parents_e.find('.td-wishlist-button').removeClass('active');
									}
								}
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
							}
						});
					} else {
						$.ajax({
							type: 'POST',
							headers: {"cache-control": "no-cache"},
							url: wishlist_url+ '?rand=' + new Date().getTime(),
							async: true,
							cache: false,
							data: {
								"ajax": 1,
								"action": "add",
								"id_product": id_product,
								"id_wishlist": id_wishlist,
								"id_product_attribute": id_product_attribute,
								"quantity": 1,
								"token": tdtoken
							},
							success: function (result) {
								var object_result = $.parseJSON(result);
								if (object_result.errors.length) {
									$('.td-modal-wishlist .modal-title').html(object_result.errors);
									$('.td-modal-wishlist').modal('show');
								} else {
									$('.td-modal-wishlist .modal-title').html(content_wishlist_mess_add);
									$('.td-modal-wishlist').modal('show');

									if ($('.wishtlist_top .cart-wishlist-number').length) {
										var old_num_wishlist = parseInt($('.wishtlist_top .cart-wishlist-number').data('wishlist-total'));
										var new_num_wishlist = old_num_wishlist+1;
										$('.wishtlist_top .cart-wishlist-number').data('wishlist-total',new_num_wishlist);
										$('.wishtlist_top .cart-wishlist-number').text(new_num_wishlist);
									}

									$('.wishlist-item[data-id-wishlist='+id_wishlist+'][data-id-product='+id_product+']').addClass('added');
									$('.wishlist-item[data-id-wishlist='+id_wishlist+'][data-id-product='+id_product+']').find('span.tip').text(buttonwishlist_title_remove);
									if (!$('.td-wishlist-button[data-id-product='+id_product+']').hasClass('added')) {
										$('.td-wishlist-button[data-id-product='+id_product+']').addClass('added');
									}
									parents_e.find('.td-wishlist-button').removeClass('active');
								}
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
							}
						});
					}
				}
				return false;
			});
		}
	});
}

function TdListWishlistAction()
{
	$('.delete-wishlist').click(function(){
		if (!$(this).hasClass('active')) {
			$(this).addClass('active');
			$(this).parents('tr').addClass('active');
			if ($('.list-wishlist tr.active .default-wishlist').is(":checked")) {
				$('.td-modal-wishlist .modal-title').html(wishlist_del_default_txt);
				$('.td-modal-wishlist').removeClass('enable-action').modal('show');
			} else {
				$('.td-modal-wishlist .modal-title').html(wishlist_confirm_del_txt);
				$('.td-modal-wishlist').addClass('enable-action').modal('show');
			}
		}

		return false;
	});

	$('.td-modal-wishlist-bt').click(function(){
		if (!$(this).hasClass('active')) {
			$(this).addClass('active');
			var object_e = $(this);
			var id_wishlist = $('.delete-wishlist.active').data('id-wishlist');
			$.ajax({
				type: 'POST',
				headers: {"cache-control": "no-cache"},
				url: wishlist_url+ '?rand=' + new Date().getTime(),
				async: true,
				cache: false,
				data: {
					"ajax": 1,
					"action": "delete-wishlist",
					"id_wishlist": id_wishlist,
					"token": tdtoken
				},
				success: function (result) {
					var object_result = $.parseJSON(result);
					if (object_result.errors.length) {
						$('.td-modal-wishlist .modal-title').html(object_result.errors);
						$('.td-modal-wishlist').removeClass('enable-action').modal('show');
					} else {
						var object_delete = $('.list-wishlist tr.active');
						$('.td-modal-wishlist').modal('hide');
						object_delete.fadeOut(function(){
							if ($(this).hasClass('show')) {
								$('.wishlist-products').fadeOut().html('');
							} else {
								$('.list-wishlist tr.show .view-wishlist-product').trigger('click');
							}
							$(this).remove();
						})
					}
					object_e.removeClass('active');
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
				}
			});
		}
	})

	$('.default-wishlist').click(function(){
		if ($(this).is(":checked")) {
			if (!$('.default-wishlist.active').length) {
				$(this).addClass('active');
				var object_e = $(this);
				var id_wishlist = $('.default-wishlist.active').data('id-wishlist');
				$.ajax({
					type: 'POST',
					headers: {"cache-control": "no-cache"},
					url: wishlist_url+ '?rand=' + new Date().getTime(),
					async: true,
					cache: false,
					data: {
						"ajax": 1,
						"action": "default-wishlist",
						"id_wishlist": id_wishlist,
						"token": tdtoken
					},
					success: function (result) {
						var object_result = $.parseJSON(result);
						if (object_result.errors.length) {
							$('.td-modal-wishlist .modal-title').html(object_result.errors);
							$('.td-modal-wishlist').removeClass('enable-action').modal('show');
						} else {
							$('.default-wishlist:checked').removeAttr('checked');
							object_e.prop('checked', true);
						}
						object_e.removeClass('active');
					},
					error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
					}
				});
			}
		}
		return false;
	})

	$('.view-wishlist-product').click(function(){
		if (!$('.view-wishlist-product.active').length) {
			$(this).addClass('active');
			$('.list-wishlist tr.show').removeClass('show');
			$(this).parents('tr').addClass('show');
			var object_e = $(this);
			var id_wishlist = $(this).data('id-wishlist');
			$.ajax({
				type: 'POST',
				headers: {"cache-control": "no-cache"},
				url: wishlist_url+ '?rand=' + new Date().getTime(),
				async: true,
				cache: false,
				data: {
					"ajax": 1,
					"action": "show-wishlist-product",
					"id_wishlist": id_wishlist,
					"token": tdtoken
				},
				success: function (result) {
					var object_result = $.parseJSON(result);
					if (object_result.errors.length) {
						$('.td-modal-wishlist .modal-title').html(object_result.errors);
						$('.td-modal-wishlist').removeClass('enable-action').modal('show');
					} else {
						$('.wishlist-products').hide();
						$('.wishlist-products').html(object_result.result.html).fadeIn();
						if (object_result.result.show_send_wishlist) {
							$('.send-wishlist').fadeIn();
							if (!$('.td-modal-send-wishlist').length) {
								createSendWishlistModalPopup();
								TdListWishlistProductModalAction();
							} else {
								$('.td-modal-reset-send-wishlist').trigger('click');
							}
							TdListWishlistProductAction();
						} else {
							$('.send-wishlist').hide();
						}
						refeshWishlist(id_wishlist);
					}
					object_e.removeClass('active');
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
				}
			});
		}
		return false;
	})
}
function TdListWishlistProductModalAction()
{
	$('.td-send-wishlist').click(function(){
		var name_wishlist = $('.list-wishlist tr.show .view-wishlist-product').data('name-wishlist');
		$('.td-modal-send-wishlist .modal-title').html(wishlist_send_wishlist_txt+' "'+name_wishlist+'"');
		$('.td-modal-send-wishlist').modal('show');

		return false;
	})

	$('.td-modal-send-wishlist').submit(function(){
		if ($('.td-fake-send-wishlist').hasClass('validate-ok')) {
			return false;
		}
	});

	$('.td-modal-send-wishlist-bt').click(function() {
		if (!$(this).hasClass('active')) {
			var check_submit_wishlist = true;
			var list_email = [];
			$(this).addClass('active');
			var object_e = $(this);
			$('.td-modal-reset-send-wishlist').fadeOut();

			$('.wishlist_email').each(function(key, val){
				if ($(this).val() !== '' && !$(this).parents('.form-group').hasClass('has-success') && !$(this).parents('.form-group').hasClass('has-warning')) {
					if (!validateEmail($(this).val())) {
						$(this).parents('.form-group').addClass('td-has-error');
						check_submit_wishlist = false;
					} else {
						$(this).parents('.form-group').removeClass('td-has-error');
						list_email.push(key);
					}
				}
			})
			if (check_submit_wishlist) {
				if (list_email.length == 0) {
					$('.wishlist_email').each(function(key, val){
						if ($(this).val() == '') {
							$(this).parents('.form-group').addClass('td-has-error');
							$(this).attr("required", "");
							return false;
						}
					})
					object_e.removeClass('active');
					$('.td-modal-reset-send-wishlist').fadeIn();
				} else {
					$('.td-fake-send-wishlist').addClass('validate-ok');
					var id_wishlist = $('.list-wishlist tr.show .view-wishlist-product').data('id-wishlist');
					$.each(list_email,function(key, val){
						var index_wishlist_email = val + 1;
						var email = $('#wishlist_email_'+index_wishlist_email).val();
						var object_parent_e = $('#wishlist_email_'+index_wishlist_email).parents('.form-group');
						object_parent_e.find('.wishlist_email_status_loading').show();

						$.ajax({
							type: 'POST',
							headers: {"cache-control": "no-cache"},
							url: wishlist_url+ '?rand=' + new Date().getTime(),
							async: true,
							cache: false,
							data: {
								"ajax": 1,
								"action": "send-wishlist",
								"id_wishlist": id_wishlist,
								"email": email,
								"token": tdtoken
							},
							success: function (result) {
								object_parent_e.find('.wishlist_email_status_loading').hide();
								var object_result = $.parseJSON(result);
								if (object_result.errors.length) {
									object_parent_e.addClass('has-warning').find('.send_wishlist_error').fadeIn();
								} else {
									object_parent_e.addClass('has-success').find('.send_wishlist_success').fadeIn();
								}
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
							}
						});
					});
					$(document).ajaxStop(function() {
						$('.td-fake-send-wishlist').removeClass('validate-ok');
						object_e.removeClass('active');
						$('.td-modal-reset-send-wishlist').fadeIn();
					});
				}
				if ($('.form-send-wishlist .form-group.td-has-error').length) {
					$('.td-fake-send-wishlist').trigger('click');
				}
			} else {
				object_e.removeClass('active');
				$('.td-modal-reset-send-wishlist').fadeIn();
				$('.td-fake-send-wishlist').trigger('click');
			}
		}
	})

	$('.td-modal-reset-send-wishlist').click(function(){
		$('.wishlist_email').val('').removeAttr('required');
		$('.send_wishlist_form_content .form-group').removeClass('td-has-error has-success has-warning');
		$('.wishlist_email_status_loading').fadeOut();
		$('.send_wishlist_msg').fadeOut();
	})
}

function TdListWishlistProductAction()
{
	$('.td-wishlist-button-delete').click(function() {
		if (!$(this).hasClass('active')) {
			$(this).addClass('active');
			var object_e = $(this);
			var object_parent_e = object_e.parents('.wishlist-products');
			var id_wishlist_product = $(this).data('id-wishlist-product');
			var id_wishlist = $(this).data('id-wishlist');
			$.ajax({
				type: 'POST',
				headers: {"cache-control": "no-cache"},
				url: wishlist_url+ '?rand=' + new Date().getTime(),
				async: true,
				cache: false,
				data: {
					"ajax": 1,
					"action": "delete-wishlist-product",
					"id_wishlist": id_wishlist,
					"id_wishlist_product": id_wishlist_product,
					"token": tdtoken
				},
				success: function (result) {
					var object_result = $.parseJSON(result);
					if (object_result.errors.length) {
						$('.td-modal-wishlist .modal-title').html(object_result.errors);
						$('.td-modal-wishlist').removeClass('enable-action').modal('show');
					} else {
						object_e.parents('.td-wishlistproduct-item').fadeOut(function(){
							$(this).remove();
							if (!object_parent_e.find('.td-wishlistproduct-item').length) {
								$('.send-wishlist').hide();
								$('.list-wishlist tr.show .view-wishlist-product').trigger('click');
							}
						})
						refeshWishlist(id_wishlist);
					}
					object_e.removeClass('active');
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
				}
			});
		}
		return false;
	})

	$('.wishlist-product-save-button').click(function() {
		if (!$(this).hasClass('active')) {
			$(this).addClass('active');
			var object_e = $(this);
			var id_wishlist_product = $(this).data('id-wishlist-product');
			var id_wishlist = $(this).data('id-wishlist');
			var quantity = $('.wishlist-product-quantity-'+id_wishlist_product).val();
			var priority = $('.wishlist-product-priority-'+id_wishlist_product).val();

			if (Math.floor(quantity) == quantity && $.isNumeric(quantity) && quantity > 0) {
				$('.wishlist-product-quantity-'+id_wishlist_product).parents('.form-group').removeClass('has-error');
				$.ajax({
					type: 'POST',
					headers: {"cache-control": "no-cache"},
					url: wishlist_url+ '?rand=' + new Date().getTime(),
					async: true,
					cache: false,
					data: {
						"ajax": 1,
						"action": "update-wishlist-product",
						"id_wishlist": id_wishlist,
						"id_wishlist_product": id_wishlist_product,
						"quantity": quantity,
						"priority": priority,
						"token": tdtoken
					},
					success: function (result) {
						var object_result = $.parseJSON(result);
						if (object_result.errors.length) {
							$('.td-modal-wishlist .modal-title').html(object_result.errors);
							$('.td-modal-wishlist').removeClass('enable-action').modal('show');
						} else {
							$('.td-wishlistproduct-item-'+id_wishlist_product).hide();
							$('.td-wishlistproduct-item-'+id_wishlist_product).fadeIn();
							refeshWishlist(id_wishlist);
						}

						object_e.removeClass('active');
					},
					error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
					}
				});
			} else {
				$('.wishlist-product-quantity-'+id_wishlist_product).parents('.form-group').addClass('has-error');
				$('.td-modal-wishlist .modal-title').html(wishlist_quantity_required);
				$('.td-modal-wishlist').removeClass('enable-action').modal('show');
				object_e.removeClass('active');
			}
		}
		return false;
	})

	$('.move-wishlist-item').click(function() {
		if (!$(this).hasClass('active')) {
			$(this).addClass('active');
			var object_e = $(this);
			var object_parent_e = object_e.parents('.wishlist-products');
			var id_wishlist_product = $(this).data('id-wishlist-product');
			var id_product = $(this).data('id-product');
			var id_product_attribute = $(this).data('id-product-attribute');
			var id_old_wishlist = $('.list-wishlist tr.show .view-wishlist-product').data('id-wishlist');
			var id_new_wishlist = $(this).data('id-wishlist');
			var priority = $('.wishlist-product-priority-'+id_wishlist_product).val();
			var quantity = $('.wishlist-product-quantity-'+id_wishlist_product).val();
			$.ajax({
				type: 'POST',
				headers: {"cache-control": "no-cache"},
				url: wishlist_url+ '?rand=' + new Date().getTime(),
				async: true,
				cache: false,
				data: {
					"ajax": 1,
					"action": "move-wishlist-product",
					"id_new_wishlist": id_new_wishlist,
					"id_wishlist_product": id_wishlist_product,
					"id_old_wishlist": id_old_wishlist,
					"id_product" : id_product,
					"id_product_attribute": id_product_attribute,
					"quantity": quantity,
					"priority": priority,
					"token": tdtoken
				},
				success: function (result) {
					var object_result = $.parseJSON(result);
					if (object_result.errors.length) {
						$('.td-modal-wishlist .modal-title').html(object_result.errors);
						$('.td-modal-wishlist').removeClass('enable-action').modal('show');
					} else {
						object_e.parents('.td-wishlistproduct-item').fadeOut(function(){
							$(this).remove();
							if (!object_parent_e.find('.td-wishlistproduct-item').length) {
								$('.send-wishlist').hide();
								$('.list-wishlist tr.show .view-wishlist-product').trigger('click');
							}
						});
						refeshWishlist(id_new_wishlist);
						refeshWishlist(id_old_wishlist);
					}
					object_e.removeClass('active');
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
				}
			});
		}
		return false;
	})
}

function activeEventModalWishlist()
{
	$('.td-modal-wishlist').on('hide.bs.modal', function (e) {
		resetButtonAction();
	})

	$('.td-modal-wishlist').on('hidden.bs.modal', function (e) {
		$('body').css('padding-right', '');
	})
	$('.td-modal-wishlist').on('show.bs.modal', function (e) {
		if ($('.quickview.modal').length) {
			$('.quickview.modal').modal('hide');
		}
	});
}

function resetButtonAction(){
	if ($('.td-wishlist-button.active').length) {
		$('.td-wishlist-button.active').removeClass('active');
	}

	if ($('.wishlist-item.active-add').length) {
		$('.wishlist-item.active-add').removeClass('active-add');
	}
	$('.default-wishlist.active').removeClass('active');
	$('.delete-wishlist.active').removeClass('active');
	$('.list-wishlist tr.active').removeClass('active');
}

function createSendWishlistModalPopup()
{
	var SendWishlistModalPopup = '';
	SendWishlistModalPopup += '<div class="modal td-modal-send-wishlist fade" tabindex="-1" role="dialog" aria-hidden="true">';
		SendWishlistModalPopup += '<div class="modal-dialog" role="document">';
			SendWishlistModalPopup += '<div class="modal-content">';
				SendWishlistModalPopup += '<div class="modal-header">';
					SendWishlistModalPopup += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
						SendWishlistModalPopup += '<span aria-hidden="true">&times;</span>';
					SendWishlistModalPopup += '</button>';
					SendWishlistModalPopup += '<h5 class="modal-title text-xs-center">';
					SendWishlistModalPopup += '</h5>';
				SendWishlistModalPopup += '</div>';
				SendWishlistModalPopup += '<div class="modal-body">';
					SendWishlistModalPopup += '<div class="send_wishlist_form_content">';
						SendWishlistModalPopup += '<form class="form-send-wishlist" action="#" method="post">'
							for (var $i=1; $i<= 10; $i++) {
								SendWishlistModalPopup += '<div class="form-group row">';
								  SendWishlistModalPopup += '<label class="col-form-label col-sm-2 text-sm-left" for="wishlist_email_'+$i+'">'+wishlist_email_txt+' '+$i+'</label>';
									SendWishlistModalPopup += '<div class="wishlist_email_status col-sm-1">';
										SendWishlistModalPopup += '<div class="wishlist_email_status_loading cssload-speeding-wheel">';
										SendWishlistModalPopup += '</div>';
										SendWishlistModalPopup += '<i class="send_wishlist_msg send_wishlist_success material-icons">&#xE876;</i>';
										SendWishlistModalPopup += '<i class="send_wishlist_msg send_wishlist_error material-icons">&#xE033;</i>';
									SendWishlistModalPopup += '</div>';
									SendWishlistModalPopup += '<div class="col-sm-9">';
								  SendWishlistModalPopup += '<input class="form-control wishlist_email" id="wishlist_email_'+$i+'" name="wishlist_email_'+$i+'" type="email">';
									SendWishlistModalPopup += '</div>';
								SendWishlistModalPopup += '</div>';
							}
							SendWishlistModalPopup += '<button class="btn btn-primary form-control-submit td-fake-send-wishlist pull-xs-right" type="submit"></button>';
						SendWishlistModalPopup += '</form>';
					SendWishlistModalPopup += '</div>';
				SendWishlistModalPopup += '</div>';
				SendWishlistModalPopup += '<div class="modal-footer">';
					SendWishlistModalPopup += '<button type="button" class="btn btn-primary td-modal-reset-send-wishlist">'+wishlist_reset_txt+'</button>';
					SendWishlistModalPopup += '<button type="button" class="btn btn-secondary" data-dismiss="modal">'+wishlist_cancel_txt+'</button>';
					SendWishlistModalPopup += '<button type="button" class="td-modal-send-wishlist-bt btn btn-primary">';
						SendWishlistModalPopup += '<span>';
							SendWishlistModalPopup += wishlist_send_txt;
						SendWishlistModalPopup += '</span>';
					SendWishlistModalPopup += '</button>';
				SendWishlistModalPopup += '</div>';
			SendWishlistModalPopup += '</div>';
		SendWishlistModalPopup += '</div>';
	SendWishlistModalPopup += '</div>';
	$('body').append(SendWishlistModalPopup);
}

function validateEmail(email) {
	var reg = /^[a-z\p{L}0-9!#$%&'*+\/=?^`{}|~_-]+[.a-z\p{L}0-9!#$%&'*+\/=?^`{}|~_-]*@[a-z\p{L}0-9]+[._a-z\p{L}0-9-]*\.[a-z\p{L}0-9]+$/i;
	return reg.test(email);
}

function refeshWishlist(id_wishlist)
{
	$.ajax({
		type: 'POST',
		headers: {"cache-control": "no-cache"},
		url: wishlist_url+ '?rand=' + new Date().getTime(),
		async: true,
		cache: false,
		data: {
			"ajax": 1,
			"action": "get-wishlist-info",
			"id_wishlist": id_wishlist,
			"token": tdtoken
		},
		success: function (result) {
			var object_result = $.parseJSON(result);
			if (object_result.errors.length) {
				$('.td-modal-wishlist .modal-title').html(object_result.errors);
				$('.td-modal-wishlist').removeClass('enable-action').modal('show');
			} else {
				$('.wishlist-numberproduct-'+id_wishlist).html(object_result.result.number_product);
			}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
			alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
		}
	});
}