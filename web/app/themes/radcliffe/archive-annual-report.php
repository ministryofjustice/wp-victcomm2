<?php

$templateData = [
    'archive-text' => ($archiveText    = get_field('annual_report_archive_text',    'option')) ?  $archiveText    : '',
    'summary'      => ($archiveSummary = get_field('annual_report_archive_summary', 'option')) ?  $archiveSummary : '',
];

echo template($templateData, 'report-archive');
