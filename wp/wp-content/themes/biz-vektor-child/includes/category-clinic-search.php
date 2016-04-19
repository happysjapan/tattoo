<div class="searchBox for_clinic">
  <h2>Clinic title</h2>
  <div class="inner">

    <?php
    $subcategories_parent = get_category_by_slug('clinic');
    $sub_args = array('child_of' => $subcategories_parent->term_id);
    $subcategories = get_categories( $sub_args );

    $exclude_ids = array();
    $i=0;
    foreach($subcategories as $subcategory) {
      $exclude_ids[$i] = $subcategory->term_id;
      $i++;
    }

    $args = array(
      'exclude' => $exclude_ids
    );
    $categories = get_categories($args);

    $primary_tags = get_tags();
    $secondary_tags = get_terms('secondary-tags');
    ?>

    <!-- [ #search form ] -->
    <form method="get" id="searchform" action="<?php echo home_url(); ?>/clinic">

      <div class="select-box">
        <label for ="searchSelect" class="search--form--label">お住いの地域をお選びください
        <select id="searchSelect" name="category_name" class="search--form--select">
          <option value="">地域</option>
          <?php
            foreach ($subcategories as $subcategory) {
              if( wp_specialchars($category_name, 1) == $subcategory->slug ) {
                echo '<option value="'.$subcategory->slug.'" selected>'.$subcategory->name.'</option>';
              }
              else {
                echo '<option value="'.$subcategory->slug.'">'.$subcategory->name.'</option>';
              }
            }
          ?>
        </select>
        </label>
      </div>

      <div class="select-box">
        <label for ="searchTag" class="search--form--label">条件でお選びください
        <select id="searchTag" name="tag" class="search--form--select">
          <option value="">条件</option>
          <?php

            foreach ($primary_tags as $tag_elem) {
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

      <?php
        $object = get_queried_object();
        if( !isset($_GET['subtag']) && $object->taxonomy == 'secondary-tags' ){
          $post_tag_slug_2 = $object->slug;
        }
        else {
          $post_tag_slug_2 = $_GET['subtag'];
        }
      ?>
      <div class="select-box">
        <label for ="searchSecondTag" class="search--form--label">条件でお選びください
        <select id="searchSecondTag" name="subtag" class="search--form--select">
          <option value="">条件 2</option>
          <?php
            foreach ($secondary_tags as $tag_elem) {
              if( $post_tag_slug_2 == $tag_elem->slug ) {
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


      <input type="hidden" name="post_type" value="clinic" />
      <input class="topSearch" type="search" placeholder="フリーワード" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">

      <input class="btn" id="searchsubmit"  type="submit" value="検索する">
    </form>
    <!-- [ /#search form ] -->
  </div>
</div>
