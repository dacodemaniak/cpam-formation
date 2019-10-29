<?php
/**
* @name CSS
* @package Assets
* @author Vaelia
* @version 1.0.0
* @abstract Define static function for CSS enqueing
*/
class CSS {
    /**
    * @var static string $dir
    *   Sets the assets dir for css
    */
    private static $dir = "/assets/css/";

    public static function enqueue() {
        $cssDir = self::getDocumentRoot() . self::$dir;

        // Tell Wordpress to enqueue our style
        wp_enqueue_style(
            "custom",
            $cssDir . "custom.css"
        );
    }

    private static function getDocumentRoot(): string {
        $rootParts = explode("/", $_SERVER["DOCUMENT_ROOT"]);

        echo "<!-- " . $_SERVER["DOCUMENT_ROOT"] . " -->\n";

        $themeParts = explode("/", get_template_directory());

        $themePathes = array_diff($themeParts, $rootParts);

        return "/" . implode("/", $themePathes);


    }
}