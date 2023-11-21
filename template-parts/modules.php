<?php
if( have_rows('content_modules') ):
	while ( have_rows('content_modules') ) : the_row();

		if( get_row_layout() == 'home_hero' ):
			get_template_part('template-parts/modules/module', 'home_hero');
		elseif( get_row_layout() == 'section_heading' ):
			get_template_part('template-parts/modules/module', 'section_heading');
		elseif( get_row_layout() == 'two_column_content' ):
			get_template_part('template-parts/modules/module', 'two_column_content');
		elseif( get_row_layout() == 'quote' ):
		get_template_part('template-parts/modules/module', 'quote');
		elseif( get_row_layout() == 'fullwidth_copy_image' ):
		get_template_part('template-parts/modules/module', 'fullwidth_copy_image');
		elseif( get_row_layout() == 'streaming_platforms' ):
		get_template_part('template-parts/modules/module', 'streaming_platforms');
		endif;

	endwhile;
endif;
?>