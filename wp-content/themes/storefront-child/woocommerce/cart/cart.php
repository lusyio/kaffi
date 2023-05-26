<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>


<div class="row">
    <div class="col-12 p-0">
        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>

            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                <thead>
                <tr>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
                    <th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
                    <th class="product-remove">Удалить</th>
                </tr>
                </thead>
                <tbody>
                <?php do_action('woocommerce_before_cart_contents'); ?>

                <?php
                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                        ?>
                        <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                            <td class="product-thumbnail">
                                <?php
                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                if (!$product_permalink) {
                                    echo $thumbnail; // PHPCS: XSS ok.
                                } else {
                                    printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                }
                                ?>
                            </td>

                            <td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                <?php
                                if (!$product_permalink) {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                } else {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                }

                                do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                // Meta data.
                                echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                                // Backorder notification.
                                if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                }
                                ?>
                            </td>

                            <td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                <?php
                                echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                                ?>
                            </td>


                            <td class="product-remove">
                                <?php
                                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    'woocommerce_cart_item_remove_link',
                                    sprintf(
                                        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                        esc_html__('Remove this item', 'woocommerce'),
                                        esc_attr($product_id),
                                        esc_attr($_product->get_sku())
                                    ),
                                    $cart_item_key
                                );
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

                <?php do_action('woocommerce_cart_contents'); ?>

                <?php do_action('woocommerce_after_cart_contents'); ?>
                </tbody>
            </table>
            <?php do_action('woocommerce_after_cart_table'); ?>
        </form>
    </div>
</div>


<?php do_action('woocommerce_before_cart_collaterals'); ?>
<div class="row">
    <div class="col-12 p-0">

        <div class="cart-collaterals">
            <?php
            /**
             * Cart collaterals hook.
             *
             * @hooked woocommerce_cross_sell_display
             * @hooked woocommerce_cart_totals - 10
             */
            do_action('woocommerce_cart_collaterals');
            ?>
        </div>
    </div>
</div>
<div class="visible-xs-block">
    <h2>Как заказать?</h2>
    <p>Есть несколько способов:</p>
    <ol class="howto">
        <li>Просто нажмите на кнопку <strong><a href="/checkout">"Перейти к оформлению"</a></strong>, далее
            останется
            просто указать свои данные и выбрать способ доставки и оплаты.
        </li>
        <li>Можно позвонить мастеру-ювелиру Степану Васильеву <a href="tel:<?php echo get_option('header_contact_setting_company') ?>"><?php echo get_option('header_contact_setting_phone') ?></a>. Он
            ответит на все Ваши вопросы и примет заказ.
        </li>
        <li>Также можно написать Степану в WhatsApp или Viber. Просто начните чат с <a href="sms:<?php echo get_option('header_contact_setting_company') ?>"><?php echo get_option('header_contact_setting_phone') ?></a>.
        </li>
        <li><a href="https://vk.com/im?sel=243014">Написать в личку</a> вконтакте мастеру.</li>
    </ol>
    <h2>Что входит в комплект?</h2>
    <p>Кафф + ювелирная коробочка + подарочный пакет + 1 год гарантии на украшение</p>

    <h2>Как оплатить?</h2>
    <p>Оплата всегда происходит при получении товара, за исключением, если Вы решите осуществить предоплату через
        Яндекс.Кассу, но этот выбор за Вами.</p>

    <h2>Как осуществляется доставка?</h2>
    <p>Существует несколько вариантов доставки:</p>
    <ol class="howto">
        <li>Самовывоз в Москве (ул.Красностуденческий проезд 5) - бесплатно</li>
        <li>Доставка почтой по России - 199 рублей</li>
        <li>Доставка курьером до двери - 990 рублей</li>
        <li>Доставка курьером внутри МКАД - 350 рублей</li>
    </ol>

    <h2>Где померить каффы вживую?</h2>
    <p>Приезжайте к нам в мастерскую: г.Москва, ул.Красностуденческий проезд 5.</p>
    <p>Также мы регулярно участвуем в ярмарках в Москве и Санкт-Петербурге.</p>

    <h2>Хорошо ли кафф держится на ухе?</h2>
    <p>Большинство каффов крепится на средней части ушка, повторяя его форму. Хорошо держатся, удобно сидят и не
        спадают.</p>
    <p>Это не клипсы, поэтому Ваши ушки не будут болеть или уставать.</p>

    <div class="wc-proceed-to-checkout">

        <a href="/checkout" class="checkout-button button alt wc-forward">
            Перейти к оформлению</a>
    </div>
</div>


<?php do_action('woocommerce_after_cart'); ?>
