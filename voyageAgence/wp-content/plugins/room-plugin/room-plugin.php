<?php
/*
Plugin Name: Room Plugin
Description: Room Plugin - Premium plugin.
Author: ThemeREX
Version: 1.0
Text Domain: room-plugin
*/
?>
<?php

    // Don't load directly
if ( ! defined( 'ABSPATH' ) ) die( '-1' );

// Plugin's core files
require_once 'core/core.plugin.php';

// Register post type and taxonomy
if ( ! function_exists('room_plugin_cpt_room_init') ) {

    // Register Custom Post Type Room
    function room_plugin_cpt_room_init() {

        $labels = array(
            'name'                  => esc_html_x( 'Rooms', 'Post Type General Name', 'room-plugin' ),
            'singular_name'         => esc_html_x( 'Room', 'Post Type Singular Name', 'room-plugin' ),
            'menu_name'             => esc_html__( 'Rooms', 'room-plugin' ),
            'name_admin_bar'        => esc_html__( 'Room', 'room-plugin' ),
            'archives'              => esc_html__( 'Item Archives', 'room-plugin' ),
            'parent_item_colon'     => esc_html__( 'Parent Item:', 'room-plugin' ),
            'all_items'             => esc_html__( 'All rooms', 'room-plugin' ),
            'add_new_item'          => esc_html__( 'Add New Room', 'room-plugin' ),
            'add_new'               => esc_html__( 'Add New', 'room-plugin' ),
            'new_item'              => esc_html__( 'New Room', 'room-plugin' ),
            'edit_item'             => esc_html__( 'Edit Room', 'room-plugin' ),
            'update_item'           => esc_html__( 'Update Room', 'room-plugin' ),
            'view_item'             => esc_html__( 'View Room', 'room-plugin' ),
            'search_items'          => esc_html__( 'Search Room', 'room-plugin' ),
            'not_found'             => esc_html__( 'Not found', 'room-plugin' ),
            'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'room-plugin' ),
            'featured_image'        => esc_html__( 'Featured Image', 'room-plugin' ),
            'set_featured_image'    => esc_html__( 'Set featured image', 'room-plugin' ),
            'remove_featured_image' => esc_html__( 'Remove featured image', 'room-plugin' ),
            'use_featured_image'    => esc_html__( 'Use as featured image', 'room-plugin' ),
            'insert_into_item'      => esc_html__( 'Insert into item', 'room-plugin' ),
            'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'room-plugin' ),
            'items_list'            => esc_html__( 'Items list', 'room-plugin' ),
            'items_list_navigation' => esc_html__( 'Items list navigation', 'room-plugin' ),
            'filter_items_list'     => esc_html__( 'Filter items list', 'room-plugin' ),
        );
        $args = array(
            'label'                 => esc_html__( 'Room', 'room-plugin' ),
            'description'           => esc_html__( 'Room Description', 'room-plugin' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', 'page-attributes', ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-admin-home',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'rewrite'               => array('slug' => 'room', 'with_front' => false),
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'room', $args );

    }

    add_action( 'init', 'room_plugin_cpt_room_init', 0 );


    // Register Custom Taxonomy
    function room_plugin_taxonomy_reg() {
        $labels = array(
            'name'                       => _x( 'Room group', 'Taxonomy General Name', 'room-plugin' ),
            'singular_name'              => _x( 'Group', 'Taxonomy Singular Name', 'room-plugin' ),
            'menu_name'                  => __( 'Room Group', 'room-plugin' ),
            'all_items'                  => __( 'All Groups', 'room-plugin' ),
            'parent_item'                => __( 'Parent Group', 'room-plugin' ),
            'parent_item_colon'          => __( 'Parent Group:', 'room-plugin' ),
            'new_item_name'              => __( 'New Group Name', 'room-plugin' ),
            'add_new_item'               => __( 'Add New Group', 'room-plugin' ),
            'edit_item'                  => __( 'Edit Group', 'room-plugin' ),
            'update_item'                => __( 'Update Group', 'room-plugin' ),
            'view_item'                  => __( 'View Group', 'room-plugin' ),
            'separate_items_with_commas' => __( 'Separate groups with commas', 'room-plugin' ),
            'add_or_remove_items'        => __( 'Add or remove groups', 'room-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'room-plugin' ),
            'popular_items'              => __( 'Popular Groups', 'room-plugin' ),
            'search_items'               => __( 'Search Groups', 'room-plugin' ),
            'not_found'                  => __( 'Not Found', 'room-plugin' ),
            'no_terms'                   => __( 'No groups', 'room-plugin' ),
            'items_list'                 => __( 'Groups list', 'room-plugin' ),
            'items_list_navigation'      => __( 'Groups list navigation', 'room-plugin' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
            'rewrite'                    => true
        );
        register_taxonomy( 'room_taxonomy', array( 'room' ), $args );
        flush_rewrite_rules();
    }

    add_action( 'init', 'room_plugin_taxonomy_reg', 1 );
}


// Add the Room Meta Boxes
if ( ! function_exists('room_plugin_add_metaboxes') ) {
    function room_plugin_add_metaboxes() {
        add_meta_box('room_plugin_meta', esc_html__( 'Room info', 'room-plugin' ), 'room_plugin_show_meta', 'room', 'side', 'high');
    }
    add_action( 'add_meta_boxes', 'room_plugin_add_metaboxes' );
}


// Show the Room Metabox
if ( ! function_exists('room_plugin_show_meta') ) {
    function room_plugin_show_meta() {
        global $post;

        // Noncename needed to verify where the data originated
        ?><input type="hidden" name="room_plugin_meta" id="room_plugin_meta" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>"/><?php

        // Get the location data if its already been entered
        $room_plugin_destination = get_post_meta($post->ID, 'room_plugin_destination', true);

        // Echo out the field
        ?>
            <p><label for="room_plugin_destination_meta"><?php echo esc_html__('Destination:','room-plugin') ; ?></label></p>
            <input type="text" name="room_plugin_destination" value="<?php echo esc_attr($room_plugin_destination) ; ?>" class="widefat" />
        <?php

        // Count of guests
        $room_plugin_count_guests = get_post_meta( $post->ID, 'room_plugin_count_guests', true  );
        ?>
            <p><label for="room_plugin_count_guests"><?php echo esc_html__('How many guests:','room-plugin') ; ?></label></p>
            <select name="room_plugin_count_guests">
                <?php
                $option_values = array(1, 2, 3, 4, 5);
                foreach($option_values as $key => $value) {
                    if($value == $room_plugin_count_guests){ ?>
                        <option selected><?php echo esc_attr($value); ?></option>
                    <?php
                    } else { ?>
                        <option><?php echo esc_attr($value); ?></option>
                    <?php
                    }
                }
                ?>
            </select>
        <?php

        // Count of beds
        $room_plugin_count_beds = get_post_meta( $post->ID, 'room_plugin_count_beds', true  );
        ?>
        <p><label for="room_plugin_count_beds"><?php echo esc_html__('How many beds:','room-plugin') ; ?></label></p>
        <select name="room_plugin_count_beds">
            <?php
            $option_values = array(1, 2, 3, 4, 5);
            foreach($option_values as $key => $value) {
                if($value == $room_plugin_count_beds){ ?>
                    <option selected><?php echo esc_attr($value); ?></option>
                    <?php
                } else { ?>
                    <option><?php echo esc_attr($value); ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <?php

        // Count of baths
        $room_plugin_count_baths = get_post_meta( $post->ID, 'room_plugin_count_baths', true  );
        ?>
        <p><label for="room_plugin_count_baths"><?php echo esc_html__('How many baths:','room-plugin') ; ?></label></p>
        <select name="room_plugin_count_baths">
            <?php
            $option_values = array(1, 2, 3, 4, 5);
            foreach($option_values as $key => $value) {
                if($value == $room_plugin_count_baths){ ?>
                    <option selected><?php echo esc_attr($value); ?></option>
                    <?php
                } else { ?>
                    <option><?php echo esc_attr($value); ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <?php

        //Currency
        $room_plugin_currency = get_post_meta( $post->ID, 'room_plugin_currency', true  );
        ?>
            <p><label for="room_plugin_currency"><?php echo esc_html__('Currency of price:','room-plugin') ; ?></label></p>
            <input type="text" name="room_plugin_currency"  value="<?php echo esc_attr($room_plugin_currency); ?>" class="widefat" />
        <?php

        //Price
        $room_plugin_price = get_post_meta( $post->ID, 'room_plugin_price', true  );
        ?>
            <p><label for="room_plugin_price"><?php echo esc_html__('Price of room:','room-plugin') ; ?></label></p>
            <input type="text" name="room_plugin_price"  value="<?php echo esc_attr($room_plugin_price); ?>" class="widefat" />
        <?php

        //Old price
        $room_plugin_old_price = get_post_meta( $post->ID, 'room_plugin_old_price', true  );
        ?>
            <p><label for="room_plugin_old_price"><?php echo esc_html__('Old price of room:','room-plugin') ; ?></label></p>
            <input type="text" name="room_plugin_old_price"  value="<?php echo esc_attr($room_plugin_old_price); ?>" class="widefat" />
        <?php

        // Rating of room
        $room_plugin_rating = get_post_meta( $post->ID, 'room_plugin_rating', true  );
        ?>
            <p><label for="room_plugin_rating"><?php echo esc_html__('Rating (how many stars):','room-plugin') ; ?></label></p>
            <select name="room_plugin_rating">
                <?php
                $option_values = array(1, 2, 3, 4, 5);
                foreach($option_values as $key => $value) {
                    if($value == $room_plugin_rating){ ?>
                        <option selected><?php echo esc_attr($value); ?></option>
                    <?php
                    } else { ?>
                        <option><?php echo esc_attr($value); ?></option>
                    <?php
                    }
                }
                ?>
            </select>
        <?php


        //Type of transfer
        $room_plugin_transfer = get_post_meta( $post->ID, 'room_plugin_transfer', true  );
        ?>
            <p><label for="room_plugin_transfer"><?php echo esc_html__('Type of transfer:','room-plugin') ; ?></label></p>
            <input type="text" name="room_plugin_transfer"  value="<?php echo esc_attr($room_plugin_transfer); ?>" class="widefat" />
         <?php


        //Additional Info
        $room_plugin_information = get_post_meta( $post->ID, 'room_plugin_information', true  );
        ?>
            <p><label for="room_plugin_information"><?php echo esc_html__('Additional Info 1:','room-plugin') ; ?></label></p>
            <input type="text" name="room_plugin_information"  value="<?php echo esc_attr($room_plugin_information); ?>" class="widefat" />
        <?php

        //Additional Info
        $room_plugin_information1 = get_post_meta( $post->ID, 'room_plugin_information1', true  );
        ?>
            <p><label for="room_plugin_information1"><?php echo esc_html__('Additional Info 2:','room-plugin') ; ?></label></p>
            <input type="text" name="room_plugin_information1"  value="<?php echo esc_attr($room_plugin_information1); ?>" class="widefat" />
        <?php

        //Additional Info
        $room_plugin_information2 = get_post_meta( $post->ID, 'room_plugin_information2', true  );
        ?>
            <p><label for="room_plugin_information2"><?php echo esc_html__('Additional Info 3:','room-plugin') ; ?></label></p>
            <input type="text" name="room_plugin_information2"  value="<?php echo esc_attr($room_plugin_information2); ?>" class="widefat" />
        <?php
    }
}


// Save the Room Metabox Data
if ( ! function_exists('room_plugin_save_meta') ) {
    function room_plugin_save_meta($post_id, $post) {

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if (!isset($_POST["room_plugin_meta"]) || !wp_verify_nonce($_POST['room_plugin_meta'], plugin_basename(__FILE__))) {
            return $post->ID;
        }

        // Is the user allowed to edit the post or page?
        if (!current_user_can('edit_post', $post->ID)) {
            return $post->ID;
        }

        // Check autosave
        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
            return $post_id;
        }

        // OK, we're authenticated: we need to find and save the data
        // We'll put it into an array to make it easier to loop though.
        $room_plugin_meta['room_plugin_destination'] = $_POST['room_plugin_destination'];
        $room_plugin_meta['room_plugin_count_guests'] = $_POST['room_plugin_count_guests'];
        $room_plugin_meta['room_plugin_count_beds'] = $_POST['room_plugin_count_beds'];
        $room_plugin_meta['room_plugin_count_baths'] = $_POST['room_plugin_count_baths'];
        $room_plugin_meta['room_plugin_price'] = $_POST['room_plugin_price'];
        $room_plugin_meta['room_plugin_old_price'] = $_POST['room_plugin_old_price'];
        $room_plugin_meta['room_plugin_currency'] = $_POST['room_plugin_currency'];
        $room_plugin_meta['room_plugin_rating'] = $_POST['room_plugin_rating'];
        $room_plugin_meta['room_plugin_transfer'] = $_POST['room_plugin_transfer'];
        $room_plugin_meta['room_plugin_information'] = $_POST['room_plugin_information'];
        $room_plugin_meta['room_plugin_information1'] = $_POST['room_plugin_information1'];
        $room_plugin_meta['room_plugin_information2'] = $_POST['room_plugin_information2'];

        // Add values of $room_plugin_meta as custom fields
        foreach ($room_plugin_meta as $key => $value) {     // Cycle through the $room_plugin_meta array!
            if ($post->post_type == 'revision') return;     // Don't store custom data twice
            $value = implode(',', (array)$value);           // If $value is an array, make it a CSV (unlikely)
            if (get_post_meta($post->ID, $key, FALSE)) {    // If the custom field already has a value
                update_post_meta($post->ID, $key, $value);
            } else {                                        // If the custom field doesn't have a value
                add_post_meta($post->ID, $key, $value);
            }
            if (!$value) delete_post_meta($post->ID, $key); // Delete if blank
        }
    }

    add_action('save_post', 'room_plugin_save_meta', 1, 2); // save the custom fields
}


// Add new image size for featured images
if ( !function_exists( 'room_plugin_add_new_image_size' ) ) {
    function room_plugin_add_new_image_size()
    {
        add_image_size('room-large', 1000, 500, true);
        add_image_size('room-medium', 740, 524, true);
        add_image_size('room-small', 740, 402, true);
    }
    add_action('init', 'room_plugin_add_new_image_size');
}

// Add room form shortcode
if ( !function_exists( 'room_plugin_form_shortcode' ) ) {
    function room_plugin_form_shortcode($atts) {
        $atts = shortcode_atts( array(
                // Individual params
                "title" => esc_html__ ('Find Your Perfect Adventure', 'room-plugin')
            ), $atts , 'room_plugin_form_shortcode'
        );
        ob_start();
        ?>
        <div class="room-plugin room-plugin-form-shortcode">
            <div class="room-plugin room-plugin-form-content">
                <form role="search" action="<?php echo esc_url(site_url('/')); ?>" method="get" id="room-search-form-full" class="room-plugin room-plugin-form-full-search">
                    <input type="hidden" name="post_type" value="room" />
                    <input type="hidden" name="s" autocomplete="off"/>
                    <div class="room-plugin-column-row"><div class="room-plugin-column room-plugin-three">
                        <label for="destinations"><?php echo esc_html__ ('Destination', 'room-plugin')?></label>
                        <select data-placeholder="<?php esc_attr_e( 'Select destination', 'room_plugin' ); ?>" class="" name="destinations">
                            <option value="">Ignore</option>
                            <?php
                            global $wpdb;
                            $sql = "SELECT DISTINCT meta_value FROM {$wpdb->postmeta} WHERE meta_key='%s' ORDER BY meta_value";
                            $query = $wpdb->prepare( $sql, 'room_plugin_destination');
                            $rows = $wpdb->get_results($query, ARRAY_A);
                            foreach ($rows as $row)
                                echo '<option value="'.$row['meta_value'].'">' . $row['meta_value'] .'</option>';

                            ?></select>
                    </div><div class="room-plugin-column room-plugin-three">
                        <label for="guests"><?php echo esc_html__ ('Max Guests', 'room-plugin')?></label>
                        <select data-placeholder="<?php esc_attr_e( 'Select guests', 'room_plugin' ); ?>" class="" name="guests">
                            <option value="">Ignore</option>
                            <?php
                            global $wpdb;
                            $sql = "SELECT DISTINCT meta_value FROM {$wpdb->postmeta} WHERE meta_key='%s' ORDER BY meta_value";
                            $query = $wpdb->prepare( $sql, 'room_plugin_count_guests');
                            $rows = $wpdb->get_results($query, ARRAY_A);
                            foreach ($rows as $row)
                                echo '<option value="'.$row['meta_value'].'">' . $row['meta_value'] .'</option>';

                            ?></select>
                    </div><div class="room-plugin-column room-plugin-three">
                        <label for="price"><?php echo esc_html__ ('Max price', 'room-plugin')?></label>
                            <select data-placeholder="<?php esc_attr_e( 'Select destination', 'room_plugin' ); ?>" class="" name="price">
                                <option value="">Ignore</option>
                                <?php
                                global $wpdb;
                                $sql = "SELECT DISTINCT meta_value FROM {$wpdb->postmeta} WHERE meta_key='%s' ORDER BY meta_value";
                                $query = $wpdb->prepare( $sql, 'room_plugin_price');
                                $rows = $wpdb->get_results($query, ARRAY_A);
                                foreach ($rows as $row)
                                    echo '<option value="'.$row['meta_value'].'">' . $row['meta_value'] .'</option>';

                                ?></select>
                    </div><div class="room-plugin-column room-plugin-three">
                        <button type="submit" value="<?php echo esc_html__ ('Search', 'room-plugin')?>"><?php echo esc_html__ ('search', 'room-plugin')?></button>
                    </div></div>
                </form>
            </div>
        </div>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    add_shortcode('room_plugin_form_shortcode', 'room_plugin_form_shortcode');
}

// Add search template
if ( !function_exists( 'room_plugin_search' ) ) {
    function room_plugin_search($template)
    {
        global $wp_query, $post;
        $post_type = get_query_var('post_type');
        if ($wp_query->is_search && $post_type == 'room') {
	        query_posts(
		        wp_parse_args( $wp_query->query ,array( 'posts_per_page' => -1 ) )
	        );
            $template = plugin_dir_path(__FILE__) . ('template/archive-search.php');
        }
        return $template;
    }

    add_filter('template_include', 'room_plugin_search');
}


// Add room shortcode
if ( !function_exists( 'room_plugin_shortcode' ) ) {
    function room_plugin_shortcode($atts) {
        $atts = shortcode_atts( array(
            // Individual params
            "style" => 'extended',
            "group" => '',
            "count" => '',
            "columns" => '',
            "slider" => 0,
        ), $atts , 'room_plugin_shortcode'
        );
        $atts['count'] = max(1, (int) $atts['count']);
        $atts['columns'] = max(2, min( 3,(int) $atts['columns']));
        $atts['slider'] = $atts['slider'] > 0 && $atts['count'] > $atts['columns'];

        ob_start();

        $tax_query = !empty($atts['group']) ? array(
            array(
                'taxonomy' => 'room_taxonomy',
                'field'    => 'id',
                'terms'    => array($atts['group'])
            )
        ) : '';

        $query = new WP_Query(array(
            'post_type' => 'room',
            'posts_per_page' => $atts['count'],
            'order' => 'ASC',
            'orderby' => 'title',
            'tax_query' => $tax_query
        ));

	    if ($query->have_posts()) {
            ?><div class="room-plugin room-container<?php
            if ($atts['slider']) echo ' swiper-container';
            echo ' room-style-' . esc_html($atts['style']);
            ?>"<?php
            echo ($atts['columns'] > 1
                ? ' data-slides="' . esc_attr($atts['columns']) . '"'
                : '');
            ?>><?php

        if ($atts['slider']) {
            ?><div class="swiper-wrapper"><?php
            } else if ($atts['columns'] > 1) {
            ?><div class="room-plugin room-columns-container"><?php
        }

        while ($query->have_posts()) : $query->the_post();
            $meta = get_post_meta(get_the_ID(), '', true);
        if ($atts['slider']) {
            ?><div class="swiper-slide"><?php
            } else if ($atts['columns'] > 1) {
            ?><div class="<?php echo esc_html__('room-plugin column-1-'.$atts['columns']); ?>"><?php
                }
                ?><div id="post-<?php the_ID(); ?>" <?php post_class();?>>
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
            wp_reset_postdata();
            ?></div><div class="swiper-scrollbar"></div></div><?php
        }
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    add_shortcode('room_plugin_shortcode', 'room_plugin_shortcode');
}

// Add room shortcode to Visual Composer
if (!function_exists('room_plugin_shortcode_add_vc')) {
    function room_plugin_shortcode_add_vc() {
        //Register shortcode Room in Visual Composer
        vc_map(array(
            "name" => esc_html__("Rooms", 'room-plugin'),
            "description" => esc_html__("Display team members from specified group", 'room-plugin'),
            "base" => "room_plugin_shortcode",
            "content_element" => true,
            "category" => esc_html__('Room Plugin', 'room-plugin'),
            "show_settings_on_create" => true,
            "is_container" => false,
            "class" => "room_plugin_shortcode",
            "icon" => 'icon-room-plugin',
            "params" => array(
                array(
                    "param_name" => "style",
                    "heading" => esc_html__("Style", 'room-plugin'),
                    "description" => esc_html__("Select style room shortcode", 'room-plugin'),
                    "value" => array(
                        esc_html__("Original style", 'room-plugin') => 'original',
                        esc_html__("Extended style", 'room-plugin') => 'extended'
                    ),
                    "type" => "dropdown"
                ),
                array(
                    "param_name" => "group",
                    "heading" => esc_html__("Group", 'room-plugin'),
                    "description" => esc_html__("Room group", 'room-plugin'),
                    "value" => array_merge(array(esc_html__('- Select room group -', 'room-plugin') => 0), array_flip(room_plugin_get_list_cats())),
                    "type" => "dropdown"
                ),
                array(
                    "param_name" => "count",
                    "heading" => esc_html__("Count", 'room-plugin'),
                    "description" => esc_html__("Specify number of rooms to display", 'room-plugin'),
                    "admin_label" => true,
                    "type" => "textfield"
                ),
                array(
                    "param_name" => "columns",
                    "heading" => esc_html__("Columns", 'room-plugin'),
                    "description" => esc_html__("Specify number of columns. If empty - auto detect by rooms number", 'room-plugin'),
                    "admin_label" => true,
                    "value" => array(
                        '2' => '2',
                        '3' => '3',
                    ),
                    "type" => "dropdown"
                ),
                array(
                    "param_name" => "slider",
                    "heading" => esc_html__("Slider", 'room-plugin'),
                    "description" => esc_html__("Show items as slider (only if count sliders more then columns)", 'room-plugin'),
                    "admin_label" => true,
                    "std" => "0",
                    "value" => array(esc_html__("Slider", 'room-plugin') => "1" ),
                    "admin_label" => true,
                    "type" => "checkbox"
                )
            ),
        ));
    }
    add_action( 'vc_before_init', 'room_plugin_shortcode_add_vc' );
}


// Add room form shortcode to Visual Composer
if (!function_exists('room_plugin_form_shortcode_add_vc')) {
    function room_plugin_form_shortcode_add_vc() {
        //Register shortcode Room in Visual Composer
        vc_map(array(
            "name" => esc_html__("Room search form", 'room-plugin'),
            "description" => esc_html__("Display room search form", 'room-plugin'),
            "base" => "room_plugin_form_shortcode",
            "content_element" => true,
            "category" => esc_html__('Room Plugin', 'room-plugin'),
            "show_settings_on_create" => true,
            "is_container" => false,
            "class" => "room_plugin_form_shortcode",
            "icon" => 'icon-room-plugin',
            "params" => array(
                array(
                    "param_name" => "title",
                    "heading" => esc_html__("Title", 'room-plugin'),
                    "description" => esc_html__("Title for search form", 'room-plugin'),
                    "admin_label" => true,
                    "type" => "textfield"
                )
            ),
        ));
    }
    add_action( 'vc_before_init', 'room_plugin_form_shortcode_add_vc' );
}


// Change standard single template for rooms
if ( !function_exists( 'room_plugin_single' ) ) {
    function room_plugin_single($template) {
        global $post;
        if (is_single() && $post->post_type == 'room') {
            $template = plugin_dir_path(__FILE__).('/template/single-room.php');
        }
        return $template;
    }
    add_filter('single_template', 'room_plugin_single');
}

// Change standard category template for services categories (groups)
if ( !function_exists( 'room_plugin_taxonomy_template' ) ) {
    function room_plugin_taxonomy_template( $template ) {
        if ( is_tax('room_taxonomy') )
            $template = plugin_dir_path(__FILE__).('template/archive-room.php');
        return $template;
    }
    add_filter('taxonomy_template',	'room_plugin_taxonomy_template');
}


// Load required styles and scripts in the admin mode
if ( !function_exists( 'room_plugin_admin_enqueue_script' ) ) {
    function room_plugin_admin_enqueue_script() {
        // Enqueue Datepicker + jQuery UI CSS
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script('jquery-ui-slider');

        wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);

        // Admin styles and scripts
        wp_enqueue_style( 'room-plugin-style', plugins_url( '/css/style.css', __FILE__ ) );
        wp_enqueue_script( 'room-plugin-admin-script', plugins_url( '/js/room-plugin.admin.js', __FILE__ ), array('jquery'), null, true );
    }
    add_action("admin_enqueue_scripts", 'room_plugin_admin_enqueue_script');
}

// Load required styles and scripts
if ( !function_exists( 'room_plugin_enqueue_script' ) ) {
    function room_plugin_enqueue_script() {
        // Enqueue Datepicker + jQuery UI CSS
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script('jquery-ui-slider');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);

        // Styles and scripts
        wp_enqueue_style( 'room-plugin-style', plugins_url( '/css/style.css', __FILE__ ) );
        wp_enqueue_style( 'room-plugin-colors', plugins_url( '/css/colors.css', __FILE__ ) );
        wp_enqueue_style( 'room-plugin-fontello-style', plugins_url( '/css/fontello/css/fontello.css', __FILE__ ) );
        wp_enqueue_script( 'room-plugin-script', plugins_url( '/js/room-plugin.js', __FILE__ ), array('jquery'), null, true );
        wp_enqueue_script( 'room-plugin-admin-script', plugins_url( '/js/room-plugin.admin.js', __FILE__ ), array('jquery'), null, true );
    }
    add_action("wp_enqueue_scripts", 'room_plugin_enqueue_script');
}

//-------------------------------------------------------
//-- Translations
//-------------------------------------------------------

// Load plugin's translation file
// Attention! It must be loaded before the first call of any translation function
if ( !function_exists( 'room_plugin_load_plugin_textdomain' ) ) {
    add_action( 'plugins_loaded', 'room_plugin_load_plugin_textdomain');
    function room_plugin_load_plugin_textdomain() {
        static $loaded = false;
        if ( $loaded ) return true;
        $domain = 'room-plugin';
        if ( is_textdomain_loaded( $domain ) && !is_a( $GLOBALS['l10n'][ $domain ], 'NOOP_Translations' ) ) return true;
        $loaded = true;
        load_plugin_textdomain( $domain, false, dirname(plugin_basename(__FILE__)) . '/languages' );
    }
}