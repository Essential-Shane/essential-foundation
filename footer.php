<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package essential
 */

?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="callout large secondary">
		<div class="row">
			<div class="large-4 columns">
				<h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
				<p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
			</div>
			<div class="large-3 large-offset-2 columns">
				<ul class="menu vertical">
					<li><a href="#">One</a></li>
					<li><a href="#">Two</a></li>
					<li><a href="#">Three</a></li>
					<li><a href="#">Four</a></li>
				</ul>
			</div>
			<div class="large-3 columns">
				<ul class="menu vertical">
					<li><a href="#">One</a></li>
					<li><a href="#">Two</a></li>
					<li><a href="#">Three</a></li>
					<li><a href="#">Four</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
	  jQuery('.bxslider').bxSlider();
	});
</script>

</body>
</html>
