<?php
$mts_options = get_option(MTS_THEME_NAME);
$statuses_parallax_class = ( $mts_options['mts_homepage_statuses_parallax'] == '1' ) ? ' parallax-bg' : '';
    $orderby = empty( $mts_options['mts_homepage_statuses_random'] ) ? 'date' : 'rand';
    $args = array(
        'numberposts' => '-1',
        'orderby' => $orderby,
        'tax_query' => array(
            array(
                'taxonomy' => 'post_format',
                'field' => 'slug',
                'terms' => 'post-format-status',
                'operator' => 'IN'
            )
        )
    );
    $status_posts = get_posts( $args );
    $status_post = $status_posts ? $status_posts[0] : false;
    if ( $status_post ) {
        $status_post_bg_style = '';
        $has_thumb_class = '';
        $status_post_thumb_id = '';
        if ( has_post_thumbnail( $status_post->ID ) ) {
            $status_post_thumb_id = get_post_thumbnail_id( $status_post->ID );
            $status_post_thumb_url_array = wp_get_attachment_image_src($status_post_thumb_id, 'full', true);
            $status_post_thumb_url = $status_post_thumb_url_array[0];

            $status_post_bg_style = ' style="background-image: url('.$status_post_thumb_url.');"';

            $has_thumb_class = ' has-thumb';
        }
    }
    ?>
    <div id="statuses" class="section cover-bg clearfix<?php echo $has_thumb_class . $statuses_parallax_class; ?>"<?php echo $status_post_bg_style; ?>>
        <?php
        if ( !empty($status_post_thumb_id)) {
            $status_post_circle_thumb_url_array = wp_get_attachment_image_src($status_post_thumb_id, 'featured', true);
            $status_post_circle_thumb_url = $status_post_circle_thumb_url_array[0];
            echo '<div class="circle-thumbnail">';

            echo '<img src="'.$status_post_circle_thumb_url.'" />';
            echo '</div>';
            }
        ?>
        <div class="container">
            <?php
            $section_title = $mts_options['mts_homepage_statuses_title'];

            if ( !empty( $section_title ) ) { ?>
                <div class="section-title-wrap" data-scroll-reveal="enter top move 50px">
                    <h3 class="section-title"><?php echo $section_title; ?></h3>
                </div>
            <?php } ?>
            <?php if ( $status_post ) { ?>
                <div class="section-content" data-scroll-reveal="enter bottom move 50px">
                    <?php echo apply_filters( 'the_content', $status_post->post_content ); ?>
                </div>
                <div class="status-meta"><span class="status-title"><?php echo $status_post->post_title;?></span><span class="status-date"><?php echo get_the_date('', $status_post->ID); ?></span></div>
                <a href="<?php echo get_post_format_link('status'); ?>" class="button"><i class="fa fa-share-square-o"></i><?php _e('More Verses', 'mythemeshop'); ?></a>
            <?php } else { ?>
                <div class="message_box warning"><p><?php _e('No posts with status format found', 'mythemeshop'); ?></p></div>
            <?php } ?>
        </div>
    </div>