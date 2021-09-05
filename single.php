<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php 
		if (get_post_type() != "testimonial") : ?>
		<div class="container" data-section>
		<?php
		endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();
		?>
		<?php
			get_template_part( 'template-parts/content', get_post_type() );
		if (get_post_type() == "testimonial") : ?>
		<div class="container" data-section style="margin-top: 50px;">
		<?php
		endif; ?>
		<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', '_s' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', '_s' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

			if (get_post_type() == "post") {
				?>
				<div class=" contact-section">
				<div class="contact-section-content">
				<h2 style="text-align: center;">Contact US</h2>
				<?php echo do_shortcode('[contact-form-7 id="228" title="contactus"]'); ?>
				</div>
				</div>
				<?php
			}
		?>
		<?php if (get_post_type() == "testimonial") : ?>
		</div>
		<?php
		endif; ?>
		<?php
		endwhile; // End of the loop.
		
		if (get_post_type() != "testimonial") : ?>
		</div>
		<?php
		endif; ?>
		</div>
	</main><!-- #main -->

<?php
get_footer();