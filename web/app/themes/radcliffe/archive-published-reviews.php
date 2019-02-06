<?php

$templateData = [
    'archive-text' => ($archiveText    = get_field('published_reviews_archive_text',    'option')) ?  $archiveText    : '',
    'summary'      => ($archiveSummary = get_field('published_reviews_archive_summary', 'option')) ?  $archiveSummary : '',
    'date-format'  => "j F Y",
];

echo template($templateData, 'report-archive');
