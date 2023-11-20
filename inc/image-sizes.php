<?php
function add_custom_sizes() {
	add_image_size( 'two-col-module-1x', 559, 471, true );
	add_image_size( 'two-col-module-2x', 1118, 943, true );
}
add_action('after_setup_theme','add_custom_sizes');