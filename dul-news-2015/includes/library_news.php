<div id="home-rss-feed" > 

<h3>Recent Library News</h3>

<?php
	
	require_once("rsslib.php");
	$url = "http://pipes.yahoo.com/pipes/pipe.run?_id=f6b5c203baae6e4a1f20de6d306f702e&_render=rss";

	//echo RSS_Display($url, 15, false, false);
	
	echo RSS_Display($url, 10, true, false);
	
?>

<p><a href="all-library-news/">Read more news &raquo;</a></p>

</div>
