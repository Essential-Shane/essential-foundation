<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package essential
 */

get_header(); ?>

	<div class="callout large primary">
		<div class="row column text-center">
			<?php the_title('<h1>', '</h1>'); ?>
		</div>
	</div>
	<div class="row" id="content">
		<div class="medium-8 columns">
			<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
			?>
		</div>
		<div class="medium-3 columns" data-sticky-container>
			<div class="sticky" data-sticky data-anchor="content">
				<?php get_sidebar('default'); ?>
			</div>
		</div>
	</div>

<?php
get_footer();