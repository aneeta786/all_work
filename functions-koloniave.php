<?php
/**
 *
 * @package WordPress
 * @subpackage Custom
 * @since Custom 1.0
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname(__FILE__) . '/requirement/class-tgm-plugin-activation.php';
require 'custom_functions.php';

add_action('tgmpa_register', 'bharat_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function bharat_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // Advanced Custom Fields
        array(
            'name' => 'Advanced Custom Fields', // The plugin name.
            'slug' => 'advanced-custom-fields', // The plugin slug (typically the folder name).
            'source' => 'https://downloads.wordpress.org/plugin/advanced-custom-fields.4.4.5.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'external_url' => '', // If set, overrides default API URL and points to an external URL.
        ),
        // Contact Form 7
        array(
            'name' => 'Contact Form 7', // The plugin name.
            'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
            'source' => 'https://downloads.wordpress.org/plugin/contact-form-7.4.3.1.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'external_url' => '', // If set, overrides default API URL and points to an external URL.
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'tgmpa'),
            'menu_title' => __('Install Plugins', 'tgmpa'),
            'installing' => __('Installing Plugin: %s', 'tgmpa'), // %s = plugin name.
            'oops' => __('Something went wrong with the plugin API.', 'tgmpa'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s).
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins'),
            'return' => __('Return to Required Plugins Installer', 'tgmpa'),
            'plugin_activated' => __('Plugin activated successfully.', 'tgmpa'),
            'complete' => __('All plugins installed and activated successfully. %s', 'tgmpa'), // %s = dashboard link.
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa($plugins, $config);
}
function my_enqueue() {
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/custom.js', array('jquery') );
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );
//END
// load custom scripts 
function custom_scripts() {
    wp_enqueue_script('uikit.min', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/js/uikit.min.js', array('jquery'));
    wp_enqueue_script('uikit-icons.min', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/js/uikit-icons.min.js', array('jquery'));
   //wp_enqueue_script('jquery.icheck', get_template_directory_uri() . '/js/jquery.icheck.js', array('jquery'));
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'));
    wp_enqueue_script('validate-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'custom_scripts');

// This theme uses title tag
add_theme_support('title-tag');

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// This theme uses post thumbnails
add_theme_support('post-thumbnails');

// Add default posts and comments RSS feed links to head
add_theme_support('automatic-feed-links');

// This theme uses wp_nav_menu() in one location.
register_nav_menus(array(
    'primary' => __('Primary Navigation', 'custom'),
));

// Sets the post excerpt length
function custom_excerpt_length($length) {
    return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Sets the post excerpt link
function custom_continue_reading_link() {
    return '<a class="readmore" href="' . esc_url(get_permalink()) . '">...</a>';
}

add_filter('excerpt_more', 'custom_continue_reading_link');

// Register widgetized areas
function custom_widgets_init() {
    // Area 1, located in the sidebar.
    register_sidebar(array(
        'name' => __('Sidebar Widget Area', 'custom'),
        'id' => 'sidebar-widget-area',
        'description' => __('Add widgets here to appear in your sidebar.', 'custom'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    // Area 2, located in the footer.
    register_sidebar(array(
        'name' => __('Footer Widget Area', 'custom'),
        'id' => 'footer-widget-area',
        'description' => __('Add widgets here to appear in your footer.', 'custom'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Allotment Sidebar', 'custom'),
        'id' => 'allotment-sidebar',
        'description' => __('Add widgets here to appear in Allotment gardens Sidebar.', 'custom'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'custom_widgets_init');

function custom_product_init() {
    $labels = array(
        'name' => 'Products',
        'singular_name' => 'Product',
        'add_new' => 'Add Product',
        'add_new_item' => 'Add New Product',
        'edit_item' => 'Edit Product',
        'new_item' => 'New Product',
        'all_items' => 'All Products',
        'view_item' => 'View Product',
        'search_items' => 'Search Products',
        'not_found' => 'No products found',
        'not_found_in_trash' => 'No products found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Products'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'product'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
    );

    register_post_type('product', $args);
}

//add_action( 'init', 'custom_product_init' );

function custom_product_taxonomies() {
    $labels = array(
        'name' => _x('Product Categories', 'taxonomy general name'),
        'singular_name' => _x('Product Category', 'taxonomy singular name'),
        'search_items' => __('Search Product Categories'),
        'all_items' => __('All Product Categories'),
        'parent_item' => __('Parent Product Category'),
        'parent_item_colon' => __('Parent Product Category:'),
        'edit_item' => __('Edit Product Category'),
        'update_item' => __('Update Product Category'),
        'add_new_item' => __('Add New Product Category'),
        'new_item_name' => __('New Product Category Name'),
        'menu_name' => __('Product Categories'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'product-category'),
    );

    register_taxonomy('product_cat', 'product', $args);
}

//add_action( 'init', 'custom_product_taxonomies' );


function create_tag_wppm_locations() {
    $labels = array(
        'name' => _x('Tags', 'taxonomy general name'),
        'singular_name' => _x('Tag', 'taxonomy singular name'),
        'search_items' => __('Search Tags'),
        'popular_items' => __('Popular Tags'),
        'all_items' => __('All Tags'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Tag'),
        'update_item' => __('Update Tag'),
        'add_new_item' => __('Add New Tag'),
        'new_item_name' => __('New Tag Name'),
        'separate_items_with_commas' => __('Separate tags with commas'),
        'add_or_remove_items' => __('Add or remove tags'),
        'choose_from_most_used' => __('Choose from the most used tags'),
        'menu_name' => __('Tags'),
    );

    register_taxonomy('locations_tag', 'wppm_locations', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'tag'),
    ));
}

add_action('init', 'create_tag_wppm_locations', 0);

// add widget first last classes
function widget_first_last_classes($params) {

    global $my_widget_num; // Global a counter array
    $this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
    $arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets  

    if (!$my_widget_num) {// If the counter array doesn't exist, create it
        $my_widget_num = array();
    }

    if (!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
        return $params; // No widgets in this sidebar... bail early.
    }

    if (isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
        $my_widget_num[$this_id] ++;
    } else { // If not, create it starting with 1
        $my_widget_num[$this_id] = 1;
    }

    $class = 'class="block_' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options

    if ($my_widget_num[$this_id] == 1) { // If this is the first widget
        $class .= 'block-first ';
    } elseif ($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
        $class .= 'block-last ';
    }

    $params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

    return $params;
}

add_filter('dynamic_sidebar_params', 'widget_first_last_classes');

function cleanup_shortcode_fix($content) {
    $array = array(
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']',
        ']<br>' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}

add_filter('the_content', 'cleanup_shortcode_fix');

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);

// SVG image support Code
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

// filter p tags on images 
function filter_ptags_on_images($content) {
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

function top_parent_category() {
    ?>
    <div class="cate_list section">
        <div class="col-row">
            <?php foreach (get_terms('map_location_category', array('parent' => 0, 'order' => 'DESC', 'hide_empty' => false)) as $cat): ?>          
                <div class="col-sm-4 animation-element uk-animation-slide-top">
                    <div class="cat_box">
                        <h3 class="h2"><?php echo $cat->name; ?></h3>
                        <div class="img"><img src="<?php the_field('map_category_image', $cat); ?>" alt=""></div>
                        <a class="seemore" href="<?php echo home_url('/') . 'map_location_category/' . $cat->slug; ?>">Se større kort </a>
                    </div>
                </div>
            <?php endforeach; ?>        
        </div>
    </div>
    <?php
}

function set_default_object_terms1($post_id, $post) {
    if ('publish' !== $post->post_status && $post->post_type === 'wppm_locations') {
        $cat_ids = array(91, 92); // taxonomy category id set to default set publice time
        wp_set_object_terms($post_id, $cat_ids, 'map_location_category');
        //$cat_ids = array(30); // taxonomy category id set to default set publice time
        //wp_set_object_terms( $post_id, $cat_ids, 'map_location_category' );
    }
}

//add_action( 'save_post', 'set_default_object_terms1', 0, 2 );

/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 */
function base_pagination() {
    global $wp_query;

    $big = 999999999; // This needs to be an unlikely integer
    // For more options and info view the docs for paginate_links()
    // http://codex.wordpress.org/Function_Reference/paginate_links
    $paginate_links = paginate_links(
            array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'mid_size' => 5,
                'prev_text' => ' < ',
                'next_text' => ' > ',
                'type' => 'list'
            )
    );

    // Display the pagination if more than one page is found
    if ($paginate_links) {
        echo '<div class="pagination">';
        echo $paginate_links;
        echo '</div><!--// end .pagination -->';
    }
}

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Gardens Navigation',
        'menu_title' => 'Garden Navigation',
        'parent_slug' => 'theme-general-settings',
    ));
}

add_shortcode('home_recent_listings', 'home_recent_listings');

function home_recent_listings() {
    $args = array('post_type' => 'wppm_locations', 'posts_per_page' => 5, 'post_status' => 'published');
    $home_listings = new WP_Query($args);

    $return = '';
    $return = '<div class="regular slider">';
    if ($home_listings->have_posts()) {
        while ($home_listings->have_posts()) : $home_listings->the_post();
$post_id=get_the_id();
            $return .= '<div>';
            $return .= '<div class="grid_cont">';
            $return .= '<img class="cls-single-location" data-location_id="'.$post_id.'" src="' . get_the_post_thumbnail_url() . '" alt="">';
            $return .= '<div class="top_icon">';
            $return .= '<img src="/wp-content/themes/kolonihave/images/home_icon.png"> ' . get_field('house_mp', get_the_id()) . ' mp 
                <img src="/wp-content/themes/kolonihave/images/bd_icon.png"> ' . get_field('garden_mp', get_the_id()) . ' mp
            </div>';
            $return .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            $return .= '<div class="desc">' . substr(get_field('description', get_the_id()), 0, 60) . '</div>';
            $return .= '<div class="price">' . get_field('price', get_the_id()) . ' KR</div>';
            $return .= '<a href="#" id="n_toggle" class="like_other n_toggle">Se Mere</a>';
            $return .= '</div>';
            $return .= '</div>';

        endwhile;
    }
    $return .= '</div>';
    return $return;
}

// from new listing page redirect to login if user not logged in
add_action( 'template_redirect', 'redirect_to_specific_page' );
function redirect_to_specific_page() {
    if ( is_page('opret-salgsannonce') && ! is_user_logged_in() ) {
        wp_safe_redirect( '/login/?redirect_to='. get_site_url(). $_SERVER["REQUEST_URI"], 301 ); 
        exit;
    }
}
// disable login register plugin update
function disable_plugin_updates( $value ) {
   unset( $value->response['wp-front-end-login-and-register/wp-mp-register-login.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );

//hide adminbar from subscribers
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
/*
// redirect to front-end if user is subscriber
function restrict_access_admin_panel(){
    if(is_user_logged_in()){
        global $current_user;
        get_currentuserinfo();
        if ($current_user->user_level <  4) {
            wp_redirect( get_bloginfo('url') );
            exit;
        }
    }
}
add_action('admin_init', 'restrict_access_admin_panel', 1);
*/
#QdeDFlx8: updated redirect, allows admin-ajax.php
add_action( 'admin_init', 'redirect_user' );
function redirect_user() {
    $user = wp_get_current_user();
    if( ( !defined('DOING_AJAX') || ! DOING_AJAX ) && ( empty( $user ) || !in_array( "administrator", (array) $user->roles ) ) ) {
        wp_safe_redirect(home_url());
        exit;
    }
}

/*******************************************************/
/************ code for no-ads followup *****************/
/*******************************************************/
add_shortcode( 'test_my_code', 'test_my_code' );
function test_my_code(){
    $users_for_followup = get_followup_users();
    if (count($users_for_followup)> 0){
        foreach ($users_for_followup as $key => $value) {
            // echo $value->search_url;
            $search_url = parse_url($value->search_url, PHP_URL_QUERY);
            $queries = array();
            parse_str($search_url, $queries);

            $queries_filtered = array_filter($queries);
            if(isset($queries_filtered['sortby'])){
                unset($queries_filtered['sortby']);
            }

            if(count($queries_filtered) > 0){
                $args = get_queried_args($queries_filtered);
                // echo '<pre>';
                // print_r($args);
                // echo '</pre>';
                $listings = new WP_Query($args);

                if ($listings->have_posts()) {
                    $count = $listings->found_posts;
                    // echo $count." post found!</br>";
                }else{
                    // echo "no post found!</br>";
                }
            }
            // break;
        }
    }
    
    
}
function get_followup_users(){
    global $wpdb;
    $tablename = $wpdb->prefix.'kolonihave_search_notify';
    return $results = $wpdb->get_results ("SELECT * FROM  $tablename WHERE email_sent = 0;");
}
function get_queried_args($queries_filtered){
    $args = array(
        'post_type' => 'wppm_locations',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'map_location_category',
                'field' => 'slug',
                'terms' => 'kolonihavehus',
                'operator' => 'IN'
            )
        )
    );

    if (isset($queries_filtered['garden_id']) && $queries_filtered['garden_id'] != ''):
        $args['meta_query'][] = array(
            'key' => 'gardnen_id',
            'value' => $queries_filtered['garden_id'],
            'compare' => '=',
        );
    endif;
    if (isset($queries_filtered['property_region']) && $queries_filtered['property_region'] != ''):
        $args['tax_query'][] = array(
            'taxonomy' => 'map_location_category',
            'field' => 'slug',
            'terms' => $queries_filtered['property_region'],
            'compare' => 'IN',
        );
        $latest_args['tax_query'][] = array(
            'taxonomy' => 'map_location_category',
            'field' => 'slug',
            'terms' => $queries_filtered['property_region'],
            'compare' => 'IN',
        );
    endif;
    return $args;
}
// notify for no result 
add_action('wp_ajax_save_user_to_notify', 'save_user_to_notify');
add_action('wp_ajax_nopriv_save_user_to_notify', 'save_user_to_notify');
function save_user_to_notify() {
    if(isset($_POST['user_email'])){
        global $wpdb;
        $tablename = $wpdb->prefix.'kolonihave_search_notify';
        $insert_int = $wpdb->insert( $tablename, array(
            'user_email' => $_POST['user_email'], 
            'search_url' => $_POST['curr_search'],
            'email_sent' => 0
        ));
        echo $insert_int;
    }
    die;
}
// notify for no result 
/*******************************************************/
// Display notified persons list
if ( is_admin() ) {
    add_action( 'admin_menu', 'fn_add_admin_page_kolonihave_noti', 100 );
}
function fn_add_admin_page_kolonihave_noti() {
    add_submenu_page(
        'options-general.php',
        __( 'Empty Allotment Emails' ),
        __( 'Empty Allotment Emails' ),
        'manage_options', // Required user capability
        'search-notification-users',
        'fn_list_noti_users'
    );
}

function fn_list_noti_users() {
    global $wpdb;
    $tablename = $wpdb->prefix.'kolonihave_search_notify';
    
    $detailed = "SELECT Month(`created_at`) as group_month, Year(`created_at`) as group_year, Count(*) As total FROM $tablename GROUP BY Year(`created_at`), Month(`created_at`)";
    $detailed_list = $wpdb->get_results($detailed);

    $qry = "SELECT * FROM `$tablename` ORDER BY `sid` DESC";
    $list = $wpdb->get_results($qry);

    if(count($detailed_list)>0){
        echo "<h2>List Overview</h2>";
        echo '<table class="list-data detailed-list">';
            echo '<tr>';
                echo '<th>Month</th>';
                echo '<th>Year</th>';
                echo '<th>Total</th>';
            echo '</tr>';
            foreach ($detailed_list as $key1 => $detail_item) {
                $theMonth = $detail_item->group_month;
                if($theMonth <= 9){
                    $theMonth = '0'.$theMonth;
                }
                echo '<tr>';
                    echo '<td>'.date("F", mktime(0, 0, 0, $theMonth, 10)).'</td>';
                    echo '<td>'.$detail_item->group_year.'</td>';
                    echo '<td>'.$detail_item->total.'</td>';
                echo '</tr>';
            }
        echo '</table>';
    }

    if(count($list)>0){
        echo "<h2>List Details</h2>";
        echo '<table class="list-data">';
            echo '<tr>';
                echo '<th>S.no</th>';
                echo '<th>Email</th>';
                echo '<th>Date Created</th>';
            echo '</tr>';
            foreach ($list as $key => $item) {
                echo '<tr>';
                    echo '<td>'.($key + 1).'</td>';
                    echo '<td>'.$item->user_email.'</td>';
                    echo '<td>'.$item->created_at.'</td>';
                echo '</tr>';
            }
        echo '</table>';
    }else{
        echo 'No result found.';
    }
    echo '<style>
        table.list-data {
            text-align: left;
            border-spacing: unset;
        }

        table.list-data th, table.list-data td {
            padding: 5px 20px;
            border: 1px solid #ccc;
        }
    </style>';
}
/************ END no-ads followup *********************/

/************ Fetch Entries *********************/

add_shortcode( 'fetch_entires', 'fetch_entires' );
function fetch_entires(){
    global $wpdb;
    $table_name = $wpdb->prefix . "gf_entry_meta";
    $location = "Østervang H/F";
    $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE entry_id IN (SELECT `entry_id` FROM $table_name where form_id= 2  )" ); //AND meta_value = '".$loaction."'
  //  AND meta_value = '".$location."'
    $data = array();
    foreach($results as $key => $row){
        $data[$row->entry_id]['entry_id'] = $row->entry_id;
        if($row->meta_key == 1){
            $data[$row->entry_id]['location'] = $row->meta_value;
        }
        if($row->meta_key == 2){
            $data[$row->entry_id]['name'] = $row->meta_value;
        }
        if($row->meta_key == 3){
          $email =  $data[$row->entry_id]['email'] = $row->meta_value;
          //echo $email;
        }
        if($row->meta_key == 5){

        $notification =   $data[$row->entry_id]['notification'] = $row->meta_value;
        // echo $notification;
        }  
    }

foreach($data as $fetch_data){
//     echo "<pre>";
// print_r($fetch_data['entry_id']);
// echo "</pre>"; 
    $name  = $fetch_data['name']; 
    echo "<br>";
        echo $fetch_data['email'];
        echo "<br>";
        echo $fetch_data['location'];
        echo "<br>";
        echo $fetch_data['notification'];
        
        echo "<br>";
   // print_r($fetch_data);
    $emails = $fetch_data['email'];
    $entry_id = $fetch_data['entry_id'];
    
    $decoded = base64_encode($emails);
    echo $decoded;
    echo "<a href='unsubscribe/?koloniemail=$decoded/'>Unsubscribe</a>";
    echo "<br>";
}    
}


function wpdocs_register_my_custom_menu_page(){
    add_menu_page( 
        __( 'Garden Listing Subscriber', 'textdomain' ),
        'Garden Listing Subscriber',
        'manage_options',
        'garden-listing-subscriber',
        'my_custom_menu_page',
        plugins_url( 'myplugin/images/icon.png' ),
        6
    ); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
/*******************Get Entry data form 2*************************/
function my_custom_menu_page(){
    global $wpdb;
    $table_name = $wpdb->prefix . "gf_entry_meta";
   
    //$location = "Østervang H/F";
    $results = $wpdb->get_results( "SELECT * FROM $table_name where form_id = 2" );
 // if (!empty($results)) {
    
    $data = array();
    echo "<table style>";
 echo "<style>
    table tbody tr td {
    border: 1px solid #ccc;
    padding: 5px;
}
th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
  text-align: center;
}
table {
    width: 100%;
}
 td th {
  border: 1px solid #ddd;
  padding: 8px;
}
echo </style>";
       echo "<h1 style='text-align:center'>Garden Listing Subscriber</h1>";
        echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>NAME</th>";
            echo "<th>EMAIL</th>";
            echo "<th>LOCATION</th>";
            echo "</tr>";
            foreach($results as $key => $row){
                 // $ids =   $data[$row->id]['id'] = $row->id;
                    if($row->meta_key == 1){
                       $location = $data[$row->entry_id]['location'] = $row->meta_value;
                       
                    }
                    if($row->meta_key == 2){
                      $name=  $data[$row->entry_id]['name'] = $row->meta_value;
                      
                    }
                    if($row->meta_key == 3){
                      $email =  $data[$row->entry_id]['email'] = $row->meta_value;
                     
                  }
      
            }
            $count = 1;
              foreach($data as $rowdata){ ?>
                    <tr>
                        
                            <td><?php echo $count ; ?></td>
                            <td><?php echo $rowdata['name'] ; ?></td>
                            <td><?php echo $rowdata['email'] ;?></td>
                            <td><?php echo $rowdata['location'] ;?></td>
                        </tr>
            <?php $count++; }
    //}

 exit; 
}
/*******************Email Send after post create*************************************/
function after_task_post_created($post_id) {
   // $post_id ='8700';
           if (get_post_type($post_id) != 'wppm_locations')
            return;
          if ( wp_is_post_revision( $post_id ) )
                return;
          if (get_post_status( $post_id ) != 'publish'  )
          return;
                $field = get_field('address_1', $post_id);
                global $current_user;
                $email = $current_user->user_email;
           // if( $field == 'Østervang H/F'){
                  $to = $current_user->user_email;
                  $subject = "Ny kolonihave til salg i dit ønskede område";
                  $decoded = base64_encode($to);
                  $headers  = 'MIME-Version: 1.0' . "\r\n";
                  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                  $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" .'X-Mailer: PHP/' . phpversion();
                  $message = '<html><body>';
                  $message .= '<h2>Fantastisk ! Denne kolonihave er netop blevet tilføjet (Haveforeningens navn)</h2><br/>';
                   $message .= '<div style="float:left" class="img_lect"><img src="https://kolonihave.nu/wp-content/themes/kolonihave/images/kolonihave-logo.png" alt=""></div>';
                  $message .= '<div style="float:right" class="img_right"><a href="https://kolonihave.nu/unsubscribe/?koloniemail='.$decoded.'"  style="color:#fff; background-color: #868d3d; margin-top:20px; margin-bottom:20px; padding: 11px;font-size:18px;">Se eller ændre dine notifikationer her</a></div>';

                  $message .= '<p>Se kolonihaven her</p></body></html>';
                   wp_mail($to,$subject,$message,$headers);
                 //}
}
///add_action( 'wp_insert_post', 'after_task_post_created');
//add_shortcode('after_task_post_created' , 'after_task_post_created');
    
/***************Subscribe Notifiction call ajax********************************/
function subscribe_notifications(){
    $email =$_POST['email'];
    $entry_id =$_POST['entry_id'];
    $entry = GFAPI::get_entry( $entry_id );
   // $entry['5'] = '0';
   
    if($entry['5'] == 1){
        $entry['5'] = '0';
    }else{
         $entry['5'] = '1';
    }      
     $result = GFAPI::update_entry( $entry );
}
add_action('wp_ajax_subscribe_notifications', 'subscribe_notifications');
add_action('wp_ajax_nopriv_subscribe_notifications', 'subscribe_notifications');
