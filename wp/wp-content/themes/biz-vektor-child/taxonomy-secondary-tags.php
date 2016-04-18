<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
  <?php if(isset($term)){ ?>
    <h1 class="category--title"><?php echo $term->name; ?>の就労移行支援に関する説明会・セミナー</h1>
    <div class="category-description">
      <?php echo $term->description; ?>
    </div>
  <?php } ?>

  <!-- [ #content ] -->
  <section id="content" class="content wide">
    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/category', 'clinic-search' ); ?>
    </section>
    <!-- [ /#search ] -->

    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      global $query_string;
      parse_str($query_string, $query_array);


      $custom_args = array(
        'post_type' => array('post', 'experience', 'question'),
        'post_status' => 'publish',
        'orderby' => 'date',
        'posts_per_page' => 10,
        'paged' => $paged
      );
      $custom_args = array_merge($query_array, $custom_args);
      // $custom_query = get_posts( $custom_args );
      $custom_query = new WP_Query( $custom_args );

      ?>

      <!-- the loop -->
      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
        <?php get_template_part( 'includes/category', 'clinic-panel' ); ?>
        <!-- .entry-content -->
      <?php endwhile; ?>
      <!-- end of the loop -->

      <!-- pagination -->
      <?php
        if (function_exists(custom_pagination)) {
          custom_pagination($custom_query->max_num_pages,"",$paged);
        }
      ?>
      <!-- end of pagination -->


  </section>
  <!-- [ /#content ] -->


</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
