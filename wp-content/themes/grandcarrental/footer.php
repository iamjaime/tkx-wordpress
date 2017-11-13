<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
 
?>

<?php
$tg_car_recently_view = kirki_get_option('tg_car_recently_view');
    
if(!empty($tg_car_recently_view))
 {
	$recently_view_cars = grandcarrental_get_recently_view_cars();
	
	if(!empty($recently_view_cars) && is_array($recently_view_cars))
	{
 ?>
 	<br class="clear"/>
  	<div class="car_recently_view">
	  	
	<div class="standard_wrapper">
		
	<h3 class="sub_title"><?php echo esc_html_e('Recently View Cars', 'grandcarrental' ); ?></h3>
	
	<div id="portfolio_filter_wrapper" class="gallery grid four_cols portfolio-content section content clearfix" data-columns="4">
    <?php
	    $count_car = 1;
		foreach($recently_view_cars as $key => $recently_view_car)
		{
	       	$image_url = '';
			$car_ID = $recently_view_car;
					
			if(has_post_thumbnail($car_ID, 'grandcarrental-gallery-grid'))
			{
			    $image_id = get_post_thumbnail_id($car_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'grandcarrental-gallery-grid', true);
			}
			
			$permalink_url = get_permalink($car_ID);
			
			if(isset($small_image_url[0]))
			{
    ?>
    <div class="element grid classic4_cols animated<?php echo esc_attr($key+1); ?>">
	
		<div class="one_fourth gallery4 grid static filterable portfolio_type themeborder" data-id="post-<?php echo esc_attr($key+1); ?>" style="background-image:url(<?php echo esc_url($small_image_url[0]); ?>);">	
			<a class="car_image" href="<?php echo esc_url($permalink_url); ?>"></a>	
			<div class="portfolio_info_wrapper">
				<?php
					//Get car price
					$car_price = get_post_meta($car_ID, 'car_price', true);
					
					if(!empty($car_price))
					{
						
				?>
				<div class="car_price">
					<?php echo esc_html(grandcarrental_format_car_price($car_price)); ?>
				</div>
				<?php
					}
				?>
        	    <div class="car_attribute_wrapper">
	        	    <h5><?php echo get_the_title($car_ID); ?></h5>
        	    </div>
        	    <div class="car_attribute_price">
	        	<?php
		         	//Get car price
				 	$car_price_day = get_post_meta($car_ID, 'car_price_day', true); 
				 	
				 	if(!empty($car_price_day))
				 	{   
		         ?>
		         <div class="car_attribute_price_day four_cols">
		         	<?php echo grandcarrental_format_car_price($car_price_day); ?>
		         	<span class="car_unit_day"><?php esc_html_e('Per Day', 'grandcarrental' ); ?></span>
		         </div>
		         <?php
			     	}
			     ?>
        		</div>
        	    <br class="clear"/>
			</div>
		</div>
	</div>
    <?php
	    	$count_car++;
	    	
	    	if($count_car > 4)
	    	{
		    	break;
	    	}
	    	
	    	}
	 	}
    ?>
    </div>
  	</div>
  	</div>
<?php
  	}
} //end if show recently view cars
?>

<?php
	//Check if blank template
	$grandcarrental_is_no_header = grandcarrental_get_is_no_header();
	$grandcarrental_screen_class = grandcarrental_get_screen_class();
	
	if(!is_bool($grandcarrental_is_no_header) OR !$grandcarrental_is_no_header)
	{

	$grandcarrental_homepage_style = grandcarrental_get_homepage_style();
	
	$tg_footer_sidebar = kirki_get_option('tg_footer_sidebar');
?>

<?php
    if(!empty($tg_footer_sidebar) && $grandcarrental_homepage_style != 'fullscreen' && $grandcarrental_homepage_style != 'fullscreen_white' && $grandcarrental_homepage_style != 'split')
    {
    	$footer_class = '';
    	
    	switch($tg_footer_sidebar)
    	{
    		case 1:
    			$footer_class = 'one';
    		break;
    		case 2:
    			$footer_class = 'two';
    		break;
    		case 3:
    			$footer_class = 'three';
    		break;
    		case 4:
    			$footer_class = 'four';
    		break;
    		default:
    			$footer_class = 'four';
    		break;
    	}
?>
<div id="footer" class="<?php if(isset($grandcarrental_homepage_style) && !empty($grandcarrental_homepage_style)) { echo esc_attr($grandcarrental_homepage_style); } ?> <?php if(!empty($grandcarrental_screen_class)) { echo esc_attr($grandcarrental_screen_class); } ?>">

<?php
	if(is_active_sidebar('Footer Sidebar')) 
	{
?>
	<ul class="sidebar_widget <?php echo esc_attr($footer_class); ?>">
	    <?php dynamic_sidebar('Footer Sidebar'); ?>
	</ul>
<?php
	}
?>
</div>
<?php
    }
?>

<?php	
	//If display photostream
	$pp_photostream = get_option('pp_photostream');
	if(GRANDCARRENTAL_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
	{
		$pp_photostream = 0;
	}

	if(!empty($pp_photostream) && $grandcarrental_homepage_style != 'fullscreen' && $grandcarrental_homepage_style != 'fullscreen_white' && $grandcarrental_homepage_style != 'split')
	{
		$photos_arr = array();
	
		if($pp_photostream == 'flickr')
		{
			$pp_flickr_id = get_option('pp_flickr_id');
			$photos_arr = grandcarrental_get_flickr(array('type' => 'user', 'id' => $pp_flickr_id, 'items' => 30));
		}
		else
		{
			$pp_instagram_username = get_option('pp_instagram_username');
			$pp_instagram_access_token = get_option('pp_instagram_access_token');
			$photos_arr = grandcarrental_get_instagram($pp_instagram_username, $pp_instagram_access_token, 30);
		}
		
		if(!empty($photos_arr) && $grandcarrental_screen_class != 'split' && $grandcarrental_screen_class != 'split wide' && $grandcarrental_homepage_style != 'fullscreen' && $grandcarrental_homepage_style != 'flow')
		{
?>
<br class="clear"/>
<div id="footer_photostream" class="footer_photostream_wrapper ri-grid ri-grid-size-3">
	<ul>
		<?php
			foreach($photos_arr as $photo)
			{
		?>
			<li><a target="_blank" href="<?php echo esc_url($photo['link']); ?>"><img src="<?php echo esc_url($photo['thumb_url']); ?>" alt="" /></a></li>
		<?php
			}
		?>
	</ul>
</div>
<?php
		}
	}
?>

<?php
if($grandcarrental_homepage_style != 'fullscreen' && $grandcarrental_homepage_style != 'fullscreen_white' && $grandcarrental_homepage_style != 'split')
{
	//Get Footer Sidebar
	$tg_footer_sidebar = kirki_get_option('tg_footer_sidebar');
	if(GRANDCARRENTAL_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
	{
	    $tg_footer_sidebar = 0;
	}
?>
<div class="footer_bar <?php if(isset($grandcarrental_homepage_style) && !empty($grandcarrental_homepage_style)) { echo esc_attr($grandcarrental_homepage_style); } ?> <?php if(!empty($grandcarrental_screen_class)) { echo esc_attr($grandcarrental_screen_class); } ?> <?php if(empty($tg_footer_sidebar)) { ?>noborder<?php } ?>">

	<div class="footer_bar_wrapper <?php if(isset($grandcarrental_homepage_style) && !empty($grandcarrental_homepage_style)) { echo esc_attr($grandcarrental_homepage_style); } ?>">
		<?php
			//Check if display social icons or footer menu
			$tg_footer_copyright_right_area = kirki_get_option('tg_footer_copyright_right_area');
			
			if($tg_footer_copyright_right_area=='social')
			{
				if($grandcarrental_homepage_style!='flow' && $grandcarrental_homepage_style!='fullscreen' && $grandcarrental_homepage_style!='carousel' && $grandcarrental_homepage_style!='flip' && $grandcarrental_homepage_style!='fullscreen_video')
				{	
					//Check if open link in new window
					$tg_footer_social_link = kirki_get_option('tg_footer_social_link');
			?>
			<div class="social_wrapper">
			    <ul>
			    	<?php
			    		$pp_facebook_url = get_option('pp_facebook_url');
			    		
			    		if(!empty($pp_facebook_url))
			    		{
			    	?>
			    	<li class="facebook"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="<?php echo esc_url($pp_facebook_url); ?>"><i class="fa fa-facebook-official"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_twitter_username = get_option('pp_twitter_username');
			    		
			    		if(!empty($pp_twitter_username))
			    		{
			    	?>
			    	<li class="twitter"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="<?php echo esc_url('http://twitter.com/'.$pp_twitter_username); ?>"><i class="fa fa-twitter"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_flickr_username = get_option('pp_flickr_username');
			    		
			    		if(!empty($pp_flickr_username))
			    		{
			    	?>
			    	<li class="flickr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Flickr" href="<?php echo esc_url('http://flickr.com/people/'.$pp_flickr_username); ?>"><i class="fa fa-flickr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_youtube_url = get_option('pp_youtube_url');
			    		
			    		if(!empty($pp_youtube_url))
			    		{
			    	?>
			    	<li class="youtube"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Youtube" href="<?php echo esc_url($pp_youtube_url); ?>"><i class="fa fa-youtube"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_vimeo_username = get_option('pp_vimeo_username');
			    		
			    		if(!empty($pp_vimeo_username))
			    		{
			    	?>
			    	<li class="vimeo"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Vimeo" href="<?php echo esc_url('http://vimeo.com/'.$pp_vimeo_username); ?>"><i class="fa fa-vimeo-square"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_tumblr_username = get_option('pp_tumblr_username');
			    		
			    		if(!empty($pp_tumblr_username))
			    		{
			    	?>
			    	<li class="tumblr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Tumblr" href="<?php echo esc_url('http://'.$pp_tumblr_username.'.tumblr.com'); ?>"><i class="fa fa-tumblr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_google_url = get_option('pp_google_url');
			    		
			    		if(!empty($pp_google_url))
			    		{
			    	?>
			    	<li class="google"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Google+" href="<?php echo esc_url($pp_google_url); ?>"><i class="fa fa-google-plus"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_dribbble_username = get_option('pp_dribbble_username');
			    		
			    		if(!empty($pp_dribbble_username))
			    		{
			    	?>
			    	<li class="dribbble"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Dribbble" href="<?php echo esc_url('http://dribbble.com/'.$pp_dribbble_username); ?>"><i class="fa fa-dribbble"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_linkedin_url = get_option('pp_linkedin_url');
			    		
			    		if(!empty($pp_linkedin_url))
			    		{
			    	?>
			    	<li class="linkedin"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Linkedin" href="<?php echo esc_url($pp_linkedin_url); ?>"><i class="fa fa-linkedin"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			            $pp_pinterest_username = get_option('pp_pinterest_username');
			            
			            if(!empty($pp_pinterest_username))
			            {
			        ?>
			        <li class="pinterest"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Pinterest" href="<?php echo esc_url('http://pinterest.com/'.$pp_pinterest_username); ?>"><i class="fa fa-pinterest"></i></a></li>
			        <?php
			            }
			        ?>
			        <?php
			        	$pp_instagram_username = get_option('pp_instagram_username');
			        	
			        	if(!empty($pp_instagram_username))
			        	{
			        ?>
			        <li class="instagram"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Instagram" href="<?php echo esc_url('http://instagram.com/'.$pp_instagram_username); ?>"><i class="fa fa-instagram"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
			        	$pp_behance_username = get_option('pp_behance_username');
			        	
			        	if(!empty($pp_behance_username))
			        	{
			        ?>
			        <li class="behance"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Behance" href="<?php echo esc_url('http://behance.net/'.$pp_behance_username); ?>"><i class="fa fa-behance-square"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
					    $pp_500px_url = get_option('pp_500px_url');
					    
					    if(!empty($pp_500px_url))
					    {
					?>
					<li class="500px"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="500px" href="<?php echo esc_url($pp_500px_url); ?>"><i class="fa fa-500px"></i></a></li>
					<?php
					    }
					?>
			    </ul>
			</div>
		<?php
				}
			} //End if display social icons
			else
			{
				if ( has_nav_menu( 'footer-menu' ) ) 
			    {
				    wp_nav_menu( 
				        	array( 
				        		'menu_id'			=> 'footer_menu',
				        		'menu_class'		=> 'footer_nav',
				        		'theme_location' 	=> 'footer-menu',
				        	) 
				    ); 
				}
			}
		?>
	    <?php
	    	//Display copyright text
	        $tg_footer_copyright_text = kirki_get_option('tg_footer_copyright_text');

	        if(!empty($tg_footer_copyright_text))
	        {
	        	echo '<div id="copyright">'.wp_kses_post(htmlspecialchars_decode($tg_footer_copyright_text)).'</div><br class="clear"/>';
	        }
	    ?>
	    
	    <?php
	    	//Check if display to top button
	    	$tg_footer_copyright_totop = kirki_get_option('tg_footer_copyright_totop');
	    	
	    	if(!empty($tg_footer_copyright_totop))
	    	{
	    ?>
	    	<a id="toTop" href="javascript:;"><i class="fa fa-angle-up"></i></a>
	    <?php
	    	}
	    ?>
	</div>
</div>
<?php
}
?>
</div>

<?php
    } //End if not blank template
?>

<div id="side_menu_wrapper" class="overlay_background">
	<a id="close_share" href="javascript:;"><span class="ti-close"></span></a>
	<?php
		if(is_single())
		{
	?>
	<div id="fullscreen_share_wrapper">
		<div class="fullscreen_share_content">
		<?php
			get_template_part("/templates/template-share");
		?>
		</div>
	</div>
	<?php
		}
	?>
</div>

<?php
    //Check if theme demo then enable layout switcher
    if(GRANDCARRENTAL_THEMEDEMO)
    {	
	    if(isset($_GET['styling']) && !empty($_GET['styling']) && file_exists(get_template_directory()."/cache/".$_GET['styling'].".css"))
	    {
		    wp_enqueue_style("grandcarrental-demo-styling", get_template_directory_uri()."/cache/".$_GET['styling'].".css", false, "", "all");
	    }
	    
	    $customizer_styling_arr = array( 
			array('id'	=>	'red', 'title' => 'Red', 'code' => '#FF3B30'),
			array('id'	=>	'orange', 'title' => 'Orange', 'code' => '#FF9500'),
			array('id'	=>	'yellow', 'title' => 'Yellow', 'code' => '#FFCC00'),
			array('id'	=>	'green', 'title' => 'Green', 'code' => '#04dbc0'),
			array('id'	=>	'teal_blue', 'title' => 'Teal Blue', 'code' => '#5AC8FA'),
			array('id'	=>	'blue', 'title' => 'Blue', 'code' => '#007AFF'),
			array('id'	=>	'purple', 'title' => 'Purple', 'code' => '#5856D6'),
			array('id'	=>	'pink', 'title' => 'Pink', 'code' => '#FF2D55'),
		);
?>
    <div id="option_wrapper">
    <div class="inner">
    	<div style="text-align:center">
	    	<h6>Predefined Colors</h6>
	    	<p>
	    	Here are predefined colors stylings that can be imported in one click and you can also customised yours.</p>
	    	<ul class="demo_color_list">
		    	<?php
			    	foreach($customizer_styling_arr as $customizer_styling)
					{
				?>
	    		<li>
	        		<div class="item_content_wrapper">
						<div class="item_content">
							<a href="<?php echo esc_url(home_url('/?styling='.$customizer_styling['id'])); ?>">
					    		<div class="item_thumb" style="background:<?php echo esc_attr($customizer_styling['code']); ?>"></div>
							</a>
						</div>
					</div>		   
	    		</li>
	    		<?php
		    		}
		    	?>
	    	</ul>
	    	<h6>Predefined Stylings</h6>
	    	<p>
	    		Here are example styling that can be imported with one click.
	    	</p>
	    	<?php
	    		$customizer_styling_arr = array( 
					array(
						'id'	=>	'styling1', 
						'title' => 'Left Align Menu', 
						'url' => 'http://themes.themegoods.com/grandcarrental/demo/'
					),
					array(
						'id'	=>	'styling2', 
						'title' => 'Center Align', 
						'url' => 'http://themes.themegoods.com/grandcarrental/demo/?menulayout=centeralign'
					),
					array(
						'id'	=>	'styling3', 
						'title' => 'Center Logo + 2 Menus', 
						'url' => 'http://themes.themegoods.com/grandcarrental/demo/?menulayout=centeralogo'
					),
					array(
						'id'	=>	'styling4', 
						'title' => 'Fullscreen Menu', 
						'url' => 'http://themes.themegoods.com/grandcarrental/demo/?menulayout=hammenufull'
					),
					array(
						'id'	=>	'styling5', 
						'title' => 'Side Menu', 
						'url' => 'http://themes.themegoods.com/grandcarrental/demo/?menulayout=hammenuside'
					),
					array(
						'id'	=>	'styling6', 
						'title' => 'With Frame', 
						'url' => 'http://themes.themegoods.com/grandcarrental/demo/?frame=1'
					),
					array(
						'id'	=>	'styling7', 
						'title' => 'Boxed Layout', 
						'url' => 'http://themes.themegoods.com/grandcarrental/demo/?boxed=1'
					),
					array(
						'id'	=>	'styling8', 
						'title' => 'With Top Bar', 
						'url' => 'http://themes.themegoods.com/grandcarrental/demo/?topbar=1'
					),
				);
	    	?>
	    	<ul class="demo_list">
	    		<?php
	    			foreach($customizer_styling_arr as $customizer_styling)
	    			{
	    		?>
	    		<li>
	        		<img src="<?php echo get_template_directory_uri(); ?>/cache/demos/customizer/screenshots/<?php echo esc_html($customizer_styling['id']); ?>.jpg" alt=""/>
	        		<div class="demo_thumb_hover_wrapper">
	        		    <div class="demo_thumb_hover_inner">
	        		    	<div class="demo_thumb_desc">
	    	    	    		<h6><?php echo esc_html($customizer_styling['title']); ?></h6>
	    	    	    		<a href="<?php echo esc_url($customizer_styling['url']); ?>" target="_blank" class="button white">Launch</a>
	        		    	</div> 
	        		    </div>	   
	        		</div>		   
	    		</li>
	    		<?php
	    			}
	    		?>
	    	</ul>
    	</div>
    </div>
    </div>
    <div id="option_btn">
    	<a href="javascript:;" class="demotip" title="Choose Theme Styling"><span class="ti-settings"></span></a>
    	
    	<a href="https://themegoods.theme-demo.net/grandcarrentallimousinecarrentalwordpress" class="demotip" title="Try Before You Buy" target="_blank"><span class="ti-pencil-alt"></span></a>
    	
    	<a href="http://themes.themegoods.com/grandcarrental/doc" class="demotip" title="Theme Documentation" target="_blank"><span class="ti-book"></span></a>
    	
    	<a href="https://themeforest.net/item/grand-car-rental-limousine-car-rental-wordpress/19398136?ref=ThemeGoods&license=regular&open_purchase_for_item_id=19398136&purchasable=source&ref=ThemeGoods" title="Purchase Theme" class="demotip" target="_blank"><span class="ti-shopping-cart"></span></a>
    </div>
<?php
    	wp_enqueue_script("grandcarrental-jquery-cookie", get_template_directory_uri()."/js/jquery.cookie.js", false, GRANDCARRENTAL_THEMEVERSION, true);
    	wp_enqueue_script("grandcarrental-script-demo", admin_url('admin-ajax.php')."?action=grandcarrental_script_demo", false, GRANDCARRENTAL_THEMEVERSION, true);
    }
?>

<?php
    $tg_frame = kirki_get_option('tg_frame');
    if(GRANDCARRENTAL_THEMEDEMO && isset($_GET['frame']) && !empty($_GET['frame']))
    {
	    $tg_frame = 1;
    }
    
    if(!empty($tg_frame))
    {
    	wp_enqueue_style("tg_frame", get_template_directory_uri()."/css/tg_frame.css", false, GRANDCARRENTAL_THEMEVERSION, "all");
?>
    <div class="frame_top"></div>
    <div class="frame_bottom"></div>
    <div class="frame_left"></div>
    <div class="frame_right"></div>
<?php
    }
?>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
