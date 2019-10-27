<?php
/**
 * @name AbstractCustomPostTypes
 * @author IDea Factory
 * @version 1.0.0
 * @abstract Abstract definitions for Wordpress Custom Types
 */
require_once(__DIR__ . "/ITaxonomy.php");

abstract class AbstractCustomPostTypes {
    /**
     * @var string
     *  Identifiant du type de Custom Type
     */
    protected static $postType;

    protected static $labels = [
        "name" => null, // Nom global du type
        "singular_name" => null, // Nom spécifique du type
        "menu_name" => null, // Nom dans le menu
        "all_items" => null, // Libellé "Tous..." dans le tableau de bord
        "view_item" => null, // Libellé "Voir..." dans le tableau de bord
        "add_new_item" => null, // Libellé "Ajouter..." dans le tableau de bord
        "edit_item" => null, // Libellé "Modifier..." dans le tableau de bord
        "update_item" => null, // Libellé "Modification..." dans le tableau de bord
        "search_items" => null, // Libellé "Rechercher..." dans le tableau de bord
        "not_found" => null, // Libellé "Non trouvé..." dans le tableau de bord
        "not_found_in_trash" => null // Libellé "Absent dans la corbeille..." dans le tableau de bord
    ];


    protected static $args = [
        "label" => null, // ???
        "description" => null, // Description du Custom Type
        "labels" => null, // Reprise des différents libellés définis
        "supports" => [], // Options disponibles dans l'éditeur du tableau de bord
        "show_in_rest" => true, // Rend accessible le type dans l'API Wordpress
        "hierarchical" => false, // Vrai s'il s'agit d'un type hiérarchique
        "public" => true,
        "has_archive" => false,
        "menu_icon" => null,
        "rewrite" => [], // Règles de réécriture des URLs
    ];

    /**
     * @var array
     *  Array of taxonomies for a type
     */
    protected static $taxonomies = [];

    public static function register() {
        register_post_type(self::$postType, self::$args);
    }

    public static function addTaxonomies(): void {
        if (count(self::$taxonomies)) {
            foreach(self::$taxonomies as $taxonomy) {
                register_taxonomy($taxonomy->getTaxonomy(), self::$postType, $taxonomy->getArgs());
            }
        }
    }

    public function addTaxonomy(ITaxonomy $taxonomy): AbstractCustomPostTypes {
        self::$taxonomies[] = $taxonomy;
        return $this;
    }
}