<?php

/* ---------------------------------
	Menus
--------------------------------- */

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', 'Primary Menu' );
  register_nav_menu( 'footer', 'Footer Menu' );
}

/* ---------------------------------
	Scripts
--------------------------------- */
function eggman_scripts() {
	$url = 'http://' . $_SERVER['SERVER_NAME'];
	
  if ( ! is_admin() && ! is_login_page() ) {

    if (false !== strpos($url,'localhost') or  false !== strpos($url,'10.199.1.198') ) {
       wp_register_script('main', get_template_directory_uri().'/js/main.js', array('newjquery'), '2.0', true);
       wp_register_script('livereload', 'http://' . $_SERVER['SERVER_NAME'].':15711/livereload.js?snipver=1', null, false, true);
    } else {
       wp_register_script('main', get_template_directory_uri().'/js/main.min.js', array('newjquery'), true);
    }
    wp_enqueue_script('main');

    if ( current_user_can( 'manage_options' ) ) {
      wp_enqueue_script('livereload');
    }

    wp_deregister_script('jquery');
    wp_register_script('newjquery', "//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js", false, null, true);
    wp_enqueue_script('newjquery');
  } else {

      if (false !== strpos($url,'localhost') or  false !== strpos($url,'10.199.1.198') ) {
         wp_register_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '2.0', true);
         wp_register_script('livereload', 'http://' . $_SERVER['SERVER_NAME'].':15711/livereload.js?snipver=1', null, false, true);
      } else {
         wp_register_script('main', get_template_directory_uri().'/js/main.min.js', array('jquery'), true);
      }
      wp_enqueue_script('main');

      if ( current_user_can( 'manage_options' ) ) {
        wp_enqueue_script('livereload');
      }
  }

};
add_action('init', 'eggman_scripts');


function wpa_scripts() {
    $script_data = array(
        'image_path' => get_template_directory_uri() . '/img/'
    );
    wp_localize_script(
        'main',
        'wpa_data',
        $script_data
    );
}
add_action( 'admin_enqueue_scripts', 'wpa_scripts' );



/* ---------------------------------
	Styles
--------------------------------- */
function eggman_styles()
{	
	wp_enqueue_style('eggman_reset', get_stylesheet_directory_uri().'/style.css', false, '1.0');	
  wp_enqueue_style('eggman_reset_font', 'https://fonts.googleapis.com/css?family=Nunito:300|Chau+Philomene+One', false, '1.0');  
}
add_action('wp_enqueue_scripts', 'eggman_styles');

// function styles_in_wp_foot() {
// 	echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() .'/style.css" type="text/css" media="all" />';
// }
// add_action( 'wp_footer', 'styles_in_wp_foot' );

// function criticalCSS_wp_head() {
// 	echo '<style>';
// 		if(!is_front_page() ) {
// 			include get_stylesheet_directory() . '/scss/home.css.php';
// 		}
// 		if( !is_post_type_archive( 'sessions' ) ) {
// 			include get_stylesheet_directory() . '/scss/sessions.css.php';
// 		}
// 	echo '</style>';
// }

// add_action( 'wp_head', 'criticalCSS_wp_head' );

/* ---------------------------------
	CPT's / Additions
--------------------------------- */
add_theme_support( 'post-thumbnails' );
require_once ( '_inc/cpt_items.php' );
require_once ( '_inc/cpt_testimonial.php' );
require_once ( '_inc/cpt_press.php' );
require_once ( '_inc/cpt_staff.php' );
require_once('_inc/twitteroauth/twitteroauth/twitteroauth.php'); 


/* ---------------------------------
	Theme Options
--------------------------------- */ 
 
require_once ( '_inc/theme-options.php' ); 
//require_once ( '_inc/favicon.php' ); 

/* ---------------------------------
	Metaboxes
--------------------------------- */


if ( file_exists(  __DIR__ . '/_inc/cmb2/init.php' ) ) {
	require_once  __DIR__ . '/_inc/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/_inc/CMB2/init.php' ) ) {
	require_once  __DIR__ . '/_inc/CMB2/init.php';
}

function eggman_metaboxes($meta_boxes){
	
	$items_metaboxes = items_metaboxes();
	$press_metaboxes = press_metaboxes();
  $staff_metaboxes = staff_metaboxes();

	$meta_boxes = array_merge( $items_metaboxes, $press_metaboxes, $staff_metaboxes);
	return $meta_boxes;	
}

add_filter( 'cmb2_meta_boxes', 'eggman_metaboxes' );


/* ---------------------------------
	Remove Menu Items
--------------------------------- */

function remove_menu_item() {
    remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'remove_menu_item' );


/* ---------------------------------
	Remove Default Widgets
--------------------------------- */
function unregister_default_widgets()
{
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'unregister_default_widgets', 11);


/* ---------------------------------
	Hide Admin Bar
--------------------------------- */

//show_admin_bar(false);


/* ---------------------------------
	Disable the emoji's
--------------------------------- */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


/* ---------------------------------
	Ajax Calls
--------------------------------- */
function eggman_ajaxurl() {
?>
	<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var themeurl = '<?php echo get_template_directory_uri(); ?>';
	</script>
<?php
}
add_action('wp_head','eggman_ajaxurl');


add_action("wp_ajax_voteIncrement", "voteIncrement");
add_action("wp_ajax_nopriv_voteIncrement", "voteIncrement");
function voteIncrement(){
  run_schedule_email();
  die();
}

/* ---------------------------------
	Check View
--------------------------------- */
/**
 * Check to see if the current page is the login/register page
 * Use this in conjunction with is_admin() to separate the front-end from the back-end of your theme
 * @return bool
 */
if ( ! function_exists( 'is_login_page' ) ) {
  function is_login_page() {
    return in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) );
  }
}


/* ---------------------------------
	Check for Edit or Post
--------------------------------- */


function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}


add_action('admin_bar_menu', 'remove_wp_logo', 999);

function remove_wp_logo( $wp_admin_bar ) {
$wp_admin_bar->remove_node('wp-logo');
}





function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
  $content = get_the_content($more_link_text, $stripteaser, $more_file);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


?>