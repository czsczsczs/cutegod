<?php
global $posterity_a13;

$variant         = $posterity_a13->get_option( 'header_horizontal_variant' );

$header_content_width = $posterity_a13->get_option( 'header_content_width' );
$header_width = ' ' . $header_content_width;
if($header_content_width === 'narrow' && $posterity_a13->get_option( 'header_content_width_narrow_bg') === 'on' ){
	$header_width .= ' narrow-header';
}

$header_classes = 'to-move a13-horizontal header-type-one_line a13-'.posterity_horizontal_header_color_variant().'-variant header-variant-' . $variant . $header_width;

$menu_on        = $posterity_a13->get_option( 'header_main_menu' ) === 'on';
$socials        = $posterity_a13->get_option( 'header_socials' ) === 'on';

$icons_no     = 0;
$header_tools = posterity_get_header_toolbar( $icons_no );
if ( ! $icons_no ) {
	$header_classes .= ' no-tools';
} else {
	$header_classes .= ' tools-icons-' . $icons_no; //number of icons
}

//how sticky version will behave
$header_classes .= ' '.$posterity_a13->get_option( 'header_horizontal_sticky' );

//hide until it is scrolled to
$show_header_at = $posterity_a13->posterity_get_meta('_horizontal_header_show_header_at' );
if(strlen($show_header_at) && $show_header_at > 0){
	$header_classes .= ' hide-until-scrolled-to';
}

?>
<header id="header" class="<?php echo esc_attr( $header_classes ); ?>"<?php posterity_schema_args( 'header' ); ?>>
	<div class="head">
		<div class="logo-container"<?php posterity_schema_args('logo'); ?>><?php posterity_header_logo(); ?></div>
		<img src="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P1-logo2.png" class="logo2"/>

		<nav id="access" class="navigation-bar"<?php posterity_schema_args('navigation'); ?>><!-- this element is need in HTML even if menu is disabled -->

			<?php if ( $menu_on ): ?>
				<div class="xian" style="position: absolute;margin-top: 24px;margin-left: 10%;width: 1px;height: 31px;background: #a9a9a957;"></div>
				<div style="margin-right: 16%;"><?php posterity_header_menu(); ?></div>


				

				
				<div class="aa">
				<a rel="nofollow" class="social-tooltip wx" title="微信公眾號" href="https://mp.weixin.qq.com/mp/profile_ext?action=home&amp;__biz=MzU4MzgyNzgxOA==&amp;scene=124#wechat_redirect" target="_blank">
				<i class="fab fa-weixin" style="color: #59d600;"></i>
				</a>
				<a rel="nofollow" class="social-tooltip wb" title="新浪微博" href="https://weibo.com/3773777122/profile?rightmod=1&amp;wvr=6&amp;mod=personinfo&amp;is_all=1" target="_blank">
				<i class="fab fa-weibo" style="color: #dd8e18;"></i>
				</a>
				</div>
			<?php endif;?>
			
		</nav>

		<!-- #access -->

		<?php echo wp_kses_post($header_tools );//escaped layout part ?>
		<?php if ( $socials ) {
			//check what color variant we use
			$color_variant = posterity_horizontal_header_color_variant();
			$color_variant = $color_variant === 'normal' ? '' : '_'.$color_variant;

			//escaped on creation
			echo posterity_social_icons(
				$posterity_a13->get_option( 'header'.$color_variant.'_socials_color' ),
				$posterity_a13->get_option( 'header'.$color_variant.'_socials_color_hover' ),
				'',
				$posterity_a13->get_option( 'header_socials_display_on_mobile' ) === 'off'
			);
		} ?>
	</div>
    <?php echo posterity_header_search();//escaped on creation ?>
	
	
<style type="text/css">
.aa{
	float:none;
	margin-right: -46%;
}
.wx{
	padding: 18px 10px;
	float: right;
	margin-top: -67px;
	margin-right: 343px;
}
.wb{
	padding: 18px 10px;float: right;margin-top: -67px;margin-right: 307px;
}
.wx:hover{
	background-color: #7777771c;
}
.wb:hover{
	background-color: #7777771c;
}
.logo2{
	width: 33px;
	height: 31px;
	margin-right: -42px;
	margin-top: 26px;
	margin-left: 74px;
}
/* @media screen and (max-width:950px){
	.logo2{
		width: 33px;
		margin-right: 10px;
		height: 31px;
		margin-top: 9%;
		margin-left: 4%;
		}
} */
@media screen and (max-width: 1024px){
    .aa{
		position: fixed;
		bottom: 13px;
		left: 91%;
	}
	.wx{
	padding:0px 10px;
	float:none;
	margin-top: -67px;
	margin-right: 343px;
}
	.wb{
		padding: 0px 10px;
		float: none;
		margin-top: -67px;
		margin-right: 307px;
}
	.xian{
		display:none;
	}
	
}
@media screen and (max-width: 500px){
	.logo2{
		width: 33px;
		height: 31px;
		margin-right: -42px;
		margin-top: 26px;
		margin-left: 26px;
}
}
</style>
</header>
