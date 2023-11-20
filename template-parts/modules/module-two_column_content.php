<?php
$two_col = get_sub_field('two-column_content') ?? null;
$top_section_when_stacked = $two_col['background_color'] ?? null;
$layout = $two_col['layout'] ?? null;
$left_column = $two_col['left_column'] ?? null;
$right_column = $two_col['right_column'] ?? null;

if( $layout == '6-6' ) {
	$left_layout = ' medium-6';
	$right_layout = ' medium-6';
}

if( $layout == '5-1-7' ) {
	$left_layout = ' medium-6 tablet-5';
	$right_layout = ' medium-6 tablet-6 tablet-offset-1';
}

if( $layout == '7-1-5' ) {
	$left_layout = ' medium-6 tablet-6';
	$right_layout = ' medium-6 tablet-5 tablet-offset-1';
}

?>
<section class="module two-column_content">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php if( !empty($left_column) ):
				$content_type = $left_column['content_type'] ?? null;
				$left_copy = $left_column['copy'] ?? null;
				$image = $left_column['image'] ?? null;
				$chandrwriting_image_clone = $left_column['handrwriting_image_clone'] ?? null;	
			?>
			<div class="left small-12<?=$left_layout;?>">
				<?php if( $content_type == 'copy' ) :?>
					<div class="copy-wrap">
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
					echo '<div class="img-wrap">';
					echo $img;
					echo '</div>';
				}?>
			</div>
			<?php endif;?>
			<?php if( !empty($right_column) ):
				$content_type = $right_column['content_type'] ?? null;
				$copy = $right_column['copy'] ?? null;
				$image = $right_column['image'] ?? null;
				$chandrwriting_image_clone = $right_column['handrwriting_image_clone'] ?? null;	
			?>
			<div class="right small-12<?=$right_layout;?>">
				<?php if( $content_type == 'copy' ) :?>
					<div class="copy-wrap">
						<?= $copy;?>
					</div>
				<?php endif;?>
				<?php if( $content_type == 'image' && !empty( $image ) ) {
					$imgID = $image['ID'];
					$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
					$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
					echo '<div class="img-wrap">';
					echo $img;
					echo '</div>';
				}?>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>
