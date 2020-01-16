<?php
/**
 * content-single
 */
?>
<div class="col-12">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-item-wrap">
            <div class="post-inner-content">
                <hr>
                <header class="entry-header page-header border-0">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
                <?php the_post_thumbnail('activello-featured', array('class' => 'single-featured')); ?>

                <div class="entry-content blogs">
                    <p>
                        <script type="text/javascript" src="//vk.com/js/api/openapi.js?137"></script>

                        <!-- VK Widget -->
                    <div id="vk_subscribe" class="hidden-xs"></div>
                    <script type="text/javascript">
                        VK.Widgets.Subscribe("vk_subscribe", {}, -45705067);
                    </script>
                    </p>

                    <?php the_content(); ?>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'activello'),
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '%',
                        'echo' => 1
                    ));
                    ?>


                </div><!-- .entry-content -->


            </div>
        </div>
    </article><!-- #post-## -->
</div>
