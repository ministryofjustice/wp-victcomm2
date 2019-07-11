<?php
/**
 * The layout of the site requires that there are images present for all posts.
 * If the user does not upload an accompanying image, a placeholder image will be used instead.
 * The following two hooks create a `Placeholder` category, which can be used by the user
 * to specify images that have been uploaded to the media library to act as these placeholder images.
 */
add_action('admin_init', function () {

    wp_create_category('Placeholder');
});

add_action('init', function () {

    register_taxonomy_for_object_type('category', 'attachment');
});

// Ensure that the `archive-news` image size is available for PDF thumbnails as well
add_filter('fallback_intermediate_image_sizes', function ($fallback_sizes, $metadata) {

    $fallback_sizes[] = 'archive-news';

    return $fallback_sizes;
}, 10, 2);

// Allow user to select only PDFs in the media library
add_filter('post_mime_types', function ($post_mime_types) {

    $post_mime_types['application/pdf'] = [
        __('PDFs'),
        __('Manage PDFs'),
        _n_noop('PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>')
    ];

    return $post_mime_types;
});


$placeholders = get_posts([
    'category_name' => 'placeholder',
    'post_type' => 'attachment',
]);

function getThumbnail(&$placeholderCounter)
{
    global $placeholders;

    if (isPublication(get_the_ID())) {
        $reportFile = get_field('report_file', get_the_ID());
        return wp_get_attachment_image($reportFile['id'], [600, 337], true);
    }

    if (has_post_thumbnail()) {
        return get_the_post_thumbnail(get_the_ID(), 'archive-news');
    }

    if (is_array($placeholders) && sizeof($placeholders) > 0) {
        $index = ++$placeholderCounter % sizeof($placeholders);
        return wp_get_attachment_image($placeholders[$index]->ID, 'archive-news', true);
    }

    return '';
}

function getImageCaption($postId, $imageId)
{
    $caption = '';

    switch (get_field('caption_text', $postId)) {
        case 'Image default':
            $caption = wp_get_attachment_caption($imageId);
            break;

        case 'Custom':
            $caption = get_field('custom_caption_text', $postId);
            break;

        default:
            $caption = '';
            break;
    }

    return $caption;
}
