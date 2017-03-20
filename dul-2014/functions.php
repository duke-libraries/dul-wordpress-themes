<?php

// add images to rss feed
// http://webdesignzo.com/show-featured-images-in-rss-feed-feedburner/
function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '' . get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'style' => 'float:left; margin:0 15px 15px 0;' ) ) . '' . $content;
}
return $content;
}

add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');

// end of add images to rss feed


// ADD POST THUMBNAILS
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}


// fix to make iframes work
function blogs_tinymce_config( $init ) {
	$valid_iframe = 'iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]';
	if ( isset( $init['extended_valid_elements'] ) ) {
		$init['extended_valid_elements'] .= ',' . $valid_iframe;
	} else {
		$init['extended_valid_elements'] = $valid_iframe;
	}
	return $init;

}
add_filter('tiny_mce_before_init', 'blogs_tinymce_config');




// support coauthors!

if ( ! function_exists( 'twentyfourteen_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_posted_on() {

	// OLD FUNCTION

	//if ( is_sticky() && is_home() && ! is_paged() ) {
		//echo '<span class="featured-post">' . __( 'Sticky', 'twentyfourteen' ) . '</span>';
	//}

	// ++ Set up and print post meta information.
	//printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		//esc_url( get_permalink() ),
		//esc_attr( get_the_date( 'c' ) ),
		//esc_html( get_the_date() ),
		//esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		//get_the_author()
	//);


	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'twentyfourteen' ) . '</span>';
	}

	// Set up and print post meta information.
	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	// get the co-authors
	if ( function_exists( 'get_coauthors' ) ) {
		$authors = get_coauthors();
	}

	// Fallback to WP users
	if ( empty( $authors ) || ! is_array( $authors ) ) {
		$authors = array( get_userdata( get_the_author_meta( 'ID' ) ) );
	}

	foreach ( $authors as $author ) {
		$_args = apply_filters(
			'coauthors_posts_link',
			array( 'href' => get_author_posts_url( intval( $author->ID ), $author->user_nicename ) )
		);

		printf(
			'<span class="byline"><span class="author vcard"><a class="url fn n" href="%1$s" rel="author">%2$s</a></span></span>',
			esc_url( $_args['href'] ),
			esc_html( $author->display_name )
		);
	}

}
endif;

//fix alt text for sidebar thumbnails!
function add_alt_text( $attr, $attachment = null ) {

	$attr['alt'] = 'descriptive image';

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','add_alt_text', 10, 2
);


?>
