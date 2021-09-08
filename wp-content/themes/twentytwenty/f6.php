<?php
/**
 * Template Name: 媽祖
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
get_template_part('header_h');
?>
<section class="section-wrap pb-20 product-single">
      <div class="container">

        <!-- Breadcrumbs -->
        <ol class="breadcrumbs">
          <li>
            <a href="./">首頁</a>
          </li>
          <li>
            <a href="<?php home_url(); ?>">萌故事</a>
          </li>
          <li class="active">
            媽祖
          </li>
        </ol>

        <div class="contant">
          <h3>媽祖-保駕護航的海神</h3>
          <div class="text">媽祖
又稱天妃、天後，她救急扶危，慈悲為懷，專以行善濟世為已任，是歷代船工、海員、旅客、商人和漁民共同信奉的神祇。</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/zz.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/z1.gif"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/z2.gif"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/z3.gif"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>