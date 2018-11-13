<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */

/******************** STOREXMAS FRONTPAGE  *********************************************/
/* Frontpage StoreXmas */
$storexmas_settings = storexmas_get_theme_options();

$wp_customize->add_section( 'storexmas_frontpage_features', array(
	'title' => __('Product Featured Brands','storexmas'),
	'priority' => 10,
	'panel' =>'storexmas_frontpage_panel'
));

$wp_customize->add_section( 'storexmas_product_category', array(
	'title' => __('Product Categories','storexmas'),
	'priority' => 20,
	'panel' =>'storexmas_frontpage_panel'
));

$storexmas_frontpage_featured_categories_array = array(
	'-' => __( 'Select category', 'storexmas' ),
);

$storexmas_frontpage_featured_categories = get_categories(
	array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => 0,
		'title_li'   => '',
	)
);

if ( ! empty( $storexmas_frontpage_featured_categories ) ) :
	foreach ( $storexmas_frontpage_featured_categories as $storexmas_frontpage_featured_cat ) :

		if ( ! empty( $storexmas_frontpage_featured_cat->term_id ) && ! empty( $storexmas_frontpage_featured_cat->name ) ) :
			$storexmas_frontpage_featured_categories_array[ $storexmas_frontpage_featured_cat->term_id ] = $storexmas_frontpage_featured_cat->name;
		endif;

	endforeach;
endif;

/* Frontpage Product Featured Brands */
$wp_customize->add_setting( 'storexmas_theme_options[storexmas_disable_product_brand]', array(
	'default' => $storexmas_settings['storexmas_disable_product_brand'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_disable_product_brand]', array(
	'priority' => 5,
	'label' => __('Disable Product Brand Section', 'storexmas'),
	'section' => 'storexmas_frontpage_features',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_features_title]', array(
	'default' => $storexmas_settings['storexmas_features_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'storexmas_theme_options[storexmas_features_title]', array(
	'priority' => 10,
	'label' => __( 'Title', 'storexmas' ),
	'section' => 'storexmas_frontpage_features',
	'type' => 'text',
	)
);

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_features_description]', array(
	'default' => $storexmas_settings['storexmas_features_description'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'storexmas_theme_options[storexmas_features_description]', array(
	'priority' => 20,
	'label' => __( 'Description', 'storexmas' ),
	'section' => 'storexmas_frontpage_features',
	'type' => 'text',
	)
);

for ( $i=1; $i <= $storexmas_settings['storexmas_total_brand_features'] ; $i++ ) {
	$wp_customize->add_setting(
		'storexmas_theme_options[storexmas_featured_product_brand_'. $i .']', array(
			'default'				=>'',
			'capability'			=> 'manage_options',
			'sanitize_callback'	=> 'storexmas_sanitize_category_select',
			'type'				=> 'option'
		)
	);
	$wp_customize->add_control(
		'storexmas_theme_options[storexmas_featured_product_brand_'. $i .']',
		array(
			'priority' => 20 . absint($i),
			'label'       => __( 'Featured Products Brand #', 'storexmas' ) . $i,
			'section'     => 'storexmas_frontpage_features',
			'choices'     => $storexmas_frontpage_featured_categories_array,
			'type'        => 'select',
		)
	);
}

/* Froduct Categories */
$wp_customize->add_setting( 'storexmas_theme_options[storexmas_disable_product_categories]', array(
	'default' => $storexmas_settings['storexmas_disable_product_categories'],
	'sanitize_callback' => 'storexmas_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_disable_product_categories]', array(
	'priority' => 5,
	'label' => __('Disable Product Category Section', 'storexmas'),
	'section' => 'storexmas_product_category',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_promo_design_layout]', array(
	'default' => $storexmas_settings['storexmas_promo_design_layout'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_promo_design_layout]', array(
	'priority'=>8,
	'label' => __('Promo Design Layout ', 'storexmas'),
	'section' => 'storexmas_product_category',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'promo-wide-text' => __('Promo Default Layout','storexmas'),
		'' => __('Promo Full width text','storexmas'),
	),
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_categories_features_title]', array(
	'default' => $storexmas_settings['storexmas_categories_features_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);

$wp_customize->add_control( 'storexmas_theme_options[storexmas_categories_features_title]', array(
	'priority' => 10,
	'label' => __( 'Title', 'storexmas' ),
	'section' => 'storexmas_product_category',
	'type' => 'text',
	)
);

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_categories_features_description]', array(
	'default' => $storexmas_settings['storexmas_categories_features_description'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'storexmas_theme_options[storexmas_categories_features_description]', array(
	'priority' => 20,
	'label' => __( 'Description', 'storexmas' ),
	'section' => 'storexmas_product_category',
	'type' => 'text',
	)
);

for ( $i=1; $i <= $storexmas_settings['storexmas_total_features'] ; $i++ ) {
	$wp_customize->add_setting(
		'storexmas_theme_options[storexmas_featured_category_'. $i .']', array(
			'default'				=>'',
			'capability'			=> 'manage_options',
			'sanitize_callback'	=> 'storexmas_sanitize_category_select',
			'type'				=> 'option'
		)
	);
	$wp_customize->add_control(
		'storexmas_theme_options[storexmas_featured_category_'. $i .']',
		array(
			'priority' => 20 . absint($i),
			'label'       => __( 'Featured Products category #', 'storexmas' ) . $i ,
			'section'     => 'storexmas_product_category',
			'choices'     => $storexmas_frontpage_featured_categories_array,
			'type'        => 'select',
		)
	);
}