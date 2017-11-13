<?php

/**
*	Begin Recent Posts Custom Widgets
**/

class grandcarrental_Recent_Posts extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'grandcarrental_Recent_Posts', 'description' => 'The recent posts with thumbnails' );
		parent::__construct('grandcarrental_Recent_Posts', 'Custom Recent Posts', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo stripslashes($before_widget);
		$items = empty($instance['items']) ? ' ' : apply_filters('widget_title', $instance['items']);
		$items = absint($items);
		
		$show_thumb = empty($instance['show_thumb']) ? ' ' : apply_filters('widget_title', $instance['show_thumb']);
		
		if(!is_numeric($items))
		{
			$items = 3;
		}
		
		if(!empty($items))
		{
			grandcarrental_posts('recent', $items, TRUE, trim($show_thumb));
		}
		
		echo stripslashes($after_widget);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['show_thumb'] = strip_tags($new_instance['show_thumb']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'show_thumb' => '') );
		$items = strip_tags($instance['items']);
		$show_thumb = strip_tags($instance['show_thumb']);

?>
			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 3): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>">Display Thumbnails: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>" name="<?php echo esc_attr($this->get_field_name('show_thumb')); ?>" type="checkbox" value="1" <?php if(!empty($show_thumb)) { ?>checked<?php } ?> /></label></p>
<?php
	}
}

register_widget('grandcarrental_Recent_Posts');

/**
*	End Recent Posts Custom Widgets
**/


/**
*	Begin Flickr Feed Custom Widgets
**/

class grandcarrental_Flickr extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'grandcarrental_Flickr', 'description' => 'Display your recent Flickr photos' );
		parent::__construct('grandcarrental_Flickr', 'Custom Flickr', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo stripslashes($before_widget);
		$flickr_id = empty($instance['flickr_id']) ? ' ' : apply_filters('widget_title', $instance['flickr_id']);
		$title = $instance['title'];
		$items = $instance['items'];
		$items = absint($items);
		
		if(!is_numeric($items))
		{
			$items = 9;
		}
		
		if(empty($title))
		{
			$title = 'Flickr Widget';
		}
		
		if(!empty($items) && !empty($flickr_id))
		{
			$photos_arr = grandcarrental_get_flickr(array('type' => 'user', 'id' => $flickr_id, 'items' => $items));

			if(!empty($photos_arr))
			{
				echo stripslashes($before_title);
				echo esc_html($title);
				echo stripslashes($after_title);
				
				echo '<ul class="flickr">';
				
				foreach($photos_arr as $photo)
				{
					echo '<li>';
					echo '<a target="_blank" href="'.esc_url($photo['link']).'"><img src="'.esc_url($photo['thumb_url']).'" alt="'.esc_attr($photo['title']).'" width="75" height="75" /></a>';
					echo '</li>';
				}
				
				echo '</ul><br class="clear"/>';
			}
		}
		
		echo stripslashes($after_widget);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = absint($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'flickr_id' => '', 'title' => '') );
		$items = strip_tags($instance['items']);
		$flickr_id = strip_tags($instance['flickr_id']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>">Flickr ID <a href="http://idgettr.com/">Find your Flickr ID here</a>: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" type="text" value="<?php echo esc_attr($flickr_id); ?>" /></label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 9): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('grandcarrental_Flickr');

/**
*	End Flickr Feed Custom Widgets
**/


/**
*	Begin Instagram Feed Custom Widgets
**/

class grandcarrental_Instagram extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'grandcarrental_Instagram', 'description' => 'Display your recent Instagram photos' );
		parent::__construct('grandcarrental_Instagram', 'Custom Instagram', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo stripslashes($before_widget);
		$title = $instance['title'];
		$items = $instance['items'];
		$items = absint($items);
		
		//Get Instagram Access Data
		$pp_instagram_username = get_option('pp_instagram_username');
		$pp_instagram_access_token = get_option('pp_instagram_access_token');
		
		if(!is_numeric($items))
		{
			$items = 9;
		}
		
		if(empty($title))
		{
			$title = 'Flickr Widget';
		}
		
		if(!empty($items) && !empty($pp_instagram_username) && !empty($pp_instagram_access_token))
		{
			$photos_arr = grandcarrental_get_instagram($pp_instagram_username, $pp_instagram_access_token, $items);

			if(!empty($photos_arr))
			{
				echo stripslashes($before_title);
				echo esc_html($title);
				echo stripslashes($after_title);
				
				echo '<ul class="flickr">';
				
				foreach($photos_arr as $photo)
				{
					echo '<li>';
					echo '<a target="_blank" href="'.esc_url($photo['link']).'"><img src="'.esc_url($photo['thumb_url']).'" width="75" height="75" alt="" /></a>';
					echo '</li>';
				}
				
				echo '</ul><br class="clear"/>';
			}
		}
		else
		{
			echo 'Error: Please check if you enter Instagram username and Access Token in Theme Setting > Social Profiles';
		}
		
		echo stripslashes($after_widget);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = absint($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'title' => '') );
		$items = strip_tags($instance['items']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 9): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('grandcarrental_Instagram');

/**
*	End Instagram Feed Custom Widgets
**/

/**
*	Begin Category Posts Custom Widgets
**/

class grandcarrental_Cat_Posts extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'grandcarrental_Cat_Posts', 'description' => 'Display category\'s post' );
		parent::__construct('grandcarrental_Cat_Posts', 'Custom Category Posts', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo stripslashes($before_widget);
		$cat_id = empty($instance['cat_id']) ? 0 : $instance['cat_id'];
		$items = empty($instance['items']) ? 0 : $instance['items'];
		$items = absint($items);
		
		$show_thumb = empty($instance['show_thumb']) ? ' ' : apply_filters('widget_title', $instance['show_thumb']);
		
		if(empty($items))
		{
			$items = 5;
		}
		
		if(!empty($cat_id))
		{
			grandcarrental_cat_posts($cat_id, $items, TRUE, trim($show_thumb));
		}

		echo stripslashes($after_widget);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['cat_id'] = strip_tags($new_instance['cat_id']);
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['show_thumb'] = strip_tags($new_instance['show_thumb']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'cat_id' => '', 'items' => '', 'show_thumb' => '') );
		$cat_id = strip_tags($instance['cat_id']);
		$items = strip_tags($instance['items']);
		$show_thumb = strip_tags($instance['show_thumb']);
		
		$categories = get_categories('hide_empty=0&orderby=name');
		$wp_cats = array(
			0		=> "Choose a category"
		);
		foreach ($categories as $category_list ) {
			$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
		}

?>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">Category: 
				<select  id="<?php echo esc_attr($this->get_field_id('cat_id')); ?>" name="<?php echo esc_attr($this->get_field_name('cat_id')); ?>">
				<?php
					foreach($wp_cats as $wp_cat_id => $wp_cat)
					{
				?>
						<option value="<?php echo esc_attr($wp_cat_id); ?>" <?php if(esc_attr($cat_id) == $wp_cat_id) { echo 'selected="selected"'; } ?>><?php echo esc_html($wp_cat); ?></option>
				<?php
					}
				?>
				</select>
			</label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 5): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>">Display Thumbnails: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>" name="<?php echo esc_attr($this->get_field_name('show_thumb')); ?>" type="checkbox" value="1" <?php if(!empty($show_thumb)) { ?>checked<?php } ?> /></label></p>
<?php
	}
}

register_widget('grandcarrental_Cat_Posts');

/**
*	End Category Posts Custom Widgets
**/

/**
*	Begin Social Profiles Custom Widgets
**/

class grandcarrental_Social_Profiles_Posts extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'grandcarrental_Social_Profiles_Posts', 'description' => 'Display social profiles' );
		parent::__construct('grandcarrental_Social_Profiles_Posts', 'Custom Social Profiles', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$title = $instance['title'];

		echo stripslashes($before_widget);
		
		if(!empty($title) && strlen($title) > 0)
		{
			echo stripslashes($before_title);
			echo esc_html($title);
			echo stripslashes($after_title);
		}
		
		echo do_shortcode('[tg_social_icons style="light" size="small"]');

		echo stripslashes($after_widget);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'title' => '') );
		$title = strip_tags($instance['title']);

?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}
}

register_widget('grandcarrental_Social_Profiles_Posts');

/**
*	End Social Profiles Widgets
**/

/**
*	Begin About Me Custom Widgets
**/

class grandcarrental_About_Us extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'grandcarrental_About_Us', 'description' => 'Display about us information' );
		parent::__construct('grandcarrental_About_Us', 'Custom About Us', $widget_ops);
		add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$title = $instance['title'];
		$image = $instance['image'];
		$description = $instance['description'];

		echo stripslashes($before_widget);
		echo stripslashes($before_title);
		
		if(!empty($title))
		{
			echo '<h2 class="widgettitle"><span>'.esc_html($title).'</span></h2>';
		}
		
		echo stripslashes($after_title);
		
		echo '<div class="textwidget">';
		echo '<div class="widget_about_image"><img src="'.esc_url($image).'"/></div>';
		echo '<div class="widget_about_desc">'.esc_html($description).'</div>';
		echo '</div>';

		echo stripslashes($after_widget);
	}
	
	/**
     * Upload the Javascripts for the media uploader
     */
    function upload_scripts()
    {
    	wp_enqueue_media();
        wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
        wp_enqueue_script('grandcarrental-upload-media-widget', get_template_directory_uri().'/functions/upload_media_widget.js', array('jquery'));

        
        wp_enqueue_style('thickbox');
    }

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['image'] = esc_url($new_instance['image']);
		$instance['description'] = $new_instance['description'];

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'title' => '', 'image' => '', 'description' => '') );
		$title = strip_tags($instance['title']);
		$image = strip_tags($instance['image']);
		$description = $instance['description'];

?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'grandcarrental' ); ?> <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>
		</p>
		
		<p>
            <label for="<?php echo esc_attr($this->get_field_name( 'image' )); ?>"><?php esc_html_e( 'Profile Image:', 'grandcarrental' ); ?></label>
            <input name="<?php echo esc_attr($this->get_field_name( 'image' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'image' )); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="tg_upload_image_button button" type="button" value="<?php esc_html_e( 'Select Image', 'grandcarrental' ); ?>" data-target="<?php echo esc_attr($this->get_field_name( 'image' )); ?>" />
        </p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e( 'Description:', 'grandcarrental' ); ?> <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_attr($description); ?></textarea></label>
		</p>
<?php
	}
}

register_widget('grandcarrental_About_Us');

/**
*	End About Me Widgets
**/
?>