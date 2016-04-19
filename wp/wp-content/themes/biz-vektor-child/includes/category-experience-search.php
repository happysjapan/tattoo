<div class="searchBox for_experience">
  <h2>地域・条件から病院／クリニックを探す</h2>
  <div class="inner">

    <!-- [ #search form ] -->
    <form method="get" id="searchform" action="<?php echo home_url(); ?>/experience">

      <div class="select-box">
        <label for ="experience_cat" class="search--form--label">お住いの地域をお選びください
          <select id="experience_cat" name="experience_cat" class="search--form--select">
            <option value="">地域</option>
            <?php
              $tax_terms = get_terms( 'experience-cat');
              foreach ($tax_terms as $tax_term) {
                if( wp_specialchars($_GET['experience_cat'], 1) == $tax_term->slug ) {
                  echo '<option value="'.$tax_term->slug.'" selected>'.$tax_term->name.'</option>';
                }
                else {
                  echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';
                }
              }
            ?>
          </select>
        </label>
      </div>

      <input class="topSearch" type="search" placeholder="フリーワード" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">
      <input type="hidden" name="post_type" value="experience" />
      <input class="btn" id="searchsubmit"  type="submit" value="検索する">
    </form>
    <!-- [ /#search form ] -->

  </div>
</div>
