<?php

get_header();

global $vcTemplateData;

$td = $vcTemplateData;

?>

    <div class="content">

        <div <?php post_class( 'post single' ); ?>>

            <div class="post-header section">

                <div class="post-header-inner section-inner thin">

                    <h2 class="post-title"><?= post_type_archive_title() ?></h2>

                    <?php if(isset($td['summary'])) : ?>

                        <p class="post-summary"><?= $td['summary'] ?></p>

                    <?php endif; ?>

                </div>

            </div>

            <div class="post-content section-inner thin">

                <div class="archive__content"><?= $td['archive-text'] ?></div>

                <ul class="archive__list">

                    <?php while ( have_posts() ) : the_post();

                        $postType = get_post_type_object(get_post_type());

                        $postTypeName = $postType->labels->singular_name;

                        $excerpt = wp_trim_words(get_the_excerpt(), 10);

                    ?>

                        <li class="archive__list-element">

                            <div class="list-item-meta">

                                <div class="list-item-meta__type"><?= $postTypeName ?></div>

                                <?php if (isset($td['date-format'])) : ?>

                                    <div class="list-item-meta__divider">|</div>
                                    <div class="list-item-meta__date"> <?= get_the_date($td['date-format']); ?></div>

                                <?php endif; ?>

                            </div>

                            <a class="archive__list-element-link" href="<?= the_permalink() ?>"><?php the_title(); ?></a>

                            <?php if ($excerpt) : ?>

                                <div class="archive__list-element-excerpt"><?= $excerpt?></div>

                            <?php endif; ?>

                        </li>

                    <?php endwhile; ?>

                </ul>

                <div class="archive__content"><?= $td['archive-outro-text'] ?></div>

            </div>

        </div>

    </div>

<?php get_footer(); ?>
