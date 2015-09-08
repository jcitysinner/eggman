<?php 


/* ---------------------------------
  Taxonomies/Categories
--------------------------------- */

// Register Custom Taxonomy
function skill_level_tax() {

  $labels = array(
    'name'                       => 'Levels',
    'singular_name'              => 'Level',
    'all_items'                  => 'All Levels',
    'parent_item'                => 'Parent Level',
    'parent_item_colon'          => 'Parent Level:',
    'new_item_name'              => 'New Level Name',
    'add_new_item'               => 'Add New Level',
    'edit_item'                  => 'Edit Level',
    'update_item'                => 'Update Level',
    'separate_items_with_commas' => 'Separate levels with commas',
    'search_items'               => 'Search Levels',
    'add_or_remove_items'        => 'Add or remove levels',
    'choose_from_most_used'      => 'Choose from the most used levels',
    'not_found'                  => 'Not Found',
    'menu_name'          => 'Levels',
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'skill_level_tax', array( 'sessions' ), $args );
}
add_action( 'init', 'skill_level_tax', 0 );


function type_tax() {

  $labels = array(
    'name'                       => 'Types',
    'singular_name'              => 'Type',
    'all_items'                  => 'All Types',
    'parent_item'                => 'Parent Type',
    'parent_item_colon'          => 'Parent Type:',
    'new_item_name'              => 'New Type Name',
    'add_new_item'               => 'Add New Type',
    'edit_item'                  => 'Edit Type',
    'update_item'                => 'Update Type',
    'separate_items_with_commas' => 'Separate types with commas',
    'search_items'               => 'Search Types',
    'add_or_remove_items'        => 'Add or remove types',
    'choose_from_most_used'      => 'Choose from the most used types',
    'not_found'                  => 'Not Found',
    'menu_name'          => 'Types',
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'type_tax', array( 'sessions' ), $args );

}
add_action( 'init', 'type_tax', 0 );



function subject_tax() {

  $labels = array(
    'name'                       => 'Subjects',
    'singular_name'              => 'Subject',
    'all_items'                  => 'All Subjects',
    'parent_item'                => 'Parent Subject',
    'parent_item_colon'          => 'Parent Subject:',
    'new_item_name'              => 'New Subject Name',
    'add_new_item'               => 'Add New Subject',
    'edit_item'                  => 'Edit Subject',
    'update_item'                => 'Update Subject',
    'separate_items_with_commas' => 'Separate items with commas',
    'search_items'               => 'Search Subjects',
    'add_or_remove_items'        => 'Add or remove items',
    'choose_from_most_used'      => 'Choose from the most used items',
    'not_found'                  => 'Not Found',
    'menu_name'          => 'Subjects',
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'subject_tax', array( 'sessions' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'subject_tax', 0 );



function status_tax() {

  $labels = array(
    'name'                       => 'Status',
    'singular_name'              => 'Status',
    'all_items'                  => 'All Status',
    'parent_item'                => 'Parent Status',
    'parent_item_colon'          => 'Parent Status:',
    'new_item_name'              => 'New Subject Name',
    'add_new_item'               => 'Add New Status',
    'edit_item'                  => 'Edit Status',
    'update_item'                => 'Update Status',
    'separate_items_with_commas' => 'Separate items with commas',
    'search_items'               => 'Search Status',
    'add_or_remove_items'        => 'Add or remove items',
    'choose_from_most_used'      => 'Choose from the most used items',
    'not_found'                  => 'Not Found',
    'menu_name'          => 'Status',
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => false,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => false,
    'show_tagcloud'              => false,
  );
  register_taxonomy( 'status_tax', array( 'sessions' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'status_tax', 0 );


function room_tax() {

  $labels = array(
    'name'                       => 'Room',
    'singular_name'              => 'Room',
    'all_items'                  => 'All Rooms',
    'parent_item'                => 'Parent Room',
    'parent_item_colon'          => 'Parent Room:',
    'new_item_name'              => 'New Room',
    'add_new_item'               => 'Add New Room',
    'edit_item'                  => 'Edit Room',
    'update_item'                => 'Update Room',
    'separate_items_with_commas' => 'Separate rooms with commas',
    'search_items'               => 'Search Rooms',
    'add_or_remove_items'        => 'Add or remove rooms',
    'choose_from_most_used'      => 'Choose from the most used rooms',
    'not_found'                  => 'Not Found',
    'menu_name'          => 'Rooms',
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'room_tax', array( 'sessions' ), $args );

}
add_action( 'init', 'room_tax', 0 );



function time_tax() {

  $labels = array(
    'name'                       => 'Time',
    'singular_name'              => 'Time',
    'all_items'                  => 'All Times',
    'parent_item'                => 'Parent Time',
    'parent_item_colon'          => 'Parent Time:',
    'new_item_name'              => 'New Time Name',
    'add_new_item'               => 'Add New Time',
    'edit_item'                  => 'Edit Time',
    'update_item'                => 'Update Time',
    'separate_items_with_commas' => 'Separate times with commas',
    'search_items'               => 'Search Times',
    'add_or_remove_items'        => 'Add or remove times',
    'choose_from_most_used'      => 'Choose from the most used times',
    'not_found'                  => 'Not Found',
    'menu_name'          => 'Times',
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'time_tax', array( 'sessions' ), $args );

}
add_action( 'init', 'time_tax', 0 );



/* ---------------------------------
  Generate Taxonomies Terms
--------------------------------- */

add_action('after_switch_theme', 'taxgen_session'); 



function taxgen_session() {

$advanced_desc = 'Advanced sessions attract attendees very familiar with your topic – professionally, personally or both. These panels or presentations should be fairly in-depth with practical takeaways for experts.';
$beginner_desc = 'Designed for those with a newfound interest in a subject, Beginner-level sessions are like the 101 courses you took in university. If your session introduces or covers the building blocks of a topic, this is the skill level you should choose.';
$intermediate_desc = 'Topics discussed or presented at the Intermediate level should be accessible to a diverse audience, but these sessions skip the basics and get a little meatier.';

$panel_desc = 'Panels are made up of three or more people leading a casual discussion about a topic. A more intimate way of leading conversation, panels inspire debate and dialogue from everyone in the room.';
$session_desc = 'Presentations are led by one or two people at the front of the room. Although content may be shared in a semi- formal way (i.e. through a PowerPoint presentation) and take a specific viewpoint, questions and comments are strongly encouraged.';
$workshop_desc = 'Workshops are hands-on sessions with intensive discussion and activity on a particular subject or project. These sessions may require attendees follow along on their own laptops or mobile devices.';

$business_desc = 'An IRL version of all those TED Talks you’ve been watching online. Your session lands in this category if it covers subjects such as building a company, growing a team or creating a business model/strategy.';
$community_dec = 'We’d love for you to share stories about movements you’re a part of, geared to make social, political, economic or environmental change.';
$culture_desc = 'If you consider these sessions the BuzzFeed of PodCamp, you wouldn’t be wrong, but don’t doubt the power of cultural trends.';
$design_desc = 'A sought-after topic by PodCamp attendees, these more technical sessions range from design trends to development workshops.';
$maker_desc = 'More of an open source kinda person? Tell us about it! This category is for those who want to show what they’ve built, rebuilt, modified or created.';
$other_desc = 'If your topic doesn’t fit under any of the above headings, you can put it here. Make sure you tell us about it in your description, though!';
$podcasting_desc = 'This topic is the reason PodCamp exists. Though the unconference has grown and diversified over the years, sessions about podcasting and related technology are warmly welcomed.';
$social_desc = 'Social Media & Marketing sessions delve into the world of social media strategies, platforms, measurement and more.';



  $addterm = array( 
    array(   'term'=> 'Beginner', 'tax' => 'skill_level_tax', 'slug'=> 'level-beginner', 'parent'=> '0', 'description'=> $beginner_desc ),
    array(   'term'=> 'Intermediate', 'tax' => 'skill_level_tax', 'slug'=> 'level-intermediate', 'parent'=> '0', 'description'=> $intermediate_desc ),
    array(   'term'=> 'Advanced', 'tax' => 'skill_level_tax', 'slug'=> 'level-advanced', 'parent'=> '0', 'description'=> $advanced_desc  ),
    
    array(   'term'=> 'Panel', 'tax'  => 'type_tax', 'slug'=> 'type-panel', 'parent'=> '0', 'description'=> $panel_desc ),
    array(   'term'=> 'Session', 'tax'  => 'type_tax', 'slug'=> 'type-session', 'parent'=> '0', 'description'=> $session_desc ),
    array(   'term'=> 'Workshop', 'tax' => 'type_tax', 'slug'=> 'type-workshop', 'parent'=> '0', 'description'=> $workshop_desc ),
    
    array(   'term'=> 'Business & Entrepreneurialism', 'tax'  => 'subject_tax', 'slug'=> 'subject-business', 'parent'=> '0', 'description'=> $business_desc ),
    array(   'term'=> 'Community & Activism', 'tax' => 'subject_tax', 'slug'=> 'subject-community', 'parent'=> '0', 'description'=> $community_dec ),
    array(   'term'=> 'Culture & Entertainment', 'tax'  => 'subject_tax', 'slug'=> 'subject-culture', 'parent'=> '0', 'description'=> $culture_desc ),
    array(   'term'=> 'Design & Development', 'tax' => 'subject_tax', 'slug'=> 'subject-design', 'parent'=> '0', 'description'=> $design_desc ),
    array(   'term'=> 'Maker & Hacker', 'tax' => 'subject_tax', 'slug'=> 'subject-hacker', 'parent'=> '0', 'description'=> $maker_desc ),
    array(   'term'=> 'Other', 'tax'  => 'subject_tax', 'slug'=> 'subject-other', 'parent'=> '0', 'description'=> $other_desc ),
    array(   'term'=> 'Podcasting & New Media', 'tax' => 'subject_tax', 'slug'=> 'subject-podcasting', 'parent'=> '0', 'description'=> $podcasting_desc ),
    array(   'term'=> 'Social Media & Marketing', 'tax' => 'subject_tax', 'slug'=> 'subject-social', 'parent'=> '0', 'description'=> $social_desc ),
    
    array(   'term'=> 'Approved', 'tax' => 'status_tax', 'slug'=> 'status-approved', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> 'Draft', 'tax'  => 'status_tax', 'slug'=> 'status-draft', 'parent'=> '0', 'description'=> ''),
    array(   'term'=> 'Pending', 'tax'  => 'status_tax', 'slug'=> 'status-pending', 'parent'=> '0', 'description'=> ''),
    array(   'term'=> 'Withdrawn', 'tax'  => 'status_tax', 'slug'=> 'status-withdrawn', 'parent'=> '0', 'description'=> ''),
    array(   'term'=> 'Rejected', 'tax' => 'status_tax', 'slug'=> 'status-rejected', 'parent'=> '0', 'description'=> ''),
    array(   'term'=> 'Ops', 'tax'  => 'status_tax', 'slug'=> 'status-ops', 'parent'=> '0', 'description'=> ''),

    array(   'term'=> '162', 'tax'  => 'room_tax', 'slug'=> 'rcc-162', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> '200', 'tax'  => 'room_tax', 'slug'=> 'rcc-200', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> '201', 'tax'  => 'room_tax', 'slug'=> 'rcc-201', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> '204', 'tax'  => 'room_tax', 'slug'=> 'rcc-204', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> '229', 'tax'  => 'room_tax', 'slug'=> 'rcc-229', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> '357', 'tax'  => 'room_tax', 'slug'=> 'rcc-357', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> '359', 'tax'  => 'room_tax', 'slug'=> 'rcc-359', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> '361', 'tax'  => 'room_tax', 'slug'=> 'rcc-361', 'parent'=> '0', 'description'=> '' ),

    array(   'term'=> 'Saturday', 'tax' => 'time_tax', 'slug'=> '20', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> 'Sunday', 'tax' => 'time_tax', 'slug'=> '21', 'parent'=> '0', 'description'=> '' ),
    array(   'term'=> 'Friday', 'tax' => 'time_tax', 'slug'=> '19', 'parent'=> '0', 'description'=> '' ),

  );
  
  foreach ($addterm as $terms) { 


  $term = term_exists($terms['term'] , $terms['tax'], $terms['slug'], $terms['parent'], $terms['description']  );
  if ($term !== 0 && $term !== null) {   } else { wp_insert_term(  $terms['term'],   $terms['tax'],  $args =  array('slug' => $terms['slug'], 'parent' => $terms['parent'], 'description' => $terms['description'] )  ); } 
  } 
   
}   

add_action('after_switch_theme', 'taxgen_time'); 

function taxgen_time() {

  $friday = get_term_by('name', 'Friday', 'time_tax');
  $saturday = get_term_by('name', 'Saturday', 'time_tax');
  $sunday = get_term_by('name', 'Sunday', 'time_tax');

  $addterm = array( 

    array(   'term'=> '6:00 pm', 'tax'  => 'time_tax', 'slug'=> '1800-'.$friday->slug, 'parent'=> $friday->term_id ),

    array(   'term'=> '8:00 am', 'tax'  => 'time_tax', 'slug'=> '0800-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '9:00 am', 'tax'  => 'time_tax', 'slug'=> '0900-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '10:00 am', 'tax' => 'time_tax', 'slug'=> '1000-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '11:00 am', 'tax' => 'time_tax', 'slug'=> '1100-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '12:00 pm', 'tax' => 'time_tax', 'slug'=> '1200-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '1:00 pm', 'tax'  => 'time_tax', 'slug'=> '1300-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '2:00 pm', 'tax'  => 'time_tax', 'slug'=> '1400-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '3:00 pm', 'tax'  => 'time_tax', 'slug'=> '1500-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '4:00 pm', 'tax'  => 'time_tax', 'slug'=> '1600-'.$saturday->slug, 'parent'=> $saturday->term_id ),
    array(   'term'=> '6:00 pm', 'tax'  => 'time_tax', 'slug'=> '1800-'.$saturday->slug, 'parent'=> $saturday->term_id ),

    array(   'term'=> '10:00 am', 'tax' => 'time_tax', 'slug'=> '1000-'.$sunday->slug, 'parent'=> $sunday->term_id ),
    array(   'term'=> '11:00 am', 'tax' => 'time_tax', 'slug'=> '1100-'.$sunday->slug, 'parent'=> $sunday->term_id ),
    array(   'term'=> '12:00 am', 'tax' => 'time_tax', 'slug'=> '1200-'.$sunday->slug, 'parent'=> $sunday->term_id ),
    array(   'term'=> '1:00 pm', 'tax'  => 'time_tax', 'slug'=> '1300-'.$sunday->slug, 'parent'=> $sunday->term_id ),
    array(   'term'=> '2:00 pm', 'tax'  => 'time_tax', 'slug'=> '1400-'.$sunday->slug, 'parent'=> $sunday->term_id )

  );
  
  foreach ($addterm as $terms) { 

    $term = get_term_by('slug', $terms['slug'], $terms['tax'] );

    if ($term !== 0 && $term !== null) {  
        wp_insert_term(  $terms['term'],   $terms['tax'],  $args =  array('slug' => $terms['slug'], 'parent' => $terms['parent'] )  );
     } else {  } 
  }  
} 




/* ---------------------------------
  Remove Default Taxonomy Boxes
--------------------------------- */

function remove_custom_taxonomy()
{
  remove_meta_box('tagsdiv-skill_level_tax', 'sessions', 'side' );
  remove_meta_box('tagsdiv-type_tax', 'sessions', 'side' );
  remove_meta_box('tagsdiv-subject_tax', 'sessions', 'side' );
        
}
add_action( 'admin_menu', 'remove_custom_taxonomy' );


/* ---------------------------------
  Remove Tags in Admin UI
--------------------------------- */

function my_manage_columns( $columns ) {
  unset($columns['tags']);
  return $columns;
}

function my_column_init() {
  add_filter( 'manage_posts_columns' , 'my_manage_columns' );
}
add_action( 'admin_init' , 'my_column_init' );


?>