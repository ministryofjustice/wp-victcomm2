<?php
get_header();

global $post;
setup_postdata($post);

$pageSummary = get_field('summary');

$reportFile = get_field('report_file');

$postTypeName = $post->post_type;

// template data
$td = [

    'pageSummary' => $pageSummary,

    'userFriendlyFileName' => ($fileName = get_field('user_friendly_file_name')) ? $fileName : $reportFile['filename'],

    'downloadUrl' => $reportFile['url'],

    'fileSize' => get_post_meta($post->ID, 'report_file_size', true),

    'numberOfPages' => get_post_meta($post->ID, 'report_file_number_of_pages', true),

    'fileType' => get_post_meta($post->ID, 'report_file_type', true),

    'attachmentImage' => wp_get_attachment_image($reportFile['id'], 'report'),

    'postTypeName' => $postTypeName,

    'postType' => get_post_type_object($postTypeName),

    'postDate' => get_the_date(get_option('date_format')),

];

echo template($td, 'report');

get_footer();
