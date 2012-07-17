<?php
/**
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>
<!--[if HTML5]><![endif]-->
<!doctype html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9">

<![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9">
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9">

<![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->

<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<!--[if !HTML5]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
		
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			wp_title( '|', true, 'right' );
		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		
		//examples for including scripts. Actual code goes below wp_head();
			// wp_enqueue_script( 'jquery' );
			// 		wp_enqueue_script( 'jquery-ui-core' );
			// 		wp_enqueue_script( 'jquery-ui-tabs' );
			// 		wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/js/scrollTo.js', array('jquery'));
		
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
		<header role="banner">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">	<div class="logo">
						<img src="<?php echo get_bloginfo('stylesheet_directory')?>/images/logo-v1.jpg">

						<h1><?php bloginfo( 'name' ); ?></h1>
						</div></a><!-- logo -->
			<p class="accessibility"><?php bloginfo( 'description' ); ?></p>
		</header>
		<nav id="access" role="navigation">
		  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
			<a id="skip" href="#content" title="<?php esc_attr_e( 'Skip to content', 'boilerplate' ); ?>"><?php _e( 'Skip to content', 'boilerplate' ); ?></a>
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
		<section id="content" role="main">
