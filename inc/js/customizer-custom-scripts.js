( function( api ) {

	// Extends our custom "storexmas" section.
	api.sectionConstructor['storexmas'] = api.Section.extend( {

		// No storexmass for this type of section.
		attachStoreXmass: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
