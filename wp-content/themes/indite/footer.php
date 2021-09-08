			</div><!--/.main-inner-->
				
			<footer id="footer">
			
				<?php if ( get_theme_mod( 'footer-ads', 'off' ) == 'on' ): ?>
				<div id="footer-ads">
					<?php dynamic_sidebar( 'footer-ads' ); ?>
				</div><!--/#footer-ads-->
				<?php endif; ?>
					
				<?php // footer widgets
					$total = 4;
					if ( get_theme_mod( 'footer-widgets','0' ) != '' ) {
						
						$total = get_theme_mod( 'footer-widgets' );
						if( $total == 1) $class = 'one-full';
						if( $total == 2) $class = 'one-half';
						if( $total == 3) $class = 'one-third';
						if( $total == 4) $class = 'one-fourth';
						}

						if ( ( is_active_sidebar( 'footer-1' ) ||
							   is_active_sidebar( 'footer-2' ) ||
							   is_active_sidebar( 'footer-3' ) ||
							   is_active_sidebar( 'footer-4' ) ) && $total > 0 ) 
				{ ?>		
				<div id="footer-widgets">
						
					<div class="pad group">
						<?php $i = 0; while ( $i < $total ) { $i++; ?>
							<?php if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
						
						<div class="footer-widget-<?php echo esc_attr( $i ); ?> grid <?php echo esc_attr( $class ); ?> <?php if ( $i == $total ) { echo 'last'; } ?>">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
						
							<?php } ?>
						<?php } ?>
					</div><!--/.pad-->

				</div><!--/#footer-widgets-->	
				<?php } ?>
				
				<div id="footer-bottom">
					
					<a id="back-to-top" href="#"><i class="fas fa-angle-up"></i></a>
						
					<div class="pad group">
						
						<div class="grid one-full">
							
							<?php if ( get_theme_mod('footer-logo') ): ?>
								<img id="footer-logo" src="<?php echo esc_url( get_theme_mod('footer-logo') ); ?>" alt="<?php echo esc_attr( get_bloginfo('name')); ?>">
							<?php endif; ?>
							
							<div id="copyright">
								<span>Copyright 2019-2020 <a target="_blank" href="http://cutegod.cn/">萌小福</a> </span>
								<span>版權所有 Powered by <a target="_blank" href="http://www.macautech.net/">普及科技</span></a>
							</div><!--/#copyright-->
							<style>
								@media screen and (max-width: 600px) {
									#copyright span {
										display:block;
									}
								}
							</style>
							
							
						</div>
						
						<div class="grid one-full">	
							<?php if ( get_theme_mod( 'footer-social', 'on' ) == 'on' ): ?>
								<?php indite_social_links() ; ?>
							<?php endif; ?>
						</div>
						
					</div><!--/.pad-->

				</div><!--/#footer-bottom-->

			</footer><!--/#footer-->
		
		</div><!--/.main-->	
	
	</div><!--/#wrapper-inner-->
</div><!--/#wrapper-->

<?php wp_footer(); ?>
</body>
</html>