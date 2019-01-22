<?php

get_header();

global $td;

?>

<div class="content">

    <div <?php post_class( 'post single' ); ?>>

        <div class="post-header section">

            <div class="post-header-inner section-inner">

                <?php the_title( '<h2 class="post-title">', '</h2>' ); ?>

                <?php if($td['pageSummary']) : ?>

                    <p class="post-summary"><?= $td['pageSummary'] ?></p>

                <?php endif; ?>

            </div>

        </div>

        <article class="section-inner report">

            <div class="report report--annual">

                <div class="report__icon-section">
                    <a href="<?= $td['downloadUrl'] ?>" class="report__icon"><?= $td['attachmentImage']; ?></a>
                    <div class="report__meta">
                        <p><a href="<?= $td['downloadUrl'] ?>"><?= $td['userFriendlyFileName']; ?></a></p>
                        <p><?= $td['fileType'] ?>, <?= $td['fileSize'] ?>, <?= $td['numberOfPages'] ?> pages</p>
                        <p><a href="/contact/">Contact us</a> if you need this in another publication format.</p>
                    </div>
                </div>

                <div class="report__text">
                    <h2 class="report__title">Overview</h2>
                    <?php the_content() ?>
                    <p>Find more <a href="/<?= $td['postTypeName'] ?>"><?= $td['postType']->label ?></a></p>
                </div>

            </div>

        </article>

    </div>

</div>

<?php get_footer(); ?>
