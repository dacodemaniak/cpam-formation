<?php
/**
* @name BootstrapMenu
* @author Vaelia
* @package Menu
* @version 1.0.0
* @abstract Set options for a Bootstrap menu
*/
require_once("AbstractMenu.php");
require_once("Walker/BootstrapMenuWalker.php");

class BootstrapMenu extends AbstractMenu {
    public function __construct(string $location) {
        $this->options["menu"] = $location;
        $this->options["before"] = "hello bootstrap";
        $this->options["theme_location"] = $location;
        $this->options["menu_class"] = "navbar-nav mr-auto";
        $this->options["items_wrap"] = '<ul id="%1$s" class="%2$s">%3$s</ul>';
        $this->options["walker"] = new BootstrapMenuWalker();

    }
}