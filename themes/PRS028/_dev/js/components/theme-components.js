/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
import $ from 'jquery';
import prestashop from 'prestashop';

$(document).ready(function () {
    backToTop();
    pagePreloader();
    uiToolTips();
    productHover();
    tdcountdownproduct(".tdcountdown");
    
    $(window).resize(productHover);
    stickyHeader();
    stickyProductSidebar();

    $('body').on('show.bs.modal', '.quickview', (function () {
        uiToolTips();
    }));
    prestashop.on('updateProductList', function (event) {
        if (themeOpt.infiniteScroll != 'default') {
            $('#product-list .pagination').attr("hidden","");
        }
        uiToolTips();
        productHover();
        tdcountdownproduct(".tdcountdown");
    });
    prestashop.on('updatedProduct', function (event) {
        uiToolTips();
        tdcountdownproduct(".tdcountdown");
    });

    function backToTop() {
        if (themeOpt.g_bttop == 1) {
            let $backToTop = $('.backtotop');
            $(window).scroll(function () {
                if ($(this).scrollTop() > 500) {
                    $backToTop.fadeIn(500);
                } else {
                    $backToTop.fadeOut(500);
                }
            });

            $backToTop.on('click', function (e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 500);
            });
        }
    }

    function pagePreloader() {
        if (themeOpt.g_preloader != 'prenone') {
            var loader = $('.loader-wrapper')
            if (loader.length) {
                $(window).on('beforeunload', function() {
                    loader.fadeIn(500, function() {
                        loader.fadeIn(100)
                    });
                });

                $(window).on('load', function () {
                    loader.fadeOut(800);
                });
            }
        }
    }

    function uiToolTips() {
        var $uiEl = $('.tip_inside');
        if (themeOpt.tip_toggle == 1 && $('#ui_tip').length === 0) {
            $('body').append('<div id="ui_tip"><div class="ui_wrapper"><span class="ui_title"></span></div></div>');
        }
        var $uiTip = $('#ui_tip');
        var $uiTipTitle = $uiTip.find('.ui_title');
        $uiEl.on('mousemove', function (e) {
            $uiTip.css({
                top: e.clientY,
                left: e.clientX
            });
            var winwidth = $(window).width(),
                tipwidth = $('#ui_tip').width(),
                tiprightdot = e.clientX + tipwidth + 14 + 40; // plus 40 padding compensation
            if (tiprightdot > winwidth) {
                $('#ui_tip').addClass('align-right');
            } else {
                $('#ui_tip').removeClass('align-right');
            }
        });

        $uiEl.on('mouseover', function (e) {
            $uiTipTitle.text($(this).find('.tip').text());
            setTimeout(function () {
                $uiTip.addClass('active');
            }, 1);
        }).on('mouseout', function (e) {
            $uiTip.removeClass('active');
        });
    }

    function productHover() {
        if ($(window).width() <= 1024) {
            $('.product-miniature').on('click', function (e) {
                var hoverClass = 'hovered';
                if (!jQuery(this).hasClass(hoverClass) && themeOpt.hover_mobile_click == 1) {
                    e.preventDefault();
                    $('.' + hoverClass).removeClass(hoverClass);
                    $(this).addClass(hoverClass);
                }
            });
            $(document).on('click touchstart', function (e) {
                if ($(e.target).closest('.hovered').length == 0) {
                    $('.hovered').removeClass('hovered');
                }
            });
        }

        $('.product-miniature').each(function () {
            var $el = $(this),
            widthHiddenInfo = $el.outerWidth();
    
            if (widthHiddenInfo < 255 || $(window).width() <= 1024) {
                $el.removeClass('hover-desktop').addClass('hover-mobile');
            } else {
                $el.removeClass('hover-mobile').addClass('hover-desktop');
            }
        })
    }

    function tdcountdownproduct(prdCountdown) {
        $(prdCountdown).each(function(){
            $(this).not('.loaded').tdcountdown({
                date: $(this).data('date')
            });
            $(this).addClass('loaded');
        });
    }

    $(window).scroll(function() {
        var scrollP = $(window).scrollTop();
        if ($('.load-product.scroll').length){
            var mytop = parseInt($('.load-product').offset().top - $(window).height());
            if(scrollP >= mytop){
                loadmoreProducts();
            }
        }
    });

    $('.load-product .prdLink').on('click', function (e) {
        e.preventDefault();
        loadmoreProducts();
    });

    var requesting = false;
    function loadmoreProducts() {
        var url = jQuery('#product-list .pagination .pagination_bottom ul li.current').next().children('a[rel="nofollow"]').attr('href');
        if (url && url.indexOf('page') != -1 && !requesting){
            jQuery('.load-product .preload').removeClass('d-none');
            jQuery('.load-product .prdLink').addClass('d-none');
            requesting = true;
            jQuery.get( url, function( data ) {
                var $data = jQuery(data);
                var $products = $data.find( '#product-list .products' ).html();
                jQuery('#product-list .products').append($products);
                jQuery('#product-list .pagination').html($data.find( '#product-list .pagination' ).html());

                jQuery('.load-product .preload').addClass('d-none');
                jQuery('.load-product .prdLink').removeClass('d-none');
                setTimeout(function(){requesting = false;}, 100);
                uiToolTips();
                productHover();
                tdcountdownproduct(".tdcountdown");
            });
        } else {
            jQuery('.load-product .prdLink').addClass('d-none');
            jQuery('.load-product.button .loading-msg').removeClass('d-none').delay(5000).fadeOut('2000');
        }
    }

    /* Responsive Tab */
    $('.active[data-toggle="tab"]').each(function() {
        var $this = $(this).closest('.box-nav-tab');
        $this.find('.dropdown-toggle-nav-tab').html($(this).html());
    });
    $('[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        var $this = $(this).closest('.box-nav-tab');
        $this.find('.dropdown-toggle-nav-tab').html($(this).html());
        $this.find('.dropdown-menu-nav-tab').removeClass('active');
    });
    $('body').on('click', '.dropdown-toggle-nav-tab', (function(e) {
        var $this = $(this).closest('.box-nav-tab');
        $this.find('.dropdown-menu-nav-tab').toggleClass('active');
        e.stopPropagation();
    }));
    $("body").click(function(e) {
        $(".dropdown-menu-nav-tab").removeClass('active');
    });

    // function stickySidebar() {
    //     var sidebarMarginTop = 20;
    //     if ($('#header').hasClass('sticky-header')) {
    //         if (themeOpt.h_layout == 1) {
    //             var sidebarMarginTop = $(".nav-full-width").height() + 20;
    //         } else if (themeOpt.h_layout == 2) {
    //             var sidebarMarginTop = $(".header-top").height() + 20;
    //         }
    //     }

    //     $('#left-column, #content-wrapper, #right-column').theiaStickySidebar({
    //         additionalMarginTop: sidebarMarginTop,
    //         minWidth: 992,
    //     });		
    // }

    function stickyProductSidebar() {
        var sidebarMarginTop = 20;
        if ($('#header').hasClass('sticky-header')) {
            if (themeOpt.h_layout == 1) {
                var sidebarMarginTop = $(".nav-full-width").outerHeight() + 20;
            } else if (themeOpt.h_layout == 2) {
                var sidebarMarginTop = $(".header-top").outerHeight() + 20;
            }
        }

        $('#content-wrapper .product-images, #content-wrapper .product-infos').theiaStickySidebar({
            additionalMarginTop: sidebarMarginTop,
            minWidth: 768,
        });		
    }

    function stickyHeader() {
        if (!$('#header').hasClass('sticky-header')) {
            return false;
        }

        var fixed = $(".nav-full-width");
        if (themeOpt.h_layout == 1) {
            fixed = $(".nav-full-width");
        } else if (themeOpt.h_layout == 2) {
            fixed = $(".header-top");
        }

        let sticky = new Waypoint.Sticky({
            element: fixed[0],
            wrapper: '<div class="sticky-header-wrapper" />',
            stuckClass: 'fixed',
            offset: 0
        });
    }

});