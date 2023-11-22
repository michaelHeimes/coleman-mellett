<?php
$cta = get_sub_field('where_to_listen_cta') ?? null;
$header_text = $cta['header_text'] ?? null;
$background_color = $cta['background_color'] ?? null;
$album_ctas = $cta['album_ctas'] ?? null;
$streaming_heading = $cta['streaming_heading'] ?? null;
$platforms = $cta['platforms'] ?? null;
?>
<section class="module where-to-listen-cta">
	<div class="grid-container section-header">
		<div class="grid-x grid-padding-x align-right">
			<div class="cell small-10 small-offset-2 medium-8">
				<div class="inner has-bg overflow-right">
					<div class="bg bg-<?= esc_attr($background_color);?>"></div>
					<?php if( !empty($header_text) ):?>
						<h2 class="relative"><?= esc_attr($header_text);?></h2>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<?php if( !empty($album_ctas) ):?>
		<div class="grid-container album-ctas">
			<div class="grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3">
				<?php foreach($album_ctas as $album_cta):
					$title = $album_cta['title'];
					$cover_art = $album_cta['cover_art'];
					$button_link = $album_cta['button_link'];	
				?>
					<div class="cell text-center">
						<?php if( !empty($title) ):?>
						<div class="top grid-x align-center align-bottom">
							<h2 class="h3"><?= esc_attr($title);?></h2>
						</div>
						<?php endif;?>
						<div class="bottom">
							<?php if( !empty( $cover_art ) ) {
								$imgID = $cover_art['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="img-wrap">';
								echo $img;
								echo '</div>';
							}?>
							<?php 
							$link =$button_link;
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
							<div class="btn-wrap">
								<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	<?php endif;?>
	<?php if( !empty($streaming_heading) || !empty($platforms) ):?>
		<div class="grid-container streaming">
			<?php if( !empty($streaming_heading) ):?>
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 text-center">
					<h2 class="h3"><?= esc_attr( $streaming_heading );?></h2>
				</div>
			</div>
			<?php endif;?>
			<?php if( !empty($platforms) ):?>
				<div class="platform-icon-links grid-x grid-padding-x align-center">
					<?php foreach($platforms as $platform):
						$icon = $platform['icon'];	
						$url = $platform['url'];	
					?>
						<div class="cell shrink">
							<a href="<?php echo esc_url($url);?>" target="_blank">
								<?php if( !empty( $icon ) ) {
									$imgID = $icon['ID'];
									$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
									$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
									echo '<div class="icon-wrap">';
									echo $img;
									echo '</div>';
								}?>
							</a>
						</div>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		</div>
	<?php endif;?>
</section>
