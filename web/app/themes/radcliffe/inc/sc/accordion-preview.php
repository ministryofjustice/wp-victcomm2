<?php
add_shortcode('accordion-preview', function ($atts) {

    return partial([
        'post-id' => $atts['post-id'],
        'accordion-with-icon' => get_field('icon_accordion', $atts['post-id'])
    ], 'accordion-preview');
});
