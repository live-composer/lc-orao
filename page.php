<?php
/**
 * The template for displaying all pages.
 *
 * @link https://livecomposerplugin.com/themes/
 *
 * @package Orao
 */

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="main">
			<?php the_content(); ?>
		</div>

	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
