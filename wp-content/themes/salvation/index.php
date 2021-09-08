<?php
$mts_options = get_option(MTS_THEME_NAME);

if (empty($mts_options['mts_blog_layout'])) {
    $classes = ' posts-loop list-layout';
    $thumb_size = 'featured';
    $excerpt_lenght = 25;
} else {
    $classes = ' posts-loop grid-layout';
    $thumb_size = 'featured1';
    $excerpt_lenght = 19;
}
get_header(); ?>

    <?php if ( $mts_options['mts_featured_slider'] == '1' ) { ?>
        <div id="homepage-slider" class="flexslider loading">
            <ul class="slides">
                <?php 
                    // prevent implode error
                    if (empty($mts_options['mts_featured_slider_cat']) || !is_array($mts_options['mts_featured_slider_cat'])) {
                        $mts_options['mts_featured_slider_cat'] = array('0');
                    }
                    
                    $slider_cat = implode(",", $mts_options['mts_featured_slider_cat']); $my_query = new WP_Query('cat='.$slider_cat.'&posts_per_page='.$mts_options['mts_featured_slider_num']);
                    while ($my_query->have_posts()) : $my_query->the_post();

                    $thumb_url = '';
                    $style = '';
                    if( has_post_thumbnail() ) {
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                        $thumb_url = $thumb_url_array[0];

                        $style = ' style="background-image: url('.$thumb_url.');"';
                    }
                ?>
                <li<?php echo $style;?>>
                    <div class="container">
                        <h2 class="title slide-title" itemprop="headline"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <div class="slide-content">
                            <a href="#" class="prev-slide"><i class="fa fa-angle-left"></i></a>
                            <a href="#" class="next-slide"><i class="fa fa-angle-right"></i></a>
                            <div class="slide-excerpt">
                                <?php echo mts_excerpt(45); ?>
                            </div>
                        </div>
                        <div class="slide-buttons">
                            <a href="<?php the_permalink() ?>" class="button"><i class="fa fa-file-text"></i><?php _e( 'Read Article','mythemeshop' ); ?></a>
                            <?php 
                            $layout = !empty($mts_options['mts_homepage_layout']['enabled']) ? $mts_options['mts_homepage_layout']['enabled'] : array();
                            if ( has_post_format( 'audio' ) && array_key_exists( 'audio_player', $layout ) ) {
                                $pattern = get_shortcode_regex();
                                // Search for audio shortcode
                                if ( preg_match_all( '/'. $pattern .'/s', get_the_content(), $matches ) && array_key_exists( 2, $matches ) && ( in_array( 'audio', $matches[2] ) ) ) {

                                    $atts = shortcode_parse_atts( $matches[3][0] ); // array of shortcode atts

                                    if ( isset( $atts['mp3'] ) ) { // audio source
                                    ?>
                                        <a href="<?php the_permalink(); ?>" class="button button-alt play-audio" data-audio-src="<?php echo $atts['mp3'] ?>" data-post-author="<?php echo get_the_author(); ?>" data-post-title="<?php the_title_attribute(); ?>"><i class="fa fa-volume-down"></i><?php _e( 'Listen to Audio','mythemeshop' ); ?></a>
                                    <?php
                                    }
                                }
                            ?>
                            <?php } ?>
                        </div>
                    </div>
                </li>
                <?php endwhile; wp_reset_query(); ?>
            </ul>
        </div><!-- #homepage-slider -->
    <?php } ?>

    <?php $homepage_layout = array();
    if ( !empty($mts_options['mts_homepage_layout']['enabled']) && is_array($mts_options['mts_homepage_layout']['enabled']) ) {
        $homepage_layout = array_merge($homepage_layout, $mts_options['mts_homepage_layout']['enabled']);
    }
    if ( !empty($homepage_layout) ) {
        foreach ( $homepage_layout as $key => $section ) {
            get_template_part( 'home/home', $key );
        }
    } ?>

<?php get_footer(); ?>