<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
<!-- [ #content ] -->
<div id="content" class="content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="entry-content">
	<?php the_content(); ?>
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
</div><!-- .entry-content -->

<?php edit_post_link(__('Edit', 'biz-vektor'),'<div class="adminEdit"><span class="linkBtn linkBtnS linkBtnAdmin">','</span></div>'); ?>

<?php endwhile; ?>

<?php // Child page list ?>
<?php
	if($post->ancestors){
		foreach($post->ancestors as $post_anc_id){
			$post_id = $post_anc_id;
		}
	} else {
		$post_id = $post->ID;
	}
	if ($post_id) {
		$children = wp_list_pages("title_li=&child_of=".$post_id."&echo=0");
		if ($children) { ?>
		<div class="childPageBox">
		<h4><a href="<?php echo get_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></h4>
		<ul>
		<?php echo $children; ?>
		</ul>
		</div>
		<?php } ?>
<?php } ?>
<?php // /Child page list ?>

<?php get_template_part('module_mainfoot'); ?>

<?php do_action('biz_vektor_snsBtns'); ?>
<?php do_action('biz_vektor_fbComments'); ?>
<?php do_action('biz_vektor_fbLikeBoxDisplay'); ?>

</div>
<!-- [ /#content ] -->

<!-- [ #sideTower ] -->
<div id="sideTower" class="sideTower">
<?php
if ( is_active_sidebar( 'common-side-top-widget-area' ) ) dynamic_sidebar( 'common-side-top-widget-area' );
if ( is_active_sidebar( 'top-side-widget-area' ) ) :
dynamic_sidebar( 'top-side-widget-area' );
else :
// ウィジェットに設定がない場合
if (function_exists('biz_vektor_contactBtn'))    biz_vektor_contactBtn();
if (function_exists('biz_vektor_snsBnrs'))       biz_vektor_snsBnrs();
endif;
if ( is_active_sidebar( 'common-side-bottom-widget-area' ) ) dynamic_sidebar( 'common-side-bottom-widget-area' );
?>
	<?php get_template_part( 'includes/front', 'sidebar-info' ); ?>
	<?php get_template_part( 'includes/front', 'sidebar-study' ); ?>
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
