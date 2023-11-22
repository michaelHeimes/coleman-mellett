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
					<div class="images-wrap grid-x grid-padding-x">
						<?php $i = 1; foreach($images as $image):?>
							
							<?php if( !empty($image) ):?>
							
								<?php if( $i == 1 || $i == 7 ):?>
									<div class="cell small-8 img-wrap seq-<?=$i;?>">
										<?php
											$imgID = $image['ID'];
											$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
											$img = wp_get_attachment_image( $imgID, 'snapshots-images-1_7-2x', false, [ "class" => "", "alt"=>$img_alt] );
											echo $img;
										?>
									</div>
								<?php endif;?>
								
								<?php if( $i == 2 || $i == 6 ):?>
									<div class="cell small-4 img-wrap seq-<?=$i;?>">
										<?php
											$imgID = $image['ID'];
											$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
											$img = wp_get_attachment_image( $imgID, 'snapshots-images-2_6-2x', false, [ "class" => "", "alt"=>$img_alt] );
											echo $img;
										?>
									</div>
								<?php endif;?>
								
								<?php if( $i == 3 || $i == 4 || $i == 5 ):?>
									<div class="cell small-4 img-wrap seq-<?=$i;?>">
										<?php
											$imgID = $image['ID'];
											$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
											$img = wp_get_attachment_image( $imgID, 'snapshots-images-3_4_5-2x', false, [ "class" => "", "alt"=>$img_alt] );
											echo $img;
										?>
									</div>
								<?php endif;?>
							
							<?php endif;?>
							
						<?php $i++; endforeach;?>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
</section>
