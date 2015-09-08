<?php

/* ---------------------------------
  Metaboxes
--------------------------------- */

function sessions_metaboxes()
{
  
    $prefix = 'session_';
    $meta_boxes['sessions_users_metabox'] = array(
        'id' => 'sessions_users_metabox',
        'title' => 'Presenters',
        'object_types' => array('sessions'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'fields' => array(
        
        array(
            'id'          => $prefix . 'presenter_group',
            'type'        => 'group',
            'description' => __( '', 'cmb2' ),
            'options'     => array(
            'group_title'   => __( 'Presenter {#}', 'cmb2' ),
            'add_button'    => __( 'Add Another Presenter', 'cmb2' ),
            'remove_button' => __( 'Remove Presenter', 'cmb2' ),
            'sortable'      => false, 
            ),            
            'fields'      => array(
                array(
                    'name' => 'Name',
                    'id'   => 'name',
                    'type' => 'text'
                ),
                array(
                    'name' => 'URL',
                    'id'   => 'url',
                    'type' => 'text_url'
                ),
                array(
                    'name' => 'Email',
                    'id'   => 'email',
                    'type' => 'text_email'
                ),
              
            ),
        ),
        
       ),
    );
    
    
    $meta_boxes['sessions_learn_metabox'] = array(
        'id' => 'sessions_learn_metabox',
        'title' => '5 Take Aways',
        'object_types' => array('sessions'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'fields' => array(
        
        array(
            'name' => '',
            'id'   => $prefix .'learn',
            'type' => 'text',
            'repeatable' => true,
        ),  
        
              
       ),
    );
    
    $meta_boxes['sessions_cat_metabox'] = array(
        'id' => 'sessions_cat_metabox',
        'title' => 'Categories',
        'object_types' => array('sessions'),
        'context' => 'side',
        'priority' => 'high',
        'show_names' => true,
        'fields' => array(
        
        array( 
          'name'  => 'Level',  
          'id'  => $prefix . 'level_tax',
          'taxonomy' => 'skill_level_tax',
          'type'  => 'taxonomy_select'  
        ),
        
        array( 
          'name'  => 'Type',  
          'id'  => $prefix . 'type_tax',
          'taxonomy' => 'type_tax',
          'type'  => 'taxonomy_select'  
        ),
        
        array( 
          'name'  => 'Subject',  
          'id'  => $prefix . 'subject_tax',
          'taxonomy' => 'subject_tax',
          'type'  => 'taxonomy_select'  
        ),
        
              
       ),
    );
    
    
    
    
  $meta_boxes['sessions_status_metabox'] = array(
      'id' => 'sessions_status_metabox',
      'title' => 'Submission Status',
      'object_types' => array('sessions'),
      'context' => 'side',
      'priority' => 'high',
      'show_names' => true,
      'fields' => array(
      
      array( 
        'name'  => 'Status',  
        'id'  => $prefix . 'status_tax',
        'taxonomy' => 'status_tax',
        'type'  => 'taxonomy_select',
        'row_classes' => 'halfling', 
      ),

      array( 
        'desc'  => 'Scheduled',  
        'id'  => $prefix . 'status_schedule',
        'taxonomy' => 'status_schedule',
        'type'  => 'checkbox' ,
        'row_classes' => 'halfling',
      ),
     
     ),
  );
      
      
     

    return $meta_boxes;
}

?>