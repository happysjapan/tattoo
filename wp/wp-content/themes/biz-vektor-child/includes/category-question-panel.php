<article id="post-<?php the_ID(); ?>" class="article table--cell question-card">
  <div class="inner">
    <?php $image = get_field('question_image'); ?>
    <img src="<?php echo $image['url']; ?>" class="question-card--image">
    <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
    <div class="profileWrap">
      <div class="detailWrap">
        <div class="textWrap">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>

  <a href="<?php the_permalink(); ?>" class="question-card--linkToDetail linkToDetail" title="詳細ページへ">▶︎&nbsp;詳細ページへ </a>
</article>
