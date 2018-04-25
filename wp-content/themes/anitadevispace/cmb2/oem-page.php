<?php
/**
 * This snippet was originally developed with CMB2 version 2.3.0.
 *
 * CMB2: Default Pages Post Type Meta Boxes
 *
 * Author: One Earth Media
 * Author URI: oneearth.xyz
 * Author email: rahu@oneearth.xyz
 *
 * @package oem
 */

add_action( 'cmb2_admin_init', 'oem_page_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function oem_page_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'oem_';

    /**
     * Initiate the metabox
     */
    $oem_banner_cmb = new_cmb2_box( array(
        'id'            => 'oem_page_banner_metaboxes',
        'title'         => 'Banner Options',
        'object_types'  => array( 'page', ), // Post type
        // 'show_on'       => array( 'key' => 'page-template', 'value' => 'page.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );    
    
    // General
    $oem_page_cmb = new_cmb2_box( array(
        'id'            => 'oem_page_metaboxes',
        'title'         => 'Page Options',
        'object_types'  => array( 'page', ), // Post type
        // 'show_on'       => array( 'key' => 'page-template', 'value' => 'page.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );
    
    // Banner
    // *****************************    
    // Upload Banner
    $oem_banner_cmb->add_field( array(
        'name'    => 'Banner Image',
        'desc'    => 'Upload the top banner image. Ideal size 1600px x 768px.',
        'id'      => $prefix .'top_banner_image',
        'type'    => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Upload Image'
        ),
        'preview_size' => array( 250, 250 ),
    ) );
    // Hide Content    
    $oem_banner_cmb->add_field( array(
        'name' => 'Show Content',
        'desc' => 'Check to show the banner content area',
        'id'   => $prefix .'banner_content_hide',
        'type' => 'checkbox',
    ) );
    $oem_banner_cmb->add_field( array(
        'name'    => 'Background Color',
        'id'      => $prefix .'banner_color',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'options' => array(
            'alpha' => true,
        ),
    ) );
    // Hide Pattern Overlay
    $oem_banner_cmb->add_field( array(
        'name' => 'Pattern Overlay',
        'desc' => 'Disable pattern overlay',
        'id'   => $prefix .'banner_pattern_hide',
        'type' => 'checkbox',
    ) );    
    $oem_banner_cmb->add_field( array(
        'name'    => 'Content Width',
        'desc'    => 'add the unit behind (e.g. PX, %, EM etc.). Default value is 650px;',
        'id'      => $prefix .'banner_content_width',
        'type'    => 'text',
    ) );
    $oem_banner_cmb->add_field( array(
        'name'             => 'Align Content:',
        'desc'             => 'Default: Left',
        'id'               => $prefix .'banner_content_align',
        'type'             => 'select',
        'options'          => array(
            'left'      => 'Left',
            'right'      => 'Right',
        ),
    ) );    
    // Content Heading
    $oem_banner_cmb->add_field( array(
        'name'    => 'Heading (Line 1)',
        'desc'    => 'This is the first line of the fancy heading',
        'id'      => $prefix .'banner_heading_1',
        'type'    => 'text',
    ) );
    $oem_banner_cmb->add_field( array(
        'name'    => 'Heading (Line 2)',
        'desc'    => 'This is the second line of the fancy heading',
        'id'      => $prefix .'banner_heading_2',
        'type'    => 'text',
    ) );
    $oem_banner_cmb->add_field( array(
        'name'             => 'Heading Style',
        'id'               => $prefix .'banner_heading_style',
        'type'             => 'select',
        'options'          => array(
            'cursive'      => 'Cursive',
            'sanskrit'    => 'Sanskrit',
        ),
    ) );
    $oem_banner_cmb->add_field( array(
        'name'             => 'Heading Color',
        'id'               => $prefix .'banner_heading_color',
        'type'             => 'select',
        'options'          => array(
            'dark'        => 'Dark',
            'light'       => 'Light',
            'highlight'   => 'Highlight',
            'gold'   => 'Gold',
        ),
    ) );    
    // Banner Content
    $oem_banner_cmb->add_field( array(
        'name'    => 'Banner Content',
        'id'      => $prefix .'banner_content',
        'type'    => 'wysiwyg',
        'options' => array(),
    ) );
    $oem_banner_cmb->add_field( array(
        'name'    => 'Read More Button',
        'desc'    => 'Label for the READ MORE button. Leave empty to omit the button.',
        'id'      => $prefix .'banner_read_more',
        'type'    => 'text',
    ) ); 
    
    // General Options
    // *****************************
    // Open Graph Image
    $oem_page_cmb->add_field( array(
        'name'    => 'Open Graph Image',
        'desc'    => 'Social Sharing Image. Ideal size 1200px x 1200px. Important elements must be vertically centered',
        'id'      => $prefix .'social_share_image',
        'type'    => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Upload Image'
        ),
        'preview_size' => array( 150, 150 ),
    ) );
    // Custom style
    $oem_page_cmb->add_field( array(
        'name' => 'Custom CSS',
        'desc' => 'The CSS written here will be placed into the header of this page.',
        'id' => $prefix .'custom_css',
        'type' => 'textarea_code'
    ) );
}