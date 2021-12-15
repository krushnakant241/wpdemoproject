<?php


function SBM_ACF_RadioField($fieldName, $attributes, $uniqueIdentifier = '')
{
    $result = array();
    static $defaults = array(
        'label' => '',
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => array(),
        'allow_null' => 0,
        'other_choice' => 0,
        'default_value' => '',
        'layout' => 'vertical',
        'return_format' => 'value',
        'save_other_choice' => 0
    );

    if (!$fieldName) {
        throw new Error('SBM_ACF_RadioField: $fieldName parameter must be provided');
    }
    if (!$attributes || !is_array($attributes)) {
        throw new Error('SBM_ACF_RadioField: $attributes parameter must be provided, and must be an array');
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

