<?php
global $vcTemplateData;
global $placeholderCounter;

$td = $vcTemplateData;
?>
<div class="latest-news-item">

    <div class="latest-news-item__left">

        <?= getThumbnail($placeholderCounter) ?>

    </div>

    <div class="latest-news-item__right">

        <div class="list-item-meta">

            <div class="list-item-meta__type"><?= $td['post-type-name'] ?></div>

            <?php if (isset($td['date-format'])) : ?>

                <div class="list-item-meta__divider">|</div>
                <div class="list-item-meta__date"> <?= get_the_date($td['date-format']); ?></div>

            <?php endif; ?>

        </div>

        <h2 class="latest-news-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    </div>

</div>
