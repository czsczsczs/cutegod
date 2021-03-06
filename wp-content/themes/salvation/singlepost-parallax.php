<?php
/**
 * Alternative post template
 * 
 * To be used as a sample
 */
 ?>
<?php get_header(); ?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<div>
	<div class="single parallax">
	    <?php if (mts_get_thumbnail_url()) : ?>
	        <div id="parallax" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div>
	    <?php endif; ?>
	    <div class="container">
			<article class="<?php mts_article_class(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
				<div id="content_box" >
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
							<div class="single_post">
								<?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
									<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php mts_the_breadcrumb(); ?></div>
								<?php } ?>
								<header>
									<h1 class="title single-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
									<?php if($mts_options['mts_single_headline_meta'] == '1') { ?>
										<div class="post-info">
											<?php if(isset($mts_options['mts_single_headline_meta_info']['author']) == '1') { ?>
												<span class="theauthor"><i class="fa fa-user"></i> <span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php the_author_posts_link(); ?></span></span></span>
											<?php } ?>
											<?php if(isset($mts_options['mts_single_headline_meta_info']['date']) == '1') { ?>
												<span class="thetime updated"><i class="fa fa-calendar"></i> <span itemprop="datePublished"><?php the_time( get_option( 'date_format' ) ); ?></span></span>
											<?php } ?>
											<?php if(isset($mts_options['mts_single_headline_meta_info']['category']) == '1') { ?>
												<span class="thecategory"><i class="fa fa-tags"></i> <?php mts_the_category(', ') ?></span>
											<?php } ?>
											<?php if(isset($mts_options['mts_single_headline_meta_info']['comment']) == '1') { ?>
												<span class="thecomment"><i class="fa fa-comments"></i> <a rel="nofollow" href="<?php comments_link(); ?>"><?php echo comments_number();?></a></span>
											<?php } ?>
										</div>
									<?php } ?>
								</header><!--.headline_area-->
								<div class="post-single-content box mark-links entry-content">
									<?php if ($mts_options['mts_posttop_adcode'] != '') { ?>
										<?php $toptime = $mts_options['mts_posttop_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$toptime day")), get_the_time("Y-m-d") ) >= 0) { ?>
											<div class="topad">
												<?php echo do_shortcode($mts_options['mts_posttop_adcode']); ?>
											</div>
										<?php } ?>
									<?php } ?>
		                            <?php if (isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] === 'top') mts_social_buttons(); ?>
		                            <div class="thecontent" itemprop="articleBody">
				                        <?php the_content(); ?>
									</div>
		                            <?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => '<i class="fa fa-angle-right"></i>', 'previouspagelink' => '<i class="fa fa-angle-left"></i>', 'pagelink' => '%','echo' => 1 )); ?>
									<?php if ($mts_options['mts_postend_adcode'] != '') { ?>
										<?php $endtime = $mts_options['mts_postend_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$endtime day")), get_the_time("Y-m-d") ) >= 0) { ?>
											<div class="bottomad">
												<?php echo do_shortcode($mts_options['mts_postend_adcode']); ?>
											</div>
										<?php } ?>
									<?php } ?> 
									<?php if (empty($mts_options['mts_social_button_position']) || $mts_options['mts_social_button_position'] !== 'top') mts_social_buttons(); ?>
									<?php if($mts_options['mts_tags'] == '1') { ?>
										<div class="tags"><?php mts_the_tags('<span class="tagtext">'.__('Tags','mythemeshop').':</span>',', ') ?></div>
									<?php } ?>
								</div>
							</div><!--.post-content box mark-links-->
							
		                    <?php mts_related_posts(); ?> 
		                    				
							<?php if($mts_options['mts_author_box'] == '1') { ?>
								<div class="postauthor">
									<h4 class="section-title"><?php _e('About The Author', 'mythemeshop'); ?></h4>
									<div class="postauthor-container clearfix">
										<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '150' );  } ?>
										<h5 class="vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="nofollow" class="fn"><?php the_author_meta( 'nickname' ); ?></a></h5>
										<p><?php the_author_meta('description') ?></p>
									</div>
								</div>
							<?php }?>
						</div><!--.g post-->
						<?php comments_template( '', true ); ?>
					<?php endwhile; /* end loop */ ?>
				</div>
			</article>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>