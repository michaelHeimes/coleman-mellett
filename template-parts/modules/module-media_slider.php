<?php
$media_slider = get_sub_field('media_slider') ?? null;
$header_text = $media_slider['header_text'] ?? null;
$alignment = $media_slider['alignment'] ?? null;
$background_color = $media_slider['background_color'] ?? null;
$type = $media_slider['type'] ?? null;
if( $type == 'images' ) {
	$images = $media_slider['images'] ?? null;
}
if( $type == 'videos' ) {
	$videos = $media_slider['videos'] ?? null;
}
$button_link = $media_slider['button_link'] ?? null;
$add_handwriting = $media_slider['add_handwriting'] ?? null;
if($add_handwriting) {
	$handwriting_image = $media_slider['handwriting_image'] ?? null;
}
?>
<section class="media-slider">
	<?php if( !empty($header_text) ):?>
		<div class="section-header relative">
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-<?= esc_attr($alignment);?>">
					<div class="left cell small-10<?php if( $alignment == 'right' ) { echo ' small-10 small-offset-2'; };?> medium-8 large-6">
						<div class="inner has-bg overflow-<?= esc_attr($alignment);?>">
							<div class="bg bg-<?= esc_attr($background_color);?>"></div>
							<h2 class="relative"><?= esc_attr($header_text);?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
	<?php if( !empty($images) ):?>
		<div class="image-slider-section">
			<div class="grid-container">
				<?php if( $add_handwriting == 'true' && !empty($handwriting_image)):
						$imgID = $handwriting_image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="handwriting-img">';
						echo $img;
						echo '</div>';
				endif;?>
				<div class="image-slider-wrap grid-x grid-x-padding relative">
					<div class="image-slider cell small-12">
						<div class="swiper-wrapper">
							<?php foreach($images as $image) {
								
								if( !empty( $image ) ) {
									
									$size2x = 'image-gallery-slider-2x';
									$size1x = 'image-gallery-slider-1x';
									$fallback_size = 'full';
									
									$image2x = wp_get_attachment_image_src($image['ID'], $size2x);
									$image1x = wp_get_attachment_image_src($image['ID'], $size1x);
									$image_fallback = wp_get_attachment_image_src($image['ID'], $fallback_size);
									
									if ($image2x) {
										$size = $size2x;
									} elseif ($image1x) {
										$size = $size1x;
									} else {
										$size = $fallback_size;
									}
			
									$imgID = $image['ID'];
									$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
									$img = wp_get_attachment_image( $imgID, $size, false, [ "class" => "", "alt"=>$img_alt] );
									echo '<div class="swiper-slide img-wrap">';
									echo $img;
									echo '</div>';
								}
			
							}?>
						</div>
					</div>
				</div>
			</div>
			<div class="grid-container">
				<div class="bottom grid-x grid-padding-x">
					<div class="cell small-12 medium-auto">
						<nav class="slider-nav grid-x grid-padding-x">
							<div class="cell shrink">
								<button class="no-style swiper-button-prev" type="button" aria-controls="Previous Slide">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55px" height="55px" viewBox="0 0 55 55" version="1.1"><title>Prev Icon</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Icon" transform="translate(27.499880, 27.500000) rotate(-180.000000) translate(-27.499880, -27.500000) translate(1.624880, 1.625000)" stroke="#1B283A" stroke-width="2"><rect id="Rectangle" x="0" y="0" width="51.75" height="51.75" rx="2"></rect><polyline id="Path" stroke-linecap="round" stroke-linejoin="round" points="20.12512 37.375 31.62512 25.875 20.12512 14.375"></polyline></g></g></svg>
								</button>
							</div>
							<div class="cell shrink">
								<button class="no-style swiper-button-next" type="button" aria-controls="Next Slide">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55px" height="55px" viewBox="0 0 55 55" version="1.1"><title>Next Icon</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Icon-(1)" transform="translate(1.624880, 1.625000)" stroke="#1B283A" stroke-width="2"><rect id="Rectangle" x="0" y="0" width="51.75" height="51.75" rx="2"></rect><polyline id="Path" stroke-linecap="round" stroke-linejoin="round" points="20.12512 37.375 31.62512 25.875 20.12512 14.375"></polyline></g></g></svg>
								</button>
							</div>
						</nav>
					</div>
					<?php 
					$link = $button_link;
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
					<div class="btn-wrap cell shrink">
						<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif;?>
	<?php if( !empty($videos) ):?>
		<div class="video-slider-section">
			<div class="grid-container">
				<div class="video-slider-wrap grid-x grid-x-padding align-center relative">
					<div class="video-slider cell small-12 medium-10 large-8 relative">
						<?php if( $add_handwriting == 'true' && !empty($handwriting_image)):
								$imgID = $handwriting_image['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="handwriting-img">';
								echo $img;
								echo '</div>';
						endif;?>
						<div class="swiper-wrapper">
							<?php foreach($videos as $video) {
								$iframe = $video['video'];
								if( !empty( $iframe) ) {
									
									// Use preg_match to find iframe src.
									preg_match('/src="(.+?)"/', $iframe, $matches);
									$src = $matches[1];
									
									// Add extra parameters to src and replace HTML.
									$params = array(
										'controls'  => 1,
										'hd'        => 1,
										'autohide'  => 1
									);
									$new_src = add_query_arg($params, $src);
									$iframe = str_replace($src, $new_src, $iframe);
									
									// Add extra attributes to iframe HTML.
									$attributes = 'frameborder="0"';
									$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
									
									// Display customized HTML.
									echo '<div class="swiper-slide video-wrap responsive-embed widescreen">';
									echo $iframe;
									echo '</div>';
									
			// 						$size2x = 'image-gallery-slider-2x';
			// 						$size1x = 'image-gallery-slider-1x';
			// 						$fallback_size = 'full';
			// 						
			// 						$image2x = wp_get_attachment_image_src($image['ID'], $size2x);
			// 						$image1x = wp_get_attachment_image_src($image['ID'], $size1x);
			// 						$image_fallback = wp_get_attachment_image_src($image['ID'], $fallback_size);
			// 						
			// 						if ($image2x) {
			// 							$size = $size2x;
			// 						} elseif ($image1x) {
			// 							$size = $size1x;
			// 						} else {
			// 							$size = $fallback_size;
			// 						}
			// 
			// 						$imgID = $image['ID'];
			// 						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
			// 						$img = wp_get_attachment_image( $imgID, $size, false, [ "class" => "", "alt"=>$img_alt] );
			// 						echo '<div class="swiper-slide img-wrap">';
			// 						echo $img;
			// 						echo '</div>';
								}
			
							}?>
						</div>
					</div>
				</div>
			</div>
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-center">
					<div class="cell small-12 medium-10 large-8">
						<div class="bottom grid-x grid-padding-x align-center flex-dir-column medium-flex-dir-row">
							<div class="cell small-12 medium-auto">
								<nav class="slider-nav grid-x grid-padding-x">
									<div class="cell shrink">
										<button class="no-style swiper-button-prev" type="button" aria-controls="Previous Slide">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55px" height="55px" viewBox="0 0 55 55" version="1.1"><title>Prev Icon</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Icon" transform="translate(27.499880, 27.500000) rotate(-180.000000) translate(-27.499880, -27.500000) translate(1.624880, 1.625000)" stroke="#1B283A" stroke-width="2"><rect id="Rectangle" x="0" y="0" width="51.75" height="51.75" rx="2"></rect><polyline id="Path" stroke-linecap="round" stroke-linejoin="round" points="20.12512 37.375 31.62512 25.875 20.12512 14.375"></polyline></g></g></svg>
										</button>
									</div>
									<div class="cell shrink">
										<button class="no-style swiper-button-next" type="button" aria-controls="Next Slide">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55px" height="55px" viewBox="0 0 55 55" version="1.1"><title>Next Icon</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Icon-(1)" transform="translate(1.624880, 1.625000)" stroke="#1B283A" stroke-width="2"><rect id="Rectangle" x="0" y="0" width="51.75" height="51.75" rx="2"></rect><polyline id="Path" stroke-linecap="round" stroke-linejoin="round" points="20.12512 37.375 31.62512 25.875 20.12512 14.375"></polyline></g></g></svg>
										</button>
									</div>
								</nav>
							</div>
							<?php 
							$link = $button_link;
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
							<div class="btn-wrap cell shrink">
								<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
</section>
