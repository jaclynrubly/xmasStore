<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
/*********** STOREXMAS ADD THEME SUPPORT FOR INFINITE SCROLL **************************/
function storexmas_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'storexmas_jetpack_setup' );
