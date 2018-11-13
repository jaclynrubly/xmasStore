jQuery( document ).ready( function() {
    jQuery( 'body' ).flurry({
        character: storexmas_flurry_value.storexmas_flurry_character,
        color: "white",
        height: storexmas_flurry_value.storexmas_flurry_height,
        frequency: 20,
        speed: storexmas_flurry_value.storexmas_flurry_speed,
        small: 5,
        large: 25,
        wind: 400,
        windVariance: 400,
        rotation: 0,
        rotationVariance: 90
    });
});