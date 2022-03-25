<?php
/**
 * Plugin support: Search
 *
 * @package WordPress
 * @subpackage Room Plugin
 * @since v1.0
 */
/* Template Name: Custom Search */
get_header();
            wp_enqueue_style( 'wp_review-style' );
            $count = 0;
            if ( have_posts() ) {
                ?><div class="room-plugin room-columns-container room-plugin-search-result"><?php
                $count = 0;
                while ( have_posts() ) : the_post();
                    $meta = get_post_meta(get_the_ID(), '', true);
                    $destinations = $_GET['destinations'];
                    $guests = intval($_GET['guests']);
                    $price = intval($_GET['price']);

                    if (($destinations == '' || $destinations == $meta['room_plugin_destination'][0])&&($guests == 0 || $guests <= intval($meta['room_plugin_count_guests'][0])) && ($price == 0 || $price >= intval($meta['room_plugin_price'][0]))) {
                        $count++;
                    } else {
                        continue;
                    }
                    ?><div class="room-plugin column-1-2"><?php
                    ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                        <div class="room-plugin room-single">
                            <div class="room-plugin room-featured">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'room-small'); ?>
                            </div>
                            <div class="room-plugin room-plugin-content">
                                <?php
                                if (function_exists('wp_review_user_rating')) {
                                    $review_count =(get_post_meta( get_the_ID(), 'wp_review_review_count', true ));
                                    ?><div class="room-single-review_user_rating">
                                    <div class="room-single-star_container clearfix"> <?php
                                    print_r(wp_review_user_rating(get_the_ID()));
                                    ?></div><?php
                                    if (isset($review_count) && $review_count > 0 ) {
                                        ?><div class="room-single-review_count"><?php
                                        echo esc_attr($review_count);?>
                                        <span class="room-single-review_count-caption">
                                            <?php echo esc_html__('reviews','room-plugin');?>
                                        </span>
                                        </div> <?php
                                    }
                                    ?></div> <?php
                                }
                                ?>
                                <div class="room-title">
                                    <a class="room-plugin room-title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
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
                                </div>
                                <div class="room-plugin room-content">
                                    <?php the_excerpt(); ?>
                                    <?php
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
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div></div><?php
                endwhile;
                ?></div><?php
            } elseif ($count != 0) {
            ?>
                <article <?php post_class( 'post_item_single post_item_404 post_item_none_search' ); ?>>
                    <div class="post_content">
                        <h1 class="page_title"><?php esc_html_e( 'No results', 'room-plugin' ); ?></h1>
                        <div class="page_info">
                            <h3 class="page_subtitle"><?php echo sprintf(esc_html__("We're sorry, but your search did not match", 'room-plugin')); ?></h3>
                            <p class="page_description"><?php echo wp_kses_data( sprintf( __("Can't find what you need? Take a moment and do a search below or start from <a href='%s'>our homepage</a>.", 'room-plugin'), esc_url(home_url('/')) ) ); ?></p>
                            <div class="search_wrap search_style_normal page_search inited">
                                <div class="search_form_wrap">
                                    <form role="search" action="<?php echo esc_url(site_url('/')); ?>" method="get" class="room-plugin search_form">
                                        <input type="hidden" name="post_type" value="room" />
                                        <input type="text" name="s" placeholder="<?php echo esc_html__ ('Enter keyword', 'room-plugin')?>" autocomplete="off" class="search_field"/>
                                        <button type="submit" value="<?php echo esc_html__ ('Search', 'room-plugin')?>" class="search_submit trx_addons_icon-search"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php
            }
            if ($count == 0) {
                ?>
                <article <?php post_class( 'post_item_single post_item_404 post_item_none_search' ); ?>>
                    <div class="post_content">
                        <h1 class="page_title"><?php esc_html_e( 'No results', 'room-plugin' ); ?></h1>
                        <div class="page_info">
                            <h3 class="page_subtitle"><?php echo sprintf(esc_html__("We're sorry, but your search did not match", 'room-plugin')); ?></h3>
                            <p class="page_description"><?php echo wp_kses_data( sprintf( __("Can't find what you need? Take a moment and do a search below or start from <a href='%s'>our homepage</a>.", 'room-plugin'), esc_url(home_url('/')) ) ); ?></p>
                            <div class="search_wrap search_style_normal page_search inited">
                                <div class="search_form_wrap">
                                    <form role="search" action="<?php echo esc_url(site_url('/')); ?>" method="get" class="room-plugin search_form">
                                        <input type="hidden" name="post_type" value="room" />
                                        <input type="text" name="s" placeholder="<?php echo esc_html__ ('Enter keyword', 'room-plugin')?>" autocomplete="off" class="search_field"/>
                                        <button type="submit" value="<?php echo esc_html__ ('Search', 'room-plugin')?>" class="search_submit trx_addons_icon-search"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php
            }
get_footer(); ?>