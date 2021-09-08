<?php
/**
 * Template Name: 嫦娥
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
            嫦娥
          </li>
        </ol>

        <div class="contant">
          <h3>嫦娥-美豔溫柔的月亮女神</h3>
          <div class="text">嫦娥
原稱恒我，姮娥、常娥，是中國神話人物，是即為美豔溫柔的仙女，為後羿之妻。嫦娥奔月寓意著渴望團圓的美好心願。</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/ee.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/e1.gif"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/e2.gif"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/e3.gif"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>