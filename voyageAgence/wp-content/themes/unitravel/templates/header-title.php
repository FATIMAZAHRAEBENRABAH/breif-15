<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

// Page (category, tag, archive, author) title

if ( unitravel_need_page_title() ) {
	unitravel_sc_layouts_showed('title', true);
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title">
						<?php

						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$unitravel_blog_title = unitravel_get_blog_title();
							$unitravel_blog_title_text = $unitravel_blog_title_class = $unitravel_blog_title_link = $unitravel_blog_title_link_text = '';
							if (is_array($unitravel_blog_title)) {
								$unitravel_blog_title_text = $unitravel_blog_title['text'];
								$unitravel_blog_title_class = !empty($unitravel_blog_title['class']) ? ' '.$unitravel_blog_title['class'] : '';
								$unitravel_blog_title_link = !empty($unitravel_blog_title['link']) ? $unitravel_blog_title['link'] : '';
								$unitravel_blog_title_link_text = !empty($unitravel_blog_title['link_text']) ? $unitravel_blog_title['link_text'] : '';
							} else
								$unitravel_blog_title_text = $unitravel_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($unitravel_blog_title_class); ?>"><?php
								$unitravel_top_icon = unitravel_get_category_icon();
								if (!empty($unitravel_top_icon)) {
									$unitravel_attr = unitravel_getimagesize($unitravel_top_icon);
									?><img src="<?php echo esc_url($unitravel_top_icon); ?>" alt="'.esc_attr__('icon', 'unitravel').'" <?php if (!empty($unitravel_attr[3])) unitravel_show_layout($unitravel_attr[3]);?>><?php
								}
								echo wp_kses_post($unitravel_blog_title_text);
							?></h1>
							<?php
							if (!empty($unitravel_blog_title_link) && !empty($unitravel_blog_title_link_text)) {
								?><a href="<?php echo esc_url($unitravel_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($unitravel_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'unitravel_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>