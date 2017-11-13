<?php
	$wp_query = grandcarrental_get_wp_query();
	
	$query_string = 'paged='.$paged;
	$query_string.= grandcarrental_get_initial_car_query();
	
	if(!empty($term))
	{
		$ob_term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$custom_tax = $wp_query->query_vars['taxonomy'];
	    $query_string .= '&'.$custom_tax.'='.$term;
	}
	
	parse_str($query_string, $args);
    
    if(isset($_GET['brand']) && !empty($_GET['brand']))
    {  
    	$args['tax_query'][] = array(
		    array(
		        'taxonomy' => 'carbrand',
		        'field' => 'name',
		        'terms' => $_GET['brand']
		    )
		);
    }
    
    if(isset($_GET['type']) && !empty($_GET['type']))
    { 
    	$args['tax_query'][] = array(
		    array(
		        'taxonomy' => 'cartype',
		        'field' => 'name',
		        'terms' => $_GET['type']
		    )
		);
    }
    
    if(isset($_GET['sort_by']) && !empty($_GET['sort_by']))
    {
    	switch($_GET['sort_by'])
    	{
	    	case 'price_low':
	    	default:
	    		$args['orderby'] = 'meta_value_num';
	    		$args['meta_key'] = 'car_price_day';
	    		$args['order'] = 'ASC';
	    	break;
	    	
	    	case 'price_high':
	    		$args['orderby'] = 'meta_value_num';
	    		$args['meta_key'] = 'car_price_day';
	    		$args['order'] = 'DESC';
	    	break;
	    	
	    	case 'model':
	    		$args['orderby'] = 'post_title';
	    		$args['order'] = 'ASC';
	    	break;
	    	
	    	case 'brand':
	    		$args['orderby'] = 'post_title';
	    		$args['order'] = 'ASC';
	    	break;
	    	
	    	case 'popular':
	    		$args['orderby'] = 'post_view';
	    		$args['order'] = 'DESC';
	    	break;
	    	
	    	case 'review':
	    		$args['orderby'] = 'meta_value_num';
	    		$args['meta_key'] = 'average_rating';
	    		$args['order'] = 'DESC';
	    	break;
    	}
    }
    else
    {
	    $tg_car_default_search_sort = kirki_get_option('tg_car_default_search_sort');
	    
	    switch($tg_car_default_search_sort)
    	{
	    	case 'price_low':
	    	default:
	    		$args['orderby'] = 'meta_value_num';
	    		$args['meta_key'] = 'car_price_day';
	    		$args['order'] = 'ASC';
	    	break;
	    	
	    	case 'price_high':
	    		$args['orderby'] = 'meta_value_num';
	    		$args['meta_key'] = 'car_price_day';
	    		$args['order'] = 'DESC';
	    	break;
	    	
	    	case 'model':
	    		$args['orderby'] = 'post_title';
	    		$args['order'] = 'ASC';
	    	break;
	    	
	    	case 'brand':
	    		$args['orderby'] = 'post_title';
	    		$args['order'] = 'ASC';
	    	break;
	    	
	    	case 'popular':
	    		$args['orderby'] = 'post_view';
	    		$args['order'] = 'DESC';
	    	break;
	    	
	    	case 'review':
	    		$args['orderby'] = 'meta_value_num';
	    		$args['meta_key'] = 'average_rating';
	    		$args['order'] = 'DESC';
	    	break;
    	}
    }
    
    query_posts($args);
    
    if(empty($term))
	{
?>
<form id="car_search_form" name="car_search_form" method="get" action="<?php echo get_the_permalink($id); ?>">
    <div class="car_search_wrapper">
    	<div class="one_fourth themeborder">
    		<?php
		    	//Get available car brand
		    	$available_brands = grandcarrental_get_carbrand();
		    ?>
    		<select id="brand" name="brand">
	    		<option value=""><?php esc_html_e('Any Brand', 'grandcarrental' ); ?></option>
	    		<?php
		    		foreach($available_brands as $key => $available_brand)	
		    		{
			    ?>
			    	<option value="<?php echo esc_attr($key); ?>" <?php if(isset($_GET['brand']) && $_GET['brand']==$key) { ?>selected<?php } ?>><?php echo esc_attr($available_brand); ?></option>
			    <?php	
			    	}
		    	?>
    		</select>
    		<span class="ti-angle-down"></span>
    	</div>
    	<div class="one_fourth themeborder">
	    	<?php
		    	//Get available car types
		    	$available_types = grandcarrental_get_cartype();
		    ?>
    		<select id="type" name="type">
	    		<option value=""><?php esc_html_e('Any Type', 'grandcarrental' ); ?></option>
	    		<?php
		    		foreach($available_types as $key => $available_type)	
		    		{
			    ?>
			    	<option value="<?php echo esc_attr($key); ?>" <?php if(isset($_GET['type']) && $_GET['type']==$key) { ?>selected<?php } ?>><?php echo esc_attr($available_type); ?></option>
			    <?php	
			    	}
		    	?>
    		</select>
    		<span class="ti-angle-down"></span>
    	</div>
    	<div class="one_fourth themeborder">
    		<?php
		    	//Get available months
		    	$sort_options = grandcarrental_get_sort_options();
		    ?>
    		<select id="sort_by" name="sort_by">
	    		<?php
		    		foreach($sort_options as $key => $sort_option)	
		    		{
			    		if(!isset($_GET['sort_by']) OR empty($_GET['sort_by']))
			    		{
				    		$_GET['sort_by'] = $tg_car_default_search_sort;
			    		}
			    ?>
			    	<option value="<?php echo esc_attr($key); ?>" <?php if(isset($_GET['sort_by']) && $_GET['sort_by']==$key) { ?>selected<?php } ?>><?php echo esc_attr($sort_option); ?></option>
			    <?php	
			    	}
		    	?>
    		</select>
    		<span class="ti-exchange-vertical"></span>
    	</div>
    	<div class="one_fourth last themeborder">
    		<input id="car_search_btn" type="submit" class="button" value="<?php echo _e( 'Search', 'grandcarrental' ); ?>"/>
    	</div>
    </div>
</form>
<?php
	}
?>