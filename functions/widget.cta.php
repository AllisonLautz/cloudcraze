<?php
/**
 * Adds cta_widget widget.
 */
class cta_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'cta', // Base ID
			__( 'Call to Action', 'text_domain' ), // Name
			array( 'description' => __( 'Call to Action Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['cta_title'] ) ) {
			echo $args['before_title'] . '<h2><a href="'.$instance['cta_url'].'">' . apply_filters( 'widget_title', $instance['cta_title'] ).'</a></h2>'. $args['after_title'];
		}
		if ( ! empty( $instance['cta_button_text'] ) ) {
			echo '<a class="button" href="'.$instance['cta_url'].'"" target="'.$instance['cta_target'].'">'.$instance['cta_button_text'].'</a>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$cta_title = ! empty( $instance['cta_title'] ) ? $instance['cta_title'] : __('', 'text_domain' );
		$cta_button_text = ! empty( $instance['cta_button_text'] ) ? $instance['cta_button_text'] : __( '', 'text_domain' );
		$cta_url = ! empty( $instance['cta_url'] ) ? $instance['cta_url'] : __( '', 'text_domain' );
		$cta_target = ! empty( $instance['cta_target'] ) ? $instance['cta_target'] : __( '', 'text_domain' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta_title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'cta_title' ); ?>" name="<?php echo $this->get_field_name( 'cta_title' ); ?>" type="text" value="<?php echo esc_attr( $cta_title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta_button_text' ); ?>"><?php _e( 'Button Text:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'cta_button_text' ); ?>" name="<?php echo $this->get_field_name( 'cta_button_text' ); ?>" type="text" value="<?php echo esc_attr( $cta_button_text ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta_url' ); ?>"><?php _e( 'Url:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'cta_url' ); ?>" name="<?php echo $this->get_field_name( 'cta_url' ); ?>" type="text" value="<?php echo esc_attr( $cta_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta_target' ); ?>"><?php _e( 'Link Target:' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'cta_target' ); ?>" name="<?php echo $this->get_field_name( 'cta_target' ); ?>" >
				<option value="false"  <?php if($cta_target == 'false') echo ' selected';?>>Default</option>
				<option value="_blank" <?php if($cta_target == '_blank') echo ' selected';?>>New Window</option>
			</select>
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['cta_title'] = ( ! empty( $new_instance['cta_title'] ) ) ? strip_tags( $new_instance['cta_title'] ) : '';
		$instance['cta_button_text'] = ( ! empty( $new_instance['cta_button_text'] ) ) ? strip_tags( $new_instance['cta_button_text'] ) : '';
		$instance['cta_url'] = ( ! empty( $new_instance['cta_url'] ) ) ? strip_tags( $new_instance['cta_url'] ) : '';
		$instance['cta_target'] = ( ! empty( $new_instance['cta_target'] ) ) ? strip_tags( $new_instance['cta_target'] ) : '';

		return $instance;
	}

} // class cta_widget

// register cta_widget widget
function register_cta() {
    register_widget( 'cta_widget' );
}
add_action( 'widgets_init', 'register_cta' );