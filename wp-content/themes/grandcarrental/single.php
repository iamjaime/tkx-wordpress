<?php
/**
 * The main template file for display single post page.
 *
 * @package WordPress
*/

/**
*	Get current page id
**/

$current_page_id = $post->ID;

if($post->post_type == 'galleries')
{
	get_template_part("gallery");

	exit;
}
elseif($post->post_type == 'car')
{
	get_template_part("single-car");
	exit;
}
else
{
	$post_layout = get_post_meta($post->ID, 'post_layout', true);
	
	switch($post_layout)
	{
		case 'With Right Sidebar':
		default:
			get_template_part("single-post-r");
			exit;
		break;
		
		case 'With Left Sidebar':
			get_template_part("single-post-l");
			exit;
		break;
		
		case 'Fullwidth':
			get_template_part("single-post-f");
			exit;
		break;
	}
}
?>