<?php

//define( 'ACF_LITE' , true );
// Register new post type event

add_action( 'init', 'create_event' );
function create_event() {
  register_post_type( 'event',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )
        ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'events'),
      'supports' => array('title', 'editor', 'thumbnail')
      )
    );
  $args_categories = array(
    'label' => 'Categories',
    'show_ui' => true,
    'hierarchical' => true,
    'show_admin_column' => true,
    'query_var'         => true
    );

  register_taxonomy( 'events_categories', 'event' , $args_categories);
}

//Register new sidebar

if ( function_exists('register_sidebar') )
	register_sidebar(array(
    'before_widget' => '<div class="cajita">',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ));

// Featured thumbnail

if ( function_exists( 'add_theme_support' ) )
  add_theme_support( 'post-thumbnails');

add_image_size('small-home', 700, 250, true);
add_image_size('single-feature', 700, 250, true);
add_image_size('big-background', 1700, 937, true);


// Codecantor functions
function cc_body_tags() {
  if ( is_single() || ( is_page() && !is_front_page() ) ) {
    if (is_page() && !is_front_page() ) {
     $_cl = "page";
   } else {
    $_cl = "post";
  }
  $_post = get_queried_object();
  $_posts = get_post_ancestors($_post);
  $_cl = $_cl." ".$_post->post_name;
  foreach($_posts as $cpost) {
    $_cl = $_cl." ".$cpost->post_name;
  }
  echo "class='".$_cl."'";

}

}
?>