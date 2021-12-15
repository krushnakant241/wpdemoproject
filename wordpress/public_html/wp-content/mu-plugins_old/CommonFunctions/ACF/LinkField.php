<?php


function SBM_ACF_LinkField($fieldName, $attributes, $uniqueIdentifier = '')
{
    $result = array();
    static $defaults = array(
        'label' => '',
        'name' => '',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'return_format' => 'array',
    );

    if (!$fieldName) {
        throw new Error('SBM_ACF_LinkField: $fieldName parameter must be provided');
    }
    if (!$attributes || !is_array($attributes)) {
        throw new Error('SBM_ACF_LinkField: $attributes parameter must be provided, and must be an array');
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

