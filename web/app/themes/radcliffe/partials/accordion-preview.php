<?php
global $vcTemplateData;

$td = $vcTemplateData;

$permaLink = get_permalink($td['post-id']);

$number = 1;

?>

<ol class="accordion-with-icons accordion-with-icons--preview">

    <?php foreach ($td['accordion-with-icon'] as $accordion) :
        $fullLink = $permaLink;
        $fullLink .= "?accordion-section=" . urlencode($accordion['title']);
        $fullLink .= '#' . urlencode($accordion['title']);
        ?>
    <li class="accordion-with-icons__item">
        <a href="<?= $fullLink ?>" class="accordion-with-icons__item-summary-container">
            <div class="accordion-with-icons__item-icon"><?= wp_get_attachment_image($accordion['icon']['id'], 'accordion-icon-small') ?></div>
            <h3 class="accordion-with-icons__item-title"><span><?= $number++ . '. ' . $accordion['title'] ?></span></h3>
        </a>
    </li>

    <?php endforeach; ?>

</ol>
