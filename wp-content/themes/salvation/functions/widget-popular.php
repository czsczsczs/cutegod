<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: MyThemeShop Popular Posts
	Version: 2.0
	
-----------------------------------------------------------------------------------*/


class mts_popular_posts_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'mts_popular_posts_widget',
			__('MyThemeShop: Popular Posts','mythemeshop'),
			array( 'description' => __( 'Displays most Popular Posts with Thumbnail.','mythemeshop' ) )
		);
	}

 	public function form( $instance ) {
		$defaults = array(
			'qty' => 4,
			'comment_num' => 0,
			'date' => 0,
			'days' => 30,
			'show_thumb3' => 1,
			'show_excerpt' => 0,
			'excerpt_length' => 10,
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Popular Posts','mythemeshop' );
		$qty = isset( $instance[ 'qty' ] ) ? intval( $instance[ 'qty' ] ) : 5;
		$comment_num = isset( $instance[ 'comment_num' ] ) ? intval( $instance[ 'comment_num' ] ) : 1;
		$date = isset( $instance[ 'date' ] ) ? intval( $instance[ 'date' ] ) : 1;
		$days = isset( $instance[ 'days' ] ) ? intval( $instance[ 'days' ] ) : 30;
		$show_thumb3 = isset( $instance[ 'show_thumb3' ] ) ? intval( $instance[ 'show_thumb3' ] ) : 1;
		$show_excerpt = isset( $instance[ 'show_excerpt' ] ) ? esc_attr( $instance[ 'show_excerpt' ] ) : 1;
		$excerpt_length = isset( $instance[ 'excerpt_length' ] ) ? intval( $instance[ 'excerpt_length' ] ) : 10;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','mythemeshop' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
	       <label for="<?php echo $this->get_field_id( 'days' ); ?>"><?php _e( 'Popular limit (days):', 'mythemeshop' ); ?>
	       <input id="<?php echo $this->get_field_id( 'days' ); ?>" name="<?php echo $this->get_field_name( 'days' ); ?>" type="number" min="1" step="1" value="<?php echo $days; ?>" />
	       </label>
       </p>
	   
		<p>
			<label for="<?php echo $this->get_field_id( 'qty' ); ?>"><?php _e( 'Number of Posts to show','mythemeshop' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'qty' ); ?>" name="<?php echo $this->get_field_name( 'qty' ); ?>" type="number" min="1" step="1" value="<?php echo $qty; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_thumb3"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumb3"); ?>" name="<?php echo $this->get_field_name("show_thumb3"); ?>" value="1" <?php if (isset($instance['show_thumb3'])) { checked( 1, $instance['show_thumb3'], true ); } ?> />
				<?php _e( 'Show Thumbnails', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("date"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>" name="<?php echo $this->get_field_name("date"); ?>" value="1" <?php if (isset($instance['date'])) { checked( 1, $instance['date'], true ); } ?> />
				<?php _e( 'Show post date', 'mythemeshop'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("comment_num"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comment_num"); ?>" name="<?php echo $this->get_field_name("comment_num"); ?>" value="1" <?php checked( 1, $instance['comment_num'], true ); ?> />
				<?php _e( 'Show number of comments', 'mythemeshop'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_excerpt"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_excerpt"); ?>" name="<?php echo $this->get_field_name("show_excerpt"); ?>" value="1" <?php checked( 1, $instance['show_excerpt'], true ); ?> />
				<?php _e( 'Show excerpt', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
	       <label for="<?php echo $this->get_field_id( 'excerpt_length' ); ?>"><?php _e( 'Excerpt Length:', 'mythemeshop' ); ?>
	       <input id="<?php echo $this->get_field_id( 'excerpt_length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" type="number" min="1" step="1" value="<?php echo $excerpt_length; ?>" />
	       </label>
       </p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['qty'] = intval( $new_instance['qty'] );
		$instance['comment_num'] = intval( $new_instance['comment_num'] );
		$instance['date'] = intval( $new_instance['date'] );
		$instance['days'] = intval( $new_instance['days'] );
		$instance['show_thumb3'] = intval( $new_instance['show_thumb3'] );
		$instance['show_excerpt'] = intval( $new_instance['show_excerpt'] );
		$instance['excerpt_length'] = intval( $new_instance['excerpt_length'] );
		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$comment_num = $instance['comment_num'];
		$date = $instance['date'];
		$days = $instance['days'];
		$qty = (int) $instance['qty'];
		$show_thumb3 = (int) $instance['show_thumb3'];
		$show_excerpt = $instance['show_excerpt'];
		$excerpt_length = $instance['excerpt_length'];

		echo $before_widget;
		if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
		echo self::get_popular_posts( $qty, $comment_num, $date, $days, $show_thumb3, $show_excerpt, $excerpt_length );
		echo $after_widget;
	}

	public function get_popular_posts( $qty, $comment_num, $date, $days, $show_thumb3, $show_excerpt, $excerpt_length ) {
		global $post;
        $popular_days = array();
		if ( $days ) {
			$popular_days = array(
        		//set date ranges
        		'after' => "$days day ago",
        		'before' => 'today',
        		//allow exact matches to be returned
        		'inclusive'         => true,
        	);
		}
		
		$popular = get_posts( array( 
            'suppress_filters' => false, 
            'ignore_sticky_posts' => 1, 
            'orderby' => 'comment_count', 
            'numberposts' => $qty,
            'date_query' => $popular_days) );
            
		echo '<ul class="popular-posts">';
		foreach($popular as $post) :
			setup_postdata($post);
			?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php if ( $show_thumb3 == 1 ) : ?>
				    <?php the_post_thumbnail('widgetthumb',array('title' => '')); ?>
				<?php endif; ?>
				<?php the_title(); ?>	
			</a>
			<div class="meta">
				<?php if ( $date == 1 ) : ?>
					<?php the_time('F j, Y'); ?>
				<?php endif; ?>
				<?php if ( $date == 1 && $comment_num == 1) : ?>
					 &bull; 
				<?php endif; ?>
				<?php if ( $comment_num == 1 ) : ?>
					<?php echo comments_number(__('No Comment','mythemeshop'), __('One Comment','mythemeshop'), '<span class="comm">%</span> '.__('Comments','mythemeshop'));?>
				<?php endif; ?>
			</div> <!--end .entry-meta--> 	
			<?php if ( $show_excerpt == 1 ) : ?>
				<p>
					<?php echo mts_excerpt($excerpt_length); ?>
				</p>
			<?php endif; ?>
		</li>	
		<?php endforeach; wp_reset_postdata();
		echo '</ul>'."\r\n";
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget( "mts_popular_posts_widget" );' ) );