<?php

get_header();

global $post;
global $vcTemplateData;
global $wp_query;

$td = [
    'archive-text' => ($archiveText = get_field('news_archive_text', 'option')) ? $archiveText : '',
    'summary' => ($archiveSummary = get_field('news_archive_summary', 'option')) ? $archiveSummary : '',
    'date-format' => get_option('date_format'),
    'archive-outro-text' => ($archiveOutroText = get_field('news_archive_outro_text', 'option')) ? $archiveOutroText : '',
];

$placeholderCounter = 0;

?>

<main class="content" id="maincontent">

    <div <?php post_class('post single'); ?>>

        <div class="post-header section">

            <div class="post-header-inner section-inner">
              
                <h1 class="post-title">Latest news</h1>

                <?php if (isset($td['summary'])) : ?>
                    <p class="post-summary"><?= $td['summary'] ?></p>

                <?php endif; ?>

            </div>

        </div>

        <?php if (isset($td['archive-text'])) : ?>
            <div class="post-content section-inner">

                <div class="archive__content"><?= $td['archive-text'] ?></div>

            </div>

        <?php endif; ?>

        <div class="section-inner archive-news">

            <ul class="archive-news__list">

                <?php while (have_posts()) :
                    the_post();
                    ?>

                    <li class="archive-news__item">

                        <a class="archive-news__item-button" href="<?= the_permalink() ?>">

                            <?= getThumbnail($placeholderCounter) ?>

                            <div class="archive-news__item-date"><?= get_the_date(get_option('date_format')); ?></div>

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

            <?php if ($wp_query->max_num_pages > 1) : ?>
                <div class="archive-news__nav">

                    <?php echo get_previous_posts_link('&laquo; ' . __('Previous news', 'radcliffe')); ?>

                    <?php echo get_next_posts_link(__('More news', 'radcliffe') . ' &raquo;'); ?>

                </div>

            <?php endif; ?>

        </div>

        <?php if (isset($td['archive-outro-text'])) : ?>
            <div class="post-content section-inner">

                <div class="archive__content"><?= $td['archive-outro-text'] ?></div>

            </div>

        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>
