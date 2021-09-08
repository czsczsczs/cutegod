<?php get_header(); ?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<div>
	<div class="container single">
		<article class="<?php //mts_article_class(); ?>">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="event-<?php the_ID(); ?>" <?php post_class('event-box'); ?>>
						<div class="single_post event-box-inner">
							<header>
								<h1 class="title single-title event-title" itemprop="headline"><?php the_title(); ?></h1>
							</header>
							<div class="event-data">
								<?php echo mts_event_data(); ?>
							</div>
							<div class="thecontent event-content">
							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
									<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('event',array('title' => '')); echo '</div>'; ?>
								</a>
							<?php } ?>
								<?php the_content(); ?>
								<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => '<i class="fa fa-angle-right"></i>', 'previouspagelink' => '<i class="fa fa-angle-left"></i>', 'pagelink' => '%','echo' => 1 )); ?>
							<?php
							$show_form =  get_post_meta( get_the_ID(), '_mts_event_form', true );
							$timestamp_end = get_post_meta( get_the_ID(), '_mts_event_end_date', true );
							$current_timestamp = current_time('timestamp');
							
							if ( !empty( $show_form ) && $current_timestamp < $timestamp_end  ) { ?>
								<div class="single-event-reservation-form">
									<h5><?php _e( 'Make Reservation', 'mythemeshop' ); ?></h5>
									<?php mts_single_event_form(); ?>
								</div>
							<?php } ?>
							</div>
						</div><!--.post-content box mark-links-->
					</div><!--.g post-->
					<?php //comments_template( '', true ); ?>
				<?php endwhile; /* end loop */ ?>
			</div>
		</article>
		<?php //get_sidebar(); ?>
	</div>
<?php get_footer(); ?>