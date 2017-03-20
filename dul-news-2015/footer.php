<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<?php do_action( 'twentyfourteen_credits' ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div><!-- .site-info -->

			<!-- footer search -->
			<!--
			<div id="searchform">
				<form action="/news-events-exhibits/search-results/" id="cse-search-box">
					<input type="hidden" name="cx" value="010520721692465143024:76gaailhxhm" />
					<input type="hidden" name="cof" value="FORID:10" />
					<input type="hidden" name="ie" value="UTF-8" />
					<input class="search-input" type="text" name="q" size="20" placeholder="search the blogs..." aria-label="Search the Blogs" />
					<button class="search-submit" name="sa" value="Search" type="submit">Go</button>
				</form>
			</div>
			-->

		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
