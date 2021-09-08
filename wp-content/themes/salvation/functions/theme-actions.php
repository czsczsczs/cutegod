<?php
$mts_options = get_option(MTS_THEME_NAME);
/*------------[ Meta ]-------------*/
if ( ! function_exists( 'mts_meta' ) ) {
	function mts_meta(){
	global $mts_options, $post;
?>
<?php if ($mts_options['mts_favicon'] != ''){ ?>
	<link rel="icon" href="<?php echo $mts_options['mts_favicon']; ?>" type="image/x-icon" />
<?php } ?>
<!--iOS/android/handheld specific -->
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php if($mts_options['mts_prefetching'] == '1') { ?>
<?php if (is_front_page()) { ?>
	<?php $my_query = new WP_Query('posts_per_page=1'); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<link rel="prefetch" href="<?php the_permalink(); ?>">
	<link rel="prerender" href="<?php the_permalink(); ?>">
	<?php endwhile; wp_reset_query(); ?>
<?php } elseif (is_singular()) { ?>
	<link rel="prefetch" href="<?php echo home_url(); ?>">
	<link rel="prerender" href="<?php echo home_url(); ?>">
<?php } ?>
<?php } ?>
    <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>" />
    <meta itemprop="url" content="<?php echo site_url(); ?>" />
    <?php if ( is_singular() ) { ?>
    <meta itemprop="creator accountablePerson" content="<?php $user_info = get_userdata($post->post_author); echo $user_info->first_name.' '.$user_info->last_name; ?>" />
    <?php } ?>
<?php }
}

/*------------[ Head ]-------------*/
if ( ! function_exists( 'mts_head' ) ){
	function mts_head() {
	global $mts_options
?>
<?php echo $mts_options['mts_header_code']; ?>
<?php }
}
add_action('wp_head', 'mts_head');

/*------------[ Copyrights ]-------------*/
if ( ! function_exists( 'mts_copyrights_credit' ) ) {
	function mts_copyrights_credit() { 
	global $mts_options
?>
<!--start copyrights-->

<span><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>" rel="nofollow"><?php bloginfo('name'); ?></a> Copyright &copy; <?php echo date("Y") ?>.</span>
<span><?php echo $mts_options['mts_copyrights']; ?>&nbsp;<a href="#top" class="toplink to-top" rel="nofollow"><i class=" fa fa-chevron-up"></i></a></span>
<!--end copyrights-->
<?php }
}

/*------------[ footer ]-------------*/
if ( ! function_exists( 'mts_footer' ) ) {
	function mts_footer() { 
	global $mts_options;
?>
<script type="text/javascript">
    // Enable parallax images for different sections
    jQuery(window).load(function() {
        <?php if ( $mts_options['mts_bottom_header_parallax'] == '1' && $mts_options['mts_bottom_header'] == '1' && ! ( is_home() && !empty( $mts_options['mts_alt_homepage'] ) ) ) : ?>
            jQuery('#page-title').parallax('50%', 0.5, true);
        <?php endif; ?>
        <?php if ( $mts_options['mts_homepage_slider_parallax'] == '1' && is_home() && $mts_options['mts_featured_slider'] == '1' && $mts_options['mts_alt_homepage'] == '1' ) : ?>
            jQuery('#homepage-slider li').parallax('50%', -0.5, true);
        <?php endif; ?>
        <?php if ( $mts_options['mts_homepage_audio_player_parallax'] == '1' && is_home() && mts_is_active_section('audio_player') ) : ?>
            jQuery('#audio-player').parallax('50%', 0.5, true);
        <?php endif; ?>
        <?php if ( $mts_options['mts_homepage_services_parallax'] == '1' && is_home() && mts_is_active_section('services') ) : ?>
            jQuery('#services').parallax('50%', 0.5, true);
        <?php endif; ?>
        <?php if ( $mts_options['mts_homepage_statuses_parallax'] == '1' && is_home() && mts_is_active_section('statuses') ) : ?>
            jQuery('#statuses').parallax('50%', 0.5, true);
        <?php endif; ?>
        <?php if ( $mts_options['mts_homepage_event_schedule_parallax'] == '1' && is_home() && mts_is_active_section('event_schedule') ) : ?>
            jQuery('#event-schedule').parallax('50%', 0.5, true);
        <?php endif; ?>
        <?php if ( $mts_options['mts_homepage_event_reservation_parallax'] == '1' && is_home() && mts_is_active_section('event_reservation') ) : ?>
            jQuery('#event-reservation').parallax('50%', 0.5, true);
        <?php endif; ?>
        <?php if ( $mts_options['mts_homepage_carousel_parallax'] == '1' && is_home() && mts_is_active_section('carousel') ) : ?>
            jQuery('#carousel').parallax('50%', 0.5, true);
        <?php endif; ?>
        <?php if ( $mts_options['mts_homepage_twitter_parallax'] == '1' && mts_has_twitter_section() ) : ?>
            jQuery('#twitt').parallax('50%', 0.5, true);
        <?php endif; ?>
    });
</script>
<?php if ($mts_options['mts_fade_effects'] == '1') { ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            window.scrollReveal = new scrollReveal();
        });
    </script>
<?php } ?>
<?php if ($mts_options['mts_analytics_code'] != '') { ?>
<!--start footer code-->
<?php echo $mts_options['mts_analytics_code']; ?>
<!--end footer code-->
<?php } ?>
<?php }
}

/*------------[ breadcrumb ]-------------*/
if (!function_exists('mts_the_breadcrumb')) {
    function mts_the_breadcrumb() {
    	echo '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="';
    	echo home_url();
    	echo '" rel="nofollow"><i class="fa fa-home"></i>&nbsp;'.__('Home','mythemeshop');
    	echo "</a></span>&nbsp;<i class='fa fa-angle-right'></i>&nbsp;";
    	if (is_category() || is_single()) {
    		$categories = get_the_category();
    		$output = '';
    		if($categories){
    			foreach($categories as $category) {
    				echo '<span typeof="v:Breadcrumb"><a href="'.get_category_link( $category->term_id ).'" rel="v:url" property="v:title">'.$category->cat_name.'</a></span>&nbsp;<i class="fa fa-angle-right"></i>&nbsp;';
    			}
    		}
    		if (is_single()) {
    			echo "<span typeof='v:Breadcrumb'><span property='v:title'>";
    			the_title();
    			echo "</span></span>";
    		}
    	} elseif (is_page()) {
    		echo "<span typeof='v:Breadcrumb'><span property='v:title'>";
    		the_title();
    		echo "</span></span>";
    	}
    }
}

/*------------[ schema.org-enabled the_category() and the_tags() ]-------------*/
function mts_the_category( $separator = ', ' ) {
    $categories = get_the_category();
    $count = count($categories);
    foreach ( $categories as $i => $category ) {
        echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'mythemeshop' ), $category->name ) . '" ' . ' itemprop="articleSection">' . $category->name.'</a>';
        if ( $i < $count - 1 )
            echo $separator;
    }
}
function mts_the_tags($before = null, $sep = ', ', $after = '') {
    if ( null === $before ) 
        $before = __('Tags: ', 'mythemeshop');
    
    $tags = get_the_tags();
    if (empty( $tags ) || is_wp_error( $tags ) ) {
        return;
    }
    $tag_links = array();
    foreach ($tags as $tag) {
        $link = get_tag_link($tag->term_id);
        $tag_links[] = '<a href="' . esc_url( $link ) . '" rel="tag" itemprop="keywords">' . $tag->name . '</a>';
    }
    echo $before.join($sep, $tag_links).$after;
}

/*------------[ pagination ]-------------*/
if (!function_exists('mts_pagination')) {
    function mts_pagination() {
        global $wp_query;
        echo '<div class="pagination">';
        echo paginate_links( apply_filters( 'mts_pagination_args', array(
            'base'         => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
            'format'       => '',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'prev_text'    => '<i class="fa fa-angle-left"></i>',
            'next_text'    => '<i class="fa fa-angle-right"></i>',
            'type'         => 'list',
            'end_size'     => 3,
            'mid_size'     => 3
        ) ) );
        echo '</div>';
    }
}

/*------------[ Related Posts ]-------------*/
if (!function_exists('mts_related_posts')) {
    function mts_related_posts() {
        global $post;
        $mts_options = get_option(MTS_THEME_NAME);
        if(!empty($mts_options['mts_related_posts'])) { ?>	
    		<!-- Start Related Posts -->
    		<?php 
            $empty_taxonomy = false;
            if (empty($mts_options['mts_related_posts_taxonomy']) || $mts_options['mts_related_posts_taxonomy'] == 'tags') {
                // related posts based on tags
                $tags = get_the_tags($post->ID); 
                if (empty($tags)) { 
                    $empty_taxonomy = true;
                } else {
                    $tag_ids = array(); 
                    foreach($tags as $individual_tag) {
                        $tag_ids[] = $individual_tag->term_id; 
                    }
                    $args = array( 'tag__in' => $tag_ids, 
                        'post__not_in' => array($post->ID), 
                        'posts_per_page' => $mts_options['mts_related_postsnum'], 
                        'ignore_sticky_posts' => 1, 
                        'orderby' => 'rand' 
                    );
                }
             } else {
                // related posts based on categories
                $categories = get_the_category($post->ID); 
                if (empty($categories)) { 
                    $empty_taxonomy = true;
                } else {
                    $category_ids = array(); 
                    foreach($categories as $individual_category) 
                        $category_ids[] = $individual_category->term_id; 
                    $args = array( 'category__in' => $category_ids, 
                        'post__not_in' => array($post->ID), 
                        'posts_per_page' => $mts_options['mts_related_postsnum'],  
                        'ignore_sticky_posts' => 1, 
                        'orderby' => 'rand' 
                    );
                }
             }
            if (!$empty_taxonomy) {
    		$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
    			echo '<div class="related-posts">';
                echo '<h4 class="section-title">'.__('Related Posts','mythemeshop').'</h4>';
                echo '<div class="related-posts-container clearfix">';
    			while( $my_query->have_posts() ) { $my_query->the_post(); ?>
        			<article class="related-post">
                        <div class="related-post-inner">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('related',array('title' => '')); ?>
                                <?php the_title(); ?>
                            </a>
                        </div>
                    </article><!--.related-post-->
    			<?php } echo '</div></div>'; }} wp_reset_query(); ?>
    		<!-- .related-posts -->
    	<?php }
    }
}


if ( ! function_exists('mts_the_postinfo' ) ) {
    function mts_the_postinfo( $section = 'home' ) {
        $mts_options = get_option( MTS_THEME_NAME );
        if ( ! empty( $mts_options["mts_{$section}_headline_meta"] ) ) { ?>
			<div class="post-info">
				<?php if ( ! empty( $mts_options["mts_{$section}_headline_meta_info"]['author']) ) { ?>
					<span class="theauthor"><i class="fa fa-user"></i> <span itemprop="author"><?php the_author_posts_link(); ?></span></span>
				<?php } ?>
				<?php if( ! empty( $mts_options["mts_{$section}_headline_meta_info"]['date']) ) { ?>
					<span class="thetime updated"><i class="fa fa-calendar"></i> <span itemprop="datePublished"><?php the_time( get_option( 'date_format' ) ); ?></span></span>
				<?php } ?>
				<?php if( ! empty( $mts_options["mts_{$section}_headline_meta_info"]['category']) ) { ?>
					<span class="thecategory"><i class="fa fa-tags"></i> <?php mts_the_category(', ') ?></span>
				<?php } ?>
				<?php if( ! empty( $mts_options["mts_{$section}_headline_meta_info"]['comment']) ) { ?>
					<span class="thecomment"><i class="fa fa-comments"></i> <a rel="nofollow" href="<?php comments_link(); ?>" itemprop="interactionCount"><?php echo comments_number();?></a></span>
				<?php } ?>
			</div>
		<?php }
    }
}

if (!function_exists('mts_social_buttons')) {
    function mts_social_buttons() {
        $mts_options = get_option( MTS_THEME_NAME );
        if ( $mts_options['mts_social_buttons'] == '1' ) { ?>
    		<!-- Start Share Buttons -->
    		<div class="shareit  <?php echo $mts_options['mts_social_button_position']; ?>">
    			<?php if($mts_options['mts_twitter'] == '1') { ?>
    				<!-- Twitter -->
    				<span class="share-item twitterbtn">
    					<a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo $mts_options['mts_twitter_username']; ?>">Tweet</a>
    				</span>
    			<?php } ?>
    			<?php if($mts_options['mts_gplus'] == '1') { ?>
    				<!-- GPlus -->
    				<span class="share-item gplusbtn">
    					<g:plusone size="medium"></g:plusone>
    				</span>
    			<?php } ?>
    			<?php if($mts_options['mts_facebook'] == '1') { ?>
    				<!-- Facebook -->
    				<span class="share-item facebookbtn">
    					<div id="fb-root"></div>
    					<div class="fb-like" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
    				</span>
    			<?php } ?>
    			<?php if($mts_options['mts_linkedin'] == '1') { ?>
    				<!--Linkedin -->
    				<span class="share-item linkedinbtn">
    					<script type="IN/Share" data-url="<?php get_permalink(); ?>"></script>
    				</span>
    			<?php } ?>
    			<?php if($mts_options['mts_stumble'] == '1') { ?>
    				<!-- Stumble -->
    				<span class="share-item stumblebtn">
    					<su:badge layout="1"></su:badge>
    				</span>
    			<?php } ?>
    			<?php if($mts_options['mts_pinterest'] == '1') { global $post; ?>
    				<!-- Pinterest -->
    				<span class="share-item pinbtn">
    					<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); echo $thumb['0']; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
    				</span>
    			<?php } ?>
    		</div>
    		<!-- end Share Buttons -->
    	<?php }
    }
}

/*------------[ Class attribute for <article> element ]-------------*/
if ( ! function_exists( 'mts_article_class' ) ) {
    function mts_article_class() {
        $mts_options = get_option( MTS_THEME_NAME );
        $class = '';
        
        // sidebar or full width
        if ( mts_custom_sidebar() == 'mts_nosidebar' ) {
            $class = 'ss-full-width';
        } else {
            $class = 'article';
        }
        
        echo $class;
    }
}
?>
