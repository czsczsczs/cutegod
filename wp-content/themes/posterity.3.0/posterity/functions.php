<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/* Here you can insert your functions, filters and actions. */

/* That's all, stop editing! Make a great website!. */

/* Init of the framework */

/* This function exist in WP 4.7 and above.
 * Theme has protection from runing it on version below 4.7
 * However, it has to at least run, to give user info about having not compatible WP version :-)
 */
if( function_exists('get_theme_file_path') ){
	/** @noinspection PhpIncludeInspection */
	require_once( get_theme_file_path( '/advance/class-posterity-framework.php' ) );
}
else{
	/** @noinspection PhpIncludeInspection */
	require_once( get_template_directory() . '/advance/class-posterity-framework.php' );
}

global $posterity_a13;
$posterity_a13 = new Posterity_Framework();
$posterity_a13->posterity_start();



function get_content_first_image($content){
    if ( $content === false ) $content = get_the_content();

    preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', $content, $images);
 
    if($images){      
        return $images[1][0];
    }else{
        return false;
    }
    
}

add_filter('wp_nav_menu_items', 'add_search_form_to_menu', 10, 2);
function add_search_form_to_menu($items, $args) {
    // If this isn't the main navbar menu, do nothing
    if( !($args->theme_location == 'primary') ) //搜索按钮显示的置，pirmary或者secondary
    return $items;
    //搜索按钮样式
    return $items . '<li class="nav-search hidden-xs">' . '<a role="button" data-toggle="collapse" class="btn btn-default" aria-expanded="false" href="#search">
    //此处搜索图标
 </a>' . '</li>';

}


function get_post_thumbnail_url($post_id){
    $post_id = ( null === $post_id ) ? get_the_ID() : $post_id;$post=get_post($post_id);
    if( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full');
        $post_thumbnail_src = $thumbnail_src [0];
    } else {
        $post_thumbnail_src = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        if(!empty($matches[1][0]))
        {$post_thumbnail_src = $matches[1][0];   //获取该图片 src
        }else{$post_thumbnail_src = '';}}return $post_thumbnail_src;}
        

/*启用特色图片*/
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
    set_post_thumbnail_size( 200, 200, true );
}