<?php

global $vcTemplateData;

$td = $vcTemplateData;

$showDate = isset($td['date-format']);

$postTypeName = $td['post-type-name'];
$postTypeNameLowercase = strtolower( $td['post-type-name']);

// Don't show post types for pages or posts
$showPostType = ! in_array( $postTypeNameLowercase , ['page', 'post'] );

// Don't show dates for pages
if ( in_array( $postTypeNameLowercase, ['page'] ) ) {
    $showDate = false;
}

// Convert post type name of 'News post' to 'News'
if ( $postTypeNameLowercase == 'news post') {
    $postTypeName = 'News';
}

?>

<div class="search-result section-inner">

    <div class="list-item-meta">

        <?php if ( $showPostType )  : ?>

            <div class="list-item-meta__type"><?= $postTypeName ?></div>

        <?php endif; ?>

        <?php if ( $showPostType && $showDate )  : ?>

            <div class="list-item-meta__divider">|</div>

        <?php endif; ?>

        <?php if ( $showDate ) : ?>

            <div class="list-item-meta__date"> <?= get_the_date($td['date-format']); ?></div>

        <?php endif; ?>

    </div>

    <h2 class="search-result__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <?php if ($the_excerpt = get_the_excerpt() ) : ?>

        <div class="search-result__excerpt"><?= $the_excerpt ?></div>

    <?php endif; ?>

</div>
