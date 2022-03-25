<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the WPBakery Page Builder to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$unitravel_content = '';
$unitravel_blog_archive_mask = '%%CONTENT%%';
$unitravel_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $unitravel_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($unitravel_content = apply_filters('the_content', get_the_content())) != '') {
		if (($unitravel_pos = strpos($unitravel_content, $unitravel_blog_archive_mask)) !== false) {
			$unitravel_content = preg_replace('/(\<p\>\s*)?'.$unitravel_blog_archive_mask.'(\s*\<\/p\>)/i', $unitravel_blog_archive_subst, $unitravel_content);
		} else
			$unitravel_content .= $unitravel_blog_archive_subst;
		$unitravel_content = explode($unitravel_blog_archive_mask, $unitravel_content);
	}
}

// Prepare args for a new query
$unitravel_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$unitravel_args = unitravel_query_add_posts_and_cats($unitravel_args, '', unitravel_get_theme_option('post_type'), unitravel_get_theme_option('parent_cat'));
$unitravel_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($unitravel_page_number > 1) {
	$unitravel_args['paged'] = $unitravel_page_number;
	$unitravel_args['ignore_sticky_posts'] = true;
}
$unitravel_ppp = unitravel_get_theme_option('posts_per_page');
if ((int) $unitravel_ppp != 0)
	$unitravel_args['posts_per_page'] = (int) $unitravel_ppp;
// Make a new query
query_posts( $unitravel_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($unitravel_content) && count($unitravel_content) == 2) {
	set_query_var('blog_archive_start', $unitravel_content[0]);
	set_query_var('blog_archive_end', $unitravel_content[1]);
}

get_template_part('index');
?>