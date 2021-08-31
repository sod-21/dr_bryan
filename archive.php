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
    <?php
    $description = "";
    $cat_id = get_query_var('cat');

    if ($cat_id) {
        $description = category_description($cat_id);
    }

    if ($description) :
    ?>
        <div class="container">
            <div class="cat_description h-content">
                <?php echo $description; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="columns is-multiline">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', "list");

            endwhile; // End of the loop.



            ?>
            <div class="column">
                <?php the_posts_navigation(); ?>
            </div>

        </div>

        <div class="contact-us-from-page">
            <?php echo do_shortcode('[contact-form-7 id="228" title="contactus"]'); ?>
        </div>
    </div>


</main><!-- #main -->

<?php
get_footer();
