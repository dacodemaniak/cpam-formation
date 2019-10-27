<?php
/**
 * @name Annee
 * @author IDea Factory
 * @package Configurations\Taxonomies
 * @version 1.0.0
 * @abstract Definition of Annee taxonomy
 */
require_once(__DIR__ . "/../../AbstractTaxonomy.php");

final class Annee extends AbstractTaxonomy {
    public function __construct() {
        $this->taxonomy = "annee";

        $this->setup();
    }

    protected function setup() {
        $this
            ->setName("Années")
            ->setSingularName("Année")
            ->setSearchItems("Chercher une année")
            ->setAllItems("Toutes les années")
            ->setEditItem("Editer une année")
            ->setUpdateItem("Mettre à jour une année")
            ->setAddNewItem("Ajouter une année")
            ->setNewItemName("Valeur de la nouvelle année")
            ->setMenuName("Année")
            ->isHierarchical()
            ->showUI()
            ->showAdminColumn()
            ->hasQueryVar()
            ->rewriteRules();

    }
}