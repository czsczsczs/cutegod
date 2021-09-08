<?php
$mts_options = get_option(MTS_THEME_NAME);
$audio_bg_cover_class = ( $mts_options['mts_homepage_audio_player_background_image_cover'] == '1' && $mts_options['mts_homepage_audio_player_background_image'] != '' ) ? ' cover-bg' : '';
    $audio_parallax_class = ( $mts_options['mts_homepage_audio_player_parallax'] == '1' ) ? ' parallax-bg' : '';

    $args = array(
        'numberposts' => '5',
        'tax_query' => array(
            array(
                'taxonomy' => 'post_format',
                'field' => 'slug',
                'terms' => 'post-format-audio',
                'operator' => 'IN'
            )
        )
    );
    $latest_audio_post = wp_get_recent_posts( $args );
    ?>
    <div id="audio-player" class="section clearfix<?php echo $audio_bg_cover_class . $audio_parallax_class; ?>">
        <div class="container">
        <?php if ( $latest_audio_post ) { $latest_audio_post = $latest_audio_post[0]; ?>
            <div class="audio-player-container" data-scroll-reveal="enter left move 50px">
            <?php
            $pattern = get_shortcode_regex();
            // Search for audio shortcode
            if ( preg_match_all( '/'. $pattern .'/s', $latest_audio_post['post_content'], $matches ) && array_key_exists( 2, $matches ) && ( in_array( 'audio', $matches[2] ) ) ) {
                
                echo apply_filters('the_content', $matches[0][0]); // display audio player

            } else { ?>
                <div class="message_box warning"><p><?php _e('No audio shortcode found', 'mythemeshop'); ?></p></div>
            <?php } ?>
            </div>
            <div class="audio-title-container" data-scroll-reveal="enter right move 50px">
                <h4 class="post-title"><?php echo '<a href="' . get_permalink($latest_audio_post["ID"]) . '" title="'.esc_attr( __($latest_audio_post["post_title"])).'" >' . ( __($latest_audio_post["post_title"])).'</a>';?></h4>
                <span class="post-info"><?php _e('By', 'mythemeshop');?> <span class="post-author"><?php the_author_meta( 'display_name', $latest_audio_post["post_author"] ); ?></span></span>
            </div>
        <?php } else { ?>
            <div class="message_box warning"><p><?php _e('No posts with audio format found', 'mythemeshop'); ?></p></div>
        <?php } ?>
        </div>
    </div>