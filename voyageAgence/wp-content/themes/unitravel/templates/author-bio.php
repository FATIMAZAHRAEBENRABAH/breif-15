<?php
/**
 * The template to display the Author bio
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */
?>

<div class="author_info author vcard" itemprop="author" itemscope itemtype="//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php 
		$unitravel_mult = unitravel_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 90*$unitravel_mult );
		?>
	</div><!-- .author_avatar -->

    <div class="author_description">
        <div class="author_subtitle"><?php echo wp_kses_data(sprintf(__('About Author', 'unitravel'))); ?></div>
        <h5 class="author_title" itemprop="name"><?php echo wp_kses_data(sprintf(__('About %s', 'unitravel'), '<span class="fn">'.get_the_author().'</span>')); ?></h5>
        <div class="author_bio" itemprop="description">
            <?php echo wpautop(get_the_author_meta( 'description' )); ?>
        </div><!-- .author_bio -->

    </div><!-- .author_description -->

</div><!-- .author_info -->
