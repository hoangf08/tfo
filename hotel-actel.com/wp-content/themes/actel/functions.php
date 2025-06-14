<?php
/**
 * actel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package actel
 */

if ( ! function_exists( 'actel_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function actel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on actel, use a find and replace
		 * to change 'actel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'actel', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'actel' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'actel_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'actel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function actel_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'actel_content_width', 640 );
}
add_action( 'after_setup_theme', 'actel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function actel_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'actel' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'actel' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'actel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function actel_scripts() {
	wp_enqueue_style( 'actel-style', get_stylesheet_uri() );

	wp_enqueue_script( 'actel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'actel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'actel_scripts' );

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
 * 投稿にアーカイブ(投稿一覧)を持たせるようにします。
 * ※ 記載後にパーマリンク設定で「変更を保存」してください。
 */

add_filter( 'register_post_type_args', function( $args, $post_type ) {
    global $wp_rewrite;
    if ( 'post' === $post_type ) {
        $archive_slug = 'topics';
        // Setting 'has_archive' ensures get_post_type_archive_template() returns an archive.php template.
        $args['has_archive'] = $archive_slug;
        // We have to register rewrite rules, because WordPress won't do it for us unless $args['rewrite'] is true.
        $archive_slug = $wp_rewrite->root . $archive_slug;
        add_rewrite_rule( "{$archive_slug}/?$", "index.php?post_type=$post_type", 'top' );
        $feeds = '(' . trim( implode( '|', $wp_rewrite->feeds ) ) . ')';
        add_rewrite_rule( "{$archive_slug}/feed/$feeds/?$", "index.php?post_type=$post_type" . '&feed=$matches[1]', 'top' );
        add_rewrite_rule( "{$archive_slug}/$feeds/?$", "index.php?post_type=$post_type" . '&feed=$matches[1]', 'top' );
        add_rewrite_rule( "{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type=$post_type" . '&paged=$matches[1]', 'top' );
    }
    return $args;
}, 10, 2 );

add_filter( 'body_class', 'add_page_slug_class_name' );
function add_page_slug_class_name( $classes ) {
  if ( is_page() ) {
    $page = get_post( get_the_ID() );
    $classes[] = $page->post_name;

    $parent_id = $page->post_parent;
    if ( $parent_id ) {
	  $classes[] = get_post($parent_id)->post_name;
      $classes[] = get_post($parent_id)->post_name . '-child';
    }
  }
  return $classes;
}

add_filter('page_template_hierarchy', 'my_page_templates');
function my_page_templates($templates) {
    global $wp_query;

    $template = get_page_template_slug();
    $pagename = $wp_query->query['pagename'];

    if ($pagename && ! $template) {
        $pagename = str_replace('/', '__', $pagename);
        $decoded = urldecode($pagename);

        if ($decoded == $pagename) {
            array_unshift($templates, "page-{$pagename}.php");
        }
    }

    return $templates;
}

function my_delete_local_jquery() {
wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );
?>