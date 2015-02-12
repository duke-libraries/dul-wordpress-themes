
	<div id="library_exhibits">
	
	<h3>Exhibits at the Library</h3>
		
		<div id="exhibit-slideshow" class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="0" data-cycle-carousel-visible="5" data-cycle-prev="#exhibit-prev" data-cycle-pager="#exhibit-pager" data-cycle-next="#exhibit-next" data-cycle-slides="> div">
		
		<?php
			
			$i = 1;
			
			$new = new WP_Query('post_type=duke_exhibits');
	
			while ($new->have_posts() && $i < 10) : $new->the_post();
			
			//strip paragraph tags		
			$myExcerpt = get_the_excerpt();
			$tags = array("<p>", "</p>");
			$myExcerpt = str_replace($tags, "", $myExcerpt);
			
		?>
							
			<div>
				
				<div class="item-thumb"><a href="<?php echo $myExcerpt; ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('exhibit-feature'); ?></a></div>
				
				<div class="item-content">
					<p><strong><a href="<?php echo $myExcerpt; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></strong></p>
					<?php the_content(); ?>
				</div>
				
			</div>
			
		<?php
		
			$i++;
		
			endwhile;
			
		?>
		
		</div>
		
		<div id="exhibit-nav-holder">
			
			<span id="exhibit-next"><a href="#"></a></span>
			
			<span id="exhibit-prev"><a href="#"></a></span>
			
			<div id="exhibit-pager"></div>
		
		</div>
		
		<div class="exhibits-link"><p><a href="http://library.duke.edu/exhibits/index.html">View all exhibits &raquo;</a></p></div>
	
	
	</div>
	
	