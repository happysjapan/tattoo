<?php
// store the post type from the URL string
$post_type = $_GET['post_type'];
// check to see if there was a post type in the
// URL string and if a results template for that
// post type actually exists
if ( isset( $post_type ) && locate_template( 'search-' . $post_type . '.php' ) ) {
  // if so, load that template
  get_template_part( 'search', $post_type );

  // and then exit out
  exit;
}
?>

<!-- default search results here -->
