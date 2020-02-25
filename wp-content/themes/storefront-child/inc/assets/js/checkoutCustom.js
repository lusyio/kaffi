jQuery($ => {
    $('#billing_phone').mask('+79999999999');


    $(document).ready(function () {
        if ($('#billing_address_1').val() === '') {
            if ($('#shipping_method_0_local_pickup1').is(':checked')) {
                $('#billing_address_1').val('Самовывоз');
            }
        }
    });

    $('body').on('change', '.shipping_method', function () {
        if ($('#billing_address_1').val() === '') {
            if ($('#shipping_method_0_local_pickup1').is(':checked')) {
                $('#billing_address_1').val('Самовывоз');
            }
        } else {
            if ($('#billing_address_1').val() === 'Самовывоз') {
                $('#billing_address_1').val('');
            }
        }
    });
});