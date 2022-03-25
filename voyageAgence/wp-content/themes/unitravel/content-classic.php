<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_blog_style = explode('_', unitravel_get_theme_option('blog_style'));
$unitravel_columns = empty($unitravel_blog_style[1]) ? 2 : max(2, $unitravel_blog_style[1]);
$unitravel_expanded = !unitravel_sidebar_present() && unitravel_is_on(unitravel_get_theme_option('expand_content'));
$unitravel_post_format = get_post_format();
$unitravel_post_format = empty($unitravel_post_format) ? 'standard' : str_replace('post-format-', '', $unitravel_post_format);
$unitravel_animation = unitravel_get_theme_option('blog_animation');

?><div class="<?php echo esc_attr($unitravel_blog_style[0] == 'classic') ? 'column' : 'masonry_item masonry_item'; ?>-1_<?php echo esc_attr($unitravel_columns); ?>"><article id="post-<?php the_ID(); ?>"
	<?php post_class( 'post_item post_format_'.esc_attr($unitravel_post_format)
					. ' post_layout_classic post_layout_classic_'.esc_attr($unitravel_columns)
					. ' post_layout_'.esc_attr($unitravel_blog_style[0]) 
					. ' post_layout_'.esc_attr($unitravel_blog_style[0]).'_'.esc_attr($unitravel_columns)
					); ?>
	<?php echo (!unitravel_is_off($unitravel_animation) ? ' data-animation="'.esc_attr(unitravel_get_animation_classes($unitravel_animation)).'"' : ''); ?>
	>

	<?php

	// Featured image
	unitravel_show_post_featured( array( 'thumb_size' => unitravel_get_thumb_size($unitravel_blog_style[0] == 'classic'
													? (strpos(unitravel_get_theme_option('body_style'), 'full')!==false 
															? ( $unitravel_columns > 2 ? 'big' : 'huge' )
															: (	$unitravel_columns > 2
																? ($unitravel_expanded ? 'med' : 'small')
																: ($unitravel_expanded ? 'big' : 'med')
																)
														)
													: (strpos(unitravel_get_theme_option('body_style'), 'full')!==false 
															? ( $unitravel_columns > 2 ? 'masonry-big' : 'full' )
															: (	$unitravel_columns <= 2 && $unitravel_expanded ? 'masonry-big' : 'masonry')
														)
								) ) );

	if ( !in_array($unitravel_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('unitravel_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('unitravel_action_before_post_meta'); 

			// Post meta
			unitravel_show_post_meta(array(
				'categories' => false,
				'date' => true,
				'edit' => $unitravel_columns < 3,
				'seo' => false,
				'share' => false,
				'counters' => 'comments',
				)
			);
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$unitravel_show_learn_more = false;
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($unitravel_post_format, array('link', 'aside', 'status', 'quote'))) {
				the_content();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($unitravel_post_format, array('link', 'aside', 'status', 'quote'))) {
			unitravel_show_post_meta(array(
				'share' => false,
				'counters' => 'comments'
				)
			);
		}
		// More button
		if ( $unitravel_show_learn_more ) {
			?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'unitravel'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>