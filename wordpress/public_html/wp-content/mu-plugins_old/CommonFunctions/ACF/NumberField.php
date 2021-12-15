<?php


function SBM_ACF_NumberField($fieldName, $attributes, $uniqueIdentifier = '')
{
    $result = array();
    static $defaults = array(
        'label' => '',
        'type' => 'number',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'min' => '',
        'max' => '',
        'step' => ''
    );

    if (!$fieldName) {
        throw new Error('SBM_ACF_NumberField: $fieldName parameter must be provided');
    }
    if (!$attributes || !is_array($attributes)) {
        throw new Error('SBM_ACF_NumberField: $attributes parameter must be provided, and must be an array');
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
