<?php
function add_custom_sizes() {
	add_image_size( 'two-col-module-1x', 547, 547, false );
	add_image_size( 'two-col-module-2x', 1094, 1094, false );
	
	add_image_size( 'image-gallery-slider-1x', 551, 460, false );
	add_image_size( 'image-gallery-slider-2x', 1102, 920, false );
	
	add_image_size( 'image-gallery-slider-2x', 1102, 920, false );
	
	add_image_size( 'snapshots-images-1_7-2x', 1482, 724, false );
	add_image_size( 'snapshots-images-2_6-2x', 724, 724, false );
	add_image_size( 'snapshots-images-3_4_5-2x', 724, 7536, false );
	
}
add_action('after_setup_theme','add_custom_sizes');