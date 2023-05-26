<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
$count_comments = get_comment_count();
$comments = $count_comments['approved'];
 if ( !is_woocommerce() ){
    echo '</div>';
}
?>

<hr>
<div class="pd60">
    <div class="row">
        <div class="col-md-4 col-12 text-center mb-lg-0 mb-3">
            <a href="/shop?utm_content=silver" title="Каффы из серебра">
                <img src="/images/cuff-silver.jpg" alt="Каффы из серебра">
                <div class="block-nyha">
                    <p class="otz-main">Каффы из<br>серебра</p>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-12 text-center mb-lg-0 mb-3">
            <a href="/otzyv" title="Отзывы">
                <img src="/images/cuff-otzivi.jpg" alt="Отзывы о каффах">
                <div class="block-nyha">
                    <p class="otz-main"><?= $comments ?><br>отзывов</p>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-12 text-center mb-lg-0 mb-3">
            <a href="/shop?utm_content=gold" title="Каффы из золота">
                <img src="/images/cuff-gold.jpg" alt="Каффы из золота">
                <div class="block-nyha">
                    <p class="otz-main">Каффы из<br>золота</p>
                </div>
            </a>
        </div>
    </div>
</div>


<?php do_action('storefront_before_footer'); ?>

</div>
<div id="footer-area">
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="row">

                        <?php
                        if ($menu_items = wp_get_nav_menu_items('down')) {
                            $menu_list = '';
                            echo '<div class="col-12 text-center">';
                            echo '<div class="footer-menu">';
                            echo '<ul class="menu fotmenu" id="menu-second">';
                            $menu_number = 0;
                            foreach ((array)$menu_items as $key => $menu_item) {
                                $title = $menu_item->title; // заголовок элемента меню (анкор ссылки)
                                $url = $menu_item->url; // URL ссылки
                                echo '<li class="menu-item"><a href="' . $url . '">' . $title . '</a></li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                        <div class="col-12 text-center">
                            <div class="fut_1"><?php echo get_option('header_contact_setting_phone') ?></div>
                            <div class="fut_2">stepan.vasiliev@gmail.com</div>
                            <div class="text-center">
                                <a href="https://vk.com/vasiliev.jewelry" title="" class="vkfbtv">
                                    <img src="/wp-content/uploads/vk.png">
                                </a>
                                <a href="http://www.livemaster.ru/myshop/jewelryearcuff" title="" class="vkfbtv">
                                    <img src="/wp-content/uploads/fb.png">
                                </a>
                                <a href="https://instagram.com/vasiliev.jewelry/" title="" class="vkfbtv">
                                    <img src="/wp-content/uploads/tv.png">
                                </a>
                            </div>
                            <div class="fut_3">
                                <span>Каффы.рф. Кое-что особенное © 2013 - <?php echo date("Y"); ?></span></div>
                            <div class="fut_4"><span>ИП Васильев. ИНН 110209963700.</span></div>
                            <div class="fut_4"><a href="http://richbee.ru/">Разработка сайта<br>Веб-студия RichBee</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
        <div class="col-full">

            <?php
            /**
             * Functions hooked in to storefront_footer action
             *
             * @hooked storefront_footer_widgets - 10
             * @hooked storefront_credit         - 20
             */
            do_action('storefront_footer');
            ?>

        </div><!-- .col-full -->
    </footer><!-- #colophon -->
</div>
<link rel='stylesheet' id='pe-icon-7-stroke-css' href='/pe-icon-7-stroke.css' type='text/css' media='all'/>

<?php wp_footer(); ?>


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter28310521 = new Ya.Metrika({
                    id: 28310521,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/28310521" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=hg9O2jDRKM21TJRgHTek8PmM7WCu6RYtJuim4KWsyCj659vneWBwFhb8KBtWnFlKhUMmM3DRKr1QKQyUDqxOt29x/XGm*S/V4tmwTK7DYsYRi3whUkXVxNeqQOP4yE2vCFSEhDd7WILuMZ9OQYOpjRoWBc3oBLBWD4M2DpMaaNw-&pixel_id=1000095689';</script>

<script type="text/javascript">
    var count = '<?php $html = '<a title="Отзывы" href="/otzyv">Отзывы <span class="otzi visible-lg animated fadeIn">' . $comments . '</span></a>';
        echo $html; ?>'
    document.getElementById('menu-item-730').innerHTML = count;


</script>


<script type="text/javascript">
    jQuery(document).ready(($) => {
        $('.checkbox-toggle').on('change', function () {
            if ($('.checkbox-toggle').is(':checked')) {
                $('body').addClass('overflow-hidden');
            } else {
                $('body').removeClass('overflow-hidden');
            }
        });
    });
    function ready() {
        var element = document.getElementById("product_title");
        //element.classList.add("animatitle");
    }

    document.addEventListener("DOMContentLoaded", ready);
</script>

<div id="off-canvas-layer" class="unero-off-canvas-layer"></div>

</body>
</html>
