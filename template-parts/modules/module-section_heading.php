<?php
$section_heading = get_sub_field('section_heading') ?? null;
$background_color = $section_heading['background_color'] ?? null;
$width = $section_heading['width'] ?? null;
$heading = $section_heading['heading'] ?? null;
$handwriting_image = $section_heading['handwriting_image'] ?? null;
?>
<?php if( !empty($heading) ):?>
<section class="section-heading">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="left cell small-12 medium-<?= $width;?>">
				<div class="inner has-bg overflow-left">
					<div class="bg bg-<?= $background_color;?>"></div>
					<h2 class="relative"><?= $heading;?></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;?>