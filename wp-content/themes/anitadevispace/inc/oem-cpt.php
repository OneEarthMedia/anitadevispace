<?php
/**
 * Create the ALBUMS post type
 */

// Register Post Type
function oem_albums_post_type() {
	$labels = array(
		'name'               => 'Albums',
		'singular_name'      => 'Album',
		'add_new'            => 'Add an Album',
		'add_new_item'       => 'Add an Album',
		'all_items'          => 'All Albums',
		'view_item'          => 'View Album',
		'search_items'       => 'Search',
		'not_found'          => 'No Albums Found',
		'not_found_in_trash' => 'Empty!', 
		'parent_item_colon'  => '',
		'menu_name'          => 'Albums'
	);
	
	$args = array(
		'labels'        => $labels,
		'menu_icon'	    => 'dashicons-images-alt2',
		'description'   => 'Single Album',
		'public'        => true,
		'menu_position' => 55,
		'supports'      => array( 'title' ),
		'hierarchical' => false,
		'has_archive'   => false,
		'rewrite' 		=> false,
	);
	register_post_type( 'oem_albums', $args );
}
add_action( 'init', 'oem_albums_post_type' );

// Add MetaBoxes with CMB2
function oem_album_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'oem_';

    /**
     * Initiate the metabox
     */
    $oem_album_cmb = new_cmb2_box( array(
        'id'            => 'oem_album_metaboxes',
        'title'         => 'Album',
        'object_types'  => array( 'oem_albums', ), // Post type
        // 'show_on'       => array( 'key' => 'page-template', 'value' => 'page.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );    
    
    // Album Images
    $oem_album_cmb->add_field( array(
        'name'    => 'Upload Images',
        'id'      => $prefix .'album',
        'type' => 'file_list',
        'query_args' => array( 'type' => 'image' ),
        'text'    => array(
            'add_upload_file_text' => 'Upload Images'
        ),
        'preview_size' => array( 150, 150 ),
    ) );
}
add_action( 'cmb2_admin_init', 'oem_album_metaboxes' );

/**
 * Create the EVENTS post type
 */

// Register Post Type
function oem_events_post_type() {
	$labels = array(
		'name'               => 'Events',
		'singular_name'      => 'Event',
		'add_new'            => 'Add an Event',
		'add_new_item'       => 'Add an Event',
		'all_items'          => 'All Events',
		'view_item'          => 'View Event',
		'search_items'       => 'Search',
		'not_found'          => 'No Event Found',
		'not_found_in_trash' => 'Empty!', 
		'parent_item_colon'  => '',
		'menu_name'          => 'Events'
	);
	
	$args = array(
		'labels'        => $labels,
		'menu_icon'	    => 'dashicons-calendar-alt',
		'description'   => 'Single Event',
		'public'        => true,
		'menu_position' => 55,
		'supports'      => array( 'title' ),
		'hierarchical' => false,
		'has_archive'   => false,
		'rewrite' 		=> false,
	);
	register_post_type( 'oem_events', $args );
}
add_action( 'init', 'oem_events_post_type' );

// Add MetaBoxes with CMB2
function oem_events_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_oem_event_';

    /**
     * Initiate the metabox
     */
    $oem_event_cmb = new_cmb2_box( array(
        'id'            => 'oem_event_metaboxes',
        'title'         => 'Event',
        'object_types'  => array( 'oem_events', ), // Post type
        // 'show_on'       => array( 'key' => 'page-template', 'value' => 'page.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );
    // Name
    $oem_event_cmb->add_field( array(
        'name'    => 'Name',
        'desc'    => 'Name of the event',
        'id'      => $prefix .'name',
        'type'    => 'text',
    ) );    
    // Price
    $oem_event_cmb->add_field( array(
        'name'    => 'Price',
        'desc'    => 'Information about the price of the event',
        'id'      => $prefix .'price',
        'type'    => 'text',
    ) );
    // More info link
    $oem_event_cmb->add_field( array(
        'name'    => 'Info Link',
        'desc'    => 'Link for the more info button',
        'id'      => $prefix .'info',
        'type'    => 'text',
    ) );    
    // Start Date
    $oem_event_cmb->add_field( array(
        'name'    => 'Start Date',
        'desc'    => 'Start Date',
        'id'      => $prefix .'date_start',
        'type'    => 'text_date',
        'date_format' => 'd-m-Y',
    ) );
    // End Date
    $oem_event_cmb->add_field( array(
        'name'    => 'End Date',
        'desc'    => 'End Date',
        'id'      => $prefix .'date_end',
        'type'    => 'text_date',
        'date_format' => 'd-m-Y',
    ) );    
    // Excerpt
    $oem_event_cmb->add_field( array(
        'name'    => 'Excerpt',
        'desc'    => 'Shport Description',
        'id'      => $prefix .'excerpt',
        'type'    => 'textarea_small',
    ) );
    // Excerpt
    $oem_event_cmb->add_field( array(
        'name'    => 'Description',
        'desc'    => 'Full Description',
        'id'      => $prefix .'descriptin',
        'type'    => 'textarea',
    ) );
    
}
add_action( 'cmb2_admin_init', 'oem_events_metaboxes' );

?>