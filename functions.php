<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// styling shortcodes
function section_shortcode( $atts, $content = null ) {
    return '<section class="separator"><h3 class="inseparator">' . $content . '</h3> </section>';
}
add_shortcode( 'eval-separator', 'section_shortcode' );


// Creating the CAMPAIGN WIDGET
class wpb_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
    // Base ID of your widget
      'wpb_widget',

      // Widget name will appear in UI
      __('Campaign Widget', 'wpb_widget_domain'),

      // Widget description
      array( 'description' => __( 'This is the kickstarter campaign widget', 'wpb_widget_domain' ), )
    );
  }

  // Creating widget front-end
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $description = apply_filters( 'widget_description', $instance['description'] );
    $link = apply_filters('widget_link', $instance['link']);
    $button = apply_filters('widget_button', $instance['button']);
    $imgURL = get_bloginfo('template_url');
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( is_single() ) {
      echo '<img src="' . $imgURL . '/img/campaign-splash-sm.png" class="img-responsive campaign-img hidden-xs">'; // smaller img
      echo '<img src="' . $imgURL . '/img/campaign-splash.jpg" class="img-responsive campaign-img visible-xs">'; // larger img

      echo "<div class='campaign-content'>";
      echo $args['before_title'] . $title . $args['after_title'];
      echo "<p class='large'>" . $args['before_description'] . $description . $args['after_description'] . "</p>";
      echo "</div>";

      echo "<a class='btn btn-primary btn-lg campaign-button' href='$link' target='_blank'>$button</a>";

      // This is where you run the code and display the output
      echo __($args['before_description'], 'wpb_widget_description');
      echo $args['after_widget'];
    }
  }

  // Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
      $description = $instance[ 'description' ];
      $link = $instance['link'];
      $button = $instance['button'];
    }
    else {
      $title = __( 'New title', 'wpb_widget_domain' );
      $description = __( 'New description', 'wpb_widget_description' );
      $link = __( 'New button link', 'wpb_widget_link');
      $button = __( 'New button title', 'wpb_widget_button');
    }
    // Widget admin form
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Campaign Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

      <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />

      <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Button Link:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />

      <label for="<?php echo $this->get_field_id( 'button' ); ?>"><?php _e( 'Button Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" type="text" value="<?php echo esc_attr( $button ); ?>" />
    </p>
  <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance[ 'description' ] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
    $instance[ 'link' ] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
    $instance[ 'button' ] = ( ! empty( $new_instance['button'] ) ) ? strip_tags( $new_instance['button'] ) : '';
    return $instance;
  }
} // Class wpb_widget ends here


// Register and load the widget
function wpb_load_widget() {
  register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );


// Allowing to use shortcode in WIDGETS 
add_filter('widget_text', 'do_shortcode');



//repositioning the jetpack sharing icons OLD
function jptweak_remove_share() {
  remove_filter( 'the_content', 'sharing_display',19 );
  remove_filter( 'the_excerpt', 'sharing_display',19 );
  if ( class_exists( 'Jetpack_Likes' ) ) {
    remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
  }
}

add_action( 'loop_start', 'jptweak_remove_share' );

// Adds evaluations post types to the rss feed
function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'evaluation');
    return $qv;
}
add_filter('request', 'myfeed_request');

// shortcode for STYLING sections in Feedbacks


// shortcode for adding tags in post
function tags_in_post($atts) {    // [tags] outputs post's tags in a span
global $post;
$tags = '<span class="post-tags">';
ob_start();
the_tags( '<span class="post-tags">', ', ', '</span>' );
$tags = ob_get_contents();
ob_end_clean();
return $tags;
}
add_shortcode ('tags', 'tags_in_post');

// Custom Taxonomies

add_action( 'init', 'create_my_taxonomies', 0 );

function create_my_taxonomies() {
	register_taxonomy( 'outlet', array( 'evaluation','claimreview' ), array( 'hierarchical' => false, 'label' => 'outlet', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'authors', array( 'evaluation','claimreview' ), array( 'hierarchical' => false, 'label' => 'authors', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'article-tag', 'evaluation', array( 'hierarchical' => false, 'label' => 'article-tags', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'reviewers', array( 'evaluation','claimreview','post' ), array( 'hierarchical' => false, 'label' => 'reviewers', 'query_var' => true, 'rewrite' => true ) );
}


// shortcode for adding articles outlet in post
function art_outlet($atts) {    
global $post;
$outlet = '<span class="art-outlet">';
ob_start();
echo get_the_term_list( $post->ID, 'outlet', '', ', ', '' ); 
$outlet = ob_get_contents();
ob_end_clean();
return $outlet;
}
add_shortcode ('outlet', 'art_outlet');

// shortcode for adding articles authors in post
function art_author($atts) {    
global $post;
$auths = '<span class="art-author">';
ob_start();
echo get_the_term_list( $post->ID, 'authors', '', ', ', '' ); 
$auths = ob_get_contents();
ob_end_clean();
return $auths;
}
add_shortcode ('author', 'art_author');

// shortcode for adding article-level tags in post
function art_tags($atts) {    
global $post;
$atags = '<span class="art-tags">';
ob_start();
echo get_the_term_list( $post->ID, 'article-tag', '', ', ', '' ); 
$atags = ob_get_contents();
ob_end_clean();
return $atags;
}
add_shortcode ('article-tags', 'art_tags');

// add link to reference explanation in the pitfalls list
function section_pitfall( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'ref' => 1,
   ), $atts));
    return '<b>' . $content . ' </b>';
    // return  '<a href="http://climatefeedback.org/process/#' .$ref. '"><b>' . $content . ' </b></a>';
}
add_shortcode( 'pitfall', 'section_pitfall' );

//  [quote_sci user="username"] or [quote_sci user="first last"]
function quote_sci( $atts ) {
    $a = shortcode_atts( array(
        'user' => '',
    ), $atts );
    $output = '';
    $blogusers = get_users( array( 'search' => $a['user'] ) );
foreach ( $blogusers as $user ) {   
     $output .= '<strong> <a target="_blank" href="'.esc_html($user->user_url).'">'.esc_html( $user->first_name ).' '.esc_html( $user->last_name ).'</a>, '.esc_html( $user->title ).', '.esc_html( $user->affiliation ).':</strong>';
}    
    //Close and return markup
    return $output;
}
add_shortcode( 'quote_sci', 'quote_sci' );

//  [quote_sci_pic user="first last"]
function quote_sci_pic( $atts ) {
    $a = shortcode_atts( array(
        'user' => '',
    ), $atts );
    $output = '';
    $blogusers = get_users( array( 'search' => $a['user'] ) );
foreach ( $blogusers as $user ) {   
     $output .= 
         '<div class="row expert-widget"> 
         <div class="wid-left">
            '.get_avatar( $user->get('ID'), $size = '50', $default = '<path_to_url>' ).'
        </div>
        <div class="wid-body">
        <strong> <a target="_blank" href="'.esc_html($user->user_url).'">'.esc_html( $user->first_name ).' '.esc_html( $user->last_name ).'</a>, '.esc_html( $user->title ).', '.esc_html( $user->affiliation ).':</strong>
        </div>
        </div>';
}    
    //Close and return markup
    return $output;
}
add_shortcode( 'quote_sci_pic', 'quote_sci_pic' );

// shortcode for adding reviewers list in post
function art_revsl($atts) {    
global $post;
$arevs = '<span class="art-revs">';
ob_start();
echo get_the_term_list( $post->ID, 'reviewers', '', ', ', '' ); 
$arevs = ob_get_contents();
ob_end_clean();
return $arevs;
}
add_shortcode ('reviewers-list', 'art_revsl');

// shortcode for adding reviewers list in widget
function art_revs($atts) {    
global $post;
$arevs = '<span class="art-revs">';
ob_start();
$terms = wp_get_object_terms( $post->ID, 'reviewers' );
    foreach ( $terms as $term ) {   
     $term_names[] = $term->name;
     //echo $term->name;
     
     echo quote_sci2( $term->name );
     echo '<br /> ';
} 
$arevs = ob_get_contents();
ob_end_clean();
return $arevs;
}
add_shortcode ('reviewers', 'art_revs');

function quote_sci2( $a ) {
    $output = '';
    $blogusers = get_users( array( 'search' => $a ) );
foreach ( $blogusers as $user ) {   
     $output .= '
     <div class="row expert-widget"> 
        <div class="wid-left">
            '.get_avatar( $user->get('ID'), $size = '50', $default = '<path_to_url>' ).'
        </div>
        <div class="wid-body">
            <a href="/reviewers/'.format_uri(esc_html($user->first_name)).'-'.format_uri(esc_html($user->last_name)).'">'.esc_html($user->first_name).' '.esc_html($user->last_name).'</a><br /> '.esc_html( $user->title ).', '.esc_html( $user->affiliation ).'
        </div>
     </div>';
}    
    //Close and return markup
    return $output;
}

// shortcode for adding editor(s) in widget
function art_editor($atts) {    
global $post;
$arevs = '<span class="art-revs">';
ob_start();

$author_id = $post->post_author;
// echo get_the_author_meta( 'nicename', $author_id );
    
$auth = get_the_author();
     //echo $auth->name;
     echo quote_edit2( get_the_author_meta( 'nicename', $author_id ) );
     echo '<br /> ';
$aedts = ob_get_contents();
ob_end_clean();
return $aedts;
}
add_shortcode ('editors', 'art_editor');

function quote_edit2( $a ) {
    $output = '';
    $blogusers = get_users( array( 'search' => $a ) );
foreach ( $blogusers as $user ) {   
     $output .= '
     <div class="row expert-widget"> 
        <div class="wid-left">
            '.get_avatar( $user->get('ID'), $size = '50', $default = '<path_to_url>' ).'
        </div>
        <div class="wid-body">
            <a href="/editor/'.format_uri(esc_html($user->first_name)).'-'.format_uri(esc_html($user->last_name)).'">'.esc_html($user->first_name).' '.esc_html($user->last_name).'</a><br /> '.esc_html( $user->title ).', '.esc_html( $user->affiliation ).'
        </div>
     </div>';
}    
    //Close and return markup
    return $output;
}

// Kill pingbacks
// from http://blog.carlesmateo.com/2014/08/30/stopping-and-investigating-a-wordpress-xmlrpc-php-attack/
add_filter( 'xmlrpc_methods', 'remove_xmlrpc_pingback_ping' );
function remove_xmlrpc_pingback_ping( $methods ) {
    unset( $methods['pingback.ping'] );
    
    return $methods;
}

// Add subscript/superscript buttons
function my_mce_buttons_2( $buttons ) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';

	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );


// Register ShareTheFacts oEmbed provider
function sharethefacts_oembed_provider() {

wp_oembed_add_provider( 'https://*.sharethefacts.co/*', 'http://www.sharethefacts.co/services/oembed', false );

}
add_action( 'init', 'sharethefacts_oembed_provider' );


// auto create reviewer tag when adding or updating a People item
function update_custom_terms($post_id) {
    // only update terms if it's a People post
    if ( 'people' != get_post_type($post_id)) {
        return;
    }
    // don't create or update terms for system generated posts
    if (get_post_status($post_id) == 'auto-draft') {
        return;
    }
    /*
    * Grab the post title and slug to use as the new 
    * or updated term name and slug
    */
    $term_title = get_the_title($post_id);
    $term_slug = get_post( $post_id )->post_name;
    
    // Check if a corresponding term already exists 
    $existing_terms = get_terms('reviewers', array(
        'hide_empty' => false
        )
    );
    foreach($existing_terms as $term) {
        if ($term->description == $post_id) {
            //term already exists, so update it and we're done
            wp_update_term($term->term_id, 'reviewers', array(
                'name' => $term_title,
                'slug' => $term_slug
                )
            );
            return;
        }
    }

    // If this is a new post, create a new term

    wp_insert_term($term_title, 'reviewers', array(
        'slug' => $term_slug,
        'description' => $post_id
        )
    );
}
add_action('save_post', 'update_custom_terms');

// When new User added, create a People's entry for him/her
function create_user_custom_terms( $user_id ){
    // Get user info
    $user_info = get_userdata( $user_id );

    // Create a new post
    $user_post = array(
        // 'post_title'   => $user_info->nickname, // $result = ;
        'post_title'   => $user_info->first_name . ' ' . $user_info->last_name ,
        'post_type'    => 'people',
    );
    // Insert the post into the database
    $post_id = wp_insert_post( $user_post );

    // Add custom company info as custom fields
    // add_post_meta( $post_id, 'company_id', $user_info->ID ); //add user_image ?
     add_post_meta( $post_id, 'last_name', $user_info->last_name );
     add_post_meta( $post_id, 'hypothesis', $user_info->hypothesis );
     add_post_meta( $post_id, 'expertise', $user_info->expertise );
     add_post_meta( $post_id, 'affiliation', $user_info->affiliation );
     add_post_meta( $post_id, 'title', $user_info->title );
     add_post_meta( $post_id, 'website', $user_info->user_url );

}
add_action( 'wppb_after_user_approval', 'create_user_custom_terms', 20 );
// add_action( 'edit_user_profile_update', 'create_user_custom_terms', 20 ); //temporary for update



// Create a loop shortcode for Insights
function InsightsLoop( $atts ) {
    extract( shortcode_atts( array(
        'type' => 'post',
    ), $atts ) );
    $output = '';
    $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
    $args = array(
        'post_type' => $type,
        'category_name' => 'insight',
        'sort_column'   => 'menu_order',
        'posts_per_page' => 10,
        'paged' => $paged
    );
    $yo_quiery = new WP_Query( $args );

   
    while ($yo_quiery->have_posts() ) : $yo_quiery->the_post(); 
    get_template_part('templates/loop-insights'); 
    endwhile; 
        
    wp_reset_query();
    return $output;
}
add_shortcode('Insights-loop', 'InsightsLoop');

function Insight_pagination( $atts ) {
    extract( shortcode_atts( array(
        'type' => 'post',
    ), $atts ) );
    $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
    $args = array(
        // 'post_parent' => $parent,
        'post_type' => $type,
        'category_name' => 'insight',
        'sort_column'   => 'menu_order',
        'posts_per_page' => 10,
        'paged' => $paged
    );
    $yo_quiery = new WP_Query( $args );

    $yo_quiery->query_vars['paged'] > 1 ? $current = $yo_quiery->query_vars['paged'] : $current = 1;

    $pagination = array(
        'base' => @add_query_arg('page','%#%'),
        'format' => '',
        'total' => $yo_quiery->max_num_pages,
        'current' => $current,
        'show_all' => true,
        'type' => 'list',
        'next_text' => '&raquo;',
        'prev_text' => '&laquo;'
    );

    if( !empty($yo_quiery->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    wp_reset_query();
    return paginate_links( $pagination );
}
add_shortcode('paginate-Insight', 'Insight_pagination');


// Create a loop shortcode for News & Events
function EventsLoop( $atts ) {
    extract( shortcode_atts( array(
        'type' => 'post',
    ), $atts ) );
    $output = '';
    $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
    $args = array(
        'post_type' => $type,
        'category_name' => 'news',
        'sort_column'   => 'menu_order',
        'posts_per_page' => 10,
        'paged' => $paged
    );
    $yo_quiery = new WP_Query( $args );

   
    while ($yo_quiery->have_posts() ) : $yo_quiery->the_post(); 
    get_template_part('templates/loop-insights'); 
    endwhile; 
        
    wp_reset_query();
    return $output;
}
add_shortcode('Events-loop', 'EventsLoop');

function Events_pagination( $atts ) {
    extract( shortcode_atts( array(
        'type' => 'post',
    ), $atts ) );
    $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
    $args = array(
        // 'post_parent' => $parent,
        'post_type' => $type,
        'category_name' => 'news',
        'sort_column'   => 'menu_order',
        'posts_per_page' => 10,
        'paged' => $paged
    );
    $yo_quiery = new WP_Query( $args );

    $yo_quiery->query_vars['paged'] > 1 ? $current = $yo_quiery->query_vars['paged'] : $current = 1;

    $pagination = array(
        'base' => @add_query_arg('page','%#%'),
        'format' => '',
        'total' => $yo_quiery->max_num_pages,
        'current' => $current,
        'show_all' => true,
        'type' => 'list',
        'next_text' => '&raquo;',
        'prev_text' => '&laquo;'
    );

    if( !empty($yo_quiery->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    wp_reset_query();
    return paginate_links( $pagination );
}
add_shortcode('paginate-Events', 'Events_pagination');

function M_trim_text ($string) {
  $maxlen = 180;
  $excerpt = $string;
  $excerptlen = strlen($excerpt);
  if ($excerptlen > $maxlen) {
    $excerpt = substr($excerpt, 0, $maxlen).'...';
    $excerptlen = $maxlen + 3;
  }
  if ($excerpt[0] == '"')
    $excerpt = substr($excerpt, 0, $excerptlen-1);
  return $excerpt;
}