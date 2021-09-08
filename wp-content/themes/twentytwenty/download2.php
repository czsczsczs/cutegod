<?php
/**
 * Template Name: 萌神壁紙
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
get_template_part('header_h');
?>
  <style type="text/css">
  .product__img, .product__img-back {
    overflow: hidden;
    min-width: 99.9%;
    width: 300px;
    height: 300px;
    object-fit: cover;
  }
</style>
<section class="section-wrap pb-20 product-single">
      <div class="container">
      <!-- 20108.3.21 -->
      <ol class="breadcrumbs">
          <li>
            <a href="./">首頁</a>
          </li>
          <li>
            <a href="<?php home_url(); ?>">萌下載</a>
          </li>
          <li class="active">
            萌神壁紙
          </li>
        </ol>


        <div class="row">
          <div class=" order-lg-2 mb-40">
          <!-- Breadcrumbs -->

            <div class="row row-2">

              <div class="col-md-6 product">
                <div class="product__img-holder">
                  <a href="./?page_id=318" class="product__link">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-01.jpg" alt="" class="product__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-02.jpg" alt="" class="product__img-back">
                  </a>
                </div>
                <div class="product__details">
                  <h3 class="product__title">
                    <a href="./?page_id=318"> 萌小福穀雨壁紙 PC桌面-雨生百穀</a>
                  </h3>
                </div>
                <span class="product__price">
                  <ins>
                    <!-- <span class="amount">29元</span> -->
                  </ins>
                </span>
              </div> <!-- end product -->

              <div class="col-md-6 product">
                <div class="product__img-holder">
                  <a href="./?page_id=321" class="product__link">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/pc-two/pc-two-01.jpg" alt="" class="product__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/pc-two/pc-two-02.jpg" alt="" class="product__img-back">
                  </a>
                </div>
                <div class="product__details">
                  <h3 class="product__title">
                    <a href="./?page_id=321">萌小福春分壁紙 PC桌面-春分燕歸來</a>
                  </h3>
                </div>
                <span class="product__price">
                 <!--  <ins>
                    <span class="amount">29元</span>
                  </ins> -->
                </span>
              </div> <!-- end product -->

              <div class="col-md-6 product">
                <div class="product__img-holder">
                  <a href="./?page_id=324" class="product__link">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/pc-one/pc-one-01.jpg" alt="" class="product__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/pc-one/pc-one-02.jpg" alt="" class="product__img-back">
                  </a>
                </div>
                <div class="product__details">
                  <h3 class="product__title">
                    <a href="./?page_id=324">萌小福 愛上春天 PC電腦桌面壁紙</a>
                  </h3>
                </div>
                <span class="product__price">
                  <ins>
                    <!-- <span class="amount">29元</span> -->
                  </ins>
                </span>
              </div> <!-- end product -->

              <div class="col-md-6 product">
                <div class="product__img-holder">
                  <a href="./?page_id=327" class="product__link">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/mobile-two/mobile-two-01.jpg" alt="" class="product__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/mobile-two/mobile-two-02.jpg" alt="" class="product__img-back">
                  </a>
                </div>
                <div class="product__details">
                  <h3 class="product__title">
                    <a href="./?page_id=327">萌小福春分壁紙 手機版 春分燕歸來</a>
                  </h3>
                </div>
                <span class="product__price">
                  <ins>
                    <!-- <span class="amount">29元</span> -->
                  </ins>
                </span>
              </div> <!-- end product -->

              <div class="col-md-6 product">
                <div class="product__img-holder">
                  <a href="./?page_id=330" class="product__link">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/mobile-one/mobile-one-01.jpg" alt="" class="product__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/mobile-one/mobile-one-02.jpg" alt="" class="product__img-back">
                  </a>
                </div>
                <div class="product__details">
                  <h3 class="product__title">
                    <a href="./?page_id=330">萌小福 愛上春天 手機版 桌面壁紙</a>
                  </h3>
                </div>
                <span class="product__price">
                  <ins>
                    <!-- <span class="amount">29元</span> -->
                  </ins>
                </span>
              </div> <!-- end product -->


            </div> <!-- end row -->
          </div>
        </div>


      <!-- end2018.3.21 -->


      </div>  <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>