<?php
/**
 * The template for displaying all pages.
 */



if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if(!posterity_check_for_renamed_templates()){
	//we are moving to different template
	return;
}


if(post_password_required()){
	/* don't use the_content() as it also applies filters that we don't need here, if we are using custom password page */
	echo get_the_content();
}
else{
	global $posterity_a13;
	get_header();

	// Elementor `single` location
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ){

		the_post();
		//posterity_title_bar();
		$add_class       = 'content-box';
		$sticky_one_page = $posterity_a13->posterity_get_meta( '_content_sticky_one_page' ) === 'on';
		if( $sticky_one_page ){
			$add_class .= ' a13-sticky-one-page';
		}
		?>

    <article id="content" class="clearfix"<?php posterity_schema_args('creative'); ?>>
			<div class="content-limiter cn">
				<div id="col-mask">

					<div id="post-<?php the_ID(); ?>" <?php
					post_class( $add_class );
					if( $sticky_one_page ){
						echo ' data-a13-sticky-one-page-icon-global-color="' . esc_attr( $posterity_a13->posterity_get_meta( '_content_sticky_one_page_bullet_color' ) ) . '"';
						echo ' data-a13-sticky-one-page-icon-global-icon="' . esc_attr( $posterity_a13->posterity_get_meta( '_content_sticky_one_page_bullet_icon' ) ) . '"';
					}
					?>>
						<div class="formatter">
							<?php posterity_title_bar( 'inside' ); ?>
							<div class="real-content"<?php posterity_schema_args('text'); ?>>
							 







								<div data-elementor-type="wp-page" data-elementor-id="90" class="elementor elementor-90" data-elementor-settings="[]">
								<div id="demo" class="carousel slide" data-ride="carousel">
 
									<!-- 指示符 -->
									<ul class="carousel-indicators">
									<li data-target="#demo" data-slide-to="0" class="active"></li>
									<li data-target="#demo" data-slide-to="1"></li>
									<li data-target="#demo" data-slide-to="2"></li>
									</ul>

									<!-- 轮播图片 -->
									<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/萌遊世界-banner-01-scaled.jpg">
									</div>
									<div class="carousel-item">
										<img src="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/萌遊世界-banner-01-scaled.jpg">
									</div>
									<div class="carousel-item">
										<img src="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/萌遊世界-banner-01-scaled.jpg">
									</div>
									</div>

									<!-- 左右切换按钮 -->
									<a class="carousel-control-prev" href="#demo" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
									</a>
									<a class="carousel-control-next" href="#demo" data-slide="next">
									<span class="carousel-control-next-icon"></span>
									</a>

								</div>







								<div class="elementor-container elementor-column-gap-default ele">
					<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-aa0722d" data-id="aa0722d" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-2218eea elementor-widget elementor-widget-image" data-id="2218eea" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
																<a href="http://cutegod.cn/shijie/page-aomen">
							<img width="800" height="378" src="https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-macao-1-1024x484.png" class="elementor-animation-gww attachment-large size-large" alt="" srcset="https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-macao-1-1024x484.png 1024w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-macao-1-300x142.png 300w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-macao-1-768x363.png 768w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-macao-1.png 1313w" sizes="(max-width: 800px) 100vw, 800px" />								</a>
															</div>
				</div>
					</div>
		</div>
		<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-32d6890" data-id="32d6890" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-ddfef4b elementor-widget elementor-widget-image" data-id="ddfef4b" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
																<a href="http://cutegod.cn/shijie/page-zhuhai/">
							<img width="800" height="376" src="https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-zhuhai-1024x481.png" class="elementor-animation-gww attachment-large size-large" alt="" srcset="https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-zhuhai-1024x481.png 1024w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-zhuhai-300x141.png 300w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-zhuhai-768x361.png 768w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-zhuhai-24x11.png 24w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-zhuhai-36x17.png 36w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-zhuhai-48x23.png 48w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-zhuhai.png 1321w" sizes="(max-width: 800px) 100vw, 800px">								</a>
															</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-75bc43d" data-id="75bc43d" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-0175598 elementor-widget elementor-widget-image" data-id="0175598" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
																<a href="http://cutegod.cn/shijie/page-guangzhou/">
							<img width="800" height="377" src="https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-guangzhou-1024x483.png" class="elementor-animation-gww attachment-large size-large" alt="" srcset="https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-guangzhou-1024x483.png 1024w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-guangzhou-300x141.png 300w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-guangzhou-768x362.png 768w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-guangzhou.png 1317w" sizes="(max-width: 800px) 100vw, 800px" />								</a>
															</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-0342828" data-id="0342828" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-f7cf61e elementor-widget elementor-widget-image" data-id="f7cf61e" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
																<a href="http://cutegod.cn/shijie/page-wuhan/">
							<img width="800" height="376" src="https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-wuhan-1024x481.png" class="elementor-animation-gww attachment-large size-large" alt="" srcset="https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-wuhan-1024x481.png 1024w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-wuhan-300x141.png 300w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-wuhan-768x361.png 768w, https://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-wuhan.png 1321w" sizes="(max-width: 800px) 100vw, 800px" />								</a>
															</div>
				</div>
					</div>
		</div>
							</div>
							









<div style="width:100%">
							
					
    <div id="aaa" class="aaa d-flex align-items-end align-items-lg-center justify-content-between mb-4 pb-md-2">
        <div class="d-flex w-100 align-items-center justify-content-between justify-content-lg-start">
            <h2 class="h3 mb-0 me-md-4"><b style="letter-spacing:2px">萌遊澳門</b></h2>
        </div><a class="btn btn-link fw-normal d-none d-lg-block p-0" href="https://cutegod.cn/shijie/page-aomen/" style="display:flex;color: #929292;text-decoration:none;letter-spacing:2px"><b style="font-size: 18px;">更多</b><i class="fi-arrow-long-right ms-2"></i></a>
    </div>
    
    <div class="row g-4 rmows" id="all" style="margin-bottom: 120px;">
        <div class="col-md-6 rw">
            	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>2));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden h-100 mb-4 elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4 ca">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"><a class="text-decoration-none text-light pe-2"  style="margin-top: 296px" href="<?php the_permalink(); ?>">
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                            <strong style="letter-spacing:1px">萌遊澳門</strong>
                            </button>
                        </div>
                        <h3 class="text-light mb-1 mm" style="letter-spacing:3px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:2px"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
        </div>
        <div class="col-md-6">
            	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>2));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden mb-4 elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;height: 239px;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"  style="margin-top:90px !important"><a class="text-decoration-none text-light pe-2" href="<?php the_permalink(); ?>">
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                             <strong style="letter-spacing:1px">萌遊澳門 </strong>
                            </button>
                        </div>
                        <h3 class="text-light mb-1" style="letter-spacing:3px;font-size: 18px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:1px"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>2));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;height: 239px;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5" style="margin-top:90px !important">
                        <div>
                        <a class="text-decoration-none text-light pe-2"  href="<?php the_permalink(); ?>">
                        <div></div>
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                                 <strong style="letter-spacing:1px">萌遊澳門 </strong>
                            </button>
                        </div>

                        <h3 class="text-light mb-1" style="letter-spacing:3px;font-size: 18px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:1px;"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
        </div>
    </div>















<div id="aaa" class="aaa d-flex align-items-end align-items-lg-center justify-content-between mb-4 pb-md-2">
        <div class="d-flex w-100 align-items-center justify-content-between justify-content-lg-start">
            <h2 class="h3 mb-0 me-md-4"><b style="letter-spacing:2px">萌遊珠海</b></h2>
        </div><a class="btn btn-link fw-normal d-none d-lg-block p-0" href="https://cutegod.cn/shijie/page-zhuhai/" style="display:flex;color: #929292;text-decoration:none;letter-spacing:2px"><b style="font-size: 18px;">更多</b><i class="fi-arrow-long-right ms-2"></i></a>
    </div>
    <div class="row g-4 rmows" id="all" style="margin-bottom: 120px;">
	
        <div class="col-md-6 rw">
            	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>3));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden h-100 elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4 ca">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"><a class="text-decoration-none text-light pe-2"  style="margin-top: 296px" href="<?php the_permalink(); ?>">
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                            <strong style="letter-spacing:1px">萌遊珠海</strong>
                            </button>
                        </div>
                        <h3 class="text-light mb-1 mm" style="letter-spacing:3px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:2px"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
        </div>
        <div class="col-md-6">
            	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>3));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden mb-4 elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;height: 239px;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"  style="margin-top:90px !important"><a class="text-decoration-none text-light pe-2" href="<?php the_permalink(); ?>">
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                             <strong style="letter-spacing:1px">萌遊珠海 </strong>
                            </button>
                        </div>
                        <h3 class="text-light mb-1" style="letter-spacing:3px;font-size: 18px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:1px"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>3));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;height: 239px;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5" style="margin-top:90px !important">
                        <div>
                        <a class="text-decoration-none text-light pe-2"  href="<?php the_permalink(); ?>">
                        <div></div>
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                                 <strong style="letter-spacing:1px">萌遊珠海 </strong>
                            </button>
                        </div>

                        <h3 class="text-light mb-1" style="letter-spacing:3px;font-size: 18px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:1px;"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
        </div>
    </div>














<div id="aaa" class="aaa d-flex align-items-end align-items-lg-center justify-content-between mb-4 pb-md-2">
        <div class="d-flex w-100 align-items-center justify-content-between justify-content-lg-start">
            <h2 class="h3 mb-0 me-md-4"><b style="letter-spacing:2px">萌遊武漢</b></h2>
        </div><a class="btn btn-link fw-normal d-none d-lg-block p-0" href="https://cutegod.cn/shijie/page-wuhan/" style="display:flex;color: #929292;text-decoration:none;letter-spacing:2px"><b style="font-size: 18px;">更多</b><i class="fi-arrow-long-right ms-2"></i></a>
    </div>
    <div class="row g-4 rmows" id="all" style="margin-bottom: 120px;">
	
        <div class="col-md-6 rw">
            	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>4));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden h-100 elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4 ca">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"><a class="text-decoration-none text-light pe-2"  style="margin-top: 296px" href="<?php the_permalink(); ?>">
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                            <strong style="letter-spacing:1px">萌遊武漢</strong>
                            </button>
                        </div>
                        <h3 class="text-light mb-1 mm" style="letter-spacing:3px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:2px"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
        </div>
        <div class="col-md-6">
            	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>4));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden mb-4 elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;height: 239px;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"  style="margin-top:90px !important"><a class="text-decoration-none text-light pe-2" href="<?php the_permalink(); ?>">
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                             <strong style="letter-spacing:1px">萌遊武漢 </strong>
                            </button>
                        </div>
                        <h3 class="text-light mb-1" style="letter-spacing:3px;font-size: 18px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:1px"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>4));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;height: 239px;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5" style="margin-top:90px !important">
                        <div>
                        <a class="text-decoration-none text-light pe-2"  href="<?php the_permalink(); ?>">
                        <div></div>
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                                 <strong style="letter-spacing:1px">萌遊武漢 </strong>
                            </button>
                        </div>

                        <h3 class="text-light mb-1" style="letter-spacing:3px;font-size: 18px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:1px;"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
        </div>
    </div>
















<div id="aaa" class="aaa d-flex align-items-end align-items-lg-center justify-content-between mb-4 pb-md-2">
        <div class="d-flex w-100 align-items-center justify-content-between justify-content-lg-start">
            <h2 class="h3 mb-0 me-md-4"><b style="letter-spacing:2px">萌遊廣州</b></h2>
        </div><a class="btn btn-link fw-normal d-none d-lg-block p-0" href="https://cutegod.cn/shijie/page-guangzhou/" style="display:flex;color: #929292;text-decoration:none;letter-spacing:2px"><b style="font-size: 18px;">更多</b><i class="fi-arrow-long-right ms-2"></i></a>
    </div>
    <div class="row g-4 rmows" id="all" style="margin-bottom: 120px;">
	
        <div class="col-md-6 rw">
            	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>5));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden h-100 elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4 ca">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"><a class="text-decoration-none text-light pe-2"  style="margin-top: 296px" href="<?php the_permalink(); ?>">
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                            <strong style="letter-spacing:1px">萌遊廣州</strong>
                            </button>
                        </div>
                        <h3 class="text-light mb-1 mm" style="letter-spacing:3px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:2px"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
        </div>
        <div class="col-md-6">
            	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>5));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden mb-4 elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;height: 239px;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"  style="margin-top:90px !important"><a class="text-decoration-none text-light pe-2" href="<?php the_permalink(); ?>">
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                             <strong style="letter-spacing:1px">萌遊廣州 </strong>
                            </button>
                        </div>
                        <h3 class="text-light mb-1" style="letter-spacing:3px;font-size: 18px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:1px"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?> 	
    <?php
    query_posts(array('orderby' => 'rand','showposts' => 1,'cat'=>5));
    if (have_posts()) :
    while (have_posts()) : the_post();?>
            <div class="card bg-size-cover bg-position-center border-0 overflow-hidden elementor-animation-gww attachment-large size-large" style="background-image: url(<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;height: 239px;"><span class="img-gradient-overlay"></span>
                <div class="card-footer content-overlay border-0 pt-0 pb-4">
                    <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5" style="margin-top:90px !important">
                        <div>
                        <a class="text-decoration-none text-light pe-2"  href="<?php the_permalink(); ?>">
                        <div></div>
                        <div class="fs-sm text-uppercase pt-2 mb-1">
                            <button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 5.7px;
                            font-size: 14px;border-radius:8px;" type="button">
                                 <strong style="letter-spacing:1px">萌遊廣州 </strong>
                            </button>
                        </div>

                        <h3 class="text-light mb-1" style="letter-spacing:3px;font-size: 18px;"><?php the_title(); ?></h3>
                        <div class="fs-sm opacity-70" style="letter-spacing:1px;"><i class="fi-map-pin me-1"></i><?php echo get_the_date(); ?></div>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
<?php endif; ?>
        </div>
    </div>




    <style type="text/css">
	#aaa>a:hover b{
		color:red;
	}
    .elementor-animation-gww:hover {
    transform: scale(1.02);
    }
    .elementor-animation-gww {
        transition-duration: .3s;
        transition-property: transform;
        background-size: 100% 100%;
    }
    .ele{
        display: flex;
    }
    .rw{
        height: 508px;
    }
    .mm{
        font-size: 25px;
    }
    @media only screen and (max-width: 1300px) {
	.ele{
		display:flex;
        flex-wrap:wrap;
        width: 95%;
        margin:auto 0;
	}
    .rmows{
        margin-left: 10px;
        width: 91%;
        margin-right:10px;
        height:90%;
    }
    .rw{
        
        margin-bottom:25px;
    }
    .aaa{
        margin-left: 4%;
    }
    .mm{
        font-size: 18px !important;
    }
    .cn{
        margin-left: -2%;
    }
}
@media only screen and (max-width: 500px) {
    .rw{
        height: 239px;
        margin-bottom:25px;
    }
    .ca{
        margin-top: 20%;
    }
}
</style>








								</div>
</div>





















								
								<div class="clear"></div>

								<?php
								wp_link_pages( array(
										'before' => '<div id="page-links">' . esc_html__( 'Pages: ', 'posterity' ),
										'after'  => '</div>'
									)
								);
								?>
							</div>

							<?php
							global $posterity_a13;

							$comments_on_pages = $posterity_a13->get_option( 'page_comments' ) === 'on';
							// If comments are open or we have at least one comment, load up the comment template.
							if( $comments_on_pages && ( comments_open() || get_comments_number() ) ) :
								comments_template( '', true );
							endif;
							?>

						</div>
					</div>
					

				</div>
			</div>
		</article>
		
		<?php
	}
	get_footer();
}//end of if password_protected
