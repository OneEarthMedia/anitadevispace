<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Anita_Devi_Space
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'oem' ); ?></a>

    <nav id="mobile-navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'main-nav',
            'menu_id'        => 'mobile-menu',
        ) );
        ?>        
    </nav>
    
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			$header_logo = oem_get_option('header_logo');
            ?>
        
            <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $header_logo; ?>" title="<?php bloginfo( 'name' ); ?><" alt="<?php bloginfo( 'name' ); ?><"></a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
            <a class="toggle-mobnav" href="#"><i class="fas fa-bars"></i></a>
            <div class="lang-nav">
                <?php
                // Language Selector
                // do_action('wpml_add_language_selector');
                ?>
            </div>            
            <ul class="social-icons">
                <?php
                $facebook_url = oem_get_option( 'oem_facebook_url' );
                $twitter_url = oem_get_option( 'oem_twitter_url' );
                $instagram_url = oem_get_option( 'oem_instagram_url' );
                $youtube_url = oem_get_option( 'oem_youtube_url' );
                
                if ( !empty($facebook_url) )
                    echo '<li class="facebook"><a class="fab fa-facebook-square" href="'. $facebook_url .'" target="_blank"></a></li>';
                
                if ( !empty($twitter_url) )
                    echo '<li class="facebook"><a class="fab fa-twitter" href="'. $twitter_url .'" target="_blank"></a></li>';

                if ( !empty($instagram_url) )
                    echo '<li class="facebook"><a class="fab fa-instagram" href="'. $instagram_url .'" target="_blank"></a></li>';
                
                if ( !empty($youtube_url) )
                    echo '<li class="facebook"><a class="fab fa-youtube" href="'. $youtube_url .'" target="_blank"></a></li>'; 
                ?>
            </ul>            
			<?php
			wp_nav_menu( array(
				'theme_location' => 'main-nav',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
        
	</header><!-- #masthead -->
    
    <?php
    $banner_image = get_post_meta(get_the_ID(), 'oem_top_banner_image', true);
    
    $banner_conent[] = array();
    // Get Banner Content Settings
    $banner_content['hide'] = get_post_meta(get_the_ID(), 'oem_banner_content_hide', true);
    
    if ( !empty($banner_content['hide']) ) {
        
        $banner_content['color'] = get_post_meta(get_the_ID(), 'oem_banner_color', true);
        $banner_content['pattern'] = get_post_meta(get_the_ID(), 'oem_banner_pattern_hide', true);
        $banner_content['width'] = get_post_meta(get_the_ID(), 'oem_banner_content_width', true);
        $banner_content['align'] = get_post_meta(get_the_ID(), 'oem_banner_content_align', true);
        $banner_content['heading-1'] = get_post_meta(get_the_ID(), 'oem_banner_heading_1', true);
        $banner_content['heading-2'] = get_post_meta(get_the_ID(), 'oem_banner_heading_2', true);
        $banner_content['heading-style'] = get_post_meta(get_the_ID(), 'oem_banner_heading_style', true);
        $banner_content['heading-color'] = get_post_meta(get_the_ID(), 'oem_banner_heading_color', true);
        $banner_content['content'] = get_post_meta(get_the_ID(), 'oem_banner_content', true);
        $banner_content['read-more'] = get_post_meta(get_the_ID(), 'oem_banner_read_more', true);
        
    }
    
    if ( !empty($banner_image ) ) {
        
        echo '<div id="page-banner" style="background-image:url('. $banner_image .')">';
        
        if ( !empty($banner_content['hide']) ) {
        
            $default_color = '#4c351e';
            $default_width = '650px';
            $defaut_align = 'left';
            
            if ( empty($banner_content['color'] ) ) $banner_content['color'] = $default_color;
            if ( empty($banner_content['width'] ) ) $banner_content['width'] = $default_width;
            if ( empty($banner_content['align'] ) ) $banner_content['align'] = $default_align;
            
            echo '<div class="banner-content '. $banner_content['align'] .'" style="background-color:'. $banner_content['color'] .';max-width:'. $banner_content['width'] .'">';
                if ( empty($banner_content['pattern']) ) {
                    echo '<div class="pattern-overlay"></div>';
                }
                
                echo '<div class="content">';
                
                echo '<h1 class="heading cursive '. $banner_content['heading-color'] .'"><span class="sub">'. $banner_content['heading-1'] .'</span>'. $banner_content['heading-2'] .'</h1>';
            
                echo '<div class="excerpt">'. $banner_content['content'] .'</div>';
                
                ( $banner_content['heading-color'] == 'dark' ) ? $scroll_button_class = 'dark' : $scroll_button_class = '';
                echo '<a href="#content" class="read-more scroll-to '. $scroll_button_class .'">'. $banner_content['read-more'] .'</a>';
                
                echo '</div>';
            
            echo '</div>';
            
        }
        
        echo '</div>';
    
    }
    
    ?>