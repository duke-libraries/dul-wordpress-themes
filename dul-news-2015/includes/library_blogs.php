
<div id="blogs">


	<div class="blogthumb">

		<?php
		//get random blog
		$query2 = new WP_Query( array ( 'post_type' => 'duke_blogs' , 'orderby' => 'rand' , 'showposts' => 1 ) );

		while ($query2->have_posts()) : $query2->the_post();

		//strip paragraph tags
		$myExcerpt = get_the_excerpt();
		$tags = array("<p>", "</p>");
		$myExcerpt = str_replace($tags, "", $myExcerpt);

		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );

		?>

		<a href="<?php echo $myExcerpt; ?>" title="<?php the_title(); ?>">
		 <img src="<?php echo $thumbnail_src[0]; ?>" alt="blog image" />
		</a>

		<?php endwhile; ?>

	</div>


	<div class="blogcontent">

		<h3>Browse Our Other Blogs</h3>


		<label for="blog-dropdown" class="blogs-select">
			<p>Browse our 14 distinct library blogs at Duke University...</p>
		</label>

		<select name="blog-dropdown" id="blog-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> <option value="">Select a Blog</option>




			<?php

			//// Problem noticed on 4/25/2012 - query isn't grabbing all blogs! Using manual list isntead...

				//get all blogs
				//$query1 = new WP_Query('post_type=duke_blogs');

				//// commented out query loop 4/25/2012
				//while ($query1->have_posts()) : $query1->the_post();

				//strip paragraph tags
				//$myExcerpt = get_the_excerpt();
				//$tags = array("<p>", "</p>");
				//$myExcerpt = str_replace($tags, "", $myExcerpt);


			?>

				<!---<option value='<?php //echo $myExcerpt; ?>'><?php //the_title(); ?></option>--->



			<?php

				//// commented out query loop 4/25/2012

				//$i++;

				//endwhile;

			?>

				<option value="https://blogs.library.duke.edu/bitstreams">Bitstreams: Notes from the Digital Projects Team</option>

				<option value="https://cit.duke.edu/blog/">Center for Instructional Technology</option>

				<option value="https://blogs.library.duke.edu/data/">Data and Visualization Services</option>

				<option value="https://blogs.library.duke.edu/rubenstein/">The Devils Tale</option>

				<option value="https://blogs.library.duke.edu/digital-collections/">Digital Collections</option>

				<option value="https://blogs.library.duke.edu/dcthree/">Duke Collaboratory for Classics Computing</option>

				<option value="http://archives.mc.duke.edu/blog">Duke Medical Center Archives Blog</option>

				<option value="http://sites.fuqua.duke.edu/fordlibrary/">Fuqua School Ford Library</option>

				<option value="http://dukelawref.blogspot.com/">The Goodson Blogson</option>

				<option value="https://blogs.library.duke.edu/answerperson/">Library Answer Person</option>

				<option value="https://blogs.library.duke.edu/all-posts/">Library News, Events, &amp; Exhibits</option>

				<option value="https://mclibrary.duke.edu/about/blog/">Medical Center Library</option>

				<option value="https://blogs.library.duke.edu/preservation/">Preservation Underground</option>

				<option value="https://blogs.library.duke.edu/scholcomm/">Scholarly Communications</option>


		</select>

	</div>


</div>
