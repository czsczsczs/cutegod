<?php
$mts_options = get_option(MTS_THEME_NAME);
?>
<?php get_header(); ?>
<div>
	<div class="container">
		<div id="content_box">
			<?php 

			query_posts( array( 'post_type'=> 'event', 'order' => 'ASC', 'meta_key' => '_mts_event_start_date', 'orderby'   => 'meta_value_num') );

			$j = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="latestPost excerpt event-box">
					<div class="latest-post-inner event-box-inner">
						<header>
							<h2 class="title front-view-title" itemprop="headline"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						</header>
						<div class="event-data">
							<?php echo mts_event_data(); ?>
						</div>
						<div class="front-view-content event-content">
						<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
								<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('event',array('title' => '')); echo '</div>'; ?>
							</a>
						<?php } ?>
							<?php echo mts_excerpt(50); ?>
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
<?php get_footer(); ?>