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

// JQuery , easie and JCarousel
function my_scripts_method() {
   if (!is_admin()) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
        // register your script location, dependencies and version
   // enqueue the script
   wp_enqueue_script('jquery');}
}

add_action('wp_enqueue_scripts', 'my_scripts_method');

// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.
function myTruncate($string, $limit, $break=".", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }
    
  return $string;
}

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
# TRASH!
// For comments
function thejuice_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :     
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li id="comment-<?php comment_ID(); ?>" <?php if($comment->user_id==1) echo "class='comentariodeautor'"; elseif($comment % 2) echo "$oddcomment"; ?>>
	<span class="gravatar"><?php echo get_avatar( $comment, 50 ); ?></span>
	<?php comment_text() ?>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Responder <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
<p class="meta"><?php comment_type(); ?> <?php _e('@'); ?> <?php comment_author_link() ?> 
<?php comment_date('j/m/Y') ?> a las <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a>
 <span><?php echo $i; ?></span>
<?php edit_comment_link(__("Edit This"), ' | '); ?></p>
	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>


	<?php
			break;
	endswitch;
}
?>
