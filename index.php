<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package essential
 */

get_header(); ?>

	<div class="callout large primary">
		<div class="row column text-center">
			<h1>Our Blog</h1>
			<?php //echo '<h1>'.get_the_title('PAGEID').'</h1>'; ?>
		</div>
	</div>
	<div class="row" id="content">
		<div class="medium-8 columns">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'blog-post' );
					endwhile;

					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$max = $wp_query->max_num_pages;

					echo '<div class="row column">';
						echo '<ul class="pagination" role="navigation" aria-label="Pagination">';
							if( $max >= 1 ):
				                $count = 1;
				                if(get_previous_posts_link()):
				                    previous_posts_link( '<li>Previous</li>' );
				                else:
				                	echo '<li class="disabled">Previous</li>';
				                endif;
				                while($max >= 1):
				                    if( $paged == $count ):
				                        echo '<li class="current"><a href="/blog/page/'.$count.'/" aria-label="Page '.$count.'">'.$count.'</a></li>';
				                    else:
				                        echo '<li><a href="blog/page/'.$count.'/" aria-label="Page '.$count.'">'.$count.'</a></li>';
				                    endif;
				                    $count++;
				                    $max--;
				                endwhile;
				                if(get_next_posts_link()):
				                    next_posts_link( '<li>Next</li>' );
				                endif;
				            endif;
						echo '</ul>';
					echo '</div>';
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; 
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
