<?php
/**
 * @name ITaxonomy
 * @author IDea Factory
 * @version 1.0.0
 * @package CustomPostTypes
 * @abstract Interface specifying taxonomy methods
 */
interface ITaxonomy {
    public function setName(string $name, string $context = null): ITaxonomy;
    public function setSingularName(string $singularName, string $context = null): ITaxonomy;
    public function setSearchItems(string $label): ITaxonomy;
    public function setAllItems(string $label): ITaxonomy;
    public function setEditItem(string $label): ITaxonomy;
    public function setUpdateItem(string $label): ITaxonomy;
    public function setAddNewItem(string $label): ITaxonomy;
    public function setNewItemName(string $label): ITaxonomy;
    public function setSeparateItems(string $label): ITaxonomy;
    public function setMenuName(string $label): ITaxonomy;
    
    public function isHierarchical(bool $value = false): ITaxonomy;
    public function showUI(bool $showUI = true): ITaxonomy;
    public function showAdminColumn(bool $showAdminColumn = true): ITaxonomy;
    public function hasQueryVar(bool $hasQueryVar = true): ITaxonomy;
    public function rewriteRules(): ITaxonomy;
}