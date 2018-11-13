<?php
/**
 * Display all storexmas functions and definitions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */

/************************************************************************************************/
if ( ! function_exists( 'storexmas_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function storexmas_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
			$content_width=790;
	}

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'top-menu' => __( 'Top Menu', 'storexmas' ),
		'primary' => __( 'Main Menu', 'storexmas' ),
		'side-nav-menu' => __( 'Side Menu', 'storexmas' ),
		'footermenu' => __( 'Footer Menu', 'storexmas' ),
		'social-link'  => __( 'Add Social Icons Only', 'storexmas' ),
	) );

	/* 
	* Enable support for custom logo. 
	*
	*/ 
	add_theme_support( 'custom-logo', array(
		'flex-width' => true, 
		'flex-height' => true,
	) );

	add_theme_support( 'gutenberg', array(
			'colors' => array(
				'#d41616',
			),
		) );
	add_theme_support( 'align-wide' );

	//Indicate widget sidebars can use selective refresh in the Customizer. 
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Switch default core markup for comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'storexmas_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_editor_style( array( 'css/editor-style.css') );

/**
 * Load WooCommerce compatibility files.
 */
	
require get_template_directory() . '/woocommerce/functions.php';


}
endif; // storexmas_setup
add_action( 'after_setup_theme', 'storexmas_setup' );

/***************************************************************************************/
function storexmas_content_width() {
	if ( is_page_template( 'page-templates/gallery-template.php' ) || is_attachment() ) {
		global $content_width;
		$content_width = 1170;
	}
}
add_action( 'template_redirect', 'storexmas_content_width' );

/***************************************************************************************/
if(!function_exists('storexmas_get_theme_options')):
	function storexmas_get_theme_options() {
	    return wp_parse_args(  get_option( 'storexmas_theme_options', array() ), storexmas_get_option_defaults_values() );
	}
endif;

/***************************************************************************************/
require get_template_directory() . '/inc/customizer/storexmas-default-values.php';
require get_template_directory() . '/inc/settings/storexmas-functions.php';
require get_template_directory() . '/inc/settings/storexmas-common-functions.php';
require get_template_directory() . '/inc/jetpack.php';

/************************ StoreXmas Sidebar  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';

/************************ StoreXmas Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';

/************************ TGM Plugin Activatyion  *****************************/
require get_template_directory() . '/tgm/class-tgm-plugin-activation.php';
require get_template_directory() . '/tgm/tgm.php';

function storexmas_customize_register( $wp_customize ) {
if(!class_exists('StoreXmas_Plus_Features')){
	class StoreXmas_Customize_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
			<a title="<?php esc_html_e( 'Review Us', 'storexmas' ); ?>" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/storexmas/' ); ?>" target="_blank" id="about_storexmas">
			<?php esc_html_e( 'Review Us', 'storexmas' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'https://themefreesia.com/theme-instruction/storexmas/' ); ?>" title="<?php esc_html_e( 'Theme Instructions', 'storexmas' ); ?>" target="_blank" id="about_storexmas">
			<?php esc_html_e( 'Theme Instructions', 'storexmas' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'https://tickets.themefreesia.com/' ); ?>" title="<?php esc_html_e( 'Support Tickets', 'storexmas' ); ?>" target="_blank" id="about_storexmas">
			<?php esc_html_e( 'Forum', 'storexmas' ); ?>
			</a><br/>
		<?php
		}
	}
	$wp_customize->add_section('storexmas_upgrade_links', array(
		'title'					=> __('Important Links', 'storexmas'),
		'priority'				=> 1000,
	));
	$wp_customize->add_setting( 'storexmas_upgrade_links', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new StoreXmas_Customize_upgrade(
		$wp_customize,
		'storexmas_upgrade_links',
			array(
				'section'				=> 'storexmas_upgrade_links',
				'settings'				=> 'storexmas_upgrade_links',
			)
		)
	);
}	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'storexmas_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'storexmas_customize_partial_blogdescription',
		) );
	}
	
	require get_template_directory() . '/inc/customizer/functions/design-options.php';
	require get_template_directory() . '/inc/customizer/functions/theme-options.php';
	require get_template_directory() . '/inc/customizer/functions/flurry-options.php';
	require get_template_directory() . '/inc/customizer/functions/color-options.php' ;
	require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php' ;
	if ( class_exists( 'WooCommerce' ) ) {
		require get_template_directory() . '/inc/customizer/functions/frontpage-features.php' ;
	}
}
if(!class_exists('StoreXmas_Plus_Features')){
	// Add Upgrade to Plus Button.
	require_once( trailingslashit( get_template_directory() ) . 'inc/upgrade-plus/class-customize.php' );
}

/* Color Styles */
require get_template_directory() . '/inc/settings/color-option-functions.php';

/** 
* Render the site title for the selective refresh partial. 
* @see storexmas_customize_register() 
* @return void 
*/ 
function storexmas_customize_partial_blogname() { 
bloginfo( 'name' ); 
} 

/** 
* Render the site tagline for the selective refresh partial. 
* @see storexmas_customize_register() 
* @return void 
*/ 
function storexmas_customize_partial_blogdescription() { 
bloginfo( 'description' ); 
}
add_action( 'customize_register', 'storexmas_customize_register' );
/******************* StoreXmas Header Display *************************/
function storexmas_header_display(){
	$storexmas_settings = storexmas_get_theme_options();

$header_display = $storexmas_settings['storexmas_header_display'];
if ($header_display == 'header_logo' || $header_display == 'header_text' || $header_display == 'show_both')	{
	echo '<div id="site-branding">';
		if($header_display != 'header_text'){
			storexmas_the_custom_logo();
		}
		echo '<div id="site-detail">';
			if (is_home() || is_front_page()){ ?>
			<h1 id="site-title"> <?php }else{?> <h2 id="site-title"> <?php } ?>
			<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
			<?php if(is_home() || is_front_page()){ ?>
			</h1>  <!-- end .site-title -->
			<?php } else { ?> </h2> <!-- end .site-title --> <?php }

			$site_description = get_bloginfo( 'description', 'display' );
			if ($site_description){?>
				<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
	<?php }
	echo '</div></div>'; // end #site-branding
}

}
add_action('storexmas_site_branding','storexmas_header_display');

if ( ! function_exists( 'storexmas_the_custom_logo' ) ) : 
 	/** 
 	 * Displays the optional custom logo. 
 	 * Does nothing if the custom logo is not available. 
 	 */ 
 	function storexmas_the_custom_logo() { 
		if ( function_exists( 'the_custom_logo' ) ) { 
			the_custom_logo(); 
		}
 	} 
endif;

require get_template_directory() . '/inc/front-page/front-page-features.php';
/************** Footer Menu *************************************/
function storexmas_footer_menu_section(){
	if(has_nav_menu('footermenu')):
		$args = array(
			'theme_location' => 'footermenu',
			'container'      => '',
			'items_wrap'     => '<ul>%3$s</ul>',
		);
		echo '<nav id="footer-navigation">';
		wp_nav_menu($args);
		echo '</nav><!-- end #footer-navigation -->';
	endif;
}
add_action( 'storexmas_footer_menu', 'storexmas_footer_menu_section' );