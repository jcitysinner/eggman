<?php
function register_cpt_testimonials(){

  $singularname = 'Testimonial';
  $pluralname = 'Testimonials';
  $slug = 'testimonial';

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
    'menu_icon'   => 'dashicons-testimonial',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
    'has_archive'   => false
  );
  register_post_type( 'testimonials', $args ); 
}
add_action( 'init', 'register_cpt_testimonials' );


?>