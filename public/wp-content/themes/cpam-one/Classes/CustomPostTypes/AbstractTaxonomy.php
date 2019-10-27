<?php
/**
 * @name AbstractTaxonomy
 * @author IDea Factory
 * @package CustomPostTypes
 * @version 1.0.0
 * @abstract Specifications of taxonomies
 */
abstract class AbstractTaxonomy implements ITaxonomy {
    protected $labels = [];
    protected $args = [];
    protected $taxonomy;

    public function getTaxonomy(): string {
        return $this->taxonomy;
    }

    public function getArgs(): array {
        $this->args["labels"] = $this->labels;

        return $this->args;
    }

    public function setName(string $name, ?string $context = null): \ITaxonomy
    {
        $this->labels["name"] = _x($name, $context === null ? "taxonomy general name" : $context);
        return $this;
    }

    public function setSingularName(string $singularName, ?string $context = null): \ITaxonomy
    {
        $this->labels["singular_name"] = _x($singularName, $context === null ? "taxonomy singular name" : $context);
        return $this;
    }

    public function setSearchItems(string $label): \ITaxonomy
    {
        $this->labels["search_items"] = __($label);
        return $this;
    }

    public function setAllItems(string $label): \ITaxonomy
    {
        $this->labels["all_items"] = __($label);
        return $this;
    }

    public function setEditItem(string $label): \ITaxonomy
    {
        $this->labels["edit_item"] = __($label);
        return $this;
    }

    public function setUpdateItem(string $label): \ITaxonomy
    {
        $this->labels["update_item"] = __($label);
        return $this;
    }

    public function setAddNewItem(string $label): \ITaxonomy
    {
        $this->labels["add_new_item"] = __($label);
        return $this;
    }

    public function setNewItemName(string $label): \ITaxonomy
    {
        $this->labels["new_item_name"] = __($label);
        return $this;
    }

    public function setSeparateItems(string $label): \ITaxonomy
    {
        $this->labels["separate_items_with_commas"] = __($label);
        return $this;
    }

    public function setMenuName(string $label): \ITaxonomy
    {
        $this->labels["menu_name"] = __($label);
        return $this;
    }

    public function isHierarchical(bool $value = false): \ITaxonomy
    {
        $this->args["hierarchical"] = $value;
        return $this;
    }

    public function showUI(bool $showUI = true): \ITaxonomy
    {
        $this->args["show_ui"] = $showUI;
        return $this;
    }

    public function showAdminColumn(bool $showAdminColumn = true): \ITaxonomy
    {
        $this->args["show_admin_column"] = $showAdminColumn;
        return $this;
    }

    public function hasQueryVar(bool $hasQueryVar = true): \ITaxonomy
    {
        $this->args["query_var"] = $hasQueryVar;
        return $this;
    }

    public function rewriteRules(): \ITaxonomy
    {
        $this->args["rewrite"] = ["slug" => $this->taxonomy];
        return $this;
    }

    abstract protected function setup();
}