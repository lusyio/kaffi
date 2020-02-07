jQuery(function ($) {

    var isoGrid = $('.products').imagesLoaded(function () {
        let params = {
            layoutMode: 'fitRows',
            itemSelector: '.product'
        };
        isoGrid = $('.products').isotope(params);

        // store filter for each group
        let filters = {};

        // flatten object by concatting values
        function concatValues(obj) {
            let value = '';
            for (let prop in obj) {
                value += obj[prop];
            }
            return value;
        }

        $('.products').on('click', '.additional-product', function (event) {
            let $button = $(event.currentTarget);
            // get group key
            let filterGroup1 = $(this).attr('data-filter-group');
            // set filter for group
            let qfilters = {};
            qfilters[filterGroup1] = $button.attr('data-filter');
            // combine filters
            let filterValue1 = concatValues(qfilters);

            let $buttonGroup = $('.button-group');

            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $buttonGroup.find(`[data-filter='${filterValue1}']`).addClass('is-checked').trigger('click');
        })

        $('.filters').on('click', '.button', function (event) {
            let $button = $(event.currentTarget);
            // get group key
            let $buttonGroup = $button.parents('.button-group');
            let filterGroup = $buttonGroup.attr('data-filter-group');
            // set filter for group
            filters[filterGroup] = $button.attr('data-filter');
            // combine filters
            let filterValue = concatValues(filters);
            // set filter for Isotope
            isoGrid.isotope({filter: filterValue});
        });

        isoGrid.on('arrangeComplete', function (event, filteredItems) {
            if (filteredItems.length === 0) {
                $('.empty-item-isotope').show();
            } else {
                $('.empty-item-isotope').hide();
            }
        });

        // change is-checked class on buttons
        $('.button-group').each(function (i, buttonGroup) {
            let $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function (event) {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                let $button = $(event.currentTarget);
                $button.addClass('is-checked');
            });
        });
    });

    $(document).ready(function () {
        let utm = 'utm_content';
        if (window.location.toString().indexOf(utm + '=') !== -1) {
            let number = (window.location.toString().substr(window.location.toString().indexOf(utm + '=') + utm.length + 1, 50)).toLowerCase();
            if (number.indexOf('&') !== -1) {
                number = (number.substr(0, number.indexOf('&')));
            }
            if (number === 'gold') {
                isoGrid.isotope({filter: '.product_cat-gold'});
                $('.ui-group .filters .button').removeClass('is-checked');
                $('#product_cat-gold').addClass('is-checked');
            }
            if (number === 'silver') {
                isoGrid.isotope({filter: '.product_cat-silver'});
                $('.ui-group .filters .button').removeClass('is-checked');
                $('#product_cat-silver').addClass('is-checked');
            }
            if (number === 'swarovski') {
                isoGrid.isotope({filter: '.product_cat-swarovski'});
                $('.ui-group .filters .button').removeClass('is-checked');
                $('#product_cat-swarovski').addClass('is-checked');
            }
        }
    });
});

