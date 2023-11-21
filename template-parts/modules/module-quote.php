<?php
$quote = get_sub_field('quote') ?? null;
$quote_text = $quote['quote'] ?? null;
$author = $quote['author'] ?? null;
$add_handwriting = $quote['add_handwriting'] ?? null;
if($add_handwriting == 'true') {
	$handwriting_image = $quote['handwriting_image'] ?? null;
	$img_position = $quote['image_position'] ?? null;
}
?>
<?php if( !empty($quote_text) ):?>
<section class="module quote">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="left cell small-12">
				<div class="inner relative<?php if($add_handwriting == 'true') { echo ' has-hwi'; };?>">	
					<?php if( $add_handwriting == 'true' && !empty( $handwriting_image ) ) {
						$imgID = $handwriting_image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="hwi-wrap position-' . $img_position . '">';
						echo $img;
						echo '</div>';
					}?>
					<?php if( !empty($quote_text) ):?>
						<h2 class="relative"><?= $quote_text;?></h2>
					<?php endif;?>
					<?php if( !empty($author) ):?>
						<h5 class="relative"><?= $author;?></h5>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;?>