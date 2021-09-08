 <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer__widgets">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="widget widget__about">
                <h4 class="widget-title white">聯繫我們</h4>
                <p class="widget__about-text">
                  <a href="https://weibo.com/3773777122/profile?rightmod=1&wvr=6&mod=personinfo&is_all=1">萌小福·官方微博</a><br/>
                  <a href="https://www.facebook.com/CuteGod.cn/">萌小福·Facebook專頁</a><br/>
                  <a href="http://blog.vmacau.net/cutegod/">萌小福官方博客</a><br/>
                  <p>萌小福官方郵箱：info@cutegod.cn</p>
                  <p>萌小福官方QQ：2064163299</p>
                </p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="widget widget__newsletter">
              </div>
            </div>

            <div class="col-lg-2 col-md-6">
              <div class="widget widget_nav_menu">
                <h4 class="widget-title white">萌商城</h4>
                <ul>
                  <li><a href="https://shop592050667.taobao.com/category-1422409877.htm?spm=a1z10.1-c-s.w5002-21093331073.4.3b835e93M0xi0c&search=y&catName=%B1%A7%D5%ED%CF%B5%C1%D0" target="_blank">抱枕系列</a></li>
                  <li><a href="https://shop592050667.taobao.com/category-1421224735.htm?spm=a1z10.5-c-s.w5002-21093331073.5.46e25465GInu0a&search=y&catName=%C6%ED%B8%A3%CF%B5%C1%D0" target="_blank">祈福系列</a></li>
                  <li><a href="https://shop592050667.taobao.com/category-1421224759.htm?spm=a1z10.5-c-s.w5002-21093331073.6.4d066d79PExuev&search=y&catName=%D0%C2%C4%EA%CF%B5%C1%D0" target="_blank">新年系列</a></li>
                </ul>
              </div>
            </div>

            <div class="col-lg-2 col-md-6">
              <div class="widget widget_nav_menu">
                <h4 class="widget-title white"><a href="./">首頁</a></h4>
                <ul>
                  <li><a href="http://blog.vmacau.net/cutegod/">萌動態</a></li>
                  <li><a href="./?page_id=21">萌故事</a></li>
                  <li><a href="./?page_id=297">萌下載</a></li>
                  <li><a href="./?page_id=306">萌漫畫</a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div> <!-- end container -->

      <div class="footer__bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-sm-center">
              <span class="copyright">
            		<a target="_blank" href="https://beian.miit.gov.cn/">粤ICP备10204243号</a>
                <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44049002000498">
            			<img src="<?php echo get_template_directory_uri(); ?>/img/ghs.png"> 粤公网安备 44049002000498号  &nbsp &nbsp</a>
               <a target="_blank" href="http://www.macautech.net/"> &nbsp &nbsp 技術支持：普及科技</a>  &nbsp &nbsp  <a href="./?page_id=312">版權聲明</a><span>/ </span><a href="/?page_id=315">品牌授權</a>
              </span>
            </div>
            <div class="col-md-12 text-sm-center">
              <span class="copyright">
                 Copyright &copy; 2018.萌小福官網 All rights reserved.
            </span>
            </div>
          </div>
        </div>
      </div> <!-- end bottom footer -->
    </footer> <!-- end footer -->

    <div id="back-to-top">
      <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
    </div>
  </main> <!-- end main-wrapper -->
  <!-- jQuery Scripts -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/easing.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/owl-carousel.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/flickity.pkgd.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tw_cn.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
         $('.owl-new').owlCarousel({
          // loop:true,
          margin:30,
          responsiveClass:true,
          autoplay:false,
          autoplayTimeout:2000,
          nav:true,
          navText:['<','>'],
          responsive:{
              0:{
                  items:1,
              },
              600:{
                  items:3,
              },
              1000:{
                  items:4,
              },
              1300:{
                  items:5,
              }
          }
      })
    });
  </script>
  <script>
    // 簡繁體切換
            var lang = 'zh-CN';
            if(lang == 'zh-CN'){
                var defaultEncoding = 1; //默认是否繁体，0-简体，1-繁体
                var translateDelay = 0; //延迟时间,若不在</body>前, 要设定延迟翻译时间, 如100表示100ms,默认为0
                var cookieDomain = "http://cutegod.cn/";    //Cookie地址, 一定要设定, 通常为你的网址
                var msgToTraditionalChinese = " "; //默认切换为繁体时显示的中文字符
                var msgToSimplifiedChinese = " "; //默认切换为简体时显示的中文字符
                var translateButtonId = "translateLink"; //默认互换id
                translateInitilization();
        if(targetEncoding == 1){
            $("#language li a").removeClass('on');
            $("#language li a.tran").eq(1).addClass('on');
        }else{
            $("#language li a").removeClass('on');
            $("#language li a.tran").eq(0).addClass('on');
        }
        $("#language").on('click', 'li a.tran', function(){
            if($(this).hasClass('on')){
                return false;
            }
            $("#language li a").removeClass('on');
            $(this).addClass('on');
            translatePage();
        });
        $(".app").addClass('app-zh');
            $("#language p.tran").click(function(event) {
                if ($(".app").hasClass('app-zh')){
                    $(".app").removeClass('app-zh');
                    $(".app").addClass('app-tw');
                }else{
                    $(".app").addClass('app-zh');
                }
            });
    }
</script>
</body>
</html>
