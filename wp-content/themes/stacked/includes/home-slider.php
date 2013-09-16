			<?php
				//Query the database
				query_posts( array (
					'post_type' => 'slide',
					'posts_per_page' => -1
					)
				);
				
				global $wp_query;
				
				$total = $wp_query->post_count;
			?>
            
            <!-- BEGIN #header-bottom -->
            <div id="header-bottom">
            
                <!-- BEGIN .header-inner -->
                <div class="header-inner">
                
                	<?php 
						$style = get_option('tz_alt_stylesheet');
						
						if($style == 'blue.css')
							$style = 'blue';
							
						if($style == 'dark.css')
							$style = 'dark';
							
						if($style == 'light.css')
							$style = 'light';
					?>
                	
                    <div id="loader" data-loader="<?php echo get_template_directory_uri(); ?>/images/<?php echo $style; ?>/ajax-loader.gif"></div>
                    
                	<!-- BEGIN #slider -->
                    <div id="slider">
                    	
                        <!-- BEGIN .slides-container -->
                        <div class="slides_container">
                        	
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            
                            <!--BEGIN .hentry -->
							<div <?php post_class() ?> id="slider-<?php the_ID(); ?>">
                            
                                <!--BEGIN .entry-content -->
                                <div class="entry-content clearfix">
                                
                                	<?php the_content(); ?>
                                    
                                <!--END .entry-content -->
                                </div>
                                
                            <!--END .hentry -->
                            </div> 
                            
							<?php endwhile; endif; ?>
                        
                        <!-- END .slides-container -->
                        </div>
                        
                        <?php $dots = get_option('tz_slider_dots'); ?>
                        
                        <!-- BEGIN #pagination-slider -->   
                        <div id="<?php if($dots != 'true') : ?>pagination-slider<?php else: ?>dots<?php endif; ?>" <?php if($total > 5) : ?>class="on"<?php endif; ?>>
							
                            <ul class="pagination">
                            
                                <?php
								$count = 0; 
								if (have_posts()) : while (have_posts()) : the_post(); 
								?>
                                
                                <?php if($dots != 'true') : ?>
                                
                                <li <?php if($count == 0): ?>class="first"<?php endif; ?>><span></span><a href="#<?php echo $count; ?>"><?php the_post_thumbnail('slider-thumb'); ?></a></li>
                                
                                <?php else: ?>
                                
                                <li <?php if($count == 0): ?>class="first"<?php endif; ?>><span></span><a href="#<?php echo $count; ?>"></a></li>
                                
                                <?php endif; ?>
                                
                                <?php 
								$count++; 
								endwhile; endif; 
								?>
                                
                                
                            </ul>

                        <!-- END #pagination-slider -->   
                        </div>
                    
                    <!-- END #slider -->   
                    </div>
                    
                <!-- END .header-inner -->
                </div>
            
            <!-- END #header-bottom -->
            </div>