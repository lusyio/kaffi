<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) {
    exit;
}
if (is_shop()): ?>
<?php
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'product',
);
$query = new WP_Query($args);

$count = $query->post_count;
$heigth = $count * 135;
?>
<ul style="height: <?= $heigth ?>px" class="products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
    <li data-filter=".product_cat-silver" class="product additional-product product_cat-silver" id="silver-ad">
        <div class="product-main">
            <img src="/images/shop/silver-cat.jpg" alt="каффы из серебра" class="img-backg">
            <div class="cat-opis">
                <p>Каффы из<br>серебра</p>
                <span>Потрясающие каффы ручной работы из серебра для ваших ушек. Вы будете довольны!</span>
            </div>
        </div>
    </li>
    <li data-filter=".product_cat-gold" class="product additional-product product_cat-gold" id="gold-ad">
        <div class="product-main">
            <img src="/images/shop/cat-gold.jpg" alt="каффы из золота" class="img-backg">
            <div class="cat-opis">
                <p>Каффы из<br>золота</p>
                <span>Каффы из золота для самых искушенных покупателей. Солидный подарок для себя и любимых.</span>
            </div>
        </div>
    </li>
    <li data-filter=".product_cat-swarovski" class="product additional-product product_cat-swarovski" id="swar-ad">
        <div class="product-main">
            <img src="/images/shop/cat-swar.jpg" alt="каффы с камнями swarovski" class="img-backg">
            <div class="cat-opis">
                <p>Каффы с камнями<br>swarovski</p>
                <span>Каффы с камнями Swarovski. Блистайте как никогда. Прекрасно дополняют яркий образ.</span>
            </div>
        </div>
    </li>
    <li data-filter=".product_cat-lyubish-comic-con" class="product additional-product product_cat-lyubish-comic-con"
        id="comic-ad">
        <div class="product-main">
            <img src="/images/shop/cat-comic.jpg" alt="каффы для comic con" class="img-backg">
            <div class="cat-opis">
                <p>Торчишь по<br>Comic Con?!</p>
                <span>Удиви всех вокруг неординарными украшениями! Дополни косплей потрясными каффами.</span>
            </div>
        </div>
    </li>
    <li data-filter=".product_cat-malenkoy-printsesse"
        class="product additional-product product_cat-malenkoy-printsesse" id="prin-ad">
        <div class="product-main">
            <img src="/images/shop/cat-prin.jpg" alt="каффы с камнями swarovski" class="img-backg">
            <div class="cat-opis">
                <p>Каффы для самых маленьких!</p>
                <span>Небольшие каффы для детских ушек. Дети будут рады 😊</span>
            </div>
        </div>
    </li>
    <?php else: ?>
    <ul class="products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
        <?php endif; ?>
