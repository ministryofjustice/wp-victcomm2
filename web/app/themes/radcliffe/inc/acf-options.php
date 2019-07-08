<?php
/**
 * Create ACF setting page under report menus
 */
if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
        'title' => 'Annual Reports Settings',
        'parent' => 'edit.php?post_type=annual-reports',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'title' => 'Published Reviews Settings',
        'parent' => 'edit.php?post_type=published-reviews',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'title' => 'News Settings',
        'parent' => 'edit.php?post_type=news',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'title' => 'Newletters Settings',
        'parent' => 'edit.php?post_type=newsletters',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'title' => 'Publications Settings',
        'parent' => 'edit.php?post_type=publications',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'title' => 'Meeting Notes Settings',
        'parent' => 'edit.php?post_type=meeting-notes',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'title' => 'Policy Settings',
        'parent' => 'edit.php?post_type=policies',
        'capability' => 'manage_options'
    ));
}
