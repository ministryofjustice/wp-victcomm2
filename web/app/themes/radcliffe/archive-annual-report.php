<?php

($archiveText = get_field('annual_report_archive_text', 'option')) ?  $archiveText : '';

$templateData = [
    'archive-text' => $archiveText
];

echo template($templateData, 'report-archive');
