<?php
get_header();
global $td;
?>

<main class="content" id="maincontent">

    <div <?php post_class('post single'); ?>>

        <div class="post-header section">

            <div class="post-header-inner section-inner thin">

                <?php if (isset($td['postDate']) && $td['postDate']) : ?>
                    <p class="post-date"><?= $td['postDate'] ?></p>

                <?php endif; ?>

                <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

                <?php if ($td['pageSummary']) : ?>
                    <p class="post-summary"><?= $td['pageSummary'] ?></p>

                <?php endif; ?>

            </div>

        </div>

        <article class="section-inner report thin">

            <div class="post-content report report--annual">
                <div class="report__left">
                    <div class="report__icon-section">

                        <a href="<?= $td['downloadUrl'] ?>" class="report__icon">
                            <?= $td['attachmentImage']; ?>
                            <span><?= $td['userFriendlyFileName']; ?></span>
                        </a>
                        <div class="report__meta">
                            <p><?= $td['fileType'] ?>, <?= $td['fileSize'] ?>, <?= $td['numberOfPages'] ?> pages</p>
                            <p><a href="/contact/">Contact us</a> if you need this publication in another format.</p>
                        </div>

                    </div>
                </div>

                <div class="report__text">
                    <h2 class="report__title">Overview</h2>
                    <?php the_content() ?>

                    <p>
                        <?= partial($td, 'find-more'); ?>
                    </p>

                </div>

            </div>

        </article>

    </div>

</main>

<?php get_footer(); ?>
