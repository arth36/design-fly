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
                    <h2><?php echo __('Advertising', 'wprtt'); ?></h2>
                    <p><?php echo __('Neque porro quisquam est, dolorem ipsum quia dolor hollo...', 'wprtt'); ?></p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-2.png" />
                </div>
                <div class="col_content">
                    <h2><?php echo __('Multimedia', 'wprtt') ?></h2>
                    <p><?php echo __('Neque porro quisquam est, dolorem ipsum quia dolor hollo...', 'wprtt'); ?></p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-3.png" />
                </div>
                <div class="col_content">
                    <h2><?php echo __('Photography', 'wprtt'); ?></h2>
                    <p><?php echo __('Neque porro quisquam est, dolorem ipsum quia dolor hollo...', 'wprtt'); ?></p>
                </div>
            </div>
        </div>    
    </div>
</div>

<div class="portfolio_section" id="portfolio_section">
    <div class="container-wrapper">
        <div class="portfolio_upper">
            <div class="portfolio_upper_left">
                <p class="portfolio_upper_title"><?php echo __('D\'SIGN IS THE SOUL', 'wprtt'); ?></p>
            </div>
            <div class="portfolio_upper_right">
                <div>
                <a href="<?php echo get_permalink( get_page_by_path( 'port' ) ); ?>"><p class="view_all_btn"><?php echo __('view all', 'wprtt'); ?></p></a>
                </div>
            </div>
        </div>
        <hr class="other_hr"/>
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
                        $k++;
                        $posts -> the_post();
                        if(has_post_thumbnail()):
                ?>
                    <div class="imgcontainer">
                    
                        <a href="#img<?php echo $k; ?>"><img class="port_img" src="<?php echo the_post_thumbnail_url(); ?>" /></a>
                        
                    </div>

                    <div class="lightbox" id="img<?php echo $k; ?>">
                        <a class="close_out" href="#portfolio_section"></a>
                        <div class="box">
	                        <a class="close" href="#portfolio_section"><?php echo __('X', 'wprtt'); ?></a>
                            <br/>
                            <div class="content">
                            	<img class="lightbox_img" src="<?php echo the_post_thumbnail_url(); ?>"/> 
                            </div>
                            <div class="title_container">
                                <a class="prev_button" href="#img<?php echo $k-1; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/prev.png" /></a>
                                <p class="title"><?php echo the_title(); ?></p>
                                <a class="next_button" id="front_next" href="#img<?php echo $k+1; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/next.png" /></a>
                            </div>
                            
                        </div>
                    </div>
                    
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
                    <h1>No Portfolio Found.</h1>
                </div>
        <?php
            endif;
        ?>
    </div>
</div>
<?php

get_footer();

?>
