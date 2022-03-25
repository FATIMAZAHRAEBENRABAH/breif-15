<?php
/**
 * The default template to display the content of the single post, page or attachment
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post_item_single post_type_'.esc_attr(get_post_type()) 
												. ' post_format_'.esc_attr(str_replace('post-format-', '', get_post_format())) 
												. ' itemscope'
												); ?>
		itemscope itemtype="//schema.org/<?php echo esc_attr(is_single() ? 'BlogPosting' : 'Article'); ?>">
	<?php

    ?>
    <div class="post_header entry-header">
        <?php
        // Title and post meta

        // Post meta
        unitravel_show_post_meta(array(
                'seo' => unitravel_is_on(unitravel_get_theme_option('seo_snippets')),
                'categories' => false,
                'date' => true,
                'edit' => false,
                'author' => true,
                'share' => false,
                'counters' => 'views,comments'	//comments,likes,views - comma separated in any combination
            )
        );
        ?>
    </div><!-- .post_header -->
    <?php

	// Structured data snippets
	if (unitravel_is_on(unitravel_get_theme_option('seo_snippets'))) {
		?>
		<div class="structured_data_snippets">
			<meta itemprop="headline" content="<?php the_title_attribute(); ?>">
			<meta itemprop="datePublished" content="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
			<meta itemprop="dateModified" content="<?php echo esc_attr(get_the_modified_date('Y-m-d')); ?>">
			<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo esc_url(get_the_permalink()); ?>" content="<?php the_title_attribute(); ?>"/>
			<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
				<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					<?php 
					$unitravel_logo_image = unitravel_get_retina_multiplier(2) > 1 
										? unitravel_get_theme_option( 'logo_retina' )
										: unitravel_get_theme_option( 'logo' );
					if (!empty($unitravel_logo_image)) {
						$unitravel_attr = unitravel_getimagesize($unitravel_logo_image);
						?>
						<img itemprop="url" src="<?php echo esc_url($unitravel_logo_image); ?>">
						<meta itemprop="width" content="<?php echo esc_attr($unitravel_attr[0]); ?>">
						<meta itemprop="height" content="<?php echo esc_attr($unitravel_attr[1]); ?>">
						<?php
					}
					?>
				</div>
				<meta itemprop="name" content="<?php echo esc_attr(get_bloginfo( 'name' )); ?>">
				<meta itemprop="telephone" content="">
				<meta itemprop="address" content="">
			</div>
		</div>
		<?php
	}
	
	// Featured image
	if ( !unitravel_sc_layouts_showed('featured'))
		unitravel_show_post_featured();

	// Post content
	?>
	<div class="post_content entry-content" itemprop="articleBody">
		<?php
			the_content( );

			wp_link_pages( array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'unitravel' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'unitravel' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

        // Taxonomies and share
        if ( is_single() && !is_attachment() ) {
            ?>
            <div class="post_meta post_meta_single">
					<span class="post_meta_item post_tags"><?php
                        $cats = get_post_type()=='post' ? get_the_category_list(', ') : apply_filters('unitravel_filter_get_post_categories', '');
                        if (!empty($cats)) {
                            ?>

                            <span class="post_meta_label"><?php esc_html_e('Categories:', 'unitravel'); ?></span> <?php unitravel_show_layout($cats); ?><br>

                            <?php
                        }
                        the_tags( '<span class="post_meta_label">'.esc_html__('Tags:', 'unitravel').'</span> ', ', ', '' );
                        ?></span><?php
                // Share
                unitravel_show_share_links(array(
                    'type' => 'block',
                    'caption' => '',
                    'before' => '<span class="post_meta_item post_share">',
                    'after' => '</span>'
                ));
                ?>
            </div>
            <?php
        }
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && !is_attachment() && get_the_author_meta( 'description' ) ) {
			get_template_part( 'templates/author-bio' );
		}
	?>
</article>
