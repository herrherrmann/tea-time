<?php
if ( ! isset( $content_width ) ) $content_width = 800;

function tea_time_load_theme_textdomain() {
	load_theme_textdomain( 'tea-time', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'after_setup_theme', 'tea_time_load_theme_textdomain' );

function tea_time_automatic_feed_links_support() {
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'tea_time_automatic_feed_links_support' );

function tea_time_title_tag_support() {
  add_theme_support( 'title-tag' );
}
add_action( 'init', 'tea_time_title_tag_support' );

function tea_time_custom_background_support() {
	$custom_background_args = array( 'default-color' => 'EBEBEB' );
	add_theme_support( 'custom-background', $custom_background_args );
}
add_action( 'init', 'tea_time_custom_background_support' );

function tea_time_custom_header_support() {
	$custom_header_args = array(
		'width'         => 130,
		'height'        => 106,
		'default-image' => get_template_directory_uri() . '/img/header.svg',
		'uploads'       => true,
	);
	add_theme_support( 'custom-header', $custom_header_args );
}
add_action( 'init', 'tea_time_custom_header_support' );

function tea_time_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );
	return $title;
}
add_filter( 'wp_title', 'tea_time_wp_title', 10, 2 );

function tea_time_menus() {
  register_nav_menu('main-menu', 'Main Menu' );
  register_nav_menu('footer-menu', 'Footer Menu' );
}
add_action( 'init', 'tea_time_menus' );

function tea_time_styles_and_scripts() {
  wp_enqueue_style( 'style-main', get_stylesheet_uri() );
  wp_enqueue_style( 'style-fonts', 'https://fonts.googleapis.com/css?family=Oswald:700' );
}
add_action( 'wp_enqueue_scripts', 'tea_time_styles_and_scripts' );

add_filter( 'use_default_gallery_style', '__return_false' );

function tea_time_editor_style() {
  add_editor_style( 'style-editor.css' );
}
add_action( 'init', 'tea_time_editor_style' );

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

function tea_time_enqueue_comment_reply() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'comment_form_before', 'tea_time_enqueue_comment_reply' );

/* Include page content with show_page_content function. */
function show_page_content( $path ) {
  $post = get_page_by_path( $path );
  $content = apply_filters( 'the_content', $post->post_content );
  echo $content;
}
add_action( 'init', 'show_page_content' );

/* Highlight active custom post page in menu. */
add_filter( 'nav_menu_css_class', 'tea_time_menu_classes', 10, 2 );
function tea_time_menu_classes( $classes , $item ) {
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
