			
            <!--BEGIN #callout-->
            <div id="callout" class="clearfix">
            	
                <?php 
				
				$text = get_option('tz_callout_text'); 
				$button = get_option('tz_callout_button');
				$buttonText = get_option('tz_callout_button_text');
				$buttonLink = get_option('tz_callout_button_link');
				
				?>
                
                <?php if($text != '') : ?>
                <p><?php echo stripslashes(nl2br(htmlspecialchars_decode($text))); ?></p>
                <?php endif; ?>
                
                <?php if($button == 'true') : ?>
                <div class="callout-button">
                	
                    <a href="<?php echo $buttonLink; ?>">
						<?php echo stripslashes(htmlspecialchars_decode($buttonText)); ?>
                    </a>
                
                </div>
                <?php endif; ?>

            <!--END #callout-->
            </div>
            
            <div class="page-bottom"></div>