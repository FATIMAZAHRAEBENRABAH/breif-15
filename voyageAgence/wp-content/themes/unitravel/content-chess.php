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
$unitravel_columns = empty($unitravel_blog_style[1]) ? 1 : max(1, $unitravel_blog_style[1]);
$unitravel_expanded = !unitravel_sidebar_present() && unitravel_is_on(unitravel_get_theme_option('expand_content'));
$unitravel_post_format = get_post_format();
$unitravel_post_format = empty($unitravel_post_format) ? 'standard' : str_replace('post-format-', '', $unitravel_post_format);
$unitravel_animation = unitravel_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_chess post_layout_chess_'.esc_attr($unitravel_columns).' post_format_'.esc_attr($unitravel_post_format) ); ?>
	<?php echo (!unitravel_is_off($unitravel_animation) ? ' data-animation="'.esc_attr(unitravel_get_animation_classes($unitravel_animation)).'"' : ''); ?>
	>

	<?php
	// Add anchor
	if ($unitravel_columns == 1 && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="post_'.esc_attr(get_the_ID()).'" title="'.the_title_attribute( array( 'echo' => false ) ).'"]');
	}

	// Featured image
	unitravel_show_post_featured( array(
											'class' => $unitravel_columns == 1 ? 'trx-stretch-height' : '',
											'show_no_image' => true,
											'thumb_bg' => true,
											'thumb_size' => unitravel_get_thumb_size(
																	strpos(unitravel_get_theme_option('body_style'), 'full')!==false
																		? ( $unitravel_columns > 1 ? 'huge' : 'original' )
																		: (	$unitravel_columns > 2 ? 'big' : 'huge')
																	)
											) 
										);

	?><div class="post_inner"><div class="post_inner_content"><?php 

		?><div class="post_header entry-header"><?php 
			do_action('unitravel_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			do_action('unitravel_action_before_post_meta'); 

			// Post meta
			$unitravel_post_meta = unitravel_show_post_meta(array(
									'categories' => false,
									'date' => true,
									'edit' => $unitravel_columns == 1,
									'seo' => false,
									'share' => false,
									'counters' => $unitravel_columns < 3 ? 'comments' : '',
									'echo' => false
									)
								);
			unitravel_show_layout($unitravel_post_meta);
		?></div><!-- .entry-header -->
	
		<div class="post_content entry-content">
			<div class="post_content_inner">
				<?php
				$unitravel_show_learn_more = !in_array($unitravel_post_format, array('link', 'aside', 'status', 'quote'));
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
				unitravel_show_layout($unitravel_post_meta);
			}
			// More button
			if ( $unitravel_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'unitravel'); ?></a></p><?php
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>