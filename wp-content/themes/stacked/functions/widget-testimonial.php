<?php

/*-----------------------------------------------------------------------------------

 	Plugin Name: Custom Testimonial Widget
 	Plugin URI: http://www.premiumpixels.com
 	Description: A widget that displays a single testimonial
 	Version: 1.0
 	Author: Orman Clark
 	Author URI: http://www.premiumpixels.com
 
-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'tz_testimonial_widgets' );

// Register widget
function tz_testimonial_widgets() {
	register_widget( 'tz_Testimonial_Widget' );
}

// Widget class
class tz_testimonial_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function tz_Testimonial_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'tz_testimonial_widget',
		'description' => __('A widget that displays a single testimonial.', 'framework')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'tz_testimonial_widget'
	);

	/* Create the widget. */
	$this->WP_Widget( 'tz_testimonial_widget', __('Custom Testimonial Widget', 'framework'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$message = $instance['message'];
	$name = $instance['name'];
	$business = $instance['business'];

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display testimonial widget
	?>
		
		<div class="tz_testimonial">
			<?php echo $message ?>
		</div>
		<?php if($name != '') : ?>
		<div class="tz_testimonial_desc">
            <p>
                <strong><?php echo $name; ?></strong><?php if($business != '') { echo ', '.$business; } ?>
            </p>
        </div>
        <?php endif; ?>
	
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
	$instance['name'] = stripslashes( $new_instance['name']);
	$instance['business'] = stripslashes( $new_instance['business']);

	// No need to strip tags

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Testimonial',
		'message' => stripslashes( 'Write your testimonial here.'),
		'name' => 'Orman Clark',
		'business' => 'Premium Pixels',
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
	
	<!-- Name: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Name:', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['name'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <!-- Business: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'business' ); ?>"><?php _e('Business:', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'business' ); ?>" name="<?php echo $this->get_field_name( 'business' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['business'] ), ENT_QUOTES)); ?>" />
	</p>
		
	<?php
	}
}
?>