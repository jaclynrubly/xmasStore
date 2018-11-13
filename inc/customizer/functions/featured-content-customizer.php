<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
class StoreXmas_Category_Control extends WP_Customize_Control {
	public $type = 'select';
	public function render_content() {
	$storexmas_settings = storexmas_get_theme_options();
	$storexmas_categories = get_categories(); ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select <?php $this->link(); ?>>
			<?php
				foreach ( $storexmas_categories as $category) :?>
						<option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $storexmas_settings) ) { echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
					<?php endforeach; ?>
			</select>
		</label>
	<?php 
	}
}

/******************** STOREXMAS SLIDER SETTINGS ******************************************/
$storexmas_settings = storexmas_get_theme_options();
$wp_customize->add_section( 'featured_content', array(
	'title' => __( 'Slider Settings', 'storexmas' ),
	'priority' => 140,
	'panel' => 'storexmas_featuredcontent_panel'
));

$wp_customize->add_section( 'slider_category_content', array(
	'title' => __( 'Select Default/ Product Category Slider', 'storexmas' ),
	'priority' => 150,
	'panel' => 'storexmas_featuredcontent_panel'
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_box_slider]', array(
	'default' => $storexmas_settings['storexmas_box_slider'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_box_slider]', array(
	'priority'=>10,
	'label' => __('Box Slider', 'storexmas'),
	'section' => 'featured_content',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'off' => __('OFF','storexmas'),
		'on' => __('ON','storexmas'),
	),
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_slider_design_layout]', array(
	'default' => $storexmas_settings['storexmas_slider_design_layout'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_slider_design_layout]', array(
	'priority'=>10,
	'label' => __('Slider Design Layout', 'storexmas'),
	'section' => 'featured_content',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'layer-slider' => __('Layer Slider','storexmas'),
		'multi-slider' => __('Multi slider','storexmas'),
	),
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_enable_slider]', array(
	'default' => $storexmas_settings['storexmas_enable_slider'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_enable_slider]', array(
	'priority'=>20,
	'label' => __('Enable Slider', 'storexmas'),
	'section' => 'featured_content',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'frontpage' => __('Front Page','storexmas'),
		'enitresite' => __('Entire Site','storexmas'),
		'disable' => __('Disable Slider','storexmas'),
	),
));

$wp_customize->add_setting('storexmas_theme_options[storexmas_slider_button_text]', array(
	'default' =>$storexmas_settings['storexmas_slider_button_text'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
));
$wp_customize->add_control('storexmas_theme_options[storexmas_slider_button_text]', array(
	'priority' =>40,
	'label' => __('Slider Button Text', 'storexmas'),
	'section' => 'featured_content',
	'type' => 'text',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_animation_effect]', array(
	'default' => $storexmas_settings['storexmas_animation_effect'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_animation_effect]', array(
	'priority'=>60,
	'label' => __('Animation Effect', 'storexmas'),
	'description' => __('This feature will not work on Multi Slider','storexmas'),
	'section' => 'featured_content',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'slide' => __('Slide','storexmas'),
		'fade' => __('Fade','storexmas'),
	),
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_slideshowSpeed]', array(
	'default' => $storexmas_settings['storexmas_slideshowSpeed'],
	'sanitize_callback' => 'storexmas_numeric_value',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_slideshowSpeed]', array(
	'priority'=>70,
	'label' => __('Set the speed of the slideshow cycling', 'storexmas'),
	'section' => 'featured_content',
	'type' => 'text',
));

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_animationSpeed]', array(
	'default' => $storexmas_settings['storexmas_animationSpeed'],
	'sanitize_callback' => 'storexmas_numeric_value',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_animationSpeed]', array(
	'priority'=>80,
	'label' => __(' Set the speed of animations', 'storexmas'),
	'description' => __('This feature will not work on Animation Effect set to fade','storexmas'),
	'section' => 'featured_content',
	'type' => 'text',
));


/* WooCommerce Slider Category Section */

$wp_customize->add_setting( 'storexmas_theme_options[storexmas_default_category]', array(
	'default' => $storexmas_settings['storexmas_default_category'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'storexmas_theme_options[storexmas_default_category]', array(
	'priority'=>5,
	'label' => __('Category/ Proudct Category Slider', 'storexmas'),
	'description' => __('You need to enable WooCommerce Plugins to display Products on Slider','storexmas'),
	'section' => 'featured_content',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'post_category' => __('Default Category','storexmas'),
		'product_category' => __('Product Category','storexmas'),
	),
));

$wp_customize->add_setting('storexmas_theme_options[storexmas_slider_content_bg_color]', array(
	'default' =>$storexmas_settings['storexmas_slider_content_bg_color'],
	'sanitize_callback' => 'storexmas_sanitize_select',
	'type' => 'option',
	'capability' => 'manage_options'
));
$wp_customize->add_control('storexmas_theme_options[storexmas_slider_content_bg_color]', array(
	'priority' =>8,
	'label' => __('Slider Content With background color', 'storexmas'),
	'section' => 'featured_content',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
	'on' => __('Show Background Color','storexmas'),
	'off' => __('Hide Background Color','storexmas'),
	),
));

if(class_exists( 'woocommerce' ) && $storexmas_settings['storexmas_default_category']=='product_category') {
	$storexmas_prod_categories_array = array(
		'-' => __( 'Select category', 'storexmas' ),
	);

	$storexmas_prod_categories = get_categories(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => 0,
			'title_li'   => '',
		)
	);

	if ( ! empty( $storexmas_prod_categories ) ) :
		foreach ( $storexmas_prod_categories as $storexmas_prod_cat ) :

			if ( ! empty( $storexmas_prod_cat->term_id ) && ! empty( $storexmas_prod_cat->name ) ) :
				$storexmas_prod_categories_array[ $storexmas_prod_cat->term_id ] = $storexmas_prod_cat->name;
			endif;

		endforeach;
	endif;

	$wp_customize->add_setting(
		'storexmas_theme_options[storexmas_category_slider]', array(
			'default'				=>array(),
			'capability'			=> 'manage_options',
			'sanitize_callback'	=> 'storexmas_sanitize_category_select',
			'type'				=> 'option'
		)
	);
	$wp_customize->add_control(
		'storexmas_theme_options[storexmas_category_slider]',
		array(
			'priority'    => 10,
			'label'       => __( 'Select Products Category Slider', 'storexmas' ),
			'section'     => 'slider_category_content',
			'settings'				=> 'storexmas_theme_options[storexmas_category_slider]',
			'choices'     => $storexmas_prod_categories_array,
			'type'        => 'select',
		)
	);
}else{
	/* Select your category to display Slider */
$wp_customize->add_setting( 'storexmas_theme_options[storexmas_default_category_slider]', array(
		'default'				=>array(),
		'capability'			=> 'manage_options',
		'sanitize_callback'	=> 'storexmas_sanitize_category_select',
		'type'				=> 'option'
	));
$wp_customize->add_control(
	new StoreXmas_Category_Control(
	$wp_customize,
	'storexmas_theme_options[storexmas_default_category_slider]',
		array(
			'priority' 				=> 10,
			'label'					=> __('Select Category Slider','storexmas'),
			'description'			=> __('By default it will display all post','storexmas'),
			'section'				=> 'slider_category_content',
			'settings'				=> 'storexmas_theme_options[storexmas_default_category_slider]',
			'type'					=>'select'
		)
	)
);
}


	