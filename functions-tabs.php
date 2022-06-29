<?php 

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' ); 
function my_enqueue_assets() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
} 

/**
 * Set left & right sidebar template as the default
 */
function wpse196289_default_page_template() {
    global $post;
    if ( 'page' == $post->post_type 
        && 0 != count( get_page_templates( $post ) ) 
        && get_option( 'page_for_posts' ) != $post->ID // Not the page for listing posts
        && '' == $post->page_template // Only when page_template is not set
    ) {
        $post->page_template = "page-template-sidebars.php";
    }
}
add_action('add_meta_boxes', 'wpse196289_default_page_template', 1);
function my_theme_enqueue_styles() {
 wp_enqueue_script( 'et_mobile_nav_menu', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_enqueue() {
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/custom.js', array('jquery') );
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );
function recipes_data_filter() {
    ob_start();  ?>
     <div class="sorted-section" >
         <div class="top-heading">
             <h3>Sort By:</h3>
             <span class="close">x</span>
             <div class="results-grid" id="category-post-content">
             </div>
         </div>
      </div>
   <?php
   return ob_get_clean();
}
add_shortcode( 'recipes_data_filter', 'recipes_data_filter' );
//add_action( 'wp_footer', 'ajax_fetchs' );
 
add_action('wp_ajax_data_fetchs' , 'data_fetchs');
add_action('wp_ajax_nopriv_data_fetchs','data_fetchs');
function filter_texonomy() {
  $texonomies =$_POST['texonomies'];
    $terms = $_POST['term'];
    
    $args = array(
        'post_type' => 'recipe',
        'post_status' => 'publish',
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'index',
                'field' => 'term_id',
                'terms'    => $terms
            ),
            array(
                'taxonomy' =>'sort_by',
                'field' => 'term_id',
                'terms'    => $terms
            )
        )
    );
    
        $arr_posts = new WP_Query( $args ); 
    //   echo "<pre>";
    //   print_r($arr_posts);
    //   echo "</pre>";
      if ($arr_posts->have_posts()) :
    while ($arr_posts->have_posts()) :
        $arr_posts->the_post(); ?>
        <div class="grid-with-text">
             <div class="image">
             <?php
            if (has_post_thumbnail()) :
                the_post_thumbnail();
      endif; ?>
              </div>
              <div class="content">
                 <h4><?php the_title(); ?></h4>
                 <?php $my_content = apply_filters('the_content', get_the_content());
      $my_content = wp_strip_all_tags($my_content); ?>
                 <h3><?php echo  wp_trim_words(get_the_excerpt(), 4); ?></h3>
               </div>
        </div>
    <?php endwhile;
      wp_reset_postdata();
      endif;
      exit;
  
}
add_action('wp_ajax_filter_texonomy', 'filter_texonomy');
add_action('wp_ajax_nopriv_filter_texonomy', 'filter_texonomy');




function get_texonomies() {
    ob_start();  
    $args = array(
        'post_type' => 'recipe',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
            'taxonomy' => 'index',
            'field' => 'term_id',
            'terms' => array( 74,49,51)
             )
          )
        );
        $query = new WP_Query( $args ); 
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <?php
            }
        }
       
       
   
   return ob_get_clean();
}
add_shortcode( 'get_texonomies', 'get_texonomies' );