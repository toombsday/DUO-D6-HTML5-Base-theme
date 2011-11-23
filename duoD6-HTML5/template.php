<?php

/** Change divider for breadcrumbs **/

function themename_breadcrumb($breadcrumb) {
   if (!empty($breadcrumb)) {
     return implode(' / ', $breadcrumb);
   }
}

/**
 * Override or insert PHPTemplate variables into BLOCK templates.
 *
 * @param $vars
 *   A sequential array of variables to pass to the theme template.
 * @param $hook
 *   The name of the theme function being called ("block" in this case.)
 */
function mytheme_preprocess_block(&$vars, $hook) { //change mytheme to your theme name
  $block = $vars['block'];
  
  // Create css id attribute based on 'Block title' when available.
  if (!empty($block->title)) {
  // Create the variable and ensure that it is correctly formatted with mytheme_id_safe function
  $cssid = mytheme_id_safe($block->title);
  }
  else  {
  // If no "Block title", create css id attribute the traditional way.
  $cssid = "block-$block->module-$block->delta";
  }
  $vars['block_cssid'] = $cssid;
}
/**
 * Converts a string to a suitable html ID attribute.
 *
 * - Preceeds initial numeric with 'n' character.
 * - Replaces space and underscore with dash.
 * - Converts entire string to lowercase.
 * - Works for classes too!
 *
 * @param string $string
 *   The string
 * @return
 *   The converted string
 */
function mytheme_id_safe($string) { //change mytheme to your theme name
  if (is_numeric($string{0})) {
    // If the first character is numeric, add 'n' in front
    $string = 'n'. $string;
  }
  return strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $string));
}

?>