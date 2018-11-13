jQuery( document ).ready(function($) {
	var $window = $(window),
		flexslider = { vars:{} };
 
	// tiny helper function to add breakpoints
	function getGridSize() {
	return (window.innerWidth < 360) ? 1 :
			(window.innerWidth < 480) ? 2 :
			(window.innerWidth < 768) ? 3 :
	       (window.innerWidth < 1024) ? 4 : 6;
	}

	function getGridmultiSize() {
	return (window.innerWidth < 768) ? 1 :
	       (window.innerWidth < 1024) ? 2 : 3;
	}

	$('.layer-slider').flexslider({
	    animation: storexmas_slider_value.storexmas_animation_effect,
	    animationLoop: true,
	    slideshow: true,
	    slideshowSpeed: storexmas_slider_value.storexmas_slideshowSpeed,
	    animationSpeed: storexmas_slider_value.storexmas_animationSpeed,
	    smoothHeight: true
	});

	$('.multi-slider').flexslider({
	    animation: "slide",
	    animationLoop: true,
	    slideshow: true,
	    slideshowSpeed: storexmas_slider_value.storexmas_slideshowSpeed,
	    animationSpeed: storexmas_slider_value.storexmas_animationSpeed,
	    smoothHeight: true,
	    itemWidth: 200,
	    itemMargin: 20,
		move: 1,
		minItems: getGridmultiSize(), // use function to pull in initial value
		maxItems: getGridmultiSize() // use function to pull in initial value
	});

	$('.brand-slider').flexslider({
		animation: "slide",
		animationLoop: true,
		slideshow: true,
		controlNav: false,
		smoothHeight: false,
		slideshowSpeed: 3000,
		animationSpeed: 700,
		itemWidth: 200,
		itemMargin: 15,
		move: 1,
		minItems: getGridSize(), // use function to pull in initial value
		maxItems: getGridSize() // use function to pull in initial value
	});

	$window.resize(function() {
	    var gridSize = getGridSize();
	    var gridSize = getGridmultiSize();
	 
	    flexslider.vars.minItems = gridSize;
	    flexslider.vars.maxItems = gridSize;
	});
});

		