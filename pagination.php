<?php
/**
 * The template for displaying navigation.
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
$storexmas_settings = storexmas_get_theme_options();
if ( !class_exists( 'Jetpack') || class_exists( 'Jetpack') && !Jetpack::is_module_active( 'infinite-scroll' ) ){
	if ( function_exists('wp_pagenavi' ) ) :
		wp_pagenavi();
	else: 
	// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => '<i class="fa fa-angle-double-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'storexmas' ).'</span>',
			'next_text'          => '<i class="fa fa-angle-double-right"></i><span class="screen-reader-text">' . __( 'Next page', 'storexmas' ).'</span>',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'storexmas' ) . ' </span>',
		) );
	endif;
}