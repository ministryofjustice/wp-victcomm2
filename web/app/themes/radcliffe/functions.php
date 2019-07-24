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

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

/* ---------------------------------------------------------------------------------------------
   Custom Dashboard Widget - Contact Us
   --------------------------------------------------------------------------------------------- */

function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Contact Us', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>In collaboration with the content providers, the MOJ "WordPress Gang" technically maintains this website.</p>
<p>Need help? Contact us by email: <a href="mailto:wordpress@digital.justice.gov.uk">wordpress@digital.justice.gov.uk</a> or on Slack: <a href="https://mojdt.slack.com/messages/CH5M67XQB/">wordpress-gang</a>.</p>';
}

/* ---------------------------------------------------------------------------------------------
   SHORTCODES
   --------------------------------------------------------------------------------------------- */

require get_template_directory() . '/inc/sc/accordion-preview.php';
require get_template_directory() . '/inc/sc/latest-news.php';
