<?php
$logos = get_sub_field('award_logos') ?? null;
$rtp_field = $logos['remove_top_padding'] ?? null;
$rbp_field = $logos['remove_bottom_padding'] ?? null;

$rtp = '';
$rbp = '';

if( $rtp_field == 'true' ) {
	$rtp = 'rtp';
}

if( $rbp_field == 'true' ) {
	$rbp = 'rbp';
}

?>
<?php if( !empty($logos) ):?>
<section class="module award-logos <?= $rtp;?> <?=$rbp;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php 
			$images = $logos['award_logos'];
			if( $images ): ?>
				<?php foreach( $images as $image ):?>						
					<?php if( !empty( $image ) ) {
						$imgID = $image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="cell shrink">';
						echo $img;
						echo '</div>';
					}?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif;?>