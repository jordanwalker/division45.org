<?php

/*-----------------------------------------------------------------------------------

	Add image upload metaboxes to Portfolio items

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'tz_';
 
$meta_box = array(
	'id' => 'tz-meta-box',
	'title' => 'Optional Image Settings',
	'page' => 'photo',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
				'name' => 'Small Image',
				'desc' => '80px x 80px',
				'id' => $prefix.'upload_image',
				'type' => 'text',
				'std' => ''
			),
		array(
				'name' => '',
				'desc' => '',
				'id' => 'upload_image_button',
				'type' => 'button',
				'std' => 'Browse'
		),
		array(
				'name' => 'Medium Image',
				'desc' => '120px x 120px',
				'id' => $prefix.'upload_image_medium',
				'type' => 'text',
				'std' => ''
			),
		array(
				'name' => '',
				'desc' => '',
				'id' => 'upload_image_button_medium',
				'type' => 'button',
				'std' => 'Browse'
		),
		array(
				'name' => 'Large Image',
				'desc' => '240px x 240px',
				'id' => $prefix.'upload_image_large',
				'type' => 'text',
				'std' => ''
			),
		array(
				'name' => '',
				'desc' => '',
				'id' => 'upload_image_button_large',
				'type' => 'button',
				'std' => 'Browse'
		),
		array(
				'name' => 'Image Details',
				'desc' => 'This is a short description of the image that will be placed in the bottom right side of the overlay.',
				'id' => $prefix.'image_desc',
				'type' => 'text',
				'std' => ''
			),
	),
	
);



add_action('admin_menu', 'tz_add_box');


/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function tz_add_box() {
	global $meta_box;
 
	add_meta_box($meta_box['id'], $meta_box['title'], 'tz_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}


/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function tz_show_box() {
	global $meta_box, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings are optional. If these settings are left blank, the featured image will be used. Upload an image and then click "insert into post". To delete an image, simply clear the field.', 'framework').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tz_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;

			case 'select-tax':
			
				echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
				$args = array(
					'show_option_all'    => __('All '.$field['taxonomy'], 'framework'),
					'hide_empty'         => 0, 
					'echo'               => 1,
					'selected'           => $meta ? $meta : $field['std'],
					'hierarchical'       => 0, 
					'name'               => $field['id'],
					'class'              => 'postform',
					'depth'              => 0,
					'tab_index'          => 0,
					'taxonomy'           => $field['taxonomy'],
					'hide_if_empty'      => false 	
				);
		
				wp_dropdown_categories( $args );
				
				echo 	'</td>', '</tr>';
	
				
			break;

		}

	}
 
	echo '</table>';
}

 
add_action('save_post', 'tz_save_data');


/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function tz_save_data($post_id) {
	global $meta_box, $meta_box_page;
 
	// verify nonce
	if (!wp_verify_nonce($_POST['tz_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------*/
 
function tz_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('tz-upload', get_template_directory_uri() . '/functions/js/upload-button.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('tz-upload');
}
function tz_admin_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'tz_admin_scripts');
add_action('admin_print_styles', 'tz_admin_styles');