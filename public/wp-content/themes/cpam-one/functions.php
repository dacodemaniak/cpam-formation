<?php
/**
* @name functions.php
* @author Vaelia
* @version 1.0.0
* @abstract Hooks Wordpress
*/

// Imports classes
require_once(__DIR__ . "/Classes/Assets/CSS.php");
require_once(__DIR__ . "/Classes/Assets/JS.php");
require_once(__DIR__ . "/Classes/Menu/Menus.php");

// Hooks enqueing styles
add_action(
    "wp_enqueue_scripts", // Hook name
    "CSS::enqueue" // Function to use
);
// Hooks enqueuing javascripts
add_action(
    "wp_enqueue_scripts",
    "JS::enqueue"
);

// Hook to enable Wordpress menus
add_action(
    "init",
    "Menus::register"
);