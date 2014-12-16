<?php

/**
* Ommu-Notoboso Theme Customizer
* A Theme Customizer for Ommu-Notoboso. Adds the individual sections, settings, and controls to the theme customizer
*
* Built utilizing the following tutorials:
*
* @author Tom McFarlin (@tommcfarlin)
* @see http://wp.tutsplus.com/tutorials/theme-development/a-guide-to-the-wordpress-theme-customizer-what-it-is-why-it-benefits-us/
*
* @author Alex Mansfield (@alexmansfield)
* @see http://themefoundation.com/wordpress-theme-customizer/
*
* @author Slobodan Manic (@slobodanmanic)
* @see http://www.wpexplorer.com/theme-customizer-introduction/
*
* @author Devin Price (@devinsays)
* @see http://wptheming.com/2012/06/add-options-to-theme-customizer-default-sections/
*
* @since Ommu-Notoboso 5.0.3
*/

function ommu_customizer( $wp_customize ) { // Begin Ommu-Notoboso Theme Customizer

// Remove the default sections because we are going to create our own
$wp_customize->remove_section('title_tagline');
$wp_customize->remove_section('colors');
$wp_customize->remove_section('header_image');
$wp_customize->remove_section('background_image');

// Change some of the defaults
$wp_customize->get_section('nav')->priority = 20; // Changed priority so it shows after the Header section
$wp_customize->get_section('static_front_page')->priority = 70; // Changed priority so it shows at the end of the Theme Customizer
$wp_customize->get_section('static_front_page')->description = __( 'Set up a front page of Ommu-Notoboso.', 'ommu_notoboso' );
 
/*
 * OK, now we can start building our own theme customizer.
 */

// Header Section
    $wp_customize->add_section('ommu_header', array(
		'title' => __('Header', 'ommu_notoboso'),
		'description' => __('Modify the header portion of Ommu-Notoboso', 'ommu_notoboso'),
		'priority' => 10,
	));
	// Add Site Logo
	$wp_customize->add_setting('ommu_logo',array(
		'default' => '',
		'type'           => 'theme_mod',
	));	 
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'ommu_logo',array(
		'label' => __('Site Logo', 'ommu_notoboso'),
		'section' => 'ommu_header',
		'settings' => 'ommu_logo',
		'priority' => 1,
	)));
	// Site Title
	$wp_customize->add_setting('blogname', array( 
		'default'    => get_option('blogname'),
		'type'       => 'theme_mod',
		'capability' => 'manage_options',
		'transport'  => 'postMessage',
	 ));
	$wp_customize->add_control('blogname', array( 
		'label'    => __('Site Title', 'ommu_notoboso'),
		'section'  => 'ommu_header',
		'priority' => 2,
	 ));
	 // Site Tagline
	$wp_customize->add_setting('blogdescription', array( 
		'default'    => get_option('blogdescription'),
		'type'       => 'theme_mod',
		'capability' => 'manage_options',
		'transport'  => 'postMessage',
	 ));
	$wp_customize->add_control('blogdescription', array( 
		'label'    => __('Tagline', 'ommu_notoboso'),
		'section'  => 'ommu_header',
		'priority' => 3,
	 ));
	 // Show Site Title/Tagline
	$wp_customize->add_setting('hide_headtxt', array( 
		'default'    => 1,
		'type'       => 'theme_mod',
		'capability' => 'manage_options',
		'sanitize_callback' => 'ommu_sanitize_headtxt',
		'transport'  => 'postMessage',
	 ));	
	$wp_customize->add_control('hide_headtxt', array( 
		'label'    => __('Show Title &amp; Tagline', 'ommu_notoboso'),
		'section'  => 'ommu_header',
		'type'     => 'checkbox',
		'priority' => 4,
	 ));
	 
// Navigation Section
	// Main Menu Position
	$wp_customize->add_setting('ommu_nav_position',array(
		'default' => 'normal',
		'type'    => 'theme_mod',
		'capability' => 'manage_options',
		'priority' => 110,	
	));
	$wp_customize->add_control('ommu_nav_position',array(
		'type' => 'select',
		'label' => __('Main Menu Position', 'ommu_notoboso'),
		'section' => 'nav',
		'choices' => array(
			'normal' => 'Normal Position',
			'top'    => 'Top of Browser',
			'sticky'   => 'Contain-To-Grid Sticky',
		),
	));
	// Main Menu Display Type
	$wp_customize->add_setting('ommu_nav_display',array(
		'default' => 'scroll',
		'type'    => 'theme_mod',
		'capability' => 'manage_options',
			'priority' => 120,		
	));
	$wp_customize->add_control('ommu_nav_display',array(
		'type' => 'select',
		'label' => __('If Top of Browser, scroll or fixed?', 'ommu_notoboso'),
		'section' => 'nav',
		'choices' => array(
			'scroll' => 'Scroll',
			'fixed'  => 'Fixed',
		),
	));
	// Main Menu Main Link Anchor
	$wp_customize->add_setting('ommu_nav_title',array(
		'default' => 'no',
		'type'    => 'theme_mod',
		'capability' => 'manage_options',
		'priority' => 130,		
	));
	$wp_customize->add_control('ommu_nav_title',array(
		'type' => 'select',
		'label' => __('Change text for Home Link?', 'ommu_notoboso'),
		'section' => 'nav',
		'choices' => array(
			'no' => 'No',
			'yes'  => 'Yes',
		),
	));
	$wp_customize->add_control('ommu_nav_title',array(
		'type' => 'select',
		'label' => __('Change text for Home Link?', 'ommu_notoboso'),
		'section' => 'nav',
		'choices' => array(
			'no' => 'No',
			'yes'  => 'Yes',
		),
	));
	// Main Menu Main Link Text
	$wp_customize->add_setting('ommu_nav_text',array(
		'default' => '',
		'priority' => 140,
	));
	$wp_customize->add_control('ommu_nav_text',array(
		'label' => __('If Yes, Add New Anchor Text','ommu_notoboso'),
		'section' => 'nav',
		'type' => 'text',
		'sanitize_callback' => 'ommu_sanitize_navtxt',
	));	 						
	
//The Post Section 
    $wp_customize->add_section('ommu_posts',array(
		'title' => __('Posts', 'ommu_notoboso'),
		'description' => __('Modify how posts appear in Ommu-Notoboso.', 'ommu_notoboso'),
		'priority' => 30,
    ));
	$wp_customize->add_setting('ommu_post_display',array(
		'default' => 'full',
		'type' => 'theme_mod',
		'capability' => 'manage_options',		
		'sanitize_callback' => 'ommu_sanitize_post_display',
		'priority' => 1,		
	));
	$wp_customize->add_control('ommu_post_display',array(
		'type' => 'select',
		'label' => __('Display Full Post or Excerpt?', 'ommu_notoboso'),
		'section' => 'ommu_posts',
		'choices' => array(
			'full' => 'Full Post',
			'excerpt' => 'Excerpt',
		),
	));
	$wp_customize->add_setting('ommu_thumb_display',array(
		'default' => 'no',
		'type' => 'theme_mod',
		'capability' => 'manage_options',		
		'sanitize_callback' => 'ommu_sanitize_thumb_display',
		'priority' => 2,		
	));
	$wp_customize->add_control('ommu_thumb_display',array(
		'type' => 'select',
		'label' => __('Display Post Thumbnails?', 'ommu_notoboso'),
		'section' => 'ommu_posts',
		'choices' => array(
			'no' => 'No',
			'yes' => 'Yes',
		),
	));	
				
//The Footer Section
    $wp_customize->add_section('ommu_footer',array(
		'title' => __('Footer','ommu_notoboso'),
		'description' => __('Modify the footer text of Ommu-Notoboso.', 'ommu_notoboso'),
		'priority' => 40,
    ));
	$wp_customize->add_setting('ommu_footer_text',array(
		'default' => '',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('ommu_footer_text',array(
		'label' => __('Copyright Text','ommu_notoboso'),
		'section' => 'ommu_footer',
		'type' => 'text',
		'sanitize_callback' => 'ommu_sanitize_footer_text',
	));

// Background Section
    $wp_customize->add_section('ommu_background', array(
		'title' => __('Background', 'ommu_notoboso'),
		'description' => __('Modify the background of Ommu-Notoboso.', 'ommu_notoboso'),
		'priority' => 50,
     ));
	// Background Color	 
	$wp_customize->add_setting('ommu_background_color', array(
        'default' => '#e6e6e6',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'theme_supports' => 'ommu-backgrounds',
		'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,		
    ));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'ommu_background_color',array(
		'label' => __('Background Color', 'ommu_notoboso'),
		'section' => 'ommu_background',
		'settings' => 'ommu_background_color',
	)));	 
	// Background Image
	$wp_customize->add_setting('ommu_background_img',array(
		'default' => '',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'theme_supports' => 'ommu-backgrounds',
		'capability' => 'manage_options',
		'priority' => 2,						
	));	 
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'ommu_background_img',array(
		'label' => __('Background Image', 'ommu_notoboso'),
		'section' => 'ommu_background',
		'settings' => 'ommu_background_img',
	)));
	// Background Image Repeat			
	$wp_customize->add_setting( 'ommu_background_repeat', array(
		'default' => 'repeat',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'theme_supports' => 'ommu-backgrounds',
		'sanitize_callback' => 'ommu_sanitize_background_repeat',
		'capability' => 'manage_options',
		'priority' => 3,			
	));
	$wp_customize->add_control( 'ommu_background_repeat', array(
		'label'      => __( 'Background Repeat','ommu_notoboso' ),
		'section'    => 'ommu_background',
		'type'       => 'select',
		'choices'    => array(
			'no-repeat'  => __('No Repeat', 'ommu_notoboso'),
			'repeat'     => __('Tile', 'ommu_notoboso'),
			'repeat-x'   => __('Tile Horizontally', 'ommu_notoboso'),
			'repeat-y'   => __('Tile Vertically', 'ommu_notoboso'),
		),
	));
	// Background Image Position	
	$wp_customize->add_setting( 'ommu_background_position', array(
		'default'  => 'left',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'theme_supports' => 'ommu-backgrounds',
		'sanitize_callback' => 'ommu_sanitize_background_position',
		'capability' => 'manage_options',
		'priority' => 4,			
	));
	$wp_customize->add_control( 'ommu_background_position', array(
		'label'      => __( 'Background Position','ommu_notoboso' ),
		'section'    => 'ommu_background',
		'type'       => 'select',
		'choices'    => array(
			'left'       => __('Left', 'ommu_notoboso'),
			'center'     => __('Center', 'ommu_notoboso'),
			'right'      => __('Right', 'ommu_notoboso'),
		),
	));
	// Background Image Attachment	
	$wp_customize->add_setting( 'ommu_background_attachment', array(
		'default'    => 'scroll',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'theme_supports' => 'ommu-backgrounds',
		'sanitize_callback' => 'ommu_sanitize_background_attachment',
		'capability' => 'manage_options',
		'priority' 	 => 5,			
	));
	$wp_customize->add_control( 'ommu_background_attachment', array(
		'label'      => __( 'Background Attachment','ommu_notoboso' ),
		'section'    => 'ommu_background',
		'type'       => 'select',
		'choices'    => array(
			'scroll'      => __('Scroll', 'ommu_notoboso'),
			'fixed'     => __('Fixed', 'ommu_notoboso'),
		),
	));
	
// Colors Section
    $wp_customize->add_section('ommu_colors', array(
		'title' => __('Colors', 'ommu_notoboso'),
		'description' => __('Change some default colors of Ommu-Notoboso.', 'ommu_notoboso'),
		'priority' => 60,
     )); 	 	 
	// Title Color	 
	$wp_customize->add_setting('ommu_title_color', array(
        'default' => '#444444',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,		
    ));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'ommu_title_color',array(
		'label' => __('Title Color','ommu_notoboso'),
		'section' => 'ommu_colors',
		'settings' => 'ommu_title_color',
	)));
	// Text Color	 
	$wp_customize->add_setting('ommu_text_color', array(
        'default' => '#444444',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,		
    ));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'ommu_text_color',array(
		'label' => __('Text Color','ommu_notoboso'),
		'section' => 'ommu_colors',
		'settings' => 'ommu_text_color',
	)));	
	// Link Color	 
	$wp_customize->add_setting('ommu_link_color', array(
        'default' => '#008cba',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,		
    ));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'ommu_link_color',array(
		'label' => __('Link Color','ommu_notoboso'),
		'section' => 'ommu_colors',
		'settings' => 'ommu_link_color',
	)));
	// Link Hover Color	 
	$wp_customize->add_setting('ommu_hover_color', array(
        'default' => '#0079a1',
		'type' => 'theme_mod',
		'transport' => 'postMessage',
		'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,		
    ));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'ommu_hover_color',array(
		'label' => __('Hover Color','ommu_notoboso'),
		'section' => 'ommu_colors',
		'settings' => 'ommu_hover_color',
	)));			 
		
/*
 * Sanitize - Add a sanitation functions section for text inputs, check boxes, radio buttons and select lists
 * I like to keep them all in one area for organization.
 * 
 * @since Ommu-Notoboso 5.0.3
 */
 
 // Header Sanitation
function ommu_sanitize_headtxt( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// Navigation Sanitation
function ommu_sanitize_navtxt( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

// Post Sanitation
function ommu_sanitize_post_display( $input ) {
    $valid = array(
        'full' => 'Full Post',
		'excerpt' => 'Excerpt',
    );
	
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function ommu_sanitize_thumb_display( $input ) {
    $valid = array(
        'yes' => 'Yes',
		'no' => 'No',
    );
	
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Footer Sanitation
function ommu_sanitize_footer_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

// Background Sanitation
function ommu_sanitize_background_repeat( $input ) {
    $valid = array(
        'no-repeat' => 'No Repeat',
        'repeat' 	=> 'Tile',
		'repeat-x' 	=> 'Title Horizontally',
		'repeat-y' 	=> 'Tile Vertically',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function ommu_sanitize_background_position( $input ) {
    $valid = array(
        'left' => 'Left',
        'center' => 'Center',
		'right' => 'Right',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function ommu_sanitize_background_attachment( $input ) {
    $valid = array(
        'scroll' => 'Scroll',
        'fixed' => 'Fixed',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}	

/**
 * Add postMessage support for some sections of our Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * 
 * @since Ommu-Notoboso 5.0.3
 */
$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
$wp_customize->get_setting( 'hide_headtxt' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_footer_text' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_background_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_background_img' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_background_repeat' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_background_position' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_background_attachment' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_title_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_text_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_link_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'ommu_hover_color' )->transport = 'postMessage';

}
add_action( 'customize_register', 'ommu_customizer' ); // End Ommu-Notoboso Theme Customizer

/**
 * Modifies our styles and writes them in the <head> element of the page based on the Ommu-Notoboso Theme Customizer options
 * @author Anthony Wilhelm (@awshout)
 * @see https://github.com/awtheme/reactor
 *
 * @since Ommu-Notoboso 5.0.3
 */
function ommu_customizer_css() {
	do_action('ommu_customizer_css');
		
	$output = ''; $body_css = '';	
		
	if ( get_theme_mod('ommu_background_color') ) {
	    $body_css .= 'background-color: ' . get_theme_mod('ommu_background_color') . ';';
	}
	if ( get_theme_mod('ommu_background_img') ) {
	    $body_css .= 'background-image: url("' . get_theme_mod('ommu_background_img') . '");';
	}
	if ( get_theme_mod('ommu_background_repeat') && get_theme_mod('ommu_background_repeat') != 'repeat') {
	    $body_css .= 'background-repeat: ' . get_theme_mod('ommu_background_repeat') . ';';
	}
	if ( get_theme_mod('ommu_background_position') && get_theme_mod('ommu_background_position') != 'left') {
	    $body_css .= 'background-position: ' . get_theme_mod('ommu_background_position') . ';';
	}
	if ( get_theme_mod('ommu_background_attachment') && get_theme_mod('ommu_background_attachment') != 'scroll') {
	    $body_css .= 'background-attachment: ' . get_theme_mod('ommu_background_attachment') . ';';
	}	
	if ( get_theme_mod('ommu_text_color') ) {
	    $body_css .= 'color: ' . get_theme_mod('ommu_text_color') . ';';
	}
	if ( !empty( $body_css ) ) {
	    $output .= "\n" . 'body { ' .  $body_css . ' }';
	}
	if ( 0 == get_theme_mod('hide_headtxt', 1) ) {
	    $output .= "\n" . '.site-title, .site-description { display: none; }';
	}	
	if ( get_theme_mod('ommu_title_color') ) {
	    $output .= "\n" . 'h1,h2,h3,h4,h5,h6 { color: ' . get_theme_mod('ommu_title_color') . '; }';
	}		
	if ( get_theme_mod('ommu_link_color') ) {
	    $output .= "\n" . 'a { color: ' . get_theme_mod('ommu_link_color') . '; }';
	}
	if ( get_theme_mod('ommu_hover_color') ) {
	    $output .= "\n" . 'a:hover { color: ' . get_theme_mod('ommu_hover_color') . '; }';
	}			
	
	echo ( $output ) ? '<style>' . apply_filters('ommu_customizer_css', $output) . "\n" . '</style>' . "\n" : '';
}
add_action('wp_head', 'ommu_customizer_css');

/**
 * Registers Ommu-Notoboso Theme Customizer Preview with WordPress.
 *
 * @since Ommu-Notoboso 5.0.3
 */
function ommu_customize_preview_js() {
	wp_enqueue_script('ommu-customizer', get_template_directory_uri() . '/inc/customizer/js/theme-customizer.js', array('jquery', 'customize-preview' ),'1.0.0', true);
}
add_action( 'customize_preview_init', 'ommu_customize_preview_js' );

?>