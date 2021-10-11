<?php include ('header.php'); ?>
<?php /* Template Name: 广州 */ ?>

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
			<div class="content-limiter">
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
								<!-- <?php the_content(); ?> -->
								<div class="sea" style="display:none;"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
								<div class="ii"><img src="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/萌遊世界-banner-02.jpg"/></div>

								<div class="cs">
								<ul id="all" class="sitemap-list portfolio recent-work clearfix" style="display:flex;flex-wrap: wrap;">
										<?php query_posts('cat=5&showposts=999'); //cat是要调用的分类ID,showposts是需要显示的文章数量 ?>
										<?php while (have_posts()) : the_post(); ?>
										
										<li style="float:left;width:33%;margin:0 auto;">
																	
									<div class="aomen">	
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="text-decoration:none;">
										
									<img src="<?php 
									$filename="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/聖老楞佐教堂-1.jpg";
									if( preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_the_content(), $images)!=null){
										echo get_content_first_image(get_the_content()); 
										}else{
										echo $filename;
										}
										?>" alt="<?php the_title_attribute(); ?>" />


									<div class="fs-sm text-uppercase pt-2 mb-1">
                                    	<button class="btn-icon border-end-0 border-left-0 border-right-0 border-top-0 border-bottom-0 border-light fs-sm" style="color: #ffffff;background-color: #dd3b35;padding: 0px 9px;font-size: 14px;border-radius:8px;margin-top: 4px;margin-left: 8px;" type="button">
                                    	<strong style="letter-spacing:3px">
										<?php echo "萌遊澳門"; ?>
										</strong>
                                    	</button>
                                    	</div>
									
										<h3 class="mb-1" style="letter-spacing:3px;font-size: 28px;margin-left: 8px;margin-top: 10px;">
                                        <?php the_title(); ?>
                                        </h3>
										<h3 class="mb-1" style="font-size: 14px;margin-left: 9px;color: #00000085;">
										<span class="entry-date"><?php echo get_the_date(); ?></span>
                                        </h3>
										<?php endwhile; wp_reset_query(); ?>	
									</a>							
									</div>
									
										</li>
										
								</ul>
								</div>
								<!-- <div class="page">第<span id="a2"></span>/<span id="a1"></span>页<span id="a3"></span>　<a href="#" onClick="change(--pageno)">上一页</a><a href="#" onClick="change(++pageno)">下一页</a></div> -->
								<div class="page" style="text-align:center;margin-top:35px;"><span id="a2" style="display:none;"></span><span id="a1" style="display:none;"></span><span id="a3"></span></div>
<style type="text/css">
	.aomen{	overflow: hidden;
			position: relative;
			width: 297px;
			margin-left: 39px;
			margin-bottom: 32px;
			box-shadow: 2px 2px 5px #99999963;
			border-radius: 19px;}
	.span a{
		padding-top: 6px;
    padding-bottom: 6px;
    padding-right: 12px;
    padding-left: 12px;
    border-radius: 80%;
    background-color: #FF0000;
    text-decoration: none;
    color: white;
	}
	.cs{
		/* display:flex;
		flex-wrap: wrap; */
		width:125%;
		list-style:none;
		margin: 0 auto;
		margin-left: -6%;
		margin-top: 33px;
	}	
	.ages{
		text-align:center;
		margin-top:35px;
	}
	@media screen and (max-width: 1024px){
    .aomen{	
			width: 58%;
		    margin-left: 84px;
		    margin-bottom: 30px;
			margin-top: 0px;
			box-shadow: 2px 2px 5px rgba(112,123,124,1.000);}
			.cs{
		/* display:flex;
		flex-wrap: wrap; */
		width:125%;
		list-style:none;
		margin: 0 auto;
		margin-left: -16%;
		margin-top: 33px;
	}	
	.ages{
		text-align:center;
		margin-top:35px;
		margin-left: -12%;
	}	
	.ii{
		margin-left: -6%;
	}
}
@media screen and (max-width: 800px){
.sea{
		display:block !important;
	}
}
</style>
<script>
	var a = document.getElementById("all").getElementsByTagName("li");
	var zz =new Array(a.length);
	for(var i=0;i <a.length;i++){ 
		zz[i]=a[i].innerHTML;
    } //div的字符串数组付给zz
	var pageno=1 ;              //当前页
	var pagesize=9;            //每页多少条信息
	if(zz.length%pagesize==0){
		var  pageall =zz.length/pagesize ;
	}else{
		var  pageall =parseInt(zz.length/pagesize)+1;  
	}   //一共多少页     
	
	function change(e){
		pageno=e;
		if(e<1){ //如果输入页<1页
			e=1;pageno=1;//就等于第1页 ， 当前页为1
		}
	    if(e>pageall){  //如果输入页大于最大页
			e=pageall;pageno=pageall; //输入页和当前页都=最大页
		}
		document.getElementById("all").innerHTML=""//全部清空
			for(var i=0;i<pagesize;i++){
				var div =document.createElement("li")//建立div对象
				div.innerHTML=zz[(e-1)*pagesize+i]//建立显示元素
				document.getElementById("all").appendChild(div)//加入all中 
				if(zz[(e-1)*pagesize+i+1]==null) break;//超出范围跳出
	        }
		var ye="";
		for(var j=1;j<=pageall;j++){
	 		if(e==j){
				ye=ye+"<span><a href='#' onClick='change("+j+")' style='padding-top:7px;padding-bottom:7px;padding-right:12px;padding-left:12px;border-radius: 35px;color:white;background-color:#dd3b35;text-decoration:none'>"+j+"</a></span> "
			}else{
				ye=ye+"<a href='#' onClick='change("+j+")' style='padding-top:7px;padding-bottom:7px;padding-right:12px;padding-left:12px;border-radius: 35px;color:white;background-color:#d6d6d6;text-decoration:none'>"+j+"</a> "
			}
		}
		document.getElementById("a1").innerHTML=pageall;
		document.getElementById("a2").innerHTML=pageno;
		document.getElementById("a3").innerHTML=ye;
	}
	change(1);
</script>





                               







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
					
					<div class="sideBar"><?php get_sidebar(); ?></div>
					<style type="text/css">
@media only screen and (max-width: 800px) {
	.sideBar{
		display:none;
	}
}
</style>
				</div>
			</div>
		</article>
		
		<?php
	}
	
	get_footer();
}//end of if password_protected
