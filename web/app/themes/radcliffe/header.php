<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<nav aria-label="Skip Links"><a href="#maincontent" class="maincontent skip-link">Skip to main content</a></nav>

<div class="header-search-block section hidden">

    <div class="section-inner">

        <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label class='search-term-input-label' for="s">Search this website for: </label>
            <input type="search" name="s" id="s" class="search-term-input no-focus"/>
            <input type="submit" value="Search" class="no-focus">
        </form>

    </div>

</div>

<header class="header">

    <div class="header-inner section-inner">

        <div class="blog-title">
            <a href="<?php echo esc_url(home_url()); ?>"
               title="Homepage - <?php echo esc_attr(get_bloginfo('description')); ?>"
               rel="home">
                <div class='vc-logo'></div>
                <?php echo esc_attr(get_bloginfo('title')); ?>
            </a>
        </div>

        <div role="button" class="nav-toggle" tabindex="0">

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
    
    <form method="get" class="search-form search2" action="<?php echo esc_url(home_url('/')); ?>">
        <label class="search-term-input-label no-focus" for="s">Search this website for: </label>
        <input type="search" name="s" id="s-mob" class="search-term-input no-focus"/>
        <input type="submit" value="<?php _e('Search', 'radcliffe'); ?>" class="search-button no-focus">
    </form>

</nav><!-- .mobile-menu-container -->
<!--  <main id="maincontent">  -->
