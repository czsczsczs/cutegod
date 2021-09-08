<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

 get_template_part('header_h');
//get_header();
?>

<main id="site-content" role="main">
<section class="section-wrap pb-20 product-single">
      <div class="container">
        <div class="contant">
          <div class="text">找不到符合條件的頁面...</div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->

</main><!-- #site-content -->

<?php //get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
//get_footer();
get_template_part('footer_h');