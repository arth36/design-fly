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

<div class="blog_content_part">
    <div class="whole_blog_section_container">
        <div class="blog_wrapper">
            <div class="blog_content_header">
                <div class="inner_blog">
                    <p class="lets_blog"><?php echo __('LET\'S BLOG', 'wprtt'); ?></p>
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
                            $k++;
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
                    <a class="blog_content_a" href="#img<?php echo $k; ?>"><img class="blog_content_img" src="<?php echo the_post_thumbnail_url(); ?>"/></a>
                    <div class="blog_content_right">
                        <div class="blog_content_right_top">
                            <p class="blog_auth"><?php echo __('by', 'wprtt'); ?> <span class="blog_author_name"><?php echo get_the_author(); ?></span> <?php echo __('on', 'wprtt'); ?> <?php echo get_the_date('j M Y'); ?></p>
                            <p class="blog_tot_comment"><?php echo get_comments_number(); ?> <?php echo __('comments', 'wprtt'); ?></p>
                        </div>
                        <hr class="blog_content_hr"/>
                        <div class="blog_content_right_bottom">
                            <p class="blog_content_right_bottom_p"><?php echo the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>"><p class="blog_content_right_bottom_readmore"><?php echo __('READ MORE', 'wprtt'); ?></p></a>
                        </div>
                    </div>
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
                            <p class="title"><?php echo the_title(); ?></p>
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
                <div><h1><?php echo __('There is no blogs', 'wprtt'); ?></h1></div>
            <?php
                endif;
                    
            ?>
            
        </div>
        
        <div class="blog_right">
                
            <?php echo the_widget( 'Wprtt_Portfolio_Widget' ); ?>

            <?php echo the_widget( 'Wprtt_Popular_Posts_Widget' ); ?>

            <?php echo the_widget( 'Wprtt_Recent_Posts_Widget' ); ?>

        </div>
    </div>
</div>

<?php

get_footer();