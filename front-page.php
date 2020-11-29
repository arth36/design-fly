<?php

/*****************
* Template Name: Home
*/

get_header();

?>
<div>
    <div class="banner-outer">
        <div class="banner-slider container">
        <div class="slideDiv">
            <div class="slide">
                <?php if (get_option( 'wprtt_banner_image' ) ) : ?>
                    <img class="banner_img" src="<?php echo get_option( 'wprtt_banner_image' ); ?>" />
                <?php else : ?>
                    <img class="banner_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider-image.png" />
                <?php endif; ?>
                <div class="banner-content">
                    <!-- displaying the title of post -->
                    <h1><?php echo get_option('wprtt_banner_title'); ?></h1>
                    <!-- displaying the excerpt of post -->
                    <div  class="container-wrapper">
                        <p class="banner-disc"><?php echo get_option( 'wprtt_banner_disc' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div> 

<div class="banner_bottom">
    <div class="container-wrapper">   
        <div class="inner_bottom">
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-1.png" />
                </div>
                <div class="col_content">
                    <h2><?php echo __('Advertising', 'wprtt') ?></h1>
                    <p><?php echo __('Neque porro quisquam est, dolorem ipsum quia dolor hollo...', 'wprtt') ?></p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-2.png" />
                </div>
                <div class="col_content">
                    <h2><?php echo __('Multimedia', 'wprtt') ?></h1>
                    <p><?php echo __('Neque porro quisquam est, dolorem ipsum quia dolor hollo...', 'wprtt') ?></p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-3.png" />
                </div>
                <div class="col_content">
                    <h2><?php echo __('Photography', 'wprtt') ?></h1>
                    <p><?php echo __('Neque porro quisquam est, dolorem ipsum quia dolor hollo...', 'wprtt') ?></p>
                </div>
            </div>
        </div>    
    </div>
</div>

<div class="portfolio_section">
    <div class="container-wrapper">
        <div class="portfolio_upper">
            <div class="portfolio_upper_left">
                <p class="portfolio_upper_title"><?php echo __('DESIGN IS THE SOUL', 'wprtt') ?></p>
            </div>
            <div class="portfolio_upper_right">
                <div>
                <a href="<?php echo get_permalink( get_page_by_path( 'port' ) ); ?>"><p class="view_all_btn"><?php echo __('view all', 'wprtt') ?></p></a>
                </div>
            </div>
        </div>
        <hr/>
        <?php
            $args = array(
                'post_type'     => 'portfolio',
                'post_status'   => 'publish',
                'order'       => 'asc',
            );
            $posts = new WP_QUERY($args);
            if ( $posts -> have_posts() ) :
        ?>
        <div class="vertical">
        <?php
                for($i=0;$i<2;$i++){
                
        ?>
            <div class="horizontal">
                <?php
                
                    for($j=0;$j<3;$j++){
                        $posts -> the_post();
                        ?>
                        <div class="imgcontainer">
                            <?php
                            if(has_post_thumbnail()):
                            ?>
                        </div>
                    <img class="port_img" src="<?php echo the_post_thumbnail_url(); ?>" />
                <?php
                endif;
                    }
                ?>
        </div>
        <?php        
            }
        ?>
        </div>
        <?php
            else:
        ?>
                <div>
                    <h1><?php echo __('No Portfolio Found.', 'wprtt') ?></h1>
                </div>
        <?php
            endif;
        ?>
    </div>
</div>
<?php

get_footer();

?>
