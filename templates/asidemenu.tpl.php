  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <?php if (!empty($lte_examples)) { ?>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      <?php } ?>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <?php if (!empty($lte_examples)) { ?>
       <?php include_once $themepath . '/examples/asidemenu.expl'; ?>
      <?php } else { ?>
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <?php if (!empty($page['sidebar_second'])) { ?>
            <?php foreach ($page['sidebar_second'] as $keys => $values) { ?>
              <?php if (empty($values['#block'])) { continue; } ?>
              <?php if (!empty($values['#block']->subject)) { ?>
                <div class="callout m-0 py-2 text-muted text-center bg-light text-uppercase">
                  <small><b><?php print($values['#block']->subject); ?></b></small>
                </div>
              <?php } ?>
              <hr class="transparent mx-3 my-0">
              <div class="callout m-0 py-3">
                <?php if (!empty($values['#theme'])) { ?>
                  <?php print render($values); ?>
                <?php } elseif (!empty($values['#markup'])) { ?>
                  <?php print($values['#markup']);?>
                <?php } ?>
              </div>
              <hr class="mx-3 my-0">
            <?php } ?>
          <?php } else { ?>
              &nbsp;
          <?php } ?>
        </div>
      <?php } ?>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
