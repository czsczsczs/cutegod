<div class="page-title group">
	<div class="page-title-inner group">
	
		<?php if ( is_home() ) : ?>
			<h2><?php echo indite_blog_title(); ?></h2>
			
		<?php elseif ( is_single() ): ?>

		<?php elseif ( is_page() ): ?>
			<h2><?php the_title(); ?></h2>

		<?php elseif ( is_search() ): ?>
			<h1>
				<?php if ( have_posts() ): ?><i class="fas fa-search"></i><?php endif; ?>
				<?php if ( !have_posts() ): ?><i class="fas fa-exclamation-circle"></i><?php endif; ?>
				<?php $search_results=$wp_query->found_posts;
					if ($search_results==1) {
						echo $search_results.'個搜索結果';
					} else {
						echo $search_results.'個搜索結果';
					}
				?>
			</h1>
			<div class="notebox">
				關於 "<span><?php echo get_search_query(); ?></span>".
				<?php if ( !have_posts() ): ?>
					請嘗試其他搜索：
				<?php endif; ?>
				<div class="search-again">
					<?php get_search_form(); ?>
				</div>
			</div>
			
		<?php elseif ( is_404() ): ?>
			<h1><i class="fas fa-exclamation-circle"></i><?php esc_html_e('Error 404.','indite'); ?> <span>找不到頁面!</span></h1>
			<div class="notebox">	
				<p>您嘗試訪問的頁面不存在或已被移動。 請使用菜單或搜索框查找所需內容。</p>
				<?php get_search_form(); ?>
			</div>
			
		<?php elseif ( is_author() ): ?>
			<?php $author = get_userdata( get_query_var('author') );?>
			<h1><i class="far fa-user"></i><?php echo $author->display_name;?></h1>
			
		<?php elseif ( is_category() ): ?>
			<h1><i class="far fa-folder"></i><?php echo single_cat_title('', false); ?></h1>

		<?php elseif ( is_tag() ): ?>
			<h1><i class="fas fa-tags"></i><?php echo single_tag_title('', false); ?></h1>
			
		<?php elseif ( is_day() ): ?>
			<h1><i class="far fa-calendar"></i><?php echo esc_html( get_the_time('F j, Y') ); ?></h1>
			
		<?php elseif ( is_month() ): ?>
			<h1><i class="far fa-calendar"></i><?php echo esc_html( get_the_time('F Y') ); ?></h1>
				
		<?php elseif ( is_year() ): ?>
			<h1><i class="far fa-calendar"></i><?php echo esc_html( get_the_time('Y') ); ?></h1>
		
		<?php else: ?>
			<h2><?php the_title(); ?></h2>

		<?php endif; ?>

		<?php if ( ! is_paged() ) : ?>
			<?php the_archive_description( '<div class="notebox">', '</div>' ); ?>
		<?php endif; ?>
	
	</div><!--/.page-title-inner-->
</div><!--/.page-title-->