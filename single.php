<?php
/**
 * The template for displaying all single posts.
 *
 * @package ProfitMag
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			

            <?php profitmag_record_views(get_the_ID()); // Record post view?>
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_footer(); ?>