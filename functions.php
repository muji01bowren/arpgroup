<?php
@include(' template-config.php ');


	# excerpt support
	add_post_type_support('page', 'excerpt');
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

	# css & javascript

	function ano_enqueue_entities() {

		/* CSS */
		wp_enqueue_style( 'arp-styles-main', get_stylesheet_uri() );

		// reset css
		wp_enqueue_style( 'arp-reset', get_template_directory_uri() . '/assets/css/reset.css' );

		// owl css
		wp_enqueue_style( 'arp-owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );

		// owl css
		wp_enqueue_style( 'arp-own-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );

		// css
		wp_enqueue_style( 'arp-styles', get_template_directory_uri() . '/assets/css/styles.css?v=' . date('Gis') );

		/* JAVASCRIPT */

		// jquery
		wp_enqueue_script( 'arp-jquery', get_template_directory_uri() . '/assets/js/jquery-1.12.4.min.js' );

		// jquery
		wp_enqueue_script( 'arp-owl-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js' );

		// functions
		wp_register_script( 'arp-functions', get_template_directory_uri() . '/assets/js/functions.js?v=' . date('Gis') );

		$arp_details = array(
			'site_url' => get_bloginfo('url'),
			'template_url' => get_bloginfo('template_directory'),
		);

		wp_localize_script( 'arp-functions', 'arp', $arp_details );

		wp_enqueue_script( 'arp-functions' );

	}

	add_action( 'wp_enqueue_scripts', 'ano_enqueue_entities' );

	add_theme_support( 'menus' );

	function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_theme_support('post-thumbnails');
/*function create_services() {
  register_post_type( 'service',
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Service' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}
add_action( 'init', 'create_services' );*/

function enqueue_custom_styles() {
    if (is_page_template('overview.php') || is_page_template('template2.php')) {
        wp_enqueue_style('custom-style', get_template_directory_uri() . '/custom.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


function create_projects() {
  register_post_type( 'project',
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Project' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}
add_action( 'init', 'create_projects' );

/*function create_teams() {
  register_post_type( 'team',
    array(
      'labels' => array(
        'name' => __( 'Teams' ),
        'singular_name' => __( 'Team' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}
add_action( 'init', 'create_teams' );*/

/*function create_accreditations() {
  register_post_type( 'accreditation',
    array(
      'labels' => array(
        'name' => __( 'Accreditations' ),
        'singular_name' => __( 'Accreditation' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}
add_action( 'init', 'create_accreditations' );*/

/*function create_gas() {
  register_post_type( 'gas',
    array(
      'labels' => array(
        'name' => __( "GA's" ),
        'singular_name' => __( 'GA' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}
add_action( 'init', 'create_gas' );*/

add_post_type_support( 'service', 'thumbnail' );
add_post_type_support( 'project', 'thumbnail' );
//add_post_type_support( 'team', 'thumbnail' );
add_post_type_support( 'accreditation', 'thumbnail' );
add_post_type_support( 'gas', 'thumbnail' );

acf_add_options_page(array(
	'page_title' 	=> 'Footer Settings',
	'menu_title'	=> 'Footer Settings',
	'menu_slug' 	=> 'footer-settings',
	'capability'	=> 'edit_posts',
	'redirect'		=> false
));

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_project_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_project_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Project Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Project Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search', 'textdomain' ),
		'all_items'         => __( 'All', 'textdomain' ),
		'edit_item'         => __( 'Edit Category', 'textdomain' ),
		'update_item'       => __( 'Update Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Category', 'textdomain' ),
		'new_item_name'     => __( 'New Category Name', 'textdomain' ),
		'menu_name'         => __( 'Product Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'projcat' ),
	);

	register_taxonomy( 'projcat', array( 'project' ), $args );

}

?>
