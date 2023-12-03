<?php
$fullwidth_video = get_sub_field('fullwidth_video') ?? null;
?>
<?php if( !empty($fullwidth_video) ):?>
<section class="module fullwidth-video">
	<?php
	
	// Load value.
	$iframe = $fullwidth_video['video_url'];
	
	// Use preg_match to find iframe src.
	preg_match('/src="(.+?)"/', $iframe, $matches);
	$src = $matches[1];
	
	// Add extra parameters to src and replace HTML.
	$params = array(
		'controls'  => 1,
		'hd'        => 1,
		'autohide'  => 1
	);
	$new_src = add_query_arg($params, $src);
	$iframe = str_replace($src, $new_src, $iframe);
	
	// Add extra attributes to iframe HTML.
	$attributes = 'frameborder="0"';
	$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
	
	// Display customized HTML.
	echo '<div class="responsive-embed widescreen">';
	echo $iframe;
	echo '</div>';
	?>
</section>
<?php endif;?>