<?php


function SBM_ACF_RepeaterField($fieldName, $attributes, $subFields, $uniqueIdentifier = '')
{
    $result = array();
    static $defaults = array(
        'label' => '',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'row',
        'button_label' => 'Add Row',
        'sub_fields' => array()
    );

    if (!$fieldName) {
        throw new Error('SBM_ACF_RepeaterField: $fieldName parameter must be provided');
    }
    if (!$attributes || !is_array($attributes)) {
        throw new Error('SBM_ACF_RepeaterField: $attributes parameter must be provided, and must be an array');
    }
    if (!$subFields || !is_array($subFields)) {
        throw new Error('SBM_ACF_RepeaterField: $subFields parameter must be provided, and must be an array');
    }

    $fieldName = strval($fieldName);

    $result = array_merge($defaults, $attributes);

    $result['name'] = $fieldName;
    $result['key'] = SBM_ACF_FieldKey($uniqueIdentifier . $fieldName);
    $result['sub_fields'] = $subFields;

    if (! $result['label']) {
        $result['label'] = $fieldName;
    }


    return $result;
}

