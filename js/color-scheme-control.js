/* global colorScheme, Color */
/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.
 * Also trigger an update of the Color Scheme CSS when a color is changed.
 */

( function( api ) {
	var cssTemplate = wp.template( 'storexmas-color-scheme' ),
		colorSchemeKeys = [
		'storexmas_site_page_nav_link_title_color',
		'storexmas_button_color',
		'storexmas_bbpress_woocommerce_color',
		],
		colorSettings = [
		'storexmas_site_page_nav_link_title_color',
		'storexmas_button_color',
		'storexmas_bbpress_woocommerce_color',

		/* Background Color */
		'storexmas_background_top_bar',
		'storexmas_sitetitle_logo_background_fullpage',
		'storexmas_background_sticky_header',
		'storexmas_background_side_menu',

		/*Font Color */
		'storexmas_header_widget_contact_font_color',
		'storexmas_topbar_menu_font_color',
		'storexmas_site_title_font_color',
		'storexmas_site_description_font_color',
		'storexmas_navigation_font_color',
		'storexmas_dropdown_navigation_font_color',
		'storexmas_top_social_search_button_sidemenu_icon_font_color', 
		];

	api.controlConstructor.select = api.Control.extend( {
		ready: function() {
			if ( 'color_scheme' === this.id ) {
				this.setting.bind( 'change', function( value ) {

					api( 'storexmas_site_page_nav_link_title_color' ).set( colorScheme[value].colors[3] );
					api.control( 'storexmas_site_page_nav_link_title_color' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', colorScheme[value].colors[3] )
						.wpColorPicker( 'defaultColor', colorScheme[value].colors[3] );

					api( 'storexmas_button_color' ).set( colorScheme[value].colors[3] );
					api.control( 'storexmas_button_color' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', colorScheme[value].colors[3] )
						.wpColorPicker( 'defaultColor', colorScheme[value].colors[3] );

					api( 'storexmas_bbpress_woocommerce_color' ).set( colorScheme[value].colors[3] );
					api.control( 'storexmas_bbpress_woocommerce_color' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', colorScheme[value].colors[3] )
						.wpColorPicker( 'defaultColor', colorScheme[value].colors[3] );

				} );
			}
		}
	} );

	// Generate the CSS for the current Color Scheme.
	function updateCSS() {
		var scheme = api( 'color_scheme' )(), css,
			colors = _.object( colorSchemeKeys, colorScheme[ scheme ].colors );

		// Merge in color scheme overrides.
		_.each( colorSettings, function( setting ) {
			colors[ setting ] = api( setting )();
		});
		// Add additional colors.
		colors.storexmas_site_page_nav_link_title_color = Color( colors.storexmas_site_page_nav_link_title_color ).toCSS();
		colors.storexmas_button_color = Color( colors.storexmas_button_color ).toCSS();
		colors.storexmas_bbpress_woocommerce_color = Color( colors.storexmas_bbpress_woocommerce_color ).toCSS();
		css = cssTemplate( colors );

		/* Background Color */
		colors.storexmas_background_top_bar = Color (colors.storexmas_background_top_bar).toCSS();
		colors.storexmas_sitetitle_logo_background_fullpage = Color (colors.storexmas_sitetitle_logo_background_fullpage).toCSS();
		colors.storexmas_background_sticky_header = Color (colors.storexmas_background_sticky_header).toCSS();
		colors.storexmas_background_side_menu = Color (colors.storexmas_background_side_menu).toCSS();

		/* Font Color */
		colors.storexmas_header_widget_contact_font_color = Color (colors.storexmas_header_widget_contact_font_color).toCSS();
		colors.storexmas_topbar_menu_font_color = Color (colors.storexmas_topbar_menu_font_color).toCSS();
		colors.storexmas_site_title_font_color = Color (colors.storexmas_site_title_font_color).toCSS();
		colors.storexmas_site_description_font_color = Color (colors.storexmas_site_description_font_color).toCSS();
		colors.storexmas_navigation_font_color = Color (colors.storexmas_navigation_font_color).toCSS();
		colors.storexmas_dropdown_navigation_font_color = Color (colors.storexmas_dropdown_navigation_font_color).toCSS();
		colors.storexmas_top_social_search_button_sidemenu_icon_font_color = Color (colors.storexmas_top_social_search_button_sidemenu_icon_font_color).toCSS();

		api.previewer.send( 'update-color-scheme-css', css );
	}

	// Update the CSS whenever a color setting is changed.
	_.each( colorSettings, function( setting ) {
		api( setting, function( setting ) {
			setting.bind( updateCSS );
		} );
	} );
} )( wp.customize );
