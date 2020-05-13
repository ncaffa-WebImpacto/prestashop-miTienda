/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
import $ from 'jquery';
import prestashop from 'prestashop';

$(document).ready(function () {
  createProductSpin();
  createInputFile();

  initSlickThumbs();
  initMagnificZoom();
  initZoom();

  prestashop.on('updatedProduct', function (event) {
    createInputFile();
    initSlickThumbs();
    initMagnificZoom();
    initZoom();
    if (event && event.product_minimal_quantity) {
      const minimalProductQuantity = parseInt(event.product_minimal_quantity, 10);
      const quantityInputSelector = '#quantity_wanted';
      let quantityInput = $(quantityInputSelector);

      quantityInput.trigger('touchspin.updatesettings', {min: minimalProductQuantity});
    }
    $($('.tabs .nav-link.active').attr('href')).addClass('active').removeClass('fade');
    $('.js-product-images-modal').replaceWith(event.product_images_modal);
  });


  $('body').on('shown.bs.modal', '.quickview', (function() {
    initSlickThumbs();
    initMagnificZoom();
    initZoom();
    $(window).trigger('resize');
  }));

  function initSlickThumbs() {
    $('.js-cover-carousel').each(function() {
      var $this = $(this);
      $this.find('.js-product-cover-images:not(.slick-initialized)').first().slick({
        dots: false,
        fade: true,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        prevArrow: '<button class="slick-prev slick-arrow"></button>',
        nextArrow: '<button class="slick-next slick-arrow"></button>',
        asNavFor: $this.find('.js-thumb-product-images')
      });
      $this.find('.js-thumb-product-images:not(.slick-initialized)').first().slick({
        dots: false,
        arrows: true,
        vertical: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        prevArrow: '<button class="slick-prev slick-arrow"></button>',
        nextArrow: '<button class="slick-next slick-arrow"></button>',
        asNavFor: $this.find('.js-product-cover-images'),
        focusOnSelect: true
      });
    });
    $('.js-cover-vcarousel').each(function() {
      var $this = $(this);
      $this.find('.js-product-cover-images:not(.slick-initialized)').first().slick({
        dots: false,
        fade: true,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        prevArrow: '<button class="slick-prev slick-arrow"></button>',
        nextArrow: '<button class="slick-next slick-arrow"></button>',
        asNavFor: $this.find('.js-thumb-product-images')
      });

      setTimeout(function () {
        $this.find('.js-thumb-product-images:not(.slick-initialized)').first().slick({
          dots: false,
          arrows: true,
          vertical: true,
          verticalSwiping: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: false,
          prevArrow: '<button class="slick-prev slick-arrow"></button>',
          nextArrow: '<button class="slick-next slick-arrow"></button>',
          asNavFor: $this.find('.js-product-cover-images'),
          focusOnSelect: true
        });
      }, 500);
      
    })
    $('.js-cover-multicarousel').each(function() {
      var $this = $(this);
      $this.find('.js-product-cover-images:not(.slick-initialized)').first().slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        prevArrow: '<button class="slick-prev slick-arrow"></button>',
        nextArrow: '<button class="slick-next slick-arrow"></button>',
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        }, {
          breakpoint: 544,
          settings: {
            slidesToShow: 1
          }
        }]
      });
    });
    $('.js-cover-singlecarousel').each(function() {
      var $this = $(this);
      $this.find('.js-product-cover-images:not(.slick-initialized)').first().slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        prevArrow: '<button class="slick-prev slick-arrow"></button>',
        nextArrow: '<button class="slick-next slick-arrow"></button>'
      });
    });
  }

  function initMagnificZoom() {
    $('.js-product-cover-images').each(function() {
      var $this = $(this);
      $this.magnificPopup({
        delegate: '.layer',
        type: 'image',
        tLoading: '',
        gallery: {
          enabled: true
        }
      });
    });
  }

  function initZoom() {
    if (themeOpt.pp_zoom == 1) {
      $('.easyzoom').easyZoom({
        loadingNotice: '',
        linkAttribute: 'data-image',
      });
    }
  }

  function createInputFile()
  {
    $('.js-file-input').on('change', (event) => {
      let target, file;

      if ((target = $(event.currentTarget)[0]) && (file = target.files[0])) {
        $(target).prev().text(file.name);
      }
    });
  }

  function createProductSpin()
  {
    const $quantityInput = $('#quantity_wanted');

    $quantityInput.TouchSpin({
      buttondown_class: 'btn js-touchspin',
      buttonup_class: 'btn js-touchspin',
      min: parseInt($quantityInput.attr('min'), 10),
      max: 1000000
    });

    $('body').on('change keyup', '#quantity_wanted', (e) => {
      $(e.currentTarget).trigger('touchspin.stopspin');
      prestashop.emit('updateProduct', {
        eventType: 'updatedProductQuantity',
        event: e
      });
    });
  }
});

$(document).on('shown.bs.modal','#product-modal', function (e) {
    $('#js-slick-product').resize();
});

//add to cart loader
$(document).on('click','.js-add-to-cart:enabled:not(.is--loading)',function(){
    $(this).addClass('is--loading').attr("disabled", true);
});
prestashop.on('updateCart', function (event) {
    removeAddToCartLoader();
});
prestashop.on('handleError', function (event) {
    removeAddToCartLoader();
    $('.js-add-to-cart').attr("disabled", false);
});
function removeAddToCartLoader(){
    $('.js-add-to-cart.is--loading').removeClass('is--loading');
}