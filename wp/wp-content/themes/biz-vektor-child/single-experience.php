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


		<div class="textWrap">
			<?php the_content(); ?>
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
