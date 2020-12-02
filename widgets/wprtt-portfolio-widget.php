<?php 

class Wprtt_Portfolio_Widget extends WP_Widget {

    // setup the widget name, description, etc..

    public function __construct(){

        $widget_options = array(
            'classname' => 'wprtt-portfolio-widget',
            'description' => __('Widget to display Portfolio', 'wprtt'),
        );
        parent::__construct(
            'Wprtt_Portfolio_Widget',
            __('Portfolio', 'wprtt'),
            $widget_options
        );

    }

    /** WP_Widget::form */
    function form($instance) {

	    ?>
	    
	    <p>Widget to display Portfolio</p>
	    
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
                                <a class="blog_right_portfolio_a" href="#pimg<?php echo $k; ?>"><img class="blog_right_portfolio_img" src="<?php echo the_post_thumbnail_url(); ?>" /></a>

                                <div class="lightbox" id="pimg<?php echo $k; ?>">
                                    <a class="close_out" href="#portfolio_section"></a>
                                    <div class="box">
	                                    <a class="close" href="#portfolio_section"><?php echo __('X', 'wprtt'); ?></a>
                                        <br/>
                                        <div class="content">
                                            <img class="lightbox_img" src="<?php echo the_post_thumbnail_url(); ?>"/> 
                                        </div>
                                        <div class="title_container">
                                            <a class="title" id="light-box-title" href="<?php the_permalink(); ?>"><p><?php echo the_title(); ?></p></a>
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
		
    	<?php echo $after_widget; ?>
	<?php
    }

}

// registering the custom widget for footer recent projects
add_action('widgets_init', function(){
    register_widget('Wprtt_Portfolio_Widget');
});