<?php
function register_cpt_items(){

$singularname = 'Item';
$pluralname = 'Items';
$slug = 'items';

   $labels = array(
        'name' => _($pluralname),
        'singular_name' => __($singularname),
        'add_new' => __('Add New '.$singularname),
        'add_new_item' => __('Add New '. $singularname),
        'edit_item' => __('Edit '. $singularname),
        'new_item' => __('New '.$singularname),
        'view_item' => __('View '.$singularname),
        'search_items' => __('Search '.$pluralname),
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
  register_post_type( 'items', $args ); 
}
add_action( 'init', 'register_cpt_items' );

require_once ( 'items/_metaboxes.php' ); 
require_once ( 'items/_menu_function.php' ); 

?>