<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">

		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div class="header-search-block section hidden">

			<div class="section-inner">

				<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label class='search-term-input-label' for="s">Search for: </label>
					<input type="search" placeholder="enter search term" name="s" id="s" class="search-term-input" />
				</form>

			</div>

		</div>

		<div class="header section light-padding">

			<div class="header-inner section-inner">

                <h1 class="blog-title">
                    <a href="<?php echo esc_url( home_url() ); ?>"
                       title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>"
                       rel="home">
                        <div alt="VC Logo" class='vc-logo'></div>
                        <?php echo esc_attr( get_bloginfo( 'title' ) ); ?>
                    </a>
                </h1>

				<div class="nav-toggle">

					<p><?php _e( 'Menu', 'radcliffe' ); ?></p>

					<div class="bars">

						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>

						<div class="clear"></div>

					</div>

				</div>

				<ul class="main-menu fright">

					<?php if ( has_nav_menu( 'primary' ) ) {

						$menu_args = array(
							'container' 		=> '',
							'items_wrap' 		=> '%3$s',
							'theme_location' 	=> 'primary'
						);

						wp_nav_menu( $menu_args );

					} else {

						$list_pages_args = array(
							'container' => '',
							'title_li' 	=> ''
						);

						wp_list_pages( $list_pages_args );

					} ?>



				 </ul>

                <a href="#" class="search-toggle" title="<?php _e( 'Show the search field', 'radcliffe' ); ?>"></a>

				<div class="clear"></div>

			</div><!-- .header -->

		</div><!-- .header.section -->

		<div class="mobile-menu-container hidden">

			<ul class="mobile-menu">

					<?php if ( has_nav_menu( 'primary' ) ) {

						wp_nav_menu( $menu_args );

					} else {

						wp_list_pages( $list_pages_args );

					} ?>

			 </ul>

			 <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                 <label class="search-term-input-label" for="s" >Search for: </label>
                 <input type="search" placeholder="<?php _e( 'enter search term', 'radcliffe' ); ?>" name="s" id="s" class="search-term-input" />
                 <input type="submit" value="<?php _e( 'Search', 'radcliffe' ); ?>" class="search-button">
			</form>

		</div><!-- .mobile-menu-container -->
