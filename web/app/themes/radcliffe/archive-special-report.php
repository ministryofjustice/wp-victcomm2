<?php

$templateData = [
    'archive-text' => ($archiveText    = get_field('special_report_archive_text',    'option')) ?  $archiveText    : '',
    'summary'      => ($archiveSummary = get_field('special_report_archive_summary', 'option')) ?  $archiveSummary : '',
];

echo template($templateData, 'report-archive');
