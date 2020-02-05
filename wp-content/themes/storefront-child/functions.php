<?php
/**
 * Richbee functions and definitions
 *
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );
/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style()
{
    wp_dequeue_style('storefront-style');
    wp_dequeue_style('storefront-woocommerce-style');
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */
function enqueue_child_theme_styles()
{
// load bootstrap css
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/inc/assets/css/bootstrap.min.css', false, NULL, 'all');
// fontawesome cdn
    wp_enqueue_style('wp-bootstrap-pro-fontawesome-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css');
// load bootstrap css
// load AItheme styles
// load WP Bootstrap Starter styles
    wp_enqueue_style('wp-bootstrap-starter-style', get_stylesheet_uri(), array('theme'));
    if (get_theme_mod('theme_option_setting') && get_theme_mod('theme_option_setting') !== 'default') {
        wp_enqueue_style('wp-bootstrap-starter-' . get_theme_mod('theme_option_setting'), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/' . get_theme_mod('theme_option_setting') . '.css', false, '');
    }
    wp_enqueue_style('wp-bootstrap-starter-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap');

    wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
    wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');

    // Add slider CSS only if is front page ans slider is enabled
    if ((is_home() || is_front_page())) {
        wp_enqueue_style('flexslider-css', get_stylesheet_directory_uri() . '/inc/assets/css/flexslider.css');
    }

    // Add slider JS only if is front page ans slider is enabled
    if ((is_home() || is_front_page())) {
        wp_register_script('flexslider-js', get_stylesheet_directory_uri() . '/inc/assets/js/flexslider.min.js', array('jquery'), '20140222', true);
    }

// load swiper js and css
    wp_enqueue_script('wp-swiper-js', get_stylesheet_directory_uri() . '/inc/assets/js/swiper.min.js', array(), '', true);
    wp_enqueue_style('wp-swiper-js', get_stylesheet_directory_uri() . '/inc/assets/css/swiper.min.css', array(), '', true);


    if (is_shop()) {
        wp_enqueue_script('isotope', get_stylesheet_directory_uri() . '/inc/assets/js/isotope.pkgd.min.js', array('jquery'),false, true);
        wp_enqueue_script('imagesloaded', get_stylesheet_directory_uri() . '/inc/assets/js/imagesloaded.pkgd.min.js', array('jquery'), false, true);
        wp_enqueue_script('filter-iso', get_stylesheet_directory_uri() . '/inc/assets/js/filter.js', array('jquery'),false, true);
    }
    // Main theme related functions
    wp_enqueue_script('functions-js', get_stylesheet_directory_uri() . '/inc/assets/js/functions.js', array('jquery'), '', true);

// load bootstrap js
    wp_enqueue_script('wp-bootstrap-starter-popper', get_stylesheet_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_stylesheet_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-themejs', get_stylesheet_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-skip-link-focus-fix', get_stylesheet_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
//enqueue my child theme stylesheet
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('theme'));
}

add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);

remove_action('wp_head', 'feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head', 'feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head', 'rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head', 'wp_generator');  // скрыть версию wordpress

/**
 * Load custom WordPress nav walker.
 */
if (!class_exists('wp_bootstrap_navwalker')) {
    require_once(get_stylesheet_directory() . '/inc/wp_bootstrap_navwalker.php');
}

/**
 * Удаление json-api ссылок
 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11);

/**
 * Cкрываем разные линки при отображении постов блога (следующий, предыдущий, короткий url)
 */
remove_action('wp_head', 'start_post_rel_link', 10);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);

/**
 * `Disable Emojis` Plugin Version: 1.7.2
 */
if ('Отключаем Emojis в WordPress') {

    /**
     * Disable the emoji's
     */
    function disable_emojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
        add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
    }

    add_action('init', 'disable_emojis');

    /**
     * Filter function used to remove the tinymce emoji plugin.
     *
     * @param array $plugins
     * @return   array             Difference betwen the two arrays
     */
    function disable_emojis_tinymce($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        }

        return array();
    }

    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     *
     * @param array $urls URLs to print for resource hints.
     * @param string $relation_type The relation type the URLs are printed for.
     * @return array                 Difference betwen the two arrays.
     */
    function disable_emojis_remove_dns_prefetch($urls, $relation_type)
    {

        if ('dns-prefetch' == $relation_type) {

            // Strip out any URLs referencing the WordPress.org emoji location
            $emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
            foreach ($urls as $key => $url) {
                if (strpos($url, $emoji_svg_url_bit) !== false) {
                    unset($urls[$key]);
                }
            }

        }

        return $urls;
    }

}

/**
 * Удаляем стили для recentcomments из header'а
 */
function remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action('widgets_init', 'remove_recent_comments_style');

/**
 * Удаляем ссылку на xmlrpc.php из header'а
 */
remove_action('wp_head', 'wp_bootstrap_starter_pingback_header');

/**
 * Удаляем стили для #page-sub-header из  header'а
 */
remove_action('wp_head', 'wp_bootstrap_starter_customizer_css');

/*
*Обновление количества товара
*/
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
    ?>
    <span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
    <?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

/**
 * Замена надписи на кнопке Добавить в корзину
 */
add_filter('woocommerce_product_single_add_to_cart_text', 'woocust_change_label_button_add_to_cart_single');
function woocust_change_label_button_add_to_cart_single($label)
{

    $label = 'Добавить в корзину';

    return $label;
}

remove_action('storefront_footer', 'storefront_credit', 20);

/**
 * Remove product data tabs
 */
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{

    unset($tabs['additional_information']);    // Remove the additional information tab
    unset($tabs['reviews']); 					// Remove Reviews tab

    return $tabs;

}

//Количество товаров для вывода на странице магазина
add_filter('loop_shop_per_page', 'wg_view_all_products');

function wg_view_all_products()
{
    return '9999';
}

//Удаление сортировки
add_action('init', 'bbloomer_delay_remove');

function bbloomer_delay_remove()
{
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);

}

/*
*Изменение количетсва товара на строку на страницах woo
*/
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3; // 3 products per row
    }
}


//Удаление сторфронт-кредит
add_action('init', 'custom_remove_footer_credit', 10);

function custom_remove_footer_credit()
{
    remove_action('storefront_footer', 'storefront_credit', 20);
    add_action('storefront_footer', 'custom_storefront_credit', 20);
}

add_filter('woocommerce_get_breadcrumb', '__return_empty_array');

//Добавление favicon
function favicon_link()
{
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />' . "\n";
}

add_action('wp_head', 'favicon_link');

//Изменение entry-content
function storefront_page_content()
{
    ?>
    <div class="row">
        <?php the_content(); ?>
        <?php
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __('Pages:', 'storefront'),
                'after' => '</div>',
            )
        );
        ?>
    </div>
    <?php
}

add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);
function my_custom_sale_flash($text, $post, $_product)
{
    return '<span class="onsale">SALE!</span>';
}

/*Удаляем кнопку Добавить в корзину */

function remove_loop_button()
{
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
}

add_action('init', 'remove_loop_button');

/*Добавляем кнопку Подробнее */

add_action('woocommerce_after_shop_loop_item', 'replace_add_to_cart_button');
function replace_add_to_cart_button()
{
    global $product;
    $link = $product->get_permalink();
    echo do_shortcode('<div class="butmodiv"><a href="' . $link . '" class="button-more addtocartbutton">Подробнее</a></div>');
}

/**
 * @snippet       Disable Variable Product Price Range
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/disable-variable-product-price-range-woocommerce/
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 2.4.7
 */

add_filter('woocommerce_variable_sale_price_html', 'bbloomer_variation_price_format', 10, 2);

add_filter('woocommerce_variable_price_html', 'bbloomer_variation_price_format', 10, 2);

function bbloomer_variation_price_format($price, $product)
{

// Main Price
    $prices = array($product->get_variation_price('min', true), $product->get_variation_price('max', true));
    $price = $prices[0] !== $prices[1] ? sprintf(__('%1$s', 'woocommerce'), wc_price($prices[0])) : wc_price($prices[0]);

// Sale Price
    $prices = array($product->get_variation_regular_price('min', true), $product->get_variation_regular_price('max', true));
    sort($prices);
    $saleprice = $prices[0] !== $prices[1] ? sprintf(__('%1$s', 'woocommerce'), wc_price($prices[0])) : wc_price($prices[0]);

    if ($price !== $saleprice) {
        $price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
    }
    return $price;
}

function my_shortcode_function()
{
    $quotes1 = array(); // Инициализируем пустой массив
    $quotes1[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"><div class="podarok"><img src="/images/shkatulka.jpg" alt="Шкатулка в подарок" /><p>Шкатулка</p></div></div>';
    $quotes1[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"><div class="podarok"><img src="/images/svetilnik.jpg" alt="Светильник в подарок" /><p>Светильник</p></div></div>';
    $podarok1 = mt_rand(0, count($quotes1) - 1);
    $quotes2 = array(); // Инициализируем пустой массив
    $quotes2[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"><div class="podarok"><img src="/images/razdelochnaja-doska.jpg" alt="Разделочная доска в подарок" /><p>Разделочная доска</p></div></div>';
    $quotes2[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"><div class="podarok"><img src="/images/cvetochnyj-gorshok.jpg" alt="Цветочный горшок в подарок" /><p>Цветочный горшок</p></div></div>';
    $podarok2 = mt_rand(0, count($quotes2) - 1);
    $quotes3 = array(); // Инициализируем пустой массив
    $quotes3[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/konfety.jpg" alt="Конфеты в подарок" /> 	<p>Конфеты</p> 	</div> </div>';
    $quotes3[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/otkrytka.jpg" alt="Открытка в подарок" /> 	<p>Открытка</p> 	</div> </div>';
    $podarok3 = mt_rand(0, count($quotes3) - 1);
    $quotes4 = array(); // Инициализируем пустой массив
    $quotes4[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/myshka.jpg" alt="Мышка в подарок" /> 	<p>Мышка</p> 	</div> </div>';
    $quotes4[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/kosmetichka.jpg" alt="Косметичка в подарок" /> 	<p>Косметичка</p> 	</div> </div>';
    $podarok4 = mt_rand(0, count($quotes4) - 1);
    return '<p class="rekomend">Возможно, стоит рассмотреть один из следующих вариантов для подарка:</p><div class="row mb30">' . $quotes1[$podarok1] . $quotes2[$podarok2] . $quotes3[$podarok3] . $quotes4[$podarok4] . '</div><p>';
}

add_shortcode('podarok1', 'my_shortcode_function');

function my_shortcode_function2()
{
    $quotes1 = array(); // Инициализируем пустой массив
    $quotes1[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/tort.jpg" alt="Торт в подарок" /> 	<p>Торт</p> 	</div> </div>';
    $quotes1[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/shampanskoe.jpg" alt="Шампанское в подарок" /> 	<p>Шампанское</p> 	</div> </div> ';
    $podarok1 = mt_rand(0, count($quotes1) - 1);
    $quotes2 = array(); // Инициализируем пустой массив
    $quotes2[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/rafajello.jpg" alt="Рафаэлло в подарок" /> 	<p>Рафаэлло</p> 	</div> </div> ';
    $quotes2[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/koditerskie-izdelija.jpg" alt="Кондитерские изделия в подарок" /> 	<p>Кондитерские изделия</p> 	</div> </div> ';
    $podarok2 = mt_rand(0, count($quotes2) - 1);
    $quotes3 = array(); // Инициализируем пустой массив
    $quotes3[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/duhi.jpg" alt="Духи в подарок" /> 	<p>Духи</p> 	</div> </div> ';
    $quotes3[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/buket-cvetov.jpg" alt="Букет цветов" /> 	<p>Цветы</p> 	</div> </div>';
    $podarok3 = mt_rand(0, count($quotes3) - 1);
    $quotes4 = array(); // Инициализируем пустой массив
    $quotes4[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/kaffy-v-podarok.jpg" alt="Каффы в подарок" /> 	<p>Серьги-каффы</p> 	</div> </div> ';
    $quotes4[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> 	<div class="podarok"> 	<img src="/images/iphone.jpg" alt="iPhone 7 rose gold" /> 	<p>iPhone</p> 	</div> </div>';
    $podarok4 = mt_rand(0, count($quotes4) - 1);
    return '<p class="rekomend">Также присмотритесь к следующим вариантам:</p><div class="row mb30">' . $quotes1[$podarok1] . $quotes2[$podarok2] . $quotes3[$podarok3] . $quotes4[$podarok4] . '</div><p>';
}

add_shortcode('podarok2', 'my_shortcode_function2');

function my_shortcode_function3()
{
    $quotes1 = array(); // Инициализируем пустой массив
    $quotes1[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/usb.jpg" alt="Флешка USB" />Флешка USB </div> </div>';
    $quotes1[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/book.jpg" alt="Книга" />Книга </div> </div>';
    $quotes1[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/notebook.jpg" alt="Блокнот" />Блокнот </div> </div>';
    $podarok1 = mt_rand(0, count($quotes1) - 1);
    $quotes2 = array(); // Инициализируем пустой массив
    $quotes2[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/nabor-tetradej.jpg" alt="Набор тетрадей" />Набор тетрадей </div> </div>';
    $quotes2[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/nabor.jpg" alt="Набор для творчества" />Набор для творчества </div> </div>';
    $quotes2[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/putevka.jpg" alt="Путевка на базу отдыха" />Путевка на базу отдыха </div> </div>';
    $podarok2 = mt_rand(0, count($quotes2) - 1);
    $quotes3 = array(); // Инициализируем пустой массив
    $quotes3[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/stih.jpg" alt="Стихотворение" />Стихотворение </div> </div>';
    $quotes3[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/ticket.jpg" alt="Билет на концерт" />Билет на концерт </div> </div>';
    $quotes3[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/bokal-s-ejo-foto.jpg" alt="Бокал с её фото" />Бокал с её фото </div> </div>';
    $podarok3 = mt_rand(0, count($quotes3) - 1);
    $quotes4 = array(); // Инициализируем пустой массив
    $quotes4[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/neobychnyj-tort.jpg" alt="Необычный торт" />Необычный торт </div> </div>';
    $quotes4[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/statujetka.jpg" alt="Интересная статуэтка" />Интересная статуэтка </div> </div>';
    $quotes4[] = '<div class="col-md-3 col-sm-6 col-12 mb-md-0 mb-3"> <div class="podarok"><img src="/images/podushka.jpg" alt="Подушка с её изображением" />Подушка с её фото </div> </div>';
    $podarok4 = mt_rand(0, count($quotes4) - 1);
    return '<p class="rekomend">Может приглянуться:</p><div class="row mb30">' . $quotes1[$podarok1] . $quotes2[$podarok2] . $quotes3[$podarok3] . $quotes4[$podarok4] . '</div><p>';
}

add_shortcode('podarok3', 'my_shortcode_function3');

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

//удаляем количество на странице продукта
function custom_remove_all_quantity_fields($return, $product)
{
    return true;
}

add_filter('woocommerce_is_sold_individually', 'custom_remove_all_quantity_fields', 10, 2);

add_filter('add_to_cart_text', 'woo_custom_single_add_to_cart_text');                // < 2.1
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text');  // 2.1 +

function woo_custom_single_add_to_cart_text()
{

    return 'В корзину';

}

/*
*Изменение количетсва товара на строку на страницах woo
*/
function wc_ninja_change_shop_columns_count()
{
    return 4;
}

add_filter('loop_shop_columns', 'wc_ninja_change_shop_columns_count', 20);

/**
 * Change number of related products output
 */
function woo_related_products_limit()
{
    global $product;

    $args['posts_per_page'] = 4;
    return $args;
}

add_filter('woocommerce_output_related_products_args', 'jk_related_products_args', 20);
function jk_related_products_args($args)
{
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
}


// Удаляем инлайн-стили из head
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'storefront-gutenberg-blocks' );
    wp_dequeue_style( 'storefront-gutenberg-blocks-inline' );
}
add_filter('storefront_customizer_css', '__return_false');
add_filter('storefront_customizer_woocommerce_css', '__return_false');

//переносим стили в футер
remove_action('wp_head', 'twb_wcr_custom_css_output', 99);
add_action('wp_footer', 'twb_wcr_custom_css_output', 99);
remove_action( 'wp_head', 'wc_gallery_noscript' );
add_action( 'wp_footer', 'wc_gallery_noscript' );

/**
 * Удаляем поля адрес и телефон, если нет доставки
 */

add_filter('woocommerce_checkout_fields', 'new_woocommerce_checkout_fields', 10, 1);

function new_woocommerce_checkout_fields($fields)
{
    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['shipping']['shipping_country']); ////удаляем! тут хранится значение страны доставки
    return $fields;
}

add_filter('woocommerce_cart_needs_shipping_address', '__return_false');


add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_fields($fields)
{
    $fields['billing']['billing_first_name']['placeholder'] = 'Введите Ваше ФИО или же просто имя';
    $fields['billing']['billing_email']['placeholder'] = 'Укажите e-mail';
    $fields['billing']['billing_phone']['placeholder'] = 'По какому телефону с Вами связаться?';
    $fields['billing']['billing_address_1']['label'] = 'Почтовый адрес (если нужна доставка)';
    $fields['billing']['billing_address_1']['placeholder'] = 'Индекс, город, улица, квартира';
    return $fields;
}

add_filter('woocommerce_default_address_fields', 'custom_override_default_address_fields');

function custom_override_default_address_fields($address_fields)
{
    $address_fields['address_1']['required'] = false;
    $address_fields['city']['required'] = false;

    return $address_fields;
}

add_filter('woocommerce_show_page_title', 'bbloomer_hide_shop_page_title');

function bbloomer_hide_shop_page_title($title)
{
    if (is_shop()) $title = false;
    return $title;
}

