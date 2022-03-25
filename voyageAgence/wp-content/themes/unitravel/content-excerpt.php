<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_post_format = get_post_format();
$unitravel_post_format = empty($unitravel_post_format) ? 'standard' : str_replace('post-format-', '', $unitravel_post_format);
$unitravel_full_content = unitravel_get_theme_option('blog_content') != 'excerpt' || in_array($unitravel_post_format, array('link', 'aside', 'status', 'quote'));
$unitravel_animation = unitravel_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_'.esc_attr($unitravel_post_format) ); ?>
	<?php echo (!unitravel_is_off($unitravel_animation) ? ' data-animation="'.esc_attr(unitravel_get_animation_classes($unitravel_animation)).'"' : ''); ?>
	><?php

    // Title and post meta
    if (get_the_title() != '') {
        ?>
        <div class="post_header entry-header">
            <?php
            do_action('unitravel_action_before_post_title');

            // Post title
            the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

            do_action('unitravel_action_before_post_meta');

            // Post meta
            unitravel_show_post_meta(array(
                    'categories' => false,
                    'date' => true,
                    'edit' => false,
                    'author' => true,
                    'seo' => false,
                    'share' => false,
                    'counters' => 'views,comments'	//comments,likes,views - comma separated in any combination
                )
            );
            ?>
        </div><!-- .post_header --><?php
    }

	// Featured image
	unitravel_show_post_featured(array( 'thumb_size' => unitravel_get_thumb_size( strpos(unitravel_get_theme_option('body_style'), 'full')!==false ? 'full' : 'big' ) ));

	// Post content
	?><div class="post_content entry-content"><?php
		if ($unitravel_full_content) {
			// Post content area
			?><div class="post_content_inner"><?php
				the_content( '' );
			?></div><?php
			// Inner pages
			wp_link_pages( array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'unitravel' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'unitravel' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

		} else {

			$unitravel_show_learn_more = !in_array($unitravel_post_format, array('link', 'aside', 'status', 'quote'));

			// Post content area
			?><div class="post_content_inner"><?php
				if (has_excerpt()) {
					the_excerpt();
				} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
					the_content( '' );
				} else if (in_array($unitravel_post_format, array('link', 'aside', 'status', 'quote'))) {
					the_content();
				} else if (substr(get_the_content(), 0, 1)!='[') {
					the_excerpt();
				}
			?></div><?php
			// More button
			if ( $unitravel_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Learn more', 'unitravel'); ?></a></p><?php
			}

		}
	?></div><!-- .entry-content -->
</article>