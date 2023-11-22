<?php
$wysiwyg_editor = get_sub_field('wysiwyg_editor') ?? null;
$rtp_field = $wysiwyg_editor['remove_top_padding'] ?? null;
$rbp_field = $wysiwyg_editor['remove_bottom_padding'] ?? null;
$editor = $wysiwyg_editor['editor'] ?? null;

$rtp = '';
$rbp = '';

if( $rtp_field == 'true' ) {
	$rtp = 'rtp';
}

if( $rbp_field == 'true' ) {
	$rbp = 'rbp';
}

?>
<?php if( !empty($editor) ):?>
<section class="module wysiwyg-editor <?= $rtp;?> <?=$rbp;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="inner">
					<?= $editor;?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;?>