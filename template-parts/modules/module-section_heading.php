<?php
$section_heading = get_sub_field('section_heading') ?? null;
$alignment = $section_heading['alignment'] ?? null;
$background_color = $section_heading['background_color'] ?? null;
$width = $section_heading['width'] ?? null;
$heading = $section_heading['heading'] ?? null;
$handwriting_image = $section_heading['handwriting_image'] ?? null;
?>
<?php if( !empty($heading) ):?>
<section class="section-heading">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-<?= esc_attr($alignment);?>">
			<div class="left cell small-12 medium-<?= esc_attr($width);?>">
				<div class="inner has-bg overflow-<?= esc_attr($alignment);?>">
					<div class="bg bg-<?= esc_attr($background_color);?>"></div>
					<h2 class="relative"><?= esc_attr($heading);?></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;?>