<?php


function SBM_ACF_RelationshipField($fieldName, $attributes, $uniqueIdentifier = '')
{
    $result = array();
    static $defaults = array(
        'label' => '',
        'type' => 'relationship',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'post_type' => '',
        'taxonomy' => '',
        'filters' => array(
            0 => 'search',
        ),
        'elements' => array(
            0 => 'featured_image',
        ),
        'min' => '',
        'max' => '',
        'return_format' => 'object'
    );

    if (!$fieldName) {
        throw new Error('SBM_ACF_RelationshipField: $fieldName parameter must be provided');
    }
    if (!$attributes || !is_array($attributes)) {
        throw new Error('SBM_ACF_RelationshipField: $attributes parameter must be provided, and must be an array');
    }

    $fieldName = strval($fieldName);

    $result = array_merge($defaults, $attributes);

    $result['name'] = $fieldName;
    $result['key'] = SBM_ACF_FieldKey($uniqueIdentifier . $fieldName);

    if (! $result['label']) {
        $result['label'] = $fieldName;
    }


    return $result;
}

