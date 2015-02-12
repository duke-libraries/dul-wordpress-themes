<?php

//require_once('simplepie_video.inc');


$feed = new SimplePie();
$feed->set_feed_url('http://www.youtube.com/rss/user/DukeUnivLibraries/videos.rss');

// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
?>



<div id="library-videos-block">

	<ul>
 
	<?php
	foreach ($feed->get_items(0, 5) as $item):
	?>
	
		<li>
		<div class="thumbnail"><a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="<?php echo $item->get_title(); ?>"><img src="<?php echo 'http://i.ytimg.com/vi/' . substr($item->get_permalink(), 31, -26) . '/default.jpg'; ?>" width="120" height="90" alt="<?php echo $item->get_title(); ?></a>" border="0" /></a></div>
		<div class="title"><a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="<?php echo $item->get_title(); ?>"><?php echo $item->get_title(); ?></a></div>
		</li>
 
	<?php endforeach; ?>
	

	<li>
	
		
		<div class="title"><strong>Duke University Libraries</strong></div>
		
		<br />
		
		<div class="button"><a href="http://www.youtube.com/user/DukeUnivLibraries" target="_blank">See More</a></div>
	
	</li>


	</ul>
	
</div>

