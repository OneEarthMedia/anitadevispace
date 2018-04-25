<?php
/**
 * This snippet was originally developed with CMB2 version 2.3.0.
 *
 * CMB2: Theme Options
 *
 * Author: One Earth Media
 * Author URI: oneearth.xyz
 * Author email: rahu@oneearth.xyz
 *
 * @package oem
 */

add_action( 'cmb2_admin_init', 'oem_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */

function oem_register_theme_options_metabox() {
	/**
	 * Registers options page menu item and form.
	 */
	$oem_options = new_cmb2_box( array(
		'id'           => 'oem_option_metabox',
		'title'        => esc_html__( 'Theme Options', 'oem' ),
		'object_types' => array( 'options-page' ),
		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */
		'option_key'      => 'oem_options',
		'parent_slug'     => 'themes.php',
	) );
    
	/*
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */
    
    // Header Settings
    // ***********************************************
    
    // Section Title
    $oem_options->add_field( array(
        'name' => 'Deployment Version',
        'desc' => 'Increment this each time the stylesheet of scripts have been changed to force browser reload.',
        'type' => 'title',
        'id'   => 'oem_version_title'
    ) );
    // My Account Text ENG
    $oem_options->add_field( array(
        'name'    => 'Version',
        'id'      => 'oem_deployment_version',
        'type'    => 'text',
    ) );
    
    
    // Logo Settings
    // ***********************************************
    
    // Section Title
    $oem_options->add_field( array(
        'name' => 'Logo',
        'desc' => 'Manage the websites logo files',
        'type' => 'title',
        'id'   => 'oem_logo_title'
    ) );
    // Upload Logo Image
    $oem_options->add_field( array(
        'name'    => 'Header Logo',
        'desc'    => 'Upload an image',
        'id'      => 'header_logo',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Upload Image' // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => array( 100, 100 ), // Image size to use when previewing in the admin.
    ) );
    
    // Header Settings
    // ***********************************************
    
    // Section Title
    $oem_options->add_field( array(
        'name' => 'Header',
        'desc' => 'Manage the header options',
        'type' => 'title',
        'id'   => 'oem_header_title'
    ) );  
    
    // Google Settings
    // ***********************************************
    
    // Section Title
    $oem_options->add_field( array(
        'name' => 'Google API',
        'desc' => 'API codes for Google Maps, Analytics etc.',
        'type' => 'title',
        'id'   => 'oem_google_settings'
    ) );
    // Google Analytics Code
    $oem_options->add_field( array(
        'name'    => 'Google Analytics',
        'desc'    => 'E.g.: UA-XXXXX-Y',
        'id'      => 'google_analytics_code',
        'type'    => 'text',
    ) );
    
    // Contact Details
    // ***********************************************
    
    // Section Title
    $oem_options->add_field( array(
        'name' => 'Contact',
        'desc' => 'Business Contact Details',
        'type' => 'title',
        'id'   => 'oem_contact_options'     
    ) );
    // Phone Number
    $oem_options->add_field( array(
        'name'    => 'Phone Number',
        'id'      => 'contact_phone',
        'type'    => 'text',
    ) );
    // Email
    $oem_options->add_field( array(
        'name'    => 'Email',
        'id'      => 'contact_email',
        'type'    => 'text',
    ) );    
    
    // Social Media Settings
    // ***********************************************
    
    // Section Title
    $oem_options->add_field( array(
        'name' => 'Social Media',
        'desc' => 'Links to social media pages',
        'type' => 'title',
        'id'   => 'oem_social_media'
    ) );
    // Facebook
    $oem_options->add_field( array(
        'name'    => 'Facebook',
        'id'      => 'oem_facebook_url',
        'type'    => 'text',
    ) );
    // Instagram
    $oem_options->add_field( array(
        'name'    => 'Instagram',
        'id'      => 'oem_instagram_url',
        'type'    => 'text',
    ) );
    // Twitter
    $oem_options->add_field( array(
        'name'    => 'Twitter',
        'id'      => 'oem_twitter_url',
        'type'    => 'text',
    ) );    
    // Google Plus
    $oem_options->add_field( array(
        'name'    => 'Google+',
        'id'      => 'oem_googleplus_url',
        'type'    => 'text',
    ) );    
    // YouTube
    $oem_options->add_field( array(
        'name'    => 'YouTube',
        'id'      => 'oem_youtube_url',
        'type'    => 'text',
    ) );
    // Default Open Graph Image for all Pages
    $oem_options->add_field( array(
        'name'    => 'Default Open Graph Image',
        'desc'    => 'Upload an image',
        'id'      => 'default_og_image',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Upload Image' // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => array( 150, 150 ), // Image size to use when previewing in the admin.
    ) );    
    
    // Footer Settings
    // ***********************************************
    
    // Section Title
    $oem_options->add_field( array(
        'name' => 'Footer',
        'desc' => 'Any settings meant for the bottom of the page',
        'type' => 'title',
        'id'   => 'oem_footer_options'        
    ) );
    // Copyright ENG
    $oem_options->add_field( array(
        'name'    => 'Footer Copyright (ENG)',
        'desc'    => 'Use [year] tag to add a dynamic year number',
        'id'      => 'footer_copyright',
        'type'    => 'text',
    ) );
  
    
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function oem_get_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( 'oem_options', $key, $default );
	}
	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( 'oem_options', $default );
	$val = $default;
	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}
	return $val;
}