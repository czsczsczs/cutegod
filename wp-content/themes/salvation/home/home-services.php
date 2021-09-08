<?php
$mts_options = get_option(MTS_THEME_NAME);

$services_bg_cover_class = ( $mts_options['mts_homepage_services_background_image_cover'] == '1' && $mts_options['mts_homepage_services_background_image'] != '' ) ? ' cover-bg' : '';
    $services_parallax_class = ( $mts_options['mts_homepage_services_parallax'] == '1' ) ? ' parallax-bg' : '';
    ?>
    <div id="services" class="section clearfix<?php echo $services_bg_cover_class . $services_parallax_class; ?>">
        <div class="container">
            <?php $section_title = $mts_options['mts_homepage_services_title'];

            if ( !empty( $section_title ) ) { ?>
                <div class="section-title-wrap" data-scroll-reveal="enter top move 50px">
                    <h3 class="section-title"><?php echo $section_title; ?></h3>
                </div>
            <?php }

            $section_services = array();
            if ( ! empty( $mts_options['mts_homepage_services'] ) ) { ?>
                <div class="services" data-scroll-reveal="enter bottom move 50px">
                    <?php foreach ( $mts_options['mts_homepage_services'] as $key => $section ) {
                        $service_title       = $section['mts_homepage_service_title'];
                        $service_image       = $section['mts_homepage_service_image'];
                        $service_date        = $section['mts_homepage_service_date'];
                        $service_time        = $section['mts_homepage_service_time'];
                        $service_description = $section['mts_homepage_service_description'];
                        $service_link        = $section['mts_homepage_service_link'];
                        ?>
                        <div class="grid-box">
                            <div class="grid-box-inner">
                                <a href="<?php echo $service_link; ?>" title="<?php echo $service_title; ?>" rel="nofollow" id="featured-thumbnail">
                                    <?php echo '<div class="featured-thumbnail">'; echo wp_get_attachment_image( $service_image, 'service', false, array('title' => '') ); echo '</div>'; ?>
                                </a>
                                <header>
                                    <h2 class="title front-view-title" itemprop="headline"><a href="<?php echo $service_link; ?>" title="<?php echo $service_title; ?>"><?php echo $service_title; ?></a></h2>
                                    <?php //if ( ! empty( $service_date ) || ! empty( $service_time ) ) { ?>
                                    <span class="post-info">
                                        <?php if ( ! empty( $service_date ) ) {?><span><i class="fa fa-calendar"></i><?php echo $service_date; ?></span><?php } ?>
                                        <?php if ( ! empty( $service_time ) ) {?><span><i class="fa fa-clock-o"></i><?php echo $service_time; ?></span><?php } ?>
                                    </span>
                                    <?php //} ?>
                                </header>
                                <div class="front-view-content">
                                    <?php echo $service_description; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>