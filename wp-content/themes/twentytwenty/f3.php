<?php
/**
 * Template Name: 萌壽
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
            萌壽
          </li>
        </ol>

        <div class="contant">
          <h3>萌壽-主司人間壽命的萌神</h3>
          <div class="text">寓意長命百歲，象徵長壽。壽星，是民間信仰中祈願長壽而崇拜的幻想神，是主司人間壽命之神，民間多指南極老人星。
在過去，很多地方在給老人祝壽過生日時，都會張掛一幅壽星畫像。雖然請神下凡往往流於形式，但生日宴會能博得老人高興卻是實實在在的。家人齊聚，子孫滿堂，品嘗美酒佳餚，享受天倫之樂。這樣的場面是表達孝心和親情的家庭儀式，壽星畫像則是必不可少的吉祥符號。ss
</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/ss.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/s1.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/s2.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/s3.png"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>