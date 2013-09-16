		<!--BEGIN #sidebar .aside-->
		<div id="sidebar" class="aside">
			
            <?php
			
			if(!is_page()) {
				
				if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Main Sidebar') );
			
			} else {
				
				if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Page Sidebar') );
			}
			
			 ?>
		
		<!--END #sidebar .aside-->
		</div>