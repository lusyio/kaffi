<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

?>
<?php
global $post;
global $product;
$id = $product->id;
$link = $product->get_permalink();
$price = $product->get_price();

if ($price < 1000) {
    $priceclass = 'price1000';
}
if ($price >= 1000 and $price < 3000) {
    $priceclass = 'price2000';
}
if ($price >= 3000) {
    $priceclass = 'price3000';
}
?>
<li <?php wc_product_class('' . $priceclass, $product); ?>>
    <?php
    echo '<a href="' . $link . '"/><img src="/images/shop/' . $id . '.jpg" alt="' . get_post_meta($post->ID, 'key', true) . '" class="img-backg"></a>';
    echo '<div class="text-center info-price">';
    if (get_post_meta($post->ID, 'short_name', true))
        echo '<a href="' . $link . '"><p>' . get_post_meta($post->ID, 'short_name', true) . '</p></a>';
    if (get_post_meta($post->ID, 'short_name', true))
        echo '<div class="shortdesc">' . get_post_meta($post->ID, 'short_descr', true) . '</div>';
    ?>
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    do_action('woocommerce_before_shop_loop_item');

    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    do_action('woocommerce_before_shop_loop_item_title');

    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_product_title - 10
     */
    do_action('woocommerce_shop_loop_item_title');

    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_rating - 5
     * @hooked woocommerce_template_loop_price - 10
     */
    do_action('woocommerce_after_shop_loop_item_title');

    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    do_action('woocommerce_after_shop_loop_item');
    ?>
</li>
