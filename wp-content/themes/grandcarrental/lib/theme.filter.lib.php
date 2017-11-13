<?php
function grandcarrental_tag_cloud_filter($args = array()) {
   $args['smallest'] = 13;
   $args['largest'] = 13;
   $args['unit'] = 'px';
   return $args;
}

add_filter('widget_tag_cloud_args', 'grandcarrental_tag_cloud_filter', 90);

//Control post excerpt length
function grandcarrental_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'grandcarrental_custom_excerpt_length', 200 );

// remove version query string from scripts and stylesheets
function grandcarrental_remove_script_styles_version( $src ){
    return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'grandcarrental_remove_script_styles_version' );
add_filter( 'style_loader_src', 'grandcarrental_remove_script_styles_version' );


function grandcarrental_theme_queue_js(){
  if (!is_admin()){
    if (!is_page() AND is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
}
add_action('get_header', 'grandcarrental_theme_queue_js');


function grandcarrental_add_meta_tags() {
    $post = grandcarrental_get_wp_post();
    
    echo '<meta charset="'.get_bloginfo( 'charset' ).'" />';
    
    //Check if responsive layout is enabled
    $tg_mobile_responsive = kirki_get_option('tg_mobile_responsive');
	
	if(!empty($tg_mobile_responsive))
	{
		echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
	}
	
	//meta for phone number link on mobile
	echo '<meta name="format-detection" content="telephone=no">';
    
    //check if single post then add meta description and keywords
    if (is_single()) 
    {
        //Prepare data for Facebook opengraph sharing
        if(has_post_thumbnail(get_the_ID(), 'grandcarrental-blog'))
		{
		    $image_id = get_post_thumbnail_id(get_the_ID());
		    $fb_thumb = wp_get_attachment_image_src($image_id, 'grandcarrental-blog', true);
		}
	
		if(isset($fb_thumb[0]) && !empty($fb_thumb[0]))
		{
			$post_content = get_post_field('post_excerpt', $post->ID);
			
			echo '<meta property="og:type" content="article" />';
			echo '<meta property="og:image" content="'.esc_url($fb_thumb[0]).'"/>';
			echo '<meta property="og:title" content="'.esc_attr(get_the_title()).'"/>';
			echo '<meta property="og:url" content="'.esc_url(get_permalink($post->ID)).'"/>';
			echo '<meta property="og:description" content="'.esc_attr(strip_tags($post_content)).'"/>';
		}
    }
}
add_action( 'wp_head', 'grandcarrental_add_meta_tags' , 2 );

function grandcarrental_body_class_names($classes) {

	if(is_page())
	{
		$tg_post = grandcarrental_get_wp_post();
		$ppb_enable = get_post_meta($tg_post->ID, 'ppb_enable', true);
		if(!empty($ppb_enable))
		{
			$classes[] = 'ppb_enable';
		}
	}
	
	//Check if boxed layout is enable
	$tg_boxed = kirki_get_option('tg_boxed');
	if((GRANDCARRENTAL_THEMEDEMO && isset($_GET['boxed']) && !empty($_GET['boxed'])) OR !empty($tg_boxed))
	{
		$classes[] = esc_attr('tg_boxed');
	}

	return $classes;
}

//Now add test class to the filter
add_filter('body_class','grandcarrental_body_class_names');

add_filter('redirect_canonical','custom_disable_redirect_canonical');
function custom_disable_redirect_canonical($redirect_url) {if (is_paged() && is_singular()) $redirect_url = false; return $redirect_url; }

add_action( 'admin_enqueue_scripts', 'grandcarrental_admin_pointers_header' );

function grandcarrental_admin_pointers_header() {
   if ( grandcarrental_admin_pointers_check() ) {
      add_action( 'admin_print_footer_scripts', 'grandcarrental_admin_pointers_footer' );

      wp_enqueue_script( 'wp-pointer' );
      wp_enqueue_style( 'wp-pointer' );
   }
}

function grandcarrental_admin_pointers_check() {
   $admin_pointers = grandcarrental_admin_pointers();
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] )
         return true;
   }
}

function grandcarrental_admin_pointers_footer() {
   $admin_pointers = grandcarrental_admin_pointers();
   ?>
<script type="text/javascript">
/* <![CDATA[ */
( function($) {
   <?php
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] ) {
         ?>
         $( '<?php echo esc_js($array['anchor_id']); ?>' ).pointer( {
            content: '<?php echo $array['content']; ?>',
            position: {
            edge: '<?php echo esc_js($array['edge']); ?>',
            align: '<?php echo esc_js($array['align']); ?>'
         },
            close: function() {
               $.post( ajaxurl, {
                  pointer: '<?php echo esc_js($pointer); ?>',
                  action: 'dismiss-wp-pointer'
               } );
            }
         } ).pointer( 'open' );
         <?php
      }
   }
   ?>
} )(jQuery);
/* ]]> */
</script>
   <?php
}

function grandcarrental_admin_pointers() {
   $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
   $prefix = 'grandcarrental_admin_pointers';

   //Page help pointers
   $content_builder_content = '<h3>Content Builder</h3>';
   $content_builder_content .= '<p>Basically you can use WordPress visual editor to create page content but theme also has another way to create page content. By using Content Builder, you would be ale to drag&drop each content block without coding knowledge. Click here to enable Content Builder.</p>';
   
   $page_options_content = '<h3>Page Options</h3>';
   $page_options_content .= '<p>You can customise various options for this page including menu styling, page templates etc.</p>';
   
   $page_featured_image_content = '<h3>Page Featured Image</h3>';
   $page_featured_image_content .= '<p>Upload or select featured image for this page to displays it as background header.</p>';
   
   //Post help pointers
   $post_options_content = '<h3>Post Options</h3>';
   $post_options_content .= '<p>You can customise various options for this post including its layout and featured content type.</p>';
   
   $post_featured_image_content = '<h3>Post Featured Image (*Required)</h3>';
   $post_featured_image_content .= '<p>Upload or select featured image for this post to displays it as post image on blog, archive, category, tag and search pages.</p>';
   
   //Gallery help pointers
   $gallery_images_content = '<h3>Gallery Images</h3>';
   $gallery_images_content .= '<p>Upload or select for this gallery. You can select multiple images to upload using SHIFT or CTRL keys.</p>';
   
   $gallery_options_content = '<h3>Gallery Options</h3>';
   $gallery_options_content .= '<p>You can customise various options for this gallery including gallery template, password and gallery images file.</p>';
   
   $gallery_featured_image_content = '<h3>Gallery Featured Image (*Required)</h3>';
   $gallery_featured_image_content .= '<p>Upload or select featured image for this gallery to displays it as gallery image on gallery archive pages. If featured image is not selected, this gallery will not display on gallery archive page.</p>';
   
   //car help pointers
   $car_options_content = '<h3>Car Options</h3>';
   $car_options_content .= '<p>You can customise various options for this car including price, booking form and other informations about this car.</p>';
   
   $car_tags_content = '<h3>Car Tags</h3>';
   $car_tags_content .= '<p>You can assign tags for each cars and car tags will be used to get similar cars on single car page.</p>';
   
   $car_brands_content = '<h3>Car Brands</h3>';
   $car_brands_content .= '<p>You can assign brands for each cars for example BMW, Audi</p>';
   
   $car_types_content = '<h3>Car Types</h3>';
   $car_types_content .= '<p>You can assign types for each cars for example Sedan, SUV</p>';
   
   $car_featured_image_content = '<h3>Car Featured Image (*Required)</h3>';
   $car_featured_image_content .= '<p>Upload or select featured image for this car to displays it as featured image on car archive pages.</p>';
   
   //Testimonials help pointers
   $testimonials_options_content = '<h3>Testimonials Options</h3>';
   $testimonials_options_content .= '<p>You can customise various options for this testimonial including customer name, position, company etc.</p>';
   
   $testimonials_featured_image_content = '<h3>Testimonials Featured Image</h3>';
   $testimonials_featured_image_content .= '<p>Upload or select featured image for this testimonial to displays it as customer photo.</p>';
   
   //Team Member help pointers
   $team_options_content = '<h3>Team Member Options</h3>';
   $team_options_content .= '<p>You can customise various options for this team member including position and social profiles URL.</p>';
   
   $team_featured_image_content = '<h3>Team Member Featured Image</h3>';
   $team_featured_image_content .= '<p>Upload or select featured image for this team member to displays it as team member photo.</p>';

   $tg_pointer_arr = array(
   
   	  //Page help pointers
      $prefix . '_content_builder' => array(
         'content' => $content_builder_content,
         'anchor_id' => '#enable_builder',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_content_builder', $dismissed ) )
      ),
      
      $prefix . '_page_options' => array(
         'content' => $page_options_content,
         'anchor_id' => 'body.post-type-page #page_option_page_menu_transparent',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_page_options', $dismissed ) )
      ),
      
      $prefix . '_page_featured_image' => array(
         'content' => $page_featured_image_content,
         'anchor_id' => 'body.post-type-page #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_page_featured_image', $dismissed ) )
      ),
      
      //Post help pointers
      $prefix . '_post_options' => array(
         'content' => $post_options_content,
         'anchor_id' => 'body.post-type-post #post_option_post_layout',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_post_options', $dismissed ) )
      ),
      
      $prefix . '_post_featured_image' => array(
         'content' => $post_featured_image_content,
         'anchor_id' => 'body.post-type-post #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_post_featured_image', $dismissed ) )
      ),
      
      //Gallery help pointers
      $prefix . '_gallery_images' => array(
         'content' => $gallery_images_content,
         'anchor_id' => 'body.post-type-galleries #wpsimplegallery_container',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_gallery_images', $dismissed ) )
      ),
      
      //car help pointers
      $prefix . '_car_options' => array(
         'content' => $car_options_content,
         'anchor_id' => 'body.post-type-car #metabox #post_option_car_passengers',
         'edge' => 'bottom',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_car_options', $dismissed ) )
      ),
      
      $prefix . '_car_tags' => array(
         'content' => $car_tags_content,
         'anchor_id' => 'body.post-type-car #tagsdiv-cartag',
         'edge' => 'right',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_car_tags', $dismissed ) )
      ),
      
      $prefix . '_car_brands' => array(
         'content' => $car_brands_content,
         'anchor_id' => 'body.post-type-car #tagsdiv-carbrand',
         'edge' => 'right',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_car_brands', $dismissed ) )
      ),
      
      $prefix . '_car_types' => array(
         'content' => $car_types_content,
         'anchor_id' => 'body.post-type-car #tagsdiv-cartype',
         'edge' => 'right',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_car_types', $dismissed ) )
      ),
      
      $prefix . '_car_featured_image' => array(
         'content' => $car_featured_image_content,
         'anchor_id' => 'body.post-type-car #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_car_featured_image', $dismissed ) )
      ),
      
      //Testimonials help pointers
      $prefix . '_testimonials_options' => array(
         'content' => $testimonials_options_content,
         'anchor_id' => 'body.post-type-testimonials #metabox #post_option_testimonial_name',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_testimonials_options', $dismissed ) )
      ),
      
      $prefix . '_testimonials_featured_image' => array(
         'content' => $testimonials_featured_image_content,
         'anchor_id' => 'body.post-type-testimonials #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_testimonials_featured_image', $dismissed ) )
      ),
      
      //Team Member help pointers
      $prefix . '_team_options' => array(
         'content' => $team_options_content,
         'anchor_id' => 'body.post-type-team #metabox #post_option_team_position',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_team_options', $dismissed ) )
      ),
      
      $prefix . '_team_featured_image' => array(
         'content' => $team_featured_image_content,
         'anchor_id' => 'body.post-type-team #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_team_featured_image', $dismissed ) )
      ),
   );

   return $tg_pointer_arr;
}
?>