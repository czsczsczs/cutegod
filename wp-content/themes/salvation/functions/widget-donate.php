<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: MyThemeShop PayPal Donate Widget
	Version: 1.0
	
-----------------------------------------------------------------------------------*/


class mts_donate_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'mts_donate_widget',
			__('MyThemeShop: Donate','mythemeshop'),
			array( 'description' => __( 'Display PayPal donate widget','mythemeshop' ) )
		);
	}

 	public function form( $instance ) {
		$defaults = array(
			'title' => '',
			'text' => '',
			'amount' => '',
			'paypal_id' => ''
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$text = esc_textarea( $instance['text'] );
		$amount = isset( $instance[ 'amount' ] ) ? $instance[ 'amount' ] : '';
		$paypal_id = isset( $instance[ 'paypal_id' ] ) ? $instance[ 'paypal_id' ] : '';
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','mythemeshop' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:','mythemeshop' ); ?></label>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<p>
			<input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs', 'mythemeshop'); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'amount' ); ?>"><?php _e( 'Default Amount','mythemeshop' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'amount' ); ?>" name="<?php echo $this->get_field_name( 'amount' ); ?>" type="number" min="1" step="1" value="<?php echo $amount; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'paypal_id' ); ?>"><?php _e( 'PayPal ID:','mythemeshop' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'paypal_id' ); ?>" name="<?php echo $this->get_field_name( 'paypal_id' ); ?>" type="text" value="<?php echo esc_attr( $paypal_id ); ?>" />
		</p>
	   
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );

		if ( current_user_can('unfiltered_html') ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		}
		$instance['filter'] = isset( $new_instance['filter'] );

		$instance['amount'] = intval( $new_instance['amount'] );
		$instance['paypal_id'] = strip_tags( $new_instance['paypal_id'] );
		
		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );

		$amount = (int) $instance['amount'];
		$paypal_id = $instance['paypal_id'];

		echo $before_widget;
		if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
		echo '<div class="mts-donate-widget-wrap">';
			echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text;
			if ( empty( $paypal_id ) ) {
				echo '<div class="message_box warning"><p>'.__('Please enter your PayPal ID ( email address )', 'mythemeshop').'</p></div>';
			} else {
				echo '<form name="_xclick" class="" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
					echo '<input type="hidden" name="cmd" value="_donations">';
					echo '<input type="hidden" name="business" value="'.$paypal_id.'">';
					echo '<input type="hidden" name="currency_code" value="USD">';
					echo '<span class="currency">$</span>';
					echo '<input type="text" name="amount" value="'.$amount.'" size="14" class="amount" />';
					echo '<input type="submit" name="submit" value="'.__('Give', 'mythemeshop').'" class="button donate-submit" />';
				echo '</form>';
			}
			echo '<div class="donate-footer">';
				echo '<div class="donate-paypal-img-wrap"><div class="donate-paypal-img"><img src="'.get_template_directory_uri() . '/images/paypal.png"></div></div>';
				echo '<div class="donate-cards">';
					echo '<img src="'.get_template_directory_uri() . '/images/mastercard.png" class="donate-card">';
					echo '<img src="'.get_template_directory_uri() . '/images/visa.png" class="donate-card">';
					echo '<img src="'.get_template_directory_uri() . '/images/amex.png" class="donate-card">';
					echo '<img src="'.get_template_directory_uri() . '/images/discover.png" class="donate-card">';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		echo $after_widget;
	}

}

// Register Widget
add_action( 'widgets_init', 'mts_register_donate_widget' );
function mts_register_donate_widget() {
	register_widget( "mts_donate_widget" );
}