<?php

//----------------------------------------------------------
//----------------------------------------------------------
// HEAD
//----------------------------------------------------------
//----------------------------------------------------------

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


//----------------------------------------------------------
//----------------------------------------------------------
// CSS CLEANUP
//----------------------------------------------------------
//----------------------------------------------------------

/**
 * Implements hook_css_alter().
 */
function raiz_css_alter(&$css) {

  $exclude = array(
  // Remove Drupal Core CSS
    'modules/aggregator/aggregator.css' => FALSE,
    'modules/block/block.css' => FALSE,
    'modules/book/book.css' => FALSE,
    'modules/comment/comment.css' => FALSE,
    'modules/dblog/dblog.css' => FALSE,
    'modules/field/theme/field.css' => FALSE,
    'modules/file/file.css' => FALSE,
    'modules/filter/filter.css' => FALSE,
    'modules/forum/forum.css' => FALSE,
    'modules/help/help.css' => FALSE,
    'modules/menu/menu.css' => FALSE,
    'modules/node/node.css' => FALSE,
    'modules/openid/openid.css' => FALSE,
    'modules/poll/poll.css' => FALSE,
    'modules/profile/profile.css' => FALSE,
    'modules/search/search.css' => FALSE,
    'modules/statistics/statistics.css' => FALSE,
    'modules/syslog/syslog.css' => FALSE,
    'modules/system/admin.css' => FALSE,
    'modules/system/maintenance.css' => FALSE,
    'modules/system/system.css' => FALSE,
    'modules/system/system.admin.css' => FALSE,
    // 'modules/system/system.base.css' => FALSE,
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.messages.css' => FALSE,
    // 'modules/system/system.menus.css' => FALSE,
    // 'modules/system/system.theme.css' => FALSE,
    'modules/taxonomy/taxonomy.css' => FALSE,
    'modules/tracker/tracker.css' => FALSE,
    'modules/update/update.css' => FALSE,
    'modules/user/user.css' => FALSE,
    'misc/vertical-tabs.css' => FALSE,

  // Remove Contrib Modules CSS
    // Display Suite Layouts CSS (TODO: turn into array)
    drupal_get_path('module', 'ds') . '/layouts/ds_2col/ds_2col.css' => FALSE,
    drupal_get_path('module', 'ds') . '/layouts/ds_2col_stacked/ds_2col_stacked.css' => FALSE,
    drupal_get_path('module', 'ds') . '/layouts/ds_3col/ds_3col.css' => FALSE,
    drupal_get_path('module', 'ds') . '/layouts/ds_3col_stacked/ds_3col_stacked.css' => FALSE,
  );

  $css = array_diff_key($css, $exclude);
}


//----------------------------------------------------------
//----------------------------------------------------------
// REGION WRAPPERS CLEANUP
//----------------------------------------------------------
//----------------------------------------------------------

/**
 * Implements hook_page_alter().
 */
function raiz_page_alter(&$page) {
  // Remove all region wrappers.
  foreach (element_children($page) as $key => $region) {
    if (!empty($page[$region]['#theme_wrappers'])) {
      $page[$region]['#theme_wrappers'] = array_diff($page[$region]['#theme_wrappers'], array('region'));
    }
  }
  // Remove the wrapper from the main content block.
  if (!empty($page['content']['system_main'])) {
    $page['content']['system_main']['#theme_wrappers'] = array_diff($page['content']['system_main']['#theme_wrappers'], array('block'));
  }
}


//----------------------------------------------------------
//----------------------------------------------------------
// SEACH
//----------------------------------------------------------
//----------------------------------------------------------

/**
 * Implements hook_form_FORM_ID_alter().
 */
function raiz_form_search_block_form_alter(&$form, &$form_state, $form_id) {
 // Add placeholder text to the search block form.
  $form['search_block_form']['#attributes']['placeholder'] = t('Search');
  // Replace the form submit value.
  $form['actions']['submit']['#name'] = t('Search');
  $form['actions']['submit']['#value'] = decode_entities("&#xf002;");
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function raiz_form_search_form_alter(&$form, &$form_state, $form_id) {
 // Add placeholder text to the search block form.
  $form['search_form']['#attributes']['placeholder'] = t('Search');
  // Replace the form submit value.
  $form['basic']['submit']['#name'] = t('Search');
  $form['basic']['submit']['#value'] = decode_entities("&#xf002;");
}
