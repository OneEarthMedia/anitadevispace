<?php
/************************************************
 *
 * Anita Devi -- Testimonial Widget
 *
 * Author: Rahu @ One Earth Media
 * Website: oneearth.xyz
 *
 ************************************************/

class oem_testimonial_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_options = array( 
			'classname' => 'oem--testimonial-widget',
			'description' => 'Testimonial Widget',
		);
		parent::__construct( 'oem_testimonial_widget', 'Anita Devi -- Testimonial Widget', $widget_options );
	}

	/**
	 * Outputs the content of the widget
	 */
	public function widget( $args, $instance ) {
        
		echo $args['before_widget'];
        
        // Testimonial
        if ( !empty( $instance['testimonial'] ) ) {
            echo '<div class="testimonial-widget" data-aos="fade">';
            echo '<p class="testimonial"><span>'. $instance['testimonial'] .'</span></p>';
            echo '<div class="name" data-aos="fade">'. $instance['name']. '</div>';
            echo '</div>';
        }
        
		echo $args['after_widget'];
        
	}

	/**
	 * Outputs the options form on admin
	 */
	public function form( $instance ) {
        
        $name = ! empty( $instance['name'] ) ? $instance['name'] : '';
        $testimonial = ! empty( $instance['testimonial'] ) ? $instance['testimonial'] : '';
        
		?>
            
            <div id="testimonial-widget-form">
                
                <!-- Main Heading -->
                <p>
                <label for="<?php echo esc_attr($this->get_field_id('name')); ?>"><?php esc_attr_e('Name:', 'oem'); ?></label> 
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'name' )); ?>" type="text" value="<?php echo esc_attr($name); ?>">
                </p>

                <!-- Description -->
                <p>
                <label for="<?php echo esc_attr($this->get_field_id('Testimonial')); ?>"><?php esc_attr_e('Testimonial:', 'oem'); ?></label> 
                <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'testimonial' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'testimonial' )); ?>" rows="6"><?php echo esc_attr($testimonial); ?></textarea>
                </p>
                                
            </div>

		<?php
        
	}

	/**
	 * Processing widget options on save
	 */
	public function update( $new_instance, $old_instance ) {
        
		$instance = array();
        
        $instance['name'] = ( !empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
		
        $instance['testimonial'] = ( !empty( $new_instance['testimonial'] ) ) ? strip_tags( $new_instance['testimonial'] ) : '';
        
		return $instance;
        
	}
}
?>