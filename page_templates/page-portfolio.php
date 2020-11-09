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
                    <h2>Advertising</h1>
                    <p>Neque porro quisquam est, dolorem ipsum quia dolor hollo...</p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-2.png" />
                </div>
                <div class="col_content">
                    <h2>Multimedia</h1>
                    <p>Neque porro quisquam est, dolorem ipsum quia dolor hollo...</p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-3.png" />
                </div>
                <div class="col_content">
                    <h2>Photography</h1>
                    <p>Neque porro quisquam est, dolorem ipsum quia dolor hollo...</p>
                </div>
            </div>
        </div>    
    </div>
</div>

<div class="portfolio_section">
    <div class="container-wrapper">
        <div class="portfolio_upper">
            <div class="portfolio_upper_left">
                <p class="portfolio_upper_title">D'SIGN IS THE SOUL</p>
            </div>
        </div>
        <hr class="other_hr"/>
        <?php

            $paged = get_query_var( 'paged' ) ;

            $args = array(
                'post_type'     => 'portfolio',
                'post_status'   => 'publish',
                'order'       => 'asc',
                'posts_per_page' => 15,
                'paged' => $paged, 
            );
            $posts = new WP_QUERY($args);
            $count = count(get_posts($args));
            if ( $posts -> have_posts() ) :
        ?>
        <div class="vertical">
        <?php
                for($i=0;$i<$count/3;$i++){
                
        ?>
            <div class="horizontal">
                <?php
                    for($j=0;$j<3;$j++){
                        $posts -> the_post();
                        if(has_post_thumbnail()):
                ?>
                    
                        <img class="port_img" src="<?php echo the_post_thumbnail_url(); ?>" />
                    
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
                    <h1>No Portfolio Found.</h1>
                </div>
        <?php
            endif;
        ?>
    </div>
</div>

<?php

    get_footer();