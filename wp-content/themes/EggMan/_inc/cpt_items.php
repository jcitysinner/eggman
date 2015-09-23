<?php
function register_cpt_items(){

$singularname = 'Item';
$pluralname = 'Items';
$slug = 'items';

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
  register_post_type( 'items', $args ); 
}
add_action( 'init', 'register_cpt_items' );

require_once ( 'items/_metaboxes.php' ); 

function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
  $content = get_the_content($more_link_text, $stripteaser, $more_file);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


add_action('wp_ajax_nopriv_menu_item', 'menu_item');
add_action('wp_ajax_menu_item', 'menu_item');
function menu_item () {

    $pid        =  $_POST['post_id'];
    query_posts('p='.$pid.'&post_type=items');
    if (have_posts()) : while (have_posts()) : the_post(); 

    $price_lrg = get_post_meta( $pid, 'items_price_lrg', 'true' ); 
    $price_reg = get_post_meta( $pid, 'items_price_reg', 'true' ); 

    $based = get_post_meta( $pid, 'items_base', 'true' ); 
    $sodium = get_post_meta( $pid, 'items_sodium', 'true' );
    $fat = get_post_meta( $pid, 'items_fat', 'true' );
    $carb = get_post_meta( $pid, 'items_carb', 'true' );
    $cal = get_post_meta( $pid, 'items_cal', 'true' );
    $money = get_post_meta( $pid, 'items_money', 'true' );
    $sub = get_post_meta( $pid, 'items_sub', 'true' );

    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    $image_id = get_post_thumbnail_id($pid);
    $url = wp_get_attachment_image_src($image_id,'post_card_large', true)[0]; }
    
    $cal_string = '';
    $carb_string = '';
    $fat_string = '';
    $sodium_string = '';
    $price = '';
    if(!empty($price_lrg) && !empty($price_reg)){
      $price = '<div class="price"> 
      <span><small>Large:</small> <strong>$'.$price_lrg.'</strong></span> 
      <span><small>Small:</small> <strong>$'.$price_reg.'</strong></span> 
      </div>';
    } else {
      $price = '<div class="price"> 
      <span><small>Price:</small> <strong>'.$price_lrg.$price_reg.'</strong></span> 
      </div>';
    }
    if(!empty($based)){
      $base_string = '<div class="serving"> <small>Serving Size:</small> <strong>'.$based.'</strong> </div>';
    }
    if(!empty($cal)){
      $cal_string = '<div class="cell"> <strong>'.$cal.'</strong> <small>Calories</small></div>';
    }
    if(!empty($carb)){
      $carb_string = '<div class="cell"> <strong>'.$carb.'</strong>  <small>Carbs (g)</small> </div>';
    }
    if(!empty($fat)){
      $fat_string = '<div class="cell"> <strong>'.$fat.'</strong> <small>Total Fat (g)</small> </div>';
    }
    if(!empty($sodium)){
      $sodium_string = '<div class="cell"> <strong>'.$sodium.'</strong> <small>Sodium (mg)</small> </div>';
    }
    
$data = '
    <div class="close">
      <svg><use xlink:href="#icon-close"></use></svg>
    </div>

    <div class="money_shot" style="background-image:url('.$money.');"></div>

    <div class="wrapper">

      <div class="col_2">
        <div class="img-wrap"><img src="'.$url.'"></div>
      </div>

      <div class="col_1">
        <h1>'.get_the_title().'</h1>
        <h2>'.$sub.'</h2>
        <div class="content">
        '.get_the_content_with_formatting().'
        </div>
        '.$price.'<h3>Nutritional Information</h3>
        '.$base_string.'
        <div class="table">'.$cal_string.$carb_string.$fat_string.$sodium_string.'</div>
      </div>
    </div>';
  endwhile; endif; 
  wp_reset_postdata();
  echo '<article class="item_single">'.$data.'</article>';
  die();
}




?>