<?php

global $post;

get_header();

$pageSummary = get_field('summary');

?>

<main class="content" id="maincontent">

    <?php if (have_posts()) :
        while (have_posts()) :
            the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="post-header section">

                    <div class="post-header-inner section-inner thin">

                        <p class="post-date"><?php the_time(get_option('date_format')); ?></p>

                        <?php the_title('<h1 class="post-title">', '</h1>'); ?>

                        <?php if ($pageSummary) : ?>
                            <p class="post-summary"><?= $pageSummary ?></p>

                        <?php endif; ?>

                    </div><!-- .post-header-inner section-inner -->

                </div><!-- .post-header section -->

                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-media-container">

                        <div class="featured-media section-inner thin"
                             style="background-image: url( <?php the_post_thumbnail_url('post-image'); ?> );">
                            <?php

                            the_post_thumbnail('post-image');

                            $image_caption = get_post(get_post_thumbnail_id())->post_excerpt;

                            if ($image_caption) : ?>
                                <div class="media-caption-container">

                                    <p class="media-caption"><?php echo $image_caption; ?></p>

                                </div>

                            <?php endif; ?>

                        </div><!-- .featured-media -->

                    </div>

                <?php endif; ?>

                <div class="post-content section-inner thin">

                    <?php the_content(); ?>

                    <p><?php

                        $postTypeName = $post->post_type;
                        $postTypeObject = get_post_type_object($postTypeName);

                        echo partial([
                            'postTypeName' => $postTypeName,
                            'postType' => $postTypeObject,
                        ], 'find-more');

                        ?></p>

                    <?php wp_link_pages(
                        'before=<p class="page-links">' . __(
                            'Pages:',
                            'radcliffe'
                        ) . ' &after=</p>&separator=<span class="sep">/</span>'
                    ); ?>

                </div>

            </div><!-- .post -->

        <?php endwhile; ?>
    <?php endif; ?>

</main><!-- .content -->

<?php get_footer(); ?>
