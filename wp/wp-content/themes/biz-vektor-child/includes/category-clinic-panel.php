<article id="post-<?php the_ID(); ?>" class="entry-content article">
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
    <div class="officeWrap">
      <div class="inner">
        <div class="profileWrap">
          <div class="leftWrap">
            <img src="<?php echo get_field('clinic_image')["sizes"]["thumbnail"]; ?>" alt="<?php the_title(); ?>" />

            <div class="categoryTermsWrap"><?php the_category(); ?></div>
            <div class="tagTermsWrap">
              <ul>
                <?php
                $primary_tags = wp_get_post_tags( get_the_id());
                foreach ($primary_tags as $tag) { ?>
                  <li>
                    <a class="card--tag-link" href="<?php echo get_term_link( $tag->term_id ); ?> ">
                      <?php echo $tag->name; ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </div>

            <div class="tagTermsWrap">
              <ul>
                <?php
                $secondary_tags = wp_get_post_terms( get_the_id() , 'secondary-tags');
                foreach ($secondary_tags as $tag) { ?>
                  <li>
                    <a class="card--tag-link" href="<?php echo get_term_link( $tag->term_id ); ?> ">
                      <?php echo $tag->name; ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </div>

          </div>
          <div class="detailWrap">
            <h3 class="title clinic--title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
            <div class="clinic--intro">
              <?php echo get_field('clinic_introduction'); ?>
            </div>
            <table>
              <tr>
                <th>住所</th>
                <th><?php echo get_field('clinic_address'); ?></th>
              </tr>
              <tr>
                <td>アクセス</td>
                <td><?php echo get_field('clinic_access'); ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="btnWrap">
          <a href="tel:0120-697-182" title="電話で無料相談" class="btnLightGreen" onclick="ga('send', 'event', '電話リンク', 'タップ', '一覧ボタン');">電話で無料相談</a>
          <!-- <a href="/contact-form/?office=<?php the_title(); ?>" title="資料請求" class="btnLightBlue">資料請求</a> -->
          <a href="/contact/?clinic=<?php the_title(); ?>" title="フォームで無料相談" class="btnBlue">フォームで無料相談</a>
        </div>
      </div>
      <a href="<?php the_permalink(); ?>"  title="詳細ページへ" class="linkToDetail">▶︎&nbsp;詳細ページへ</a>
    </div>

  </article><!-- .entry-content -->
