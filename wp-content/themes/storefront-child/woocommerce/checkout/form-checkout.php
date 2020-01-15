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
</div></div></div></div></div></div></div>

<div class="block-1400">
    <div class="bg-grey pdb30">
        <div class="container pd30">
            <div class="woocommerce">
                <form name="checkout" method="post" class="checkout woocommerce-checkout"
                      action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <?php if (sizeof($checkout->checkout_fields) > 0) : ?>

                        <?php do_action('woocommerce_checkout_before_customer_details'); ?>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-7 desc-product2 entry-content order-block">
                            <div id="customer_details">

                                <?php do_action('woocommerce_checkout_billing'); ?>
                                <?php do_action('woocommerce_checkout_shipping'); ?>
                            </div>


                            <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                            <?php endif; ?>

                            <h3 id="order_review_heading"><span class="order-numbers">2.</span> Выберите способ доставки
                                и оплаты</h3>

                            <?php do_action('woocommerce_checkout_before_order_review'); ?>

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
            </div>
            </form>
        </div>
    </div>
</div>
</div>


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
