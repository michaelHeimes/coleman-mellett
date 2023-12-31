<?php
$row = get_row_index();
$video_gallery = get_sub_field('video_gallery') ?? null;
$videos = $video_gallery['videos'] ?? null;
$featured_video_url = $video_gallery['featured_video_url'];
?>
<?php if( !empty($video_gallery) ):?>
<section class="module video-gallery load-more-gallery overflow-hidden">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<?php if( !empty( $featured_video_url ) ) :
					
					
					$youtube_url = $featured_video_url;	
					$videoId = '';
					$pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
					preg_match($pattern, $youtube_url, $matches);
					
					if (isset($matches[1])) {
						$videoId = $matches[1];
					}						
					
					$thumbnailUrl = 'https://i3.ytimg.com/vi_webp/' . $videoId . '/maxresdefault.webp';

					// Load value.
					$iframe = $featured_video_url;
										
					// Use preg_match to find iframe src.
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];
					
					// Add extra parameters to src and replace HTML.
					$params = array(
						'controls'  	 => 1,
						'hd'        	 => 1,
						'autohide'  	 => 1,
						'enablejsapi'    => 1,
						'rel' 			 => 0,
					);
					$new_src = add_query_arg($params, $src);
					$iframe = str_replace($src, $new_src, $iframe);
					
					// Add extra attributes to iframe HTML.
					$attributes = 'frameborder="0"';
					$iframe = str_replace('></iframe>', ' data-src="' . $new_src . '"' . $attributes . '></iframe>', $iframe);?>
					
					<div class="single-video-wrap video-wrap has-mask responsive-embed widescreen">
						<?= $iframe;?>
						<button class="video-mask">
							<img src="<?=$thumbnailUrl;?>">
							<svg width="119" height="138" viewBox="0 0 119 138" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M119 69L0.499994 137.416L0.5 0.583987L119 69Z" fill="white"/></svg>
						</button> 
					</div>
				
				<?php endif;?>
				<div class="gallery-mosaic images-wrap grid-x grid-padding-x">
					<?php 
						$i = 0; 
						$totalIterations = 6;
						$max_show = 6; 

						foreach($videos as $video): 
							$youtube_url = $video['youtube_url'];	
							$videoId = '';
							$pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
							preg_match($pattern, $youtube_url, $matches);
							
							if (isset($matches[1])) {
								$videoId = $matches[1];
							}						
							
							$thumbnail = 'https://i3.ytimg.com/vi_webp/' . $videoId . '/maxresdefault.webp';
							
						?>
						
						<?php if( !empty($youtube_url) ):?>
							<div class="cell small-4 <? if( $i >= $max_show ) { echo 'hidden';}?> img-<?=$i;?>"<?php if( $i >= $max_show ):?> style="opacity: 0; display: none;"<?php endif;?>>
								<a class="video-wrap has-mask relative" id="image-<?=$i;?>" href="#" data-modal="gallery-modal-<?=$row;?>">
									<div class="video-mask img-wrap">
										<img src="<?= esc_url($thumbnail);?>">
										<svg width="60px" height="70px" viewBox="0 0 60 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Polygon-3" transform="translate(0.000000, 0.359000)" fill="#FFFFFF" fill-rule="nonzero"><polygon id="Path" points="60 34.641 0 69.282 0 0"></polygon></g></g></svg>
									</div>
								</a>
							</div>
						<?php endif;?>
						
					<?php $i++; endforeach;?>
				</div>
				<?php if( count($videos) > $totalIterations ):?>
					<div class="btn-wrap text-center">
						<button class="button load-more-button">Load More</button>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="gallery-modal reveal" id="gallery-modal-<?=$row;?>" data-reveal data-animation-in="fade-in fast" data-animation-out="fade-out fast">
		<div class="grid-x align-right close-btn-wrap relative">
			<button class="close-button" data-close aria-label="Close modal" type="button">
				<svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 512 512"><path d="M256 32a224 224 0 1 1 0 448 224 224 0 1 1 0-448zm0 480A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM180.7 180.7c-6.2 6.2-6.2 16.4 0 22.6L233.4 256l-52.7 52.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L256 278.6l52.7 52.7c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L278.6 256l52.7-52.7c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L256 233.4l-52.7-52.7c-6.2-6.2-16.4-6.2-22.6 0z" fill="#ffffff"/></svg>
			</button>
		</div>
		<?php if($videos ) :?>
			<script src="https://www.youtube.com/iframe_api"></script>
			<div class="gallery-slider overflow-hidden">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php $si = 0;  foreach($videos as $video):?>
							<?php if( !empty( $video ) ) {
								
								// Load value.
								$iframe =$video['youtube_url'];
								
								// Use preg_match to find iframe src.
								preg_match('/src="(.+?)"/', $iframe, $matches);
								$src = $matches[1];
								
								// Add extra parameters to src and replace HTML.
								$params = array(
									'controls'  	 => 1,
									'hd'        	 => 1,
									'autohide'  	 => 1,
									'enablejsapi'    => 1,
									'rel' 			 => 0,
								);
								$new_src = add_query_arg($params, $src);
								$iframe = str_replace($src, '', $iframe);
								
								// Add extra attributes to iframe HTML.
								$attributes = 'frameborder="0"';
								$iframe = str_replace('></iframe>', ' data-src="' . $new_src . '"' . $attributes . ' class="lazy-youtube"></iframe>', $iframe);
								
								// Display customized HTML.
								echo '<div class="swiper-slide grid-x align-middle align-center" data-image="image-' . esc_attr($si) . '" data-swiper-slide-index="' .  esc_attr( $si ) . '">';
								echo '<div class="responsive-embed-wrapper grid-x align-center align-middle">';
								echo '<div class="responsive-embed widescreen">';
								echo $iframe;
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}?>
						<?php $si++; endforeach;?>
					</div>
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