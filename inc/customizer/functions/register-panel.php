<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
/******************** STOREXMAS CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'storexmas_customize_register_wordpress_default' );
function storexmas_customize_register_wordpress_default( $wp_customize ) {
	$wp_customize->add_panel( 'storexmas_wordpress_default_panel', array(
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'WordPress Settings', 'storexmas' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'storexmas_customize_register_options');
function storexmas_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'storexmas_options_panel', array(
		'priority' => 6,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'storexmas' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'storexmas_customize_register_featuredcontent' );
function storexmas_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'storexmas_featuredcontent_panel', array(
		'priority' => 8,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Slider Options', 'storexmas' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'storexmas_customize_register_frontpage_options');
function storexmas_customize_register_frontpage_options( $wp_customize ) {
	$wp_customize->add_panel( 'storexmas_frontpage_panel', array(
		'priority' => 7,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Frontpage Template', 'storexmas' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'storexmas_customize_register_colors' );
function storexmas_customize_register_colors( $wp_customize ) {
	$wp_customize->add_panel( 'colors', array(
		'priority' => 9,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Colors Section', 'storexmas' ),
		'description' => '',
	) );
}