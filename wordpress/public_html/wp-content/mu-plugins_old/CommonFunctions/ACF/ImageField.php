<?php


function SBM_ACF_ImageField($fieldName, $attributes, $uniqueIdentifier = '')
{
    $result = array();
    static $defaults = array(
      'label' => '',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'array',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    );

    if (!$fieldName) {
        throw new Error('SBM_ACF_ImageField: $fieldName parameter must be provided');
    }
    if (!$attributes || !is_array($attributes)) {
        throw new Error('SBM_ACF_ImageField: $attributes parameter must be provided, and must be an array');
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

