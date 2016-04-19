<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
  <h1 class="page--title">タトゥー・刺青除去／リストカット跡／根性焼き消し</h1>

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      global $query_string;
      parse_str($query_string, $query_array);

      $custom_args = array(
        'post_type' => 'question',
        'post_status' => 'publish',
        'orderby' => 'date',
        'posts_per_page' => 6,
        'paged' => $paged
      );
      $custom_args = array_merge($query_array, $custom_args);
      // $custom_query = get_posts( $custom_args );
      $custom_query = new WP_Query( $custom_args );

      ?>

      <?php
      $i=0;
      ?>
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
          <?php if( $i == 0 ){ ?>
            <div class="row">
          <?php }
          else if( $i%3 == 0 ){ ?>
            </div>
            <div class="row">
          <?php } ?>
          <div class="medium-4 columns end">
            <?php get_template_part( 'includes/category', 'question-panel' ); $i++; ?>
          </div>
        <?php endwhile; ?>
      </div>
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
