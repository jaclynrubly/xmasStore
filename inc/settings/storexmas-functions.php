<?php
/**
 * Custom functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
/********************* Set Default Value if not set ***********************************/
	if ( !get_theme_mod('storexmas_theme_options') ) {
		set_theme_mod( 'storexmas_theme_options', storexmas_get_option_defaults_values() );
	}
/********************* STOREXMAS RESPONSIVE AND CUSTOM CSS OPTIONS ***********************************/
function storexmas_responsiveness() {
	$storexmas_settings = storexmas_get_theme_options();
	if( $storexmas_settings['storexmas_responsive'] == 'on' ) { ?>
	<meta name="viewport" content="width=device-width" />
	<?php } else { ?>
	<meta name="viewport" content="width=1170" />
	<?php  }
}
add_filter( 'wp_head', 'storexmas_responsiveness');

/******************************** EXCERPT LENGTH *********************************/
function storexmas_excerpt_length($storexmas_excerpt_length) {
	$storexmas_settings = storexmas_get_theme_options();
	if( is_admin() ){
		return absint($storexmas_excerpt_length);
	}

	$storexmas_excerpt_length = $storexmas_settings['storexmas_excerpt_length'];
	return absint($storexmas_excerpt_length);
}
add_filter('excerpt_length', 'storexmas_excerpt_length');

/********************* CONTINUE READING LINKS FOR EXCERPT *********************************/
function storexmas_continue_reading($more) {
	if( is_admin() ){
		return $more;
	}

	return '&hellip; ';
}
add_filter('excerpt_more', 'storexmas_continue_reading');

/***************** USED CLASS FOR BODY TAGS ******************************/
function storexmas_body_class($storexmas_class) {
	$storexmas_settings = storexmas_get_theme_options();
	$storexmas_blog_layout = $storexmas_settings['storexmas_blog_layout'];
	$storexmas_site_layout = $storexmas_settings['storexmas_design_layout'];
	if ($storexmas_site_layout =='boxed-layout') {
		$storexmas_class[] = 'boxed-layout';
	}elseif ($storexmas_site_layout =='small-boxed-layout') {
		$storexmas_class[] = 'boxed-layout-small';
	}else{
		$storexmas_class[] = '';
	}
	if(!is_single()){
		if ($storexmas_blog_layout == 'medium_image_display'){
			$storexmas_class[] = "small-image-blog";
		}elseif($storexmas_blog_layout == 'two_column_image_display'){
			$storexmas_class[] = "two-column-blog";
		}else{
			$storexmas_class[] = "";
		}
	}

	if ( is_singular() && false !== strpos( get_queried_object()->post_content, '<!-- wp:' ) ) {
		$storexmas_class[] = 'gutenberg';
	}

	if ($storexmas_settings['storexmas_box_slider']=='on') {
		$storexmas_class[] = 'box-slider';
	}
	return $storexmas_class;
}
add_filter('body_class', 'storexmas_body_class');

/********************** SCRIPTS FOR DONATE/ UPGRADE BUTTON ******************************/
function storexmas_customize_scripts() {
	wp_enqueue_style( 'storexmas_customizer_custom', get_template_directory_uri() . '/inc/css/storexmas-customizer.css');
}
add_action( 'customize_controls_print_scripts', 'storexmas_customize_scripts');

/**************************** SOCIAL MENU *********************************************/
function storexmas_social_links_display() {
		if ( has_nav_menu( 'social-link' ) ) : ?>
	<div class="social-links clearfix">
	<?php
		wp_nav_menu( array(
			'container' 	=> '',
			'theme_location' => 'social-link',
			'depth'          => 1,
			'items_wrap'      => '<ul>%3$s</ul>',
			'link_before'    => '<span class="screen-reader-text">',
			'link_after'     => '</span>',
		) );
	?>
	</div><!-- end .social-links -->
	<?php endif; ?>
<?php }
add_action ('storexmas_social_links', 'storexmas_social_links_display');

/******************* DISPLAY BREADCRUMBS ******************************/
function storexmas_breadcrumb() {
	if (function_exists('bcn_display')) { ?>
		<div class="breadcrumb home">
			<?php bcn_display(); ?>
		</div> <!-- .breadcrumb -->
	<?php }
}

/*********************** storexmas Category SLIDERS ***********************************/
function storexmas_category_sliders() {
	global $post;
	$storexmas_settings = storexmas_get_theme_options();
	global $excerpt_length;
	$slider_custom_text = $storexmas_settings['storexmas_slider_button_text'];
	$storexmas_slider_design_layout = $storexmas_settings['storexmas_slider_design_layout'];
	$storexmas_slider_animation_option = $storexmas_settings['storexmas_slider_animation_option'];
	if($storexmas_settings['storexmas_default_category']=='post_category'){
		$category = $storexmas_settings['storexmas_default_category_slider'];
		$query = new WP_Query(array(
					'posts_per_page' =>  intval($storexmas_settings['storexmas_slider_number']),
					'post_type' => array(
						'post'
					) ,
					'category__in' => intval($storexmas_settings['storexmas_default_category_slider']),
				));
	} else {
		$category = $storexmas_settings['storexmas_category_slider'];
		$query = new WP_Query( array(
			'post_type' => 'product',
			'orderby'   => 'date',
			'tax_query' => array(
				array(
					'taxonomy'  => 'product_cat',
					'field'     => 'id',
					'terms'     => intval($category),
				)
			),
			'posts_per_page' => intval($storexmas_settings['storexmas_slider_number']),
			) );
	}
	

	if($query->have_posts() && !empty($category)){
		$category_sliders_display = '';
		$slider_animation_classes='';
		if($storexmas_slider_animation_option == 'animation-bottom'){
			$slider_animation_classes = 'animation-bottom';
		}elseif($storexmas_slider_animation_option == 'animation-top'){
			$slider_animation_classes = 'animation-top';
		}elseif($storexmas_slider_animation_option == 'animation-left'){
			$slider_animation_classes = 'animation-left';
		}elseif($storexmas_slider_animation_option == 'animation-right'){
			$slider_animation_classes = 'animation-right';
		}elseif($storexmas_slider_animation_option == 'no-animation'){
			$slider_animation_classes = '';
		}
		$category_sliders_display 	.= '<div class="main-slider '.esc_attr($slider_animation_classes).'">';
		if($storexmas_slider_design_layout=='layer-slider'){
			$category_sliders_display 	.= '<div class="layer-slider">';
		}else{
			$category_sliders_display 	.= '<div class="multi-slider">';
		}
		$category_sliders_display 	.= '<ul class="slides">';
		while ($query->have_posts()):$query->the_post();
			$attachment_id = get_post_thumbnail_id();
			$image_attributes = wp_get_attachment_image_src($attachment_id,'storexmas_slider_image');
			$title_attribute = apply_filters('the_title', get_the_title(get_queried_object_id()));
			$excerpt = get_the_excerpt();
				$category_sliders_display    	.= '<li>';
				if ($image_attributes) {
					$category_sliders_display 	.= '<div class="image-slider" title="'.the_title_attribute('echo=0').'"' .' style="background-image:url(' ."'" .esc_url($image_attributes[0])."'" .')">';
				}else{
					$category_sliders_display 	.= '<div class="image-slider">';
				}
				$category_sliders_display 	.= '<article class="slider-content">';
				if ($title_attribute != '' || $excerpt != '') {
					$category_sliders_display 	.= '<div class="slider-text-content">';
					
					$remove_link = $storexmas_settings['storexmas_slider_link'];
						if($remove_link == 0){
							if ($title_attribute != '') {
								$category_sliders_display .= '<h2 class="slider-title"><a href="'.esc_url(get_permalink()).'" title="'.the_title_attribute('echo=0').'" rel="bookmark">'.get_the_title().'</a></h2><!-- .slider-title -->';
							}
						}else{
							$category_sliders_display .= '<h2 class="slider-title">'.get_the_title().'</h2><!-- .slider-title -->';
						}

						if ($excerpt != '') {
							$category_sliders_display .= '<p class="slider-text">'.wp_strip_all_tags( get_the_excerpt(), true ).'</p><!-- end .slider-text -->';
						}
					$category_sliders_display 	.= '</div><!-- end .slider-text-content -->';
				}
				if( $storexmas_settings['storexmas_slider_button'] == 0 && $slider_custom_text !='' ){
					$category_sliders_display 	.='<div class="slider-buttons">';
					$category_sliders_display 	.= '<a title='.'"'.the_title_attribute('echo=0'). '"'. ' '.'href="'.esc_url(get_permalink()).'"'.' class="btn-default vivid-red">'.esc_attr($slider_custom_text).'</a>';
					
					$category_sliders_display 	.= '</div><!-- end .slider-buttons -->';
				}
				$category_sliders_display 	.='</article><!-- end .slider-content --> ';
				$category_sliders_display 	.='</div><!-- end .image-slider -->
				</li>';
			endwhile;
			wp_reset_postdata();
			$category_sliders_display .= '</ul><!-- end .slides -->
				</div> <!-- end .layer-slider -->
			</div> <!-- end .main-slider -->';
				echo $category_sliders_display;
			}
}
/*************************** ENQUEING STYLES AND SCRIPTS ****************************************/
function storexmas_scripts() {
	$storexmas_settings = storexmas_get_theme_options();
	$storexmas_stick_menu = $storexmas_settings['storexmas_stick_menu'];
	wp_enqueue_script('storexmas-main', get_template_directory_uri().'/js/storexmas-main.js', array('jquery'), false, true);
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_style( 'storexmas-style', get_stylesheet_uri() );
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');

	if($storexmas_settings['storexmas_flurry_effect'] ==0){

		wp_enqueue_script('flurry', get_template_directory_uri().'/assets/flurry/jquery.flurry.min.js', array('jquery'), false, true);
		wp_enqueue_script('storexmas-flurry-settings', get_template_directory_uri().'/assets/flurry/flurry-settings.js', array('jquery'), false, true);

		$storexmas_flurry_character   = esc_attr($storexmas_settings['storexmas_flurry_character']);
		$storexmas_flurry_height    = absint($storexmas_settings['storexmas_flurry_height'])*100;
		$storexmas_flurry_speed = absint($storexmas_settings['storexmas_flurry_speed'])*1000;
		wp_localize_script(
		'storexmas-flurry-settings',
		'storexmas_flurry_value',
		array(
			'storexmas_flurry_character'   => $storexmas_flurry_character,
			'storexmas_flurry_height'    => $storexmas_flurry_height,
			'storexmas_flurry_speed' => $storexmas_flurry_speed,
		)
		);
		wp_enqueue_script( 'storexmas-flurry-settings' );

	}

	if( $storexmas_stick_menu != 1 ):

		wp_enqueue_script('jquery-sticky', get_template_directory_uri().'/assets/sticky/jquery.sticky.min.js', array('jquery'), false, true);
		wp_enqueue_script('storexmas-sticky-settings', get_template_directory_uri().'/assets/sticky/sticky-settings.js', array('jquery'), false, true);

	endif;

	wp_enqueue_script('storexmas-navigation', get_template_directory_uri().'/js/navigation.js', array('jquery'), false, true);
	wp_enqueue_script('jquery-flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'), false, true);
	wp_enqueue_script('storexmas-slider', get_template_directory_uri().'/js/flexslider-setting.js', array('jquery-flexslider'), false, true);

	$storexmas_animation_effect   = esc_attr($storexmas_settings['storexmas_animation_effect']);
	$storexmas_slideshowSpeed    = absint($storexmas_settings['storexmas_slideshowSpeed'])*1000;
	$storexmas_animationSpeed = absint($storexmas_settings['storexmas_animationSpeed'])*100;
	wp_localize_script(
		'storexmas-slider',
		'storexmas_slider_value',
		array(
			'storexmas_animation_effect'   => $storexmas_animation_effect,
			'storexmas_slideshowSpeed'    => $storexmas_slideshowSpeed,
			'storexmas_animationSpeed' => $storexmas_animationSpeed,
		)
	);
	wp_enqueue_script( 'storexmas-slider' );
	if( $storexmas_settings['storexmas_responsive'] == 'on' ) {
		wp_enqueue_style('storexmas-responsive', get_template_directory_uri().'/css/responsive.css');
	}
	wp_register_style( 'storexmas-google-fonts', '//fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700' );
	wp_enqueue_style( 'storexmas-google-fonts' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/* Custom Css */
	$storexmas_internal_css='';

	if ($storexmas_settings['storexmas_logo_high_resolution'] !=0){
		$storexmas_internal_css .= '/* Logo for high resolution screen(Use 2X size image) */
		.custom-logo-link .custom-logo {
			height: auto;
			width: 50%;
		}
		@media only screen and (max-width: 767px) { 
			.custom-logo-link .custom-logo {
				width: 60%;
			}
		}

		@media only screen and (max-width: 480px) { 
			.custom-logo-link .custom-logo {
				width: 80%;
			}
		}';
	}

	if($storexmas_settings['storexmas_slider_content_bg_color'] =='on'){
		$storexmas_internal_css .= '/* Slider Content With background color */
		.slider-content:before {
			background-color: #000;
			content: "";
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			opacity: 0;
			-moz-opacity: 0;
			filter:alpha(opacity=0);
			-webkit-transition: all 0.7s ease 0.7s;
			-moz-transition: all 0.7s ease 0.7s;
			transition: all 0.7s ease 0.7s;
		}

		.flex-active-slide .slider-content:before {
			opacity: 0.3;
			-moz-opacity: 0.3;
			filter:alpha(opacity=30);
		}

		.slider-content {
			padding: 40px 20px 40px;
		}';
	}

	if($storexmas_settings['storexmas_header_display']=='header_logo'){
		$storexmas_internal_css .= '
		#site-branding #site-title, #site-branding #site-description{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}';
	}

	wp_add_inline_style( 'storexmas-style', wp_strip_all_tags($storexmas_internal_css) );
}
add_action( 'wp_enqueue_scripts', 'storexmas_scripts' );