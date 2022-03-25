<?php
/**
 * Plugin support: Archive
 *
 * @package WordPress
 * @subpackage Room Plugin
 * @since v1.0
 */
get_header();
if(have_posts()) : while(have_posts()) : the_post();
    ?><div class="room-plugin room-post"><?php
    $meta = get_post_meta(get_the_ID(), '', true);
    ?><div class="room-plugin room-featured"><?php
    the_post_thumbnail( 'room-large', array(
            'alt' => get_the_title(),
            'itemprop' => 'image'
        )
    );
    ?><div class="room-plugin room-featured-overlay"><?php

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
                    ?><span class="room-plugin room-old-price"><?php
                    echo esc_html($currency . $old_price);
                    ?></span><?php
                }
            }

            ?><span class="room-plugin room-present-price"><?php
            echo esc_html($currency . $price); ?>
            </span><?php
            ?></div><?php
        }
    }

    //Show line with last minute
    if (isset($meta['room_plugin_minute'][0])) {
        if (($minute = $meta['room_plugin_minute'][0]) == '1') {
            ?>
            <div class="room-plugin room-last-minute"><div class="room-last-minute-inside room-icon-clock"><?php
                esc_html_e('Last minute', 'room-plugin');
                ?></div></div><?php
        }
    }
    //Rating
    if (isset($meta['room_plugin_rating'][0])) {
        if (($rating_count = $meta['room_plugin_rating'][0]) != '') {
            ?><div class="room-plugin room-rating"><?php
            for ($temp_count = 0; $temp_count < $rating_count; $temp_count++) {
                ?><span class="room-plugin room-rating-star room-icon-bookmark-star"></span><?php
            }
            ?></div><?php
        }
    }
    ?></div></div><div class="room-plugin room-single-content"><h3 class="room-plugin room-single-title"><a class="room-plugin room-single-title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><?php
    //Destination
    if (isset($meta['room_plugin_destination'][0])) {
        if (($destination = $meta['room_plugin_destination'][0]) != '') {
            ?><div class="room-plugin room-destination"><?php
            echo esc_html__( 'Location:', 'room-plugin' ) . ' ' . esc_html($destination);
            ?></div><?php
        }
    }
    ?><div class="room-plugin room-info"><div class="room-plugin room-info-part"><?php
            //Calendar
            if (isset($meta['room_plugin_room_start'][0])) {
                ?><div class="room-plugin room-info-label"><?php esc_html_e( 'Start:', 'room-plugin' );?></div><div class="room-plugin room-calendar room-icon-calendar"><?php
                echo esc_html($meta['room_plugin_room_start'][0]);
                ?></div><?php
            }
            //Calendar
            if (isset($meta['room_plugin_room_end'][0])) {
                ?><br><div class="room-plugin room-info-label"><?php esc_html_e( 'End:', 'room-plugin' );?></div><div class="room-plugin room-calendar room-icon-calendar"><?php
                echo esc_html($meta['room_plugin_room_end'][0]);
                ?></div><?php
            }

            //Count of people
            if (isset($meta['room_plugin_count_people'][0])) {
                if (($people_count = $meta['room_plugin_count_people'][0]) != '') {
                    ?><br><div class="room-plugin room-info-label"><?php esc_html_e( 'Participants:', 'room-plugin' );?></div><div class="room-plugin room-people"><?php
                    for ($temp_count = 0; $temp_count < $people_count; $temp_count++) {
                        ?><span class="room-plugin room-people-icon room-icon-user"></span><?php
                    }
                    ?></div><?php
                }
            }



            ?></div><div class="room-plugin room-info-part"><?php
            //List
            if (isset($meta['room_plugin_transfer'][0]) || isset($meta['room_plugin_information'][0]) || isset($meta['room_plugin_information1'][0]) || isset($meta['room_plugin_information2'][0])) {
                ?><ul class="room-plugin room-list"><?php
                if (isset($meta['room_plugin_transfer'][0])) {
                    if (($transfer = $meta['room_plugin_transfer'][0]) != '') {
                        ?>
                        <li class="room-icon-ok"><?php
                        echo esc_html($transfer);
                        ?></li><?php
                    }
                }

                if (isset($meta['room_plugin_information'][0])) {
                    if (($information = $meta['room_plugin_information'][0]) != '') {
                        ?>
                        <li class="room-icon-ok"><?php
                        echo esc_html($information);
                        ?></li><?php
                    }
                }

                if (isset($meta['room_plugin_information1'][0])) {
                    if (($information = $meta['room_plugin_information1'][0]) != '') {
                        ?>
                        <li class="room-icon-ok"><?php
                        echo esc_html($information);
                        ?></li><?php
                    }
                }

                if (isset($meta['room_plugin_information2'][0])) {
                    if (($information = $meta['room_plugin_information2'][0]) != '') {
                        ?>
                        <li class="room-icon-ok"><?php
                        echo esc_html($information);
                        ?></li><?php
                    }
                }
                ?></ul><?php
            }
            ?></div><?php
        ?></div><?php

    ?><div class="room-plugin room-single-info"><?php
            the_excerpt();
    ?></div></div></div><?php


endwhile; endif;
get_footer();

?>