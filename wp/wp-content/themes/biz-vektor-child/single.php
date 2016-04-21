<?php get_header();

$current_category = get_the_category();


if( $current_category[0]->term_id == 2 ){
	$current_category_id = $current_category[1]->term_id;
} else { $current_category_id = $current_category[0]->term_id; }

$args = array(
	'posts_per_page'   => -1,
	'category'         => $current_category_id,
	'exclude'						=> get_the_id(),
	'post_type'        => 'post',
);
$clinic_by_category = get_posts( $args );
?>


<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content" class="content wide indivclinic">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'includes/social', 'buttons' ); ?>

<!-- [ #post- ] -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="entryPostTitle entry-title">
		<?php the_title(); ?><?php edit_post_link(__('Edit', 'biz-vektor'), ' <span class="edit-link edit-item">[ ', ' ]' ); ?>
	</h1>

	<div class="entry-content post-content">

		<section class="indivInfo tableRow">
			<div class="leftBox">
				<img src="<?php echo get_field('office_image'); ?>" alt="<?php the_title(); ?>" />

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
			<div class="rightBox">
				<div class="tableRow">
					<div class="schedule leftBox">
						<table>
							<tr>
								<th>受付時間</th>
								<th>月</th>
								<th>火</th>
								<th>水</th>
								<th>木</th>
								<th>金</th>
								<th>土</th>
								<th>日</th>
								<th>祝</th>
							</tr>
							<?php
									while(have_rows('office_time_table')): the_row();
								?>
							<tr>
								<td><?php the_sub_field('office_time'); ?></td>
								<td><?php the_sub_field('office_time_mon'); ?></td>
								<td><?php the_sub_field('office_time_tue'); ?></td>
								<td><?php the_sub_field('office_time_wed'); ?></td>
								<td><?php the_sub_field('office_time_thu'); ?></td>
								<td><?php the_sub_field('office_time_fri'); ?></td>
								<td><?php the_sub_field('office_time_sat'); ?></td>
								<td><?php the_sub_field('office_time_sun'); ?></td>
								<td><?php the_sub_field('office_time_holi'); ?></td>
							</tr>
							<?php endwhile; ?>
						</table>
					</div>
					<div class="contactWrap rightBox">
         				<a href="tel:0120-697-182" title="0120-697-182" class="telNumber">0120-697-182</a>
						<a href="/officetour-form/?office=<?php the_title(); ?>" title="まずはフォームで無料相談" class="btn">まずはフォームで無料相談</a>
					</div>
				</div>
				<p class="text"><?php echo get_field('office_introduction'); ?></p>
			</div>
		</section>

		<section class="indivProfile">
			<h2 class="title">■&nbsp;病院/クリニック詳細情報</h2>
			<div class="tableRow">
				<div class="leftBox">
					<table>
						<tbody>
							<tr>
							  <th>病院/クリニック詳細情報</th>
							  <td><?php the_title(); ?></td>
							</tr>
							<tr>
							  <th>院長名</th>
							  <td><?php echo get_field('office_leader'); ?></td>
							</tr>
							<tr>
							  <th>診療項目</th>
							  <td><?php echo get_field('office_capacity'); ?></td>
							</tr>
							<tr>
							  <th>定休日</th>
							  <td><?php echo get_field('office_dayoff'); ?></td>
							</tr>
							<tr>
							  <th>アクセス</th>
							  <td><?php echo get_field('office_access'); ?></td>
							</tr>
							<tr>
							  <th>住所</th>
							  <td><?php echo get_field('office_address'); ?></td>
							</tr>
							<tr>
							  <th>ホームページ</th>
							  <td><a href="<?php echo get_field('office_url'); ?>" title="<?php the_title(); ?>"><?php echo get_field('office_url'); ?></a></td>
							</tr>
							<tr>
							  <th>お問い合わせ番号</th>
							  <td><?php echo get_field('office_contact-number'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="rightBox">

		            <div class="categoryTermsWrap"><?php the_category(); ?></div>
		            <div class="tagTermsWrap">
		              <ul>
		                <?php
						$primary_tags = wp_get_post_terms( get_the_id() , 'primary-tags');
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


					<div class="rewardWrap">
						<p><strong>お祝い金</strong>  <?php echo get_field('reward'); ?>円支給</p>
						<a href="/celebration/" title="お祝い金とは？" class="btn">お祝い金とは？</a>
					</div>
					<div class="googleMap">

						<?php
							$location = get_field('office_googlemap');
							if(!empty($location)):
						?>
							<div class="infoBottomMap">
								<div class="acf-map">
									<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<dl class="comment">
						<dt>事務所から皆様へコメント</dt>
						<dd><?php echo get_field('office_comment'); ?></dd>
					</dl>
				</div>
			</div>
		</section>

		<section class="indivContact">
			<a href="/officetour-form/?office=<?php the_title(); ?>" title="まずはフォームで無料相談" class="btn">まずはフォームで無料相談</a>
         	<a href="tel:0120-697-182" title="0120-697-182" class="telNumber">0120-697-182</a>
			<p class="text">お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 <?php echo get_field('reward'); ?>円</span>を支給致します。</p>
		</section>


		<section class="indivSlider">
			<h2 class="title">事務所紹介画像・紹介動画</h2>
			<div class="tableRow">
				<div class="leftBox">
					<?php echo get_field('office_image_slider1'); ?>
				</div>
				<div class="rightBox">
					<?php echo get_field('office_image_slider2'); ?>
				</div>
			</div>
			<h2 class="title">カリキュラム・実習・人材育成などの取り組みに関して</h2>
			<div class="slideWrap">
				<ul class="areaSlider">

				<?php while(have_rows('office_image_slider3')): the_row(); ?>
					<li><img src="<?php the_sub_field('office_slider3_image'); ?>" alt="" /></li>
				<?php endwhile; ?>

				</ul>
				<p><?php echo get_field('office_description'); ?></p>
			</div>
		</section>

		<section class="indivContact">
			<a href="/officetour-form/?office=<?php the_title(); ?>" title="まずはフォームで無料相談" class="btn">まずはフォームで無料相談</a>
         	<a href="tel:0120-697-182" title="0120-697-182" class="telNumber">0120-697-182</a>
			<p class="text">お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 <?php echo get_field('reward'); ?>円</span>を支給致します。</p>
		</section>


		<section class="indivText">
			<dl>
				<dt><?php echo get_field('office_title1'); ?></dt>
				<dd><?php echo get_field('office_description1'); ?></dd>
			</dl>
			<dl>
				<dt><?php echo get_field('office_title2'); ?></dt>
				<dd><?php echo get_field('office_description2'); ?></dd>
			</dl>
			<dl>
				<dt><?php echo get_field('office_title3'); ?></dt>
				<dd><?php echo get_field('office_description3'); ?></dd>
			</dl>
		</section>

		<section class="indivContact">
			<a href="/officetour-form/?office=<?php the_title(); ?>" title="まずはフォームで無料相談" class="btn">まずはフォームで無料相談</a>
         	<a href="tel:0120-697-182" title="0120-697-182" class="telNumber">0120-697-182</a>
			<p class="text">お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 <?php echo get_field('reward'); ?>円</span>を支給致します。</p>
		</section>


		<section class="indivStaff">
			<h2 class="title">スタッフ紹介</h2>
			<ul>
				<?php
						while(have_rows('office_staff_introduction')): the_row();
					?>
				<li>
					<img src="<?php the_sub_field('office_staff_image'); ?>" alt="<?php the_sub_field('office_staff_name'); ?>"/>
					<div>
						<p class="name"><?php the_sub_field('office_staff_name'); ?></p>
						<p class="role"><?php the_sub_field('office_staff_role'); ?></p>
						<p class="text"><?php the_sub_field('office_staff_text'); ?></p>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
		</section>

		<section class="indivAroundclinic">
			<h2 class="title">周辺の就労移行支援事業所一覧</h2>
			<div class="slideWrap">
				<ul class="areaSlider">

					<?php foreach ($clinic_by_category as $clinic) { ?>

						<li>
							<p class="title"><?php echo $clinic->post_title; ?></p>
							<p><?php echo get_field('office_address', $clinic->ID); ?></p>
							<p>お祝い金: <?php echo get_field('reward', $clinic->ID); ?>円</p>
							<img src="<?php echo get_field('office_image', $clinic->ID); ?>" alt="" />
							<a href="<?php echo get_permalink($clinic->ID); ?>" title="詳細" class="btn">詳細</a>
						</li>
					<?php } ?>


				</ul>
			</div>
		</section>

		<section class="indivSeminar">
			<h2 class="title">説明会・セミナー一覧</h2>
			<p><?php echo get_field('office_seminar_ description'); ?></p>
			<p class="note">まずは、働くことに関する不安などの就職相談等も承ります。お気軽にご連絡ください。</p>
			<div class="btn_wrap"><a href="/info/" title="説明会・セミナー一覧" class="btn">説明会・セミナー一覧</a></div>
		</section>

		<section class="indivContact">
			<a href="/officetour-form/?office=<?php the_title(); ?>" title="まずはフォームで無料相談" class="btn">まずはフォームで無料相談</a>
         	<a href="tel:0120-697-182" title="0120-697-182" class="telNumber">0120-697-182</a>
			<p class="text">お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 <?php echo get_field('reward'); ?>円</span>を支給致します。</p>
		</section>


		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

<?php edit_post_link(__('Edit', 'biz-vektor'),'<div class="adminEdit"><span class="linkBtn linkBtnS linkBtnAdmin">','</span></div>'); ?>

<?php do_action('biz_vektor_snsBtns'); ?>

</div>
<!-- [ /#post- ] -->

<?php get_template_part( 'includes/social', 'buttons' ); ?>


<?php do_action('biz_vektor_fbComments'); ?>


<?php endwhile; // end of the loop. ?>

<?php do_action('biz_vektor_fbLikeBoxDisplay'); ?>

</div>
<!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

	<script>
	jQuery(document).ready(function(){
		// $('.infoBottomSlider').bxSlider({
		// 	pagerCustom: '#infoBottom_pager',
		// 	responsive: true
		// });


		var settings = function() {
			var setting1 = {
				minSlides: 1,
				maxSlides: 1,
				moveSlides: 1,
				slideWidth: 245,
				responsive: true,
				pager: false
			};
			var setting2 = {
				minSlides: 3,
				maxSlides: 3,
				moveSlides: 3,
				slideWidth: 245,
				slideMargin: 50,
				responsive: true,
				pager: false
			};
			return (jQuery(window).width()<740) ? setting1 : setting2;
		}
		var mySlider;
		function tourLandingScript(){
			mySlider.reloadSlider(settings());
		}

		mySlider = jQuery('.areaSlider').bxSlider(settings());
		jQuery(window).resize(tourLandingScript);
	});

	</script>

<?php get_footer(); ?>
