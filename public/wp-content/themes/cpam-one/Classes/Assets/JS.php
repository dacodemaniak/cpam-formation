<?php
/**
* @name JS
* @package Assets
* @author Vaelia
* @version 1.0.0
* @abstract Define static function for JS enqueing
*/
class JS {
    /**
    * @var static string $dir
    *   Sets the assets dir for css
    */
    private static $dir = "/assets/js/";

    public static function enqueue() {
        $jsDir = self::getDocumentRoot() . self::$dir;

        wp_register_script(
            "chunk", // ID of the js
            $jsDir . "app.chunk.js", // Path to the js
            [], // Script dependencies
            "1.0.0", // Version of the js
            false // Place js in footer or not
        );
        wp_register_script(
            "app", // ID of the js
            $jsDir . "app.js", // Path to the js
            [], // Script dependencies
            "1.0.0", // Version of the js
            false // Place js in footer or not
        );

        // Then enqueue both scripts
        wp_enqueue_script("chunk");
        wp_enqueue_script("app");
    }

    private static function getDocumentRoot(): string {
        $rootParts = explode("/", $_SERVER["DOCUMENT_ROOT"]);

        echo "<!-- " . $_SERVER["DOCUMENT_ROOT"] . " -->\n";

        $themeParts = explode("/", get_template_directory());

        $themePathes = array_diff($themeParts, $rootParts);

        return "/" . implode("/", $themePathes);


    }
}