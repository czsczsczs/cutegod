<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="mid">
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

do_action('posterity_before_html');

?><!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<?php do_action('posterity_head_start'); ?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="stylesheet" href="http://www.511yj.com/css/bootstrapwp.css">

    <link rel='stylesheet' id='wp-block-library-css'  href='https://themes.getbootstrap.com/wp-includes/css/dist/block-library/style.min.css?ver=5.3' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-block-style-css'  href='https://themes.getbootstrap.com/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style.css?ver=2.4.5' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css'  href='https://themes.getbootstrap.com/wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=3.8.1' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='https://themes.getbootstrap.com/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=3.8.1' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'  href='https://themes.getbootstrap.com/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=3.8.1' type='text/css' media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required { visibility: visible; }
    </style>
    <link rel='stylesheet' id='dokan-fontawesome-css'  href='https://themes.getbootstrap.com/wp-content/plugins/dokan-lite/assets/vendors/font-awesome/font-awesome.min.css?ver=2.9.27' type='text/css' media='all' />
    <link rel='stylesheet' id='dokan-theme-skin-css'  href='https://themes.getbootstrap.com/wp-content/themes/dokan/assets/css/skins/purple.css' type='text/css' media='all' />
    <script type='text/javascript'>
        /* <![CDATA[ */
        var dokan = {"ajaxurl":"https:\/\/themes.getbootstrap.com\/wp-admin\/admin-ajax.php","nonce":"16dfc8c845","ajax_loader":"https:\/\/themes.getbootstrap.com\/wp-content\/plugins\/dokan-lite\/assets\/images\/ajax-loader.gif","seller":{"available":"Available","notAvailable":"Not Available"},"delete_confirm":"Are you sure?","wrong_message":"Something went wrong. Please try again.","vendor_percentage":"70","commission_type":"percentage","rounding_precision":"6","mon_decimal_point":".","product_types":["simple"],"rest":{"root":"https:\/\/themes.getbootstrap.com\/wp-json\/","nonce":"2f40eb3037","version":"dokan\/v1"},"api":null,"libs":[],"routeComponents":{"default":null},"routes":[],"urls":{"assetsUrl":"https:\/\/themes.getbootstrap.com\/wp-content\/plugins\/dokan-lite\/assets"}};
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://themes.getbootstrap.com/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp'></script>
    <script type='text/javascript' src='https://themes.getbootstrap.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    <link rel='https://api.w.org/' href='https://themes.getbootstrap.com/wp-json/' />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://themes.getbootstrap.com/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://themes.getbootstrap.com/wp-includes/wlwmanifest.xml" />
    <link rel='shortlink' href='https://themes.getbootstrap.com/?p=126' />
    <link rel="alternate" type="application/json+oembed" href="https://themes.getbootstrap.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fthemes.getbootstrap.com%2Fpreview%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://themes.getbootstrap.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fthemes.getbootstrap.com%2Fpreview%2F&#038;format=xml" />
    <style>.woocommerce-password-strength.short {color: #e2401c}.woocommerce-password-strength.bad {color: #e2401c}.woocommerce-password-strength.good {color: #3d9cd2}.woocommerce-password-strength.strong {color: #0f834d}</style>	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
    <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>        <style type="text/css">
</style>
    <!-- The filemtime is to append a timestamp for the last time the stylesheet was updated to automate cache busting from CloudFlare -->
    <link rel='stylesheet' href='https://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/style.css?ver=1590611604' />
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
   
<style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
        .carousel-inner img {
              width: 100%;
              height: 100%;
          }
          .fi-arrow-long-right:before {
              content: url("http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-more-e1631254639314.png");
          }
    </style>
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-67613229-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-67613229-3');
    </script>
<?php
    wp_head();
?>
</head>

<body id="top" <?php body_class(); posterity_schema_args('body'); ?>>
<?php
// WordPress 5.2 support
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
//WordPress < 5.2
else {
    do_action( 'wp_body_open' );
}
do_action('posterity_body_start');
?>
<a class="skip-link" href="#content">
<?php esc_html_e( 'Skip to content', 'posterity' ); ?>
</a>
<div class="whole-layout">
<?php
    posterity_page_preloader();
    posterity_page_background();
    if( ! apply_filters('posterity_only_content', false) ) {
        posterity_theme_header();
    }
    ?>
    <div id="mid" class="to-move <?php echo esc_attr( posterity_get_mid_classes() ); ?>">
