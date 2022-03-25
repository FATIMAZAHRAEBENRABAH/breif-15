<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0.10
 */

// Copyright area
$unitravel_footer_scheme =  unitravel_is_inherit(unitravel_get_theme_option('footer_scheme')) ? unitravel_get_theme_option('color_scheme') : unitravel_get_theme_option('footer_scheme');
$unitravel_copyright_scheme = unitravel_is_inherit(unitravel_get_theme_option('copyright_scheme')) ? $unitravel_footer_scheme : unitravel_get_theme_option('copyright_scheme');
?>
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($unitravel_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap"><?php
            if (unitravel_is_on(unitravel_get_theme_option('logo_in_footer'))) {
                $unitravel_logo_image = '';
                if (unitravel_get_retina_multiplier(2) > 1)
                    $unitravel_logo_image = unitravel_get_theme_option( 'logo_footer_retina' );
                if (empty($unitravel_logo_image))
                    $unitravel_logo_image = unitravel_get_theme_option( 'logo_footer' );
                $unitravel_logo_text   = get_bloginfo( 'name' );
                if (!empty($unitravel_logo_image) || !empty($unitravel_logo_text)) {
                    if (!empty($unitravel_logo_image)) {
                        $unitravel_attr = unitravel_getimagesize($unitravel_logo_image);
                        echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($unitravel_logo_image).'" class="logo_footer_image" alt="'.esc_attr__('logo', 'unitravel').'"'.(!empty($unitravel_attr[3]) ? sprintf(' %s', $unitravel_attr[3]) : '').'></a>' ;
                    } else if (!empty($unitravel_logo_text)) {
                        echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($unitravel_logo_text) . '</a></h1>';
                    }
                }
            }
            ?>
            <div class="copyright_text"><?php
                $unitravel_copyright = unitravel_prepare_macros(unitravel_get_theme_option('copyright'));
                if (!empty($unitravel_copyright)) {
                    unitravel_show_layout(do_shortcode(str_replace(array('{{Y}}', '{Y}'), date('Y'), unitravel_get_theme_option('copyright'))));
                }
                ?></div><?php
                if ( unitravel_is_on(unitravel_get_theme_option('socials_in_footer')) && ($unitravel_output = unitravel_get_socials_links()) != '') {
                    ?><div class="footer_socials socials_wrap"><?php
                    unitravel_show_layout($unitravel_output);
            ?></div><?php
                }
            ?>
		</div>
	</div>
</div>
