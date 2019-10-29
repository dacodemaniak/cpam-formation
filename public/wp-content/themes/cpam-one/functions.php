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

/**
* Custom Post Type : Configurations
*/
function wpm_custom_post_type() {
    // Tableau contenant les informations
    // affichées dans le Talbleau de bord
    $labels = [
        "name" => _x("Configurations", "Post Type General Name"),
        "singular_name" => _x("Configuration", "Post Type Singular Name")
    ];

    // Tableau définissant le comporement du CPT
    $args = [
        "label" => __("Configurations"),
        "description" => __("Toutes les configurations"),
        "labels" => $labels,
        "supports" => [
            "title",
            "excerpt",
            "thumbnail",
            "custom-fields",
        ],
        "show_in_rest" => true,
        "public" => true,
        "has_archive" => true,
        "rewrite" => ["slug" => "configurations"]
    ];
    register_post_type(
        "configurations",
        $args
    );
}
add_action(
    "init",
    "wpm_custom_post_type"
);

// Définition de la taxonomie (champs associés)
function wpm_add_taxonomies() {
    $anneeLabels = [
        "name" => _x("Années", null),
        "singular_name" => _x("Année", null),
        "search_items" => __("Rechercher une année"),
        "all_items" => __("Toutes les années"),
        "edit_item" => __("Modification rapide"),
        "update_item" => __("Mettre à jour une année"),
        "add_new_item" => __("Ajouter une année"),
        "new_item_name" => __("Nouvelle année"),
        "menu_name" => __("Années")
    ];

    $argsAnnee = [
        "labels" => $anneeLabels,
        "show_ui" => true,
        "show_admin_column" => true,
        "query_var" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "annees"]
    ];
    // Enregistre la taxonomie pour "configurations"
    register_taxonomy(
        "annees",
        'configurations', // CPT name
        $argsAnnee
    );
    $ramLabels = [
        "name" => _x("RAM", null),
        "singular_name" => _x("RAM", null),
        "search_items" => __("Rechercher une capacité de RAM"),
        "all_items" => __("Toutes les capacités"),
        "edit_item" => __("Modification rapide"),
        "update_item" => __("Mettre à jour une capacité"),
        "add_new_item" => __("Ajouter une capacité"),
        "new_item_name" => __("Nouvelle capacité"),
        "menu_name" => __("Capacité RAM")
    ];

    $argsRam = [
        "labels" => $ramLabels,
        "show_ui" => true,
        "show_admin_column" => true,
        "query_var" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "ram"]
    ];
    // Enregistre la taxonomie pour "configurations"
    register_taxonomy(
        "ram",
        'configurations', // CPT name
        $argsRam
    );
}
// Ajouter les taxonomies
add_action(
    "init",
    "wpm_add_taxonomies"
);