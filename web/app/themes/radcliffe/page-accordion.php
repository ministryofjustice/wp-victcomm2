<?php
/**
 * Template Name: Accordion page
 */

get_header();

$pageSummary = get_field('summary');

$accordions = get_field('icon_accordion');

?>

    <div class="content">

        <?php if ( have_posts() ) :

            while ( have_posts() ) : the_post(); ?>

                <div <?php post_class( 'post single' ); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>

                        <div class="featured-media" style="background-image: url( <?php the_post_thumbnail_url( $post->ID, 'post-image' ); ?> );">

                            <?php

                            the_post_thumbnail( 'post-image' );

                            $image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;

                            if ( $image_caption ) : ?>

                                <div class="media-caption-container">

                                    <p class="media-caption"><?php echo $image_caption; ?></p>

                                </div>

                            <?php endif; ?>

                        </div><!-- .featured-media -->

                    <?php endif; ?>

                    <div class="post-header section">

                        <div class="post-header-inner section-inner thin">

                            <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

                            <?php if($pageSummary) : ?>
                                <p class="post-summary"><?= $pageSummary ?></p>
                            <?php endif; ?>

                        </div><!-- .post-header-inner section-inner -->

                    </div><!-- .post-header section -->

                    <div class="post-content section-inner thin">

                        <?php the_content(); ?>

                        <div class="clear"></div>

                        <?php wp_link_pages('before=<p class="page-links">' . __( 'Pages:', 'radcliffe' ) . ' &after=</p>&seperator= <span class="sep">/</span> '); ?>

                    </div>

                    <div class="accordion section-inner thin">

                        <?php foreach ($accordions as $accordion) : ?>

                            <div class="accordion-item">

                                    <details class="">

                                        <summary class="accordion-item__summary">

                                            <div class="accordion-item__summary-container">

                                                <div class="accordion-item__icon"><?= wp_get_attachment_image($accordion['icon']['id']) ?></div>

                                                <h3 class="accordion-item__title"><?= $accordion['title'] ?></h3>

                                            </div>

                                        </summary>

                                        <div class="accordion-item__content"><?= $accordion['content'] ?></div>

                                </details>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div><!-- .post -->

                <?php

            endwhile;

        endif; ?>

    </div><!-- .content -->

<?php get_footer(); ?>
