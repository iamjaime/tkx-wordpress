<?php
/**
 * The main template file for display archive page.
 *
 * @package WordPress
*/

//Check if portfolio post type then go to another template
$post_type = get_post_type();

if($post_type == 'car')
{
	$term_id = get_queried_object()->term_id;
	$term_meta = get_option( "taxonomy_term_".$term_id );
	$tg_page_template = $term_meta[$taxonomy.'_template'];
	
	if(file_exists(get_template_directory() . "/".$tg_page_template.".php"))
	{
		get_template_part($tg_page_template);
	}
	else
	{
		get_template_part("car-list-r");
	}
	exit;
}
else
{
	//Get archive page layout setting
	$tg_blog_archive_layout = kirki_get_option('tg_blog_archive_layout');
	
	$located = locate_template($tg_blog_archive_layout.'.php');
	if (!empty($located))
	{
		get_template_part($tg_blog_archive_layout);
	}
	else
	{
		get_template_part('blog_r');
	}
}
?>