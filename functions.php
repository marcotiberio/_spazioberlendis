<?php
/**
 * spazioberlendis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package spazioberlendis
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'spazioberlendis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function spazioberlendis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on spazioberlendis, use a find and replace
		 * to change 'spazioberlendis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'spazioberlendis', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'spazioberlendis' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'spazioberlendis_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'spazioberlendis_setup' );


// This enables the function that lets you set new image sizes
add_theme_support( 'post-thumbnails' );
// These are the new image sizes we cooked up
add_image_size( 'post-image', 520, 360 );
// Now we register the size so it appears as an option within the editor
add_filter( 'image_size_names_choose', 'my_custom_image_sizes' );
function my_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'post-image' => __( 'Post Images' ),
    ) );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spazioberlendis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spazioberlendis_content_width', 640 );
}
add_action( 'after_setup_theme', 'spazioberlendis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spazioberlendis_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'spazioberlendis' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'spazioberlendis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'spazioberlendis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spazioberlendis_scripts() {
	wp_enqueue_style( 'spazioberlendis-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'spazioberlendis-style', 'rtl', 'replace' );

	wp_deregister_script( 'jquery' );
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);

	wp_enqueue_script( 'flickityjs', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array( 'jquery' ), '1.9.0', true );
	wp_enqueue_script( 'flickityjs-init', get_template_directory_uri(). '/js/flickity-docs.min.js', array( 'flickityjs' ), '1.9.0', true );
		
	wp_enqueue_style( 'flickitycss', get_template_directory_uri() . '/css/flickity.min.css', 'all');

	wp_enqueue_script( 'spazioberlendis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'spazioberlendis-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spazioberlendis_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
* Creating a function to create our News
*/
 
function custom_post_type_news() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'News', 'Post Type General Name', '_motius' ),
			'singular_name'       => _x( 'News', 'Post Type Singular Name', '_motius' ),
			'menu_name'           => __( 'News', '_motius' ),
			'parent_item_colon'   => __( 'Parent News', '_motius' ),
			'all_items'           => __( 'All News', '_motius' ),
			'view_item'           => __( 'View News', '_motius' ),
			'add_new_item'        => __( 'Add New News', '_motius' ),
			'add_new'             => __( 'Add New', '_motius' ),
			'edit_item'           => __( 'Edit News', '_motius' ),
			'update_item'         => __( 'Update News', '_motius' ),
			'search_items'        => __( 'Search News', '_motius' ),
			'not_found'           => __( 'Not Found', '_motius' ),
			'not_found_in_trash'  => __( 'Not found in Trash', '_motius' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'News', '_motius' ),
			'description'         => __( 'News news and reviews', '_motius' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'  => array( 'category' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
	 
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'News', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_News', 0 );