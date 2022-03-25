<?php
/**
 * Default Theme Options and Internal Theme Settings
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)

if ( !function_exists('unitravel_options_theme_setup1') ) {
	add_action( 'after_setup_theme', 'unitravel_options_theme_setup1', 1 );
	function unitravel_options_theme_setup1() {
		
		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		unitravel_storage_set('settings', array(
			
			'disable_jquery_ui'			=> false,						// Prevent loading custom jQuery UI libraries in the third-party plugins
		
			'max_load_fonts'			=> 4,							// Max fonts number to load from Google fonts or from uploaded fonts
		
			'use_mediaelements'			=> true,						// Load script "Media Elements" to play video and audio
		
			'max_excerpt_length'		=> 30,							// Max words number for the excerpt in the blog style 'Excerpt'.
																		// For style 'Classic' - get half from this value
			'message_maxlength'			=> 1000							// Max length of the message from contact form
			
		));
		
		
		
		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------
		
		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		unitravel_storage_set('load_fonts', array(
			// Google font
			array(
				'name'	 => 'Lato',
				'family' => 'sans-serif',
				'styles' => '100,100i,300,300i,400,400i,700,700i,900,900i'
				),
            array(
                'name'	 => 'Yanone Kaffeesatz',
                'family' => 'sans-serif',
                'styles' => '200,300,400,500,600,700'
            ),
            array(
				'name'   => 'Pacifico',
				'family' => 'cursive',
                'styles' => '400'
				),
            array(
				'name'   => 'Sigmar One',
				'family' => 'cursive',
                'styles' => '400'
				),
		));
		
		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		unitravel_storage_set('load_fonts_subset', 'latin,latin-ext');
		
		// Settings of the main tags
		unitravel_storage_set('theme_fonts', array(
			'p' => array(
				'title'				=> esc_html__('Main text', 'unitravel'),
				'description'		=> esc_html__('Font settings of the main text of the site', 'unitravel'),
				'font-family'		=> 'Lato, sans-serif',
				'font-size' 		=> '1rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.6rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '0rem',
				'margin-bottom'		=> '1.5rem'
				),
			'h1' => array(
				'title'				=> esc_html__('Heading 1', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '6.429rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '6.929rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.6rem',
				'margin-bottom'		=> '1.6rem'
				),
			'h2' => array(
				'title'				=> esc_html__('Heading 2', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '5.357rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '5.714rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '9.5rem',
				'margin-bottom'		=> '1.65rem'
				),
			'h3' => array(
				'title'				=> esc_html__('Heading 3', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '3.429rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '3.714rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '9.7rem',
				'margin-bottom'		=> '1.9rem'
				),
			'h4' => array(
				'title'				=> esc_html__('Heading 4', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '2.571rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '2.571rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '9.7rem',
				'margin-bottom'		=> '1.8rem'
				),
			'h5' => array(
				'title'				=> esc_html__('Heading 5', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '2.143rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '2.357rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '9.6rem',
				'margin-bottom'		=> '1.7rem'
				),
			'h6' => array(
				'title'				=> esc_html__('Heading 6', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '1.357rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.571rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '9.75rem',
				'margin-bottom'		=> '1.35rem'
				),
			'logo' => array(
				'title'				=> esc_html__('Logo text', 'unitravel'),
				'description'		=> esc_html__('Font settings of the text case of the logo', 'unitravel'),
				'font-family'		=> 'Sigmar One, cursive',
				'font-size' 		=> '1.6rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.714rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'button' => array(
				'title'				=> esc_html__('Buttons', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '1.357rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.357rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				),
			'input' => array(
				'title'				=> esc_html__('Input fields', 'unitravel'),
				'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'unitravel'),
				'font-family'		=> 'Lato, sans-serif',
				'font-size' 		=> '1em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.2em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'info' => array(
				'title'				=> esc_html__('Post meta', 'unitravel'),
				'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '1em',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '0.4em',
				'margin-bottom'		=> ''
				),
			'menu' => array(
				'title'				=> esc_html__('Main menu', 'unitravel'),
				'description'		=> esc_html__('Font settings of the main menu items', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '1.357rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.357rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				),
			'submenu' => array(
				'title'				=> esc_html__('Dropdown menu', 'unitravel'),
				'description'		=> esc_html__('Font settings of the dropdown menu items', 'unitravel'),
				'font-family'		=> 'Yanone Kaffeesatz, sans-serif',
				'font-size' 		=> '1.357rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '2rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				),
            'subtitle' => array(
                'title'				=> esc_html__('Subtitle item', 'unitravel'),
                'description'		=> esc_html__('Font settings of subtitle items', 'unitravel'),
                'font-family'		=> 'Pacifico, cursive',
                'font-size' 		=> '1.286rem',
                'font-weight'		=> '400',
                'font-style'		=> 'normal',
                'line-height'		=> '1.286rem',
                'text-decoration'	=> 'none',
                'text-transform'	=> 'none',
                'letter-spacing'	=> '0px'
            ),
		));
		
		
		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		unitravel_storage_set('schemes', array(
		
			// Color scheme: 'default'
			'default' => array(
				'title'	 => esc_html__('Default', 'unitravel'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'				=> '#ffffff',
					'bd_color'				=> '#e5e5e5',
		
					// Text and links colors
					'text'					=> '#818892',
					'text_light'			=> '#423e42',
					'text_dark'				=> '#4b5664',
					'text_link'				=> '#fcb040',
					'text_hover'			=> '#4b5664',
		
					// Alternative blocks (submenu, buttons, tabs, etc.)
					'alter_bg_color'		=> '#373337',
					'alter_bg_hover'		=> '#696669',
					'alter_bd_color'		=> '#e5e5e5',
					'alter_bd_hover'		=> '#dadada',
					'alter_text'			=> '#333333',
					'alter_light'			=> '#b7b7b7',
					'alter_dark'			=> '#000000',
					'alter_link'			=> '#fe7259',
					'alter_hover'			=> '#72cfd5',
		
					// Input fields (form's fields and textarea)
					'input_bg_color'		=> '#f0f2f8',
					'input_bg_hover'		=> '#faf9f5',
					'input_bd_color'		=> '#f0f2f8',
					'input_bd_hover'		=> '#fcb040',
					'input_text'			=> '#818892',
					'input_light'			=> '#e5e5e5',
					'input_dark'			=> '#1d1d1d',
					
					// Inverse blocks (text and links on accented bg)
					'inverse_text'			=> '#ffffff',
					'inverse_light'			=> '#333333',
					'inverse_dark'			=> '#000000',
					'inverse_link'			=> '#ffffff',
					'inverse_hover'			=> '#1d1d1d',
		
					// Additional accented colors (if used in the current theme)

				)
			),
		
			// Color scheme: 'dark'
			'dark' => array(
				'title'  => esc_html__('Dark', 'unitravel'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'				=> '#0e0d12',
					'bd_color'				=> '#1c1b1f',
		
					// Text and links colors
					'text'					=> '#b7b7b7',
					'text_light'			=> '#5f5f5f',
					'text_dark'				=> '#ffffff',
					'text_link'				=> '#fe7259',
					'text_hover'			=> '#ffaa5f',
		
					// Alternative blocks (submenu, buttons, tabs, etc.)
					'alter_bg_color'		=> '#1e1d22',
					'alter_bg_hover'		=> '#28272e',
					'alter_bd_color'		=> '#313131',
					'alter_bd_hover'		=> '#3d3d3d',
					'alter_text'			=> '#a6a6a6',
					'alter_light'			=> '#5f5f5f',
					'alter_dark'			=> '#ffffff',
					'alter_link'			=> '#ffaa5f',
					'alter_hover'			=> '#fe7259',
		
					// Input fields (form's fields and textarea)
					'input_bg_color'		=> '#2e2d32',
					'input_bg_hover'		=> '#2e2d32',
					'input_bd_color'		=> '#2e2d32',
					'input_bd_hover'		=> '#353535',
					'input_text'			=> '#b7b7b7',
					'input_light'			=> '#5f5f5f',
					'input_dark'			=> '#ffffff',
					
					// Inverse blocks (text and links on accented bg)
					'inverse_text'			=> '#1d1d1d',
					'inverse_light'			=> '#5f5f5f',
					'inverse_dark'			=> '#000000',
					'inverse_link'			=> '#ffffff',
					'inverse_hover'			=> '#1d1d1d',
				
					// Additional accented colors (if used in the current theme)

				)
			)
		
		));
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if (!function_exists('unitravel_options_create')) {

	function unitravel_options_create() {

		$need_lists = is_admin() && unitravel_options_need_lists();

		unitravel_storage_set('options', array(
		
			// Section 'Title & Tagline' - add theme options in the standard WP section
			'title_tagline' => array(
				"title" => esc_html__('Title, Tagline & Site icon', 'unitravel'),
				"desc" => wp_kses_data( __('Specify site title and tagline (if need) and upload the site icon', 'unitravel') ),
				"type" => "section"
				),
		
		
			// Section 'Header' - add theme options in the standard WP section
			'header_image' => array(
				"title" => esc_html__('Header', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload logo images, select header type and widgets set for the header', 'unitravel') )
							. '<br>'
							. wp_kses_data( __('<b>Attention!</b> Some of these options can be overridden in the following sections (Homepage, Blog archive, Shop, Events, etc.) or in the settings of individual pages', 'unitravel') ),
				"type" => "section"
				),
			'header_image_override' => array(
				"title" => esc_html__('Header image override', 'unitravel'),
				"desc" => wp_kses_data( __("Allow override the header image with the page's/post's/product's/etc. featured image", 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_style' => array(
				"title" => esc_html__('Header style', 'unitravel'),
				"desc" => wp_kses_data( __('Select style to display the site header', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"std" => 'header-default',
				"options" => !$need_lists ? array() : unitravel_get_list_header_styles(),
				"type" => "select"
				),
			'header_position' => array(
				"title" => esc_html__('Header position', 'unitravel'),
				"desc" => wp_kses_data( __('Select position to display the site header', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"std" => 'default',
				"options" => !$need_lists ? array() : unitravel_get_list_header_positions(),
				"type" => "select"
				),
			'header_widgets' => array(
				"title" => esc_html__('Header widgets', 'unitravel'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on each page', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on this page', 'unitravel') ),
				),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(false, true),
				"type" => "select"
				),
			'header_columns' => array(
				"title" => esc_html__('Header columns', 'unitravel'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"dependency" => array(
					'header_style' => array('header-default'),
					'header_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => !$need_lists ? array() : unitravel_get_list_range(0,6),
				"type" => "select"
				),
			'header_scheme' => array(
				"title" => esc_html__('Header Color Scheme', 'unitravel'),
				"desc" => wp_kses_data( __('Select color scheme to decorate header area', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
            'inverse_header' => array(
                "title" => esc_html__('Inverse header', 'unitravel'),
                "desc" => wp_kses_data( __('Inverse header color scheme', 'unitravel') ),
                "override" => array(
                    'mode' => 'page',
                    'section' => esc_html__('Header', 'unitravel')
                ),
                "std" => 0,
                "type" => "checkbox"
            ),
			'header_fullheight' => array(
				"title" => esc_html__('Header fullheight', 'unitravel'),
				"desc" => wp_kses_data( __("Enlarge header area to fill whole screen. Used only if header have a background image", 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_wide' => array(
				"title" => esc_html__('Header fullwide', 'unitravel'),
				"desc" => wp_kses_data( __('Do you want to stretch the header widgets area to the entire window width?', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"dependency" => array(
					'header_style' => array('header-default')
				),
				"std" => 1,
				"type" => "checkbox"
				),
            'top_panel_title_hide' => array(
                "title" => esc_html__('Hide title and breadcrumbs in header', 'unitravel'),
                "desc" => wp_kses_data( __("Hide title and breadcrumbs in header", 'unitravel') ),
                "override" => array(
                    'mode' => 'page',
                    'section' => esc_html__('Header', 'unitravel')
                ),
                "std" => 0,
                "type" => "checkbox"
            ),

			'menu_info' => array(
				"title" => esc_html__('Menu settings', 'unitravel'),
				"desc" => wp_kses_data( __('Select main menu style, position, color scheme and other parameters', 'unitravel') ),
				"type" => "info"
				),
			'menu_style' => array(
				"title" => esc_html__('Menu position', 'unitravel'),
				"desc" => wp_kses_data( __('Select position of the main menu', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"std" => 'top',
				"options" => !$need_lists ? array() : array(
					'top'	=> esc_html__('Top',	'unitravel'),
					'left'	=> esc_html__('Left',	'unitravel'),
					'right'	=> esc_html__('Right',	'unitravel')
				),
				"type" => "switch"
				),
			'menu_scheme' => array(
				"title" => esc_html__('Menu Color Scheme', 'unitravel'),
				"desc" => wp_kses_data( __('Select color scheme to decorate main menu area', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'menu_side_stretch' => array(
				"title" => esc_html__('Stretch sidemenu', 'unitravel'),
				"desc" => wp_kses_data( __('Stretch sidemenu to window height (if menu items number >= 5)', 'unitravel') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_side_icons' => array(
				"title" => esc_html__('Iconed sidemenu', 'unitravel'),
				"desc" => wp_kses_data( __('Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'unitravel') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_mobile_fullscreen' => array(
				"title" => esc_html__('Mobile menu fullscreen', 'unitravel'),
				"desc" => wp_kses_data( __('Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'unitravel') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'logo' => array(
				"title" => esc_html__('Logo', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload site logo', 'unitravel') ),
				"std" => '',
                "override" => array(
                    'mode' => 'page',
                    'section' => esc_html__('Header', 'unitravel'),
                    "desc" => wp_kses_data( __('Select set of widgets to show in the header on this page', 'unitravel') ),
                ),
				"type" => "image"
				),
			'logo_retina' => array(
				"title" => esc_html__('Logo for Retina', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'unitravel') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse' => array(
				"title" => esc_html__('Logo inverse', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it on the dark background', 'unitravel') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse_retina' => array(
				"title" => esc_html__('Logo inverse for Retina', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'unitravel') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side' => array(
				"title" => esc_html__('Logo side', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu', 'unitravel') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side_retina' => array(
				"title" => esc_html__('Logo side for Retina', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'unitravel') ),
				"std" => '',
				"type" => "image"
				),
			'logo_text' => array(
				"title" => esc_html__('Logo from Site name', 'unitravel'),
				"desc" => wp_kses_data( __('Do you want use Site name and description as Logo if images above are not selected?', 'unitravel') ),
				"std" => 1,
				"type" => "checkbox"
				),
			
		
		
			// Section 'Content'
			'content' => array(
				"title" => esc_html__('Content', 'unitravel'),
				"desc" => wp_kses_data( __('Options for the content area.', 'unitravel') )
							. '<br>'
							. wp_kses_data( __('<b>Attention!</b> Some of these options can be overridden in the following sections (Homepage, Blog archive, Shop, Events, etc.) or in the settings of individual pages', 'unitravel') ),
				"type" => "section",
				),
			'body_style' => array(
				"title" => esc_html__('Body style', 'unitravel'),
				"desc" => wp_kses_data( __('Select width of the body content', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"refresh" => false,
				"std" => 'wide',
				"options" => !$need_lists ? array() : array(
					'boxed'		=> esc_html__('Boxed',		'unitravel'),
					'wide'		=> esc_html__('Wide',		'unitravel'),
					'fullwide'	=> esc_html__('Fullwide',	'unitravel'),
					'fullscreen'=> esc_html__('Fullscreen',	'unitravel')
				),
				"type" => "select"
				),
			'color_scheme' => array(
				"title" => esc_html__('Site Color Scheme', 'unitravel'),
				"desc" => wp_kses_data( __('Select color scheme to decorate whole site. Attention! Case "Inherit" can be used only for custom pages, not for root site content in the Appearance - Customize', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"std" => 'default',
				"options" => !$need_lists ? array() : unitravel_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'expand_content' => array(
				"title" => esc_html__('Expand content', 'unitravel'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'unitravel')
				),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'remove_margins' => array(
				"title" => esc_html__('Remove margins', 'unitravel'),
				"desc" => wp_kses_data( __('Remove margins above and below the content area', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'unitravel')
				),
				"refresh" => false,
				"std" => 0,
				"type" => "checkbox"
				),
			'seo_snippets' => array(
				"title" => esc_html__('SEO snippets', 'unitravel'),
				"desc" => wp_kses_data( __('Add structured data markup to the single posts and pages', 'unitravel') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'privacy_text' => array(
				"title" => esc_html__("Text with Privacy Policy link", 'unitravel'),
				"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'unitravel') ),
				"std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'unitravel'), 'unitravel_kses_content' ),
				"type"  => "text"
			),
			'border_radius' => array(
				"title" => esc_html__('Border radius', 'unitravel'),
				"desc" => wp_kses_data( __('Specify the border radius of the form fields and buttons in pixels or other valid CSS units', 'unitravel') ),
				"std" => 0,
				"type" => "text"
				),
			'boxed_bg_image' => array(
				"title" => esc_html__('Boxed bg image', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload image, used as background in the boxed body', 'unitravel') ),
				"dependency" => array(
					'body_style' => array('boxed')
				),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"std" => '',
				"type" => "image"
				),
			'no_image' => array(
				"title" => esc_html__('No image placeholder', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload image, used as placeholder for the posts without featured image', 'unitravel') ),
				"std" => '',
				"type" => "image"
				),
			'sidebar_widgets' => array(
				"title" => esc_html__('Sidebar widgets', 'unitravel'),
				"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'unitravel')
				),
				"std" => 'sidebar_widgets',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(false, true),
				"type" => "select"
				),
			'sidebar_scheme' => array(
				"title" => esc_html__('Sidebar Color Scheme', 'unitravel'),
				"desc" => wp_kses_data( __('Select color scheme to decorate sidebar', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'unitravel')
				),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_schemes(true),
				"refresh" => false,
				"type" => "hidden"
				),
			'sidebar_position' => array(
				"title" => esc_html__('Sidebar position', 'unitravel'),
				"desc" => wp_kses_data( __('Select position to show sidebar', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'unitravel')
				),
				"refresh" => false,
				"std" => 'right',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars_positions(),
				"type" => "select"
				),
			'hide_sidebar_on_single' => array(
				"title" => esc_html__('Hide sidebar on the single post', 'unitravel'),
				"desc" => wp_kses_data( __("Hide sidebar on the single post's pages", 'unitravel') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'widgets_above_page' => array(
				"title" => esc_html__('Widgets above the page', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'unitravel')
				),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(false, true),
				"type" => "select"
				),
			'widgets_above_content' => array(
				"title" => esc_html__('Widgets above the content', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'unitravel')
				),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(false, true),
				"type" => "select"
				),
			'widgets_below_content' => array(
				"title" => esc_html__('Widgets below the content', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'unitravel')
				),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(false, true),
				"type" => "select"
				),
			'widgets_below_page' => array(
				"title" => esc_html__('Widgets below the page', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'unitravel')
				),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(false, true),
				"type" => "select"
				),
		
		
		
			// Section 'Footer'
			'footer' => array(
				"title" => esc_html__('Footer', 'unitravel'),
				"desc" => wp_kses_data( __('Select set of widgets and columns number for the site footer', 'unitravel') )
							. '<br>'
							. wp_kses_data( __('<b>Attention!</b> Some of these options can be overridden in the following sections (Homepage, Blog archive, Shop, Events, etc.) or in the settings of individual pages', 'unitravel') ),
				"type" => "section"
				),
			'footer_style' => array(
				"title" => esc_html__('Footer style', 'unitravel'),
				"desc" => wp_kses_data( __('Select style to display the site footer', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Footer', 'unitravel')
				),
				"std" => 'footer-default',
				"options" => !$need_lists ? array() : apply_filters('unitravel_filter_list_footer_styles', array(
					'footer-default' => esc_html__('Default Footer',	'unitravel')
				)),
				"type" => "select"
				),
			'footer_scheme' => array(
				"title" => esc_html__('Footer Color Scheme', 'unitravel'),
				"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'unitravel')
				),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_schemes(true),
				"refresh" => false,
				"type" => "hidden"
				),
			'footer_widgets' => array(
				"title" => esc_html__('Footer widgets', 'unitravel'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'unitravel')
				),
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"std" => 'footer_widgets',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(false, true),
				"type" => "select"
				),
			'footer_columns' => array(
				"title" => esc_html__('Footer columns', 'unitravel'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'unitravel')
				),
				"dependency" => array(
					'footer_style' => array('footer-default'),
					'footer_widgets' => array('^hide')
				),
				"std" => 4,
				"options" => !$need_lists ? array() : unitravel_get_list_range(0,6),
				"type" => "select"
				),
			'footer_wide' => array(
				"title" => esc_html__('Footer fullwide', 'unitravel'),
				"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'unitravel') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'unitravel')
				),
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_in_footer' => array(
				"title" => esc_html__('Show logo', 'unitravel'),
				"desc" => wp_kses_data( __('Show logo in the footer', 'unitravel') ),
				'refresh' => false,
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_footer' => array(
				"title" => esc_html__('Logo for footer', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the footer', 'unitravel') ),
				"dependency" => array(
					'footer_style' => array('footer-default'),
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'logo_footer_retina' => array(
				"title" => esc_html__('Logo for footer (Retina)', 'unitravel'),
				"desc" => wp_kses_data( __('Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'unitravel') ),
				"dependency" => array(
					'footer_style' => array('footer-default'),
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'socials_in_footer' => array(
				"title" => esc_html__('Show social icons', 'unitravel'),
				"desc" => wp_kses_data( __('Show social icons in the footer (under logo or footer widgets)', 'unitravel') ),
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'copyright' => array(
				"title" => esc_html__('Copyright', 'unitravel'),
				"desc" => wp_kses_data( __('Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'unitravel') ),
				"std" => esc_html__('AncoraThemes &copy; {Y}. All rights reserved. Terms of use and Privacy Policy', 'unitravel'),
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"refresh" => false,
				"type" => "textarea"
				),
		
		
		
			// Section 'Homepage' - settings for home page
			'homepage' => array(
				"title" => esc_html__('Homepage', 'unitravel'),
				"desc" => wp_kses_data( __('Select blog style and widgets to display on the homepage', 'unitravel') ),
				"type" => "section"
				),
			'expand_content_home' => array(
				"title" => esc_html__('Expand content', 'unitravel'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the Homepage', 'unitravel') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style_home' => array(
				"title" => esc_html__('Blog style', 'unitravel'),
				"desc" => wp_kses_data( __('Select posts style for the homepage', 'unitravel') ),
				"std" => 'excerpt',
				"options" => !$need_lists ? array() : unitravel_get_list_blog_styles(),
				"type" => "select"
				),
			'first_post_large_home' => array(
				"title" => esc_html__('First post large', 'unitravel'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of the Homepage', 'unitravel') ),
				"dependency" => array(
					'blog_style_home' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_style_home' => array(
				"title" => esc_html__('Header style', 'unitravel'),
				"desc" => wp_kses_data( __('Select style to display the site header on the homepage', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_header_styles(true),
				"type" => "select"
				),
			'header_position_home' => array(
				"title" => esc_html__('Header position', 'unitravel'),
				"desc" => wp_kses_data( __('Select position to display the site header on the homepage', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_header_positions(true),
				"type" => "select"
				),
			'header_widgets_home' => array(
				"title" => esc_html__('Header widgets', 'unitravel'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the homepage', 'unitravel') ),
				"std" => 'header_widgets',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'sidebar_widgets_home' => array(
				"title" => esc_html__('Sidebar widgets', 'unitravel'),
				"desc" => wp_kses_data( __('Select sidebar to show on the homepage', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'sidebar_position_home' => array(
				"title" => esc_html__('Sidebar position', 'unitravel'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the homepage', 'unitravel') ),
				"refresh" => false,
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars_positions(true),
				"type" => "select"
				),
			'widgets_above_page_home' => array(
				"title" => esc_html__('Widgets above the page', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'unitravel') ),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_above_content_home' => array(
				"title" => esc_html__('Widgets above the content', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'unitravel') ),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_below_content_home' => array(
				"title" => esc_html__('Widgets below the content', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'unitravel') ),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_below_page_home' => array(
				"title" => esc_html__('Widgets below the page', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'unitravel') ),
				"std" => 'hide',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			
		
		
			// Section 'Blog archive'
			'blog' => array(
				"title" => esc_html__('Blog archive', 'unitravel'),
				"desc" => wp_kses_data( __('Options for the blog archive', 'unitravel') ),
				"type" => "section",
				),
			'expand_content_blog' => array(
				"title" => esc_html__('Expand content', 'unitravel'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the blog archive', 'unitravel') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style' => array(
				"title" => esc_html__('Blog style', 'unitravel'),
				"desc" => wp_kses_data( __('Select posts style for the blog archive', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"std" => 'excerpt',
				"options" => !$need_lists ? array() : unitravel_get_list_blog_styles(),
				"type" => "select"
				),
			'blog_columns' => array(
				"title" => esc_html__('Blog columns', 'unitravel'),
				"desc" => wp_kses_data( __('How many columns should be used in the blog archive (from 2 to 4)?', 'unitravel') ),
				"std" => 2,
				"options" => !$need_lists ? array() : unitravel_get_list_range(2,4),
				"type" => "hidden"
				),
			'post_type' => array(
				"title" => esc_html__('Post type', 'unitravel'),
				"desc" => wp_kses_data( __('Select post type to show in the blog archive', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"linked" => 'parent_cat',
				"refresh" => false,
				"hidden" => true,
				"std" => 'post',
				"options" => !$need_lists ? array() : unitravel_get_list_posts_types(),
				"type" => "select"
				),
			'parent_cat' => array(
				"title" => esc_html__('Category to show', 'unitravel'),
				"desc" => wp_kses_data( __('Select category to show in the blog archive', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"refresh" => false,
				"hidden" => true,
				"std" => '0',
				"options" => !$need_lists ? array() : unitravel_array_merge(array(0 => esc_html__('- Select category -', 'unitravel')), unitravel_get_list_categories()),
				"type" => "select"
				),
			'posts_per_page' => array(
				"title" => esc_html__('Posts per page', 'unitravel'),
				"desc" => wp_kses_data( __('How many posts will be displayed on this page', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"hidden" => true,
				"std" => '10',
				"type" => "text"
				),
			"blog_pagination" => array( 
				"title" => esc_html__('Pagination style', 'unitravel'),
				"desc" => wp_kses_data( __('Show Older/Newest posts or Page numbers below the posts list', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"std" => "pages",
				"options" => !$need_lists ? array() : array(
					'pages'	=> esc_html__("Page numbers", 'unitravel'),
					'links'	=> esc_html__("Older/Newest", 'unitravel'),
					'more'	=> esc_html__("Load more", 'unitravel'),
					'infinite' => esc_html__("Infinite scroll", 'unitravel')
				),
				"type" => "select"
				),
			'show_filters' => array(
				"title" => esc_html__('Show filters', 'unitravel'),
				"desc" => wp_kses_data( __('Show categories as tabs to filter posts', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' ),
					'blog_style' => array('portfolio', 'gallery')
				),
				"hidden" => true,
				"std" => 0,
				"type" => "checkbox"
				),
			'first_post_large' => array(
				"title" => esc_html__('First post large', 'unitravel'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of blog archive', 'unitravel') ),
				"dependency" => array(
					'blog_style' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			"blog_content" => array( 
				"title" => esc_html__('Posts content', 'unitravel'),
				"desc" => wp_kses_data( __("Show full post's content in the blog or only post's excerpt", 'unitravel') ),
				"std" => "excerpt",
				"options" => !$need_lists ? array() : array(
					'excerpt'	=> esc_html__('Excerpt',	'unitravel'),
					'fullpost'	=> esc_html__('Full post',	'unitravel')
				),
				"type" => "select"
				),
			'time_diff_before' => array(
				"title" => esc_html__('Time difference', 'unitravel'),
				"desc" => wp_kses_data( __("How many days show time difference instead post's date", 'unitravel') ),
				"std" => 5,
				"type" => "text"
				),
			'related_posts' => array(
				"title" => esc_html__('Related posts', 'unitravel'),
				"desc" => wp_kses_data( __('How many related posts should be displayed in the single post?', 'unitravel') ),
				"std" => 2,
				"options" => !$need_lists ? array() : unitravel_get_list_range(2,4),
				"type" => "hidden"
				),
			'related_style' => array(
				"title" => esc_html__('Related posts style', 'unitravel'),
				"desc" => wp_kses_data( __('Select style of the related posts output', 'unitravel') ),
				"std" => 2,
				"options" => !$need_lists ? array() : unitravel_get_list_styles(1,2),
				"type" => "hidden"
				),
			"blog_animation" => array( 
				"title" => esc_html__('Animation for the posts', 'unitravel'),
				"desc" => wp_kses_data( __('Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'unitravel')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"std" => "none",
				"options" => !$need_lists ? array() : unitravel_get_list_animations_in(),
				"type" => "select"
				),
			'header_style_blog' => array(
				"title" => esc_html__('Header style', 'unitravel'),
				"desc" => wp_kses_data( __('Select style to display the site header on the blog archive', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_header_styles(true),
				"type" => "select"
				),
			'header_position_blog' => array(
				"title" => esc_html__('Header position', 'unitravel'),
				"desc" => wp_kses_data( __('Select position to display the site header on the blog archive', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_header_positions(true),
				"type" => "select"
				),
			'header_widgets_blog' => array(
				"title" => esc_html__('Header widgets', 'unitravel'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the blog archive', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'sidebar_widgets_blog' => array(
				"title" => esc_html__('Sidebar widgets', 'unitravel'),
				"desc" => wp_kses_data( __('Select sidebar to show on the blog archive', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'sidebar_position_blog' => array(
				"title" => esc_html__('Sidebar position', 'unitravel'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the blog archive', 'unitravel') ),
				"refresh" => false,
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars_positions(true),
				"type" => "select"
				),
			'hide_sidebar_on_single_blog' => array(
				"title" => esc_html__('Hide sidebar on the single post', 'unitravel'),
				"desc" => wp_kses_data( __("Hide sidebar on the single post", 'unitravel') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'widgets_above_page_blog' => array(
				"title" => esc_html__('Widgets above the page', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_above_content_blog' => array(
				"title" => esc_html__('Widgets above the content', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_below_content_blog' => array(
				"title" => esc_html__('Widgets below the content', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_below_page_blog' => array(
				"title" => esc_html__('Widgets below the page', 'unitravel'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'unitravel') ),
				"std" => 'inherit',
				"options" => !$need_lists ? array() : unitravel_get_list_sidebars(true, true),
				"type" => "select"
				),
			
		
		
		
			// Section 'Colors' - choose color scheme and customize separate colors from it
			'scheme' => array(
				"title" => esc_html__('* Color scheme editor', 'unitravel'),
				"desc" => wp_kses_data( __("<b>Simple settings</b> - you can change only accented color, used for links, buttons and some accented areas.", 'unitravel') )
						. '<br>'
						. wp_kses_data( __("<b>Advanced settings</b> - change all scheme's colors and get full control over the appearance of your site!", 'unitravel') ),
				"priority" => 1000,
				"type" => "section"
				),
		
			'color_settings' => array(
				"title" => esc_html__('Color settings', 'unitravel'),
				"desc" => '',
				"std" => 'simple',
				"options" => !$need_lists ? array() : array(
					"simple"  => esc_html__("Simple", 'unitravel'),
					"advanced" => esc_html__("Advanced", 'unitravel')
				),
				"refresh" => false,
				"type" => "switch"
				),
		
			'color_scheme_editor' => array(
				"title" => esc_html__('Color Scheme', 'unitravel'),
				"desc" => wp_kses_data( __('Select color scheme to edit colors', 'unitravel') ),
				"std" => 'default',
				"options" => !$need_lists ? array() : unitravel_get_list_schemes(),
				"refresh" => false,
				"type" => "select"
				),
		
			'scheme_storage' => array(
				"title" => esc_html__('Colors storage', 'unitravel'),
				"desc" => esc_html__('Hidden storage of the all color from the all color shemes (only for internal usage)', 'unitravel'),
				"std" => '',
				"refresh" => false,
				"type" => "hidden"
				),
		
			'scheme_info_single' => array(
				"title" => esc_html__('Colors for single post/page', 'unitravel'),
				"desc" => wp_kses_data( __('Specify colors for single post/page (not for alter blocks)', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
				
			'bg_color' => array(
				"title" => esc_html__('Background color', 'unitravel'),
				"desc" => wp_kses_data( __('Background color of the whole page', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'bd_color' => array(
				"title" => esc_html__('Border color', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the bordered elements, separators, etc.', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'text' => array(
				"title" => esc_html__('Text', 'unitravel'),
				"desc" => wp_kses_data( __('Plain text color on single page/post', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_light' => array(
				"title" => esc_html__('Light text', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the post meta: post date and author, comments number, etc.', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_dark' => array(
				"title" => esc_html__('Dark text', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the headers, strong text, etc.', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_link' => array(
				"title" => esc_html__('Links', 'unitravel'),
				"desc" => wp_kses_data( __('Color of links and accented areas', 'unitravel') ),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_hover' => array(
				"title" => esc_html__('Links hover', 'unitravel'),
				"desc" => wp_kses_data( __('Hover color for links and accented areas', 'unitravel') ),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_alter' => array(
				"title" => esc_html__('Colors for alternative blocks', 'unitravel'),
				"desc" => wp_kses_data( __('Specify colors for alternative blocks - rectangular blocks with its own background color (posts in homepage, blog archive, search results, widgets on sidebar, footer, etc.)', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'alter_bg_color' => array(
				"title" => esc_html__('Alter background color', 'unitravel'),
				"desc" => wp_kses_data( __('Background color of the alternative blocks', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bg_hover' => array(
				"title" => esc_html__('Alter hovered background color', 'unitravel'),
				"desc" => wp_kses_data( __('Background color for the hovered state of the alternative blocks', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_color' => array(
				"title" => esc_html__('Alternative border color', 'unitravel'),
				"desc" => wp_kses_data( __('Border color of the alternative blocks', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_hover' => array(
				"title" => esc_html__('Alternative hovered border color', 'unitravel'),
				"desc" => wp_kses_data( __('Border color for the hovered state of the alter blocks', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_text' => array(
				"title" => esc_html__('Alter text', 'unitravel'),
				"desc" => wp_kses_data( __('Text color of the alternative blocks', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_light' => array(
				"title" => esc_html__('Alter light', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with alternative background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_dark' => array(
				"title" => esc_html__('Alter dark', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the headers inside block with alternative background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_link' => array(
				"title" => esc_html__('Alter link', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the links inside block with alternative background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_hover' => array(
				"title" => esc_html__('Alter hover', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with alternative background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_input' => array(
				"title" => esc_html__('Colors for the form fields', 'unitravel'),
				"desc" => wp_kses_data( __('Specify colors for the form fields and textareas', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'input_bg_color' => array(
				"title" => esc_html__('Inactive background', 'unitravel'),
				"desc" => wp_kses_data( __('Background color of the inactive form fields', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bg_hover' => array(
				"title" => esc_html__('Active background', 'unitravel'),
				"desc" => wp_kses_data( __('Background color of the focused form fields', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_color' => array(
				"title" => esc_html__('Inactive border', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the border in the inactive form fields', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_hover' => array(
				"title" => esc_html__('Active border', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the border in the focused form fields', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_text' => array(
				"title" => esc_html__('Inactive field', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the text in the inactive fields', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_light' => array(
				"title" => esc_html__('Disabled field', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the disabled field', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_dark' => array(
				"title" => esc_html__('Active field', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the active field', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_inverse' => array(
				"title" => esc_html__('Colors for inverse blocks', 'unitravel'),
				"desc" => wp_kses_data( __('Specify colors for inverse blocks, rectangular blocks with background color equal to the links color or one of accented colors (if used in the current theme)', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'inverse_text' => array(
				"title" => esc_html__('Inverse text', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the text inside block with accented background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_light' => array(
				"title" => esc_html__('Inverse light', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with accented background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_dark' => array(
				"title" => esc_html__('Inverse dark', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the headers inside block with accented background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_link' => array(
				"title" => esc_html__('Inverse link', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the links inside block with accented background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_hover' => array(
				"title" => esc_html__('Inverse hover', 'unitravel'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with accented background', 'unitravel') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$unitravel_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),


			// Section 'Hidden'
			'media_title' => array(
				"title" => esc_html__('Media title', 'unitravel'),
				"desc" => wp_kses_data( __('Used as title for the audio and video item in this post', 'unitravel') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'unitravel')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),
			'media_author' => array(
				"title" => esc_html__('Media author', 'unitravel'),
				"desc" => wp_kses_data( __('Used as author name for the audio and video item in this post', 'unitravel') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'unitravel')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),


			// Internal options.
			// Attention! Don't change any options in the section below!
			'reset_options' => array(
				"title" => '',
				"desc" => '',
				"std" => '0',
				"type" => "hidden",
				),

		));


		// Prepare panel 'Fonts'
		$fonts = array(
		
			// Panel 'Fonts' - manage fonts loading and set parameters of the base theme elements
			'fonts' => array(
				"title" => esc_html__('* Fonts settings', 'unitravel'),
				"desc" => '',
				"priority" => 1500,
				"type" => "panel"
				),

			// Section 'Load_fonts'
			'load_fonts' => array(
				"title" => esc_html__('Load fonts', 'unitravel'),
				"desc" => wp_kses_data( __('Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'unitravel') )
						. '<br>'
						. wp_kses_data( __('<b>Attention!</b> Press "Refresh" button to reload preview area after the all fonts are changed', 'unitravel') ),
				"type" => "section"
				),
			'load_fonts_subset' => array(
				"title" => esc_html__('Google fonts subsets', 'unitravel'),
				"desc" => wp_kses_data( __('Specify comma separated list of the subsets which will be load from Google fonts', 'unitravel') )
						. '<br>'
						. wp_kses_data( __('Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'unitravel') ),
				"refresh" => false,
				"std" => '$unitravel_get_load_fonts_subset',
				"type" => "text"
				)
		);

		for ($i=1; $i<=unitravel_get_theme_setting('max_load_fonts'); $i++) {
			$fonts["load_fonts-{$i}-info"] = array(
				"title" => esc_html(sprintf(__('Font %s', 'unitravel'), $i)),
				"desc" => '',
				"type" => "info",
				);
			$fonts["load_fonts-{$i}-name"] = array(
				"title" => esc_html__('Font name', 'unitravel'),
				"desc" => '',
				"refresh" => false,
				"std" => '$unitravel_get_load_fonts_option',
				"type" => "text"
				);
			$fonts["load_fonts-{$i}-family"] = array(
				"title" => esc_html__('Font family', 'unitravel'),
				"desc" => $i==1 
							? wp_kses_data( __('Select font family to use it if font above is not available', 'unitravel') )
							: '',
				"refresh" => false,
				"std" => '$unitravel_get_load_fonts_option',
				"options" => !$need_lists ? array() : array(
					'inherit' => esc_html__("Inherit", 'unitravel'),
					'serif' => esc_html__('serif', 'unitravel'),
					'sans-serif' => esc_html__('sans-serif', 'unitravel'),
					'monospace' => esc_html__('monospace', 'unitravel'),
					'cursive' => esc_html__('cursive', 'unitravel'),
					'fantasy' => esc_html__('fantasy', 'unitravel')
				),
				"type" => "select"
				);
			$fonts["load_fonts-{$i}-styles"] = array(
				"title" => esc_html__('Font styles', 'unitravel'),
				"desc" => $i==1 
							? wp_kses_data( __('Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'unitravel') )
											. '<br>'
								. wp_kses_data( __('<b>Attention!</b> Each weight and style increase download size! Specify only used weights and styles.', 'unitravel') )
							: '',
				"refresh" => false,
				"std" => '$unitravel_get_load_fonts_option',
				"type" => "text"
				);
		}
		$fonts['load_fonts_end'] = array(
			"type" => "section_end"
			);

		// Sections with font's attributes for each theme element
		$theme_fonts = unitravel_get_theme_fonts();
		foreach ($theme_fonts as $tag=>$v) {
			$fonts["{$tag}_section"] = array(
				"title" => !empty($v['title']) 
								? $v['title'] 
								: esc_html(sprintf(__('%s settings', 'unitravel'), $tag)),
				"desc" => !empty($v['description']) 
								? $v['description'] 
								: wp_kses_post( sprintf(__('Font settings of the "%s" tag.', 'unitravel'), $tag) ),
				"type" => "section",
				);
	
			foreach ($v as $css_prop=>$css_value) {
				if (in_array($css_prop, array('title', 'description'))) continue;
				$options = '';
				$type = 'text';
				$title = ucfirst(str_replace('-', ' ', $css_prop));
				if ($css_prop == 'font-family') {
					$type = 'select';
					$options = !$need_lists ? array() : unitravel_get_list_load_fonts(true);
				} else if ($css_prop == 'font-weight') {
					$type = 'select';
					$options = !$need_lists ? array() : array(
						'inherit' => esc_html__("Inherit", 'unitravel'),
						'100' => esc_html__('100 (Light)', 'unitravel'), 
						'200' => esc_html__('200 (Light)', 'unitravel'), 
						'300' => esc_html__('300 (Thin)',  'unitravel'),
						'400' => esc_html__('400 (Normal)', 'unitravel'),
						'500' => esc_html__('500 (Semibold)', 'unitravel'),
						'600' => esc_html__('600 (Semibold)', 'unitravel'),
						'700' => esc_html__('700 (Bold)', 'unitravel'),
						'800' => esc_html__('800 (Black)', 'unitravel'),
						'900' => esc_html__('900 (Black)', 'unitravel')
					);
				} else if ($css_prop == 'font-style') {
					$type = 'select';
					$options = !$need_lists ? array() : array(
						'inherit' => esc_html__("Inherit", 'unitravel'),
						'normal' => esc_html__('Normal', 'unitravel'), 
						'italic' => esc_html__('Italic', 'unitravel')
					);
				} else if ($css_prop == 'text-decoration') {
					$type = 'select';
					$options = !$need_lists ? array() : array(
						'inherit' => esc_html__("Inherit", 'unitravel'),
						'none' => esc_html__('None', 'unitravel'), 
						'underline' => esc_html__('Underline', 'unitravel'),
						'overline' => esc_html__('Overline', 'unitravel'),
						'line-through' => esc_html__('Line-through', 'unitravel')
					);
				} else if ($css_prop == 'text-transform') {
					$type = 'select';
					$options = !$need_lists ? array() : array(
						'inherit' => esc_html__("Inherit", 'unitravel'),
						'none' => esc_html__('None', 'unitravel'), 
						'uppercase' => esc_html__('Uppercase', 'unitravel'),
						'lowercase' => esc_html__('Lowercase', 'unitravel'),
						'capitalize' => esc_html__('Capitalize', 'unitravel')
					);
				}
				$fonts["{$tag}_{$css_prop}"] = array(
					"title" => $title,
					"desc" => '',
					"refresh" => false,
					"std" => '$unitravel_get_theme_fonts_option',
					"options" => $options,
					"type" => $type
				);
			}
			
			$fonts["{$tag}_section_end"] = array(
				"type" => "section_end"
				);
		}

		$fonts['fonts_end'] = array(
			"type" => "panel_end"
			);

		// Add fonts parameters into Theme Options
		unitravel_storage_merge_array('options', '', $fonts);

		// Add Header Video if WP version < 4.7
		if (!function_exists('get_header_video_url')) {
			unitravel_storage_set_array_after('options', 'header_image_override', 'header_video', array(
				"title" => esc_html__('Header video', 'unitravel'),
				"desc" => wp_kses_data( __("Select video to use it as background for the header", 'unitravel') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'unitravel')
				),
				"std" => '',
				"type" => "video"
				)
			);
		}
	}
}




// -----------------------------------------------------------------
// -- Create and manage Theme Options
// -----------------------------------------------------------------

// Theme init priorities:
// 2 - create Theme Options
if (!function_exists('unitravel_options_theme_setup2')) {
	add_action( 'after_setup_theme', 'unitravel_options_theme_setup2', 2 );
	function unitravel_options_theme_setup2() {
		unitravel_options_create();
	}
}

// Step 1: Load default settings and previously saved mods
if (!function_exists('unitravel_options_theme_setup5')) {
	add_action( 'after_setup_theme', 'unitravel_options_theme_setup5', 5 );
	function unitravel_options_theme_setup5() {
		unitravel_storage_set('options_reloaded', false);
		unitravel_load_theme_options();
	}
}

// Step 2: Load current theme customization mods
if (is_customize_preview()) {
	if (!function_exists('unitravel_load_custom_options')) {
		add_action( 'wp_loaded', 'unitravel_load_custom_options' );
		function unitravel_load_custom_options() {
			if (!unitravel_storage_get('options_reloaded')) {
				unitravel_storage_set('options_reloaded', true);
				unitravel_load_theme_options();
			}
		}
	}
}

// Load current values for each customizable option
if ( !function_exists('unitravel_load_theme_options') ) {
	function unitravel_load_theme_options() {
		$options = unitravel_storage_get('options');
		$reset = (int) get_theme_mod('reset_options', 0);
		foreach ($options as $k=>$v) {
			if (isset($v['std'])) {
				if (strpos($v['std'], '$unitravel_')!==false) {
					$func = substr($v['std'], 1);
					if (function_exists($func)) {
						$v['std'] = $func($k);
					}
				}
				$value = $v['std'];
				if (!$reset) {
					if (isset($_GET[$k]))
						$value = sanitize_text_field($_GET[$k]);
					else {
						$tmp = get_theme_mod($k, -987654321);
						if ($tmp != -987654321) $value = $tmp;
					}
				}
				unitravel_storage_set_array2('options', $k, 'val', $value);
				if ($reset) remove_theme_mod($k);
			}
		}
		if ($reset) {
			// Unset reset flag
			set_theme_mod('reset_options', 0);
			// Regenerate CSS with default colors and fonts
			unitravel_customizer_save_css();
		} else {
			do_action('unitravel_action_load_options');
		}
	}
}

// Override options with stored page/post meta
if ( !function_exists('unitravel_override_theme_options') ) {
	add_action( 'wp', 'unitravel_override_theme_options', 1 );
	function unitravel_override_theme_options($query=null) {
		if (is_page_template('blog.php')) {
			unitravel_storage_set('blog_archive', true);
			unitravel_storage_set('blog_template', get_the_ID());
		}
		unitravel_storage_set('blog_mode', unitravel_detect_blog_mode());
		if (is_singular()) {
			unitravel_storage_set('options_meta', get_post_meta(get_the_ID(), 'unitravel_options', true));
		}
	}
}


// Return customizable option value
if (!function_exists('unitravel_get_theme_option')) {
	function unitravel_get_theme_option($name, $defa='', $strict_mode=false, $post_id=0) {
		$rez = $defa;
		$from_post_meta = false;
		if ($post_id > 0) {
			if (!unitravel_storage_isset('post_options_meta', $post_id))
				unitravel_storage_set_array('post_options_meta', $post_id, get_post_meta($post_id, 'unitravel_options', true));
			if (unitravel_storage_isset('post_options_meta', $post_id, $name)) {
				$tmp = unitravel_storage_get_array('post_options_meta', $post_id, $name);
				if (!unitravel_is_inherit($tmp)) {
					$rez = $tmp;
					$from_post_meta = true;
				}
			}
		}
		if (!$from_post_meta && unitravel_storage_isset('options')) {
			if ( !unitravel_storage_isset('options', $name) ) {
				$rez = $tmp = '_not_exists_';
				if (function_exists('trx_addons_get_option'))
					$rez = trx_addons_get_option($name, $tmp, false);
				if ($rez === $tmp) {
					if ($strict_mode) {
						$s = debug_backtrace();
						$s = array_shift($s);
						echo '<pre>' . sprintf(esc_html__('Undefined option "%s" called from:', 'unitravel'), $name);
						if (function_exists('dco')) dco($s);
						else print_r($s);
						echo '</pre>';
						wp_die();
					} else
						$rez = $defa;
				}
			} else {
				$blog_mode = unitravel_storage_get('blog_mode');
				// Override option from GET or POST for current blog mode
				if (!empty($blog_mode) && isset($_REQUEST[$name . '_' . $blog_mode])) {
					$rez = sanitize_text_field($_REQUEST[$name . '_' . $blog_mode]);
				// Override option from GET
				} else if (isset($_REQUEST[$name])) {
					$rez = sanitize_text_field($_REQUEST[$name]);
				// Override option from current page settings (if exists)
				} else if (unitravel_storage_isset('options_meta', $name) && !unitravel_is_inherit(unitravel_storage_get_array('options_meta', $name))) {
					$rez = unitravel_storage_get_array('options_meta', $name);
				// Override option from current blog mode settings: 'home', 'search', 'page', 'post', 'blog', etc. (if exists)
				} else if (!empty($blog_mode) && unitravel_storage_isset('options', $name . '_' . $blog_mode, 'val') && !unitravel_is_inherit(unitravel_storage_get_array('options', $name . '_' . $blog_mode, 'val'))) {
					$rez = unitravel_storage_get_array('options', $name . '_' . $blog_mode, 'val');
				// Get saved option value
				} else if (unitravel_storage_isset('options', $name, 'val')) {
					$rez = unitravel_storage_get_array('options', $name, 'val');
				// Get ThemeREX Addons option value
				} else if (function_exists('trx_addons_get_option')) {
					$rez = trx_addons_get_option($name, $defa, false);
				}
			}
		}
		return $rez;
	}
}


// Check if customizable option exists
if (!function_exists('unitravel_check_theme_option')) {
	function unitravel_check_theme_option($name) {
		return unitravel_storage_isset('options', $name);
	}
}

// Check if theme options need lists
if (!function_exists('unitravel_options_need_lists')) {
	function unitravel_options_need_lists() {
		return apply_filters('unitravel_filter_options_need_lists', is_admin() && unitravel_check_url(array('post.php', 'post-new.php', 'customize.php'), true));
	}
}

// Get dependencies list from the Theme Options
if ( !function_exists('unitravel_get_theme_dependencies') ) {
	function unitravel_get_theme_dependencies() {
		$options = unitravel_storage_get('options');
		$depends = array();
		foreach ($options as $k=>$v) {
			if (isset($v['dependency'])) 
				$depends[$k] = $v['dependency'];
		}
		return $depends;
	}
}

// Return internal theme setting value
if (!function_exists('unitravel_get_theme_setting')) {
	function unitravel_get_theme_setting($name) {
		return unitravel_storage_isset('settings', $name) ? unitravel_storage_get_array('settings', $name) : false;
	}
}

// Set theme setting
if ( !function_exists( 'unitravel_set_theme_setting' ) ) {
	function unitravel_set_theme_setting($option_name, $value) {
		if (unitravel_storage_isset('settings', $option_name))
			unitravel_storage_set_array('settings', $option_name, $value);
	}
}
?>