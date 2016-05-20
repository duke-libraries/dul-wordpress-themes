<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->

<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="//libcms.oit.duke.edu/sites/all/themes/madlib/favicon.ico" type="image/vnd.microsoft.icon" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>


	<?php

		if(is_front_page()):

			?>

		<!-- include Cycle2 -->
		<script src="/wp-content/themes/dul-news-2015/includes/jquery.cycle2.min.js"></script>

		<!-- include jcarousel -->
		<script type="text/javascript" src="/wp-content/themes/dul-news-2015/includes/jquery.jcarousel.min.js"></script>



		<!--- events scroller --->
		<script type="text/javascript">

		jQuery(document).ready(function() {
			jQuery('#mycarousel').jcarousel({
				vertical: true,
				scroll: 5
			});
		});

		</script>


			<?php

		endif;

			?>


	<!-- END imported... --->

<!--[if lt IE 9]>
<script src="/wp-content/themes/dul-news-2015/includes/respond.min.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>

	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>

		<div id="searchform" class="headersearch">
			<form action="/news-events-exhibits/search-results/" id="cse-search-box">
				<input type="hidden" name="cx" value="010520721692465143024:76gaailhxhm" />
				<input type="hidden" name="cof" value="FORID:10" />
				<input type="hidden" name="ie" value="UTF-8" />
				<input class="search-input" type="text" name="q" size="15" placeholder="search the blogs..." />
				<button class="search-submit" name="sa" value="Search" type="submit">Go</button>
			</form>
		</div>

		<div id="mobilesearch">
			<a href="/news-events-exhibits/search-results/">
			<img src="/wp-content/themes/dul-news-2015/images/search-icon.png" alt="">
			<p>Search</p>
			</a>
		</div>


	</div>

	<div id="library_logo"><a href="http://library.duke.edu" title="Duke University Libraries"><img src="/wp-content/themes/dul-news-2015/images/library_logo_transparent.png" alt="Duke University Libraries" border="0"></a></div>

	<?php endif; ?>

	<?php if ( has_nav_menu( 'primary' ) ) : ?>

		<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></button>
			<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav>

	<?php endif; ?>

	<div id="main" class="site-main">


	<!-- imported from old theme -->


	<?php

		// include featured posts rotation, RSS feeds news, and duke on demand to Home Page

		if(is_front_page()):

			echo '<div class="home-wrapper">';

				include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/library_features.php');

				include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/library_news.php');

				include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/library_exhibits.php');

				include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/library_events.php');

				include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/library_blogs.php');

				include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/library_promo.php');

				include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/library_videos_2015.php');


			echo '</div>';

		endif;

		?>


	<!-- END imported -->
