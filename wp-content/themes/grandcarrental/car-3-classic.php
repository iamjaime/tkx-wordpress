<?php
/**
 * Template Name: Car 3 Columns Classic
 * The main template file for display car page.
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

//Include custom car search feature
get_template_part("/templates/template-car-search");
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
	
	<div id="portfolio_filter_wrapper" class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">
	
	<?php
		$key = 0;
		if (have_posts()) : while (have_posts()) : the_post();
			$key++;
			$image_url = '';
			$car_ID = get_the_ID();
					
			if(has_post_thumbnail($car_ID, 'grandcarrental-gallery-grid'))
			{
			    $image_id = get_post_thumbnail_id($car_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'grandcarrental-gallery-grid', true);
			}
			
			$permalink_url = get_permalink($car_ID);
	?>
	<div class="element grid classic3_cols animated<?php echo esc_attr($key+1); ?>">
	
		<div class="one_third gallery3 classic static filterable portfolio_type themeborder" data-id="post-<?php echo esc_attr($key+1); ?>">
			<?php 
				if(!empty($small_image_url[0]))
				{
			?>		
					<a class="car_image" href="<?php echo esc_url($permalink_url); ?>">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
						<?php
							//Get car price
							$car_price = get_post_meta($post->ID, 'car_price', true);
							
							if(!empty($car_price))
							{
						?>
						<div class="car_price">
							<?php echo esc_html(grandcarrental_format_car_price($car_price)); ?>
						</div>
						<?php
							}
						?>
	                </a>
					
					<div class="portfolio_info_wrapper">
        			    <div class="car_attribute_wrapper">
	        			    <a class="car_link" href="<?php echo esc_url($permalink_url); ?>"><h4><?php the_title(); ?></h4></a>
	        			    <?php
		        				$overall_rating_arr = grandcarrental_get_review($car_ID, 'overall_rating');
								$overall_rating = intval($overall_rating_arr['average']);
								$overall_rating_count = intval($overall_rating_arr['count']);
								
								if(!empty($overall_rating))
								{
							?>
								<div class="car_attribute_rating">
								<?php
									if($overall_rating > 0)
									{
							?>
									<div class="br-theme-fontawesome-stars-o">
										<div class="br-widget">
							<?php
										for( $i=1; $i <= $overall_rating; $i++ ) {
											echo '<a href="javascript:;" class="br-selected"></a>';
										}
										
										$empty_star = 5 - $overall_rating;
										
										if(!empty($empty_star))
										{
											for( $i=1; $i <= $empty_star; $i++ ) {
												echo '<a href="javascript:;"></a>';
											}
										}
							?>
										</div>
									</div>
							<?php
									}
									
									if($overall_rating_count > 0)
									{
							?>
									<div class="car_attribute_rating_count">
										<?php echo intval($overall_rating_count); ?>&nbsp;
										<?php
											if($overall_rating_count > 1)
											{
												echo esc_html__('reviews', 'grandcarrental' );
											}
											else
											{
												echo esc_html__('review', 'grandcarrental' );
											}
										?>
									</div>
							<?php
									}
							?>
								</div>
							<?php
								}    
		        			?>
		        			
		        			<?php
								//Display car attributes
						    	$car_passengers = get_post_meta($post->ID, 'car_passengers', true);
								$car_luggages = get_post_meta($post->ID, 'car_luggages', true);
						    	$car_transmission = get_post_meta($post->ID, 'car_transmission', true);
						    	
						    	if(!empty($car_passengers) OR !empty($car_luggages) OR !empty($car_transmission))
						    	{
							?>
								<div class="car_attribute_wrapper_icon">
									<?php
										if(!empty($car_passengers))
										{
									?>
										<div class="one_fourth">
											<div class="car_attribute_icon ti-user"></div>
											<div class="car_attribute_content">
											<?php
												echo intval($car_passengers);
											?>
											</div>
										</div>
									<?php
										}
									?>
									
									<?php
										if(!empty($car_luggages))
										{
									?>
										<div class="one_fourth">
											<div class="car_attribute_icon ti-briefcase"></div>
											<div class="car_attribute_content">
												<?php
													echo intval($car_luggages);
												?>
											</div>
										</div>
									<?php
										}
									?>
									
									<?php
										if(!empty($car_transmission))
										{
									?>
										<div class="one_fourth">
											<div class="car_attribute_icon ti-panel"></div>
											<div class="car_attribute_content">
												<?php 
													echo ucfirst($car_transmission);
												?>
											</div>
										</div>
									<?php
										}
									?>
									
								</div><br class="clear"/>
							<?php
						    	}
						    ?>
        			    </div>
        			    <div class="car_attribute_price">
	        			    <?php
		        				//Get car price
								$car_price_day = get_post_meta($post->ID, 'car_price_day', true); 
								
								if(!empty($car_price_day))
								{   
		        			?>
		        			<div class="car_attribute_price_day three_cols">
		        				<?php echo grandcarrental_format_car_price($car_price_day); ?>
		        				<span class="car_unit_day"><?php esc_html_e('Per Day', 'grandcarrental' ); ?></span>
		        			</div>
		        			<?php
			        			}
			        		?>
        			    </div>
        			    <br class="clear"/>
				    </div>
			<?php
				}		
			?>
		</div>
	</div>
	<?php
		endwhile;
		else:
	?>
			<div class="car_search_noresult"><span class="ti-info-alt"></span><?php esc_html_e("We haven't found any car that matches you're criteria", 'grandcarrental'); ?></div>
	<?php
		endif;
	?>
		
	</div>
	<br class="clear"/>
	<?php
	    if($wp_query->max_num_pages > 1)
	    {
	    	if (function_exists("grandcarrental_pagination")) 
	    	{
	    	    grandcarrental_pagination($wp_query->max_num_pages);
	    	}
	    	else
	    	{
	    	?>
	    	    <div class="pagination"><p><?php posts_nav_link(' '); ?></p></div>
	    	<?php
	    	}
	    ?>
	    <div class="pagination_detail">
	     	<?php
	     		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	     	?>
	     	<?php esc_html_e('Page', 'grandcarrental' ); ?> <?php echo esc_html($paged); ?> <?php esc_html_e('of', 'grandcarrental' ); ?> <?php echo esc_html($wp_query->max_num_pages); ?>
	     </div>
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