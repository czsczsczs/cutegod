<?php
/*-----------------------------------------------------------------------------------*/
/*	Do not remove these lines, sky will fall on your head.
/*-----------------------------------------------------------------------------------*/
define( 'MTS_THEME_NAME', 'salvation' );
require_once( dirname( __FILE__ ) . '/theme-options.php' );
if ( ! isset( $content_width ) ) $content_width = 1060;

/*-----------------------------------------------------------------------------------*/
/*	Load Options
/*-----------------------------------------------------------------------------------*/
$mts_options = get_option( MTS_THEME_NAME );

/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'mythemeshop', get_template_directory().'/lang' );

// Custom translations
if ( !empty( $mts_options['translate'] )) {
    $mts_translations = get_option( 'mts_translations_'.MTS_THEME_NAME );//$mts_options['translations'];
    function mts_custom_translate( $translated_text, $text, $domain ) {
        if ( $domain == 'mythemeshop' || $domain == 'nhp-opts' ) {
            global $mts_translations;
            if ( !empty( $mts_translations[$text] )) {
                $translated_text = $mts_translations[$text];
            }
        }
    	return $translated_text;
        
    }
    add_filter( 'gettext', 'mts_custom_translate', 20, 3 );
}

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/*	Disable theme updates from WordPress.org theme repository
/*-----------------------------------------------------------------------------------*/
function mts_disable_theme_update( $r, $url ) {
    if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}
add_filter( 'http_request_args', 'mts_disable_theme_update', 5, 2 );
add_filter( 'auto_update_theme', '__return_false' );

// a shortcut function for wp mega menu plugin
function mts_is_wp_mega_menu_active() {
    return in_array( 'wp-mega-menu/wp-mega-menu.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

/*-----------------------------------------------------------------------------------*/
/*  Create Blog page on Theme Activation
/*-----------------------------------------------------------------------------------*/
if (isset($_GET['activated']) && is_admin()){
        $new_page_title = 'Blog';
        $new_page_content = '';
        $new_page_template = 'page-blog.php';
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        $page_id = $new_page_id;
        } else {
        $page_id = $page_check->ID;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Post Thumbnail Support
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 348, 238, true );
	add_image_size( 'featured', 256, 256, true ); //featured
    add_image_size( 'featured1', 348, 238, true ); //featured
    add_image_size( 'service', 348, 198, true ); //homepage services section
	add_image_size( 'related', 54, 54, true ); //related
	add_image_size( 'widgetthumb', 54, 54, true ); //widget
    add_image_size( 'widgetfull', 348, 252, true ); //sidebar full width
	add_image_size( 'single-featured', 716, 445, true ); //single featured
    add_image_size( 'carousel', 164, 242, true ); //homepage carousel

    add_image_size( 'event', 184, 184, true ); // event thumb
    add_image_size( 'eventcalendar', 358, 330, true ); // event calendar preview

    add_action( 'init', 'salvation_wp_review_thumb_size', 11 );
    function salvation_wp_review_thumb_size() {
        add_image_size( 'wp_review_large', 348, 238, true ); 
        add_image_size( 'wp_review_small', 54, 54, true );
    }
}

function mts_get_thumbnail_url( $size = 'full' ) {
    global $post;
    if (has_post_thumbnail( $post->ID ) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
        return $image[0];
    }
    
    // use first attached image
    $images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
    if (!empty($images)) {
        $image = reset($images);
        $image_data = wp_get_attachment_image_src( $image->ID, $size );
        return $image_data[0];
    }
        
    // use no preview fallback
    if ( file_exists( get_template_directory().'/images/nothumb-'.$size.'.png' ) )
        return get_template_directory_uri().'/images/nothumb-'.$size.'.png';
    else
        return '';
}

/*-----------------------------------------------------------------------------------*/
/*	Use first attached image as post thumbnail (fallback)
/*-----------------------------------------------------------------------------------*/
add_filter( 'post_thumbnail_html', 'mts_post_image_html', 10, 5 );
function mts_post_image_html( $html, $post_id, $post_image_id, $size, $attr ) {
    if ( has_post_thumbnail() )
        return $html;
    
    // use first attached image
    $images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post_id );
    if (!empty($images)) {
        $image = reset($images);
        return wp_get_attachment_image( $image->ID, $size, false, $attr );
    }
        
    // use no preview fallback
    if ( file_exists( get_template_directory().'/images/nothumb-'.$size.'.png' ) )
        return '<img src="'.get_template_directory_uri().'/images/nothumb-'.$size.'.png" class="attachment-'.$size.' wp-post-image" alt="'.get_the_title().'">';
    else
        return '';
    
}

/*-----------------------------------------------------------------------------------*/
/*  Post Formats Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-formats', array( 'gallery', 'image', 'link', 'quote', 'audio', 'video', 'status' ) );

/*-----------------------------------------------------------------------------------*/
/*	Custom Menu Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu', 'mythemeshop' )
        )
    );
}

/*-----------------------------------------------------------------------------------*/
/*	Enable Widgetized sidebar and Footer
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'register_sidebar' ) ) {   
    function mts_register_sidebars() {
        $mts_options = get_option( MTS_THEME_NAME );
        
        // Default sidebar
        register_sidebar( array(
            'name' => 'Sidebar',
            'description'   => __( 'Default sidebar.', 'mythemeshop' ),
            'id' => 'sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

        // Top level footer widget areas
        if ( !empty( $mts_options['mts_top_footer'] )) {
            if ( empty( $mts_options['mts_top_footer_num'] )) $mts_options['mts_top_footer_num'] = 4;
            register_sidebars( $mts_options['mts_top_footer_num'], array(
                'name' => __( 'Footer %d', 'mythemeshop' ),
                'description'   => __( 'Appears at the top of the footer.', 'mythemeshop' ),
                'id' => 'footer-top',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            ) );
        }
        
        // Custom sidebars
        if ( !empty( $mts_options['mts_custom_sidebars'] ) && is_array( $mts_options['mts_custom_sidebars'] )) {
            foreach( $mts_options['mts_custom_sidebars'] as $sidebar ) {
                if ( !empty( $sidebar['mts_custom_sidebar_id'] ) && !empty( $sidebar['mts_custom_sidebar_id'] ) && $sidebar['mts_custom_sidebar_id'] != 'sidebar-' ) {
                    register_sidebar( array( 'name' => ''.$sidebar['mts_custom_sidebar_name'].'', 'id' => ''.sanitize_title( strtolower( $sidebar['mts_custom_sidebar_id'] )).'', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
                }
            }
        }

        if ( $mts_options['mts_bottom_header'] == '1' ) {
            register_sidebar( array(
                'name' => 'Bottom Header Sidebar',
                'description'   => __( 'Bottom Header ( Page Title ) Sidebar.', 'mythemeshop' ),
                'id' => 'bottom-header-sidebar',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            ) );
        }

        if ( mts_is_active_section('event_schedule') ) {
            register_sidebar( array(
                'name' => 'Event Schedule Sidebar',
                'description'   => __( 'Homepage "Event Schedule" Section Sidebar.', 'mythemeshop' ),
                'id' => 'event-schedule-sidebar',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            ) );
        }

        if ( mts_is_active_section('event_reservation') ) {
            register_sidebar( array(
                'name' => 'Event Reservation Sidebar',
                'description'   => __( 'Homepage "Event Reservation" Section Sidebar.', 'mythemeshop' ),
                'id' => 'event-reservation-sidebar',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            ) );
        }
    }
    
    add_action( 'widgets_init', 'mts_register_sidebars' );
}

function mts_custom_sidebar() {
    $mts_options = get_option( MTS_THEME_NAME );
    
	// Default sidebar
	$sidebar = 'Sidebar';

	if ( is_home() && !empty( $mts_options['mts_sidebar_for_home'] )) $sidebar = $mts_options['mts_sidebar_for_home'];	
    if ( is_single() && !empty( $mts_options['mts_sidebar_for_post'] )) $sidebar = $mts_options['mts_sidebar_for_post'];
    if ( is_page() && !empty( $mts_options['mts_sidebar_for_page'] )) $sidebar = $mts_options['mts_sidebar_for_page'];
    
    // Archives
	if ( is_archive() && !empty( $mts_options['mts_sidebar_for_archive'] )) $sidebar = $mts_options['mts_sidebar_for_archive'];
	if ( is_category() && !empty( $mts_options['mts_sidebar_for_category'] )) $sidebar = $mts_options['mts_sidebar_for_category'];
    if ( is_tag() && !empty( $mts_options['mts_sidebar_for_tag'] )) $sidebar = $mts_options['mts_sidebar_for_tag'];
    if ( is_date() && !empty( $mts_options['mts_sidebar_for_date'] )) $sidebar = $mts_options['mts_sidebar_for_date'];
	if ( is_author() && !empty( $mts_options['mts_sidebar_for_author'] )) $sidebar = $mts_options['mts_sidebar_for_author'];
    
    // Other
    if ( is_search() && !empty( $mts_options['mts_sidebar_for_search'] )) $sidebar = $mts_options['mts_sidebar_for_search'];
	if ( is_404() && !empty( $mts_options['mts_sidebar_for_notfound'] )) $sidebar = $mts_options['mts_sidebar_for_notfound'];
    
	// Page/post specific custom sidebar
	if ( is_page() || is_single() ) {
		wp_reset_postdata();
		global $post;
        $custom = get_post_meta( $post->ID, '_mts_custom_sidebar', true );
		if ( !empty( $custom )) $sidebar = $custom;
	}

	return $sidebar;
}

/*-----------------------------------------------------------------------------------*/
/*  Load Widgets, Actions and Libraries
/*-----------------------------------------------------------------------------------*/

// Add the 125x125 Ad Block Custom Widget
include( "functions/widget-ad125.php" );

// Add the 300x250 Ad Block Custom Widget
include( "functions/widget-ad300.php" );

// Add the Latest Tweets Custom Widget
include( "functions/widget-tweets.php" );

// Add Recent Posts Widget
include( "functions/widget-recentposts.php" );

// Add Related Posts Widget
include( "functions/widget-relatedposts.php" );

// Add Author Posts Widget
include( "functions/widget-authorposts.php" );

// Add Popular Posts Widget
include( "functions/widget-popular.php" );

// Add Facebook Like box Widget
include( "functions/widget-fblikebox.php" );

// Add Social Profile Widget
include( "functions/widget-social.php" );

// Add Category Posts Widget
include( "functions/widget-catposts.php" );

// Add Category Posts Widget
include( "functions/widget-postslider.php" );

// Add Donate Widget
include( "functions/widget-donate.php" );

// Add Welcome message
include( "functions/welcome-message.php" );

// Template Functions
include( "functions/theme-actions.php" );

// Post/page editor meta boxes
include( "functions/metaboxes.php" );

// TGM Plugin Activation
include( "functions/plugin-activation.php" );

// AJAX Contact Form - mts_contact_form()
include( 'functions/contact-form.php' );

// Custom menu walker
if ( mts_is_wp_mega_menu_active() ) {
    add_filter( 'wpmm_container_selector', 'salvation_megamenu_parent_element' );
} else {
    // Custom menu walker
    include( 'functions/nav-menu.php' );
}

function salvation_megamenu_parent_element( $selector ) {
    return '#header';
}

/*-----------------------------------------------------------------------------------*/
/*	Filters customize wp_title
/*-----------------------------------------------------------------------------------*/
function mts_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mythemeshop' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'mts_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/*	Javascript
/*-----------------------------------------------------------------------------------*/
function mts_nojs_js_class() {
    echo '<script type="text/javascript">document.documentElement.className = document.documentElement.className.replace( /\bno-js\b/,\'js\' );</script>';
}
add_action( 'wp_head', 'mts_nojs_js_class', 1 );

function mts_add_scripts() {
	$mts_options = get_option( MTS_THEME_NAME );

	wp_enqueue_script( 'jquery' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	global $is_IE;
    if ( $is_IE ) {
        wp_register_script ( 'html5shim', "http://html5shim.googlecode.com/svn/trunk/html5.js" );
        wp_enqueue_script ( 'html5shim' );
	}
    
    // Register flexslider script - enqueued in footer and/or from slider widget
    wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js' );
    // Register Datepicker styles - enqueued within contact form
    wp_register_style( 'date-time-picker', get_template_directory_uri() . '/css/mts-datepicker.css' );
}
add_action( 'wp_enqueue_scripts', 'mts_add_scripts' );
   
function mts_load_footer_scripts() {  
	$mts_options = get_option( MTS_THEME_NAME );

    wp_register_script( 'customscript', get_template_directory_uri() . '/js/customscript.js', true );
    if ( ! empty( $mts_options['mts_show_primary_nav'] ) && ! empty( $mts_options['mts_show_secondary_nav'] ) ) {
        $nav_menu = 'both';
    } else {
        if ( ! empty( $mts_options['mts_show_primary_nav'] ) ) {
            $nav_menu = 'primary';
        } elseif ( ! empty( $mts_options['mts_show_secondary_nav'] ) ) {
            $nav_menu = 'secondary';
        } else {
            $nav_menu = 'none';
        }
    }
    wp_localize_script(
        'customscript',
        'mts_customscript',
        array(
            'nav_menu' => $nav_menu
         )
    );
    wp_enqueue_script( 'customscript' );

    // Fade Effects
    if ($mts_options['mts_fade_effects'] == '1') {
        wp_register_script( 'scrollReveal', get_template_directory_uri() . '/js/scrollReveal.js' );
        wp_enqueue_script( 'scrollReveal' );
    }
    
    // Slider
    if ( ! empty( $mts_options['mts_featured_slider'] ) && !is_singular() ) {
        wp_enqueue_script ( 'flexslider' );
    }

    // Alternative homepage carousel section
    if ( is_home() && mts_is_active_section('carousel') ) {
        wp_register_script( 'owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js' );
        wp_enqueue_script ( 'owlcarousel' );
    }
	
	//Lightbox
	if ( ! empty( $mts_options['mts_lightbox'] ) ) {
		wp_register_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', true );
		wp_enqueue_script( 'prettyPhoto' );
	}
	
	//Sticky Nav
	if ( ! empty( $mts_options['mts_sticky_header'] ) ) {
		wp_register_script( 'StickyNav', get_template_directory_uri() . '/js/sticky.js', true );
		wp_enqueue_script( 'StickyNav' );
	}
    
    // Ajax Load More and Search Results
    wp_register_script( 'mts_ajax', get_template_directory_uri() . '/js/ajax.js', true );
	if( ! empty( $mts_options['mts_pagenavigation_type'] ) && $mts_options['mts_pagenavigation_type'] >= 2 && !is_singular() ) {
		wp_enqueue_script( 'mts_ajax' );
        
        wp_register_script( 'historyjs', get_template_directory_uri() . '/js/history.js', true );
        wp_enqueue_script( 'historyjs' );
        
        // Add parameters for the JS
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        $autoload = ( $mts_options['mts_pagenavigation_type'] == 3 );
        wp_localize_script(
        	'mts_ajax',
        	'mts_ajax_loadposts',
        	array(
        		'startPage' => $paged,
        		'maxPages' => $max,
        		'nextLink' => next_posts( $max, false ),
                'autoLoad' => $autoload,
                'i18n_loadmore' => __( 'Load More Posts', 'mythemeshop' ),
                'i18n_loading' => __('Loading...', 'mythemeshop'),
                'i18n_nomore' => __( 'No more posts.', 'mythemeshop' )
        	 )
        );
	}
    if ( ! empty( $mts_options['mts_ajax_search'] ) ) {
        wp_enqueue_script( 'mts_ajax' );
        wp_localize_script(
        	'mts_ajax',
        	'mts_ajax_search',
        	array(
				'url' => admin_url( 'admin-ajax.php' ),
        		'ajax_search' => '1'
        	 )
        );
    }

    if ( is_home() && mts_is_active_section('event_schedule') ) {
        wp_enqueue_script( 'mts_ajax' );
        wp_localize_script(
            'mts_ajax',
            'mts_ajax_calendar',
            array(
                'url' => admin_url( 'admin-ajax.php' ),
                'mts_events_preview_nonce' => wp_create_nonce( 'mts_events_preview_nonce' ),
             )
        );
    }

    wp_register_script ( 'jquery-parallax', get_template_directory_uri() . '/js/parallax.js' );
    wp_enqueue_script ( 'jquery-parallax' );
    
}  
add_action( 'wp_footer', 'mts_load_footer_scripts' );  

if( !empty( $mts_options['mts_ajax_search'] )) {
    add_action( 'wp_ajax_mts_search', 'ajax_mts_search' );
    add_action( 'wp_ajax_nopriv_mts_search', 'ajax_mts_search' );
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue CSS
/*-----------------------------------------------------------------------------------*/
function mts_enqueue_css() {
	$mts_options = get_option( MTS_THEME_NAME );

	// Slider
    wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', 'style' );
	if ( ! empty( $mts_options['mts_featured_slider'] ) && !is_singular() ) {
		wp_enqueue_style( 'flexslider' );
	}
    // also enqueued in slider widget

    // Alternative homepage carousel section
    if ( is_home() && mts_is_active_section('carousel') ) {
        wp_register_style( 'owlcarousel', get_template_directory_uri() . '/css/owl.carousel.css', 'style' );
        wp_enqueue_style( 'owlcarousel' );
    }
	
	// Lightbox
	if ( ! empty( $mts_options['mts_lightbox'] ) ) {
		wp_register_style( 'prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', 'style' );
		wp_enqueue_style( 'prettyPhoto' );
	}

    // Replace wp-rewiew styles
    if ( in_array( 'wp-review/wp-review.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        wp_deregister_style('wp_review_tab_widget');
        wp_register_style('wp_review_tab_widget', get_template_directory_uri() . '/css/wp-review-tab-widget.css', 'style');
    }
    // Replace wp-tab-widget styles
    if ( in_array( 'wp-tab-widget/wp-tab-widget.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        wp_deregister_style('wpt_widget');
        wp_register_style('wpt_widget', get_template_directory_uri() . '/css/wp-tab-widget.css', 'style');
    }
	
	//Font Awesome
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', 'style' );
	wp_enqueue_style( 'fontawesome' );
	
	wp_enqueue_style( 'stylesheet', get_stylesheet_directory_uri() . '/style.css', 'style' );
	
	//Responsive
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', 'style' );

    $mts_bg = '';
    if ( $mts_options['mts_bg_pattern_upload'] != '' ) {
        $mts_bg = $mts_options['mts_bg_pattern_upload'];
    } else {
        if( !empty( $mts_options['mts_bg_pattern'] )) {
            $mts_bg = get_template_directory_uri().'/images/'.$mts_options['mts_bg_pattern'].'.png';
        }
    }

	$mts_header_bg = '';
    if ($mts_options['mts_header_bg_pattern_upload'] != '') {
        $mts_header_bg = $mts_options['mts_header_bg_pattern_upload'];
    } else {
        if($mts_options['mts_header_bg_pattern'] != '') {
            $mts_header_bg = get_template_directory_uri().'/images/'.$mts_options['mts_header_bg_pattern'].'.png';
        }
    }

    $mts_bottom_header_bg = '';
    if ($mts_options['mts_bottom_header_bg_pattern_upload'] != '') {
        $mts_bottom_header_bg = $mts_options['mts_bottom_header_bg_pattern_upload'];
    } else {
        if($mts_options['mts_bottom_header_bg_pattern'] != '') {
            $mts_bottom_header_bg = get_template_directory_uri().'/images/'.$mts_options['mts_bottom_header_bg_pattern'].'.png';
        }
    }

    $mts_top_footer_bg = '';
    if ($mts_options['mts_top_footer_bg_pattern_upload'] != '') {
        $mts_top_footer_bg = $mts_options['mts_top_footer_bg_pattern_upload'];
    } else {
        if($mts_options['mts_top_footer_bg_pattern'] != '') {
            $mts_top_footer_bg = get_template_directory_uri().'/images/'.$mts_options['mts_top_footer_bg_pattern'].'.png';
        }
    }

    $mts_homepage_audio_player_bg = '';
    if ($mts_options['mts_homepage_audio_player_background_image'] != '') {
        $mts_homepage_audio_player_bg = $mts_options['mts_homepage_audio_player_background_image'];
    } else {
        if($mts_options['mts_homepage_audio_player_background_pattern'] != '') {
            $mts_homepage_audio_player_bg = get_template_directory_uri().'/images/'.$mts_options['mts_homepage_audio_player_background_pattern'].'.png';
        }
    }

    $mts_homepage_services_bg = '';
    if ($mts_options['mts_homepage_services_background_image'] != '') {
        $mts_homepage_services_bg = $mts_options['mts_homepage_services_background_image'];
    } else {
        if($mts_options['mts_homepage_services_background_pattern'] != '') {
            $mts_homepage_services_bg = get_template_directory_uri().'/images/'.$mts_options['mts_homepage_services_background_pattern'].'.png';
        }
    }

    $mts_homepage_event_schedule_bg = '';
    if ($mts_options['mts_homepage_event_schedule_background_image'] != '') {
        $mts_homepage_event_schedule_bg = $mts_options['mts_homepage_event_schedule_background_image'];
    } else {
        if($mts_options['mts_homepage_event_schedule_background_pattern'] != '') {
            $mts_homepage_event_schedule_bg = get_template_directory_uri().'/images/'.$mts_options['mts_homepage_event_schedule_background_pattern'].'.png';
        }
    }

    $mts_homepage_event_reservation_bg = '';
    if ($mts_options['mts_homepage_event_reservation_background_image'] != '') {
        $mts_homepage_event_reservation_bg = $mts_options['mts_homepage_event_reservation_background_image'];
    } else {
        if($mts_options['mts_homepage_event_reservation_background_pattern'] != '') {
            $mts_homepage_event_reservation_bg = get_template_directory_uri().'/images/'.$mts_options['mts_homepage_event_reservation_background_pattern'].'.png';
        }
    }

    $mts_homepage_carousel_bg = '';
    if ($mts_options['mts_homepage_carousel_background_image'] != '') {
        $mts_homepage_carousel_bg = $mts_options['mts_homepage_carousel_background_image'];
    } else {
        if($mts_options['mts_homepage_carousel_background_pattern'] != '') {
            $mts_homepage_carousel_bg = get_template_directory_uri().'/images/'.$mts_options['mts_homepage_carousel_background_pattern'].'.png';
        }
    }

    $mts_twitt_bg = '';
    if ($mts_options['mts_homepage_twitter_background_image'] != '') {
        $mts_twitt_bg = $mts_options['mts_homepage_twitter_background_image'];
    } else {
        if($mts_options['mts_homepage_twitter_background_pattern'] != '') {
            $mts_twitt_bg = get_template_directory_uri().'/images/'.$mts_options['mts_homepage_twitter_background_pattern'].'.png';
        }
    }

	$mts_sclayout = '';
	$mts_shareit_left = '';
	$mts_shareit_right = '';
	$mts_author = '';
	$mts_header_section = '';
    $mts_main_header_section = '';
    if ( is_page() || is_single() ) {
        $mts_sidebar_location = get_post_meta( get_the_ID(), '_mts_sidebar_location', true );
    } else {
        $mts_sidebar_location = '';
    }
	if ( $mts_sidebar_location != 'right' && ( $mts_options['mts_layout'] == 'sclayout' || $mts_sidebar_location == 'left' )) {
		$mts_sclayout = '.article { float: right;}
		.sidebar.c-4-12 { float: left; }';
		if( isset( $mts_options['mts_social_button_position'] ) && $mts_options['mts_social_button_position'] == 'floating' ) {
            $mts_shareit_right = '.shareit { margin: 0 547px 0; border-left: 0; } .ss-full-width .shareit { margin: 0 828px 0; }';
		}
	}
	if ( empty( $mts_options['mts_header_section2'] ) ) {
		$mts_header_section = '.logo-wrap, .widget-header { display: none; }
		#navigation { border-top: 0; }
		#header { min-height: 47px; }';
	}

    if ( empty( $mts_options['mts_header_section2'] ) && empty( $mts_options['mts_show_primary_nav'] ) ) {
        $mts_main_header_section = '.main-header { display: none; }';
    }

	if ( isset( $mts_options['mts_social_button_position'] ) && $mts_options['mts_social_button_position'] == 'floating' ) {
        $mts_shareit_left = '.shareit { top: 325px; left: auto; z-index: 0; margin: 0 0 0 -100px; width: 90px; position: fixed; overflow: hidden; padding: 5px; border:none; border-right: 0;}
        .ss-full-width .shareit { margin: 0 0 0 -388px; } .share-item {margin: 2px;}';
	}
	if ( ! empty( $mts_options['mts_author_comment'] ) ) {
		$mts_author = '.bypostauthor .fn > span:after { content: "'.__( 'Author', 'mythemeshop' ).'"; margin-left: 10px; padding: 1px 8px; background: '.$mts_options["mts_color_scheme"].'; color: #FFF; -webkit-border-radius: 2px; border-radius: 2px; }';
	}
    $mts_status_overlay_color = mts_hex_to_rgba( $mts_options['mts_homepage_statuses_overlay_color'], '0.9' );
    $mts_twitt_overlay_color = mts_hex_to_rgba( $mts_options['mts_homepage_twitter_overlay_color'], '0.85' );
    $carousel_item_overlay = mts_hex_to_rgba( $mts_options['mts_color_scheme'], '0.94' );
	$custom_css = "
		body {background-color:{$mts_options['mts_bg_color']}; background-image: url( {$mts_bg} );}
        .main-header {background-color:{$mts_options['mts_header_bg_color']}; background-image: url({$mts_header_bg});}#navigation ul li a:hover { color: {$mts_options['mts_header_bg_color']}}
        #page-title {background-color:{$mts_options['mts_bottom_header_bg_color']}; background-image: url({$mts_bottom_header_bg});}
        #audio-player {background-color:{$mts_options['mts_homepage_audio_player_background_color']}; background-image: url({$mts_homepage_audio_player_bg});}
        #services {background-color:{$mts_options['mts_homepage_services_background_color']}; background-image: url({$mts_homepage_services_bg});}
        #statuses { -webkit-box-shadow: inset 0 0 0 1000px {$mts_status_overlay_color};box-shadow: inset 0 0 0 1000px {$mts_status_overlay_color};}
        #event-schedule {background-color:{$mts_options['mts_homepage_event_schedule_background_color']}; background-image: url({$mts_homepage_event_schedule_bg});}
        #event-reservation {background-color:{$mts_options['mts_homepage_event_reservation_background_color']}; background-image: url({$mts_homepage_event_reservation_bg});}
        #carousel {background-color:{$mts_options['mts_homepage_carousel_background_color']}; background-image: url({$mts_homepage_carousel_bg});}
        #twitt { background-image: url({$mts_twitt_bg}); -webkit-box-shadow: inset 0 0 0 1000px {$mts_twitt_overlay_color};box-shadow: inset 0 0 0 1000px {$mts_twitt_overlay_color};}
        #footer-widgets {background-color:{$mts_options['mts_top_footer_bg_color']}; background-image: url({$mts_top_footer_bg});}
        #mobile-menu-wrapper, #navigation ul.menu li:after, .logo-wrap:after, #header:after, .header-search, .header-search:before, nav a#pull:after, #navigation ul.menu li, nav a#pull, #navigation ul.menu ul, nav a#pull:before { background-color: {$mts_options['mts_header_nav_bg_color']}!important; }
        a:hover, .loading-icon, .to-top, .tagcloud a, .total-comments, #cancel-comment-reply-link, .comment-meta a, .reply a, .pagination ul li a, .pagination ul li span, #load-posts a, #slider .flex-direction-nav a, #homepage-slider .slide-title, .prev-slide, .next-slide, .carousel-controls .owl-buttons div, .wpt_widget_content #tags-tab-content ul li a, .readMore a, .textwidget a, .mejs-controls button:before, .mejs-container .mejs-container .mejs-controls .mejs-time span { color: {$mts_options['mts_color_scheme']};}
        blockquote, .to-top, .tagcloud a, .pagination ul li a, .pagination ul li span, #load-posts a, .ajax-search-results-container, #slider .flex-direction-nav a, .prev-slide, .next-slide, .carousel-controls .owl-buttons div, .wpt_widget_content #tags-tab-content ul li a, .mejs-controls .mejs-time-rail .mejs-time-total, .mejs-controls .mejs-playpause-button button:before, #page-title { border-color: {$mts_options['mts_color_scheme']}; }
        .button, #mts_events_calendar_head, .event-links a:hover, .event-links a.active-event, .to-top:hover, .tagcloud a:hover, .mts-subscribe input[type='submit'], #wp-calendar td a, #wp-calendar #today, #wp-calendar caption, #wp-calendar #prev a:before, #wp-calendar #next a:before, .calendar .today, .calendar .today:hover, #commentform input#submit, .contactform #submit, #mtscontact_submit, input.donate-submit, .pagination ul li a:focus, .pagination ul li a:hover, .pagination ul li span.current, .pagination ul li span.currenttext, .single .pagination > .current, .single .pagination a:hover, #load-posts a:hover, #load-posts a.loading, #slider .flex-direction-nav a:hover, .prev-slide:hover, .next-slide:hover, .carousel-controls .owl-buttons div:hover, .wpt_widget_content #tags-tab-content ul li a:hover, .pace .pace-progress, #homepage-slider:after, .mejs-container .mejs-controls .mejs-time-rail .mejs-time-current, .mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current { background-color: {$mts_options['mts_color_scheme']}; color: #fff; }
        .calendar-day.has-events:before { border-right-color: {$mts_options['mts_color_scheme']}; }
        .mts-datepicker .ui-widget-header,.mts-datepicker .ui-state-highlight, .mts-datepicker .ui-widget-content .ui-state-highlight, .mts-datepicker .ui-widget-header .ui-state-highlight, .ui-timepicker-div .ui-slider .ui-slider-handle { background-color: {$mts_options['mts_color_scheme']} !important;}
        .button-alt, .format-icon, .calendar-day .event-links { background-color: {$mts_options['mts_color_scheme2']}; }
        .calendar-day.has-events:hover:before { border-right-color: {$mts_options['mts_color_scheme2']} !important; }
        .calendar-day .event-links { border-color: {$mts_options['mts_color_scheme2']}; }
        .carousel-item-overlay, .widget-slider .slider-title {background:{$carousel_item_overlay} !important;}
        {$mts_sclayout}
		{$mts_shareit_left}
		{$mts_shareit_right}
		{$mts_author}
		{$mts_header_section}
        {$mts_main_header_section}
		{$mts_options['mts_custom_css']}
			";
	wp_add_inline_style( 'stylesheet', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'mts_enqueue_css', 99 );

/*-----------------------------------------------------------------------------------*/
/*	Wrap videos in .responsive-video div
/*-----------------------------------------------------------------------------------*/
function mts_responsive_video( $data ) {
    return '<div class="flex-video">' . $data . '</div>';
}
add_filter( 'embed_oembed_html', 'mts_responsive_video' );

/*-----------------------------------------------------------------------------------*/
/*	Filters that allow shortcodes in Text Widgets
/*-----------------------------------------------------------------------------------*/
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_content_rss', 'do_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*	Custom Comments template
/*-----------------------------------------------------------------------------------*/
function mts_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; 
    $mts_options = get_option( MTS_THEME_NAME ); ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment->comment_author_email, 54 ); ?>
				<?php printf( '<span class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><i class="fa fa-user"></i>%s</span></span>', get_comment_author_link() ) ?> 
				<?php if ( ! empty( $mts_options['mts_comment_date'] ) ) { ?>
					<span class="ago"><i class="fa fa-calendar"></i><?php comment_date( get_option( 'date_format' ) ); ?></span>
				<?php } ?>
				<span class="comment-meta">
					<?php edit_comment_link( __( '( Edit )', 'mythemeshop' ), '  ', '' ) ?>
				</span>
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'mythemeshop' ) ?></em>
				<br />
			<?php endif; ?>
			<div class="commentmetadata">
                <div class="commenttext" itemprop="commentText">
				    <?php comment_text() ?>
                </div>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] )) ) ?>
				</div>
			</div>
		</div>
	</li>
<?php }

/*-----------------------------------------------------------------------------------*/
/*	Excerpt
/*-----------------------------------------------------------------------------------*/

// Increase max length
function mts_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'mts_excerpt_length', 20 );

// Remove [...] and shortcodes
function mts_custom_excerpt( $output ) {
  return preg_replace( '/\[[^\]]*]/', '', $output );
}
add_filter( 'get_the_excerpt', 'mts_custom_excerpt' );

// Truncate string to x letters/words
function mts_truncate( $str, $length = 40, $units = 'letters', $ellipsis = '&nbsp;&hellip;' ) {
    if ( $units == 'letters' ) {
        if ( mb_strlen( $str ) > $length ) {
            return mb_substr( $str, 0, $length ) . $ellipsis;
        } else {
            return $str;
        }
    } else {
        $words = explode( ' ', $str );
        if ( count( $words ) > $length ) {
            return implode( " ", array_slice( $words, 0, $length ) ) . $ellipsis;
        } else {
            return $str;
        }
    }
}

if ( ! function_exists( 'mts_excerpt' ) ) {
    function mts_excerpt( $limit = 40 ) {
      return mts_truncate( get_the_excerpt(), $limit, 'words' );
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Remove more link from the_content and use custom read more
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_content_more_link', 'mts_remove_more_link', 10, 2 );
function mts_remove_more_link( $more_link, $more_link_text ) {
	return '';
}
// shorthand function to check for more tag in post
function mts_post_has_moretag() {
    global $post;
    return strpos( $post->post_content, '<!--more-->' );
}

if ( ! function_exists( 'mts_readmore' ) ) {
    function mts_readmore() {
        ?>
        <div class="readMore">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow">
                <?php _e( 'Continue Reading', 'mythemeshop' ); ?><i class="fa fa-angle-double-right"></i>
            </a>
        </div>
        <?php 
    }
}

/*-----------------------------------------------------------------------------------*/
/* nofollow to next/previous links
/*-----------------------------------------------------------------------------------*/
function mts_pagination_add_nofollow( $content ) {
    return 'rel="nofollow"';
}
add_filter( 'next_posts_link_attributes', 'mts_pagination_add_nofollow' );
add_filter( 'previous_posts_link_attributes', 'mts_pagination_add_nofollow' );

/*-----------------------------------------------------------------------------------*/
/* Nofollow to category links
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_category', 'mts_add_nofollow_cat' ); 
function mts_add_nofollow_cat( $text ) {
    $text = str_replace( 'rel="category tag"', 'rel="nofollow"', $text ); return $text;
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow post author link
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_author_posts_link', 'mts_nofollow_the_author_posts_link' );
function mts_nofollow_the_author_posts_link ( $link ) {
    return str_replace( '<a href=', '<a rel="nofollow" href=', $link ); 
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow to reply links
/*-----------------------------------------------------------------------------------*/
function mts_add_nofollow_to_reply_link( $link ) {
    return str_replace( '" )\'>', '" )\' rel=\'nofollow\'>', $link );
}
add_filter( 'comment_reply_link', 'mts_add_nofollow_to_reply_link' );

/*-----------------------------------------------------------------------------------*/
/* removes the WordPress version from your header for security
/*-----------------------------------------------------------------------------------*/
function mts_remove_wpversion() {
	return '<!--Theme by MyThemeShop.com-->';
}
add_filter( 'the_generator', 'mts_remove_wpversion' );
	
/*-----------------------------------------------------------------------------------*/
/* Removes Trackbacks from the comment count
/*-----------------------------------------------------------------------------------*/
add_filter( 'get_comments_number', 'mts_comment_count', 0 );
function mts_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
        $comments = get_comments( 'status=approve&post_id=' . $id );
        $comments_by_type = separate_comments( $comments );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

/*-----------------------------------------------------------------------------------*/
/* adds a class to the post if there is a thumbnail
/*-----------------------------------------------------------------------------------*/
function has_thumb_class( $classes ) {
	global $post;
	if( has_post_thumbnail( $post->ID ) ) { $classes[] = 'has_thumb'; }
		return $classes;
}
add_filter( 'post_class', 'has_thumb_class' );

/*-----------------------------------------------------------------------------------*/	
/* AJAX Search results
/*-----------------------------------------------------------------------------------*/
function ajax_mts_search() {
    $query = $_REQUEST['q']; // It goes through esc_sql() in WP_Query
    $search_query = new WP_Query( array( 's' => $query, 'posts_per_page' => 3 )); 
    $search_count = new WP_Query( array( 's' => $query, 'posts_per_page' => -1 ));
    $search_count = $search_count->post_count;
    if ( !empty( $query ) && $search_query->have_posts() ) : 
        //echo '<h5>Results for: '. $query.'</h5>';
        echo '<ul class="ajax-search-results">';
        while ( $search_query->have_posts() ) : $search_query->the_post();
            ?><li>
    			<a href="<?php the_permalink(); ?>">
				    <?php the_post_thumbnail( 'widgetthumb', array( 'title' => '' )); ?>
    				<?php the_title(); ?>	
    			</a>
    			<div class="meta">
    					<span class="thetime"><?php the_time( 'F j, Y' ); ?></span>
    			</div> <!-- / .meta -->

    		</li>	
    		<?php
        endwhile;
        echo '</ul>';
        echo '<div class="ajax-search-meta"><span class="results-count">'.$search_count.' '.__( 'Results', 'mythemeshop' ).'</span><a href="'.get_search_link( $query ).'" class="results-link">Show all results</a></div>';
    else:
        echo '<div class="no-results">'.__( 'No results found.', 'mythemeshop' ).'</div>';
    endif;
        
    exit; // required for AJAX in WP
}
/*-----------------------------------------------------------------------------------*/
/* Redirect feed to feedburner
/*-----------------------------------------------------------------------------------*/

if ( $mts_options['mts_feedburner'] != '' ) {
function mts_rss_feed_redirect() {
    $mts_options = get_option( MTS_THEME_NAME );
    global $feed;
    $new_feed = $mts_options['mts_feedburner'];
    if ( !is_feed() ) {
            return;
    }
    if ( preg_match( '/feedburner/i', $_SERVER['HTTP_USER_AGENT'] )){
            return;
    }
    if ( $feed != 'comments-rss2' ) {
            if ( function_exists( 'status_header' )) status_header( 302 );
            header( "Location:" . $new_feed );
            header( "HTTP/1.1 302 Temporary Redirect" );
            exit();
    }
}
add_action( 'template_redirect', 'mts_rss_feed_redirect' );
}

/*-----------------------------------------------------------------------------------*/
/* Single Post Pagination - Numbers + Previous/Next
/*-----------------------------------------------------------------------------------*/
function mts_wp_link_pages_args( $args ) {
    global $page, $numpages, $more, $pagenow;
    if ( !$args['next_or_number'] == 'next_and_number' )
        return $args; 
    $args['next_or_number'] = 'number'; 
    if ( !$more )
        return $args; 
    if( $page-1 ) 
        $args['before'] .= _wp_link_page( $page-1 )
        . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
    ;
    if ( $page<$numpages ) 
    
        $args['after'] = _wp_link_page( $page+1 )
        . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
        . $args['after']
    ;
    return $args;
}
add_filter( 'wp_link_pages_args', 'mts_wp_link_pages_args' );

/*-----------------------------------------------------------------------------------*/
/* add <!-- next-page --> button to tinymce
/*-----------------------------------------------------------------------------------*/
add_filter( 'mce_buttons', 'wysiwyg_editor' );
function wysiwyg_editor( $mce_buttons ) {
   $pos = array_search( 'wp_more', $mce_buttons, true );
   if ( $pos !== false ) {
       $tmp_buttons = array_slice( $mce_buttons, 0, $pos+1 );
       $tmp_buttons[] = 'wp_page';
       $mce_buttons = array_merge( $tmp_buttons, array_slice( $mce_buttons, $pos+1 ));
   }
   return $mce_buttons;
}

/*-----------------------------------------------------------------------------------*/
/*	Alternative post templates
/*-----------------------------------------------------------------------------------*/
function mts_get_post_template( $default = 'default' ) {
    global $post;
    $single_template = $default;
    $posttemplate = get_post_meta( $post->ID, '_mts_posttemplate', true );
    
    if ( empty( $posttemplate ) || ! is_string( $posttemplate ) )
        return $single_template;
    
    if ( file_exists( dirname( __FILE__ ) . '/singlepost-'.$posttemplate.'.php' ) ) {
        $single_template = dirname( __FILE__ ) . '/singlepost-'.$posttemplate.'.php';
    }
    
    return $single_template;
}
function mts_set_post_template( $single_template ) {
     return mts_get_post_template( $single_template );
}
add_filter( 'single_template', 'mts_set_post_template' );
/*-----------------------------------------------------------------------------------*/
/*	Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/
function mts_custom_gravatar( $avatar_defaults ) {
    $mts_avatar = get_template_directory_uri() . '/images/gravatar.png';
    $avatar_defaults[$mts_avatar] = 'Custom Gravatar ( /images/gravatar.png )';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'mts_custom_gravatar' );

/*-----------------------------------------------------------------------------------*/
/*  WP Review Support
/*-----------------------------------------------------------------------------------*/

// Set default colors for new reviews
function new_default_review_colors( $colors ) {
    $colors = array(
        'color' => '#FFCA00',
        'fontcolor' => '#fff',
        'bgcolor1' => '#151515',
        'bgcolor2' => '#151515',
        'bordercolor' => '#151515'
    );
  return $colors;
}
add_filter( 'wp_review_default_colors', 'new_default_review_colors' );
 
// Set default location for new reviews
function new_default_review_location( $position ) {
  $position = 'top';
  return $position;
}
add_filter( 'wp_review_default_location', 'new_default_review_location' );


/*-----------------------------------------------------------------------------------*/
/*  Thumbnail Upscale
/*  Enables upscaling of thumbnails for small media attachments, 
/*  to make sure it fits into it's supposed location.
/*  Cannot be used in conjunction with Retina Support.
/*-----------------------------------------------------------------------------------*/
if ( empty( $mts_options['mts_retina'] ) ) {
    function mts_image_crop_dimensions( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ) {
        if( !$crop )
        	return null; // let the wordpress default function handle this
    
        $aspect_ratio = $orig_w / $orig_h;
        $size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );
    
        $crop_w = round( $new_w / $size_ratio );
        $crop_h = round( $new_h / $size_ratio );
    
        $s_x = floor( ( $orig_w - $crop_w ) / 2 );
        $s_y = floor( ( $orig_h - $crop_h ) / 2 );
    
        return array( 0, 0, ( int ) $s_x, ( int ) $s_y, ( int ) $new_w, ( int ) $new_h, ( int ) $crop_w, ( int ) $crop_h );
    }
    add_filter( 'image_resize_dimensions', 'mts_image_crop_dimensions', 10, 6 );
}

/*-----------------------------------------------------------------------------------*/
/*  Global Twitter section functions 
/*-----------------------------------------------------------------------------------*/

function mts_getConnectionWithhomepage_twitter_access_token($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
} 

//convert links to clickable format
function mts_convert_links($status,$targetBlank=true,$linkMaxLen=250){
    $target=$targetBlank ? " target=\"_blank\" " : ""; // the target
    $status = preg_replace("/((http:\/\/|https:\/\/)[^ )]+)/e", "'<a href=\"$1\" title=\"$1\" $target >'. ((strlen('$1')>=$linkMaxLen ? substr('$1',0,$linkMaxLen).'...':'$1')).'</a>'", $status); // convert link to url
    $status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>",$status); // convert @ to follow
    $status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>",$status); // convert # to search
    return $status; // return the status
}

/*-----------------------------------------------------------------------------------*/
/*  Helper function to check if specific alernative homepage section is active 
/*-----------------------------------------------------------------------------------*/

function mts_is_active_section( $section ) {
    
    $mts_options = get_option(MTS_THEME_NAME);

    if ( is_array( $mts_options['mts_homepage_layout'] ) && array_key_exists( 'enabled', $mts_options['mts_homepage_layout'] ) ) {
        $sections = $mts_options['mts_homepage_layout']['enabled'];
    } else {
        $sections = array();
    }

    if ( array_key_exists( $section, $sections ) ) {
        return true;
    } else {
        return false;
    }
}

/*-----------------------------------------------------------------------------------*/
/*  Check if twitter section is presented on page 
/*-----------------------------------------------------------------------------------*/

function mts_has_twitter_section() {

    $mts_options = get_option(MTS_THEME_NAME);

    $twitter_section = false;

    if ( is_home() ) {

        if ( !empty( $mts_options['mts_homepage_twitt'] ) ) $twitter_section = true;

    } else {

        if ( !empty( $mts_options['mts_twitter_section'] ) ) $twitter_section = true;
    }

    return $twitter_section;
}

/*-----------------------------------------------------------------------------------*/
/*  Convert hex color to rgba
/*-----------------------------------------------------------------------------------*/

function mts_hex_to_rgba( $hex, $a = '1' ) {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgba = array($r, $g, $b, $a);

    $css_string = 'rgba('.implode(",", $rgba).')';

    return $css_string;
}

/*-----------------------------------------------------------------------------------*/
/*  Register Event post type 
/*-----------------------------------------------------------------------------------*/

function mts_register_event_post_type() {
    $labels = array(
        'name'               => _x( 'Events', 'post type general name', 'mythemeshop' ),
        'singular_name'      => _x( 'Event', 'post type singular name', 'mythemeshop' ),
        'add_new'            => _x( 'Add New', 'event', 'mythemeshop' ),
        'add_new_item'       => __( 'Add New Event', 'mythemeshop' ),
        'edit_item'          => __( 'Edit Event', 'mythemeshop' ),
        'new_item'           => __( 'New Event', 'mythemeshop' ),
        'all_items'          => __( 'All Events', 'mythemeshop' ),
        'view_item'          => __( 'View Event', 'mythemeshop' ),
        'search_items'       => __( 'Search Events', 'mythemeshop' ),
        'not_found'          => __( 'No events found', 'mythemeshop' ),
        'not_found_in_trash' => __( 'No events found in the Trash', 'mythemeshop' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Events', 'mythemeshop' ),
    );
    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-calendar',
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'   => true,
        'rewrite' => array("slug" => "events"), // Permalinks format
    );

    register_post_type( 'event', $args );
}

add_action( 'init', 'mts_register_event_post_type' );

function mts_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'mts_rewrite_flush' );

/* 
 * Function to display event data
 */
function mts_event_data() {

    $id = get_the_ID();

    $type = get_post_meta( $id, '_mts_event_type', true );

    $start_date = get_post_meta( $id, '_mts_event_start_date', true );
    $start_time = get_post_meta( $id, '_mts_event_start_time', true );
    $end_date   = get_post_meta( $id, '_mts_event_end_date', true );
    $end_time   = get_post_meta( $id, '_mts_event_end_time', true );

    $daily      = get_post_meta( $id, '_mts_event_daily', true );

    $venue      = get_post_meta( $id, '_mts_event_venue', true );
    $address    = get_post_meta( $id, '_mts_event_address', true );
    $cost       = get_post_meta( $id, '_mts_event_cost', true );

    $output = '<dl>';
    switch ( $type ) {
        case 'single':
            if ( ! empty( $start_date ) && ! empty( $end_date ) ) {
                $output .= '<dt>' . __( 'Date:', 'mythemeshop' ) . '</dt>';
                $output .= '<dd>' . date_i18n( get_option('date_format' ), $start_date );
                $output .= '</dd>';
            }
            if ( ! empty( $start_time ) || ! empty( $end_time ) ) {
                $output .= '<dt>' . __( 'Time:', 'mythemeshop' ) . '</dt>';
                $output .= '<dd>';
                if ( ! empty( $start_time ) ) $output .= date_i18n( get_option('time_format'), $start_time );
                if ( ! empty( $end_time ) ) $output .= ' - ' . date_i18n( get_option('time_format'), $end_time );
                $output .= '</dd>';
            }
        break;
        case 'daily':
            if ( ! empty( $start_date ) ) {
                $output .= '<dt>' . __( 'Start:', 'mythemeshop' ) . '</dt>';
                $output .= '<dd>' . date_i18n( get_option('date_format' ), $start_date );
                $output .= '</dd>';
            }
            if ( ! empty( $end_date ) ) {
                $output .= '<dt>' . __( 'End:', 'mythemeshop' ) . '</dt>';
                $output .= '<dd>' . date_i18n( get_option('date_format' ), $end_date );
                $output .= '</dd>';
            }
            if ( ! empty( $start_time ) || ! empty( $end_time ) ) {
                $output .= '<dt>' . __( 'Time:', 'mythemeshop' ) . '</dt>';
                $output .= '<dd>';
                if ( ! empty( $start_time ) ) $output .= date_i18n( get_option('time_format'), $start_time );
                if ( ! empty( $end_time ) ) $output .= ' - ' . date_i18n( get_option('time_format'), $end_time );
                $output .= '</dd>';
            }
        break;
        case 'long':
            $output .= '<dt>' . __( 'Start:', 'mythemeshop' ) . '</dt>';
            $output .= '<dd>' . date_i18n( get_option('date_format' ), $start_date );
            if ( ! empty( $start_time ) ) $output .= ' @ ' . date_i18n( get_option('time_format'), $start_time );
            $output .= '</dd>';
            $output .= '<dt>' . __( 'End:', 'mythemeshop' ) . '</dt>';
            $output .= '<dd>' . date_i18n( get_option('date_format' ), $end_date );
            if ( ! empty( $end_time ) ) $output .= ' @ ' . date_i18n( get_option('time_format'), $end_time );
            $output .= '</dd>';
        break;
    }
    

    if ( ! empty( $venue ) ) $output .= '<dt>' . __( 'Venue:', 'mythemeshop' ) . '</dt><dd>' . $venue . '</dd>';
    if ( ! empty( $address ) ) $output .= '<dt>' . __( 'Address:', 'mythemeshop' ) . '</dt><dd>' . $address . '</dd>';
    if ( ! empty( $cost ) ) $output .= '<dt>' . __( 'Cost:', 'mythemeshop' ) . '</dt><dd>' . $cost . '</dd>';

    $output .= '</dl>';
    

    return $output;
}

/* 
 * Load scripts for date and time pickers in edit event screen
 */
function mts_enqueue_datepicker() {

    $screen = get_current_screen();
    $screen_id = $screen->id;

    if ( 'event' === $screen_id ) {
        // JS
        // datepicker
        wp_enqueue_script( 'date-picker',  get_template_directory_uri() . '/js/datepicker.js',  array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), time(), true );
        // time picker
        wp_enqueue_script( 'time-picker',  get_template_directory_uri() . '/js/jquery-ui-timepicker-addon.js',  array( 'date-picker', 'jquery-ui-slider' ), time(), true );

        // Styles
        wp_enqueue_style('date-time-picker', get_template_directory_uri() . '/css/mts-datepicker.css' );
    }
}
add_action( 'admin_enqueue_scripts', 'mts_enqueue_datepicker' );

/* 
 * 
 */
function mts_get_event_metadata( $post = 0 ) {

    $post = get_post( $post );

    $id = isset( $post->ID ) ? $post->ID : 0;

    $meta = get_post_custom( $id );
    
    $event_meta = array();

    $event_meta['start_date'] = isset( $event_meta['_mts_event_start_date'][0] ) ? $event_meta['_mts_event_start_date'][0] : '';
    $event_meta['end_date']   = isset( $event_meta['_mts_event_end_date'][0] )   ? $event_meta['_mts_event_end_date'][0]   : '';
    $event_meta['start_time'] = isset( $event_meta['_mts_event_start_time'][0] ) ? $event_meta['_mts_event_start_time'][0] : '';
    $event_meta['end_time']   = isset( $event_meta['_mts_event_end_time'][0] )   ? $event_meta['_mts_event_end_time'][0]   : '';
    $event_meta['venue']      = isset( $event_meta['_mts_event_venue'][0] )      ? $event_meta['_mts_event_venue'][0]      : '';
    $event_meta['address']    = isset( $event_meta['_mts_event_address'][0] )    ? $event_meta['_mts_event_address'][0]    : '';
    $event_meta['cost']       = isset( $event_meta['_mts_event_cost'][0] )       ? $event_meta['_mts_event_cost'][0]       : '';

    return $event_meta;
}


/* 
 * Draw events calendar
 */
function mts_draw_calendar( $month, $year ) {
    //start draw table
    $calendar = '<table class="calendar">';

    $week_start_day = get_option( 'start_of_week' );

    //days and weeks vars now
    $running_day = date( 'w', mktime( 0, 0, 0, $month, 1, $year ) );
    if ( $week_start_day == 1 )
        $running_day = ( $running_day > 0 ) ? $running_day - 1 : 6;
    $days_in_month = date( 't', mktime( 0, 0, 0, $month, 1, $year ) );
    $days_in_this_week = 1;
    $day_counter = 0;
    $dates_array = array();

    //get today's date
    $time = current_time('timestamp');
    $today_day = date('j', $time);
    $today_month = date('m', $time);
    $today_year = date('Y', $time);

    //row for week one */
    $calendar.= '<tr class="calendar-row">';

    //print "blank" days until the first of the current week
    for ( $x = 0; $x < $running_day; $x++ ) :

        $calendar.= '<td class="calendar-day-np"></td>';
        $days_in_this_week++;

    endfor;

    $count = 0;
    $first_event_id = false;
    $active_day = '';
    //keep going with days
    for ( $list_day = 1; $list_day <= $days_in_month; $list_day++ ):

        $cal_day_timestamp = mktime(0, 0, 0, $month, $list_day, $year);

        $last_day_timestamp = mktime(0, 0, 0, $month, $days_in_month, $year);

        // get all events from current date 'till the last day in month ( with start date defined )
        $args = array(
            'numberposts' => -1,
            'post_type' => 'event',
            'post_status' => 'publish',
            'orderby' => 'meta_value_num',
            'order' => 'asc',
            'meta_query' => array(
                'relation'  =>   'AND',
                array(
                    'key'       => '_mts_event_start_date',
                    'compare'   => '<=',
                    'value'     => $cal_day_timestamp,
                ),
                array(
                    'key'       => '_mts_event_start_date',
                    'compare'   => '<=',
                    'value'     => $last_day_timestamp,
                )
            ),
        );

        $events = get_posts( apply_filters( 'mts_calendar_query_args', $args ) );

        //var_dump($events);
        $cal_event = '';
        $count_events = 0;

        foreach ( $events as $event ) : setup_postdata( $event );

            $id = $event->ID;

            // timestamp for start date
            $timestamp_start = get_post_meta( $id, '_mts_event_start_date', true );
            // timestamp for end date
            $timestamp_end = get_post_meta( $id, '_mts_event_end_date', true );

            // check if there is active events on current day
            // if yes, return the link to event
            if ( $timestamp_start <= $cal_day_timestamp &&  $timestamp_end >= $cal_day_timestamp ) {
                $active_class = '';
                
                $count++;
                $count_events++;
                if ( 1 == $count ) {
                    $first_event_id = $id;
                    $active_day = $list_day;
                }
                if ( $first_event_id == $id ) {
                    $active_class = ' class="active-event"';
                }
                $cal_event .= '<a href="'. get_permalink( $id ) .'" data-post-id="'.$id.'"'.$active_class.'>'. get_the_title( $id ) .'</a>';
            }
            
        endforeach;

        $today = ( $today_day == $list_day && $today_month == $month && $today_year == $year ) ? ' today' : '';

        if ( !empty( $cal_event ) ) {
            $has_event = ' has-events';
            $num_events = ( 1 == $count_events ) ? ' single-event' : ' multiple-events';
        } else {
            $has_event = '';
            $num_events = '';
        }

        $active_day_class = ( $list_day == $active_day ) ? ' active-day' : '';

        $cal_day = '<td class="calendar-day'. $today . $has_event . $num_events . $active_day_class.'"><div class="mts_day_div">';

        // add in the day numbering
        $cal_day .= '<div class="day-number">'.$list_day.'</div>';

        $calendar .= $cal_day;

        $calendar.= $cal_event ? '<div class="event-links">'.$cal_event.'</div>' : '';

        $calendar.= '</div></td>';

        if ( $running_day == 6 ) :

            $calendar.= '</tr>';

            if ( ( $day_counter + 1 ) != $days_in_month ):
                $calendar .= '<tr class="calendar-row">';
            endif;

            $running_day = -1;
            $days_in_this_week = 0;

        endif;

        $days_in_this_week++; $running_day++; $day_counter++;

    endfor;

    //finish the rest of the days in the week
    if ( $days_in_this_week < 8 ) :
        for ( $x = 1; $x <= ( 8 - $days_in_this_week ); $x++ ) :
          $calendar.= '<td class="calendar-day-np" valign="top"><div class="mts_day_div"></div></td>';
        endfor;
    endif;

    wp_reset_postdata();

    //final row
    $calendar.= '</tr>';

    //end the table
    $calendar.= '</table>';


    $return = array();

    $return['table'] = $calendar;
    $return['first_event_id'] = $first_event_id;

    return $return;
}

/* 
 * Display events calendar
 */
function mts_get_events_calendar( $year_override = null ) {
    ob_start();
    ?>
    <div id="mts_events_calendar" class="events-calendar">
        <div id="mts_events_calendar_head">
            <?php
            $time = current_time('timestamp');

            // default month and year
            $today_month = date('n', $time);
            $today_year = date('Y', $time);

            // check for posted month/year
            if(isset($_POST['mts_nonce']) && wp_verify_nonce($_POST['mts_nonce'], 'mts_calendar_nonce')) {
                $today_month    = isset( $_POST['mts_month'] )         ? absint( $_POST['mts_month'] )         : date( 'n' );
                $today_year     = isset( $_POST['mts_year'] )          ? absint( $_POST['mts_year'] )          : date( 'Y' );
                $current_month  = isset( $_POST['mts_current_month'] ) ? absint( $_POST['mts_current_month'] ) : date( 'n' );
                if( isset( $_POST['mts_prev'] ) ) {
                    $today_year = $current_month == 1 ? $today_year - 1 : $today_year;
                } elseif( isset( $_POST['mts_next'] ) ) {
                    $today_year = $current_month == 12 ? $today_year + 1 : $today_year;
                }
            }

            if( !is_null( $year_override ) )
                $today_year = absint( $year_override );

            $months = array(
                1 => mts_month_num_to_name(1),
                2 => mts_month_num_to_name(2),
                3 => mts_month_num_to_name(3),
                4 => mts_month_num_to_name(4),
                5 => mts_month_num_to_name(5),
                6 => mts_month_num_to_name(6),
                7 => mts_month_num_to_name(7),
                8 => mts_month_num_to_name(8),
                9 => mts_month_num_to_name(9),
                10 => mts_month_num_to_name(10),
                11 => mts_month_num_to_name(11),
                12 => mts_month_num_to_name(12)
            );
            ?>
            <?php echo mts_calendar_next_prev( $today_month, $today_year ); ?>
            <div id="mts_calendar_title"><?php echo esc_html( $months[$today_month] . ' ' . $today_year ); ?></div>
        </div><!--#mts_events_calendar_head-->
        <div id="mts_calendar">
            <?php
            $cal = mts_draw_calendar( $today_month, $today_year );
            echo $cal['table'];
            $first_event_id = $cal['first_event_id'];
            ?>
        </div>
    </div><!--#mts_events_calendar-->
    <div class="event-preview">
    <?php
    
    if ( false !== $first_event_id ) {
        
        mts_calendar_event_preview( $first_event_id );

    } else {
    ?>
        <div class="no-events"><?php _e( 'No events scheduled for this month', 'mythemeshop' ); ?></div>
    <?php
    }
    ?>
    </div><!--.event-preview-->
    <?php
    return ob_get_clean();
}

/* 
 * Events calendar month switcher
 */
function mts_calendar_next_prev( $today_month, $today_year ) {
    ?>
    <div id="mts_event_nav_wrap">
        <?php
            $next_month = $today_month + 1;
            $next_month = $next_month > 12 ? 1 : $next_month;
            $next_year  = $next_month > 12 ? $today_year + 1 : $today_year;

            $prev_month = $today_month - 1;
            $prev_month = $prev_month < 1 ? 12 : $prev_month;
            $prev_year  = $prev_month < 1 ? $today_year - 1 : $today_year;
        ?>
        <form id="mts_event_nav_prev" class="mts_events_form" method="POST" action="#mts_events_calendar_<?php echo uniqid(); ?>">
            <input type="hidden" name="mts_month" value="<?php echo absint( $prev_month ); ?>">
            <input type="hidden" name="mts_year" value="<?php echo absint( $prev_year ); ?>">
            <input type="hidden" name="mts_current_month" value="<?php echo absint( $today_month ); ?>">
            <button type="submit" class="mts_calendar_submit" name="mts_prev"><i class="fa fa-angle-left"></i></button>
            <input type="hidden" name="mts_nonce" value="<?php echo wp_create_nonce( 'mts_calendar_nonce' ) ?>" />
            <input type="hidden" name="action" value="mts_load_calendar"/>
            <input type="hidden" name="action_2" value="prev_month"/>
        </form>
        <form id="mts_event_nav_next" class="mts_events_form" method="POST" action="#mts_events_calendar_<?php echo uniqid(); ?>">
            <input type="hidden" name="mts_month" class="month" value="<?php echo absint( $next_month ); ?>">
            <input type="hidden" name="mts_year" class="year" value="<?php echo absint( $next_year ); ?>">
            <input type="hidden" name="mts_current_month" value="<?php echo absint( $today_month ); ?>">
            <button type="submit" class="mts_calendar_submit" name="mts_next"><i class="fa fa-angle-right"></i></button>
            <input type="hidden" name="mts_nonce" value="<?php echo wp_create_nonce( 'mts_calendar_nonce' ) ?>" />
            <input type="hidden" name="action" value="mts_load_calendar"/>
            <input type="hidden" name="action_2" value="next_month"/>
        </form>
    </div>
    <?php
}
/* 
 * Transform month number to month name
 */
function mts_month_num_to_name( $n ) {
    $timestamp = mktime( 0, 0, 0, $n, 1, 2005 );
    return date_i18n( 'F', $timestamp );
}

/* 
 * Function to display event preview next to calendar
 */
function mts_calendar_event_preview( $id ) {

    $event_link  = get_permalink( $id );
        $event_title = get_the_title( $id );
        $event_thumb_url = get_template_directory_uri().'/images/nothumb-eventcalendar.png';
        if ( has_post_thumbnail( $id ) ) {
            $event_thumb_id = get_post_thumbnail_id( $id );
            $event_thumb_url_array = wp_get_attachment_image_src( $event_thumb_id, 'eventcalendar', true );
            $event_thumb_url = $event_thumb_url_array[0];
        } else {
            $event_thumb_url = get_template_directory_uri().'/images/nothumb-eventcalendar.png';
        }
        $style = ' style="background-image: url('.$event_thumb_url.');"';
    ?>
        <div class="event-preview-inner"<?php echo $style; ?>>
            <div class="event-details">
                <h2 class="title front-view-title"><a href="<?php echo $event_link; ?>"><?php echo $event_title; ?></a></h2>
                <span class="post-info">
                    <?php
                    $type = get_post_meta( $id, '_mts_event_type', true );

                    $start_date = get_post_meta( $id, '_mts_event_start_date', true );
                    $start_time = get_post_meta( $id, '_mts_event_start_time', true );
                    $end_date   = get_post_meta( $id, '_mts_event_end_date', true );
                    $end_time   = get_post_meta( $id, '_mts_event_end_time', true );

                    $time = '';
                    if ( 'long' != $type && ( !empty( $start_time ) || !empty( $end_time ) ) ) {
                        $time = '<span><i class="fa fa-clock-o"></i>';
                        if ( ! empty( $start_time ) ) $time .= date_i18n( get_option('time_format'), $start_time );
                        if ( ! empty( $end_time ) ) $time .= ' - ' . date_i18n( get_option('time_format'), $end_time );
                        $time .= '</span>';
                    }

                    echo $time;
                    ?>
                    <span><a href="<?php echo $event_link; ?>"><i class="fa fa-share-square-o"></i><?php _e( 'More Details', 'mythemeshop' ); ?></a></span>
                </span>
            </div>
        </div>
    <?php
}
/* 
 * Function to load calendar via ajax
 */
function mts_load_calendar_via_ajax() {
    if(isset($_POST['mts_nonce']) && wp_verify_nonce($_POST['mts_nonce'], 'mts_calendar_nonce')) {

        $current_month  = isset( $_POST['mts_current_month'] ) ? absint( $_POST['mts_current_month'] ) : 0;
        $year           = absint( $_POST['mts_year'] );

        if( $current_month == 12 && $_POST['action_2'] == 'next_month' )
            $year++;
        elseif( $current_month == 1 && $_POST['action_2'] == 'prev_month' )
            $year--;

        die( mts_get_events_calendar( $year ) );
    }
}
add_action('wp_ajax_mts_load_calendar', 'mts_load_calendar_via_ajax');
add_action('wp_ajax_nopriv_mts_load_calendar', 'mts_load_calendar_via_ajax');

/* 
 * Function to display event preview via ajax
 */
function mts_calendar_event_preview_via_ajax() {

    if( isset( $_POST['mts_events_preview_nonce'] ) && wp_verify_nonce( $_POST['mts_events_preview_nonce'], 'mts_events_preview_nonce' ) ) {
        
        $event_id = $_POST['event_id'];

        die( mts_calendar_event_preview( $event_id ) );
    }
}
add_action('wp_ajax_mts_calendar_event_preview_via_ajax', 'mts_calendar_event_preview_via_ajax');
add_action('wp_ajax_nopriv_mts_calendar_event_preview_via_ajax', 'mts_calendar_event_preview_via_ajax');

/* 
 * Modify main query in event archives, from newest to oldest
 */
function mts_modify_events_archive_query( $query ) {
    if( is_post_type_archive('event') && $query->is_main_query() && !is_admin() ) {
        
        if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'nav_menu_item' )
            return $query;
        
        $query->set('orderby', 'meta_value_num');
        $query->set('meta_key', '_mts_event_start_date');
        $query->set('order', 'DESC');
    }
}
add_action('pre_get_posts', 'mts_modify_events_archive_query', 999);

/**
 * Event Columns
*/

function mts_event_columns( $event_columns ) {
    $event_columns = array(
        'cb'               => '<input type="checkbox"/>',
        'title'            => __('Title', 'mythemeshop'),
        'event_start_date' => __('Start', 'mythemeshop'),
        'event_end_date'   => __('End', 'mythemeshop'),
        'date'             => __('Created', 'mythemeshop')
    );
    return $event_columns;
}
add_filter('manage_edit-event_columns', 'mts_event_columns');


/**
 * Render Event Columns
*/
function mts_render_event_columns( $column_name, $post_id ) {  
    
    if( get_post_type( $post_id ) == 'event' ) {

        // timestamp for start date
        $timestamp_start = get_post_meta( $post_id, '_mts_event_start_date', true );
        // timestamp for end date
        $timestamp_end = get_post_meta( $post_id, '_mts_event_end_date', true );
        
        switch ($column_name) {         
            case 'event_start_date':
                if (!empty ($timestamp_start))
                    echo date(get_option('date_format'), $timestamp_start);
            break;
            case 'event_end_date':
                if (!empty ($timestamp_end))
                    echo date(get_option('date_format'), $timestamp_end);
            break;
        }
    }
}
add_action('manage_posts_custom_column', 'mts_render_event_columns', 10, 2);
?>