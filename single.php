<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					if( has_post_thumbnail() ):
						the_post_thumbnail( 'large', array( 'class' => 'thumbnail' ) );
					else:
						echo '<img class="thumbnail" src="http://placehold.it/850x350">';
					endif;
					the_content();
					echo '<div class="callout">';
						echo '<ul class="menu simple">';
							echo '<li><a href="#">Author:'.get_the_author().'</a></li>';
						echo '</ul>';
					echo '</div>';
				endwhile; // End of the loop.
			?>
		</div>
		<div class="medium-3 columns" data-sticky-container>
			<div class="sticky" data-sticky data-anchor="content">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php
get_footer();
