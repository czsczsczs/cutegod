<!DOCTYPE html>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php mts_meta(); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body id ="blog" <?php body_class('main'); ?> itemscope itemtype="http://schema.org/WebPage">
	<div class="main-container">
		<header class="main-header clearfix" role="banner" itemscope itemtype="http://schema.org/WPHeader" <?php echo ($mts_options['mts_sticky_header'] == '1' ? 'id="sticky"' : '')?>>
			<div class="container">
				<div id="header">
					<div class="logo-wrap">
						<?php if ($mts_options['mts_logo'] != '') { ?>
							<?php if( is_front_page() || is_home() || is_404() ) { ?>
									<h1 id="logo" class="image-logo" itemprop="headline">
										<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
									</h1><!-- END #logo -->
							<?php } else { ?>
									<h2 id="logo" class="image-logo" itemprop="headline">
										<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
									</h2><!-- END #logo -->
							<?php } ?>
						<?php } else { ?>
							<?php if( is_front_page() || is_home() || is_404() ) { ?>
									<h1 id="logo" class="text-logo" itemprop="headline">
										<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
									</h1><!-- END #logo -->
							<?php } else { ?>
									<h2 id="logo" class="text-logo" itemprop="headline">
										<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
									</h2><!-- END #logo -->
							<?php } ?>
						<?php } ?>
					</div>
					<?php if ( $mts_options['mts_show_primary_nav'] == '1' ) { ?>
					<div class="primary-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<nav id="navigation">
							<a href="#" id="pull" class="toggle-mobile-menu"><i class="fa fa-bars"></i><?php _e('Menu','mythemeshop'); ?></a>
							<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
								<?php $nav_menu_walker = mts_is_wp_mega_menu_active() ? new wpmm_menu_walker : new mts_menu_walker; ?>
								<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu', 'container' => '', 'walker' => $nav_menu_walker ) ); ?>
							<?php } else { ?>
								<ul class="menu">
									<?php wp_list_pages('title_li='); ?>
								</ul>
							<?php } ?>
							<?php if ($mts_options['mts_header_search_form'] == '1') { ?>
								<div class="header-search">
									<a href="#" class="fa fa-search"></a>
									<form class="search-form" action="<?php echo home_url(); ?>" method="get">
										<input class="hideinput" name="s" id="s" type="search" placeholder="<?php _e('Search...', 'mythemeshop'); ?>" autocomplete="off" />
									</form>
								</div>
							<?php } ?>
						</nav>
					</div>
					<?php } ?>
				</div><!--#header-->
			</div><!--.container-->
		</header>
		<?php if($mts_options['mts_sticky_header'] == '1') { ?>
            <div id="catcher"></div>
        <?php } ?>
        <?php if ( $mts_options['mts_bottom_header'] == '1' && ! ( is_home() ) ) {
        	$bottom_header_bg_cover_class = ( $mts_options['mts_bottom_header_background_image_cover'] == '1' && $mts_options['mts_bottom_header_bg_pattern_upload'] != '' ) ? ' cover-bg' : '';
        	$bottom_header_parallax_class = ( $mts_options['mts_bottom_header_parallax'] == '1' ) ? ' parallax-bg' : '';
        	?>
        	<div id="page-title" class="section clearfix<?php echo $bottom_header_bg_cover_class . $bottom_header_parallax_class; ?>">
        		<div class="container">
        			<div class="page-title-container">
    				<?php if (is_category()) { $category_description = category_description(); ?>
						<h1 class="page-title"><?php single_cat_title(); ?></h1>
						<?php if ( !empty( $category_description ) ) { ?><div class="page-description"><?php echo $category_description; ?></div><?php } ?>
					<?php } elseif (is_tag()) { $tag_description = tag_description(); ?>
						<h1 class="page-title"><?php single_tag_title(); ?><?php //_e(" Archive", "mythemeshop"); ?></h1>
						<?php if ( !empty( $tag_description ) ) { ?><div class="page-description"><?php echo $tag_description; ?></div><?php } ?>
					<?php } elseif (is_post_type_archive('event')) { ?>
						<h1 class="page-title"><?php _e("Events", "mythemeshop"); ?></h1>
						<div class="page-description"><?php _e("Events archive", "mythemeshop"); ?></div>
					<?php } elseif (is_author()) { ?>
						<h1 class="page-title"><?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->nickname; ?></h1> 
						<div class="page-description"><?php _e("Author archive", "mythemeshop"); ?></div>
					<?php } elseif (is_day()) { ?>
						<h1 class="page-title"><?php the_time('l, F j, Y'); ?></h1>
						<div class="page-description"><?php _e("Daily archive", "mythemeshop"); ?></div>
					<?php } elseif (is_month()) { ?>
						<h1 class="page-title"><?php the_time('F Y'); ?></h1>
						<div class="page-description"><?php _e("Monthly archive", "mythemeshop"); ?></div>
					<?php } elseif (is_year()) { ?>
						<h1 class="page-title"><?php the_time('Y'); ?></h1>
						<div class="page-description"><?php _e("Yearly archive", "mythemeshop"); ?></div>
					<?php } elseif (is_search()) { ?>
						<h1 class="page-title"><?php the_search_query(); ?></h1>
						<div class="page-description"><?php _e("Search query results", "mythemeshop"); ?></div>
					<?php } elseif (is_page() || is_singular()) { ?>
						<h1 class="page-title"><?php the_title(); ?></h1>
						<div class="page-description"><?php bloginfo( 'description' ); ?></div>
					<?php } else { ?>
        				<h1 class="page-title"><?php _e('Blog','mythemeshop'); ?></h1>
        				<div class="page-description"><?php bloginfo( 'description' ); ?></div>
        			<?php } ?>
        			</div>
        			<aside class="page-title-sidebar">
        				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom-header-sidebar') ) : ?><?php endif; ?>
        			</aside>
        		</div>
        	</div>
        <?php } ?>