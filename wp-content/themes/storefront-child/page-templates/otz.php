<?php
/**
 * Template Name: otz
 *
 * @package techone
 */

get_header(); ?>

<div class="col-12">
    <hr>
    <header class="entry-header page-header">
        <h1 class="entry-title">Отзывы</h1>
    </header>
    <div class="entry-content blogs">
        <p class="text-center"><?php $count_comments = get_comment_count();
            $comments = $count_comments['approved'];
            $html = '<strong>' . $comments . '</strong>';
            echo $html; ?> отзывов о наших изделиях из следующих источников:<br><a
                    href="http://xn--80at5aa9a.xn--p1ai/shop/" target="_blank">каффы.рф</a>, <a
                    href="https://vk.com/topic-94098442_32358695" target="_blank">группа вконтакте</a> и <a
                    href="https://www.livemaster.ru/jewelryearcuff/feedbacks" target="_blank">ярмарка мастеров</a>.
        </p>
    </div>
    <div class="entry-content">

        <?php echo do_shortcode('[twb_wc_reviews number="69"]'); ?>

    </div>
</div>

<?php get_footer(); ?>
