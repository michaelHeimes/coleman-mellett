<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="entry-content">
	       <?php get_template_part('template-parts/modules');?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
