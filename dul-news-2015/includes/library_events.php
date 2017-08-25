<div id="library_events">

<h3>Upcoming Library Events <a href="https://radiant-savannah-1223.herokuapp.com/users/1/web_requests/101/dukedukeduke.xml" title="RSS feed of all library events"><img alt="rss" src="http://library.duke.edu/imgs/common/icons/feed-icon-16x16.gif" style="border: medium none" /></a></h3>

<?php // Get RSS Feed(s)

date_default_timezone_set('America/New_York');

//include_once(ABSPATH . WPINC . '/feed.php');
require_once(ABSPATH . '/php/autoloader.php');

// Get a SimplePie feed object from the specified feed source.

// Pipes EOL'd
//$rss = fetch_feed('https://pipes.yahoo.com/pipes/pipe.run?_id=a4b573af3dddcd18fc53354bb62123d7&_render=rss');
$rss = fetch_feed('https://radiant-savannah-1223.herokuapp.com/users/1/web_requests/101/dukedukeduke.xml');

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

    $DST = date('I');
    $nowDate = new DateTime();
    $eventCount = 0;
    $dupTitleCheck = "";
    $dupLinkCheck = "";

	// Loop through each feed item and display each item as a hyperlink.
    foreach ( $rss_items as $item ) :

	?>

		<?php

			// limit to 60 characters



			$myTitle = esc_html( $item->get_title() );
      $myTitle = str_replace('&amp;','&',$myTitle);
			$myShortTitle = myTruncate($myTitle, 50, " ");
      $DVSdupe = false;

      // DVS dupe check
      if (strpos($myTitle, 'DVS Workshop:') !== false) {
        $DVSdupe = true;
      }

      $itemLink = $item->get_permalink();
      $itemDate = $item->get_date('Y/m/d H:i');
      $displayDate = new DateTime($itemDate);

      if ( $displayDate > $nowDate && $dupTitleCheck != $myTitle && $dupLinkCheck != $itemLink && $DVSdupe == false ) {

        $eventCount++;

		?>

    <li>
        <a href='<?php echo esc_url( $itemLink ); ?>' title='<?php echo $myTitle; ?>'><?php echo $myShortTitle; ?></a>
		<span class="rssdate">

            <?php

                if ($DST > 0) {

                    echo $displayDate->format('l, F j, g:i A');

                } else {

                    $displayDate->modify("+60 minutes");
                    echo $displayDate->format('l, F j, g:i A');

                }

            ?>

        </span>
    </li>

    <?php

        } // end if loop (date check)

    $dupTitleCheck = $myTitle;
    $dupLinkCheck = $itemLink;

    endforeach;

    if ($eventCount == 0) {
      echo '<li><em>There are no events scheduled at this time</em></li>';
    }

    ?>

</ul>

<?php

  if ($eventCount != 0) {
    echo '<div class="viewall"><a href="all-library-events/" class="all_events">View All Events &raquo;</a></div>';
  }
?>

</div>
