<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();

?>

	<main id="primary" class="site-main">
    
                <div class="container">
                    <div class="columns is-multiline">
        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', "list");

        endwhile; // End of the loop.

        

        ?>
         <div class="column">
             <?php the_posts_navigation(); ?>
    </div>

        </div>
                </div>
       
    
    </main><!-- #main -->

<?php
get_footer();