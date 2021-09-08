<?php

/*-----------------------------------------------------------------------------------*/
/*	Sidebar Selection meta box
/*-----------------------------------------------------------------------------------*/
function mts_add_sidebar_metabox() {
    $screens = array('post', 'page');
    foreach ($screens as $screen) {
        add_meta_box(
            'mts_sidebar_metabox',                  // id
            __('Sidebar', 'mythemeshop'),    // title
            'mts_inner_sidebar_metabox',            // callback
            $screen,                                // post_type
            'side',                                 // context (normal, advanced, side)
            'high'                               // priority (high, core, default, low)
                                                    // callback args ($post passed by default)
        );
    }
}
add_action('add_meta_boxes', 'mts_add_sidebar_metabox');


/**
 * Print the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function mts_inner_sidebar_metabox($post) {
    global $wp_registered_sidebars;
    
    // Add an nonce field so we can check for it later.
    wp_nonce_field('mts_inner_sidebar_metabox', 'mts_inner_sidebar_metabox_nonce');
    
    /*
    * Use get_post_meta() to retrieve an existing value
    * from the database and use the value for the form.
    */
    $custom_sidebar = get_post_meta( $post->ID, '_mts_custom_sidebar', true );
    $sidebar_location = get_post_meta( $post->ID, '_mts_sidebar_location', true );

    // Select custom sidebar from dropdown
    echo '<select name="mts_custom_sidebar" id="mts_custom_sidebar" style="margin-bottom: 10px;">';
    echo '<option value="" '.selected('', $custom_sidebar).'>-- '.__('Default', 'mythemeshop').' --</option>';
    
    // Exclude built-in sidebars
    $hidden_sidebars = array('sidebar','shop-sidebar', 'product-sidebar', 'footer-top', 'footer-top-2', 'footer-top-3', 'footer-top-4', 'footer-bottom', 'footer-bottom-2', 'footer-bottom-3', 'footer-bottom-4','bottom-header-sidebar','event-schedule-sidebar','event-reservation-sidebar');    
    
    foreach ($wp_registered_sidebars as $sidebar) {
        if (!in_array($sidebar['id'], $hidden_sidebars)) {
            echo '<option value="'.esc_attr($sidebar['id']).'" '.selected($sidebar['id'], $custom_sidebar, false).'>'.$sidebar['name'].'</option>';
        }
    }
    echo '<option value="mts_nosidebar" '.selected('mts_nosidebar', $custom_sidebar).'>-- '.__('No sidebar --', 'mythemeshop').'</option>';    
    echo '</select><br />';
    
    // Select single layout (left/right sidebar)
    echo '<div class="mts_sidebar_location_fields">';
    echo '<label for="mts_sidebar_location_default" style="display: inline-block; margin-right: 20px;"><input type="radio" name="mts_sidebar_location" id="mts_sidebar_location_default" value=""'.checked('', $sidebar_location, false).'>'.__('Default side', 'mythemeshop').'</label>';
    echo '<label for="mts_sidebar_location_left" style="display: inline-block; margin-right: 20px;"><input type="radio" name="mts_sidebar_location" id="mts_sidebar_location_left" value="left"'.checked('left', $sidebar_location, false).'>'.__('Left', 'mythemeshop').'</label>';
    echo '<label for="mts_sidebar_location_right" style="display: inline-block; margin-right: 20px;"><input type="radio" name="mts_sidebar_location" id="mts_sidebar_location_right" value="right"'.checked('right', $sidebar_location, false).'>'.__('Right', 'mythemeshop').'</label>';
    echo '</div>';
    
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            function mts_toggle_sidebar_location_fields() {
                $('.mts_sidebar_location_fields').toggle(($('#mts_custom_sidebar').val() != 'mts_nosidebar'));
            }
            mts_toggle_sidebar_location_fields();
            $('#mts_custom_sidebar').change(function() {
                mts_toggle_sidebar_location_fields();
            });
        });
    </script>
    <?php
    //debug
    //global $wp_meta_boxes;
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function mts_save_custom_sidebar( $post_id ) {
    
    /*
    * We need to verify this came from our screen and with proper authorization,
    * because save_post can be triggered at other times.
    */
    
    // Check if our nonce is set.
    if ( ! isset( $_POST['mts_inner_sidebar_metabox_nonce'] ) )
    return $post_id;
    
    $nonce = $_POST['mts_inner_sidebar_metabox_nonce'];
    
    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'mts_inner_sidebar_metabox' ) )
      return $post_id;
    
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;
    
    // Check the user's permissions.
    if ( 'page' == $_POST['post_type'] ) {
    
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
    
    } else {
    
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }
    
    /* OK, its safe for us to save the data now. */
    
    // Sanitize user input.
    $sidebar_name = sanitize_text_field( $_POST['mts_custom_sidebar'] );
    $sidebar_location = sanitize_text_field( $_POST['mts_sidebar_location'] );
    
    // Update the meta field in the database.
    update_post_meta( $post_id, '_mts_custom_sidebar', $sidebar_name );
    update_post_meta( $post_id, '_mts_sidebar_location', $sidebar_location );
}
add_action( 'save_post', 'mts_save_custom_sidebar' );


/*-----------------------------------------------------------------------------------*/
/*  Post Template Selection meta box
/*-----------------------------------------------------------------------------------*/
function mts_add_posttemplate_metabox() {
    add_meta_box(
        'mts_posttemplate_metabox',         // id
        __('Template', 'mythemeshop'),      // title
        'mts_inner_posttemplate_metabox',   // callback
        'post',                             // post_type
        'side',                             // context (normal, advanced, side)
        'high'                              // priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'mts_add_posttemplate_metabox');


/**
 * Print the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function mts_inner_posttemplate_metabox($post) {
    global $wp_registered_sidebars;
    
    // Add an nonce field so we can check for it later.
    wp_nonce_field('mts_inner_posttemplate_metabox', 'mts_inner_posttemplate_metabox_nonce');
    
    /*
    * Use get_post_meta() to retrieve an existing value
    * from the database and use the value for the form.
    */
    $posttemplate = get_post_meta( $post->ID, '_mts_posttemplate', true );

    // Select post template
    echo '<select name="mts_posttemplate" style="margin-bottom: 10px;">';
    echo '<option value="" '.selected('', $posttemplate).'>'.__('Default Post Template', 'mythemeshop').'</option>';
    echo '<option value="parallax" '.selected('parallax', $posttemplate).'>'.__('Parallax Template', 'mythemeshop').'</option>';
    echo '</select><br />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function mts_save_posttemplate( $post_id ) {
    
    /*
    * We need to verify this came from our screen and with proper authorization,
    * because save_post can be triggered at other times.
    */
    
    // Check if our nonce is set.
    if ( ! isset( $_POST['mts_inner_posttemplate_metabox_nonce'] ) )
    return $post_id;
    
    $nonce = $_POST['mts_inner_posttemplate_metabox_nonce'];
    
    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'mts_inner_posttemplate_metabox' ) )
      return $post_id;
    
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;
    
    // Check the user's permissions.
    if ( 'page' == $_POST['post_type'] ) {
    
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
    
    } else {
    
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }
    
    /* OK, its safe for us to save the data now. */
    
    // Sanitize user input.
    $posttemplate = sanitize_text_field( $_POST['mts_posttemplate'] );
    
    // Update the meta field in the database.
    update_post_meta( $post_id, '_mts_posttemplate', $posttemplate );
}
add_action( 'save_post', 'mts_save_posttemplate' );

// Related function: mts_get_posttemplate( $single_template ) in functions.php

/*-----------------------------------------------------------------------------------*/
/*  Event settings meta box
/*-----------------------------------------------------------------------------------*/
function mts_add_event_metabox() {
    
    add_meta_box(
        'mts_event_section',                 // id
        __('Event Settings', 'mythemeshop'), // title
        'mts_event_settings_metabox',        // callback
        'event',                             // post_type
        'side',                              // context (normal, advanced, side)
        'high'                               // priority (high, core, default, low)
                                             // callback args ($post passed by default)
    );
}
add_action('add_meta_boxes', 'mts_add_event_metabox');


/**
 * Print the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function mts_event_settings_metabox($post) {
    
    // Add an nonce field so we can check for it later.
    wp_nonce_field('mts_event_settings_metabox', 'mts_event_settings_metabox_nonce');

    $id = $post->ID;

    $start_date = get_post_meta( $id, '_mts_event_start_date', true );
    $start_date = !empty( $start_date ) ? date('m/d/Y', $start_date) : '';

    $start_time = get_post_meta( $id, '_mts_event_start_time', true );
    $start_time = !empty( $start_time ) ? date('H:i', $start_time) : '';

    $end_date = get_post_meta( $id, '_mts_event_end_date', true );
    $end_date = !empty( $end_date ) ? date('m/d/Y', $end_date) : '';

    $end_time = get_post_meta( $id, '_mts_event_end_time', true );
    $end_time = !empty( $end_time ) ? date('H:i', $end_time) : '';
?>
    <p>
        <label for="mts-event-start-date"><?php _e( 'Start Date', 'mythemeshop' ); ?></label>
        <br />
        <input class="widefat mts-datepicker" type="text" name="mts-event-start-date" id="mts-event-start-date" value="<?php echo $start_date; ?>" size="30" />
    </p>

    <p>
        <label for="mts-event-start-time"><?php _e( 'Start Time', 'mythemeshop' ); ?></label>
        <br />
        <input class="widefat mts-timepicker" type="text" name="mts-event-start-time" id="mts-event-start-time" value="<?php echo $start_time; ?>" size="30" />
    </p>

    <p>
        <label for="mts-event-end-date"><?php _e( 'End Date', 'mythemeshop' ); ?></label>
        <br />
        <input class="widefat mts-datepicker" type="text" name="mts-event-end-date" id="mts-event-end-date" value="<?php echo $end_date; ?>" size="30" />
    </p>

    <p>
        <label for="mts-event-end-time"><?php _e( 'End Time', 'mythemeshop' ); ?></label>
        <br />
        <input class="widefat mts-timepicker" type="text" name="mts-event-end-time" id="mts-event-end-time" value="<?php echo $end_time; ?>" size="30" />
    </p>

    <p>
        <label for="mts-event-daily">
            <input type="checkbox" name="mts-event-daily" id="mts-event-daily" value="yes" <?php checked( get_post_meta( $post->ID, '_mts_event_daily', true ), 'yes' ); ?> />
            <?php _e( 'Apply start/end time to each event day?', 'mythemeshop' )?>
        </label>
    </p>

    <p>
        <label for="mts-event-venue"><?php _e( 'Venue', 'mythemeshop' ); ?></label>
        <br />
        <input class="widefat" type="text" name="mts-event-venue" id="mts-event-venue" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mts_event_venue', true ) ); ?>" size="30" />
    </p>

    <p>
        <label for="mts-event-address"><?php _e( 'Address', 'mythemeshop' ); ?></label>
        <br />
        <input class="widefat" type="text" name="mts-event-address" id="mts-event-address" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mts_event_address', true ) ); ?>" size="30" />
    </p>

    <p>
        <label for="mts-event-cost"><?php _e( 'Cost', 'mythemeshop' ); ?></label>
        <br />
        <input class="widefat" type="text" name="mts-event-cost" id="mts-event-cost" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mts_event_cost', true ) ); ?>" size="30" />
    </p>

    <p>
        <label for="mts-event-form">
            <input type="checkbox" name="mts-event-form" id="mts-event-form" value="yes" <?php checked( get_post_meta( $post->ID, '_mts_event_form', true ), 'yes' ); ?> />
            <?php _e( 'Show contact form?', 'mythemeshop' )?>
        </label>
    </p>
<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function mts_save_event_settings( $post_id ) {
    
    /*
    * We need to verify this came from our screen and with proper authorization,
    * because save_post can be triggered at other times.
    */
    
    // Check if our nonce is set.
    if ( ! isset( $_POST['mts_event_settings_metabox_nonce'] ) )
    return $post_id;
    
    $nonce = $_POST['mts_event_settings_metabox_nonce'];
    
    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'mts_event_settings_metabox' ) )
      return $post_id;
    
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;
    
    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    
    /* OK, its safe for us to save the data now. */
    
    // Sanitize user input.
    $start_date = sanitize_text_field( $_POST['mts-event-start-date'] );
    $start_time = sanitize_text_field( $_POST['mts-event-start-time'] );
    $end_date   = sanitize_text_field( $_POST['mts-event-end-date'] );
    $end_time   = sanitize_text_field( $_POST['mts-event-end-time'] );
    $venue      = sanitize_text_field( $_POST['mts-event-venue'] );
    $address    = sanitize_text_field( $_POST['mts-event-address'] );
    $cost       = sanitize_text_field( $_POST['mts-event-cost'] );

    if ( empty( $end_date ) ) $end_date = $start_date;
    if ( empty( $start_date ) ) $start_date = $end_date;
    
    // Update the meta field in the database.
    update_post_meta( $post_id, '_mts_event_start_date', strtotime($start_date) );
    update_post_meta( $post_id, '_mts_event_start_time', strtotime($start_time ));
    update_post_meta( $post_id, '_mts_event_end_date', strtotime($end_date) );
    update_post_meta( $post_id, '_mts_event_end_time', strtotime($end_time ));
    update_post_meta( $post_id, '_mts_event_venue', $venue );
    update_post_meta( $post_id, '_mts_event_address', $address );
    update_post_meta( $post_id, '_mts_event_cost', $cost );

    if ( isset( $_POST[ 'mts-event-form' ] ) ) {
        update_post_meta( $post_id, '_mts_event_form', 'yes' );
    } else {
        update_post_meta( $post_id, '_mts_event_form', '' );
    }

    if ( isset( $_POST[ 'mts-event-daily' ] ) ) {
        update_post_meta( $post_id, '_mts_event_daily', 'yes' );
    } else {
        update_post_meta( $post_id, '_mts_event_daily', '' );
    }

    if ( $start_date == $end_date ) {
        $type = 'single';
    } elseif ( isset( $_POST[ 'mts-event-daily' ] ) ) {
        $type = 'daily';
    } else {
        $type = 'long';
    }
    update_post_meta( $post_id, '_mts_event_type', $type );
}
add_action( 'save_post', 'mts_save_event_settings' );

?>