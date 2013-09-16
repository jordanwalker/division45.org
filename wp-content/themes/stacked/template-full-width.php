<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

			<!--BEGIN .page-bg-->
            <div id="fullwidth-template" class="page-bg clearfix">
            
                <!--BEGIN #primary .hfeed-->
                <div id="primary" class="hfeed">			
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                    <!--BEGIN .hentry -->
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    	
                                    
                        <h2 class="page-title"><?php the_title(); ?></h2>

                        <!--BEGIN .entry-content -->
                        <div class="entry-content">
                        
                            <?php the_content(__('Read more...', 'framework')); ?>
                            <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'framework').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                            
                        <!--END .entry-content -->
                        </div>
                    
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
                
            </div>
            <!--END .page-bg-->
            
            <div class="page-bottom"></div>
            
            <?php 

			$callout = get_option('tz_callout');
			
			if($callout == 'true')
            get_template_part('includes/callout'); 
			
			?>

<?php get_footer(); ?>
