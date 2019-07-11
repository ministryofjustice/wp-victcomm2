<?php

$templateData = [
    'archive-text' => ($archiveText = get_field('publications_archive_text', 'option')) ? $archiveText : '',
    'summary' => ($archiveSummary = get_field('publications_archive_summary', 'option')) ? $archiveSummary : '',
    'date-format' => get_option('date_format'),
    'archive-outro-text' => ($archiveOutroText = get_field('publications_archive_outro_text', 'option')) ? $archiveOutroText : '',
];

echo template($templateData, 'report-archive');
