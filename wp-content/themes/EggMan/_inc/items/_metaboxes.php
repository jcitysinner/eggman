<?php
/**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function cmb2_set_checkbox_default_for_new_post( $default ) {
    return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

/* ---------------------------------
  Metaboxes
--------------------------------- */

function items_metaboxes()
{
  
    $prefix = 'items_';
    $meta_boxes['items_users_metabox'] = array(
        'id' => 'items_users_metabox',
        'title' => 'Product Info',
        'object_types' => array('items'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'fields' => array(

        array(
          'name' => 'Visable',
          'desc' => 'Show in Menu',
          'id'   => $prefix.'show',
          'type' => 'checkbox',
          'default' => cmb2_set_checkbox_default_for_new_post( true )
        )
        
    )
);
return $meta_boxes;
}

?>