<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */

?>

				<footer id="colophon" class="site-footer bg-eggplant">
					<div class="site-info">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="left cell small-12 medium-6 text-center medium-text-left">
									<p class="site-title h2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								</div>
								<div class="right cell small-12 medium-6 grid-x flex-dir-column">
									<div><?php trailhead_social_links();?></div>
									<p>&copy; <?= date('Y');?>. All rights reserved.</p> 
								</div>
							</div>
						</div>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

</body>
</html>
