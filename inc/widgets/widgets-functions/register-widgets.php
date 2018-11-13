<?php
/**
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
/**************** STOREXMAS REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'storexmas_widgets_init');
function storexmas_widgets_init() {

	register_sidebar(array(
			'name' => __('Main Sidebar', 'storexmas'),
			'id' => 'storexmas_main_sidebar',
			'description' => __('Shows widgets at Main Sidebar.', 'storexmas'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Top Header Info', 'storexmas'),
			'id' => 'storexmas_header_info',
			'description' => __('Shows widgets on all page.', 'storexmas'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Side Menu', 'storexmas'),
			'id' => 'storexmas_side_menu',
			'description' => __('Shows widgets on all page.', 'storexmas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Slider Section', 'storexmas'),
			'id' => 'slider_section',
			'description' => __('Shows widgets on Slider section.', 'storexmas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Contact Page Sidebar', 'storexmas'),
			'id' => 'storexmas_contact_page_sidebar',
			'description' => __('Shows widgets on Contact Page Template.', 'storexmas'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Iframe Code For Google Maps', 'storexmas'),
			'id' => 'storexmas_form_for_contact_page',
			'description' => __('Add Iframe Code using text widgets', 'storexmas'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('WooCommerce Sidebar', 'storexmas'),
			'id' => 'storexmas_woocommerce_sidebar',
			'description' => __('Add WooCommerce Widgets Only', 'storexmas'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	$storexmas_settings = storexmas_get_theme_options();
	for($i =1; $i<= $storexmas_settings['storexmas_footer_column_section']; $i++){
	register_sidebar(array(
			'name' => __('Footer Column ', 'storexmas') . $i,
			'id' => 'storexmas_footer_'.$i,
			'description' => __('Shows widgets at Footer Column ', 'storexmas').$i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	}
}