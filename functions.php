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
 * Register one navigation menu.
 */
 register_nav_menus(
	array(
		'menu-1' => esc_html__( 'Primary Menu', 'multimedijalni-sistemi' ),
	)
);

/**
 * Register one sidebar.
 */
function my_custom_theme_sidebar() {
    register_sidebar( array(
        'name' => __( 'Primary Sidebar', 'multimedijalni-sistemi' ),
        'id'   => 'sidebar-1',
    ) );
}
add_action( 'widgets_init', 'my_custom_theme_sidebar' );

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

