<?php


function SBM_ACF_GroupKey($identifier)
{
    return 'group_' . md5($identifier);
}


function SBM_ACF_FieldKey($identifier)
{
    return 'field_' . md5($identifier);
}


// add all the ACF functionality.
require 'ACF/Group.php';

// content fields
require 'ACF/TextField.php';
require 'ACF/TextAreaField.php';
require 'ACF/NumberField.php';
require 'ACF/UrlField.php';
require 'ACF/RadioField.php';
require 'ACF/SelectField.php';
require 'ACF/LinkField.php';
require 'ACF/WysiwygField.php';
require 'ACF/BooleanField.php';
require 'ACF/ImageField.php';
require 'ACF/FileField.php';
require 'ACF/PostField.php';
require 'ACF/RelationshipField.php';
require 'ACF/MessageField.php';

// layout/repeater fields.
require 'ACF/GroupField.php';
require 'ACF/RepeaterField.php';
require 'ACF/AccordionField.php';

