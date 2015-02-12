<div id="feature-slideshow-wrapper">

	<div id="feature-slideshow" class="cycle-slideshow" 
    data-cycle-fx="fade" 
    data-cycle-manual-fx="fade"
    data-cycle-manual-speed="500" 
    data-cycle-swipe=true 
    data-cycle-swipe-fx="scrollHorz" 
    data-cycle-timeout="7000" 
    data-cycle-slides="> div" 
    data-cycle-pager="#feature-nav" 
    data-pause-on-hover="true" 
    >
	
	<?php
		
		$i = 1;
		
		
		// Get Page Name
		$thePost = $wp_query->get_queried_object();
		$PageName = $thePost->post_name;
		$thePageName = (string)$PageName;
		$thePageName = ucwords(str_replace("-", " ", $thePageName));
		
		
		$new = new WP_Query('post_type=magazine_features');

		while ($new->have_posts() && $i < 10) : $new->the_post();
		
		//strip paragraph tags		
		$myExcerpt = get_the_excerpt();
		$tags = array("<p>", "</p>");
		$myExcerpt = str_replace($tags, "", $myExcerpt);
		
		// get thumb URL path
		$extraThumb = get_the_post_thumbnail( $post->ID, 'thumbnail' );
		$extraThumbPath = substr($extraThumb, 35);
		$extraThumbPath = substr($extraThumbPath, 0, strpos($extraThumbPath, '-150x150.jpg'));
		
		$slugArray = get_post_custom_values( 'slug' );
		$theSlug = $slugArray[0];
	?>
	
					
		<div class="feature-item" data-cycle-pager-template="<div class='slug'><a href=#><?php echo $theSlug; ?></a></div>">
			
			<a href="<?php echo $myExcerpt; ?>">
			
			<div class="title_text_bg">
				<h1><?php echo $thePageName; ?></h1>
			</div>
			
			<div class="feature_image"><img src="<?php echo $extraThumbPath . '.jpg'; ?>"></div>
			
			<div class="feature_text_bg">
				<h2><?php the_title(); ?></h2>
				<?php //the_content(); ?>
			</div>
			</a>
		</div>
			
		
	<?php
	
		$i++;
	
		endwhile;
		
	?>
	
	</div>
	
	<div id="feature-nav"></div>
	
</div>