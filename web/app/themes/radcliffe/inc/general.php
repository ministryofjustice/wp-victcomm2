<?php
/* ---------------------------------------------------------------------------------------------
   ADD PAGINATION CLASSES
   --------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_posts_link_attributes_1')) {

    function radcliffe_posts_link_attributes_1()
    {
        return 'class="post-nav-older"';
    }

    add_filter('next_posts_link_attributes', 'radcliffe_posts_link_attributes_1');

}

if (!function_exists('radcliffe_posts_link_attributes_2')) {

    function radcliffe_posts_link_attributes_2()
    {
        return 'class="post-nav-newer"';
    }

    add_filter('previous_posts_link_attributes', 'radcliffe_posts_link_attributes_2');

}


/* ---------------------------------------------------------------------------------------------
   CUSTOM MORE LINK TEXT
   --------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_custom_more_link')) {

    function radcliffe_custom_more_link($more_link, $more_link_text)
    {
        return str_replace($more_link_text, __('Continue reading', 'radcliffe'), $more_link);
    }

    add_filter('the_content_more_link', 'radcliffe_custom_more_link', 10, 2);

}


/* ---------------------------------------------------------------------------------------------
   BODY & POST CLASSES
   --------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_body_post_classes')) {

    function radcliffe_body_post_classes($classes)
    {

        // If has post thumbnail
        $classes[] = has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';

        return $classes;
    }

    add_filter('post_class', 'radcliffe_body_post_classes');
    add_filter('body_class', 'radcliffe_body_post_classes');

}


/* ---------------------------------------------------------------------------------------------
   ADMIN CSS
   --------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_admin_css')) {

    function radcliffe_admin_css()
    {
        ?>
        <style type="text/css">
            #postimagediv #set-post-thumbnail img {
                max-width: 100%;
                height: auto;
            }
        </style>
        <?php
    }

    add_action('admin_head', 'radcliffe_admin_css');

}


/* ---------------------------------------------------------------------------------------------
   CUSTOM THEME MODIFICATIONS
   --------------------------------------------------------------------------------------------- */

/**
 * Filter the except length to 30 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt_length($length)
{
    return getCommonExcerptLength();
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

/**
 * Convert byte size to human readable
 *
 * @param $bytes
 *
 * @return string
 */
function convertByteSizeToHumanReadable($bytes)
{

    if ($bytes > 0) {
        $unit = intval(log($bytes, 1024));
        $units = array('B', 'KB', 'MB', 'GB');

        if (array_key_exists($unit, $units) === true) {
            return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
        }
    }

    return $bytes;
}

/**
 * Function to determine if the post, with `$postId` is a report CPT;
 * either an Annual Report or a Published Review.
 *
 * @param $postId
 *
 * @return bool
 */
function isPublication($postId)
{
    $postType = get_post_type($postId);

    return in_array($postType, getPublicationPostTypesArray());
}

add_action('save_post', function ($postId, $post, $update) {

    if (isPublication($postId)) {
        $image = new Imagick();

        if ($reportFile = get_field('report_file', $postId)) {
            if ($reportFilePath = get_attached_file($reportFile['id'])) {
                $image->pingImage($reportFilePath);

                update_post_meta(
                    $postId,
                    'report_file_size',
                    convertByteSizeToHumanReadable($reportFile['filesize'])
                );

                $numberOfPages = $image->getNumberImages();

                update_post_meta($postId, 'report_file_number_of_pages', $numberOfPages);

                update_post_meta($postId, 'report_file_type', strtoupper($reportFile['subtype']));

            }

        }

    }
}, 10, 3);

function template($data, $slug, $name = '')
{
    global $vcTemplateData;
    $vcTemplateData = $data;

    ob_start();
    get_template_part($slug, $name);
    $output = ob_get_contents();
    ob_end_clean();

    $vcTemplateData = null;
    return $output;
}

function partial($data, $slug, $name = '')
{
    return template($data, 'partials/' . $slug, $name);
}

/**
 * The following ensures that when viewing the archive of news posts,
 * that the reports post types are also shown.
 *
 * A consequence of this is that the 'news archive' template will not be used
 * because the archive is no longer just showing news posts.
 * `archive.php` will be used instead.
 */
add_action('pre_get_posts', function ($query) {

    if ($query->is_main_query() && is_post_type_archive(getPublicationPostTypesArray())) {
        $query->set('posts_per_page', '-1');

    }

    if ($query->is_main_query() && !is_admin() && is_post_type_archive('news')) {
        $query->set('order', 'DESC');
        $query->set('posts_per_page', '9');

    }

});
