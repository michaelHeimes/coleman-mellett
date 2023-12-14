<?php
$fullwidth_video = get_sub_field('fullwidth_video') ?? null;
?>
<?php if( !empty($fullwidth_video) ):?>
<section class="module fullwidth-video">
	<?php
	
	$youtube_url =  $fullwidth_video['video_url'];	
	
	if($youtube_url):
	
	$videoId = '';
	$pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
	preg_match($pattern, $youtube_url, $matches);
	
	if (isset($matches[1])) {
		$videoId = $matches[1];
	}						
	
	$thumbnailUrl = 'https://i3.ytimg.com/vi_webp/' . $videoId . '/maxresdefault.webp';
	
	// Load value.
	$iframe = $youtube_url;
	
	// Use preg_match to find iframe src.
	preg_match('/src="(.+?)"/', $iframe, $matches);
	$src = $matches[1];
	
	// Add extra parameters to src and replace HTML.
	$params = array(
		'controls'  	 => 1,
		'hd'        	 => 1,
		'autohide'  	 => 1,
		'enablejsapi'    => 1,
		'rel' 			 => 0,
	);
	$new_src = add_query_arg($params, $src);
	$iframe = str_replace($src, $new_src, $iframe);
	
	// Add extra attributes to iframe HTML.
	$attributes = 'frameborder="0"';
	$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);?>
	
	<div class="single-video-wrap video-wrap has-mask responsive-embed widescreen">
	<?= $iframe;?>
	<button class="video-mask">
		<img src="<?=$thumbnailUrl;?>">
		<svg width="119" height="138" viewBox="0 0 119 138" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M119 69L0.499994 137.416L0.5 0.583987L119 69Z" fill="white"/></svg>
	</button> 
	</div>
	<?php endif;?>
	
</section>
<?php endif;?>