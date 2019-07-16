<?php
add_shortcode('latest_news', function ($atts) {

    $output = '';
    $commonDateFormat = get_option('date_format');
    $postsPerPage = (isset($atts['amount'])) ? $atts['amount'] : 3;
    $the_query = new WP_Query([
        'posts_per_page' => $postsPerPage,
        'post_type' => ['news'],
    ]);

    if ($the_query->have_posts()) {
        $archiveLink = get_post_type_archive_link('news');

        while ($the_query->have_posts()) {
            $the_query->the_post();

            $output .= partial([
                'permalink' => get_the_permalink(),
                'title' => get_the_title(),
                'date' => get_the_date($commonDateFormat),
                'excerpt' => ($excerpt = get_field('summary')) ? $excerpt : wp_trim_words(get_the_excerpt(), 20),
                'archive-link' => $archiveLink,

            ], 'latest-news');
        }

        wp_reset_postdata();

    } else {
        $output = '<p>No news posts found</p>';

    }

    return $output;

});
