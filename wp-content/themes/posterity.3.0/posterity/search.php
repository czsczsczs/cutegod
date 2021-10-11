<?php
/**
 * The Template for displaying all single posts.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


if(post_password_required()){
    /* don't use the_content() as it also applies filters that we don't need here, if we are using custom password page */
    echo get_the_content();
}
else{
    get_header();

    // Elementor `single` location
    if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
        the_post();
        
        ?>

        <article id="content" style="margin:0 auto;text-align:center;width:63%;margin-top:-40px;" class="clearfix"<?php posterity_schema_args('creative'); ?>>
            <div class="content-limiter">
                <div id="col-mask">

                    <div id="post-<?php the_ID(); ?>" <?php post_class('content-box'); ?>>
                        <div class="formatter">
                            <div class="hentry">
                                <?php posterity_title_bar( 'inside' ); ?>
                                <div class="real-content entry-content"<?php posterity_schema_args('text'); ?>>
                                    <?php the_content(); ?>
                                    
                                    <div class="clear"></div>
                                    <?php
                                    //no need for wp_link_pages, cause the_content takes care of it

                                    posterity_under_post_content();
                                    ?>

                                </div>
                            </div>

                            <?php posterity_posts_navigation(); ?>

                            <?php posterity_author_info(); ?>

                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template( '', true );
                            endif;
                            ?>
                        </div>
                    </div>

                   
                </div>
            </div>
        </article>
    <?php
    }
    get_footer();
}//end of if password_protected
