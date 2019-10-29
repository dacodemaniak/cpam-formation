<?php
/**
* @name single-configurations.php
* @author Vaelia
* @version 1.0.0
* @abstract Display one configuration
*/
get_header();
?>

<section class="">
    <?php
    while ( have_posts() ) :
        the_post();
    ?>
        <h1><?php the_title(); ?></h1>
    <?php endwhile;?>
</section>