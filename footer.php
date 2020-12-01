        <div class="footer-main">
            <div class="container-wrapper">
                <hr/>
                <div class="footer-content">
                    <div class="footer-top">
                        <?php
                            $args = array(
                                'post_type'     => 'blogs',
                                'post_status'   => 'publish',
                                'order'       => 'DESC',
                            );
                            $posts = new WP_QUERY($args);
                            if ( $posts -> have_posts() ) :
                                $posts -> the_post();
                        ?>

                        <p class="footer-top-title"><?php echo get_the_title() ?></p>
                        <p class="footer-top-para"><?php echo get_the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>"><p class="footer-top-left-para-readmore"><?php echo __('Read more', 'wprtt'); ?></p></a>
                        <?php
                            endif;
                        ?>
                    </div>
                    <div class="footer-top">
                        <p class="footer-top-title"><?php echo __('Contact Us', 'wprtt'); ?></p>
                        <p class="footer-top-para"><?php echo get_option('wprtt_footer_address'); ?><br><?php echo __('Tel:', 'wprtt'); ?> <?php echo get_option('wprtt_footer_telephone'); ?><?php echo __('; Fax:', 'wprtt'); ?> <?php echo get_option('wprtt_footer_fax'); ?><br><?php echo __('Email:', 'wprtt'); ?> <a href="mailto:<?php echo get_option('wprtt_footer_email'); ?>"><span style="color:#ef4634;"><?php echo get_option('wprtt_footer_email'); ?></span></a></p>
                        <div>
                            <a href="<?php echo get_option('wprtt_footer_fblink'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fbicon.png"/></a>
                            <a href="<?php echo get_option('wprtt_footer_gpluslink'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gplusicon.png"/></a>
                            <a href="<?php echo get_option('wprtt_footer_linkedinlink'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedinicon.png"/></a>
                            <a href="<?php echo get_option('wprtt_footer_pinlink'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pinicon.png"/></a>
                            <a href="<?php echo get_option('wprtt_footer_twitterlink'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twittericon.png"/></a>
                        </div>
                    </div>
                </div>
                <hr/>
                <p class="footer-copyright">&#169; <?php echo get_option('wprtt_footer_copyright'); ?> <?php echo __('| Designed by', 'wprtt'); ?> <a href="https://rtcamp.com/"><span style="color:#ef4634;"><?php echo __('rtCamp', 'wprtt'); ?></span></p></a>
            </div>
        </div>
    </body>
</html>