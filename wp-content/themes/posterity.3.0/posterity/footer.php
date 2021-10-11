<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #mid div and all content after.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


global $posterity_a13;
?>
	</div><!-- #mid -->

<?php
//in case of maintenance mode - we don't print HTML footer
if( ! apply_filters('posterity_only_content', false) ){
	posterity_theme_footer();
	posterity_footer_for_header_modules();
}
posterity_footer_for_site_modules();
?>

	</div><!-- .whole-layout -->
<?php
    /* Always have wp_footer() just before the closing </body>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to reference JavaScript files.
         */
        
         wp_footer();
         
?>
<div id="nav-below" class="belowp">
        <div class="nav-home"><a class="top" href="#content"><img src="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-回到頂部-e1632298255970.png"/></a></div>
        </div>
        <style tyle="css/text">
            .belowp{
                position:fixed; 
                bottom:0; 
                right:0;
                z-index:9999;
                float:right;
                border: 2px solid red;
                border-radius: 30px;
                
            }
            @media only screen and (max-width: 1030px) {
            .belowp{
                margin-bottom: 82px;
            }
        </style>
</body>
</html>