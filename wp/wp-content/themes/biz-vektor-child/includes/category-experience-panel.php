<article id="post-<?php the_ID(); ?>" class="entry-content article">
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

      <div class="inner">
        <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <div class="profileWrap">

          <?php while(have_rows('experience_table')): the_row(); ?>
          <ul class="experienceTable row">
            <li class="medium-6 columns">
              <dl class="experienceTable__column">
                <dt class="experienceTable__column__title">治療した傷跡</dt>
                <dd class="experienceTable__column__content"><?php echo the_sub_field('exp_treatment_type'); ?></dd>
              </dl>
            </li>
            <li class="medium-6 columns">
              <dl class="experienceTable__column">
                <dt class="experienceTable__column__title">治療方法</dt>
                <dd class="experienceTable__column__content"><?php echo the_sub_field('exp_treatment_method'); ?></dd>
              </dl>
            </li>
            <li class="medium-6 columns">
              <dl class="experienceTable__column">
                <dt class="experienceTable__column__title">治療期間</dt>
                <dd class="experienceTable__column__content"><?php echo the_sub_field('exp_treatment_period'); ?></dd>
              </dl>
            </li>
            <li class="medium-6 columns">
              <dl class="experienceTable__column">
                <dt class="experienceTable__column__title">氏名</dt>
                <dd class="experienceTable__column__content"><?php echo the_sub_field('exp_name'); ?></dd>
              </dl>
            </li>
            <li class="medium-6 columns">
              <dl class="experienceTable__column">
                <dt class="experienceTable__column__title">性別</dt>
                <dd class="experienceTable__column__content"><?php echo the_sub_field('exp_sex'); ?></dd>
              </dl>
            </li>
            <li class="medium-6 columns">
              <dl class="experienceTable__column">
                <dt class="experienceTable__column__title">住所</dt>
                <dd class="experienceTable__column__content"><?php echo the_sub_field('exp_address'); ?></dd>
              </dl>
            </li>
            <li class="medium-6 columns singleColumn">
              <dl class="experienceTable__column">
                <dt class="experienceTable__column__title">利用した病院／クリニック</dt>
                <dd class="experienceTable__column__content"><?php echo the_sub_field('exp_clinic'); ?></dd>
              </dl>
            </li>
          </ul>
          <?php endwhile; ?>
        </div>
        <div class="btnWrap">
          <a href="<?php the_permalink(); ?>" title="詳細を見る" class="btnLightBlue">詳細を見る</a>
          <a href="tel:0120-697-182" onclick="ga('send', 'event', '電話リンク', 'タップ', '一覧ボタン');" title="無料で電話相談" class="btnLightGreen">無料で電話相談</a>
          <a href="/contact-form/" title="フォームで相談" class="btnBlue">フォームで相談</a>
        </div>
      </div>
  </article><!-- .entry-content -->