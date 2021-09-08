<?php
/**
 * Template Name: 觀音
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
            觀音
          </li>
        </ol>

        <div class="contant">
          <h3>觀音-民眾的護身菩薩</h3>
          <div class="text">觀音又名觀世音，是佛教四大菩薩之一。觀音菩薩有33身，其容貌飽滿圓潤，姿態端莊秀美，品性慈悲善良，內心平和寧靜，擁有大智大慧，救苦救難，普度眾生，是民眾的護身菩薩。</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/yy.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/y1.gif"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/y2.gif"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/y3.gif"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>