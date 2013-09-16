<?php
/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called catalog
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'create_catalog_post_type' );
function create_catalog_post_type() {
	register_post_type( 'div_catalog',
		array(
			'labels' => array(
				'name' => __( 'Catalog' ),
				'singular_name' => __( 'Catalog' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'catalog'),
			'hierarchical'=>true,
			'supports'=>array('title','editor','author','thumbnail','excerpt','custom-fields','comments','page-attributes','post-formats'),
		)
	);
}
function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    create_catalog_post_type();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called slides
/*-----------------------------------------------------------------------------------*/

function tz_create_post_type_slides() 
{
	$labels = array(
		'name' => __( 'Slides'),
		'singular_name' => __( 'Slide' ),
		'add_new' => _x('Add New', 'slide'),
		'add_new_item' => __('Add New Slide'),
		'edit_item' => __('Edit Slide'),
		'new_item' => __('New Slide'),
		'view_item' => __('View Slide'),
		'search_items' => __('Search Slides'),
		'not_found' =>  __('No slides found'),
		'not_found_in_trash' => __('No slides found in Trash'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','custom-fields')
	  ); 
	  
	  register_post_type(__( 'slide', 'framework' ),$args);
}


/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called portfolio
/*-----------------------------------------------------------------------------------*/

function tz_create_post_type_portfolios() 
{
	$labels = array(
		'name' => __( 'Portfolio', 'framework'),
		'singular_name' => __( 'Portfolio', 'framework' ),
		'add_new' => __('Add New', 'framework'),
		'add_new_item' => __('Add New Portfolio', 'framework'),
		'edit_item' => __('Edit Portfolio', 'framework'),
		'new_item' => __('New Portfolio', 'framework'),
		'view_item' => __('View Portfolio', 'framework'),
		'search_items' => __('Search Portfolio', 'framework'),
		'not_found' =>  __('No portfolios found', 'framework'),
		'not_found_in_trash' => __('No portfolios found in Trash', 'framework'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','custom-fields','excerpt','comments')
	  ); 
	  
	  register_post_type(__( 'portfolio', 'framework' ),$args);
}


/*-----------------------------------------------------------------------------------*/
/*	Create custom taxonomies for the portfolio post type
/*-----------------------------------------------------------------------------------*/

function tz_build_taxonomies(){
	register_taxonomy(__( "skill-type", 'framework' ), array(__( "portfolio", 'framework' )), array("hierarchical" => true, "label" => __( "Skill Types", 'framework' ), "singular_label" => __( "Skill Type", 'framework' ), "rewrite" => array('slug' => 'skill-type', 'hierarchical' => true))); 
}
  
function tz_slide_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Slide Title', 'framework' )
        );  
  
        return $columns;  
}  
 

/*-----------------------------------------------------------------------------------*/
/*	Edit the portfolio columns
/*-----------------------------------------------------------------------------------*/

function tz_portfolio_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Portfolio Item Title', 'framework' ),
            "type" => __( 'type', 'framework' )
        );  
  
        return $columns;  
}  

/*-----------------------------------------------------------------------------------*/
/*	Show the taxonomies within the columns
/*-----------------------------------------------------------------------------------*/

function tz_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case __( 'type' ):  
                echo get_the_term_list($post->ID, __( 'skill-type', 'framework' ), '', ', ','');  
                break;
        }  
}  

add_action( 'init', 'tz_create_post_type_slides' );
//add_action( 'init', 'tz_create_post_type_portfolios' );
add_action( 'init', 'tz_build_taxonomies', 0 );
add_filter("manage_edit-slide_columns", "tz_slide_edit_columns");  
add_filter("manage_edit-portfolio_columns", "tz_portfolio_edit_columns");  
add_action("manage_posts_custom_column",  "tz_portfolio_custom_columns");  
?>