<?php
$store_cta = get_sub_field('store_cta') ?? null;
$rtp_field = $store_cta['remove_top_padding'] ?? null;
$rbp_field = $store_cta['remove_bottom_padding'] ?? null;
$background_color = $store_cta['background_color'] ?? null;
$left = $store_cta['left'] ?? null;
$right = $store_cta['right'] ?? null;

$rtp = '';
$rbp = '';

if( $rtp_field == 'true' ) {
	$rtp = 'rtp';
}

if( $rbp_field == 'true' ) {
	$rbp = 'rbp';
}

?>
<section class="module store-cta <?= $rtp;?> <?=$rbp;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php if( !empty($left) ):
				$background_color = $left['background_color'];
				$copy = $left['copy'];
				$button_link = $left['button_link'];
			?>
			<div class="left cell small-12<?php if( !empty($right['image']) ){ echo ' medium-7'; };?> has-bg overflow-left">
				<div class="bg bg-<?= esc_attr($background_color);?>"></div>
				<div class="inner h-100 grid-x align-middle">
					<div class="relative">
						<?php if( !empty($copy ) ) {
							echo $copy;
						}?>
						<?php 
						$link = $left['button_link'];
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
						<div class="btn-wrap">
							<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endif;?>
			<?php if( !empty($right['image']) ):
				$background_color = $right['background_color'];
				$image = $right['image'];	
			?>
				<div class="right cell small-12 medium-5 has-bg overflow-right">
					<div class="bg bg-<?= esc_attr($background_color);?>"></div>
					<?php
						$imgID = $image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="inner relative h-100 grid-x align-middle">';
						echo '<div class="img-wrap">';
						echo $img;
						echo '</div>';
						echo '</div>';
					?>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>
