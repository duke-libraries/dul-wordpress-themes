<?php

// Use local IE stylesheet

// remove ie css from twentyfourteen theme
function dulnews2015_dequeue_styles() {
	wp_dequeue_style( 'twentyfourteen-ie' );
}

add_action( 'wp_enqueue_scripts', 'dulnews2015_dequeue_styles', 11 );

//add new from child theme

wp_enqueue_style( 'dulnews2015-ie', get_stylesheet_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style' ), '1.0' );

// broken in 4.4?
//$wp_styles->add_data( 'dulnews2015-ie', 'conditional', 'lt IE 9' );




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






// add images to rss feed
function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '' . get_the_post_thumbnail( $post->ID, 'rss-thumb', array( 'style' => '' ) ) . '' . $content;
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





// Create custom post type

add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {

	register_post_type( 'duke_featured_posts',

		array(

			'labels' => array(

				'name' => __( 'Featured Posts' ),

				'singular_name' => __( 'Featured Post' )

			),

			'public' => true,

			'menu_position' => 5,

			'hierarchical' => true,

			'query_var' => true,

			'supports' => array( 'title', 'custom-fields', 'excerpt', 'editor', 'thumbnail' ),

		)
	);


	register_post_type( 'duke_exhibits',

		array(

			'labels' => array(

				'name' => __( 'Library Exhibits' ),

				'singular_name' => __( 'Library Exhibit' )

			),

			'public' => true,

			'menu_position' => 5,

			'hierarchical' => true,

			'query_var' => true,

			'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail' ),

		)
	);


	register_post_type( 'duke_blogs',

		array(

			'labels' => array(

				'name' => __( 'Library Blogs' ),

				'singular_name' => __( 'Library Blogs' )

			),

			'public' => true,

			'menu_position' => 5,

			'hierarchical' => true,

			'query_var' => true,

			'supports' => array( 'title', 'excerpt', 'thumbnail' ),

		)
	);

}

?>
