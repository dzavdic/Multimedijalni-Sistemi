<?php
/**
 * Multimedijalni Sistemi Theme functions and definitions
 *
 * @copyright  Copyright (c) 2023, Multimedijalni Sistemi
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Theme custom_logo.
 */
add_theme_support( 'custom-logo');

/**
 * Register Navigation Menus
 */

function custom_navigation_menus() {

	$locations = array(
        'menu-1' => esc_html__( 'Primary Menu', 'multimedijalni-sistemi' ),
        'menu-2' => esc_html__( 'Footer Menu', 'multimedijalni-sistemi' ),
		'desktop_menu' => __( 'Desktop Menu', 'multimedijalni-sistemi' ),
		'tablet_menu' => __( 'Tablet Menu', 'multimedijalni-sistemi' ),
		'mobile_menu' => __( 'Mobile Menu', 'multimedijalni-sistemi' ),
        'mobile_menu1' => __( 'Menu Menu', 'multimedijalni-sistemi' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'custom_navigation_menus' );

/**
 * Register sidebars.
 */

function widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
	register_sidebar( array(
		'name' =>  __( $name, 'multimedijalni-sistemi' ),
		'id' => $id,
		'description' => $description,
		'before_widget' => $beforeWidget,
		'after_widget' => $afterWidget,
		'before_title' => $beforeTitle,
		'after_title' => $afterTitle,
	));
}
function multiple_widget_init(){
	widget_registration('Primary Sidebar', 'sidebar-1', '', '', '', '', '');
	widget_registration('Footer widget ', 'footer-sidebar', 'test', '', '', '', '');
	
}
add_action('widgets_init', 'multiple_widget_init');

// Add featured image functionality.
add_theme_support( 'post-thumbnails' );

add_image_size( 'my-custom-image-size', 640, 999 );

// Add title tag functionality.
add_theme_support( 'title-tag' );

/**
 * Enqueue a stylesheet.
 */
function my_custom_theme_enqueue() {
	wp_enqueue_style( 'my-css', get_template_directory_uri() . '/inc/css/footer.css' );
    wp_enqueue_style( 'multimedijalni-sistemi', get_stylesheet_uri() );
    wp_enqueue_script( 'my-js', get_template_directory_uri() . '/inc/js/myJS.js' , array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_custom_theme_enqueue' );

function product_custom_post_type() {
    $args = array(
        'labels' => array(
            'name' => __( 'Product' ),
            'singular_name' => __( 'Product' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'product'),
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments' )
    );
    register_post_type( 'product', $args );
}
add_action( 'init', 'product_custom_post_type' );

add_theme_support( 'post-thumbnails', array( 'product' ) );

function create_custom_taxonomies() {
    register_taxonomy(
        'kategorije',
        'product',
        array(
            'label' => __( 'Kategorije' ),
            'rewrite' => array( 'slug' => 'kategorije' ),
            'hierarchical' => true,
        )
    );
    register_taxonomy(
        'tag',
        'product',
        array(
            'label' => __( 'Tag' ),
            'rewrite' => array( 'slug' => 'tag' ),
            'hierarchical' => false,
        )
    );
}
add_action( 'init', 'create_custom_taxonomies', 0 );

// Add Shortcode
function blod_text_shortcode( $atts , $content = null ) {

	return '<strong>' . $content . '</strong>';

}
add_shortcode( 'bt', 'blod_text_shortcode' );

