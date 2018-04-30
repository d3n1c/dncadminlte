  <?php if (!empty($lte_examples)) { ?>
    <?php include_once $themepath . '/examples/content.expl'; ?>
  <?php } else { ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php if (!empty($messages)): ?>
        <?php print $messages; ?>
      <?php endif; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php if (!empty($title)) { ?>
          <?php print render($title_prefix); ?>
          <strong><?php print ucwords(strtolower($title)); ?></strong>
          <?php print render($title_suffix); ?>
      <?php } else { ?>
          <strong><?php echo t('Home'); ?></strong>
          <small><?php echo t('Control panel'); ?></small>
      <?php } ?>
      </h1>

    <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <?php if (!empty($breadcrumb)) { ?>
          <?php foreach ($breadcrumb as $keys => $values) { ?>
            <li class="breadcrumb-item"><?php echo $values; ?></li>
          <?php } ?>
        <?php } ?>
<!--        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>-->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php } ?>
