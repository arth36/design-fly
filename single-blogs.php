<?php
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
        <?php 
            if(have_posts()):
                while(have_posts()):
                    the_post();
        ?>
        <div class="single_blog_wrapper">
            <p class="single-blog-title"><?php echo the_title(); ?></p>
            <p class="single-blog-title-bottom">by <span class="blog_author_name"><?php echo get_the_author(); ?></span> on <?php echo the_date('j M Y'); ?></p>
            <hr class="single-blog-title-bottom-hr"/>
            <div class="single-blog-disc"><?php echo the_content(); ?></div>
            <p class="single-blog-tags">
                TAGS: <span class="blog-tags"><?php the_tags( '',' , ','' ); ?></span>
            </p>
            <hr/>
            <p class="comments-own-title">Comments</p>
            <hr/>
            <?php comments_template(); ?>
        </div>
        <?php endwhile; endif; ?>

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

<?php
get_footer();