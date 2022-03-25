<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

unitravel_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	?><div class="posts_container"><?php
	
	$unitravel_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$unitravel_sticky_out = is_array($unitravel_stickies) && count($unitravel_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($unitravel_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	while ( have_posts() ) { the_post(); 
		if ($unitravel_sticky_out && !is_sticky()) {
			$unitravel_sticky_out = false;
			?></div><?php
		}
		get_template_part( 'content', $unitravel_sticky_out && is_sticky() ? 'sticky' : 'excerpt' );
	}
	if ($unitravel_sticky_out) {
		$unitravel_sticky_out = false;
		?></div><?php
	}
	
	?></div><?php

	unitravel_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>