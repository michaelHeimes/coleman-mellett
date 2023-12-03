<?php
if( have_rows('content_modules') ):
	while ( have_rows('content_modules') ) : the_row();
		
		$root = 'template-parts/modules/module';

		if( get_row_layout() == 'home_hero' ):
			get_template_part($root, 'home_hero');
		elseif( get_row_layout() == 'page_banner' ):
		get_template_part($root, 'page_banner');
		elseif( get_row_layout() == 'section_header' ):
			get_template_part($root, 'section_header');
		elseif( get_row_layout() == 'two_column_content' ):
			get_template_part($root, 'two_column_content');
		elseif( get_row_layout() == 'quote' ):
			get_template_part($root, 'quote');
		elseif( get_row_layout() == 'fullwidth_copy_image' ):
			get_template_part($root, 'fullwidth_copy_image');
		elseif( get_row_layout() == 'streaming_platforms' ):
			get_template_part($root, 'streaming_platforms');
		elseif( get_row_layout() == 'wysiwyg_editor' ):
			get_template_part($root, 'wysiwyg_editor');
		elseif( get_row_layout() == 'media_slider' ):
			get_template_part($root, 'media_slider');
		elseif( get_row_layout() == 'store_cta' ):
			get_template_part($root, 'store_cta');
		elseif( get_row_layout() == 'where_to_listen_cta' ):
			get_template_part($root, 'where_to_listen_cta');
		elseif( get_row_layout() == 'snapshots_gallery' ):
			get_template_part($root, 'snapshots_gallery');
		elseif( get_row_layout() == 'award_logos' ):
			get_template_part($root, 'award_logos');
		elseif( get_row_layout() == 'fullwidth_video' ):
			get_template_part($root, 'fullwidth_video');
		elseif( get_row_layout() == 'photo_gallery' ):
			get_template_part($root, 'photo_gallery');
		elseif( get_row_layout() == 'video_gallery' ):
			get_template_part($root, 'video_gallery');
		endif;

	endwhile;
endif;
?>