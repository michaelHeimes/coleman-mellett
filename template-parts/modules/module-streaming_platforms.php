<?php
$streaming_platforms = get_sub_field('streaming_platforms') ?? null;
$heading = $streaming_platforms['heading'] ?? null;
$platforms = $streaming_platforms['platforms'] ?? null;
?>
<section class="module streaming-platforms">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center align-middle">
			<?php if( !empty($heading) ):?>
				<div class="left cell small-12 medium-6">
					<div class="inner has-bg overflow-left">
						<h2 class="relative"><?= $heading;?></h2>
					</div>
				</div>
			<?php endif;?>
			<?php if( !empty($platforms) ):?>
				<div class="right cell small-12 medium-6 tablet-5 tablet-offset-1">
					<div class="icon-links grid-x grid-padding-x">
						<?php foreach($platforms as $platform):
							$icon = $platform['icon'];	
							$url = $platform['url'];	
						?>
							<div class="cell shrink">
								<a href="<?php echo esc_url($url);?>" target="_blank">
									<?php if( !empty( $icon ) ) {
										$imgID = $icon['ID'];
										$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
										$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
										echo '<div class="icon-wrap">';
										echo $img;
										echo '</div>';
									}?>
								</a>
							</div>
						<?php endforeach;?>
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>