<?php
/**
* @name Menus
* @package Menu
* @author Vaelia
* @version 1.0.0
* @abstract Register Wordpress menus
*/
class Menus {
    public static function register() {
        register_nav_menus(
            [
                "top-menu" => "top-menu"
            ]
        );
    }
}