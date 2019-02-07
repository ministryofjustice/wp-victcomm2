<?php

get_header();

global $post;
global $vcTemplateData;

$td = $vcTemplateData;

$placeholders = get_posts([
    'category_name' => 'placeholder',
    'post_type' => 'attachment',
]);
$placeholderCounter = -1;

function getThumbnail() {
    global$placeholders, $placeholderCounter;

    $postType = get_post_type();

    if ( $postType === 'annual-reports' || $postType === 'published-reviews' ) {
        $reportFile = get_field('report_file', get_the_ID());
        return wp_get_attachment_image($reportFile['id'], [600, 337], true);
    }

    if ( has_post_thumbnail() ) {
        return get_the_post_thumbnail( get_the_ID(), 'archive-news' );
    }

    if ( is_array($placeholders) && sizeof($placeholders) > 0) {
        $index = ++$placeholderCounter % sizeof($placeholders);
        return wp_get_attachment_image( $placeholders[$index]->ID,'archive-news', true);
    }

    return '';
}

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

                            <?= getThumbnail() ?>

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

                    <?php echo get_previous_posts_link( '&laquo; ' . __( 'Previous news items', 'radcliffe')  ); ?>

                    <?php echo get_next_posts_link(  __( 'More news items', 'radcliffe' ) . ' &raquo;' ); ?>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php get_footer(); ?>
