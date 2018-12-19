<?php get_header(); ?>

    <div class="content">

        <form method="get" class="search-results-page-form mobile-search-form section-inner" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" placeholder="<?php _e( 'Search form', 'radcliffe' ); ?>" name="s" id="s" />
            <input type="submit" value="<?php _e( 'Search', 'radcliffe' ); ?>" class="search-button">
        </form>

        <?php if ( have_posts() ) : ?>

            <div class="page-title section light-padding">

                <div class="section-inner">

                    <h4>
                        <?php
                        if ( is_search() ) {
                            printf( __( 'Search results: "%s"', 'radcliffe' ), get_search_query() );
                        }
                        ?>

                    </h4>

                </div><!-- .section-inner -->

            </div><!-- .page-title -->

        <?php endif; ?>

        <div class="search-results-list">
            <?php

            while ( have_posts() ) : the_post();

                get_template_part( 'search_result', get_post_format() );

            endwhile;

            if ( $wp_query->max_num_pages > 1 ) : ?>

                <div class="archive-nav">

                    <?php echo get_previous_posts_link( '&laquo; ' . __( 'Previous results', 'radcliffe')  ); ?>

                    <?php echo get_next_posts_link(  __( 'More results', 'radcliffe' ) . ' &raquo;' ); ?>

                    <div class="clear"></div>

                </div><!-- .post-nav archive-nav -->

            <?php endif; ?>

        </div><!-- .posts -->

    </div><!-- .content section-inner -->

<?php get_footer(); ?>
