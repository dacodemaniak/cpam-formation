<?php
/**
* @name header.php
* @author Vaelia
* @abstract Sets the header of views
*/
?>
<!doctype html>
<html>
    <head>
        <meta charset="<?php bloginfo("charset"); ?>">
        <meta
            name="viewport" 
            content="width=device-width,
                initial-scale=1.0,
                maximum-scale=1.0">
        <title><?php bloginfo("name");?></title>

        <!-- Inserts stylesheets -->
        <link 
            rel="stylesheet"
            href="<?php bloginfo("stylesheet_url");?>"
        >
        <?php 
            // Gets the standard Wordpress header
            wp_head(); 
        ?>
    </head>

    <body>
