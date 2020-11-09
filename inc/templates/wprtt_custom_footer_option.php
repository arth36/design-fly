<h1>Theme Footer Options Panel</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">

    <?php settings_fields( 'wprtt_footer_section' ); ?>
    <?php do_settings_sections( 'wprtt_footer_options' ); ?>
    <?php submit_button(); ?>

</form>