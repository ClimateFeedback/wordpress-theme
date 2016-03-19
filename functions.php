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




// Creating the campaign widget
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
  // This is where the action happens
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

//    echo "<a class='btn btn-primary btn-lg campaign-button' href='http://tilt.climatefeedback.org' target='_blank'>$title</a>";
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


//repositioning the jetpack sharing icons
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
	register_taxonomy( 'outlet', 'evaluation', array( 'hierarchical' => false, 'label' => 'outlet', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'authors', 'evaluation', array( 'hierarchical' => false, 'label' => 'authors', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'article-tag', 'evaluation', array( 'hierarchical' => false, 'label' => 'article-tags', 'query_var' => true, 'rewrite' => true ) );
}


// shortcode for adding articles outlet in post
function art_outlet($atts) {    
global $post;
$outlet = '<span class="art-outlet">';
ob_start();
echo get_the_term_list( $post->ID, 'outlet', 'Outlet: ', ', ', '' ); 
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
echo get_the_term_list( $post->ID, 'authors', 'Author: ', ', ', '' ); 
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
