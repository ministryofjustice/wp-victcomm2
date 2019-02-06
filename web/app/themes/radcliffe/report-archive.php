<?php

get_header();

global $vcTemplateData;

$td = $vcTemplateData;

?>

    <div class="content">

        <div <?php post_class( 'post single' ); ?>>

            <div class="post-header section">

                <div class="post-header-inner section-inner">

                    <h2 class="post-title"><?= post_type_archive_title() ?></h2>

                    <?php if(isset($td['summary'])) : ?>

                        <p class="post-summary"><?= $td['summary'] ?></p>

                    <?php endif; ?>

                </div>

            </div>

            <div class="post-content section-inner">

                <div class="archive__content"><?= $td['archive-text'] ?></div>

                <ul class="archive__list">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <li class="archive__list-element"><a href="<?= the_permalink() ?>"><?php the_title(); ?></a></li>

                    <?php endwhile; ?>

                </ul>

            </div>

        </div>

    </div>

<?php get_footer(); ?>
