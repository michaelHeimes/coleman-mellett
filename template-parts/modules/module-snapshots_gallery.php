<?php
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
<section class="snapshots-gallery <?= $rtp;?> <?=$rbp;?>">
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
										<div class="img-wrap">
											<?php
												$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
												$img = wp_get_attachment_image( $imgID, 'snapshot-image-thumb-2x', false, [ "class" => "", "alt"=>$img_alt] );
												echo $img;
											?>
										</div>
									</div>
							<?php endif;?>
							
						<?php $i++; endforeach;?>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
</section>
