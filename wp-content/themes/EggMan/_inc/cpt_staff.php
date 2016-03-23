<?php
function register_cpt_staff(){

$singularname = 'Staff';
$pluralname = 'Staff';
$slug = 'staff';

  $labels = array(
    'name'          => __($pluralname),
    'singular_name' => __($singularname),
    'add_new'       => __('Add New '.$singularname),
    'add_new_item'  => __('Add New '. $singularname),
    'edit_item'     => __('Edit '. $singularname),
    'new_item'      => __('New '.$singularname),
    'view_item'     => __('View '.$singularname),
    'search_items'  => __('Search '.$pluralname)
  );
    
  $args = array(
    'labels'        => $labels,
    'description'   => 'profile',
    'public'        => true,
    'hierarchical' => false,
    'menu_icon'   => 'dashicons-businessman',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
    'has_archive'   => false
  );
  register_post_type( 'staff', $args ); 
}
add_action( 'init', 'register_cpt_staff' );







/* ---------------------------------
  Metaboxes
--------------------------------- */

function staff_metaboxes() {
  
    $prefix = 'staff_';
    $meta_boxes['staff_users_metabox'] = array (
        'id' => 'staff_users_metabox',
        'title' => 'Article Info',
        'object_types' => array('staff'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'fields' => array(

            array (
              'name' => 'Title',
              'desc' => '',
              'id'   => $prefix.'title',
              'type' => 'text',
            ),

            array (
              'name' => 'Twitter',
              'desc' => '',
              'id'   => $prefix.'twitter',
              'type' => 'text_url',
            ),
            array (
              'name' => 'Facebook',
              'desc' => '',
              'id'   => $prefix.'facebook',
              'type' => 'text_url',
            ),
            array (
              'name' => 'Instagram',
              'desc' => '',
              'id'   => $prefix.'instagram',
              'type' => 'text_url',
            ),


        )
    );
return $meta_boxes;
}




/* ---------------------------------
  Ajax
--------------------------------- */


add_action("wp_ajax_staff_archive", "staff_archive");
add_action("wp_ajax_nopriv_staff_archive", "staff_archive");
function staff_archive(){
  staff_archive_output();
  die();
}

function staff_archive_output() {

 $args = array(
    'post_type' =>  'staff', 
    'posts_per_page'  =>  200,
  ); 

  query_posts($args);
  if (have_posts()) : while (have_posts()) : the_post(); 

  $pid = get_the_ID();
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	$image_id = get_post_thumbnail_id($pid);
	$url = wp_get_attachment_image_src($image_id,'post_card_large', true)[0]; }

	$sub = get_post_meta( $pid, 'staff_title', 'true' );
	$twitter = get_post_meta( $pid, 'staff_twitter', 'true' );
	$facebook = get_post_meta( $pid, 'staff_facebook', 'true' );
	$instagram = get_post_meta( $pid, 'staff_instagram', 'true' );

echo '<article class="staff_single">
		<div class="col_1">
			<img src="'. $url .'">.';
		  if (!empty($twitter)) {
		    echo '<a href="'.$twitter.'"><svg><use xlink:href="#twitter-icon"></use></svg></a>';
		  }
		  if (!empty($facebook)) {
		    echo '<a href="'.$facebook.'"><svg><use xlink:href="#facebook-icon"></use></svg></a>';
		  }
		  if (!empty($instagram)) {
		    echo '<a href="'.$instagram.'"><svg><use xlink:href="#instagram-icon"></use></svg></a>';
		  }
		echo '</div>
		<div class="col_2">
			<h1>'.get_the_title().'</h1>
			<h2>'.$sub.'</h2>
			<div class="content">
			'.get_the_content_with_formatting().'
			</div>
		</div>
		';

        

    echo '</article>';


endwhile; endif;

} ?>