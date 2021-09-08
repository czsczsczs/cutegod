<?php
/**
 * Template Name: 萌穀雨壁紙 PC桌面-雨生百穀
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
get_template_part('header_h');
?>
<section class="section-wrap pb-20 product-single">
      <section class="section-wrap pb-20 product-single">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumbs">
          <li>
            <a href="./">首頁</a>
          </li>
          <li>
            <a href="./?page_id=300">萌神壁紙</a>
          </li>
        </ol>
        <div class="row">

          <div class="col-md-6 product-slider mb-50">

            <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">

              <div class="gallery-cell">
                <a href="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-01.jpg" class="lightbox-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-01.jpg" alt="" />
                </a>
              </div>
              <div class="gallery-cell">
                <a href="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-02.jpg" class="lightbox-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-02.jpg" alt="" />
                </a>
              </div>
              <div class="gallery-cell">
                <a href="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-03.jpg" class="lightbox-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-03.jpg" alt="" />
                </a>
              </div>
              <div class="gallery-cell">
                <a href="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-04.jpg" class="lightbox-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-04.jpg" alt="" />
                </a>
              </div>
              <div class="gallery-cell">
                <a href="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-05.jpg" class="lightbox-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-05.jpg" alt="" />
                </a>
              </div>
            </div> <!-- end gallery main -->

            <div class="gallery-thumbs" id="gallery-thumbs">
              <div class="gallery-cell">
                <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-01.jpg" alt="" />
              </div>
              <div class="gallery-cell">
                <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-02.jpg" alt="" />
              </div>
              <div class="gallery-cell">
                <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-03.jpg" alt="" />
              </div>
              <div class="gallery-cell">
                <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-04.jpg" alt="" />
              </div>
              <div class="gallery-cell">
                <img src="<?php echo get_template_directory_uri(); ?>/img/pc-three/pc-three-05.jpg" alt="" />
              </div>
            </div> <!-- end gallery thumbs -->

          </div> <!-- end col img slider -->

          <div class="col-md-6 product-single">
            <h1 class="product-single__title uppercase">萌小福穀雨壁紙 PC桌面-雨生百穀</h1>
            <div class="row row-10 product-single__actions clearfix">
              <div class="col">
                <a href="<?php echo get_template_directory_uri(); ?>/img/pc-three.rar" download="<?php echo get_template_directory_uri(); ?>/img/pc-three.rar" class="btn btn-lg btn-color product-single__add-to-cart">
                  <i class="ui-bag"></i>
                  <span>加入收藏</span>
                </a>
              </div>
              <div class="col">
                <a href="<?php echo get_template_directory_uri(); ?>/img/pc-three.rar"  download="<?php echo get_template_directory_uri(); ?>/img/pc-three.rar" class="btn btn-lg btn-dark product-single__add-to-wishlist">
                  <i class="ui-heart"></i>
                  <span>立即下載</span>
                </a>
              </div>
            </div>
            <!-- Accordion -->
            <div class="accordion mb-50" id="accordion">
              <div class="accordion__panel">
                <div class="accordion__heading" id="headingOne">
                  <a data-toggle="collapse" href="#collapseOne" class="accordion__link accordion--is-open" aria-expanded="true" aria-controls="collapseOne">描述<span class="accordion__toggle">&nbsp;</span>
                  </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion" role="tabpanel" aria-labelledby="headingOne">
                  <div class="accordion__body">
                    <p>
                      萌小福-雨生百穀
                    </p>
                    <p>
                      福：穀雨 賞花時節
                    </p>
                    <p>
                      祿：穀雨 雨前茶香
                    </p>
                    <p>
                      壽：穀雨 雨頻霜斷
                    </p>
                    <p>
                      喜：穀雨 燕弄梭
                    </p>
                    <p>
                      財：穀雨 布穀啼播
                    </p>
                  </div>
                </div>
              </div>
          </div> <!-- end col product description -->
        </div> <!-- end row -->

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>