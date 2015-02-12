<div id="library_events">

<h3>Upcoming Library Events <a href="http://pipes.yahoo.com/pipes/pipe.run?_id=ac21083f6c5f6cffe161261333298d7b&_render=rss" title="RSS feed of all upcoming library events"><img alt="rss" src="http://library.duke.edu/imgs/common/icons/feed-icon-16x16.gif" style="border: medium none" /></a></h3>

<?php // Get RSS Feed(s)

date_default_timezone_set('America/New_York');

include_once(ABSPATH . WPINC . '/feed.php');

// Get a SimplePie feed object from the specified feed source.
//$rss = fetch_feed('http://pipes.yahoo.com/pipes/pipe.run?_id=5a028442018fc915b9efdebd3fd85724&_render=rss');
//$rss = fetch_feed('http://pipes.yahoo.com/pipes/pipe.run?_id=1555a16299fce777e77bc3d5f9941181&_render=rss');


// this one used to work, but isn't rendering on the page correctly? (as of 12/6/2012)
$rss = fetch_feed('http://pipes.yahoo.com/pipes/pipe.run?_id=a4b573af3dddcd18fc53354bb62123d7&_render=rss'); 
//change with duke calendar syntax?


// this feed seems to insert items without dates - don't use it!
//$rss = fetch_feed('http://pipes.yahoo.com/pipes/pipe.run?_id=1472f9c8d16c9613d25994eafdc7b372&_render=rss');

// seems broken as of 9/5/2013? Was working fine for a long time...
//$rss = fetch_feed('http://pipes.yahoo.com/pipes/pipe.run?_id=1555a16299fce777e77bc3d5f9941181&_render=rss');



//$rss->enable_order_by_date(true);
$rss->enable_order_by_date(false);

if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 

    $maxitems = $rss->get_item_quantity(); 

    // Build an array of all the items, starting with element 0 (first element).
    	
	$rss_items = $rss->get_items(0, $maxitems); 
	
endif;
?>

<?php 

	function myTruncate($string, $limit, $break=".", $pad="...") {
			// return with no change if string is shorter than $limit
			if(strlen($string) <= $limit) return $string;
			
			// is $break present between $limit and the end of the string?
				if(false !== ($breakpoint = strpos($string, $break, $limit))) {
				if($breakpoint < strlen($string) - 1) {
				$string = substr($string, 0, $breakpoint) . $pad;
				}
			}
			return $string;
		}
		
?>

<ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
    <?php 
	
	if ($maxitems == 0) echo '<li>No items.</li>';
    
	else
    
	// Loop through each feed item and display each item as a hyperlink.
    foreach ( $rss_items as $item ) : 
	
	?>
	
		<?php 	
		
			// limit to 60 characters
			
			$myTitle = esc_html( $item->get_title() );
			
			$myShortTitle = myTruncate($myTitle, 50, " ");
			
		?>
	
    <li>
        <a href='<?php echo esc_url( $item->get_permalink() ); ?>' title='<?php echo $myTitle; ?>'><?php echo $myShortTitle; ?></a>
		<span class="rssdate"><?php echo $item->get_date('l, F j, g:i A'); ?></span> 
    </li>
	
    <?php endforeach; ?>
	
</ul>

<div class="viewall"><a href="all-library-events/" class="all_events">View All Events &raquo;</a></div>

</div>
	
	