<?php
$home_hero = get_sub_field('home_hero') ?? null;
$background_color = $home_hero['background_color'] ?? null;
$title = $home_hero['title' ?? null];
$image = $home_hero['image'] ?? null;
$intro_copy = $home_hero['intro_copy'] ?? null;
$tagline = $home_hero['tagline'] ?? null;
?>
<section class="home-hero">
	<div class="top relative bg-<?=$background_color;?>">
		<?php if( !empty( $image ) ) {
			$imgID = $image['ID'];
			$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
			$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit", "alt"=>$img_alt] );
			echo '<div class="img-wrap has-object-fit">';
			echo $img;
			echo '</div>';
		}?>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="left cell small-12 medium-6">
					<?php if( !empty( $title ) ):?>
						<h1><?= $title;?></h1>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<?php if( !empty($intro_copy) || !empty($tagline) ):?>
	<div class="bottom">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<?php if( !empty($intro_copy) ):?>
					<div class="cell small-12 medium-5 grid-x">
						<p><?= $intro_copy;?></p>
					</div>
				<?php endif;?>
				<?php if( !empty($tagline) ):?>
					<div class="cell small-10 small-offset-2 medium-7 medium-offset-0 grid-x align-center">
						<div class="inner relative has-bg overflow-right grid-x align-middle w-100">
							<div class="bg bg-green"></div>
							<h2 class="relative text-center"><?= $tagline;?></h2>
						</div>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
	<?php endif;?>
</section>