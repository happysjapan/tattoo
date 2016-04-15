<?php
$post_args = array(
  'posts_per_page'   => 5,
  'post_type'        => 'question',
  'orderby'          => 'date',
	'order'            => 'DESC'
);

$the_query = new WP_Query( $post_args );
?>


<div class="sideWidget">
  <h3 class="localHead">新着就職・就活事例一覧</h3>
  <div class="ttBoxSection">
    <?php if ( $the_query->have_posts() ) {

      while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <div class="ttBox study" id="post-<?php echo get_the_id(); ?>">
          <div>
            <a href="<?php echo get_the_permalink(); ?>">
              <?php echo get_the_post_thumbnail( $post_id, $size, $attr ); ?>
              <p><?php echo the_title(); ?></p>
            </a>
          </div>
        </div>

    <?php endwhile;
    }
    else {
      echo 'No result';
    }
    ?>
    <div class="more"><a href="/study/" title="もっと見る">もっと見る</a></div>
  </div>
</div>
