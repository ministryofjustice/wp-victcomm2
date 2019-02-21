<?php get_header(); ?>

<div class="content">

    <div class="post single">

        <div class="post-header section">

            <div class="post-header-inner section-inner">

                <h2 class="post-title"><?php _e('Error 404', 'radcliffe'); ?></h2>

            </div><!-- .post-header-inner section-inner -->

        </div><!-- .post-header section -->

        <div class="post-content section-inner thin">

            <p><?php _e("It seems like you have tried to open a page that doesn't exist. It could have been deleted or moved.",
                    'radcliffe'); ?></p>

        </div><!-- .post-content -->

        <div class="section-inner thin">

            <?php
            $rel_query = trim($_SERVER['REQUEST_URI'], '/');

            $rel_result = relevanssi_didyoumean(
                $rel_query,
                '<br><br><p style="text-align:center">Maybe this link will help.<br><br>',
                '</p>'
            );

            if ($rel_result === null) {
                echo '<br><p>Visit our <strong><a href="/">home page</a></strong> to find our latest content. Alternatively, enter a keyword in the form below and search. You may find what your are looking for.<br><br></p>';

                get_search_form();
            }

            ?>

        </div>

    </div><!-- .post -->

</div><!-- .content -->

<?php get_footer(); ?>
