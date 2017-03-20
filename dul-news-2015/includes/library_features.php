<div id="feature-slideshow-wrapper">

	<div id="feature-slideshow" class="cycle-slideshow"
    data-cycle-fx="fade"
    data-cycle-timeout="7000"
    data-cycle-slides="> div"
    data-cycle-pager="#feature-nav"
    data-pause-on-hover="true"
    data-delay="5000"
    >

	<?php

		$i = 1;

		$new = new WP_Query('post_type=duke_featured_posts');

		while ($new->have_posts() && $i < 5) : $new->the_post();

		//strip paragraph tags
		$myExcerpt = get_the_excerpt();
		$tags = array("<p>", "</p>");
		$myExcerpt = str_replace($tags, "", $myExcerpt);

		// get thumb URL path
		$extraThumb = get_the_post_thumbnail( $post->ID, 'thumbnail' );
		$extraThumbPath = substr($extraThumb, 35);
		$extraThumbPath = substr($extraThumbPath, 0, strpos($extraThumbPath, '-150x150.jpg'));

	?>


		<div class="feature-item" data-cycle-pager-template="<div class='feature-thumb'><a href=#><?php echo "<img alt='feature image' src='" . $extraThumbPath . ".jpg'>"; ?></a></div>">

			<a href="<?php echo $myExcerpt; ?>">

			<div class="feature_image"><img src="<?php echo $extraThumbPath . '.jpg'; ?>" alt="feature image"></div>

			<div class="feature_text_bg">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			</a>
		</div>


	<?php

		$i++;

		endwhile;

	?>

	</div>

	<div id="feature-nav"></div>

	<div class="feature-archive-link"><p><a href="all-features/">View Features Archive &raquo;</a></p></div>

</div>
