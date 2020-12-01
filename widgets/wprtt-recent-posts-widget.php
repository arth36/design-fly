<?php 

class Wprtt_Recent_Posts_Widget extends WP_Widget {

    // setup the widget name, description, etc..

    public function __construct(){

        $widget_options = array(
            'classname' => 'wprtt-recent-posts-widget',
            'description' => __('Widget to display Recent Posts', 'wprtt'),
        );
        parent::__construct(
            'Wprtt_Recent_Posts_Widget',
            __('Recent Posts', 'wprtt'),
            $widget_options
        );

    }

    /** WP_Widget::form */
    function form($instance) {

	    ?>
	    
	    <p>Widget to display Recent Posts</p>
	    
	    <?php
}

    
    /** WP_Widget::update */
    function update($new_instance, $old_instance) {
	    $instance = $old_instance;
	    
	    return $instance;
    }

    //front-end display of widget

    /** WP_Widget::widget */
    function widget($args, $instance) {
	    extract( $args );
	    
	    ?>
		<?php echo $before_widget; ?>
	    
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
                    <a href="#rpimg<?php echo $k; ?>"><img class="popular_posts_img" src="<?php echo the_post_thumbnail_url(); ?>" /></a>
                    <div class="popular_posts_content">
                        <a href="<?php the_permalink(); ?>"><p class="popular_posts_content_upper"><?php the_title(); ?></p></a>
                        <p class="popular_posts_content_lower"><?php echo __('by', 'wprtt'); ?> <span class="blog_author_name"><?php echo get_the_author(); ?></span> <?php echo __('on', 'wprtt'); ?> <?php echo get_the_date('j M Y'); ?></p>
                    </div>

                    <div class="lightbox" id="rpimg<?php echo $k; ?>">
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
		
    	<?php echo $after_widget; ?>
	<?php
    }

}

// registering the custom widget for footer recent projects
add_action('widgets_init', function(){
    register_widget('Wprtt_Recent_Posts_Widget');
});