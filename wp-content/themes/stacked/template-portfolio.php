<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

			<!--BEGIN .page-bg-->
            <div id="fullwidth-template" class="page-bg clearfix">
            
                <!--BEGIN #primary .hfeed-->
                <div id="primary" class="hfeed">	
                	
                    <!--BEGIN .portfolio-title-wrap-->
                	<div class="portfolio-title-wrap clearfix">
                    
                        <h2 class="page-title"><?php the_title(); ?></h2>
                        
                        <ul id="filter">
                        
                          <li id="top"><a class="top-link" href="#"><?php _e('All', 'framework'); ?></a>
                          
                              <ul id="controls">
                              
                              	<li class="segment-1"><a data-value="all" href="#"><?php _e('All', 'framework'); ?></a>
                              	
								<?php 
					  
									wp_list_categories(array(
										'title_li' => '', 
										'show_option_none' => '', 
										'taxonomy' => 'skill-type', 
										'walker' => new Portfolio_Walker())
									); 
								
								?>
                                
                              </ul>
                              
                          </li>
                        
                        <!--END #filter--> 
                        </ul>
                        
                        <div class="filter-title"><?php _e('Filter: ', 'framework'); ?></div>
                    
                    <!--END .portfolio-title-wrap--> 
                    </div>	
                    
                    <!--BEGIN .recent-wrap -->
                	<div class="recent-wrap">
                    
                    <ul id="items" class="image-grid">
                    
                    <?php 
						$count = 1;
						$query = new WP_Query();
						$query->query('post_type=portfolio&posts_per_page=-1');
						if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
						$terms = get_the_terms( get_the_ID(), 'skill-type' );
					?>
    
                            <li data-id="id-<?php echo $count; ?>" class="<?php if($terms) : foreach ($terms as $term) { echo 'term-'.$term->term_id.' '; } endif; ?>">
                        
                                <!--BEGIN .hentry -->
                                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                    
                                    <?php 
                                    
                                   	$lightbox = get_post_meta(get_the_ID(), 'tz_portfolio_lightbox', TRUE); 
									$thumb = get_post_meta(get_the_ID(), 'tz_portfolio_thumb', TRUE);
												
									$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
									
									if($lightbox == 'no')
										$lightbox = FALSE;
									
									if($thumb == '')
										$thumb = FALSE;
			
									 $large_image = $large_image[0];
                                    
                                    ?>
                                    <div class="post-thumb clearfix">
                                    	
                                        <?php if($lightbox) : ?>
                                            <a class="lightbox" title="<?php the_title(); ?>" href="<?php echo $large_image; ?>">
                                                <?php if($thumb) : ?>
                                                <img width="190" height="140" src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>" />
                                                <?php else: ?>
                                                <?php the_post_thumbnail('portfolio-thumb'); ?>
                                                <?php endif; ?>
                                            </a>
                                        <?php else: ?>
                                        
                                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                            <?php if($thumb) : ?>
                                                <img width="190" height="140" src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>" />
                                            <?php else: ?>
                                            <?php the_post_thumbnail('portfolio-thumb'); ?>
                                            <?php endif; ?>
                                            </a>
                                            
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="count hidden"><?php echo $count; ?></div>
                                                    
                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
                
                                    <!--BEGIN .entry-content -->
                                    <div class="entry-content">
                                        <?php the_excerpt(); ?>
                                    <!--END .entry-content -->
                                    </div>
                                
                                <!--END .hentry-->  
                                </div>
                            
                            </li>
                            
                            <?php $count++; endwhile; wp_reset_query(); ?>
                          
                        </ul>
                        
    				<!--END .recent-wrap-->
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
