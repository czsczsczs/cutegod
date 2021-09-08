<?php
/**
 * Template Name: 萌福
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
            萌福
          </li>
        </ol>

        <div class="contant">
          <h3>萌福-象徵幸福的萌神</h3>
          <div class="text">福神是漢族民間信仰神。根據漢族民間傳說福神原為歲星，即木星，後逐漸人格化，後逐漸演化為天官之一，民間傳說有賜福一說。</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/mm.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/m1.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/m2.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/m3.png"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>