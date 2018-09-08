<?php
if (function_exists('add_theme_support')) { // a partir de WP 2.9
  add_theme_support('post-thumbnails'); // activa las miniaturas
  add_image_size('xxlarge', 1400, 700, true); // tamaño concreto
  add_image_size('xlarge', 1080, 540, true); // tamaño concreto
  add_image_size('large', 800, 400, true); // tamaño concreto
  add_image_size('medium', 300, 250, true); // tamaño concreto
  add_image_size('square', 400, 400, true); // tamaño concreto
  update_option( 'thumbnail_size_w', 120 );
  update_option( 'thumbnail_size_h', 120 ); // thumbnail avatar used
  set_post_thumbnail_size( 336, 215, true );
}

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
  return $html;
}
?>
