<?php
if(!function_exists('storexmas_get_option_defaults_values')):
	/******************** STOREXMAS DEFAULT OPTION VALUES ******************************************/
	function storexmas_get_option_defaults_values() {
		global $storexmas_default_values;
		$storexmas_default_values = array(
			'storexmas_responsive'	=> 'on',
			'storexmas_logo_sitetitle_display' => 'above_menubar',
			'storexmas_design_layout' => 'full-width-layout',
			'storexmas_sidebar_layout_options' => 'right',
			'storexmas_blog_layout' => 'default_blog_display',
			'storexmas_search_custom_header' => 0,
			'storexmas_side_menu'	=> 0,
			'storexmas_img-upload-footer-image' => '',
			'storexmas_header_display'=> 'header_text',
			'storexmas_categories'	=> array(),
			'storexmas_scroll'	=> 0,
			'storexmas_slider_button_text' => esc_html__('View Details','storexmas'),
			'storexmas_tag_text' => esc_html__('Continue Reading','storexmas'),
			'storexmas_excerpt_length'	=> '50',
			'storexmas_reset_all' => 0,
			'storexmas_stick_menu'	=>0,
			'storexmas_flurry_effect' => 0,
			'storexmas_logo_high_resolution'	=> 0,
			'storexmas_blog_post_image' => 'on',
			'storexmas_search_text' => esc_html__('Search &hellip;','storexmas'),
			'storexmas_blog_content_layout'	=> 'fullcontent_display',
			'storexmas_entry_meta_single' => 'show',
			'storexmas_entry_meta_blog' => 'show-meta',
			'storexmas_footer_column_section'	=>'4',
			'storexmas_disable_main_menu' => 0,
			'storexmas_instagram_feed_display'=>0,
			/* Flurry Settings */
			'storexmas_flurry_character'	=> '.*',
			'storexmas_flurry_height'	=> '8',
			'storexmas_flurry_speed'	=> '6',

			/* Slider Settings */
			'storexmas_slider_button' => 0,
			'storexmas_default_category'	=> 'post_category',
			'storexmas_slider_content_bg_color' => 'on',
			'storexmas_box_slider'	=> 'off',
			'storexmas_slider_type'	=> 'default_slider',
			'storexmas_slider_design_layout'	=> 'layer-slider',
			'storexmas_slider_animation_option'	=> 'animation-bottom',
			'storexmas_slider_link' =>0,
			'storexmas_enable_slider' => 'frontpage',
			'storexmas_category_slider' =>array(),
			'storexmas_default_category_slider' => array(),
			'storexmas_slider_number'	=> '6',
			/* Layer Slider */
			'storexmas_animation_effect' => 'fade',
			'storexmas_slideshowSpeed' => '5',
			'storexmas_animationSpeed' => '7',
			'storexmas_display_page_single_featured_image'=>0,
			/* Front page feature */
			/* Frontpage Product Featured Brands */
			'storexmas_disable_product_brand'	=> 1,
			'storexmas_total_brand_features'	=> '8',
			'storexmas_features_title'	=> '',
			'storexmas_features_description'	=> '',
			/* Frontpage Product Categories */
			'storexmas_disable_product_categories'	=> 1,
			'storexmas_total_features'	=> '6',
			'storexmas_promo_design_layout' => 'promo-wide-text',
			'storexmas_categories_features_title'	=> '',
			'storexmas_categories_features_description'	=> '',
			/*Social Icons */
			'storexmas_top_social_icons' =>0,
			'storexmas_side_menu_social_icons' =>0,
			'storexmas_buttom_social_icons'	=>0,
			);
		return apply_filters( 'storexmas_get_option_defaults_values', $storexmas_default_values );
	}
endif;