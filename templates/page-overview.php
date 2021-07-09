<?php
/**
 * Template Name: Overview Page
 */

get_header();

?>

	<main id="primary" class="site-main">
		
			<?php
        
			while ( have_posts() ) :
				the_post();

               ?>
               <section class="container main-content">
                    <div class="columns">
                        <div class="column">
                            <div class="h-content">
                                <?php the_content(); ?>
                            </div>
                        </div>                        
                    </div>
                </section>

                <?php 

					$gallery_title = get_field( "gallery_title" );
					$image_gallery = get_field("image_gallery");
					if (!empty($image_gallery)):
						
				?>
				<section class="container image-gallery">
					<?php if ($gallery_title): ?>
						<div class="section-title">
							<h2><?php echo $gallery_title; ?></h2>
						</div>
					<?php endif; ?>
                    <div class="columns is-desktop is-multiline">
						<?php foreach ($image_gallery as $key => $ig): ?>
                        <div class="column is-one-third-desktop">
							<a class="image is-square image-btn" href="<?php echo $ig; ?>">
								<?php echo sod_generate_image_tag($ig); ?>	
							</a>
                        </div>
						<?php endforeach; ?>
                    </div>
                </section>
				<?php
					endif;
				?>

				<?php
                $video_gallery = get_field("video_gallery");
				$video_gallery_title = get_field( "video_gallery_title" );

                if (!empty($video_gallery)):  ?>
                    <section class=" video_gallery">
                        <div class="container">
						<?php 
							if ($video_gallery_title):
							?>
								<div class="section-title">
								<h2><?php echo $video_gallery_title; ?></h2>
								</div>
							<?php
							endif;
						?>

                        <div class="columns is-desktop is-multiline">
                            <?php
                            foreach ($video_gallery as $v):
                                $title = $v["title"];
                                $content = $v["content"];
                                
                                $url = $v["video"];
                                

                                ?>

                                <div class="column is-half-desktop">
                                    <div class="h-content">
                                        <?php if ($url): ?>
                                        <div class="image is-16by9 video-btn">
											<iframe class="has-ratio" width="1000" height="562" src="<?php echo sod_change_video_url($url); ?>?rel=0&controls=0" frameborder="0" allowfullscreen></iframe>
										</div>
                                        <?php endif; ?>
                                        <h2><?php echo $title; ?></h2>                                                                                
                                            <?php echo $content; ?>
                                        
                                    </div>                                    
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                        </div>
                    </section>
                    <?php endif; ?>

                <?php 
                    $vertical_list = get_field("horizontal_list");

                    if (!empty($vertical_list)): 
                ?>
                <section class="container horizontal-section">
                    <div class="columns is-multiline is-desktop">
                    <?php 
                    foreach ($vertical_list as $v):
                        $title = $v["title"];
                        $content = $v["content"];
                        $image = $v["image"];
                        $url = $v["url"];
                        $button = $v["button"];
                    ?>
                        <div class="column is-one-third-widescreen ">
                           
                                <div class="h-content  ">
                                    <div class="thumbnail">
                                        <?php echo sod_generate_image_tag($image); ?>
                                    </div>                                
                                    <h2><?php echo $title; ?></h2>
                                    <?php echo $content; ?>

                                    <div class="button-wrapper">
                                        <a href="<?php echo $url; ?>" class="s-btn s-normal"><?php echo !empty($button) ? $button : "Learn More"; ?></a>
                                    </div>
                              
                            </div>
                        </div>                        
                    <?php endforeach; ?>
                    </div>
                </section>
                <?php endif ;?>

                <?php 
                    $vertical_list = get_field("vertical_list");

                    if (!empty($vertical_list)): 
                ?>
                <section class="container vertical-section">                    
                    <?php 
                    foreach ($vertical_list as $v):
                        $title = $v["title"];
                        $content = $v["content"];
                        $image = $v["image"];
                        $url = $v["url"];
                        $button = $v["button"];
                    ?>
                    <div class="columns">
                        
                           <div class="column is-one-third-widescreen">
                                <div class="thumbnail">
                                    <?php echo sod_generate_image_tag($image); ?>
                                </div>                                
                           </div>
                           <div class="column">
                                <div class="h-content  ">
                                    
                                    <h2><?php echo $title; ?></h2>
                                    <?php echo $content; ?>

                                    <?php if ($url): ?>
                                    <div class="button-wrapper">
                                        <a href="<?php echo $url; ?>" class="s-btn s-normal"><?php echo !empty($button) ? $button : "Learn More"; ?></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                           </div>
                    </div>                    
                    <?php endforeach; ?>
                    
                </section>
                <?php endif ;?>
                
                <?php
                $pages_2 = get_field("2_pages");

                if (!empty($pages_2)):  ?>
                    <section class=" news-section pages_2">
                        <div class="container">
                      
                        <div class="columns ">
                            <?php
                            foreach ($pages_2 as $v):
                                $title = $v["title"];
                                $content = $v["content"];
                                $image = $v["image"];
                                $url = $v["url"];
                                $button = $v["button"];

                                ?>

                                <div class="column">
                                    <div class="h-content">
                                        <div class="thumbnail">
                                        <?php echo sod_generate_image_tag($image); ?>
                                        </div>
                                        <h2><?php echo $title; ?></h2>                                                                                
                                            <?php echo $content; ?>
                                        
                                        <div class="button-wrapper">
                                        <a href="<?php echo $url; ?>" class="s-btn s-normal"><?php echo !empty($button) ? $button : "Learn More"; ?></a>
                                        </div>
                                    </div>                                    
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                        </div>
                    </section>
                    <?php endif; ?>

                <?php
                    $contact_block = get_field("contact_block", "option");

                    if (!empty($contact_block)):
                        ?>
                    <section class="container contact-section">
                        <div class="contact-section-content">
                            <?php echo $contact_block; ?>
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