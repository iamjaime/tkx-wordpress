<?php
//Get page ID
if(is_object($post))
{
    $obj_page = get_page($post->ID);
}
$current_page_id = '';

if(isset($obj_page->ID))
{
    $current_page_id = $obj_page->ID;
}
elseif(is_home())
{
    $current_page_id = get_option('page_on_front');
}
?>

<div class="header_style_wrapper">
<?php
	//Get top bar
	get_template_part("/templates/template-topbar");
	
	//Get Page Menu Transparent Option
	$page_menu_transparent = get_post_meta($current_page_id, 'page_menu_transparent', true);

    $pp_page_bg = '';
    //Get page featured image
    if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        $pp_page_bg = $image_thumb[0];
    }
    
   if(!empty($pp_page_bg) && basename($pp_page_bg)=='default.png')
    {
    	$pp_page_bg = '';
    }
	
	//Check if Woocommerce is installed	
	if(class_exists('Woocommerce') && grandcarrental_is_woocommerce_page())
	{
		$shop_page_id = get_option( 'woocommerce_shop_page_id' );
		$page_menu_transparent = get_post_meta($shop_page_id, 'page_menu_transparent', true);
	}
	
	if(is_single() && !empty($pp_page_bg) && !grandcarrental_is_woocommerce_page())
	{
	    $post_type = get_post_type();
	    
	    switch($post_type)
	    {
	    	case 'tour':
	    		$tg_tour_single_header = kirki_get_option('tg_tour_single_header');
		    	
	    		if(has_post_thumbnail($current_page_id, 'original') && !empty($tg_tour_single_header))
				{
	    			$page_menu_transparent = 1;
	    		}
	    	break;
	    	
	    	case 'post':
	    	case 'car':
	    		$post_menu_transparent = get_post_meta($current_page_id, 'post_menu_transparent', true);
	    	
				if(has_post_thumbnail($current_page_id, 'original') && !empty($post_menu_transparent))
				{
		    		$page_menu_transparent = 1;
		    	}
		    break;

			default:
	    		$page_menu_transparent = 0;	
	    	break;
	    }
	}
	else if(is_single() && empty($pp_page_bg) && !grandcarrental_is_woocommerce_page())
	{
		$page_menu_transparent = 0;	
	}
	
	if(is_search())
	{
	    $page_menu_transparent = 0;
	}
	
	if(is_404())
	{
	    $page_menu_transparent = 0;
	}
	
	$grandcarrental_homepage_style = grandcarrental_get_homepage_style();
	if($grandcarrental_homepage_style == 'fullscreen')
	{
	    $page_menu_transparent = 1;
	}
	
	if(!empty($term) && function_exists('z_taxonomy_image_url'))
	{
	    $pp_page_bg = z_taxonomy_image_url();
	 
		 if(!empty($pp_page_bg))
		 {
		 	$page_menu_transparent = 1;
		 }
	}
?>
<div class="top_bar <?php if(!empty($page_menu_transparent)) { ?>hasbg<?php } ?>">
    <div class="standard_wrapper">
    	<!-- Begin logo -->
    	<div id="logo_wrapper">
    	
    	<?php
    	    //get custom logo
    	    $tg_retina_logo = kirki_get_option('tg_retina_logo');

    	    if(!empty($tg_retina_logo))
    	    {	
    	    	//Get image width and height
		    	$image_id = grandcarrental_get_image_id($tg_retina_logo);
		    	if(!empty($image_id))
		    	{
		    		$obj_image = wp_get_attachment_image_src($image_id, 'original');
		    		
		    		$image_width = 0;
			    	$image_height = 0;
			    	
			    	if(isset($obj_image[1]))
			    	{
			    		$image_width = intval($obj_image[1]/2);
			    	}
			    	if(isset($obj_image[2]))
			    	{
			    		$image_height = intval($obj_image[2]/2);
			    	}
		    	}
		    	else
		    	{
			    	$image_width = 0;
			    	$image_height = 0;
		    	}
    	?>
    	<div id="logo_normal" class="logo_container">
    		<div class="logo_align">
	    	    <a id="custom_logo" class="logo_wrapper <?php if(!empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo esc_url(home_url('/')); ?>">
	    	    	<?php
						if($image_width > 0 && $image_height > 0)
						{
					?>
					<img src="<?php echo esc_url($tg_retina_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="<?php echo esc_attr($image_width); ?>" height="<?php echo esc_attr($image_height); ?>"/>
					<?php
						}
						else
						{
					?>
	    	    	<img src="<?php echo esc_url($tg_retina_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="175" height="24"/>
	    	    	<?php 
		    	    	}
		    	    ?>
	    	    </a>
    		</div>
    	</div>
    	<?php
    	    }
    	?>
    	
    	<?php
    		//get custom logo transparent
    	    $tg_retina_transparent_logo = kirki_get_option('tg_retina_transparent_logo');

    	    if(!empty($tg_retina_transparent_logo))
    	    {
    	    	//Get image width and height
		    	$image_id = grandcarrental_get_image_id($tg_retina_transparent_logo);
		    	$obj_image = wp_get_attachment_image_src($image_id, 'original');
		    	$image_width = 0;
		    	$image_height = 0;
		    	
		    	if(isset($obj_image[1]))
		    	{
		    		$image_width = intval($obj_image[1]/2);
		    	}
		    	if(isset($obj_image[2]))
		    	{
		    		$image_height = intval($obj_image[2]/2);
		    	}
    	?>
    	<div id="logo_transparent" class="logo_container">
    		<div class="logo_align">
	    	    <a id="custom_logo_transparent" class="logo_wrapper <?php if(empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo esc_url(home_url('/')); ?>">
	    	    	<?php
						if($image_width > 0 && $image_height > 0)
						{
					?>
					<img src="<?php echo esc_url($tg_retina_transparent_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="<?php echo esc_attr($image_width); ?>" height="<?php echo esc_attr($image_height); ?>"/>
					<?php
						}
						else
						{
					?>
	    	    	<img src="<?php echo esc_url($tg_retina_transparent_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="175" height="24"/>
	    	    	<?php 
		    	    	}
		    	    ?>
	    	    </a>
    		</div>
    	</div>
    	<?php
    	    }
    	?>
    	<!-- End logo -->
    	
        <div id="menu_wrapper">
	        <div id="nav_wrapper">
	        	<div class="nav_wrapper_inner">
	        		<div id="menu_border_wrapper">
	        			<?php 	
	        				//Check if has custom menu
	        				if(is_object($post) && $post->post_type == 'page')
	    					{
	    						$page_menu = get_post_meta($current_page_id, 'page_menu', true);
	    					}
	        			
	        				if(empty($page_menu))
	    					{
		    					if(!GRANDCARRENTAL_THEMEDEMO)
		    					{
		    						if ( has_nav_menu( 'primary-menu' ) ) 
		    						{
		    		    			    wp_nav_menu( 
		    		    			        	array( 
		    		    			        		'menu_id'			=> 'main_menu',
		    		    			        		'menu_class'		=> 'nav',
		    		    			        		'theme_location' 	=> 'primary-menu',
		    		    			        		'walker' => new grandcarrental_walker(),
		    		    			        	) 
		    		    			    ); 
		    		    			}
		    		    		}
		    		    		else
		    		    		{
			    		    		if ( has_nav_menu( 'demo-primary-menu' ) ) 
		    						{
		    		    			    wp_nav_menu( 
		    		    			        	array( 
		    		    			        		'menu_id'			=> 'main_menu',
		    		    			        		'menu_class'		=> 'nav',
		    		    			        		'theme_location' 	=> 'demo-primary-menu',
		    		    			        		'walker' => new grandcarrental_walker(),
		    		    			        	) 
		    		    			    ); 
		    		    			}
		    		    		}
	    	    			}
	    	    			else
	    				    {
	    				     	if( $page_menu && is_nav_menu( $page_menu ) ) {  
	    						    wp_nav_menu( 
	    						        array(
	    						            'menu' => $page_menu,
	    						            'walker' => new grandcarrental_walker(),
	    						            'menu_id'			=> 'main_menu',
	    		    			        	'menu_class'		=> 'nav',
	    						        )
	    						    );
	    						}
	    				    }
	        			?>
	        		</div>
	        		
	        		<!-- Begin right corner buttons -->
			    	<div id="logo_right_button">
						<!-- Begin side menu -->
						<a href="javascript:;" id="mobile_nav_icon"><span class="ti-menu"></span></a>
						<!-- End side menu -->
						
						<?php
						if (class_exists('Woocommerce')) {
						    //Check if display cart in header
						
						    $woocommerce = grandcarrental_get_woocommerce();
						    $cart_url = $woocommerce->cart->get_cart_url();
						    $cart_count = $woocommerce->cart->cart_contents_count;
						?>
						<div class="header_cart_wrapper">
							<?php
								if($cart_count > 0)	
								{
							?>
						    	<div class="cart_count"><?php echo esc_html($cart_count); ?></div>
						    <?php
							    }
							?>
						    <a href="<?php echo esc_url($cart_url); ?>" title="<?php esc_html_e('View Cart', 'grandcarrental' ); ?>"><span class="ti-shopping-cart"></span></a>
						</div>
						<?php
						}
						?>
						
			    	</div>
			    	<!-- End right corner buttons -->
	        		
	        		<div id="menu_border_wrapper_right">
	        			<?php 	
	        				if(empty($page_menu))
	    					{
	    						if ( has_nav_menu( 'secondary-menu' ) ) 
	    						{
	    		    			    wp_nav_menu( 
	    		    			        	array( 
	    		    			        		'menu_id'			=> 'main_right_menu',
	    		    			        		'menu_class'		=> 'nav',
	    		    			        		'theme_location' 	=> 'secondary-menu',
	    		    			        		'walker' => new grandcarrental_walker(),
	    		    			        	) 
	    		    			    ); 
	    		    			}
	    	    			}
	    	    			else
	    				    {
	    				     	if( $page_menu && is_nav_menu( $page_menu ) ) {  
	    						    wp_nav_menu( 
	    						        array(
	    						            'menu' => $page_menu,
	    						            'walker' => new grandcarrental_walker(),
	    						            'menu_id'			=> 'main_right_menu',
	    		    			        	'menu_class'		=> 'nav',
	    						        )
	    						    );
	    						}
	    				    }
	        			?>
	        		</div>
	        	</div>
	        </div>
	        <!-- End main nav -->
        </div>
        
    	</div>
		</div>
    </div>
</div>
