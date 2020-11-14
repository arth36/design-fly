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
                    <h2>Advertising</h1>
                    <p>Neque porro quisquam est, dolorem ipsum quia dolor hollo...</p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-2.png" />
                </div>
                <div class="col_content">
                    <h2>Multimedia</h1>
                    <p>Neque porro quisquam est, dolorem ipsum quia dolor hollo...</p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/feature-icons-3.png" />
                </div>
                <div class="col_content">
                    <h2>Photography</h1>
                    <p>Neque porro quisquam est, dolorem ipsum quia dolor hollo...</p>
                </div>
            </div>
        </div>    
    </div>
</div>

<?php 
    if(have_posts()):
        while(have_posts()):
            the_post();
?>
<div><h1><?php echo the_title(); ?></h1></div>

<div><h1><?php echo get_the_author(); ?></h1></div>

<div><h1><?php echo the_date('j M Y'); ?></h1></div>
<p><?php echo the_content(); ?></p>
        <?php endwhile; endif; ?>

<?php
get_footer();