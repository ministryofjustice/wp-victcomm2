<?php get_header(); ?>

<main class="content" id="maincontent">

    <div id="search2" class="section-inner">
        <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label class='search-term-input-label no-focus' for="s">Search this website for: </label>
            <input type="search" name="s" id="s" class="search-term-input no-focus"/>
            <input type="submit" value="Search" class="no-focus">
        </form>
    </div>

    <div class="page-title section light-padding">

        <div class="section-inner">

            <p class="search-results-page-form__info">

                <?php
                if (is_search()) {
                    global $wp_query;

                    $numberOfResults = $wp_query->found_posts;

                    printf(__('%u results for: %s', 'radcliffe'), $numberOfResults, get_search_query());

                    if (function_exists('relevanssi_didyoumean')) {
                        relevanssi_didyoumean(
                            get_search_query(),
                            '<p class="search-results-page-form__did-you-mean">Did you mean: ',
                            '?</p>'
                        );

                    }

                }
                ?>

            </p>

        </div><!-- .section-inner -->

    </div><!-- .page-title -->

    <div class="search-results-list">
        <?php

        while (have_posts()) : the_post();
            $postType = get_post_type();

            $templateData = [
                'post-type' => $postType,
                'post-type-name' => get_post_type_object($postType)->labels->singular_name,
                'date-format' => get_option('date-format'),
            ];

            echo partial($templateData, 'search-result');

        endwhile;

        if ($wp_query->max_num_pages > 1) : ?>

            <div class="archive-nav section-inner">

                <?php echo get_previous_posts_link('&laquo; ' . __('Previous results', 'radcliffe')); ?>

                <?php echo get_next_posts_link(__('More results', 'radcliffe') . ' &raquo;'); ?>

                <div class="clear"></div>

            </div><!-- .post-nav archive-nav -->

        <?php endif; ?>

    </div><!-- .posts -->

</main><!-- .content section-inner -->

<?php get_footer(); ?>
