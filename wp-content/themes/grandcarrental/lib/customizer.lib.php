<?php
/**
* Custom Sanitize Functions
**/
function grandcarrental_sanitize_checkbox( $input ) {
	if(is_bool($input))
	{
		return $input;
	}
	else
	{
		return false;
	}

}

function grandcarrental_sanitize_slider( $input ) {	if(is_numeric($input))
	{
		return $input;
	}
	else
	{
		return 0;

	}
}

function grandcarrental_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/*** Configuration to disable default Wordpress customizer tabs
**/

add_action( 'customize_register', 'grandcarrental_customize_register' );
function grandcarrental_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
}

/**
 * Configuration sample for the Kirki Customizer
 */
function grandcarrental_demo_configuration_sample() {

    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => esc_html__('Background Color', 'grandcarrental' ),
        'background-image' => esc_html__('Background Image', 'grandcarrental' ),
        'no-repeat' => esc_html__('No Repeat', 'grandcarrental' ),
        'repeat-all' => esc_html__('Repeat All', 'grandcarrental' ),
        'repeat-x' => esc_html__('Repeat Horizontally', 'grandcarrental' ),
        'repeat-y' => esc_html__('Repeat Vertically', 'grandcarrental' ),
        'inherit' => esc_html__('Inherit', 'grandcarrental' ),
        'background-repeat' => esc_html__('Background Repeat', 'grandcarrental' ),
        'cover' => esc_html__('Cover', 'grandcarrental' ),
        'contain' => esc_html__('Contain', 'grandcarrental' ),
        'background-size' => esc_html__('Background Size', 'grandcarrental' ),
        'fixed' => esc_html__('Fixed', 'grandcarrental' ),
        'scroll' => esc_html__('Scroll', 'grandcarrental' ),
        'background-attachment' => esc_html__('Background Attachment', 'grandcarrental' ),
        'left-top' => esc_html__('Left Top', 'grandcarrental' ),
        'left-center' => esc_html__('Left Center', 'grandcarrental' ),
        'left-bottom' => esc_html__('Left Bottom', 'grandcarrental' ),
        'right-top' => esc_html__('Right Top', 'grandcarrental' ),
        'right-center' => esc_html__('Right Center', 'grandcarrental' ),
        'right-bottom' => esc_html__('Right Bottom', 'grandcarrental' ),
        'center-top' => esc_html__('Center Top', 'grandcarrental' ),
        'center-center' => esc_html__('Center Center', 'grandcarrental' ),
        'center-bottom' => esc_html__('Center Bottom', 'grandcarrental' ),
        'background-position' => esc_html__('Background Position', 'grandcarrental' ),
        'background-opacity' => esc_html__('Background Opacity', 'grandcarrental' ),
        'ON' => esc_html__('ON', 'grandcarrental' ),
        'OFF' => esc_html__('OFF', 'grandcarrental' ),
        'all' => esc_html__('All', 'grandcarrental' ),
        'cyrillic' => esc_html__('Cyrillic', 'grandcarrental' ),
        'cyrillic-ext' => esc_html__('Cyrillic Extended', 'grandcarrental' ),
        'devanagari' => esc_html__('Devanagari', 'grandcarrental' ),
        'greek' => esc_html__('Greek', 'grandcarrental' ),
        'greek-ext' => esc_html__('Greek Extended', 'grandcarrental' ),
        'khmer' => esc_html__('Khmer', 'grandcarrental' ),
        'latin' => esc_html__('Latin', 'grandcarrental' ),
        'latin-ext' => esc_html__('Latin Extended', 'grandcarrental' ),
        'vietnamese' => esc_html__('Vietnamese', 'grandcarrental' ),
    );

    $args = array(
        'textdomain'   => 'grandcarrental',
    );

    return $args;

}
add_filter( 'kirki/config', 'grandcarrental_demo_configuration_sample' );

/**
 * Create the customizer panels and sections
 */
function grandcarrental_add_panels_and_sections( $wp_customize ) {

	/**
     * Add panels
     */
    $wp_customize->add_panel( 'general', array(
        'priority'    => 35,
        'title'       => esc_html__('General', 'grandcarrental' ),
    ) ); 
    
    $wp_customize->add_panel( 'menu', array(
        'priority'    => 35,
        'title'       => esc_html__('Navigation', 'grandcarrental' ),
    ) );
    
    $wp_customize->add_panel( 'header', array(
        'priority'    => 39,
        'title'       => esc_html__('Header', 'grandcarrental' ),
    ) );
    
    $wp_customize->add_panel( 'sidebar', array(
        'priority'    => 43,
        'title'       => esc_html__('Sidebar', 'grandcarrental' ),
    ) );
    
    $wp_customize->add_panel( 'footer', array(
        'priority'    => 44,
        'title'       => esc_html__('Footer', 'grandcarrental' ),
    ) );
    
    $wp_customize->add_panel( 'gallery', array(
        'priority'    => 45,
        'title'       => esc_html__('Gallery', 'grandcarrental' ),
    ) );
    
    $wp_customize->add_panel( 'car', array(
        'priority'    => 46,
        'title'       => esc_html__('Car', 'grandcarrental' ),
    ) );
    
    $wp_customize->add_panel( 'blog', array(
        'priority'    => 47,
        'title'       => esc_html__('Blog', 'grandcarrental' ),
    ) );
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		$wp_customize->add_panel( 'shop', array(
	        'priority'    => 48,
	        'title'       => esc_html__('Shop', 'grandcarrental' ),
	    ) );
	}

    /**
     * Add sections
     */
	$wp_customize->add_section( 'logo_favicon', array(
        'title'       => esc_html__('Logo & Favicon', 'grandcarrental' ),
        'priority'    => 34,

    ) );
    
    $wp_customize->add_section( 'general_image', array(
        'title'       => esc_html__('Image', 'grandcarrental' ),
        'panel'		  => 'general',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'general_typography', array(
        'title'       => esc_html__('Typography', 'grandcarrental' ),
        'panel'		  => 'general',
        'priority'    => 47,

    ) );
    
    $wp_customize->add_section( 'general_color', array(
        'title'       => esc_html__('Background & Colors', 'grandcarrental' ),
        'panel'		  => 'general',
        'priority'    => 48,

    ) );
    
    $wp_customize->add_section( 'general_input', array(
        'title'       => esc_html__('Input and Button Elements', 'grandcarrental' ),
        'panel'		  => 'general',
        'priority'    => 49,

    ) );
    
    $wp_customize->add_section( 'general_sharing', array(
        'title'       => esc_html__('Sharing', 'grandcarrental' ),
        'panel'		  => 'general',
        'priority'    => 50,

    ) );
    
    $wp_customize->add_section( 'general_mobile', array(
        'title'       => esc_html__('Mobile', 'grandcarrental' ),
        'panel'		  => 'general',
        'priority'    => 50,

    ) );
    
    $wp_customize->add_section( 'general_frame', array(
        'title'       => esc_html__('Frame', 'grandcarrental' ),
        'panel'		  => 'general',
        'priority'    => 51,

    ) );
    
    $wp_customize->add_section( 'general_boxed', array(
        'title'       => esc_html__('Boxed Layout', 'grandcarrental' ),
        'panel'		  => 'general',
        'priority'    => 52,

    ) );

    $wp_customize->add_section( 'menu_general', array(
        'title'       => esc_html__('General', 'grandcarrental' ),
        'panel'		  => 'menu',
        'priority'    => 36,

    ) );
    
    $wp_customize->add_section( 'menu_typography', array(
        'title'       => esc_html__('Typography', 'grandcarrental' ),
        'panel'		  => 'menu',
        'priority'    => 36,

    ) );
    
    $wp_customize->add_section( 'menu_color', array(
        'title'       => esc_html__('Colors', 'grandcarrental' ),
        'panel'		  => 'menu',
        'priority'    => 37,

    ) );
    
    $wp_customize->add_section( 'menu_submenu', array(
        'title'       => esc_html__('Sub Menu', 'grandcarrental' ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_megamenu', array(
        'title'       => esc_html__('Mega Menu', 'grandcarrental' ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_topbar', array(
        'title'       => esc_html__('Top Bar', 'grandcarrental' ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_contact', array(
        'title'       => esc_html__('Contact Info', 'grandcarrental' ),
        'panel'		  => 'menu',
        'priority'    => 39,

    ) );
    
    $wp_customize->add_section( 'menu_sidemenu', array(
        'title'       => esc_html__('Side Menu', 'grandcarrental' ),
        'panel'		  => 'menu',
        'priority'    => 39,

    ) );
    
    $wp_customize->add_section( 'header_background', array(
        'title'       => esc_html__('Background', 'grandcarrental' ),
        'panel'		  => 'header',
        'priority'    => 40,

    ) );
    
    $wp_customize->add_section( 'header_title', array(
        'title'       => esc_html__('Page Title', 'grandcarrental' ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_builder_title', array(
        'title'       => esc_html__('Content Builder Header', 'grandcarrental' ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_tagline', array(
        'title'       => esc_html__('Page Tagline & Sub Title', 'grandcarrental' ),
        'panel'		  => 'header',
        'priority'    => 42,

    ) );
    
    $wp_customize->add_section( 'sidebar_general', array(
        'title'       => esc_html__('General', 'grandcarrental' ),
        'panel'		  => 'sidebar',
        'priority'    => 42,

    ) );
    
    $wp_customize->add_section( 'sidebar_typography', array(
        'title'       => esc_html__('Typography', 'grandcarrental' ),
        'panel'		  => 'sidebar',
        'priority'    => 43,

    ) );
    
    $wp_customize->add_section( 'sidebar_color', array(
        'title'       => esc_html__('Colors', 'grandcarrental' ),
        'panel'		  => 'sidebar',
        'priority'    => 44,

    ) );
    
    $wp_customize->add_section( 'footer_general', array(
        'title'       => esc_html__('General', 'grandcarrental' ),
        'panel'		  => 'footer',
        'priority'    => 45,

    ) );
    
    $wp_customize->add_section( 'footer_color', array(
        'title'       => esc_html__('Colors', 'grandcarrental' ),
        'panel'		  => 'footer',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'footer_copyright', array(
        'title'       => esc_html__('Copyright', 'grandcarrental' ),
        'panel'		  => 'footer',
        'priority'    => 47,

    ) );
    
    $wp_customize->add_section( 'gallery_general', array(
        'title'       => esc_html__('General', 'grandcarrental' ),
        'panel'		  => 'gallery',
        'priority'    => 48,

    ) );
    
    $wp_customize->add_section( 'gallery_lightbox', array(
        'title'       => esc_html__('Lightbox', 'grandcarrental' ),
        'panel'		  => 'gallery',
        'priority'    => 49,

    ) );
    
    $wp_customize->add_section( 'car_general', array(
        'title'       => esc_html__('General', 'grandcarrental' ),
        'panel'		  => 'car',
        'priority'    => 51,
    ) );
    
    $wp_customize->add_section( 'car_single', array(
        'title'       => esc_html__('Single Car Page', 'grandcarrental' ),
        'panel'		  => 'car',
        'priority'    => 52,
    ) );
    
    $wp_customize->add_section( 'blog_general', array(
        'title'       => esc_html__('General', 'grandcarrental' ),
        'panel'		  => 'blog',
        'priority'    => 53,

    ) );
    
    $wp_customize->add_section( 'blog_single', array(
        'title'       => esc_html__('Single Post', 'grandcarrental' ),
        'panel'		  => 'blog',
        'priority'    => 55,

    ) );
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		$wp_customize->add_section( 'shop_layout', array(
	        'title'       => esc_html__('Layout', 'grandcarrental' ),
	        'panel'		  => 'shop',
	        'priority'    => 55,
	
	    ) );
	    
	    $wp_customize->add_section( 'shop_single', array(
	        'title'       => esc_html__('Single Product', 'grandcarrental' ),
	        'panel'		  => 'shop',
	        'priority'    => 56,
	
	    ) );
	}

}
add_action( 'customize_register', 'grandcarrental_add_panels_and_sections' );

/**
 * Register and setting to header section
 */
function grandcarrental_header_setting( $wp_customize ) {

	//Register Logo Tab Settings
	$wp_customize->add_setting( 'tg_favicon', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
	
    $wp_customize->add_setting( 'tg_retina_logo', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_setting( 'tg_retina_transparent_logo', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    //End Logo Tab Settings
    
    //Register General Tab Settings
    $wp_customize->add_setting( 'tg_enable_right_click', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_enable_dragging', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_body_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_body_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
	$wp_customize->add_setting( 'tg_header_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_header_font_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h1_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h2_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h3_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h4_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h5_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h6_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_content_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_hover_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_h1_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_hr_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_focus_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_button_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End General Tab Settings
    

    //Register Menu Tab Settings
    $wp_customize->add_setting( 'tg_menu_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_fixed_menu', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_padding', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_hover_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_active_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_hover_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_hover_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_megamenu_header_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_megamenu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_social_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_contact_hours', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_contact_number', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_input_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_hover_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End Menu Tab Settings
    
    //Register Header Tab Settings
	$wp_customize->add_setting( 'tg_page_header_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_page_header_padding_top', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_header_padding_bottom', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_bg_height', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_header_builder_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_header_builder_font_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    //End Header Tab Settings
    
    //Register Copyright Tab Settings
    
    $wp_customize->add_setting( 'tg_footer_sidebar', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
	
	$wp_customize->add_setting( 'tg_footer_social_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
	$wp_customize->add_setting( 'tg_footer_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_hover_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_social_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_text', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_html',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_right_area', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_totop', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    //End Copyright Tab Settings
    
    
    //Begin Gallery Tab Settings
    $wp_customize->add_setting( 'tg_gallery_sort', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_lightbox_skin', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_lightbox_enable_caption', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_lightbox_thumbnails', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_lightbox_opacity', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_gallery_hover_slide', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_full_autoplay', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_full_slideshow_timer', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_full_slideshow_trans', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_full_slideshow_trans_speed', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_full_image_caption', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_full_nocover', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_full_arrow', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_kenburns_timer', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_kenburns_zoom', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_kenburns_trans', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    //End Gallery Tab Settings
    
    
    //Begin Portfolio Tab Settings
    $wp_customize->add_setting( 'tg_portfolio_filterable', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_filterable_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_filterable_sort', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_items', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_next_prev', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_recent', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    //End Portfolio Tab Settings
    
    
    //Begin Blog Tab Settings
    $wp_customize->add_setting( 'tg_blog_display_full', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_archive_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_category_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_tag_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_header_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_feat_content', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_tags', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_author', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_related', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
    ) );
    //End Blog Tab Settings
    
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		//Begin Shop Tab Settings
		$wp_customize->add_setting( 'tg_shop_layout', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_html',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_items', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'grandcarrental_sanitize_slider',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_price_font_color', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_related_products', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'grandcarrental_sanitize_checkbox',
	    ) );
		//End Shop Tab Settings
	}
    
    
    //Add Live preview
    if ( $wp_customize->is_preview() && ! is_admin() ) {
	    add_action( 'wp_footer', 'grandcarrental_customize_preview', 21);
	}
}
add_action( 'customize_register', 'grandcarrental_header_setting' );

/**
 * Create the setting
 */
function grandcarrental_custom_setting( $controls ) {

	//Default control choices
	$tg_text_transform = array(
	    'none' => 'None',
	    'capitalize' => 'Capitalize',
	    'uppercase' => 'Uppercase',
	    'lowercase' => 'Lowercase',
	);
	
	$tg_text_alignment = array(
	    'left' => 'Left',
	    'center' => 'Center',
	    'right' => 'Right',
	);
	
	$tg_copyright_content = array(
	    'social' => 'Social Icons',
	    'menu' => 'Footer Menu',
	);
	
	$tg_copyright_column = array(
	    '' => 'Hide Footer Sidebar',
	    1 => '1 Column',
	    2 => '2 Column',
	    3 => '3 Column',
	    4 => '4 Column',
	);
	
	$tg_gallery_sort = array(
		'drag' => 'By Drag&drop',
		'post_date' => 'By Newest',
		'post_date_old' => 'By Oldest',
		'rand' => 'By Random',
		'title' => 'By Title',
	);
	
	$tg_portfolio_filterable_sort = array(
		'name' => 'By Name',
		'slug' => 'By Slug',
		'id' => 'By ID',
		'count' => 'By Number of Portfolio',
	);
	
	$tg_blog_layout = array(
		'blog_g' => 'Grid',
		'blog_gs' => 'Grid + Right Siebar',
		'blog_gls' => 'Grid + Left Siebar',
		'blog_r' => 'Right Sidebar',
		'blog_l' => 'Left Sidebar',
		'blog_f' => 'Fullwidth',
	);
	
	$tg_shop_layout = array(
		'fullwidth' => 'Fullwidth',
		'sidebar' => 'With Sidebar',
	);
	
	$tg_slideshow_trans = array(
	    1 => 'Fade',
	    2 => 'Slide Top',
	    3 => 'Slide Right',
	    4 => 'Slide Bottom',
	    5 => 'Slide Left',
	    6 => 'Carousel Right',
	    7 => 'Carousel Left',
	);
	
	$tg_menu_layout = array(
	    'leftalign' => 'Left Align',
	    'centeralign' => 'Center Align',
	    'centeralogo' => 'Center Logo + 2 Menus',
	    'hammenuside' => 'Hamburger Menu + Side Menu',
	    'hammenufull' => 'Hamburger Menu + Fullscreen Menu',
	);
	
	$tg_slider_layout = array(
		'slider' => 'Fullwidth',
		'3cols-slider' => '3 Columns',
	);
	
	$tg_lightbox_skin = array(
		'metro-white' => 'White',
		'metro-black' => 'Black',
		'light' => 'Light',
		'mac' => 'Mac',
		'smooth' => 'Smooth',
	);
	
	$tg_lightbox_thumbnails = array(
		'' => 'No Thumbnail',
		'horizontal' => 'Horizontal Align',
		'vertical' => 'Vertical Align',
	);
	
	$tg_sidemenu_align = array(
		'left' => 'Left',
		'right' => 'Right',
	);
	
	$tg_car_search_sort = array(
	    "price_low" 	=> esc_html__('Price Low to High', 'grandcarrental' ),
		"price_high" 	=> esc_html__('Price High to Low', 'grandcarrental' ),
		"model" 		=> esc_html__('Sort By Model', 'grandcarrental' ),
		"popular" 		=> esc_html__('Sort By Popularity', 'grandcarrental' ),
		"review" 		=> esc_html__('Sort By Review Score', 'grandcarrental' ),
	);
	
	//Get all categories
	$categories_arr = get_categories();
	$tg_categories_select = array();
	$tg_categories_select[''] = '';
	
	foreach ($categories_arr as $cat) {
		$tg_categories_select[$cat->cat_ID] = $cat->cat_name;
	}
	
	//Get all gallery categories
	$gallery_categories_arr = get_terms('gallerycat', 'hide_empty=0&hierarchical=0&parent=0&orderby=name');
	$tg_gallery_categories_select = array();
	$tg_gallery_categories_select[''] = '';
	
	if(!empty($gallery_categories_arr) && is_array($gallery_categories_arr))
	{
		foreach ($gallery_categories_arr as $gallery_cat) {
			$tg_gallery_categories_select[$gallery_cat->slug] = $gallery_cat->name;
		}
	}
	
	//Register Logo Tab Settings
	$controls[] = array(
        'type'     => 'image',
        'settings'  => 'tg_favicon',
        'label'    => esc_html__('Favicon', 'grandcarrental' ),
        'description' => esc_html__('A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image', 'grandcarrental' ),
        'section'  => 'logo_favicon',
	    'default'  => '',
	    'priority' => 1,
    );
	
	$controls[] = array(
        'type'     => 'image',
        'settings'  => 'tg_retina_logo',
        'label'    => esc_html__('Retina Logo', 'grandcarrental' ),
        'description' => esc_html__('Retina Ready Image logo. It should be 2x size of normal logo. For example 200x60px logo will displays at 100x30px', 'grandcarrental' ),
        'section'  => 'logo_favicon',
	    'default'  => get_template_directory_uri().'/images/logo@2x_white.png',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_retina_logo_for_admin',
        'label'    => esc_html__('Display Retina Logo in Theme Setting', 'grandcarrental' ),
        'description' => esc_html__('Check this to replace theme setting to your logo. It helps branding your site', 'grandcarrental' ),
        'section'  => 'logo_favicon',
        'default'  => '',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'image',
        'settings'  => 'tg_retina_transparent_logo',
        'label'    => esc_html__('Retina Transparent Logo', 'grandcarrental' ),
        'description' => esc_html__('Retina Ready Image logo for menu transparent page. It should be 2x size of normal logo. For example 200x60px logo will displays at 100x30px. Recommend logo color is white or bright color', 'grandcarrental' ),
        'section'  => 'logo_favicon',
	    'default'  => get_template_directory_uri().'/images/logo@2x_white.png',
	    'priority' => 3,
    );
    //End Logo Tab Settings
    
    //Register General Tab Settings
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_enable_right_click',
        'label'    => esc_html__('Enable Right Click Protection', 'grandcarrental' ),
        'description' => esc_html__('Check this to disable right click.', 'grandcarrental' ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_enable_dragging',
        'label'    => esc_html__('Enable Image Dragging Protection', 'grandcarrental' ),
        'description' => esc_html__('Check this to disable dragging on all images.', 'grandcarrental' ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_body_typography_title',
        'label'    => esc_html__('Body and Content Settings', 'grandcarrental' ),
        'section'  => 'general_typography',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_body_font',
        'label'    => esc_html__('Main Content Font Family', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 'Work Sans',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'body, input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], input.wpcf7-text, .woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text, select, textarea',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_body_font_size',
        'label'    => esc_html__('Main Content Font Size', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 15,
        'choices' => array( 'min' => 11, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'body, input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], input.wpcf7-text, .woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text, select, input[type=submit], input[type=button], a.button, .button',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_header_typography_title',
        'label'    => esc_html__('Header Settings', 'grandcarrental' ),
        'section'  => 'general_typography',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_header_font',
        'label'    => esc_html__('H1, H2, H3, H4, H5, H6 Font Family', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 'Poppins',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7, .post_quote_title, label, strong[itemprop="author"], #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, .readmore, .post_detail.single_post, .page_tagline, #gallery_caption .tg_caption .tg_desc, #filter_selected, #autocomplete li strong, .post_detail.single_post a, .post_detail.single_post a:hover,.post_detail.single_post a:active, blockquote,.single_car_price, .single_car_departure_wrapper li .single_car_departure_title, .comment_rating_wrapper .comment_rating_label, .car_excerpt, .widget_post_views_counter_list_widget, .sidebar_widget li.widget_products, #copyright, #footer_menu li a, #footer ul.sidebar_widget li ul.posts.blog li a, .woocommerce-page table.cart th, table.shop_table thead tr th, .car_price, p.price span.amount, .woocommerce-page div.product .woocommerce-tabs ul.tabs li a, .woocommerce ul.products li.product .price',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_header_font_weight',
        'label'    => esc_html__('H1, H2, H3, H4, H5, H6 Font Weight', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 600,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7, #autocomplete li strong',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 2,
	    'js_vars'   => array(
			array(
				'element'  => 'h1, h2, h3, h4, h5, h6, h7, #autocomplete li strong',
				'function' => 'css',
				'property' => 'font-weight',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_header_font_spacing',
        'label'    => esc_html__('H1, H2, H3, H4, H5, H6 Font Spacing', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 0,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7, #autocomplete li strong',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
	    'js_vars'   => array(
			array(
				'element'  => 'h1, h2, h3, h4, h5, h6, h7, #autocomplete li strong',
				'function' => 'css',
				'property' => 'letter-spacing',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h1_size',
        'label'    => esc_html__('H1 Font Size', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 34,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h1',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h2_size',
        'label'    => esc_html__('H2 Font Size', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 28,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h2',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h3_size',
        'label'    => esc_html__('H3 Font Size', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 24,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h3',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h4_size',
        'label'    => esc_html__('H4 Font Size', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 20,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h4',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h5_size',
        'label'    => esc_html__('H5 Font Size', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 18,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h5',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h6_size',
        'label'    => esc_html__('H6 Font Size', 'grandcarrental' ),
        'section'  => 'general_typography',
        'default'  => 16,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h6',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_content_bg_color',
        'label'    => esc_html__('Main Content Background Color', 'grandcarrental' ),
        'section'  => 'general_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'body, #wrapper, #page_content_wrapper.fixed, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, #body_loading_screen, h3#reply-title span, .overlay_gallery_wrapper, .pricing_wrapper_border, .pagination a, .pagination span, #captcha-wrap .text-box input, .flex-direction-nav a, .blog_promo_title h6, #supersized li, #gallery_caption .tg_caption, #horizontal_gallery_wrapper .image_caption',
	            'property' => 'background-color',
	        ),
	        array(
	            'element'  => '#gallery_expand',
	            'property' => 'border-bottom-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_font_color',
        'label'    => esc_html__('Page Content Font Color', 'grandcarrental' ),
        'section'  => 'general_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'body, .pagination a, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a, #page_content_wrapper.split #copyright, .page_content_wrapper.split #copyright, .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited, .readmore, #page_content_wrapper .inner .sidebar_wrapper .sidebar .single_car_booking_wrapper label',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '::selection',
	            'property' => 'background-color',
	        ),
	        array(
	            'element'  => '::-webkit-input-placeholder',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '::-moz-placeholder',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => ':-ms-input-placeholder',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_link_color',
        'label'    => esc_html__('Page Content Link Color', 'grandcarrental' ),
        'section'  => 'general_color',
        'default'  => '#04dbc0',
        'output' => array(
	        array(
	            'element'  => 'a, .post_detail.single_post',
	            'property' => 'color',
	        ),
	         array(
	            'element'  => '.flex-control-paging li a.flex-active',
	            'property' => 'background-color',
	        ),
	         array(
	            'element'  => '.flex-control-paging li a.flex-active',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
	    'js_vars'   => array(
			array(
	            'element'  => 'a, .post_detail.single_post',
	            'property' => 'color',
	        ),
	         array(
	            'element'  => '.flex-control-paging li a.flex-active',
	            'property' => 'background-color',
	        ),
	         array(
	            'element'  => '.flex-control-paging li a.flex-active',
	            'property' => 'border-color',
	        ),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_hover_link_color',
        'label'    => esc_html__('Page Content Hover Link Color', 'grandcarrental' ),
        'section'  => 'general_color',
        'default'  => '#5856D6',
        'output' => array(
	        array(
	            'element'  => 'a:hover, a:active, .post_info_comment a i, ',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.post_excerpt.post_tag a:hover, input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active',
	            'property' => 'background',
	        ),
	        array(
	            'element'  => '.post_excerpt.post_tag a:hover, input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
	            'element'  => 'a:hover, a:active, .post_info_comment a i',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.post_excerpt.post_tag a:hover, input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active',
	            'property' => 'background',
	        ),
	        array(
	            'element'  => '.post_excerpt.post_tag a:hover, input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active',
	            'property' => 'border-color',
	        ),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_h1_font_color',
        'label'    => esc_html__('H1, H2, H3, H4, H5, H6 Font Color', 'grandcarrental' ),
        'section'  => 'general_color',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i, .ppb_subtitle, .woocommerce .woocommerce-ordering select, .woocommerce #page_content_wrapper a.button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button:hover, .ui-accordion .ui-accordion-header a, .tabs .ui-state-active a, body.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, body.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, body.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a, body.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .post_header h5 a, .post_header h6 a, .flex-direction-nav a:before, .social_share_button_wrapper .social_post_view .view_number, .social_share_button_wrapper .social_post_share_count .share_number, .portfolio_post_previous a, .portfolio_post_next a, #filter_selected, #autocomplete li strong, .post_detail.single_post a, .post_detail.single_post a:hover,.post_detail.single_post a:active, .single_car_departure_wrapper li .single_car_departure_title, .cart_item .product-name a, .single_car_booking_wrapper .single_car_view_desc, .single_car_booking_wrapper .single_car_view_icon',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => 'body.page.page-template-gallery-archive-split-screen-php #fp-nav li .active span, body.tax-gallerycat #fp-nav li .active span, body.page.page-template-portfolio-fullscreen-split-screen-php #fp-nav li .active span, body.page.tax-portfolioset #fp-nav li .active span, body.page.page-template-gallery-archive-split-screen-php #fp-nav ul li a span, body.tax-gallerycat #fp-nav ul li a span, body.page.page-template-portfolio-fullscreen-split-screen-php #fp-nav ul li a span, body.page.tax-portfolioset #fp-nav ul li a span',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 14,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_hr_color',
        'label'    => esc_html__('Horizontal Line Color', 'grandcarrental' ),
        'section'  => 'general_color',
        'default'  => '#dce0e0',
        'output' => array(
	        array(
	            'element'  => '#social_share_wrapper, hr, #social_share_wrapper, .post.type-post, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #post_more_wrapper, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, #page_content_wrapper .inner .sidebar_content, #page_content_wrapper .inner .sidebar_content.left_sidebar, .ajax_close, .ajax_next, .ajax_prev, .portfolio_next, .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_next, .separated, .blog_next_prev_wrapper, #post_more_wrapper h5, #ajax_portfolio_wrapper.hidding, #ajax_portfolio_wrapper.visible, .tabs.vertical .ui-tabs-panel, .ui-tabs.vertical.right .ui-tabs-nav li, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce-page div.product .woocommerce-tabs .panel, .woocommerce #content div.product .woocommerce-tabs .panel, .woocommerce-page #content div.product .woocommerce-tabs .panel, .woocommerce table.shop_table, .woocommerce-page table.shop_table, table tr td, .woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, .woocommerce .cart-collaterals .shipping_calculator, .woocommerce-page .cart-collaterals .shipping_calculator, .woocommerce .cart-collaterals .cart_totals tr td, .woocommerce .cart-collaterals .cart_totals tr th, .woocommerce-page .cart-collaterals .cart_totals tr td, .woocommerce-page .cart-collaterals .cart_totals tr th, table tr th, .woocommerce #payment, .woocommerce-page #payment, .woocommerce #payment ul.payment_methods li, .woocommerce-page #payment ul.payment_methods li, .woocommerce #payment div.form-row, .woocommerce-page #payment div.form-row, .ui-tabs li:first-child, .ui-tabs .ui-tabs-nav li, .ui-tabs.vertical .ui-tabs-nav li, .ui-tabs.vertical.right .ui-tabs-nav li.ui-state-active, .ui-tabs.vertical .ui-tabs-nav li:last-child, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .pricing_wrapper, .pricing_wrapper li, .ui-accordion .ui-accordion-header, .ui-accordion .ui-accordion-content, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle:before, h2.widgettitle:before, #autocomplete, .ppb_blog_minimal .one_third_bg, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.event_title, .tabs .ui-tabs-panel, .ui-tabs .ui-tabs-nav li, .ui-tabs li:first-child, .ui-tabs.vertical .ui-tabs-nav li:last-child, .woocommerce .woocommerce-ordering select, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page table.cart th, table.shop_table thead tr th, hr.title_break, .overlay_gallery_border, #page_content_wrapper.split #copyright, .page_content_wrapper.split #copyright, .post.type-post, .events.type-events, h5.event_title, .post_header h5.event_title, .client_archive_wrapper, #page_content_wrapper .sidebar .content .sidebar_widget li.widget, .page_content_wrapper .sidebar .content .sidebar_widget li.widget, hr.title_break.bold, blockquote, .social_share_button_wrapper, .social_share_button_wrapper, body:not(.single) .post_wrapper, .themeborder',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 15,
	    'js_vars'   => array(
			array(
				'element'  => '#social_share_wrapper, hr, #social_share_wrapper, .post.type-post, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #post_more_wrapper, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, #page_content_wrapper .inner .sidebar_content, #page_content_wrapper .inner .sidebar_content.left_sidebar, .ajax_close, .ajax_next, .ajax_prev, .portfolio_next, .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_next, .separated, .blog_next_prev_wrapper, #post_more_wrapper h5, #ajax_portfolio_wrapper.hidding, #ajax_portfolio_wrapper.visible, .tabs.vertical .ui-tabs-panel, .ui-tabs.vertical.right .ui-tabs-nav li, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce-page div.product .woocommerce-tabs .panel, .woocommerce #content div.product .woocommerce-tabs .panel, .woocommerce-page #content div.product .woocommerce-tabs .panel, .woocommerce table.shop_table, .woocommerce-page table.shop_table, table tr td, .woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, .woocommerce .cart-collaterals .shipping_calculator, .woocommerce-page .cart-collaterals .shipping_calculator, .woocommerce .cart-collaterals .cart_totals tr td, .woocommerce .cart-collaterals .cart_totals tr th, .woocommerce-page .cart-collaterals .cart_totals tr td, .woocommerce-page .cart-collaterals .cart_totals tr th, table tr th, .woocommerce #payment, .woocommerce-page #payment, .woocommerce #payment ul.payment_methods li, .woocommerce-page #payment ul.payment_methods li, .woocommerce #payment div.form-row, .woocommerce-page #payment div.form-row, .ui-tabs li:first-child, .ui-tabs .ui-tabs-nav li, .ui-tabs.vertical .ui-tabs-nav li, .ui-tabs.vertical.right .ui-tabs-nav li.ui-state-active, .ui-tabs.vertical .ui-tabs-nav li:last-child, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .pricing_wrapper, .pricing_wrapper li, .ui-accordion .ui-accordion-header, .ui-accordion .ui-accordion-content, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle:before, h2.widgettitle:before, #autocomplete, .ppb_blog_minimal .one_third_bg, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.event_title, .tabs .ui-tabs-panel, .ui-tabs .ui-tabs-nav li, .ui-tabs li:first-child, .ui-tabs.vertical .ui-tabs-nav li:last-child, .woocommerce .woocommerce-ordering select, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page table.cart th, table.shop_table thead tr th, hr.title_break, .overlay_gallery_border, #page_content_wrapper.split #copyright, .page_content_wrapper.split #copyright, .post.type-post, .events.type-events, h5.event_title, .post_header h5.event_title, .client_archive_wrapper, #page_content_wrapper .sidebar .content .sidebar_widget li.widget, .page_content_wrapper .sidebar .content .sidebar_widget li.widget, hr.title_break.bold, blockquote, .social_share_button_wrapper, .social_share_button_wrapper, body:not(.single) .post_wrapper, .themeborder',
				'function' => 'css',
				'property' => 'border-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_review_star_color',
        'label'    => esc_html__('Review Stars Color', 'grandcarrental' ),
        'section'  => 'general_color',
        'default'  => '#5856D6',
        'output' => array(
	        array(
	            'element'  => '.br-theme-fontawesome-stars-o .br-widget a.br-selected:after, .woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before, .woocommerce #review_form #respond p.stars a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.header_cart_wrapper .cart_count, #toTop, .single_car_users_online_wrapper .single_car_users_online_icon',
	            'property' => 'background',
	        ),
	    ),
	    'js_vars'   => array(
			array(
	            'element'  => '.br-theme-fontawesome-stars-o .br-widget a.br-selected:after, .woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before, .woocommerce #review_form #respond p.stars a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.header_cart_wrapper .cart_count, #toTop, .single_car_users_online_wrapper .single_car_users_online_icon',
	            'property' => 'background',
	        ),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_input_title',
        'label'    => esc_html__('Input and Textarea Settings', 'grandcarrental' ),
        'section'  => 'general_input',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_input_bg_color',
        'label'    => esc_html__('Input and Textarea Background Color', 'grandcarrental' ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_input_font_color',
        'label'    => esc_html__('Input and Textarea Font Color', 'grandcarrental' ),
        'section'  => 'general_input',
        'default'  => '#555555',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 17,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_input_border_color',
        'label'    => esc_html__('Input and Textarea Border Color', 'grandcarrental' ),
        'section'  => 'general_input',
        'default'  => '#dce0e0',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_input_focus_color',
        'label'    => esc_html__('Input and Textarea Focus State Color', 'grandcarrental' ),
        'section'  => 'general_input',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => 'input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, input[type=date]:focus, textarea:focus, #car_search_form .one_fourth:not(.last):hover',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 19,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_button_title',
        'label'    => esc_html__('Button Settings', 'grandcarrental' ),
        'section'  => 'general_input',
	    'priority' => 19,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_button_font',
        'label'    => esc_html__('Button Font Family', 'grandcarrental' ),
        'section'  => 'general_input',
        'default'  => 'Work Sans',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 19,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_bg_color',
        'label'    => esc_html__('Button Background Color', 'grandcarrental' ),
        'section'  => 'general_input',
        'default'  => '#04dbc0',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrappe, .post_share_text, #close_share, .widget_tag_cloud div a:hover, a.car_image .car_price, .mobile_menu_wrapper #close_mobile_menu, .header_cart_wrapper > a, a.car_image .car_price, .grid.portfolio_type .car_price, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button',
	            'property' => 'background-color',
	        ),
	        array(
	            'element'  => '.pagination span, .pagination a:hover, .button.ghost, .button.ghost:hover, .button.ghost:active, blockquote:after',
	            'property' => 'border-color',
	        ),
	        array(
	            'element'  => '.comment_box:before, .comment_box:after',
	            'property' => 'border-top-color',
	        ),
	        array(
	            'element'  => '.button.ghost, .button.ghost:hover, .button.ghost:active, .infinite_load_more, blockquote:before',
	            'property' => 'color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrappe, .post_share_text, #close_share, .widget_tag_cloud div a:hover, a.car_image .car_price, .mobile_menu_wrapper #close_mobile_menu, .header_cart_wrapper > a, a.car_image .car_price, .grid.portfolio_type .car_price, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '.pagination span, .pagination a:hover, .button.ghost, .button.ghost:hover, .button.ghost:active, blockquote:after',
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
				'element'  => '.comment_box:before, .comment_box:after',
				'function' => 'css',
				'property' => 'border-top-color',
			),
			array(
				'element'  => '.button.ghost, .button.ghost:hover, .button.ghost:active, .infinite_load_more, blockquote:before',
				'function' => 'css',
				'property' => 'color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_font_color',
        'label'    => esc_html__('Button Font Color', 'grandcarrental' ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination a:hover, .woocommerce .footer_bar .button , .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrapper, .post_share_text, #close_share, .widget_tag_cloud div a:hover, a.car_image .car_price, .mobile_menu_wrapper #close_mobile_menu, .header_cart_wrapper > a, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button',
	            'property' => 'color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrappe, .post_share_text, #close_share, .widget_tag_cloud div a:hover, a.car_image .car_price, .mobile_menu_wrapper #close_mobile_menu, .header_cart_wrapper > a, a.car_image .car_price, .grid.portfolio_type .car_price, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button',
				'function' => 'css',
				'property' => 'color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 21,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_border_color',
        'label'    => esc_html__('Button Border Color', 'grandcarrental' ),
        'section'  => 'general_input',
        'default'  => '#04dbc0',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination a:hover, .woocommerce .footer_bar .button , .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .infinite_load_more, .post_share_text, #close_share, .widget_tag_cloud div a:hover, .mobile_menu_wrapper #close_mobile_menu, .mobile_menu_wrapper #mobile_menu_close.button',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrappe, .post_share_text, #close_share, .widget_tag_cloud div a:hover, a.car_image .car_price, .mobile_menu_wrapper #close_mobile_menu, .header_cart_wrapper > a, a.car_image .car_price, .grid.portfolio_type .car_price, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button',
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 22,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_mobile_responsive',
        'label'    => esc_html__('Enable Responsive Layout', 'grandcarrental' ),
        'description' => esc_html__('Check this to enable responsive layout for tablet and mobile devices.', 'grandcarrental' ),
        'section'  => 'general_mobile',
        'default'  => 1,
	    'priority' => 25,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_frame',
        'label'    => esc_html__('Enable Frame', 'grandcarrental' ),
        'description' => esc_html__('Check this to enable frame for site layout', 'grandcarrental' ),
        'section'  => 'general_frame',
        'default'  => 0,
	    'priority' => 26,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_frame_color',
        'label'    => esc_html__('Frame Color', 'grandcarrental' ),
        'section'  => 'general_frame',
        'default'  => '#04dbc0',
        'output' => array(
	        array(
	            'element'  => '.frame_top, .frame_bottom, .frame_left, .frame_right',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 27,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_boxed',
        'label'    => esc_html__('Enable Boxed Layout', 'grandcarrental' ),
        'description' => esc_html__('Check this to enable boxed layout for site layout', 'grandcarrental' ),
        'section'  => 'general_boxed',
        'default'  => 0,
	    'priority' => 28,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_boxed_bg_color',
        'label'    => esc_html__('Background Color', 'grandcarrental' ),
        'section'  => 'general_boxed',
        'default'  => '#f0f0f0',
        'output' => array(
	        array(
	            'element'  => 'body.tg_boxed',
	            'property' => 'background-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'body.tg_boxed',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 28,
    );
    $controls[] = array(
        'type'     => 'image',
        'settings'  => 'tg_boxed_bg_image',
        'label'    => esc_html__('Background Image', 'grandcarrental' ),
        'description' => esc_html__('Upload background image for boxed layout', 'grandcarrental' ),
        'section'  => 'general_boxed',
	    'default'  => '',
	    'priority' => 28,
    );
    //End General Tab Settings

	//Register Menu Tab Settings 
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_menu_layout',
        'label'    => esc_html__('Menu Layout', 'grandcarrental' ),
        'section'  => 'menu_general',
        'default'  => 'leftalign',
        'choices'  => $tg_menu_layout,
	    'priority' => 1,
    );
	
	$controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_fixed_menu',
        'label'    => esc_html__('Enable Sticky Menu', 'grandcarrental' ),
        'description' => esc_html__('Enable this option to display main menu fixed when scrolling', 'grandcarrental' ),
        'section'  => 'menu_general',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_smart_fixed_menu',
        'label'    => esc_html__('Enable Smart Sticky Menu', 'grandcarrental' ),
        'description' => esc_html__('Enable this option to make menu displays when scroll down and hide when scroll up', 'grandcarrental' ),
        'section'  => 'menu_general',
        'default'  => 0,
	    'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_menu_font',
        'label'    => esc_html__('Menu Font Family', 'grandcarrental' ),
        'section'  => 'menu_typography',
        'default'  => 'Poppins',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_menu_font_size',
        'label'    => esc_html__('Menu Font Size', 'grandcarrental' ),
        'section'  => 'menu_typography',
        'default'  => 13,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a, .header_cart_wrapper i',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_menu_padding',
        'label'    => esc_html__('Menu Padding', 'grandcarrental' ),
        'section'  => 'menu_typography',
        'default'  => 30,
        'choices' => array( 'min' => 0, 'max' => 150, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a, html[data-menu=centeralogo] #logo_right_button',
	            'property' => 'padding-top',
	            'units'    => 'px',
	        ),
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a, html[data-menu=centeralogo] #logo_right_button',
	            'property' => 'padding-bottom',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_menu_weight',
        'label'    => esc_html__('Menu Font Weight', 'grandcarrental' ),
        'section'  => 'menu_typography',
        'default'  => 500,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_menu_font_spacing',
        'label'    => esc_html__('Menu Font Spacing', 'grandcarrental' ),
        'section'  => 'menu_typography',
        'default'  => 0,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_menu_transform',
        'label'    => esc_html__('Menu Font Text Transform', 'grandcarrental' ),
        'section'  => 'menu_typography',
        'default'  => 'none',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_bg',
        'label'    => esc_html__('Menu Background', 'grandcarrental' ),
        'section'  => 'menu_color',
	    'default'     => '#000000',
	    'output' => array(
	        array(
	            'element'  => '.top_bar',
	            'property' => 'background-color',
	        ),
	    ),
	    'priority' => 4,
	    'transport' 	 => 'postMessage',
	    'js_vars'   => array(
			array(
				'element'  => '.top_bar',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_font_color',
        'label'    => esc_html__('Menu Font Color', 'grandcarrental' ),
        'section'  => 'menu_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a, #mobile_nav_icon, #logo_wrapper .social_wrapper ul li a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '#mobile_nav_icon',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_hover_font_color',
        'label'    => esc_html__('Menu Hover State Font Color', 'grandcarrental' ),
        'section'  => 'menu_color',
        'default'  => '#04dbc0',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover, .header_cart_wrapper a:hover, #page_share:hover , #gallery_download:hover, .view_fullscreen_wrapper a:hover, #logo_wrapper .social_wrapper ul li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_active_font_color',
        'label'    => esc_html__('Menu Active State Font Color', 'grandcarrental' ),
        'section'  => 'menu_color',
        'default'  => '#04dbc0',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a, #menu_wrapper div .nav li ul li.current-menu-item a, #menu_wrapper div .nav li.current-menu-parent  ul li.current-menu-item a, #logo_wrapper .social_wrapper ul li a:active, .top_contact_info span',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_border_color',
        'label'    => esc_html__('Menu Bar Border Color', 'grandcarrental' ),
        'section'  => 'menu_color',
        'default'  => '#333333',
        'output' => array(
	        array(
	            'element'  => '.top_bar, #page_caption, #nav_wrapper, .above_top_bar',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.top_bar, #page_caption, #nav_wrapper, .above_top_bar',
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_submenu_font_title',
        'label'    => esc_html__('Typography Settings', 'grandcarrental' ),
        'section'  => 'menu_submenu',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_submenu_font_size',
        'label'    => esc_html__('SubMenu Font Size', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => 13,
        'choices' => array( 'min' => 10, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_submenu_weight',
        'label'    => esc_html__('SubMenu Font Weight', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => 500,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_submenu_font_spacing',
        'label'    => esc_html__('SubMenu Font Spacing', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => 0,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_submenu_transform',
        'label'    => esc_html__('SubMenu Font Text Transform', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => 'none',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_submenu_color_title',
        'label'    => esc_html__('Color Settings', 'grandcarrental' ),
        'section'  => 'menu_submenu',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_font_color',
        'label'    => esc_html__('Sub Menu Font Color', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a, #menu_wrapper div .nav li.current-menu-parent ul li.current-menu-item a, #menu_wrapper .nav ul li.megamenu ul li ul li a, #menu_wrapper div .nav li.megamenu ul li ul li a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_hover_font_color',
        'label'    => esc_html__('Sub Menu Hover State Font Color', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => '#04dbc0',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.current-menu-parent ul li.current-menu-item  a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 14,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_hover_bg_color',
        'label'    => esc_html__('Sub Menu Hover State Background Color', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 15,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_bg_color',
        'label'    => esc_html__('Sub Menu Background Color', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_border_color',
        'label'    => esc_html__('Sub Menu Border Color', 'grandcarrental' ),
        'section'  => 'menu_submenu',
        'default'  => '#dce0e0',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 17,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_megamenu_header_color',
        'label'    => esc_html__('Mega Menu Header Font Color', 'grandcarrental' ),
        'section'  => 'menu_megamenu',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active, #menu_wrapper div .nav li.megamenu ul li.current-menu-item > a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_megamenu_border_color',
        'label'    => esc_html__('Mega Menu Border Color', 'grandcarrental' ),
        'section'  => 'menu_megamenu',
        'default'  => '#dce0e0',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav li.megamenu ul li',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_topbar',
        'label'    => esc_html__('Display Top Bar', 'grandcarrental' ),
        'description' => esc_html__('Enable this option to display top bar above main menu', 'grandcarrental' ),
        'section'  => 'menu_topbar',
        'default'  => 0,
	    'priority' => 21,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_topbar_bg_color',
        'label'    => esc_html__('Top Bar Background Color', 'grandcarrental' ),
        'section'  => 'menu_topbar',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '.above_top_bar',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 22,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_topbar_font_color',
        'label'    => esc_html__('Top Bar Menu Font Color', 'grandcarrental' ),
        'section'  => 'menu_topbar',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#top_menu li a, .top_contact_info, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 23,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_menu_contact_address',
        'label'    => esc_html__('Contact Address (Optional)', 'grandcarrental' ),
        'description' => esc_html__('Enter your company contact address.', 'grandcarrental' ),
        'section'  => 'menu_contact',
        'default'  => '184 Main Street East 8007',
        'transport' => 'postMessage',
	    'priority' => 25,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_menu_contact_hours',
        'label'    => esc_html__('Contact Hours (Optional)', 'grandcarrental' ),
        'description' => esc_html__('Enter your company contact hours.', 'grandcarrental' ),
        'section'  => 'menu_contact',
        'default'  => 'Mon-Fri 09.00 - 17.00',
        'transport' 	 => 'postMessage',
	    'priority' => 26,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_menu_contact_number',
        'label'    => esc_html__('Contact Phone Number (Optional)', 'grandcarrental' ),
        'description' => esc_html__('Enter your company contact phone number.', 'grandcarrental' ),
        'section'  => 'menu_contact',
        'default'  => '1.800.456.6743',
        'transport' => 'postMessage',
	    'priority' => 27,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_topbar_social_link',
        'label'    => esc_html__('Open Top Bar Social Icons link in new window', 'grandcarrental' ),
        'description' => esc_html__('Check this to open top bar social icons link in new window', 'grandcarrental' ),
        'section'  => 'menu_contact',
        'default'  => 1,
	    'priority' => 28,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_sidemenu',
        'label'    => esc_html__('Enable Side Menu on Desktop', 'grandcarrental' ),
        'description' => 'Check this option to enable side menu on desktop',
        'section'  => 'menu_sidemenu',
        'default'  => 1,
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_sidemenu_align',
        'label'    => esc_html__('Side Menu Alignment', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => 'right',
        'choices'  => $tg_sidemenu_align,
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_sidemenu_font_title',
        'label'    => esc_html__('Typography Settings', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_sidemenu_font',
        'label'    => esc_html__('Side Menu Font Family', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => 'Poppins',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 32,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_sidemenu_font_size',
        'label'    => esc_html__('Side Menu Font Size', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => 24,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 33,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_sidemenu_font_weight',
        'label'    => esc_html__('Side Menu Font Weight', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => 700,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 33,
	    'js_vars'   => array(
			array(
				'element'  => '.mobile_main_nav li a, #sub_menu li a',
				'function' => 'css',
				'property' => 'font-weight',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_sidemenu_font_transform',
        'label'    => esc_html__('Side Menu Font Text Transform', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => 'none',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 34,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_sidemenu_font_spacing',
        'label'    => esc_html__('Side Menu Font Spacing', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => 0,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 35,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_sidemenu_bg_title',
        'label'    => esc_html__('Color Settings', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
	    'priority' => 36,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidemenu_bg',
        'label'    => esc_html__('Side Menu Background', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
	    'default'  => '#000000',
	    'output' => array(
	        array(
	            'element'  => '.mobile_menu_wrapper',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'js_vars'   => array(
			array(
	            'element'  => '.mobile_menu_wrapper',
	            'property' => 'background-color',
	        ),
		),
	    'priority' => 36,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidemenu_font_color',
        'label'    => esc_html__('Side Menu Font Color', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, .mobile_menu_wrapper .sidebar_wrapper, #close_mobile_menu i, .mobile_menu_wrapper .social_wrapper ul li a, html[data-menu=hammenufull] #copyright, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 37,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidemenu_font_hover_color',
        'label'    => esc_html__('Side Menu Hover State Font Color', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => '#04dbc0',
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:hover, #sub_menu li a:active, .mobile_menu_wrapper .social_wrapper ul li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 38,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_menu_search_title',
        'label'    => esc_html__('Search Settings', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
	    'priority' => 39,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_menu_search',
        'label'    => esc_html__('Enable Search', 'grandcarrental' ),
        'description' => esc_html__('Select to display search form in header of side menu', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => 0,
	    'priority' => 40,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_search_input_color',
        'label'    => esc_html__('Search Input Background Color', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform input[type=text]',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 42,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_search_font_color',
        'label'    => esc_html__('Search Input Font Color', 'grandcarrental' ),
        'section'  => 'menu_sidemenu',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform input[type=text], .mobile_menu_wrapper #searchform button i',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform ::-webkit-input-placeholder',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform ::-moz-placeholder',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform :-ms-input-placeholder',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 43,
    );
    //End Menu Tab Settings
    
    //Register Header Tab Settings
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_page_header_bg_title',
        'label'    => esc_html__('Background Image Settings', 'grandcarrental' ),
        'section'  => 'header_background',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_title_bg_height',
        'label'    => esc_html__('Page Title Background Image Height (in pixels)', 'grandcarrental' ),
        'section'  => 'header_background',
        'default'  => 600,
        'choices' => array( 'min' => 150, 'max' => 1500, 'step' => 10 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption.hasbg',
	            'property' => 'height',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_page_header_bg_parallax',
        'label'    => esc_html__('Add Parallax Effect When Scroll', 'grandcarrental' ),
        'description' => esc_html__('Enable this option to add parallax effect to header background image when scrolling pass it', 'grandcarrental' ),
        'section'  => 'header_background',
        'default'  => '1',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_page_header_bgcolor_title',
        'label'    => esc_html__('Background Color Settings', 'grandcarrental' ),
        'section'  => 'header_background',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_page_header_bg_color',
        'label'    => esc_html__('Page Header Background Color', 'grandcarrental' ),
        'section'  => 'header_background',
        'default'  => '#f9f9f9',
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_page_header_border_color',
        'label'    => esc_html__('Page Header Border Color', 'grandcarrental' ),
        'section'  => 'header_background',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '#page_caption',
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_header_padding_top',
        'label'    => esc_html__('Page Header Padding Top', 'grandcarrental' ),
        'section'  => 'header_title',
        'default'  => 50,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'padding-top',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_header_padding_bottom',
        'label'    => esc_html__('Page Header Padding Bottom', 'grandcarrental' ),
        'section'  => 'header_title',
        'default'  => 50,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'padding-bottom',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_title_font_size',
        'label'    => esc_html__('Page Title Font Size', 'grandcarrental' ),
        'section'  => 'header_title',
        'default'  => 40,
        'choices' => array( 'min' => 12, 'max' => 100, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_title_font_weight',
        'label'    => esc_html__('Page Title Font Weight', 'grandcarrental' ),
        'section'  => 'header_title',
        'default'  => 700,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title, .post_caption h1',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_page_title_transform',
        'label'    => esc_html__('Page Title Text Transform', 'grandcarrental' ),
        'section'  => 'header_title',
        'default'  => 'none',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title, .post_caption h1',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_title_font_spacing',
        'label'    => esc_html__('Page Title Font Spacing', 'grandcarrental' ),
        'section'  => 'header_title',
        'default'  => 0,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title, .post_caption h1',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_page_title_font_color',
        'label'    => esc_html__('Page Title Font Color', 'grandcarrental' ),
        'section'  => 'header_title',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title, .post_caption h1',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_header_builder_font_size',
        'label'    => esc_html__(' Content Builder Header Font Size', 'grandcarrental' ),
        'section'  => 'header_builder_title',
        'default'  => 36,
        'choices' => array( 'min' => 12, 'max' => 100, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h2.ppb_title',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_header_builder_font_transform',
        'label'    => esc_html__('Content Builder Header Text Transform', 'grandcarrental' ),
        'section'  => 'header_builder_title',
        'default'  => 'none',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => 'h2.ppb_title',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_page_tagline_font_color',
        'label'    => esc_html__('Page Tagline Font Color', 'grandcarrental' ),
        'section'  => 'header_tagline',
        'default'  => '#8D9199',
        'output' => array(
	        array(
	            'element'  => '.page_tagline, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company, .post_detail.single_post, #gallery_caption .tg_caption .tg_desc',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
	    'js_vars'   => array(
			array(
				'element'  => '.page_tagline, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company, .post_detail.single_post, #gallery_caption .tg_caption .tg_desc',
				'function' => 'css',
				'property' => 'color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_tagline_font_size',
        'label'    => esc_html__('Page Title Font Size', 'grandcarrental' ),
        'section'  => 'header_tagline',
        'default'  => 15,
        'choices' => array( 'min' => 10, 'max' => 30, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.page_tagline, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_tagline_font_weight',
        'label'    => esc_html__('Page Tagline Font Weight', 'grandcarrental' ),
        'section'  => 'header_tagline',
        'default'  => 500,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '.page_tagline',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_tagline_font_spacing',
        'label'    => esc_html__('Page Tagline Font Spacing', 'grandcarrental' ),
        'section'  => 'header_tagline',
        'default'  => 0,
        'choices' => array( 'min' => -2, 'max' => 4, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_page_tagline_transform',
        'label'    => esc_html__('Page Tagline Text Transform', 'grandcarrental' ),
        'section'  => 'header_tagline',
        'default'  => 'none',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '.page_tagline, .post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    //End Header Tab Settings
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_sidebar_sticky',
        'label'    => esc_html__('Enable Sticky Sidebar', 'grandcarrental' ),
        'description' => esc_html__('Check this to displays sidebar fixed when scrolling.', 'grandcarrental' ),
        'section'  => 'sidebar_general',
        'default'  => 1,
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_sidebar_title_font',
        'label'    => esc_html__('Widget Title Font Family', 'grandcarrental' ),
        'section'  => 'sidebar_typography',
        'default'  => 'Poppins',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_sidebar_title_font_size',
        'label'    => esc_html__('Widget Title Font Size', 'grandcarrental' ),
        'section'  => 'sidebar_typography',
        'default'  => 18,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_sidebar_title_font_weight',
        'label'    => esc_html__('Widget Title Font Weight', 'grandcarrental' ),
        'section'  => 'sidebar_typography',
        'default'  => 700,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_sidebar_title_font_spacing',
        'label'    => esc_html__('Widget Title Font Spacing', 'grandcarrental' ),
        'section'  => 'sidebar_typography',
        'default'  => 0,
        'choices' => array( 'min' => -2, 'max' => 4, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_sidebar_title_transform',
        'label'    => esc_html__('Widget Title Text Transform', 'grandcarrental' ),
        'section'  => 'sidebar_typography',
        'default'  => 'none',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidebar_font_color',
        'label'    => esc_html__('Sidebar Font Color', 'grandcarrental' ),
        'section'  => 'sidebar_color',
        'default'  => '#555555',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidebar_link_color',
        'label'    => esc_html__('Sidebar Link Color', 'grandcarrental' ),
        'section'  => 'sidebar_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:not(.button)',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidebar_hover_link_color',
        'label'    => esc_html__('Sidebar Hover Link Color', 'grandcarrental' ),
        'section'  => 'sidebar_color',
        'default'  => '#5856D6',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:hover:not(.button), #page_content_wrapper .inner .sidebar_wrapper a:active:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:hover:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:active:not(.button)',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidebar_title_color',
        'label'    => esc_html__('Sidebar Widget Title Font Color', 'grandcarrental' ),
        'section'  => 'sidebar_color',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    //End Sidebar Tab Settings
    
    //Register Footer Tab Settings
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_footer_sidebar',
        'label'    => esc_html__('Footer Sidebar Columns', 'grandcarrental' ),
        'section'  => 'footer_general',
        'default'  => '3',
        'choices'  => $tg_copyright_column,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_footer_social_link',
        'label'    => esc_html__('Open Footer Social Icons link in new window', 'grandcarrental' ),
        'description' => esc_html__('Check this to open footer social icons link in new window', 'grandcarrental' ),
        'section'  => 'footer_general',
        'default'  => 1,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_bg',
        'label'    => esc_html__('Footer Background', 'grandcarrental' ),
        'section'  => 'footer_color',
	    'priority' => 1,
	    'default'  => '#000000',
	    'output' => array(
	        array(
	            'element'  => '.footer_bar, #footer, .car_recently_view',
	            'property' => 'background-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar, #footer, .car_recently_view',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_font_color',
        'label'    => esc_html__('Footer Font Color', 'grandcarrental' ),
        'section'  => 'footer_color',
        'default'  => '#cccccc',
        'output' => array(
	        array(
	            'element'  => '#footer, #copyright, #footer_menu li a, #footer_menu li a:hover, #footer_menu li a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_link_color',
        'label'    => esc_html__('Footer Link Color', 'grandcarrental' ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#copyright a, #copyright a:active, #footer a, #footer a:active, #footer .sidebar_widget li h2.widgettitle, .car_recently_view h3.sub_title',
	            'property' => 'color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '#copyright a, #copyright a:active, #footer a, #footer a:active, #footer .sidebar_widget li h2.widgettitle, .car_recently_view h3.sub_title',
				'function' => 'css',
				'property' => 'color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_hover_link_color',
        'label'    => esc_html__('Footer Hover Link Color', 'grandcarrental' ),
        'section'  => 'footer_color',
        'default'  => '#5856D6',
        'output' => array(
	        array(
	            'element'  => '#copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_border_color',
        'label'    => esc_html__('Footer Border Color', 'grandcarrental' ),
        'section'  => 'footer_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper, .footer_bar, .car_recently_view h3.sub_title, .car_recently_view',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar_wrapper, .footer_bar, .car_recently_view h3.sub_title, .car_recently_view',
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_social_color',
        'label'    => esc_html__('Footer Social Icon Color', 'grandcarrental' ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper .social_wrapper ul li a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'textarea',
        'settings'  => 'tg_footer_copyright_text',
        'label'    => esc_html__('Copyright Text', 'grandcarrental' ),
        'description' => esc_html__('Enter your copyright text.', 'grandcarrental' ),
        'section'  => 'footer_copyright',
        'default'  => '© Copyright Grand Car Rental Theme Demo - Theme by ThemeGoods',
        'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_footer_copyright_right_area',
        'label'    => esc_html__('Copyright Right Area Content', 'grandcarrental' ),
        'section'  => 'footer_copyright',
        'default'  => 'menu',
        'choices'  => $tg_copyright_content,
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_footer_copyright_totop',
        'label'    => esc_html__('Go To Top Button', 'grandcarrental' ),
        'description' => 'Check this option to enable go to top button at the bottom of page when scrolling',
        'section'  => 'footer_copyright',
        'default'  => 1,
	    'priority' => 7,
    );
    //End Footer Tab Settings
    
    
    //Begin Gallery Tab Settings
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_gallery_global_title',
        'label'    => esc_html__('Global Settings', 'grandcarrental' ),
        'section'  => 'gallery_general',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_gallery_sort',
        'label'    => esc_html__('Gallery Images Sorting', 'grandcarrental' ),
        'description' => 'Select gallery images sorting options',
        'section'  => 'gallery_general',
        'default'  => 'drag',
        'choices'  => $tg_gallery_sort,
	    'priority' => 1,
    );
            
    $controls[] = array(
        'type'     => 'radio-buttonset',
        'settings'  => 'tg_lightbox_skin',
        'label'    => esc_html__('Select lightbox skin color', 'grandcarrental' ),
        'description' => esc_html__('Select which skin you want to use for lightbox', 'grandcarrental' ),
        'section'  => 'gallery_lightbox',
        'default'  => 'metro-black',
        'choices'  => $tg_lightbox_skin,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_lightbox_enable_caption',
        'label'    => esc_html__('Display image caption in lightbox', 'grandcarrental' ),
        'description' => esc_html__('Check if you want to display image caption under the image in lightbox mode', 'grandcarrental' ),
        'section'  => 'gallery_lightbox',
        'default'  => 1,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'radio-buttonset',
        'settings'  => 'tg_lightbox_thumbnails',
        'label'    => esc_html__('Select lightbox thumbnails alignment', 'grandcarrental' ),
        'description' => esc_html__('Select which alignment you want to use for lightbox thumbnails', 'grandcarrental' ),
        'section'  => 'gallery_lightbox',
        'default'  => 'horizontal',
        'choices'  => $tg_lightbox_thumbnails,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_lightbox_opacity',
        'label'    => esc_html__('Lightbox Overlay Opacity', 'grandcarrental' ),
        'section'  => 'gallery_lightbox',
        'default'  => 80,
        'choices' => array( 'min' => 0, 'max' => 100, 'step' => 5 ),
	    'priority' => 1,
    );
    
    //End Gallery Tab Settings
    
    
    //Begin Portfolio Tab Settings
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_car_currency_title',
        'label'    => esc_html__('Currency Settings', 'grandcarrental' ),
        'section'  => 'car_general',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_car_currency',
        'label'    => esc_html__('Currency', 'grandcarrental' ),
        'description' => esc_html__('Enter default car pricing currency.', 'grandcarrental' ),
        'section'  => 'car_general',
        'default'  => '$',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'radio-buttonset',
        'settings'  => 'tg_car_currency_display',
        'label'    => esc_html__('Currency Display', 'grandcarrental' ),
        'description' => esc_html__('Select how currency display between car price', 'grandcarrental' ),
        'section'  => 'car_general',
        'default'  => 'before',
        'choices'  => array(
	        'before' => 'Before price',
	        'after' => 'After price',
        ),
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_car_currency_thousand_sep',
        'label'    => esc_html__('Thousand Separator', 'grandcarrental' ),
        'description' => esc_html__('Enter thousand separator of displayed price.', 'grandcarrental' ),
        'section'  => 'car_general',
        'default'  => ',',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_car_currency_decimal_sep',
        'label'    => esc_html__('Decimal Separator', 'grandcarrental' ),
        'description' => esc_html__('Enter decimal separator of displayed price.', 'grandcarrental' ),
        'section'  => 'car_general',
        'default'  => '.',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_car_currency_decimal_number',
        'label'    => esc_html__('Number of Separator', 'grandcarrental' ),
        'description' => esc_html__('Enter number of decimal points for displayed price.', 'grandcarrental' ),
        'section'  => 'car_general',
        'default'  => 0,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_car_currency_other',
        'label'    => esc_html__('Other Settings', 'grandcarrental' ),
        'section'  => 'car_general',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_car_default_search_sort',
        'label'    => esc_html__('Default Car Search Sorting', 'grandcarrental' ),
        'section'  => 'car_general',
        'default'  => 'price_low',
        'choices'  => $tg_car_search_sort,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_car_recently_view',
        'label'    => esc_html__('Enable Recently View Cars', 'grandcarrental' ),
        'description' => esc_html__('Check this option to enable recently view cars before footer', 'grandcarrental' ),
        'section'  => 'car_general',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_car_single_header',
        'label'    => esc_html__('Display Car Header Content', 'grandcarrental' ),
        'description' => esc_html__('Check this option to display car header content in single car page', 'grandcarrental' ),
        'section'  => 'car_single',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_car_single_review',
        'label'    => esc_html__('Enable Car Review', 'grandcarrental' ),
        'description' => esc_html__('Check this option to enable car review', 'grandcarrental' ),
        'section'  => 'car_single',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_car_single_share',
        'label'    => esc_html__('Enable Car Sharing', 'grandcarrental' ),
        'description' => esc_html__('Check this option to enable car sharing', 'grandcarrental' ),
        'section'  => 'car_single',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_car_display_related',
        'label'    => esc_html__('Display Similar Cars', 'grandcarrental' ),
        'description' => esc_html__('Check this option to display similar cars on single car page', 'grandcarrental' ),
        'section'  => 'car_single',
        'default'  => 1,
	    'priority' => 8,
    );
    //End Portfolio Tab Settings
    
    
    //Begin Blog Tab Settings
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_full',
        'label'    => esc_html__('Display Full Blog Post Content', 'grandcarrental' ),
        'description' => esc_html__('Check this option to display post full content in blog page (excerpt blog grid layout)', 'grandcarrental' ),
        'section'  => 'blog_general',
        'default'  => 0,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_blog_archive_layout',
        'label'    => esc_html__('Archive Page Layout', 'grandcarrental' ),
        'description' => esc_html__('Select page layout for displaying archive page', 'grandcarrental' ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_blog_category_layout',
        'label'    => esc_html__('Category Page Layout', 'grandcarrental' ),
        'description' => esc_html__('Select page layout for displaying category page', 'grandcarrental' ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_blog_tag_layout',
        'label'    => esc_html__('Tag Page Layout', 'grandcarrental' ),
        'description' => esc_html__('Select page layout for displaying tag page', 'grandcarrental' ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_feat_content',
        'label'    => esc_html__('Display Post Featured Content', 'grandcarrental' ),
        'description' => esc_html__('Check this to display featured content (image or gallery) in single post page', 'grandcarrental' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_tags',
        'label'    => esc_html__('Display Post Tags', 'grandcarrental' ),
        'description' => esc_html__('Check this option to display post tags on single post page', 'grandcarrental' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_author',
        'label'    => esc_html__('Display About Author', 'grandcarrental' ),
        'description' => esc_html__('Check this option to display about author on single post page', 'grandcarrental' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_related',
        'label'    => esc_html__('Display Related Posts', 'grandcarrental' ),
        'description' => esc_html__('Check this option to display related posts on single post page', 'grandcarrental' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 8,
    );
    //End Blog Tab Settings
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		//Begin Shop Tab Settings
		$controls[] = array(
	        'type'     => 'radio-buttonset',
	        'settings'  => 'tg_shop_layout',
	        'label'    => esc_html__('Shop Main Page Layout', 'grandcarrental' ),
	        'description' => esc_html__('Select page layout for displaying shop\'s products page', 'grandcarrental' ),
	        'section'  => 'shop_layout',
	        'default'  => 'fullwidth',
	        'choices'  => $tg_shop_layout,
		    'priority' => 1,
	    );
	    
	    $controls[] = array(
	        'type'     => 'slider',
	        'settings'  => 'tg_shop_items',
	        'label'    => esc_html__('Products Page Show At Most', 'grandcarrental' ),
	        'description' => esc_html__('Select number of product items you want to display per page', 'grandcarrental' ),
	        'section'  => 'shop_layout',
	        'default'  => 16,
	        'choices' => array( 'min' => 1, 'max' => 100, 'step' => 1 ),
		    'priority' => 2,
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_shop_price_font_color',
	        'label'    => esc_html__('Product Price Font Color', 'grandcarrental' ),
	        'section'  => 'shop_single',
	        'default'  => '#000000',
	        'output' => array(
		        array(
		            'element'  => '.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, p.price ins span.amount, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 2,
	    );
	    
	    $controls[] = array(
	        'type'     => 'toggle',
	        'settings'  => 'tg_shop_related_products',
	        'label'    => esc_html__('Display Related Products', 'grandcarrental' ),
	        'description' => esc_html__('Check this option to display related products on single product page', 'grandcarrental' ),
	        'section'  => 'shop_single',
	        'default'  => 1,
		    'priority' => 3,
	    );
		//End Shop Tab Settings
	}

    return $controls;
}
add_filter( 'kirki/controls', 'grandcarrental_custom_setting' );


function grandcarrental_customize_preview()
{
?>
    <script type="text/javascript">
        ( function( $ ) {
        	//Register Logo Tab Settings
        	wp.customize('tg_retina_logo',function( value ) {
                value.bind(function(to) {
                    jQuery('#custom_logo img').attr('src', to );
                });
            });
        	//End Logo Tab Settings
        
			//Register General Tab Settings
            wp.customize('tg_body_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('body, input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], input.wpcf7-text, .woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text, select, textarea').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_body_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('body, input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], input.wpcf7-text, .woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text, select, input[type=submit], input[type=button], a.button, .button').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_header_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('h1, h2, h3, h4, h5, h6, h7, .post_quote_title, label, strong[itemprop="author"], #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, .readmore, .post_detail.single_post, .page_tagline, #gallery_caption .tg_caption .tg_desc, #filter_selected, #autocomplete li strong, .post_detail.single_post a, .post_detail.single_post a:hover,.post_detail.single_post a:active, blockquote,.single_car_price, .single_car_departure_wrapper li .single_car_departure_title, .comment_rating_wrapper .comment_rating_label, .car_excerpt, .widget_post_views_counter_list_widget, .sidebar_widget li.widget_products, #copyright, #footer_menu li a, #footer ul.sidebar_widget li ul.posts.blog li a, .woocommerce-page table.cart th, table.shop_table thead tr th, .car_price, p.price span.amount, .woocommerce-page div.product .woocommerce-tabs ul.tabs li a, .woocommerce ul.products li.product .price').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_h1_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h1').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h2_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h2').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h3_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h3').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h4_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h4').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h5_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h5').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h6_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h6').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_content_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('body, #wrapper, #page_content_wrapper.fixed, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, #body_loading_screen, h3#reply-title span, .overlay_gallery_wrapper, .pricing_wrapper_border, .pagination a, .pagination span, #captcha-wrap .text-box input, .flex-direction-nav a, .blog_promo_title h6, #supersized li, #gallery_caption .tg_caption').css('background-color', to );
                    
                    jQuery('#gallery_expand').css('border-bottom-color', to );
                });
            });
            
            wp.customize('tg_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('body, .pagination a, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a, #page_content_wrapper.split #copyright, .page_content_wrapper.split #copyright, .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited, .readmore, #page_content_wrapper .inner .sidebar_wrapper .sidebar .single_car_booking_wrapper label').css('color', to );
                    jQuery('::selection').css('background-color', to );
                    jQuery('::-webkit-input-placeholder').css('color', to );
                    jQuery('::-moz-placeholder').css('color', to );
                    jQuery(':-ms-input-placeholder').css('color', to );
                });
            });
            
            wp.customize('tg_h1_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('h1, h2, h3, h4, h5, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i, .woocommerce .woocommerce-ordering select, .woocommerce #page_content_wrapper a.button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button:hover, .tabs .ui-state-active a, body.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, body.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, body.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a, body.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .post_header h5 a, .post_header h6 a, .flex-direction-nav a:before, .social_share_button_wrapper .social_post_view .view_number, .social_share_button_wrapper .social_post_share_count .share_number, .portfolio_post_previous a, .portfolio_post_next a, #autocomplete li strong, .post_detail.single_post a, .post_detail.single_post a:hover,.post_detail.single_post a:active, .single_car_departure_wrapper li .single_car_departure_title, .cart_item .product-name a, .single_car_booking_wrapper .single_car_view_desc, .single_car_booking_wrapper .single_car_view_icon').css('color', to );
                    
                    jQuery('body.page.page-template-gallery-archive-split-screen-php #fp-nav li .active span, body.tax-gallerycat #fp-nav li .active span, body.page.page-template-portfolio-fullscreen-split-screen-php #fp-nav li .active span, body.page.tax-portfolioset #fp-nav li .active span, body.page.page-template-gallery-archive-split-screen-php #fp-nav ul li a span, body.tax-gallerycat #fp-nav ul li a span, body.page.page-template-portfolio-fullscreen-split-screen-php #fp-nav ul li a span, body.page.tax-portfolioset #fp-nav ul li a span').css('backgroundColor', to );
                });
            });
            
            wp.customize('tg_input_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], textarea, select').css('background-color', to );
                });
            });
            
            wp.customize('tg_input_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], textarea, select').css('color', to );
                });
            });
            
            wp.customize('tg_input_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], textarea, select').css('border-color', to );
                });
            });
            
            wp.customize('tg_input_focus_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, input[type=date]:focus, textarea:focus, #car_search_form .one_fourth:not(.last)').css('border-color', to );
                });
            });
            
            wp.customize('tg_button_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt').css('fontFamily', to );
                });
            });
            //End General Tab Settings
        
        	//Register Menu Tab Settings
        	wp.customize('tg_menu_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_menu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_menu_padding',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('paddingTop', to+'px' );
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('paddingBottom', to+'px' );
                });
            });
            
            wp.customize('tg_menu_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_menu_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_menu_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_menu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a, #page_share, #mobile_nav_icon, #logo_wrapper .social_wrapper ul li a').css('color', to );
                });
            });
            
            wp.customize('tg_menu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover, #logo_wrapper .social_wrapper ul li a:hover').css('color', to );
                });
            });
            
            wp.customize('tg_menu_active_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a, #menu_wrapper div .nav li ul li.current-menu-item a, #menu_wrapper div .nav li.current-menu-parent  ul li.current-menu-item a, .header_cart_wrapper a:active, #page_share:active, #gallery_download:active, .view_fullscreen_wrapper a:active, #logo_wrapper .social_wrapper ul li a:active, .top_contact_info span').css('color', to );
                    jQuery('#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a, #menu_wrapper div .nav li ul li.current-menu-item a, #menu_wrapper div .nav li.current-menu-parent  ul li.current-menu-item a').css('borderColor', to );
                });
            });
            
            wp.customize('tg_submenu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_submenu_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_submenu_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_submenu_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_submenu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active').css('background', to );
                });
            });
            
            wp.customize('tg_submenu_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul').css('background', to );
                });
            });
            
            wp.customize('tg_submenu_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul').css('borderColor', to );
                });
            });
            
            wp.customize('tg_megamenu_header_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active, #menu_wrapper div .nav li.megamenu ul li.current-menu-item > a').css('color', to );
                });
            });
            
            wp.customize('tg_megamenu_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav li.megamenu ul li').css('borderColor', to );
                });
            });
            
            wp.customize('tg_topbar_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.above_top_bar').css('background', to );
                });
            });
            
            wp.customize('tg_topbar_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_menu li a, .top_contact_info, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active').css('color', to );
                });
            });
            
            wp.customize('tg_menu_contact_hours',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_contact_hours').html('<i class="fa fa-clock-o"></i>'+to);
                });
            });
            
            wp.customize('tg_menu_contact_number',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_contact_number').html('<i class="fa fa-phone"></i>'+to);
                });
            });
            
            wp.customize('tg_menu_search_input_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_menu_wrapper #searchform').css('background', to );
                });
            });
            
            wp.customize('tg_menu_search_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_menu_wrapper #searchform input[type=text], .mobile_menu_wrapper #searchform button i, #close_mobile_menu i').css('color', to );
                    jQuery('.mobile_menu_wrapper #searchform ::-webkit-input-placeholder').css('color', to );
                    jQuery('.mobile_menu_wrapper #searchform ::-moz-placeholder').css('color', to );
                    jQuery('.mobile_menu_wrapper #searchform :-ms-input-placeholder').css('color', to );
                });
            });
            
            wp.customize('tg_sidemenu_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_sidemenu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_sidemenu_font_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_sidemenu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, #close_mobile_menu, .mobile_menu_wrapper .social_wrapper ul li a, html[data-menu=hammenufull] #copyright, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:active, .mobile_menu_wrapper .social_wrapper ul li a:hover').css('color', to );
                });
            });
            //End Menu Tab Settings
            
            
            //Register Header Tab Settings 
        	wp.customize('tg_page_header_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption, .page_caption_bg_content, .overlay_gallery_content').css('background-color', to );
                    jQuery('.page_caption_bg_border, .overlay_gallery_border').css('border-color', to );
                });
            });
            
            wp.customize('tg_page_header_padding_top',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption').css('paddingTop', to+'px' );
                });
            });
            
            wp.customize('tg_page_header_padding_bottom',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption').css('paddingBottom', to+'px' );
                });
            });
            
            wp.customize('tg_page_title_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('color', to );
                });
            });
            
            wp.customize('tg_page_title_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_page_title_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_page_title_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('textTransform', to );
                });
            });
            
            wp.customize('tg_page_title_bg_height',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption.hasbg').css('height', to+'vh' );
                });
            });
            
            wp.customize('tg_header_builder_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h2.ppb_title').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_header_builder_font_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('h2.ppb_title').css('textTransform', to );
                });
            });
            
            wp.customize('tg_page_tagline_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('.portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_page_tagline_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('.page_tagline,.portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_page_tagline_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('.portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('textTransform', to );
                });
            });
            
            wp.customize('tg_page_tagline_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('.portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('letterSpacing', to+'px' );
                });
            });
        	//End Logo Header Settings
        	
        	//Register Sidebar Tab Settings
            wp.customize('tg_sidebar_title_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_sidebar_title_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_sidebar_title_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_sidebar_title_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('textTransform', to );
                });
            });
            
            wp.customize('tg_sidebar_title_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_sidebar_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper a:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:not(.button)').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_hover_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper a:hover, #page_content_wrapper .inner .sidebar_wrapper a:active, .page_content_wrapper .inner .sidebar_wrapper a:hover, .page_content_wrapper .inner .sidebar_wrapper a:active').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_title_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('color', to );
                });
            });
            //End Sidebar Tab Settings
            
            //Register Footer Tab Settings
            
            wp.customize('tg_footer_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#footer, #copyright, #footer_menu li a, #footer_menu li a:hover, #footer_menu li a:active').css('color', to );
                });
            });
            
            wp.customize('tg_footer_hover_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover').css('color', to );
                });
            });
            
            wp.customize('tg_footer_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.footer_bar_wrapper, .footer_bar').css('borderColor', to );
                });
            });
            
            wp.customize('tg_footer_social_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.footer_bar_wrapper .social_wrapper ul li a').css('color', to );
                });
            });
            
            wp.customize('tg_footer_copyright_text',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright').html( to );
                });
            });
            //End Footer Tab Settings
            
            
            //Register Shop Tab Settings
             wp.customize('tg_shop_price_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, p.price ins span.amount, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price').css( 'color', to );
                });
            });
            //End Shop Tab Settings
        } )( jQuery )
    </script>
<?php	
}