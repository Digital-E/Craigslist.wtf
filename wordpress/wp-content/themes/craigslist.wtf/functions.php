<?php /**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
// define('ACF_EARLY_ACCESS', '5');
add_filter( 'https_ssl_verify', '__return_false' );

// require_once('bs4navwalker.php');
// register_nav_menu('top', 'Top menu');

function craigslistwtf_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_register_style('flexslider', get_template_directory_uri() . '/flexslider.css');
    $dependencies = array('bootstrap','flexslider');
    wp_enqueue_style( 'craigslistwtf-style', get_stylesheet_uri(), $dependencies );
}

function craigslistwtf_enqueue_scripts() {
    wp_register_script('flexsliderJS', get_template_directory_uri(). '/jquery.flexslider.js');
    $dependencies = array('jquery','flexsliderJS');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'craigslistwtf_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'craigslistwtf_enqueue_scripts' );


add_action( 'wp_enqueue_scripts', 'theme_register_scripts', 1 );
	function theme_register_scripts() {
	  /** Register JavaScript Functions File */
	  // wp_register_script( 'functions-js', esc_url( trailingslashit( get_template_directory_uri() ) . 'functions.js' ), array( 'jquery' ), time(), true );
    wp_register_script( 'functions-js', esc_url( trailingslashit( get_template_directory_uri() )) . 'functions.js' );
    // wp_register_script('flexslider', esc_url( trailingslashit( get_template_directory_uri() )) .'jquery.flexslider.js');
	  /** Localize Scripts */
	  $wp_ajax = array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) );
	  wp_localize_script( 'functions-js', 'wp_ajax', $wp_ajax );

	}

	/** Enqueue Scripts. */
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
	function theme_enqueue_scripts() {
	  wp_enqueue_script( 'functions-js' );

	}

  add_action("wp_ajax_single", "get_single");
  add_action("wp_ajax_nopriv_single", "get_single");

  function get_single() {
    global $post;
    $post_id = $_REQUEST['id'];

    if($post_id) {
      $post = get_post($post_id);
      setup_postdata($post);
      get_template_part('content', 'ajax');
      die();
    }
  }

  add_action("wp_ajax_single2", "get_single2");
  add_action("wp_ajax_nopriv_single2", "get_single2");

  function get_single2() {

      get_template_part('content', 'ajax2');

      die();
    }


function my_pre_save_post( $post_id ) {

    // check if this is to be a new post
    if( $post_id != 'new' ) {

        return $post_id;

    }

    // Create a new post
    $categories = $_POST['acf']['field_5b7d3a8b10730'];
    $categoriesArray = explode(" ",$categories);
    $post = array(
        'post_category' => $categoriesArray,
        'post_status'  => 'draft',
        'post_title'  => $_POST['acf']['field_5b68289cdc6b2'],
        'post_type'  => 'post' ,
    );

    // insert the post
    $post_id = wp_insert_post( $post );

    // return the new ID
    return $post_id;

}

add_filter('acf/pre_save_post' , 'my_pre_save_post', 10, 1 );


add_filter('acf/validate_value/key=field_5b6829e50ce56', 'my_validate_function', 10, 4);

function my_validate_function($valid, $value, $field, $input) {
    $email = $_POST['acf']['field_5b6829e50ce56'];
    $email_confirmation = $_POST['acf']['field_5b6829eda2de4'];

    if ($email !== $email_confirmation ) {
        $valid = "Email addresses must match";
    }
    return $valid;
}


function search_filter($query) {

  if ( !is_admin() && $query->is_main_query() && $query->is_search ) {
    if(empty(get_search_query())) { wp_redirect( home_url() );
      exit();}


    if ($query->is_search) {
      $query->set('post_type', 'post');
    }
  }
}

add_action('pre_get_posts','search_filter');

?>
