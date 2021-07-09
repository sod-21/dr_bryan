<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	<footer id="colophon" class="site-footer">

		<div class="top-footer">
			<div class="container">
				<div class="columns ">
					<div class="column is-two-fifths">
						<?php $data = get_field("footer_left", "option"); 
						if ($data) {
							echo $data;
						}
						?>
					</div>
					<div class="column is-one-fifth">
						<?php
							$data = get_field( "footer_center", "option");

							if ($data) {
								echo do_shortcode($data);
							}
						?>
					</div>

					<div class="column is-two-fifths">
						<?php
							$data = get_field( "footer_right", "option");

							if ($data) {
								echo do_shortcode($data);
							}
						?>
					</div>
				</div>
			</div>
		</div>


		<div class="site-info">
			<div class="container">
			<?php 
			$data = get_field( "footer_bottom", "option" );

			if ($data) {
				echo $data;
			}
			?>
			</div>
			

			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
