<?php
/**
 * Template Name: 萌喜
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
            <a href="./ ">首頁</a>
          </li>
          <li>
            <a href="<?php home_url();?> ">萌故事</a>
          </li>
          <li class="active">
            萌喜
          </li>
        </ol>

        <div class="contant">
          <h3>萌囍-专司喜庆的萌神</h3>
          <div class="text">這也是一尊吉祥神。人們總是希望趨吉避凶，追求平安喜樂，所以要造一尊喜神來。特別是人們在結婚時，尤其注重祈拜喜神，所以辦婚事，又叫辦喜事，辦喜事當然就離不開喜神了。
民間傳說喜神原本是拜北斗星神的一個虔誠女子，修道成仙時，北斗星君詢問其所求，女子以手抿口，笑而不答，因為她笑時呈喜像而封為喜神，從此喜神專司喜慶，卻不顯神形。
</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/xx.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/x1.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/x2.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/x3.png"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>