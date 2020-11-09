<?php

function wprtt_theme_option(){
    
    // Generate Admin Page
    add_menu_page(
        'theme-options', // page title
        __('Theme Options', 'wprtt'), // Menu Title
        'manage_options', // capability
        'wprtt_theme_options', // menu slug
        'wprtt_custom_options', // callback function
        'dashicons-sticky' // icon
    );

    // Generate Admin Sub Page
    add_submenu_page( 'wprtt_theme_options', 'Theme Header Options', 'Header Options', 'manage_options', 'wprtt_theme_options', 'wprtt_custom_options' );

    add_submenu_page( 'wprtt_theme_options', 'Theme Home Page Options', 'Home Page Options', 'manage_options', 'wprtt_home_page_theme_options', 'wprtt_home_page_options' );
    
    add_submenu_page( 'wprtt_theme_options', 'Theme Footer Options', 'Footer Options', 'manage_options', 'wprtt_footer_theme_options', 'wprtt_footer_custom_options' );
    
    //Activate custom settings
    add_action( 'admin_init', 'wprtt_custom_settings' );

}
add_action( 'admin_menu', 'wprtt_theme_option' );

function wprtt_custom_settings(){
    add_settings_section( 'wprtt_section', 'Sidebar Options', 'wprtt_sidebar_options', 'wprtt_theme_options' );

    add_settings_section( 'wprtt_home_page_section', 'Home Page Options', 'wprtt_sidebar_options', 'wprtt_home_page_options' );

    add_settings_section( 'wprtt_footer_section', 'Footer Options', 'wprtt_sidebar_options', 'wprtt_footer_options' );
    
    add_settings_field( 'wprtt_edit_header_logo',
                         __("Add Image for Header Logo", 'wprtt'), 
                        'wprtt_display_header_logo', 
                        'wprtt_theme_options', 
                        'wprtt_section' 
    );

    add_settings_field( 'wprtt_banner_image',
                         __("Add Banner Image", 'wprtt'), 
                        'wprtt_display_banner_image', 
                        'wprtt_home_page_options', 
                        'wprtt_home_page_section' 
    );

    add_settings_field( 'wprtt_banner_title',
                         __("Add Banner Title", 'wprtt'), 
                        'wprtt_display_banner_title', 
                        'wprtt_home_page_options', 
                        'wprtt_home_page_section' 
    );

    add_settings_field( 'wprtt_banner_disc',
                         __("Add Banner Discription", 'wprtt'), 
                        'wprtt_display_banner_disc', 
                        'wprtt_home_page_options', 
                        'wprtt_home_page_section' 
    );

    add_settings_field( 'wprtt_footer_address',
                         __("Address", 'wprtt'), 
                        'wprtt_display_address', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_telephone',
                         __("Telephone", 'wprtt'), 
                        'wprtt_display_telephone', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_fax',
                         __("Fax", 'wprtt'), 
                        'wprtt_display_fax', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_email',
                         __("Email", 'wprtt'), 
                        'wprtt_display_email', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_fblink',
                         __("Facebook Link", 'wprtt'), 
                        'wprtt_display_fblink', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_gpluslink',
                         __("Google+ Link", 'wprtt'), 
                        'wprtt_display_gpluslink', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_linkedinlink',
                         __("Linkedin Link", 'wprtt'), 
                        'wprtt_display_linkedinlink', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_pinlink',
                         __("Pinterest Link", 'wprtt'), 
                        'wprtt_display_pinlink', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_twitterlink',
                         __("Twitter Link", 'wprtt'), 
                        'wprtt_display_twitterlink', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );

    add_settings_field( 'wprtt_footer_copyright',
                         __("Copyright Content", 'wprtt'), 
                        'wprtt_display_copyright', 
                        'wprtt_footer_options', 
                        'wprtt_footer_section' 
    );
    
    register_setting( 'wprtt_section', 'wprtt_edit_header_logo' );

    register_setting( 'wprtt_home_page_section', 'wprtt_banner_image' );

    register_setting( 'wprtt_home_page_section', 'wprtt_banner_title' );

    register_setting( 'wprtt_home_page_section', 'wprtt_banner_disc' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_address' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_telephone' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_fax' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_email' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_fblink' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_gpluslink' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_linkedinlink' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_pinlink' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_twitterlink' );

    register_setting( 'wprtt_footer_section', 'wprtt_footer_copyright' );
}

function wprtt_sidebar_options(){
    echo 'Customize your Sidebar Information';
}

function wprtt_display_header_logo(){
    // This is enqueue the media uploader script
    wp_enqueue_media();
    ?>
    <div>
        <img class="wprtt_edit_header_logo" src="<?php echo get_option('wprtt_edit_header_logo'); ?>" height="100" width="100" />
        <input type="text" name="wprtt_edit_header_logo" id="wprtt_edit_header_logo" class="regular-text" value="<?php echo get_option('wprtt_edit_header_logo'); ?>" />
        <input type="button" name="upload-header-btn" id="upload-header-btn" class="button-secondary" value="Upload Header Image">
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#upload-header-btn').click(function(e) {
                e.preventDefault();
                var image_header = wp.media({ 
                    title: 'Upload Header Image',
                    // mutiple: true if you want to upload multiple files at once
                    multiple: false
                }).open().on('select', function(e){
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_header_image = image_header.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    console.log(uploaded_header_image);
                    var wprtt_edit_header_logo = uploaded_header_image.toJSON().url;
                    // Let's assign the url value to the input field
                    $('#wprtt_edit_header_logo').val(wprtt_edit_header_logo);
                }); 
            });
        }); 
</script>
    <?php
}

function wprtt_display_banner_image(){
    // This is enqueue the media uploader script
    wp_enqueue_media();
    ?>
    <div>
        <img class="wprtt_banner_image" src="<?php echo get_option('wprtt_banner_image'); ?>" height="100" width="100" />
        <input type="text" name="wprtt_banner_image" id="wprtt_banner_image" class="regular-text" value="<?php echo get_option('wprtt_banner_image'); ?>" />
        <input type="button" name="upload-banner-btn" id="upload-banner-btn" class="button-secondary" value="Upload Button Image">
    </div>
    <div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#upload-banner-btn').click(function(e) {
                e.preventDefault();
                var image_banner = wp.media({ 
                    title: 'Upload Banner Image',
                    // mutiple: true if you want to upload multiple files at once
                    multiple: false
                }).open().on('select', function(e){
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_banner_image = image_banner.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    console.log(uploaded_banner_image);
                    var wprtt_banner_image = uploaded_banner_image.toJSON().url;
                    // Let's assign the url value to the input field
                    $('#wprtt_banner_image').val(wprtt_banner_image);
                }); 
            });
        }); 
</script>
    <?php
}

function wprtt_display_banner_title(){
    ?>

    <input type="text" name="wprtt_banner_title" id="wprtt_banner_title" class="regular-text" value="<?php echo get_option('wprtt_banner_title'); ?>" />

    <?php
}

function wprtt_display_banner_disc(){
    ?>

    <textarea name="wprtt_banner_disc" rows="10" cols="30"><?php echo get_option('wprtt_banner_disc'); ?></textarea>    

    <?php
}

function wprtt_display_address(){
    ?>

    <input type="text" name="wprtt_footer_address" id="wprtt_footer_address" class="regular-text" value="<?php echo get_option('wprtt_footer_address'); ?>" />

    <?php
}

function wprtt_display_telephone(){
    ?>

    <input type="text" name="wprtt_footer_telephone" id="wprtt_footer_telephone" class="regular-text" value="<?php echo get_option('wprtt_footer_telephone'); ?>" />

    <?php
}

function wprtt_display_fax(){
    ?>

    <input type="text" name="wprtt_footer_fax" id="wprtt_footer_fax" class="regular-text" value="<?php echo get_option('wprtt_footer_fax'); ?>" />

    <?php
}

function wprtt_display_email(){
    ?>

    <input type="text" name="wprtt_footer_email" id="wprtt_footer_email" class="regular-text" value="<?php echo get_option('wprtt_footer_email'); ?>" />

    <?php
}

function wprtt_display_fblink(){
    ?>

    <input type="text" name="wprtt_footer_fblink" id="wprtt_footer_fblink" class="regular-text" value="<?php echo get_option('wprtt_footer_fblink'); ?>" />

    <?php
}

function wprtt_display_gpluslink(){
    ?>

    <input type="text" name="wprtt_footer_gpluslink" id="wprtt_footer_gpluslink" class="regular-text" value="<?php echo get_option('wprtt_footer_gpluslink'); ?>" />

    <?php
}

function wprtt_display_linkedinlink(){
    ?>

    <input type="text" name="wprtt_footer_linkedinlink" id="wprtt_footer_linkedinlink" class="regular-text" value="<?php echo get_option('wprtt_footer_linkedinlink'); ?>" />

    <?php
}

function wprtt_display_pinlink(){
    ?>

    <input type="text" name="wprtt_footer_pinlink" id="wprtt_footer_pinlink" class="regular-text" value="<?php echo get_option('wprtt_footer_pinlink'); ?>" />

    <?php
}

function wprtt_display_twitterlink(){
    ?>

    <input type="text" name="wprtt_footer_twitterlink" id="wprtt_footer_twitterlink" class="regular-text" value="<?php echo get_option('wprtt_footer_twitterlink'); ?>" />

    <?php
}

function wprtt_display_copyright(){
    ?>

    <textarea name="wprtt_footer_copyright" rows="10" cols="30"><?php echo get_option('wprtt_footer_copyright'); ?></textarea>    

    <?php
}

// callback function for adding custom menu

function wprtt_custom_options(){
    //we have to link our custom settings
    require_once(get_template_directory() . '/inc/templates/wprtt_custom_header_option.php');
}

function wprtt_home_page_options(){
    // we have to link our custom footer settings
    require_once(get_template_directory() . '/inc/templates/wprtt_custom_home_page_option.php');
}

function wprtt_footer_custom_options(){
    // we have to link our custom footer settings
    require_once(get_template_directory() . '/inc/templates/wprtt_custom_footer_option.php');
}