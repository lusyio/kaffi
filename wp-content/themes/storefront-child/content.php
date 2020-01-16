<?php
# content
?>
<div class="col-md-6 col-12 mb-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-item-wrap">
            <div class="post-inner-content">
                <header class="entry-header page-header">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>


                </header><!-- .entry-header -->

                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail( 'activello-featured', array( 'class' => 'single-featured' )); ?>
                </a>

                <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                        <p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'activello' ); ?></a></p>
                    </div><!-- .entry-summary -->
                <?php else : ?>
                    <div class="entry-content">

                        <?php
                        if ( get_theme_mod( 'activello_excerpts', 1 ) && get_the_excerpt() != "" ) :
                            the_excerpt();
                        else :
                            the_content();
                        endif;
                        ?>

                        <?php
                        wp_link_pages( array(
                            'before'            => '<div class="page-links">'.esc_html__( 'Pages:', 'activello' ),
                            'after'             => '</div>',
                            'link_before'       => '<span>',
                            'link_after'        => '</span>',
                            'pagelink'          => '%',
                            'echo'              => 1
                        ) );
                        ?>

                        <?php if( ! is_single()) : ?>
                            <div class="read-more">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html_e( 'Подробнее' ); ?></a>
                            </div>
                        <?php endif; ?>


                    </div><!-- .entry-content -->
                <?php endif; ?>
            </div>
        </div>
    </article><!-- #post-## -->
</div>