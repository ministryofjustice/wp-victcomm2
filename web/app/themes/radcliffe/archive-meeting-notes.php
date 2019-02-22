<?php

$templateData = [
    'summary'            => ($archiveSummary   = get_field('meeting_notes_archive_summary',   'option')) ?  $archiveSummary   : '',
    'archive-text'       => ($archiveText      = get_field('meeting_notes_archive_text',      'option')) ?  $archiveText      : '',
    'archive-outro-text' => ($archiveOutroText = get_field('meeting_notes_archive_outro_text','option')) ?  $archiveOutroText : '',
    'date-format'        => get_option( 'date_format' ),
];

echo template($templateData, 'report-archive');
