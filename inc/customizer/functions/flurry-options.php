<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
$storexmas_settings = storexmas_get_theme_options();

$wp_customize->add_section('storexmas_flurry_options', array(
	'title' => __('Flurry Options', 'storexmas'),
	'priority' => 102,
	'panel' => 'storexmas_options_panel'
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_flurry_character]', array(
	'default' => $storexmas_settings['storexmas_flurry_character'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'storexmas_theme_options[storexmas_flurry_character]', array(
	'priority' => 10,
	'label' => __( 'Flurry Character', 'storexmas' ),
	'section' => 'storexmas_flurry_options',
	'type' => 'text',
	)
);

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_flurry_height]', array(
	'default' => $storexmas_settings['storexmas_flurry_height'],
	'sanitize_callback' => 'storexmas_numeric_value',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'storexmas_theme_options[storexmas_flurry_height]', array(
	'priority' => 20,
	'label' => __( 'Flurry Height', 'storexmas' ),
	'description'=> __('Default Height 800. Measurement in 100','storexmas'),
	'section' => 'storexmas_flurry_options',
	'type' => 'text',
	)
);

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_flurry_speed]', array(
	'default' => $storexmas_settings['storexmas_flurry_speed'],
	'sanitize_callback' => 'storexmas_numeric_value',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'storexmas_theme_options[storexmas_flurry_speed]', array(
	'priority' => 30,
	'label' => __( 'Flurry Speed', 'storexmas' ),
	'description'=> __('Default Speed 6000. Measurement in 1000','storexmas'),
	'section' => 'storexmas_flurry_options',
	'type' => 'text',
	)
);