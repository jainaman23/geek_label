<?php

/**
 * Implements template_preprocess_block(&$variables).
 */
function geek_label_preprocess_page(&$variables) {
  $theme_path = drupal_get_path('theme', 'geek_label');

  // Adding Global Fonts Css Files.
  drupal_add_css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700', array('group' => CSS_SYSTEM, 'every_page' => TRUE));

  // Adding Global Css Files.
  drupal_add_css($theme_path . "/css/style.css", array('group' => CSS_DEFAULT, 'every_page' => TRUE));
  drupal_add_js($theme_path . "/js/global.js", array('group' => JS_DEFAULT, 'every_page' => TRUE));

  $variables['container_class'] = 'container-fluid';
  $variables['content_column_class'] = 'wrapper';
}

/**
 * Implements Form ALter.
 */
function geek_label_form_alter(&$form, &$form_state) {
  if ($form['#id'] ==  'contact-site-form') {
    unset($form['name']['#title']);
    unset($form['mail']['#title']);
    unset($form['message']['#title']);
    unset($form['subject']);
    unset($form['copy']);
    unset($form['cid']);
    $form['name']['#attributes'] = array('placeholder' => 'Name');
    $form['mail']['#attributes'] = array('placeholder' => 'Email');
    $form['message']['#attributes'] = array('placeholder' => 'Message');
    $form['actions']['#suffix'] = '<p>Or Phone on: 01923 220121</p>';
  }
}
