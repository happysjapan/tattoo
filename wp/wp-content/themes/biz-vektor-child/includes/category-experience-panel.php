<article id="post-<?php the_ID(); ?>" class="entry-content article">
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

      <div class="inner">
        <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <div class="profileWrap">

          <div class="leftWrap">
            <div class="categoryTermsWrap">
              <ul>
                <?php $tax_terms = wp_get_post_terms( get_the_id(), 'experience-cat' );
                foreach ($tax_terms as $tax_term) { ?>
                  <li><a href="<?php echo get_term_link( $tax_term->term_id ); ?>"><?php echo $tax_term->name; ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>

          <div class="detailWrap">

            <?php while(have_rows('seminar_table')): the_row();
            $date = strtotime(get_sub_field('seminar_opening_date'));
            ?>
            <table>
              <tbody>
                <tr>
                  <th>日時</th>
                  <td>
                    <?php echo date('Y', $date).'年'.date('n', $date).'月'.date('d', $date).'日'; ?>
                    <?php echo the_sub_field('seminar_opening_time'); ?>
                  </td>
                </tr>
                <tr>
                  <th>会場</th>
                  <td><?php echo the_sub_field('seminar_place'); ?></td>
                </tr>
              </tbody>
            </table>
            <?php endwhile; ?>

            <div class="textWrap">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>

      <p><a href="<?php the_permalink(); ?>"" class="linkToDetail" title="詳細ページへ">▶︎&nbsp;詳細ページへ</a></p>
  </article><!-- .entry-content -->
