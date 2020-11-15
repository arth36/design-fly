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
            'comments',
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
        'supports'                   => array(
            'title',    
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
            'comments',
        ),
        'taxonomies'                => array(
            'category',
            'post_tag',
        ),
        'menu_position'             => 5,
        'exclude_from_search'       => false,
    );

    register_post_type( 'blogs', $args );

}

add_action( 'init', 'wprtt_custom_blog_posttype' );


function pietergoosen_comment_form_fields( $args = array(), $post_id = null ) {
    if ( null === $post_id )
        $post_id = get_the_ID();
    else
        $id = $post_id;

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $args = wp_parse_args( $args );
    if ( ! isset( $args['format'] ) )
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = 'html5' === $args['format'];
    $fields   =  array(
         'author' =>
    '<div class="comment-bottom"><p class="comment-form-author"><label for="author">' . __( 'Name', 'wprtt' ) . '</label> ' .
    '<input id="author" class="comment-input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'wprtt' ) . '</label> ' .
    '<input id="email" class="comment-input" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'url' =>
    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'wprtt' ) . '</label>' .
    '<input id="url" class="comment-input" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p></div>',
);

    $fields = apply_filters( 'comment_form_default_fields', $fields );
    $defaults = array(
        'fields'               => $fields,
        'comment_field'        => '<textarea class="comment_box" id="comment" name="comment"  cols="100%" rows="8" aria-required="true"></textarea>',
        'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'pietergoosen' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'pietergoosen' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'title_reply'          => __( 'Post your comment', 'pietergoosen' ),
        'title_reply_to'       => __( 'Post a Comment to %s', 'pietergoosen' ),
        'cancel_reply_link'    => __( 'Cancel reply', 'pietergoosen' ),
        'label_submit'         => __( 'Submit', 'pietergoosen' ),
        'format'               => 'xhtml',
        );
    return $defaults;
}

add_filter('comment_form_defaults', 'pietergoosen_comment_form_fields');