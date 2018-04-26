<?php

/**
 * Add body classes if certain regions have content.
 */
function dncadminlte_preprocess_html(&$variables) {
  $variables['classes_array'][] = 'skin-blue';
  $variables['classes_array'][] = 'sidebar-mini';
  
  // Add conditional stylesheets
  if (!module_exists('fontawesome')) {
    drupal_add_css(path_to_theme() . '/vendors/font-awesome/css/font-awesome.min.css');
  }
  if (!module_exists('ionicons')) {
    drupal_add_css(path_to_theme() . '/vendors/ionicons/css/ionicons.min.css');
  }
  
  drupal_add_css(path_to_theme() . '/vendors/simple-line-icons/css/simple-line-icons.min.css');
  drupal_add_css(path_to_theme() . '/css/AdminLTE.css');
  drupal_add_css(path_to_theme() . '/css/skins/_all-skins.min.css');
  drupal_add_css(path_to_theme() . '/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css');
  drupal_add_css(path_to_theme() . '/vendors/bootstrap-daterangepicker/daterangepicker.css');
  drupal_add_css(path_to_theme() . '/vendors/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
  
  // Add required js
  drupal_add_js(path_to_theme() . '/vendors/jquery/jquery.min.js', array(
    'scope' => 'footer',
    'weight' => -10,
  ));
  drupal_add_js(path_to_theme() . '/vendors/jquery-ui/jquery-ui.min.js', array(
    'scope' => 'footer',
    'weight' => -9,
  ));
  drupal_add_js(path_to_theme() . '/vendors/raphael/raphael.min.js', array(
    'scope' => 'footer',
    'weight' => 10,
  ));
  drupal_add_js(path_to_theme() . '/vendors/jquery-sparkline/jquery.sparkline.min.js', array(
    'scope' => 'footer',
    'weight' => 30,
  ));
  drupal_add_js(path_to_theme() . '/vendors/jquery-knob/jquery.knob.min.js', array(
    'scope' => 'footer',
    'weight' => 60,
  ));
  drupal_add_js(path_to_theme() . '/vendors/moment/min/moment.min.js', array(
    'scope' => 'footer',
    'weight' => 70,
  ));
  drupal_add_js(path_to_theme() . '/vendors/bootstrap-daterangepicker/daterangepicker.js', array(
    'scope' => 'footer',
    'weight' => 80,
  ));
  drupal_add_js(path_to_theme() . '/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js', array(
    'scope' => 'footer',
    'weight' => 90,
  ));
  drupal_add_js(path_to_theme() . '/vendors/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js', array(
    'scope' => 'footer',
    'weight' => 100,
  ));
  drupal_add_js(path_to_theme() . '/vendors/jquery-slimscroll/jquery.slimscroll.min.js', array(
    'scope' => 'footer',
    'weight' => 110,
  ));
  drupal_add_js(path_to_theme() . '/vendors/fastclick/fastclick.js', array(
    'scope' => 'footer',
    'weight' => 120,
  ));
  drupal_add_js(path_to_theme() . '/js/adminlte.min.js', array(
    'scope' => 'footer',
    'weight' => 130,
  ));
  drupal_add_js(path_to_theme() . '/js/demo.js', array(
    'scope' => 'footer',
    'weight' => 150,
  ));
  
  if (theme_get_setting('lte_examples')) {
    drupal_add_css(path_to_theme() . '/vendors/morris.js/morris.min.css');
    drupal_add_css(path_to_theme() . '/vendors/jvectormap/jquery-jvectormap.css');
    
    drupal_add_js(path_to_theme() . '/vendors/morris.js/morris.min.js', array(
      'scope' => 'footer',
      'weight' => 20,
    ));
    drupal_add_js(path_to_theme() . '/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js', array(
      'scope' => 'footer',
      'weight' => 40,
    ));
    drupal_add_js(path_to_theme() . '/vendors/jvectormap/jquery-jvectormap-world-mill-en.js', array(
      'scope' => 'footer',
      'weight' => 50,
    ));
    drupal_add_js(path_to_theme() . '/js/pages/dashboard.js', array(
      'scope' => 'footer',
      'weight' => 140,
    ));
    
    $script = '
      $.widget.bridge("uibutton", $.ui.button);
    ';
    drupal_add_js($script, [
      'scope' => 'footer',
      'weight' => -8,
    ]);
    unset ($script);
  }
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function dncadminlte_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function dncadminlte_process_page(&$variables) {
  $variables['themepath'] = path_to_theme();
  $variables['lte_long_title'] = theme_get_setting('lte_long_title');
  $variables['lte_mini_title'] = theme_get_setting('lte_mini_title');
  $variables['lte_examples'] = theme_get_setting('lte_examples');
  
  global $user;
  if (!empty($user->uid)) {
    $user = user_load($user->uid);
    $variables['auth_user'] = (array)$user;
    $picture = !empty($user->picture->uri) ? $user->picture->uri : variable_get('user_picture_default');
    if (empty($picture)) {
      $variables['auth_user']['user_picture'] = '<img src="' . base_path() . path_to_theme() . '/img/user2-160x160.jpg" class="img-circle" alt="' . $user->mail . '" />';
    }
    else {
      $variables['auth_user']['user_picture'] = theme('image_style', array(
        'style_name' => 'thumbnail',
        'path' => $picture,
        'attributes' => array(
          'class' => 'img-circle',
          'alt' => $variables['auth_user']['mail'],
        ),
      ));
    }
    unset ($picture);
    $variables['auth_user']['menus'] = menu_navigation_links('user-menu');
  }
  
  if (!empty($variables['page']['sidebar_first'])) {
    $sbmenu = dncadminlte_sidebar_first_manipulation($variables['page']['sidebar_first']);
    if (!empty($sbmenu)) {
      $variables['sidebar_first_menus'] = $sbmenu;
    }
    unset ($sbmenu);
  }
  
  $variables['title'] = htmlspecialchars_decode($variables['title']);
  $variables['title'] = strip_tags($variables['title']);

  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && !empty($variables['title'])) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
  
  if (!empty($variables['tabs'])) {
    $dump = [];
    $dump['tabs'] = $variables['tabs'];
    $dump += $variables['page']['content'];
    $variables['page']['content'] = $dump;
    unset ($variables['tabs'], $dump);
  }
  if (!empty($variables['action_links'])) {
    $dump = [];
    $dump['action_links'] = $variables['action_links'];
    $dump += $variables['page']['content']['system_main'];
    $variables['page']['content']['system_main'] = $dump;
    unset ($variables['action_links'], $dump);
  }
}

function dncadminlte_html_head_alter(&$head_elements) {
  $head_elements['viewport'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
    ),
    '#weight' => -9999,
  );
  drupal_add_html_head($head_elements, 'viewport');
}

function dncadminlte_sidebar_first_manipulation(array $items = []) {
  $result = [];
  if (empty($items)) {
    return $result;
  }
  
  foreach ($items as $keys => $values) {
    if (!is_array($values)) {
      continue;
    }
    
    if (!empty($values['#theme']) && ctype_digit($keys)) {
      if (preg_match('/^menu_link_/', $values['#theme'])) {
        $values['#title'] = (preg_match('~<i ~', $values['#title']) ? NULL : '<i class="fa fa-circle-o"></i> ') . $values['#title'];
        $result[$keys]['#title'] = $values['#title'];
        $result[$keys]['#attributes'] = $values['#attributes'];
        if (!empty($values['#below'])) {
          $result[$keys]['#href'] = '#';
          $result[$keys]['#children'] = dncadminlte_sidebar_first_manipulation($values['#below']);
        }
        else {
          $result[$keys]['#href'] = (preg_match('/^http/i', $values['#href']) ? NULL : base_path()) . ($values['#href'] == '<front>' ? NULL : $values['#href']);
        }
      }
      continue;
    }
  
    foreach ($values as $key => $value) {
      if (!is_numeric($key)) {
        continue;
      }
      if (is_array($value) && !empty($value['#theme'])) {
        if (preg_match('/^menu_link_/', $value['#theme'])) {
          $value['#title'] = strip_tags($value['#title'], '<i>');
          preg_match_all('/<i([\w\W]*?)><\/i>/', $value['#title'], $matches);
          $mprefix = empty($matches[1]) ? '<i class="fa fa-ellipsis-v"></i>' : '<i' . $matches[1] . '></i>';
          $value['#title'] = $mprefix . ' <span>' . strip_tags($value['#title']) . '</span>';
          unset ($mprefix, $matches);
          $result[$value['#original_link']['menu_name']][$key]['#title'] = $value['#title'];
          $result[$value['#original_link']['menu_name']][$key]['#attributes'] = $value['#attributes'];
          if (!empty($value['#below'])) {
            $result[$value['#original_link']['menu_name']][$key]['#href'] = '#';
            $result[$value['#original_link']['menu_name']][$key]['#children'] = dncadminlte_sidebar_first_manipulation($value['#below']);
          }
          else {
            $result[$value['#original_link']['menu_name']][$key]['#href'] = (preg_match('/^http/i', $value['#href']) ? NULL : base_path()) . ($value['#href'] == '<front>' ? NULL : $value['#href']);
          }
        }
        else {
          if ($values['#block']->module == 'widget_factory') {
            $menus[$values['#block']->delta][$key]['#title'] = '<i class="' . $value['#item']['fa_icon'] . '"></i> ' . $value['#item']['title'];
            $result[$values['#block']->delta][$key]['#href'] = $value['#item']['path'];
          }
        }
      }
    }
  }
  return $result;
}

/********Breadcrumbs*******/
/**
 * Overrides theme_breadcrumb().
 *
 * Print breadcrumbs as an ordered list.
 */
function dncadminlte_breadcrumb($variables) {
  $output = [];
  if (!empty($variables['breadcrumb'])) {
    $paths = [];
    foreach ($variables['breadcrumb'] as $keys => $values) {
      $values = htmlspecialchars_decode($values);
      $values = strip_tags($values, '<a>');
      libxml_use_internal_errors(true);
      $dom = new domdocument;
      $dom->loadHTML($values);
      $getpath = NULL;
      foreach ($dom->getElementsByTagName('a') as $a) {
        if (!empty($a->getAttribute('href'))) {
          $getpath = $a->getAttribute('href');
          if ($getpath == url('<front>')) {
            $values = '<a href="' . $getpath . '"><i class="icon-home"></i></a>';
          }
          break;
        }
      }
      if (empty($getpath) || in_array($getpath, $paths)) {
        unset ($getpath);
        continue;
      }
      $paths[] = $getpath;
      unset ($getpath);
      $output[] = $values;
    }
  }
  else {
    $output[] = '<i class="icon-home"></i>';
  }
  return $output;
}

function dncadminlte_js_alter(&$js) {
  $bootstrap_del = drupal_get_path('theme', 'bootstrap') . '/js/bootstrap.js';
  unset ($js[$bootstrap_del], $bootstrap_del);
}