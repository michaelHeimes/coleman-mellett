<?php
function add_custom_sizes() {
	add_image_size( 'two-col-module-1x', 547, 547, false );
	add_image_size( 'two-col-module-2x', 1094, 1094, false );
}
add_action('after_setup_theme','add_custom_sizes');