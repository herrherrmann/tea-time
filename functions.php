<?php
if ( ! isset( $content_width ) ) $content_width = 800;

function herrherrmann_automatic_feed_links() {
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'herrherrmann_automatic_feed_links' );

function herrherrmann_title_tag() {
  add_theme_support( 'title-tag' );
}
add_action( 'init', 'herrherrmann_title_tag' );

function herrherrmann_custom_background_support() {
	$defaults = array( 'default-color' => 'EBEBEB' );
	add_theme_support( 'custom-background', $defaults );
}
add_action( 'init', 'herrherrmann_custom_background_support' );

function herrherrmann_custom_header_support() {
	$args = array(
		'width'         => 130,
		'height'        => 106,
		'default-image' => get_template_directory_uri() . '/img/header.svg',
		'uploads'       => true,
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'init', 'herrherrmann_custom_header_support' );

function herrherrmann_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	return $title;
}
add_filter( 'wp_title', 'herrherrmann_wp_title', 10, 2 );

function herrherrmann_menus() {
  register_nav_menu('main-menu', 'Main Menu' );
  register_nav_menu('footer-menu', 'Footer Menu' );
}
add_action( 'init', 'herrherrmann_menus' );

function herrherrmann_styles_and_scripts() {
  wp_enqueue_style( 'style-main', get_stylesheet_uri() );
  wp_enqueue_style( 'style-fonts', 'https://fonts.googleapis.com/css?family=Oswald:700' );
}
add_action( 'wp_enqueue_scripts', 'herrherrmann_styles_and_scripts' );

add_filter( 'use_default_gallery_style', '__return_false' );

function herrherrmann_editor_styles() {
  add_editor_style( 'style-editor.css' );
}
add_action( 'init', 'herrherrmann_editor_styles' );

/**
 * Register sidebars and widgetized areas.
 */
// function widgets_init() {
// 	register_sidebar( array(
// 		'name' => 'Sidebar',
// 		'id' => 'sidebar',
// 		'before_widget' => '<div>',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );
//
//     register_sidebar( array(
// 		'name' => 'Footer',
// 		'id' => 'footer',
// 		'before_widget' => '<div>',
// 		'after_widget' => '</div>',
// 		'before_title' => '',
// 		'after_title' => '',
// 	) );
// }
// add_action( 'widgets_init', 'widgets_init' );

function herrherrmann_enqueue_comment_reply() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'comment_form_before', 'herrherrmann_enqueue_comment_reply' );

/* Include page content with show_page_content function. */
function show_page_content( $path ) {
  $post = get_page_by_path( $path );
  $content = apply_filters( 'the_content', $post->post_content );
  echo $content;
}
add_action( 'init', 'show_page_content' );

/* Highlight active custom post page in menu. */
add_filter( 'nav_menu_css_class', 'herrherrmann_menu_classes', 10, 2 );
function herrherrmann_menu_classes( $classes , $item ) {
  if ( get_post_type() == 'software' && $item->title == 'Software' ) {
    // remove unwanted classes if found
    $classes = str_replace( 'current_page_item', '', $classes );
    $classes = str_replace( 'menu-item', 'menu-item current-menu-item', $classes );
	}
  else if ( get_post_type() == 'post' && $item->title == 'Blog' ) {
    // remove unwanted classes if found
    $classes = str_replace( 'current_page_item', '', $classes );
    $classes = str_replace( 'menu-item', 'menu-item current-menu-item', $classes );
  }
	return $classes;
}

?>
