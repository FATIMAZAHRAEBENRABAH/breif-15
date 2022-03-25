<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

unitravel_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'classie', unitravel_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'imagesloaded');
wp_enqueue_script( 'masonry');
wp_enqueue_script( 'unitravel-gallery-script', unitravel_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$unitravel_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$unitravel_sticky_out = is_array($unitravel_stickies) && count($unitravel_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$unitravel_cat = unitravel_get_theme_option('parent_cat');
	$unitravel_post_type = unitravel_get_theme_option('post_type');
	$unitravel_taxonomy = unitravel_get_post_type_taxonomy($unitravel_post_type);
	$unitravel_show_filters = unitravel_get_theme_option('show_filters');
	$unitravel_tabs = array();
	if (!unitravel_is_off($unitravel_show_filters)) {
		$unitravel_args = array(
			'type'			=> $unitravel_post_type,
			'child_of'		=> $unitravel_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $unitravel_taxonomy,
			'pad_counts'	=> false
		);
		$unitravel_portfolio_list = get_terms($unitravel_args);
		if (is_array($unitravel_portfolio_list) && count($unitravel_portfolio_list) > 0) {
			$unitravel_tabs[$unitravel_cat] = esc_html__('All', 'unitravel');
			foreach ($unitravel_portfolio_list as $unitravel_term) {
				if (isset($unitravel_term->term_id)) $unitravel_tabs[$unitravel_term->term_id] = $unitravel_term->name;
			}
		}
	}
	if (count($unitravel_tabs) > 0) {
		$unitravel_portfolio_filters_ajax = true;
		$unitravel_portfolio_filters_active = $unitravel_cat;
		$unitravel_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters unitravel_tabs unitravel_tabs_ajax">
			<ul class="portfolio_titles unitravel_tabs_titles">
				<?php
				foreach ($unitravel_tabs as $unitravel_id=>$unitravel_title) {
					?><li><a href="<?php echo esc_url(unitravel_get_hash_link(sprintf('#%s_%s_content', $unitravel_portfolio_filters_id, $unitravel_id))); ?>" data-tab="<?php echo esc_attr($unitravel_id); ?>"><?php echo esc_html($unitravel_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$unitravel_ppp = unitravel_get_theme_option('posts_per_page');
			if (unitravel_is_inherit($unitravel_ppp)) $unitravel_ppp = '';
			foreach ($unitravel_tabs as $unitravel_id=>$unitravel_title) {
				$unitravel_portfolio_need_content = $unitravel_id==$unitravel_portfolio_filters_active || !$unitravel_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $unitravel_portfolio_filters_id, $unitravel_id)); ?>"
					class="portfolio_content unitravel_tabs_content"
					data-blog-template="<?php echo esc_attr(unitravel_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(unitravel_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($unitravel_ppp); ?>"
					data-post-type="<?php echo esc_attr($unitravel_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($unitravel_taxonomy); ?>"
					data-cat="<?php echo esc_attr($unitravel_id); ?>"
					data-parent-cat="<?php echo esc_attr($unitravel_cat); ?>"
					data-need-content="<?php echo (false===$unitravel_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($unitravel_portfolio_need_content) 
						unitravel_show_portfolio_posts(array(
							'cat' => $unitravel_id,
							'parent_cat' => $unitravel_cat,
							'taxonomy' => $unitravel_taxonomy,
							'post_type' => $unitravel_post_type,
							'page' => 1,
							'sticky' => $unitravel_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		unitravel_show_portfolio_posts(array(
			'cat' => $unitravel_cat,
			'parent_cat' => $unitravel_cat,
			'taxonomy' => $unitravel_taxonomy,
			'post_type' => $unitravel_post_type,
			'page' => 1,
			'sticky' => $unitravel_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>