<section class="container main-content ">
                    <div class="columns" style="border-bottom: 0;">
                        <div class="column">
                            <div class="h-content default-type">
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
                $column = get_field("columns");
                
                $video_class = 12 / (int)$column;

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

                                <div class="column is-<?php echo $video_class;?>-desktop">
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