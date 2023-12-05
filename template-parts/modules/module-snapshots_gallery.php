<?php
$row = get_row_index();
$snapshots_gallery = get_sub_field('snapshots_gallery') ?? null;
$rtp_field = $snapshots_gallery['remove_top_padding'] ?? null;
$rbp_field = $snapshots_gallery['remove_bottom_padding'] ?? null;
$header_text = $snapshots_gallery['header_text'] ?? null;
$background_color = $snapshots_gallery['background_color'] ?? null;
$images = $snapshots_gallery['images'] ?? null;

$rtp = '';
$rbp = '';

if( $rtp_field == 'true' ) {
	$rtp = 'rtp';
}

if( $rbp_field == 'true' ) {
	$rbp = 'rbp';
}

?>
<section class="snapshots-gallery photo-gallery load-more-gallery <?= $rtp;?> <?=$rbp;?>">
	<?php if( !empty($header_text) ):?>
		<div class="grid-container section-header">
			<div class="grid-x grid-padding-x align-left">
				<div class="cell small-10<?php if( $alignment == 'right' ) { echo ' small-10 small-offset-2'; };?> medium-<?= esc_attr($width);?>">
					<div class="inner has-bg overflow-left">
						<div class="bg bg-<?= esc_attr($background_color);?>"></div>
						<h2 class="relative"><?= esc_attr($header_text);?></h2>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
	<?php if( !empty($images) ):?>
		<div class="grid-container gallery-images">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">
					<div class="gallery-mosaic images-wrap grid-x grid-padding-x">
						<?php 
							$i = 0; 
							$totalIterations = 7;
							$class = '';
						
							foreach($images as $image):
								if (in_array($i % $totalIterations, [0, 6])) {
									$class = ' small-8 height-362 ';
								}	
								if (in_array($i % $totalIterations, [ 1, 5])) {
									$class = ' small-4 height-362 ';
								}	
								if (in_array($i % $totalIterations, [2, 3, 4,])) {
									$class = ' small-4 height-268 ';
								}	
								$imgID = $image['ID'];	
							?>
							
							<?php if( !empty($image) ):?>
									<div class="cell<?=$class;?> img-<?=$imgID;?>">
										<a id="image-<?=$i;?>" class="img-wrap" href="#" data-modal="gallery-modal-<?=$row;?>">
											<?php
												$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
												$img = wp_get_attachment_image( $imgID, 'snapshot-image-thumb-2x', false, [ "class" => "", "alt"=>$img_alt] );
												echo $img;
											?>
										</a>
									</div>
							<?php endif;?>
							
						<?php $i++; endforeach;?>
					</div>
				</div>
			</div>
		</div>
		<div class="gallery-modal reveal" id="gallery-modal-<?=$row;?>" data-reveal data-animation-in="fade-in fast" data-animation-out="fade-out fast">
			<div class="grid-x align-right close-btn-wrap">
				<button class="close-button" data-close aria-label="Close modal" type="button">
					<svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 512 512"><path d="M256 32a224 224 0 1 1 0 448 224 224 0 1 1 0-448zm0 480A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM180.7 180.7c-6.2 6.2-6.2 16.4 0 22.6L233.4 256l-52.7 52.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L256 278.6l52.7 52.7c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L278.6 256l52.7-52.7c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L256 233.4l-52.7-52.7c-6.2-6.2-16.4-6.2-22.6 0z" fill="#ffffff"/></svg>
				</button>
			</div>
			<?php if($images ) :?>
				<div class="gallery-slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php $si = 0;  foreach($images as $image):?>
								<?php if( !empty( $image ) ) {
									$imgID = $image['ID'];
									$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
									$img = wp_get_attachment_image( $imgID, 'gallery-slider-image-2x', false, [ "class" => "", "alt"=>$img_alt] );
									echo '<div class="swiper-slide grid-x align-middle align-center" data-image="image-' . esc_attr($si) . '" data-swiper-slide-index="' .  esc_attr( $si ) . '">';
									echo '<div class="img-wrap">';
									echo $img;
									echo '</div>';
									echo '</div>';
								}?>
							<?php $si++; endforeach;?>
						</div>
						<button class="swiper-button-prev swiper-nav">
							<svg xmlns="http://www.w3.org/2000/svg" width="69" height="69" viewBox="0 0 69 69" fill="none">
							  <g clip-path="url(#clip0_181_1370)">
								<rect x="8.625" y="8.62512" width="51.75" height="51.75" rx="2" stroke="#F2F2F2" stroke-width="2"></rect>
								<path d="M38.8125 23L27.3125 34.5L38.8125 46" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							  </g>
							  <defs>
								<clipPath id="clip0_181_1370">
								  <rect width="69" height="69" fill="white"></rect>
								</clipPath>
							  </defs>
							</svg>
						</button>
						<button class="swiper-button-next swiper-nav">
							<svg xmlns="http://www.w3.org/2000/svg" width="69" height="69" viewBox="0 0 69 69" fill="none">
							  <g clip-path="url(#clip0_181_1369)">
								<rect x="8.625" y="8.62512" width="51.75" height="51.75" rx="2" stroke="#F2F2F2" stroke-width="2"></rect>
								<path d="M28.75 46L40.25 34.5L28.75 23" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							  </g>
							  <defs>
								<clipPath id="clip0_181_1369">
								  <rect width="69" height="69" fill="white"></rect>
								</clipPath>
							  </defs>
							</svg>
						</button>
					</div>
				</div>
			<?php endif;?>
		</div>
	<?php endif;?>
</section>
