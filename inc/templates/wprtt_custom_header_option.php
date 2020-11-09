<h1>Theme Header Options Panel</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">

    <?php settings_fields( 'wprtt_section' ); ?>
    <?php do_settings_sections( 'wprtt_theme_options' ); ?>
    <?php submit_button(); ?>

</form>