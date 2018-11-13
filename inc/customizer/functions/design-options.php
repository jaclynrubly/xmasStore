<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
$storexmas_settings = storexmas_get_theme_options();

$wp_customize->add_section('storexmas_layout_options', array(
	'title' => __('Layout Options', 'storexmas'),
	'priority' => 102,
	'panel' => 'storexmas_options_panel'
));

$wp_customize->add_setting('storexmas_theme_options[storexmas_responsive]', array(
	'default' => $storexmas_settings['storexmas_responsive'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('storexmas_theme_options[storexmas_responsive]', array(
	'priority' =>20,
	'label' => __('Responsive Layout', 'storexmas'),
	'section' => 'storexmas_layout_options',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'on' => __('ON ','storexmas'),
		'off' => __('OFF','storexmas'),
	),
));

$wp_customize->add_setting('storexmas_theme_options[storexmas_blog_layout]', array(
	'default' => $storexmas_settings['storexmas_blog_layout'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('storexmas_theme_options[storexmas_blog_layout]', array(
	'priority' =>30,
	'label' => __('Blog Layout', 'storexmas'),
	'section'    => 'storexmas_layout_options',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'default_blog_display' => __('Default Blog','storexmas'),
		'medium_image_display' => __('Blog with small Image','storexmas'),
		'two_column_image_display' => __('Blog with Two Column','storexmas'),
	),
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_entry_meta_single]', array(
	'default' => $storexmas_settings['storexmas_entry_meta_single'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_entry_meta_single]', array(
	'priority'=>40,
	'label' => __('Disable Entry Meta from Single Page', 'storexmas'),
	'section' => 'storexmas_layout_options',
	'type' => 'select',
	'choices' => array(
		'show' => __('Display Entry Format','storexmas'),
		'hide' => __('Hide Entry Format','storexmas'),
	),
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_entry_meta_blog]', array(
	'default' => $storexmas_settings['storexmas_entry_meta_blog'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_entry_meta_blog]', array(
	'priority'=>50,
	'label' => __('Disable Entry Meta from Blog Page', 'storexmas'),
	'section' => 'storexmas_layout_options',
	'type'	=> 'select',
	'choices' => array(
		'show-meta' => __('Display Entry Meta','storexmas'),
		'hide-meta' => __('Hide Entry Meta','storexmas'),
	),
));

$wp_customize->add_setting('storexmas_theme_options[storexmas_blog_content_layout]', array(
   'default'        => $storexmas_settings['storexmas_blog_content_layout'],
   'sanitize_callback' => 'storexmas_sanitize_select',
   'type'                  => 'option',
   'capability'            => 'manage_options'
));
$wp_customize->add_control('storexmas_theme_options[storexmas_blog_content_layout]', array(
   'priority'  =>55,
   'label'      => __('Blog Content Display', 'storexmas'),
   'section'    => 'storexmas_layout_options',
   'type'       => 'select',
   'checked'   => 'checked',
   'choices'    => array(
       'fullcontent_display' => __('Blog Full Content Display','storexmas'),
       'excerptblog_display' => __(' Excerpt  Display','storexmas'),
   ),
));

$wp_customize->add_setting('storexmas_theme_options[storexmas_design_layout]', array(
	'default'        => $storexmas_settings['storexmas_design_layout'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type'                  => 'option',
));
$wp_customize->add_control('storexmas_theme_options[storexmas_design_layout]', array(
	'priority'  =>60,
	'label'      => __('Design Layout', 'storexmas'),
	'section'    => 'storexmas_layout_options',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'full-width-layout' => __('Full Width Layout','storexmas'),
		'boxed-layout' => __('Boxed Layout','storexmas'),
		'small-boxed-layout' => __('Small Boxed Layout','storexmas'),
	),
));