<?php
/**
 * Template Name: 萌祿
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
            萌祿

          </li>
        </ol>

        <div class="contant">
          <h3>萌祿-主管功名利祿的萌神</h3>
          <div class="text">寓意高官厚祿，富有吉利的祈願。祿神被認為是文昌星，是主管功名利祿的神靈，古代星相家將文昌星解釋為主大貴的吉利之星；在過去，閩東地區及其他一些地方還有拜祭祿神的傳統，拜祭完畢，還會組織玩一種叫“取功名”的遊戲，以此來作為祈求祿神賜予好運的方式，遊戲中，以桂圓代表狀元，榛子代表榜眼，花生代表探花，為科舉三鼎甲，一人手握三種乾果各一顆，往桌上投擲，某種乾果滾到某人跟前，即預示某人中該乾果後代表的狀元、榜眼或探花。遊戲直玩到每個人都有功名為止。該遊戲含有向祿神占卜功名的性質。</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/ll.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/l1.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/l2.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/l3.png"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>