<?php
/**
* @name header.php
* @author Vaelia
* @abstract Sets the header of views
*/

// Import helpers classes
require_once("Classes/Menu/BootstrapMenu.php");
//require_once("Classes/Menu/Walker/BootstrapMenuWalker.php");

// Instanciate BootstrapMenu
$bootstrapMenu = new BootstrapMenu("top-menu");

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
        <div class="container-fluid">
            <header>
            </header>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- Toggle menu button -->
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#top-menu"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="top-menu">
                    <?php wp_nav_menu($bootstrapMenu->getOptions()); ?>
                </div>
            </nav>