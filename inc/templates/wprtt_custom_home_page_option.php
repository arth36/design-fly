<h1>Theme Home Page Options Panel</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">

    <?php settings_fields( 'wprtt_home_page_section' ); ?>
    <?php do_settings_sections( 'wprtt_home_page_options' ); ?>
    <?php submit_button(); ?>

</form>