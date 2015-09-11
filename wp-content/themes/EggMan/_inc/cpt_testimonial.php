<?php
function register_cpt_testimonials(){

$singularname = 'Testimonial';
$pluralname = 'Testimonials';
$slug = 'testimonial';

   $labels = array(
        'name' => _($pluralname),
        'singular_name' => _($singularname),
        'add_new' => _('Add New '.$singularname),
        'add_new_item' => __('Add New '. $singularname),
        'edit_item' => __('Edit '. $singularname),
        'new_item' => __('New '.$singularname),
        'view_item' => __('View '.$singularname),
        'search_items' => __('Search '.$pluralname),
        'parent_item_colon' => ''
    );
    
  $args = array(
    'labels'        => $labels,
    'description'   => 'profile',
    'public'        => true,
    'hierarchical' => false,
    'menu_icon'   => 'dashicons-carrot',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
    'has_archive'   => false
  );
  register_post_type( 'testimonials', $args ); 
}
add_action( 'init', 'register_cpt_testimonials' );


?>