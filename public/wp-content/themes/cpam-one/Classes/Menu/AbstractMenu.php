<?php
/**
* @name AbstractMenu
* @author Vaelia
* @package Menu
* @version 1.0.0
* @abstract Sets walker options
*/
abstract class AbstractMenu {
    protected $options = [
        "theme_location" => null,
        "container" => null,
        "container_class" => null,
        "container_id" => null,
        "menu" => null,
        "menu_class" => null,
        "menu_id" => null,
        "echo" => true,
        "fallback_cb" => null,
        "before" => "",
        "after" => null,
        "link_before" => null,
        "link_after" => null,
        "items_wrap" => null,
        "depth" => 0,
        "walker" => null
    ];

    public function getOptions(): array {
        return $this->options;
    }
}