<?php


function SBM_ACF_Group($groupName, $attributes, $fields)
{
    static $defaults = array(
        'title' => '',
        'fields' => array(),
        'location' => array(),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    );

    if (!$groupName) {
        throw new Error('SBM_ACF_Group: $groupName parameter must be provided');
    }
    if (!$attributes || !is_array($attributes)) {
        throw new Error('SBM_ACF_Group: $attributes parameter must be provided, and must be an array');
    }
    if (!$fields || !is_array($fields)) {
        throw new Error('SBM_ACF_Group: $fields parameter must be provided, and must be an array');
    }

    $groupName = strval($groupName);

    $result = array_merge($defaults, $attributes);

    $result['key'] = SBM_ACF_GroupKey($groupName);
    $result['fields'] = $fields;

    if (! $result['title']) {
        $result['title'] = $groupName;
    }


    return $result;
}

