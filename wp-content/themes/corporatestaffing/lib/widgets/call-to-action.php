<?php
/**
 * Modification of the Genesis Featured Page Widget
 * to add customizable text area option.
 * 
 */


add_action( 'widgets_init', create_function( '', "register_widget('WSM_CTA_Widget');" ) );


class WSM_CTA_Widget extends WP_Widget {

	/**
	 * Constructor. Set the default widget options and create widget.
	 */
	function WSM_CTA_Widget() {
		$widget_ops = array( 'classname' => 'wsm-cta', 'description' => __('Displays backgrounds and customizable headline and Link', 'genesis') );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'wsm-cta-widget' );
		$this->WP_Widget( 'wsm-cta-widget', __('Web Savvy - CTA Widget', 'genesis'), $widget_ops, $control_ops );
	}

	/**
	 * Echo the widget content.
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	function widget($args, $instance) {
		extract($args);

		$instance = wp_parse_args( (array) $instance, array(
			'wsm-cta1-title' => '',
			'wsm-cta1-morelink' => '',
			'wsm-cta1-icon-url' => '',
			'wsm-cta1-icon-alignment' => '',
			'wsm-cta2-title' => '',
			'wsm-cta2-morelink' => '',
			'wsm-cta2-icon-url' => '',
			'wsm-cta2-icon-alignment' => '',
			'wsm-cta3-title' => '',
			'wsm-cta3-morelink' => '',
			'wsm-cta3-icon-url' => '',
			'wsm-cta3-icon-alignment' => '',
			'wsm-cta4-title' => '',
			'wsm-cta4-morelink' => '',
			'wsm-cta4-icon-url' => '',
			'wsm-cta4-icon-alignment' => '',

		) );
		
		
		echo $before_widget;
			
			// Set up the CTA's
			
			echo '<ul class="cta-boxes">';
	
			// CTA 1
			
			if (!empty( $instance['wsm-cta1-title'] ) ) {
			if (!empty( $instance['wsm-cta1-morelink'] ) ) :
			
			echo '<li class="cta1 ' . esc_attr( $instance['wsm-cta1-icon-alignment'] ) . '">';
				echo '<a href="' . esc_attr( $instance['wsm-cta1-morelink'] ) . '">';
					if (!empty( $instance['wsm-cta1-icon-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta1-icon-url'] ) . '" alt="'. strip_tags( $instance['wsm-cta1-title'] ) . '" class="cta-icon"/>';
					}
					
					$title1 = wp_kses_post($instance['wsm-cta1-title']);
					echo '<h3 class="cta-title"><span>'. $title1 .'</span></h3>';
					
				echo '</a>';
			echo '</li>';
				
			else:
			
			echo '<li class="cta1 ' . esc_attr( $instance['wsm-cta1-icon-alignment'] ) . '">';
				echo '<a href="#">';
					if (!empty( $instance['wsm-cta1-icon-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta1-icon-url'] ) . '" alt="'. strip_tags( $instance['wsm-cta1-title'] ) . '" class="cta-icon"/>';
					}
					$title1 = wp_kses_post($instance['wsm-cta1-title']);
					echo '<h3 class="cta-title"><span>'. $title1 .'</span></h3>';
				echo '</a>';
			echo '</li>';
			
			endif;
		}
				
		// CTA 2
			
			if (!empty( $instance['wsm-cta2-title'] ) ) {
			if (!empty( $instance['wsm-cta2-morelink'] ) ) :
			
			echo '<li class="cta2 ' . esc_attr( $instance['wsm-cta2-icon-alignment'] ) . '">';
				echo '<a href="' . esc_attr( $instance['wsm-cta2-morelink'] ) . '">';
					if (!empty( $instance['wsm-cta2-icon-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta2-icon-url'] ) . '" alt="'. strip_tags( $instance['wsm-cta2-title'] ) . '" class="cta-icon"/>';
					}
					$title2 = wp_kses_post($instance['wsm-cta2-title']);
					echo '<h3 class="cta-title"><span>'. $title2 .'</span></h3>';
				echo '</a>';
			echo '</li>';
				
			else:
			
			echo '<li class="cta2' . esc_attr( $instance['wsm-cta2-icon-alignment'] ) . '">';
				echo '<a href="#">';
					if (!empty( $instance['wsm-cta2-icon-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta2-icon-url'] ) . '" alt="'. strip_tags( $instance['wsm-cta2-title'] ) . '" class="cta-icon"/>';
					}
					$title2 = wp_kses_post($instance['wsm-cta2-title']);
					echo '<h3 class="cta-title"><span>'. $title2 .'</span></h3>';
				echo '</a>';
			echo '</li>';
			
			endif;
			
			}
			
		// CTA 3
			
			if (!empty( $instance['wsm-cta3-title'] ) ) {
			if (!empty( $instance['wsm-cta3-morelink'] ) ) :
			
			echo '<li class="cta3 ' . esc_attr( $instance['wsm-cta3-icon-alignment'] ) . '">';
				echo '<a href="' . esc_attr( $instance['wsm-cta3-morelink'] ) . '">';
					if (!empty( $instance['wsm-cta3-icon-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta3-icon-url'] ) . '" alt="'. strip_tags( $instance['wsm-cta3-title'] ) . '" class="cta-icon"/>';
					}
					$title3 = wp_kses_post($instance['wsm-cta3-title']);
					echo '<h3 class="cta-title"><span>'. $title3 .'</span></h3>';
				echo '</a>';
			echo '</li>';
				
			else:
			
			echo '<li class="cta3 ' . esc_attr( $instance['wsm-cta3-icon-alignment'] ) . '">';
				echo '<a href="#">';
					if (!empty( $instance['wsm-cta3-icon-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta3-icon-url'] ) . '" alt="'. strip_tags( $instance['wsm-cta3-title'] ) . '" class="cta-icon"/>';
					}
					$title3 = wp_kses_post($instance['wsm-cta3-title']);
					echo '<h3 class="cta-title"><span>'. $title3 .'</span></h3>';
				echo '</a>';
			echo '</li>';
			
			endif;
			
			}
		
		// CTA 4
			
			if (!empty( $instance['wsm-cta4-title'] ) ) {
			if (!empty( $instance['wsm-cta4-morelink'] ) ) :
			
			echo '<li class="cta4 ' . esc_attr( $instance['wsm-cta4-icon-alignment'] ) . '">';
				echo '<a href="' . esc_attr( $instance['wsm-cta4-morelink'] ) . '">';
					if (!empty( $instance['wsm-cta4-icon-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta4-icon-url'] ) . '" alt="'. strip_tags( $instance['wsm-cta4-title'] ) . '" class="cta-icon"/>';
					}
					$title4 = wp_kses_post($instance['wsm-cta4-title']);
					echo '<h3 class="cta-title"><span>'. $title4 .'</span></h3>';
				echo '</a>';
			echo '</li>';
				
			else:
			
			echo '<li class="cta4">';
				echo '<a href="#">';
					if (!empty( $instance['wsm-cta4-icon-url'] ) ) {
					echo '<img src="'. esc_attr( $instance['wsm-cta4-icon-url'] ) . '" alt="'. strip_tags( $instance['wsm-cta4-title'] ) . '" class="cta-icon"/>';
					}
					$title4 = wp_kses_post($instance['wsm-cta4-title']);
					echo '<h3 class="cta-title"><span>'. $title4 .'</span></h3>';
				echo '</a>';
			echo '</li>';
			
			endif;
			
			}
				
					
			echo '</ul>';
				
				
			echo "\n\n";

		echo $after_widget;
		
		wp_reset_query();
	}

	/** Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update($new_instance, $old_instance) {
		$new_instance['wsm-cta1-title'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm-cta1-title']) ) );
		$new_instance['wsm-cta1-morelink'] = strip_tags( $new_instance['wsm-cta1-morelink'] );
		$new_instance['wsm-cta1-icon-url'] = strip_tags( $new_instance['wsm-cta1-icon-url'] );
		$new_instance['wsm-cta1-icon-alignment'] = strip_tags( $new_instance['wsm-cta1-icon-alignment'] );
		$new_instance['wsm-cta2-title'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm-cta2-title']) ) );
		$new_instance['wsm-cta2-morelink'] = strip_tags( $new_instance['wsm-cta2-morelink'] );
		$new_instance['wsm-cta2-icon-url'] = strip_tags( $new_instance['wsm-cta2-icon-url'] );
		$new_instance['wsm-cta2-icon-alignment'] = strip_tags( $new_instance['wsm-cta2-icon-alignment'] );
		$new_instance['wsm-cta3-title'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm-cta3-title']) ) );
		$new_instance['wsm-cta3-morelink'] = strip_tags( $new_instance['wsm-cta3-morelink'] );
		$new_instance['wsm-cta3-icon-url'] = strip_tags( $new_instance['wsm-cta3-icon-url'] );
		$new_instance['wsm-cta3-icon-alignment'] = strip_tags( $new_instance['wsm-cta3-icon-alignment'] );
		$new_instance['wsm-cta4-title'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm-cta4-title']) ) );
		$new_instance['wsm-cta4-morelink'] = strip_tags( $new_instance['wsm-cta4-morelink'] );
		$new_instance['wsm-cta4-icon-url'] = strip_tags( $new_instance['wsm-cta4-icon-url'] );
		$new_instance['wsm-cta4-icon-alignment'] = strip_tags( $new_instance['wsm-cta4-icon-alignment'] );
		return $new_instance;
	}

	/** Echo the settings update form.
	 *
	 * @param array $instance Current settings
	 */
	function form($instance) {

		$instance = wp_parse_args( (array)$instance, array(
		
			'wsm-cta1-title' => '',
			'wsm-cta1-morelink' => '',
			'wsm-cta1-icon-url' => '',
			'wsm-cta1-icon-alignment' => '',
			'wsm-cta2-title' => '',
			'wsm-cta2-morelink' => '',
			'wsm-cta2-icon-url' => '',
			'wsm-cta2-icon-alignment' => '',
			'wsm-cta3-title' => '',
			'wsm-cta3-morelink' => '',
			'wsm-cta3-icon-url' => '',
			'wsm-cta3-icon-alignment' => '',
			'wsm-cta4-title' => '',
			'wsm-cta4-morelink' => '',
			'wsm-cta4-icon-url' => '',
			'wsm-cta4-icon-alignment' => '',
		) );
		
		$title1 = esc_attr($instance['wsm-cta1-title']);
		$title2 = esc_attr($instance['wsm-cta2-title']);
		$title3 = esc_attr($instance['wsm-cta3-title']);
		$title4 = esc_attr($instance['wsm-cta4-title']);

?>
	<!-- CTA 1 -->
	
		<p><label for="<?php echo $this->get_field_id('wsm-cta1-title'); ?>"><?php _e('CTA 1 Title ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta1-title'); ?>" name="<?php echo $this->get_field_name('wsm-cta1-title'); ?>" value="<?php echo $title1; ?>" class="widefat" /></p>
	
		<p><label for="<?php echo $this->get_field_id('wsm-cta1-morelink'); ?>"><?php _e('CTA 1 Link ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta1-morelink'); ?>" name="<?php echo $this->get_field_name('wsm-cta1-morelink'); ?>" value="<?php echo esc_attr( $instance['wsm-cta1-morelink'] ); ?>" class="widefat" /></p>
				
		<p><label for="<?php echo $this->get_field_id('wsm-cta1-icon-url'); ?>"><?php _e('CTA 1 Icon ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta1-icon-url'); ?>" name="<?php echo $this->get_field_name('wsm-cta1-icon-url'); ?>" value="<?php echo esc_attr( $instance['wsm-cta1-icon-url'] ); ?>" class="widefat" /></p>
				
		<p><label for="<?php echo $this->get_field_id('wsm-cta1-icon-alignment'); ?>"><?php _e('Icon Alignment', 'css'); ?>: </label>
			<select id="<?php echo $this->get_field_id('wsm-cta1-icon-alignment'); ?>" name="<?php echo $this->get_field_name('wsm-cta1-icon-alignment'); ?>">
				<option value="right-icon" <?php selected('right-icon', $instance['wsm-cta1-icon-alignment']); ?>><?php _e('Right', 'css'); ?></option>
				<option value="left-icon" <?php selected('left-icon', $instance['wsm-cta1-icon-alignment']); ?>><?php _e('Left', 'css'); ?></option>
			</select>
		</p>
	
	<hr style=" height: 2px; border-top: 1px solid #CCC; margin-bottom: 10px;">	
	
	<!-- CTA 2 -->
		
		<p><label for="<?php echo $this->get_field_id('wsm-cta2-title'); ?>"><?php _e('CTA 2 Title ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta2-title'); ?>" name="<?php echo $this->get_field_name('wsm-cta2-title'); ?>" value="<?php echo $title2; ?>" class="widefat" /></p>
	
		<p><label for="<?php echo $this->get_field_id('wsm-cta2-morelink'); ?>"><?php _e('CTA 2 Link ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta1-morelink'); ?>" name="<?php echo $this->get_field_name('wsm-cta2-morelink'); ?>" value="<?php echo esc_attr( $instance['wsm-cta2-morelink'] ); ?>" class="widefat" /></p>
				
		<p><label for="<?php echo $this->get_field_id('wsm-cta2-icon-url'); ?>"><?php _e('CTA 2 Icon ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta2-icon-url'); ?>" name="<?php echo $this->get_field_name('wsm-cta2-icon-url'); ?>" value="<?php echo esc_attr( $instance['wsm-cta2-icon-url'] ); ?>" class="widefat" /></p>
				
		<p><label for="<?php echo $this->get_field_id('wsm-cta2-icon-alignment'); ?>"><?php _e('Icon Alignment', 'css'); ?>: </label>
			<select id="<?php echo $this->get_field_id('wsm-cta2-icon-alignment'); ?>" name="<?php echo $this->get_field_name('wsm-cta2-icon-alignment'); ?>">
				<option value="right-icon" <?php selected('right-icon', $instance['wsm-cta2-icon-alignment']); ?>><?php _e('Right', 'css'); ?></option>
				<option value="left-icon" <?php selected('left-icon', $instance['wsm-cta2-icon-alignment']); ?>><?php _e('Left', 'css'); ?></option>
			</select>
		</p>
		
	<hr style=" height: 2px; border-top: 1px solid #CCC; margin-bottom: 10px;">	
	
	<!-- CTA 3 -->
	
		<p><label for="<?php echo $this->get_field_id('wsm-cta3-title'); ?>"><?php _e('CTA 3 Title ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta3-title'); ?>" name="<?php echo $this->get_field_name('wsm-cta3-title'); ?>" value="<?php echo $title3; ?>" class="widefat" /></p>
	
		<p><label for="<?php echo $this->get_field_id('wsm-cta3-morelink'); ?>"><?php _e('CTA 3 Link ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta1-morelink'); ?>" name="<?php echo $this->get_field_name('wsm-cta3-morelink'); ?>" value="<?php echo esc_attr( $instance['wsm-cta3-morelink'] ); ?>" class="widefat" /></p>
				
		<p><label for="<?php echo $this->get_field_id('wsm-cta3-icon-url'); ?>"><?php _e('CTA 3 Icon ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta3-icon-url'); ?>" name="<?php echo $this->get_field_name('wsm-cta3-icon-url'); ?>" value="<?php echo esc_attr( $instance['wsm-cta3-icon-url'] ); ?>" class="widefat" /></p>
				
		<p><label for="<?php echo $this->get_field_id('wsm-cta3-icon-alignment'); ?>"><?php _e('Icon Alignment', 'css'); ?>: </label>
			<select id="<?php echo $this->get_field_id('wsm-cta3-icon-alignment'); ?>" name="<?php echo $this->get_field_name('wsm-cta3-icon-alignment'); ?>">
				<option value="right-icon" <?php selected('right-icon', $instance['wsm-cta3-icon-alignment']); ?>><?php _e('Right', 'css'); ?></option>
				<option value="left-icon" <?php selected('left-icon', $instance['wsm-cta3-icon-alignment']); ?>><?php _e('Left', 'css'); ?></option>
			</select>
		</p>
	
	<hr style=" height: 2px; border-top: 1px solid #CCC; margin-bottom: 10px;">
	
	
	<!-- CTA 4 -->
	
	<p><label for="<?php echo $this->get_field_id('wsm-cta4-title'); ?>"><?php _e('CTA 4 Title ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta2-title'); ?>" name="<?php echo $this->get_field_name('wsm-cta4-title'); ?>" value="<?php echo $title4; ?>" class="widefat" /></p>
	
		<p><label for="<?php echo $this->get_field_id('wsm-cta4-morelink'); ?>"><?php _e('CTA 4 Link ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta1-morelink'); ?>" name="<?php echo $this->get_field_name('wsm-cta4-morelink'); ?>" value="<?php echo esc_attr( $instance['wsm-cta4-morelink'] ); ?>" class="widefat" /></p>
				
		<p><label for="<?php echo $this->get_field_id('wsm-cta4-icon-url'); ?>"><?php _e('CTA 4 Icon ', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-cta4-icon-url'); ?>" name="<?php echo $this->get_field_name('wsm-cta4-icon-url'); ?>" value="<?php echo esc_attr( $instance['wsm-cta4-icon-url'] ); ?>" class="widefat" /></p>
				
		<p><label for="<?php echo $this->get_field_id('wsm-cta4-icon-alignment'); ?>"><?php _e('Icon Alignment', 'css'); ?>: </label>
			<select id="<?php echo $this->get_field_id('wsm-cta4-icon-alignment'); ?>" name="<?php echo $this->get_field_name('wsm-cta4-icon-alignment'); ?>">
				<option value="right-icon" <?php selected('right-icon', $instance['wsm-cta4-icon-alignment']); ?>><?php _e('Right', 'css'); ?></option>
				<option value="left-icon" <?php selected('left-icon', $instance['wsm-cta4-icon-alignment']); ?>><?php _e('Left', 'css'); ?></option>
			</select>
		</p>
	
	<hr style=" height: 2px; border-top: 1px solid #CCC; margin-bottom: 10px;">

	
	<?php
	}
}