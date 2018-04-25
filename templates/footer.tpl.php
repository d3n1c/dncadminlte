<footer class="main-footer">
  <?php if (!empty($page['footer'])) { ?>
    <?php $i = 0; ?>
    <?php foreach ($page['footer'] as $keys => $values) { ?>
      <?php if (!empty($values['#block'])) { ?>
        <?php if (!empty($values['#theme'])) { ?>
          <?php print render($values['#theme']); ?>
        <?php } else { ?>
          <?php if (!empty($values['#markup'])) { ?>
            <?php if (!empty($i)) { ?>
              &nbsp;|&nbsp;
            <?php } ?>
            <?php print($values['#markup']); ?>
            <?php $i++; ?>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    <?php } ?>
    <?php unset($i); ?>
  <?php } else { ?>
    <span><strong>Copyright &copy; 2004-2016 <a href="http://adminlte.io">Almsaeed Studio</a>.</strong> All Rights reserved.</span>
  <?php } ?>
  <span class="ml-auto pull-right hidden-xs"><?php echo t('Themed by'); ?> <a href="http://adminlte.io">AdminLTE</a></span>
</footer>
