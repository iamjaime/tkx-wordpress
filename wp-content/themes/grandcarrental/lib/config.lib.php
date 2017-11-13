<?php
//Setup theme constant and default data
$theme_obj = wp_get_theme('grandcarrental');

define("GRANDCARRENTAL_THEMENAME", $theme_obj['Name']);
define("GRANDCARRENTAL_THEMEDEMO", FALSE);
define("GRANDCARRENTAL_SHORTNAME", "pp");
define("GRANDCARRENTAL_THEMEVERSION", $theme_obj['Version']);
define("GRANDCARRENTAL_THEMEDEMOURL", $theme_obj['ThemeURI']);
define("GRANDCARRENTAL_THEMEDATEFORMAT", get_option('date_format'));
define("GRANDCARRENTAL_THEMETIMEFORMAT", get_option('time_format'));
define("ENVATOITEMID", 19398136);
define("GRANDCARRENTAL_BUILDERDOCURL", 'http://themes.themegoods.com/grandcarrental/doc/create-a-page-using-content-builder-2/');

//Get default WP uploads folder
$wp_upload_arr = wp_upload_dir();
define("GRANDCARRENTAL_THEMEUPLOAD", $wp_upload_arr['basedir']."/".strtolower(sanitize_title(GRANDCARRENTAL_THEMENAME))."/");
define("GRANDCARRENTAL_THEMEUPLOADURL", $wp_upload_arr['baseurl']."/".strtolower(sanitize_title(GRANDCARRENTAL_THEMENAME))."/");

if(!is_dir(GRANDCARRENTAL_THEMEUPLOAD))
{
	wp_mkdir_p(GRANDCARRENTAL_THEMEUPLOADURL);
}

/**
*  Begin Global variables functions
*/

//Get default WordPress post variable
function grandcarrental_get_wp_post() {
	global $post;
	return $post;
}

//Get default WordPress file system variable
function grandcarrental_get_wp_filesystem() {
	WP_Filesystem();
	global $wp_filesystem;
	return $wp_filesystem;
}

//Get default WordPress wpdb variable
function grandcarrental_get_wpdb() {
	global $wpdb;
	return $wpdb;
}

//Get default WordPress wp_query variable
function grandcarrental_get_wp_query() {
	global $wp_query;
	return $wp_query;
}

//Get default WordPress customize variable
function grandcarrental_get_wp_customize() {
	global $wp_customize;
	return $wp_customize;
}

//Get default WordPress current screen variable
function grandcarrental_get_current_screen() {
	global $current_screen;
	return $current_screen;
}

//Get default WordPress paged variable
function grandcarrental_get_paged() {
	global $paged;
	return $paged;
}

//Get default WordPress registered widgets variable
function grandcarrental_get_registered_widget_controls() {
	global $wp_registered_widget_controls;
	return $wp_registered_widget_controls;
}

//Get default WordPress registered sidebars variable
function grandcarrental_get_registered_sidebars() {
	global $wp_registered_sidebars;
	return $wp_registered_sidebars;
}

//Get default Woocommerce variable
function grandcarrental_get_woocommerce() {
	global $woocommerce;
	return $woocommerce;
}

//Get all google font usages in customizer
function grandcarrental_get_google_fonts() {
	$grandcarrental_google_fonts = array('tg_body_font', 'tg_header_font', 'tg_menu_font', 'tg_sidemenu_font', 'tg_sidebar_title_font', 'tg_button_font');
	
	global $grandcarrental_google_fonts;
	return $grandcarrental_google_fonts;
}

//Get menu transparent variable
function grandcarrental_get_page_menu_transparent() {
	global $grandcarrental_page_menu_transparent;
	return $grandcarrental_page_menu_transparent;
}

//Set menu transparent variable
function grandcarrental_set_page_menu_transparent($new_value = '') {
	global $grandcarrental_page_menu_transparent;
	$grandcarrental_page_menu_transparent = $new_value;
}

//Get no header checker variable
function grandcarrental_get_is_no_header() {
	global $grandcarrental_is_no_header;
	return $grandcarrental_is_no_header;
}

//Get deafult theme screen CSS class
function grandcarrental_get_screen_class() {
	global $grandcarrental_screen_class;
	return $grandcarrental_screen_class;
}

//Set deafult theme screen CSS class
function grandcarrental_set_screen_class($new_value = '') {
	global $grandcarrental_screen_class;
	$grandcarrental_screen_class = $new_value;
}

//Get theme homepage style
function grandcarrental_get_homepage_style() {
	global $grandcarrental_homepage_style;
	return $grandcarrental_homepage_style;
}

//Set theme homepage style
function grandcarrental_set_homepage_style($new_value = '') {
	global $grandcarrental_homepage_style;
	$grandcarrental_homepage_style = $new_value;
}

//Get page gallery ID
function grandcarrental_get_page_gallery_id() {
	global $grandcarrental_page_gallery_id;
	return $grandcarrental_page_gallery_id;
}

//Get default theme options variable
function grandcarrental_get_options() {
	global $grandcarrental_options;
	return $grandcarrental_options;
}

//Set default theme options variable
function grandcarrental_set_options($new_value = '') {
	global $grandcarrental_options;
	$grandcarrental_options = $new_value;
}

//Get top bar setting
function grandcarrental_get_topbar() {
	global $grandcarrental_topbar;
	return $grandcarrental_topbar;
}

//Set top bar setting
function grandcarrental_set_topbar($new_value = '') {
	global $grandcarrental_topbar;
	$grandcarrental_topbar = $new_value;
}

//Get is hide title option
function grandcarrental_get_hide_title() {
	global $grandcarrental_hide_title;
	return $grandcarrental_hide_title;
}

//Set is hide title option
function grandcarrental_set_hide_title($new_value = '') {
	global $grandcarrental_hide_title;
	$grandcarrental_hide_title = $new_value;
}

//Get theme page content CSS class
function grandcarrental_get_page_content_class() {
	global $grandcarrental_page_content_class;
	return $grandcarrental_page_content_class;
}

//Set theme page content CSS class
function grandcarrental_set_page_content_class($new_value = '') {
	global $grandcarrental_page_content_class;
	$grandcarrental_page_content_class = $new_value;
}

//Get Kirki global variable
function grandcarrental_get_kirki() {
	global $kirki;
	return $kirki;
}

//Get admin theme global variable
function grandcarrental_get_wp_admin_css_colors() {
	global $_wp_admin_css_colors;
	return $_wp_admin_css_colors;
}

//Get theme plugins
function grandcarrental_get_plugins() {
	global $grandcarrental_tgm_plugins;
	return $grandcarrental_tgm_plugins;
}

//Set theme plugins
function grandcarrental_set_plugins($new_value = '') {
	global $grandcarrental_tgm_plugins;
	$grandcarrental_tgm_plugins = $new_value;
}

function grandcarrental_is_custom_post_activated()
{
	//Check if custom post type plugin is installed	
	$grandcarrental_custom_post = ABSPATH . '/wp-content/plugins/grandcarrental-custom-post/grandcarrental-custom-post.php';
	
	$grandcarrental_custom_post_activated = file_exists($grandcarrental_custom_post);
	return $grandcarrental_custom_post_activated;
}

function grandcarrental_get_cartype() {
	$available_types = array();
	$grandcarrental_custom_post_activated = grandcarrental_is_custom_post_activated();
	
	if($grandcarrental_custom_post_activated)
	{
		$car_type_arr = get_terms('cartype', 'hide_empty=0&hierarchical=0&parent=0&orderby=name');
		
		foreach ($car_type_arr as $car_type) {
			$available_types[$car_type->name] = $car_type->name;
		}
	}
	
	return $available_types;
}

function grandcarrental_get_carbrand() {
	$available_brands = array();
	$grandcarrental_custom_post_activated = grandcarrental_is_custom_post_activated();
	
	if($grandcarrental_custom_post_activated)
	{
		$car_brand_arr = get_terms('carbrand', 'hide_empty=0&hierarchical=0&parent=0&orderby=name');
		
		foreach ($car_brand_arr as $car_brand) {
			$available_brands[$car_brand->name] = $car_brand->name;
		}
	}
	
	return $available_brands;
}

function grandcarrental_get_sort_options() {
	$sort_options = array(
		"price_low" 	=> esc_html__('Price Low to High', 'grandcarrental' ),
		"price_high" 	=> esc_html__('Price High to Low', 'grandcarrental' ),
		"model" 		=> esc_html__('Sort By Model', 'grandcarrental' ),
		"popular" 		=> esc_html__('Sort By Popularity', 'grandcarrental' ),
		"review" 		=> esc_html__('Sort By Review Score', 'grandcarrental' ),
	);
	
	return $sort_options;
}

//Get page custom fields values
function grandcarrental_get_page_postmetas() {
	//Get all sidebars
	$theme_sidebar = array(
		'' => '',
		'Page Sidebar' => 'Page Sidebar', 
		'Blog Sidebar' => 'Blog Sidebar',
	);
	
	$dynamic_sidebar = get_option('pp_sidebar');
	
	if(!empty($dynamic_sidebar))
	{
		foreach($dynamic_sidebar as $sidebar)
		{
			$theme_sidebar[$sidebar] = $sidebar;
		}
	}
	
	/*
		Get gallery list
	*/
	$args = array(
	    'numberposts' => -1,
	    'post_type' => array('galleries'),
	);
	
	$galleries_arr = get_posts($args);
	$galleries_select = array();
	$galleries_select['(Display Post Featured Image)'] = '';
	
	foreach($galleries_arr as $gallery)
	{
		$galleries_select[$gallery->ID] = $gallery->post_title;
	}
	
	/*
		Get page templates list
	*/
	if(function_exists('get_page_templates'))
	{
		$page_templates = get_page_templates();
		$page_templates_select = array();
		$page_key = 1;
		
		foreach ($page_templates as $template_name => $template_filename) 
		{
			$page_templates_select[$template_name] = get_template_directory_uri()."/functions/images/page/".basename($template_filename, '.php').".png";
			$page_key++;
		}
	}
	else
	{
		$page_templates_select = array();
	}
	
	/*
		Get all menus available
	*/
	$menus = get_terms('nav_menu');
	$menus_select = array(
		 '' => 'Default Menu'
	);
	foreach($menus as $each_menu)
	{
		$menus_select[$each_menu->slug] = $each_menu->name;
	}
	
	$grandcarrental_page_postmetas = array();
	
	$grandcarrental_page_postmetas_extended = 
		array (
			/*
				Begin Page custom fields
			*/
			array("section" => "Page Menu", "id" => "page_menu_transparent", "type" => "checkbox", "title" => "Make Menu Transparent", "description" => "Check this option if you want to display main menu in transparent"),
			
			array("section" => esc_html__('Page Template', 'grandcarrental' ), "id" => "page_custom_template", "type" => "template", "title" => esc_html__('Page Template', 'grandcarrental' ), "description" => esc_html__('Select template for this page', 'grandcarrental' ), "items" => $page_templates_select),
			
			array("section" => esc_html__('Page Title', 'grandcarrental' ), "id" => "page_show_title", "type" => "checkbox", "title" => esc_html__('Hide Default Page Header', 'grandcarrental' ), "description" => esc_html__('Check this option if you want to hide default page header', 'grandcarrental' )),
			
			array("section" => esc_html__('Page Tagline', 'grandcarrental' ), "id" => "page_tagline", "type" => "textarea", "title" => esc_html__('Page Tagline (Optional)', 'grandcarrental' ), "description" => esc_html__('Enter page tagline. It will displays under page title (*Note: HTML code also support)', 'grandcarrental' )),
			
			array(
    			"section" 		=> esc_html__('Page Attributes', 'grandcarrental' ), 
    			"id" 			=> "page_header_type", 
    			"type" 			=> "select", 
    			"title" 		=> esc_html__('Header Content Type', 'grandcarrental' ), 
    			"description" 	=> esc_html__('Select header content type for this page.', 'grandcarrental' ), 
				"items" 		=> array(
					"Image" => "Featured Image",
					"Vimeo Video" => "Vimeo Video",
					"Youtube Video" => "Youtube Video",
			)),
				
			array(
				"section" 		=> esc_html__('Page Attributes', 'grandcarrental' ), 
				"id" 			=> "page_header_vimeo", 
				"type" 			=> "text", 
				"title" 		=> esc_html__('Vimeo Video ID (Optional)', 'grandcarrental' ), 
				"description" 	=> esc_html__('Please enter Vimeo Video ID for example 73317780', 'grandcarrental' )
			),
			
			array(
				"section" 		=> esc_html__('Page Attributes', 'grandcarrental' ), 
				"id" 			=> "page_header_youtube", 
				"type" 			=> "text", 
				"title" 		=> esc_html__('Youtube Video ID (Optional)', 'grandcarrental' ), 
				"description" 	=> esc_html__('Please enter Youtube Video ID for example 6AIdXisPqHc', 'grandcarrental' )
			),
			
			array("section" => esc_html__('Select Sidebar (Optional)', 'grandcarrental' ), "id" => "page_sidebar", "type" => "select", "title" => esc_html__('Page Sidebar (Optional)', 'grandcarrental' ), "description" => esc_html__('Select this page sidebar to display. To use this option, you have to select page template end with "Sidebar" only', 'grandcarrental' ), "items" => $theme_sidebar),
			
			array("section" => esc_html__('Select Menu', 'grandcarrental' ), "id" => "page_menu", "type" => "select", "title" => esc_html__('Page Menu (Optional)', 'grandcarrental' ), "description" => esc_html__('Select this page menu if you want to display main menu other than default one', 'grandcarrental' ), "items" => $menus_select),
		);
	
	
	$grandcarrental_page_postmetas = $grandcarrental_page_postmetas + $grandcarrental_page_postmetas_extended;
		
	return $grandcarrental_page_postmetas;
}
?>