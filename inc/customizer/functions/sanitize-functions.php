<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
/********************* STOREXMAS CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function storexmas_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function storexmas_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function storexmas_sanitize_category_select($input) {
	
	$input = sanitize_key( $input );
	return ( ( isset( $input ) && true == $input ) ? $input : '' );

}

function storexmas_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}

function storexmas_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'storexmas_theme_options');
		$input=0;
		return absint($input);
	} 
	else {
		return '';
	}
}