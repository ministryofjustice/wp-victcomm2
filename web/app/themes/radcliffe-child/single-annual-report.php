<?php
get_header();

global $post;
setup_postdata($post);

$reportFile = get_field('report_file');

if ($fileName = get_field('user_friendly_file_name')) {
    $userFriendlyFileName = $fileName;
} else {
    $userFriendlyFileName = $reportFile['filename'];
}

$filePageLink = $reportFile['link'];
$downloadUrl = $reportFile['url'];

$fileSize = convertByteSizeToHumanReadable($reportFile['filesize']);
$image = new Imagick();

$image->pingImage(get_attached_file($reportFile['id']));
$numberOfPages = $image->getNumberImages();
$fileType = strtoupper($reportFile['subtype']);

$attachmentImage = wp_get_attachment_image($reportFile['id'], 'report');
$summary = get_field('summary');
// TODO we can probably remove a 'summary' field and just use the standard page content field instead

$postTypeName = $post->post_type;
$postType = get_post_type_object($postTypeName);
?>

<div class="content">

    <div <?php post_class( 'post single' ); ?>>

        <div class="post-header section">

            <div class="post-header-inner section-inner">

                <?php the_title( '<h2 class="post-title">', '</h2>' ); ?>

            </div>

        </div>

        <article class="section-inner report">

            <div class="report report--annual">

                <div class="report__icon-section">
                    <a href="<?= $downloadUrl ?>" class="report__icon"><?= $attachmentImage; ?></a>
                    <div class="report__meta">
                        <p><a href="<?= $downloadUrl ?>"><?= $userFriendlyFileName; ?></a></p>
                        <p><?= $fileType ?>, <?= $fileSize ?>, <?= $numberOfPages ?> pages</p>
                        <p><a href="/contact/">Contact us</a> if you need this in another publication format.</p>
                    </div>
                </div>

                <div class="report__text">
                    <h2 class="report__title">Overview</h2>
                    <?php the_content() ?>
                    <p>Find more <a href="/<?= $postTypeName ?>"><?= $postType->label ?></a></p>
                </div>

            </div>

        </article>

    </div>

</div>

<?php get_footer(); ?>
