<?php
/*
  Template Name: clinic page
*/

$post_search = $_GET['s'];
$post_category_slug = $_GET['category_name'];
$post_tag_slug = $_GET['tag'];

global $query_string;
parse_str($query_string, $query_array);

if( isset($post_search)) {
  $post_args = array(
    's'             => $post_search,
    'post_type'     => 'post',
    'category_name' => $post_category_slug,
    'tag'              => $post_tag_slug,
    'posts_per_page'   => 5
  );
}
else {
  $post_args = array(
  	'post_type'        => 'post',
    'posts_per_page'   => 5
  );
}

$merged_args = array_merge($query_array, $post_args);
$myposts = get_posts( $post_args );

// $myposts = new WP_Query( $post_args );

// echo "<pre>";
// var_dump($post_tag_slug);
// echo "</pre>";
?>
<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/category', 'clinic-search' ); ?>
    </section>
    <!-- [ /#search ] -->

    <?php if ( $myposts ) { ?>
    <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
      <?php get_template_part( 'includes/category', 'clinic-panel' ); ?>
    <?php endforeach;
    wp_reset_postdata();?>

  <!-- pagination here -->
  <div class="pagination--holder">
    <?php
      $args = array(
        'show_all' 			=> true,
      );
      wp_simple_pagination( $args );
    ?>
  </div>

  <?php
  }
  else {
    echo 'お探しの検索は該当がありません。';
  }
  ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
