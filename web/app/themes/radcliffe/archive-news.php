<?php

get_header();

global $post;
global $vcTemplateData;

$td = $vcTemplateData;

$placeholderCounter = 0;

?>

    <div class="content">

        <div <?php post_class( 'post single' ); ?>>

            <div class="post-header section">

                <div class="post-header-inner section-inner">

                    <h2 class="post-title">News</h2>

                </div>

            </div>

            <div class="section-inner archive-news">

                <div class="archive__content"><?= $td['archive-text'] ?></div>

                <ul class="archive-news__list">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <li class="archive-news__item">

                            <a class="archive-news__item-button" href="<?= the_permalink() ?>">

                                <?= getThumbnail($placeholderCounter) ?>

                                <div class="archive-news__item-date"><?= get_the_date(get_common_date_format()); ?></div>

                                <h2 class="archive-news__item-title"><?php the_title(); ?></h2>

                                <p class="archive-news__item-summary">

                                    <?php if (!$pageSummary = get_field('summary')) {

                                        $pageSummary = get_the_excerpt();

                                    }
                                    echo wp_trim_words($pageSummary, 20);
                                    ?>
                                </p>

                            </a>

                        </li>

                    <?php endwhile; ?>

                </ul>

                <?php if ( $wp_query->max_num_pages > 1 ) : ?>

                    <div class="archive-news__nav">

                        <?php echo get_previous_posts_link( '&laquo; ' . __( 'Previous news', 'radcliffe')  ); ?>

                        <?php echo get_next_posts_link(  __( 'More news', 'radcliffe' ) . ' &raquo;' ); ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

<?php get_footer(); ?>
