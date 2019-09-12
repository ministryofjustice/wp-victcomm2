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

//Remove JS and CSS types
add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'", 'type="text/css"', "type='text/css'" ), '', $buffer );

        return $buffer;
    });
});

/* ---------------------------------------------------------------------------------------------
   SHORTCODES
   --------------------------------------------------------------------------------------------- */

require get_template_directory() . '/inc/sc/accordion-preview.php';
require get_template_directory() . '/inc/sc/latest-news.php';
