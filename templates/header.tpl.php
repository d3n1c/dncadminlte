  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo url('<front>'); ?>" class="logo">
      <?php if (!empty($lte_examples)) { ?>
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      <?php } else { ?>
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?php echo $lte_mini_title; ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?php echo $lte_long_title; ?></span>
      <?php } ?>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php if (!empty($lte_examples)) {?>
          <?php include_once($themepath . '/examples/header-menu.expl'); ?>
          <?php include_once($themepath . '/examples/header-user.expl'); ?>
          <?php } else { ?>
          
          <?php if (!empty($page['header'])) { ?>
              <?php foreach ($page['header'] as $values) { ?>
                <?php if (empty($values['#block'])) { continue; } ?>
                <li class="nav-item px-3">
                  <?php print render($values); ?>
                </li>
              <?php } ?>
          <?php } ?>
                
          <?php if (!empty($page['navigation'])) { ?>
            <?php foreach ($page['navigation'] as $values) { ?>
              <?php if (empty($values['#block'])) { continue; } ?>
              <li class="nav-item navigation">
                <?php print render($values); ?>
              </li>
            <?php } ?>
          <?php } ?>
              
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <?php if (!empty($auth_user)) { ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <?php echo $auth_user['user_picture']; ?>
                      <span class="hidden-xs"><?php echo $auth_user['name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <?php echo $auth_user['user_picture']; ?>

                        <p>
                          <?php echo $auth_user['name']; ?>
                          <small><?php echo t('Member since @month', ['@month' => date('F Y', $auth_user['created'])]); ?></small>
                        </p>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="<?php echo (!empty($cleanurl) ? base_path() : '?q=') . 'user'; ?>" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="<?php echo (!empty($cleanurl) ? base_path() : '?q=') . 'user/logout'; ?>" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>

                <?php } ?>
          <?php } ?>
          <!-- Control Sidebar Toggle Button -->
          <li class="nav-item">
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
