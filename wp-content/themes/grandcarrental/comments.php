<?php
//Required password to comment
if ( post_password_required() ) { ?>
	<p><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'grandcarrental' ); ?></p>
<?php
	return;
}
?>
<?php 
//Display Comments
if( have_comments() ) : ?> 

<?php
	if($post->post_type != 'car')
	{
?>
	<h3 class="comment_title"><?php comments_number(esc_html__( 'Leave A Reply', 'grandcarrental' ), esc_html__( '1 Comment', 'grandcarrental' ), '% '.esc_html__( 'Comments', 'grandcarrental' )); ?></span></h3>
	
<?php
	}
	else
	{
?>
	<h3 class="comment_title"><?php comments_number(esc_html__( 'Leave A Review', 'grandcarrental' ), esc_html__( '1 Review', 'grandcarrental' ), '% '.esc_html__( 'Reviews', 'grandcarrental' )); ?></span></h3>
<?php
		$comment_number = get_comments_number($post->ID);
		
		if(!empty($comment_number))
		{
?>
		<div class="avg_comment_rating_wrapper themeborder">
<?php
			$driving_rating_arr = grandcarrental_get_review($post->ID, 'driving_rating');
			$driving_rating = intval($driving_rating_arr['average']);
			
			if(!empty($driving_rating_arr))
			{
				$return_html = '';
				$return_html.= '<div class="comment_rating_wrapper">';
				$return_html.= '<div class="comment_rating_label">'.esc_html__('Driving', 'grandcarrental').'</div>';
				
				$return_html.= '<div class="br-theme-fontawesome-stars-o"><div class="br-widget">';
				
				for( $i=1; $i <= $driving_rating; $i++ ) {
					$return_html.= '<a href="javascript:;" class="br-selected"></a>';
				}
				
				$empty_star = 5 - $driving_rating;
				
				if(!empty($empty_star))
				{
					for( $i=1; $i <= $empty_star; $i++ ) {
						$return_html.= '<a href="javascript:;"></a>';
					}
				}
				
				$return_html.= '</div></div></div>';
				echo $return_html;
			}
			
			$interior_rating_arr = grandcarrental_get_review($post->ID, 'interior_rating');
			$interior_rating = intval($interior_rating_arr['average']);
			
			if(!empty($interior_rating_arr))
			{
				$return_html = '';
				$return_html.= '<div class="comment_rating_wrapper">';
				$return_html.= '<div class="comment_rating_label">'.esc_html__('Interior Layout', 'grandcarrental').'</div>';
				
				$return_html.= '<div class="br-theme-fontawesome-stars-o"><div class="br-widget">';
				
				for( $i=1; $i <= $interior_rating; $i++ ) {
					$return_html.= '<a href="javascript:;" class="br-selected"></a>';
				}
				
				$empty_star = 5 - $interior_rating;
				
				if(!empty($empty_star))
				{
					for( $i=1; $i <= $empty_star; $i++ ) {
						$return_html.= '<a href="javascript:;"></a>';
					}
				}
				
				$return_html.= '</div></div></div>';
				echo $return_html;
			}
			
			$space_rating_arr = grandcarrental_get_review($post->ID, 'space_rating');
			$space_rating = intval($space_rating_arr['average']);
			
			if(!empty($space_rating_arr))
			{
				$return_html = '';
				$return_html.= '<div class="comment_rating_wrapper">';
				$return_html.= '<div class="comment_rating_label">'.esc_html__('Space & Practicality', 'grandcarrental').'</div>';
				
				$return_html.= '<div class="br-theme-fontawesome-stars-o"><div class="br-widget">';
				
				for( $i=1; $i <= $space_rating; $i++ ) {
					$return_html.= '<a href="javascript:;" class="br-selected"></a>';
				}
				
				$empty_star = 5 - $space_rating;
				
				if(!empty($empty_star))
				{
					for( $i=1; $i <= $empty_star; $i++ ) {
						$return_html.= '<a href="javascript:;"></a>';
					}
				}
				
				$return_html.= '</div></div></div>';
				echo $return_html;
			}
			
			$overall_rating_arr = grandcarrental_get_review($post->ID, 'overall_rating');
			$overall_rating = intval($overall_rating_arr['average']);
			
			if(!empty($overall_rating_arr))
			{
				$return_html = '';
				$return_html.= '<div class="comment_rating_wrapper">';
				$return_html.= '<div class="comment_rating_label">'.esc_html__('Overall', 'grandcarrental').'</div>';
				
				$return_html.= '<div class="br-theme-fontawesome-stars-o"><div class="br-widget">';
				
				for( $i=1; $i <= $overall_rating; $i++ ) {
					$return_html.= '<a href="javascript:;" class="br-selected"></a>';
				}
				
				$empty_star = 5 - $overall_rating;
				
				if(!empty($empty_star))
				{
					for( $i=1; $i <= $empty_star; $i++ ) {
						$return_html.= '<a href="javascript:;"></a>';
					}
				}
				
				$return_html.= '</div></div></div>';
				echo $return_html;
			}
?>
		</div>
<?php
		}
	}
?>
<div>
	<a name="comments"></a>
	<?php wp_list_comments( array('callback' => 'grandcarrental_comment', 'avatar_size' => '40') ); ?>
</div>

<!-- End of thread -->  
<div style="height:10px"></div>

<?php endif; ?> 


<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

<div class="pagination"><p><?php previous_comments_link('<'); ?> <?php next_comments_link('>'); ?></p></div><br class="clear"/>

<?php endif; // check for comment navigation ?>


<?php 
//Display Comment Form
if ('open' == $post->comment_status) : ?> 

<?php 
	if($post->post_type != 'car')
	{
		comment_form(array(
		    'title_reply' => esc_html__( 'Leave A Reply', 'grandcarrental' ),
		    'label_submit' => esc_html__('Post Reply', 'grandcarrental')
		));
	}
	else
	{
		comment_form(array(
		    'title_reply' => esc_html__( 'Write A Review', 'grandcarrental' ),
		    'label_submit' => esc_html__('Post Review', 'grandcarrental')
		));
	}
?>
			
<?php endif; ?>