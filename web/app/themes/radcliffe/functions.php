<?php

/* ---------------------------------------------------------------------------------------------
   THEME UTILITY FUNCTIONS
   --------------------------------------------------------------------------------------------- */

function getCommonExcerptLength()
{
    return 30;
}

function getCustomPostTypesArray()
{
    return ['annual-reports', 'published-reviews', 'newsletters', 'publications', 'news', 'meeting-notes', 'policies'];
}

function getPublicationPostTypesArray()
{
    return ['annual-reports', 'published-reviews', 'newsletters', 'publications'];
}

function getPostTypesWithFeaturedImage()
{
    return ['post', 'news'];
}

require get_template_directory() . '/inc/setup.php';

require get_template_directory() . '/inc/general.php';

require get_template_directory() . '/inc/gutenberg.php';

require get_template_directory() . '/inc/acf-options.php';

require get_template_directory() . '/inc/media.php';

/* ---------------------------------------------------------------------------------------------
   SHORTCODES
   --------------------------------------------------------------------------------------------- */

require get_template_directory() . '/inc/sc/accordion-preview.php';
require get_template_directory() . '/inc/sc/latest-news.php';
