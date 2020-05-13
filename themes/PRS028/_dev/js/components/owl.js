import $ from 'jquery';

export default class OwlCarousel {
    init() {
        let owlAttr = { responsiveClass:true, rewind: true, navText: ['<i class="material-icons">chevron_left</i>', '<i class="material-icons">chevron_right</i>'] };

        $('[data-owl-carousel]').not('.owl-loaded').each(function() {
            let self = $(this);
            let dataAttr = self.data('owl-carousel');
            $.extend(owlAttr, dataAttr);
            self.owlCarousel(owlAttr);
        });
    }
}
