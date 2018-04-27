<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Anita_Devi_Space
 */

$footer_hide_curve = get_post_meta(get_the_ID(), 'oem_hide_footer_curve', true);
( !empty($footer_hide_curve) ) ? $curve_class = 'curveless' : $curve_class = '';
?>

	<footer id="colophon" class="site-footer <?php echo $curve_class; ?>">
        <div class="curve-overlay"></div>
        
        <div class="footer-newsletter">
            <h2 class="optin-heading cursive large center"><span class="sub"><?php _e('Join My', 'oem'); ?></span><?php _e('Love Letter', 'oem'); ?></h2>
            <div class="optin-form">
            <?php
            gravity_form( 2, false, false);
            ?>
            </div>
            <p class="optin-message"><?php _e('I promise to only send meaningful and informative letters every couple of months', 'oem'); ?> <i class="fas fa-heart"></i></p>
        </div>
        <div class="footer-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'main-nav',
				'menu_id'        => 'footer-menu',
                'depth'          => '1',
			) );
			?>            
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
        </div>
		<div class="site-info">
            <?php $footer_copyright = str_replace( '[year]', date('Y'), oem_get_option('footer_copyright') ); ?>
            <div class="footer-copyright"><?php echo $footer_copyright; ?></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php
// Post Custom CSS into the footer - only solution I could come up with, sorry. It works. Semantics are for the paperwolf.
$custom_css = get_post_meta(get_the_ID(), '_solar_custom_css', true);
if ( !empty($custom_css) ) echo '<style>'. $custom_css .'</style>';

wp_footer();
?>

</body>
</html>