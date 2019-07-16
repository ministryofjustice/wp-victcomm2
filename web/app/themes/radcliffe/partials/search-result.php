<?php

global $vcTemplateData;

$td = $vcTemplateData;

$showDate = isset($td['date-format']);

$postTypeName = $td['post-type-name'];
$postTypeNameLowercase = strtolower($td['post-type-name']);

// Don't show post types for pages or posts
$showPostType = !in_array($postTypeNameLowercase, ['page', 'post']);

if ($showPostType) {
    $archiveLink = get_post_type_archive_link($td['post-type']);
}

// Don't show dates for pages
if (in_array($postTypeNameLowercase, ['page'])) {
    $showDate = false;
}

// Convert post type name of 'News post' to 'News'
if ($postTypeNameLowercase == 'news post') {
    $postTypeName = 'News';
}

// Show meta
$showMeta = $showPostType || $showDate;


?>

<div class="search-result section-inner">

    <?php if ($showMeta) : ?>
        <div class="list-item-meta">

            <?php if ($showPostType) : ?>
                <div class="list-item-meta__type">
                    <a class="list-item-meta__type-link" href="<?= $archiveLink ?>"><?= $postTypeName ?></a>
                </div>

            <?php endif; ?>

            <?php if ($showPostType && $showDate) : ?>
                <div class="list-item-meta__divider">|</div>

            <?php endif; ?>

            <?php if ($showDate) : ?>
                <div class="list-item-meta__date"> <?= get_the_date($td['date-format']); ?></div>

            <?php endif; ?>

        </div>

    <?php endif; ?>

    <h2 class="search-result__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <?php if ($the_excerpt = get_the_excerpt()) : ?>
        <div class="search-result__excerpt"><?= $the_excerpt ?></div>

    <?php endif; ?>

</div>
