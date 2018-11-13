<?php /**
 * Register color schemes for StoreXmas.
 *
 * Can be filtered with {@see 'storexmas_color_schemes'}.
 *
 * The order of colors in a colors array:
 * @since StoreXmas 1.1
 *
 * @return array An associative array of color scheme options.
 */
function storexmas_get_color_schemes() {
	return apply_filters( 'storexmas_color_schemes', array(
		'default_color' => array(
			'label'  => __( '--Default--', 'storexmas' ),
			'colors' => array(
				'#d41616',
				'#d41616',
				'#d41616',
				'#d41616',
			),
		),
		'dark'    => array(
			'label'  => __( 'Dark', 'storexmas' ),
			'colors' => array(
				'#d41616',
				'#111111',
				'#111111',
				'#111111',
			),
		),
		'yellow'  => array(
			'label'  => __( 'Yellow', 'storexmas' ),
			'colors' => array(
				'#d41616',
				'#ffae00',
				'#ffae00',
				'#ffae00',
			),
		),
		'pink'    => array(
			'label'  => __( 'Orange', 'storexmas' ),
			'colors' => array(
				'#d41616',
				'#ffae00',
				'#ffae00',
				'#ffae00',
			),
		),
		'blue'   => array(
			'label'  => __( 'Blue', 'storexmas' ),
			'colors' => array(
				'#d41616',
				'#009eed',
				'#009eed',
				'#009eed',
			),
		),
		'purple'   => array(
			'label'  => __( 'Purple', 'storexmas' ),
			'colors' => array(
				'#d41616',
				'#9651cc',
				'#9651cc',
				'#9651cc',
			),
		),
		'vanburenborwn'    => array(
			'label'  => __( 'Van Buren Brown', 'storexmas' ),
			'colors' => array(
				'#d41616',
				'#a57a6b',
				'#a57a6b',
				'#a57a6b',
			),
		),
		'green'    => array(
			'label'  => __( 'Green', 'storexmas' ),
			'colors' => array(
				'#d41616',
				'#2dcc70',
				'#2dcc70',
				'#2dcc70',
			),
		),
	) );
}

if ( ! function_exists( 'storexmas_get_color_scheme' ) ) :
/**
 * Get the current StoreXmas color scheme.
 *
 * @since StoreXmas 1.0
 *
 * @return array An associative array of either the current or default color scheme hex values.
 */
function storexmas_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default_color' );
	$color_schemes       = storexmas_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default_color']['colors'];
}
endif;

if ( ! function_exists( 'storexmas_get_color_scheme_choices' ) ) :
/**
 * Returns an array of color scheme choices registered for StoreXmas.
 *
 * @since StoreXmas 1.0
 *
 * @return array Array of color schemes.
 */
function storexmas_get_color_scheme_choices() {
	$color_schemes                = storexmas_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}
endif; // storexmas_get_color_scheme_choices

if ( ! function_exists( 'storexmas_sanitize_color_scheme' ) ) :
/**
 * Sanitization callback for color schemes.
 *
 * @since StoreXmas 1.0
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function storexmas_sanitize_color_scheme( $value ) {
	$color_schemes = storexmas_get_color_scheme_choices();

	if ( ! array_key_exists( $value, $color_schemes ) ) {
		$value = 'default_color';
	}

	return $value;
}
endif; // storexmas_sanitize_color_scheme

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since StoreXmas 1.0
 *
 * @see wp_add_inline_style()
 */
function storexmas_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default_color' );

	// Don't do anything if the default_color color scheme is selected.

	$color_scheme = storexmas_get_color_scheme();

	$colors = array(
		'storexmas_site_page_nav_link_title_color'        => get_theme_mod('storexmas_site_page_nav_link_title_color',$color_scheme[3]),
		'storexmas_button_color'    => get_theme_mod('storexmas_button_color',$color_scheme[3]),
		'storexmas_bbpress_woocommerce_color'        => get_theme_mod('storexmas_bbpress_woocommerce_color',$color_scheme[3]),

		/* Background Color */
		'storexmas_background_top_bar'	=> get_theme_mod ('storexmas_background_top_bar','#111111'),
		'storexmas_sitetitle_logo_background_fullpage'	=> get_theme_mod ('storexmas_sitetitle_logo_background_fullpage','#d41616'),
		'storexmas_background_sticky_header'	=> get_theme_mod ('storexmas_background_sticky_header','#111111'),
		'storexmas_background_side_menu'	=> get_theme_mod ('storexmas_background_side_menu','#fb4242'),

		 /* Font Color */
		'storexmas_header_widget_contact_font_color'	=> get_theme_mod ('storexmas_header_widget_contact_font_color','#fafafa'),
		'storexmas_topbar_menu_font_color'	=> get_theme_mod ('storexmas_topbar_menu_font_color','#fafafa'),
		'storexmas_site_title_font_color'	=> get_theme_mod ('storexmas_site_title_font_color','#ffffff'),
		'storexmas_site_description_font_color'	=> get_theme_mod ('storexmas_site_description_font_color','#ffffff'),
		'storexmas_navigation_font_color'	=> get_theme_mod ('storexmas_navigation_font_color','#ffffff'),
		'storexmas_dropdown_navigation_font_color'	=> get_theme_mod ('storexmas_dropdown_navigation_font_color','#747474'),
		'storexmas_top_social_search_button_sidemenu_icon_font_color'	=> get_theme_mod ('storexmas_top_social_search_button_sidemenu_icon_font_color','#ffffff'),
	);

	$color_scheme_css = storexmas_get_color_scheme_css( $colors );

	wp_add_inline_style( 'storexmas-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'storexmas_color_scheme_css' );

/**
 * Binds JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since StoreXmas 1.0
 */
function storexmas_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls' ), '20160824', true );
	wp_localize_script( 'color-scheme-control', 'colorScheme', storexmas_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'storexmas_customize_control_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since StoreXmas 1.0
 */
function storexmas_customize_preview_js() {
	wp_enqueue_script( 'storexmas-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20160824', true );
}

add_action( 'customize_preview_init', 'storexmas_customize_preview_js' );

/**
 * Returns CSS for the color schemes.
 *
 * @since StoreXmas 1.0
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function storexmas_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'storexmas_site_page_nav_link_title_color'        => '#d41616',
		'storexmas_button_color'    => '#d41616',
		'storexmas_bbpress_woocommerce_color'        => '#d41616',

		/* Background Color */
		'storexmas_background_top_bar'	=> '#111111',
		'storexmas_sitetitle_logo_background_fullpage'	=> '#d41616',
		'storexmas_background_sticky_header'	=> '#111111',
		'storexmas_background_side_menu'	=> '#fb4242',

		/* Font Color */
		'storexmas_header_widget_contact_font_color'	=> '#fafafa',
		'storexmas_topbar_menu_font_color'	=> '#fafafa',
		'storexmas_site_title_font_color'	=> '#ffffff',
		'storexmas_site_description_font_color'	=> '#ffffff',
		'storexmas_navigation_font_color'	=> '#ffffff',
		'storexmas_dropdown_navigation_font_color'	=> '#747474',
		'storexmas_top_social_search_button_sidemenu_icon_font_color'	=> '#ffffff',
		
	) );
	$css = <<<CSS
	/****************************************************************/
						/*.... Color Style ....*/
	/****************************************************************/
	/* Nav, links and hover */

a,
ul li a:hover,
ol li a:hover,
.main-navigation a:hover, /* Navigation */
.main-navigation ul li.current-menu-item a,
.main-navigation ul li.current_page_ancestor a,
.main-navigation ul li.current-menu-ancestor a,
.main-navigation ul li.current_page_item a,
.main-navigation ul li:hover > a,
.main-navigation li.current-menu-ancestor.menu-item-has-children > a:after,
.main-navigation li.current-menu-item.menu-item-has-children > a:after,
.main-navigation ul li:hover > a:after,
.main-navigation li.menu-item-has-children > a:hover:after,
.main-navigation li.page_item_has_children > a:hover:after,
.main-navigation ul li ul li a:hover,
.main-navigation ul li ul li:hover > a,
.main-navigation ul li.current-menu-item ul li a:hover,
.side-menu-wrap .side-nav-wrap a:hover, /* Side Menu */
.top-bar .top-bar-menu a:hover,
.entry-title a:hover, /* Post */
.entry-title a:focus,
.entry-title a:active,
.entry-meta a:hover,
.image-navigation .nav-links a,
.widget ul li a:hover, /* Widgets */
.widget-title a:hover,
.widget_contact ul li a:hover,
.site-info .copyright a:hover, /* Footer */
#colophon .widget ul li a:hover,
#footer-navigation a:hover,
.gutenberg .entry-meta .author a {
	color: {$colors['storexmas_site_page_nav_link_title_color']};
}

.main-navigation ul li ul {
	border-color: {$colors['storexmas_site_page_nav_link_title_color']};
}

/* Webkit */
::selection {
	background: {$colors['storexmas_site_page_nav_link_title_color']};
	color: #fff;
}

/* Gecko/Mozilla */
::-moz-selection {
	background: {$colors['storexmas_site_page_nav_link_title_color']};
	color: #fff;
}

/* Accessibility
================================================== */
.screen-reader-text:hover,
.screen-reader-text:active,
.screen-reader-text:focus {
	background-color: #f1f1f1;
	color: {$colors['storexmas_site_page_nav_link_title_color']};
}

/* Default Buttons
================================================== */
input[type="reset"],/* Forms  */
input[type="button"],
input[type="submit"],
.btn-default,
.main-slider .flex-control-nav a.flex-active,
.main-slider .flex-control-nav a:hover,
.go-to-top .icon-bg,
.search-submit,
.vivid-red {
	background-color: {$colors['storexmas_button_color']};
}

/* #bbpress
================================================== */
#bbpress-forums .bbp-topics a:hover {
	color: {$colors['storexmas_bbpress_woocommerce_color']};
}

.bbp-submit-wrapper button.submit {
	background-color: {$colors['storexmas_bbpress_woocommerce_color']};
	border: 1px solid {$colors['storexmas_bbpress_woocommerce_color']};
}

/* Woocommerce
================================================== */
.woocommerce #respond input#submit,
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
.woocommerce-demo-store p.demo_store,
.top-bar .cart-value {
	background-color: {$colors['storexmas_bbpress_woocommerce_color']};
}

.woocommerce .woocommerce-message:before {
	color: {$colors['storexmas_bbpress_woocommerce_color']};
}

/****************************************************************/
						/*.... Background Color ....*/
/****************************************************************/

/*.... Top Bar ....*/

.top-bar {
	background-color: {$colors['storexmas_background_top_bar']};
}

/*.... Site Title and Logo(only works on top and bottom position: ) ....*/
#site-branding {
	background-color: {$colors['storexmas_sitetitle_logo_background_fullpage']};
}

/*.... Sticky Header ....*/

#sticky-header,
.is-sticky #sticky-header {
	background-color: {$colors['storexmas_background_sticky_header']};
}
@media only screen and (max-width: 980px) {
	.is-sticky #sticky-header {
		background-color: {$colors['storexmas_background_sticky_header']};
	}
}

/*.... Side Menu & Sidebar ....*/
.side-menu {
  background-color: {$colors['storexmas_background_side_menu']};
}

/****************************************************************/
						/*.... Font Color ....*/
/****************************************************************/

/* Header Widgets Contact */
.top-bar .widget_contact ul li a {
	color: {$colors['storexmas_header_widget_contact_font_color']};
}

/* Top Bar Menu */
.top-bar .top-bar-menu a,
.top-bar .wcmenucart-contents,
.top-bar .my-cart-wrap {
	color: {$colors['storexmas_topbar_menu_font_color']};
}

/* Site Title */
#site-title a {
	color: {$colors['storexmas_site_title_font_color']};
}

 /* Site Description */
#site-description {
	color: {$colors['storexmas_site_description_font_color']};
}

/* Navigation */
.main-navigation a,
.main-navigation li.menu-item-has-children > a:after,
.main-navigation li.page_item_has_children > a:after,
.main-navigation li.menu-item-has-children > a:after,
.main-navigation li li.menu-item-has-children > a:after,
.main-navigation li.page_item_has_children > a:after,
.main-navigation li li.page_item_has_children > a:after {
	color: {$colors['storexmas_navigation_font_color']};
}

@media only screen and (max-width: 980px) {
	.main-navigation ul li ul li a,
	.main-navigation ul li.current-menu-item ul li a,
	.main-navigation ul li ul li.current-menu-item a,
	.main-navigation ul li.current_page_ancestor ul li a,
	.main-navigation ul li.current-menu-ancestor ul li a,
	.main-navigation ul li.current_page_item ul li a {
		color: {$colors['storexmas_navigation_font_color']};
	}
}

.line-bar, 
.line-bar:after, 
.line-bar:before {
	background-color: {$colors['storexmas_navigation_font_color']};
}

/* Dropdown Navigation */
.main-navigation ul li ul li a,
.main-navigation ul li.current-menu-item ul li a,
.main-navigation ul li ul li.current-menu-item a,
.main-navigation ul li.current_page_ancestor ul li a,
.main-navigation ul li.current-menu-ancestor ul li a,
.main-navigation ul li.current_page_item ul li a,
.main-navigation li li.menu-item-has-children > a:after,
.main-navigation li li.page_item_has_children > a:after,
.sld-plus .header-text-light .main-navigation ul li ul li a {
	color: {$colors['storexmas_dropdown_navigation_font_color']};
}

/* Top Social Icon, Search Button and Side menu icon */
.social-links li a {
	color: {$colors['storexmas_top_social_search_button_sidemenu_icon_font_color']};
}

.header-search:after,
.header-search-x:before,
.header-search-x:after,
.show-menu-toggle .bars:after, 
.show-menu-toggle .bars:before,
.show-menu-toggle .bars {
	background-color: {$colors['storexmas_top_social_search_button_sidemenu_icon_font_color']};
}

.header-search:before {
	border-color: {$colors['storexmas_top_social_search_button_sidemenu_icon_font_color']};
}


CSS;

	return $css;
}
function storexmas_color_scheme_css_template() {
	$colors = array(

		// Color Styles
		'storexmas_site_page_nav_link_title_color'        => '{{ data.storexmas_site_page_nav_link_title_color }}',
		'storexmas_button_color'    => '{{ data.storexmas_button_color }}',
		'storexmas_bbpress_woocommerce_color'        => '{{ data.storexmas_bbpress_woocommerce_color }}',

		/* Background Color */
		'storexmas_background_top_bar'	=>  '{{ data.storexmas_background_top_bar }}',
		'storexmas_sitetitle_logo_background_fullpage'	=>  '{{ data.storexmas_sitetitle_logo_background_fullpage }}',
		'storexmas_background_sticky_header'	=>  '{{ data.storexmas_background_sticky_header }}',
		'storexmas_background_side_menu'	=>  '{{ data.storexmas_background_side_menu }}',

		/* Font Color */
		'storexmas_header_widget_contact_font_color'	=>  '{{ data.storexmas_header_widget_contact_font_color }}',
		'storexmas_topbar_menu_font_color'	=>  '{{ data.storexmas_topbar_menu_font_color }}',
		'storexmas_site_title_font_color'	=>  '{{ data.storexmas_site_title_font_color }}',
		'storexmas_site_description_font_color'	=>  '{{ data.storexmas_site_description_font_color }}',
		'storexmas_navigation_font_color'	=>  '{{ data.storexmas_navigation_font_color }}',
		'storexmas_dropdown_navigation_font_color'	=>  '{{ data.storexmas_dropdown_navigation_font_color }}',
		'storexmas_top_social_search_button_sidemenu_icon_font_color'	=>  '{{ data.storexmas_top_social_search_button_sidemenu_icon_font_color }}',
	);
	?>
	<script type="text/html" id="tmpl-storexmas-color-scheme">
		<?php echo storexmas_get_color_scheme_css( $colors ); ?>
	</script>
<?php
}
add_action( 'customize_controls_print_footer_scripts', 'storexmas_color_scheme_css_template' );