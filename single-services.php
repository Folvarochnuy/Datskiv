<?php
/**
 * Template Name: Single Services
 * This is the template that displays services pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<div id="primary" <?php astra_primary_class(); ?>>

		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php 
     			// are there any rows within within our flexible content?
          if( have_rows('flexible') ):
      		// loop through all the rows of flexible content
            while ( have_rows('flexible') ) : the_row();
							get_template_part('partials/services/element', get_row_layout());
						endwhile; // close the loop of flexible content
					endif; // close flexible content conditional
				?>
				
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->

	</div><!-- #primary -->
<?php get_footer(); ?>