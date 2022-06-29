<?php 
	 add_action( 'wp_enqueue_scripts', 'arisa_child_enqueue_styles' );
	 function arisa_child_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		  } 
		   add_action( 'wp_enqueue_scripts', 'wiio_child_theme_style' );
		  
				function wiio_child_theme_style() {
					
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), rand(111,9999), 'all' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/style.css', array('parent-style') );
					wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/css/slick.css', array('parent-style') );
					wp_enqueue_style( 'font-style', get_stylesheet_directory_uri() . '/fonts/stylesheet.css', array('parent-style') );
				}
				function wiio_custom_scripts() {
					wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/js/slick/slick.js', array( 'jquery' ),'',true );
					wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ),'',true );
				}
				add_action( 'wp_enqueue_scripts', 'wiio_custom_scripts' );
				// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter( 'use_widgets_block_editor', '__return_false' );

	
if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
 
    function mytheme_register_nav_menu(){
        register_nav_menus( array(
            'primary_menus' => __( 'Platform', 'text_domain' ),
            'footer_menu'  => __( 'other', 'text_domain' ),
			'integrations_menu'  => __( 'Integrations', 'text_domain' ),
			'Help_menu'  => __( 'Helps', 'text_domain' ),
			'Lng'  => __( 'Language Menu', 'text_domain' ),

        ) );
    }
    add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
	function wpdocs_theme_slug_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Footer 5', 'textdomain' ),
			'id'            => 'help-menu',
			'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );
	}
	add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}
function my_theme_custom_upload_mimes( $existing_mimes ) { 
	// Add webm to the list of mime types. $existing_mimes['webm'] = 'video/webm';
	// Return the array back to the function with our added mime type.
	return $existing_mimes;
	}
	add_filter( 'mime_types', 'my_theme_custom_upload_mimes' );


	add_action('init', 'work_register');   

function work_register() {   

$labels = array( 
    'name' => _x('Teams', 'post type general name'), 
    'singular_name' => _x('Team Item', 'post type singular name'), 
    'add_new' => _x('Add New', 'Team item'), 
    'add_new_item' => __('Add New Team Item'), 
    'edit_item' => __('Edit Team Item'), 
    'new_item' => __('New Team Item'), 

    'view_item' => __('View Team Item'), 
    'search_items' => __('Search Team'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   

$args = array( 
	'labels' => array(
		'name' => __( 'Teams' ),
		'singular_name' => __( 'team' )
	),
	'public' => true,
	'has_archive' => true,
	'rewrite' => array('slug' => 'team'),
	'show_in_rest' => true,
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array('title','editor','thumbnail') 
);   

register_post_type( 'Team' , $args ); 
register_taxonomy("categoriess", array("team"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => array( 'slug' => 'Team', 'with_front'=> false )));



}





add_action('init', 'help_center');   

function help_center() {   

$labels = array( 
    'name' => _x('Help Center', 'post type general name'), 
    'singular_name' => _x('Help Center Item', 'post type singular name'), 
    'add_new' => _x('Add New', 'Help Center item'), 
    'add_new_item' => __('Add New Help Center Item'), 
    'edit_item' => __('Edit Help Center Item'), 
    'new_item' => __('New Help Center Item'), 

    'view_item' => __('View Help Center Item'), 
    'search_items' => __('Search Help Center'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   

$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'menu_icon' => site_url() . '/wp-content/uploads/2022/01/email.png', 
    'rewrite' => array( 'slug' => 'help_center', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array('title','editor','thumbnail') 
);   

register_post_type( 'help_center' , $args ); 

register_taxonomy("help_center", array("help_center"), array("hierarchical" => true, "label" => "help_categories", "singular_label" => "Category", "rewrite" => array( 'slug' => 'help_center', 'with_front'=> false )));



}
function meks_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

function the_dramatist_custom_login_css() {
    echo '<style type="text/css"> 
	.mo-openid-app-icons {
		display: none !important;
	}
	</style>';
}
add_action('login_head', 'the_dramatist_custom_login_css');

function remove_uncategorized_links( $categories ){

	foreach ( $categories as $cat_key => $category ){
		if( 28 == $category->term_id ){
			unset( $categories[ $cat_key ] );
		}
	}

	return $categories;
	
} add_filter('get_the_categories', 'remove_uncategorized_links', 1);


function change_translate_text( $translated_text ) {
	global $sitepress;
	$sitepress->switch_lang(ICL_LANGUAGE_CODE);
	$oldtext = "Subscribe Now";
	if(ICL_LANGUAGE_CODE == 'pt-pt'){

		if ( $oldtext === $translated_text ) {
            $translated_text = 'Inscreva-se agora';
    }
	}elseif(ICL_LANGUAGE_CODE == 'fr'){
		if ( $oldtext === $translated_text ) {
            $translated_text = 'Abonnez-vous maintenant';
    }
	}
   
        return $translated_text;
}
add_filter( 'gettext', 'change_translate_text', 20 ); 

function wpdocs_theme_slug_widgets_inits() {
    register_sidebar( array(
        'name'          => __( 'stay in touch', 'textdomain' ),
        'id'            => 'stay-in-touch',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_inits' );


add_action( 'wp_footer', 'mycustom_wp_footer' );
function mycustom_wp_footer() {
?>
     <script type="text/javascript">
         document.addEventListener( 'wpcf7mailsent', function( event ) {
			
         if ( '2311' == event.detail.contactFormId ) { // Change 123 to the ID of the form 
			//alert("df");
         jQuery('#myModal2').modal('show'); //this is the bootstrap modal popup id
       }
        }, false );
         </script>
       <?php  } 

	   