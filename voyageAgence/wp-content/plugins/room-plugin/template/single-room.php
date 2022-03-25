<?php
/**
 * Plugin support: Single
 *
 * @package WordPress
 * @subpackage Room Plugin
 * @since v1.0
 */
get_header();
    if(have_posts()) : while(have_posts()) : the_post();
        $meta = get_post_meta(get_the_ID(), '', true);
        ?><div class="room-plugin room-featured"><?php
        the_post_thumbnail( 'room-large', array(
                'alt' => get_the_title(),
                'itemprop' => 'image'
            )
        );
        ?></div><div class="room-plugin room-single-content"><h3 class="room-plugin room-single-title"><?php the_title();?></h3>
        <div class="room-plugin room-info">
            <div class="room-plugin room-info-item"><?php
                //Count of people
                if (isset($meta['room_plugin_count_guests'][0])) {
                    if (($people_count = $meta['room_plugin_count_guests'][0]) != '') {
                        ?>
                        <div class="room-plugin room-people">
                        <span class="room-plugin room-icon icon-user-1"></span> <?php echo esc_attr($people_count); ?>
                        <span class="room-plugin room-info-item-label"><?php echo esc_html__('guests','room-plugin'); ?></span>
                        </div><?php
                    }
                }
                ?></div><div class="room-plugin room-info-item"><?php
                //Count of beds
                if (isset($meta['room_plugin_count_beds'][0])) {
                    if (($beds_count = $meta['room_plugin_count_beds'][0]) != '') {
                        ?>
                        <div class="room-plugin room-beds">
                        <span class="room-plugin room-icon icon-bed"></span> <?php echo esc_attr($beds_count); ?>
                        <span class="room-plugin room-info-item-label"><?php echo esc_html__('beds','room-plugin'); ?></span>
                        </div><?php
                    }
                }
                ?></div><div class="room-plugin room-info-item"><?php
                //Count of people
                if (isset($meta['room_plugin_count_baths'][0])) {
                    if (($baths_count = $meta['room_plugin_count_baths'][0]) != '') {
                        ?>
                        <div class="room-plugin room-baths">
                        <span class="room-plugin room-icon icon-bath"></span> <?php echo esc_attr($baths_count); ?>
                        <span class="room-plugin room-info-item-label"><?php echo esc_html__('baths','room-plugin'); ?></span>
                        </div><?php
                    }
                }
                ?></div>
        </div><?php
        //Price
        if (isset($meta['room_plugin_price'][0])) {
            if (($price = $meta['room_plugin_price'][0]) != '') {
                $currency = '';
                if (isset($meta['room_plugin_currency'][0])) {
                    $currency = $meta['room_plugin_currency'][0];
                }
                ?><div class="room-plugin room-price"><?php
                //Old price
                if (isset($meta['room_plugin_old_price'][0])) {
                    if (($old_price = $meta['room_plugin_old_price'][0]) != '') {
                        ?><span class="room-plugin room-present-currency"><?php
                        echo esc_html($currency);
                        ?></span><?php
                        ?><span class="room-plugin room-old-price"><?php
                        echo esc_html($old_price);
                        ?></span><?php
                    }
                }
                ?><span class="room-plugin room-present-currency"><?php
                echo esc_html($currency);
                ?></span><?php
                ?><span class="room-plugin room-present-price"><?php
                echo esc_html($price);
                ?></span><?php
                ?><span class="room-plugin room-price-period"><?php
                echo esc_html__('/night', 'room-plugin'); ?>
                </span><?php
                ?></div><?php
            }
        }
        ?><div class="room-plugin room-single-info"><?php
            the_content();
        ?></div></div><?php

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    endwhile; endif;
get_footer();

?>