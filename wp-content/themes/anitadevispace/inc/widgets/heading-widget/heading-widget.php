<?php
/************************************************
 *
 * Anita Devi Space -- Heading Widget
 *
 * Author: Rahu Aus ** One Earth Media
 * Website: oneearth.xyz
 *
 ************************************************/

class oem_heading_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_options = array( 
			'classname' => 'oem--heading-widget',
			'description' => 'Heading Widget',
		);
		parent::__construct( 'oem_heading_widget', 'Anita Devi -- Fancy Heading', $widget_options );
	}

	/**
	 * Outputs the content of the widget
	 */
	public function widget( $args, $instance ) {
        
        echo $args['before_widget'];
        
        $heading_style = '';
        
        ( isset($instance['first_line']) ) ? $first_line = $instance['first_line'] : $first_line = '';
        ( isset($instance['second_line']) ) ? $second_line = $instance['second_line'] : $second_line = '';
        
        if ( isset($instance['heading_style']) )
            $heading_style .= $instance['heading_style'] .' ';
        
        if ( isset($instance['heading_color']) )
            $heading_style .= $instance['heading_color'] .' ';
        
        if ( isset($instance['heading_alignment']) )
            $heading_style .= $instance['heading_alignment'] .' ';
        
        if ( isset($instance['heading_size']) )
            $heading_style .= $instance['heading_size'] .' ';
            

        if ( isset($instance['color_type']) )
            $heading_class .= $instance['color_type'] . ' ';
        
        echo '<h2 class="heading-widget '. $heading_style .'" data-aos="'. $instance['heading_animation'] .'"><span class="sub">'. $first_line .'</span>'. $second_line .'</h2>';
        
        echo $args['after_widget'];
    }

	/**
	 * Outputs the options form on admin
	 */
	public function form( $instance ) {
        
        $first_line = !empty( $instance['first_line'] ) ? $instance['first_line'] : '';
        $second_line = !empty( $instance['second_line'] ) ? $instance['second_line'] : '';
        $heading_style = !empty( $instance['heading_style'] ) ? $instance['heading_style'] : '';
        $heading_color = !empty( $instance['heading_color'] ) ? $instance['heading_color'] : '';
        $heading_alignment = !empty( $instance['heading_alignment'] ) ? $instance['heading_alignment'] : '';
        $heading_size = !empty( $instance['heading_size'] ) ? $instance['heading_size'] : '';
        $heading_animation = !empty( $instance['heading_animation'] ) ? $instance['heading_animation'] : '';
        
		?>

            <!-- First Line -->
            <p>
            <label for="<?php echo esc_attr($this->get_field_id('first_line')); ?>"><?php esc_attr_e('First Line:', 'oem'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'first_line' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'first_line' )); ?>" type="text" value="<?php echo esc_attr($first_line); ?>">
            </p>

            <!-- Second Line -->
            <p>
            <label for="<?php echo esc_attr($this->get_field_id('second_line')); ?>"><?php esc_attr_e('Second Line:', 'oem'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'second_line' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'second_line' )); ?>" type="text" value="<?php echo esc_attr($second_line); ?>">
            </p>

            <!-- Heading Style Dropdown -->
            <p>
            <?php
            $heading_styles = array(
                'cursive'          => 'Cursive',
                'sanskrit'         => 'Sanskrit',
            );
            ?>
            <label for="<?php echo esc_attr($this->get_field_id( 'heading_style' )); ?>"><?php esc_attr_e('Heading Style:', 'oem'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'heading_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'heading_style' )); ?>">
                <?php
                foreach ($heading_styles as $style => $name) :
                    ($heading_style == $style) ? $style_selected = 'selected' : $style_selected = '';
                    echo '<option value="'. $style .'" '. $style_selected .'>'. $name .'</option>';
                endforeach;
                ?>
            </select>
            </p>

            <!-- Color Dropdown -->
            <p>
            <?php
            $color_types = array(
                'dark'        => 'Dark',                
                'light'       => 'Light',
                'highlight'   => 'Highlight',
            );
            ?>
            <label for="<?php echo esc_attr($this->get_field_id( 'heading_color' )); ?>"><?php esc_attr_e('Color:', 'oem'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'heading_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'heading_color' )); ?>">
                <?php
                foreach ($color_types as $color => $name) :
                    ($heading_color == $color) ? $color_selected = 'selected' : $color_selected = '';
                    echo '<option value="'. $color .'" '. $color_selected .'>'. $name .'</option>';
                endforeach;
                ?>
            </select>
            </p>

            <!-- Alignment -->
            <p>
            <?php
            $alignment_options = array(
                'left'        => 'Left',                
                'center'      => 'Center',
                'right'       => 'Right',
            );
            ?>
            <label for="<?php echo esc_attr($this->get_field_id( 'heading_alignment' )); ?>"><?php esc_attr_e('Alignment:', 'oem'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'heading_alignment' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'heading_alignment' )); ?>">
                <?php
                foreach ($alignment_options as $alignment => $name) :
                    ($heading_alignment == $alignment) ? $alignment_selected = 'selected' : $alignment_selected = '';
                    echo '<option value="'. $alignment .'" '. $alignment_selected .'>'. $name .'</option>';
                endforeach;
                ?>
            </select>
            </p>

            <!-- Size -->
            <p>
            <?php
            $size_options = array(
                'regular'    => 'Regular',                
                'large'      => 'Large',
            );
            ?>
            <label for="<?php echo esc_attr($this->get_field_id( 'heading_size' )); ?>"><?php esc_attr_e('Size:', 'oem'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'heading_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'heading_size' )); ?>">
                <?php
                foreach ($size_options as $size => $name) :
                    ($heading_size == $size) ? $size_selected = 'selected' : $size_selected = '';
                    echo '<option value="'. $size .'" '. $size_selected .'>'. $name .'</option>';
                endforeach;
                ?>
            </select>
            </p>

            <!-- Animate Effect -->
            <p>
            <label for="<?php echo esc_attr($this->get_field_id('heading_animation')); ?>"><?php esc_attr_e('Animation Class (AOS):', 'oem'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'heading_animation' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'heading_animation' )); ?>" type="text" value="<?php echo esc_attr($heading_animation); ?>">
            </p>
		<?php
        
	}

	/**
	 * Processing widget options on save
	 */
	public function update( $new_instance, $old_instance ) {
        
		$instance = array();
        
        $instance['first_line'] = ( !empty( $new_instance['first_line'] ) ) ? strip_tags( $new_instance['first_line'] ) : '';
        
        $instance['second_line'] = ( !empty( $new_instance['second_line'] ) ) ? strip_tags( $new_instance['second_line'] ) : '';        
        
		$instance['heading_style'] = ( !empty( $new_instance['heading_style'] ) ) ? strip_tags( $new_instance['heading_style'] ) : '';

		$instance['heading_color'] = ( !empty( $new_instance['heading_color'] ) ) ? strip_tags( $new_instance['heading_color'] ) : '';

		$instance['heading_alignment'] = ( !empty( $new_instance['heading_alignment'] ) ) ? strip_tags( $new_instance['heading_alignment'] ) : '';
        
		$instance['heading_size'] = ( !empty( $new_instance['heading_size'] ) ) ? strip_tags( $new_instance['heading_size'] ) : '';        
        
		$instance['heading_animation'] = ( !empty( $new_instance['heading_animation'] ) ) ? strip_tags( $new_instance['heading_animation'] ) : '';        
        
		return $instance;
        
	}
}
?>