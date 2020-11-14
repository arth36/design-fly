<?php

/*****************
* Template Name: Blogs
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

<div class="blog_content_part">
    <div class="whole_blog_section_container">
        <div class="blog_wrapper">
            <div class="blog_content_header">
                <div class="inner_blog">
                    <p class="lets_blog">LET'S BLOG</p>
                </div>
                <hr/>
            </div>

            
                <?php

                    $paged = get_query_var( 'paged' ) ;

                    $args = array(
                        'post_type'     => 'blogs',
                        'post_status'   => 'publish',
                        'order'       => 'asc',
                        'posts_per_page' => 5,
                        'paged' => $paged, 
                    );
                    $posts = new WP_QUERY($args);
                    
                    if ( $posts -> have_posts() ) :
                        
                        while( $posts -> have_posts() ) :
                            $posts -> the_post();
                    ?>

            <div class="blog_container">
                <div class="blog_content">
                    <a href="<?php the_permalink(); ?>">
                        <div class="blog_content_top">
                            <div class="date">
                                <span><p class="date_p"><?php echo get_the_date('j'); ?></p></span>
                                <span><p class="month_p"><?php echo get_the_date('M'); ?></p></span>
                            </div>
                            <div class="blog_content_title">
                                <p><?php echo the_title(); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="blog_content_bottom">
                    <img class="blog_content_img" src="<?php echo the_post_thumbnail_url(); ?>"/>
                    <div class="blog_content_right">
                        <div class="blog_content_right_top">
                            <p class="blog_auth">by <span class="blog_author_name"><?php echo get_the_author(); ?></span> on 21Dec 2012</p>
                            <p class="blog_tot_comment">12 comments</p>
                        </div>
                        <hr class="blog_content_hr"/>
                        <div class="blog_content_right_bottom">
                            <p class="blog_content_right_bottom_p"><?php echo the_excerpt(); ?></p>
                            <p class="blog_content_right_bottom_readmore">READ MORE</p>
                        </div>
                    </div>
                </div>
            </div>
            
            
        <?php
            endwhile;
            ?>
            <div class="pagination_bar">
            <?php
                echo paginate_links( array(
                    'total' => $posts->max_num_pages,
                ) );
            ?>
            </div>
        <?php
                wp_reset_postdata();
                else:
            ?>
                <div><h1>There is no blogs</h1></div>
            <?php
                endif;
                    
            ?>
            
        </div>
        
        <div class="blog_right">
            <div class="blog_right_portfolio">
                <p class="blog_right_portfolio_title">Portfolio</p>
                <hr/>
                <div class="blog_right_portfolio_img_container">
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
                                for($j=0;$j<4;$j++){
                                    $posts -> the_post();
                                    if(has_post_thumbnail()):
                            ?>
                            <img class="blog_right_portfolio_img" src="<?php echo the_post_thumbnail_url(); ?>" />
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
                    endif;
                ?>
                </div>
            </div>

            <div class="blog_right_popular_posts">
                <p class="blog_right_popular_posts_title">Popular Posts</p>
                <hr class="popular_post_hr"/>
                <div class="blog_right_popular_posts_container">
                    <img class="popular_posts_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/image-1.png"/>
                    <div class="popular_posts_content">
                        <p class="popular_posts_content_upper">Archieve your grandest dreams!</p>
                        <p class="popular_posts_content_lower">by <span class="blog_author_name">Robin Sen</span> on 21Dec 2012</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();