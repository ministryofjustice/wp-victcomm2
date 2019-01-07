<?php get_header(); ?>

<div class="content">

    <div <?php post_class( 'post single' ); ?>>

        <div class="post-header section">

            <div class="post-header-inner section-inner">

                <h2 class="post-title"><?= post_type_archive_title() ?></h2>

            </div>

        </div>

    </div>

    <div class="section-inner archive">

        <ul class="archive__list">

            <?php while ( have_posts() ) : the_post(); ?>

                <li class="archive__list-element"><a href="<?= the_permalink() ?>"><?php the_title(); ?></a></li>

            <?php endwhile; ?>

        </ul>

    </div>

</div>

<?php get_footer(); ?>