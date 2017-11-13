<?php
/**
 * Template Name: Car By Brand & Type Fullwidth
 * The main template file for display car brands and types page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
if(!is_null($post))
{
	$page_obj = get_page($post->ID);
}

$current_page_id = '';

/**
*	Get current page id
**/

if(!is_null($post) && isset($page_obj->ID))
{
    $current_page_id = $page_obj->ID;
}

$grandcarrental_homepage_style = grandcarrental_get_homepage_style();

get_header();

$grandcarrental_page_content_class = grandcarrental_get_page_content_class();

//Include custom header feature
get_template_part("/templates/template-header");
?>

<!-- Begin content -->
<?php
	//Get all portfolio items for paging
	$wp_query = grandcarrental_get_wp_query();
	$current_photo_count = $wp_query->post_count;
	$all_photo_count = $wp_query->found_posts;
?>
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<?php
	    if(!empty($post->post_content) && empty($term))
	    {
	?>
	    <div class="standard_wrapper"><?php echo grandcarrental_apply_content($post->post_content); ?></div><br class="clear"/><br/>
	<?php
	    }
	?>
	
	<div id="page_main_content" class="sidebar_content full_width fixed_column">
	
		<div class="standard_wrapper">
			
		<?php
			$car_brands = get_terms(array(
			    'taxonomy' => 'carbrand',
			    'hide_empty' => false,
			));
			
			if(!empty($car_brands))
			{
		?>
			<div class="car_browse_by_wrapper">
				<h2><?php esc_html_e("By Brands", 'grandcarrental'); ?></h2>
			</div>
		
			<div class="gallery grid portrait three_cols portfolio-content section content clearfix" data-columns="3">
			
			<?php
				foreach($car_brands as $car_brand)
				{
					$image_url = '';
					$term_ID = $car_brand->term_id;
							
					if(function_exists('z_taxonomy_image_url'))
					{
					    $image_url = z_taxonomy_image_url($term_ID);
					}
					
					$permalink_url = get_term_link($term_ID);
					
					if(!empty($image_url))
					{
			?>
			<div class="element grid classic3_cols animated<?php echo esc_attr($key+1); ?>">
			
				<div class="one_third gallery3 grid static filterable portfolio_type themeborder" data-id="post-<?php echo esc_attr($key+1); ?>" style="background-image:url(<?php echo esc_url($image_url); ?>);">	
					<a class="car_image" href="<?php echo esc_url($permalink_url); ?>"></a>	
					<div class="portfolio_info_wrapper">
		        	    <h3><?php echo esc_html($car_brand->name); ?></h3>
					</div>
				</div>
			</div>
			<?php
					}
				}
			?>
				
			</div>
			<br class="clear"/>
		<?php
		}
		?>
		<br class="clear"/>
		<?php
			$car_types = get_terms(array(
			    'taxonomy' => 'cartype',
			    'hide_empty' => false,
			));
			
			if(!empty($car_types))
			{
		?>
			<div class="car_browse_by_wrapper">
				<h2><?php esc_html_e("By Types", 'grandcarrental'); ?></h2>
			</div>
		
			<div class="gallery grid portrait three_cols portfolio-content section content clearfix" data-columns="3">
			
			<?php
				foreach($car_types as $car_type)
				{
					$image_url = '';
					$term_ID = $car_type->term_id;
							
					if(function_exists('z_taxonomy_image_url'))
					{
					    $image_url = z_taxonomy_image_url($term_ID);
					}
					
					$permalink_url = get_term_link($term_ID);
					
					if(!empty($image_url))
					{
			?>
			<div class="element grid classic3_cols animated<?php echo esc_attr($key+1); ?>">
			
				<div class="one_third gallery3 grid static filterable portfolio_type themeborder" data-id="post-<?php echo esc_attr($key+1); ?>" style="background-image:url(<?php echo esc_url($image_url); ?>);">	
					<a class="car_image" href="<?php echo esc_url($permalink_url); ?>"></a>	
					<div class="portfolio_info_wrapper">
		        	    <h3><?php echo esc_html($car_type->name); ?></h3>
					</div>
				</div>
			</div>
			<?php
					}
				}
			?>
				
			</div>
			<br class="clear"/><br/>
		<?php
		}
		?>
		
		</div>
	</div>

</div>
</div>
</div>
<?php get_footer(); ?>
<!-- End content -->