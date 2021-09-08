<?php
/**
 * Template Name: 土地公土地婆
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
            土地公土地婆
          </li>
        </ol>

        <div class="contant">
          <h3>土地公土地婆—地方守護神</h3>
          <div class="text">土地公，又稱土地爺，是中國民間信仰中的地方保護神，保護本鄉本土家宅平安，添丁進口，六畜興旺，為地方之守護神祇。土地公常作濫好神，好在有土地婆不時幫他踩刹車，卻也因此夫妻倆常有口角，但土地公常常鬥不過土地婆。
土地婆，為土地公配偶，與土地公共受香火供奉，沒有特殊職司。但土地婆持家有道，常常幫助土地公把轄區內的一些事情處理得十分妥帖，為土地公處理日常事務查漏補缺起到十分重要的作用。</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/gg.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/g1.gif"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/g2.gif"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/g3.gif"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>