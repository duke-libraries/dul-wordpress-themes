<div id="home-rss-feed" >

<h3>Recent Library News</h3>


<?php
       ini_set("default_socket_timeout","05");
       set_time_limit(5);
       $f=fopen("https://radiant-savannah-1223.herokuapp.com/users/1/web_requests/43/dukedukeduke.xml","r");
       $r=fread($f,1000);
       fclose($f);
       if(strlen($r)>1) {

				require_once("rsslib.php");
 				//$url = "http://pipes.yahoo.com/pipes/pipe.run?_id=f6b5c203baae6e4a1f20de6d306f702e&_render=rss";
 				$url = "https://radiant-savannah-1223.herokuapp.com/users/1/web_requests/43/dukedukeduke.xml";
 				echo RSS_Display($url, 10, true, false);

			 }
       else {

				echo '<ul><li><em>There was a problem retrieving the feed.</em></li></ul>';

			 }

?>


<p><a href="all-library-news/">Read more news &raquo;</a></p>

</div>
