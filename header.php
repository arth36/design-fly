<?php 

/**
 * The Header of our Theme.
 * 
 * @package wprtt
 * 
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <?php wp_head(); ?>
        <?php wp_enqueue_media(); ?>

    </head>

    <body <?php body_class(); ?>>
        <div class="header">
            <div class ="container-wrapper">
                <a href="<?php echo get_home_url(); ?>">
                <div class="logo">
                    <?php if ( get_option( 'wprtt_edit_header_logo' ) ) : ?>
                        <img src="<?php echo get_option( 'wprtt_edit_header_logo' ); ?>" />
                    <?php else : ?>    
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" width="100" height="50" />
                    <?php endif; ?>
                </div>
                </a>
                <div class="header_right">
                    <!-- toggle -->       		              
                    <div class="toggle">
                        <a class="toggleMenu" href="#">
                            <?php esc_html_e('Menu','wprtt'); ?>                
                        </a>
                        <!-- end toggle -->
                    </div>
                    <!-- sitenav -->
                    <div class="sitenav">                  
                        <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>  
                        <!-- end sitenav -->
                    </div>
                    <div class="clear"></div>   
                    <!-- end header_right --> 
                    </div> 
                <div class="clear"></div>  
                <div class="clear"></div>
            </div>
        </div>