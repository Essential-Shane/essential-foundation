<div class="blog-post">
	<h3><?php the_title(); ?> <small><?php the_time('d/m/Y'); ?></small></h3>
	<?php if( has_post_thumbnail() ): ?>
		<?php the_post_thumbnail( 'large', array( 'class' => 'thumbnail' ) ); ?>
	<?php else: ?>
		<img class="thumbnail" src="http://placehold.it/850x350">
	<?php endif; ?>
	<?php the_excerpt(); ?>
	<div class="callout">
		<ul class="menu simple">
			<li><a href="#">Author: <?php the_author(); ?></a></li>
		</ul>
	</div>
</div>