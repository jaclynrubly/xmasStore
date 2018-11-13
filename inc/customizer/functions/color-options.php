<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
/********************* Color Option **********************************************/
	$wp_customize->add_section( 'colors', array(
		'title' 						=> __('Color Options','storexmas'),
		'priority'					=> 90,
		'panel'					=>'colors'
	));

	$wp_customize->add_section( 'storexmas_background_color_options', array(
		'title' 						=> __('Background Color Options','storexmas'),
		'priority'					=> 100,
		'panel'					=>'colors'
	));

	$wp_customize->add_section( 'storexmas_font_color_options', array(
		'title' 						=> __('Font Color Options','storexmas'),
		'priority'					=> 110,
		'panel'					=>'colors'
	));


	$color_scheme = storexmas_get_color_scheme();
	// Add color scheme setting and control.
	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'default_color',
		'sanitize_callback' => 'storexmas_sanitize_color_scheme',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'color_scheme', array(
		'description'    => __( 'Select Color Style', 'storexmas' ),
		'section'  => 'colors',
		'type'     => 'select',
		'choices'  => storexmas_get_color_scheme_choices(),
		'priority' => 1,
	) );

	$wp_customize->add_setting( 'storexmas_site_page_nav_link_title_color', array(
		'default'				=> $color_scheme[3],
		'sanitize_callback'	=> 'sanitize_hex_color',
		'transport'				=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_site_page_nav_link_title_color', array(
		'description'       => __( 'Nav, links and Hover', 'storexmas' ),
		'section'     => 'colors',
	) ) );

	$wp_customize->add_setting( 'storexmas_button_color', array(
		'default'				=> $color_scheme[3],
		'sanitize_callback'	=> 'sanitize_hex_color',
		'transport'				=> 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_button_color', array(
		'description'       => __( 'Default Buttons and Submit', 'storexmas' ),
		'section'     => 'colors',
	) ) );

	$wp_customize->add_setting( 'storexmas_bbpress_woocommerce_color', array(
		'default'           => $color_scheme[3],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_bbpress_woocommerce_color', array(
		'description'       => __( 'WooCommerce/ bbPress', 'storexmas' ),
		'section'     => 'colors',
	) ) );

	/********************* Background Color **********************************************/

	$wp_customize->add_setting( 'storexmas_background_top_bar', array(
		'default'           => '#111111',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_background_top_bar', array(
		'description'       => __( 'Top Bar', 'storexmas' ),
		'section'     => 'storexmas_background_color_options',
		'priority'					=> 10,
	) ) );

	$wp_customize->add_setting( 'storexmas_sitetitle_logo_background_fullpage', array(
		'default'           => '#d41616',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_sitetitle_logo_background_fullpage', array(
		'label'=> __('Site Title and Logo', 'storexmas'),
		'description'       => __( 'Only works on top and bottom position', 'storexmas' ),
		'section'     => 'storexmas_background_color_options',
		'priority'					=> 20,
	) ) );

	$wp_customize->add_setting( 'storexmas_background_sticky_header', array(
		'default'           => '#111111',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_background_sticky_header', array(
		'description'       => __( 'Sticky Header', 'storexmas' ),
		'section'     => 'storexmas_background_color_options',
		'priority'					=> 30,
	) ) );

	$wp_customize->add_setting( 'storexmas_background_side_menu', array(
		'default'           => '#fb4242',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_background_side_menu', array(
		'description'       => __( 'Side Menu', 'storexmas' ),
		'section'     => 'storexmas_background_color_options',
		'priority'					=> 40,
	) ) );

	/********************* Font Color **********************************************/

	$wp_customize->add_setting( 'storexmas_header_widget_contact_font_color', array(
		'default'           => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_header_widget_contact_font_color', array( // Header Widgets Contact
		'priority'					=> 10,
		'description'       => __( ' Header Widgets Contact ', 'storexmas' ),
		'section'     => 'storexmas_font_color_options',
	) ) );

	$wp_customize->add_setting( 'storexmas_topbar_menu_font_color', array(
		'default'           => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_topbar_menu_font_color', array( // Top Bar Menu
		'priority'					=> 20,
		'description'       => __( ' Top Bar Menu ', 'storexmas' ),
		'section'     => 'storexmas_font_color_options',
	) ) );

		$wp_customize->add_setting( 'storexmas_site_title_font_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_site_title_font_color', array( // Site Title
		'priority'					=> 30,
		'description'       => __( 'Site Title', 'storexmas' ),
		'section'     => 'storexmas_font_color_options',
	) ) );

	$wp_customize->add_setting( 'storexmas_site_description_font_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_site_description_font_color', array( // Site Description
		'priority'					=> 40,
		'description'       => __( 'Site Description', 'storexmas' ),
		'section'     => 'storexmas_font_color_options',
	) ) );

		$wp_customize->add_setting( 'storexmas_navigation_font_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_navigation_font_color', array( // Navigation
		'priority'					=> 50,
		'description'       => __( 'Navigation', 'storexmas' ),
		'section'     => 'storexmas_font_color_options',
	) ) );

	$wp_customize->add_setting( 'storexmas_dropdown_navigation_font_color', array(
		'default'           => '#747474',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_dropdown_navigation_font_color', array( // Dropdown Navigation
		'priority'					=> 60,
		'description'       => __( 'Dropdown Navigation', 'storexmas' ),
		'section'     => 'storexmas_font_color_options',
	) ) );

	$wp_customize->add_setting( 'storexmas_top_social_search_button_sidemenu_icon_font_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storexmas_top_social_search_button_sidemenu_icon_font_color', array( // Top Social Icon, Search Button and Side menu icon
		'priority'					=> 70,
		'description'       => __( 'Top Social Icon, Search Button and Side menu icon', 'storexmas' ),
		'section'     => 'storexmas_font_color_options',
	) ) );