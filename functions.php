<?php

/**
  * wp-rtcamp-theme functions and definitions
  * 
  * @package wprtt
  * 
*/

/******************************
  * includes
******************************/
  
include get_template_directory() . '/inc/wprtt_custom_option.php';


function wprtt_scripts(){
    wp_enqueue_style( 'wprtt-basic-style', get_stylesheet_uri() ); // this is our style.css which has design of our website.
}
add_action( 'wp_enqueue_scripts', 'wprtt_scripts' );

function wpshp_theme_setup() { 
    add_theme_support( 'post-thumbnails'); 
    add_post_type_support( 'page', 'excerpt' );
} 
add_action( 'after_setup_theme', 'wpshp_theme_setup' ); 

/******************************
  * Custom Portfolio Post Type
******************************/

function wprtt_custom_portfolio_posttype(){

    $labels = array(
        'name'                    => 'Portfolio',
        'singular_name'           => 'Portfolio',
        'add_new'                 => 'Add Item',
        'all_items'               => 'All Items',
        'add_new_item'            => 'Add item',
        'edit_item'               => 'Edit Item',
        'new_item'                => 'New Item',
        'view_item'               => 'View Item',       
        'search_item'             => 'Search Item',
        'not_found'               => 'No Items Found',
        'not_found_in_trash'      => 'No Items Found In Trash',
        'parent_item_colon'       => 'Parent Item',
    );

    $args = array(
        'labels'                    => $labels,
        'public'                    => true,
        'has_archive'               => true,
        'publicly_queryable'        => true,
        'query_var'                 => true,
        'rewrite'                   => true,
        'capability_type'           => 'post',
        'hierarchical'              => false,
        'supports'                   => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
        'taxonomies'                => array(
            'category',
            'post_tag',
        ),
        'menu_position'             => 5,
        'exclude_from_search'       => false,
    );

    register_post_type( 'portfolio', $args );

}

add_action( 'init', 'wprtt_custom_portfolio_posttype' );

/******************************
  * Custom Blog Post Type
******************************/

function wprtt_custom_blog_posttype(){

    $labels = array(
        'name'                    => 'Blogs',
        'singular_name'           => 'Blog',
        'add_new'                 => 'Add Blog',
        'all_items'               => 'All Blogs',
        'add_new_item'            => 'Add BLog',
        'edit_item'               => 'Edit Blog',
        'new_item'                => 'New Blog',
        'view_item'               => 'View Blog',       
        'search_item'             => 'Search Blog',
        'not_found'               => 'No Blogs Found',
        'not_found_in_trash'      => 'No Blogs Found In Trash',
        'parent_item_colon'       => 'Parent Blog',
    );

    $args = array(
        'labels'                    => $labels,
        'public'                    => true,
        'has_archive'               => true,
        'publicly_queryable'        => true,
        'query_var'                 => true,
        'rewrite'                   => true,
        'capability_type'           => 'post',
        'hierarchical'              => false,
        'supports'                  => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
        'taxonomies'                => array(
            'category',
            'post_tag',
        ),
        'menu_position'             => 5,
        'exclude_from_search'       => false,
    );

    register_post_type( 'blog', $args );

}

add_action( 'init', 'wprtt_custom_blog_posttype' );