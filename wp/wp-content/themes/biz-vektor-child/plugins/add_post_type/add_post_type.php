<?php
/**
 * BizVektor add_post_type.php
 *
 * @package BizVektor
 * @version 1.6.0
 */
add_filter('biz_vektor_is_plugin_add_post_type', 'biz_vektor_posttype_beacon', 10, 1 );
function biz_vektor_posttype_beacon($flag){
	$flag = true;
	return $flag;
}

/*-------------------------------------------*/
/*	Custom post type _ add experience
/*-------------------------------------------*/
/*	widget setting
/*-------------------------------------------*/
/*	WP_Widget_experienceTerms Class
/*-------------------------------------------*/
/*	WP_Widget_experienceArchives Class
/*-------------------------------------------*/
/*	Custom post type _ add experience
/*-------------------------------------------*/
/*	Custom post type _ add public_relation
/*-------------------------------------------*/
/*	Custom post type _ add Questions
/*-------------------------------------------*/

function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');


add_post_type_support( 'experience', 'front-end-editor' );

add_action( 'init', 'biz_vektor_experience_create_post_type', 0 );
function biz_vektor_experience_create_post_type() {
	$experienceLabelName = esc_html( bizVektorOptions('experienceLabelName'));
	register_post_type( 'experience', /* post-type */
		array(
			'labels' => array(
				'name' => $experienceLabelName,
				'singular_name' => $experienceLabelName
			),
			'public' => true,
			'menu_position' => 5,
			'has_archive' => true,
			'supports' => array('title','editor','excerpt','thumbnail','author'),
		)
	);
	// Add information category
	register_taxonomy(
		'experience-cat',
		'experience',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => $experienceLabelName._x(' category','admin menu', 'biz-vektor'),
			'singular_label' => $experienceLabelName._x(' category','admin menu', 'biz-vektor'),
			'public' => true,
			'show_ui' => true
		)
	);
}


add_action( 'generate_rewrite_rules', 'biz_vektor_experience_set_rewrite' );
function biz_vektor_experience_set_rewrite( $wp_rewrite ){
    $taxonomies = get_taxonomies();
    // exclude default post types [category,post_tag,nav_menu,link_category ]
    $taxonomies = array_slice($taxonomies,4,count($taxonomies)-1);
    foreach ( $taxonomies as $taxonomy ) :
        $post_types = get_taxonomy($taxonomy)->object_type;
        foreach ($post_types as $post_type){
        	$new_rules[$post_type.'/'.$taxonomy.'/([^/]+)/page/?([0-9]{1,})/?$'] = 'index.php?'.$taxonomy.'=$matches[1]&paged=$matches[2]';
            $new_rules[$post_type.'/'.$taxonomy.'/(.+?)/?$'] = 'index.php?taxonomy='.$taxonomy.'&term='.$wp_rewrite->preg_index(1);
        }
        $wp_rewrite->rules = array_merge($new_rules, $wp_rewrite->rules);
     endforeach;
}
/*		Archive of custom post type
/*-------------------------------------------*/
global $my_archives_post_type;
add_filter( 'getarchives_where', 'biz_vektor_experience_getarchives_where', 10, 2 );
function biz_vektor_experience_getarchives_where( $where, $r ) {
  global $my_archives_post_type;
  if ( isset($r['post_type']) ) {
    $my_archives_post_type = $r['post_type'];
    $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
  } else {
    $my_archives_post_type = '';
  }
  return $where;
}
add_filter( 'get_archives_link', 'biz_vektor_experience_get_archives_link' );
function biz_vektor_experience_get_archives_link($link_html) {
    global $my_archives_post_type;
    if ($my_archives_post_type != '') {
        $add_link = '?post_type=' . $my_archives_post_type;
        if( preg_match( "/post_type=/", $link_html ) ) return $link_html;
        $link_html = preg_replace("/href=\'(.+)\'/", "href='$1" . $add_link. "'", $link_html);
    }
    return $link_html;
}
/*-------------------------------------------*/
/*	widget setting
/*-------------------------------------------*/
function biz_vektor_experience_widgets_init() {
	register_sidebar( array(
		// 'name' => __( 'Sidebar(Front page only)', 'biz-vektor' ),
		'name' => sprintf( __( 'Sidebar(%s content only)', 'biz-vektor' ),bizVektorOptions('experienceLabelName') ),
		'id' => 'experience-widget-area',
		'description' => sprintf( __( 'This widget area appears only on the %s content pages.', 'biz-vektor' ),bizVektorOptions('experienceLabelName') ),
		'before_widget' => '<div class="sideWidget" id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'biz_vektor_experience_widgets_init' );
/*-------------------------------------------*/
/*	WP_Widget_experienceTerms Class
/*-------------------------------------------*/
class WP_Widget_experienceTerms extends WP_Widget {
	/** constructor */
	function __construct() {
		$biz_vektor_options = biz_bektor_option_validate();
		$widget_name = biz_vektor_get_short_name().'_'.sprintf( __( '%s category', 'biz-vektor' ), $biz_vektor_options['experienceLabelName'] );

		parent::__construct(
			'experienceTerms',
			$widget_name,
			array( 'description' => sprintf( __( 'Category list of %s', 'biz-vektor' ), $biz_vektor_options['experienceLabelName'] ),'hanshin tigers' )
		);
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );
		$arg = array(
			'show_option_none'		=> '',
			'title_li'				=> '',
			'taxonomy' 				=> 'experience-cat',
			'orderby'				=> 'order',
			'echo'					=> 0    /* 直接出力させない為 */
		);
		$catlist = wp_list_categories( $arg );
		if ( !empty($catlist)) {
			if ( !isset($instance['title']) || !$instance['title'] ) {
				global $biz_vektor_options;
				$instance['title'] = sprintf( __( '%s category', 'biz-vektor' ),$biz_vektor_options['experienceLabelName'] );
			} ?>
			<div class="localSection sideWidget">
			<div class="localNaviBox">
			<h3 class="localHead"><?php echo esc_html($instance['title']); ?></h3>
			<ul class="localNavi">
		    <?php echo $catlist; ?>
			</ul>
			</div>
			</div>
		<?php }
	}
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		$old_instance['title'] = $new_instance['title'];
		return $old_instance;
	}
	/** @see WP_Widget::form */
	function form($instance) {
		$defaults = array(
			'title' => 'カテゴリー',
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		$title = esc_attr($instance['title']);
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<?php
	}
} // class WP_Widget_experienceTerms
// register WP_Widget_experienceTerms widget
add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_experienceTerms");'));
/*-------------------------------------------*/
/*	WP_Widget_experienceArchives Class
/*-------------------------------------------*/
class WP_Widget_experienceArchives extends WP_Widget {
	/** constructor */
	function __construct() {
		global $biz_vektor_options;
		$widget_name = biz_vektor_get_short_name().'_'.sprintf( __( '%s Yearly archives', 'biz-vektor' ), $biz_vektor_options['experienceLabelName'] );

		parent::__construct(
			'experienceArchives',
			$widget_name,
			array( 'description' => sprintf( __( 'Yearly archives of %s', 'biz-vektor' ), $biz_vektor_options['experienceLabelName'] ) )
		);
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );
?>
	<div class="localSection sideWidget">
	<div class="localNaviBox">
	<h3 class="localHead"><?php _e('Yearly archives', 'biz-vektor'); ?></h3>
	<ul class="localNavi">
	<?php
	$args = array(
		'type' => 'yearly',
		'post_type' => 'experience',
		'after' => _x('&nbsp;', 'After year','biz-vektor')
		);
	wp_get_archives($args); ?>
	</ul>
	</div>
	</div>
<?php
	}
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	/** @see WP_Widget::form */
	function form($instance) {
	}
} // class WP_Widget_experienceArchives
// register WP_Widget_experienceArchives widget
add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_experienceArchives");'));
add_filter('biz_vektor_extra_posttype_config', 'biz_vektor_experience_config', 5);
function biz_vektor_experience_config(){

	$options = biz_bektor_option_validate();
	$biz_vektor_name = get_biz_vektor_name();
	$experienceLabelName = esc_html( $options['experienceLabelName'] );
?>
<!-- Information -->
<tr>
	<th><?php echo esc_html( $experienceLabelName ); ?></th>
	<td>
		&raquo; <?php _e('Change the title', 'biz-vektor') ;?> <input type="text" name="biz_vektor_theme_options[experienceLabelName]" id="experienceLabelName" value="<?php echo esc_attr( $options['experienceLabelName'] ); ?>" style="width:200px;" />
	<dl>
	<dt><?php printf(__('Display layout of &quot; %s &quot on the top page.', 'biz-vektor'), $experienceLabelName ); ?></dt>
	<dd>
	<?php
		if(!isset($options['listexperienceTop'])){ $options['listexperienceTop'] = 'listType_set'; }
	?>
	<label><input type="radio" name="biz_vektor_theme_options[listexperienceTop]" value="listType_title" <?php echo ($options['listexperienceTop'] != 'listType_set')? 'checked' : ''; ?> > <?php _e('Title only', 'biz-vektor'); ?></label>
	<label><input type="radio" name="biz_vektor_theme_options[listexperienceTop]" value="listType_set" <?php echo ($options['listexperienceTop'] == 'listType_set')? 'checked' : ''; ?> > <?php _e('With excerpt and thumbnail', 'biz-vektor'); ?></label>
	</dd>
	<dt><?php printf(__('Display layout of &quot; %s &quot on the archive page.', 'biz-vektor'), $experienceLabelName ); ?></dt>
	<dd>
	<?php
		if(!isset($options['listexperienceArchive'])){ $options['listexperienceArchive'] = 'listType_set'; }
	?>
	<label><input type="radio" name="biz_vektor_theme_options[listexperienceArchive]" value="listType_title" <?php echo ($options['listexperienceArchive'] != 'listType_set')? 'checked' : ''; ?> > <?php _e('Title only', 'biz-vektor'); ?></label>
	<label><input type="radio" name="biz_vektor_theme_options[listexperienceArchive]" value="listType_set" <?php echo ($options['listexperienceArchive'] == 'listType_set')? 'checked' : ''; ?> > <?php _e('With excerpt and thumbnail', 'biz-vektor'); ?></label>
	</dd>
	</dl>
	<dl>
		<dt><?php printf(__('Number of %s posts to be displayed on the home page.', 'biz-vektor'), $experienceLabelName);?></dt>
		<dd><input type="text" name="biz_vektor_theme_options[experienceTopCount]" id="postTopCount" value="<?php echo esc_attr( $options['experienceTopCount'] ); ?>" style="width:50px;text-align:right;" /> <?php _ex('posts', 'top page post count', 'biz-vektor') ;?><br />
		<?php _e('If you enter &quot0&quot, this section will disappear.', 'biz-vektor') ;?></dd>
	</dl>

	<dl>
		<dt><?php printf( __( 'Top URL for %1$s', 'biz-vektor' ), $experienceLabelName ); ?></dt>
		<dd><?php $experienceTopUrl = home_url() . '/experience/'; ?>
			<?php printf( __( 'By default <a href="%1$s" target="_blank">%1$s</a> is the top URL for %2$s', 'biz-vektor' ), esc_url( $experienceTopUrl ), $experienceLabelName ); ?>
			<input type="text" name="biz_vektor_theme_options[experienceTopUrl]" id="postTopUrl" value="<?php echo esc_attr( $options['experienceTopUrl'] ); ?>" style="width:80%" />
		</dd>
	</dl>
</td>
</tr>
<?php
}

add_filter('biz_vektor_theme_options_validate', 'biz_vektor_experience_validate', 10, 2);
function biz_vektor_experience_validate($output, $input){
	$output['experienceLabelName']          = (preg_match('/^(\s|[ 　]*)$/', $input['experienceLabelName']))?	 $defaults['experienceLabelName'] : $input['experienceLabelName'] ;
	$output['listexperienceTop']            = $input['listexperienceTop'];
	$output['listexperienceArchive']        = $input['listexperienceArchive'];
	$output['experienceTopUrl']             = $input['experienceTopUrl'];
	$output['experienceTopCount']           = (preg_match('/^(\s|[ 　]*)$/', $input['experienceTopCount']))? 5 : $input['experienceTopCount'];
	return $output;
}

add_filter('biz_vektor_default_options', 'biz_vektor_experience_default_option');
function biz_vektor_experience_default_option($original_options){
	$options = array(
		'experienceLabelName'        => __('experiencermation', 'biz-vektor'),
		'experienceTopCount'         => '5',
		'experienceTopUrl'           => home_url().'/experience/',
		'listexperienceTop'          => 'listType_set',
		'listexperienceArchive'      => 'listType_set',
	);
	return array_merge($original_options, $options);
}

add_action( 'admin_bar_menu', 'biz_vektor_experience_adminvar_custom_menu',30 );
function biz_vektor_experience_adminvar_custom_menu(){
	global $wp_admin_bar;
	global $user_level;

	// experience
	$wp_admin_bar->add_menu( array(
		'id' => 'experienceLabelName',
		'title' => sprintf( _x( 'Managing %s', 'BizVektor admin header menu', 'biz-vektor' ),bizVektorOptions('experienceLabelName') ),
		'href' => get_admin_url().'edit.php?post_type=experience',
	));
	$wp_admin_bar->add_menu( array(
		'parent' => 'experienceLabelName',
		'id' => 'post_list',
		'title' => sprintf( _x( '%s - List of entries', 'BizVektor admin header menu', 'biz-vektor' ),bizVektorOptions('experienceLabelName') ),
		'href' => get_admin_url().'edit.php?post_type=experience',
	));
	$wp_admin_bar->add_menu( array(
		'parent' => 'experienceLabelName',
		'id' => 'post_new',
		'title' => sprintf( _x( '%s - Add new', 'BizVektor admin header menu', 'biz-vektor' ),bizVektorOptions('experienceLabelName') ),
		'href' => get_admin_url().'post-new.php?post_type=experience',
	));
	if (7 <= $user_level) {
		$wp_admin_bar->add_menu( array(
			'parent' => 'experienceLabelName',
			'id' => 'post_category',
			'title' => sprintf( _x( '%s - Categories', 'BizVektor admin header menu', 'biz-vektor' ),bizVektorOptions('experienceLabelName') ),
			'href' => get_admin_url().'edit-tags.php?taxonomy=experience-cat&post_type=experience',
		));
	}
}

add_action('admin_menu', 'biz_vektor_experience_add_custom_field_metaKeyword');
function biz_vektor_experience_add_custom_field_metaKeyword(){
  if(function_exists('add_custom_field_metaKeyword')){
	add_meta_box('div1', __('Meta Keywords', 'biz-vektor'), 'insert_custom_field_metaKeyword', 'experience', 'normal', 'high');
  }
}

add_filter('biz_vektor_index_loop_hack', 'biz_vektor_experience_hack_index', 10, 1);
function biz_vektor_experience_hack_index($flag){
	if($flag){ return $flag; }
	$postType = get_post_type();
	if($postType != 'experience'){ return $flag; }
	$options = biz_vektor_get_theme_options();
	if ( $options['listexperienceArchive'] == 'listType_set' ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('module_loop_post2'); ?>
		<?php endwhile ?>
	<?php else : ?>
		<ul class="entryList">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('module_loop_post'); ?>
		<?php endwhile; ?>
		</ul>
	<?php endif; //$options['listexperienceArchive']
	return true;
}




/*-------------------------------------------*/
/*	Custom post type _ add public_relation
/*-------------------------------------------*/

add_post_type_support( 'public_relation', 'front-end-editor' );

add_action( 'init', 'biz_vektor_public_relation_create_post_type', 0 );
function biz_vektor_public_relation_create_post_type() {
	$public_relationLabelName = 'Public relation';
	register_post_type( 'public_relation', /* post-type */
	array(
		'labels' => array(
		'name' => $public_relationLabelName,
		'singular_name' => $public_relationLabelName
	),
	'public' => true,
	'menu_position' =>5,
	'has_archive' => true,
	'supports' => array('title','editor','excerpt','thumbnail','author')
	)
	);
	// Add information category
	register_taxonomy(
		'public_relation-cat',
		'public_relation',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => $public_relationLabelName._x(' category','admin menu', 'biz-vektor'),
			'singular_label' => $public_relationLabelName._x(' category','admin menu', 'biz-vektor'),
			'public' => true,
			'show_ui' => true,
		)
	);
}


/*-------------------------------------------*/
/*	Custom post type _ add Question
/*-------------------------------------------*/

add_post_type_support( 'question', 'front-end-editor' );

add_action( 'init', 'biz_vektor_question_create_post_type', 0 );
function biz_vektor_question_create_post_type() {
	$questionLabelName = 'Question';
	register_post_type( 'question', /* post-type */
	array(
		'labels' => array(
		'name' => $questionLabelName,
		'singular_name' => $questionLabelName
	),
	'public' => true,
	'menu_position' =>5,
	'has_archive' => true,
	'supports' => array('title','editor','excerpt','thumbnail','author')
	)
	);
	// Add information category
	register_taxonomy(
		'question-cat',
		'question',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => $questionLabelName._x(' category','admin menu', 'biz-vektor'),
			'singular_label' => $questionLabelName._x(' category','admin menu', 'biz-vektor'),
			'public' => true,
			'show_ui' => true,
		)
	);
}


add_action( 'init', 'create_my_taxonomies', 0 );
function create_my_taxonomies() {
	register_taxonomy(
		'primary-tags',
		'post',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'Primary tags',
			'public' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'primary-tags' ),
			'singular_label' => 'Primary tag'
		)
	);

	register_taxonomy(
		'secondary-tags',
		'post',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'Secondary tags',
			'public' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'secondary-tags' ),
			'singular_label' => 'Secondary tag'
		)
	);
}
