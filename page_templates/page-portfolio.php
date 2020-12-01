<?php

/*****************
* Template Name: Portfolio
*/

    get_header();

?>

<div class="header_bottom">
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
        </div>
        <hr class="other_hr"/>
        <?php

            $paged = get_query_var( 'paged' ) ;

            $post_per_page = 15;

            $args = array(
                'post_type'     => 'portfolio',
                'post_status'   => 'publish',
                'order'       => 'asc',
                'posts_per_page' => $post_per_page,
                'paged' => $paged, 
            );
            $posts = new WP_QUERY($args);
            $count = count(get_posts($args));
            
            if ( $posts -> have_posts() ) :
        ?>
        <div class="vertical">
        <?php
                $k=0;
                for($i=0;$i<$count/3;$i++){
                
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
                                <?php 
                                    if(! ($k % $count) == 0){
                                        ?>
                                        <a class="next_button" href="#img<?php echo $k+1; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/next.png" /></a>
                                    <?php
                                    }
                                ?>
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
            <div class="pagination_bar">
            <?php
            echo paginate_links( array(
                'total' => $posts->max_num_pages
            ) );
        ?>
            </div>
        
        </div>
        <?php
            else:
        ?>
                <div>
                    <h1><?php echo __('No Portfolio Found.', 'wprtt'); ?></h1>
                </div>
        <?php
            endif;
        ?>
    </div>
</div>

<?php

    get_footer();