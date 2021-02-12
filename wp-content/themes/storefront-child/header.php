<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="b02efc5270ea047c" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel='stylesheet'  href='/animate.css' type='text/css' media='all' />
    <script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?162",t.onload=function(){VK.Retargeting.Init("VK-RTRG-389403-8SSgC"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-389403-8SSgC" style="position:fixed; left:-999px;" alt=""/></noscript>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

    <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

        <div class="container headblock">
            <div id="pop-cookie">
                <input type="checkbox" id="pop-checkbox">
                <div class='pop-block' id="pop-block">
                    <a href="/shop/silver/kaff-drakosha-iz-serebra-s-cherneniem"><img class="saleimage"
                                                                                      src="//каффы.рф/images/sale.jpg"
                                                                                      alt="акция кафф"></a>
                    <label for="pop-checkbox" class="close-block"></label>
                </div>
            </div>

            <div class="row right-block-mobile">
                <div class="col-lg-3 d-lg-block d-none">
                    <?php the_widget('YITH_WCAS_Ajax_Search_Widget'); ?>
                </div>
                <div class="col-lg-6 col-12">
                    <a href="/">
                        <div class="logocont">
                            <div class="logocont2">
                                <img src="/images/kaff.jpg" alt="каффы"/>
                            </div>
                            <div class="logocont3 d-lg-block d-none">
                                <p class="stepa">stepan vasiliev</p>
                                <div id="carousel2" class="carousel carousel-fade" data-ride="carousel">

                                    <!-- Carousel items -->
                                    <div class="carousel-inner text-center">
                                        <div class="active carousel-item item animated fadeIn"><span class="topheadstory"><?php
                                                $quotes = array(); // Инициализируем пустой массив
                                                $quotes[] = 'Каффы ручной работы';
                                                $quotes[] = 'Мастер, ювелир';
                                                $quotes[] = 'Интернет магазин';
                                                $number = mt_rand(0, count($quotes) - 1);
                                                echo $quotes[$number]; // Выводим цитату
                                                ?></span></div>
                                        <div class="carousel-item item animated fadeIn"><span class="topheadstory"><?php
                                                $quotes = array(); // Инициализируем пустой массив
                                                $quotes[] = 'Гарантия на изделия';
                                                $quotes[] = 'Доставка в регионы';
                                                $quotes[] = 'Участие в ярмарках';
                                                $number = mt_rand(0, count($quotes) - 1);
                                                echo $quotes[$number]; // Выводим цитату
                                                ?></span></div>
                                        <div class="carousel-item item animated fadeIn"><span class="topheadstory"><?php
                                                $quotes = array(); // Инициализируем пустой массив
                                                $quotes[] = 'Лучший подарок';
                                                $quotes[] = 'Порадуйте себя';
                                                $quotes[] = 'Порадуйте близких';
                                                $number = mt_rand(0, count($quotes) - 1);
                                                echo $quotes[$number]; // Выводим цитату
                                                ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="col-lg-3 col-12">
                    <div><p class="phonemain">8 (916) 322-31-69</p></div>
                    <div>
                        <aside id="widget_shopping_mini_cart-2" class="widget widget_shopping_mini_cart dropdown-cart">
                            <?php
                            $instance = array("title" => "", "number" => 1);
                            $args = array("title" => "My Widget", "before_title" => "", "after_title" => "");
                            $sb = new WooCommerce_Widget_DropdownCart();
                            $sb->number = $instance['number'];
                            $sb->widget($args, $instance);
                            ?></aside>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default navbar-expand-xl p-0">
                <div class="d-flex">
					<?php
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_id'    => '',
						'container_class' => 'collapse navbar-collapse justify-content-end mr-5',
						'menu_id'         => false,
						'menu_class'      => 'navbar-nav nav',
						'depth'           => 3,
						'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
						'walker'          => new wp_bootstrap_navwalker()
					) );
					?>

                    <div class="outer-menu">
                        <button class="navbar-toggler navbar-light position-relative" type="button" style="z-index: 1">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <input class="checkbox-toggle" data-toggle="collapse" data-target="#main-nav"
                               aria-controls="" aria-expanded="false" aria-label="Toggle navigation" type="checkbox"/>
                        <div class="menu">
                            <div>
                                <div class="border-header">
									<?php
									wp_nav_menu( array(
										'theme_location'  => 'primary',
										'container'       => 'div',
										'container_id'    => 'main-nav',
										'container_class' => 'collapse navbar-collapse justify-content-end',
										'menu_id'         => false,
										'menu_class'      => 'navbar-nav',
										'depth'           => 3,
										'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
										'walker'          => new wp_bootstrap_navwalker()
									) );
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

    <div id="content" class="site-content">
        <div class="container">
            <div class="row">

<?php
do_action( 'storefront_content_top' );
