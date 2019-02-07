<?php
global $vcTemplateData;

$td = $vcTemplateData;
?>
<div class="search-result section-inner">

    <div class="list-item-meta">

        <div class="list-item-meta__type"><?= $td['post-type-name'] ?></div>

        <?php if (isset($td['date-format'])) : ?>

            <div class="list-item-meta__divider">|</div>
            <div class="list-item-meta__date"> <?= get_the_date($td['date-format']); ?></div>

        <?php endif; ?>

    </div>

    <h2 class="search-result__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <?php if ($the_excerpt = get_the_excerpt() ) : ?>

        <div class="search-result__excerpt"><?= $the_excerpt?></div>

    <?php endif; ?>

</div>
