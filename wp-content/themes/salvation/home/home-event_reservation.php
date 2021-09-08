<?php
$mts_options = get_option(MTS_THEME_NAME);
$reservation_bg_cover_class = ( $mts_options['mts_homepage_event_reservation_background_image_cover'] == '1' && $mts_options['mts_homepage_event_reservation_background_image'] != '' ) ? ' cover-bg' : '';
    $reservation_parallax_class = ( $mts_options['mts_homepage_event_reservation_parallax'] == '1' ) ? ' parallax-bg' : '';
    ?>
    <div id="event-reservation" class="section clearfix<?php echo $reservation_bg_cover_class . $reservation_parallax_class; ?>">
        <div class="container">
            <div class="c-8-12" data-scroll-reveal="enter left move 50px">
                <?php $section_title = $mts_options['mts_homepage_event_reservation_title'];
                if ( !empty( $section_title ) ) { ?>
                    <div class="section-title-wrap">
                        <h3 class="section-title"><?php echo $section_title; ?></h3>
                    </div>
                <?php } ?>
                <div class="event-reservation-form">
                    <?php mts_event_form(); ?>
                </div>
            </div>
            <aside class="sidebar event-reservation-sidebar c-4-12" data-scroll-reveal="enter right move 50px">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('event-reservation-sidebar') ) : ?><div class="widget-placeholder"><?php _e('Insert widgets here (Event Reservation Sidebar)', 'mythemeshop'); ?></div><?php endif; ?>
            </aside>
        </div>
    </div>