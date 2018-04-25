<?php

function dncadminlte_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['dncadminlte_settings'] = [
    '#type' => 'fieldset',
    '#title' => t('DNC AdminLTE Settings')
  ];
  $form['dncadminlte_settings']['lte_long_title'] = [
    '#type' => 'textfield',
    '#title' => t('Long Title'),
    '#description' => t('Long title of the theme, default is <b>Admin</b>LTE like its original'),
    '#default_value' => theme_get_setting('lte_long_title')
  ];
  $form['dncadminlte_settings']['lte_mini_title'] = [
    '#type' => 'textfield',
    '#title' => t('Mini Title'),
    '#description' => t('Mini title of the theme, default is <b>A</b>LT like its original'),
    '#default_value' => theme_get_setting('lte_mini_title')
  ];
  $form['dncadminlte_settings']['lte_examples'] = [
    '#type' => 'checkbox',
    '#title' => t('Show Examples'),
    '#description' => t('Just show AdminLTE example page instead production one'),
    '#default_value' => theme_get_setting('lte_examples')
  ];
}
