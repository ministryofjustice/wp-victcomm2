<?php
get_header();

global $post;
setup_postdata($post);

$image = new Imagick();

$pageSummary = get_field('summary');

$reportFile = get_field('report_file');

$postTypeName = $post->post_type;

// template data
$td = [

   'pageSummary' => $pageSummary,

   'userFriendlyFileName' => ($fileName = get_field('user_friendly_file_name')) ? $fileName : $reportFile['filename'],

   'downloadUrl' => $reportFile['url'],

   'fileSize' => convertByteSizeToHumanReadable($reportFile['filesize']),

   'image' => $image->pingImage(get_attached_file($reportFile['id'])),

   'numberOfPages' => $image->getNumberImages(),

   'fileType' => strtoupper($reportFile['subtype']),

   'attachmentImage' => wp_get_attachment_image($reportFile['id'], 'report'),

   'postTypeName' => $postTypeName,

   'postType' => get_post_type_object($postTypeName),
];

echo template($td, 'report');

get_footer();
