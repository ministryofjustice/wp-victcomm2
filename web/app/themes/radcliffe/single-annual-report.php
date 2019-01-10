<?php
get_header();
global $post;
setup_postdata($post);

$td = [];

$reportFile = get_field('report_file');

if ($fileName = get_field('user_friendly_file_name')) {
    $td['userFriendlyFileName'] = $fileName;
} else {
    $td['userFriendlyFileName'] = $reportFile['filename'];
}

$td['downloadUrl'] = $reportFile['url'];

$td['fileSize'] = convertByteSizeToHumanReadable($reportFile['filesize']);

$image = new Imagick();
$td['image'] = $image->pingImage(get_attached_file($reportFile['id']));

$td['numberOfPages'] = $image->getNumberImages();

$td['fileType'] = strtoupper($reportFile['subtype']);

$td['attachmentImage'] = wp_get_attachment_image($reportFile['id'], 'report');

$td['postTypeName'] = $post->post_type;
$td['postType'] = get_post_type_object($td['postTypeName']);

echo template($td, 'report');

get_footer();
