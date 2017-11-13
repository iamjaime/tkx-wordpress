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

$grandcarrental_topbar = grandcarrental_get_topbar();
$grandcarrental_screen_class = grandcarrental_get_screen_class();
$grandcarrental_page_content_class = grandcarrental_get_page_content_class();

$pp_page_bg = '';
	
//Get page featured image
if(has_post_thumbnail($current_page_id, 'original') && empty($term))
{
    $image_id = get_post_thumbnail_id($current_page_id); 
    $image_thumb = wp_get_attachment_image_src($image_id, 'original', true);
    
    if(isset($image_thumb[0]) && !empty($image_thumb[0]))
    {
    	$pp_page_bg = $image_thumb[0];
    }
}

 //Check if add parallax effect
$tg_page_header_bg_parallax = kirki_get_option('tg_page_header_bg_parallax');
?>

<div id="page_caption" class="<?php if(!empty($pp_page_bg)) { ?>hasbg <?php if(!empty($tg_page_header_bg_parallax)) { ?>parallax<?php } ?> <?php } ?> <?php if(!empty($grandcarrental_topbar)) { ?>withtopbar<?php } ?> <?php if(!empty($grandcarrental_screen_class)) { echo esc_attr($grandcarrental_screen_class); } ?> <?php if(!empty($grandcarrental_page_content_class)) { echo esc_attr($grandcarrental_page_content_class); } ?>" <?php if(!empty($pp_page_bg)) { ?>style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"<?php } ?>>

	<div class="page_title_wrapper">
		<div class="page_title_inner">
			<div class="page_title_content">
				<h1><?php the_title(); ?></h1>
				<div class="post_detail single_post">
					<span class="post_info_date">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo date_i18n(GRANDCARRENTAL_THEMEDATEFORMAT, get_the_time('U')); ?></a>
					</span>
					<span class="post_info_comment">
						•
						<a href="<?php comments_link(); ?>">
							<?php 
								$post_comment_number = get_comments_number();
								echo intval($post_comment_number).'&nbsp;';
								
								if($post_comment_number <= 1)
								{
				    				echo esc_html_e('Comment', 'grandcarrental' );
								}
								else
								{
				    				echo esc_html_e('Comments', 'grandcarrental' );
								}
							?>
						</a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Begin content -->
<?php
$grandcarrental_page_content_class = grandcarrental_get_page_content_class();
?>
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg <?php } ?><?php if(!empty($pp_page_bg) && !empty($grandcarrental_topbar)) { ?>withtopbar <?php } ?><?php if(!empty($grandcarrental_page_content_class)) { echo esc_attr($grandcarrental_page_content_class); } ?>">