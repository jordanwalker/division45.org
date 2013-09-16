			
            <!-- END #content-inner -->
			</div>
        
		<!-- END #content -->
		</div>
			
		<!-- BEGIN #footer -->
		<div id="footer">
        	
            <!-- BEGIN #footer-inner .clearfix -->
        	<div id="footer-inner" class="clearfix">
            
            	<!-- BEGIN #footer-nav -->
                <div id="footer-nav">
                
                <?php if(has_nav_menu( 'footer-menu' )) : ?> 
            	
                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'depth' => 1 ) ); ?>
                
                <?php endif; ?>
		
                	<p class="copyright">&copy; Copyright <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. </p>
                
                <!-- END #footer-nav -->
                </div>
                
                <?php 
				
					$twitter = get_option('tz_twitter');
					$facebook = get_option('tz_facebook');
					
					if($twitter == '')
						$twitter = FALSE;
						
					if($facebook == '')
						$facebook = FALSE;
						
				?>
                
                <?php if($twitter || $facebook) : ?>
                
                <ul id="footer-social">
                
                	<?php if($twitter) : ?>
                	<li class="twitter"><a href="<?php echo $twitter; ?>"><?php _e('Follow on Twitter','framework'); ?></a></li>
                    <?php endif; if($facebook) : ?>
                    <li class="facebook"><a href="<?php echo $facebook; ?>"><?php _e('Follow on Facebook','framework'); ?></a></li>
                    <?php endif; ?>
                    
                </ul>
                
                <?php endif; ?>
            
            <!-- END #footer-inner .clearfix -->
            </div>
		
		<!-- END #footer -->
		</div>
		
	<!-- END #container -->
	</div> 
		
	<!-- Theme Hook -->
	<?php wp_footer(); ?>
			
<!--END body-->
</body>
<!--END html-->
</html>