<?php
global $vcTemplateData;
global $placeholderCounter;

$td = $vcTemplateData;
?>
<div class="latest-news-item">

    <div class="latest-news-item__left">

        <a href="<?= $td['permalink']; ?>"><?= getThumbnail($placeholderCounter) ?></a>

    </div>

    <div class="latest-news-item__right">

        <div class="list-item-meta">

            <div class="list-item-meta__type"><a class="list-item-meta__type-link" href="<?= $td['archive-link'] ?>">news</a>
            </div>

            <?php if (isset($td['date'])) : ?>
                <div class="list-item-meta__divider">|</div>
                <div class="list-item-meta__date"><?= $td['date']; ?></div>

            <?php endif; ?>

        </div>

        <h3 class="latest-news-item__title"><a href="<?= $td['permalink']; ?>"><?= $td['title']; ?></a></h3>

        <?php if ($the_excerpt = $td['excerpt']) : ?>
            <div class="latest-news-item__excerpt"><?= $the_excerpt ?></div>

        <?php endif; ?>

    </div>

</div>
