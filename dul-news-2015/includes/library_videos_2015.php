<?php

//require_once('simplepie_video.inc');

// no longer supported (api v2)
// https://www.youtube.com/rss/user/DukeUnivLibraries/videos.rss


//https://www.youtube.com/feeds/videos.xml?channel_id=UCV_WWtC0T_8uPMhYasKyPiQ

//https://www.youtube.com/feeds/videos.xml?user=DukeUnivLibraries

$feed = new SimplePie();
$feed->set_feed_url('https://www.youtube.com/feeds/videos.xml?channel_id=UCV_WWtC0T_8uPMhYasKyPiQ');

// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
?>



<div id="library-videos-block">

	<ul>
 
	<?php
	foreach ($feed->get_items(0, 5) as $item):
	
	$videoID = str_replace("http://www.youtube.com/watch?v=", "", $item->get_permalink()); 
	
	?>
	
		<li>
		<div class="thumbnail"><a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="<?php echo $item->get_title(); ?>"><img src="<?php echo 'https://i.ytimg.com/vi/' . $videoID . '/default.jpg'; ?>" width="120" height="90" alt="<?php echo $item->get_title(); ?></a>" border="0" /></a></div>
		<div class="title"><a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="<?php echo $item->get_title(); ?>"><?php echo $item->get_title(); ?></a></div>
		</li>
 
	<?php endforeach; ?>
	

	<li>
	
		
		<div class="duke-title"><strong>Duke University Libraries on YouTube</strong></div>
		
		<br />
		
		<div class="button"><a href="https://www.youtube.com/user/DukeUnivLibraries" target="_blank">See More Videos &raquo;</a></div>
	
	</li>


	</ul>
	
</div>

