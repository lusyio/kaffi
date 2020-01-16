<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>

    <div id="primary" class="content-area col-sm-12">
        <main id="main" class="site-main" role="main">

            <?php if (have_posts()) : ?>
            <hr>
            <header class="page-header">
                <?php
                the_archive_title('<h1 class="entry-title text-center">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>');
                ?>
            </header><!-- .page-header -->
            <div class="row">
                <?php
                get_template_part('loop');

                else :

                    get_template_part('content', 'none');

                endif;
                ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
do_action('storefront_sidebar');
get_footer();
