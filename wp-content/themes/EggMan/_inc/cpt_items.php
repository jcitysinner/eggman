<?php
function register_cpt_items(){

$singularname = 'Item';
$pluralname = 'Items';
$slug = 'items';

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
    'menu_icon'   => 'dashicons-carrot',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
    'has_archive'   => false
  );
  register_post_type( 'items', $args ); 
}
add_action( 'init', 'register_cpt_items' );

require_once ( 'items/_metaboxes.php' ); 
require_once ( 'items/_menu_function.php' ); 





/* ---------------------------------
  Images in Admin
--------------------------------- */
function set_edit_items_columns( $columns ) {
    unset( $columns[ 'author' ] );
    unset( $columns[ 'date' ] );
    return array_merge( $columns, array(
        'image' => __( 'Hero Image' ),
        'image2' => __( 'Secondary Image' ),
        'active' => __( 'Active' ) 
    ) );
}

add_filter( 'manage_edit-items_columns', 'set_edit_items_columns' );
add_action( 'manage_posts_custom_column', 'custom_columns' );
function custom_columns( $column ) {
    global $post;
    switch ( $column ) {
        case 'image':
            $post_meta_data = get_post_custom( $post->ID );
            $custom_image   = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size = 'thumbnail', $icon = false )[0];
            echo '<img src="'.$custom_image.'"/>';
            break;

    case 'image2':
            $post_meta_data = get_post_custom( $post->ID );
            $custom_image   = $post_meta_data[ 'items_money' ][0];
            echo '<img src="'.$custom_image.'"/>';
            break;

    case 'active':
            $post_meta_data = get_post_custom( $post->ID );
            $custom_image   = $post_meta_data[ 'items_show' ];
            if ($custom_image) {
              if (in_array("on", $custom_image)) {
                echo "&#10004;";
              }
            }
            break;


    } //$column
}

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .image2.column-image2 img,
    .image.column-image img {
      max-width: 100px;
    }



  </style>';
}


?>