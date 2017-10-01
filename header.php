<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="width=device-width">
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header" id="main-header">

			<?php
			the_custom_logo();
			?>
			<span class="site-name"><?php bloginfo('name'); ?></span>

		<nav class="navigation">
		<button class="nav-toggler"></button>
			<?php
		   /**
			* Displays a navigation menu
			* @param array $args Arguments
			*/
			$args = array(
				'theme_location' => 'header-menu',
				);
			
			wp_nav_menu( $args );
			?>
		</nav>
	</header>