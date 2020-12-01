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
        <?php 
            if(have_posts()):
                while(have_posts()):
                    the_post();
                    wprtt_save_post_views( get_the_ID() );
        ?>
        <div class="single_blog_wrapper">
            <p class="single-blog-title"><?php echo the_title(); ?></p>
            <p class="single-blog-title-bottom"><?php echo __('by', 'wprtt'); ?> <span class="blog_author_name"><?php echo get_the_author(); ?></span> <?php echo __('on', 'wprtt'); ?> <?php echo the_date('j M Y'); ?></p>
            <hr class="single-blog-title-bottom-hr"/>
            <div class="single-blog-disc"><?php echo the_content(); ?></div>
            <p class="single-blog-tags">
                <?php echo __('TAGS:', 'wprtt'); ?> <span class="blog-tags"><?php the_tags( '',' , ','' ); ?></span>
            </p>
            <hr/>
            <p class="comments-own-title"><?php echo __('Comments', 'wprtt'); ?></p>
            <hr/>
            <?php comments_template(); ?>
        </div>
        <?php endwhile; endif; ?>

        <div class="blog_right">
            <div class="blog_right_portfolio">
                <p class="blog_right_portfolio_title"><?php echo __('Portfolio', 'wprtt'); ?></p>
                <hr class="popular_post_hr"/>
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
                                    $k++;
                                    $posts -> the_post();
                                    if(has_post_thumbnail()):
                            ?>
                                <a class="blog_right_portfolio_a" href="#img<?php echo $k; ?>"><img class="blog_right_portfolio_img" src="<?php echo the_post_thumbnail_url(); ?>" /></a>

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
                <p class="blog_right_popular_posts_title"><?php echo __('Popular Posts', 'wprtt'); ?></p>
                <hr class="popular_post_hr"/>
                <?php
                        $args = array(
                            'post_type'     => 'blogs',
                            'post_status'   => 'publish',
                            'meta_key'      => 'wprtt_post_views',
                            'orderby'       => 'meta_value_num',
                            'order'         => 'DESC'
                        );
                        $posts = new WP_QUERY($args);
                        if ( $posts -> have_posts() ) :
                            for($i=0; $i<=4; $i++){
                                $posts -> the_post();
                    ?>
                <div class="blog_right_popular_posts_container">
                    <a href="#img<?php echo $k; ?>"><img class="popular_posts_img" src="<?php echo the_post_thumbnail_url(); ?>" /></a>
                    <div class="popular_posts_content">
                        <a href="<?php the_permalink(); ?>"><p class="popular_posts_content_upper"><?php the_title() ?></p></a>
                        <p class="popular_posts_content_lower"><?php echo __('by', 'wprtt'); ?> <span class="blog_author_name"><?php echo get_the_author(); ?></span> <?php echo __('on', 'wprtt'); ?> <?php echo get_the_date('j M Y'); ?></p>
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
                        }
                    endif;
                ?>
            </div>

            <div class="blog_right_popular_posts">
                <p class="blog_right_popular_posts_title"><?php echo __('Recent Posts', 'wprtt'); ?></p>
                <hr class="popular_post_hr"/>
                <?php
                        $args = array(
                            'post_type'     => 'blogs',
                            'post_status'   => 'publish',
                            'order'         => 'DESC'
                        );
                        $posts = new WP_QUERY($args);
                        if ( $posts -> have_posts() ) :
                            for($i=0; $i<=4; $i++){
                                $k++;
                                $posts -> the_post();
                    ?>
                <div class="blog_right_popular_posts_container">
                    <a href="#img<?php echo $k; ?>"><img class="popular_posts_img" src="<?php echo the_post_thumbnail_url(); ?>" /></a>
                    <div class="popular_posts_content">
                        <a href="<?php the_permalink(); ?>"><p class="popular_posts_content_upper"><?php the_title(); ?></p></a>
                        <p class="popular_posts_content_lower"><?php echo __('by', 'wprtt'); ?> <span class="blog_author_name"><?php echo get_the_author(); ?></span> <?php echo __('on', 'wprtt'); ?> <?php echo get_the_date('j M Y'); ?></p>
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
                            }
                        endif;
                ?>
            </div>

    </div>
</div>

<?php
get_footer();