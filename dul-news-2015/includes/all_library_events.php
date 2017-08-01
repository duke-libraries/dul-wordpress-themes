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

	$rss_items_count = $rss->get_items(0, $maxitems);

	$DST = date('I');
  $nowDate = new DateTime();
	$itemCount = 0;
  $currentEvents = 0;
  $dupTitleCheck = "";
  $dupLinkCheck = "";

	foreach ( $rss_items_count as $item ) :

		$itemDate = $item->get_date('Y/m/d H:i');
		$displayDate = new DateTime($itemDate);

			if ($displayDate < $nowDate) {

				$itemCount++;

			}

      if ($displayDate >= $nowDate) {

				$currentEvents++;

			}



	endforeach;

	// +++ //

    if ($currentEvents == 0) {

      echo '<p><em>There are no events scheduled at this time</em></p>';

    } else {

  	$rss_items_display = $rss->get_items($itemCount, $maxitems);

  	foreach ( $rss_items_display as $item ) :

      		$temp_url = $item->get_permalink();

      			// 1
      			//if (strpos($temp_url, 'calendar.duke.edu') !== false) {
      				//$theSource = "Public Event";
      				//$theSourceURL = "http://library.duke.edu/news/events.html";
      				//$theThumb = "public_event.jpg";
      			//}

      			//else {
      				//$theSource = "For Duke Faculty, Staff & Students";
      				//$theSourceURL = "http://library.duke.edu/news/events.html";
      				//$theThumb = "duke_event.jpg";
      			//}



      		$temp_description = $item->get_description();
      		//$temp_description = $item->get_content();

      		// clean up description
      		$temp_description = str_replace('<div>&nbsp;</div>','',$temp_description);
      		$temp_description = str_replace('&nbsp;',' ',$temp_description);
      		$temp_description = str_replace('<p></p>','',$temp_description);
      		$temp_description = str_replace('See description','',$temp_description);
      		$temp_description = str_replace('<div class="event-description">&nbsp;</div>','',$temp_description);
      		$temp_description = preg_replace("/<span[^>]+\>/i", "", $temp_description);
          $temp_description = str_replace("<img class='event-image' alt='event image' src='' />","",$temp_description);

          $itemTitle = $item->get_title(true);
      		$displayTitle = str_replace('&amp;', '&', $itemTitle);

          $itemDate = $item->get_date('Y/m/d H:i');
      		$displayDate = new DateTime($itemDate);

          $itemLink = $item->get_permalink();

          // check for duplicates
          if ( $dupTitleCheck != $itemTitle && $dupLinkCheck != $itemLink ) {

      	?>

      	<div class="event-item">
      		<h3><?php if ($item->get_permalink()) echo '<a href="' . $itemLink . '">'; echo $displayTitle; if ($item->get_permalink()) echo '</a>'; ?></h3>
          <div class="displaydate">

          <?php if ($DST > 0) {

                echo $displayDate->format('l, F j, g:i A');

            } else {

                $displayDate->modify("+60 minutes");
                echo $displayDate->format('l, F j, g:i A');

            } ?>

          </div>
          <?php echo $temp_description ?>
      		<p class="footnote"><em><?php if ($item->get_permalink()) echo '<a href="' . $item->get_permalink() . '">'; echo 'more information &raquo;'; if ($item->get_permalink()) echo '</a>'; //echo $item->get_date('F j, Y'); ?></em><br /></p>

      	</div>

        <?php

        } // end dup check

        $dupTitleCheck = $itemTitle;
        $dupLinkCheck = $itemLink;

    endforeach;

  }

endif;



?>
