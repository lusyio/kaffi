<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
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
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post;

$heading = esc_html(apply_filters('woocommerce_product_description_heading', __('Product Description', 'woocommerce')));

?>

<?php if ($heading): ?>
<?php endif; ?>

<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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
    exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof(get_the_terms($post->ID, 'product_cat'));
$tag_count = sizeof(get_the_terms($post->ID, 'product_tag'));

?>


<div class="product_meta animated fadeInUp">
    <div style="margin: 0px auto 30px; max-width: 900px;">
        <div class="row text-center svrow">


            <?php do_action('woocommerce_product_meta_start'); ?>

            <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>
                <div class="col-md-1 d-md-flex d-none">
                </div>

            <?php endif; ?>



            <?php echo $product->get_tags(', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', $tag_count, 'woocommerce') . ' ', '</span>'); ?>

            <?php do_action('woocommerce_product_meta_end'); ?>



            <?php
            /**
             * Additional Information tab
             *
             * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/additional-information.php.
             *
             * HOWEVER, on occasion WooCommerce will need to update template files and you
             * (the theme developer) will need to copy the new files to your theme to
             * maintain compatibility. We try to do this as little as possible, but it does
             * happen. When this occurs the version of the template file will be bumped and
             * the readme will list any important changes.
             *
             * @see        https://docs.woocommerce.com/document/template-structure/
             * @author        WooThemes
             * @package       WooCommerce/Templates
             * @version       2.0.0
             */

            if (!defined('ABSPATH')) {
                exit; // Exit if accessed directly
            }

            global $product;

            $heading = apply_filters('woocommerce_product_additional_information_heading', __('Additional Information', 'woocommerce'));

            ?>



            <?php $product->list_attributes(); ?>
        </div>
    </div>
</div>


<?php

$newview = get_post_meta($post->ID, 'newview', true);
//Проверка на существование поля Songs
if ($newview) : ?>
<?php
global $product;
global $post;
$id = $product->id;
if ($newview == 'white') {
    $white = 'white';
}
?>
</div>
</div>
</div>
</div>
</div>
<div class="model-image-block hidden-xs"
     style="background-repeat: no-repeat;background-image: url(/images/model/<?= $id ?>.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-6 mt-4 ' . $white . '">
                <h2><?= get_post_meta($post->ID, 'short_name', true) ?></h2>
                <p class="imbp"><?= get_post_meta($post->ID, 'short_opisanie', true) ?></p>
                <p class="mib-grey"></p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php endif;
            $youtube = get_post_meta($post->ID, 'youtube', true);
            if (!$youtube){
                $otz_video = true;
                $youtube = get_post_meta($post->ID, 'otz_video', true);
            }

            //Проверка на существование поля Songs
            if ($youtube) : ?>
            <?php
            global $product;
            global $post;
            $id = $product->id;
            ?>
        </div>
    </div>
</div>
</div>
</div>
<div class="container pd30 videopost">
    <div class="row">
        <div class="col-sm-8">
            <div class="video-box">
                <div class="videoWrapper obzor">
                    <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/<?= $youtube ?>?rel=0"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-sm-4 entry-content">
            <div class="pdt120">
                <?php if ($otz_video): ?>
                    <h2>Видео-отзыв на кафф<br><?= get_post_meta($post->ID, 'short_name', true) ?></h2>
                <?php else: ?>
                    <h2>Видео-обзор на кафф<br><?= get_post_meta($post->ID, 'short_name', true) ?></h2>
                <?php endif; ?>
                <p>Кафф <?= get_post_meta($post->ID, 'short_name', true) ?> имеет универсальный размер. Отлично
                    смотрится, хорошо сидит и не спадает.</p>
                <p>Данное изделие может стать удачным подарком для себя и любимых.</p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php endif;
            $youtube = get_post_meta($post->ID, 'img1', true);

            if ($youtube) : ?>
            <?php
            global $product;
            global $post;
            $id = $product->id;
            ?>
        </div>
    </div>
</div>
</div>
</div>
<div class="block-1400  hidden-xs">
    <div class="pdb30 bg-grey">
        <div class="container pd30">
            <div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 entry-content">
                        <div class="product-main description-cards">
                            <h2>Кафф <?= get_post_meta($post->ID, 'short_name', true) ?></h2>
                            <p><?= get_post_meta($post->ID, 'desc1', true) ?></p>
                        </div>

                        <img class="mt30" src="<?= get_post_meta($post->ID, 'img2', true) ?>">
                    </div>
                    <div class="col-md-6 entry-content">
                        <img class="hidden-sm" src="<?= get_post_meta($post->ID, 'img1', true) ?>">
                        <div class="product-main mt30" style="padding: 20px 50px 40px;background: white;">
                            <h2>Кафф <?= get_post_meta($post->ID, 'short_name', true) ?> - кое-что особенно из мира
                                украшений</h2>
                            <p><?= get_post_meta($post->ID, 'desc2', true) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">

            <?php else: ?>
                <div class="block-1400">
                    <div class="bg-grey pdb30">
                        <div class="container pd30">

                            <div class="desc-product entry-content">
                                <?php the_content(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <div class="container stepa-container mt-3">
                <div class="row mt30">
                    <div class="col-lg-4 d-none d-lg-flex">
                        <p class="stepa-abouts">Мастер Степан Васильев – единственный в России, посвятивший себя каффам
                            — столь
                            необычным сережкам, способным украсить не только мочку, но и все ушко...</p>
                    </div>
                    <div class="col-lg-4 col-12 text-center">
                        <a href="/stepan-vasiliev" title="Степан Васильев"><img src="/images/stepa-master.jpg"
                                                                                alt="Степан Васильев"
                                                                                class="stepan mt30"></a>
                        <p class="stepa-zitat">Каждый кафф создан вручную, наполнен любовью и вниманием к деталям</p>
                        <img src="/images/signature.png" alt="Степан Васильев">
                        <p class="mt30 text-center"><a href="/shop" class="button-more addtocartbutton">Посмотреть
                                другие каффы</a>
                        </p>
                    </div>
                    <div class="col-lg-4 d-none d-lg-flex">
                        <p class="stepa-abouts">Каффы - это настоящая находка для тех, у кого не проколоты ушки, ведь
                            большинство
                            моделей не требуют проколов вообще. Попробуйте и вы кое-что особенное...</p>
                    </div>
                </div>
            </div>

            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper('.swiper-container', {
                    pagination: '.swiper-pagination',
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    slidesPerView: 1,
                    paginationClickable: true,
                    spaceBetween: 30,
                    loop: true
                });
            </script>


            <div class="block-1400">
                <div class="bg-grey pdb30">
                    <div class="pd30 text-center komplect">
                        <div class="container">
                            <hr>
                        </div>
                        <h2>Комплект поставки</h2>
                        <div class="container ">

                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="/images/box.jpg">
                                    <p>Ювелирная коробочка</p>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
                                    <p>Кафф <?php $key = "short_name";
                                        echo get_post_meta($post->ID, $key, true); ?></p>
                                </div>

                                <div class="col-sm-4">
                                    <img src="/images/bag.jpg">
                                    <p>Подарочный пакет</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="main-content-area">