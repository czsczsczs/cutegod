<?php
$mts_options = get_option(MTS_THEME_NAME);

if ( empty( $mts_options['mts_blog_layout'] ) ) {
    $classes = ' posts-loop list-layout';
    $thumb_size = 'featured';
    $excerpt_lenght = 25;
} else {
    $classes = ' posts-loop grid-layout';
    $thumb_size = 'featured1';
    $excerpt_lenght = 19;
}
?>
<?php get_header(); ?>
<div>
	<div class="container">
		<div class="<?php mts_article_class(); echo $classes; ?>">
			<div id="content_box">
				<?php $j = 0; if (have_posts()) : while (have_posts()) : the_post(); $format = get_post_format(); ?>
    				<article class="latestPost excerpt <?php echo ( false === $format ) ? 'format-standard' : 'format-'.$format; ?>" itemscope itemtype="http://schema.org/BlogPosting">
						<div class="latest-post-inner">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
								<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail($thumb_size,array('title' => '')); echo '</div>'; ?>
								<?php if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
								<span class="format-icon"></span>
							</a>
							<div class="latest-post-data">
								<header>
									<h2 class="title front-view-title" itemprop="headline"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
									<?php mts_the_postinfo(); ?>
								</header>
		    					<div class="front-view-content">
		                            <?php echo mts_excerpt($excerpt_lenght); ?>
		    					</div>
							    <?php mts_readmore(); ?>
							</div>
		                </div>
					</article><!--.post excerpt-->
				<?php $j++; endwhile; endif; ?>
				<?php if ( $j !== 0 ) { // No pagination if there is no results ?>
				<!--Start Pagination-->
	            <?php if (isset($mts_options['mts_pagenavigation_type']) && $mts_options['mts_pagenavigation_type'] == '1' ) { ?>
	                <?php mts_pagination(); ?> 
				<?php } else { ?>
					<div class="pagination">
						<ul>
							<li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
							<li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
						</ul>
					</div>
				<?php } ?>
				<!--End Pagination-->
				<?php } ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>