<?php
$two_col = get_sub_field('two-column_content') ?? null;
$rtp_field = $two_col['remove_top_padding'] ?? null;
$rbp_field = $two_col['remove_bottom_padding'] ?? null;
$top_section_when_stacked = $two_col['top_section_when_stacked'] ?? null;
$layout = $two_col['layout'] ?? null;
$left_column = $two_col['left_column'] ?? null;
$right_column = $two_col['right_column'] ?? null;
$left_layout = '';
$right_layout = '';

$rtp = '';
$rbp = '';

if( $rtp_field == 'true' ) {
	$rtp = 'rtp';
}

if( $rbp_field == 'true' ) {
	$rbp = 'rbp';
}

if( $layout == '6-6' ) {
	$left_layout = ' medium-6';
	$right_layout = ' medium-6';
}

if( $layout == '5-1-6' ) {
	$left_layout = ' medium-6 tablet-5';
	$right_layout = ' medium-6 tablet-6 tablet-offset-1';
}

if( $layout == '6-1-5' ) {
	$left_layout = ' medium-6 tablet-6';
	$right_layout = ' medium-6 tablet-5 tablet-offset-1';
}

if( $layout == '7-5' ) {
	$left_layout = ' medium-6 tablet-7';
	$right_layout = ' medium-6 tablet-5';
}

$align_middle = '';
if (!empty($left_column) && $left_column['content_type'] == 'image' || !empty($right_column) && $right_column['content_type'] == 'image') {
	$align_middle = ' align-middle';
}
?>
<section class="module two-column-content top-stacked-<?= $top_section_when_stacked;?> <?= $rtp;?> <?=$rbp;?>">
	<div class="grid-container">
		<div class="inner grid-x grid-padding-x<?= $align_middle;?>">
			<?php if( !empty($left_column) ):
				$content_type = $left_column['content_type'] ?? null;
				$copy = $left_column['copy'] ?? null;
				$image = $left_column['image'] ?? null;
				$pull_image_left = $left_column['pull_image_to_flush_left'] ?? null;
				$add_handwriting = $left_column['add_handwriting'] ?? null;
				if($add_handwriting == 'true') {
					$handwriting_image = $left_column['handwriting_image'] ?? null;
					$img_position = $left_column['image_position'] ?? null;
				}
			?>
			<div class="left<?php if($add_handwriting == 'true') { echo ' has-hwi'; };?> cell small-12<?=$left_layout;?><?php if( $pull_image_left == 'true' ){ echo ' img-pulled-left';}?>">
				<?php if( $add_handwriting == 'true' && !empty( $handwriting_image ) ) {
					$imgID = $handwriting_image['ID'];
					$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
					$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
					echo '<div class="hwi-wrap position-' . $img_position . '">';
					echo $img;
					echo '</div>';
				}?>
				<?php if( $content_type == 'copy' ) :?>
					<div class="copy-wrap relative">
						<?= $copy;?>
					</div>
				<?php endif;?>
				<?php if( $content_type == 'image' && !empty( $image ) ) {
					
					$size2x = 'two-col-module-2x';
					$size1x = 'two-col-module-1x';
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
					echo '<div class="img-wrap relative">';
					echo $img;
					echo '</div>';
				}?>
			</div>
			<?php endif;?>
			<?php if( !empty($right_column) ):
				$content_type = $right_column['content_type'] ?? null;
				$copy = $right_column['copy'] ?? null;
				$image = $right_column['image'] ?? null;
				$pull_image_right = $right_column['pull_image_to_flush_right'] ?? null;
				$add_handwriting = $right_column['add_handwriting'] ?? null;
				if($add_handwriting == 'true') {
					$handwriting_image = $right_column['handwriting_image'] ?? null;
					$img_position = $right_column['image_position'] ?? null;
				}
			?>
			<div class="right<?php if($add_handwriting == 'true') { echo ' has-hwi'; };?> cell small-12<?=$right_layout;?><?php if( $pull_image_right == 'true' ){ echo ' img-pulled-right';}?>">
				<?php if( $add_handwriting == 'true' && !empty( $handwriting_image ) ) {
					$imgID = $handwriting_image['ID'];
					$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
					$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
					echo '<div class="hwi-wrap position-' . $img_position . '">';
					echo $img;
					echo '</div>';
				}?>
				<?php if( $content_type == 'copy' ) :?>
					<div class="copy-wrap relative">
						<?= $copy;?>
					</div>
				<?php endif;?>
				<?php if( $content_type == 'image' && !empty( $image ) ) {
					$imgID = $image['ID'];
					$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
					$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
					echo '<div class="img-wrap relative">';
					echo $img;
					echo '</div>';
				}?>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>
