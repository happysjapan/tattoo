<?php

$post_args = array(
  'posts_per_page'   => 5,
  'post_type'        => 'experience',
  'orderby'          => 'date',
	'order'            => 'DESC'
);

$the_query = new WP_Query( $post_args );
?>


<div class="sideWidget">
  <h3 class="localHead">新着セミナー・説明会一覧</h3>
  <div class="ttBoxSection">
    <?php if ( $the_query->have_posts() ) {

      while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <div class="ttBox" id="post-<?php echo get_the_id(); ?>">
          <div>
            <a href="<?php echo get_the_permalink(); ?>" title="<?php echo the_title(); ?>">
              <p>
              <?php while(have_rows('seminar_table')): the_row();
                $date = strtotime(get_sub_field('seminar_opening_date'));
                $year = date( 'Y', $date);
                $month = date( 'm', $date);
                $day = date( 'd', $date);
                $day_text = date( 'D', $date);
                $day_text_ja = yotsubanoha_get_ja_day($day_text);
                $pfx_date = $month.'月'.$day.'日（'.$day_text_ja.'）';
              ?>
                <span>
                  <?php echo $pfx_date; ?>
                </span>
              <?php endwhile; ?>
              </p>

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
    <div class="more"><a href="/experience/" title="もっと見る">もっと見る</a></div>
  </div>
</div>
