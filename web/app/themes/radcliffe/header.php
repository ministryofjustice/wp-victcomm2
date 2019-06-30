<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<a href="#maincontent" class="maincontent">Skip to main content</a>
<div class="header-search-block section hidden">

    <div class="section-inner">

        <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label class='search-term-input-label' for="s">Search for: </label>
            <input type="search" placeholder="enter search term" name="s" id="s" class="search-term-input"/>
        </form>

    </div>

</div>

<header class="header">

    <div class="header-inner section-inner">

        <div class="blog-title">
            <a href="<?php echo esc_url(home_url()); ?>"
               title="<?php echo esc_attr(get_bloginfo('description')); ?> -- Homepage"
               rel="home">
                <div class='vc-logo'></div>
                <?php echo esc_attr(get_bloginfo('title')); ?>
            </a>
        </div>

        <div role="button" class="nav-toggle">

            <nav aria-label="mobile-menu-extended"><?php _e('Menu', 'radcliffe'); ?></nav>

            <div class="bars">

                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>

                <div class="clear"></div>

            </div>

        </div>
        <nav aria-label="main-menu">
            <ul class="main-menu fright">
                <?php if (has_nav_menu('primary')) {
                    $menu_args = array(
                        'container' => '',
                        'items_wrap' => '%3$s',
                        'theme_location' => 'primary'
                    );

                    wp_nav_menu($menu_args);

                } else {
                    $list_pages_args = array(
                        'container' => '',
                        'title_li' => ''
                    );

                    wp_list_pages($list_pages_args);

                } ?>
            </ul>
        </nav>
        <a href="#" role="button" class="search-toggle tooltip" data-tip="Search&nbsp;site"></a>

        <div class="clear"></div>

    </div><!-- .header -->

</header><!-- .header.section -->

<nav aria-label="mobile-navigation" class="mobile-menu-container hidden">

    <ul class="mobile-menu">

        <?php if (has_nav_menu('primary')) {
            wp_nav_menu($menu_args);

        } else {
            wp_list_pages($list_pages_args);

        } ?>

    </ul>

    <form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
        <label class="search-term-input-label" for="s">Search for: </label>
        <input type="search" placeholder="<?php _e('enter search term', 'radcliffe'); ?>" name="s" id="s"
               class="search-term-input"/>
        <input type="submit" value="<?php _e('Search', 'radcliffe'); ?>" class="search-button">
    </form>

</nav><!-- .mobile-menu-container -->
<!--  <main id="maincontent">  -->
