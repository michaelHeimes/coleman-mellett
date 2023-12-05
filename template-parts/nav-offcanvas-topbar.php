<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
?>
<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="cell small-12">
			<div class="top-bar-wrap">
			
				<div class="top-bar" id="top-bar-menu">
				
					<div class="top-bar-left float-left">
						
						<div class="site-branding">
							<?php
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title h2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title h2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$trailhead_description = get_bloginfo( 'description', 'display' );
							if ( $trailhead_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $trailhead_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
					
						<ul class="menu">
							<li class="logo"><a href="<?php echo home_url(); ?>">
								<?php 
								$image = get_field('header_logo', 'option');
								if( !empty( $image ) ): ?>
					    			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
							</a></li>
						</ul>
									
					</div>
					<div class="top-bar-right">
						<div class="grid-x align-right">
							<div class="cell shrink">
								<?php trailhead_top_nav();?>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>