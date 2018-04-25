<?php
/**
 * Shortcodes - all of them
 *
 * Author: Rahu @ One Earth Media
 * oneearth.xyz
 *
 **/
 
// [show-events]
function oem_events_shortcode( $atts ) {
    extract(shortcode_atts(array(
        'link'  => '',
    ), $atts ));
    
    $events_args = array(
        'posts_per_page'   => -1,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'post_type'        => 'oem_events',
        'post_status'      => 'publish'
    );
    $get_events = get_posts($events_args);

    $output = '';
    
    if ( isset($get_events) ) :

        // Create simple events array with ID -> Start Date
        $sorted_events = array();
        $i = 0;
        foreach  ( $get_events as $event ) {
            $i++;
            $sorted_events[$i]['date'] = get_post_meta($event->ID, '_oem_event_date_start', true);
            $sorted_events[$i]['id'] = $event->ID;
        }
    
        // Re-arrange events based on start date
        function compare_event_dates($date1, $date2)
        {
            if (strtotime($date1['date']) > strtotime($date2['date']))
                return 1;
            else if (strtotime($date1['date']) < strtotime($date2['date'])) 
                return -1;
            else
                return 0;
        }
        usort($sorted_events, 'compare_event_dates');

        // Output ee-arranged events list
        $output .= '<ul id="events-list">';
    
        foreach ( $sorted_events as $event ) {

            $event_id = $event['id'];
            
            $event = array();
            $event['name'] = get_post_meta($event_id, '_oem_event_name', true);
            $event['start-date'] = str_replace('-', '/', get_post_meta($event_id, '_oem_event_date_start', true) );
            $event['end-date'] = str_replace('-', '/', get_post_meta($event_id, '_oem_event_date_end', true) );
            $event['excerpt'] = get_post_meta($event_id, '_oem_event_excerpt', true);
            $event['price'] = get_post_meta($event_id, '_oem_event_price', true);
            $event['info'] = get_post_meta($event_id, '_oem_event_info', true);
            
            $output .= '<li class="event">';
            
            // Event Header
            $output .= '<div class="event-header">';
            
            $output .= '<h3 class="name">'. $event['name'] .'</h3>';
            
            if ( !empty($event['end-date']) ) {
                // Start and end date with arrow inbetween
                $output .= '<div class="date"><span class="start">'. $event['start-date'] .'</span><i class="fas fa-long-arrow-alt-right"></i><span class="end">'. $event['end-date'] .'</span></div>';
            } else {
                // Start Date Only
                $output .= '<div class="date"><span class="start">'. $event['start-date'] .'</span></div>';
            }
            
            $output .= '</div>';
            
            // Event Content
            $output .= '<div class="event-content">';
            $output .= '<div class="excerpt">'. $event['excerpt'] .'</div>';
            $output .= '<div class="info-col">';
            if ( !empty($event['price']) )
                $output .= '<div class="price">'. $event['price'] .'</div>';
            $output .= '<a href="'. $event['info'] .'" class="info-button"><i class="fas fa-info-circle"></i></a>';
            $output .= '</div>';
            $output .= '</div>';
            
            $output .= '</li>';

        }
    
        $output .= '</ul>';

    endif;
    
    return $output;
}
add_shortcode( 'show-events', 'oem_events_shortcode' );

// [antispam email=""]
/*
function nuyu_email_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'email'  => '',
    ), $atts );
    
    if ( empty($a['email']) ) return;
    
    $email = $a['email'];
    $email_parts = explode('@', $email);
    
    return '<a class="protected-mail" href="mailto:'. antispambot($email, 1) .'" data-user="'. strrev( $email_parts[0] ) .'" data-domain="'. strrev( $email_parts[1] ) .'">@</a>';
    
}
add_shortcode( 'antispam', 'nuyu_email_shortcode' );
*/

// [social-icons]
function oem_social_icons_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'title'  => '',
    ), $atts );
    
    $facebook_url = oem_get_option( 'oem_facebook_url' );
    $twitter_url = oem_get_option( 'oem_twitter_url' );
    $instagram_url = oem_get_option( 'oem_instagram_url' );
    $youtube_url = oem_get_option( 'oem_youtube_url' );

    $output .= '<ul id="social-icons" data-aos="fade">';
    
    if ( !empty($facebook_url) )
        $output .= '<li class="facebook"><a class="fab fa-facebook-square" href="'. $facebook_url .'" target="_blank"></a></li>';

    if ( !empty($twitter_url) )
        $output .= '<li class="facebook"><a class="fab fa-twitter" href="'. $twitter_url .'" target="_blank"></a></li>';

    if ( !empty($instagram_url) )
        $output .= '<li class="facebook"><a class="fab fa-instagram" href="'. $instagram_url .'" target="_blank"></a></li>';

    if ( !empty($youtube_url) )
        $output .= '<li class="facebook"><a class="fab fa-youtube" href="'. $youtube_url .'" target="_blank"></a></li>'; 
    
    $output .= '</ul>';
    
    return $output;
    
}
add_shortcode( 'social-icons', 'oem_social_icons_shortcode' );

?>