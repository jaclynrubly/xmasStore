<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
$storexmas_settings = storexmas_get_theme_options();
/********************** STOREXMAS WORDPRESS DEFAULT PANEL ***********************************/
$wp_customize->add_section('header_image', array(
'title' => __('Header Media', 'storexmas'),
'priority' => 20,
'panel' => 'storexmas_wordpress_default_panel'
));
$wp_customize->add_section('colors', array(
'title' => __('Colors', 'storexmas'),
'priority' => 30,
'panel' => 'storexmas_wordpress_default_panel'
));
$wp_customize->add_section('background_image', array(
'title' => __('Background Image', 'storexmas'),
'priority' => 40,
'panel' => 'storexmas_wordpress_default_panel'
));
$wp_customize->add_section('nav', array(
'title' => __('Navigation', 'storexmas'),
'priority' => 50,
'panel' => 'storexmas_wordpress_default_panel'
));
$wp_customize->add_section('static_front_page', array(
'title' => __('Static Front Page', 'storexmas'),
'priority' => 60,
'panel' => 'storexmas_wordpress_default_panel'
));
$wp_customize->add_section('title_tagline', array(
	'title' => __('Site Title & Logo Options', 'storexmas'),
	'priority' => 10,
	'panel' => 'storexmas_wordpress_default_panel'
));

$wp_customize->add_section('storexmas_custom_header', array(
	'title' => __('StoreXmas Options', 'storexmas'),
	'priority' => 503,
	'panel' => 'storexmas_options_panel'
));
$wp_customize->add_section('storexmas_footer_image', array(
	'title' => __('Footer Background Image', 'storexmas'),
	'priority' => 510,
	'panel' => 'storexmas_options_panel'
));

/********************  STOREXMAS THEME OPTIONS ******************************************/
$wp_customize->add_setting('storexmas_theme_options[storexmas_logo_sitetitle_display]', array(
	'capability' => 'edit_theme_options',
	'default' => $storexmas_settings['storexmas_logo_sitetitle_display'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('storexmas_theme_options[storexmas_logo_sitetitle_display]', array(
	'label' => __('Display Logo/ Site title Position', 'storexmas'),
	'priority' => 101,
	'section' => 'title_tagline',
	'type' => 'select',
	'checked' => 'checked',
		'choices' => array(
		'above_menubar' => __('Display Above Menubar','storexmas'),
		'on_menubar' => __('Display on Menubar','storexmas'),
		'below_menubar' => __('Below Menubar','storexmas'),
	),
));

$wp_customize->add_setting('storexmas_theme_options[storexmas_header_display]', array(
	'capability' => 'edit_theme_options',
	'default' => $storexmas_settings['storexmas_header_display'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('storexmas_theme_options[storexmas_header_display]', array(
	'label' => __('Site Logo/ Text Options', 'storexmas'),
	'priority' => 105,
	'section' => 'title_tagline',
	'type' => 'select',
	'checked' => 'checked',
		'choices' => array(
		'header_text' => __('Display Site Title Only','storexmas'),
		'header_logo' => __('Display Site Logo Only','storexmas'),
		'show_both' => __('Show Both','storexmas'),
		'disable_both' => __('Disable Both','storexmas'),
	),
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_logo_high_resolution]', array(
	'default' => $storexmas_settings['storexmas_logo_high_resolution'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_logo_high_resolution]', array(
	'priority'=>110,
	'label' => __('Logo for high resolution screen(Use 2X size image)', 'storexmas'),
	'section' => 'title_tagline',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_slider_button]', array(
	'default' => $storexmas_settings['storexmas_slider_button'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_slider_button]', array(
	'priority'=>10,
	'label' => __('Disable Slider Button', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_search_custom_header]', array(
	'default' => $storexmas_settings['storexmas_search_custom_header'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_search_custom_header]', array(
	'priority'=>20,
	'label' => __('Disable Search Form', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_side_menu]', array(
	'default' => $storexmas_settings['storexmas_side_menu'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_side_menu]', array(
	'priority'=>25,
	'label' => __('Disable Side Menu', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_stick_menu]', array(
	'default' => $storexmas_settings['storexmas_stick_menu'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_stick_menu]', array(
	'priority'=>30,
	'label' => __('Disable Stick Menu', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_scroll]', array(
	'default' => $storexmas_settings['storexmas_scroll'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_scroll]', array(
	'priority'=>40,
	'label' => __('Disable Goto Top', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_top_social_icons]', array(
	'default' => $storexmas_settings['storexmas_top_social_icons'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_top_social_icons]', array(
	'priority'=>50,
	'label' => __('Disable Top Social Icons', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_side_menu_social_icons]', array(
	'default' => $storexmas_settings['storexmas_side_menu_social_icons'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_side_menu_social_icons]', array(
	'priority'=>60,
	'label' => __('Disable Side Menu Social Icons', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_buttom_social_icons]', array(
	'default' => $storexmas_settings['storexmas_buttom_social_icons'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_buttom_social_icons]', array(
	'priority'=>70,
	'label' => __('Disable Bottom Social Icons', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_flurry_effect]', array(
	'default' => $storexmas_settings['storexmas_flurry_effect'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_flurry_effect]', array(
	'priority'=>80,
	'label' => __('Disable Flurry Effect', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_display_page_single_featured_image]', array(
	'default' => $storexmas_settings['storexmas_display_page_single_featured_image'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_display_page_single_featured_image]', array(
	'priority'=>100,
	'label' => __('Disable Page/Single Featured Image', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_disable_main_menu]', array(
	'default' => $storexmas_settings['storexmas_disable_main_menu'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_disable_main_menu]', array(
	'priority'=>120,
	'label' => __('Disable Main Menu', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_instagram_feed_display]', array(
	'default' => $storexmas_settings['storexmas_instagram_feed_display'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_instagram_feed_display]', array(
	'priority'=>125,
	'label' => __('Disable Instagram Full Width', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_reset_all]', array(
	'default' => $storexmas_settings['storexmas_reset_all'],
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'storexmas_reset_alls',
	'transport' => 'postMessage',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_reset_all]', array(
	'priority'=>130,
	'label' => __('Reset all default settings. (Refresh it to view the effect)', 'storexmas'),
	'section' => 'storexmas_custom_header',
	'type' => 'checkbox',
));

/********************** Footer Background Image ***********************************/
$wp_customize->add_setting( 'storexmas_theme_options[storexmas_img-upload-footer-image]',array(
	'default'	=> $storexmas_settings['storexmas_img-upload-footer-image'],
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'storexmas_theme_options[storexmas_img-upload-footer-image]', array(
	'label' => __('Footer Background Image','storexmas'),
	'description' => __('Image will be displayed on footer','storexmas'),
	'priority'	=> 50,
	'section' => 'storexmas_footer_image',
	)
));