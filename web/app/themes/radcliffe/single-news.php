<?php

get_header();

$pageSummary = get_field('summary');

?>

<div class="content">

    <?php if ( have_posts() ) :

        while ( have_posts() ) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="post-header section">

                    <div class="post-header-inner section-inner thin">

                        <p class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></p>

                        <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>


                    </div><!-- .post-header-inner section-inner -->

                </div><!-- .post-header section -->

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="featured-media-container section-inner thin">

                        <figure class="featured-media">

                            <?php

                            the_post_thumbnail( 'post-image' );

                            ?>

                        </figure><!-- .featured-media -->
                        <?php
                        $image_caption = getImageCaption( get_the_id(), get_post_thumbnail_id() );

                        if ( $image_caption ) : ?>

                        <figcaption class="media-caption-container">

                            <p class="media-caption"><?php echo $image_caption; ?></p>

                        </figcaption>

                        <?php endif; ?>

                    </div>
                <?php endif; ?>

                <div class="post-content section-inner thin">

                    <?php if($pageSummary) : ?>

                        <p class="post-summary"><?= $pageSummary ?></p>

                    <?php endif; ?>

                    <?php the_content(); ?>

                    <?php wp_link_pages('before=<p class="page-links">' . __( 'Pages:', 'radcliffe' ) . ' &after=</p>&separator=<span class="sep">/</span>'); ?>

                </div>

                <ul class="single-news__links section-inner thin">
                    <li><a href="/news">More news</a></li>
                    <li>|</li>
                    <li><a href="/media-enquiries">Media enquiries</a></li>
                </ul>

            </div><!-- .post -->

            <?php

        endwhile;

    endif; ?>


</div><!-- .content -->

<?php get_footer(); ?>
