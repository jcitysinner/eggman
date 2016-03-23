<?php
function register_cpt_press(){

$singularname = 'Press';
$pluralname = 'Press';
$slug = 'press';

   $labels = array(
        'name' => __($pluralname),
        'singular_name' => __($singularname),
        'add_new' => __('Add New Article'),
        'add_new_item' => __('Add New Article'),
        'edit_item' => __('Edit Article'),
        'new_item' => __('New Article'),
        'view_item' => __('View Article'),
        'search_items' => __('Search Articles'),
        'all_items'         => __( 'All Articles' ),
        'parent_item'       => __( 'Parent Article' ),
        'parent_item_colon' => __( 'Parent Article:' ),
        'update_item'       => __( 'Update Article' ),
        'new_item_name'     => __( 'New Genre Article' ),
        'menu_name'         => __($pluralname),
    );
    
  $args = array(
    'labels'        => $labels,
    'description'   => 'profile',
    'public'        => true,
    'hierarchical' => false,
    'menu_icon'   => 'dashicons-media-document',
    'supports'      => array( 'title', 'editor'),
    'has_archive'   => false
  );
  register_post_type( 'press', $args ); 
}
add_action( 'init', 'register_cpt_press' );


/* ---------------------------------
  Metaboxes
--------------------------------- */

function press_metaboxes() {
  
    $prefix = 'press_';
    $meta_boxes['press_users_metabox'] = array (
        'id' => 'press_users_metabox',
        'title' => 'Article Info',
        'object_types' => array('press'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'fields' => array(

            array (
              'name' => 'Article URL',
              'desc' => '',
              'id'   => $prefix.'url',
              'type' => 'text_url',
            ),
            array (
              'name' => 'Article Source',
              'desc' => '',
              'id'   => $prefix.'source',
              'type' => 'text',
            )
        )
    );
return $meta_boxes;
}

?>