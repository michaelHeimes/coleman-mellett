<?php
$row = get_row_index();
$photo_gallery = get_sub_field('photo_gallery') ?? null;
$rtp_field = $photo_gallery['remove_top_padding'] ?? null;
$rbp_field = $photo_gallery['remove_bottom_padding'] ?? null;
$images = $photo_gallery['images'] ?? null;

$rtp = '';
$rbp = '';

if( $rtp_field == 'true' ) {
	$rtp = 'rtp';
}

if( $rbp_field == 'true' ) {
	$rbp = 'rbp';
}

?>
<?php if( !empty($photo_gallery) ):?>
<section class="module photo-gallery load-more-gallery <?= $rtp;?> <?=$rbp;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="gallery-mosaic images-wrap grid-x grid-padding-x">
					<?php 
						$i = 0; 
						$totalIterations = 14;
						$class = '';

						foreach($images as $image):
							if (in_array($i % $totalIterations, [0, 1, 2, 5, 6, 7])) {
								$class = ' small-4 height-320 ';
							}	
							if (in_array($i % $totalIterations, [3, 4, 12, 13,])) {
								$class = ' small-6 height-362 ';
							}	
							if (in_array($i % $totalIterations, [8,9,10,11])) {
								$class = ' small-3 height-239 ';
							}
							$imgID = $image['ID'];	
						?>
						
						<?php if( !empty($image) ):?>
							<div class="cell<?=$class; if( $i >= 17 ) { echo 'hidden';}?> img-<?=$imgID;?>"<?php if( $i >= 17 ):?> style="opacity: 0; display: none;"<?php endif;?>>
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
				<?php if( count($images) > $totalIterations ):?>
					<div class="btn-wrap text-center">
						<button class="button load-more-button">Load More</button>
					</div>
				<?php endif;?>
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
		<?php endif;?>
	</div>
</section>
<?php endif;?>