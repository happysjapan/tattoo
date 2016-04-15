<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content" class="content frontpage">
	<?php biz_vektor_contentMain_before();?>
	<div id="content-main">

	<form name="searchform1" id="searchform1" method="get" action="<?php bloginfo( 'url' ); ?>/47zenkoku">
	<div class="areaSearch">
		<h2>全国の就労移行支援事業所を検索</h2>
		<div class="searchInner">
		<ul class="listP">


		<?php
		    // リンク先URL
			function lawyerCategoryLink($type = "tokyo")
			{
			    return get_category_link(get_category_by_slug($type)->term_id);
			}
		?>

		<li><h3>北海道・東北エリア</h3>
		     <ul class="listC">
					 <?php echo get_category_link(get_category_by_slug('faculty')->term_id); ?>
			 	<li><a href="<?php echo lawyerCategoryLink("hokkaido");?>">北海道</a></li>
			 	<li><a href="<?php echo lawyerCategoryLink("aomori");?>">青森県</a></li>
			 	<li><a href="<?php echo lawyerCategoryLink("iwate");?>">岩手県</a></li>
			 	<li><a href="<?php echo lawyerCategoryLink("miyagi");?>">宮城県</a></li>
			 	<li><a href="<?php echo lawyerCategoryLink("akita");?>">秋田県</a></li>
			 	<li><a href="<?php echo lawyerCategoryLink("yamagata");?>">山形県</a></li>
			 	<li><a href="<?php echo lawyerCategoryLink("fukushima");?>">福島県</a></li>
		     </ul>
		</li>
		<li><h3>関西エリア</h3>
		       <ul class="listC">
					   <li><a href="<?php echo lawyerCategoryLink("osaka");?>">大阪府</a></li>
					   <li><a href="<?php echo lawyerCategoryLink("hyogo");?>">兵庫県</a></li>
					   <li><a href="<?php echo lawyerCategoryLink("kyoto");?>">京都府</a></li>
					   <li><a href="<?php echo lawyerCategoryLink("shiga");?>">滋賀県</a></li>
					   <li><a href="<?php echo lawyerCategoryLink("nara");?>">奈良県</a></li>
					   <li><a href="<?php echo lawyerCategoryLink("wakayama");?>">和歌山県</a></li>
				</ul>
		</li>
		<li><h3>甲信越・北陸エリア</h3>
		     <ul class="listC">
					 <li><a href="<?php echo lawyerCategoryLink("yamanashi");?>">山梨県</a></li>
					 <li><a href="<?php echo lawyerCategoryLink("nigata");?>">新潟県</a></li>
					 <li><a href="<?php echo lawyerCategoryLink("nagano");?>">長野県</a></li>
					 <li><a href="<?php echo lawyerCategoryLink("toyama");?>">富山県</a></li>
					 <li><a href="<?php echo lawyerCategoryLink("ishikawa");?>">石川県</a></li>
					 <li><a href="<?php echo lawyerCategoryLink("fukui");?>">福井県</a></li>
				 </ul>
		</li>
		<li><h3>中国・四国エリア</h3>
		      <ul class="listC">
					<li><a href="<?php echo lawyerCategoryLink("tottori");?>">鳥取県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("shimane");?>">島根県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("okayama");?>">岡山県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("hiroshima");?>">広島県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("yamaguchi");?>">山口県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("tokushima");?>">徳島県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("kagawa");?>">香川県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("ehime");?>">愛媛県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("kochi");?>">高知県</a></li>
					</ul>
		</li>
		<li><h3>関東エリア</h3>
		     <ul class="listC">
				 	<li><a href="<?php echo lawyerCategoryLink("tokyo");?>">東京都</a></li>
				 	<li><a href="<?php echo lawyerCategoryLink("kanagawa");?>">神奈川県</a></li>
				 	<li><a href="<?php echo lawyerCategoryLink("saitama");?>">埼玉県</a></li>
				 	<li><a href="<?php echo lawyerCategoryLink("chiba");?>">千葉県</a></li>
				 	<li><a href="<?php echo lawyerCategoryLink("ibaraki");?>">茨城県</a></li>
				 	<li><a href="<?php echo lawyerCategoryLink("tochigi");?>">栃木県</a></li>
				 	<li><a href="<?php echo lawyerCategoryLink("gunma");?>">群馬県</a></li>
			 </ul>
		</li>
		<li><h3>九州・沖縄エリア</h3>
		      <ul class="listC">
				<li><a href="<?php echo lawyerCategoryLink("fukuoka");?>">福岡県</a></li>
				<li><a href="<?php echo lawyerCategoryLink("saga");?>">佐賀県</a></li><li>
				<a href="<?php echo lawyerCategoryLink("nagasaki");?>">長崎県</a></li>
				<li><a href="<?php echo lawyerCategoryLink("kumamoto");?>">熊本県</a></li>
				<li><a href="<?php echo lawyerCategoryLink("oita");?>">大分県</a></li>
				<li><a href="<?php echo lawyerCategoryLink("miyazaki");?>">宮崎県</a></li>
				<li><a href="<?php echo lawyerCategoryLink("kagoshima");?>">鹿児島県</a></li>
				<li><a href="<?php echo lawyerCategoryLink("okinawa");?>">沖縄県</a></li>
			</ul>
		</li>
			<li><h3>東海エリア</h3>
		     <ul class="listC">
					<li><a href="<?php echo lawyerCategoryLink("aichi");?>">愛知県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("gifu");?>">岐阜県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("shizuoka");?>">静岡県</a></li>
					<li><a href="<?php echo lawyerCategoryLink("mie");?>">三重県</a></li>
			</ul>
		</li>
		<li class="cSelect">
			<?php
			$subcategories_parent = get_category_by_slug('47zenkoku');
	    $sub_args = array('child_of' => $subcategories_parent->term_id);
	    $subcategories = get_categories( $sub_args );

			$tags_array = get_tags();
			?>
			<div class="select-box">
        <label for ="searchSelect" class="search--form--label">条件でお選びください
        <select id="searchSelect" name="tag" class="search--form--select">
					<option value="">条件</option>
          <?php
            foreach ($tags_array as $tag_elem) {
              if( wp_specialchars($tag, 1) == $tag_elem->slug ) {
                echo '<option value="'.$tag_elem->slug.'" selected>'.$tag_elem->name.'</option>';
              }
              else {
                echo '<option value="'.$tag_elem->slug.'">'.$tag_elem->name.'</option>';
              }
            }
          ?>
        </select>
        </label>
      </div>
		</li>

		</ul>
		<div class="searchText">
			<input type="hidden" name="post_type" value="lawyer" />
			<input name="s" id="s" value="<?php echo wp_specialchars($s, 1); ?>" type="text" placeholder="ヨツバノハ就労移行支援事業所" class="topSearch"/>
			<input type="submit" value="検索" id="submit" class="btnGreen" />
		</div>
	</div><!-- /searchInner -->

	</div><!-- /areaSearch -->
	</form>
<?php
if ( biz_vektor_is_plugin_enable('widgets') && is_active_sidebar( 'top-main-widget-area' ) ) :

	dynamic_sidebar( 'top-main-widget-area' );
else :

	/*-------------------------------------------*/
	/*	No use main content widget
	/*-------------------------------------------*/

	// Widget guide message
	if ( is_user_logged_in() == TRUE && biz_vektor_is_plugin_enable('widgets')) {
	global $user_level;
	get_currentuserinfo();
		if (10 <= $user_level) { ?>
			<div class="adminEdit sectionFrame">
			<p>トップページに表示する項目は<a href="<?php echo admin_url().'customize.php';?>">テーマカスタマイザー画面</a>あるいは<a href="<?php echo admin_url().'widgets.php';?>" target="_blank">ウィジェット編集画面</a>より、表示する項目や順番を自由に変更出来ます。<br />
			『メインコンテンツエリア（トップページ）』ウィジェットにウィジェットアイテムをセットしてください。</p>
			</div>
		<?php }
	}

	// page content
	if ( have_posts()) : the_post();
		if (get_post_type() === 'page') :
			$topFreeContent = NULL;
			$topFreeContent = get_the_content();
			if ($topFreeContent) : ?>
	<div id="topFreeArea">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
	</div>
	<?php endif; // $topFreeContent ?>
	<?php endif; // get_post_type() === 'page' ?>

	<?php if ( is_user_logged_in() == TRUE ) {
	global $user_level;
	get_currentuserinfo(); ?>
		<div class="adminEdit">
			<?php if (10 <= $user_level) { ?>
			<p class="caption">
			<?php esc_html_e( '* In admin [Settings] &raquo; [Display Settings], if the front page is not set to a [page], nothing is displayed in this area.', 'biz-vektor' ); ?><br />
			<?php esc_html_e( '* If empty, the body of a page that you set as the front page does not display anything.', 'biz-vektor' ); ?><br />
			<?php // esc_html_e( '* If you have set a specific page as the front page, pagination does not appear at the bottom.', 'biz-vektor' ); ?>
			</p>
			<?php } ?>
			<span class="linkBtn linkBtnS linkBtnAdmin" style="float:left;margin-right:10px;"><?php edit_post_link( __( 'Edit', 'biz-vektor' ) ); ?></span>
			<?php if ( 10 <= $user_level ) { ?>
			<span style="float:left;margin-right:10px;"><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#topPage" class="btn btnS btnAdmin">
				<?php esc_html_e('Title display settings', 'biz-vektor'); ?>
			</a></span>
			<span><a href="<?php echo site_url(); ?>/wp-admin/options-reading.php" class="btn btnS btnAdmin">
				<?php esc_html_e('Change the page to be displayed', 'biz-vektor'); ?>
			</a></span>
			<?php } ?>
		</div>
	<?php } // login ?>

	<?php endif; // have_posts() ?>
	<?php get_template_part('module_topPR'); ?>
	<?php if ( function_exists( 'biz_vektor_topSpecial' ) ): biz_vektor_topSpecial(); endif; ?>
	<?php get_template_part('module_top_list_info'); ?>
	<?php get_template_part('module_top_list_post'); ?>
<?php endif; ?>
<?php do_action('biz_vektor_fbLikeBoxDisplay'); ?>
<?php do_action('biz_vektor_snsBtns'); ?>
<?php do_action('biz_vektor_fbComments'); ?>

	</div>
	<!-- #content-main -->
	<?php biz_vektor_contentMain_after();?>
	</div>
	<!-- [ /#content ] -->
<?php $option = biz_vektor_get_theme_options();if(!$option['topSideBarDisplay']){ ?>
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
	<!-- [ /#sideTower ] -->
	<?php biz_vektor_sideTower_after();?>
<?php } ?>
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
