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

?>

	<footer id="colophon" class="site-footer">
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