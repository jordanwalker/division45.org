<?php
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
?>
<?php get_header(); ?>

			<!--BEGIN .page-bg-->
            <div class="page-bg clearfix">
            
                <!--BEGIN #primary .hfeed-->
                <div id="primary" class="hfeed">

                	<h2 class="page-title"><?php _e('Error 404 - Not Found', 'framework') ?></h2>
                    
                    <!--BEGIN #post-0-->
                    <div id="post-0" <?php post_class(); ?>>
                        
                        <!--BEGIN .entry-content-->
                        <div class="entry-content">
                            <p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
                        <!--END .entry-content-->
                        </div>
                    
                    <!--END #post-0-->
                    </div>
                    
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
