<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content" class="content wide">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'includes/social', 'buttons' ); ?>

<!-- [ #post- ] -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="entryPostTitle entry-title"><?php the_title(); ?><?php edit_post_link(__('Edit', 'biz-vektor'), ' <span class="edit-link edit-item">[ ', ' ]' ); ?></h1>

	<div class="entry-content post-content">
		<img src="<?php echo get_field('seminar_image'); ?>" alt="" class="mainImage" />

		<h2 class="title">■&nbsp;開催情報</h2>

        <?php while(have_rows('seminar_table')): the_row();
        $date = strtotime(get_sub_field('seminar_opening_date'));
        ?>
		<table>
			<tbody>
				<tr>
				  <th>日時</th>
				  <td>
                    <?php echo date('Y', $date).'年'.date('n', $date).'月'.date('d', $date).'日'; ?>&nbsp;<?php echo the_sub_field('seminar_opening_time'); ?></td>
				</tr>
				<tr>
				  <th>会場</th>
				  <td><?php echo the_sub_field('seminar_place'); ?></td>
				</tr>
				<tr>
				  <th>参加費</th>
				  <td><?php echo the_sub_field('seminar_fee'); ?></td>
				</tr>
				<tr>
				  <th>アクセス</th>
				  <td><?php echo the_sub_field('seminar_access'); ?></td>
				</tr>
			</tbody>
		</table>
		<?php endwhile; ?>


		<div class="textWrap">
			<?php the_content(); ?>
		</div>
		<div class="btnWrap">
			<a href="tel:0120-697-182" onclick="ga('send', 'event', '電話リンク', 'タップ', '一覧ボタン');" class="btnLightGreen" title="電話でのお問い合わせ">電話でのお問い合わせ</a>
			<a href="/seminar-form/?seminar=<?php the_title(); ?>" class="btnBlue" title="フォームでのお申し込み">フォームでのお申し込み</a>
		</div>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

<?php edit_post_link(__('Edit', 'biz-vektor'),'<div class="adminEdit"><span class="linkBtn linkBtnS linkBtnAdmin">','</span></div>'); ?>

<?php do_action('biz_vektor_snsBtns'); ?>

</div>
<!-- [ /#post- ] -->

<?php get_template_part( 'includes/social', 'buttons' ); ?>

<div id="nav-below" class="navigation">
	<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
	<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
</div><!-- #nav-below -->

<?php do_action('biz_vektor_fbComments'); ?>

<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

<?php do_action('biz_vektor_fbLikeBoxDisplay'); ?>

</div>
<!-- [ /#content ] -->

<!-- [ #sideTower ] -->
<!-- <div id="sideTower" class="sideTower">
	<?php get_sidebar('info'); ?>
</div>
 --><!-- [ /#sideTower ] -->
<?php biz_vektor_sideTower_after();?>
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
