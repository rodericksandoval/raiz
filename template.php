<?php

/**
 * Implements hook_html_head_alter().
 */
function raiz_html_head_alter(&$head_elements) {
  // Remove system content type meta tag.
  unset($head_elements['system_meta_content_type']);
  // Remove system generator meta tag.
  unset($head_elements['system_meta_generator']);
  // Remove metatags module generator meta tag.
  unset($head_elements['metatag_generator']);
}


/**
 * Implements hook_preprocess_html().
 */
function raiz_preprocess_html(&$variables) {
  // Charset
  $meta_charset = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'charset' => 'utf-8',
    ),
  );
  drupal_add_html_head($meta_charset, 'meta_charset');
  // Compatibility
  $meta_x_ua_compatible = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'x-ua-compatible',
      'content' => 'ie=edge, chrome=1',
    ),
  );
  drupal_add_html_head($meta_x_ua_compatible, 'meta_x_ua_compatible');
  // Viewport
  $meta_viewport = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1, minimal-ui',
    ),
  );
  drupal_add_html_head($meta_viewport, 'meta_viewport');
}


/**
 * Implements hook_page_alter().
 */
function raiz_page_alter(&$page) {
  // Remove the wrapper from the main content block.
  if (!empty($page['content']['system_main'])) {
    $page['content']['system_main']['#theme_wrappers'] = array_diff($page['content']['system_main']['#theme_wrappers'], array('block'));
  }
}


/**
 * Implements hook_preprocess_region().
 */
function raiz_preprocess_region(&$variables) {
  // Remove 'region' class.
  $variables['classes_array'] = preg_replace('/^region$/', '', $variables['classes_array']);

  // Prefix 'l-' on region class names.
  $css_region_name = drupal_clean_css_identifier($variables['region']);
  $variables['classes_array'] = preg_replace('/^region-' . $css_region_name . '$/', 'l-region-' . $css_region_name, $variables['classes_array']);

  // dsm(var_dump($variables['classes_array']));

}


/**
 * Implements hook_preprocess_node().
 */
// Add "even" or "odd" striping classes.
// function raiz_preprocess_node(&$vars) {
//   $vars['classes_array'][] = 'node-' . $vars['zebra'];
// }


/**
 * Implements hook_preprocess_block().
 */
// Add "even" or "odd" striping classes.
// function raiz_preprocess_block(&$vars, $hook) {
//   $vars['classes_array'][] = 'block-' . $vars['zebra'];
// }


/**
 * Overriding flexslider_list theme implementation to output colorbox enabled images
 * https://www.drupal.org/node/1553648
 */
function raiz_flexslider_list(&$vars) {
  // Reference configuration variables
  $optionset = &$vars['settings']['optionset'];
  $items = &$vars['items'];
  $attributes = &$vars['settings']['attributes'];
  $type = &$vars['settings']['type'];
  $output = '';
  $group = $optionset->title;
  // Build the list
  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    foreach ($items as $i => $item) {
      $caption = '';
      if (!empty($item['caption'])) {
        $caption = $item['caption'];
      }
      // Build path to colorbox image style. Replace 'colorbox' with your image style name.
      $colorbox_path = image_style_url('colorbox', $item['item']['uri']);
      $image_options = array(
        'style_name' => $optionset->imagestyle_normal,
        'path'       => $item['item']['uri'],
        'height'     => $item['item']['height'],
        'width'      => $item['item']['width'],
        'alt'        => $item['item']['alt'],
        'title'      => $item['item']['title'],
      );
      $item['slide'] = theme('colorbox_imagefield', array('image' => $image_options, 'path' => $colorbox_path, 'title' => $caption, 'gid' => array('rel' => $group)));
      $output .= theme('flexslider_list_item', array(
        'item' => $item['slide'],
        'settings' => array(
          'optionset' => $optionset,
        ),
        'caption' => $caption,
      ));
    }
    $output .= "</$type>";
  }
  return $output;
}
