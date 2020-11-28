        <div class="footer-main">
            <div class="container-wrapper">
                <hr/>
                <div class="footer-content">
                    <div class="footer-top">
                        <p class="footer-top-title">Welcome to D'SIGN<i>fly</i></p>
                        <p class="footer-top-para">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. sed do eiusmod tempor incididunt ut labore et.</p>
                        <a href=""><p class="footer-top-left-para-readmore">Read more</p></a>
                    </div>
                    <div class="footer-top">
                        <p class="footer-top-title">Contact Us</p>
                        <p class="footer-top-para"><?php echo get_option('wprtt_footer_address'); ?><br>Tel: <?php echo get_option('wprtt_footer_telephone'); ?>; Fax: <?php echo get_option('wprtt_footer_fax'); ?><br>Email: <a href="mailto:<?php echo get_option('wprtt_footer_email'); ?>"><span style="color:#ef4634;"><?php echo get_option('wprtt_footer_email'); ?></span></a></p>
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
                <p class="footer-copyright">&#169; <?php echo get_option('wprtt_footer_copyright'); ?> | Designed by <a href="https://rtcamp.com/"><span style="color:#ef4634;">rtCamp</span></p></a>
            </div>
        </div>
    </body>
</html>