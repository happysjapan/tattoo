<?php
$post_search = $_GET['s'];
$post_type = $_GET['post_type'];
$post_slug = $_GET['experience_cat'];

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
global $query_string;
parse_str($query_string, $query_array);

if (isset($post_slug) && $post_slug != '') {
  $taxonomy = 'experience-cat';
  $post_term = get_terms( $taxonomy, 'slug='.$post_slug);
  $post_term_id = $post_term[0]->term_id;
  $post_args = array(
    's' => $post_search,
    'post_type' => $post_type,
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $post_term_id,
      )
    ),
    'post_status' => 'publish',
    'orderby' => 'date',
    'posts_per_page' => 5,
    'paged' => $paged
  );
} else {
  $post_args = array(
    's' => $post_search,
    'post_type' => $post_type,
    'post_status' => 'publish',
    'orderby' => 'date',
    'posts_per_page' => 5,
    'paged' => $paged
  );
}

$custom_args = array_merge($query_array, $post_args);
$the_query = new WP_Query( $custom_args );
?>
<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
  <?php
  $page_title = get_post_type_object('experience')->labels->name;

  if( (isset($post_search) && $post_search != '') || (isset($post_slug) && $post_slug != '') ){
    $page_title = '検索結果：';
    if( isset($post_slug) && $post_slug != '') {
      $post_category = get_category_by_slug( $post_slug );
      $page_title .= $post_category->cat_name;
    }
    if( isset($post_search) && $post_search != '') {
      if( (isset($post_slug) && $post_slug != '') ) {
        $page_title .= ' × '. $post_search;
      }
      else {
        $page_title .= $post_search;
      }
    }
  } ?>
  <h1 class="page--title"><?php echo $page_title; ?></h1>

  <!-- [ #content ] -->
  <section id="content" class="content wide">
    <p class="searchDescription"><?php echo do_shortcode('[contentblock id=seminar_description]'); ?></p>
    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/category', 'experience-search' ); ?>
    </section>
    <!-- [ /#search ] -->

  <?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <?php get_template_part( 'includes/category', 'experience-panel' ); ?>
    <!-- .entry-content -->
  <?php endwhile; ?>

  <!-- pagination -->
  <?php
    if (function_exists(custom_pagination)) {
      custom_pagination($the_query->max_num_pages,"",$paged);
    }
  ?>
  <!-- end of pagination -->

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
