<?php
/**
 * Template Name: Home Page
 */

get_header();

?>

	<main id="primary" class="site-main">
		
			<?php
        
			while ( have_posts() ) :
				the_post();

                $block1 = get_field("block_1");

                if (!empty($block1)):
                    $pos = 0;
                    $last_cnt = count ($block1);
                    foreach ($block1 as $block):

                        $b = $block["section"];
                        if (!empty($b)):
                            $pos ++;
                            $className = "";
                            $classImageWrapper = "";

                            if ($pos % 2 == 0) {
                                $className = "odd";
                            }

                            if ($pos == $last_cnt) {
                                $className .= " last-block";
                            }
                            
                ?>

                <section class="container block1-lists <?php echo  $className; ?>">
                    <div class="columns">
                        <div class="column is-two-thirds ">
                            <div class="h-content  ">
                                <?php echo $b["content"]; ?>
                                <div class="button-wrapper">
                                    <a href="<?php echo $b["url"]; ?>" class="s-btn s-normal"><?php echo !empty($b["button"]) ? $b["button"] : "Learn More"; ?></a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="column ">
                            <div class="h-image">
                            <?php sod_generate_image_tag($b["image"]); ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                    endif;
                    endforeach;
                endif; ?>


                <?php
                $block2 = get_field("block_2");

                if (!empty($block2)):
                    ?>
                <section class="container is-fluid block2">
                    <div class="columns">
                        <div class="column is-half-desktop is-5-widescreen">
                            <div class="column is-offset-2">
                                <div class="h-content  ">
                                    <?php echo $block2["content"]; ?>
                                    <div class="button-wrapper">
                                        <a href="<?php echo $block2["url"]; ?>" class="s-btn s-normal"><?php echo !empty($block2["button"]) ? $block2["button"] : "Learn More"; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="v-overlay">
                                <?php sod_generate_image_tag($block2["video_overlay"]); ?>
                                <a class="v-button" href="<?php echo sod_change_video_url($block2["video"]); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                    <?php
                endif;

                $tids = $block2["testimonials"] ? $block2["testimonials"] : false;
                $args = [];
                if (!empty($tids)) {
              
                    $args =  array(
                        "post_type" => "testimonial",
                        "post__in" => $tids,
                        'order'       => 'ASC',
                        'orderby'     => 'title',
                        'post_status' => "publish"
                    );
                } else {
                    $args =  array(
                        "post_type" => "testimonial",
                        'numberposts' => 9,
                        'order'       => 'ASC',
                        'orderby'     => 'title',
                        'post_status' => "publish"
                    );
                }
                
                $testimonials =  get_posts($args);

                if (!empty($testimonials)):
                    ?>
                    <section class="container testimonial-section">
                        <div class="section-title">
                            <h2>PATIENT TESTIMONIALS</h2>
                        </div>
                     <div class="testimonial-carousel">
                                  
                    <?php
                foreach ( $testimonials as $testimonial ) {
                    // setup_postdata($testimonial);
                    $p_id = $testimonial->ID;
                ?>
                    <div class="testimonial-item">
                        <div class="thumbnail">
                            <?php echo get_the_post_thumbnail($p_id, 'full'); ?>
                        </div>
                        <h3><?php echo get_the_title($p_id); ?></h3>
                        <div class="content">
                            <?php echo do_shortcode(get_the_content(null, false, $p_id)); ?>
                        </div>

                        <div class="button-wrapper">
                            <a class="s-btn s-normal" href="<?php the_permalink($p_id); ?>">Learn more</a>                            
                        </div>
                    </div>
                <?php
                    // wp_reset_postdata();
                }?>

                </div>
                    </section><?php
                endif;?>

                <?php
                     $news =  get_posts( array(                        
                        'numberposts' => 2,                        
                        'post_status' => "publish"
                    ));

                    if ($news): ?>
                    <section class=" news-section">
                        <div class="container">
                        <div class="section-title">
                            <h2>LAST NEWS</h2>
                        </div>
                        
                        <div class="columns ">
                            <?php
                            foreach ($news as $new):
                                $p_id = $new->ID;
                                $author = get_the_author_meta( 'display_name', $new->post_author);
                                $date = get_the_date( 'F j, Y', $p_id);
                                ?>

                                <div class="column">
                                    <div class="news-item">
                                        <h2><a href="<?php echo the_permalink($p_id); ?>"><?php echo get_the_title($p_id); ?></a></h2>
                                        <small>Posted by <?php echo $author . " $date"; ?></small>
                                        <div class="content">
                                        <?php echo sod_get_excerpt($p_id); ?>
                                        </div>
                                        <div class="button-wrapper">
                                        <a class="s-btn s-normal" href="<?php the_permalink($p_id); ?>">Learn more</a>
                                        </div>
                                    </div>                                    
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                        </div>
                    </section>
                    <?php endif;

                    $contact_block = get_field("contact_block", "option");

                    if (!empty($contact_block)):
                        ?>
                    <section class="container contact-section">
                        <div class="contact-section-content">
                            <?php echo $contact_block; //$contact_block["content"]; ?>
                        </div>
                    </section>
                        <?php
                    endif;
                ?>
                <?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		
	</main><!-- #main -->

<?php
get_footer();