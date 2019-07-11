<?php

$templateData = [
    'archive-text' => ($archiveText    = get_field('annual_reports_archive_text', 'option')) ?  $archiveText    : '',
    'summary'      => ($archiveSummary = get_field('annual_reports_archive_summary', 'option')) ?  $archiveSummary : '',
    'archive-outro-text' => ($archiveOutroText    = get_field('annual_reports_archive_outro_text', 'option')) ?  $archiveOutroText    : '',
];

echo template($templateData, 'report-archive');
