<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>

<div class="column is-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">		
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	

			<div class="entry-meta">
			<?php
			sod_posted_on();
			?>
		</div><!-- .entry-meta -->		
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				echo sod_get_excerpt(get_the_ID());
			?>
			<a href="<?php the_permalink(); ?>" class="read-more">Read More <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-alt-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-arrow-alt-right fa-w-14 fa-3x"><path fill="currentColor" d="M0 304v-96c0-13.3 10.7-24 24-24h200V80.2c0-21.4 25.8-32.1 41-17L441 239c9.4 9.4 9.4 24.6 0 34L265 448.7c-15.1 15.1-41 4.4-41-17V328H24c-13.3 0-24-10.7-24-24z" class=""></path></svg></a>
		</div><!-- .entry-content -->
		
		
		
	</article><!-- #post-<?php the_ID(); ?> -->
</div>