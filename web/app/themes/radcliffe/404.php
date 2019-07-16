<?php get_header(); ?>

<main class="content" id="maincontent">

    <div class="post single">

        <div class="post-header section">

            <div class="post-header-inner section-inner">

                <h1 class="post-title"><?php _e('Error 404', 'radcliffe'); ?></h1>

            </div><!-- .post-header-inner section-inner -->

        </div><!-- .post-header section -->

        <div class="post-content section-inner thin">

            <div class="section-inner thin">
                <p><?php _e("It seems like you have tried to open a page that doesn't exist. It could have been deleted or moved.", 'radcliffe'); ?></p>

                <?php
                $rel_query = trim($_SERVER['REQUEST_URI'], '/');

                $rel_result = relevanssi_didyoumean(
                    $rel_query,
                    '<br><br><p style="text-align:center">Maybe this link will help.<br><br>',
                    '</p>'
                );

                if ($rel_result === null) : ?>
                    <br>
                    <p>Visit our <a href="/">home page</a>
                        to find our latest content.
                        Alternatively, enter a keyword in the form below and search.
                        You may find what your are looking for.
                    </p>
                    <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <label class='search-term-input-label' for="s">Search for: </label>
                        <input type="search" placeholder="enter search term" name="s" id="s" class="search-term-input" />
                    </form>

                <?php endif; ?>

            </div>

        </div><!-- .post-content -->

    </div><!-- .post -->

</main><!-- .content -->

<?php get_footer(); ?>
