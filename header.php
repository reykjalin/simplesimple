<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SimpleSimple
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site aligncenter contentwidth">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'simplesimple' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			// the_custom_logo();
			// if ( is_front_page() && is_home() ) :
				?>
				<!-- <h1 class="site-title aligncentertext"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->
				<?php
			// else :
				?>
				<!-- <p class="site-title aligncentertext"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p> -->
				<?php
			// endif;
			// $simplesimple_description = get_bloginfo( 'description', 'display' );
			// if ( $simplesimple_description || is_customize_preview() ) :
				?>
				<!-- <p class="site-description"><?php echo $simplesimple_description; /* WPCS: xss ok. */ ?></p> -->
			<?php // endif; ?>
		</div><!-- .site-branding -->

		<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a class="navbar-item" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
					<?php
						if ( get_theme_mod( 'custom_logo' ) ) {
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$custom_logo_attr = array(
								'class' => 'custom-logo',
								'width' => 112,
								'height' => 28,
							);
							$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
							if ( empty( $image_alt ) ) {
								$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
							}
							echo wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr );
						} else {
							bloginfo( 'name' );
						}
					?>
				</a>

				<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
					<span aria-hidden="true" ></span>
					<span aria-hidden="true" ></span>
					<span aria-hidden="true" ></span>
				</a>
			</div>
			<div class="navbar-menu" id="navMenu">
				<?php
					$patterns = array(
						'/<li .*><a/',
						'/<\/li>/',
					);
					$replacements = array(
						'<a class="navbar-item"',
						'',
					);
					echo preg_replace( $patterns, $replacements, wp_nav_menu( array(
						'echo' => false,
						'container' => 'div',
						'container_class' => 'navbar-start',
						'theme_location' => 'menu-1',
						'items_wrap' => '%3$s',
					) ) );
				?>

				<div class="navbar-end"></div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<section id="content" class="site-content section">