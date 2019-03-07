<?php get_header(); ?>

<div class="content">

    <div class="section-inner">
        <form method="get" class="search-results-page-form search-form"
              action="<?php echo esc_url(home_url('/')); ?>">
            <label class="search-term-input-label" for="s" >Search for: </label>
            <input type="search" placeholder="<?php _e('enter search term', 'radcliffe'); ?>" name="s" id="s" class="search-term-input" />
            <input type="submit" value="<?php _e('Search', 'radcliffe'); ?>" class="search-button">
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

            $templateData = [
                'post-type-name' => get_post_type_object(get_post_type())->labels->singular_name,
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

</div><!-- .content section-inner -->

<?php get_footer(); ?>
