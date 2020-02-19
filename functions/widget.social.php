<?php

	function buildSocial($alt){
		$result = '';
		$opt = get_option('theme_settings');
		//$social = array('facebook','google','linkedin','twitter','youtube');
		$social = themeSettings('socialOpts');
		foreach ($social as $net) {
			$n = cleanString($net);
			if($opt[$n]){
				$svg = $net;
				if($alt == true){$svg = $net."_alt";}
				$h = svg('#'.$svg,1,0,$net);
				$result .= '<a class="'.$n.'" href="'.$opt[$n].'" target="_blank">'.$h.'</a>';
			}
		}
		return $result;
	}

/**
 * Adds social_widget widget.
 */
class social_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'social', // Base ID
			__( 'Social Icons', 'text_domain' ), // Name
			array( 'description' => __( 'Social Icons Widget', 'text_domain' ), ) // Args
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
		if ( ! empty( $instance['social_title'] ) ) {
			echo $args['before_title'].apply_filters( 'widget_title', $instance['social_title'] ).$args['after_title'];
		}
		if($instance['social_icon'] == "alt"){echo buildSocial(true);}
		else{echo buildSocial(false);}
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
		$social_title = ! empty( $instance['social_title'] ) ? $instance['social_title'] : __('', 'text_domain' );
		$social_button_text = ! empty( $instance['social_button_text'] ) ? $instance['social_button_text'] : __( '', 'text_domain' );
		$social_url = ! empty( $instance['social_url'] ) ? $instance['social_url'] : __( '', 'text_domain' );
		$social_target = ! empty( $instance['social_target'] ) ? $instance['social_target'] : __( '', 'text_domain' );
		$social_icon = ! empty( $instance['social_icon'] ) ? $instance['social_icon'] : __( '', 'text_domain' );
		?>
		<p>
			<label for="<?=$this->get_field_id( 'social_title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?=$this->get_field_id( 'social_title' ); ?>" name="<?=$this->get_field_name( 'social_title' ); ?>" type="text" value="<?=esc_attr( $social_title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'social_icon' ); ?>"><?php _e( 'Icon Type:' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'social_icon' ); ?>" name="<?php echo $this->get_field_name( 'social_icon' ); ?>" >
				<option value="primary"  <?php if($social_icon == 'primary') echo ' selected';?>>Primary</option>
				<option value="alt" <?php if($social_icon == 'alt') echo ' selected';?>>Alternate</option>
			</select>
		</p>
		<p>Configure social icons in the main <a href="<?=get_option('home'); ?>/wp-admin/options-general.php?page=theme_options">Theme Options</a> screen</p>

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
		$instance['social_title'] = ( ! empty( $new_instance['social_title'] ) ) ? strip_tags( $new_instance['social_title'] ) : '';
		$instance['social_button_text'] = ( ! empty( $new_instance['social_button_text'] ) ) ? strip_tags( $new_instance['social_button_text'] ) : '';
		$instance['social_url'] = ( ! empty( $new_instance['social_url'] ) ) ? strip_tags( $new_instance['social_url'] ) : '';
		$instance['social_target'] = ( ! empty( $new_instance['social_target'] ) ) ? strip_tags( $new_instance['social_target'] ) : '';
		$instance['social_icon'] = ( ! empty( $new_instance['social_icon'] ) ) ? strip_tags( $new_instance['social_icon'] ) : '';

		return $instance;
	}

} // class social_widget

// register social_widget widget
function register_social() {
    register_widget( 'social_widget' );
}
add_action( 'widgets_init', 'register_social' );