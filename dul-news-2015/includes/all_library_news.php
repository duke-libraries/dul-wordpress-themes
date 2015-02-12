<?php
//require_once('/php/simplepie.inc');

require_once(ABSPATH . '/php/simplepie.inc');

// Set your own configuration options as you see fit.
$feed = new SimplePie();

$feed->set_feed_url('http://pipes.yahoo.com/pipes/pipe.run?_id=138310d89ca106612f47a37884f2bc28&_render=rss');

$feed->set_timeout(60);

$feed->set_cache_duration(900);

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


<div id="all-library-news">

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
					
					// news blog
					if (strpos($temp_url, 'blogs.library.duke.edu') !== false) {
    					$theSource = "News, Events, and Exhibits";
						$theSourceURL = "http://blogs.library.duke.edu/";
						$theThumb = "blog18.jpg";
					}
					
					// 1
					if (strpos($temp_url, 'cit.duke.edu') !== false) {
    					$theSource = "Center for Instructional Technology";
						$theSourceURL = "http://cit.duke.edu/blog/";
						$theThumb = "blog1.jpg";
					}
					
					// 2
					if (strpos($temp_url, 'blogs.library.duke.edu/data') !== false) {
    					$theSource = "Data & GIS";
						$theSourceURL = "http://blogs.library.duke.edu/data/";
						$theThumb = "blog2.jpg";
					}
					
					// 3
					if (strpos($temp_url, 'blogs.library.duke.edu/rubenstein') !== false) {
    					$theSource = "The Devil's Tale";
						$theSourceURL = "http://blogs.library.duke.edu/rubenstein/";
						$theThumb = "blog3.jpg";
					}
					
					// 4
					if (strpos($temp_url, 'blogs.library.duke.edu/digital-collections') !== false) {
    					$theSource = "Digital Collections";
						$theSourceURL = "http://blogs.library.duke.edu/digital-collections/";
						$theThumb = "blog4.jpg";
					}
					
					// 5
					if (strpos($temp_url, 'blogs.fuqua.duke.edu') !== false) {
    					$theSource = "Fuqua School of Business";
						$theSourceURL = "http://blogs.fuqua.duke.edu/";
						$theThumb = "blog5.jpg";
					}
					
					// 6
					if (strpos($temp_url, 'dukelawref.blogspot.com') !== false) {
    					$theSource = "The Goodson Blogson";
						$theSourceURL = "http://dukelawref.blogspot.com";
						$theThumb = "blog6.jpg";
					}
					
					// 7
					if (strpos($temp_url, 'blogs.library.duke.edu/humanities') !== false) {
    					$theSource = "Humanities@Duke University";
						$theSourceURL = "http://blogs.library.duke.edu/humanities/";
						$theThumb = "blog7.jpg";
					}
					
					// 8
					if (strpos($temp_url, 'blogs.library.duke.edu/ilab') !== false) {
    					$theSource = "Innovation Lab";
						$theSourceURL = "http://blogs.library.duke.edu/ilab/";
						$theThumb = "blog8.jpg";
					}
					
					// 9
					if (strpos($temp_url, 'blogs.library.duke.edu/dukelibrariesinstruction') !== false) {
    					$theSource = "Instruction & Outreach";
						$theSourceURL = "http://blogs.library.duke.edu/dukelibrariesinstruction/";
						$theThumb = "blog9.jpg";
					}
					
					// 10
					if (strpos($temp_url, 'blogs.library.duke.edu/answerperson') !== false) {
    					$theSource = "Library Answer Person";
						$theSourceURL = "http://blogs.library.duke.edu/answerperson/";
						$theThumb = "blog10.jpg";
					}
					
					// 11
					if (strpos($temp_url, 'blogs.library.duke.edu/libraryhacks') !== false) {
    					$theSource = "Library Hacks";
						$theSourceURL = "http://blogs.library.duke.edu/libraryhacks/";
						$theThumb = "blog11.jpg";
					}
					
					// 12
					if (strpos($temp_url, 'blogs.library.duke.edu/techmentor') !== false) {
    					$theSource = "Technology Mentor Program";
						$theSourceURL = "http://blogs.library.duke.edu/techmentor/";
						$theThumb = "blog12.jpg";
					}
					
					// 13
					if (strpos($temp_url, 'blogs.library.duke.edu/preservation') !== false) {
    					$theSource = "Preservation Underground";
						$theSourceURL = "http://blogs.library.duke.edu/preservation/";
						$theThumb = "blog13.jpg";
					}
					
					// 14
					if (strpos($temp_url, 'blogs.library.duke.edu/scholcomm') !== false) {
    					$theSource = "Scholarly Communication";
						$theSourceURL = "http://blogs.library.duke.edu/scholcomm/";
						$theThumb = "blog14.jpg";
					}
					
					// 15	
					if (strpos($temp_url, 'blogs.library.duke.edu/divinity') !== false) {
    					$theSource = "Divinity School Library Spotlight";
						$theSourceURL = "http://blogs.library.duke.edu/divinity/";
						$theThumb = "blog15.jpg";
					}
					
					// 16
					if (strpos($temp_url, 'blog.mclibrary.duke.edu') !== false) {
    					$theSource = "Medical Center Library";
						$theSourceURL = "http://blog.mclibrary.duke.edu";
						$theThumb = "blog16.jpg";
					}
					
					// 17
					if (strpos($temp_url, 'dukeluab.blogspot.com') !== false) {
    					$theSource = "Undergraduate Advisory Board";
						$theSourceURL = "http://dukeluab.blogspot.com/";
						$theThumb = "blog17.jpg";
					}
					
					// 18
					if (strpos($temp_url, 'blogs.library.duke.edu/divinity') !== false) {
    					$theSource = "Rubenstein Library Renovation";
						$theSourceURL = "http://blogs.library.duke.edu/renovation/";
						$theThumb = "blog19.jpg";
					}
					
					// 19
					if (strpos($temp_url, 'blogs.library.duke.edu/dcthree') !== false) {
    					$theSource = "Duke Collaboratory for Classics Computing";
						$theSourceURL = "http://blogs.library.duke.edu/dcthree/";
						$theThumb = "blog20.jpg";
					}
					
					// 20
					if (strpos($temp_url, 'archives.mc.duke.edu/blog') !== false) {
    					$theSource = "Duke Medical Center Archives Blog";
						$theSourceURL = "http://archives.mc.duke.edu/blog/";
						$theThumb = "blog21.jpg";
					}
					
					// 21
					if (strpos($temp_url, 'blogs.library.duke.edu/bitstreams') !== false) {
    					$theSource = "Bitstreams: Notes from the Digital Projects Team";
						$theSourceURL = "http://blogs.library.duke.edu/bitstreams/";
						$theThumb = "blog22.jpg";
					}
					
					
						
									
			?>

			<div class="news-item">
				
				<div class="image">
					<a href="<?php echo $theSourceURL;?>" title="<?php echo $theSource;?>"><img src="/wp-content/themes/library_news_theme/images/<?php echo $theThumb;?>" width="35" alt="<?php echo $theSource;?>" border="0" /></a>
				</div>
				
				<div class="content">
					<p><?php if ($item->get_permalink()) echo '<a href="' . $item->get_permalink() . '">'; echo $item->get_title(true); if ($item->get_permalink()) echo '</a>'; ?></p>
					<p class="footnote"><a href="<?php echo $theSourceURL;?>"><?php echo $theSource; ?></a> &mdash; <?php echo $item->get_date('F j, Y'); ?></p>
				</div>
				

			</div>
 
		<?php endforeach; ?>
		
	<?php endif; ?>
 
				
	
 
	<p class="pagination">Showing <?php echo $begin; ?>&ndash;<?php echo $end; ?> out of <?php echo $max; ?> &nbsp; <?php echo $prevlink; ?> | <?php echo $nextlink; ?> </p>
	
	<!-- | <a href="<?php //echo '?start=' . $start . '&length=5'; ?>">5</a>, <a href="<?php //echo '?start=' . $start . '&length=10'; ?>">10</a>, or <a href="<?php //echo '?start=' . $start . '&length=20'; ?>">20</a> at a time.-->
	

</div>

<!-- test closing divs -->
