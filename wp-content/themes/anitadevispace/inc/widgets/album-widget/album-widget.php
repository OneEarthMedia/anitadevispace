<?php
/************************************************
 *
 * Anita Devi -- Album Widget
 *
 * Author: Rahu @ One Earth Media
 * Website: oneearth.xyz
 *
 ************************************************/

class oem_album_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_options = array( 
			'classname' => 'oem--album-widget',
			'description' => 'Album Widget',
		);
		parent::__construct( 'oem_album_widget', 'Anita Devi -- Album Widget', $widget_options );
	}

	/**
	 * Outputs the content of the widget
	 */
	public function widget( $args, $instance ) {
        
		// echo $args['before_widget'];

        if ( !empty($instance['album_select']) ) :
            
            $album_id = $instance['album_select'];
        
            $get_album = get_post_meta($album_id, 'oem_album');
        
            echo '<div class="album-widget owl-carousel oem-album-'. $album_id .'">';
            
            foreach ($get_album[0] as $image) {
                
                echo '<div class="album-image" style="background:url('. $image .');" data-image-url="'. $image .'"></div>';
                
            }
        
            echo '</div>';
        
            ?>
            <script type="text/javascript">
                // Album Widget
                // ------------------------------------

                jQuery('.oem-album-<?php echo $album_id; ?>').owlCarousel({
                    loop:true,
                    autoplay:true,
                    autoplayTimeout:5000,
                    autoplayHoverPause:true,
                    responsiveClass: true,
                    nav: false,
                    navText: ['<span class="album-nav fa fa-angle-left"></span>','<span class="album-nav fa fa-angle-right"></span>'],
                    responsive: {
                        0:{
                            items:2,
                        },
                        960:{
                            items:3,
                        },
                        1280:{
                            items:5
                        }
                    }
                });
            </script>
            <?php
        
        endif;
        
        // echo $args['after_widget'];
    }

	/**
	 * Outputs the options form on admin
	 */
	public function form( $instance ) {
        
        $album_select = !empty( $instance['album_select'] ) ? $instance['album_select'] : '';
        $album_display = !empty( $instance['album_display'] ) ? $instance['album_display'] : '';
        
		?>
            <!-- Album Select -->
            <?php
            $album_args = array(
                'posts_per_page'   => -1,
                'orderby'          => 'date',
                'order'            => 'DESC',
                'post_type'        => 'oem_albums',
                'post_status'      => 'publish'
            );
            $get_albums = get_posts($album_args);
            ?>

            <label for="<?php echo esc_attr($this->get_field_id( 'album_select' )); ?>"><?php esc_attr_e('Select Album:', 'oem'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'album_select' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'album_select' )); ?>">
        
            <?php
            if ( isset($get_albums) ) :
                
                foreach ($get_albums as $album) {
                    
                    $album_id = $album->ID;
                    $album_title = $album->post_title;

                    ($album_select == $album_id) ? $album_selected = 'selected' : $album_selected = '';
                    echo '<option value="'. $album_id .'" '. $album_selected .'>'. $album_title.'</option>';
                    
                }
                
            endif;
            ?>
            </select>
		<?php
        
	}

	/**
	 * Processing widget options on save
	 */
	public function update( $new_instance, $old_instance ) {
        
		$instance = array();
        
        $instance['album_select'] = ( !empty( $new_instance['album_select'] ) ) ? strip_tags( $new_instance['album_select'] ) : '';

		return $instance;
        
	}
}
?>