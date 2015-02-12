<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		twentyfourteen_post_thumbnail();
		the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	?>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
		
		
		
		<?php
		
		// Loads include for news archive
		if(is_page(40)):
					
			
			include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/all_library_news.php');
							
					
		endif;
		
		
		// Loads include for features archive
		if(is_page(90)):
					
					
			include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/all_library_features.php');
							
					
		endif;
		
		
		// Loads include for search results
		if(is_page(178)):
					
			include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/google_search_results.php');
							
					
		endif;
		
		
		// Loads include for events
		if(is_page(187)):
					
			include (ABSPATH. '/wp-content/themes/dul-news-2015/includes/all_library_events.php');
							
					
		endif;
		
		
		
		
		?>
		
		
	</div><!-- .entry-content -->
</article><!-- #post-## -->
