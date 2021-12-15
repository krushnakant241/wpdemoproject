<?php

/**
 * Given a menu location name, returns a list of the menu items which
 * belong to the menu assigned at that location.
 */
function SBM_MenuGetItemsFromLocation($menuLocationName, $queriedObject = null)
{
    $result = array();
        $locations = get_nav_menu_locations();
        if (isset($locations[$menuLocationName])) {
            $result = SBM_MenuGetItems(wp_get_nav_menu_object(
                $locations[$menuLocationName])->term_id,
                $queriedObject
            );
        }


        return $result;
}

function SBM_MenuGetItems($menuName, $queriedObject = null)
{
    $result = wp_get_nav_menu_items($menuName);

    // convert the flat structure that WP returns to a tree of menu item
    // objects
    $result = SBM_MenuBuildTree($result);

    SBM_MenuCalculateCurrentObject($result, $queriedObject);


    return $result;
}


function SBM_MenuBuildTree(array &$elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as &$element) {
        if ($element->menu_item_parent == $parentId) {
            $children = SBM_MenuBuildTree($elements, $element->ID);
            if ($children) {
                $element->children = $children;
            } else {
                $element->children = array();
            }

            $branch[] = $element;
            unset($element);
        }
    }


    return $branch;
}


/**
 * Iterates over a menu tree, and calculates the `is active` and `has active
 * child` menu options.
 */
function SBM_MenuCalculateCurrentObject(array &$elements, $queriedObject)
{
    $result = false;

    if ($elements) {
        foreach ($elements as &$menuItem) {
            $menuItem->isActive = false;
            $menuItem->hasActiveChild = false;

            $childActiveFound = SBM_MenuCalculateCurrentObject($menuItem->children, $queriedObject);
            if ($childActiveFound) {
                $result = true;
                $menuItem->hasActiveChild = true;
            }

            if ($queriedObject) {
                if (get_class($queriedObject) == 'WP_Post') {
                    if (($menuItem->type == 'post_type') && ($menuItem->object_id == $queriedObject->ID)) {
                        $menuItem->isActive = true;
                        $result = true;
                    }
                }
            }
        }
    }


    return $result;
}

