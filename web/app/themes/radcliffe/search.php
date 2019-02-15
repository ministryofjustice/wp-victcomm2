<?php get_header(); ?>

    <div class="content">

        <form method="get" class="search-results-page-form search-form section-inner" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" placeholder="<?php _e( 'Type and press enter', 'radcliffe' ); ?>" name="s" id="s" />
            <input type="submit" value="<?php _e( 'Search', 'radcliffe' ); ?>" class="search-button">
        </form>

        <div class="page-title section light-padding">

            <div class="section-inner">

                <p class="search-results-page-form__label">

                    <?php
                    if ( is_search() ) {

                        $allResults = new WP_Query("s=$s&showposts=-1");

                        $numberOfResults = $allResults->found_posts;

                        printf( __( '%u search results for: "%s"', 'radcliffe' ), $numberOfResults, get_search_query() );

                    }
                    ?>

                </p>

            </div><!-- .section-inner -->

        </div><!-- .page-title -->

        <div class="search-results-list">
            <?php

            while ( have_posts() ) : the_post();

                $templateData = [
                    'post-type-name' => get_post_type_object(get_post_type())->labels->singular_name,
                    'date-format' => get_option('date-format'),
                ];

                echo partial( $templateData,'search-result' );

            endwhile;

            if ( $wp_query->max_num_pages > 1 ) : ?>

                <div class="archive-nav section-inner">

                    <?php echo get_previous_posts_link( '&laquo; ' . __( 'Previous results', 'radcliffe')  ); ?>

                    <?php echo get_next_posts_link(  __( 'More results', 'radcliffe' ) . ' &raquo;' ); ?>

                    <div class="clear"></div>

                </div><!-- .post-nav archive-nav -->

            <?php endif; ?>

        </div><!-- .posts -->

    </div><!-- .content section-inner -->

<?php get_footer(); ?>
