

<div id="all-library-features">

<?php
			
			
	$new = new WP_Query('post_type=duke_featured_posts');

	while ($new->have_posts()) : $new->the_post();
	
	//strip paragraph tags		
	$myExcerpt = get_the_excerpt();
	$tags = array("<p>", "</p>");
	$myExcerpt = str_replace($tags, "", $myExcerpt);
	$myThumbnail = get_the_post_thumbnail($id, medium);

?>

	<div class="feature-archive">
	
	<h3><a href="<?php echo $myExcerpt; ?>"><?php the_title(); ?></a></h3>
	
		<div class="feature-archive-thumbnail">
			<a href="<?php echo $myExcerpt; ?>"><?php echo $myThumbnail; ?></a>
		</div>
		
		<div class="feature-archive-content">
			<?php echo get_the_date(); ?>
			<?php the_content(); ?>
		</div>	
	
	</div>
	
	<br clear="all" />

		
	
<?php

	endwhile;
	
?>

</div>