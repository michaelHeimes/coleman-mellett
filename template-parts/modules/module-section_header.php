<?php
$section_header = get_sub_field('section_header') ?? null;
$alignment = $section_header['alignment'] ?? null;
$background_color = $section_header['background_color'] ?? null;
$width = $section_header['width'] ?? null;
$header_text = $section_header['header_text'] ?? null;
$handwriting_image = $section_header['handwriting_image'] ?? null;
?>
<?php if( !empty($header_text) ):?>
<section class="section-header">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-<?= esc_attr($alignment);?>">
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