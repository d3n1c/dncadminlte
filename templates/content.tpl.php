  <?php if (!empty($lte_examples)) { ?>
    <?php include_once $themepath . '/examples/content.expl'; ?>
  <?php } else { ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
<!--      <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">-->
            <?php print render($page['content']); ?>
<!--        </div>
      </div>-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php } ?>
