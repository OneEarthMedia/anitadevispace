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
            $album_style = $instance['album_style'];
        
            $get_album = get_post_meta($album_id, 'oem_album');
        
            echo '<div class="album-widget owl-carousel oem-album-'. $album_id .' '. $album_style .'" data-album-id="'. $album_id .'">';
            
            foreach ($get_album[0] as $image) {
                
                echo '<div class="album-image" style="background:url('. $image .');" data-image-url="'. $image .'"></div>';
                
            }
        
            echo '</div>';
        
        endif;
        
        // echo $args['after_widget'];
    }

	/**
	 * Outputs the options form on admin
	 */
	public function form( $instance ) {
        
        $album_select = !empty( $instance['album_select'] ) ? $instance['album_select'] : '';
        $album_style = !empty( $instance['album_style'] ) ? $instance['album_style'] : '';
        
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

            <!-- Size -->
            <p>
            <?php
            $album_styles = array(
                'slideshow'    => 'Slideshow',
                'banner'       => 'Banner',
            );
            ?>
            <label for="<?php echo esc_attr($this->get_field_id( 'album_style' )); ?>"><?php esc_attr_e('Style:', 'oem'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'album_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'album_style' )); ?>">
                <?php
                foreach ($album_styles as $style => $name) :
                    ($album_style == $style) ? $style_selected = 'selected' : $style_selected = '';
                    echo '<option value="'. $style .'" '. $style_selected .'>'. $name .'</option>';
                endforeach;
                ?>
            </select>
            </p>
		<?php
        
	}

	/**
	 * Processing widget options on save
	 */
	public function update( $new_instance, $old_instance ) {
        
		$instance = array();
        
        $instance['album_select'] = ( !empty( $new_instance['album_select'] ) ) ? strip_tags( $new_instance['album_select'] ) : '';
        
        $instance['album_style'] = ( !empty( $new_instance['album_style'] ) ) ? strip_tags( $new_instance['album_style'] ) : '';

		return $instance;
        
	}
}
?>