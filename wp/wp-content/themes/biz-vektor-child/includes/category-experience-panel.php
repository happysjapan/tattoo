<article id="post-<?php the_ID(); ?>" class="entry-content article">
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

      <div class="inner">
        <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <div class="profileWrap">

          <!-- <div class="leftWrap">
            <div class="categoryTermsWrap">
              <ul>
                <?php $tax_terms = wp_get_post_terms( get_the_id(), 'experience-cat' );
                foreach ($tax_terms as $tax_term) { ?>
                  <li><a href="<?php echo get_term_link( $tax_term->term_id ); ?>"><?php echo $tax_term->name; ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div> -->

          <div class="detailWrap">

            <?php while(have_rows('experience_table')): the_row(); ?>
            <ul class="experienceTable row">
              <li class="medium-6 columns">
                <dl>
                  <dt>治療した傷跡</dt>
                  <dd><?php echo the_sub_field('exp_treatment_type'); ?></dd>
                </dl>
              </li>
              <li class="medium-6 columns">
                <dl>
                  <dt>治療方法</dt>
                  <dd><?php echo the_sub_field('exp_treatment_method'); ?></dd>
                </dl>
              </li>
              <li class="medium-6 columns">
                <dl>
                  <dt>治療期間</dt>
                  <dd><?php echo the_sub_field('exp_treatment_period'); ?></dd>
                </dl>
              </li>
              <li class="medium-6 columns">
                <dl>
                  <dt>氏名</dt>
                  <dd><?php echo the_sub_field('exp_name'); ?></dd>
                </dl>
              </li>
              <li class="medium-6 columns">
                <dl>
                  <dt>性別</dt>
                  <dd><?php echo the_sub_field('exp_sex'); ?></dd>
                </dl>
              </li>
              <li class="medium-6 columns">
                <dl>
                  <dt>住所</dt>
                  <dd><?php echo the_sub_field('exp_address'); ?></dd>
                </dl>
              </li>
              <li class="medium-6 columns">
                <dl>
                  <dt>利用した病院／クリニック</dt>
                  <dd><?php echo the_sub_field('exp_clinic'); ?></dd>
                </dl>
              </li>
            </ul>
            <?php endwhile; ?>

            <div class="textWrap">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="btnWrap">
        <a href="<?php the_permalink(); ?>" title="詳細を見る" class="btnLightBlue">詳細を見る</a>
        <a href="tel:0120-697-182" title="無料で電話相談" class="btnLightGreen">無料で電話相談</a>
        <a href="/contact-form/" title="フォームで相談" class="btnBlue">フォームで相談</a>
      </div>
  </article><!-- .entry-content -->