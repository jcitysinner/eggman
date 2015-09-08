<?php

/**
 * Gets a number of terms and displays them as options
 * @param  string       $taxonomy Taxonomy terms to retrieve. Default is category.
 * @param  string|array $args     Optional. get_terms optional arguments
 * @return array                  An array of options that matches the CMB2 options array
 */
function cmb2_get_term_options( $taxonomy = 'category' ) {

    $args['taxonomy'] = $taxonomy;
    $args = wp_parse_args( $args, array( 'hide_empty' => 0, 'orderby' => 'id') );
    $taxonomy = $args['taxonomy'];
    $terms = get_terms($taxonomy, array( 'hide_empty' => 0, 'orderby' => 'id') );

    // Initate an empty array
    $term_options = array();
    if ( ! empty( $terms ) ) {
      $term_options[] = 'Select';
        foreach ( $terms as $term ) {
          if ( ($term->parent !== '0' )) {

            //print_r($term);
            $parent = get_term($term->parent, $taxonomy);
            
            if ( ! empty( $parent->name ) ) {
               $parentname = $parent->name;
            }else{
              $parentname = '';
            }

            $term_options[ $term->term_id ] = $parentname.' - '.$term->name;
          }
        }
    }

    return $term_options;
}


/**
 * CMB2 Theme Options
 * @version 0.1.0
 */


class Myprefix_Admin {

  /**
   * Option key, and option page slug
   * @var string
   */
  private $key = 'pcto_options';

  /**
   * Options page metabox id
   * @var string
   */
  private $metabox_id = 'pcto_options_metabox';

  /**
   * Options Page title
   * @var string
   */
  protected $title = '';

  /**
   * Options Page hook
   * @var string
   */
  protected $options_page = '';

  /**
   * Constructor
   * @since 0.1.0
   */
  public function __construct() {
    // Set our title
    $this->title = __( 'Site Options', 'pcto' );
  }

  /**
   * Initiate our hooks
   * @since 0.1.0
   */
  public function hooks() {
    add_action( 'admin_init', array( $this, 'init' ) );
    add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    add_action( 'cmb2_init', array( $this, 'add_options_page_metabox' ) );
  }


  /**
   * Register our setting to WP
   * @since  0.1.0
   */
  public function init() {
    register_setting( $this->key, $this->key );
  }

  /**
   * Add menu options page
   * @since 0.1.0
   */
  public function add_options_page() {
    $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

    // Include CMB CSS in the head to avoid FOUT
    add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
  }

  /**
   * Admin page markup. Mostly handled by CMB2
   * @since  0.1.0
   */
  public function admin_page_display() {
    ?>
    <div class="wrap cmb2-options-page <?php echo $this->key; ?>">
      <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
      <?php cmb2_metabox_form( $this->metabox_id, $this->key, array( 'cmb_styles' => false ) ); ?>
    </div>
    <?php
  }

  /**
   * Add the options metabox to the array of metaboxes
   * @since  0.1.0
   */
  function add_options_page_metabox() {

    $cmb = new_cmb2_box( array(
      'id'      => $this->metabox_id,
      'hookup'  => false,
      'show_on' => array(
        // These are important, don't remove
        'key'   => 'options-page',
        'value' => array( $this->key, )
      ),
    ) );

    // Set our CMB2 fields

    $cmb->add_field( array(
        'name' => 'Friday',
        'id'   => 'friday_date',
        'type' => 'text_datetime_timestamp',
    ) );

    $cmb->add_field( array(
        'name' => 'Saturday',
        'id'   => 'saturday_date',
        'type' => 'text_datetime_timestamp',
    ) );

    $cmb->add_field( array(
        'name' => 'Sunday',
        'id'   => 'sunday_date',
        'type' => 'text_datetime_timestamp',
    ) );



    $cmb->add_field( array(
        'name' => 'Registration Open',
        'id'   => 'registration_open',
        'type' => 'text_datetime_timestamp',
    ) );

    $cmb->add_field( array(
        'name' => 'Registration Closed',
        'id'   => 'registration_closed',
        'type' => 'text_datetime_timestamp',
    ) );

    $cmb->add_field( array(
        'name' => 'Sessions Submission Open',
        'id'   => 'session_open',
        'type' => 'text_datetime_timestamp',
    ) );

    $cmb->add_field( array(
        'name' => 'Sessions Submission Closed',
        'id'   => 'session_closed',
        'type' => 'text_datetime_timestamp',
    ) );
    
    $cmb->add_field( array(
        'name' => 'Saturday Party Time',
        'id'   => 'party',
        'type' => 'text_datetime_timestamp',
    ) );

    $cmb->add_field( array(
        'name' => 'Publish Schedule',
        'desc' => 'Displayed Schedule on website and email presenters',
        'id' => 'pub_schedule',
        'type' => 'checkbox'
    ) );

    $cmb->add_field( array(
        'name'    => 'Friday Social',
        'id'      => 'frisocial',
        'type'    => 'select',
        'options' => cmb2_get_term_options('time_tax', array( 'hide_empty' => 0, 'orderby' => 'id')),
    ) );

    $cmb->add_field( array(
        'name'    => 'Saturday Registration',
        'id'      => 'satreg',
        'type'    => 'select',
        'options' => cmb2_get_term_options('time_tax', array( 'hide_empty' => 0, 'orderby' => 'id')),
    ) );

    $cmb->add_field( array(
        'name'    => 'Keynote',
        'id'      => 'keynote',
        'type'    => 'select',
        'options' => cmb2_get_term_options('time_tax', array( 'hide_empty' => 0, 'orderby' => 'id')),
    ) );

      $cmb->add_field( array(
        'name'    => 'Lunch',
        'id'      => 'lunch',
        'type'    => 'select',
        'options' => cmb2_get_term_options('time_tax', array( 'hide_empty' => 0, 'orderby' => 'id')),
    ) );

      $cmb->add_field( array(
        'name'    => 'Saturday Social',
        'id'      => 'satsocial',
        'type'    => 'select',
        'options' => cmb2_get_term_options('time_tax', array( 'hide_empty' => 0, 'orderby' => 'id')),
    ) );


    $cmb->add_field( array(
        'name'    => 'Sunday Registration',
        'id'      => 'sunreg',
        'type'    => 'select',
        'options' => cmb2_get_term_options('time_tax', array( 'hide_empty' => 0, 'orderby' => 'id')),
    ) );

    $cmb->add_field( array(
        'name'    => 'Town Hall',
        'id'      => 'townhall',
        'type'    => 'select',
        'options' => cmb2_get_term_options('time_tax', array( 'hide_empty' => 0, 'orderby' => 'id')),
    ) );

  }

  /**
   * Public getter method for retrieving protected/private variables
   * @since  0.1.0
   * @param  string  $field Field to retrieve
   * @return mixed          Field value or exception is thrown
   */
  public function __get( $field ) {
    // Allowed fields to retrieve
    if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
      return $this->{$field};
    }

    throw new Exception( 'Invalid property: ' . $field );
  }

}

/**
 * Helper function to get/return the Myprefix_Admin object
 * @since  0.1.0
 * @return Myprefix_Admin object
 */
function myprefix_admin() {
  static $object = null;
  if ( is_null( $object ) ) {
    $object = new Myprefix_Admin();
    $object->hooks();
  }

  return $object;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function myprefix_get_option( $key = '' ) {
  return cmb2_get_option( myprefix_admin()->key, $key );
}

// Get it started
myprefix_admin();













add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
  add_submenu_page( 'pcto_options', 'Schedule Notices', 'Schedule Notices', 'manage_options', 'shchedule-notice-page', 'my_custom_submenu_page_callback' );
}

function my_custom_submenu_page_callback() {
  
  echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
    echo '<h2>Schedule Notice Centre</h2>';
  
  if (isset(get_option( 'pcto_options' )['pub_schedule'])) {

echo '<br/>
<button class="ajax_email">Send Schedule</button>';

    schedule_dashboard_widget_function();

    
  }

  echo '</div>';

}




