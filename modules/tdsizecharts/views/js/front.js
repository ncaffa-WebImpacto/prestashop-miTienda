/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

jQuery(document).ready(function( $ ) {
	productTdSizeChart();
	// prestashop.on('updatedProduct', function (event) {
	// 	product360Button();
	// });
	$('body').on('shown.bs.modal', '.quickview', (function() {
		productTdSizeChart();
	}));
});

function productTdSizeChart() {
	$('.tdsize-chart a').magnificPopup({
		type: 'inline',
		mainClass: 'mfp-fade',
		preloader: false,
		fixedContentPos: false,
	});
}
/* Product 360 view End*/