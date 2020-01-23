<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
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
 * @version     2.1.3
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$has_row = false;
$alt = 1;
$attributes = $product->get_attributes();

ob_start();

?>

<?php if ($product->enable_dimensions_display()) : ?>

    <?php if ($product->has_weight()) : $has_row = true; ?>
        <div class="col-md-2 col-6 p-lg-unset p-0 mb-4">
            <p class="svoistvo"><?php echo wc_format_localized_decimal($product->get_weight()) . ' ' . esc_attr(get_option('woocommerce_weight_unit')); ?></p>
            <p class="svoistvo2"><?php _e('Weight', 'woocommerce') ?></p>
        </div>
    <?php endif; ?>

    <?php if ($product->has_dimensions()) : $has_row = true; ?>
        <div class="col-md-2 col-6 p-lg-unset p-0 mb-4">
            <p class="svoistvo"><?php echo $product->get_dimensions(); ?></p>
            <p class="svoistvo2"><?php _e('Dimensions', 'woocommerce') ?></p>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php foreach ($attributes as $attribute) :
    if (empty($attribute['is_visible']) || ($attribute['is_taxonomy'] && !taxonomy_exists($attribute['name']))) {
        continue;
    } else {
        $has_row = true;
    }
    ?>
    <div class="col-md-2 col-6 p-lg-unset p-0 mb-4">

        <?php
        if ($attribute['is_taxonomy']) {

            $values = wc_get_product_terms($product->id, $attribute['name'], array('fields' => 'names'));
            echo apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);

        } else {

            // Convert pipes to commas and display values
            $values = array_map('trim', explode(WC_DELIMITER, $attribute['value']));
            echo apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);

        }
        ?>
        <p class="svoistvo2"><?php echo wc_attribute_label($attribute['name']); ?></p>
    </div>

<?php endforeach; ?>
    <div class="clear"></div>
    <div class="visible-xs col-12 text-center">
        <p>+</p>
        <span class="pe-7s-box2"></span>
        <p>Подарочная упаковка</p>
    </div>
<?php
if ($has_row) {
    echo ob_get_clean();
} else {
    ob_end_clean();
}
