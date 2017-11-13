<?php
/*
 *  Setup main navigation menu
 */
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
	register_nav_menu( 'primary-menu', esc_html__('Primary Menu', 'grandcarrental' ) );
	
	if(GRANDCARRENTAL_THEMEDEMO)
	{
		register_nav_menu( 'demo-primary-menu', esc_html__('Demo Primary Menu', 'grandcarrental' ) );
	}
	
	register_nav_menu( 'secondary-menu', esc_html__('Secondary Menu', 'grandcarrental' ) );
	register_nav_menu( 'side-menu', esc_html__('Side (Mobile) Menu', 'grandcarrental' ) );
	register_nav_menu( 'footer-menu', esc_html__('Footer Menu', 'grandcarrental' ) );
}

class grandcarrental_walker extends Walker_Nav_Menu {

	function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        $id_field = $this->db_fields['id'];
        if (!empty($children_elements[$element->$id_field])) { 
            $element->classes[] = 'arrow'; //enter any classname you like here!
        }
        
        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}
?>