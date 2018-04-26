  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <?php if (!empty($lte_examples)) { ?>
      <?php include_once ($themepath . '/examples/sidebar.expl'); ?>
    <?php } else { ?>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <?php if (!empty($auth_user)) { ?>
          <div class="pull-left image">
            <?php echo $auth_user['user_picture']; ?>
          </div>
          <div class="pull-left info">
            <p><?php echo $auth_user['name']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        <?php } else { ?>
          <div class="pull-left image">
            <img src="<?php echo base_path() . $themepath; ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo t('Annonymous'); ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        <?php } ?>
      </div>
      <!-- search form -->
<!--      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php
          $sbmenus = [];
          if (!empty($sidebar_first_menus)) {
            function sidebarfirst_show_menus($items, &$sbmenus) {
              if (!empty($items['#children'])) {
                $sbmenus[] = '<li class="' . (in_array('active-trail', $items['#attributes']['class']) ? 'active ' : NULL) . 'treeview">';
                $sbmenus[] = '<a href="#">';
                $sbmenus[] = '  ' . $items['#title'];
                $sbmenus[] = '  <span class="pull-right-container">';
                $sbmenus[] = '    <i class="fa fa-angle-left pull-right"></i>';
                $sbmenus[] = '  </span>';
                $sbmenus[] = '</a>';
                $sbmenus[] = '<ul class="treeview-menu">';
                foreach ($items['#children'] as $keys => $values) {
                  sidebarfirst_show_menus($values, $sbmenus);
                }
                $sbmenus[] = '</ul>';
                $sbmenus[] = '</li>';
              }
              else {
                $sbmenus[] = '<li' . (in_array('active-trail', $items['#attributes']['class']) ? ' class="active"' : NULL) . '><a href="' . $items['#href'] . '">' . $items['#title'] . '</a></li>';
              }
            }
            
            foreach ($sidebar_first_menus as $keys => $values) {
              $sblabel = str_replace('_', ' ', str_replace('-', ' ', $keys));
              $sbmenus[] = '<li class="header">' . strtoupper($sblabel) . '</li>';
              foreach ($values as $key => $value) {
                sidebarfirst_show_menus($value, $sbmenus);
              }
              unset ($sblabel);
            }
          }
//          echo '<pre>'; print_r($sbmenus); echo '</pre>'; exit;
          $sbmenus = implode("\n", $sbmenus);
          echo $sbmenus;
          unset ($sbmenus);
        ?>
      </ul>
    <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>
