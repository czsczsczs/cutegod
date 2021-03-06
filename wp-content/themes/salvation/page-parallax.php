<?php
/**
 * Template Name: Parallax Page
 * 
 * To be used as a sample
 */
$mts_options = get_option(MTS_THEME_NAME); ?>
<?php get_header(); ?>
<div class="single parallax">
	<?php if (mts_get_thumbnail_url()) : ?>
		<div id="parallax" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div>
	<?php endif; ?>
	<div class="container">
		<article class="<?php mts_article_class(); ?>">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<div class="single_page">
							<?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
								<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php mts_the_breadcrumb(); ?></div>
							<?php } ?>
							<header>
								<h1 class="title entry-title"><?php the_title(); ?></h1>
							</header>
							<div class="post-content box mark-links entry-content">
								<?php the_content(); ?>
								<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => '<i class="fa fa-angle-right"></i>', 'previouspagelink' => '<i class="fa fa-angle-left"></i>', 'pagelink' => '%','echo' => 1 )); ?>
							</div><!--.post-content box mark-links-->
						</div>
					</div>
					<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
			</div>
		</article>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>