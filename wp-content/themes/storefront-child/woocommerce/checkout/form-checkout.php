<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.3.0
 */

if (!defined('ABSPATH')) {
    exit;
}


?>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
    <div class="row">
        <?php if (sizeof($checkout->checkout_fields) > 0) : ?>

        <?php do_action('woocommerce_checkout_before_customer_details'); ?>
        <div class="col-sm-1"></div>
        <div class="col-sm-7 mt-3 p-0 p-sm-3 desc-product2 entry-content order-block">
            <div id="customer_details">

                <?php do_action('woocommerce_checkout_billing'); ?>
                <?php do_action('woocommerce_checkout_shipping'); ?>
            </div>


            <?php do_action('woocommerce_checkout_after_customer_details'); ?>

            <?php endif; ?>

            <h3 id="order_review_heading"><span class="order-numbers">2.</span> Выберите способ доставки
                и оплаты</h3>

            <?php do_action('woocommerce_checkout_before_order_review'); ?>

            <script id="ISDEKscript" type="text/javascript" src="https://widget.cdek.ru/widget/widjet.js"></script>
            <script type="text/javascript">
                jQuery($ => {
                    const setCookie = (name, value, days) => {
                        let expires = "";
                        if (days) {
                            let date = new Date();
                            date.setTime(date.getTime() + (days * 1000));
                            expires = "; expires=" + date.toUTCString();
                        }
                        document.cookie = name + "=" + (value || "") + expires + "; path=/";
                    }

                    const getCookie = (name) => {
                        let nameEQ = name + "=";
                        let ca = document.cookie.split(';');
                        for (let i = 0; i < ca.length; i++) {
                            let c = ca[i];
                            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
                        }
                        return null;
                    }
                    $(document).ready(function () {
                        $(window).keydown(function (event) {
                            if (event.keyCode === 13) {
                                event.preventDefault();
                                return false;
                            }
                        });

                        let defaultCity = 'Москва';
                        let billing_city = $('#billing_city');

                        $('body').on('change', '#billing_city', function () {

                            $('#5iPCq_cdek_search_input').val($(this).val())
                            if ($('#shipping_method_0_cdek_shipping_method').is(':checked')) {
                                if (billing_city.val().trim() !== '') {
                                    defaultCity = billing_city.val().trim()
                                } else {
                                    defaultCity = 'Москва';
                                }
                                $('.ISDEKscript').collapse('show');
                                var ourWidjet = new ISDEKWidjet({
                                    defaultCity: defaultCity, //какой город отображается по умолчанию
                                    cityFrom: 'Москва', // из какого города будет идти доставка
                                    country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
                                    link: 'forpvz', // id элемента страницы, в который будет вписан виджет
                                    path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета
                                    servicepath: 'http://localhost:8888/service.php', //ссылка на файл service.php на вашем сайте
                                    apikey: 'fcfa7a2e-3837-4c84-b783-87041d648ad5',
                                    hidedress: true,
                                    hidecash: true,
                                    // hidedelt: true,
                                    onReady: onReady,
                                    onChoose: onChoose,
                                    onChooseProfile: onChooseProfile,
                                    onCalculate: onCalculate
                                });
                            } else {
                                $('.ISDEKscript').collapse('hide');
                            }
                        });

                        if ($('#shipping_method_0_cdek_shipping_method').is(':checked')) {
                            $('.ISDEKscript').collapse('show');
                            if (billing_city.val().trim() !== '') {
                                defaultCity = billing_city.val().trim()
                            } else {
                                defaultCity = 'Москва';
                            }
                            var ourWidjet = new ISDEKWidjet({
                                defaultCity: defaultCity, //какой город отображается по умолчанию
                                cityFrom: 'Москва', // из какого города будет идти доставка
                                country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
                                link: 'forpvz', // id элемента страницы, в который будет вписан виджет
                                path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета
                                servicepath: 'http://localhost:8888/service.php', //ссылка на файл service.php на вашем сайте
                                apikey: 'fcfa7a2e-3837-4c84-b783-87041d648ad5',
                                hidedress: true,
                                hidecash: true,
                                // hidedelt: true,
                                onReady: onReady,
                                onChoose: onChoose,
                                onChooseProfile: onChooseProfile,
                                onCalculate: onCalculate
                            });
                        } else {
                            $('.ISDEKscript').collapse('hide');
                        }

                        $("body").on('change', '.shipping_method', function () {

                            if ($('#shipping_method_0_cdek_shipping_method').is(':checked')) {
                                $('.ISDEKscript').collapse('show');
                                if (billing_city.val().trim() !== '') {
                                    defaultCity = billing_city.val().trim()
                                } else {
                                    defaultCity = 'Москва';
                                }
                                var ourWidjet = new ISDEKWidjet({
                                    defaultCity: defaultCity, //какой город отображается по умолчанию
                                    cityFrom: 'Москва', // из какого города будет идти доставка
                                    country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
                                    link: 'forpvz', // id элемента страницы, в который будет вписан виджет
                                    path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета
                                    servicepath: 'http://localhost:8888/service.php', //ссылка на файл service.php на вашем сайте
                                    apikey: 'fcfa7a2e-3837-4c84-b783-87041d648ad5',
                                    hidedress: true,
                                    hidecash: true,
                                    // hidedelt: true,
                                    onReady: onReady,
                                    onChoose: onChoose,
                                    onChooseProfile: onChooseProfile,
                                    onCalculate: onCalculate
                                });
                            } else {
                                $('.ISDEKscript').collapse('hide')
                            }
                        })
                    });

                    const update = () => {
                        let input = $('#billing_address_1');
                        let text = input.val().trim();
                        input.val(text + 'cdek' + Math.random());
                        $(document.body).trigger('update_checkout');
                        setTimeout(() => {
                            input.val(text)
                        }, 100)
                    };

                    function onReady() {
                        $.post({
                            url: 'http://api.edu.cdek.ru/v2/oauth/token?parameters',
                            data: {
                                grant_type: 'client_credentials',
                                client_id: 'z9GRRu7FxmO53CQ9cFfI6qiy32wpfTkd',
                                client_secret: 'w24JTCv4MnAcuRTx0oHjHLDtyt3I6IBq'
                            },
                            contentType: 'application/x-www-form-urlencoded',
                        }, res => {
                            console.log(res)
                            setCookie('Authorization', res.token_type + ' ' + res.access_token, res.expires_in)
                        })
                        let dataContent = {
                            page: 0,
                            size: 100
                        }
                        $.get({
                            headers: {
                                Authorization: getCookie('Authorization')
                            },
                            url: 'https://api.edu.cdek.ru/v2/location/cities',
                            contentType: "application/json",
                            dataType: "json",
                            data: JSON.stringify(dataContent),
                        }, res => console.log(res))
                        $.get('http://integration.cdek.ru/v1/location/cities/json?&page=0', res=> console.log(res))
                        console.log('Виджет загружен');
                    }

                    function onChoose(wat) {
                        console.log(wat)
                        $.post({
                            url: my_ajaxurl, // where to submit the data
                            data: {
                                action: 'change_price_action', // load function hooked to: "wp_ajax_*" action hook
                                price: wat.price, // PHP: $_POST['price']
                                name: 'CDEK Самовывоз ' + wat.PVZ.Address, // PHP: $_POST['price']
                            },

                        }, res => {
                            update();
                            console.log(res)
                        });

                        $('#shipping_cdek_field_value').val('Выбран пункт выдачи заказа ' + wat.id + "\n" +
                            'город ' + wat.cityName + ', код города ' + wat.city)
                    }

                    function onChooseProfile(wat) {
                        console.log(wat)
                        let dataContent = {
                            "number": "ddOererre7450813980068",
                            "comment": "Новый заказ",
                            "delivery_recipient_cost": {
                                "value": 500
                            },
                            "delivery_recipient_cost_adv": [{
                                "sum": 3000,
                                "threshold": 200
                            }],
                            "from_location": {
                                "code": "44",
                                "fias_guid": "",
                                "postal_code": "",
                                "longitude": "",
                                "latitude": "",
                                "country_code": "",
                                "region": "",
                                "sub_region": "",
                                "city": "Москва",
                                "kladr_code": "",
                                "address": "пр. Ленинградский, д.4"
                            },
                            "to_location": {
                                "code": "270",
                                "fias_guid": "",
                                "postal_code": "",
                                "longitude": "",
                                "latitude": "",
                                "country_code": "",
                                "region": "",
                                "sub_region": "",
                                "city": "Новосибирск",
                                "kladr_code": "",
                                "address": "ул. Блюхера, 32"
                            },
                            "items_cost_currency": "RUB",
                            "packages": [{
                                "number": "bar-001",
                                "comment": "Упаковка",
                                "height": 10,
                                "items": [{
                                    "ware_key": "00055",
                                    "payment": {
                                        "value": 3000
                                    },
                                    "name": "Товар",
                                    "cost": 300,
                                    "amount": 2,
                                    "weight": 700,
                                    "url": "www.item.ru"
                                }],
                                "length": 10,
                                "number": "0123456",
                                "weight": 4000,
                                "width": 10
                            }],
                            "recipient": {
                                "name": "Иванов Иван",
                                "phones": [{
                                    "number": "+79134637228"
                                }]
                            },
                            "recipient_currency": "RUB",
                            "sender": {
                                "name": "Петров Петр"
                            },
                            "services": [{
                                "code": "DELIV_WEEKEND"
                            }],
                            "tariff_code": 137
                        }
                        $.post({
                            headers: {
                                Authorization: getCookie('Authorization')
                            },
                            url: 'https://api.edu.cdek.ru/v2/orders',
                            contentType: "application/json",
                            dataType: "json",
                            data: JSON.stringify(dataContent),
                        }, res => {
                            console.log(res)
                        })
                        $.post({
                            url: my_ajaxurl, // where to submit the data
                            data: {
                                action: 'change_price_action', // load function hooked to: "wp_ajax_*" action hook
                                price: wat.price, // PHP: $_POST['price']
                                name: 'CDEK Доставка курьером в город ' + wat.cityName, // PHP: $_POST['price']
                            },

                        }, res => {
                            update();
                            console.log(res)
                        });
                        $('#shipping_cdek_field_value').val('Выбрана доставка курьером в город ' + wat.cityName + ', код города ' + wat.city)
                        $('.address-field').addClass('validate-required');
                    }

                    function onCalculate(wat) {
                        console.log('Расчет стоимости доставки произведен');
                    }
                })


            </script>
            <div class="ISDEKscript mb-3 collapse">
                <div id="forpvz" style="width:100%; height:600px;"></div>
            </div>

            <div id="order_review" class="woocommerce-checkout-review-order">

                <?php do_action('woocommerce_checkout_order_review'); ?>
            </div>

            <?php do_action('woocommerce_checkout_after_order_review'); ?>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="desc-product2 entry-content block-order-help">
            <div class="entry-content">
                <img src="/images/stepa-master.jpg" alt="Степан Васильев"
                     class="stepan text-center">
                <p><i class="fa fa-quote-right" aria-hidden="true"></i></p>
                <p style="font-style: italic">Оформление заказа не должно занять у вас более 3-х
                    минут. Если будут вопросы, то звоните по номеру:<br><strong>8 (916)
                        322-31-69</strong></p>
                <img src="/images/signature.png" alt="Степан Васильев">
            </div>
        </div>
        <div class="desc-product2 mt30 entry-content block-order-help">
            <div class="entry-content">
                <p><strong>Только <span>
					<script type="text/javascript">
								d = new Date();
                                p = new Date(d.getTime());
                                monthA = 'января,февраля,марта,апреля,мая,июня,июля,августа,сентября,октября,ноября,декабря'.split(',');
                                document.write(p.getDate() + ' ' + monthA[p.getMonth()]);
							</script>
							с
							<script type="text/javascript">
								var ot = d.getHours() - 1;
                                (ot < 0) ? ot = 23 : ot = ot;
                                document.write(ot);
							</script>:00
							до
							<script type="text/javascript">
								document.write(d.getHours() + 1);
					</script>:00</span>!</strong></p>
                <p>Оформи заказ и получи +<?php
                    $quotes = array(); // Инициализируем пустой массив
                    $quotes[] = '5';
                    $quotes[] = '15';
                    $quotes[] = '10';
                    $number = mt_rand(0, count($quotes) - 1);
                    echo $quotes[$number]; // Выводим цитату
                    ?> к <?php
                    $quotes = array(); // Инициализируем пустой массив
                    $quotes[] = 'красоте';
                    $quotes[] = 'удаче';
                    $quotes[] = 'успеху';
                    $number = mt_rand(0, count($quotes) - 1);
                    echo $quotes[$number]; // Выводим цитату
                    ?>. 😉</p>
            </div>
        </div>
    </div>
</form>


<div class="container main-content-area">
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
