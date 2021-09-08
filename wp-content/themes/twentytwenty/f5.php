<?php
/**
 * Template Name: 萌財
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
            萌財
          </li>
        </ol>

        <div class="contant">
          <h3>萌財</h3>
          <div class="text">財神是中國民間普遍供奉的善神之一，每逢新年，家家戶戶懸掛財神像，希冀財神保佑以求大吉大利。<br>
吉，象徵平安；利，象徵財富。人生在世既平安又有財，自然十分完美，這種真切的祈望成為人們的普遍心理。求財納福的心理與追求，充分反映在春節敬祀財神的一系列民俗活動中。
春節，是中國民間最盛大的節日。其中除夕之夜有一項重要的民俗活動－－迎財神。除夕之夜，全家人要圍坐在一起吃餃子（餃子象徵財神爺給的元寶），吃罷餃子徹夜不眠，等待著接財神。“財神”其實是印製粗糙的財神像，此財神像用紅紙印刷而成，中間為線描的神像，兩旁寫著“添丁進財”、“祈求平安”的吉利詞語。

</div>
          <div class="row contant-img">
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/cc.jpg"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/c4.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/c1.png"></div>
            <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/img/c2.png"></div>
          </div>
        </div>

      </div> <!-- end container -->
    </section> <!-- end single product -->
	<?php

get_template_part('footer_h');
?>