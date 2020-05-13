/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
$(document).ready(function(){
	$(document).on('click', '.add_to_compare', function(e){
		e.preventDefault();
		if (typeof addToCompare != 'undefined') {
			addToCompare(parseInt($(this).data('id-product')));
		}
	});
	modelCompare();
	reloadProductComparison();
	compareButtonsStatusRefresh();
	totalCompareButtons();
	activeEventModalCompare();
});

function modelCompare() {
	var modelCompare = '';
		modelCompare += '<div class="modal tdcompare-modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'
			modelCompare += '<div class="modal-dialog modal-dialog-centered" role="document">'
				modelCompare += '<div class="modal-content">'
					modelCompare += '<div class="modal-header">'
						modelCompare += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
							modelCompare += '<span aria-hidden="true">&times;</span>'
						modelCompare += '</button>'
						modelCompare += '<div class="modal-title">'
						modelCompare += '</div>'
					modelCompare += '</div>'
				modelCompare += '</div>'
			modelCompare += '</div>'
		modelCompare += '</div>'

	$('body').append(modelCompare);
}

function addToCompare(productId)
{
	var totalValueNow = parseInt($('.bt_compare').next('.compare_product_count').val());
	var action, totalVal;
	var content_max_product = max_item + '. <a href="'+compareUrl+'"><strong>'+compareView+'</strong></a>';
	var content_add_product = compareAdd + '. <a href="'+compareUrl+'"><strong>'+compareView+'</strong></a>';
	var content_remove_product = compareRemove + '. <a href="'+compareUrl+'"><strong>'+compareView+'</strong></a>';
	if ($.inArray(parseInt(productId),comparedProductsIds) === -1) {
		action = 'add';
	} else {
		action = 'remove';
	}

	$.ajax({
		type: 'POST',
		headers: {"cache-control": "no-cache"},
		url: compareUrl + '?rand=' + new Date().getTime(),
		async: true,
		cache: false,
		data: {
			"ajax": 1,
			"action": action,
			"id_product": productId
		},
		success: function(data) {
			if (action === 'add' && comparedProductsIds.length < comparator_max_item) {
				comparedProductsIds.push(parseInt(productId)),
				compareButtonsStatusRefresh(),
				totalVal = totalValueNow +1,
				$('.bt_compare').next('.compare_product_count').val(totalVal),
				totalValue(totalVal);
				$('.tdcompare-modal .modal-title').html(content_add_product);
				$('.tdcompare-modal').modal('show');

				$('.add_to_compare[data-id-product='+productId+']').find('span.tip').text(buttoncompare_title_remove);
			} else if (action === 'remove') {
				comparedProductsIds.splice($.inArray(parseInt(productId), comparedProductsIds), 1),
				compareButtonsStatusRefresh(),
				totalVal = totalValueNow -1,
				$('.bt_compare').next('.compare_product_count').val(totalVal),
				totalValue(totalVal);
				$('.tdcompare-modal .modal-title').html(content_remove_product);
				$('.tdcompare-modal').modal('show');

				$('.add_to_compare[data-id-product='+productId+']').find('span.tip').text(buttoncompare_title_add);
			} else {
				$('.tdcompare-modal .modal-title').html(content_max_product);
				$('.tdcompare-modal').modal('show');
			}
			totalCompareButtons();
		},
		error: function(){},
		beforeSend: function(){
            $(".add_to_compare[data-id-product='"+productId+"']").addClass('adding');
        },
        complete: function(){
            $(".add_to_compare[data-id-product='"+productId+"']").removeClass('adding');
        }
	});
}

function reloadProductComparison()
{
	$(document).on('click', 'a.cmp_remove', function(e){
		e.preventDefault();
		var idProduct = parseInt($(this).data('id-product'));
		var totalValueNow = parseInt($('.bt_compare').next('.compare_product_count').val());
		$.ajax({
			type: 'POST',
			headers: {"cache-control": "no-cache"},
			url: compareUrl + '?rand=' + new Date().getTime(),
			async: true,
			cache: false,
			data: {
				"ajax": 1,
				"action": "remove",
				"id_product": idProduct
			},
			success: function(data) {
				totalVal = totalValueNow -1,
				$('.bt_compare').next('.compare_product_count').val(totalVal),
				totalValue(totalVal);
			},
		});
		$('td.product-' + idProduct).fadeOut(600);
	});
};

function compareButtonsStatusRefresh()
{
	$('.add_to_compare').each(function() {
		if ($.inArray(parseInt($(this).data('id-product')), comparedProductsIds) !== -1) {
			$(this).addClass('added');
		} else {
			$(this).removeClass('added');
		}
	});
}

function activeEventModalCompare()
{
	$('.tdcompare-modal').on('hidden.bs.modal', function (e) {
		$('body').css('padding-right', '');
	});
	$('.tdcompare-modal').on('show.bs.modal', function (e) {
		if ($('.quickview.modal').length) {
			$('.quickview.modal').modal('hide');
		}
	});
}

function totalCompareButtons()
{
	var totalProductsToCompare = parseInt($('.bt_compare .total-compare-val').html());
	if (typeof totalProductsToCompare !== "number" || totalProductsToCompare === 0) {
		$('button.bt_compare').attr("disabled",true);
	} else {
		$('button.bt_compare').attr("disabled",false);
	}
}

function totalValue(value)
{
	$('.bt_compare').find('.total-compare-val').html(value);
}