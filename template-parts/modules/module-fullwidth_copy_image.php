<?php
$fullwidth_copy_image = get_sub_field('fullwidth_copy_image') ?? null;
$background_color = $fullwidth_copy_image['background_color'] ?? null;
$copy = $fullwidth_copy_image['copy'] ?? null;
$copy_width = $fullwidth_copy_image['copy_width'] ?? null;
$image = $fullwidth_copy_image['image'] ?? null;
$image_orientation = $fullwidth_copy_image['image_orientation'] ?? null;
?>
<section class="fullwidth-copy-img relative width-<?=$copy_width;?> orientation-<?=$image_orientation;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 tablet-<?=$copy_width;?> has-bg overflow-left">
				<div class="bg bg-<?= $background_color;?>"></div>
				<div class="relative copy-wrap">
					<?= $copy;?>
				</div>
			</div>
		</div>
	</div>
	<?php if( !empty( $image ) ) {
		$imgID = $image['ID'];
		$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
		$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
		echo '<div class="img-wrap">';
		echo $img;
		echo '</div>';
	}?>
</section>
