<?php
global $vcTemplateData;

$td = $vcTemplateData;

$permaLink = get_permalink($td['post-id']);

?>

<div class="accordion-with-icons accordion-with-icons--preview">

    <?php foreach ($td['accordion-with-icon'] as $accordion) :
        $fullLink = $permaLink;
        $fullLink .= "?accordion-section=" . urlencode($accordion['title']);
        $fullLink .= '#' . urlencode($accordion['title']);
        ?>

        <div class="accordion-with-icons__item">

            <summary class="accordion-with-icons__item-summary">

                <a href="<?= $fullLink ?>" class="accordion-with-icons__item-summary-container">

                    <div class="accordion-with-icons__item-icon"><?= wp_get_attachment_image($accordion['icon']['id'], 'accordion-icon-small') ?></div>

                    <h3 class="accordion-with-icons__item-title"><?= $accordion['title'] ?></h3>

                </a>

            </summary>

        </div>

    <?php endforeach; ?>

</div>
