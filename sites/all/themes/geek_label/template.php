<?php

/**
 * Implements template_preprocess_page(&$variables).
 */
function geek_label_preprocess_page(&$variables) {
  $theme_path = drupal_get_path('theme', 'geek_label');

  // Adding Global Fonts Css Files.
  drupal_add_css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700', array('group' => CSS_SYSTEM, 'every_page' => TRUE));

  // Adding Global Css Files.
  drupal_add_css($theme_path . "/css/style.css", array('group' => CSS_DEFAULT, 'every_page' => TRUE));
  // Adding Global Css Files.
  drupal_add_css($theme_path . "/css/base.css", array('group' => CSS_DEFAULT, 'every_page' => TRUE));
  drupal_add_css($theme_path . "/css/jquery.fullPage.css", array('group' => CSS_DEFAULT, 'every_page' => TRUE));
  drupal_add_js($theme_path . "/js/global.js", array('group' => JS_DEFAULT, 'every_page' => TRUE));
  drupal_add_js($theme_path . "/js/jquery.fullPage.min.js", array('group' => JS_DEFAULT, 'every_page' => TRUE));
  drupal_add_css($theme_path . "/css/font-awesome.css", array('group' => CSS_DEFAULT, 'every_page' => TRUE));

  if (drupal_is_front_page()) {
    drupal_add_css($theme_path . "/css/slick.css", array('group' => CSS_DEFAULT, 'every_page' => FALSE));
    drupal_add_css($theme_path . "/css/slick-theme.css", array('group' => CSS_DEFAULT, 'every_page' => FALSE));
    drupal_add_js($theme_path . "/js/slick.min.js", array('group' => JS_DEFAULT, 'every_page' => FALSE));
  }

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
    $form['actions']['#suffix'] = '<div class="details"><div class="phone"><p>01923 220121</p></div><div class="email"><p>info@compucorp.co.uk</p></div></div>';
  }
}

/**
 * Preprocss block(&vars).
 */
function geek_label_process_block(&$vars) {
  if($vars['block_html_id'] == 'block-bean-services') {
    $vars['content_attributes'] = 'container row';
  }
}

/**
 * Implements Preprocess Html(&$variables).
 */
function geek_label_preprocess_html(&$variabels) {
  // Fix the viewport and zooming in mobile devices.
  $viewport = array(
   '#tag' => 'meta',
   '#attributes' => array(
     'name' => 'apple-mobile-web-app-capable',
     'content' => 'yes',
   ),
  );
  drupal_add_html_head($viewport, 'viewport');
}
