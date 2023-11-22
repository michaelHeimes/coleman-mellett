<?php
$page_banner = get_sub_field('page_banner') ?? null;
$background_color = $page_banner['background_color'] ?? null;
$title = $page_banner['title'] ?? null;
?>
<?php if( !empty($title) ):?>
<section class="page-banner has-bg">
	<div class="bg bg-<?= esc_attr($background_color);?>"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<h1 class="relative"><?= esc_attr($title);?></h1>
			</div>
		</div>
	</div>
</section>
<?php endif;?>