<?php
/**
 * Enqueue scripts and styles
 */

// Admin scripts
function oem_widget_admin_scripts() {
	wp_enqueue_script( 'oem-widgets-admin-js', get_template_directory_uri() . '/inc/widgets/oem-widgets-admin.js', array('jquery'), '1.0.0', true );
    
	wp_enqueue_style( 'oem-widgets-admin-css', get_template_directory_uri() . '/inc/widgets/oem-widgets-admin.css');    
}
add_action( 'admin_enqueue_scripts', 'oem_widget_admin_scripts' );

// Front end scripts
function oem_widget_scripts() {
    
	wp_enqueue_script( 'oem-widgets-js', get_template_directory_uri() . '/inc/widgets/oem-widgets.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'oem_widget_scripts' );

/** 
 * Register Widgets
 */
  
function oem_register_widgets() {
    
    register_widget( 'oem_heading_widget' );
    register_widget( 'oem_testimonial_widget' );
    register_widget( 'oem_album_widget' );
    
}
add_action( 'widgets_init', 'oem_register_widgets' );

/**
 * Load the widget files
 */

$widget_path = get_template_directory() . '/inc/widgets/';

// Heading Widget
require $widget_path . 'heading-widget/heading-widget.php';

// Testimonial Widget
require $widget_path . 'testimonial-widget/testimonial-widget.php';

// Album Widget
require $widget_path . 'album-widget/album-widget.php';

?>