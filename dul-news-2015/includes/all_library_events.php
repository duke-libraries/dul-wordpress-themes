<?php
//require_once('/php/simplepie.inc');

date_default_timezone_set('America/New_York');

require_once(ABSPATH . '/php/simplepie.inc');
 
// Set your own configuration options as you see fit.
$feed = new SimplePie();

$feed->set_feed_url('http://pipes.yahoo.com/pipes/pipe.run?_id=ac21083f6c5f6cffe161261333298d7b&_render=rss');

$feed->set_timeout(60);

//$feed->set_cache_duration(900);

$feed->enable_order_by_date(false);

$success = $feed->init();
 
// Make sure the page is being served with the right headers.
$feed->handle_content_type();
 
// Set our paging values
$start = (isset($_GET['start']) && !empty($_GET['start'])) ? $_GET['start'] : 0; // Where do we start?
$length = (isset($_GET['length']) && !empty($_GET['length'])) ? $_GET['length'] : 10; // How many per page?
$max = $feed->get_item_quantity(); // Where do we end?
 
// When we end our PHP block, we want to make sure our DOCTYPE is on the top line to make 
// sure that the browser snaps into Standards Mode.
?>


<div id="all-library-events">

<?php
	// If we have an error, display it.
	if ($feed->error())
	{
		echo '<div class="sp_errors">' . "\r\n";
		echo '<p>' . htmlspecialchars($feed->error()) . "</p>\r\n";
		echo '</div>' . "\r\n";
	}
	?>
	
	<?php
	// Let's do our paging controls
	$next = (int) $start + (int) $length;
	$prev = (int) $start - (int) $length;
 
	// Create the NEXT link
	$nextlink = '<a href="?start=' . $next . '&length=' . $length . '">Next &raquo;</a>';
	if ($next > $max)
	{
		$nextlink = 'Next &raquo;';
	}
 
	// Create the PREVIOUS link
	$prevlink = '<a href="?start=' . $prev . '&length=' . $length . '">&laquo; Previous</a>';
	if ($prev < 0 && (int) $start > 0)
	{
		$prevlink = '<a href="?start=0&length=' . $length . '">&laquo; Previous</a>';
	}
	else if ($prev < 0)
	{
		$prevlink = '&laquo; Previous';
	}
 
	// Normalize the numbering for humans
	$begin = (int) $start + 1;
	$end = ($next > $max) ? $max : $next;
	?>
	
	<p class="pagination">Showing <?php echo $begin; ?>&ndash;<?php echo $end; ?> out of <?php echo $max; ?> &nbsp; <?php echo $prevlink; ?> | <?php echo $nextlink; ?> </p>
 	
	<br />
	
	<?php if ($success): ?>
		<?php
		// get_items() will accept values from above.
		foreach($feed->get_items($start, $length) as $item):
			$feed = $item->get_feed();
		?>
		
		
			<?php
				
				$temp_url = $item->get_permalink();
					
					// 1
					if (strpos($temp_url, 'calendar.duke.edu') !== false) {
    					$theSource = "Public Event";
						$theSourceURL = "http://library.duke.edu/news/events.html";
						$theThumb = "public_event.jpg";
					}
					
					else {
    					$theSource = "For Duke Faculty, Staff & Students";
						$theSourceURL = "http://library.duke.edu/news/events.html";
						$theThumb = "duke_event.jpg";
					}
					
					
				$temp_description = $item->get_description();
				
				
									
			?>

			<div class="chunk">
				
				<h3><?php if ($item->get_permalink()) echo '<a href="' . $item->get_permalink() . '">'; echo $item->get_title(true); if ($item->get_permalink()) echo '</a>'; ?></h3>
				
				<p><?php echo $item->get_description() ?></p>
								
				<p class="footnote"><em><?php echo $theSource; ?> &mdash; <?php echo $item->get_date('F j, Y'); ?></em></p>
 				<br />
			</div>
 
		<?php endforeach; ?>
	<?php endif; ?>
 
				
	
 
	<p class="pagination">Showing <?php echo $begin; ?>&ndash;<?php echo $end; ?> out of <?php echo $max; ?> &nbsp; <?php echo $prevlink; ?> | <?php echo $nextlink; ?> </p>
	
	<!--- | <a href="<?php //echo '?start=' . $start . '&length=5'; ?>">5</a>, <a href="<?php //echo '?start=' . $start . '&length=10'; ?>">10</a>, or <a href="<?php //echo '?start=' . $start . '&length=20'; ?>">20</a> at a time.--->
	

</div>