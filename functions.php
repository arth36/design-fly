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
    wp_enqueue_style( 'wprtt-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' ); // this css file is responsible for responsive website
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') ); // this file is responsible for show toggle when particular condition occurs
}
add_action( 'wp_enqueue_scripts', 'wprtt_scripts' );

function wprtt_theme_setup() { 
    add_theme_support( 'post-thumbnails'); 
    add_post_type_support( 'page', 'excerpt' );
} 
add_action( 'after_setup_theme', 'wprtt_theme_setup' ); 

/******************************
  * Custom Portfolio Post Type
******************************/

function wprtt_custom_portfolio_posttype(){

    $labels = array(
        'name'                    =>    __('Portfolio','wprtt'),
        'singular_name'           =>    __('Portfolio','wprtt'),
        'add_new'                 =>    __('Add Item','wprtt'),
        'all_items'               =>    __('All Items','wprtt'),
        'add_new_item'            =>    __('Add item','wprtt'),
        'edit_item'               =>    __('Edit Item','wprtt'),
        'new_item'                =>    __('New Item','wprtt'),
        'view_item'               =>    __('View Item','wprtt'),       
        'search_item'             =>    __('Search Item','wprtt'),
        'not_found'               =>    __('No Items Found','wprtt'),
        'not_found_in_trash'      =>    __('No Items Found In Trash','wprtt'),
        'parent_item_colon'       =>    __('Parent Item','wprtt'),
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
        'name'                    =>    __('Blogs','wprtt'),
        'singular_name'           =>    __('Blog','wprtt'),
        'add_new'                 =>    __('Add Blog','wprtt'),
        'all_items'               =>    __('All Blogs','wprtt'),
        'add_new_item'            =>    __('Add Blog','wprtt'),
        'edit_item'               =>    __('Edit Blog','wprtt'),
        'new_item'                =>    __('New Blog','wprtt'),
        'view_item'               =>    __('View Blog','wprtt'),
        'search_item'             =>    __('Search Blog','wprtt'),
        'not_found'               =>    __('No Blogs Found','wprtt'),
        'not_found_in_trash'      =>    __('No Blogs Found In Trash','wprtt'),
        'parent_item_colon'       =>    __('Parent Blog','wprtt'),
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


function wprtt_comment_form_fields( $args = array(), $post_id = null ) {
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
        'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'wprtt' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'wprtt' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'title_reply'          => __( 'Post your comment', 'wprtt' ),
        'title_reply_to'       => __( 'Post a Comment to %s', 'wprtt' ),
        'cancel_reply_link'    => __( 'Cancel reply', 'wprtt' ),
        'label_submit'         => __( 'Submit', 'wprtt' ),
        'format'               => 'xhtml',
        );
    return $defaults;
}

add_filter('comment_form_defaults', 'wprtt_comment_form_fields');

function wprtt_save_post_views( $post_id ) {
    $metaKey = 'wprtt_post_views';
    $views = get_post_meta( $post_id, $metaKey, true );

    $count = ( empty( $views ) ? 1 : $views );

    $count++;

    update_post_meta( $post_id, $metaKey, $count );

}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);