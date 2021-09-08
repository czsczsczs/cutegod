<?php
$mts_options = get_option(MTS_THEME_NAME);

$carousel_bg_cover_class = ( $mts_options['mts_homepage_carousel_background_image_cover'] == '1' && $mts_options['mts_homepage_carousel_background_image'] != '' ) ? ' cover-bg' : '';
    $carousel_parallax_class = ( $mts_options['mts_homepage_carousel_parallax'] == '1' ) ? ' parallax-bg' : '';
    ?>
    <div id="carousel" class="section clearfix<?php echo $carousel_bg_cover_class . $carousel_parallax_class; ?>">
        <div class="container">
            <?php $section_title = $mts_options['mts_homepage_carousel_section_title'];
            if ( !empty( $section_title ) ) { ?>
                <div class="section-title-wrap" data-scroll-reveal="enter top move 50px">
                    <div class="carousel-controls">
                        <div class="owl-buttons"></div>
                    </div>
                    <h3 class="section-title"><?php echo $section_title; ?></h3>
                </div>
            <?php }
            if ( ! empty( $mts_options['mts_homepage_carousel'] ) ) {
            ?>
                <div class="homepage-carousel-container" data-scroll-reveal="enter bottom move 50px">
                    <div class="homepage-carousel">
                        <?php
                        foreach ( $mts_options['mts_homepage_carousel'] as $key => $section ) {
                            $carousel_item_title       = $section['mts_homepage_carousel_title'];
                            $carousel_item_image       = $section['mts_homepage_carousel_image'];
                            $carousel_item_price       = $section['mts_homepage_carousel_price'];
                            $carousel_item_link        = $section['mts_homepage_carousel_link'];
                            ?>
                            <div class="carousel-item">
                                <div class="carousel-item-image">
                                    <?php echo wp_get_attachment_image( $carousel_item_image, 'carousel', true, array('title' => '') ); ?>
                                    <a href="<?php echo $carousel_item_link; ?>" title="<?php echo $carousel_item_title; ?>" rel="nofollow" class="carousel-item-overlay">
                                        <?php echo $carousel_item_title; ?>
                                        <?php if(!empty($carousel_item_price)) { ?>
                                            <br/>
                                            <span class="price"><?php echo $carousel_item_price; ?></span>
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>