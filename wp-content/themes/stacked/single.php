<?php get_header(); ?>

			<!--BEGIN .page-bg-->
            <div class="page-bg clearfix">
            
                <!--BEGIN #primary .hfeed-->
                <div id="primary" class="hfeed">			
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                    <!--BEGIN .hentry -->
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    	
                        <!--BEGIN .title-wrap -->
                    	<div class="title-wrap">
                    
                            <div class="author-avatar">
                                <span><?php echo get_avatar( get_the_author_meta('email'), '30' ); ?></span>
                            </div>
                                    
                            <h2 class="entry-title">
                                <span><?php the_title(); ?></span>
                            </h2>
                            
                            <!--BEGIN .entry-meta .entry-header-->
                            <span class="entry-meta entry-header">
                            
                                <span class="author">
                                    <?php _e('Posted by', 'framework') ?> <?php the_author_posts_link(); ?>
                                </span>
                                
                                <span class="published">
                                    <?php _e('on', 'framework') ?> <?php the_time( get_option('date_format') ); ?>
                                </span>
                                
                            <!--END .entry-meta entry-header -->
                            </span>
                        
                        <!--END .title-wrap -->
                        </div>

                        <!--BEGIN .entry-content -->
                        <div class="entry-content">
                        
                        	<?php /* if show post image is checked */
							if (get_option('tz_post_img') == "true") { ?>
							<?php /* if the post has a WP 2.9+ Thumbnail */
							if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<div class="post-thumb">
								<?php the_post_thumbnail('archive-thumb');  /* post thumbnail settings configured in functions.php */ ?>
							</div>
							<?php } } ?>
                        
                            <?php the_content(__('Read more...', 'framework')); ?>
                            <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'framework').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                            
                        <!--END .entry-content -->
                        </div>
                        
                        <!--BEGIN .entry-meta .entry-footer-->
                        <div class="entry-meta entry-footer clearfix">
                            
                            <?php if(has_tag()) : ?>
                            <span class="entry-tags">
								<?php the_tags(__('Tags:', 'framework').' ', ', ', ''); ?>
                            </span>
                            <?php endif; ?>
                            
                            <?php
							
							$facebook = get_option('tz_post_facebook');
							$twitter = get_option('tz_post_twitter');
							
							?>
							
							<?php if($twitter == 'true') : ?> 
                            <span class="entry-twitter">
                            	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                                <a href="http://twitter.com/share" class="twitter-share-button"
                                    data-url="<?php the_permalink(); ?>"
                                    data-via="<?php bloginfo('name'); ?>"
                                    data-text="<?php the_title(); ?>"
                                    data-related="<?php bloginfo('name'); ?>"
                                    data-count="horizontal">Tweet
                                </a>
                            </span>
                            <?php endif; ?>
                            
                            <?php if($facebook == 'true') : ?> 
                            <span class="entry-facebook-like">
                            	<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink(get_The_ID())); ?>&amp;layout=button_count&amp;show_faces=false&amp;&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </span>
                            <?php endif; ?>
                            
                        <!--END .entry-meta .entry-footer-->
                        </div>
                        
                        <?php /* if the author bio is checked */
						if (get_option('tz_author_bio') == "true") : ?>
						<!--BEGIN .author-bio-->
						<div class="author-bio clearfix">
							<?php echo get_avatar( get_the_author_meta('email'), '40' ); ?>
							<div class="author-description"><?php the_author_meta("description"); ?></div>
						<!--END .author-bio-->
						</div>
						<?php endif; ?>
                    
                    <!--END .hentry-->  
                    </div>
    
                    <?php endwhile; ?>
                    
                    <?php comments_template('', true); ?>
    
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
                
                <?php get_sidebar(); ?>
                
            </div>
            <!--END .page-bg-->
            
            <div class="page-bottom"></div>
            
            <?php 

			$callout = get_option('tz_callout');
			
			if($callout == 'true')
            get_template_part('includes/callout'); 
			
			?>

<?php get_footer(); ?>
