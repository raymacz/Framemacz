<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FrameMacz
 */

get_header(); ?>

	<div id="primary" class="content-area ">
		<div class="container">
      <div class="row">
		<main id="main" class="site-main col-lg-8">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			?>

			<!-- TO DO: need alignment post navigation -->
			  <?php framemacz_post_navigation(); ?>


			<?php
			// If comments are open or we have at least one comment, load up the comment template.

			// TO DO: need alignment comments
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div> <!-- row -->
	</div> <!-- container -->
	</div><!-- #primary -->

<?php

get_footer();
