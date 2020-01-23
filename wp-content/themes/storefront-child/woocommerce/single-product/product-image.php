<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version     2.6.3
 */

if (!defined('ABSPATH')) {
    exit;
}

global $post, $product;
?>

<div class="uderimage animated fadeInLeft text-center d-lg-block d-none">
    <div class="row">
        <div class="col-6">
            <span class="pe-7s-box2"></span>
            <p>Подарочная упаковка</p>
        </div>
        <div class="col-6">
            <span class="pe-7s-user"></span>
            <p>Ручная работа</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <span class="pe-7s-tools"></span>
            <p>Годовая гарантия</p>
        </div>
        <div class="col-6">
            <span class="pe-7s-cash"></span>
            <p>Удобная оплата</p>
        </div>
    </div>
</div>
<div class="images animated fadeIn">

    <?php
    if (has_post_thumbnail()) {
        $attachment_count = count($product->get_gallery_attachment_ids());
        $props = wc_get_product_attachment_props(get_post_thumbnail_id(), $post);
        $image = get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array(
            'title' => $props['title'],
            'alt' => $props['alt'],
            'class' => 'hidden-xs',
        ));
        echo apply_filters(
            'woocommerce_single_product_image_html',
            sprintf(
                $image
            ),
            $post->ID
        );
    } else {
        echo apply_filters('woocommerce_single_product_image_html', sprintf('<img src="%s" alt="%s" />', wc_placeholder_img_src(), __('Placeholder', 'woocommerce')), $post->ID);
    }
    /** галлерия картинок
     * do_action( 'woocommerce_product_thumbnails' );
     */
    ?>


    <div class="d-block d-md-none mobileinfo">
        <link rel="stylesheet" href="/swipe/dist/css/swiper.min.css">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $thumb_id = get_post_thumbnail_id();
                $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                echo '<div class="swiper-slide"> <div class="container swipe"> <div class="container-wrapper"> <div class="container-content" style="background-image: url(' . $thumb_url[0] . ')"></div> </div> </div> </div>';
                ?>

                <?php

                $newview = get_post_meta($post->ID, 'img1', true);
                //Проверка на существование поля Songs
                if ($newview) : ?>
                    <?php
                    global $product;
                    global $post;
                    $id = $product->id;
                    echo '<div class="swiper-slide">
                              <div class="container swipe">
                                  <div class="container-wrapper">
                                      <div class="container-content" style="background-image: url(' . get_post_meta($post->ID, 'img1', true) . ')"></div>
                                  </div>
                                </div>
                        </div>';
                    ?>
                <?php endif; ?>

                <?php

                $newview = get_post_meta($post->ID, 'img2', true);
                //Проверка на существование поля Songs
                if ($newview) : ?>
                    <?php
                    global $product;
                    global $post;
                    $id = $product->id;
                    echo '<div class="swiper-slide">
                              <div class="container swipe">
                                  <div class="container-wrapper">
                                      <div class="container-content" style="background-image: url(' . get_post_meta($post->ID, 'img2', true) . ')"></div>
                                  </div>
                                </div>
                            </div>';
                    ?>
                <?php endif ?>

                <?php
                $newview = get_post_meta($post->ID, 'newview', true);
                //Проверка на существование поля Songs
                if ($newview) : ?>
                    <?php
                    global $product;
                    global $post;
                    $id = $product->id;
                    echo '<div class="swiper-slide">
                              <div class="container swipe">
                                  <div class="container-wrapper">
                                      <div class="container-content model-image-block" style="background-image: url(/images/model/' . $id . '.jpg)"></div>
                                  </div>
                                </div>
                            </div>';
                    ?>
                <?php endif; ?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <!-- Swiper JS -->
        <script src="/swipe/dist/js/swiper.min.js"></script>


    </div>


</div>
