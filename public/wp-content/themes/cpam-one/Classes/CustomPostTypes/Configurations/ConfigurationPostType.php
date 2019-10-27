<?php
/**
 * @name ConfigurationPostType
 * @author IDea Factory
 * @version 1.0.0
 * @abstract Concrete definition of Configuration Type
 */
require_once(__DIR__ . "/../AbstractCustomPostTypes.php");
require_once(__DIR__ . "/Taxonomies/Annee.php");

class ConfigurationPostType extends AbstractCustomPostTypes {
    public function __construct(string $postType) {
        self::$postType = $postType;

        self::$labels["name"] = _x("Configurations", "Post Type General Name");
        self::$labels["singular_name"] = _x("Configuration", "Post Type Singular Name");
        self::$labels["menu_name"] = __("Configurations");
        self::$labels["all_items"] = __("Toutes les configurations");
        self::$labels["view_item"] = __("Voir les configurations");
        self::$labels["add_new_item"] = __("Ajouter une nouvelle configuration");
        self::$labels["add_new"] = __("Ajouter");
        self::$labels["edit_item"] = __("Editer la configuration");
        self::$labels["update_item"] = __("Modifier la configuration");
        self::$labels["search_items"] = __("Rechercher une configuration");
        self::$labels["not_found"] = __("Configuration non trouvée");
        self::$labels["not_found_in_trash"] = __("Configuration non trouvée dans la corbeille");

        // Sets args
        self::$args["label"] = __("Configurations");
        self::$args["supports"] = [
            "title",
            "editor",
            "author",
            "thumbnail",
            "custom-fields",
        ];
        self::$args["labels"] = self::$labels;
        self::$args["menu_icon"] = "dashicons-desktop";
        self::$args["rewrite"] = ["slug" => "configurations"];

        $this->setTaxonomies();
    }

    private function setTaxonomies() {
        self::$taxonomies[] = new Annee("annee");
    }
}