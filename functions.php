<?php
  /************************
  * Remove Forced P Tags.
  *
  */
  remove_filter ('the_content', 'wpautop');

  /************************
  * My Own IE CSS.
  *
  */
  function mytheme_dequeue_styles() {
    wp_dequeue_style( 'twentytwelve-ie' );
  }
  add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_styles', 11 );

  //add new from child theme
  wp_enqueue_style( 'mytheme-ie', get_stylesheet_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '1.0' );
  $wp_styles->add_data( 'mytheme-ie', 'conditional', 'lt IE 9' );


  /************************
  * update favicons for admin and web
  *
  */
  function add_favicon() {
      $favicon_url = get_stylesheet_directory_uri() . '/admin-favicon.png';
    echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
  }
  // run function on the login and admin pages
  add_action('login_head', 'add_favicon');
  add_action('admin_head', 'add_favicon');


  /************************
  * Register new sidebars.
  *
  * @since Twenty Twelve 1.0
  */
  function documentation_widgets_init() {
    register_sidebar( array(
      'name' => __( 'API Sidebar', 'twentytwelve' ),
      'id' => 'sidebar-5',
      'description' => __( 'Appears on API pages', 'twentytwelve' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>'
    ) );
  }
  add_action( 'widgets_init', 'documentation_widgets_init' );

  /************************
  * Displays navigation to next/previous pages when applicable.
  *
  * @since Twenty Twelve 1.0
  */
  if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
    function twentytwelve_content_nav( $html_id ) {
      global $wp_query;

      $html_id = esc_attr( $html_id );

      if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
          <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
          <div class="nav-previous"><?php previous_posts_link( __( '<span class="meta-nav">&lt;&lt;&lt;</span> Previous Page', 'twentytwelve' ) ); ?></div>
          <div class="nav-next"><?php next_posts_link( __( 'Next Page <span class="meta-nav">&gt;&gt;&gt;</span>', 'twentytwelve' ) ); ?></div>
        </nav><!-- #<?php echo $html_id; ?> .navigation -->
      <?php endif;
    }
  endif;

  /***********************
  * Create Breadcrumbs.
  *
  * @since Twenty Twelve 1.0
  */
  function the_breadcrumb() {
    global $post;
    $crumbSep = '<li class="separator"> > </li>';
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li>';
        echo $crumbSep;
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li>' . $crumbSep);
            if (is_single()) {
                echo '</li>';
                echo $crumbSep;
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> ' . $crumbSep;
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
  }


  /***********************
  * update walker catagory to include catagory slugs
  * for use in the faq sidebar
  *
  * @since Twenty Twelve 1.0
  */
  class faq_slug_walker extends Walker_Category {
    public function start_el(&$output, $category, $depth, $args) {
      parent::start_el( $output, $category, $depth, $args );
      $find = 'cat-item-' . $category->term_id . '"';
      $replace = $category->slug . '"';
      $output = str_replace( $find, $replace, $output );
    }
  }


  /***********************
  * Add SVG Support for Media Library
  *
  */
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );

  function custom_admin_head() {
    $css = '';
    $css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';
    echo '<style type="text/css">'.$css.'</style>';
  }
  add_action('admin_head', 'custom_admin_head');


?>