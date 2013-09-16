<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

			<!--BEGIN #primary .hfeed--> 
			<div id="primary" class="hfeed clearfix">
      
                
                <!--BEGIN #column-left .column --> 
            	<div id="column-left" class="column">
                
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Left') ) ?>
                
                <!--END #column-left .column --> 
                </div>
                
                <!--BEGIN #columns-center .column --> 
            	<div id="column-center" class="column">
                
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Center') ) ?>
                
                <!--END #columns-center .column --> 
                </div>
                
                <!--BEGIN #columns-right .column --> 
            	<div id="column-right" class="column">
                
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Right') ) ?>
                
                <!--END #columns-right .column --> 
                </div>
			
			<!--END #primary .hfeed-->
			</div>
			
			


<?php get_footer(); ?>