<?php get_header(); ?>

			<!--BEGIN .page-bg-->
            <div id="fullwidth-template" class="page-bg single-portfolio clearfix">
            
                <!--BEGIN #primary .hfeed-->
                <div id="primary" class="hfeed">
                	
                	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                    <?php 
					$image1 = get_post_meta(get_the_ID(), 'tz_portfolio_image', TRUE); 
					$image2 = get_post_meta(get_the_ID(), 'tz_portfolio_image2', TRUE); 
					$image3 = get_post_meta(get_the_ID(), 'tz_portfolio_image3', TRUE); 
					$image4 = get_post_meta(get_the_ID(), 'tz_portfolio_image4', TRUE); 
					$image5 = get_post_meta(get_the_ID(), 'tz_portfolio_image5', TRUE);
					$height = get_post_meta(get_the_ID(), 'tz_portfolio_image_height', TRUE);
					$audio1 = get_post_meta(get_the_ID(), 'tz_audio_mp3', TRUE);
					$audio2 = get_post_meta(get_the_ID(), 'tz_audio_ogg', TRUE);
					$embed = get_post_meta(get_the_ID(), 'tz_portfolio_embed_code', TRUE);
					$switch = get_post_meta(get_the_ID(), 'tz_switch', TRUE);
					?>
                    
                    <!--BEGIN .portfolio-title-wrap-->
                	<div class="portfolio-title-wrap clearfix">
                    
                        <h2 class="page-title"><?php the_title(); ?></h2>
                        
                        <?php $portfolio_page = get_option('tz_portfolio_page'); ?>

                        <!--BEGIN .navigation-->
                        <div class="navigation clearfix">

                            <div class="nav-next">
                                <?php previous_post_link(__('%link', 'framework'), '') ?>
                            </div>
                            
                            <div class="nav-previous">
                                <?php next_post_link(__('%link', 'framework'), '') ?>
                            </div>
                        
                        <!--END .navigation-->
                        </div>
                        
                        <div class="back-to-portfolio">
                            <a href="<?php echo get_permalink($portfolio_page); ?>">
                                <?php _e('&larr; Back to Portfolio', 'framework'); ?>
                            </a>
                        </div>
                    
                    <!--END .portfolio-title-wrap--> 
                    </div>	
                    
                    <!--BEGIN .hentry -->
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    
                    	<!--BEGIN .slider -->
                        <div id="slider-<?php the_ID(); ?>" class="slider" data-loader="<?php echo  get_template_directory_uri(); ?>/images/<?php if(get_option('tz_alt_stylesheet') == 'dark.css'):?>dark<?php else: ?>light<?php endif; ?>/ajax-loader.gif">
                        
                        
                        <?php if($switch == 'audio') : ?>
                    	
                        <?php tz_audio(get_the_ID()); ?>
                    
                        <div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
            
                        <div class="jp-audio-container">
                            <div class="jp-audio">
                                <div class="jp-type-single">
                                    <div id="jp_interface_<?php the_ID(); ?>" class="jp-interface">
                                        <ul class="jp-controls">
                                            <li><div class="seperator-first"></div></li>
                                            <li><div class="seperator-second"></div></li>
                                            <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                            <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                            <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                            <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                                        </ul>
                                        <div class="jp-progress-container">
                                            <div class="jp-progress">
                                                <div class="jp-seek-bar">
                                                    <div class="jp-play-bar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-volume-bar-container">
                                            <div class="jp-volume-bar">
                                                <div class="jp-volume-bar-value"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                   	 	<?php endif; ?>
                    
                    	<?php if($switch == 'slideshow' || $switch == '') : ?>

                            <div class="slides_container clearfix">
                                
                                <?php if($image1 != '') : ?>
                                <div><img height="<?php echo $height; ?>" width="550" src="<?php echo $image1; ?>" alt="<?php the_title(); ?>" /></div>
                                <?php endif; ?>
                                
                                <?php if($image2 != '') : ?>
                                <div><img width="550" src="<?php echo $image2; ?>" alt="<?php the_title(); ?>" /></div>
                                <?php endif; ?>
                                
                                <?php if($image3 != '') : ?>
                                <div><img width="550" src="<?php echo $image3; ?>" alt="<?php the_title(); ?>" /></div>
                                <?php endif; ?>
                                
                                <?php if($image4 != '') : ?>
                                <div><img width="550" src="<?php echo $image4; ?>" alt="<?php the_title(); ?>" /></div>
                                <?php endif; ?>
                                
                                <?php if($image5 != '') : ?>
                                <div><img width="550" src="<?php echo $image5; ?>" alt="<?php the_title(); ?>" /></div>
                                <?php endif; ?>
                            
                            </div>

                    	<?php endif; ?>
					
                   		<?php if($switch == 'video') : ?>
                    
						<?php if($embed == '') : ?>
                            
                        <?php tz_video(get_the_ID()); ?>
                        
                        <?php $heightSingle = get_post_meta(get_the_ID(), 'tz_video_height_single', TRUE); ?>
                        
                        <style type="text/css">
                            .single .jp-video-play,
                            .single div.jp-jplayer.jp-jplayer-video {
                                height: <?php echo $heightSingle; ?>px;
                            }
                        </style>
                        
                        <div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer jp-jplayer-video"></div>
                        
                        <div class="jp-video-container">
                            <div class="jp-video">
                                <div class="jp-type-single">
                                    <div id="jp_interface_<?php the_ID(); ?>" class="jp-interface">
                                        <ul class="jp-controls">
                                            <li><div class="seperator-first"></div></li>
                                            <li><div class="seperator-second"></div></li>
                                            <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                            <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                            <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                            <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                                        </ul>
                                        <div class="jp-progress-container">
                                            <div class="jp-progress">
                                                <div class="jp-seek-bar">
                                                    <div class="jp-play-bar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-volume-bar-container">
                                            <div class="jp-volume-bar">
                                                <div class="jp-volume-bar-value"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <?php else: ?>
                        
                        	<?php echo stripslashes(htmlspecialchars_decode($embed)); ?>
                        
                        <?php endif; ?>
                        
                    	<?php endif; ?>
                    
                    	<!--END .slider -->
                        </div>

                        <!--BEGIN .entry-content -->
                        <div class="entry-content">
                        
                            <?php the_content(); ?>
                            
                        <!--END .entry-content -->
                        </div>
                        
                        <?php $terms = get_the_terms( get_the_ID(), 'skill-type' ); ?>
                        
                        <?php if($terms) : ?>
                        <div class="entry-skills">
							
                            <h3><?php _e('Skills', 'framework'); ?></h3>
                            <ul>
                                <?php foreach ($terms as $term) :  ?>
                                <li><?php echo $term->name; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        
                        </div>
                        <?php endif; ?>
                    
                    <!--END .hentry-->  
                    </div>
    
                    <?php endwhile; ?>
                    
                    <div id="comment-wrap">
                    <?php comments_template('', true); ?>
                    </div>
    
                <?php else : ?>
    
                    <!--BEGIN #post-0-->
                    <div id="post-0" <?php post_class(); ?>>
                    
                        <h2 class="entry-title"><?php _e('Error 404 - Not Found', 'framework') ?></h2>
                    
                        <!--BEGIN .entry-content-->
                        <div class="entry-content">
                            <p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
                        <!--END .entry-content-->
                        </div>
                    
                    <!--END #post-0-->
                    </div>
    
                <?php endif; ?>
                <!--END #primary .hfeed-->
                </div>
                
            </div>
            <!--END .page-bg-->
            
            <div class="page-bottom"></div>
            
            <?php 

			$callout = get_option('tz_callout');
			
			if($callout == 'true')
            get_template_part('includes/callout'); 
			
			?>

<?php get_footer(); ?>
