<?php

/*-----------------------------------------------------------------------------------

 	Plugin Name: Custom Client Widget
 	Plugin URI: http://www.premiumpixels.com
 	Description: A widget that displays up to 8 client images
 	Version: 1.0
 	Author: Orman Clark
 	Author URI: http://www.premiumpixels.com
 
-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'tz_client_widgets' );

// Register widget
function tz_client_widgets() {
	register_widget( 'tz_Client_Widget' );
}

// Widget class
class tz_client_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function tz_Client_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'tz_client_widget',
		'description' => __('A widget that displays a your clients.', 'framework')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'tz_client_widget'
	);

	/* Create the widget. */
	$this->WP_Widget( 'tz_client_widget', __('Custom Client Widget', 'framework'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$message = $instance['message'];
	$image1 = $instance['image1'];
	$image2 = $instance['image2'];
	$image3 = $instance['image3'];
	$image4 = $instance['image4'];
	$image5 = $instance['image5'];
	$image6 = $instance['image6'];

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display client widget
	?>
		
		<div class="tz_client">
        
        	<?php if($message != '') : ?>
			<p><?php echo $message ?></p>
            <?php endif; ?>
            
            <ul class="clearfix">
            
                <?php if($image1 != '') : ?>
                <li><img src="<?php echo $image1; ?>" alt="" /></li>
                <?php endif; ?>
                
                <?php if($image2 != '') : ?>
                <li><img src="<?php echo $image2; ?>" alt="" /></li>
                <?php endif; ?>
                
                <?php if($image3 != '') : ?>
                <li><img src="<?php echo $image3; ?>" alt="" /></li>
                <?php endif; ?>
                
                <?php if($image4 != '') : ?>
                <li><img src="<?php echo $image4; ?>" alt="" /></li>
                <?php endif; ?>
                
                <?php if($image5 != '') : ?>
                <li><img src="<?php echo $image5; ?>" alt="" /></li>
                <?php endif; ?>
                
                <?php if($image6 != '') : ?>
                <li><img src="<?php echo $image6; ?>" alt="" /></li>
                <?php endif; ?>
                
            </ul>
            
        </div>
	
	<?php
 
	// After widget (defined by theme functions file)
	echo $after_widget;
	
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip tags to remove HTML (important for text inputs)
	$instance['title'] = strip_tags( $new_instance['title'] );
	
	// Stripslashes for html inputs
	$instance['message'] = stripslashes( $new_instance['message']);
	$instance['image1'] = stripslashes( $new_instance['image1']);
	$instance['image2'] = stripslashes( $new_instance['image2']);
	$instance['image3'] = stripslashes( $new_instance['image3']);
	$instance['image4'] = stripslashes( $new_instance['image4']);
	$instance['image5'] = stripslashes( $new_instance['image5']);
	$instance['image6'] = stripslashes( $new_instance['image6']);

	// No need to strip tags

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Clients',
		'message' => stripslashes( 'Write a description here.'),
		'image1' => '',
		'image2 ' => '',
		'image3' => '',
		'image4' => '',
		'image5' => '',
		'image6' => '' 
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
    <!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
    

	<!-- Message: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'message' ); ?>"><?php _e('Message:', 'framework') ?></label>
		<textarea style="height:200px;" class="widefat" id="<?php echo $this->get_field_id( 'message' ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['message'] ), ENT_QUOTES)); ?></textarea>
	</p>
	
	<!-- Name: Image Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'image1' ); ?>"><?php _e('Image 1 (66px x 60):', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image1' ); ?>" name="<?php echo $this->get_field_name( 'image1' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['image1'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <!-- Name: Image Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e('Image 2 (66px x 60):', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['image2'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <!-- Name: Image Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'image3' ); ?>"><?php _e('Image 36 6px x 60:', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image3' ); ?>" name="<?php echo $this->get_field_name( 'image3' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['image3'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <!-- Name: Image Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'image4' ); ?>"><?php _e('Image 4 (66px x 60):', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image4' ); ?>" name="<?php echo $this->get_field_name( 'image4' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['image4'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <!-- Name: Image Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'image5' ); ?>"><?php _e('Image 5 (66px x 60):', 'framework') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'image5' ); ?>" name="<?php echo $this->get_field_name( 'image5' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['image5'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <!-- Name: Image Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'image6' ); ?>"><?php _e('Image 6 (66px x 60):', 'framework') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'image6' ); ?>" name="<?php echo $this->get_field_name( 'image6' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['image6'] ), ENT_QUOTES)); ?>" />
	</p>
		
	<?php
	}
}
?>