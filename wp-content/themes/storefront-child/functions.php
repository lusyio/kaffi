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

    $my_js_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'js/custom.js'));
    $my_css_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'style.css'));

    if (is_checkout()) {
        wp_enqueue_script('maskedinput', get_stylesheet_directory_uri() . '/inc/assets/js/jquery.maskedinput.js', array('jquery'), false, true);
        wp_enqueue_script('checkoutCustom', get_stylesheet_directory_uri() . '/inc/assets/js/checkoutCustom.js', array('jquery'), 1.0, true);
    }

    if (is_shop()) {
        wp_enqueue_script('isotope', get_stylesheet_directory_uri() . '/inc/assets/js/isotope.pkgd.min.js', array('jquery'), false, true);
        wp_enqueue_script('imagesloaded', get_stylesheet_directory_uri() . '/inc/assets/js/imagesloaded.pkgd.min.js', array('jquery'), false, true);
        wp_enqueue_script('filter-iso', get_stylesheet_directory_uri() . '/inc/assets/js/filter.js', array('jquery'), $my_js_ver, true);
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
    unset($tabs['reviews']);                    // Remove Reviews tab

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
add_action('wp_print_styles', 'wps_deregister_styles', 100);
function wps_deregister_styles()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('storefront-gutenberg-blocks');
    wp_dequeue_style('storefront-gutenberg-blocks-inline');
}

add_filter('storefront_customizer_css', '__return_false');
add_filter('storefront_customizer_woocommerce_css', '__return_false');

//переносим стили в футер
remove_action('wp_head', 'twb_wcr_custom_css_output', 99);
add_action('wp_footer', 'twb_wcr_custom_css_output', 99);
remove_action('wp_head', 'wc_gallery_noscript');
add_action('wp_footer', 'wc_gallery_noscript');

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
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['shipping']['shipping_country']); ////удаляем! тут хранится значение страны доставки
    return $fields;
}

add_filter('woocommerce_cart_needs_shipping_address', '__return_false');


add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_fields($fields)
{
    $fields['billing']['billing_first_name']['placeholder'] = 'Введите Ваше имя';
    $fields['billing']['billing_last_name']['placeholder'] = 'Введите Вашу фамилию';
    $fields['billing']['billing_email']['placeholder'] = 'Укажите e-mail';
    $fields['billing']['billing_phone']['placeholder'] = '+7 888 888 88 88';
    $fields['billing']['billing_address_1']['label'] = 'Почтовый адрес';
    $fields['billing']['billing_address_1']['required'] = true;
    $fields['billing']['billing_address_1']['placeholder'] = 'Улица, дом, квартира';
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

/**
 * Check if WooCommerce is active
 */
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    function CDEK_shipping_method_init()
    {
        if (!class_exists('WC_CDEK_Shipping_Method')) {
            class WC_CDEK_Shipping_Method extends WC_Shipping_Method
            {

                /**
                 * Constructor for your shipping class
                 *
                 * @access public
                 * @return void
                 */
                public function __construct()
                {
                    $this->id = 'cdek_shipping_method'; // Id for your shipping method. Should be uunique.
                    $this->method_title = __('CDEK Shipping Method');  // Title shown in admin
                    $this->method_description = __('Description of CDEK shipping method'); // Description shown in admin

                    $this->init();

                    $this->enabled = isset($this->settings['enabled']) ? $this->settings['enabled'] : 'yes';
                    $this->title = isset($this->settings['title']) ? $this->settings['title'] : __('CDEK Shipping');
                    $this->priceSet = isset($this->settings['priceSet']) ? $this->settings['priceSet'] : 405;

                    if ($this->enabled === 'yes') {
                        add_action('woocommerce_checkout_before_order_review', 'cdek_html_on');
                    }

                }

                /**
                 * Init your settings
                 *
                 * @access public
                 * @return void
                 */
                function init()
                {
                    // Load the settings API
                    $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
                    $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

                    // Save settings in admin if you have any defined
                    add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
                }

                /**
                 * Define settings field for this shipping
                 * @return void
                 */
                function init_form_fields()
                {

                    $this->form_fields = array(

                        'enabled' => array(
                            'title' => __('Enable'),
                            'type' => 'checkbox',
                            'description' => __('Enable this shipping.'),
                            'default' => 'yes'
                        ),
                        'title' => array(
                            'title' => __('Title'),
                            'type' => 'text',
                            'description' => __('Title to be display on site'),
                            'default' => __('CDEK Shipping')
                        ),
                        'priceSet' => array(
                            'title' => __('Delivery cost'),
                            'type' => 'text',
                            'description' => __('Default delivery cost'),
                            'default' => __('405')
                        ),
                    );
                }

                /**
                 * calculate_shipping function.
                 *
                 * @access public
                 * @param mixed $package
                 * @return void
                 */
                public function calculate_shipping($package)
                {
                    $rate = array(
                        'id' => $this->id,
                        'label' => $this->title,
                        'cost' => $this->priceSet,
                    );

                    // Register the rate
                    $this->add_rate($rate);
                }
            }
        }
    }


    //Add cdek scripts and container if cdek settings is enable
    function cdek_html_on()
    {
        $data = $_COOKIE['cdek_delivery'];

        $data_decode = json_decode($data);

        $packages = [
            [
                'items' =>
                    [

                    ],
                'number' => 'kaffi',
                'weight' => 10 * count(WC()->cart->get_cart())
            ],
        ];

        foreach (WC()->cart->get_cart() as $cart_item) {
            $packages[0]['items'][] = [
                'name' => $cart_item['data']->get_title(),
                'ware_key' => $cart_item['data']->get_sku(),
                'payment' => array(
                    "value" => 0
                ),

                'cost' => 0,
                'weight' => 10,
                'amount' => $cart_item['quantity']
            ];
        }
        $data_decode->packages = $packages;
        $data_encode = json_encode($data_decode);
        ?>
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

                    $.post({
                        url: 'https://cors-anywhere.herokuapp.com/http://api.cdek.ru/v2/oauth/token?parameters',
                        data: {
                            grant_type: 'client_credentials',
                            client_id: 'PhZdROyNMC7XC0QxCZO7NiAKwRDTRIKL',
                            client_secret: 'xZCKswr0h3hIofjpdHyNV0xzc2UmazbX'
                        },
                        contentType: 'application/x-www-form-urlencoded',
                    }, res => {
                        setCookie('Authorization', 'Bearer' + ' ' + res.access_token, res.expires_in)
                    })

                    document.cookie = "cdek_delivery=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

                    $('#billing_address_1').val('')
                    $(window).keydown(function (event) {
                        if (event.keyCode === 13) {
                            event.preventDefault();
                            return false;
                        }
                    });

                    let defaultCity = 'Москва';

                    $('body').on('click', '#place_order', function () {
                        if ($('#shipping_method_0_cdek_shipping_method').is(':checked')) {
                            if (getCookie('cdek_delivery')) {
                                let checkForm = true;
                                if ($('#billing_first_name').val().trim() !== '' && $('#billing_last_name').val().trim() && $('#billing_address_1').val().trim() && $('#billing_phone').val().trim() && $('#billing_email').val().trim()) {
                                    let data = $.parseJSON(getCookie('cdek_delivery'));
                                    let packagesArr = <?= $data_encode ?>;

                                    let orderPhoneNumber = $('#billing_phone').val()
                                    let orderAddress = $('#billing_address_1').val()
                                    let orderFirstname = $('#billing_first_name').val()
                                    let orderLastname = $('#billing_last_name').val()

                                    let paymentArr = [];
                                    if ($('#payment_method_cod').is(':checked')) {
                                        $('.cart_item').each((index, item) => {
                                            paymentArr.push(parseFloat($(item).find('.woocommerce-Price-amount').text().replace(/[^\d]/g, '')))
                                        })
                                    }

                                    delete data.packages;
                                    Object.assign(data, {'packages': packagesArr.packages});
                                    if (data.tariff_code !== 136) {
                                        data.to_location.address = orderAddress
                                    }

                                    if ($('#payment_method_cod').is(':checked')) {
                                        data.packages[0].items.map((item, index) => {
                                            item.payment.value = paymentArr[index]
                                        })
                                    } else {
                                        data.packages[0].items.map((item, index) => {
                                            item.payment.value = 0
                                        })
                                    }


                                    data.recipient = {
                                        "name": orderLastname + ' ' + orderFirstname,
                                        "phones": [{
                                            "number": orderPhoneNumber
                                        }]
                                    };
                                    $.post({
                                        headers: {
                                            Authorization: getCookie('Authorization')
                                        },
                                        url: 'https://cors-anywhere.herokuapp.com/https://api.cdek.ru/v2/orders',
                                        contentType: "application/json",
                                        dataType: 'json',
                                        data: JSON.stringify(data),
                                    }, res => {
                                        console.log(res)
                                    })
                                }
                            }
                        }
                    })

                    if ($('#shipping_method_0_cdek_shipping_method').is(':checked')) {
                        $('.ISDEKscript').collapse('show');
                        // $('#place_order').attr('disabled', true)
                        defaultCity = 'Москва';
                        var ourWidjet = new ISDEKWidjet({
                            defaultCity: defaultCity, //какой город отображается по умолчанию
                            cityFrom: 'Москва', // из какого города будет идти доставка
                            country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
                            link: 'forpvz', // id элемента страницы, в который будет вписан виджет
                            path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета
                            servicepath: '/service.php', //ссылка на файл service.php на вашем сайте
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
                        $('#place_order').attr('disable', false)
                    }

                    $("body").on('change', '.shipping_method', function () {

                        if ($('#shipping_method_0_cdek_shipping_method').is(':checked')) {
                            // $('#place_order').attr('disabled', true)
                            $('.ISDEKscript').collapse('show');

                            defaultCity = 'Москва';
                            var ourWidjet = new ISDEKWidjet({
                                defaultCity: defaultCity, //какой город отображается по умолчанию
                                cityFrom: 'Москва', // из какого города будет идти доставка
                                country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
                                link: 'forpvz', // id элемента страницы, в который будет вписан виджет
                                path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета
                                servicepath: '/service.php', //ссылка на файл service.php на вашем сайте
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
                            $('#place_order').attr('disable', false)
                            document.cookie = "cdek_delivery=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
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
                    setTimeout(() =>{
                        $('.CDEK-widget__search-box input').trigger('click')
                        $('.CDEK-widget__search-box input').focus()
                    }, 3000)
                    console.log('Виджет загружен');
                }

                function onChoose(wat) {
                    let dataContent = {
                        "comment": "Новый заказ Каффы",
                        "shipment_point": "MSK46",
                        "delivery_point": wat.id,
                        "items_cost_currency": "RUB",
                        "packages": '',
                        "recipient_currency": "RUB",
                        "sender": {
                            "name": "Васильев Степан"
                        },
                        "tariff_code": wat.tarif
                    }
                    let json_str = JSON.stringify(dataContent);
                    setCookie('cdek_delivery', json_str, 360)
                    $.post({
                        url: my_ajaxurl, // where to submit the data
                        data: {
                            action: 'change_price_action', // load function hooked to: "wp_ajax_*" action hook
                            price: wat.price, // PHP: $_POST['price']
                            name: 'CDEK Самовывоз ' + wat.PVZ.Address, // PHP: $_POST['price']
                        },
                    }, res => {
                        update();
                        let val = $('#billing_phone').val().trim()
                        const phoneRe = /^[+]{1}[7]{1}[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/
                        if (val.match(phoneRe)) {
                            // $('#place_order').attr('disable', false)
                            $('html, body').animate({
                                scrollTop: ($('#order_review').offset().top)
                            }, 1000);
                        } else {
                            $('#billing_phone_field').addClass('woocommerce-invalid').addClass('woocommerce-invalid-required-field')
                            // $('#place_order').attr('disabled', true)
                            $('html, body').animate({
                                scrollTop: ($('.order-block').offset().top - 100)
                            }, 1000);
                        }
                    });
                    $('#billing_address_1').val('Самовывоз CDEK ' + wat.PVZ.Address)
                    $('#shipping_cdek_field_value').val('Выбран пункт выдачи заказа ' + wat.id + "\n" +
                        'город ' + wat.cityName + ', код города ' + wat.city)
                }

                function onChooseProfile(wat) {
                    console.log(wat)

                    let orderAddressCity = wat.cityName
                    let orderAddressCityId = wat.city

                    let dataContent = {
                        "comment": "Новый заказ Каффы",
                        "from_location": {
                            "country_code": 'RU',
                            "code": "44",
                            "address": "пр-т Ленинградский, 75а"
                        },
                        "to_location": {
                            "code": orderAddressCityId,
                            "city": orderAddressCity,
                            "address": '',
                        },
                        "items_cost_currency": "RUB",
                        "packages": '',
                        "recipient_currency": "RUB",
                        "sender": {
                            "name": "Васильев Степан"
                        },
                        "tariff_code": wat.tarif
                    }
                    let json_str = JSON.stringify(dataContent);
                    setCookie('cdek_delivery', json_str, 360)
                    $.post({
                        url: my_ajaxurl, // where to submit the data
                        data: {
                            action: 'change_price_action', // load function hooked to: "wp_ajax_*" action hook
                            price: wat.price, // PHP: $_POST['price']
                            name: 'CDEK Доставка курьером в город ' + wat.cityName, // PHP: $_POST['price']
                        },

                    }, res => {
                        update();
                        let val = $('#billing_phone').val().trim()
                        const phoneRe = /^[+]{1}[7]{1}[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/
                        if (val.match(phoneRe) && $('#billing_address_1').val().trim() !== '') {
                            $('#place_order').attr('disable', false)
                        } else {
                            if (val.match(phoneRe) === null) {
                                $('#billing_phone_field').addClass('woocommerce-invalid').addClass('woocommerce-invalid-required-field')
                            }
                            if ($('#billing_address_1').val().trim() === '') {
                                $('#billing_address_1_field').addClass('woocommerce-invalid').addClass('woocommerce-invalid-required-field')
                            }
                            // $('#place_order').attr('disabled', true)
                            $('html, body').animate({
                                scrollTop: ($('.order-block').offset().top - 100)
                            }, 1000);
                        }
                    });
                    let address_val = $('#billing_address_1').val()
                    let result = address_val.match('Самовывоз')
                    if (result !== null) {
                        $('#billing_address_1').val('')
                    }

                    $('#shipping_cdek_field_value').val('Выбрана доставка курьером в город ' + wat.cityName + ', код города ' + wat.city)

                }

                function onCalculate(wat) {
                    console.log('Расчет стоимости доставки произведен');
                }
            })
        </script>
        <div class="ISDEKscript mb-3 collapse">
            <div id="forpvz" style="width:100%; height:600px;"></div>
        </div>
        <?php
    }

    add_action('woocommerce_shipping_init', 'CDEK_shipping_method_init');

    // add cdek shipping method
    function add_CDEK_shipping_method($methods)
    {
        $methods['CDEK_shipping_method'] = 'WC_CDEK_Shipping_Method';
        return $methods;
    }

    add_filter('woocommerce_shipping_methods', 'add_CDEK_shipping_method');
}


//Set shipping cost and label to cookies
function change_total_price_cdek()
{
    $price = $_POST['price'];
    $name = $_POST['name'];
    $shipping_cost = $price;
    setcookie('shipping_city_cost', $shipping_cost, time() + (86400 * 30), '/');
    setcookie('shipping_name', $name, time() + (86400 * 30), '/');
    echo 'Shipping cost updated : ' . $shipping_cost;
    wp_die();
}


//Change shipping cost and label
function adjust_shipping_rate($rates)
{
    foreach ($rates as $rate) {
        if ($rate->id === 'cdek_shipping_method') {
            if (isset($_COOKIE['shipping_city_cost'])) {
                $rate->cost = $_COOKIE['shipping_city_cost'];
                $rate->label = $_COOKIE['shipping_name'];
            }
        }
    }
    return $rates;
}

add_filter('woocommerce_package_rates', 'adjust_shipping_rate', 50, 1);

// wp_ajax_ - только для зарегистрированных пользователей
add_action('wp_ajax_change_price_action', 'change_total_price_cdek'); // wp_ajax_{значение параметра action}

// wp_ajax_nopriv_ - только для незарегистрированных
add_action('wp_ajax_nopriv_change_price_action', 'change_total_price_cdek'); // wp_ajax_nopriv_{значение параметра action}

//вывод адреса admin-ajax на клиент в переменную (my_ajaxurl)
wp_enqueue_script('my_script_handle', 'MY_JS_URL', array('jquery'));
wp_localize_script('my_script_handle', 'my_ajaxurl', admin_url('admin-ajax.php'));


add_filter('woocommerce_checkout_fields', 'woocommerce_checkout_field_editor');
// Our hooked in function - $fields is passed via the filter!
function woocommerce_checkout_field_editor($fields)
{
    $fields['billing']['shipping_cdek_field_value'] = array(
        'label' => __('Field Value', 'woocommerce'),
        'placeholder' => _x('Field Value', 'placeholder', 'woocommerce'),
    );
    return $fields;
}

/**
 * Display field value on the order edit page
 */
add_action('woocommerce_admin_order_data_after_shipping_address', 'edit_woocommerce_checkout_page', 10, 1);
function edit_woocommerce_checkout_page($order)
{
    global $post_id;
    $order = new WC_Order($post_id);
    echo '<p><strong>' . __('CDEK VALUE') . ':</strong> ' . get_post_meta($order->get_id(), '_shipping_cdek_field_value', true) . '</p>';
}


// переносим метод бандероли вниз
add_filter('woocommerce_package_rates', 'businessbloomer_sort_shipping_methods', 10, 2);

function businessbloomer_sort_shipping_methods($rates, $package)
{

    if (empty($rates)) return;

    if (!is_array($rates)) return;

    uasort($rates, function ($a, $b) {
        if ($a == $b) return 0;
        return ($a->method_id === 'flat_rate' && $b->method_id !== 'flat_rate') ? 1 : -1;
    });

    return $rates;

}

function change_default_shipping_method( $method, $available_methods ) {
    $default_method = 'cdek_shipping_method';
    if( array_key_exists($method, $available_methods ) )
        return $default_method;
    else
        return $method;
}
add_filter('woocommerce_shipping_chosen_method', 'change_default_shipping_method', 10, 2);



/**
 * СОЗДАНИЕ ПОЛЕЙ ДЛЯ телефона, названия и адреса НА СТРАНИЦЕ НАСТРОЕК
 */
add_action('admin_init', 'header_contact_settings_api_init');
function header_contact_settings_api_init()
{
    // Добавляем блок опций на базовую страницу "Общие настройки"
    add_settings_section(
        'header_contact_setting_section', // секция
        'Контактные данные',
        'header_contact_setting_section_callback_function',
        'general' // страница
    );

    // Добавляем поля опций. Указываем название, описание,
    // функцию выводящую html код поля опции.
    add_settings_field(
        'header_contact_setting_name',
        'Телефон в формате +7 (900) 800-00-00',
        'header_contact_setting_phone_function', // можно указать ''
        'general', // страница
        'header_contact_setting_section' // секция
    );
    add_settings_field(
        'header_contact_setting_name2',
        'Телефон в формате +79008000000 для ссылок',
        'header_contact_setting_company_function',
        'general', // страница
        'header_contact_setting_section' // секция
    );

    // Регистрируем опции, чтобы они сохранялись при отправке
    // $_POST параметров и чтобы callback функции опций выводили их значение.
    register_setting('general', 'header_contact_setting_phone');
    register_setting('general', 'header_contact_setting_company');
}

// ------------------------------------------------------------------
// Callback функции выводящие HTML код опций
// ------------------------------------------------------------------
//
// Создаем text input теги
//
function header_contact_setting_phone_function()
{
    echo '<input 
        class="regular-text"
		name="header_contact_setting_phone"  
		type="text" 
		value="' . get_option('header_contact_setting_phone') . '" 
		class="code2"
	 />';
}

function header_contact_setting_company_function()
{
    echo '<input 
        class="regular-text"
		name="header_contact_setting_company"  
		type="text" 
		value="' . get_option('header_contact_setting_company') . '" 
		class="code2"
	 />';
}

add_filter('make_link_for_phone', 'make_link_for_phone_filter');
add_filter('make_title_for_phone', 'make_title_for_phone_filter');


/**
 * Вставляем вместо первого пробела тэг <br>
 * @param string $name
 * @return string
 */
function make_name_in_2_rows_filter($name)
{
    $result = '';
    $rows = explode(' ', $name, 2);
    if (count($rows) <= 1) {
        return $name;
    }
    $result = $rows[0] . '<br>' . $rows[1];
    return $result;
}

//шорткоды для вывода информации

function company_func( $atts ){
    return get_option('header_contact_setting_company');
}

add_shortcode( 'company', 'company_func' );

function phone_func( $atts ){
    return get_option('header_contact_setting_phone');
}

add_shortcode( 'phone', 'phone_func' );
