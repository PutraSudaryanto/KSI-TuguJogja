/*custom.js
Adding custom javascript or jquery function
* Copyright (c) 2014, Ommu Platform. All rights reserved.
* version: 0.0.1
*/

var windowHeight = ntbs(window).height();

/**
 * Slide Function
 *
 */
// Slide Fixed Height
function mainSlideFixed() {
	var slider = ntbs("div#slider");
	slider.css('height', windowHeight+'px');
}

// Slider Function
function mainSlider() {
	ntbs('#slider').append('<div id="supersized-loader"></div><ul id="supersized"></ul>');
	
	ntbs.supersized({				
		// Functionality
		slideshow			: 1,
		autoplay			: 1,
		start_slide			: 1,
		stop_loop			: 0,
		random				: 0,
		slide_interval		: 5000,
		transition			: 6,
		transition_speed	: 500,
		new_window			: 1,
		pause_hover			: 0,
		keyboard_nav		: 1,
		performance			: 2,
		image_protect		: 1,
		// Size & Position
		min_width			: 1,
		min_height			: 1,
		vertical_center		: 1,
		horizontal_center	: 1,
		fit_always			: 0,
		fit_portrait		: 0,
		fit_landscape		: 1,
		// Components
		slide_links				: 'blank',
		thumb_links				: 1,
		thumbnail_navigation	: 0,
		// Theme Options			   
		progress_bar			: 1,
		slides					: [
			{"image":"http://deimortal.com/public/quicknews/2_bike.png","thumb":"http://deimortal.com/timthumb.php?src=http://deimortal.com/public/quicknews/2_bike.png&h=100&w=100&zc=1&a=c","title":"bike","url":"https://twitter.com/Mba_Em"},
			{"image":"http://deimortal.com/public/quicknews/1_ijab.png","thumb":"http://deimortal.com/timthumb.php?src=http://deimortal.com/public/quicknews/1_ijab.png&h=100&w=100&zc=1&a=c","title":"ijab","url":"https://twitter.com\/Mba_Em"}]
	});
}

/**
 * Global Utility Function
 */
function utilityFunction() {
	mainSlideFixed();
	mainSlider();
}
utilityFunction();