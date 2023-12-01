<?php
$section_header = get_sub_field('section_header') ?? null;
$alignment = $section_header['alignment'] ?? null;
$background_color = $section_header['background_color'] ?? null;
$width = $section_header['width'] ?? null;
$header_text = $section_header['header_text'] ?? null;
$add_handwriting = $section_header['add_handwriting'] ?? null;

if($add_handwriting == 'true') {
	$handwriting_image = $section_header['handwriting_image'] ?? null;
	$img_position = $section_header['image_position'] ?? null;
}

?>
<?php if( !empty($header_text) ):?>
<section class="section-header">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-<?= esc_attr($alignment);?> relative<?php if($add_handwriting == 'true') { echo ' has-hwi'; };?>">
			<?php if( $add_handwriting == 'true' && !empty( $handwriting_image ) ) {
				$imgID = $handwriting_image['ID'];
				$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
				$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
				echo '<div class="hwi-wrap position-' . $img_position . '">';
				echo $img;
				echo '</div>';
			}?>
			<div class="left cell small-10<?php if( $alignment == 'right' ) { echo ' small-10 small-offset-2'; };?> medium-<?= esc_attr($width);?>">
				<div class="inner has-bg overflow-<?= esc_attr($alignment);?>">
					<div class="bg bg-<?= esc_attr($background_color);?>"></div>
					<h2 class="relative"><?= esc_attr($header_text);?></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;?>