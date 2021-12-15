<?php

/**
 * Given a Template filename and a context array, renders the template file,
 * passing it the context data to work with.
 */
function SBM_Templates_Render($template, $context = array())
{
    $path = SBM_Templates_GetPath($template);

    // based on how 'include' works with variable scoping, the $context
    // variable is available for use within that template
    include $path;
}


/**
 * A variant on the `SBM_Templates_Render` method, which returns the result as
 * a string, rather than directly echo-ig it.
 */
function SBM_Templates_RenderString($template, $context = array())
{
    $result = '';

    ob_start();
    SBM_Templates_Render($template, $context);
    $result = ob_get_contents();
    ob_end_clean();


    return $result;
}


/**
 * Given a template name, extracts the file path so it can be used in an
 * `include` statement.
 * The expected template syntax is one of the following:
 *   `path/to/template.phtml`
 * which is a relative path within the theme's `templates` directory, or:
 *   `<namespace>:path/to/template.phtml`
 * which is a relative path with a component`s `templates` directory, where the
 * component is identified by the `<namespace>` prefix.
 *
 * TODO: Add another namespace "type" for blocks
 */
function SBM_Templates_GetPath($template)
{
    $namespaceMarker = ':';
    $result = null;

    $namespacePosition = strpos($template, $namespaceMarker);
    if ($namespacePosition) {
        $component = substr($template, 0, $namespacePosition);
        $path = substr($template, ($namespacePosition + 1));

        $result = theme_path('/src/components/' . $component . '/templates/' . $path);
    } else {
        $result = theme_path('/templates/' . $template);
    }


    return $result;
}

