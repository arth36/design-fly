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
        <?php echo the_widget( 'Wprtt_Portfolio_Widget' ); ?>

        <?php echo the_widget( 'Wprtt_Popular_Posts_Widget' ); ?>

        <?php echo the_widget( 'Wprtt_Recent_Posts_Widget' ); ?>

    </div>
</div>

<?php
get_footer();