<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product, $woocommerce_loop;

if (empty($product) || !$product->exists()) {
    return;
}

if (!$related = wc_get_related_products($product->get_id(), $posts_per_page)) {
    return;
}

$args = apply_filters('woocommerce_related_products_args', array(
    'post_type' => 'product',
    'ignore_sticky_posts' => 1,
    'no_found_rows' => 1,
    'posts_per_page' => $posts_per_page,
    'orderby' => $orderby,
    'post__in' => $related,
    'post__not_in' => array($product->id)
));

$products = new WP_Query($args);
$woocommerce_loop['name'] = 'related';
$woocommerce_loop['columns'] = apply_filters('woocommerce_related_products_columns', $columns);
$count_comments = get_comment_count();
$comments = $count_comments['approved'];
if ($products->have_posts()) : ?>
    <div class="col-12">
        <hr>
        <div class="dopinfo">
            <div class="row">
                <div class="col-sm-3">
                    <div class="preim preim-otz">

                        <div class="preim-inside">
                            <a href="/otzyv" title="отзывы" target="_blank">
                                <p class="preim-p"><strong><?= $comments ?></strong></p>
                                <p class="preim-p2">отзывов</p>
                            </a>
                            <div class="more_links"><a href="/otzyv" title="отзывы" target="_blank">Узнайте больше</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="preim preim-garant">
                        <a href="/garantii" title="гарантия" target="_blank">
                            <div class="preim-inside">
                                <p class="preim-p">1 год</p>
                                <p class="preim-p2">гарантии</p>
                                <div class="more_links"><a href="/garantii" title="гарантия" target="_blank">Узнайте
                                        больше</a></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="preim preim-master">
                        <a href="/stepan-vasiliev" title="изделия ручной работы" target="_blank">
                            <div class="preim-inside">
                                <p class="preim-p">Ручная</p>
                                <p class="preim-p2">работа</p>
                                <div class="more_links"><a href="/stepan-vasiliev" title="изделия ручной работы"
                                                           target="_blank">Узнайте больше</a></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="preim preim-dost">
                        <a href="/dostavka-i-oplata" title="доставка и оплата" target="_blank">
                            <div class="preim-inside">
                                <p class="preim-p">Экспресс</p>
                                <p class="preim-p2">доставка</p>
                                <div class="more_links"><a href="/dostavka-i-oplata" title="доставка и оплата"
                                                           target="_blank">Узнайте больше</a></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-12">
        <div class="related products">

            <p class="head-kaff">Вам также может понравится</p>

            <?php woocommerce_product_loop_start(); ?>

            <?php while ($products->have_posts()) : $products->the_post(); ?>

                <?php wc_get_template_part('content', 'product'); ?>

            <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

        </div>
    </div>
<?php endif;

wp_reset_postdata();
