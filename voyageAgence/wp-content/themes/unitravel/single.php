<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

get_header();

while ( have_posts() ) { the_post();

	get_template_part( 'content', get_post_format() );

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
?>