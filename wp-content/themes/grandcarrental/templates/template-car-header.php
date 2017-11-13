<?php
/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/

if(!isset($current_page_id) && isset($page->ID))
{
    $current_page_id = $page->ID;
}

//Get page header display setting
$page_title = get_the_title();
$page_menu_transparent = 0;

$tg_car_single_header = kirki_get_option('tg_car_single_header');

if(has_post_thumbnail($current_page_id, 'original') && !empty($tg_car_single_header))
{
	$pp_page_bg = '';
	
	//Get page featured image
	$image_id = get_post_thumbnail_id($current_page_id); 
    $image_thumb = wp_get_attachment_image_src($image_id, 'original', true);
    
    if(isset($image_thumb[0]) && !empty($image_thumb[0]))
    {
    	$pp_page_bg = $image_thumb[0];
    	$page_menu_transparent = 1;
    }
    
    $grandcarrental_topbar = grandcarrental_get_topbar();
	$grandcarrental_screen_class = grandcarrental_get_screen_class();
	
	//Get header featured content
	$car_header_type = get_post_meta(get_the_ID(), 'car_header_type', true);
	
	$video_url = '';
				
	if($car_header_type == 'Youtube Video' OR $car_header_type == 'Vimeo Video')
	{
		//Add jarallax video script
		wp_enqueue_script("jarallax-video", get_template_directory_uri()."/js/jarallax-video.js", false, GRANDCARRENTAL_THEMEVERSION, true);
		
		if($car_header_type == 'Youtube Video')
		{
			$car_header_youtube = get_post_meta(get_the_ID(), 'car_header_youtube', true);
			$video_url = 'https://www.youtube.com/watch?v='.$car_header_youtube;
		}
		else
		{
			$car_header_vimeo = get_post_meta(get_the_ID(), 'car_header_vimeo', true);
			$video_url = 'https://vimeo.com/'.$car_header_vimeo;
		}
	}
?>
<div id="page_caption" class="<?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if($car_header_type == 'Youtube Video' OR $car_header_type == 'Vimeo Video') { ?>parallax<?php } ?> <?php if(!empty($grandcarrental_topbar)) { ?>withtopbar<?php } ?> <?php if(!empty($grandcarrental_screen_class)) { ?>split<?php } ?>" <?php if(!empty($pp_page_bg)) { ?>style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"<?php } ?> <?php if($car_header_type == 'Youtube Video' OR $car_header_type == 'Vimeo Video') { ?>data-jarallax-video="<?php echo esc_url($video_url); ?>"<?php } ?>>
	
	<div class="single_car_header_button">
		<div class="standard_wrapper">
			<?php
				//Get car gallery
				$car_gallery = get_post_meta($current_page_id, 'car_gallery', true);
				
				if(!empty($car_gallery))
				{
					//Get gallery images
					$all_photo_arr = get_post_meta($car_gallery, 'wpsimplegallery_gallery', true);
					
					$image_url = '';
					if(isset($all_photo_arr[0]) && !empty($all_photo_arr[0]))
					{
						$image_url = wp_get_attachment_image_src($all_photo_arr[0], 'original', true);
					}
			?>
			<a href="<?php echo esc_url($image_url[0]); ?>" id="single_car_gallery_open" class="button fancy-gallery"><span class="ti-camera"></span><?php esc_html_e('View Photos', 'grandcarrental' ); ?></a>
			<div style="display:none;">
				<?php
				if(!empty($all_photo_arr))
				{
					foreach($all_photo_arr as $key => $photo_id)
					{
						if($key > 0)
						{
					        $image_url = '';
					        
					        if(!empty($photo_id))
					        {
					        	$image_url = wp_get_attachment_image_src($photo_id, 'original', true);
					        }
					        
					        //Get image meta data
							$image_caption = get_post_field('post_excerpt', $photo_id);
				?>
				 <a id="single_car_gallery_image<?php echo esc_attr($key); ?>" href="<?php echo esc_url($image_url[0]); ?>" title="<?php echo esc_attr($image_caption); ?>" class="fancy-gallery"></a>
				<?php	
						}	
					}
				}
				?>
			</div>
			<?php		
				}
			?>
			
			<?php
				//Get tour video review
				$car_video_review = get_post_meta($current_page_id, 'car_video_review', true);
				
				if(!empty($car_video_review))
				{
			?>
			<a href="#video_review<?php echo esc_attr($current_page_id); ?>" id="single_car_video_review_open" class="button" data-type="inline"><span class="ti-control-play"></span><?php esc_html_e('Video Review', 'grandcarrental' ); ?></a>
			
			<div id="video_review<?php echo esc_attr($current_page_id); ?>" class="car_video_review_wrapper" style="display:none;"><?php echo $car_video_review; ?></div>
			<?php
				}
			?>
		</div>
	</div>
	
	<div class="single_car_header_content">
		<div class="standard_wrapper">
			<?php
				//Get car price
				$car_price_day = get_post_meta($current_page_id, 'car_price_day', true);
				$car_price_hour = get_post_meta($current_page_id, 'car_price_hour', true);
				$car_price_airport = get_post_meta($current_page_id, 'car_price_airport', true);
				
				if(!empty($car_price_day) OR !empty($car_price_hour) OR !empty($car_price_airport))
				{
			?>
			<div class="single_car_header_price">
				<?php
					if(empty($car_price_day))
					{
						$car_price_day = $car_price_hour;
						$default_price_unit = esc_html__('Per Hour', 'grandcarrental' );
					}
					else
					{
						$default_price_unit = esc_html__('Per Day', 'grandcarrental' );
					}
				?>
				<span id="single_car_price"><?php echo grandcarrental_format_car_price($car_price_day); ?></span>
				<span id="single_car_price_per_unit_change" class="single_car_price_per_unit">
					<span id="single_car_unit"><?php echo esc_attr($default_price_unit); ?></span>
					<span class="ti-angle-down"></span>
					
					<ul id="price_per_unit_select">
						<li class="icon arrow"></li>
						<?php
							if(!empty($car_price_day))
							{
						?>
						<li class="active">
							<a class="active" href="javascript:;" data-filter="car_price_day" data-price="<?php echo esc_attr(grandcarrental_format_car_price($car_price_day)); ?>"><?php esc_html_e('Per Day', 'grandcarrental' ); ?></a>
						</li>
						<?php
							}
						?>
						<?php
							if(!empty($car_price_hour))
							{
						?>
						<li>
							<a class="active" href="javascript:;" data-filter="car_price_hour" data-price="<?php echo esc_attr(grandcarrental_format_car_price($car_price_hour)); ?>"><?php esc_html_e('Per Hour', 'grandcarrental' ); ?></a>
						</li>
						<?php
							}
						?>
						<?php
							if(!empty($car_price_airport))
							{
						?>
						<li>
							<a class="active" href="javascript:;" data-filter="car_price_airport" data-price="<?php echo esc_attr(grandcarrental_format_car_price($car_price_airport)); ?>"><?php esc_html_e('Airport Transfer', 'grandcarrental' ); ?></a>
						</li>
						<?php
							}
						?>
					</ul>
				</span>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</div>
<?php
}
?>

<!-- Begin content -->
<?php
	$grandcarrental_page_content_class = grandcarrental_get_page_content_class();
?>
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg <?php } ?><?php if(!empty($pp_page_bg) && !empty($grandcarrental_topbar)) { ?>withtopbar <?php } ?><?php if(!empty($grandcarrental_page_content_class)) { echo esc_attr($grandcarrental_page_content_class); } ?>">