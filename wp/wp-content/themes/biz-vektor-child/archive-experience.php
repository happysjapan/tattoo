<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
  <h1 class="page--title">タトゥー・刺青除去／リストカット跡／根性焼き消し</h1>

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <!-- [ #search ] -->
    <section class="searchArea">
      <p class="searchDescription"><?php echo do_shortcode('[contentblock id=seminar_description]'); ?></p>
      <?php get_template_part( 'includes/category', 'experience-search' ); ?>
      <div class="consultBox"><img src="/wp-content/uploads/2016/01/konohikaraside.jpg" alt="" width="200"> <a title="相談する" class="btn" href="http://konohikara.com">相談する</a></div>
    </section>
    <!-- [ /#search ] -->

    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      global $query_string;
      parse_str($query_string, $query_array);

      $custom_args = array(
        'post_type' => 'experience',
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
        <?php get_template_part( 'includes/category', 'experience-panel' ); ?>
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
